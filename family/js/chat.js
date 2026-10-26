/**
 * チャットの案内。
 * 文章の意味は解釈しない。予定の自動登録もしない。
 * Gemini をつなぐときは createGuideReply を差し替える。
 */

export const WELCOME =
  'こんにちは！予定の登録や確認をお手伝いします。登録したい予定を入力してください。';

export const SUGGESTIONS = [
  '10月28日10時に歯医者',
  '毎週火曜日は燃えるゴミ',
  '明日、買い物に行く',
  '今週の予定を確認したい',
];

export function createGuideReply() {
  return '受け取りました。予定の自動登録機能は、次の開発段階で追加します。送信された文章は、この画面の会話に残るだけです。';
}
