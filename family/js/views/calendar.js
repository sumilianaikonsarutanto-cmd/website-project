import { CATEGORY_LIST, categoryOf } from '../categories.js';
import {
  WEEKDAYS,
  buildMonthCells,
  formatChatDate,
  formatLong,
  formatMonthTitle,
  todayKey,
} from '../dates.js';
import { escapeHtml, renderEmpty, renderEvent } from '../html.js';
import { icon } from '../icons.js';
import { eventsOn } from '../schedule.js';

export function renderCalendar({ year, month, selected, events, now }) {
  const today = todayKey(now);
  const cells = buildMonthCells(year, month);
  const selectedEvents = eventsOn(events, selected);
  const title = formatMonthTitle(year, month);

  const weeks = [];
  for (let index = 0; index < cells.length; index += 7) {
    weeks.push(cells.slice(index, index + 7));
  }

  const grid = weeks
    .map((week) => {
      const days = week
        .map((key) => {
          if (!key) return '<span class="day day--empty"></span>';
          const day = Number(key.slice(-2));
          const dow = new Date(year, month, day).getDay();
          const onDay = eventsOn(events, key);
          const dots = uniqueCategories(onDay)
            .slice(0, 3)
            .map((category) => {
              const meta = categoryOf(category);
              return `<i class="dot" style="--dot:${meta.color}"></i>`;
            })
            .join('');
          const more = uniqueCategories(onDay).length > 3 ? '<i class="dot dot--more"></i>' : '';
          const selectedDay = key === selected;
          const label = [
            `${month + 1}月${day}日`,
            `${WEEKDAYS[dow]}曜日`,
            key === today ? '今日' : '',
            selectedDay ? '選択中' : '',
            onDay.length ? `予定${onDay.length}件` : '予定なし',
          ]
            .filter(Boolean)
            .join(' ');
          return `<button type="button" class="day dow-${dow}${selectedDay ? ' is-selected' : ''}${key === today ? ' is-today' : ''}" data-action="select-day" data-date="${key}" data-focus-key="day-${key}" aria-pressed="${selectedDay ? 'true' : 'false'}" aria-label="${escapeHtml(label)}">
            <span class="day__num">${day}</span>
            <span class="day__marks" aria-hidden="true">${dots}${more}</span>
          </button>`;
        })
        .join('');
      return `<div class="week">${days}</div>`;
    })
    .join('');

  const weekdayHead = WEEKDAYS.map(
    (label, index) => `<span class="weekday dow-${index}">${label}</span>`,
  ).join('');

  const list = selectedEvents.length
    ? `<div class="event-list">${selectedEvents.map((event) => renderEvent(event, { now })).join('')}</div>`
    : renderEmpty('この日の予定はありません', '別の日付を選ぶと、その日の予定に切り替わります。');

  const sampleCount = selectedEvents.filter((event) => event.source === 'sample').length;
  const countLabel = selectedEvents.length
    ? `${selectedEvents.length}件${sampleCount ? `（サンプル ${sampleCount}件）` : ''}`
    : '予定なし';

  const legend = CATEGORY_LIST.map((category) => {
    return `<li><i class="dot" style="--dot:${category.color}"></i><span>${escapeHtml(category.label)}</span></li>`;
  }).join('');

  const todayMark = selected === today ? '<span class="pill">今日</span>' : '';

  return `<div class="page calendar-page">
    <div class="calendar-layout">
      <section class="month-card">
        <div class="month-nav">
          <button type="button" class="icon-btn" data-action="month" data-delta="-1" data-focus-key="month-prev" aria-label="前の月">${icon('back')}</button>
          <h1 class="month-title">${title}</h1>
          <button type="button" class="icon-btn" data-action="month" data-delta="1" data-focus-key="month-next" aria-label="次の月">${icon('chevron')}</button>
        </div>
        <div class="calendar" aria-label="${title}の予定">
          <div class="week week--head">${weekdayHead}</div>
          ${grid}
        </div>
        <ul class="legend">${legend}</ul>
      </section>
      <section class="day-sheet" id="day-panel">
        <div class="day-sheet__head">
          <h2 class="day-sheet__title">${formatLong(selected)}</h2>
          <p class="day-sheet__count">${todayMark}<span>${countLabel}</span></p>
        </div>
        ${list}
        <div class="day-sheet__add">
          <button type="button" class="btn btn--primary" data-action="add-for-day">${icon('chat')}<span>この日の予定をチャットで追加</span></button>
          <p class="day-sheet__note">${escapeHtml(formatChatDate(selected, now))}の下書きをチャットに入れます。送信しても、まだ予定には登録されません。</p>
        </div>
      </section>
    </div>
  </div>`;
}

function uniqueCategories(events) {
  const seen = [];
  for (const event of events) {
    if (!seen.includes(event.category)) seen.push(event.category);
  }
  return seen;
}
