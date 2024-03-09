$(document).ready(function() {
    // Manejar el evento click del botón de login
    $('#login-s').click(function(event) {
        event.preventDefault();

        // Obtener los valores del email y la contraseña
        var cuenta = $('#email').val();
        var password = $('#password').val();

        console.log(cuenta, password);
        
        $.ajax({
            type: 'POST', // Método de envío
            url: '../controller/login.php',
            data: { cuenta: cuenta, password: password }, // Datos a enviar
            success: function(response) {
                console.log(response);
            },
            error: function(xhr, status, error) {
                console.error('Error al enviar la solicitud:', error);
            }
        });
         
    });
});