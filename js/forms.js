"use strict"
class Forms{
    constructor(){

    }

    clearFieldsRegister(){
        document.getElementsByName('name').value = '';
        document.getElementsByName('username').value = '';
        document.getElementsByName('email').value = '';
        document.getElementsByName('password').value = '';
        document.getElementsByName('passwordRepetir').value = '';
        $(".formulario")[0].reset();
    }
}

var forms = new Forms();
forms.clearFieldsRegister();