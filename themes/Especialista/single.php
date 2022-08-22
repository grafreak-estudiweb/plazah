<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <header>
            <div class="top-header">
                <div class="container">
                    <a class="arrow-left" href="<?php bloginfo('url') ?>">
                        <img src="<?php bloginfo('template_url') ?>/assets/img/arrow-left.png" alt="">
                    </a>
                    <p class="bolder"><?php the_title(); ?></p>
                </div>
            </div>
        </header>

        <article class="bg-white mt-56">
            <div class="container single-main py-4">
                <div class="row">
                    <div class="col-12  px-xl-0">
                        <div class="row">
                            <div class="meta">
                                <?php
                                $categories = get_the_category();
                                $output = '';
                                if (!empty($categories)) {
                                    echo "<ul class='category-pills'>";
                                    foreach ($categories as $category) {
                                        //category parent = 0 --> todos
                                        if ($category->parent != 0 && $category->name != 'Sin categoría') {
                                            $output .= '<li class="cat-pill"><a href="' . esc_url(get_category_link($category->term_id)) . '" alt="' . esc_attr(sprintf(__('View all posts in %s', 'textdomain'), $category->name)) . '">' . esc_html($category->name) . '</a></li>';
                                        }
                                    }
                                    echo trim($output);
                                    echo "</ul>";
                                }
                                ?>
                                <time datetime="<?php echo get_the_date('d/m/Y'); ?>"><?= strtoupper(str_replace("de", "", get_the_date())); ?></time>

                            </div>
                            <div class="col-12">
                                <h1 class="font-40 color-203 bolder mt-3 mt-md-2 mb-1 mb-md-0"><?php the_title(); ?></h1>
                                <?php
                                $has_exc_bellow = get_field('has_exc_b_title');
                                if ($has_exc_bellow) {
                                    echo '<p class="color-74 bolder mb-1 mt-1">' . get_the_excerpt() . '</p>';
                                }
                                ?>
                            </div>
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </article>

<?php endwhile;
endif; ?>

<script>
    /* 
    // Remove repeated excerpt
    const excerpt = document.querySelector(".wp-block-post-excerpt__excerpt");
    excerpt.remove(); */
</script>
<?php get_footer();
