(function () {
  var header = document.querySelector(".header");
  var burger = document.querySelector(".burger");
  var nav = document.getElementById("nav");

  function onScroll() {
    if (!header) return;
    header.classList.toggle("is-scrolled", window.scrollY > 8);
  }
  onScroll();
  window.addEventListener("scroll", onScroll, { passive: true });

  function closeNav() {
    if (!nav || !burger) return;
    nav.classList.remove("is-open");
    burger.setAttribute("aria-expanded", "false");
  }

  if (burger && nav) {
    burger.addEventListener("click", function () {
      var open = nav.classList.toggle("is-open");
      burger.setAttribute("aria-expanded", open ? "true" : "false");
    });
    nav.querySelectorAll("a").forEach(function (a) {
      a.addEventListener("click", closeNav);
    });
    document.addEventListener("keydown", function (e) {
      if (e.key === "Escape") closeNav();
    });
  }

  document.querySelectorAll("[data-ba]").forEach(function (root) {
    var range = root.querySelector("input[type=range]");
    var clip = root.querySelector(".ba__clip");
    var before = clip && clip.querySelector("img");
    if (!range || !clip) return;

    function set(v) {
      var n = Math.max(0, Math.min(100, Number(v)));
      clip.style.width = n + "%";
      root.style.setProperty("--pos", n + "%");
    }
    function syncImage() {
      if (!before) return;
      before.style.width = root.clientWidth + "px";
      before.style.height = root.clientHeight + "px";
    }
    range.addEventListener("input", function () { set(range.value); });
    window.addEventListener("resize", syncImage);
    syncImage();
    set(range.value);
  });

  var nodes = document.querySelectorAll(".reveal");
  if (!nodes.length || !("IntersectionObserver" in window)) {
    nodes.forEach(function (el) { el.classList.add("is-in"); });
    return;
  }
  if (window.matchMedia("(prefers-reduced-motion: reduce)").matches) {
    nodes.forEach(function (el) { el.classList.add("is-in"); });
    return;
  }
  var io = new IntersectionObserver(function (entries) {
    entries.forEach(function (entry) {
      if (entry.isIntersecting) {
        entry.target.classList.add("is-in");
        io.unobserve(entry.target);
      }
    });
  }, { threshold: 0.12, rootMargin: "0px 0px -8% 0px" });
  nodes.forEach(function (el) { io.observe(el); });
})();
