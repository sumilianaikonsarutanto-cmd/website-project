# ハッピーペイントホーム（白井工業）ホームページ

大阪市東淀川区の雨漏り修理専門店「ハッピーペイントホーム（白井工業）」のホームページです。
HTML / CSS / JavaScript のみで構成しています（ビルド不要）。

---

## 1. 制作区分：【既存サイトなし＝新規制作】

プロジェクト内に既存の HTML / CSS / JS / 画像は存在しませんでした（`README.md` のみ）。
ただし公式サイト（Jimdo）は稼働中のため、**そこに掲載されている文言・数値・写真を一次資料**として扱い、
店舗が自ら選んだ言葉（「雨漏りは塗装では止まりません」「自分の家ならどう直すか」など）は原文のまま引き継いでいます。

- なぜこのデザインになったのか → [`docs/design-notes.md`](docs/design-notes.md)
- 掲載情報の出典と **要確認リスト** → [`docs/content-source.md`](docs/content-source.md)

---

## 2. ファイル構成

```
.
├── index.html                   トップページ（1ページ完結）
├── works.html                   施工事例一覧（全35件・地域フィルター付き）
├── assets/
│   ├── css/style.css            全スタイル（先頭に目次あり）
│   ├── js/main.js               共通スクリプト（約130行）
│   └── img/
│       ├── favicon.svg
│       ├── craft/               現場写真（4点）
│       ├── staff/               代表写真（1点）
│       ├── line/                LINE 友だち追加 QR
│       └── works/               施工事例写真（35点）
└── docs/
    ├── design-notes.md          デザイン意図
    ├── content-source.md        出典一覧 / 要確認リスト
    └── works-data.json          施工事例データ（WordPress移行用）
```

### 表示方法

そのままブラウザで `index.html` を開けます。
ローカルサーバーで確認する場合：

```bash
python3 -m http.server 4321
# → http://localhost:4321/
```

---

## 3. 修正のしかた（変更箇所 早見表）

### 3-1. デザインのトーンを変える

`assets/css/style.css` の先頭にある `:root` のデザイントークンを変更してください。
色・書体・余白・角丸がすべてここに集約されています。

```css
:root {
  --navy:   #0d2b4e;   /* 主色 */
  --orange: #ef7215;   /* アクセント（CTA） */
  --paper:  #f6f4f0;   /* 背景の紙色 */
  --container: 1180px; /* コンテンツ最大幅 */
}
```

### 3-2. 店舗情報を変更する

静的 HTML のため、以下は該当箇所を置換してください（出現箇所は少数です）。

| 変更したいもの | 検索する文字列 | 出現箇所 |
| --- | --- | --- |
| 電話番号（固定） | `0665999208`（リンク）／`06-6599-9208`（表示） | ヘッダー・FV・固定CTA・お問い合わせ・会社概要・フッター |
| 電話番号（携帯） | `09058810531` ／ `090-5881-0531` | お問い合わせ・会社概要・フッター |
| LINE | `https://lin.ee/nVTAZSSq` | 各CTA・フッター |
| メール | `happypainthome0987@gmail.com` | お問い合わせ・会社概要・フッター・構造化データ |
| Instagram | `https://www.instagram.com/happypainthome/` | お問い合わせ・フッター・構造化データ |
| 住所 | `西淡路4-24-11` | 会社概要・フッター・構造化データ |
| 公開ドメイン | `https://happypainthome.jimdofree.com/` | `canonical` / OGP / 構造化データ |

> 電話番号は `href="tel:..."` と表示テキストの**2か所**がセットです。両方を変更してください。

### 3-3. 施工事例を追加・変更する

