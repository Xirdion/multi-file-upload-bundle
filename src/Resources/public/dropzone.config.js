var initDropzone = function () {
    // disable autoDiscover
    Dropzone.autoDiscover = false;

    var dropZones = [];

    var uploadFields = document.getElementsByClassName('js-multifileupload');
    for (var i = 0; i < uploadFields.length; i++) {
        initDropzoneConfig(uploadFields[i]);
    }

    for (var j = 0; j < dropZones.length; j++) {
        // add additional data when uploading files
        dropZones[j].on('sending', function (file, xhrObject, formData) {
            // this is the current dropzone
            addFormData(formData, this.element);
        });


        dropZones[j].on('removedfile', function (file) {
            console.log(file);
        });

        // handle Errors
        dropZones[j].on('error', function (file, errorMessage, xhrObject) {
            handleDropzoneError(file, errorMessage, xhrObject);
        });
    }

    function initDropzoneConfig(field) {
        var newDropZone = new Dropzone(field, {
            url: "/xirdion/multifileupload/upload",
            paramName: field.dataset.name,
            maxFilesize: field.dataset.maxFileSize,
            maxFiles: field.dataset.maxFiles,
            acceptedFiles: field.dataset.acceptedFiles,
            addRemoveLinks: true,
        });

        dropZones.push(newDropZone);
    }

    /**
     *
     * @param {File} file
     * @param {string} errorMessage
     * @param {XMLHttpRequest} xhrObject
     */
    function handleDropzoneError(file, errorMessage, xhrObject) {
        if (xhrObject) {
            //console.log(xhrObject.responseText);
        }
        console.log(file);
        console.log(errorMessage);
        console.log(xhrObject);

        // form should not be sendable
    }

    /**
     *
     * @param {FormData} formData
     * @param {HTMLElement} element
     */
    function addFormData(formData, element) {
        formData.append('element', element.dataset.id);
    }
};

if (typeof Dropzone === 'function') {
    initDropzone();
}