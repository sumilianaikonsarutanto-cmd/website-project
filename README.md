# 松下ハウス株式会社　営業提案デモ

大阪市東淀川区のリフォーム・リノベーション会社「松下ハウス株式会社」向けの、営業用デモサイトです。
正式納品物ではなく、現行サイトの情報を、相談したくなる順番と現代的な見た目に組み直した提案です。

HTML / CSS / JavaScript のみ。ビルド不要。

```bash
python3 -m http.server 4321
# http://localhost:4321/
```

## 構成

- `index.html` 1ページ完結
- `assets/css/style.css`
- `assets/js/main.js` メニュー、Before/After、フェード
- `assets/img/` 公式サイトの施工写真を WebP 化
- `docs/content-source.md` 出典と、公開前に揃える項目

問い合わせボタンは、現行のフォーム（https://matushita-house.co.jp/contact-2/）と電話 `0120-681-582` へつなぎます。

検索には出さない設定です（`noindex` と `robots.txt`）。本番ドメインが決まったら外してください。
