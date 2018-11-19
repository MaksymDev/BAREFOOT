<?php
if ( $wpbm_option[ 'wpbm_slider_template' ] == 'template-1' ) {
    ?>
    <div class="wpbm-contain-wrap-all wpbm-clearfix">
        <?php
        if ( isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] == 'image' ) {
            if ( has_post_thumbnail( $product_post_id ) ) {
                ?>
                <div class="wpbm-image">
                    <?php echo get_the_post_thumbnail( $product_post_id, 'full' );
                    ?>
                </div>
            <?php } else {
                ?>
                <div class="wpbm-image">
                    <img src="<?php echo WPBM_IMG_DIR; ?>/no-image-available.png" alt="No image available">
                </div>
                <?php
            }
        }
        ?>
        <div class="wpbm-contain-wrap-all-main">
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
            <div class="wpbm-meta-wrap wpbm-clearfix">
                <div class="wpbm-meta-data">
                    <?php
                    /*
                     * Date
                     */

                    if ( isset( $wpbm_option[ 'wpbm_show_date' ] ) && $wpbm_option[ 'wpbm_show_date' ] == '1' ) {
                        ?>
                        <div class="wpbm-date">
                            <i class="fa fa-calendar-o" aria-hidden="true"></i>
                            <?php echo get_the_date( $date_format ); ?></div>
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
                        echo get_avatar( get_the_author_meta( 'ID' ), 29 );
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
            <div class="wpbm-bottom-wrap">
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
                if ( isset( $wpbm_option[ 'wpbm_show_social_share' ] ) && $wpbm_option[ 'wpbm_show_social_share' ] == '1' ) {
                    ?>
                    <div class="wpbm-share-outer-wrap">
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
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    <?php
} else if ( $wpbm_option[ 'wpbm_slider_template' ] == 'template-2' ) {
    ?>
    <div class="wpbm-contain-wrap-all">
        <?php
        if ( isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] == 'image' ) {
            if ( has_post_thumbnail( $product_post_id ) ) {
                ?>
                <div class="wpbm-image">
                    <?php echo get_the_post_thumbnail( $product_post_id, 'full' );
                    ?>
                </div>
            <?php } else {
                ?>
                <div class="wpbm-image">
                    <img src="<?php echo WPBM_IMG_DIR; ?>/no-image-available.png" alt="No image available">
                </div>
                <?php
            }
        }
        ?>
        <div class="wpbm-contain-wrap-all-main">
            <div class="wpbm-contain-wrap-all-main-inner">
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
                    <div class="wpbm-meta-data">
                        <?php
                        /*
                         * Date
                         */

                        if ( isset( $wpbm_option[ 'wpbm_show_date' ] ) && $wpbm_option[ 'wpbm_show_date' ] == '1' ) {
                            ?>
                            <div class="wpbm-date">
                                <i class="fa fa-calendar-o" aria-hidden="true"></i>
                                <?php echo get_the_date( $date_format ); ?></div>
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
                        ?>
                    </div>

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
                    if ( isset( $wpbm_option[ 'wpbm_show_social_share' ] ) && $wpbm_option[ 'wpbm_show_social_share' ] == '1' ) {
                        ?>
                        <div class="wpbm-share-outer-wrap">

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
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php
} else if ( $wpbm_option[ 'wpbm_slider_template' ] == 'template-3' ) {
    ?>
    <div class="wpbm-clearfix">
        <div class="wpbm-first-inner-wrap">
            <?php
            if ( isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] == 'image' ) {
                if ( has_post_thumbnail( $product_post_id ) ) {
                    ?>
                    <div class="wpbm-image">
                        <?php echo get_the_post_thumbnail( $product_post_id, 'full' );
                        ?>
                    </div>
                <?php } else {
                    ?>
                    <div class = "wpbm-image">
                        <img src="<?php echo WPBM_IMG_DIR; ?>/no-image-available.png" alt="No image available">
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
        <div class="wpbm-second-inner-wrap">
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
                    <div class="wpbm-date"><?php echo get_the_date( $date_format ); ?></div>
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
            <div class="wpbm-meta-two-wrap">
                <?php
                /*
                 * Read More
                 */
                if ( isset( $wpbm_option[ 'wpbm_show_read_more' ] ) && $wpbm_option[ 'wpbm_show_read_more' ] == '1' ) {
                    if ( isset( $wpbm_option[ 'post_url' ] ) && $wpbm_option[ 'post_url' ] == 'post_link' ) {
                        ?>
                        <div class="wpbm-link-button">
                            <a href="<?php echo get_permalink( $product_post_id ); ?>"><?php echo esc_attr( $wpbm_option[ 'wpbm_post_link_text' ] ); ?><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="wpbm-link-button">
                            <a href="<?php echo esc_url( $wpbm_option[ 'wpbm_custom_url' ] ); ?>"><?php echo esc_attr( $wpbm_option[ 'wpbm_post_link_text' ] ); ?><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
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
                            $output .= '<a href="' . esc_url( get_tag_link( $tag -> term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', WPBM_TD ), $category -> name ) ) . '">' . "#" . esc_html( $tag -> name ) . '</a>' . $separator;
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
    <?php
} else if ( $wpbm_option[ 'wpbm_slider_template' ] == 'template-4' ) {
    ?>
    <div class = "wpbm-car-img-wrap">
        <?php
        if ( isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] == 'image' ) {
            if ( has_post_thumbnail( $product_post_id ) ) {
                ?>
                <div class="wpbm-image">
                    <?php echo get_the_post_thumbnail( $product_post_id, 'full' );
                    ?>
                </div>
            <?php } else {
                ?>
                <div class="wpbm-image">
                    <img src="<?php echo WPBM_IMG_DIR; ?>/no-image-available.png" alt="No image available">
                </div>
                <?php
            }
        }
        ?>
        <div class="wpbm-all-contain">
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
            <div class="wpbm-car-meta-wrap">
                <?php
                /*
                 * Date
                 */

                if ( isset( $wpbm_option[ 'wpbm_show_date' ] ) && $wpbm_option[ 'wpbm_show_date' ] == '1' ) {
                    ?>
                    <div class="wpbm-date">
                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                        <?php echo get_the_date( $date_format ); ?></div>
                    <?php
                }

                /*
                 * Display comment count
                 */
                if ( isset( $wpbm_option[ 'wpbm_show_comment' ] ) && $wpbm_option[ 'wpbm_show_comment' ] == '1' ) {
                    ?>
                    <div class="wpbm-comment-wrap">
                        <i class="fa fa-comments-o" aria-hidden="true"></i>
                        <?php
                        echo comments_number();
                        ?>
                    </div>
                    <?php
                }
                ?>
            </div>
            <?php
            include(WPBM_PATH . 'inc/frontend/content/details/car-content.php');
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

            <div class="wpbm-car-metadata-wrap wpbm-clearfix">
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
                            $output .= '<a href="' . esc_url( get_tag_link( $tag -> term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', WPBM_TD ), $category -> name ) ) . '">' . "#" . esc_html( $tag -> name ) . '</a>' . $separator;
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
            <?php
            /*
             * Show Author
             */
            if ( isset( $wpbm_option[ 'wpbm_show_author' ] ) && $wpbm_option[ 'wpbm_show_author' ] == '1' ) {
                ?>
                <div class="wpbm-author-name">
                    <?php
                    echo get_avatar( get_the_author_meta( 'ID' ), 40 );
                    the_author_posts_link();
                    ?>
                </div>
            <?php }
            ?>
        </div>
    </div>
    <?php
} else if ( $wpbm_option[ 'wpbm_slider_template' ] == 'template-5' ) {
    ?>
    <div class="wpbm-image-content">
        <?php
        if ( isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] == 'image' ) {
            if ( has_post_thumbnail( $product_post_id ) ) {
                ?>
                <div class="wpbm-image">
                    <?php echo get_the_post_thumbnail( $product_post_id, 'full' );
                    ?>
                </div>
            <?php } else {
                ?>
                <div class="wpbm-image">
                    <img src="<?php echo WPBM_IMG_DIR; ?>/no-image-available.png" alt="No image available">
                </div>
                <?php
            }
        }
        ?>
        <div class="wpbm-wrap-all">
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
                        echo get_avatar( get_the_author_meta( 'ID' ), 29 );
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
                    <div class="wpbm-date"><?php echo get_the_date( $date_format ); ?></div>
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
                        <?php
                        echo trim( $output, $separator );
                        ?>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div><?php } else if ( $wpbm_option[ 'wpbm_slider_template' ] == 'template-6' ) {
            ?>
    <div class="wpbm-img-car-container">
        <div class="wpbm-clearfix">
            <div class="wpbm-image-container">
                <?php
                if ( isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] == 'image' ) {
                    if ( has_post_thumbnail( $product_post_id ) ) {
                        ?>
                        <div class="wpbm-image">
                            <?php echo get_the_post_thumbnail( $product_post_id, 'full' );
                            ?>
                        </div>
                    <?php } else {
                        ?>
                        <div class="wpbm-image">
                            <img src="<?php echo WPBM_IMG_DIR; ?>/no-image-available.png" alt="No image available">
                        </div>
                        <?php
                    }
                }
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
                            <?php _e( 'Share ', WPBM_TD ); ?>
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
    </div>
    <?php
} else if ( $wpbm_option[ 'wpbm_slider_template' ] == 'template-7' ) {
    ?><div class="wpbm-img-car-container"> <?php
    if ( isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] == 'image' ) {
        if ( has_post_thumbnail( $product_post_id ) ) {
            ?>
                <div class="wpbm-image">
                    <?php echo get_the_post_thumbnail( $product_post_id, 'full' );
                    ?>
                </div>
            <?php } else {
                ?>
                <div class="wpbm-image">
                    <img src="<?php echo WPBM_IMG_DIR; ?>/no-image-available.png" alt="No image available">
                </div>
                <?php
            }
        }
        ?>
        <div class="wpbm-contain-wrap-all">
            <div class="wpbm-contain-wrap-all-main">
                <div class="wpbm-contain-wrap-all-main-inner">
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
                            <div class="wpbm-date"><?php echo get_the_date( $date_format ); ?></div>
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
                    if ( isset( $wpbm_option[ 'wpbm_show_social_share' ] ) && $wpbm_option[ 'wpbm_show_social_share' ] == '1' ) {
                        ?>
                        <div class="wpbm-share-outer-wrap">
                            <i class="fa fa-share-alt" aria-hidden="true"></i>
                            <div class="wpbm-share-wrap" style="display: none;">
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
            </div>
        </div>
    </div>
    <?php
} else if ( $wpbm_option[ 'wpbm_slider_template' ] == 'template-8' ) {
    ?>
    <div class="wpbm-img-car-container">
        <div class="wpbm-clearfix">
            <div class="wpbm-first-inner-wrap">
                <?php
                include(WPBM_PATH . 'inc/frontend/content/wpbm-media-type.php');
                ?>
            </div>
            <div class="wpbm-second-inner-wrap">
                <?php
                /*
                 * Date
                 */

                if ( isset( $wpbm_option[ 'wpbm_show_date' ] ) && $wpbm_option[ 'wpbm_show_date' ] == '1' ) {
                    ?>
                    <div class="wpbm-date"><?php echo get_the_date( $date_format ); ?></div>
                <?php }
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
                            _e( 'By ', WPBM_TD );
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
                if ( isset( $wpbm_option[ 'wpbm_show_tag' ] ) && $wpbm_option[ 'wpbm_show_tag' ] == '1' || isset( $wpbm_option[ 'wpbm_show_social_share' ] ) && $wpbm_option[ 'wpbm_show_social_share' ] == '1' ) {
                    ?>
                    <div class="wpbm-meta-two-wrap">
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
                                    $output .= '<a href="' . esc_url( get_tag_link( $tag -> term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', WPBM_TD ), $category -> name ) ) . '">' . "#" . esc_html( $tag -> name ) . '</a>' . $separator;
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
                            <div class="wpbm-share-wrap <?php
                            if ( empty( $tags ) ) {
                                echo 'wpbm-only-share';
                            }
                            ?>">
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
                <?php } ?>
            </div>
        </div>
    </div>
    <?php
} else if ( $wpbm_option[ 'wpbm_slider_template' ] == 'template-9' ) {
    ?>
    <div class="wpbm-img-car-container">
        <div class="wpbm-clearfix">
            <div class = "wpbm-first-inner-wrap">
                <?php
                if ( isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] == 'image' ) {
                    if ( has_post_thumbnail( $product_post_id ) ) {
                        ?>
                        <div class="wpbm-image">
                            <?php echo get_the_post_thumbnail( $product_post_id, 'full' );
                            ?>
                        </div>
                    <?php } else {
                        ?>
                        <div class = "wpbm-image">
                            <img src="<?php echo WPBM_IMG_DIR; ?>/no-image-available.png" alt="No image available">
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
            <div class="wpbm-second-inner-wrap">
                <div class="wpbm-meta-wrap">
                    <?php
                    /*
                     * Show Author
                     */
                    if ( isset( $wpbm_option[ 'wpbm_show_author' ] ) && $wpbm_option[ 'wpbm_show_author' ] == '1' ) {
                        ?>
                        <div class="wpbm-author-name">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                            <?php
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
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                            <?php echo get_the_date( $date_format ); ?></div>
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
                    ?>
                </div>
                <div class="wpbm-title">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?></a></div>

                <?php
                /*
                 * Show Category
                 */
                if ( isset( $wpbm_option[ 'wpbm_show_category' ] ) && $wpbm_option[ 'wpbm_show_category' ] == '1' ) {
                    ?>
                    <div class="wpbm-category-wrap">
                        <?php
                        $categories = get_the_category();
                        $separator = ' , ';
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
                if ( isset( $wpbm_option[ 'wpbm_show_tag' ] ) && $wpbm_option[ 'wpbm_show_tag' ] == '1' || isset( $wpbm_option[ 'wpbm_show_social_share' ] ) && $wpbm_option[ 'wpbm_show_social_share' ] == '1' ) {
                    ?>
                    <div class="wpbm-meta-two-wrap">
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
                                    $output .= '<a href="' . esc_url( get_tag_link( $tag -> term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', WPBM_TD ), $category -> name ) ) . '">' . "#" . esc_html( $tag -> name ) . '</a>' . $separator;
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
                            <div class="wpbm-share-wrap <?php
                            if ( empty( $tags ) ) {
                                echo 'wpbm-only-share';
                            }
                            ?>">
                                     <?php _e( 'Share', WPBM_TD ); ?>
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
                <?php } ?>
            </div>
        </div>
    </div>
    <?php
} else {
    ?>
    <div class="wpbm-img-car-container">
        <div class="wpbm-clearfix">
            <div class="wpbm-first-inner-wrap">
                <?php
                if ( isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] == 'image' ) {
                    if ( has_post_thumbnail( $product_post_id ) ) {
                        ?>
                        <div class="wpbm-image">
                            <?php echo get_the_post_thumbnail( $product_post_id, 'full' );
                            ?>
                        </div>
                    <?php } else {
                        ?>
                        <div class = "wpbm-image">
                            <img src="<?php echo WPBM_IMG_DIR; ?>/no-image-available.png" alt="No image available">
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
            <div class="wpbm-second-inner-wrap">
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
                            the_author_posts_link();
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
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
                 * Show Tag
                 */
                if ( isset( $wpbm_option[ 'wpbm_show_tag' ] ) && $wpbm_option[ 'wpbm_show_tag' ] == '1' ) {
                    global $post;
                    $tags = get_the_tags();
                    $separator = ' ';
                    $output = '';
                    if ( ! empty( $tags ) ) {
                        foreach ( $tags as $tag ) {
                            $output .= '<a href="' . esc_url( get_tag_link( $tag -> term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', WPBM_TD ), $category -> name ) ) . '">' . "#" . esc_html( $tag -> name ) . '</a>' . $separator;
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
                include(WPBM_PATH . 'inc/frontend/content/details/content.php');
                ?>


                <div class="wpbm-link-section">
                    <?php
                    /*
                     * Read More
                     */
                    if ( isset( $wpbm_option[ 'wpbm_show_read_more' ] ) && $wpbm_option[ 'wpbm_show_read_more' ] == '1' ) {
                        if ( isset( $wpbm_option[ 'post_url' ] ) && $wpbm_option[ 'post_url' ] == 'post_link' ) {
                            ?>
                            <div class="wpbm-link-button">
                                <a href="<?php echo get_permalink( $product_post_id ); ?>"><?php echo esc_attr( $wpbm_option[ 'wpbm_post_link_text' ] ); ?><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                            </div>
                            <?php
                        } else {
                            ?>
                            <div class="wpbm-link-button">
                                <a href="<?php echo esc_url( $wpbm_option[ 'wpbm_custom_url' ] ); ?>"><?php echo esc_attr( $wpbm_option[ 'wpbm_post_link_text' ] ); ?><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
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

                            <a class="wpbm-fb" href="https://www.facebook.com/sharer.php?u=<?php echo get_permalink( $product_post_id ); ?>" target="_blank" rel="nofollow">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                            </a>
                            <?php
                        }
                        if ( isset( $wpbm_option[ 'wpbm_show_twitter_share' ] ) && $wpbm_option[ 'wpbm_show_twitter_share' ] == '1' ) {
                            ?>
                            <a class="wpbm-tw" href="http://twitter.com/share?text=<?php echo the_title(); ?>&url=<?php echo get_permalink( $product_post_id ); ?>" target="_blank" rel="nofollow">
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                            </a>
                            <?php
                        }
                        if ( isset( $wpbm_option[ 'wpbm_show_google_share' ] ) && $wpbm_option[ 'wpbm_show_google_share' ] == '1' ) {
                            ?>
                            <a class="wpbm-gp" href="https://plus.google.com/share?url=<?php echo get_permalink( $product_post_id ); ?>" target="_blank" rel="nofollow">
                                <i class="fa fa-google-plus" aria-hidden="true"></i>
                            </a>
                            <?php
                        }
                        if ( isset( $wpbm_option[ 'wpbm_show_linkedin_share' ] ) && $wpbm_option[ 'wpbm_show_linkedin_share' ] == '1' ) {
                            ?>
                            <a class="wpbm-ln" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink( $product_post_id ); ?>" target="_blank" rel="nofollow">
                                <i class="fa fa-linkedin" aria-hidden="true"></i>
                            </a>
                            <?php
                        }
                        if ( isset( $wpbm_option[ 'wpbm_show_mail_share' ] ) && $wpbm_option[ 'wpbm_show_mail_share' ] == '1' ) {
                            ?>
                            <a class="wpbm-m" href="mailto:?subject=<?php echo the_title(); ?> &body=<?php echo the_title(); ?> <?php echo get_permalink( $product_post_id ); ?>" target="_blank" rel="nofollow">
                                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                            </a>
                            <?php
                        }
                        if ( isset( $wpbm_option[ 'wpbm_show_pinterest_share' ] ) && $wpbm_option[ 'wpbm_show_pinterest_share' ] == '1' ) {
                            ?>
                            <a class="wpbm-pn" href="http://pinterest.com/pin/create/button/?url=<?php echo get_permalink( $product_post_id ); ?>" target="_blank" rel="nofollow">
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
    <?php
}