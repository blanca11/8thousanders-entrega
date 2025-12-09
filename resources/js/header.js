document.addEventListener("DOMContentLoaded", () => {
  const menuBtn = document.querySelector(".header__menu-mobile img");
  const dropdown = document.getElementById("mobileDropdown");

  menuBtn.addEventListener("click", () => {
    dropdown.classList.toggle("show");
  });
});