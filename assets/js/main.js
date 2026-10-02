(function () {
  var picks = document.querySelectorAll(".fv-pick a");
  if (picks.length) {
    var syncPick = function () {
      var generated = location.hash === "#fv-generated";
      picks.forEach(function (link) {
        var on = generated
          ? link.getAttribute("href") === "#fv-generated"
          : link.getAttribute("href") === "#fv-photo";
        if (on) link.setAttribute("aria-current", "true");
        else link.removeAttribute("aria-current");
      });
    };
    window.addEventListener("hashchange", syncPick);
    syncPick();
  }

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
