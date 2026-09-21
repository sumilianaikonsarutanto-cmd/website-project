<?php
/**
 * トップページ（1ページ完結）
 *
 * @package Stern
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
get_header();
?>
<main id="main">

  <!-- ===== 01 ファーストビュー ===================================== -->
  <section class="hero">
    <div class="hero__inner">
      <div class="hero__copy">
        <p class="hero__eyebrow">
          <svg class="icon" aria-hidden="true"><use href="#i-sparkle"></use></svg>
          大阪市東淀川区の不用品回収・リサイクル回収
        </p>
        <h1 class="hero__title">不用品を片付ける。<br>暮らしまで、すっきり。</h1>
        <p class="hero__lead">
          家具・家電・引っ越し時の不用品など、<br class="br-hero">
          面倒な片付けをまとめてサポート。<br class="br-pc">
          迅速・丁寧な対応で、<br class="br-hero">
          初めての方にも安心してご相談いただけます。
        </p>
        <div class="hero__actions">
          <a class="btn btn--primary btn--lg" href="<?php echo esc_url( stern_section_url('contact') ); ?>">無料見積もりを依頼する</a>
          <a class="btn btn--outline btn--lg" href="<?php echo esc_attr( stern_phone_href() ); ?>">
            <svg class="icon" aria-hidden="true"><use href="#i-phone"></use></svg>
            電話で相談する
          </a>
        </div>
        <p class="hero__note">「これも回収できる？」のご相談だけでもかまいません。まずはお気軽にどうぞ。</p>
      </div>

      <div class="hero__visual">
        <!-- デモ画像（docs/content-source.md C-1）：ステルンの実写真ではありません。
             店舗提供写真の支給後、src / alt / width / height を差し替えてください。 -->
        <figure class="photo photo--hero">
          <img class="photo__img"
               src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/photo/hero.webp"
               alt="デモ画像：室内からソファを搬出する作業のイメージ（ステルンの実際の作業写真ではありません）"
               width="1152" height="864" fetchpriority="high">
          <figcaption class="photo__badge">デモ画像</figcaption>
        </figure>
      </div>
    </div>

    <!-- 事実のみを並べた信頼バー -->
    <div class="hero__factsbar">
      <ul class="hero__facts">
        <li class="hero__fact">
          <svg class="icon icon--star" aria-hidden="true"><use href="#i-star"></use></svg>
          <span><b>5.0</b>／Googleマップのクチコミ13件</span>
        </li>
        <li class="hero__fact">
          <svg class="icon" aria-hidden="true"><use href="#i-pin"></use></svg>
          <span>大阪市東淀川区 北江口</span>
        </li>
        <li class="hero__fact">
          <svg class="icon" aria-hidden="true"><use href="#i-clock"></use></svg>
          <span>受付 <?php echo esc_html( stern_hours() ); ?></span>
        </li>
      </ul>
    </div>
  </section>

  <!-- ===== 02 こんなお悩みありませんか？ ============================ -->
  <section class="section section--paper" id="worry">
    <div class="container container--narrow">
      <div class="section-head reveal">
        <p class="section-head__label">Worries</p>
        <h2 class="section-head__title">こんなお悩み、<br class="br-sp">ありませんか？</h2>
      </div>

      <ul class="worry-list">
        <li class="worry reveal">
          <svg class="icon worry__icon" aria-hidden="true"><use href="#i-check"></use></svg>
          引っ越しで、不用品が大量に出てしまった
        </li>
        <li class="worry reveal">
          <svg class="icon worry__icon" aria-hidden="true"><use href="#i-check"></use></svg>
          大きな家具・家電を、自分では運び出せない
        </li>
        <li class="worry reveal">
          <svg class="icon worry__icon" aria-hidden="true"><use href="#i-check"></use></svg>
          できるだけ急いで片付けたい
        </li>
        <li class="worry reveal">
          <svg class="icon worry__icon" aria-hidden="true"><use href="#i-check"></use></svg>
          どこに頼めばいいのか分からない
        </li>
        <li class="worry reveal">
          <svg class="icon worry__icon" aria-hidden="true"><use href="#i-check"></use></svg>
          料金がいくらかかるのか不安
        </li>
      </ul>

      <p class="worry-close reveal">そんな時は、<b>ステルン</b>にご相談ください。</p>
    </div>
  </section>

  <!-- ===== 03 ステルンが選ばれる理由 =============================== -->
  <section class="section" id="reason">
    <div class="container">
      <div class="section-head reveal">
        <p class="section-head__label">Reason</p>
        <h2 class="section-head__title">早い。丁寧。安心。<br>ステルンが選ばれる理由</h2>
        <p class="section-head__lead">不用品回収は、金額だけで選べるサービスではありません。家に人を招いて、その場で作業をお任せすることになるからです。ステルンが大切にしているのは、次の3つです。</p>
      </div>

      <!-- 均一なカードを並べず、罫線で区切った3つの柱として見せる -->
      <div class="reasons">
        <article class="reason reveal">
          <p class="reason__num">01</p>
          <h3 class="reason__title">迅速な対応</h3>
          <p class="reason__body">「早く片付けたい」という時に、スムーズな対応を。お問い合わせから回収まで、できるだけお待たせしないよう進めます。</p>
          <p class="reason__proof">クチコミでの評価：対応の速さ／作業スピード</p>
        </article>

        <article class="reason reveal">
          <p class="reason__num">02</p>
          <h3 class="reason__title">丁寧で親切な対応</h3>
          <p class="reason__body">不用品を運び出すだけの作業にしません。お客様が安心して任せられるよう、一つひとつの対応を大切にしています。</p>
          <p class="reason__proof">クチコミでの評価：丁寧な作業／スタッフの感じの良さ</p>
        </article>

        <article class="reason reveal">
          <p class="reason__num">03</p>
          <h3 class="reason__title">分かりやすい料金</h3>
          <p class="reason__body">「いくらかかるか分からない」という不安をできるだけ減らせるよう、内容をうかがったうえで分かりやすいお見積もりをお伝えします。</p>
          <p class="reason__proof">クチコミでの評価：分かりやすい料金／柔軟な対応</p>
        </article>
      </div>

      <div class="inline-cta reveal">
        <p class="inline-cta__text">気になることがあれば、作業をご依頼いただく前にご相談ください。</p>
        <a class="btn btn--primary" href="<?php echo esc_url( stern_section_url('contact') ); ?>">相談してみる</a>
      </div>
    </div>
  </section>

  <!-- ===== 04 対応サービス ========================================= -->
  <section class="section section--paper" id="service">
    <div class="container">
      <div class="section-head reveal">
        <p class="section-head__label">Service</p>
        <h2 class="section-head__title">不用品の回収・リサイクルを<br class="br-pc">まとめてサポート</h2>
        <p class="section-head__lead">ご家庭の不用品から、オフィス・店舗の什器まで。「これは頼めるのだろうか」と迷うものも、まずはお聞かせください。</p>
      </div>

      <div class="service">
        <div class="service__visual reveal">
          <!-- デモ画像（docs/content-source.md C-2）：店舗提供写真の支給後に差し替え -->
          <figure class="photo photo--tall">
            <img class="photo__img"
                 src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/photo/service.webp"
                 alt="デモ画像：家具・家電を積み込んだ回収車両のイメージ（ステルンの実際の車両ではありません）"
                 width="864" height="1152" loading="lazy">
            <figcaption class="photo__badge">デモ画像</figcaption>
          </figure>
        </div>

        <div class="service__list">
          <article class="service-item reveal">
            <h3 class="service-item__title">家具</h3>
            <p class="service-item__body">使わなくなった家具の回収についてご相談いただけます。ご自分では運び出せない大きなものも、お声がけください。</p>
          </article>
          <article class="service-item reveal">
            <h3 class="service-item__title">家電</h3>
            <p class="service-item__body">ご家庭の家電の回収についてご相談いただけます。品目によって取り扱いの条件が異なる場合があります。</p>
          </article>
          <article class="service-item reveal">
            <h3 class="service-item__title">リサイクル回収</h3>
            <p class="service-item__body">まだ使えるものは、リサイクル・リユースを前提とした回収も行っています。</p>
          </article>
          <article class="service-item reveal">
            <h3 class="service-item__title">オフィス・店舗什器</h3>
            <p class="service-item__body">オフィスや店舗の移転・整理などに伴う什器の回収にも対応しています。</p>
          </article>
          <article class="service-item reveal">
            <h3 class="service-item__title">パソコン・情報機器</h3>
            <p class="service-item__body">パソコンなどの情報機器について、買取・リユースのご相談を承っています。</p>
          </article>
          <article class="service-item reveal">
            <h3 class="service-item__title">趣味・娯楽用品</h3>
            <p class="service-item__body">趣味・娯楽に関する用品の回収についてもご相談いただけます。</p>
          </article>

          <p class="service__note reveal">
            ※回収できる品目・条件は、内容や状態によって異なります。判断に迷うものは、お問い合わせの際にお知らせください。
          </p>
          <p class="reveal">
            <a class="btn btn--outline" href="<?php echo esc_url( stern_section_url('contact') ); ?>">回収できるか相談する</a>
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- ===== 05 料金・見積もり ======================================= -->
  <section class="section" id="price">
    <div class="container container--narrow">
      <div class="section-head reveal">
        <p class="section-head__label">Price</p>
        <h2 class="section-head__title">料金が分からないからこそ、<br class="br-pc">まずはご相談ください</h2>
        <p class="section-head__lead">不用品回収の費用は、「何を」「どれくらい」「どんな場所から」運び出すかで変わります。そのため、Webサイト上の一律の金額ではなく、内容をうかがったうえでお見積もりをお伝えしています。</p>
      </div>

      <!-- 料金表は未提供のため掲載しない。代わりに「金額が決まる仕組み」を示す -->
      <div class="factors reveal">
        <h3 class="factors__title">お見積もりは、この3つで決まります</h3>
        <ol class="factors__list">
          <li class="factor">
            <span class="factor__num">01</span>
            <span class="factor__body"><b>品目</b>家具・家電など、何を回収するか。買取・リユースできるものが含まれる場合もあります。</span>
          </li>
          <li class="factor">
            <span class="factor__num">02</span>
            <span class="factor__body"><b>量</b>1点だけなのか、お部屋まるごとなのか。量によって作業の規模が変わります。</span>
          </li>
          <li class="factor">
            <span class="factor__num">03</span>
            <span class="factor__body"><b>搬出の条件</b>階数、エレベーターの有無、車を停められる場所など、現場の状況。</span>
          </li>
        </ol>
        <p class="factors__note">お問い合わせの際にこの3つを分かる範囲でお知らせいただくと、お見積もりがスムーズです。写真でお伝えいただいてもかまいません。</p>
      </div>

      <div class="callout reveal">
        <p class="callout__lead">「まずは見積もりだけ」でもお気軽に。</p>
        <p class="callout__body">金額を確認してからご判断いただけます。内容をうかがったうえで、お見積もりをお伝えします。</p>
        <a class="btn btn--primary btn--lg" href="<?php echo esc_url( stern_section_url('contact') ); ?>">料金について相談する</a>
      </div>
      <!-- 要確認（docs/content-source.md B-5）：
           料金表・無料見積もりの条件・追加料金の取り扱い・キャンセル規定が確定しましたら、
           このセクションに「料金の目安」表を追加してください。 -->
    </div>
  </section>

  <!-- ===== 06 作業事例 ============================================= -->
  <section class="section section--paper" id="works">
    <div class="container">
      <div class="section-head reveal">
        <p class="section-head__label">Works</p>
        <h2 class="section-head__title">実際の作業をご紹介</h2>
        <p class="section-head__lead">現在はレイアウト確認用のデモ画像です。実際にお引き受けした回収の様子は、店舗様から写真をご提供いただき次第、差し替えます。</p>
      </div>

      <!-- デモ画像（docs/content-source.md C-3）：実事例の写真・内容の支給後に差し替え -->
      <div class="cases">
        <article class="case reveal">
          <p class="case__label">CASE 01</p>
          <h3 class="case__title">引っ越しに伴う不用品回収<span class="case__demo">（デモ）</span></h3>
          <div class="case__pair">
            <figure class="case__shot">
              <div class="photo photo--case">
                <img class="photo__img"
                     src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/photo/case01-before.webp"
                     alt="デモ画像：作業前の部屋のイメージ"
                     width="960" height="720" loading="lazy">
                <span class="photo__badge">デモ</span>
              </div>
              <figcaption>作業前</figcaption>
            </figure>
            <figure class="case__shot">
              <div class="photo photo--case">
                <img class="photo__img"
                     src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/photo/case01-after.webp"
                     alt="デモ画像：作業後の部屋のイメージ"
                     width="960" height="720" loading="lazy">
                <span class="photo__badge">デモ</span>
              </div>
              <figcaption>作業後</figcaption>
            </figure>
          </div>
          <p class="case__body">実際の作業内容は、店舗様からのご提供後に掲載します。</p>
        </article>

        <article class="case reveal">
          <p class="case__label">CASE 02</p>
          <h3 class="case__title">家具・家電の回収<span class="case__demo">（デモ）</span></h3>
          <div class="case__pair">
            <figure class="case__shot">
              <div class="photo photo--case">
                <img class="photo__img"
                     src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/photo/case02-before.webp"
                     alt="デモ画像：作業前のキッチン周りのイメージ"
                     width="960" height="720" loading="lazy">
                <span class="photo__badge">デモ</span>
              </div>
              <figcaption>作業前</figcaption>
            </figure>
            <figure class="case__shot">
              <div class="photo photo--case">
                <img class="photo__img"
                     src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/img/photo/case02-after.webp"
                     alt="デモ画像：作業後のキッチン周りのイメージ"
                     width="960" height="720" loading="lazy">
                <span class="photo__badge">デモ</span>
              </div>
              <figcaption>作業後</figcaption>
            </figure>
          </div>
          <p class="case__body">実際の作業内容は、店舗様からのご提供後に掲載します。</p>
        </article>
      </div>
    </div>
  </section>

  <!-- ===== 07 お客様からの評価 ===================================== -->
  <section class="section voice" id="voice">
    <div class="container container--narrow">
      <div class="section-head section-head--light reveal">
        <p class="section-head__label">Voice</p>
        <h2 class="section-head__title">「頼んでよかった」の声</h2>
      </div>

      <div class="rating reveal">
        <p class="rating__stars" aria-hidden="true">
          <svg class="icon"><use href="#i-star"></use></svg>
          <svg class="icon"><use href="#i-star"></use></svg>
          <svg class="icon"><use href="#i-star"></use></svg>
          <svg class="icon"><use href="#i-star"></use></svg>
          <svg class="icon"><use href="#i-star"></use></svg>
        </p>
        <p class="rating__score"><b>5.0</b><span>／ Googleマップのクチコミ 13件</span></p>
      </div>

      <p class="voice__lead reveal">お寄せいただいているクチコミには、次のような評価が多く見られます。</p>

      <ul class="tags reveal">
        <li class="tag">対応の速さ</li>
        <li class="tag">作業スピード</li>
        <li class="tag">丁寧な作業</li>
        <li class="tag">スタッフの感じの良さ</li>
        <li class="tag">分かりやすい料金</li>
        <li class="tag">柔軟な対応</li>
        <li class="tag">信頼感</li>
        <li class="tag">作業品質</li>
      </ul>

      <p class="voice__note reveal">※Googleマップに寄せられたクチコミの傾向をまとめたものです。本文の転載は行っていません。評価・件数は変動します。</p>

      <div class="inline-cta inline-cta--light reveal">
        <p class="inline-cta__text">気になる点があれば、ご依頼の前に何でもお尋ねください。</p>
        <a class="btn btn--accent" href="<?php echo esc_url( stern_section_url('contact') ); ?>">まずは相談する</a>
      </div>
    </div>
  </section>

  <!-- ===== 08 ご利用の流れ ========================================= -->
  <section class="section" id="flow">
    <div class="container">
      <div class="section-head reveal">
        <p class="section-head__label">Flow</p>
        <h2 class="section-head__title">ご相談から回収まで、<br class="br-sp">かんたん4ステップ</h2>
        <p class="section-head__lead">初めてでも迷わないよう、ご依頼の流れをご案内します。</p>
      </div>

      <ol class="steps">
        <li class="step reveal">
          <p class="step__num"><span>STEP</span>01</p>
          <h3 class="step__title">お問い合わせ</h3>
          <p class="step__body">お電話またはお問い合わせフォームからご相談ください。不用品の種類や量を、分かる範囲でお知らせください。</p>
        </li>
        <li class="step reveal">
          <p class="step__num"><span>STEP</span>02</p>
          <h3 class="step__title">内容の確認・お見積もり</h3>
          <p class="step__body">回収するものや搬出の条件をうかがい、お見積もりをお伝えします。</p>
        </li>
        <li class="step reveal">
          <p class="step__num"><span>STEP</span>03</p>
          <h3 class="step__title">ご依頼</h3>
          <p class="step__body">内容と金額をご確認のうえ、ご依頼ください。作業の日程を調整します。</p>
        </li>
        <li class="step reveal">
          <p class="step__num"><span>STEP</span>04</p>
          <h3 class="step__title">回収・作業</h3>
          <p class="step__body">当日はスタッフがうかがい、不用品を搬出・回収します。</p>
        </li>
      </ol>

      <div class="inline-cta reveal">
        <p class="inline-cta__text">ご依頼を決める前の段階でも、お問い合わせいただけます。</p>
        <a class="btn btn--primary" href="<?php echo esc_url( stern_section_url('contact') ); ?>">まずは相談してみる</a>
      </div>
    </div>
  </section>

  <!-- ===== 09 よくある質問 ========================================= -->
  <section class="section section--paper" id="faq">
    <div class="container container--narrow">
      <div class="section-head reveal">
        <p class="section-head__label">FAQ</p>
        <h2 class="section-head__title">よくあるご質問</h2>
      </div>

      <div class="faq">
        <div class="faq__item reveal">
          <h3>
            <button class="faq__q" type="button" aria-expanded="false" aria-controls="faq-a1" data-faq-q>
              どんな不用品を回収できますか？
              <span class="faq__mark" aria-hidden="true"></span>
            </button>
          </h3>
          <div class="faq__a" id="faq-a1" data-open="false">
            <p>家具・家電をはじめ、オフィス・店舗什器、パソコンなどの情報機器についてご相談いただけます。品目や状態によってお受けできない場合もありますので、判断に迷うものはお問い合わせの際にお知らせください。</p>
          </div>
        </div>

        <div class="faq__item reveal">
          <h3>
            <button class="faq__q" type="button" aria-expanded="false" aria-controls="faq-a2" data-faq-q>
              見積もりだけでも相談できますか？
              <span class="faq__mark" aria-hidden="true"></span>
            </button>
          </h3>
          <div class="faq__a" id="faq-a2" data-open="false">
            <p>「まずは金額だけ知りたい」というご相談も承っています。お電話またはお問い合わせフォームから、不用品の種類や量を分かる範囲でお知らせください。</p>
          </div>
        </div>

        <div class="faq__item reveal">
          <h3>
            <button class="faq__q" type="button" aria-expanded="false" aria-controls="faq-a3" data-faq-q>
              急いでいるのですが、相談できますか？
              <span class="faq__mark" aria-hidden="true"></span>
            </button>
          </h3>
          <div class="faq__a" id="faq-a3" data-open="false">
            <p>お急ぎの場合も、まずはご希望の日程をお知らせください。できるだけ早く対応できるよう日程を調整いたします。</p>
          </div>
        </div>

        <div class="faq__item reveal">
          <h3>
            <button class="faq__q" type="button" aria-expanded="false" aria-controls="faq-a4" data-faq-q>
              大きな家具も回収してもらえますか？
              <span class="faq__mark" aria-hidden="true"></span>
            </button>
          </h3>
          <div class="faq__a" id="faq-a4" data-open="false">
            <p>ご自分では運び出せない大きな家具についてもご相談いただけます。搬出経路や階数、エレベーターの有無などをお知らせいただくと、お見積もりがスムーズです。</p>
          </div>
        </div>

        <div class="faq__item reveal">
          <h3>
            <button class="faq__q" type="button" aria-expanded="false" aria-controls="faq-a5" data-faq-q>
              オフィスや店舗の不用品も相談できますか？
              <span class="faq__mark" aria-hidden="true"></span>
            </button>
          </h3>
          <div class="faq__a" id="faq-a5" data-open="false">
            <p>オフィス・店舗什器の回収にも対応しています。移転・整理・入れ替えなどに伴う回収について、内容をお聞かせください。</p>
          </div>
        </div>

        <div class="faq__item reveal">
          <h3>
            <button class="faq__q" type="button" aria-expanded="false" aria-controls="faq-a6" data-faq-q>
              料金はいくらぐらいかかりますか？
              <span class="faq__mark" aria-hidden="true"></span>
            </button>
          </h3>
          <div class="faq__a" id="faq-a6" data-open="false">
            <p>不用品の品目・量・搬出の条件によって変わるため、一律の金額をお伝えすることができません。内容をうかがったうえでお見積もりをお伝えしますので、まずはお問い合わせください。</p>
          </div>
        </div>
      </div>
      <!-- 要確認（docs/content-source.md B-4 / B-6）：
           対応エリア・支払い方法・キャンセル規定・許認可が確定しましたら、
           FAQ と <head> の FAQPage 構造化データの両方に追記してください。 -->
    </div>
  </section>

  <!-- ===== 10 最終CTA・お問い合わせ ================================= -->
  <section class="section contact" id="contact">
    <div class="container">
      <div class="contact__head reveal">
        <p class="section-head__label">Contact</p>
        <h2 class="contact__title">不用品のことでお困りなら、<br class="br-pc">まずはステルンへご相談ください。</h2>
        <p class="contact__lead">
          「何を回収してもらえる？」<br>
          「どれくらい費用がかかる？」<br>
          「自分の場合でも頼める？」<br>
          そんな疑問も、まずはお気軽にご相談ください。
        </p>
      </div>

      <div class="contact__grid">
        <!-- 電話 -->
        <div class="contact__card reveal">
          <h3 class="contact__card-title">
            <svg class="icon" aria-hidden="true"><use href="#i-phone"></use></svg>
            お電話でのご相談
          </h3>
          <a class="contact__tel" href="<?php echo esc_attr( stern_phone_href() ); ?>"><?php echo esc_html( stern_phone() ); ?></a>
          <p class="contact__card-note">受付時間 <?php echo esc_html( stern_hours() ); ?></p>
          <a class="btn btn--accent btn--block" href="<?php echo esc_attr( stern_phone_href() ); ?>">電話で相談する</a>
        </div>

        <!-- LINE -->
        <div class="contact__card reveal">
          <h3 class="contact__card-title">
            <svg class="icon" aria-hidden="true"><use href="#i-line"></use></svg>
            LINEでのご相談
          </h3>
          <p class="contact__card-body">写真を送っていただくと、状況が伝わりやすくなります。</p>
          <!-- 要確認（docs/content-source.md B-8）：
               公式LINEのURLをご支給いただき次第、下の span を
               <a class="btn btn--accent btn--block" href="https://lin.ee/xxxxxxx">LINEで相談する</a> に差し替えてください。 -->
          <?php if ( stern_line_url() ) : ?>
          <a class="btn btn--accent btn--block" href="<?php echo esc_url( stern_line_url() ); ?>" target="_blank" rel="noopener">LINEで相談する</a>
          <?php else : ?>
          <span class="btn btn--disabled btn--block" aria-disabled="true">LINEの受付は準備中です</span>
          <?php endif; ?>
        </div>
      </div>

      <!-- フォーム -->
      <div class="form-wrap reveal">
        <h3 class="form-wrap__title">お問い合わせフォーム</h3>
        <p class="form-wrap__lead">不用品の種類や量など、分かる範囲でお聞かせください。折り返しご連絡いたします。</p>

        <!-- 要確認（docs/content-source.md B-9）：
             送信先が未定のため action は空にしています。
             WordPress 化の際は Contact Form 7 等のショートコードに置き換える想定です。 -->
        <?php if ( isset($_GET['contact']) && $_GET['contact'] === 'sent' ) : ?>
        <p class="form-wrap__lead" role="status">お問い合わせを受け付けました。折り返しご連絡いたします。</p>
        <?php elseif ( isset($_GET['contact']) && $_GET['contact'] === 'error' ) : ?>
        <p class="form-wrap__lead" role="alert">送信できませんでした。お手数ですがお電話でご連絡ください。</p>
        <?php endif; ?>

        <form class="form" action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post">
          <?php wp_nonce_field('stern_contact', 'stern_contact_nonce'); ?>
          <input type="hidden" name="action" value="stern_contact">
          <div class="form__row">
            <label class="form__label" for="f-name">お名前 <span class="form__req">必須</span></label>
            <input class="form__input" type="text" id="f-name" name="name" autocomplete="name" required>
          </div>
          <div class="form__row">
            <label class="form__label" for="f-tel">お電話番号 <span class="form__req">必須</span></label>
            <input class="form__input" type="tel" id="f-tel" name="tel" autocomplete="tel" inputmode="tel" required>
          </div>
          <div class="form__row">
            <label class="form__label" for="f-mail">メールアドレス</label>
            <input class="form__input" type="email" id="f-mail" name="email" autocomplete="email" inputmode="email">
          </div>
          <div class="form__row">
            <label class="form__label" for="f-area">回収場所の地域</label>
            <input class="form__input" type="text" id="f-area" name="area" placeholder="例：大阪市東淀川区">
          </div>
          <div class="form__row">
            <label class="form__label" for="f-body">回収をご希望のもの・ご相談内容 <span class="form__req">必須</span></label>
            <textarea class="form__input form__input--area" id="f-body" name="message" rows="5" placeholder="例：引っ越しに伴い、ソファとテーブル、冷蔵庫の回収をお願いしたいです。マンション3階、エレベーターあり。" required></textarea>
          </div>
          <p class="form__privacy">ご入力いただいた内容は、お問い合わせへの対応のために使用します。</p>
          <button class="btn btn--accent btn--lg btn--block" type="submit">この内容で問い合わせる</button>
        </form>
      </div>
    </div>
  </section>

  <!-- ===== 11 アクセス・会社情報 ==================================== -->
  <section class="section section--tight" id="access">
    <div class="container">
      <div class="section-head reveal">
        <p class="section-head__label">Access</p>
        <h2 class="section-head__title">アクセス・事業者情報</h2>
      </div>

      <div class="access">
        <div class="access__info reveal">
          <dl class="info">
            <div class="info__row">
              <dt>事業者名</dt>
              <dd>ステルン</dd>
            </div>
            <div class="info__row">
              <dt>所在地</dt>
              <dd>〒533-0002<br>大阪府大阪市東淀川区北江口4丁目2-8</dd>
            </div>
            <div class="info__row">
              <dt>電話番号</dt>
              <dd><a href="<?php echo esc_attr( stern_phone_href() ); ?>"><?php echo esc_html( stern_phone() ); ?></a></dd>
            </div>
            <div class="info__row">
              <dt>営業時間</dt>
              <dd><?php echo esc_html( stern_hours() ); ?></dd>
            </div>
            <div class="info__row">
              <dt>事業内容</dt>
              <dd>不用品回収・リサイクル回収、オフィス／店舗什器の回収、パソコン・情報機器の買取・リユース</dd>
            </div>
            <!-- 要確認（docs/content-source.md B-2 / B-3 / B-4 / B-6）：
                 定休日・対応エリア・法人格／代表者名・許認可番号・支払い方法が確定しましたら、
                 この <dl> に行を追加してください。 -->
          </dl>
        </div>

        <div class="access__map reveal">
          <iframe
            title="ステルンの所在地（Googleマップ）"
            src="https://www.google.com/maps?q=%E5%A4%A7%E9%98%AA%E5%BA%9C%E5%A4%A7%E9%98%AA%E5%B8%82%E6%9D%B1%E6%B7%80%E5%B7%9D%E5%8C%BA%E5%8C%97%E6%B1%9F%E5%8F%A34-2-8&output=embed"
            loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>
    </div>
  </section>

</main>


<?php
get_footer();
