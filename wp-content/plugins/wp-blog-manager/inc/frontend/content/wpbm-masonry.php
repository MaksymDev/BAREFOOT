<?php
if ( isset( $wpbm_option[ 'wpbm_masonry_template' ] ) && $wpbm_option[ 'wpbm_masonry_template' ] == 'template-1' ) {
    ?>
    <div class="wpbm-masonry-item <?php
    if ( isset( $wpbm_option[ 'wpbm_display_filter' ] ) && $wpbm_option[ 'wpbm_display_filter' ] == '1' ) {
        $categories = get_the_terms( $product_post_id, $wpbm_option[ 'select_post_taxonomy' ] );
        $separator = ' ';
        $output = '';
        if ( ! empty( $categories ) ) {
            foreach ( $categories as $category ) {
                $output .= 'wpbm-filter-cat-' . esc_html( $category -> slug ) . $separator;
            }
            echo 'wpbm-filter-all ' . trim( $output, $separator );
        }
    }
    ?>">
        <div class="wpbm-masonry-item-inner <?php
        if ( (isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] === 'video') || (isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] === 'sound_cloud') || (isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] === 'slider') ) {
            echo 'wpbm-masonry-common-wrap';
        }
        ?>">
                 <?php
                 include(WPBM_PATH . 'inc/frontend/content/wpbm-media-type.php');
                 ?>
            <div class="wpbm-content-car-wrap">
                <div class="wpbm-car-meta-wrap">
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
                        <?php
                    }
                    /*
                     * Date
                     */

                    if ( isset( $wpbm_option[ 'wpbm_show_date' ] ) && $wpbm_option[ 'wpbm_show_date' ] == '1' ) {
                        ?>
                        <div class="wpbm-date"><?php echo get_the_date( $date_format ); ?></div>
                        <?php
                    }
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
                    ?>
                </div>
                <div class="wpbm-title">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?></a></div>

                <?php
                include(WPBM_PATH . 'inc/frontend/content/details/content.php');
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
            <div class="wpbm-car-metadata-wrap">
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
                            $output .= '<a href="' . esc_url( get_tag_link( $tag -> term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', WPBM_TD ), $category -> name ) ) . '">' . esc_html( $tag -> name ) . '</a>' . $separator;
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
            <div class="wpbm-car-bottom-wrap">
                <?php
                /*
                 * Display comment count
                 */
                if ( isset( $wpbm_option[ 'wpbm_show_comment' ] ) && $wpbm_option[ 'wpbm_show_comment' ] == '1' ) {
                    ?>
                    <div class="wpbm-comment-outer-wrap">
                        <div class="wpbm-comment-wrap">
                            <?php
                            echo comments_number( '0' );
                            ?>
                        </div>
                        <div class="wpbm-comment-icon">
                            <i class="fa fa-comment-o" aria-hidden="true"></i>
                        </div>
                    </div>
                    <?php
                }

                if ( isset( $wpbm_option[ 'wpbm_show_social_share' ] ) && $wpbm_option[ 'wpbm_show_social_share' ] == '1' ) {
                    ?>
                    <div class="wpbm-share-container">
                        <i class="fa fa-share" aria-hidden="true"></i>
                        <div class="wpbm-share-wrap">
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
                <?php }
                ?>
            </div>
        </div>
    </div>
    <?php
} else if ( isset( $wpbm_option[ 'wpbm_masonry_template' ] ) && $wpbm_option[ 'wpbm_masonry_template' ] == 'template-2' ) {
    ?>
    <div class="wpbm-masonry-item <?php
    if ( isset( $wpbm_option[ 'wpbm_display_filter' ] ) && $wpbm_option[ 'wpbm_display_filter' ] == '1' ) {
        $categories = get_the_terms( $product_post_id, $wpbm_option[ 'select_post_taxonomy' ] );
        $separator = ' ';
        $output = '';
        if ( ! empty( $categories ) ) {
            foreach ( $categories as $category ) {
                $output .= 'wpbm-filter-cat-' . esc_html( $category -> slug ) . $separator;
            }
            echo 'wpbm-filter-all ' . trim( $output, $separator );
        }
    }
    ?>">
        <div class="wpbm-masonry-item-inner <?php
        if ( (isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] === 'video') || (isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] === 'sound_cloud') || (isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] === 'slider') ) {
            echo 'wpbm-masonry-common-wrap';
        }
        ?>">
                 <?php
                 include(WPBM_PATH . 'inc/frontend/content/wpbm-media-type.php');
                 ?>
            <div class="wpbm-bottom-wrap-main">
                <div class="wpbm-top-part">
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
                        <?php
                    }
                    /*
                     * Date
                     */

                    if ( isset( $wpbm_option[ 'wpbm_show_date' ] ) && $wpbm_option[ 'wpbm_show_date' ] == '1' ) {
                        ?>
                        <div class="wpbm-date"><?php echo get_the_date( $date_format ); ?></div>
                        <?php
                    }
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
                    ?>
                </div>
                <div class="wpbm-title">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?></a></div>

                <?php
                include(WPBM_PATH . 'inc/frontend/content/details/content.php');
                /*
                 * Read More
                 */
                if ( isset( $wpbm_option[ 'wpbm_show_read_more' ] ) && $wpbm_option[ 'wpbm_show_read_more' ] == '1' ) {
                    if ( isset( $wpbm_option[ 'post_url' ] ) && $wpbm_option[ 'post_url' ] == 'post_link' ) {
                        ?>
                        <div class="wpbm-link-button">
                            <a href="<?php echo get_permalink( $product_post_id ); ?>"><span><?php echo esc_attr( $wpbm_option[ 'wpbm_post_link_text' ] ); ?></span></a>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="wpbm-link-button">
                            <a href="<?php echo esc_url( $wpbm_option[ 'wpbm_custom_url' ] ); ?>"><span><?php echo esc_attr( $wpbm_option[ 'wpbm_post_link_text' ] ); ?></span></a>
                        </div>
                        <?php
                    }
                }
                ?>
                <div class="wpbm-car-metadata-wrap">
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
                <?php
                if ( isset( $wpbm_option[ 'wpbm_show_social_share' ] ) && $wpbm_option[ 'wpbm_show_social_share' ] == '1' ) {
                    ?>
                    <div class="wpbm-share-wrap">
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
                <?php } ?>
            </div>
        </div>
    </div>
    <?php
} else if ( isset( $wpbm_option[ 'wpbm_masonry_template' ] ) && $wpbm_option[ 'wpbm_masonry_template' ] == 'template-3' ) {
    if ( $wpbm_row % 4 === 0 ) {
        ?>
        <div class="wpbm-masonry-item wpbm-var-width <?php
        if ( isset( $wpbm_option[ 'wpbm_display_filter' ] ) && $wpbm_option[ 'wpbm_display_filter' ] == '1' ) {
            $categories = get_the_category();
            $separator = ' ';
            $output = '';
            if ( ! empty( $categories ) ) {
                foreach ( $categories as $category ) {
                    $output .= 'wpbm-filter-cat-' . esc_html( $category -> slug ) . $separator;
                }
                echo 'wpbm-filter-all ' . trim( $output, $separator );
            }
        }
        ?>">
             <?php } else {
                 ?>
            <div class = "wpbm-masonry-item <?php
            if ( isset( $wpbm_option[ 'wpbm_display_filter' ] ) && $wpbm_option[ 'wpbm_display_filter' ] == '1' ) {
                $categories = get_the_category();
                $separator = ' ';
                $output = '';
                if ( ! empty( $categories ) ) {
                    foreach ( $categories as $category ) {
                        $output .= 'wpbm-filter-cat-' . esc_html( $category -> slug ) . $separator;
                    }
                    echo 'wpbm-filter-all ' . trim( $output, $separator );
                }
            }
            ?>">
                     <?php
                 }
                 ?>
            <div class="wpbm-masonry-item-inner  <?php
            if ( isset( $wpbm_extra_option[ 'media_type' ] ) ) {
                if ( $wpbm_extra_option[ 'media_type' ] === 'video' || $wpbm_extra_option[ 'media_type' ] == 'sound_cloud' || $wpbm_extra_option[ 'media_type' ] === 'slider' ) {
                    echo 'wpbm-masonry-common-wrap';
                }
            }
            ?>">
                     <?php
                     include(WPBM_PATH . 'inc/frontend/content/wpbm-media-type.php');
                     ?>
                <div class="wpbm-bottom-grid-wrap">
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
                         * Show Category
                         */
                        if ( isset( $wpbm_option[ 'wpbm_show_category' ] ) && $wpbm_option[ 'wpbm_show_category' ] == '1' ) {
                            ?>
                            <div class="wpbm-category-wrap">
                                <?php
                                $categories = get_the_category();
                                $separator = ' / ';
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
                            <?php
                        }
                        /*
                         * Date
                         */

                        if ( isset( $wpbm_option[ 'wpbm_show_date' ] ) && $wpbm_option[ 'wpbm_show_date' ] == '1' ) {
                            ?>
                            <div class="wpbm-date"><?php echo get_the_date( $date_format ); ?></div>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="wpbm-content-outer-wrap">
                        <div class="wpbm-title">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?></a></div>

                        <?php
                        include(WPBM_PATH . 'inc/frontend/content/details/content.php');
                        if ( isset( $wpbm_option[ 'wpbm_show_social_share' ] ) && $wpbm_option[ 'wpbm_show_social_share' ] == '1' ) {
                            ?>
                            <div class="wpbm-share-wrap">
                                <div class="wpbm-share-wrap-contain">
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
                            <?php
                        }
                        ?>
                    </div>
                    <div class="wpbm-bottom-wrap wpbm-clearfix">
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
                                    $output .= '<a href="' . esc_url( get_tag_link( $tag -> term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', WPBM_TD ), $tag -> name ) ) . '">' . "#" . esc_html( $tag -> name ) . '</a>' . $separator;
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
                </div>
            </div>
        </div>
        <?php
        $wpbm_row ++;
    } else if ( isset( $wpbm_option[ 'wpbm_masonry_template' ] ) && $wpbm_option[ 'wpbm_masonry_template' ] == 'template-4' ) {
        ?>
        <div class="wpbm-masonry-item <?php
        if ( isset( $wpbm_option[ 'wpbm_display_filter' ] ) && $wpbm_option[ 'wpbm_display_filter' ] == '1' ) {
            $categories = get_the_category();
            $separator = ' ';
            $output = '';
            if ( ! empty( $categories ) ) {
                foreach ( $categories as $category ) {
                    $output .= 'wpbm-filter-cat-' . esc_html( $category -> slug ) . $separator;
                }
                echo 'wpbm-filter-all ' . trim( $output, $separator );
            }
        }
        ?>">
            <div class="wpbm-masonry-item-inner <?php
            if ( (isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] === 'video') || (isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] === 'sound_cloud') || (isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] === 'slider') ) {
                echo 'wpbm-masonry-common-wrap';
            }
            ?>">
                     <?php
                     include(WPBM_PATH . 'inc/frontend/content/wpbm-media-type.php');
                     ?>
                <div class="wpbm-main-content">
                    <div class="wpbm-content-car-wrap">
                        <div class="wpbm-car-meta-wrap">
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
                                <?php
                            }
                            /*
                             * Date
                             */

                            if ( isset( $wpbm_option[ 'wpbm_show_date' ] ) && $wpbm_option[ 'wpbm_show_date' ] == '1' ) {
                                ?>
                                <div class="wpbm-date"><?php echo get_the_date( $date_format ); ?></div>
                                <?php
                            }
                            ?>
                        </div>
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
                        ?>
                        <div class="wpbm-title">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?></a></div>
                        <?php include(WPBM_PATH . 'inc/frontend/content/details/content.php'); ?>
                    </div>
                    <div class="wpbm-car-metadata-wrap">
                        <?php
                        /*
                         * Display comment count
                         */
                        if ( isset( $wpbm_option[ 'wpbm_show_comment' ] ) && $wpbm_option[ 'wpbm_show_comment' ] == '1' ) {
                            ?>
                            <div class="wpbm-comment-wrap">
                                <i class="fa fa-comment-o" aria-hidden="true"></i>
                                <?php
                                echo comments_number( '0', '%' );
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
                            $separator = ' ';
                            $output = '';
                            if ( ! empty( $tags ) ) {
                                foreach ( $tags as $tag ) {
                                    $output .= '<a href="' . esc_url( get_tag_link( $tag -> term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', WPBM_TD ), $tag -> name ) ) . '">' . esc_html( $tag -> name ) . '</a>' . $separator;
                                }
                                ?>
                                <div class="wpbm-tag-list">
                                    <i class="fa fa-tag" aria-hidden="true"></i>
                                    <?php
                                    echo trim( $output, $separator );
                                    ?>
                                </div>
                                <?php
                            }
                        }
                        if ( isset( $wpbm_option[ 'wpbm_show_social_share' ] ) && $wpbm_option[ 'wpbm_show_social_share' ] == '1' ) {
                            ?>
                            <div class="wpbm-share-container">
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
                        <?php }
                        ?>
                    </div>
                    <div class="wpbm-car-bottom-wrap">
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
        </div>
        <?php
    } else if ( isset( $wpbm_option[ 'wpbm_masonry_template' ] ) && $wpbm_option[ 'wpbm_masonry_template' ] == 'template-5' ) {
        ?>
        <div class="wpbm-masonry-item <?php
        if ( isset( $wpbm_option[ 'wpbm_display_filter' ] ) && $wpbm_option[ 'wpbm_display_filter' ] == '1' ) {
            $categories = get_the_category();
            $separator = ' ';
            $output = '';
            if ( ! empty( $categories ) ) {
                foreach ( $categories as $category ) {
                    $output .= 'wpbm-filter-cat-' . esc_html( $category -> slug ) . $separator;
                }
                echo 'wpbm-filter-all ' . trim( $output, $separator );
            }
        }
        ?>">
            <div class="wpbm-masonry-item-inner <?php
            if ( (isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] === 'video') || (isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] === 'sound_cloud') || (isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] === 'slider') ) {
                echo 'wpbm-masonry-common-wrap';
            }
            ?>">
                     <?php
                     include(WPBM_PATH . 'inc/frontend/content/wpbm-media-type.php');
                     ?>
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
                        <?php
                    }

                    /*
                     * Date
                     */

                    if ( isset( $wpbm_option[ 'wpbm_show_date' ] ) && $wpbm_option[ 'wpbm_show_date' ] == '1' ) {
                        ?>
                        <div class="wpbm-date"><?php echo get_the_date( $date_format ); ?></div>
                        <?php
                    }
                    ?>
                </div>
                <div class="wpbm-title">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?></a></div>
                <div class="wpbm-content-outer-wrap">
                    <div class="wpbm-content">
                        <?php
                        if ( $display_content == '1' ) {

                            if ( isset( $wpbm_option[ 'post_content' ] ) && $wpbm_option[ 'post_content' ] == 'full-text' ) {
                                the_content();
                            } else {
                                echo substr( get_the_excerpt(), 0, $excerpt );
                            }
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
                    <?php
                    if ( isset( $wpbm_option[ 'wpbm_show_social_share' ] ) && $wpbm_option[ 'wpbm_show_social_share' ] == '1' ) {
                        ?>
                        <div class="wpbm-share-wrap">
                            <div class="wpbm-share-main-wrap">
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
                        <?php
                    }
                    ?>
                </div>
                <div class="wpbm-bottom-wrap">
                    <?php
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
                        $separator = ',';
                        $output = '';
                        if ( ! empty( $tags ) ) {
                            foreach ( $tags as $tag ) {
                                $output .= '<a href="' . esc_url( get_tag_link( $tag -> term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', WPBM_TD ), $tag -> name ) ) . '">' . esc_html( $tag -> name ) . '</a>' . $separator;
                            }
                            ?>
                            <div class="wpbm-tag-list">
                                <i class="fa fa-tags" aria-hidden="true"></i>
                                <?php
                                echo trim( $output, $separator );
                                ?>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <?php
    } else if ( isset( $wpbm_option[ 'wpbm_masonry_template' ] ) && $wpbm_option[ 'wpbm_masonry_template' ] == 'template-6' ) {
        ?>
        <div class="wpbm-masonry-item <?php
        if ( isset( $wpbm_option[ 'wpbm_display_filter' ] ) && $wpbm_option[ 'wpbm_display_filter' ] == '1' ) {
            $categories = get_the_category();
            $separator = ' ';
            $output = '';
            if ( ! empty( $categories ) ) {
                foreach ( $categories as $category ) {
                    $output .= 'wpbm-filter-cat-' . esc_html( $category -> slug ) . $separator;
                }
                echo 'wpbm-filter-all ' . trim( $output, $separator );
            }
        }
        ?>">
            <div class="wpbm-masonry-item-inner <?php
            if ( (isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] === 'video') || (isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] === 'sound_cloud') || (isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] === 'slider') ) {
                echo 'wpbm-masonry-common-wrap';
            }
            ?>">
                     <?php
                     include(WPBM_PATH . 'inc/frontend/content/wpbm-media-type.php');
                     ?>
                <div class="wpbm-content-block-wrap">
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
                        <?php
                    }
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
                                _e( 'By ', WPBM_TD );
                                the_author_posts_link();
                                ?>
                            </div>
                            <?php
                        }

                        /*
                         * Date
                         */

                        if ( isset( $wpbm_option[ 'wpbm_show_date' ] ) && $wpbm_option[ 'wpbm_show_date' ] == '1' ) {
                            ?>
                            <div class="wpbm-date">
                                <?php
                                _e( 'On ', WPBM_TD );
                                echo get_the_date( $date_format );
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
                    <div class="wpbm-content-outer-wrap">

                        <?php
                        include(WPBM_PATH . 'inc/frontend/content/details/content.php');
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
                    <div class="wpbm-bottom-wrap wpbm-clearfix">
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
                                    $output .= '<a href="' . esc_url( get_tag_link( $tag -> term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', WPBM_TD ), $tag -> name ) ) . '">' . "#" . esc_html( $tag -> name ) . '</a>' . $separator;
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
                        if ( isset( $wpbm_option[ 'wpbm_show_social_share' ] ) && $wpbm_option[ 'wpbm_show_social_share' ] == '1' ) {
                            ?>
                            <div class="wpbm-share-wrap">
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
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    } else {
        ?>
        <div class="wpbm-masonry-item <?php
        if ( isset( $wpbm_option[ 'wpbm_display_filter' ] ) && $wpbm_option[ 'wpbm_display_filter' ] == '1' ) {
            $categories = get_the_category();
            $separator = ' ';
            $output = '';
            if ( ! empty( $categories ) ) {
                foreach ( $categories as $category ) {
                    $output .= 'wpbm-filter-cat-' . esc_html( $category -> slug ) . $separator;
                }
                echo 'wpbm-filter-all ' . trim( $output, $separator );
            }
        }
        ?>">
            <div class="wpbm-masonry-item-inner <?php
            if ( (isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] === 'video') || (isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] === 'sound_cloud') || (isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] === 'slider') ) {
                echo 'wpbm-masonry-common-wrap';
            }
            ?>">
                     <?php
                     include(WPBM_PATH . 'inc/frontend/content/wpbm-media-type.php');
                     ?>
                <div class="wpbm-main-content-bottom">
                    <div class="wpbm-content-car-wrap">
                        <div class="wpbm-car-meta-wrap">
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
                                <?php
                            }
                            /*
                             * Date
                             */

                            if ( isset( $wpbm_option[ 'wpbm_show_date' ] ) && $wpbm_option[ 'wpbm_show_date' ] == '1' ) {
                                ?>
                                <div class="wpbm-date"><?php echo get_the_date( $date_format ); ?></div>
                                <?php
                            }
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
                            ?>
                        </div>
                        <div class="wpbm-title">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?></a></div>

                        <?php
                        include(WPBM_PATH . 'inc/frontend/content/details/content.php');
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
                    <div class="wpbm-car-metadata-wrap">
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
                    </div>
                    <div class="wpbm-car-bottom-wrap">
                        <?php
                        /*
                         * Display comment count
                         */
                        if ( isset( $wpbm_option[ 'wpbm_show_comment' ] ) && $wpbm_option[ 'wpbm_show_comment' ] == '1' ) {
                            ?>
                            <div class="wpbm-comment-outer-wrap">
                                <div class="wpbm-comment-wrap">
                                    <?php
                                    echo get_comments_number();
                                    ?>
                                </div>
                                <div class="wpbm-comment-icon">
                                    <i class="fa fa-comment-o" aria-hidden="true"></i>
                                </div>
                            </div>
                            <?php
                        }

                        if ( isset( $wpbm_option[ 'wpbm_show_social_share' ] ) && $wpbm_option[ 'wpbm_show_social_share' ] == '1' ) {
                            ?>
                            <div class="wpbm-share-container">
                                <i class="fa fa-share" aria-hidden="true"></i>
                                <div class="wpbm-share-wrap">
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
                        <?php }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }




