import { SUGGESTIONS } from '../chat.js';
import { escapeHtml } from '../html.js';

export function renderChat({ messages, draft }) {
  const thread = messages
    .map((message) => {
      const mine = message.role === 'user';
      const who = mine ? 'あなた' : '案内';
      return `<article class="msg ${mine ? 'msg--user' : 'msg--guide'}">
        <p class="msg__who">${who}</p>
        <div class="bubble">${escapeHtml(message.text)}</div>
      </article>`;
    })
    .join('');

  const chips = SUGGESTIONS.map(
    (text) =>
      `<button type="button" class="chip" data-action="chip" data-text="${escapeHtml(text)}">${escapeHtml(text)}</button>`,
  ).join('');

  return `<div class="chat">
    <h1 class="visually-hidden">チャット</h1>
    <div class="messages" data-messages>${thread}</div>
    <div class="composer">
      <form id="chat-form" autocomplete="off">
        <div class="composer__row">
          <label class="visually-hidden" for="chat-input">予定のメッセージ</label>
          <textarea id="chat-input" rows="1" maxlength="1000" enterkeyhint="send" placeholder="例：明日、買い物に行く">${escapeHtml(draft)}</textarea>
          <button type="submit" class="send" id="chat-send" ${draft.trim() ? '' : 'disabled'}>送信</button>
        </div>
      </form>
      <div class="chips" aria-label="入力例">${chips}</div>
      <p class="composer__hint">入力例を押すと、文章が入力欄に入ります。自動で予定を読み取る機能は、次の開発段階で追加します。</p>
    </div>
  </div>`;
}
