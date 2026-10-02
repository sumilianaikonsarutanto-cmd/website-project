# 武住設 提案用デモサイト

大阪市東淀川区の住宅設備店「武住設」向けの、営業提案用1ページサイトです。
HTML / CSS / JavaScript のみで、ビルドは不要です。

正式納品用ではなく、店舗オーナーに「このホームページなら自店にも欲しい」と見てもらうためのデモです。掲載している事実は、公式サイト（https://taketoshi.net/）とご提供の店舗分析・設計書に限っています。

- デザインの意図 → [`docs/design-notes.md`](docs/design-notes.md)
- 出典と公開前の確認 → [`docs/content-source.md`](docs/content-source.md)

## 表示

```bash
python3 -m http.server 4321
# http://localhost:4321/
```

検索エンジンには出さない設定です（`noindex`）。正式公開時に外してください。

## ファイル

```
index.html
assets/css/style.css
assets/js/main.js
assets/img/works/     公式サイトの施工写真
assets/img/staff/     公式サイトのスタッフ写真
assets/img/shop/      公式サイトの店舗外観
docs/
```

## 直すとき

色と幅は `assets/css/style.css` の `:root` にまとめています。

| 変更 | 検索する文字 |
| --- | --- |
| 電話 | `0663703731` と `06-6370-3731` |
| メール | `taketoshi.d@gmail.com` |
| 住所 | `小松4丁目11-7` |

施工写真を差し替えるときは、`assets/img/works/` の同名ファイルを上書きしてください。高解像度の元データがあれば、同じファイル名で置き換えるとレイアウトを崩さず差し替えできます。
