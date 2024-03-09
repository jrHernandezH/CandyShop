if(!sessionStorage.getItem('token')){
   window.location.href = '../form.html';
}

const datos = JSON.parse(sessionStorage.getItem('token'));
if(datos.tipo !== 'Administrador'){
    window.location.href = '../views/dashboards/dashboardClient.html'
}
