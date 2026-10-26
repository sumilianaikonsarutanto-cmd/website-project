import { categoryOf } from './categories.js';
import { icon } from './icons.js';
import { isPast, isSample } from './schedule.js';

export function escapeHtml(value) {
  return String(value)
    .replaceAll('&', '&amp;')
    .replaceAll('<', '&lt;')
    .replaceAll('>', '&gt;')
    .replaceAll('"', '&quot;')
    .replaceAll("'", '&#39;');
}

export function renderEvent(event, options = {}) {
  const category = categoryOf(event.category);
  const past = options.now ? isPast(event, options.now) : false;
  const sample = isSample(event);
  const when = options.whenLabel
    ? `<p class="event__when">${escapeHtml(options.whenLabel)}</p>`
    : '';
  const pastLabel = past ? '<span class="event__past">過ぎた予定</span>' : '';
  const origin = sample
    ? '<span class="tag tag--sample">サンプル</span>'
    : '<span class="tag tag--user">登録</span>';

  return `<article class="event${past ? ' is-past' : ''}${sample ? ' is-sample' : ''}" style="--cat:${category.color};--cat-wash:${category.wash}">
    <p class="event__time">${escapeHtml(event.time)}</p>
    <div class="event__body">
      ${when}
      <div class="event__title-row">
        <h3 class="event__title">${escapeHtml(event.title)}</h3>
        ${origin}
      </div>
      <p class="event__meta">
        <span class="cat">${icon(category.icon)}<span>${escapeHtml(category.label)}</span></span>
        ${pastLabel}
      </p>
    </div>
  </article>`;
}

export function renderEmpty(title, text) {
  return `<div class="empty">
    <div class="empty__mark">${icon('leaf')}</div>
    <p class="empty__title">${escapeHtml(title)}</p>
    <p class="empty__text">${escapeHtml(text)}</p>
  </div>`;
}
