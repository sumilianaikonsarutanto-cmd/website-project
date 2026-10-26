import {
  WEEKDAYS,
  addDays,
  formatLong,
  formatShort,
  relativeDayLabel,
  todayKey,
} from '../dates.js';
import { icon } from '../icons.js';
import { renderEmpty, renderEvent } from '../html.js';
import { eventsBetween, eventsOn, groupByDate, pickNext } from '../schedule.js';

const HORIZON_DAYS = 14;

export function renderHome({ events, now }) {
  const today = todayKey(now);
  const todays = eventsOn(events, today);
  const next = pickNext(events, now);
  const laterNext = next && next.date !== today ? next : null;
  const upcoming = eventsBetween(events, addDays(today, 1), addDays(today, HORIZON_DAYS))
    .filter((event) => !laterNext || event.id !== laterNext.id);
  const date = formatLong(today);
  const monthLabel = `${now.getMonth() + 1}月`;
  const dayNum = String(now.getDate());
  const weekday = WEEKDAYS[now.getDay()];

  const todayBlock = todays.length
    ? `<div class="event-list">${todays
        .map((event) =>
          renderEvent(event, {
            now,
            whenLabel: next && event.id === next.id ? '次の予定' : '',
          }),
        )
        .join('')}</div>`
    : renderEmpty(
        '今日の予定はありません',
        'ゴミ出しや通院は、チャットから追加できるようになります。',
      );

  const nextBlock = laterNext
    ? renderEvent(laterNext, {
        now,
        whenLabel: groupTitle(laterNext.date, today),
      })
    : next
      ? ''
      : renderEmpty('このあとの予定はありません', '近日の予定が入ると、ここにいちばん近い予定が出ます。');

  const upcomingBlock = upcoming.length
    ? groupByDate(upcoming)
        .map(
          (group) => `<section class="day-group">
            <h3 class="day-group__title">${groupTitle(group.date, today)}</h3>
            <div class="event-list">${group.events.map((event) => renderEvent(event, { now })).join('')}</div>
          </section>`,
        )
        .join('')
    : renderEmpty('近日中の予定はありません', 'あさって以降の予定が、日付ごとに並びます。');

  const hasSample = events.some((event) => event.source === 'sample');
  const sampleNote = hasSample
    ? `<p class="sample-note">サンプルの予定を表示しています。登録した予定には「サンプル」の印は付きません。</p>`
    : '';

  return `<div class="page home">
    <section class="hero" aria-label="${date}">
      <div>
        <p class="hero__month">${monthLabel}</p>
        <p class="hero__day">${dayNum}</p>
        <p class="hero__full">${date}</p>
      </div>
      <div class="hero__side">
        <p class="hero__seal">${weekday}</p>
        <p class="hero__count">今日 ${todays.length}件</p>
      </div>
    </section>
    ${sampleNote}
    <section class="block">
      <h1 class="section-label">今日の予定</h1>
      ${todayBlock}
    </section>
    <div class="actions">
      <a class="btn btn--primary" href="#/chat">${icon('chat')}<span>チャットで予定を追加</span></a>
      <button class="btn btn--ghost" type="button" data-action="today-calendar">${icon('calendar')}<span>カレンダーを開く</span></button>
    </div>
    ${
      nextBlock
        ? `<section class="block">
      <h2 class="section-label">次の予定</h2>
      ${nextBlock}
    </section>`
        : ''
    }
    ${
      upcoming.length || !laterNext
        ? `<section class="block">
      <h2 class="section-label">近日の予定<span>今日から${HORIZON_DAYS}日</span></h2>
      ${upcomingBlock}
    </section>`
        : ''
    }
  </div>`;
}

function groupTitle(date, today) {
  const short = formatShort(date);
  const relative = relativeDayLabel(date, today);
  if (relative === short) return short;
  return `${relative}・${short}`;
}
