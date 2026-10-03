(function () {
  var body = document.body;
  var accepting = body.getAttribute("data-accepting-new") === "true";

  if (accepting) {
    document.querySelectorAll("[data-when='paused']").forEach(function (el) {
      el.hidden = true;
    });
    document.querySelectorAll("[data-when='open']").forEach(function (el) {
      el.hidden = false;
    });
    document.querySelectorAll("[data-cta='primary'], [data-cta='dock']").forEach(function (el) {
      el.setAttribute("href", "#contact");
    });
    var status = document.getElementById("status");
    if (status) status.hidden = true;
  }

  var toggle = document.querySelector("[data-nav-toggle]");
  var drawer = document.getElementById("drawer");

  function setNav(open) {
    if (!toggle || !drawer) return;
    drawer.hidden = !open;
    toggle.setAttribute("aria-expanded", open ? "true" : "false");
    toggle.setAttribute("aria-label", open ? "メニューを閉じる" : "メニューを開く");
    document.body.classList.toggle("nav-open", open);
  }

  if (toggle && drawer) {
    toggle.addEventListener("click", function () {
      setNav(drawer.hidden);
    });
    drawer.querySelectorAll("a").forEach(function (link) {
      link.addEventListener("click", function () {
        setNav(false);
      });
    });
    document.addEventListener("keydown", function (event) {
      if (event.key === "Escape") setNav(false);
    });
    window.addEventListener("resize", function () {
      if (window.innerWidth >= 1120) setNav(false);
    });
  }

  var nodes = Array.prototype.slice.call(document.querySelectorAll(".reveal"));
  var reduce = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  if (reduce || !("IntersectionObserver" in window)) {
    nodes.forEach(function (node) { node.classList.add("is-in"); });
    return;
  }

  var observer = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
      if (!entry.isIntersecting) return;
      entry.target.classList.add("is-in");
      observer.unobserve(entry.target);
    });
  }, { threshold: 0.14, rootMargin: "0px 0px -6% 0px" });

  nodes.forEach(function (node) { observer.observe(node); });
})();
