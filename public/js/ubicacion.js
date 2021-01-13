    function cargarRegiones(){
        $.ajax({
            type: "GET",
            url: '/obtenerRegiones', 
            data: { }
        }).done(function( msg ) {
            console.log( msg );
        });


    }

    
    function getProvinciasRegion(){
        alert("region seleccionada "+ $("#region").val());
        $.ajax({
            type: "GET",
            url: '/obtenerProvincias', 
            data: {}
        }).done(function( msg ) {
            console.log( msg );
        });

        var newOptions = {"Option 1": "value1",
        "Option 2": "value2",
        "Option 3": "value3"
        };

      /*  var $el = $("#provincia");
        $el.empty(); // remove old options
        $.each(newOptions, function(key,value) {
        $el.append($("<option></option>")
            .attr("value", value).text(key));
        });
*/


    }
 