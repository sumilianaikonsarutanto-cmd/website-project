import { createGuideReply } from './chat.js';
import { formatChatDate, formatLong } from './dates.js';
import {
  appendExchange,
  focusToday,
  getState,
  selectDay,
  setDraft,
  setRoute,
  shiftVisibleMonth,
} from './store.js';
import { renderCalendar } from './views/calendar.js';
import { renderChat } from './views/chat.js';
import { renderHome } from './views/home.js';

const view = document.querySelector('#view');
const announce = document.querySelector('#announce');

function routeFromHash() {
  const raw = (location.hash || '#/').replace(/^#/, '');
  if (raw === '' || raw === '/' || raw === '/home') return 'home';
  if (raw === '/calendar' || raw.startsWith('/calendar')) return 'calendar';
  if (raw === '/chat' || raw.startsWith('/chat')) return 'chat';
  return 'home';
}

function hashFor(route) {
  if (route === 'calendar') return '#/calendar';
  if (route === 'chat') return '#/chat';
  return '#/';
}

function go(route) {
  const hash = hashFor(route);
  if (location.hash === hash || (route === 'home' && (location.hash === '' || location.hash === '#'))) {
    setRoute(route);
    render();
    return;
  }
  location.hash = hash;
}

function render(options = {}) {
  const state = getState();
  const now = new Date();
  const preserveScroll = Boolean(options.preserveScroll);
  const previousScroll = view.scrollTop;

  syncChrome(state.route);
  document.title =
    state.route === 'calendar'
      ? 'カレンダー｜うちの予定'
      : state.route === 'chat'
        ? 'チャット｜うちの予定'
        : '今日の予定｜うちの予定';

  if (state.route === 'calendar') {
    view.innerHTML = renderCalendar({
      year: state.year,
      month: state.month,
      selected: state.selected,
      events: state.events,
      now,
    });
  } else if (state.route === 'chat') {
    view.innerHTML = renderChat({ messages: state.messages, draft: state.draft });
  } else {
    view.innerHTML = renderHome({ events: state.events, now });
  }

  view.className = `view view--${state.route}`;

  if (preserveScroll) view.scrollTop = previousScroll;
  else view.scrollTop = 0;

  if (options.focusKey) {
    const target = view.querySelector(`[data-focus-key="${CSS.escape(options.focusKey)}"]`);
    if (target) target.focus();
  } else if (state.route === 'chat') {
    const input = document.querySelector('#chat-input');
    if (input) {
      resizeInput(input);
      const end = input.value.length;
      input.setSelectionRange(end, end);
      input.focus();
    }
  } else if (!preserveScroll) {
    const heading = view.querySelector('h1');
    if (heading) {
      heading.setAttribute('tabindex', '-1');
      heading.focus({ preventScroll: true });
    }
  }

  if (state.route === 'chat') {
    const log = view.querySelector('[data-messages]');
    if (log) log.scrollTop = log.scrollHeight;
  }
}

function syncChrome(route) {
  document.querySelectorAll('nav [data-route]').forEach((el) => {
    if (el.dataset.route === route) el.setAttribute('aria-current', 'page');
    else el.removeAttribute('aria-current');
  });
  const back = document.querySelector('[data-back]');
  if (back) back.hidden = route === 'home';
  const title = document.querySelector('[data-top-title]');
  if (title) title.textContent = route === 'calendar' ? 'カレンダー' : 'うちの予定';
}

function resizeInput(input) {
  input.style.height = 'auto';
  input.style.height = `${Math.min(input.scrollHeight, 140)}px`;
}

function syncSendButton() {
  const input = document.querySelector('#chat-input');
  const send = document.querySelector('#chat-send');
  if (!input || !send) return;
  send.disabled = input.value.trim() === '';
}

function say(text) {
  if (announce) announce.textContent = text;
}

document.addEventListener('click', (event) => {
  const actionEl = event.target.closest('[data-action]');
  if (!actionEl) return;
  const action = actionEl.dataset.action;

  if (action === 'today-calendar') {
    focusToday();
    go('calendar');
    return;
  }

  if (action === 'month') {
    const delta = actionEl.dataset.delta;
    shiftVisibleMonth(Number(delta));
    render({
      preserveScroll: true,
      focusKey: delta === '-1' ? 'month-prev' : 'month-next',
    });
    return;
  }

  if (action === 'select-day') {
    const date = actionEl.dataset.date;
    selectDay(date);
    render({ preserveScroll: true, focusKey: `day-${date}` });
    const count = getState().events.filter((event) => event.date === date).length;
    say(count ? `${formatLong(date)}、予定${count}件` : `${formatLong(date)}は予定がありません`);
    return;
  }

  if (action === 'add-for-day') {
    const draft = `${formatChatDate(getState().selected)} `;
    setDraft(draft);
    go('chat');
    return;
  }

  if (action === 'chip') {
    const input = document.querySelector('#chat-input');
    if (!input) return;
    input.value = actionEl.dataset.text || '';
    setDraft(input.value);
    resizeInput(input);
    syncSendButton();
    input.focus();
    const end = input.value.length;
    input.setSelectionRange(end, end);
  }
});

document.addEventListener('submit', (event) => {
  const form = event.target;
  if (!(form instanceof HTMLFormElement) || form.id !== 'chat-form') return;
  event.preventDefault();
  const input = document.querySelector('#chat-input');
  const text = input ? input.value : '';
  const sent = appendExchange(text, createGuideReply());
  if (!sent) return;
  say(createGuideReply());
  render();
});

document.addEventListener('input', (event) => {
  const target = event.target;
  if (!(target instanceof HTMLTextAreaElement) || target.id !== 'chat-input') return;
  setDraft(target.value);
  resizeInput(target);
  syncSendButton();
});

document.addEventListener('keydown', (event) => {
  const target = event.target;
  if (!(target instanceof HTMLTextAreaElement) || target.id !== 'chat-input') return;
  if (event.key !== 'Enter' || event.shiftKey || event.isComposing) return;
  event.preventDefault();
  target.form?.requestSubmit();
});

window.addEventListener('hashchange', () => {
  setRoute(routeFromHash());
  render();
});

setRoute(routeFromHash());
if (!location.hash) {
  history.replaceState(null, '', '#/');
}
render();
