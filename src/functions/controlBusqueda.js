$().ready(()=>{
    //Aspecto y comportamiento del select
    $('#cmbTipo').selectmenu({
        create: function(event, ui){
            cargaTipos();
        },
        change: function(event, ui){
            buscaProductosTipo();
        }
    });
    $('#cmbOrigen').selectmenu({
        create: function(event, ui){
            cargaOrigenes();
        },
        change: function(event, ui){
            buscaProductosOrigen();
        }
    });
});

function cargaTipos(){
var sUrl = "src/controller/ctrlBuscaTipos.php";
    $.getJSON({
        url: sUrl
    })
    .done(function(oDatos, status, objResp){
        let sErr='';
        let oNodo;
        try{
            $('#cmbTipo').empty();
            if (oDatos.success){
                oNodo=$('<option>');
                oNodo.val('-1');
                oNodo.html('TODOS');
                $("#cmbTipo").append(oNodo);
                if (oDatos.data.arrReconocimientos.length>0){
                    oDatos.data.arrReconocimientos.forEach((elem)=>{
                        oNodo=$('<option>');
                        oNodo.val(elem.clave);
                        oNodo.html(elem.descripcion);
                        $("#cmbTipo").append(oNodo);
                    });
                }else{
                    sErr = 'Datos recibidos incompletos';
                }
            }else{
                sErr = oDatos.status;
            }
        }catch(excep){
            sErr = excep.message;
        }
        if (sErr != '')
            alert(sErr);
    })
    .fail(function(objResp, status, sError){
        alert('El servidor indica error '+status+ ' usando $.getJSON()');
        console.log(sError);
    })
    .always(function(objResp, status){
            console.log("Llamada $.getJSON() a API Web completada "+status);
    });
}
    
