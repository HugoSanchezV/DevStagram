import Dropzone from "dropzone"

Dropzone.autoDiscover = false

const dropzone = new Dropzone('#dropzone', {
    dictDefaultMessage: 'Sube aquí tu imagen',
    acceptedFiles: ".png, .jpg, .jpeg, .gif",
    addRemoveLinks: true,
    dictRemoveFile: "Borrar Archivo",
    maxFiles: 1,
    uploadMultiple: false,

    init: function () {
        if (document.querySelector('[name="img"]').value.trim()) {
            const imgPublish = {}
            imgPublish.size = 1234;
            imgPublish.name = document.querySelector('[name="img"]').value.trim()

            this.options.addedfile.call(this, imgPublish)
            this.options.thumbnail.call(this, imgPublish, `/uploads/${imgPublish.name}`)

            imgPublish.previewElement.classList.add('dz-success', 'dz-complete')
        }
    }
})


dropzone.on('success', function (file, response) {
    console.log(response.img)

    document.querySelector('[name="img"]').value = response.img
})


dropzone.on('removedfile', function () { 
    document.querySelector('[name="img"]').value= ''
})