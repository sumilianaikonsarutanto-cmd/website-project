import assert from 'node:assert/strict';
import test from 'node:test';
import { CATEGORIES } from './categories.js';
import { buildSampleEvents } from './sample.js';
import { eventsBetween, eventsOn, isSample, pickNext } from './schedule.js';
import { parseKey, shiftMonth } from './dates.js';

test('サンプルは登録データと区別でき、分類がそろっている', () => {
  const events = buildSampleEvents('2026-10-26');
  const ids = new Set();
  for (const event of events) {
    assert.equal(isSample(event), true);
    assert.equal(event.source, 'sample');
    assert.ok(CATEGORIES[event.category]);
    assert.match(event.date, /^\d{4}-\d{2}-\d{2}$/);
    assert.match(event.time, /^\d{2}:\d{2}$/);
    assert.equal(ids.has(event.id), false);
    ids.add(event.id);
  }
  assert.deepEqual(
    eventsOn(events, '2026-10-26').map((event) => event.title),
    ['燃えるゴミ', '歯医者', '買い物'],
  );
});

test('サンプルは前後の月にも目印を置く', () => {
  const today = '2026-03-01';
  const events = buildSampleEvents(today);
  const base = parseKey(today);
  const prev = shiftMonth(base.getFullYear(), base.getMonth(), -1);
  const next = shiftMonth(base.getFullYear(), base.getMonth(), 1);
  assert.ok(events.some((event) => event.date.startsWith(`${prev.year}-${String(prev.month + 1).padStart(2, '0')}`)));
  assert.ok(events.some((event) => event.date.startsWith(`${next.year}-${String(next.month + 1).padStart(2, '0')}`)));
});

test('次の予定は日付と時刻をまたいで選べる', () => {
  const events = [
    { id: 'a', title: '大晦日', date: '2026-12-31', time: '23:00', category: 'other', source: 'sample' },
    { id: 'b', title: '元日', date: '2027-01-01', time: '00:30', category: 'other', source: 'user' },
  ];
  assert.equal(pickNext(events, new Date(2026, 11, 31, 22, 0)).id, 'a');
  assert.equal(pickNext(events, new Date(2026, 11, 31, 23, 0)).id, 'a');
  assert.equal(pickNext(events, new Date(2026, 11, 31, 23, 30)).id, 'b');
  assert.equal(isSample(events[1]), false);

  const between = eventsBetween(events, '2026-12-31', '2027-01-01');
  assert.equal(between.length, 2);
  assert.equal(eventsBetween(events, '2027-01-02', '2027-01-03').length, 0);
});
