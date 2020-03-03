let modalTipo = $("#modal-tipo");
let contenedorBoton = $(".button-container");
let formaPublicar = $("#forma-publicar");

$("#boton-modal").click(() => modalTipo.modal());

formaPublicar.on("submit", function(e) {
  e.preventDefault();
  modalTipo.modal();
  $("#button-confirm").on("click", enviarForma);
});

function enviarForma(e) {
  $.busyLoadFull("show");
  const publicationType = $(".activo-mano")
    .first()
    .attr("data-publication-id");
  if (!publicationType) {
    alert("¡Selecciona un tipo de publicación!");
  } else {
    const input = $("<input>")
      .attr("type", "hidden")
      .attr("name", "publicationType")
      .val(publicationType);

    formaPublicar.append(input);

    const formData = new FormData(document.getElementById("forma-publicar"));

    $.ajax({
      url: "/guardar.php",
      type: "POST",
      data: formData,
      processData: false,
      contentType: false,
      success: function() {
        location.replace("/escritorio.php");
      }
    });
  }
}

contenedorBoton.on("click", function(e) {
  let objetivo = e.target;
  $(".button-container")
    .not(objetivo)
    .removeClass("activo-mano");
  $(objetivo).toggleClass("activo-mano");
});
