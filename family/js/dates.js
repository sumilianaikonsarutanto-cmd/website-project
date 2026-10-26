/**
 * ローカル日付の扱い。
 * UTC に変換せず、YYYY-MM-DD の文字列を基準にする。
 * 月末・うるう年・年またぎは Date の暦計算に任せ、結果を検証する。
 */

export const WEEKDAYS = ['日', '月', '火', '水', '木', '金', '土'];

export function pad(n) {
  return String(n).padStart(2, '0');
}

export function toKey(date) {
  return `${date.getFullYear()}-${pad(date.getMonth() + 1)}-${pad(date.getDate())}`;
}

export function parseKey(key) {
  const match = /^(\d{4})-(\d{2})-(\d{2})$/.exec(key);
  if (!match) throw new Error(`invalid date: ${key}`);
  const year = Number(match[1]);
  const month = Number(match[2]);
  const day = Number(match[3]);
  const date = new Date(year, month - 1, day);
  if (
    date.getFullYear() !== year ||
    date.getMonth() !== month - 1 ||
    date.getDate() !== day
  ) {
    throw new Error(`invalid date: ${key}`);
  }
  return date;
}

export function todayKey(now = new Date()) {
  return toKey(now);
}

export function addDays(key, days) {
  const date = parseKey(key);
  date.setDate(date.getDate() + days);
  return toKey(date);
}

export function daysInMonth(year, monthIndex) {
  return new Date(year, monthIndex + 1, 0).getDate();
}

/** @returns {{ year: number, month: number }} month は 0 始まり */
export function shiftMonth(year, monthIndex, delta) {
  const date = new Date(year, monthIndex + delta, 1);
  return { year: date.getFullYear(), month: date.getMonth() };
}

/**
 * 選択日の「日」を、移動先の月に収める。
 * 10月31日 → 11月なら 11月30日。1月31日 → うるう年2月なら 2月29日。
 */
export function clampDateToMonth(selectedKey, year, monthIndex) {
  const selected = parseKey(selectedKey);
  const day = Math.min(selected.getDate(), daysInMonth(year, monthIndex));
  return toKey(new Date(year, monthIndex, day));
}

/** 日曜始まり。先頭と末尾の null は月外のマス。 */
export function buildMonthCells(year, monthIndex) {
  const lead = new Date(year, monthIndex, 1).getDay();
  const count = daysInMonth(year, monthIndex);
  const cells = [];
  for (let i = 0; i < lead; i += 1) cells.push(null);
  for (let day = 1; day <= count; day += 1) {
    cells.push(toKey(new Date(year, monthIndex, day)));
  }
  while (cells.length % 7 !== 0) cells.push(null);
  return cells;
}

export function formatLong(key) {
  const date = parseKey(key);
  return `${date.getFullYear()}年${date.getMonth() + 1}月${date.getDate()}日（${WEEKDAYS[date.getDay()]}）`;
}

export function formatMonthTitle(year, monthIndex) {
  return `${year}年${monthIndex + 1}月`;
}

export function formatShort(key) {
  const date = parseKey(key);
  return `${date.getMonth() + 1}月${date.getDate()}日（${WEEKDAYS[date.getDay()]}）`;
}

/** チャットの下書き用。同じ年なら「10月26日」、年が違えば年も付ける。 */
export function formatChatDate(key, now = new Date()) {
  const date = parseKey(key);
  const monthDay = `${date.getMonth() + 1}月${date.getDate()}日`;
  if (date.getFullYear() === now.getFullYear()) return monthDay;
  return `${date.getFullYear()}年${monthDay}`;
}

export function relativeDayLabel(key, today) {
  if (key === today) return '今日';
  if (key === addDays(today, 1)) return '明日';
  if (key === addDays(today, -1)) return '昨日';
  return formatShort(key);
}
