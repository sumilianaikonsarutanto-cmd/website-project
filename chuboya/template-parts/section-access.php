<?php
if (!defined('ABSPATH')) {
    exit;
}
$zip_note = trim((string) chuboya_get('zip_note'));
$map_note_chip = trim((string) chuboya_get('map_note_chip'));
?>
<!-- ============================================================
     10 店舗情報・アクセス（WP: template-parts/section-access.php）
     ============================================================ -->
<section class="section access" id="access">
  <div class="container">
    <p class="label"><?php chuboya_text('access_label'); ?></p>
    <h2 class="heading"><?php chuboya_text('access_heading'); ?></h2>

    <div class="access__grid">
      <div class="access__info">
        <dl class="spec spec--lined">
          <div class="spec__row">
            <dt><?php chuboya_text('access_name_label'); ?></dt>
            <dd><?php chuboya_text('access_name'); ?></dd>
          </div>
          <div class="spec__row">
            <dt>住所</dt>
            <dd>
              <?php chuboya_text('address'); ?><?php if ($zip_note !== '') : ?><span class="chip"><?php echo esc_html($zip_note); ?></span><?php endif; ?>
              <a class="link" href="<?php echo esc_url(chuboya_maps_search_url()); ?>" target="_blank" rel="noopener"><?php chuboya_text('access_maps_link'); ?></a>
            </dd>
          </div>
          <div class="spec__row">
            <dt>電話</dt>
            <dd><a class="link link--tel" href="<?php echo esc_url(chuboya_tel_href()); ?>"><?php chuboya_text('phone_display'); ?></a></dd>
          </div>
          <div class="spec__row">
            <dt>最寄り駅</dt>
            <dd><?php chuboya_text('nearest'); ?></dd>
          </div>
          <div class="spec__row">
            <dt>ジャンル</dt>
            <dd><?php chuboya_text('genre'); ?></dd>
          </div>
          <div class="spec__row">
            <dt>営業時間</dt>
            <dd><?php chuboya_echo_inline(chuboya_spec_value('hours')); ?></dd>
          </div>
          <div class="spec__row">
            <dt>定休日</dt>
            <dd><?php chuboya_echo_inline(chuboya_spec_value('holiday')); ?></dd>
          </div>
          <div class="spec__row">
            <dt>駐車場</dt>
            <dd><?php chuboya_echo_inline(chuboya_spec_value('parking')); ?></dd>
          </div>
          <div class="spec__row">
            <dt>お支払い方法</dt>
            <dd><?php chuboya_echo_inline(chuboya_spec_value('payment')); ?></dd>
          </div>
          <div class="spec__row">
            <dt>ご予約</dt>
            <dd><?php chuboya_echo_inline(chuboya_spec_value('reserve')); ?></dd>
          </div>
        </dl>
      </div>

      <div class="access__map">
        <iframe
          title="<?php echo esc_attr(chuboya_get('shop_name') . 'の地図（' . chuboya_get('address') . '）'); ?>"
          src="<?php echo esc_url(chuboya_maps_embed_url()); ?>"
          loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <p class="note">
          <?php chuboya_text('map_note'); ?><?php if ($map_note_chip !== '') : ?><span class="chip"><?php echo esc_html($map_note_chip); ?></span><?php endif; ?>
        </p>
      </div>
    </div>
  </div>
</section>
