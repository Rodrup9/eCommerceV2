const dropdowns = document.querySelectorAll(".dropdown");
const form = document.querySelector(".menuForm");

dropdowns.forEach((dropdown) => {
    const select = dropdown.querySelector(".select");
    const caret = dropdown.querySelector(".caret");
    const menu = dropdown.querySelector(".menu");
    const options = dropdown.querySelector(".menu li");
    const selected = dropdown.querySelector(".clikeao");

    select.addEventListener("click", () => {
        select.classList.toggle("select-clicked");
        caret.classList.toggle("caret-rotate");
        menu.classList.toggle("menu-open");
    });

    // options.forEach(option => {
    //     option.addEventListener('click', () => {
    //         selected.innText = option.innerText
    //         select.classList.remove('select-clicked')
    //         caret.classList.remove('caret-rotate')
    //         menu.classList.remove('menu-open')
    //         options.forEach(option => {
    //             option.classList.remove('active')
    //         })
    //         option.classList.add('active')
    //     })
    // })
});

form.addEventListener("submit", (e) => {
    e.preventDefault();

    Swal.fire({
        icon: "question",
        title: "¿Deseas cerrar sesión cerrar sesión?",
        showDenyButton: false,
        showCancelButton: true,
        allowOutsideClick: false,
        confirmButtonText: "Aceptar",
        cancelButtonText: "Cancelar",
        confirmButtonColor: "#d99923",
        cancelButtonColor: "#343532",
        customClass: {
            popup: "containerModal",
            title: "containerModal",
            confirmButton: "btnText btnConfirm",
            cancelButton: "btnText btnCancel",
        },
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: "Sesión cerrada correctamente",
                icon: "success",
                customClass: {
                    popup: "containerModal",
                    title: "containerModal",
                },
                showConfirmButton: false
            });
            setTimeout(function() {
                form.submit();
            }, 1000);
            
        } else {
            Swal.fire({
                title: "Fallo al cerrar sesión",
                text: "Intentelo nuevamente más tarde",
                icon: "error",
                customClass: {
                    popup: "containerModal",
                    title: "containerModal",
                },
            });
        }
    });
});
