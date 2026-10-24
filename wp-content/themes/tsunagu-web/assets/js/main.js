/**
 * ツナグWEB製作 — Official Site
 * 外部ライブラリなし。JS無効でも主要コンテンツは閲覧可能。
 *
 * 1. 連絡先設定（捏造しない／未設定時は送信不可）
 * 2. ヘッダー状態 / モバイルナビ
 * 3. FAQ アコーディオン
 * 4. スクロール表示
 * 5. ヒーロー入場
 * 6. 年号
 */
(function () {
  'use strict';

  /**
   * 公開前にここ（または index.html の meta[name="tsunagu:*"]）を差し替えてください。
   * 空のままではフォーム送信・電話/メール/LINEリンクは有効になりません。
   */
  var CONTACT = Object.assign(
    {
      email: '',
      tel: '',
      telDisplay: '',
      line: ''
    },
    window.TSUNAGU_CONTACT || {}
  );

  var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  function meta(name) {
    var el = document.querySelector('meta[name="' + name + '"]');
    return el ? (el.getAttribute('content') || '').trim() : '';
  }

  function resolveContact() {
    return {
      email: CONTACT.email || meta('tsunagu:email'),
      tel: CONTACT.tel || meta('tsunagu:tel'),
      telDisplay: CONTACT.telDisplay || meta('tsunagu:tel-display') || CONTACT.tel || meta('tsunagu:tel'),
      line: CONTACT.line || meta('tsunagu:line')
    };
  }

  /* ------------------------------------------------------------------
     1. Contact channels + form (only when destination exists)
     ------------------------------------------------------------------ */
  function initContact() {
    var c = resolveContact();
    var channels = document.querySelector('[data-contact-channels]');
    var empty = document.querySelector('[data-contact-empty]');
    var form = document.querySelector('[data-contact-form]');
    var status = document.querySelector('[data-form-status]');
    var hasAny = !!(c.email || c.tel || c.line);

    if (channels) {
      var html = '';
      if (c.tel) {
        html +=
          '<div class="contact__path">' +
          '<p class="contact__path-label">Phone</p>' +
          '<p><a href="tel:' +
          escapeAttr(c.tel.replace(/[^0-9+]/g, '')) +
          '">' +
          escapeHtml(c.telDisplay || c.tel) +
          '</a></p></div>';
      }
      if (c.email) {
        html +=
          '<div class="contact__path">' +
          '<p class="contact__path-label">Email</p>' +
          '<p><a href="mailto:' +
          escapeAttr(c.email) +
          '">' +
          escapeHtml(c.email) +
          '</a></p></div>';
      }
      if (c.line) {
        html +=
          '<div class="contact__path">' +
          '<p class="contact__path-label">LINE</p>' +
          '<p><a href="' +
          escapeAttr(c.line) +
          '" rel="noopener noreferrer" target="_blank">LINEで相談する</a></p></div>';
      }
      channels.innerHTML = html;
    }

    if (empty) empty.hidden = hasAny;

    if (!form) return;

    var canMail = !!c.email;
    form.classList.toggle('is-disabled', !canMail);

    form.querySelectorAll('input, select, textarea, button').forEach(function (el) {
      el.disabled = !canMail;
    });

    var submitBtn = form.querySelector('[type="submit"]');
    if (submitBtn && canMail) submitBtn.textContent = 'メールで問い合わせる';

    form.addEventListener('submit', function (e) {
      e.preventDefault();
      if (!canMail) {
        setStatus(status, 'error', '送信先メールが未設定のため送信できません。');
        return;
      }

      var name = (form.name.value || '').trim();
      var email = (form.email.value || '').trim();
      var topic = form.topic.value;
      var message = (form.message.value || '').trim();

      if (!name || !email || !topic || !message) {
        setStatus(status, 'error', '未入力の項目があります。');
        return;
      }

      var topicLabel = form.topic.options[form.topic.selectedIndex].text;
      var subject = '【ツナグWEB製作】' + topicLabel + ' / ' + name;
      var body =
        'お名前・会社名: ' +
        name +
        '\nメール: ' +
        email +
        '\nご相談内容: ' +
        topicLabel +
        '\n\n' +
        message;

      window.location.href =
        'mailto:' +
        encodeURIComponent(c.email) +
        '?subject=' +
        encodeURIComponent(subject) +
        '&body=' +
        encodeURIComponent(body);

      setStatus(
        status,
        'ok',
        'メールアプリが開きます。送信が完了するまで問い合わせは届いていません。'
      );
    });
  }

  function setStatus(el, state, text) {
    if (!el) return;
    el.dataset.state = state;
    el.textContent = text;
  }

  function escapeHtml(str) {
    return String(str)
      .replace(/&/g, '&amp;')
      .replace(/</g, '&lt;')
      .replace(/>/g, '&gt;')
      .replace(/"/g, '&quot;');
  }

  function escapeAttr(str) {
    return escapeHtml(str).replace(/'/g, '&#39;');
  }

  /* ------------------------------------------------------------------
     2. Header + drawer
     ------------------------------------------------------------------ */
  function initHeader() {
    var header = document.querySelector('[data-header]');
    if (!header) return;

    var onScroll = function () {
      header.classList.toggle('is-scrolled', window.scrollY > 24);
    };
    onScroll();
    window.addEventListener('scroll', onScroll, { passive: true });
  }

  function initDrawer() {
    var toggle = document.querySelector('[data-nav-toggle]');
    var drawer = document.querySelector('[data-drawer]');
    if (!toggle || !drawer) return;

    function setOpen(open) {
      toggle.setAttribute('aria-expanded', String(open));
      toggle.setAttribute('aria-label', open ? 'メニューを閉じる' : 'メニューを開く');
      drawer.classList.toggle('is-open', open);
      drawer.hidden = !open;
      document.body.style.overflow = open ? 'hidden' : '';
    }

    toggle.addEventListener('click', function () {
      setOpen(toggle.getAttribute('aria-expanded') !== 'true');
    });

    drawer.addEventListener('click', function (e) {
      if (e.target.closest('a')) setOpen(false);
    });

    document.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && toggle.getAttribute('aria-expanded') === 'true') {
        setOpen(false);
        toggle.focus();
      }
    });

    window.matchMedia('(min-width: 980px)').addEventListener('change', function (e) {
      if (e.matches) setOpen(false);
    });
  }

  /* ------------------------------------------------------------------
     3. FAQ
     ------------------------------------------------------------------ */
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

  /* ------------------------------------------------------------------
     4. Reveal on scroll
     ------------------------------------------------------------------ */
  function initReveal() {
    var targets = document.querySelectorAll('.reveal, .clip-reveal');
    if (reduceMotion || !('IntersectionObserver' in window)) {
      targets.forEach(function (el) {
        el.classList.add('is-visible');
      });
      return;
    }

    var io = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (!entry.isIntersecting) return;
          entry.target.classList.add('is-visible');
          io.unobserve(entry.target);
        });
      },
      { rootMargin: '0px 0px -10% 0px', threshold: 0.08 }
    );

    targets.forEach(function (el) {
      io.observe(el);
    });
  }

  /* ------------------------------------------------------------------
     5. Hero ready
     ------------------------------------------------------------------ */
  function initHero() {
    var hero = document.querySelector('[data-hero]');
    if (!hero) return;
    requestAnimationFrame(function () {
      hero.classList.add('is-ready');
    });
  }

  /* ------------------------------------------------------------------
     6. Year
     ------------------------------------------------------------------ */
  function initYear() {
    var el = document.querySelector('[data-year]');
    if (el) el.textContent = String(new Date().getFullYear());
  }

  document.addEventListener('DOMContentLoaded', function () {
    initContact();
    initHeader();
    initDrawer();
    initFaq();
    initReveal();
    initHero();
    initYear();
  });
})();
