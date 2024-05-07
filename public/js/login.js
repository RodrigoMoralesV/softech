$('#login-button').click(function(){
  // Animación al hacer clic en el botón de inicio de sesión
  $('#login-button').fadeOut("slow", function(){
    $("#container").fadeIn();
    TweenMax.from("#container", .4, { scale: 0, ease:Sine.easeInOut});
    TweenMax.to("#container", .4, { scale: 1, ease:Sine.easeInOut});
  });
});

$(".close-btn").click(function(){
  // Animación al hacer clic en el botón de cierre
  TweenMax.from("#container", .4, { scale: 1, ease:Sine.easeInOut});
  TweenMax.to("#container", .4, { left:"0px", scale: 0, ease:Sine.easeInOut});
  $("#container, #forgotten-container").fadeOut(800, function(){
    $("#login-button").fadeIn(800);
  });
});

/* Contraseña Olvidada */
$('#forgotten').click(function(){
  // Animación al hacer clic en el enlace de contraseña olvidada
  $("#container").fadeOut(function(){
    $("#forgotten-container").fadeIn();
  });
});
