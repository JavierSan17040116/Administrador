$(document).ready(inicio);
$(document).ready(inicio2);


function inicio(){
    $("#cambiarimg").mouseenter(onCambiarImagen);
    $("#cambiarimg").mouseleave(onRegresarImagen);

    }
function onCambiarImagen(){
    $("#cambiarimg").css("background-image","url(public/assets/img/photos/index.jpg");
}
function onRegresarImagen(){
    $("#cambiarimg").css("background-image","url(public/assets/img/photos/index2.jpg");
}
function inicio2(){
    $('#show').click(function(){
        $('#error').toggle(2000);
    });
}
function cargar_pagina()
{
    alert("Ya se ha cargado el sitio web");
}

function mostrar(input)
{
  var img=document.getElementById("img");
  if(input.value=="Ocultar")
  {
      img.style.visibility="hidden";
      input.value="Mostrar"
      
  }
  else{
      img.style.visibility="visible"
      input.value="Ocultar"
  }
}




