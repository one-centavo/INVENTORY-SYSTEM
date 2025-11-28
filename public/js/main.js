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

let btnHamburger = document.getElementById("btnHamburger")
if(btnHamburger){
  btnHamburger.addEventListener("click", menu);
}
