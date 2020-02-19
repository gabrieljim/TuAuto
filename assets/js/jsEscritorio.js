$(document).ready(() => {
  $(".tarjeta").click(e => {
    $(".tarjeta").removeClass("tarjeta-activa");
    let tarjeta = $(e.target);
    let descripcion = tarjeta.attr("data-tipo");

    tarjeta.addClass("tarjeta-activa");

    $("#rellenar-datos").attr("data-tipo", descripcion);
  });

  function getForm(tipo_usuario) {
    return $.post(
      "/usuario/generateUserForm.php",
      { tipo_usuario },
      res => res
    );
  }

  $("#send-user-type").click(async () => {
    let tipo_usuario = $("#rellenar-datos").attr("data-tipo");
    if (tipo_usuario) {
      let form = await getForm(tipo_usuario);
      $("#rellenar-datos").html(form);
    } else {
      alert("¡Selecciona un tipo de usuario!");
    }
  });
});
