(function () {
  var root = document.documentElement;
  root.classList.add("js");

  var toggle = document.querySelector("[data-nav-toggle]");
  var drawer = document.querySelector("[data-drawer]");
  var year = document.querySelector("[data-year]");
  var form = document.querySelector("[data-demo-form]");

  if (year) year.textContent = String(new Date().getFullYear());

  function setDrawer(open) {
    if (!toggle || !drawer) return;
    toggle.setAttribute("aria-expanded", open ? "true" : "false");
    drawer.hidden = !open;
    document.body.classList.toggle("is-drawer-open", open);
    var label = toggle.querySelector(".sr-only");
    if (label) label.textContent = open ? "メニューを閉じる" : "メニューを開く";
    if (open) {
      var first = drawer.querySelector("a");
      if (first) first.focus();
    }
  }

  if (toggle && drawer) {
    toggle.addEventListener("click", function () {
      setDrawer(toggle.getAttribute("aria-expanded") !== "true");
    });

    drawer.querySelectorAll("a").forEach(function (link) {
      link.addEventListener("click", function () {
        setDrawer(false);
      });
    });

    document.addEventListener("keydown", function (event) {
      if (event.key === "Escape") setDrawer(false);
    });
  }

  if (form) {
    form.addEventListener("submit", function (event) {
      event.preventDefault();
      var result = form.querySelector("[data-form-result]");
      if (!result) return;
      result.hidden = false;
      result.textContent = "これはデモです。送信は行われていません。ご相談は 06-6329-2222 まで。";
      result.scrollIntoView({ block: "nearest" });
    });
  }

  var reduce = window.matchMedia("(prefers-reduced-motion: reduce)").matches;
  if (reduce || !("IntersectionObserver" in window)) return;

  var nodes = document.querySelectorAll(".reveal");
  if (!nodes.length) return;

  var observer = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
      if (!entry.isIntersecting) return;
      entry.target.classList.add("is-in");
      observer.unobserve(entry.target);
    });
  }, { rootMargin: "0px 0px -8% 0px", threshold: 0.12 });

  nodes.forEach(function (node) { observer.observe(node); });
})();
