// validación con ajax sobre el email del usuario
correoExistente = true;
$("#correo").change(function() {
    var correo = $('#correo').val();
    var datos = new FormData();
    console.log(datos);
    // agregamos un nombre para pasa el datos.
    datos.append('inputvalidarCorreo', correo);
    $.ajax({
        url: 'views/ajax.php',
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
            if (respuesta == 1) {
                $("#registro").removeAttr('disabled', 'disabled');
                $("#email").html('<p  class="alert alert-danger">El correo ya se encuentra registrado en la base de datos.</p>');
                $('#form').addClass('has-danger');
                $('#correo').addClass('form-control-danger');
                $("#registro").attr('disabled', 'disabled');
                correoExistente = true;
            } else {
                $("#form").removeClass('has-danger');
                $("#form").addClass('has-success');
                $("#correo").addClass('form-control form-control-success');
                $("#email").html('');
                $("#registro").removeAttr('disabled', 'disabled');
                correoExistente = false;
                var passValidate = true;
                $('#nombre').keyup(function() {
                    $("#nombreDiv").addClass('has-success');
                    $("#nombre").addClass('form-control form-control-success');
                });
                // validar las contradeñas y que coicidan
                $('#password').keyup(function() {
                    var _this = $('#password');
                    var password = $('#password').val();
                    $("#passwordDiv").addClass('has-success');
                    $("#password").addClass('form-control form-control-success');
                });
                $('#password2').keyup(function() {
                    var password = $('#password').val();
                    var password2 = $('#password2').val();
                    var _this = $('#password2');
                    // _this.attr('style', 'background:white');
                    if (password != password2 && password2 != '') {
                        $("#password2Div").addClass('has-danger');
                        $("#password2").addClass('form-control form-control-danger');
                        $("#pass").html('<p  class="alert alert-danger">Las contraseñas no coinciden.</p>');
                        $("#registro").attr('disabled', 'disabled');
                        $("#change").attr('disabled', 'disabled');
                    } else {
                        $("#password2Div").removeClass('has-danger');
                        $("#password2").removeClass('form-control form-control-danger');
                        $("#registro").removeAttr('disabled', 'disabled');
                        $("#change").removeAttr('disabled', 'disabled');
                        $("#pass").html('');
                        $("#password2Div").addClass('has-success');
                        $("#password2").addClass('form-control form-control-success');
                    }
                });
            }
        }
    })
});
$('#collapseExample').collapse({
    toggle: true
});
$('#collapseOne').collapse({
    toggle: true
})
$('#btn-chat').on('click', function() {
    var mensaje = $('#mensaje').val();
    $.trim(mensaje);
    console.log(mensaje);
    $('#mensaje').val('');
    var datos = new FormData();
    // agregamos un nombre para pasa el datos.
    datos.append('mensageAjax', mensaje);
    $.ajax({
        url: 'views/ajax.php',
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function(respuesta) {
            if (respuesta == 1) {
                $('.panel-body').animate({
                    scrollTop: $('.panel-body')[0].scrollHeight
                });
                return false;
            } else {
                console.log(respuesta);
            }
        }
    })
});