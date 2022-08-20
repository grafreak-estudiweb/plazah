<?php get_header(); ?>

<body <?php body_class(["bg-f5"]); ?>>
    <?php wp_body_open(); ?>
    <!-- Search, sort and pills -->
    <section class="bg-f5 fixed-top">
        <div class="container">
            <div class="row">
                <div class="col-12 px-md-2 px-xl-0">
                    <div class="row py-2">
                        <div class="col-7 col-md-6 pe-0 pe-md-2">
                            <div class="input-group" id=search-input>
                                <div class="input-group-prepend">
                                    <div class="input-group-text input-group-text-c">

                                        <img src="<?php bloginfo('template_url') ?>/img/search.png" alt="" class="search" onKeyPress="return checkSubmit(event)">
                                    </div>
                                </div>
                                <input id="search" type="text" class="form-control form-control-c" placeholder="Buscar" style="padding-left: 2.6rem;" oninput="searchPosts(event)" onfocusout="searchFocusOut()" onfocus="cleanSearch()">
                                <div class="input-group-append hide" id="search-append">
                                    <span class="input-group-text" style="margin-top: -0.25rem; cursor: pointer;" onclick="cleanSearch()">
                                        <i class="fa fa-times-circle" aria-hidden="true"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-5 col-md-6">
                            <div class="row">
                                <div class="col-12 col-md-8 offset-md-4">
                                    <form method="get" action="">
                                        <select onchange="this.form.submit()" name="order" id="orderSelect" class="form-select form-select-c" aria-label="Default select example">
                                            <option value="recent">Más recientes</option>
                                            <option value="older">Más Antiguos</option>
                                            <option value="top">Más populares</option>
                                            <option value="a-z">A-Z</option>
                                            <option value="z-a">Z-A</option>
                                        </select>
                                    </form>
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
            console.log("Searching for: " + e)
            if (e && e.keyCode == 13) {
                console.log("Searching for: " + e)
                //document.forms[0].submit();
            }
        }
    </script>
    <section class="bg-white box-sh-1 fixed-top mt-51" style="margin-left: 0; margin-right: 0;">
        <div class="container wrap-categories">
            <div class="row py-2">
                <div class="col-12">
                    <div style="overflow-x: auto;">
                        <?php wp_nav_menu(array(
                            'theme_location' => 'cat-pills',
                            'container' => 'div',
                            'container_class' => 'pills-row',
                            'container_id' => 'category-pills',
                            'items_wrap' => '<ul class="nav nav-pills nav-pills-c nav-fill">%3$s</ul>',
                            'menu_class' => 'nav-item me-2 nav-link font-12 bolder',
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
                <div class="col-12  px-0 px-md-2 px-xl-0">
                    <?php
                    $sticky = get_option("sticky_posts");
                    if (!empty($sticky)) {
                        $args = array(
                            'post__in' => $sticky
                        );
                        $sticky_posts = new WP_Query($args);
                        while ($sticky_posts->have_posts()) :
                            $sticky_posts->the_post();
                    ?>
                            <!-- TODO: Publicacion destacada -->
                            <a href="<?php the_permalink(); ?>" class="a-link">
                                <div class="articles challenge px-4 py-3 mb-2 mb-md-4 mx-2 mx-md-0">
                                    <div class="row">
                                        <div class="col-3 col-md-2 mt-2 my-md-auto text-center px-0 px-md-2">
                                            <?php
                                            if (has_post_thumbnail()) {
                                                the_post_thumbnail('post-thumbnail', array('class' => 'img-fluid'));
                                            } ?>
                                        </div>
                                        <div class="col-9 col-md-10">
                                            <p class="color-203 bolder font-16 mb-1 list-item"><?php the_title(); ?></p>
                                            <div class="color-74 font-16 mb-2 lh-22 list-item"><?php the_excerpt(); ?></div>
                                            <div class="row">
                                                <div style="display: flex; justify-content: end">
                                                    <span style="margin-top: -0.55em;">
                                                        <p class="color-74 bolder font-11 mb-0 text-upper"><?php the_category(' '); ?></p>
                                                    </span>
                                                    <?php if (do_shortcode('[likebtn_likes]') > 0) { ?>
                                                        <span class="align-span text-end color-74 mb-0 font-12 bolder">
                                                            <img id="img-heart" src="<?php bloginfo('template_url') ?>/img/heart.svg" alt="">
                                                            <?php
                                                            // Likes counter
                                                            echo do_shortcode('[likebtn_likes]');
                                                            ?>
                                                        </span>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>

                    <?php
                        endwhile;
                    }
                    ?>

                    <?php
                    $args = array(
                        'orderby' => 'date',
                        'order' => 'desc',
                        'post__not_in' => $sticky,
                    );
                    $url = str_getcsv($_SERVER['REQUEST_URI'], "/");
                    if (isset($url[3]) && !str_contains($url[3], "?order"))
                        $args['category_name'] = $url[3];
                    /* if (isset($_GET['search']))
                        $args['s'] = $_GET['search']; */
                    if (isset($_GET['order']))
                        switch ($_GET['order']) {
                            case "top":
                                // orden por mas populares
                                $args['orderby'] = 'meta_value';
                                $args['order'] = 'DESC';
                                $args['meta_query'] = array(
                                    'relation' => 'OR',
                                    array(
                                        'key' => 'Likes',
                                        'compare' => 'NOT EXISTS',
                                        'type' => 'numeric'
                                    ),
                                    array(
                                        'key' => 'Likes',
                                        'compare' => 'EXISTS',
                                        'type' => 'numeric'
                                    )
                                );
                                $category_posts = new WP_Query($args);
                                break;
                            case "recent":
                                $category_posts = new WP_Query($args);
                                break;
                            case "older":
                                $args['orderby'] = 'date';
                                $args['order'] = 'asc';
                                $category_posts = new WP_Query($args);
                                break;
                            case "a-z":
                                $args['orderby'] = 'title';
                                $args['order'] = 'asc';
                                $category_posts = new WP_Query($args);
                                break;
                            case "z-a":
                                $args['orderby'] = 'title';
                                $args['order'] = 'desc';
                                $category_posts = new WP_Query($args);
                                break;
                            default:
                                $category_posts = new WP_Query($args);
                                break;
                        }
                    else $category_posts = new WP_Query($args);
                    if ($category_posts->have_posts()) :
                        while ($category_posts->have_posts()) :
                            $category_posts->the_post();
                    ?>
                            <?php
                            //TODO: Refactor 
                            //include_once(bloginfo('template_url') . "/templates/list.php"); 
                            ?>
                            <div id="element" style="cursor: pointer;" onclick="window.location='<?php the_permalink() ?>';">
                                <div class="articles px-4 py-3">
                                    <div class="row">
                                        <div class="col-3 col-md-2 mt-2 my-md-auto text-center px-0">
                                            <a href="<?php the_permalink(); ?>"><?php if (has_post_thumbnail()) {
                                                                                    the_post_thumbnail('post-thumbnail', array('class' => 'img-fluid'));
                                                                                } ?></a>
                                        </div>
                                        <div class="col-9 col-md-10">
                                            <p id="title" class="color-203 bolder font-16 mb-1"><?php the_title(); ?></p>
                                            <div id="excerpt" class="color-74 font-16 mb-2 lh-22" style="margin-top: -0.2rem;"><?php the_excerpt(); ?></div>
                                            <div class="row">
                                                <div style="display: flex; justify-content: space-between;">
                                                    <span style="margin-top: -0.55em;">
                                                        <p class="color-74 bolder font-11 mb-0 text-upper"><?php the_category(' '); ?></p>
                                                    </span>
                                                    <?php if (do_shortcode('[likebtn_likes]') > 0) { ?>
                                                        <span class="align-span text-end color-74 mb-0 font-12 bolder">
                                                            <img id="img-heart" src="<?php bloginfo('template_url') ?>/img/heart.svg" alt="">
                                                            <?php
                                                            // Likes counter
                                                            echo do_shortcode('[likebtn_likes]');
                                                            ?>
                                                        </span>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php endwhile;
                    endif; ?>
                </div>
            </div>
        </div>
    </section>
    <?php get_footer(); ?>