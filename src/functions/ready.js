$(document).ready(function () {
    const data = sessionStorage.getItem("prueba");
    console.log(`${data.email}`);

    $('#cmbTipo').selectmenu({
        create: function(event, ui){
            //cargaReconocimientos();
        },
        change: function(event, ui){
            //buscaDatosCatalogo();
            alert("Hoka");
        }
    });
    $('#cmbOrigen').selectmenu({
        create: function(event, ui){
            //cargaReconocimientos();
        },
        change: function(event, ui){
            //buscaDatosCatalogo();
            alert("Hoka");
        }
    });
    $('#button').button();
    $("#button").click(function (event) {
        event.preventDefault();
        alert("Hoka");
    });



});

$('#exit-login').click(function (e) { 
    e.preventDefault();
    
    window.location.href = "/";
});