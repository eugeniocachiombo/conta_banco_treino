let form = document.querySelector(".needs-validation");
let select = document.querySelectorAll("select");
let fa_chevron_circle_down = document.querySelectorAll(".fa-chevron-circle-down");
let button_submit = document.querySelector("button[type='submit']");
let spinner = document.querySelector("#spinner");
let text_to_diagnostic = document.querySelector("#text_to_diagnostic");
spinner.style = "display: none";
text_to_diagnostic.innerText = "Diagnosticar";

button_submit.addEventListener("click", () => {
    spinner.style = "display: iniline; color: white";
    text_to_diagnostic.innerText = "Carregando...";
    text_to_diagnostic.style = "color: white";
    setTimeout(() => {
        ValidarComClick();
        spinner.style = "display: none";
        text_to_diagnostic.innerText = "Diagnosticar";
    }, 2000);
});

function ValidarComClick() {
    select.forEach(element => {
        if (element.checkValidity()) {
            element.classList.add("is-valid");
            fa_chevron_circle_down.forEach(element => {
                element.classList.add("d-flex");
            });
        } else {
            element.style="";
            element.classList.add("is-invalid");
            fa_chevron_circle_down.forEach(element => {
              element.classList.add("d-none");
            });
        }
    }); 
    form.classList.add("was-validated");
}