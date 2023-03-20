<?php get_header();
echo get_template_part('template-parts/part', 'header'); ?>

<div class="title-banner">
  <div class="banner-slider">
    <?php $banner = get_field('banner_image'); ?>
    <div class="banner-slide" style="background-image: url('<?php echo esc_url($banner['url']); ?>')"></div>

  </div>
  <div class="container">
    <h1><?php the_title(); ?> <span><?php the_field('mandarin_title'); ?></span></h1>
  </div>
</div>

<article>
  <div class="images">
    <?php if (have_rows('images')) : ?>
    <div class="image-slider">
      <?php while (have_rows('images')) : the_row(); ?>
      <div class="image-slide">
        <?php $image = get_sub_field('image'); ?>
        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
        <?php if (have_rows('caption')) : while (have_rows('caption')) : the_row(); ?>
        <div class="caption">
          <h3><?php the_sub_field('text'); ?> <span><?php the_sub_field('mandarin'); ?> </span></h3>
        </div>
        <?php endwhile;
            endif; ?>
      </div>
      <?php endwhile; ?>
    </div>
    <?php endif; ?>
  </div>
  <div class="text">
    <p>WRITTEN BY <?php the_field('author'); ?> <br />
      PUBLISHED ON <?php echo get_the_date(); ?>
    </p>
    <?php the_field('content'); ?>
  </div>
  <div class="back-bar">
    <a href="/our-blog">Back to blogs <span>返回博客</span></a>
  </div>
</article>

<?php echo get_template_part('template-parts/part', 'footer');
get_footer(); ?>