# 新樹園 提案デモ

大阪市東淀川区菅原の園芸店「新樹園」向けの、営業用デモサイトです。
HTML / CSS / JavaScript のみです。ビルドは不要です。

## 見方

```bash
python3 -m http.server 4321
# http://localhost:4321/
```

## このデモで伝えていること

珍しい植物との出会い、初めてでも相談しやすいこと、訪れるたびに棚が変わること。
来店と電話が主CTAです。予約フォームはありません。

## 未掲載にしているもの

営業時間、定休日、駐車場、支払い、価格、在庫、スタッフ紹介、口コミ本文。
出典と確認リストは [`docs/content-source.md`](docs/content-source.md) です。

## 入荷の追加

`assets/js/main.js` 先頭の `newArrivals` に、実在する入荷だけを足します。
価格は、店舗確認後でなければ入れません。

## 公開時

- `noindex` と `robots.txt` の Disallow を外す
- canonical、OGP、sitemap に本番の絶対URLを入れる
- イラストを実店舗の写真に差し替える
- 要確認の項目を埋める