function buscaProductosTipo(){
   
let sErr = '';
    if ($('#cmbTipo') === null)
        sErr = 'Error de referencias';
    else{
        if ($('#cmbTipo').val() === ''){
            $('#tblDatos').empty();

        }else{
            $.getJSON({
                url: 'src/controller/ctrlBuscaProductosTipo.php?cmbTipo='
                    +$('#cmbTipo').val()
            })
            .done(function(oDatos, status, objResp){
                let sErr='';
                let tr, tdNombre, tdTipo, tdOrigen, tdPrecio, tdCarac, tdSabor, tdImg, tdExis;
                try{
                    //Limpiar información anterior
                    $('#tblDatos').empty();
                    if (oDatos.success){
                        console.log(oDatos);
                        if(oDatos.data.arrProductos.length>0){//POR alguna razon no obtiene ningun dato de la BDD
                            oDatos.data.arrProductos.forEach((elem)=>{
                                tr = $('<tr>');
                                tdNombre = $('<td>');
<<<<<<< HEAD
                                tdTipo= $('<td>');
=======
                            
>>>>>>> 1f6ea2c1c29b5f99d7349adec3f872752f630f5c
                                tdOrigen = $('<td>');
                                tdPrecio = $('<td>');
                                tdCarac = $('<td>');
                                tdSabor = $('<td>');
                                tdImg = $('<td>').css('width', '150px');
                                tdExis = $('<td>');
                                imgPro = $('<img>').prop('src', "/src/images/products/"+elem.fotografia).prop('alt', 'Default Sprite').css('max-width', '100%');
                                tdNombre.text(elem.nombre);
                                tdOrigen.text(elem.origen);
                                tdPrecio.text("$"+elem.precio);
                                tdCarac.text(elem.caracteristicas);
<<<<<<< HEAD
                                tdSabor.text(convertirABool(elem.saborizantes));
                                tdExis.text(convertirABool(elem.existencias));
                                tdImg.append(imgPro);
                                tr.append(tdNombre,tdTipo, tdOrigen, tdPrecio, tdCarac,tdImg,tdSabor,tdExis);
=======
                                tdSabor.text(elem.saborizantes);
                                tdExis.text(elem.otros);

                                //Faltará hacer que se cargue la img con base al nombre
                                tdImg.text(elem.fotografia);
                                tr.append(tdNombre, tdOrigen, tdPrecio, tdCarac,tdImg,tdSabor,tdExis);
>>>>>>> 1f6ea2c1c29b5f99d7349adec3f872752f630f5c
                                $('#tblDatos').append(tr);
                            
                        });
                        }else
                            alert("No se encontraron datos!");
                        
                    }else{
                        sErr = oDatos.status;
                    }
                }catch(excep){
                    sErr = excep.message;
                }
                if (sErr != '')
                    alert(sErr);
            })
            .fail(function(objResp, status, sError){
                alert('El servidor indica error '+status+ ' usando $.getJSON()');
                console.log(sError);
            })
            .always(function(objResp, status){
                    console.log("Llamada $.getJSON() a API Web completada "+status);
            });
        }
    }
    if (sErr !== '')
        alert(sErr);
}
function buscaProductosOrigen(){
   
    let sErr = '';
        if ($('#cmbOrigen') === null)
            sErr = 'Error de referencias';
        else{
            if ($('#cmbOrigen').val() === ''){
                $('#tblDatos').empty();
            }else{
                $.getJSON({
                    url: 'src/controller/ctrlBuscarProductosOrigen.php?cmbOrigen='
                        +$('#cmbOrigen').val()
                })
                .done(function(oDatos, status, objResp){
                    let sErr='';
<<<<<<< HEAD
                    let tr, tdNombre, tdOrigen, tdPrecio, tdCarac, tdSabor, tdImg, tdExis,imgPro;
=======
                    let tr, tdNombre, tdOrigen, tdPrecio, tdCarac, tdSabor, tdImg, tdExis;
>>>>>>> 1f6ea2c1c29b5f99d7349adec3f872752f630f5c
                    try{
                        //Limpiar información anterior
                        $('#tblDatos').empty();
                        if (oDatos.success){
                            console.log(oDatos);
                            if(oDatos.data.arrProductos.length>0){//POR alguna razon no obtiene ningun dato de la BDD
                                oDatos.data.arrProductos.forEach((elem)=>{
                                    tr = $('<tr>');
                                    tdNombre = $('<td>');
<<<<<<< HEAD
                                    tdTipo= $('<td>');
=======
                                
>>>>>>> 1f6ea2c1c29b5f99d7349adec3f872752f630f5c
                                    tdOrigen = $('<td>');
                                    tdPrecio = $('<td>');
                                    tdCarac = $('<td>');
                                    tdSabor = $('<td>');
<<<<<<< HEAD
                                    tdImg = $('<td>').css('width', '150px');
                                    tdExis = $('<td>');
                                    imgPro = $('<img>').prop('src', "../../src/images/products/"+elem.fotografia).prop('alt', 'Default Sprite').css('max-width', '100%');
                                    tdNombre.text(elem.nombre);
                                    tdTipo.text(elem.tipo);
                                    tdOrigen.text(elem.origen);
                                    tdPrecio.text("$"+elem.precio);
                                    tdCarac.text(elem.caracteristicas);
                                    tdSabor.text(convertirABool(elem.saborizantes));
                                    tdExis.text(convertirABool(elem.existencias));
                                    tdImg.append(imgPro);
                                    tr.append(tdNombre,tdTipo, tdOrigen, tdPrecio, tdCarac,tdImg,tdSabor,tdExis);
=======
                                    tdImg = $('<td>');
                                    tdExis = $('<td>');
                                    tdNombre.text(elem.nombre);
                                    tdOrigen.text(elem.origen);
                                    tdPrecio.text(elem.precio);
                                    tdCarac.text(elem.caracteristicas);
                                    tdSabor.text(elem.saborizantes);
                                    tdExis.text(elem.otros);
    
                                    //Faltará hacer que se cargue la img con base al nombre
                                    tdImg.text(elem.fotografia);
                                    tr.append(tdNombre, tdOrigen, tdPrecio, tdCarac,tdImg,tdSabor,tdExis);
>>>>>>> 1f6ea2c1c29b5f99d7349adec3f872752f630f5c
                                    $('#tblDatos').append(tr);
                                
                            });
                            }else
                                alert("No se encontraron datos!");
                            
                        }else{
                            sErr = oDatos.status;
                        }
                    }catch(excep){
                        sErr = excep.message;
                    }
                    if (sErr != '')
                        alert(sErr);
                })
                .fail(function(objResp, status, sError){
                    alert('El servidor indica error '+status+ ' usando $.getJSON()');
                    console.log(sError);
                })
                .always(function(objResp, status){
                        console.log("Llamada $.getJSON() a API Web completada "+status);
                });
            }
        }
        if (sErr !== '')
            alert(sErr);
    }
