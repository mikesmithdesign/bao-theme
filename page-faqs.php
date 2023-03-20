<?php get_header();
echo get_template_part('template-parts/part', 'header');
if (have_rows('page_banner')) : while (have_rows('page_banner')) : the_row();
        $images = get_sub_field('slider');
        if ($images) : ?>
<div class="title-banner ">
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

<div class="page-intro faqs">
    <div class="container">
        <?php the_field('page_intro');
            if (have_rows('faqs')) : ?>
        <div class="accordion">
            <?php while (have_rows('faqs')) : the_row(); ?>
            <div class="accordion-item">
                <div class="accordion-title"><?php the_sub_field('question'); ?></div>
                <div class="accordion-content">
                    <?php the_sub_field('answer'); ?>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
        <?php endif; ?>
    </div>
</div>

<?php echo get_template_part('template-parts/part', 'footer');
    get_footer(); ?>