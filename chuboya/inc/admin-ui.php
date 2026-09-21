<?php
if (!defined('ABSPATH')) {
    exit;
}
?>
<div class="wrap chuboya-wrap">
  <h1>中房家ホームページ設定</h1>
  <p class="chuboya-lead">
    写真と文章をここから変更できます。レイアウトや色は変わりません。<br>
    空欄にすると、今のホームページと同じ初期表示に戻ります。
  </p>

  <?php if (isset($_GET['updated'])) : ?>
    <div class="notice notice-success chuboya-notice-ok is-dismissible"><p>保存しました。サイトを開いて確認してください。</p></div>
  <?php endif; ?>
  <?php if (isset($_GET['reset'])) : ?>
    <div class="notice notice-success is-dismissible"><p>初期状態（現行の完成デザインと同じ内容）に戻しました。</p></div>
  <?php endif; ?>

  <form method="post">
    <?php wp_nonce_field('chuboya_save_settings', 'chuboya_nonce'); ?>

    <div class="chuboya-tabs" role="tablist">
      <button type="button" class="is-active" data-tab="basic">基本・店舗情報</button>
      <button type="button" data-tab="hero">ファーストビュー</button>
      <button type="button" data-tab="about">中房家とは</button>
      <button type="button" data-tab="reasons">選ばれる理由</button>
      <button type="button" data-tab="menu">お品書き</button>
      <button type="button" data-tab="lunch">ランチ</button>
      <button type="button" data-tab="night">夜の楽しみ方</button>
      <button type="button" data-tab="seats">利用シーン</button>
      <button type="button" data-tab="voices">お客様の声</button>
      <button type="button" data-tab="faq">よくある質問</button>
      <button type="button" data-tab="cta">CTA</button>
      <button type="button" data-tab="photos">写真14枚</button>
    </div>

    <div class="chuboya-panel is-active" id="chuboya-panel-basic">
      <h2>基本情報・SEO</h2>
      <?php
      chuboya_admin_field('shop_name', '店名');
      chuboya_admin_field('shop_kana', '読み（ちゅうぼうや）');
      chuboya_admin_field('shop_logo_sub', 'ヘッダーの小さな説明');
      chuboya_admin_field('phone_display', '電話番号（表示用）', 'text', '例：06-6990-5578。ハイフン付きで入力してください。');
      chuboya_admin_field('nav_tel_label', 'ヘッダー電話ボタンの上段');
      chuboya_admin_field('address', '住所');
      chuboya_admin_field('nearest', '最寄り駅');
      chuboya_admin_field('genre', 'ジャンル');
      chuboya_admin_field('hours', '営業時間', 'text', '「要確認」と書くと黄色いチップで表示されます。');
      chuboya_admin_field('holiday', '定休日');
      chuboya_admin_field('parking', '駐車場');
      chuboya_admin_field('payment', 'お支払い方法');
      chuboya_admin_field('reserve', 'ご予約');
      chuboya_admin_field('zip_note', '住所横の補足（郵便番号 要確認 など）');
      chuboya_admin_field('map_query', '地図検索キーワード');
      chuboya_admin_field('map_note', '地図の下の注記', 'textarea');
      chuboya_admin_field('map_note_chip', '地図注記のチップ文言');
      chuboya_admin_field('footer_desc', 'フッターの説明文');
      chuboya_admin_field('copyright', 'コピーライト');
      ?>
      <h2>検索エンジン用（見た目は変わりません）</h2>
      <?php
      chuboya_admin_field('seo_title', 'サイトタイトル');
      chuboya_admin_field('seo_description', 'メタ説明', 'textarea');
      chuboya_admin_field('seo_og_title', 'SNS用タイトル');
      chuboya_admin_field('seo_og_description', 'SNS用説明', 'textarea');
      ?>
    </div>

    <div class="chuboya-panel" id="chuboya-panel-hero">
      <h2>ファーストビュー</h2>
      <?php
      chuboya_admin_field('hero_eyebrow', '赤い帯の短い文言');
      chuboya_admin_field('hero_title_1', 'メインコピー1行目');
      chuboya_admin_field('hero_title_2', 'メインコピー2行目');
      chuboya_admin_field('hero_lead', 'サブコピー（改行はそのまま反映）', 'textarea');
      chuboya_admin_field('hero_cta_menu', '赤いボタン');
      chuboya_admin_field('hero_cta_tel', '電話ボタン');
      chuboya_admin_field('hero_strip_1', '下帯 1');
      chuboya_admin_field('hero_strip_2', '下帯 2');
      chuboya_admin_field('hero_strip_3', '下帯 3');
      chuboya_admin_field('hero_strip_4', '下帯 4');
      chuboya_admin_field('hero_alt', '写真の代替テキスト');
      echo '<p class="description">ファーストビュー写真は「写真14枚」タブから変更できます。</p>';
      ?>
    </div>

    <div class="chuboya-panel" id="chuboya-panel-about">
      <h2>中房家とは</h2>
      <?php
      chuboya_admin_field('about_label', 'ラベル');
      chuboya_admin_field('about_heading_1', '見出し1行目');
      chuboya_admin_field('about_heading_2', '見出し2行目（前半）');
      chuboya_admin_field('about_heading_3', '見出し2行目（後半）');
      chuboya_admin_field('about_p1', '本文1', 'textarea');
      chuboya_admin_field('about_p2', '本文2', 'textarea');
      chuboya_admin_field('about_note', '注記', 'textarea');
      chuboya_admin_chip('about_note_chip');
      chuboya_admin_field('about_staff_caption', '大きい写真のキャプション');
      chuboya_admin_field('about_staff_alt', '大きい写真の代替テキスト');
      chuboya_admin_field('about_exterior_caption', '小さい写真のキャプション');
      chuboya_admin_field('about_exterior_alt', '小さい写真の代替テキスト');
      ?>
    </div>

    <div class="chuboya-panel" id="chuboya-panel-reasons">
      <h2>選ばれる理由</h2>
      <?php
      chuboya_admin_field('reasons_label', 'ラベル');
      chuboya_admin_field('reasons_heading', '見出し');
      chuboya_admin_field('reason1_title', '01 見出し');
      chuboya_admin_field('reason1_text', '01 本文', 'textarea');
      chuboya_admin_field('reason1_alt', '01 写真の代替テキスト');
      chuboya_admin_field('reason2_title', '02 見出し');
      chuboya_admin_field('reason2_text', '02 本文', 'textarea');
      chuboya_admin_field('reason2_alt', '02 写真の代替テキスト');
      chuboya_admin_field('reason3_title', '03 見出し');
      chuboya_admin_field('reason3_text', '03 本文', 'textarea');
      chuboya_admin_field('reason3_alt', '03 写真の代替テキスト');
      ?>
    </div>

    <div class="chuboya-panel" id="chuboya-panel-menu">
      <h2>お品書き</h2>
      <?php
      chuboya_admin_field('menu_label', 'ラベル');
      chuboya_admin_field('menu_heading', '見出し');
      chuboya_admin_field('menu_lead', 'リード文', 'textarea');
      for ($i = 1; $i <= 8; $i++) {
          chuboya_admin_field('menu_name_' . $i, '料理名 ' . $i);
          chuboya_admin_field('menu_price_' . $i, '価格・補足 ' . $i, 'text', '「要確認」と書くと小さな文字で表示されます。');
      }
      chuboya_admin_field('menu_more', '一番下の補足行');
      chuboya_admin_field('menu_note', '注記', 'textarea');
      chuboya_admin_chip('menu_note_chip');
      chuboya_admin_field('menu_main_caption', '主役写真のキャプション');
      chuboya_admin_field('menu_main_alt', '主役写真の代替テキスト');
      chuboya_admin_field('menu_noodles_caption', '麺のキャプション');
      chuboya_admin_field('menu_noodles_alt', '麺の代替テキスト');
      chuboya_admin_field('menu_ippin_caption', '一品のキャプション');
      chuboya_admin_field('menu_ippin_alt', '一品の代替テキスト');
      ?>
    </div>

    <div class="chuboya-panel" id="chuboya-panel-lunch">
      <h2>ランチ</h2>
      <?php
      chuboya_admin_field('lunch_label', 'ラベル');
      chuboya_admin_field('lunch_heading', '見出し');
      chuboya_admin_field('lunch_text', '本文', 'textarea');
      chuboya_admin_field('lunch_hours_label', '営業時間の項目名');
      chuboya_admin_field('lunch_hours', '営業時間');
      chuboya_admin_field('lunch_contents_label', '内容の項目名');
      chuboya_admin_field('lunch_contents', '内容');
      chuboya_admin_chip('lunch_contents_chip');
      chuboya_admin_field('lunch_price_label', '価格の項目名');
      chuboya_admin_field('lunch_price', '価格');
      chuboya_admin_field('lunch_note', '注記', 'textarea');
      chuboya_admin_field('lunch_cta', 'ボタン文言');
      chuboya_admin_field('lunch_caption', '写真キャプション');
      chuboya_admin_field('lunch_alt', '写真の代替テキスト');
      ?>
    </div>

    <div class="chuboya-panel" id="chuboya-panel-night">
      <h2>夜の楽しみ方</h2>
      <?php
      chuboya_admin_field('night_label', 'ラベル');
      chuboya_admin_field('night_heading_1', '見出し 前');
      chuboya_admin_field('night_heading_2', '見出し 中');
      chuboya_admin_field('night_heading_3', '見出し 後');
      chuboya_admin_field('night_lead', 'リード文', 'textarea');
      chuboya_admin_field('night_caption', '写真キャプション');
      chuboya_admin_field('night_alt', '写真の代替テキスト');
      chuboya_admin_field('drink_title', 'ドリンク見出し');
      chuboya_admin_field('drink_text', 'ドリンク本文', 'textarea');
      chuboya_admin_field('drink_1', 'ドリンク 1');
      chuboya_admin_field('drink_2', 'ドリンク 2');
      chuboya_admin_chip('drink_2_chip');
      chuboya_admin_field('drink_note', 'ドリンク注記', 'textarea');
      chuboya_admin_field('night_note', 'セクション注記', 'textarea');
      ?>
    </div>

    <div class="chuboya-panel" id="chuboya-panel-seats">
      <h2>店内・利用シーン</h2>
      <?php
      chuboya_admin_field('seats_label', 'ラベル');
      chuboya_admin_field('seats_heading_1', '見出し 1');
      chuboya_admin_field('seats_heading_2', '見出し 2');
      chuboya_admin_field('seats_heading_3', '見出し 3');
      chuboya_admin_field('seats_lead', 'リード文', 'textarea');
      chuboya_admin_field('scene_solo_title', '一人利用の見出し');
      chuboya_admin_field('scene_solo_text', '一人利用の本文', 'textarea');
      chuboya_admin_field('scene_solo_alt', '一人利用の代替テキスト');
      chuboya_admin_field('scene_family_title', '家族利用の見出し');
      chuboya_admin_field('scene_family_text', '家族利用の本文', 'textarea');
      chuboya_admin_field('scene_family_alt', '家族利用の代替テキスト');
      chuboya_admin_field('scene_group_title', 'グループ利用の見出し');
      chuboya_admin_field('scene_group_text', 'グループ利用の本文', 'textarea');
      chuboya_admin_field('scene_group_alt', 'グループ利用の代替テキスト');
      chuboya_admin_field('seats_note', '注記', 'textarea');
      chuboya_admin_chip('seats_note_chip');
      ?>
    </div>

    <div class="chuboya-panel" id="chuboya-panel-voices">
      <h2>お客様の声</h2>
      <?php
      chuboya_admin_field('voices_label', 'ラベル');
      chuboya_admin_field('voices_heading_1', '見出し 前');
      chuboya_admin_field('voices_heading_2', '見出し 後');
      chuboya_admin_field('voices_lead', 'リード文');
      for ($i = 1; $i <= 5; $i++) {
          chuboya_admin_field('voice' . $i . '_title', '項目 ' . $i . ' 見出し');
          chuboya_admin_field('voice' . $i . '_text', '項目 ' . $i . ' 本文', 'textarea');
      }
      chuboya_admin_field('voices_note', '注記', 'textarea');
      chuboya_admin_chip('voices_note_chip');
      chuboya_admin_field('access_label', 'アクセスのラベル');
      chuboya_admin_field('access_heading', 'アクセスの見出し');
      chuboya_admin_field('access_name_label', '店名の項目名');
      chuboya_admin_field('access_name', '店名の表示');
      chuboya_admin_field('access_maps_link', '地図リンクの文言');
      ?>
    </div>

    <div class="chuboya-panel" id="chuboya-panel-faq">
      <h2>よくある質問</h2>
      <?php
      chuboya_admin_field('faq_label', 'ラベル');
      chuboya_admin_field('faq_heading_1', '見出し 前');
      chuboya_admin_field('faq_heading_2', '見出し 後');
      for ($i = 1; $i <= 7; $i++) {
          echo '<h3>質問 ' . esc_html($i) . '</h3>';
          chuboya_admin_field('faq_q_' . $i, '質問');
          chuboya_admin_field('faq_a_' . $i, '回答', 'textarea');
          chuboya_admin_chip('faq_a_' . $i . '_chip');
      }
      ?>
    </div>

    <div class="chuboya-panel" id="chuboya-panel-cta">
      <h2>最終CTA・スマホ固定ボタン</h2>
      <?php
      chuboya_admin_field('cta_title_1', '見出し 前');
      chuboya_admin_field('cta_title_2', '見出し 後');
      chuboya_admin_field('cta_lead', '本文', 'textarea');
      chuboya_admin_field('cta_tel', '電話ボタン');
      chuboya_admin_field('cta_access', 'アクセスボタン');
      chuboya_admin_field('fixed_tel', 'スマホ下部：電話');
      chuboya_admin_field('fixed_access', 'スマホ下部：アクセス');
      ?>
    </div>

    <div class="chuboya-panel" id="chuboya-panel-photos">
      <h2>写真14枚</h2>
      <p>メディアライブラリから選ぶと、該当箇所だけ写真が変わります。枠の大きさは変わりません。</p>
      <div class="chuboya-grid">
        <?php
        foreach (array_keys(chuboya_photo_slots()) as $slot) {
            chuboya_admin_image($slot);
        }
        ?>
      </div>
    </div>

    <div class="chuboya-actions">
      <button type="submit" name="chuboya_save" class="button button-primary button-hero">変更を保存</button>
      <button type="submit" name="chuboya_reset" class="button" onclick="return confirm('文章も写真も、今の完成デザインと同じ初期状態に戻します。よろしいですか？');">初期状態に戻す</button>
    </div>
  </form>
</div>
