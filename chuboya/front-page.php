<?php
/**
 * フロントページ（現行ホームページと同一のセクション構成）
 */
if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>
<main id="main">

<?php
get_template_part('template-parts/section', 'hero');
get_template_part('template-parts/section', 'about');
get_template_part('template-parts/section', 'reasons');
get_template_part('template-parts/section', 'menu');
get_template_part('template-parts/section', 'lunch');
get_template_part('template-parts/section', 'night');
get_template_part('template-parts/section', 'seats');
get_template_part('template-parts/section', 'voices');
get_template_part('template-parts/section', 'access');
get_template_part('template-parts/section', 'faq');
get_template_part('template-parts/section', 'cta');
?>

</main>
<?php
get_footer();
