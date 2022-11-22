$(document).ready(function () {
    $('#formulario').on('submit', function (e) {
        e.preventDefault();
        const datos = $(this).serializeArray();
        $.ajax({
            type: "POST",
            data: datos,
            url: "includes/model/modelo-usuario.php",
            dataType: "json",
            success: function (data) {
                if (data.type === 'success') {
                    swal({
                        type: `${data.type}`,
                        title: `${data.title}`,
                        showConfirmButton: false,
                        timer: 1500
                    });
                    setTimeout(() => {
                        window.location.href = `${data.href}`;
                    }, 1500);
                }else{
                    Swal.fire({
                        type: `${data.type}`,
                        title: `${data.title}`,
                        text: `${data.text}`
                      })
                }
            }
        });

    });

    $('#registro').on('submit', function (e) {
        e.preventDefault();
        const datos = $(this).serializeArray();
        console.log(datos);
        if (validaCampos()) {
            if ($("#contrasena").val() === $("#verificacion").val()) {
                if ($("#contrasena").val().length > 7) {
                    if ($('#term_con').is(':checked')) {
                           $.ajax({
                               type: "POST",
                               data: datos,
                               url: "includes/model/modelo-usuario.php",
                               dataType: "json",
                               success: function (data) {
                                   console.log(data);
                                   if (data.res === 'success') {
                                       swal({
                                           type: 'success',
                                           title: `${data.cause}`,
                                           showConfirmButton: false,
                                           timer: 1500
                                       });
                                       setTimeout(() => {
                                           window.location.href = 'MenuEncuestas.php';
                                       }, 1500);
                                   }else{
                                    Swal.fire({
                                        type: `${data.res}`,
                                        title: 'Ups...',
                                        text: `${data.cause}`
                                      })
                                   }
                               }
                           });               
                    } else {
                        Swal.fire({
                            type: 'error',
                            title: 'ACEPTE TÉRMINOS Y CONDICIONES',
                            text: 'NO HA ACEPTADO TÉRMINOS Y CONDICIONES'
                        })
                    }
                } else {
                    Swal.fire({
                        type: 'error',
                        title: 'Contraseña Corta',
                        text: 'Las contraseña es muy corta'
                    })
                }

            } else {
                Swal.fire({
                    type: 'error',
                    title: 'NO COINCIDEN',
                    text: 'LAS CONTRASEÑAS NO COINCIDEN'
                })
            }
        } else {
            Swal.fire({
                type: 'error',
                title: 'CAMPOS VACÍOS',
                text: 'AÚN QUEDAN CAMPOS VACÍOS'
            })
        }

    });


    $("#contrasena").keyup(function () {
        var strongRegex = new RegExp("^(?=.{8,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
        var mediumRegex = new RegExp("^(?=.{7,})(((?=.*[A-Z])(?=.*[a-z]))|((?=.*[A-Z])(?=.*[0-9]))|((?=.*[a-z])(?=.*[0-9]))).*$", "g");
        var enoughRegex = new RegExp("(?=.{6,}).*", "g");

        if (false == enoughRegex.test($(this).val())) {
            $('#msj').html('Más caracteres.');
        } else if (strongRegex.test($(this).val())) {
            $('#msj');
            $('#msj').html('Contraseña Segura');
        } else if (mediumRegex.test($(this).val())) {
            $('#msj');
            $('#msj').html('Contraseña Media');
        } else {
            $('#msj');
            $('#msj').html('Contraseña Débil');
        }
        return true;
    });


    $("#verificacion").keyup(function () {
        $('#msj').html('');
        if ($(this).val() === $("#contrasena").val()) {
            $('#msn');
            $('#msn').html('');
        } else {
            $('#msn');
            $('#msn').html('LA CONTRASEÑA NO COINCIDE');
        }
        return true;
    });


    function validaCampos() {
        var total = 0;
        var r = 0;
        $('#registro .obg').each(function () {
            if ($(this).val() == "") {
                $(this).addClass('pendiente');
            } else {
                if ($(this).hasClass('pendiente')) {
                    $(this).removeClass('pendiente');
                }
                r++;
            }
            total++;
        });

        if (total === r) {
            return true;
        } else {
            return false;
        }
    }

});