/*
function llenaTablaSprites(oDatos){
let sErr='';
let tr, tdNombre, tdMov, tdSprites, imgDefault, imgShiny;

    if ($('#tblDatos') === null)
        sErr = 'Error de referencias';
    else{
        try{
            //Limpiar información anterior
            $('#tblDatos').empty();
            //Crear nodos
            tr = $('<tr>');
            tdNombre = $('<td>');
            tdMov = $('<td>');
            tdSprites = $('<td>');
            imgDefault = $('<img>');
            imgShiny = $('<img>');
            //Llenar la información de las imágenes
            imgDefault.prop('src', oDatos.sprites.front_default);
            imgDefault.prop('alt', 'Default Sprite');
            imgShiny.prop('src', oDatos.sprites.front_shiny);
            imgShiny.prop('alt', 'Shiny Sprite');
            //Llenar la celda con las imágenes
            tdSprites.append(imgDefault, imgShiny);
            //Llenar otras celdas
            tdNombre.text(oDatos.name);
            if (oDatos.moves.length>0)
                tdMov.text(oDatos.moves[0].move.name);
            else
                tdMov.text('');
            //Llenar línea con celdas
            tr.append(tdNombre, tdMov, tdSprites);
            //Asociar línea a cuerpo de la tabla
            $('#tblDatos').append(tr);
        }catch(excep){
            sErr = excep.message;
        }
        if (sErr != '')
            alert(sErr);
    }
}*/
function cargaOrigenes(){
    var sUrl = "src/controller/ctrlBuscaOrigenes.php";
        $.getJSON({
            url: sUrl //AQUI hay un parseError
        })
        .done(function(oDatos, status, objResp){
            let sErr='';
            let oNodo;
            try{
                $('#cmbOrigen').empty();
                if (oDatos.success){
                    oNodo=$('<option>');
                    oNodo.val('-1');
                    oNodo.html('TODOS');
                    $("#cmbOrigen").append(oNodo);
                    if (oDatos.data.arrOrigenes.length>0){
                        oDatos.data.arrOrigenes.forEach((elem)=>{
                            oNodo=$('<option>');
                            oNodo.val(elem.clave);
                            oNodo.html(elem.descripcion);
                            $("#cmbOrigen").append(oNodo);
                        });
                    }else{
                        sErr = 'Datos recibidos incompletos';
                    }
                }else{
                    sErr = oDatos.status;
                }
            }catch(excep){
                sErr = excep.message;
            }
            if (sErr != '')
                alert(sErr);
        })
        .fail(function(objResp, status, sError){
            alert('El servidor indica error '+status+ ' usando $.getJSON()');
            console.log(sError);
        })
        .always(function(objResp, status){
                console.log("Llamada $.getJSON() a API Web completada "+status);
        });
    }
    function convertirABool(valor) {
        if (valor === 0) {
            return "No";
        } else if (valor === 1) {
            return "Si";
        } else {
            return "0";
        }
    }