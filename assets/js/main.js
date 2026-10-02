(function () {
  var nav = document.querySelector("[data-nav]");
  if (!nav) return;

  nav.querySelectorAll("a").forEach(function (link) {
    link.addEventListener("click", function () {
      nav.open = false;
    });
  });

  document.addEventListener("keydown", function (event) {
    if (event.key === "Escape") nav.open = false;
  });
})();
