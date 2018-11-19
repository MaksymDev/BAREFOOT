<?php
$random_num = rand( 10000, 99999 );
if ( isset( $wpbm_option[ 'timeline_horizontal_template' ] ) && $wpbm_option[ 'timeline_horizontal_template' ] == 'template-1' ) {
    ?>
    <ul class="wpbm-timeline-one" data-id = "<?php echo $random_num ?>">
        <?php
        while ( $query -> have_posts() ) {
            $query -> the_post();
            $product_post_id = get_the_ID();
            $wpbm_extra_option = get_post_meta( $product_post_id, 'wpbm_extra_option', true );
            $timeline_date = get_the_date( $date_format );
            ?> <li>
                <?php if ( $timeline_date != $current_date ) {
                    ?>
                    <div class="wpbm-top-date-line">
                        <div class="wpbm-timeline-date-one">
                            <?php echo get_the_date( $date_format ); ?>
                        </div>
                        <div class="wpbm-timeline-line"></div>
                    </div>
                <?php }
                ?>
                <div class="wpbm-hor-inner-block">
                    <div class="wpbm-hor-inner-block-inner">
                        <div class="wpbm-hor-top-header">
                            <?php
                            /*
                             * Show Category
                             */
                            if ( isset( $wpbm_option[ 'wpbm_show_category' ] ) && $wpbm_option[ 'wpbm_show_category' ] == '1' ) {
                                ?>
                                <div class="wpbm-category-wrap">
                                    <?php
                                    $categories = get_the_category();
                                    $separator = ' ';
                                    $output = '';
                                    if ( ! empty( $categories ) ) {
                                        foreach ( $categories as $category ) {
                                            $output .= '<a href="' . esc_url( get_category_link( $category -> term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', WPBM_TD ), $category -> name ) ) . '">' . esc_html( $category -> name ) . '</a>' . $separator;
                                        }
                                        ?>
                                        <div class="wpbm-category-list">
                                            <?php
                                            echo trim( $output, $separator );
                                            ?>
                                        </div>
                                    <?php }
                                    ?>
                                </div>
                            <?php }
                            ?>
                            <div class="wpbm-title">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?></a></div>
                            <div class="wpbm-meta-wrap">
                                <?php
                                /*
                                 * Show Author
                                 */
                                if ( isset( $wpbm_option[ 'wpbm_show_author' ] ) && $wpbm_option[ 'wpbm_show_author' ] == '1' ) {
                                    ?>
                                    <div class="wpbm-author-name">
                                        <?php
                                        the_author_posts_link();
                                        ?>
                                    </div>
                                    <?php
                                }
                                /*
                                 * Display comment count
                                 */
                                if ( isset( $wpbm_option[ 'wpbm_show_comment' ] ) && $wpbm_option[ 'wpbm_show_comment' ] == '1' ) {
                                    ?>
                                    <div class="wpbm-comment-wrap">
                                        <?php
                                        echo comments_number();
                                        ?>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="wpbm-img-share-wrap">
                            <?php
                            include(WPBM_PATH . 'inc/frontend/content/wpbm-slide-media.php');
                            ?>
                            <?php
                            if ( isset( $wpbm_option[ 'wpbm_show_social_share' ] ) && $wpbm_option[ 'wpbm_show_social_share' ] == '1' ) {
                                ?>
                                <div class="wpbm-share-wrap">
                                    <div class="wpbm-share-wrap-another">
                                        <div class="wpbm-share-wrap-inner">
                                            <i class="fa fa-share" aria-hidden="true"></i>
                                        </div>
                                        <div class="wpbm-share-wrap-inner-wrap">
                                            <?php if ( isset( $wpbm_option[ 'wpbm_show_facebook_share' ] ) && $wpbm_option[ 'wpbm_show_facebook_share' ] == '1' ) { ?>
                                                <a href="https://www.facebook.com/sharer.php?u=<?php echo get_permalink( $product_post_id ); ?>" target="_blank" rel="nofollow">
                                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                                </a>
                                                <?php
                                            }
                                            if ( isset( $wpbm_option[ 'wpbm_show_twitter_share' ] ) && $wpbm_option[ 'wpbm_show_twitter_share' ] == '1' ) {
                                                ?>
                                                <a href="http://twitter.com/share?text=<?php echo the_title(); ?>&url=<?php echo get_permalink( $product_post_id ); ?>" target="_blank" rel="nofollow">
                                                    <i class="fa fa-twitter" aria-hidden="true"></i>
                                                </a>
                                                <?php
                                            }
                                            if ( isset( $wpbm_option[ 'wpbm_show_google_share' ] ) && $wpbm_option[ 'wpbm_show_google_share' ] == '1' ) {
                                                ?>

                                                <a href="https://plus.google.com/share?url=<?php echo get_permalink( $product_post_id ); ?>" target="_blank" rel="nofollow">
                                                    <i class="fa fa-google-plus" aria-hidden="true"></i>
                                                </a>
                                                <?php
                                            }
                                            if ( isset( $wpbm_option[ 'wpbm_show_linkedin_share' ] ) && $wpbm_option[ 'wpbm_show_linkedin_share' ] == '1' ) {
                                                ?>
                                                <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink( $product_post_id ); ?>" target="_blank" rel="nofollow">
                                                    <i class="fa fa-linkedin" aria-hidden="true"></i>
                                                </a>
                                                <?php
                                            }
                                            if ( isset( $wpbm_option[ 'wpbm_show_mail_share' ] ) && $wpbm_option[ 'wpbm_show_mail_share' ] == '1' ) {
                                                ?>
                                                <a href="mailto:?subject=<?php echo the_title(); ?> &body=<?php echo the_title(); ?> <?php echo get_permalink( $product_post_id ); ?>" target="_blank" rel="nofollow">
                                                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                                </a>
                                                <?php
                                            }
                                            if ( isset( $wpbm_option[ 'wpbm_show_pinterest_share' ] ) && $wpbm_option[ 'wpbm_show_pinterest_share' ] == '1' ) {
                                                ?>
                                                <a href="http://pinterest.com/pin/create/button/?url=<?php echo get_permalink( $product_post_id ); ?>" target="_blank" rel="nofollow">
                                                    <i class="fa fa-pinterest" aria-hidden="true"></i>
                                                </a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <div class="wpbm-bottom-wrap-main">
                            <div class="wpbm-content-outer-wrap">
                                <?php include(WPBM_PATH . 'inc/frontend/content/details/content.php'); ?>
                            </div>
                            <div class= "wpbm-bottom-wrap">
                                <?php
                                /*
                                 * Show Tag
                                 */
                                if ( isset( $wpbm_option[ 'wpbm_show_tag' ] ) && $wpbm_option[ 'wpbm_show_tag' ] == '1' ) {
                                    global $post;
                                    $tags = get_the_tags();
                                    $separator = ' ';
                                    $output = '';
                                    if ( ! empty( $tags ) ) {
                                        foreach ( $tags as $tag ) {
                                            $output .= '<a href="' . esc_url( get_tag_link( $tag -> term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', WPBM_TD ), $tag -> name ) ) . '">' . esc_html( $tag -> name ) . '</a>' . $separator;
                                        }
                                        ?>
                                        <div class="wpbm-tag-list">

                                            <?php
                                            echo trim( $output, $separator );
                                            ?>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                                <?php
                                /*
                                 * Read More
                                 */
                                if ( isset( $wpbm_option[ 'wpbm_show_read_more' ] ) && $wpbm_option[ 'wpbm_show_read_more' ] == '1' ) {
                                    if ( isset( $wpbm_option[ 'post_url' ] ) && $wpbm_option[ 'post_url' ] == 'post_link' ) {
                                        ?>
                                        <div class="wpbm-link-button">
                                            <a href="<?php echo get_permalink( $product_post_id ); ?>"><?php echo esc_attr( $wpbm_option[ 'wpbm_post_link_text' ] ); ?></a>
                                        </div>
                                        <?php
                                    } else {
                                        ?>
                                        <div class="wpbm-link-button">
                                            <a href="<?php echo esc_url( $wpbm_option[ 'wpbm_custom_url' ] ); ?>"><?php echo esc_attr( $wpbm_option[ 'wpbm_post_link_text' ] ); ?></a>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
            </li>
            <?php
            $current_date = $timeline_date;
        }
        ?>
    </ul>
    <?php
} else if ( isset( $wpbm_option[ 'timeline_horizontal_template' ] ) && $wpbm_option[ 'timeline_horizontal_template' ] == 'template-2' ) {
    ?>
    <div class="wpbm-outer-date-container wpbm-horz-bx">
        <ul class="wpbm-hor-timeline-date" data-id="<?php echo $random_num ?>"   id="wpbm-timeline-<?php echo $random_num ?>">
            <?php
            $count = 0;
            while ( $query -> have_posts() ) {
                $query -> the_post();
                $product_post_id = get_the_ID();
                ?> <li>
                    <a data-slide-index="<?php echo $count ++; ?>" href="">
                        <div class="wpbm-timeline-hor-line"></div>
                        <div class="wpbm-horiz-title">
                            <?php echo wp_trim_words( the_title(), 5, '...' ); ?>
                        </div>
                        <div class="wpbm-horizontal-circle"></div>
                    </a>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
    <div class="wpbm-outer-post-container wpbm-post-bx">
        <ul class="wpbm-timeline-post-wrapper" data-id="<?php echo $random_num ?>">
            <?php
            while ( $query -> have_posts() ) {
                $query -> the_post();
                $product_post_id = get_the_ID();
                $wpbm_extra_option = get_post_meta( $product_post_id, 'wpbm_extra_option', true );
                ?>
                <li class="wpbm-clearfix">
                    <div class="wpbm-sidebar-wrap">
                        <?php
                        /*
                         * Date
                         */

                        if ( isset( $wpbm_option[ 'wpbm_show_date' ] ) && $wpbm_option[ 'wpbm_show_date' ] == '1' ) {
                            ?>
                            <div class="wpbm-date-main">
                                <div class="wpbm-date-day">
                                    <?php echo get_the_date( 'd' ); ?>
                                </div>
                                <div class="wpbm-month">
                                    <?php echo get_the_date( 'M Y' ); ?>
                                </div>
                            </div>
                            <?php
                        }
                        /*
                         * Show Author
                         */
                        if ( isset( $wpbm_option[ 'wpbm_show_author' ] ) && $wpbm_option[ 'wpbm_show_author' ] == '1' ) {
                            ?>
                            <div class="wpbm-author-name">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <?php
                                the_author_posts_link();
                                ?>
                            </div>
                            <?php
                        }
                        /*
                         * Show Category
                         */
                        if ( isset( $wpbm_option[ 'wpbm_show_category' ] ) && $wpbm_option[ 'wpbm_show_category' ] == '1' ) {
                            ?>
                            <div class="wpbm-category-wrap">
                                <?php
                                $categories = get_the_category();
                                $separator = ' ';
                                $output = '';
                                if ( ! empty( $categories ) ) {
                                    foreach ( $categories as $category ) {
                                        $output .= '<a href="' . esc_url( get_category_link( $category -> term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', WPBM_TD ), $category -> name ) ) . '">' . esc_html( $category -> name ) . '</a>' . $separator;
                                    }
                                    ?>
                                    <div class="wpbm-category-list">
                                        <i class="fa fa-folder-open-o" aria-hidden="true"></i>

                                        <?php
                                        echo trim( $output, $separator );
                                        ?>

                                    </div>
                                <?php }
                                ?>
                            </div>
                            <?php
                        }
                        /*
                         * Display comment count
                         */
                        if ( isset( $wpbm_option[ 'wpbm_show_comment' ] ) && $wpbm_option[ 'wpbm_show_comment' ] == '1' ) {
                            ?>
                            <div class="wpbm-comment-wrap">
                                <i class="fa fa-comment-o" aria-hidden="true"></i>
                                <?php
                                echo comments_number();
                                ?>
                            </div>
                            <?php
                        }
                        /*
                         * Show Tag
                         */
                        if ( isset( $wpbm_option[ 'wpbm_show_tag' ] ) && $wpbm_option[ 'wpbm_show_tag' ] == '1' ) {
                            global $post;
                            $tags = get_the_tags();
                            $separator = '  ';
                            $output = '';

                            if ( ! empty( $tags ) ) {
                                $item = 1;
                                foreach ( $tags as $tag ) {
                                    if ( $item == 1 ) {
                                        $output .= '<a href="' . esc_url( get_tag_link( $tag -> term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', WPBM_TD ), $category -> name ) ) . '">' . '<i class="fa fa-tags" aria-hidden="true"></i>' . esc_html( $tag -> name ) . '</a>' . $separator;
                                    } else {
                                        $output .= '<a href="' . esc_url( get_tag_link( $tag -> term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', WPBM_TD ), $category -> name ) ) . '">' . esc_html( $tag -> name ) . '</a>' . $separator;
                                    }
                                    $item ++;
                                }
                                ?>
                                <div class="wpbm-tag-list">
                                    <?php
                                    echo trim( $output, $separator );
                                    ?>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                    <div class="wpbm-content-block">
                        <div class="wpbm-title">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?></a></div>
                        <?php
                        include(WPBM_PATH . 'inc/frontend/content/wpbm-slide-media.php');
                        include(WPBM_PATH . 'inc/frontend/content/details/content.php');
                        ?>

                        <div class="wpbm-lower-meta wpbm-clearfix">
                            <?php
                            /*
                             * Read More
                             */
                            if ( isset( $wpbm_option[ 'wpbm_show_read_more' ] ) && $wpbm_option[ 'wpbm_show_read_more' ] == '1' ) {
                                if ( isset( $wpbm_option[ 'post_url' ] ) && $wpbm_option[ 'post_url' ] == 'post_link' ) {
                                    ?>
                                    <div class="wpbm-link-button">
                                        <a href="<?php echo get_permalink( $product_post_id ); ?>"><?php echo esc_attr( $wpbm_option[ 'wpbm_post_link_text' ] ); ?>
                                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <?php
                                } else {
                                    ?>
                                    <div class="wpbm-link-button">
                                        <a href="<?php echo esc_url( $wpbm_option[ 'wpbm_custom_url' ] ); ?>"><?php echo esc_attr( $wpbm_option[ 'wpbm_post_link_text' ] ); ?>
                                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                    <?php
                                }
                            }
//
                            if ( isset( $wpbm_option[ 'wpbm_show_social_share' ] ) && $wpbm_option[ 'wpbm_show_social_share' ] == '1' ) {
                                ?>
                                <div class="wpbm-share-wrap">
                                    <div class="wpbm-share-wrap-contain">
                                        <?php if ( isset( $wpbm_option[ 'wpbm_show_facebook_share' ] ) && $wpbm_option[ 'wpbm_show_facebook_share' ] == '1' ) { ?>
                                            <a href="https://www.facebook.com/sharer.php?u=<?php echo get_permalink( $product_post_id ); ?>" target="_blank" rel="nofollow">
                                                <i class="fa fa-facebook" aria-hidden="true"></i>
                                            </a>
                                        <?php } ?>
                                        <?php if ( isset( $wpbm_option[ 'wpbm_show_twitter_share' ] ) && $wpbm_option[ 'wpbm_show_twitter_share' ] == '1' ) { ?>
                                            <a href="http://twitter.com/share?text=<?php echo the_title(); ?>&url=<?php echo get_permalink( $product_post_id ); ?>" target="_blank" rel="nofollow">
                                                <i class="fa fa-twitter" aria-hidden="true"></i>
                                            </a>
                                        <?php } ?>
                                        <?php if ( isset( $wpbm_option[ 'wpbm_show_google_share' ] ) && $wpbm_option[ 'wpbm_show_google_share' ] == '1' ) { ?>

                                            <a href="https://plus.google.com/share?url=<?php echo get_permalink( $product_post_id ); ?>" target="_blank" rel="nofollow">
                                                <i class="fa fa-google-plus" aria-hidden="true"></i>
                                            </a>
                                        <?php } ?>
                                        <?php if ( isset( $wpbm_option[ 'wpbm_show_linkedin_share' ] ) && $wpbm_option[ 'wpbm_show_linkedin_share' ] == '1' ) { ?>

                                            <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink( $product_post_id ); ?>" target="_blank" rel="nofollow">
                                                <i class="fa fa-linkedin" aria-hidden="true"></i>
                                            </a>
                                        <?php } ?>
                                        <?php if ( isset( $wpbm_option[ 'wpbm_show_mail_share' ] ) && $wpbm_option[ 'wpbm_show_mail_share' ] == '1' ) { ?>

                                            <a href="mailto:?subject=<?php echo the_title(); ?> &body=<?php echo the_title(); ?> <?php echo get_permalink( $product_post_id ); ?>" target="_blank" rel="nofollow">
                                                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                            </a>
                                        <?php } ?>
                                        <?php if ( isset( $wpbm_option[ 'wpbm_show_pinterest_share' ] ) && $wpbm_option[ 'wpbm_show_pinterest_share' ] == '1' ) { ?>

                                            <a href="http://pinterest.com/pin/create/button/?url=<?php echo get_permalink( $product_post_id ); ?>" target="_blank" rel="nofollow">
                                                <i class="fa fa-pinterest" aria-hidden="true"></i>
                                            </a>
                                        <?php } ?>

                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
    <?php
} else {
    ?>
    <div class="wpbm-hor-three-outer-wrap wpbm-horz-bx">
        <ul class="wpbm-hor-timeline-date" data-id="<?php echo $random_num ?>"   id="wpbm-timeline-<?php echo $random_num ?>">
            <?php
            $count = 0;
            while ( $query -> have_posts() ) {
                $query -> the_post();
                $product_post_id = get_the_ID();
                ?> <li>
                    <a data-slide-index="<?php echo $count ++; ?>" href="">
                        <div class="wpbm-timeline-hor-line"></div>
                        <div class="wpbm-date"><?php echo get_the_date( $date_format ); ?></div>
                        <div class="wpbm-horizontal-circle"></div>
                    </a>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
    <div class="wpbm-hor-three-outer-wrap wpbm-post-bx">
        <ul class="wpbm-timeline-post-wrapper" data-id="<?php echo $random_num ?>">
            <?php
            while ( $query -> have_posts() ) {
                $query -> the_post();
                $product_post_id = get_the_ID();
                $wpbm_extra_option = get_post_meta( $product_post_id, 'wpbm_extra_option', true );
                ?>
                <li>
                    <div class="wpbm-clearfix">
                        <div class="wpbm-image-container">
                            <?php
                            include(WPBM_PATH . 'inc/frontend/content/wpbm-slide-media.php');
                            /*
                             * Show Author
                             */
                            if ( isset( $wpbm_option[ 'wpbm_show_author' ] ) && $wpbm_option[ 'wpbm_show_author' ] == '1' ) {
                                ?>
                                <div class="wpbm-author-name">
                                    <?php
                                    echo get_avatar( get_the_author_meta( 'ID' ), 46 );
                                    the_author_posts_link();
                                    ?>
                                </div>
                            <?php }
                            ?>
                        </div>
                        <div class="wpbm-bottom-wrap">
                            <div class="wpbm-content-container">
                                <?php
                                /*
                                 * Show Category
                                 */
                                if ( isset( $wpbm_option[ 'wpbm_show_category' ] ) && $wpbm_option[ 'wpbm_show_category' ] == '1' ) {
                                    ?>
                                    <div class="wpbm-category-wrap">
                                        <?php
                                        $categories = get_the_category();
                                        $separator = ' ';
                                        $output = '';
                                        if ( ! empty( $categories ) ) {
                                            foreach ( $categories as $category ) {
                                                $output .= '<a href="' . esc_url( get_category_link( $category -> term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', WPBM_TD ), $category -> name ) ) . '">' . esc_html( $category -> name ) . '</a>' . $separator;
                                            }
                                            ?>
                                            <div class="wpbm-category-list">
                                                <?php
                                                echo trim( $output, $separator );
                                                ?>
                                            </div>
                                        <?php }
                                        ?>
                                    </div>
                                <?php }
                                ?>
                                <div class="wpbm-title">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?></a></div>
                                <div class="wpbm-meta-and-content-wrap wpbm-clearfix">
                                    <div class="wpbm-meta-wrap">
                                        <?php
                                        /*
                                         * Date
                                         */

                                        if ( isset( $wpbm_option[ 'wpbm_show_date' ] ) && $wpbm_option[ 'wpbm_show_date' ] == '1' ) {
                                            ?>
                                            <div class="wpbm-date-main">
                                                <div class="wpbm-date-day">
                                                    <?php echo get_the_date( 'd' ); ?>
                                                </div>
                                                <div class="wpbm-month">
                                                    <?php echo get_the_date( 'M Y' ); ?>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        /*
                                         * Display comment count
                                         */
                                        if ( isset( $wpbm_option[ 'wpbm_show_comment' ] ) && $wpbm_option[ 'wpbm_show_comment' ] == '1' ) {
                                            ?>
                                            <div class="wpbm-comment-wrap">
                                                <?php
                                                echo comments_number();
                                                ?>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                    <?php include(WPBM_PATH . 'inc/frontend/content/details/content.php'); ?>
                                </div>
                                <?php
                                /*
                                 * Show Tag
                                 */
                                if ( isset( $wpbm_option[ 'wpbm_show_tag' ] ) && $wpbm_option[ 'wpbm_show_tag' ] == '1' ) {
                                    global $post;
                                    $tags = get_the_tags();
                                    $separator = '  ';
                                    $output = '';
                                    if ( ! empty( $tags ) ) {
                                        foreach ( $tags as $tag ) {
                                            $output .= '<a href="' . esc_url( get_tag_link( $tag -> term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', WPBM_TD ), $category -> name ) ) . '">' . esc_html( $tag -> name ) . '</a>' . $separator;
                                        }
                                        ?>
                                        <div class="wpbm-tag-list">
                                            <span>
                                                <?php
                                                _e( 'Tags', WPBM_TD );
                                                ?>
                                            </span>
                                            <?php
                                            echo "<div class='wpbm-anchor-tag'>" . trim( $output, $separator ) . "</div>";
                                            ?>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                            <div class="wpbm-lower-meta wpbm-clearfix">
                                <?php
                                if ( isset( $wpbm_option[ 'wpbm_show_social_share' ] ) && $wpbm_option[ 'wpbm_show_social_share' ] == '1' ) {
                                    ?>
                                    <div class="wpbm-share-wrap">
                                        <?php _e( 'Share: ', WPBM_TD ); ?>
                                        <div class = "wpbm-share-wrap-contain">
                                            <?php if ( isset( $wpbm_option[ 'wpbm_show_facebook_share' ] ) && $wpbm_option[ 'wpbm_show_facebook_share' ] == '1' ) {
                                                ?>
                                                <a href="https://www.facebook.com/sharer.php?u=<?php echo get_permalink( $product_post_id ); ?>" target="_blank" rel="nofollow">
                                                    <i class="fa fa-facebook" aria-hidden="true"></i>
                                                </a>
                                            <?php } ?>
                                            <?php if ( isset( $wpbm_option[ 'wpbm_show_twitter_share' ] ) && $wpbm_option[ 'wpbm_show_twitter_share' ] == '1' ) { ?>
                                                <a href="http://twitter.com/share?text=<?php echo the_title(); ?>&url=<?php echo get_permalink( $product_post_id ); ?>" target="_blank" rel="nofollow">
                                                    <i class="fa fa-twitter" aria-hidden="true"></i>
                                                </a>
                                            <?php } ?>
                                            <?php if ( isset( $wpbm_option[ 'wpbm_show_google_share' ] ) && $wpbm_option[ 'wpbm_show_google_share' ] == '1' ) { ?>

                                                <a href="https://plus.google.com/share?url=<?php echo get_permalink( $product_post_id ); ?>" target="_blank" rel="nofollow">
                                                    <i class="fa fa-google-plus" aria-hidden="true"></i>
                                                </a>
                                            <?php } ?>
                                            <?php if ( isset( $wpbm_option[ 'wpbm_show_linkedin_share' ] ) && $wpbm_option[ 'wpbm_show_linkedin_share' ] == '1' ) { ?>

                                                <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink( $product_post_id ); ?>" target="_blank" rel="nofollow">
                                                    <i class="fa fa-linkedin" aria-hidden="true"></i>
                                                </a>
                                            <?php } ?>
                                            <?php if ( isset( $wpbm_option[ 'wpbm_show_mail_share' ] ) && $wpbm_option[ 'wpbm_show_mail_share' ] == '1' ) { ?>

                                                <a href="mailto:?subject=<?php echo the_title(); ?> &body=<?php echo the_title(); ?> <?php echo get_permalink( $product_post_id ); ?>" target="_blank" rel="nofollow">
                                                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                                </a>
                                            <?php } ?>
                                            <?php if ( isset( $wpbm_option[ 'wpbm_show_pinterest_share' ] ) && $wpbm_option[ 'wpbm_show_pinterest_share' ] == '1' ) { ?>

                                                <a href="http://pinterest.com/pin/create/button/?url=<?php echo get_permalink( $product_post_id ); ?>" target="_blank" rel="nofollow">
                                                    <i class="fa fa-pinterest" aria-hidden="true"></i>
                                                </a>
                                            <?php } ?>

                                        </div>
                                    </div>
                                    <?php
                                }
                                /*
                                 * Read More
                                 */
                                if ( isset( $wpbm_option[ 'wpbm_show_read_more' ] ) && $wpbm_option[ 'wpbm_show_read_more' ] == '1' ) {
                                    if ( isset( $wpbm_option[ 'post_url' ] ) && $wpbm_option[ 'post_url' ] == 'post_link' ) {
                                        ?>
                                        <div class="wpbm-link-button">
                                            <a href="<?php echo get_permalink( $product_post_id ); ?>"><?php echo esc_attr( $wpbm_option[ 'wpbm_post_link_text' ] ); ?></a>
                                        </div>
                                        <?php
                                    } else {
                                        ?>
                                        <div class="wpbm-link-button">
                                            <a href="<?php echo esc_url( $wpbm_option[ 'wpbm_custom_url' ] ); ?>"><?php echo esc_attr( $wpbm_option[ 'wpbm_post_link_text' ] ); ?></a>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </li>
                <?php
            }
            ?>
        </ul>
    </div>
    <?php
}
