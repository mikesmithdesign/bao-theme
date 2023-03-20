<?php get_header();
echo get_template_part('template-parts/part', 'header');
if (have_rows('page_banner')) : while (have_rows('page_banner')) : the_row();
    $images = get_sub_field('slider');
    if ($images) : ?>
<div class="title-banner">
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
endif;

$posts = new WP_Query(array(
  'post_type' => 'post',
  'posts_per_page' => -1
));
if ($posts->have_posts()) :  ?>

<div class="link-boxes blog">

  <?php while ($posts->have_posts()) : $posts->the_post();
  $image = get_field('listing_image'); ?>
  <div class="link-box">
    <div class="box-slider-container">
      <div class="box-slider">
        <div class="box-slide" style="background-image: url('<?php echo esc_url($image['url']); ?>')"></div>
      </div>
    </div>
    <div class="box-title">
      <h2><?php the_title(); ?> <span><?php the_field('mandarin_title'); ?></span></h2>
      <div class="buttons">
        <a href="<?php the_permalink(); ?>">Read More</a>
      </div>
    </div>
    <div class="box-text">
      <p>
        <?php the_field('snippet'); ?>
      </p>
    </div>
  </div>
  <?php endwhile; ?>
</div>

<?php endif; ?>

<?php echo get_template_part('template-parts/part', 'footer');
  get_footer(); ?>