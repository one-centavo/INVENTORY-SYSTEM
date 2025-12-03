


const btnHamburger = document.getElementById("btnHamburger")
const btnOpenFormAdd = document.getElementById("btnOpenModal");
const btnCloseFormAdd = document.getElementById("btnCloseModal");
const btnOpenModalEdit = document.getElementById("btnOpenModalEdit");
const btnCloseModalEdit = document.getElementById("btnCloseModalEdit");

function menu() {
  const nav = document.getElementById("navMenu").classList;

  if (nav.contains("translate-x-full")) {
    nav.remove("translate-x-full"); // Muestra
    document.body.style.overflowY = "hidden";
  } else {
    nav.add("translate-x-full"); // Oculta
    document.body.style.overflowY = "";
  }
}


// Funciones para el modal con formulario

function openModal(id,formId) {
  const modal = document.getElementById(id);
  const form = document.getElementById(formId);

  modal.classList.remove("hidden");
  modal.classList.add("flex");

  // Esperar 1 frame para permitir que Tailwind detecte el cambio de clases
  requestAnimationFrame(() => {
    form.classList.remove("translate-y-10", "opacity-0");
  });

  document.body.style.overflowY = "hidden";
}


function closeModal(id,formId) {
  const modal = document.getElementById(id);
  const form = document.getElementById(formId);

  form.classList.add("translate-y-10", "opacity-0");

  setTimeout(() => {
    modal.classList.add("hidden");
    modal.classList.remove("flex");
  }, 300);

  document.body.style.overflowY = "";
}

btnOpenFormAdd?.addEventListener("click", () => openModal("modal","modalForm"));
btnCloseFormAdd?.addEventListener("click", () => closeModal("modal","modalForm"));
btnHamburger?.addEventListener("click", menu);
btnOpenModalEdit?.addEventListener("click", () => openModal("modalEdit","modalFormEdit"));
btnCloseModalEdit?.addEventListener("click", () => closeModal("modalEdit","modalFormEdit"));