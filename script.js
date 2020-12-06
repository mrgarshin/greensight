"use strict"

let regForm = document.querySelector(".reg-form");
regForm.onsubmit = function(event) {
    event.preventDefault();
    sendForm(regForm);
}
function sendForm(form) {
    let formData = new FormData(form);
    fetch("reg_obr.php", { 
        method: "POST",
        body: formData,
    })
        .then((response) => {
            if(response.ok){
                return response.text();
            } else {
                console.error("Ошибка HTTP: " + response.status);
            }
            })
        .then((result) => {
            if(result == "ok") {
                alert("Пользователь успешно зарегистрирован!");
                location.href = "reg.php";
            } else {
                showErrorText(result);
            }
        });
}
function showErrorText(text) {
    let p = document.querySelector(".error-text");
    p.innerHTML = text;
}




