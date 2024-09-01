import Dropzone from "dropzone";
// import { clearLine } from "readline";

Dropzone.autoDiscover = false;


const dropzone = new Dropzone('#dropzone', {
    dictDefaultMessage: "Sube tu imagen aqui",
    acceptedFiles: '.png, .jpg, .jpeg, .gif',
    addRemoveLinks: true,
    dictRemoveFile: 'Borrar archivo',
    maxFiles: 1,
    uploadMultiple: false,
});


dropzone.on('success', function(file, response){
    console.log(response);
})

dropzone.on('error', function(file, message){
    console.log(message);
})