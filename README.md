# ツナグWEB製作｜公式サイト

中小企業・地域密着型事業者向けWeb制作ブランド「ツナグWEB製作」の公式ホームページです。
HTML / CSS / JavaScript のみ（ビルド不要）。

コンセプト：**価値をつなぐ。見せ方を変える。** / Connect Value. Design Impact.

---

## ファイル構成

```
.
├── index.html                 トップ（1ページ完結）
├── 404.html                   404ページ
├── assets/
│   ├── css/style.css          全スタイル（トークン先頭）
│   ├── js/main.js             共通スクリプト（外部ライブラリなし）
│   └── img/
│       ├── favicon.svg
│       ├── hero/              ファーストビュー用写真
│       ├── atmosphere/        セクション用雰囲気写真（サンプル）
│       └── og/og.jpg          OGP画像
└── docs/
    ├── design-notes.md        デザイン意図
    └── content-source.md      掲載情報 / 要確認リスト
```

### 表示方法

```bash
python3 -m http.server 4321
# → http://localhost:4321/
```

`index.html` を直接開いても確認できます。

---

## 公開前に必ず設定すること

### 1. 連絡先（捏造しない）

電話・メール・LINE は未設定のままです。フォームは**送信先があるときだけ**有効化されます。

どちらか一方で設定してください。

**A. `index.html` の meta**

```html
<meta name="tsunagu:email" content="info@example.com">
<meta name="tsunagu:tel" content="09012345678">
<meta name="tsunagu:tel-display" content="090-1234-5678">
<meta name="tsunagu:line" content="https://lin.ee/xxxxx">
```

**B. `assets/js/main.js` 先頭、または HTML 内で**

```html
<script>
  window.TSUNAGU_CONTACT = {
    email: 'info@example.com',
    tel: '09012345678',
    telDisplay: '090-1234-5678',
    line: 'https://lin.ee/xxxxx'
  };
</script>
```

メール設定後、フォームは `mailto:` で下書きを開きます。サーバーサイド送信が必要な場合は別途実装が必要です。

### 2. ドメイン / OGP

`index.html` の `canonical` / `og:url` / `og:image` / 構造化データの `url` を本番ドメインに置換してください（現在は `https://example.com/` の仮値）。

### 3. 事業者情報

フッターに住所・登記情報などを追記する場合は、確認済みの事実のみを掲載してください。

---

## デザインの変え方

`assets/css/style.css` 先頭の `:root` がトークンです。

```css
:root {
  --bg: #101110;
  --bg-sub: #1B1D1A;
  --bg-light: #F0EEE6;
  --text: #F5F3EC;
  --accent: #C8F169;
  --text-mute: #AAAFA5;
}
```

---

## 実装の要点

- モバイルファースト / セマンティック HTML / 見出し階層
- 画像は `width` `height` 指定、FV以外は `loading="lazy"`
- `prefers-reduced-motion` 対応
- キーボード操作・`:focus-visible`
- 実績数値・推薦コメント・実在顧客名は未確認のため非掲載
- Works セクションは **コンセプト制作 / 架空案件** と明記
- 写真は Unsplash のストック（サンプル）— 顧客写真ではない

詳細は [`docs/design-notes.md`](docs/design-notes.md) / [`docs/content-source.md`](docs/content-source.md) を参照。

---

## 実績制作価格について

サイト上の **49,800円（税込）** は「実績制作価格」の参考値です。
全案件がこの金額で完了することを意味しません。範囲・追加費用・ドメインサーバー等は相談時に確認します。
