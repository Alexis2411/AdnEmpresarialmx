$(document).ready(function () {

    $(".select-res").on("click", function (e) {
        if (e.target.classList.contains('nav-item')) {
            const data = e.target.id.split('-');
            const datos = { "status": data[0], "val": data[2]};

            limpiar(datos.val, datos.status);
            avance(datos.val, datos.status);
        }
    });


    $(".res-radio").on("click", function (e) {
        if (e.target.classList.contains('option')) {
            const data = e.target.id.split(':');
            const datos = { "pre": data[5], "val": data[4]};
            avance(datos.val, datos.pre);
        }
    });


    function limpiar(id, accion) {
        const nav = `pre-${id}`
        if (accion === 'empty') {
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
        if (accion === 'pre') {
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
        } else if (accion === 'empty') {
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
            title: '¿ESTÁ SEGURO?',
            text: "Una vez finalizada la encuesta no podrá editar sus respuestas.",
            type: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, Finalizar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.value) {
                if (completo()) {
                        swal({
                            type: `success`,
                            title: `FINALIZADO CORRECTAMENTE`,
                            showConfirmButton: false,
                            timer: 1500
                        });
                        setTimeout(() => {
                            window.location.href = `Encuesta1.php`;
                        }, 1500);
                } else {
                    Swal.fire({
                        type: 'error',
                        title: 'LO SENTIMOS',
                        text: 'Aún no ha respondido toda la encuesta'
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