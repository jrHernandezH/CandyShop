let res;
let data;

const getData = async (cuenta, password) => {
    try {
        const response = await $.ajax({
            type: 'POST', // Método de envío
            url: '../controller/login.php',
            data: { cuenta: cuenta, password: password }, // Datos a enviar
        });
        
        res = response;
        data = response.data;
        
        return data;
    } catch (error) {
        console.error('Error al enviar la solicitud:', error);
        throw error; // Re-throw the error to handle it outside of getData if needed
    }
};

export { res, data, getData };
