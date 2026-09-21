/* ==========================================================================
   中房家 | main.js
   必要最小限の3機能のみ
   1. スマホのドロワーメニュー開閉
   2. スクロール時のヘッダー影
   3. セクションのフェードイン表示
   ========================================================================== */
(function () {
  'use strict';

  /* ------------------------------------------------------------------
     1. ドロワーメニュー
     ------------------------------------------------------------------ */
  var toggle = document.getElementById('navToggle');
  var nav = document.getElementById('globalNav');

  if (toggle && nav) {
    var closeNav = function () {
      nav.classList.remove('is-open');
      toggle.setAttribute('aria-expanded', 'false');
      document.body.style.removeProperty('overflow');
    };

    toggle.addEventListener('click', function () {
      var willOpen = toggle.getAttribute('aria-expanded') !== 'true';
      nav.classList.toggle('is-open', willOpen);
      toggle.setAttribute('aria-expanded', String(willOpen));
      // ドロワー表示中は背面のスクロールを止める
      document.body.style.overflow = willOpen ? 'hidden' : '';
    });

    // メニュー内リンクをタップしたら閉じる
    nav.addEventListener('click', function (event) {
      if (event.target.closest('a')) { closeNav(); }
    });

    document.addEventListener('keydown', function (event) {
      if (event.key === 'Escape' && nav.classList.contains('is-open')) {
        closeNav();
        toggle.focus();
      }
    });

    // PC幅に広げたときに開いた状態が残らないようにする
    window.matchMedia('(min-width: 1024px)').addEventListener('change', function (event) {
      if (event.matches) { closeNav(); }
    });
  }

  /* ------------------------------------------------------------------
     2. ヘッダーの影
     ------------------------------------------------------------------ */
  var header = document.getElementById('header');

  if (header) {
    var syncHeader = function () {
      header.classList.toggle('is-scrolled', window.scrollY > 8);
    };
    syncHeader();
    window.addEventListener('scroll', syncHeader, { passive: true });
  }

  /* ------------------------------------------------------------------
     3. フェードイン
     アニメーション対象は JS 側でクラスを付与し、
     JS が無効な環境でも内容が読める状態を保つ
     ------------------------------------------------------------------ */
  if (!window.matchMedia('(prefers-reduced-motion: reduce)').matches && 'IntersectionObserver' in window) {
    var targets = document.querySelectorAll(
      '.section .label, .section .heading, .section .lead, .about__media, .reason, .tanzaku, .menu__photos, .lunch__photo, .lunch__text, .night__grid, .scene, .voices__list li, .access__grid, .faq__list, .final-cta__title, .final-cta__lead, .final-cta__actions'
    );

    var observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (!entry.isIntersecting) { return; }
        entry.target.classList.add('is-visible');
        observer.unobserve(entry.target);
      });
    }, { rootMargin: '0px 0px -8% 0px', threshold: 0.08 });

    targets.forEach(function (el) {
      el.classList.add('reveal');
      observer.observe(el);
    });
  }
})();
