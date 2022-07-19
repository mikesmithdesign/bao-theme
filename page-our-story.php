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
endif; ?>
    <div class="page-intro story">
        <div class="container">
            <?php if (have_rows('story_boxes')) : ?>
                <ul>
                    <?php while (have_rows('story_boxes')) : the_row();
                        if (have_rows('heading')) : while (have_rows('heading')) : the_row(); ?>
                                <li><a href="#<?php echo sanitize_title(get_sub_field('english')); ?>"><?php the_sub_field('english'); ?></a></li>
                    <?php endwhile;
                        endif;
                    endwhile; ?>
                </ul>
            <?php endif;
            the_field('page_intro'); ?>
        </div>
    </div>
    <?php if (have_rows('story_boxes')) : ?>
        <div class="story-boxes">
            <?php while (have_rows('story_boxes')) : the_row(); ?>
                <?php if (have_rows('heading')) : while (have_rows('heading')) : the_row();
                        $slug = sanitize_title(get_sub_field('english')); ?>
                <?php endwhile;
                endif; ?>
                <div class="story-box" id="<?php echo $slug; ?>">
                    <div class="sticky-wrapper">
                        <div class="sticky-content">
                            <?php if (have_rows('heading')) : while (have_rows('heading')) : the_row(); ?>
                                    <h3><?php the_sub_field('english'); ?> <span><?php the_sub_field('mandarin'); ?></span></h3>
                                <?php endwhile;
                            endif;
                            $image = get_sub_field('image');
                            if (!empty($image)) : ?>
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="story-text">
                        <?php the_sub_field('text');
                        $link = get_sub_field('cta');
                        if ($link) :
                            $link_target = $link['target'] ? $link['target'] : '_self'; ?>
                            <a class="button" href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link['title']); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endwhile; ?>

        </div>
    <?php endif; ?>

    <?php echo get_template_part('template-parts/part', 'footer');
    get_footer(); ?>