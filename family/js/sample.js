/**
 * 画面確認用の見本。
 * source は必ず "sample"。家族が登録した予定（source: "user"）とは混ぜない。
 * 日付は「今日」からの相対と、前後の月の固定日で作り、いつ開いても月送りの目印が出るようにする。
 */

import { addDays, parseKey, shiftMonth, toKey } from './dates.js';

export function buildSampleEvents(today) {
  const base = parseKey(today);
  const nextMonth = shiftMonth(base.getFullYear(), base.getMonth(), 1);
  const prevMonth = shiftMonth(base.getFullYear(), base.getMonth(), -1);
  const nextMonthKey = toKey(new Date(nextMonth.year, nextMonth.month, 3));
  const prevMonthKey = toKey(new Date(prevMonth.year, prevMonth.month, 15));

  const relative = [
    ['trash-today', '燃えるゴミ', 0, '08:00', 'trash'],
    ['dentist-today', '歯医者', 0, '10:00', 'hospital'],
    ['shop-today', '買い物', 0, '18:00', 'shopping'],
    ['bill-tomorrow', '電気代の支払い', 1, '09:00', 'payment'],
    ['plastic', 'プラスチック', 2, '08:00', 'trash'],
    ['clinic', '小児科', 3, '14:30', 'hospital'],
    ['weekend-shop', '週末の買い出し', 5, '11:00', 'shopping'],
    ['talk', '家族の打ち合わせ', -2, '19:00', 'other'],
  ];

  const events = relative.map(([id, title, offset, time, category]) => ({
    id: `sample-${id}`,
    title,
    date: addDays(today, offset),
    time,
    category,
    source: 'sample',
  }));

  events.push(
    {
      id: 'sample-prev-month',
      title: '資源ごみ',
      date: prevMonthKey,
      time: '08:00',
      category: 'trash',
      source: 'sample',
    },
    {
      id: 'sample-next-month',
      title: '家賃の確認',
      date: nextMonthKey,
      time: '10:00',
      category: 'payment',
      source: 'sample',
    },
  );

  return events;
}
