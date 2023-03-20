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
            <?php endif;
            if (is_front_page()) : ?>
                <button class="mute muted pulse">
                    <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" viewBox="0 0 275 254">
                        <path d="M164,1.3c-3.5-1.9-7.7-1.7-11,0.5L83.2,47.4H35c-19.3,0-35,15.7-35,35v89.1c0,19.3,15.7,35,35,35h48.2l69.9,45.7
	c1.8,1.2,3.8,1.8,5.9,1.8c1.8,0,3.5-0.4,5.1-1.3c3.5-1.9,5.6-5.5,5.6-9.4V10.7C169.6,6.8,167.5,3.2,164,1.3z M79.6,196.6H35
	c-13.8,0-25-11.2-25-25V82.4c0-13.8,11.2-25,25-25h44.6V196.6z M159.6,243.3c0,0.1,0,0.4-0.4,0.7c-0.4,0.2-0.7,0-0.8,0l-68.9-45
	V55.1l68.9-45c0.1-0.1,0.4-0.2,0.8,0c0.4,0.2,0.4,0.5,0.4,0.7V243.3z" />
                        <path d="M246.8,127.5l26.7-26.7c2-2,2-5.1,0-7.1c-2-2-5.1-2-7.1,0l-26.7,26.7L213,93.7c-2-2-5.1-2-7.1,0c-2,2-2,5.1,0,7.1l26.7,26.7
	L206,154.2c-2,2-2,5.1,0,7.1c1,1,2.3,1.5,3.5,1.5s2.6-0.5,3.5-1.5l26.7-26.7l26.7,26.7c1,1,2.3,1.5,3.5,1.5s2.6-0.5,3.5-1.5
	c2-2,2-5.1,0-7.1L246.8,127.5z" />
                    </svg>
                </button>

            <?php endif; ?>
        </div>

        <div class=" logo-wrapper">
            <a href="/" class="logo">
                <img src="<?php echo get_theme_mod('main_logo'); ?>" class="main-logo" alt="<?php echo get_post_meta(attachment_url_to_postid(get_theme_mod('main_logo')), '_wp_attachment_image_alt', true); ?>" />
                <img src="<?php echo get_theme_mod('scroll_logo'); ?>" class="scroll-logo" alt="<?php echo get_post_meta(attachment_url_to_postid(get_theme_mod('scroll_logo')), '_wp_attachment_image_alt', true); ?>" />
            </a>
        </div>



        <div class="cta-buttons">
            <?php while (have_rows('buttons', 'option')) : the_row();
                if (get_sub_field('dropdown') == 1) : ?>
                    <div class="dropdown-wrapper">
                        <button class="trigger"><?php the_sub_field('title'); ?></button>
                        <?php if (have_rows('buttons')) : ?>
                            <ul>
                                <?php while (have_rows('buttons')) : the_row();
                                    $link = get_sub_field('button');
                                    $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                                    <li><a <?php if ($link['url'] != "#") : ?> href="<?php echo esc_url($link['url']); ?>" <?php endif; ?> target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link['title']); ?></a></li>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                <?php else :
                    $link = get_sub_field('button');
                    $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                    <a id="<?php the_sub_field('button_id'); ?>" <?php if ($link['url'] != "#") : ?> href="<?php echo esc_url($link['url']); ?>" <?php endif; ?> target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link['title']); ?></a>
                <?php endif; ?>
            <?php endwhile; ?>
        </div>

    </div>
</header>
<nav <?php if (get_theme_mod('change_tints') == 1) : ?> class="change-tint" <?php endif; ?>>

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
                                            $target = get_sub_field('new_tab');
                                            $marker = get_sub_field('show_marker_icon'); ?>
                                    <?php endwhile;
                                    endif; ?>
                                    <a href="<?php echo $link; ?>" <?php echo $target == 1 ? 'target="_blank"' : ""; ?>>
                                        <?php the_sub_field('title'); ?>
                                        <?php if ($marker == 1) {
                                            echo get_template_part('template-parts/part', 'marker');
                                        } ?>
                                    </a>
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
                        <a id="<?php the_sub_field('link_id'); ?>" href="<?php echo $link; ?>" <?php echo $target == 1 ? 'target="_blank"' : ""; ?>><?php the_sub_field('title'); ?><span><?php the_sub_field('mandarin'); ?></span></a>
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