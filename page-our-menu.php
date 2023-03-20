<?php get_header();
echo get_template_part('template-parts/part', 'header');
if (have_rows('menu')) : while (have_rows('menu')) : the_row();
        $row_count = count(get_sub_field('food'));
        $start_count = 0;
        while (have_rows('food')) : the_row();
            if (get_sub_field('start') == 1) {
                $start_at = $start_count;
            }
            $start_count++;
        endwhile;
    endwhile;
endif;
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
    <div class="page-intro">
        <div class="container">
            <?php the_field('page_intro'); ?>
        </div>
    </div>
    <?php if (have_rows('menu')) : while (have_rows('menu')) : the_row(); ?>
            <div class="menu">
                <div class="container">
                    <?php if ($row_count == 1) : ?>
                        <ul class="menu-control simple">
                            <?php if (have_rows('food')) : while (have_rows('food')) : the_row(); ?>
                                    <li class="active"><button rel="0">Food</button></li>
                            <?php endwhile;
                            endif; ?>
                            <li class=""><button rel="1">Drinks</button></li>
                        </ul>
                    <?php else : ?>
                        <ul class="menu-control complex">
                            <?php if (have_rows('food')) : $count = 0; ?>
                                <li class="active"><button rel="<?php echo $start_at; ?>">Food</button>
                                    <ul>
                                        <?php while (have_rows('food')) : the_row(); ?>
                                            <li <?php if (get_sub_field('start') == 1) : ?> class="active" <?php endif; ?>><button rel="<?php echo $count; ?>"><?php the_sub_field('section_title'); ?></button></li>
                                        <?php $count++;
                                        endwhile; ?>
                                    </ul>
                                </li>
                            <?php endif; ?>
                            <li><button rel="<?php echo $row_count; ?>">Drinks</button></li>
                        </ul>
                    <?php endif; ?>
                    <div class="menu-slider">

                        <?php if (have_rows('food')) : while (have_rows('food')) : the_row(); ?>
                                <div class="menu-slide">
                                    <?php if (get_sub_field('section_note')) : ?>
                                        <h2>
                                            <?php the_sub_field('section_note'); ?>
                                        </h2>
                                    <?php endif; ?>
                                    <?php if (have_rows('left_column')) : ?>
                                        <div class="menu-column">
                                            <?php while (have_rows('left_column')) : the_row(); ?>
                                                <div class="menu-block">
                                                    <?php if (have_rows('section_heading')) : while (have_rows('section_heading')) : the_row(); ?>
                                                            <div class="title-wrapper">
                                                                <h2><?php the_sub_field('heading'); ?> <span><?php the_sub_field('mandarin'); ?></span></h2>
                                                            </div>
                                                        <?php endwhile;
                                                    endif;
                                                    if (have_rows('items')) : while (have_rows('items')) : the_row(); ?>
                                                            <div class="menu-item">
                                                                <h3><?php the_sub_field('item'); ?></h3>
                                                                <?php if (get_sub_field('description')) : ?>
                                                                    <p><?php the_sub_field('description'); ?></p>
                                                                <?php endif;
                                                                if (get_sub_field('mandarin')) : ?>
                                                                    <p><span><?php the_sub_field('mandarin'); ?></span></p>
                                                                <?php endif;
                                                                if (get_sub_field('price')) : ?>
                                                                    <p><?php the_sub_field('price'); ?></p>
                                                                <?php endif;  ?>
                                                            </div>
                                                    <?php endwhile;
                                                    endif; ?>

                                                </div>
                                            <?php endwhile; ?>
                                        </div>
                                    <?php endif;
                                    if (have_rows('right_column')) : ?>
                                        <div class="menu-column">
                                            <?php while (have_rows('right_column')) : the_row(); ?>
                                                <div class="menu-block">
                                                    <?php if (have_rows('section_heading')) : while (have_rows('section_heading')) : the_row(); ?>
                                                            <div class="title-wrapper">
                                                                <h2><?php the_sub_field('heading'); ?> <span><?php the_sub_field('mandarin'); ?></span></h2>
                                                            </div>
                                                        <?php endwhile;
                                                    endif;
                                                    if (have_rows('items')) : while (have_rows('items')) : the_row(); ?>
                                                            <div class="menu-item">
                                                                <h3><?php the_sub_field('item'); ?></h3>
                                                                <?php if (get_sub_field('description')) : ?>
                                                                    <p><?php the_sub_field('description'); ?></p>
                                                                <?php endif;
                                                                if (get_sub_field('mandarin')) : ?>
                                                                    <p><span><?php the_sub_field('mandarin'); ?></span></p>
                                                                <?php endif;
                                                                if (get_sub_field('price')) : ?>
                                                                    <p><?php the_sub_field('price'); ?></p>
                                                                <?php endif;  ?>
                                                            </div>
                                                    <?php endwhile;
                                                    endif; ?>

                                                </div>
                                            <?php endwhile; ?>
                                        </div>

                                    <?php endif; ?>
                                </div>
                            <?php endwhile;
                        endif;

                        if (have_rows('drinks')) : while (have_rows('drinks')) : the_row(); ?>
                                <div class="menu-slide">
                                    <?php if (get_sub_field('section_note')) : ?>
                                        <h2>
                                            <?php the_sub_field('section_note'); ?>
                                        </h2>
                                    <?php endif; ?>
                                    <?php if (have_rows('left_column')) : ?>
                                        <div class="menu-column">
                                            <?php while (have_rows('left_column')) : the_row(); ?>
                                                <div class="menu-block">
                                                    <?php if (have_rows('section_heading')) : while (have_rows('section_heading')) : the_row(); ?>
                                                            <div class="title-wrapper">
                                                                <h2><?php the_sub_field('heading'); ?> <span><?php the_sub_field('mandarin'); ?></span></h2>
                                                            </div>
                                                        <?php endwhile;
                                                    endif;
                                                    if (have_rows('items')) : while (have_rows('items')) : the_row(); ?>
                                                            <div class="menu-item">
                                                                <h3><?php the_sub_field('item'); ?></h3>
                                                                <?php if (get_sub_field('description')) : ?>
                                                                    <p><?php the_sub_field('description'); ?></p>
                                                                <?php endif;
                                                                if (get_sub_field('mandarin')) : ?>
                                                                    <p><span><?php the_sub_field('mandarin'); ?></span></p>
                                                                <?php endif;
                                                                if (get_sub_field('price')) : ?>
                                                                    <p><?php the_sub_field('price'); ?></p>
                                                                <?php endif;  ?>
                                                            </div>
                                                    <?php endwhile;
                                                    endif; ?>

                                                </div>
                                            <?php endwhile; ?>
                                        </div>

                                    <?php endif;
                                    if (have_rows('right_column')) : ?>
                                        <div class="menu-column">
                                            <?php while (have_rows('right_column')) : the_row(); ?>
                                                <div class="menu-block">
                                                    <?php if (have_rows('section_heading')) : while (have_rows('section_heading')) : the_row(); ?>
                                                            <div class="title-wrapper">
                                                                <h2><?php the_sub_field('heading'); ?> <span><?php the_sub_field('mandarin'); ?></span></h2>
                                                            </div>
                                                        <?php endwhile;
                                                    endif;
                                                    if (have_rows('items')) : while (have_rows('items')) : the_row(); ?>
                                                            <div class="menu-item">
                                                                <h3><?php the_sub_field('item'); ?></h3>
                                                                <?php if (get_sub_field('description')) : ?>
                                                                    <p><?php the_sub_field('description'); ?></p>
                                                                <?php endif;
                                                                if (get_sub_field('mandarin')) : ?>
                                                                    <p><span><?php the_sub_field('mandarin'); ?></span></p>
                                                                <?php endif;
                                                                if (get_sub_field('price')) : ?>
                                                                    <p><?php the_sub_field('price'); ?></p>
                                                                <?php endif;  ?>
                                                            </div>
                                                    <?php endwhile;
                                                    endif; ?>

                                                </div>
                                            <?php endwhile; ?>
                                        </div>

                                    <?php endif; ?>
                                </div>
                        <?php endwhile;
                        endif; ?>
                    </div>
                </div>
            </div>
    <?php endwhile;
    endif; ?>

    <?php echo get_template_part('template-parts/part', 'footer');
    get_footer(); ?>