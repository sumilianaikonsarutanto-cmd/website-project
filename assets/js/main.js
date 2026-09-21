/**
 * ハッピーペイントホーム（白井工業）
 * 共通スクリプト（index.html / works.html で共用）
 *
 * 方針：JavaScript は必要最小限。無効でもコンテンツは読める状態を保つ。
 *  1. モバイルナビ（ドロワー）
 *  2. よくある質問のアコーディオン
 *  3. スクロール時のフェードイン
 *  4. 料金分布バーのアニメーション
 *  5. 施工事例の地域フィルター
 *  6. フッターの年号
 */
(function () {
  'use strict';

  var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  /* ----------------------------------------------------------------------
     1. モバイルナビ
     ---------------------------------------------------------------------- */
  function initDrawer() {
    var toggle = document.querySelector('[data-nav-toggle]');
    var drawer = document.querySelector('[data-drawer]');
    if (!toggle || !drawer) return;

    function setOpen(open) {
      toggle.setAttribute('aria-expanded', String(open));
      drawer.classList.toggle('is-open', open);
      drawer.hidden = !open;
      document.body.style.overflow = open ? 'hidden' : '';
    }

    toggle.addEventListener('click', function () {
      setOpen(toggle.getAttribute('aria-expanded') !== 'true');
    });

    // メニュー内リンクを押したら閉じる
    drawer.addEventListener('click', function (e) {
      if (e.target.closest('a')) setOpen(false);
    });

    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && toggle.getAttribute('aria-expanded') === 'true') {
        setOpen(false);
        toggle.focus();
      }
    });

    // PC 幅に戻したときに状態をリセット
    window.matchMedia('(min-width: 1000px)').addEventListener('change', function (e) {
      if (e.matches) setOpen(false);
    });
  }

  /* ----------------------------------------------------------------------
     2. よくある質問のアコーディオン
     ---------------------------------------------------------------------- */
  function initFaq() {
    document.querySelectorAll('[data-faq-q]').forEach(function (btn) {
      var panel = document.getElementById(btn.getAttribute('aria-controls'));
      if (!panel) return;

      btn.addEventListener('click', function () {
        var open = btn.getAttribute('aria-expanded') !== 'true';
        btn.setAttribute('aria-expanded', String(open));
        panel.dataset.open = String(open);
      });
    });
  }

  /* ----------------------------------------------------------------------
     3. スクロール時のフェードイン ＋ 4. 料金バー
     ---------------------------------------------------------------------- */
  function initReveal() {
    var targets = document.querySelectorAll('.reveal');
    var bars = document.querySelectorAll('[data-bar]');

    function fillBars() {
      bars.forEach(function (bar) {
        bar.style.setProperty('--w', bar.dataset.bar + '%');
      });
    }

    if (reduceMotion || !('IntersectionObserver' in window)) {
      targets.forEach(function (el) { el.classList.add('is-visible'); });
      fillBars();
      return;
    }

    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (!entry.isIntersecting) return;
        entry.target.classList.add('is-visible');
        if (entry.target.hasAttribute('data-bar-group')) fillBars();
        io.unobserve(entry.target);
      });
    }, { rootMargin: '0px 0px -12% 0px', threshold: 0.08 });

    targets.forEach(function (el) { io.observe(el); });

    // 料金バーがフェード対象外の場所にあっても動くように保険をかける
    var barGroup = document.querySelector('[data-bar-group]');
    if (barGroup && !barGroup.classList.contains('reveal')) io.observe(barGroup);
  }

  /* ----------------------------------------------------------------------
     5. 施工事例の地域フィルター（works.html）
     ---------------------------------------------------------------------- */
  function initWorksFilter() {
    var filter = document.querySelector('[data-filter]');
    if (!filter) return;

    var items = Array.prototype.slice.call(document.querySelectorAll('[data-area]'));
    var counter = document.querySelector('[data-filter-count]');
    var empty = document.querySelector('[data-filter-empty]');

    filter.addEventListener('click', function (e) {
      var btn = e.target.closest('[data-filter-value]');
      if (!btn) return;

      var value = btn.dataset.filterValue;
      filter.querySelectorAll('[data-filter-value]').forEach(function (b) {
        b.setAttribute('aria-pressed', String(b === btn));
      });

      var shown = 0;
      items.forEach(function (item) {
        var match = value === 'all' || item.dataset.area === value;
        item.hidden = !match;
        if (match) shown++;
      });

      if (counter) counter.textContent = String(shown);
      if (empty) empty.hidden = shown !== 0;
    });
  }

  /* ----------------------------------------------------------------------
     6. フッターの年号
     ---------------------------------------------------------------------- */
  function initYear() {
    var el = document.querySelector('[data-year]');
    if (el) el.textContent = String(new Date().getFullYear());
  }

  document.addEventListener('DOMContentLoaded', function () {
    initDrawer();
    initFaq();
    initReveal();
    initWorksFilter();
    initYear();
  });
})();
