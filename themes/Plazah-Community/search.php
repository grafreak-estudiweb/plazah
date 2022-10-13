<?php get_header(); ?>
<!-- Search, sort and pills -->
<section class="bg-f5 fixed-top">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3 px-md-2 px-xl-0">
                <div class="row py-2">
                    <div class="col-7 col-md-6 pe-0 pe-md-2">
                        <form class="form-row" method="get" action="<?php bloginfo('url'); ?>">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text input-group-text-c" onKeyPress="return checkSubmit(event)">
                                        <img src="<?php bloginfo('template_url') ?>/assets/img/search.png" alt="" class="search">
                                    </div>
                                </div>
                                <input type="text" class="form-control form-control-c" placeholder="Buscar" style="padding-left: 2.6rem;" name="s">
                            </div>
                        </form>
                    </div>
                    <div class="col-5 col-md-6">
                        <div class="row">
                            <div class="col-12 col-md-8 offset-md-4">
                                <select class="form-select form-select-c" aria-label="Default select example">
                                    <!-- <option value="top">Más populares</option> -->
                                    <option value="recent">Más recientes</option>
                                    <option value="older">Más Antiguos</option>
                                    <option value="a-z">A-Z</option>
                                    <option value="z-a">Z-A</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function checkSubmit(e) {
        if (e && e.keyCode == 13) {
            document.forms[0].submit();
        }
    }
</script>
<section class="bg-white box-sh-1 fixed-top mt-51">
    <div class="container">
        <div class="row py-2">
            <div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3 px-md-2 px-xl-0">
                <div style="overflow-x: auto;">
                    <?php wp_nav_menu(array(
                        'theme_location' => 'cat-pills',
                        'container' => 'div',
                        'container_class' => 'pills-row',
                        'container_id' => 'category-pills',
                        'items_wrap' => '<ul class="nav nav-pills nav-pills-c nav-fill">%3$s</ul>',
                        'menu_class' => 'nav-item me-2',
                    ));
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- / Search, sort and pills -->


<!-- LISTADO -->
<section class="bg-f5 mt-101">
    <div class="container py-2 py-md-4">
        <div class="row">
            <div class="col-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2 col-xl-6 offset-xl-3 px-0 px-md-2 px-xl-0">

                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                        <a href="<?php the_permalink(); ?>" class="a-link">
                            <div class="articles px-4 py-3">
                                <div class="row">
                                    <div class="col-3 col-md-2 mt-2 my-md-auto text-center px-0 px-md-2">
                                        <a href="<?php the_permalink(); ?>"><?php if (has_post_thumbnail()) {
                                                                                the_post_thumbnail('post-thumbnail', array('class' => 'img-fluid'));
                                                                            } ?></a>
                                    </div>
                                    <div class="col-9 col-md-10">
                                        <p class="color-203 bolder font-16 mb-1"><?php the_title(); ?></p>
                                        <p class="color-74 font-16 mb-2 lh-22"><?php the_excerpt(); ?></p>
                                        <div class="row">
                                            <div class="col-8 col-md-6">
                                                <span class="span-articles">
                                                    <p class="color-74 bolder font-11 mb-0 text-upper"><?php the_category(', '); ?></p>
                                                </span>
                                            </div>
                                            <!-- <div class="col-4 col-md-6 text-end">
                                                <div class="d-inline-block">
                                                    <span class="d-inline-block">
                                                        <img src="img/heart.png" alt="">
                                                    </span>
                                                    <span class="d-inline-block">
                                                        <p class="color-74 mb-0 font-12 ps-1 bolder">56</p>
                                                    </span>
                                                </div>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                <?php endwhile;
                endif; ?>
            </div>
        </div>
    </div>
</section>
<script>
    document.querySelectorAll(".span-articles .color-74 a").forEach(category => {
        category.classList.add("color-74")
    });
</script>
<?php get_footer(); ?>