1. 写真を `assets/img/works/work-XX.jpg` として追加（**正方形に近い比率**を推奨。グリッドが 1:1 で表示されます）
2. `works.html` の `.works__grid` 内に `<article class="work">` を1つ追加（既存カードをコピーして編集）
3. `data-area` に `osaka-city`（大阪市内）／`osaka`（大阪府内）／`other`（近隣府県）を指定
4. トップページにも載せる場合は `index.html` の `.works__grid` にも追加
5. `docs/works-data.json` にも追記（WordPress 移行時のインポート元になります）

### 3-4. よくある質問を追加する

`index.html` の `.faq__list` に `.faq__item` をコピーして追加し、
`aria-controls` と対応する `id`（`faq-a9` など）を**重複しない値**に変更してください。
あわせて `<head>` の FAQPage 構造化データにも同じ質問・回答を追記します。

---

## 4. 実装の要点

### レスポンシブ
- スマートフォン優先で設計。本文 17px / 行間 1.95（主要読者が40〜70代のため大きめ）
- 320px 〜 1920px で横スクロールが発生しないことを確認済み
- タップ領域は最小 48px、画面下部の固定CTA（電話／LINE）は 62px

### アクセシビリティ
- スキップリンク、`:focus-visible` のフォーカスリング
- ハンバーガー・FAQ は `aria-expanded` / `aria-controls` で状態を通知
- 施工事例フィルターは `aria-pressed`
- すべての画像に内容を説明する `alt`
- `prefers-reduced-motion: reduce` でアニメーションを停止

### SEO
- `title` / `meta description` / `canonical` / OGP
- 構造化データ：`RoofingContractor`（トップ）、`FAQPage`（トップ）、`BreadcrumbList`（施工事例）
- 見出しは `h1` → `h2` → `h3` の階層を厳守
- すべての `img` に `width` / `height` を指定（レイアウトシフト対策）、ファーストビュー以外は `loading="lazy"`

> 構造化データに `aggregateRating` は入れていません。公開時点の正確な評価・件数が確認できてからの追加を推奨します。

### JavaScript
`assets/js/main.js` の1ファイルのみ（外部ライブラリなし）。
JavaScript が無効でも、コンテンツはすべて読める状態を保っています
（FAQ の回答だけが開けなくなりますが、本文は HTML に存在します）。

---

## 5. WordPress 化について

指示があり次第、現在のデザイン・レイアウト・機能を維持したまま下記構成へ変換できるよう、
HTML をセクション単位で区切ってあります。

| 変換先 | 対応する現在の箇所 |
| --- | --- |
| `header.php` | `<head>` 〜 `</header>`（ドロワー含む） |
| `footer.php` | `<footer>` 〜 `</body>`（固定CTA含む） |
| `front-page.php` | `index.html` の `<main>` 内 |
| `archive-works.php` / `single-works.php` | `works.html`（カスタム投稿「施工事例」） |
| `page.php` / `404.php` | 共通レイアウトを流用 |
| `assets/` | そのまま `assets/` へ配置 |

管理画面から更新することになる情報：

- 施工事例 → カスタム投稿タイプ + カスタムフィールド（地域／工事内容／費用／築年数／原因）。
  初期データは `docs/works-data.json` からインポートできます
- 電話番号・住所・LINE・営業時間 → テーマオプション（1か所で管理し全テンプレートから参照）
- お客様の声 → カスタム投稿タイプ（現在は掲載枠のみ用意）

小規模店舗サイトのため、ページビルダーや過剰なプラグイン構成は想定していません。

---

## 6. 公開前の確認事項

**必ず [`docs/content-source.md`](docs/content-source.md) の「要確認リスト」をご確認ください。**
特に次の項目は、店舗様の確認なしに公開しないでください。

- 年間施工件数・平均施工単価（公式サイトと外部媒体で表記が異なります）
- Googleマップの評価・口コミ件数
- 雨漏り保証の適用条件
- 施工事例写真の掲載許可の範囲
- 正式なロゴデータ（現在は暫定の SVG で再現しています）
- 公開ドメイン（`canonical` / OGP / 構造化データの URL）
