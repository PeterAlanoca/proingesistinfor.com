var aux01 = '<div style="margin-top:-5px;" class="alert alert-danger" role="alert"><p><i class="glyphicon glyphicon-warning-sign"></i>&nbsp&nbsp¡';
var aux02 = '!</p></div>';
var aux03 = '<div class="alert alert-danger" role="alert"><p>¡';

$(document).ready(function() {

    $('#frm-login').validate({ 
        rules: {
            emaillogin: {
                character: true,
                required: true,
                ismail: true,
                email: true
            },
            passwordlogin: {
                character: true,
                required: true,
                minlength : 8,
                maxlength: 30 
            }          
        },
       
        submitHandler: function(form){
            form.submit();
        },
        
        messages: {
            emaillogin: {
                character: aux01+'Caracter invalido'+aux02,
                required: aux01+'Debe poner su correo'+aux02,
                ismail: aux01+'Ingrese un correo valido'+aux02,
                email: aux01+'Dirección de correo electrónico no válida'+aux02
            },
            passwordlogin: {
                character: aux01+'Caracter invalido'+aux02,
                required: aux01+'Debe poner su contraseña'+aux02,
                minlength: aux01+'Mínimo 8 caracteres'+aux02,
                maxlength: aux01+'Máximo 30 caracteres'+aux02
            }
        }, 

        highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
        },

        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function(error, element) {
            if(element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        }       
    });

    $('#frm').validate({ 
        rules: {
            username: {
                required: true,
                maxlength: 20,
                minlength: 3,
            },
            firstname: {
                character: true,
                required: true,
                maxlength: 40,
                minlength: 3,
                alpha: true
            },
            lastname: {
                character: true,
                required: true,
                maxlength: 40,
                minlength: 3,
                alpha: true
            },
            email: {
                character: true,
                required: true,
                ismail: true,
                email: true
            },
            password: {
                character: true,
                required: true,
                minlength : 8,
                maxlength: 30 
            },
            city: {
                required: true,
                maxlength: 20,
                minlength: 3,
            }, 
            cellphone: {
                character: true,
                required: true,
                minlength : 6,
                maxlength: 11,
                number: true
            },
            nr1: {
                character: true,
                required: true,
                maxlength: 40,
                minlength: 3,
                alpha: true
            },
            phone1: {
                character: true,
                required: true,
                minlength : 6,
                maxlength: 11,
                number: true
            },
            nr2: {
                character: true,
                required: true,
                maxlength: 40,
                minlength: 3,
                alpha: true
            },
            phone2: {
                character: true,
                required: true,
                minlength : 6,
                maxlength: 11,
                number: true
            },
            nr3: {
                character: true,
                required: true,
                maxlength: 40,
                minlength: 3,
                alpha: true
            },
            phone3: {
                character: true,
                required: true,
                minlength : 6,
                maxlength: 11,
                number: true
            },
            nr4: {
                character: true,
                required: true,
                maxlength: 40,
                minlength: 3,
                alpha: true
            },
            phone4: {
                character: true,
                required: true,
                minlength : 6,
                maxlength: 11,
                number: true
            }
        },
       
        submitHandler: function(form){
            form.submit();
        },
        
        messages: {
            username: {
                required: 'Tiene que llenar este campo.',
                minlength: 'Mínimo 8 caracteres.',
                maxlength: 'Máximo 20 caracteres.'
            },
            firstname: {
                required: 'Debe poner su nombre.',
                character: 'Caracter invalido.',
                maxlength: 'Máximo 40 caracteres.',
                minlength: 'Debe ingresar al menos 3 caracteres.',
                alpha: 'Solo puede ingresar letras.', 
            },
            lastname: {
                required: 'Debe poner su apellido.',
                character: 'Caracter invalido.',
                maxlength: 'Máximo 40 caracteres.',
                minlength: 'Debe ingresar al menos 3 caracteres.',
                alpha: 'Solo puede ingresar letras.', 
            },
            email: {
                character: 'Caracter invalido.',
                required: 'Debe poner su correo.',
                ismail: 'Ingrese un correo valido.',
                email: 'Dirección de correo electrónico no válida.'
            },
            password: {
                character: 'Caracter invalido.',
                required: 'Debe poner su contraseña.',
                minlength: 'Mínimo 8 caracteres.',
                maxlength: 'Máximo 30 caracteres.'
            },
            city: {
                required: 'Tiene que llenar este campo.',
                minlength: 'Mínimo 8 caracteres.',
                maxlength: 'Máximo 20 caracteres.'
            },
            cellphone: {
                required: 'Debe ingresar su teléfono móvil.',
                minlength : 'Debe ingresar al menos 7 caracteres.',
                maxlength: 'Máximo 11 caracteres.',
                number: 'Telefono no valido.'
            },
            nr1: {
                required: 'Debe poner un nombre.',
                character: 'Caracter invalido.',
                maxlength: 'Máximo 40 caracteres.',
                minlength: 'Debe ingresar al menos 3 caracteres.',
                alpha: 'Solo puede ingresar letras.'
            },
            phone1: {
                required: 'Debe ingresar su teléfono móvil.',
                minlength : 'Debe ingresar al menos 7 caracteres.',
                maxlength: 'Máximo 11 caracteres.',
                number: 'Telefono no valido.'
            },
            nr2: {
                required: 'Debe poner un nombre.',
                character: 'Caracter invalido.',
                maxlength: 'Máximo 40 caracteres.',
                minlength: 'Debe ingresar al menos 3 caracteres.',
                alpha: 'Solo puede ingresar letras.'
            },
            phone2: {
                required: 'Debe ingresar su teléfono móvil.',
                minlength : 'Debe ingresar al menos 7 caracteres.',
                maxlength: 'Máximo 11 caracteres.',
                number: 'Telefono no valido.'
            },
            nr3: {
                required: 'Debe poner un nombre.',
                character: 'Caracter invalido.',
                maxlength: 'Máximo 40 caracteres.',
                minlength: 'Debe ingresar al menos 3 caracteres.',
                alpha: 'Solo puede ingresar letras.'
            },
            phone3: {
                required: 'Debe ingresar su teléfono móvil.',
                minlength : 'Debe ingresar al menos 7 caracteres.',
                maxlength: 'Máximo 11 caracteres.',
                number: 'Telefono no valido.'
            },
            nr4: {
                required: 'Debe poner un nombre.',
                character: 'Caracter invalido.',
                maxlength: 'Máximo 40 caracteres.',
                minlength: 'Debe ingresar al menos 3 caracteres.',
                alpha: 'Solo puede ingresar letras.'
            },
            phone4: {
                required: 'Debe ingresar su teléfono móvil.',
                minlength : 'Debe ingresar al menos 7 caracteres.',
                maxlength: 'Máximo 11 caracteres.',
                number: 'Telefono no valido.'
            }
        }, 

        highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
        },

        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function(error, element) {
            if(element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        }       
    });

    jQuery.validator.addMethod("character", function(value, element) {
        return this.optional( element ) || /^[a-zA-Z0-9.!#$%&*+\@ñÑ /=?^_{|}~-]+$/.test( value );
    }, '<font color="red">Caracter invalido</font>');

    jQuery.validator.addMethod("ismail", function(value, element) {
        return this.optional( element ) || /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/.test( value );
    }, '<font color="red">NOOOOOOOOOOO</font>');

    jQuery.validator.addMethod("alpha", function(value, element) {
        return this.optional( element ) || /^[a-zA-Z\sñÑ]+$/.test( value );
    }, 'Solo letras.');

    jQuery.validator.addMethod("equalstoString", function(value, element, param) { 
        return this.optional(element) || value !== param; 
    }, "noooooooooo");

});




