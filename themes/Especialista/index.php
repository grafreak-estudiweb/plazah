<?php get_header(); ?>

<body <?php body_class(["bg-f5"]); ?>>
    <?php wp_body_open(); ?>
    <!-- Search, sort and pills -->
    <?php include(locate_template("templates/archive/search-sort.php")); ?>
    <!-- categories links -->
    <?php include(locate_template("templates/archive/categories-pills.php")); ?>
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
                            <?php include(locate_template("templates/archive/single-list.php")); ?>
                    <?php
                        endwhile;
                    }
                    ?>

                    <?php
                    //TODO: hay que refactorizar esto !
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
                            include(locate_template("templates/archive/single-list.php"));
                        endwhile;
                    endif; ?>
                </div>
            </div>
        </div>
    </section>
    <?php get_footer(); ?>