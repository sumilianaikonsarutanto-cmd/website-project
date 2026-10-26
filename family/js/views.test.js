import assert from 'node:assert/strict';
import test from 'node:test';
import { SUGGESTIONS, WELCOME } from './chat.js';
import { renderCalendar } from './views/calendar.js';
import { renderChat } from './views/chat.js';
import { renderHome } from './views/home.js';

const sampleDay = [
  { id: '1', title: '燃えるゴミ', date: '2026-10-26', time: '08:00', category: 'trash', source: 'sample' },
  { id: '2', title: '歯医者', date: '2026-10-26', time: '10:00', category: 'hospital', source: 'sample' },
  { id: '3', title: '買い物', date: '2026-10-26', time: '18:00', category: 'shopping', source: 'sample' },
  { id: '4', title: '電気代の支払い', date: '2026-10-27', time: '09:00', category: 'payment', source: 'user' },
];

test('ホームは今日の予定・操作・サンプルの印を出す', () => {
  const html = renderHome({ events: sampleDay, now: new Date(2026, 9, 26, 9, 30) });
  assert.match(html, /今日の予定/);
  assert.match(html, /2026年10月26日（月）/);
  assert.match(html, /燃えるゴミ/);
  assert.match(html, /歯医者/);
  assert.match(html, /買い物/);
  assert.match(html, /ゴミ出し/);
  assert.match(html, /病院・通院/);
  assert.match(html, /サンプル/);
  assert.match(html, /登録/);
  assert.match(html, /次の予定/);
  assert.match(html, /近日の予定/);
  assert.match(html, /チャットで予定を追加/);
  assert.match(html, /カレンダーを開く/);
  assert.match(html, /過ぎた予定/);
});

test('予定がない日は空の案内を出す', () => {
  const html = renderHome({ events: [], now: new Date(2026, 9, 26, 9, 0) });
  assert.match(html, /今日の予定はありません/);
  assert.match(html, /このあとの予定はありません/);
  assert.match(html, /近日中の予定はありません/);
  assert.doesNotMatch(html, /サンプルの予定を表示しています/);
});

test('カレンダーは月送りと選択日、空の日、凡例を持つ', () => {
  const leap = renderCalendar({
    year: 2024,
    month: 1,
    selected: '2024-02-29',
    events: [
      { id: 'u', title: 'うるう日の片付け', date: '2024-02-29', time: '09:00', category: 'other', source: 'sample' },
    ],
    now: new Date(2024, 1, 29, 8, 0),
  });
  assert.match(leap, /2024年2月/);
  assert.match(leap, /data-date="2024-02-29"/);
  assert.match(leap, /うるう日の片付け/);
  assert.match(leap, /aria-label="前の月"/);
  assert.match(leap, /aria-label="次の月"/);
  assert.match(leap, /ゴミ出し/);
  assert.match(leap, /病院・通院/);
  assert.match(leap, /買い物/);
  assert.match(leap, /支払い/);
  assert.match(leap, /その他/);
  assert.doesNotMatch(leap, /data-date="2024-02-30"/);

  const empty = renderCalendar({
    year: 2027,
    month: 0,
    selected: '2027-01-15',
    events: [],
    now: new Date(2026, 11, 31, 12, 0),
  });
  assert.match(empty, /2027年1月/);
  assert.match(empty, /data-date="2027-01-01"/);
  assert.match(empty, /data-date="2027-01-31"/);
  assert.match(empty, /この日の予定はありません/);
  assert.match(empty, /この日の予定をチャットで追加/);
});

test('チャットは案内と入力例を出し、文章をそのまま表示する', () => {
  const html = renderChat({
    messages: [
      { id: 'w', role: 'guide', text: WELCOME },
      { id: 'u', role: 'user', text: '<script>alert(1)</script>' },
    ],
    draft: '明日、買い物に行く',
  });
  assert.match(html, /こんにちは！予定の登録や確認をお手伝いします。登録したい予定を入力してください。/);
  for (const suggestion of SUGGESTIONS) {
    assert.match(html, new RegExp(suggestion.replace(/[.*+?^${}()|[\]\\]/g, '\\$&')));
  }
  assert.match(html, /&lt;script&gt;alert\(1\)&lt;\/script&gt;/);
  assert.doesNotMatch(html, /<script>alert/);
  assert.match(html, /明日、買い物に行く/);
  assert.match(html, /自動で予定を読み取る機能は、次の開発段階で追加します/);
});
