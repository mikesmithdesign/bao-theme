<?php get_header();
echo get_template_part('template-parts/part', 'header');
if (have_rows('page_banner')) : while (have_rows('page_banner')) : the_row();
        $images = get_sub_field('slider');
        if ($images) : ?>
<div class="title-banner careers">
  <div class="banner-slider">
    <?php foreach ($images as $image) : ?>
    <div class="banner-slide" style="background-image: url('<?php echo esc_url($image['url']); ?>')"></div>
    <?php endforeach; ?>
  </div>
  <?php endif; ?>
  <div class="container">
    <h1><?php the_title(); ?> <span><?php the_sub_field('mandarin'); ?></span></h1>
  </div>
</div>
<?php endwhile;
endif; ?>

<div class="page-intro careers">
  <div class="container">
    <?php the_content(); ?>
  </div>
</div>


<?php echo get_template_part('template-parts/part', 'footer');
    get_footer(); ?>