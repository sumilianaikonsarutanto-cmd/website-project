<?php
/**
 * トップページ。静的 HTML 版 index.html と同一の構成・文言です。
 */
if (!defined('ABSPATH')) { exit; }
get_header();
?>
<main id="main">


  <!-- ===== ファーストビュー ====================================== -->
  <section class="hero">
    <div class="hero__inner">
      <div class="hero__body">
        <p class="hero__eyebrow">大阪市東淀川区／職人直営・雨漏り修理専門</p>

        <h1 class="hero__title">雨漏りの原因を見極め、<br><em>本当に必要な修理だけを。</em></h1>

        <p class="hero__lead">
          現地調査から施工まで、同じ職人が責任を持って対応します。<br>
          雨漏り修理以外の工事を、こちらからご提案することはありません。
        </p>

        <ul class="hero__points">
          <li class="hero__point"><svg aria-hidden="true"><use href="#i-check"></use></svg>調査の立ち合い不要</li>
          <li class="hero__point"><svg aria-hidden="true"><use href="#i-check"></use></svg>原因は1時間で報告</li>
          <li class="hero__point"><svg aria-hidden="true"><use href="#i-check"></use></svg>費用は当日中に提示</li>
        </ul>

        <div class="hero__actions">
          <a class="btn btn--line" href="<?php echo esc_url(hph_info('line_url')); ?>" target="_blank" rel="noopener">
            <svg class="btn__icon" aria-hidden="true"><use href="#i-line"></use></svg>無料で雨漏りを相談する
          </a>
          <a class="btn btn--tel" href="<?php echo esc_url(hph_tel_href()); ?>">
            <svg class="btn__icon" aria-hidden="true"><use href="#i-phone"></use></svg><?php echo esc_html(hph_info('tel_display')); ?>
          </a>
        </div>
        <p class="hero__note">現地調査・お見積り無料／写真を送るだけでもご相談いただけます。<br>※営業・勧誘のお電話はご遠慮ください。</p>
      </div>

      <figure class="hero__figure">
        <img src="<?php echo esc_url(hph_asset('img/craft/craft-removing-soil.jpg')); ?>"
             alt="瓦屋根の上で既存の葺き土を撤去するハッピーペイントホームの職人"
             width="1280" height="960" fetchpriority="high" decoding="async">
        <figcaption class="hero__caption">大阪市西淀川区／築65年の瓦屋根 雨漏り修理の現場</figcaption>
      </figure>
    </div>
  </section>

  <!-- ===== 実績バー ============================================== -->
  <!-- 要確認（docs/content-source.md A-1・A-2）：件数と単価は公開前に最新の実績値へ更新してください -->
  <section class="stats" aria-label="実績">
    <div class="container">
      <ul class="stats__list">
        <li class="stats__item">
          <span class="stats__label">年間施工件数</span>
          <span class="stats__value"><?php echo esc_html(hph_info('yearly_jobs')); ?><small>件</small></span>
        </li>
        <li class="stats__item">
          <span class="stats__label">平均施工単価</span>
          <span class="stats__value"><?php echo esc_html(hph_info('avg_price')); ?><small>万円</small></span>
        </li>
        <li class="stats__item">
          <span class="stats__label">雨漏り保証</span>
          <span class="stats__value">最大<?php echo esc_html(hph_info('warranty_years')); ?><small>年</small></span>
        </li>
        <li class="stats__item">
          <span class="stats__label">対応エリア</span>
          <span class="stats__value stats__value--text">大阪市を中心に<br>大阪府全域</span>
        </li>
      </ul>
    </div>
  </section>

  <!-- ===== その工事、本当に必要ですか？ ========================== -->
  <section class="section question" id="question">
    <div class="container container--narrow">
      <h2 class="question__headline reveal">その工事、<br><span>本当に必要ですか？</span></h2>

      <div class="question__body reveal">
        <p>屋根の上は、住んでいる方からは見えません。だからこそ「言われたとおりに工事するしかない」という不安が生まれます。</p>
        <p><strong>雨漏りは「塗装では止まりません」。</strong>雨漏りの原因は、ほとんどが屋根や外壁の構造部分にあります。見た目をきれいにするだけの塗装では、根本的な解決にはならないケースが多いです。</p>
        <p>弊社では、原因を特定した上で本当に必要な施工のみをご提案いたします。</p>
      </div>

      <div class="promise reveal">
        <h3 class="promise__title">お客様へのお約束 <small>OUR PROMISE</small></h3>
        <ol>
          <li class="promise__item"><span class="promise__num">01</span><span>雨漏り修理以外の施工はご提案いたしません。</span></li>
          <li class="promise__item"><span class="promise__num">02</span><span>外壁塗装をお勧めすることはございません。</span></li>
          <li class="promise__item"><span class="promise__num">03</span><span>お見積書費用外の追加料金は一切かかりません。</span></li>
          <li class="promise__item"><span class="promise__num">04</span><span>施工は調査を担当した職人が責任を持って実施いたします。</span></li>
        </ol>
      </div>

      <p class="promise__quote reveal">
        「自分の家ならどう直すか。」<br>この基準でしかご提案しません。
        <small>代表・<?php echo esc_html(hph_info('owner')); ?>／職人歴<?php echo esc_html(hph_info('owner_years')); ?>年</small>
      </p>

      <div class="inline-cta reveal">
        <p class="inline-cta__text">「これって修理が必要？」<br>だけでもご相談ください。</p>
        <p class="inline-cta__note">現地調査・お見積りは無料です。写真を送るだけでもご相談いただけます。</p>
        <div class="inline-cta__actions">
          <a class="btn btn--line" href="<?php echo esc_url(hph_info('line_url')); ?>" target="_blank" rel="noopener">
            <svg class="btn__icon" aria-hidden="true"><use href="#i-line"></use></svg>LINEで無料相談
          </a>
          <a class="btn btn--orange" href="<?php echo esc_url(hph_tel_href()); ?>">
            <svg class="btn__icon" aria-hidden="true"><use href="#i-phone"></use></svg>電話で相談する
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- ===== 選ばれる理由 ========================================== -->
  <section class="section" id="reason">
    <div class="container">
      <div class="section-head reveal">
        <p class="section-head__label">Reason</p>
        <h2 class="section-head__title">ハッピーペイントホームが<br>選ばれる理由</h2>
        <p class="section-head__lead">営業担当が見積もり、下請けの職人が施工する——そういう仕組みを取っていません。見る人と直す人が同じであることが、この店のすべての前提になっています。</p>
      </div>

      <div class="reason">
        <article class="reason__item reveal">
          <figure class="reason__figure reason__figure--top">
            <img src="<?php echo esc_url(hph_asset('img/craft/craft-removing-soil-vertical.jpg')); ?>"
                 alt="屋根の上で瓦をめくり、雨漏りの原因を確認する職人"
                 width="1108" height="1477" loading="lazy" decoding="async">
            <figcaption class="reason__figcaption">調査から施工まで担当する職人が、瓦をめくって原因を確認しているところ</figcaption>
          </figure>
          <div class="reason__body">
            <p class="reason__num">01</p>
            <h3 class="reason__title">調査した職人が、そのまま施工します。</h3>
            <div class="reason__text">
              <p>「誰が来て、誰が直すのか分からない」——これが住宅修理で一番不安な部分です。</p>
              <p>ハッピーペイントホームは職人直営です。現地調査に伺った職人が、原因の説明も、お見積りも、施工も担当します。話が途中で伝言になることがありません。</p>
            </div>
            <dl class="reason__evidence">
              <dt>お客様へのお約束 04</dt>
              <dd>施工は調査を担当した職人が責任を持って実施いたします。</dd>
            </dl>
          </div>
        </article>

        <article class="reason__item reveal">
          <figure class="reason__figure">
            <img src="<?php echo esc_url(hph_asset('img/craft/craft-nanban-shikkui.jpg')); ?>"
                 alt="屋根の下地に南蛮漆喰を充填している様子"
                 width="1280" height="960" loading="lazy" decoding="async">
            <figcaption class="reason__figcaption">雨水の侵入経路そのものを塞ぐ工程（南蛮漆喰の充填）</figcaption>
          </figure>
          <div class="reason__body">
            <p class="reason__num">02</p>
            <h3 class="reason__title">雨漏り修理以外の工事は、<br>ご提案しません。</h3>
            <div class="reason__text">
              <p>雨漏りのご相談から、屋根の全面葺き替えや外壁塗装の話に広がっていく——という進み方をしません。</p>
              <p>施工事例をご覧いただくと分かるとおり、瓦を交換せずに修繕して雨漏りが改善したケースが数多くあります。必要な範囲を見極めることが、結果的にいちばん費用を抑えます。</p>
            </div>
            <dl class="reason__evidence">
              <dt>お客様へのお約束 01・02</dt>
              <dd>雨漏り修理以外の施工はご提案いたしません。／外壁塗装をお勧めすることはございません。</dd>
            </dl>
          </div>
        </article>

        <article class="reason__item reveal">
          <figure class="reason__figure">
            <img src="<?php echo esc_url(hph_asset('img/craft/craft-finished-nishiyodogawa.jpg')); ?>"
                 alt="大阪市西淀川区の瓦屋根 雨漏り修理の施工完了後の様子"
                 width="1280" height="960" loading="lazy" decoding="async">
            <figcaption class="reason__figcaption">大阪市西淀川区／施工完了後の屋根</figcaption>
          </figure>
          <div class="reason__body">
            <p class="reason__num">03</p>
            <h3 class="reason__title">見積書の金額以外、<br>いただきません。</h3>
            <div class="reason__text">
              <p>現地調査もお見積りも無料です。そして、お見積書に書かれた金額以外の追加料金は一切かかりません。</p>
              <p>駐車場がない場合にコインパーキングを使用しても、その料金をお客様に請求することはありません。</p>
            </div>
            <dl class="reason__evidence">
              <dt>お客様へのお約束 03</dt>
              <dd>お見積書費用外の追加料金は一切かかりません。</dd>
            </dl>
          </div>
        </article>
      </div>
    </div>
  </section>

  <!-- ===== 修理の流れ ============================================ -->
  <section class="section section--paper flow" id="flow">
    <div class="container">
      <div class="section-head reveal">
        <p class="section-head__label">Flow</p>
        <h2 class="section-head__title">雨漏り修理の流れ</h2>
        <p class="section-head__lead">ご相談から施工まで、どこで何が決まるのかをあらかじめご確認ください。調査のお立ち合いは不要です。</p>
      </div>

      <ol class="flow__list reveal">
        <li class="flow__item">
          <span class="flow__num">1</span>
          <div class="flow__head"><h3 class="flow__title">ご相談</h3></div>
          <p class="flow__text">電話・LINE・メールからご連絡ください。LINEなら雨漏りの写真を送るだけでもご相談いただけます。</p>
        </li>
        <li class="flow__item">
          <span class="flow__num">2</span>
          <div class="flow__head"><h3 class="flow__title">現地調査</h3><span class="flow__badge">無料</span></div>
          <p class="flow__text">職人が屋根やベランダに上がり、雨水の侵入経路を確認します。お立ち合いは不要です。</p>
        </li>
        <li class="flow__item">
          <span class="flow__num">3</span>
          <div class="flow__head"><h3 class="flow__title">原因のご報告</h3><span class="flow__badge">1時間</span></div>
          <p class="flow__text">どこから雨水が入っていたのか、なぜ雨漏りしたのかをご報告します。</p>
        </li>
        <li class="flow__item">
          <span class="flow__num">4</span>
          <div class="flow__head"><h3 class="flow__title">お見積り</h3><span class="flow__badge">当日中</span></div>
          <p class="flow__text">修理費用は当日中にお伝えします。お見積書費用外の追加料金は一切かかりません。</p>
        </li>
        <li class="flow__item">
          <span class="flow__num">5</span>
          <div class="flow__head"><h3 class="flow__title">施工・お引き渡し</h3></div>
          <p class="flow__text">調査を担当した職人が施工します。雨漏り保証は最大5年です。</p>
        </li>
      </ol>

      <div class="flow__note reveal">
        <h3 class="flow__note-title">調査当日のお願い</h3>
        <ul class="flow__note-list">
          <li>職人がハシゴを使用し屋根やベランダに上がりますので、ご了承のうえ、ご注意ください。</li>
          <li>ご自宅又は、ご自宅前に駐車スペースがあるかご確認ください。（コインパーキングの使用で、料金を請求することは一切ございません。）</li>
        </ul>
      </div>
    </div>
  </section>

  <!-- ===== 現場レポート（ケーススタディ） ========================= -->
  <section class="section report" id="report">
    <div class="container">
      <div class="reveal">
        <div class="report__meta">
          <span class="report__tag">大阪市西淀川区</span>
          <span class="report__tag">築65年</span>
          <span class="report__tag">瓦屋根</span>
          <span class="report__tag report__tag--price">施工費用 25万円</span>
        </div>
        <h2 class="report__title">現場レポート：<br>築65年の瓦屋根から雨漏り</h2>
        <p class="report__lead">屋根を全部葺き替えなくても、雨水が入っている場所を特定できれば直せることがあります。実際の工程を、現場の写真のままご覧ください。</p>
      </div>

      <div class="report__steps reveal">
        <figure class="report__step">
          <img src="<?php echo esc_url(hph_asset('img/works/work-35.jpg')); ?>"
               alt="築65年の瓦屋根 雨漏り修理前の状態"
               width="900" height="675" loading="lazy" decoding="async">
          <figcaption><span class="report__step-num">STEP 1</span>雨漏りしていた瓦屋根の状態を確認</figcaption>
        </figure>
        <figure class="report__step">
          <img src="<?php echo esc_url(hph_asset('img/craft/craft-removing-soil.jpg')); ?>"
               alt="瓦の下にある既存の葺き土を撤去する作業"
               width="1280" height="960" loading="lazy" decoding="async">
          <figcaption><span class="report__step-num">STEP 2</span>既存葺き土の撤去</figcaption>
        </figure>
        <figure class="report__step">
          <img src="<?php echo esc_url(hph_asset('img/craft/craft-nanban-shikkui.jpg')); ?>"
               alt="屋根の下地に南蛮漆喰を充填する作業"
               width="1280" height="960" loading="lazy" decoding="async">
          <figcaption><span class="report__step-num">STEP 3</span>南蛮漆喰の充填</figcaption>
        </figure>
        <figure class="report__step">
          <img src="<?php echo esc_url(hph_asset('img/craft/craft-finished-nishiyodogawa.jpg')); ?>"
               alt="大阪市西淀川区の瓦屋根 雨漏り修理 施工完了"
               width="1280" height="960" loading="lazy" decoding="async">
          <figcaption><span class="report__step-num">STEP 4</span>施工完了</figcaption>
        </figure>
      </div>
    </div>
  </section>

  <!-- ===== 施工事例 ============================================== -->
  <section class="section" id="works">
    <div class="container">
      <div class="section-head reveal">
        <p class="section-head__label">Works</p>
        <h2 class="section-head__title">施工事例</h2>
        <p class="section-head__lead">実際にお引き受けした雨漏り修理を、地域・工事内容・施工費用とあわせて掲載しています。写真は施工前・施工中・施工後をそのまま記録したものです。</p>
      </div>

      <p class="works__note reveal">※施工費用は当時のものです。建物の状態や雨漏りの原因によって費用は変わります。</p>

      <?php
      get_template_part('template-parts/works-grid', null, array(
        'heading' => 'h3',
        'slugs'   => array('work-01','work-03','work-06','work-02','work-09','work-23','work-31','work-34','work-19','work-29','work-11','work-16'),
      ));
      ?>

      <p class="works__more reveal">
        <a class="btn btn--ghost" href="<?php echo esc_url(hph_works_url()); ?>">施工事例をすべて見る（全35件）</a>
      </p>

      <div class="inline-cta reveal">
        <p class="inline-cta__text">似た症状の雨漏りを相談する</p>
        <p class="inline-cta__note">「うちも瓦がズレている気がする」——その段階でご連絡いただいて構いません。</p>
        <div class="inline-cta__actions">
          <a class="btn btn--line" href="<?php echo esc_url(hph_info('line_url')); ?>" target="_blank" rel="noopener">
            <svg class="btn__icon" aria-hidden="true"><use href="#i-line"></use></svg>LINEで写真を送って相談
          </a>
          <a class="btn btn--orange" href="<?php echo esc_url(hph_tel_href()); ?>">
            <svg class="btn__icon" aria-hidden="true"><use href="#i-phone"></use></svg>電話で相談する
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- ===== 料金の目安 ============================================ -->
  <section class="section section--paper" id="price">
    <div class="container container--narrow">
      <div class="section-head reveal">
        <p class="section-head__label">Price</p>
        <h2 class="section-head__title">料金の目安</h2>
        <p class="section-head__lead">実際にご依頼いただいた雨漏り修理費用の分布です。「だいたいいくらかかるのか」を、先に知っておいてください。</p>
      </div>

      <!-- 要確認（docs/content-source.md A-2）：平均施工単価は公開前に最新値へ -->
      <div class="price__chart reveal" data-bar-group>
        <div class="price__row">
          <span class="price__share">約70<small>%</small></span>
          <span class="price__range">10万円 〜 30万円</span>
          <span class="price__bar"><span class="price__bar-fill" data-bar="100"></span></span>
        </div>
        <div class="price__row">
          <span class="price__share">約20<small>%</small></span>
          <span class="price__range">30万円 〜 50万円</span>
          <span class="price__bar"><span class="price__bar-fill" data-bar="29"></span></span>
        </div>
        <div class="price__row">
          <span class="price__share">約10<small>%</small></span>
          <span class="price__range">50万円 〜 60万円</span>
          <span class="price__bar"><span class="price__bar-fill" data-bar="14"></span></span>
        </div>
      </div>

      <p class="price__avg reveal">
        <span class="price__avg-label">平均施工単価</span>
        <span class="price__avg-value"><?php echo esc_html(hph_info('avg_price')); ?><small>万円</small></span>
      </p>

      <ul class="price__points reveal">
        <li class="price__point"><svg aria-hidden="true"><use href="#i-check"></use></svg>現地調査・お見積り無料</li>
        <li class="price__point"><svg aria-hidden="true"><use href="#i-check"></use></svg>見積書費用外の追加料金なし</li>
        <li class="price__point"><svg aria-hidden="true"><use href="#i-check"></use></svg>コインパーキング代の請求なし</li>
      </ul>

      <p class="price__disclaimer reveal">※実際の費用は、建物の状態・雨漏りの原因・施工範囲によって異なります。現地調査のうえ、当日中にお見積り金額をお伝えします。</p>
    </div>
  </section>

  <!-- ===== お客様の評価 ========================================== -->
  <section class="section" id="voice">
    <div class="container container--narrow">
      <div class="section-head reveal">
        <p class="section-head__label">Voice</p>
        <h2 class="section-head__title">お客様に<br>評価いただいている点</h2>
        <p class="section-head__lead">お寄せいただくご意見のうち、特に多くいただく内容をまとめています。</p>
      </div>

      <!-- 要確認（docs/content-source.md A-4）：評価・件数は公開時点の実数に更新してください -->
      <div class="voice__rating reveal">
        <span class="voice__rating-score"><?php echo esc_html(hph_info('google_rating')); ?></span>
        <span class="voice__stars" role="img" aria-label="5段階評価で<?php echo esc_attr(hph_info('google_rating')); ?>">
          <svg aria-hidden="true"><use href="#i-star"></use></svg>
          <svg aria-hidden="true"><use href="#i-star"></use></svg>
          <svg aria-hidden="true"><use href="#i-star"></use></svg>
          <svg aria-hidden="true"><use href="#i-star"></use></svg>
          <svg aria-hidden="true"><use href="#i-star"></use></svg>
        </span>
        <span class="voice__rating-meta">Googleマップ 口コミ<?php echo esc_html(hph_info('google_reviews')); ?>件</span>
      </div>

      <ul class="voice__summary reveal">
        <li class="voice__item"><svg aria-hidden="true"><use href="#i-check"></use></svg>必要のない工事を勧められなかった</li>
        <li class="voice__item"><svg aria-hidden="true"><use href="#i-check"></use></svg>緊急性がないことを正直に説明してくれた</li>
        <li class="voice__item"><svg aria-hidden="true"><use href="#i-check"></use></svg>必要な部分だけを修理してくれた</li>
        <li class="voice__item"><svg aria-hidden="true"><use href="#i-check"></use></svg>写真を見せながら原因を説明してくれた</li>
        <li class="voice__item"><svg aria-hidden="true"><use href="#i-check"></use></svg>施工中も写真で報告があった</li>
      </ul>

      <!--
        要確認（docs/content-source.md B-5）
        実際の口コミ本文は、原文と掲載許可が確認できていないため掲載していません。
        ご提供いただき次第、下記 .voice__slot を以下の形に差し替えてください。

        <figure class="voice__card">
          <blockquote><p>（口コミ本文）</p></blockquote>
          <figcaption>大阪市○○区／60代・男性（Googleマップ）</figcaption>
        </figure>
      -->
      <div class="voice__placeholder reveal">
        <div class="voice__slot">
          <p class="voice__slot-title">口コミ掲載枠 1</p>
          <p class="voice__slot-note">掲載許可の確認後に差し替え</p>
        </div>
        <div class="voice__slot">
          <p class="voice__slot-title">口コミ掲載枠 2</p>
          <p class="voice__slot-note">掲載許可の確認後に差し替え</p>
        </div>
        <div class="voice__slot">
          <p class="voice__slot-title">口コミ掲載枠 3</p>
          <p class="voice__slot-note">掲載許可の確認後に差し替え</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ===== 職人紹介 ============================================== -->
  <section class="section section--paper craftsman" id="craftsman">
    <div class="container">
      <div class="section-head reveal">
        <p class="section-head__label">Craftsman</p>
        <h2 class="section-head__title">お伺いする職人</h2>
      </div>

      <div class="craftsman__inner">
        <figure class="craftsman__figure reveal">
          <!-- 要確認（docs/content-source.md A-7）：LINE案内バナーからの切り出し。元データ支給後に差し替え -->
          <img src="<?php echo esc_url(hph_asset('img/staff/shirai-kenji.jpg')); ?>"
               alt="ハッピーペイントホーム 代表 白井賢治"
               width="415" height="590" loading="lazy" decoding="async">
          <figcaption class="craftsman__figcaption">代表 白井賢治（写真差し替え予定）</figcaption>
        </figure>

        <div class="craftsman__body reveal">
          <p class="craftsman__role">代表</p>
          <p class="craftsman__name"><?php echo esc_html(hph_info('owner')); ?><span>職人歴 <?php echo esc_html(hph_info('owner_years')); ?>年</span></p>

          <p class="craftsman__quote">「自分の家ならどう直すか。」<br>この基準でしかご提案しません。</p>

          <div class="craftsman__text">
            <p>屋根の状態は、お住まいの方からは見えません。だからこそ、見てきた人間が、見てきたとおりにお伝えするしかないと思っています。</p>
            <p>雨漏り修理以外の施工はご提案いたしません。外壁塗装をお勧めすることもございません。お見積書費用外の追加料金は一切かかりません。そして、調査に伺った職人が最後まで担当します。</p>
            <p>「これって修理が必要なんだろうか」——その段階で構いませんので、お気軽にご相談ください。</p>
          </div>

          <!--
            要確認（docs/content-source.md B-3・B-8）
            保有資格・許可番号・経歴などをご提供いただければ、ここに追記できます。
          -->
        </div>
      </div>
    </div>
  </section>

  <!-- ===== よくある質問 ========================================== -->
  <section class="section" id="faq">
    <div class="container container--narrow">
      <div class="section-head reveal">
        <p class="section-head__label">FAQ</p>
        <h2 class="section-head__title">雨漏りのよくある質問</h2>
      </div>

      <div class="faq__list reveal">
        <div class="faq__item">
          <h3><button class="faq__q" type="button" data-faq-q aria-expanded="false" aria-controls="faq-a1">
            <span class="faq__q-mark" aria-hidden="true">Q</span><span class="faq__q-text">調査には立ち会う必要がありますか？</span><span class="faq__icon" aria-hidden="true"></span>
          </button></h3>
          <div class="faq__a" id="faq-a1" data-open="false"><div class="faq__a-inner"><p class="faq__a-text">
            <span class="faq__a-mark" aria-hidden="true">A</span><span>調査のお立ち合いは不要です。職人がハシゴを使用して屋根やベランダに上がりますので、その点だけご了承のうえ、ご注意ください。</span>
          </p></div></div>
        </div>

        <div class="faq__item">
          <h3><button class="faq__q" type="button" data-faq-q aria-expanded="false" aria-controls="faq-a2">
            <span class="faq__q-mark" aria-hidden="true">Q</span><span class="faq__q-text">雨漏りの原因や費用は、いつ分かりますか？</span><span class="faq__icon" aria-hidden="true"></span>
          </button></h3>
          <div class="faq__a" id="faq-a2" data-open="false"><div class="faq__a-inner"><p class="faq__a-text">
            <span class="faq__a-mark" aria-hidden="true">A</span><span>調査から1時間で原因をご報告します。修理費用は当日中にお伝えします。</span>
          </p></div></div>
        </div>

        <div class="faq__item">
          <h3><button class="faq__q" type="button" data-faq-q aria-expanded="false" aria-controls="faq-a3">
            <span class="faq__q-mark" aria-hidden="true">Q</span><span class="faq__q-text">現地調査やお見積りは有料ですか？</span><span class="faq__icon" aria-hidden="true"></span>
          </button></h3>
          <div class="faq__a" id="faq-a3" data-open="false"><div class="faq__a-inner"><p class="faq__a-text">
            <span class="faq__a-mark" aria-hidden="true">A</span><span>現地調査・お見積りは無料です。また、駐車スペースがなくコインパーキングを使用した場合も、その料金をご請求することは一切ございません。</span>
          </p></div></div>
        </div>

        <div class="faq__item">
          <h3><button class="faq__q" type="button" data-faq-q aria-expanded="false" aria-controls="faq-a4">
            <span class="faq__q-mark" aria-hidden="true">Q</span><span class="faq__q-text">見積りのあとに追加料金がかかりませんか？</span><span class="faq__icon" aria-hidden="true"></span>
          </button></h3>
          <div class="faq__a" id="faq-a4" data-open="false"><div class="faq__a-inner"><p class="faq__a-text">
            <span class="faq__a-mark" aria-hidden="true">A</span><span>お見積書費用外の追加料金は一切かかりません。</span>
          </p></div></div>
        </div>

        <div class="faq__item">
          <h3><button class="faq__q" type="button" data-faq-q aria-expanded="false" aria-controls="faq-a5">
            <span class="faq__q-mark" aria-hidden="true">Q</span><span class="faq__q-text">屋根の葺き替えや外壁塗装も勧められますか？</span><span class="faq__icon" aria-hidden="true"></span>
          </button></h3>
          <div class="faq__a" id="faq-a5" data-open="false"><div class="faq__a-inner"><p class="faq__a-text">
            <span class="faq__a-mark" aria-hidden="true">A</span><span>弊社から雨漏り修理以外の施工をご提案することはありません。外壁塗装をお勧めすることもございません。まずは雨漏りの原因調査からご相談ください。</span>
          </p></div></div>
        </div>

        <div class="faq__item">
          <h3><button class="faq__q" type="button" data-faq-q aria-expanded="false" aria-controls="faq-a6">
            <span class="faq__q-mark" aria-hidden="true">Q</span><span class="faq__q-text">保証はありますか？</span><span class="faq__icon" aria-hidden="true"></span>
          </button></h3>
          <div class="faq__a" id="faq-a6" data-open="false"><div class="faq__a-inner"><p class="faq__a-text">
            <span class="faq__a-mark" aria-hidden="true">A</span><span>雨漏り保証は最大5年です。保証の内容は施工内容によって異なりますので、お見積りの際にご確認ください。</span>
          </p></div></div>
        </div>

        <div class="faq__item">
          <h3><button class="faq__q" type="button" data-faq-q aria-expanded="false" aria-controls="faq-a7">
            <span class="faq__q-mark" aria-hidden="true">Q</span><span class="faq__q-text">写真を送るだけでも相談できますか？</span><span class="faq__icon" aria-hidden="true"></span>
          </button></h3>
          <div class="faq__a" id="faq-a7" data-open="false"><div class="faq__a-inner"><p class="faq__a-text">
            <span class="faq__a-mark" aria-hidden="true">A</span><span>LINEで雨漏りの写真を送っていただくだけでもご相談いただけます。屋根の点検・お見積り、修理に関するご質問もLINEで承っています。</span>
          </p></div></div>
        </div>

        <div class="faq__item">
          <h3><button class="faq__q" type="button" data-faq-q aria-expanded="false" aria-controls="faq-a8">
            <span class="faq__q-mark" aria-hidden="true">Q</span><span class="faq__q-text">対応しているエリアを教えてください。</span><span class="faq__icon" aria-hidden="true"></span>
          </button></h3>
          <div class="faq__a" id="faq-a8" data-open="false"><div class="faq__a-inner"><p class="faq__a-text">
            <span class="faq__a-mark" aria-hidden="true">A</span><span>大阪市を中心に、大阪府全域の雨漏り修理に対応しています。京都府・兵庫県でも施工実績があります。記載のない地域もお気軽にご相談ください。</span>
          </p></div></div>
        </div>
      </div>
    </div>
  </section>

  <!-- ===== 対応エリア ============================================ -->
  <section class="section section--paper" id="area">
    <div class="container">
      <div class="section-head reveal">
        <p class="section-head__label">Area</p>
        <h2 class="section-head__title">対応エリア</h2>
        <p class="section-head__lead">大阪市を中心に、大阪府全域の雨漏り修理に対応しています。以下は施工事例として掲載している、実際に施工実績のある地域です。</p>
      </div>

      <div class="reveal">
        <div class="area__group">
          <h3 class="area__group-title">大阪市内</h3>
          <ul class="area__list">
            <li>東淀川区</li><li>淀川区</li><li>西淀川区</li><li>旭区</li>
            <li>港区</li><li>東成区</li><li>西成区</li><li>阿倍野区</li>
          </ul>
        </div>
        <div class="area__group">
          <h3 class="area__group-title">大阪府内</h3>
          <ul class="area__list">
            <li>豊中市</li><li>吹田市</li><li>摂津市</li><li>守口市</li><li>寝屋川市</li>
            <li>茨木市</li><li>高槻市</li><li>東大阪市</li><li>八尾市</li><li>柏原市</li><li>堺市</li>
          </ul>
        </div>
        <div class="area__group">
          <h3 class="area__group-title">近隣府県</h3>
          <ul class="area__list">
            <li>兵庫県 尼崎市</li><li>京都市伏見区</li><li>京都市西京区</li><li>京都府綴喜郡</li>
          </ul>
        </div>
        <p class="area__note">※記載のない地域もお気軽にご相談ください。<!-- 要確認（docs/content-source.md A-5）：正式な対応エリアをご指定ください --></p>
      </div>
    </div>
  </section>

  <!-- ===== お問い合わせ ========================================== -->
  <section class="section contact" id="contact">
    <div class="container">
      <h2 class="contact__headline reveal">雨漏りについて、<br>まずは無料でご相談ください。</h2>
      <p class="contact__lead reveal">「修理が必要かどうか分からない」という段階で構いません。現地調査・お見積りは無料です。</p>

      <div class="contact__methods reveal">
        <div class="contact__card">
          <p class="contact__card-label"><svg aria-hidden="true"><use href="#i-phone"></use></svg>お電話でのご相談</p>
          <a class="contact__tel" href="<?php echo esc_url(hph_tel_href()); ?>"><?php echo esc_html(hph_info('tel_display')); ?></a>
          <a class="contact__tel-sub" href="<?php echo esc_url(hph_tel_href('mobile')); ?>"><?php echo esc_html(hph_info('mobile_display')); ?></a>
          <p class="contact__note">※営業・勧誘のお電話はご遠慮ください。<!-- 要確認（docs/content-source.md B-1）：受付時間をご指定いただければ追記します --></p>
        </div>

        <div class="contact__card">
          <p class="contact__card-label"><svg aria-hidden="true"><use href="#i-line"></use></svg>LINEでのご相談</p>
          <div class="contact__line-body">
            <div class="contact__qr-wrap">
              <img class="contact__qr" src="<?php echo esc_url(hph_asset('img/line/line-qr.jpg')); ?>"
                   alt="ハッピーペイントホームのLINE友だち追加用QRコード"
                   width="520" height="520" loading="lazy" decoding="async">
              <p class="contact__qr-note">パソコンの方はこちら</p>
            </div>
            <div>
              <p class="contact__line-text"><strong>写真を送るだけでご相談いただけます。</strong><br>雨漏りのご相談／屋根の点検・見積り／修理のご質問を承っています。</p>
              <p class="contact__line-action">
                <a class="btn btn--line" href="<?php echo esc_url(hph_info('line_url')); ?>" target="_blank" rel="noopener">
                  <svg class="btn__icon" aria-hidden="true"><use href="#i-line"></use></svg>LINEで無料相談
                </a>
              </p>
            </div>
          </div>
        </div>
      </div>

      <div class="contact__sub reveal">
        <a class="contact__sub-link" href="mailto:<?php echo esc_attr(hph_info('email')); ?>">
          <svg aria-hidden="true"><use href="#i-mail"></use></svg>
          <span><?php echo esc_html(hph_info('email')); ?><span class="contact__sub-link-note">原則当日中にご返信いたします</span></span>
        </a>
        <a class="contact__sub-link" href="<?php echo esc_url(hph_info('instagram')); ?>" target="_blank" rel="noopener">
          <svg aria-hidden="true"><use href="#i-instagram"></use></svg>
          <span>Instagram<span class="contact__sub-link-note">施工事例を随時更新しています</span></span>
        </a>
      </div>
    </div>
  </section>

  <!-- ===== 会社概要 ============================================== -->
  <section class="section section--tight" id="company">
    <div class="container container--narrow">
      <div class="section-head reveal">
        <p class="section-head__label">Company</p>
        <h2 class="section-head__title">会社概要</h2>
      </div>

      <table class="company__table reveal">
        <tbody>
          <tr><th>屋号</th><td><?php echo esc_html(hph_info('shop_name')); ?>（<?php echo esc_html(hph_info('shop_legal')); ?>）</td></tr>
          <tr><th>代表</th><td><?php echo esc_html(hph_info('owner')); ?>（職人歴<?php echo esc_html(hph_info('owner_years')); ?>年）</td></tr>
          <tr><th>所在地</th><td><?php echo esc_html(hph_info('address')); ?></td></tr>
          <tr><th>電話番号</th><td><a href="<?php echo esc_url(hph_tel_href()); ?>"><?php echo esc_html(hph_info('tel_display')); ?></a> ／ <a href="<?php echo esc_url(hph_tel_href('mobile')); ?>"><?php echo esc_html(hph_info('mobile_display')); ?></a></td></tr>
          <tr><th>メール</th><td><a href="mailto:<?php echo esc_attr(hph_info('email')); ?>"><?php echo esc_html(hph_info('email')); ?></a></td></tr>
          <tr><th>事業内容</th><td>雨漏り修理／屋根修理／屋根塗装／外壁補修／防水工事</td></tr>
          <tr><th>対応エリア</th><td>大阪市を中心に大阪府全域（京都府・兵庫県でも施工実績あり）</td></tr>
          <tr><th>保証</th><td>雨漏り保証 最大5年</td></tr>
          <!--
            要確認（docs/content-source.md B-1〜B-4）
            以下の項目は情報が確認できていないため掲載していません。
            ご提供いただければ、この形式で追記できます。
            <tr><th>営業時間</th><td>　</td></tr>
            <tr><th>定休日</th><td>　</td></tr>
            <tr><th>設立</th><td>　</td></tr>
            <tr><th>保有資格</th><td>　</td></tr>
            <tr><th>支払方法</th><td>　</td></tr>
          -->
        </tbody>
      </table>
    </div>
  </section>
</main>
<?php get_footer();
