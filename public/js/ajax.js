function getDataForm(event){
    const form = event.currentTarget;
    const formData = new FormData(form);
    event.preventDefault();
    const message = form.querySelector("#message");
    const method = form.getAttribute("method") || "POST";
    const action = form.getAttribute("action");
    const config = {
        method: method,
        mode: 'cors',
        cache: 'no-cache',
        body: formData
    };

    fetch(action,config)
    .then(res => res.text())
    .then(text => {
        if (message){
            message.textContent = text;
        }
    })
    .catch(err => {
        console.error("Error: " + err.message);
    });
}

const formAdd = document.getElementById("modalForm");
if (formAdd){
    formAdd.addEventListener("submit", getDataForm);
}