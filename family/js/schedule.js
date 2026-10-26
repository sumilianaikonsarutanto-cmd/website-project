/** 予定の並べ替えと抽出。保存方法が変わっても、画面はこの形を受け取る。 */

export function sortEvents(events) {
  return events.slice().sort((a, b) => {
    if (a.date !== b.date) return a.date < b.date ? -1 : 1;
    if (a.time !== b.time) return a.time < b.time ? -1 : 1;
    return a.title.localeCompare(b.title, 'ja');
  });
}

export function eventsOn(events, dateKey) {
  return sortEvents(events.filter((event) => event.date === dateKey));
}

/** start と end を含む。 */
export function eventsBetween(events, startKey, endKey) {
  return sortEvents(
    events.filter((event) => event.date >= startKey && event.date <= endKey),
  );
}

export function groupByDate(events) {
  const groups = [];
  for (const event of sortEvents(events)) {
    const last = groups[groups.length - 1];
    if (!last || last.date !== event.date) {
      groups.push({ date: event.date, events: [event] });
    } else {
      last.events.push(event);
    }
  }
  return groups;
}

function minutesOf(time) {
  const [hour, minute] = time.split(':').map(Number);
  return hour * 60 + minute;
}

export function isPast(event, now) {
  const key = `${now.getFullYear()}-${String(now.getMonth() + 1).padStart(2, '0')}-${String(now.getDate()).padStart(2, '0')}`;
  if (event.date < key) return true;
  if (event.date > key) return false;
  return minutesOf(event.time) < now.getHours() * 60 + now.getMinutes();
}

/** いま以降で最も近い予定。同じ時刻なら、その予定はまだ「次」に含める。 */
export function pickNext(events, now) {
  const key = `${now.getFullYear()}-${String(now.getMonth() + 1).padStart(2, '0')}-${String(now.getDate()).padStart(2, '0')}`;
  const minutes = now.getHours() * 60 + now.getMinutes();
  return (
    sortEvents(events).find((event) => {
      if (event.date > key) return true;
      if (event.date < key) return false;
      return minutesOf(event.time) >= minutes;
    }) || null
  );
}

export function isSample(event) {
  return event.source === 'sample';
}
