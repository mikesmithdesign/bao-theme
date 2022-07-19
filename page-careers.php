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
            <?php the_field('page_intro');

            $link = get_field('cv_button');
            if ($link) :
                $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                <a class="button" href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link['title']); ?></a>
            <?php endif; ?>
        </div>
    </div>


    <?php echo get_template_part('template-parts/part', 'footer');
    get_footer(); ?>