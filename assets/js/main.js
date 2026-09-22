/* 新樹園
   今週の入荷は、店舗で確認できた実在の植物だけを追加する。
   価格・在庫保証・架空の商品名は入れない。
   配列が空のあいだは、HTML側の「見本」を表示する。

   追加例:
   {
     name: "植物名",
     note: "ひとこと",
     arrived: "9月22日入荷",
     image: "assets/img/arrivals/example.webp",
     alt: "写真の説明"
   }
*/
const newArrivals = [];

(function () {
  const toggle = document.querySelector("[data-nav-toggle]");
  const drawer = document.querySelector("[data-drawer]");

  function closeNav() {
    if (!drawer || !toggle) return;
    drawer.hidden = true;
    toggle.setAttribute("aria-expanded", "false");
    document.body.classList.remove("nav-open");
    const label = toggle.querySelector(".sr-only");
    if (label) label.textContent = "メニューを開く";
  }

  function openNav() {
    drawer.hidden = false;
    toggle.setAttribute("aria-expanded", "true");
    document.body.classList.add("nav-open");
    const first = drawer.querySelector("a");
    if (first) first.focus();
  }

  if (toggle && drawer) {
    const toggleLabel = toggle.querySelector(".sr-only");

    function setToggleLabel(open) {
      if (toggleLabel) toggleLabel.textContent = open ? "メニューを閉じる" : "メニューを開く";
    }

    toggle.addEventListener("click", () => {
      const expanded = toggle.getAttribute("aria-expanded") === "true";
      if (expanded) closeNav();
      else {
        openNav();
        setToggleLabel(true);
      }
    });

    drawer.addEventListener("click", (event) => {
      if (event.target.closest("a")) closeNav();
    });

    document.addEventListener("keydown", (event) => {
      if (event.key === "Escape") closeNav();
    });

    window.addEventListener("resize", () => {
      if (window.innerWidth >= 1024) closeNav();
    });
  }

  const list = document.querySelector("[data-arrivals]");
  if (list && Array.isArray(newArrivals) && newArrivals.length > 0) {
    const esc = (value) =>
      String(value ?? "")
        .replace(/&/g, "&amp;")
        .replace(/</g, "&lt;")
        .replace(/>/g, "&gt;")
        .replace(/"/g, "&quot;");

    list.classList.add("arrival-scroll");
    list.innerHTML = newArrivals
      .map((item) => {
        const media = item.image
          ? `<img src="${esc(item.image)}" alt="${esc(item.alt || item.name)}" width="640" height="480" loading="lazy">`
          : `<div class="arrival__photo" aria-hidden="true">写真</div>`;
        return `<article class="arrival">
          ${media}
          <div class="arrival__body">
            <h3>${esc(item.name)}</h3>
            ${item.note ? `<p>${esc(item.note)}</p>` : ""}
            ${item.arrived ? `<p class="arrival__date">${esc(item.arrived)}</p>` : ""}
          </div>
        </article>`;
      })
      .join("");
  }
})();
