if(!sessionStorage.getItem('token')){
    window.location.href = '../form.html';
 }
 
 const datos = JSON.parse(sessionStorage.getItem('token'));
 if(datos.tipo !== 'Cliente'){
     window.location.href = '../views/dashboards/dashboardAdmin.html'
 }
 