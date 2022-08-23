<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <header>
            <div class="top-header">
                <div class="container">
                    <a class="arrow-left" href="<?php bloginfo('url') ?>">
                        <svg fill="none" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" d="m8.62469 6.21917c.43127.34501.50119.9743.15618 1.40556l-2.70025 3.37527h13.91938c.5523 0 1 .4478 1 1 0 .5523-.4477 1-1 1h-13.91938l2.70025 3.3753c.34501.4313.27509 1.0606-.15618 1.4056-.43126.345-1.06055.2751-1.40556-.1562l-3.99505-4.9938c-.14009-.1721-.22408-.3917-.22408-.6309s.084-.4588.2241-.6309l3.99503-4.99376c.34501-.43126.9743-.50118 1.40556-.15617z" fill="#20313a" fill-rule="evenodd" />
                        </svg>
                    </a>
                    <?php
                    if (wp_is_mobile()) {
                        $title = the_title_limit(32, '...');
                    } else {
                        $title = get_the_title();
                    }
                    ?>
                    <p class="bolder"><?php echo $title; ?></p>
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
                                            $output .= '<li><a href="' . esc_url(get_category_link($category->term_id)) . '" alt="' . esc_attr(sprintf(__('View all posts in %s', 'textdomain'), $category->name)) . '">' . esc_html($category->name) . '</a></li>';
                                        }
                                    }
                                    echo trim($output);
                                    echo "</ul>";
                                }
                                ?>
                                <time datetime="<?php echo get_the_date('d/m/Y'); ?>"><?= strtoupper(str_replace("de", "", get_the_date())); ?></time>

                            </div>
                            <div class="col-12">
                                <h1 class="font-40 color-203 bolder mb-1 mb-md-0"><?php the_title(); ?></h1>
                                <?php
                                $has_exc_bellow = get_field('has_exc_b_title');
                                if ($has_exc_bellow) {
                                    echo '<p class="excerpt-single color-74 bold mb-1 mt-1">' . get_the_excerpt() . '</p>';
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
