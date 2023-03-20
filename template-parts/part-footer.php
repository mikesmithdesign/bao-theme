<footer>
    <div class="container">
        <div>
            <h3><?php echo get_bloginfo('name'); ?></h3>
            <p>
                <?php the_field('footer_text', 'option'); ?>
            </p>
        </div>
        <div>
            <h3><?php the_field('opening_times_heading', 'option'); ?></h3>
            <p>
                <?php the_field('opening_times', 'option'); ?>
            </p>
        </div>
        <div>
            <h3>Get In Touch</h3>
            <ul>
                <li>
                    <a href="mailto:<?php the_field('email', 'option'); ?>"><i class="far fa-envelope"></i> <?php the_field('email', 'option'); ?></a>
                </li>
                <?php if (get_field('telephone', 'option')) : ?>
                <li>
                    <a href="tel:<?php the_field('telephone', 'option'); ?>"><i class="fas fa-phone fa-flip-horizontal"></i> <?php the_field('telephone', 'option'); ?></a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
        <div>
            <h3>Our Other Sites</h3>
            <ul>
                <?php while (have_rows('other_sites_footer', 'option')) : the_row(); ?>
                <li>
                    <?php $link = get_sub_field('link');
            $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                    <a href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link['title']); ?></a>
                </li>
                <?php endwhile; ?>
            </ul>
        </div>
        <a href="/">
            <img src="<?php echo get_theme_mod('footer_logo'); ?>" alt="<?php echo get_post_meta( attachment_url_to_postid(get_theme_mod('footer_logo')), '_wp_attachment_image_alt', true ); ?>" />
        </a>

    </div>
    <div class="mob-box">
        <ul>
            <li>
                <a href="mailto:<?php the_field('email', 'option'); ?>"><i class="far fa-envelope"></i> <?php the_field('email', 'option'); ?></a>
            </li>
            <?php if (get_field('telephone', 'option')) : ?>
            <li>
                <a href="tel:<?php the_field('telephone', 'option'); ?>"><i class="fas fa-phone fa-flip-horizontal"></i> <?php the_field('telephone', 'option'); ?></a>
            </li>
            <?php endif; ?>
        </ul>
        <p class="show-for-small">
            <?php the_field('address', 'option'); ?>
        </p>
        <ul class="show-for-small">
            <?php while (have_rows('other_sites_footer', 'option')) : the_row(); ?>
            <li>
                <?php $link = get_sub_field('link');
          $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                <a href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link['title']); ?></a>
            </li>
            <?php endwhile; ?>
        </ul>
    </div>
    <div class="container">
        <div class="footer-bottom">
            <ul>
                <li>
                    <a href=" <?php the_field('instagram', 'option'); ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                </li>
                <?php while (have_rows('bottom_menu_footer', 'option')) : the_row(); ?>
                <li>
                    <?php $link = get_sub_field('link');
            $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                    <a href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link['title']); ?></a>
                </li>
                <?php endwhile; ?>
            </ul>

            <p><?php the_field('copyright_footer', 'option'); ?></p>
        </div>
    </div>
</footer>