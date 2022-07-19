<div class="load-overlay"></div>
<header>
  <div class="container">
    <div class="menu-buttons">
      <button class="hamburger hamburger--squeeze" type="button">
        <span class="hamburger-box">
          <span class="hamburger-inner"></span>
        </span>
      </button>
      <?php if (get_field('google_maps_link', 'option')) : ?>
        <a href="<?php the_field('google_maps_link', 'option'); ?>" target="_blank">
          <?php echo get_template_part('template-parts/part', 'marker'); ?>
        </a>
      <?php endif; ?>
    </div>

      <div class=" logo-wrapper">
        <a href="/" class="logo">
          <img src="<?php echo get_theme_mod('main_logo'); ?>" class="main-logo" alt="<?php echo get_post_meta( attachment_url_to_postid(get_theme_mod('main_logo')), '_wp_attachment_image_alt', true ); ?>" />
          <img src="<?php echo get_theme_mod('scroll_logo'); ?>" class="scroll-logo" alt="<?php echo get_post_meta( attachment_url_to_postid(get_theme_mod('scroll_logo')), '_wp_attachment_image_alt', true ); ?>" />
        </a>
      </div>


    <?php if (have_rows('buttons', 'option')) : ?>
      <div class="cta-buttons">
        <?php while (have_rows('buttons', 'option')) : the_row();
          $link = get_sub_field('button');
          $link_target = $link['target'] ? $link['target'] : '_self'; ?>
          <a href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link['title']); ?></a>
        <?php endwhile; ?>
      </div>
    <?php endif; ?>
  </div>
</header>
<nav>

  <?php if (have_rows('navigation', 'option')) : ?>
    <ul>
      <?php while (have_rows('navigation', 'option')) : the_row();
        if (get_sub_field('dropdown_menu') == 1) : ?>
          <li>
            <div class="dropdown-trigger <?php if (get_sub_field('highlight') == 1) : ?> highlight <?php endif; ?>"><?php the_sub_field('title'); ?> <span><?php the_sub_field('mandarin'); ?></span></div>

            <ul>
              <?php while (have_rows('submenu')) : the_row(); ?>
                <li>
                  <?php if (have_rows('link')) : while (have_rows('link')) : the_row();
                      $link = get_sub_field('url');
                      $target = get_sub_field('new_tab'); ?>
                  <?php endwhile;
                  endif; ?>
                  <a href="<?php echo $link; ?>" <?php echo $target == 1 ? 'target="_blank"' : ""; ?>><?php the_sub_field('title'); ?>
                    <?php echo get_template_part('template-parts/part', 'marker'); ?></a>
                </li>
              <?php endwhile; ?>
            </ul>
          </li>
        <?php else : ?>
          <li <?php if (get_sub_field('highlight') == 1) : ?> class="highlight" <?php endif; ?>>
            <?php if (have_rows('link')) : while (have_rows('link')) : the_row();
                $link = get_sub_field('url');
                $target = get_sub_field('new_tab'); ?>
            <?php endwhile;
            endif; ?>
            <a   href="<?php echo $link; ?>" <?php echo $target == 1 ? 'target="_blank"' : ""; ?>><?php the_sub_field('title'); ?><span><?php the_sub_field('mandarin'); ?></span></a>
          </li>
        <?php endif; ?>
      <?php endwhile; ?>
    </ul>
  <?php endif; ?>

  <div class="nav-footer">
    <p class="address hide-for-small">
      <?php the_field('address', 'option'); ?>
    </p>
    <h3 class="show-for-small">OPENING TIMES</h3>
    <div class="details">
      <p>
        <?php the_field('opening_times', 'option'); ?>
      </p>
      <div class="mob-box">
        <ul>
          <li>
            <a href="mailto:<?php the_field('email', 'option'); ?>"><i class="far fa-envelope"></i> <?php the_field('email', 'option'); ?></a>
          </li>
          <li>
            <a href="tel:<?php the_field('telephone', 'option'); ?>"><i class="fas fa-phone fa-flip-horizontal"></i> <?php the_field('telephone', 'option'); ?></a>
          </li>
        </ul>
        <p class="show-for-small">
          <?php the_field('address', 'option'); ?>
        </p>
        <ul class="show-for-small">
          <?php while (have_rows('other_sites', 'option')) : the_row(); ?>
            <li>
              <?php $link = get_sub_field('link');
              $link_target = $link['target'] ? $link['target'] : '_self'; ?>
              <a href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link['title']); ?></a>
            </li>
          <?php endwhile; ?>
        </ul>
      </div>
    </div>

    <div class="footer-bottom">
      <ul>
        <li>
          <a href=" <?php the_field('instagram', 'option'); ?>" target="_blank"><i class="fab fa-instagram"></i></a>
        </li>
        <?php while (have_rows('bottom_menu', 'option')) : the_row(); ?>
          <li>
            <?php $link = get_sub_field('link');
            $link_target = $link['target'] ? $link['target'] : '_self'; ?>
            <a href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link['title']); ?></a>
          </li>
        <?php endwhile; ?>
      </ul>
      <p><?php the_field('copyright', 'option'); ?></p>
    </div> 
  </div>
</nav>