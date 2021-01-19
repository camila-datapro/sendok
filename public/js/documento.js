// In your Javascript (external .js resource or <script> tag)
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});

function guardarPropuesta(){
    const elemento = document.getElementById('propuesta_detalle');
    $("#modalCargando").modal('show');
    html2pdf()
    .set({
        margin: 1,
        filename: 'documento.pdf',
        image: {
            type: 'png',
            quality: 0.98
        },
        html2canvas: {
            scale: 3, // a mayor escala, mejores graficos pero mas peso
        },
        jsPDF: {
            unit: "in",
            format: "a3",
            orientation: 'portrait' //landscape de forma horizontal
        }
    })
    .from(elemento)
    .save()
    .catch( err => console.log(err))
    .finally()
    .then(() => {
        $("#modalCargando").modal('hide');
    })
}

function vistaPreviaPDF(){
    // se deben cargar los datos del cliente

    // se deben cargar los datos de la empresa

    // se deben cargar los datos del producto
    setTimeout(() => {
        $("#datos_ingreso").hide();    
    }, 200);
    
    setTimeout(() => {
        $("#plantilla_documento").show();
    }, 200);
    
    
}


function editarPDF(){
    // se deben cargar los datos del cliente

    // se deben cargar los datos de la empresa

    // se deben cargar los datos del producto
    setTimeout(() => {
        $("#plantilla_documento").hide();    
    }, 200);
    
    setTimeout(() => {
        $("#datos_ingreso").show();
    }, 200);
    
    
}

