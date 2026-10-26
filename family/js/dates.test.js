import assert from 'node:assert/strict';
import test from 'node:test';
import {
  addDays,
  buildMonthCells,
  clampDateToMonth,
  daysInMonth,
  parseKey,
  shiftMonth,
  toKey,
} from './dates.js';

test('月末・うるう年・年またぎの日数', () => {
  assert.equal(daysInMonth(2024, 1), 29);
  assert.equal(daysInMonth(2025, 1), 28);
  assert.equal(daysInMonth(1900, 1), 28);
  assert.equal(daysInMonth(2000, 1), 29);
  assert.equal(daysInMonth(2026, 10), 30);
  assert.equal(daysInMonth(2026, 11), 31);
});

test('月の移動は年をまたぐ', () => {
  assert.deepEqual(shiftMonth(2026, 0, -1), { year: 2025, month: 11 });
  assert.deepEqual(shiftMonth(2026, 11, 1), { year: 2027, month: 0 });
  assert.deepEqual(shiftMonth(2026, 9, 0), { year: 2026, month: 9 });
});

test('日の加算は月と年をまたぐ', () => {
  assert.equal(addDays('2026-12-31', 1), '2027-01-01');
  assert.equal(addDays('2026-01-01', -1), '2025-12-31');
  assert.equal(addDays('2026-03-01', -1), '2026-02-28');
  assert.equal(addDays('2024-03-01', -1), '2024-02-29');
  assert.equal(addDays('2026-10-26', 0), '2026-10-26');
});

test('存在しない日付は受け取らない', () => {
  assert.throws(() => parseKey('2025-02-29'));
  assert.throws(() => parseKey('2026-11-31'));
  assert.equal(toKey(parseKey('2024-02-29')), '2024-02-29');
});

test('選択日は移動先の月末に収まる', () => {
  assert.equal(clampDateToMonth('2026-10-31', 2026, 10), '2026-11-30');
  assert.equal(clampDateToMonth('2026-01-31', 2024, 1), '2024-02-29');
  assert.equal(clampDateToMonth('2026-01-31', 2025, 1), '2025-02-28');
  assert.equal(clampDateToMonth('2026-12-15', 2027, 0), '2027-01-15');
  assert.equal(clampDateToMonth('2026-12-31', 2027, 0), '2027-01-31');
});

test('月のマスは7の倍数で、実在する日だけが入る', () => {
  const cells = buildMonthCells(2024, 1);
  const days = cells.filter(Boolean);
  assert.equal(cells.length % 7, 0);
  assert.equal(days.length, 29);
  assert.equal(days[0], '2024-02-01');
  assert.equal(days.at(-1), '2024-02-29');
  assert.equal(cells[0] === null || cells[0].endsWith('-01'), true);

  const december = buildMonthCells(2026, 11).filter(Boolean);
  assert.equal(december.at(-1), '2026-12-31');
  const january = buildMonthCells(2027, 0).filter(Boolean);
  assert.equal(january[0], '2027-01-01');
  assert.equal(january.length, 31);
});
