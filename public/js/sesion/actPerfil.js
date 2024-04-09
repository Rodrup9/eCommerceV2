const formulario = document.getElementById("formulario");
const usuario = document.getElementById("usuario");
const nombre = document.getElementById("nombre");
const apellido_pa = document.getElementById("apellido_pa");
const apellido_ma = document.getElementById("apellido_ma");
const correo = document.getElementById("correo");

formulario.addEventListener("submit", (e) => {
    e.preventDefault();
    Swal.fire({
        title: "Do you want to save the changes?",
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: "Save",
        denyButtonText: `Don't save`,
        cancelButtonText: `Cancelar`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            Swal.fire("Saved!", "", "success");
        } else if (result.isDenied) {
            Swal.fire("Changes are not saved", "", "info");
        }
    });
});
