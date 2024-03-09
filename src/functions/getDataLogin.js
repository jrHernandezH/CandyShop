import { res, data, getData } from '../composables/getUser.js';

$(document).ready(function() {
    $('#login-s').click(async function(event) {
        event.preventDefault();

        const cuenta = $('#email').val();
        const password = $('#password').val();

        try {
            const result = await getData(cuenta, password);
            console.log(data.tipo)
            console.log(result)
            sessionStorage.setItem('token', JSON.stringify(data));
            result.tipo === 'Administrador' ? window.location.href = 'dashboards/dashboardAdmin.html' : window.location.href =' dashboards/dashboardClient.html';
        } catch (error) {
            // Manejar errores si es necesario
            console.log('Error')
        }
    });
});
