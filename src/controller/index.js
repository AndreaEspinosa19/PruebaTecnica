

$("#BotonPrueba").on("click", () => {
    $.ajax({
        url: '../controller/peticion.php',
        type: 'get',
        success: function (response) {
            $("#table_body").html('');
            let datos = JSON.parse(response);
         
            $.each(datos.result, (key, element) => {
                $("#table_body").append(`
                <tr>
                    <td>${element.id}</td>
                    <td>${element.contact_no}</td>
                    <td>${element.lastname}</td>
                    <td>${element.createdtime}</td>                    
                </tr> 
                `);
            });

        },
        error: function (err) {
            console.log(err);
        }
    });
    
});
