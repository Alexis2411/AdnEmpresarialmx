$(document).ready(function () {
    users(1);

    $('#formulario').on('submit', function (e) {
        e.preventDefault();
        const datos = $(this).serializeArray();
        $.ajax({
            type: "POST",
            data: datos,
            url: 'includes/model/modelo-usuario.php',
            dataType: "json",
            success: function (reply) {
                if (reply.type === 'success') {
                    swal({
                        type: `${reply.type}`,
                        title: `${reply.title}`,
                        showConfirmButton: false,
                        timer: 1500
                    });
                    setTimeout(() => {
                        window.location.href = `${reply.href}`;
                    }, 1500);
                } else {
                    Swal.fire({
                        type: `${reply.type}`,
                        title: `${reply.title}`,
                        text: `${reply.text}`
                    })
                }
            }
        });
    });

    $("#invitado").click(function () {
        const data = {action: "invitado"}
        $.ajax({
            url: 'includes/model/modelo-usuario.php',
            data: data,
            type: "POST",
            dataType: "json",
            success: function (reply) {
                if (reply.type === 'success') {
                    swal({
                        type: `${reply.type}`,
                        title: `${reply.title}`,
                        showConfirmButton: false,
                        timer: 1500
                    });
                    setTimeout(() => {
                        window.location.href = `${reply.href}`;
                    }, 1500);
                } else {
                    Swal.fire({
                        type: `${reply.type}`,
                        title: `${reply.title}`,
                        text: `${reply.text}`
                    })
                }
            }
        })

    });

    $('#registro').on('submit', function (e) {
        e.preventDefault();
        const datos = $(this).serializeArray();
        if (validaCampos()) {
            if ($("#contrasena").val() === $("#verificacion").val()) {
                if ($("#contrasena").val().length > 7) {
                    if ($('#term_con').is(':checked')) {
                        $.ajax({
                            type: "POST",
                            data: datos,
                            url: "includes/model/modelo-usuario.php",
                            dataType: "json",
                            success: function (reply) {
                                if (reply.type === 'success') {
                                    swal({
                                        type: `${reply.type}`,
                                        title: `${reply.title}`,
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                    setTimeout(() => {
                                        window.location.href = 'MenuEncuestas.php';
                                    }, 1500);
                                } else {
                                    Swal.fire({
                                        type: `${reply.type}`,
                                        title: `${reply.title}`,
                                        text: `${reply.text}`
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
                        title: 'CONTRASEÑA CORTA',
                        text: 'LA CONTRASEÑA ES MUY CORTA'
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
            $('#msj').html('MÁS CARACTERES');
        } else if (strongRegex.test($(this).val())) {
            $('#msj');
            $('#msj').html('CONTRASEÑA SEGURA');
        } else if (mediumRegex.test($(this).val())) {
            $('#msj');
            $('#msj').html('CONTRASEÑA MEDIA');
        } else {
            $('#msj');
            $('#msj').html('CONTRASEÑA DÉBIL');
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
            $('#msn').html('LAS CONTRASEÑAS NO COINCIDEN');
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


    $(".select-res").on("click", function (e) {
        if (e.target.classList.contains('nav-item')) {
            const data = e.target.id.split('-');
            const datos = {"status": data[0], "val": data[2], "us": data[3]};

            $.ajax({
                url: 'includes/model/modelo-pregunta.php',
                data: datos,
                type: "POST",
                dataType: "json",
                success: function (reply) {
                    limpiar(reply.value, reply.act);
                    avance(reply.value, reply.act);
                }
            })
        }
    });


    $(".res-radio").on("click", function (e) {
        if (e.target.classList.contains('option')) {
            const data = e.target.id.split(':');
            const datos = {"question": data[1], "sub": data[2], "pos": data[3], "pre": data[4]};

            $.ajax({
                url: 'includes/model/modelo-pregunta.php',
                data: datos,
                type: "POST",
                dataType: "json",
                success: function (reply) {
                    avance(reply.value, reply.act);
                }
            })
        }
    });


    function limpiar(id, accion) {
        const nav = `pre-${id}`
        if (accion === 'hidden') {
            $(`#${nav} .res-radio .option`).each(function () {
                if ($(this).is(':checked')) {
                    $(this).prop('checked', false);
                }
            });
        }
    }

    function avance(id, accion) {
        const nav = `pre-${id}`;
        const opt = $(`#${nav} .res-radio`).length;
        var check = 0;
        if (accion === 'show') {
            $(`#${nav} .res-radio .option`).each(function () {
                if ($(this).is(':checked')) {
                    check++;
                }
            });
            if (opt === check) {
                $(`#p${id}`).addClass('completo');
            } else {
                if ($(`#p${id}`).hasClass('completo')) {
                    $(`#p${id}`).removeClass('completo');
                }
            }
        } else if (accion === 'hidden') {
            if (!$(`#p${id}`).hasClass('completo')) {
                $(`#p${id}`).addClass('completo');
            }
        }
    }


    $('.btnNext').click(function () {
        $('.nav-pre > .active').next().trigger("click");
    });

    $('.btnEnd').click(function () {
        Swal.fire({
            title: '¿ESTA SEGURO?',
            text: "UNA VEZ FINALIZADA LA ENCUESTA NO PODRA MODIFICAR SUS RESPUESTAS.",
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'SI, FINALIZAR',
            cancelButtonText: 'CANCELAR'
        }).then((result) => {
            if (result.value) {
                if (completo()) {
                    const datos = {"end": $(this).attr("id")};
                    $.ajax({
                        url: 'includes/model/modelo-pregunta.php',
                        data: datos,
                        type: "POST",
                        dataType: "json",
                        success: function (reply) {
                            if (reply.type === 'success') {
                                swal({
                                    type: `${reply.type}`,
                                    title: `${reply.title}`,
                                    showConfirmButton: false,
                                    timer: 1500
                                });
                                setTimeout(() => {
                                    window.location.href = `${reply.href}`;
                                }, 1500);
                            } else {
                                Swal.fire({
                                    type: `${reply.type}`,
                                    title: `${reply.title}`,
                                    text: `${reply.text}`
                                })
                            }
                        }
                    })
                } else {
                    Swal.fire({
                        type: 'error',
                        title: 'LO SENTIMOS',
                        text: 'AUN NO HA RESPONDIDO TODA LA ENCUESTA'
                    })
                }
            }
        })
    });


    function completo() {
        const opt = $(`.btn-primary`).length;
        const comp = $(`.completo`).length;
        if (opt === comp) {
            return true;
        } else {
            return false;
        }
    }
});

function users(page) {
    const parametros = {"action": "ajax", "page": page};
    $("#loader").fadeIn('slow');
    $.ajax({
        url: 'includes/model/UsuariosDash.php',
        data: parametros,
        beforeSend: function (objeto) {
            $("#loader").html("<img src='img/loader.gif'>");
        },
        success: function (data) {
            $(".outer_div").html(data).fadeIn('slow');
            $("#loader").html("");
        }
    })
}

function load(page) {
    users(page);
}