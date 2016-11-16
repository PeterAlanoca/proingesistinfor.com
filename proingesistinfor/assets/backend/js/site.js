var aux01 = '<div style="margin-top:-5px;" class="alert alert-danger" role="alert"><p><i class="glyphicon glyphicon-warning-sign"></i>&nbsp&nbsp¡';
var aux02 = '!</p></div>';
var aux03 = '<div class="alert alert-danger" role="alert"><p>¡';

$(document).ready(function() {
    $('#form1').validate({ 
        rules: {

            titulo: {
                maxlength: 200
            },

            descripcion: {
                maxlength: 400  
            },

            nombre: {
                character: true,
                required: true,
                maxlength: 40,
                minlength: 3,
                alpha: true
            },

            apellido: {
                character: true,
                required: true,
                maxlength: 40,
                minlength: 3,
                alpha: true
            },

            correo: {
                character: true,
                required: true,
                ismail: true
            },

            password1: {
                character: true,
                required: true,
                minlength : 8,
                maxlength: 30
                
            },

            password2: {
                character: true,
                minlength : 8,
                maxlength: 30,
                equalTo: "#password1"
            }, 

            pais: {
                required: true
            },

            departamento: {
                required: true
            },

            sexo: {
                required: true
            },

            dia: {
                 number: true
            },

            mes: {
                 number: true
            },

            año: {
                 number: true
            },

            telefono: {
                character: true,
                required: true,
                minlength : 6,
                maxlength: 11,
                number: true
            },

            monto: {
                
                required: true,
                minlength : 1,
                maxlength: 7,
                number: true
            },

            banco: {
                equalstoString: "Entidad Bancaria"
            },

            metodo: {
                equalstoString: "Metodo de pago utilizado"
            },

            mensaje: {
                character: true,
                required: true,
                maxlength: 550,
                minlength: 10,
                alpha: true
            }


        },
       
        submitHandler: function(form){
            form.submit();
        },
        
        messages: {
            
            titulo: {
                maxlength: aux01+'Maximo 200 caracteres'+aux02     
            },

            descripcion: {
                maxlength: aux01+'Maximo 400 caracteres'+aux02     
            },

            nombre: {
                required: aux01+'Debe poner su nombre'+aux02,
                character: aux01+'Caracter invalido'+aux02,
                maxlength: aux01+'Maximo 40 caracteres'+aux02,
                minlength: aux01+'Debe ingresar al menos 3 caracteres'+aux02,
                alpha: aux01+'Solo puede ingresar letras'+aux02,      
            },

            apellido: {

                required: aux01+'Debe poner su apellido'+aux02,
                character: aux01+'Caracter invalido'+aux02,
                maxlength: aux01+'Maximo 40 caracteres'+aux02,
                minlength: aux01+'Debe ingresar al menos 3 caracteres'+aux02,
                alpha: aux01+'Solo puede ingresar letras'+aux02,      
            },

            correo: {
                character: aux01+'Caracter invalido'+aux02,
                required: aux01+'Debe poner su correo'+aux02,
                ismail: aux01+'Ingrese un correo valido'+aux02
            },

            password1: {
                character: aux01+'Caracter invalido'+aux02,
                required: aux01+'Ingrese una contraseña'+aux02,
                minlength : aux01+'Debe ingresar al menos 8 caracteres'+aux02,
                maxlength: aux01+'Maximo 40 caracteres'+aux02
            },

            password2: {
                character: aux01+'Caracter invalido'+aux02,
                minlength : aux01+'Debe ingresar al menos 8 caracteres'+aux02,
                maxlength: aux01+'Maximo 40 caracteres'+aux02,
                equalTo: aux01+'La contraseña no coincide'+aux02
            },

            sexo: {
                required: aux01+'Seleccionar un genero'+aux02 
            },

            dia: {
                number: aux03+'Dia'+aux02
            
            },

            mes: {
                number: aux03+'Mes'+aux02
            
            },

            año: {
                number: aux03+'Año'+aux02
            
            },
      
            telefono: {
                required: aux01+'Debe ingresar su telefono'+aux02,
                minlength : aux01+'Debe ingresar al menos 7 caracteres'+aux02,
                maxlength: aux01+'Maximo 11 caracteres'+aux02,
                number: aux01+'Telefono no valido'+aux02
            },

            monto: {
                number: aux01+'Monto no valido'+aux02,
                required: aux01+'Debe ingresar su monto'+aux02,
                minlength : aux01+'Debe ingresar al menos 1 caracteres'+aux02,
                maxlength: aux01+'Maximo 11 caracteres'+aux02,
            },

            banco: {
                equalstoString: aux01+'Escoja un banco'+aux02
            },

            metodo: {
                equalstoString: aux01+'Campo requerido'+aux02
            },

            mensaje: {
                required: aux01+'Debe poner su mensaje'+aux02,
                character: aux01+'Caracter invalido'+aux02,
                maxlength: aux01+'Maximo 500 caracteres'+aux02,
                minlength: aux01+'Debe ingresar al menos 10 caracteres'+aux02,
                alpha: aux01+'Solo puede ingresar letras'+aux02,      
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

    jQuery.validator.addMethod('reCaptchaMethod', function (value, element, param) {
            if (grecaptcha.getResponse() == ''){
                return false;
            } else {
                // I would like also to check server side if the recaptcha response is good
                return true
            }
    }, 'You must complete the antispam verification');

});




