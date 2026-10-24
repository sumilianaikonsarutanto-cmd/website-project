# モトショップズーム｜ホームページデザイン提案デモ

大阪市東淀川区上新庄のバイクショップ「モトショップズーム」向けの、営業用トップページ案です。
ツナグWEB製作の提案画面であり、公式サイトではありません。

公式サイト: https://motoshopzoom.com/

HTML / CSS / JavaScript のみです。ビルドは不要です。

- なぜこのデザインか → [`docs/design-notes.md`](docs/design-notes.md)
- 掲載の出典と、公開前の確認 → [`docs/content-source.md`](docs/content-source.md)

---

## 見方

```bash
python3 -m http.server 4321
# → http://localhost:4321/
```

`index.html` をブラウザで直接開いても表示できます。
検索エンジンには出さない設定です（`noindex`）。本番のドメインやサーバーは変更していません。

## ファイル

```
index.html                 トップページ（提案デモ）
assets/css/style.css       スタイル
assets/js/main.js          メニューとフェードイン
assets/img/                公式サイトから取得した写真
docs/design-notes.md       調査とデザイン方針
docs/content-source.md     出典と要確認リスト
```

写真はモトショップズーム公式サイトの掲載画像です。営業のローカルプレビューを想定しています。一般公開の前に、使用許諾を店舗へ確認してください。
