# ツナグWEB製作｜公式サイト

中小企業・地域密着型事業者向けWeb制作ブランド「ツナグWEB製作」の公式ホームページです。

コンセプト：**価値をつなぐ。見せ方を変える。** / Connect Value. Design Impact.

静的 HTML 版と、WordPress テーマ版の両方を同梱しています。

---

## いちばん早く使う（WordPress）

1. リポジトリ直下の **`tsunagu-web.zip`** をダウンロード
2. WordPress 管理画面 → **外観 → テーマ → 新規追加 → テーマのアップロード**
3. ZIP をインストールして **有効化**
4. **外観 → カスタマイズ → ツナグWEB製作** でメール／電話／LINE を設定

詳しい ZIP の作り方・注意点は [`ZIPの作り方.txt`](ZIPの作り方.txt) を参照。

テーマの実体パス:

```
wp-content/themes/tsunagu-web/
```

---

## ファイル構成

```
.
├── index.html                 静的トップ（確認・プレビュー用）
├── 404.html                   静的404
├── tsunagu-web.zip            WordPress にそのままアップロード可能なテーマ ZIP
├── ZIPの作り方.txt
├── assets/                    静的版の CSS / JS / 画像
├── docs/
│   ├── design-notes.md
│   └── content-source.md
└── wp-content/themes/tsunagu-web/   WordPress テーマ本体
    ├── style.css              テーマ宣言
    ├── functions.php
    ├── header.php / footer.php
    ├── front-page.php         公式トップ
    ├── 404.php / page.php / index.php
    ├── inc/helpers.php
    ├── inc/customizer.php
    └── assets/                CSS / JS / 画像
```

### 静的版の表示

```bash
python3 -m http.server 4321
# → http://localhost:4321/
```

---

## WordPress での設定

### 連絡先（必須・公開前）

**外観 → カスタマイズ → ツナグWEB製作 → 連絡先**

| 項目 | 説明 |
| --- | --- |
| メールアドレス | 設定後、問い合わせフォームが有効（mailto 下書き） |
| 電話番号 | 数字のみ（リンク用）と表示用 |
| LINE URL | 任意 |

未設定の連絡手段は表示・送信しません（仮の番号は入れないでください）。

### その他

- **ブランド名 / タグライン / 住所** … 同パネルの「ブランド」
- **実績制作価格の表示** … 「価格表示」（既定 `49,800`）。通常価格ではありません
- 本番ドメインは WordPress のサイト URL が OGP / canonical に使われます

サーバーサイドのメール送信（Contact Form 7 等）が必要な場合は、別途プラグイン設定が必要です。現状のフォームはメール設定後に `mailto:` で下書きを開きます。

---

## 静的版の連絡先設定

WordPress を使わない場合は、従来どおり `index.html` の meta または `TSUNAGU_CONTACT` を設定してください（詳細は以前の手順と同じ）。

---

## デザインの変え方

`assets/css/style.css`（静的）または  
`wp-content/themes/tsunagu-web/assets/css/style.css`（WP）先頭の `:root` がトークンです。

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
- 実績数値・推薦コメント・実在顧客名は未確認のため非掲載
- Works は **コンセプト制作 / 架空案件** と明記
- `prefers-reduced-motion` 対応

詳細は [`docs/design-notes.md`](docs/design-notes.md) / [`docs/content-source.md`](docs/content-source.md)。
