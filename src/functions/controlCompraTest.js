$().ready(()=>{
    buscaProductosOrigen();
});


function buscaProductosOrigen(){
   
    let sErr = '';
        
                $.getJSON({
                    url: 'src/controller/ctrlBuscarProductosOrigen.php?cmbOrigen=-1'
                })
                .done(function(oDatos, status, objResp){
                    let sErr='';
                    let tr, tdNombre, tdOrigen, tdPrecio, tdCarac, tdSabor, tdImg, tdExis,imgPro;
                    try{
                        //Limpiar información anterior
                        $('#tblDatos').empty();
                        if (oDatos.success){
                            console.log(oDatos);
                            if(oDatos.data.arrProductos.length>0){//POR alguna razon no obtiene ningun dato de la BDD
                                oDatos.data.arrProductos.forEach((elem)=>{
                                    tr = $('<tr>');
                                    tdNombre = $('<td>');
                                    tdTipo= $('<td>');
                                    tdOrigen = $('<td>');
                                    tdPrecio = $('<td>');
                                    tdCarac = $('<td>');
                                    tdSabor = $('<td>');
                                    tdImg = $('<td>').css('width', '150px');
                                    tdExis = $('<td>');
                                    imgPro = $('<img>').prop('src', "/src/images/products/"+elem.fotografia).prop('alt', 'Default Sprite').css('max-width', '100%');
                                    tdNombre.text(elem.nombre);
                                    tdTipo.text(elem.tipo);
                                    tdOrigen.text(elem.origen);
                                    tdPrecio.text("$"+elem.precio);
                                    tdCarac.text(elem.caracteristicas);
                                    tdSabor.text(convertirABool(elem.saborizantes));
                                    tdExis.text(convertirABool(elem.existencias));
                                    tdImg.append(imgPro);
                                    tr.append(tdNombre,tdTipo, tdOrigen, tdPrecio, tdCarac,tdImg,tdSabor,tdExis);
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
            
        if (sErr !== '')
            alert(sErr);
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