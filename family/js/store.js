/**
 * 画面が読む状態。
 * 予定はメモリ上だけ。保存を足すときは events の読み書きをこのモジュールに閉じる。
 */

import { WELCOME } from './chat.js';
import { clampDateToMonth, parseKey, shiftMonth, todayKey } from './dates.js';
import { buildSampleEvents } from './sample.js';

const today = todayKey();
const todayDate = parseKey(today);

const state = {
  route: 'home',
  year: todayDate.getFullYear(),
  month: todayDate.getMonth(),
  selected: today,
  events: buildSampleEvents(today),
  messages: [
    {
      id: 'welcome',
      role: 'guide',
      text: WELCOME,
    },
  ],
  draft: '',
};

let serial = 0;

function nextId(prefix) {
  serial += 1;
  return `${prefix}-${serial}`;
}

export function getState() {
  return state;
}

export function setRoute(route) {
  state.route = route;
}

export function focusToday(now = new Date()) {
  const key = todayKey(now);
  const date = parseKey(key);
  state.year = date.getFullYear();
  state.month = date.getMonth();
  state.selected = key;
}

export function shiftVisibleMonth(delta) {
  const next = shiftMonth(state.year, state.month, delta);
  state.year = next.year;
  state.month = next.month;
  state.selected = clampDateToMonth(state.selected, next.year, next.month);
}

export function selectDay(dateKey) {
  const date = parseKey(dateKey);
  state.selected = dateKey;
  state.year = date.getFullYear();
  state.month = date.getMonth();
}

export function setDraft(text) {
  state.draft = text;
}

export function appendExchange(userText, replyText) {
  const text = userText.trim();
  if (!text) return false;
  state.messages.push({ id: nextId('user'), role: 'user', text });
  state.messages.push({ id: nextId('guide'), role: 'guide', text: replyText });
  state.draft = '';
  return true;
}
