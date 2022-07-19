<?php get_header();
echo get_template_part('template-parts/part', 'header');

if (have_rows('hero')) : while (have_rows('hero')) : the_row(); ?>
    <div class="hero">
      <div class="tint" style="opacity: <?php the_sub_field('tint_opacity'); ?>"></div>
      <video src="<?php the_sub_field('video_link'); ?>" autoplay muted playsinline loop contrlols="false"></video>
      <div class="container">
        <div class="hero-content">
          <?php if (have_rows('heading')) : while (have_rows('heading')) : the_row(); ?>
              <h1 style="color: <?php the_sub_field('text_colour'); ?>"><?php the_sub_field('english'); ?> <span><?php the_sub_field('mandarin'); ?></span></h1>
          <?php endwhile;
          endif; ?>
          <button class="down"><?php echo get_template_part('template-parts/part', 'caret'); ?></button>
        </div>
      </div>
      <?php if (have_rows('shop_link')) : while (have_rows('shop_link')) : the_row(); ?>
          <a class="ticker" href="<?php the_sub_field('shop_link'); ?>" style="background-color: <?php the_sub_field('background_colour'); ?>">
            <div class="ticker-inner">
              <?php for ($i = 0; $i < 32; $i++) : ?>
                  <span class="ticker-item" style="color: <?php the_sub_field('text_colour'); ?>">
                    <?php the_sub_field('text'); ?>
                  </span>
              <?php endfor; ?>
            </div>
          </a>
      <?php endwhile;
      endif; ?>

    </div>
  <?php endwhile;
endif;

if (have_rows('link_boxes')) : ?>

  <div class="link-boxes">
    <?php while (have_rows('link_boxes')) : the_row(); ?>
      <div class="link-box">
        <?php $images = get_sub_field('slider');
        if ($images) : ?>
          <div class="box-slider-container">
            <div class="box-slider">
              <?php foreach ($images as $image) : ?>
                <div class="box-slide" style="background-image: url('<?php echo esc_url($image['url']); ?>')"></div>
              <?php endforeach; ?>
            </div>
          </div>
        <?php endif; ?>
        <div class="box-title">
          <?php if (have_rows('heading')) : while (have_rows('heading')) : the_row(); ?>
              <h2><?php the_sub_field('english'); ?> <span><?php the_sub_field('mandarin'); ?></span></h2>
            <?php endwhile;
          endif;
          if (have_rows('links')) : ?>
            <div class="buttons">
              <?php while (have_rows('links')) : the_row();
                $link = get_sub_field('link');
                $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                <a href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link['title']); ?></a>
              <?php endwhile; ?>
            </div>
          <?php endif; ?>
        </div>
        <div class="box-text">
          <p>
            <?php the_sub_field('description'); ?>
          </p>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
<?php endif;
echo get_template_part('template-parts/part', 'footer');
get_footer(); ?>