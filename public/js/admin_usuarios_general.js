const url_prev = location.origin + window.location.pathname;

$("#a_mi_empresa").click(function () {
    $("#div_nuevos_usuarios").hide();
    $("#div_mi_empresa").show();
    document.getElementById("a_mi_empresa").classList.remove('btn-primary');
    document.getElementById("a_usuarios").classList.remove('btn-primary');
    
    document.getElementById("a_mi_empresa").classList.remove('btn-light');
    document.getElementById("a_usuarios").classList.remove('btn-light');
    
    //document.getElementById("a_mi_empresa").classList.add('btn-light');
    document.getElementById("a_usuarios").classList.add('btn-light');
    
    document.getElementById("a_mi_empresa").classList.remove('active');
    document.getElementById("a_usuarios").classList.remove('active');

    document.getElementById("a_mi_empresa").classList.add('btn-primary');
	document.getElementById("a_mi_empresa").classList.add('active');


    
	  
});


$("#a_usuarios").click(function () {
    $("#div_mi_empresa").hide();
    $("#div_nuevos_usuarios").show();
    document.getElementById("a_mi_empresa").classList.remove('btn-primary');
    document.getElementById("a_usuarios").classList.remove('btn-primary');
    
    document.getElementById("a_mi_empresa").classList.remove('btn-light');
    document.getElementById("a_usuarios").classList.remove('btn-light');
    
    document.getElementById("a_mi_empresa").classList.add('btn-light');
    //document.getElementById("a_usuarios").classList.add('btn-light');
    
    document.getElementById("a_mi_empresa").classList.remove('active');
    document.getElementById("a_usuarios").classList.remove('active');

    document.getElementById("a_usuarios").classList.add('btn-primary');
	document.getElementById("a_usuarios").classList.add('active');


    
	  
});


$("#form_mi_empresa").on("submit", function (e) {
	//do your form submission logic here
    e.preventDefault();
    alert("Funcionalidad en desarrollo...");
});
  
$("#form_nuevos_usuarios").on("submit", function (e) {
	//do your form submission logic here
    e.preventDefault();
    alert("Funcionalidad en desarrollo...");
});