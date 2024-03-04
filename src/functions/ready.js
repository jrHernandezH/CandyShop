$(document).ready(function () {
    const data = sessionStorage.getItem("prueba");

    console.log(`${data.email}`);
});

$('#exit-login').click(function (e) { 
    e.preventDefault();
    
    window.location.href = "/";
});