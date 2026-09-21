/**
 * ステルン｜共通スクリプト
 *
 * 方針：JavaScript は必要最小限。無効でもすべてのコンテンツが読める状態を保つ。
 *  1. モバイルナビ（ドロワー）
 *  2. よくあるご質問のアコーディオン
 *  3. スクロール時のフェードイン
 *  4. フッターの年号
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
      drawer.hidden = !open;
      document.body.style.overflow = open ? 'hidden' : '';
    }

    toggle.addEventListener('click', function () {
      setOpen(toggle.getAttribute('aria-expanded') !== 'true');
    });

    // メニュー内のリンクを押したら閉じる
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
    window.matchMedia('(min-width: 1080px)').addEventListener('change', function (e) {
      if (e.matches) setOpen(false);
    });
  }

  /* ----------------------------------------------------------------------
     2. よくあるご質問
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
     3. スクロール時のフェードイン
     ---------------------------------------------------------------------- */
  function initReveal() {
    var targets = document.querySelectorAll('.reveal');

    if (reduceMotion || !('IntersectionObserver' in window)) {
      targets.forEach(function (el) { el.classList.add('is-visible'); });
      return;
    }

    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (!entry.isIntersecting) return;
        entry.target.classList.add('is-visible');
        io.unobserve(entry.target);
      });
    }, { rootMargin: '0px 0px -10% 0px', threshold: 0.08 });

    targets.forEach(function (el) { io.observe(el); });
  }

  /* ----------------------------------------------------------------------
     4. フッターの年号
     ---------------------------------------------------------------------- */
  function initYear() {
    var el = document.querySelector('[data-year]');
    if (el) el.textContent = String(new Date().getFullYear());
  }

  document.addEventListener('DOMContentLoaded', function () {
    initDrawer();
    initFaq();
    initReveal();
    initYear();
  });
})();
