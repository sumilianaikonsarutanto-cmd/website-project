(function ($) {
  'use strict';

  $('.chuboya-tabs button').on('click', function () {
    var tab = $(this).data('tab');
    $('.chuboya-tabs button').removeClass('is-active');
    $(this).addClass('is-active');
    $('.chuboya-panel').removeClass('is-active');
    $('#chuboya-panel-' + tab).addClass('is-active');
  });

  $('.chuboya-image__select').on('click', function (e) {
    e.preventDefault();
    var box = $(this).closest('.chuboya-image');
    var frame = wp.media({
      title: '中房家の写真を選ぶ',
      button: { text: 'この写真を使う' },
      multiple: false
    });
    frame.on('select', function () {
      var att = frame.state().get('selection').first().toJSON();
      box.find('.chuboya-image__id').val(att.id);
      var src = (att.sizes && att.sizes.medium) ? att.sizes.medium.url : att.url;
      box.find('.chuboya-image__preview').html('<img src="' + src + '" alt="">');
    });
    frame.open();
  });

  $('.chuboya-image__clear').on('click', function (e) {
    e.preventDefault();
    var box = $(this).closest('.chuboya-image');
    box.find('.chuboya-image__id').val('0');
    box.find('.chuboya-image__preview').html('<span class="chuboya-image__empty">初期画像（テーマ同梱）に戻します。保存してください。</span>');
  });
})(jQuery);
