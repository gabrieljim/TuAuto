$("#change-user-type").click(() => {
  const user = $("#change-user-type").attr("data-user");
  Swal.fire({
    title: "¿Seguro que quieres cambiar tu tipo de usuario?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonText: "Sí",
    cancelButtonText: "No"
  }).then(result => {
    if (result.value) {
      $.post("../../usuario/changeUserType.php", { user }, res => {
        if (res) {
          location.replace("/escritorio.php");
        } else {
          Swal.fire({
            title: "¡Hubo un error al cambiar tu usuario!",
            icon: "error"
          });
        }
      });
    }
  });
});
