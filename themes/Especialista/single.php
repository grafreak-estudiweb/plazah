<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <section class="bg-f5 fixed-top">
            <div class="container">
                <div class="row">
                    <div class="col-12  px-xl-0">
                        <div class="row py-3">
                            <div class="col-12 text-center relative-position categories">
                                <a href="<?php bloginfo('url') ?>">
                                    <span class="arrow-left">
                                        <img src="<?php bloginfo('template_url') ?>/assets/img/arrow-left.png" alt="">
                                    </span>
                                </a>
                                <p id=title class="color-203 mb-0 bolder pl-25 pr-10"><?php the_title(); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-white mt-56">
            <div class="container single-main py-4">
                <div class="row">
                    <div class="col-12  px-xl-0">
                        <div class="row">
                            <div style="display: flex; justify-content: space-between;">
                                <span>
                                    <p class="color-74 bolder font-11 mb-0 text-upper"><?php the_category(' '); ?></p>
                                </span>

                                <span class="d-inline-block align-span mt-8">
                                    <p class="color-74 mb-0 font-12 ps-1 text-upper"><?= strtoupper(str_replace("de", "", get_the_date())); ?></p>
                                </span>
                            </div>
                            <div class="col-12">
                                <h1 class="font-40 color-203 bolder mt-3 mt-md-2 mb-1 mb-md-0"><?php the_title(); ?></h1>
                                <?php
                                $has_exc_bellow = get_field('has_exc_b_title');
                                if ($has_exc_bellow) {
                                    echo '<p class="color-74 bolder mb-1 mt-1">' . get_the_excerpt() . '</p>';
                                }
                                ?>

                                <!-- Post's likes button -->
                                <!-- <div class="d-inline-block mb-3">
                                <span class="d-inline-block py-2">
                                    <button class="btn btn-heart mr-2 my-auto" onclick="addActive()"
                                        id="btn-heart">
                                        <img src="img/heart-1.png" alt="" class="icon-heart icon-dislike">
                                        <img src="img/heart-2.png" alt="" class="icon-heart icon-like">
                                    </button>
                                </span>
                                <span class="d-inline-block ms-1">
                                    <p class="color-203 font-14 bolder mb-0">56 likes</p>
                                </span>
                            </div> -->
                            </div>

                            <?php the_content(); ?>

                        </div>
                    </div>
                </div>
            </div>
        </section>

<?php endwhile;
endif; ?>

<script>
    const postCategories = document.querySelectorAll("span .color-74 a");
    postCategories.forEach(category => {
        if (category.innerHTML.includes("Sin categor") || category.innerHTML.includes("TODOS"))
            category.classList.add("hide");
        category.classList.add(
            "color-74",
            "bolder",
            "font-11",
            "mb-0",
            "lh-1",
            "categories",
            "span-articles"
        );
    });

    // Remove repeated excerpt
    const excerpt = document.querySelector(".wp-block-post-excerpt__excerpt");
    excerpt.remove();
</script>
<?php get_footer();
