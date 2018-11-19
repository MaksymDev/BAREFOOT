<div class="wpbm-carousel-inner-wrap">
    <?php
    $image = isset( $wpbm_option[ 'wpbm_image_size' ] ) ? esc_attr( $wpbm_option[ 'wpbm_image_size' ] ) : 'full';
    if ( $wpbm_option[ 'wpbm_carousel_template' ] == 'template-1' ) {
        ?>
        <div class="wpbm-inner-content">
            <div class="wpbm-image-category-wrap">
                <?php
                if ( isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] == 'image' ) {
                    if ( has_post_thumbnail( $product_post_id ) ) {
                        ?>
                        <div class="wpbm-image">
                            <?php echo get_the_post_thumbnail( $product_post_id, $image );
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
                </div>
                <?php
            }
            ?>
            <div class="wpbm-contain-all">
                <div class="wpbm-meta-wrap">
                    <?php
                    /*
                     * Show Author
                     */
                    if ( isset( $wpbm_option[ 'wpbm_show_author' ] ) && $wpbm_option[ 'wpbm_show_author' ] == '1' ) {
                        ?>
                        <div class="wpbm-author-name">
                            <?php
                            _e( 'By: ', WPBM_TD );
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
                <div class="wpbm-title">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?></a>
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
        <?php
    } else if ( $wpbm_option[ 'wpbm_carousel_template' ] == 'template-2' ) {
        ?>
        <div class="wpbm-top-header">
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
                    <?php the_title(); ?></a>
            </div>
            <div class="wpbm-meta-wrap">
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
                <?php
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
            </div>
        </div>
        <?php
        if ( isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] == 'image' ) {
            if ( has_post_thumbnail( $product_post_id ) ) {
                ?>
                <div class="wpbm-image">
                    <?php echo get_the_post_thumbnail( $product_post_id, $image );
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
        <div class="wpbm-bottom-wrap-main">
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
            <div class= "wpbm-bottom-wrap">
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
                ?>
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
                ?>
            </div>
        </div>
        <?php
    } else if ( $wpbm_option[ 'wpbm_carousel_template' ] == 'template-3' ) {
        ?>
        <div class="wpbm-first-wrap">
            <?php
            if ( isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] == 'image' ) {
                if ( has_post_thumbnail( $product_post_id ) ) {
                    ?>
                    <div class="wpbm-image">
                        <?php echo get_the_post_thumbnail( $product_post_id, $image );
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
        </div>
        <div class="wpbm-second-wrap">
            <div class="wpbm-title">
                <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?></a>
            </div>
            <div class="wpbm-meta-wrap">
                <?php
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
                        _e( 'by ', WPBM_TD );
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
                if ( isset( $wpbm_option[ 'wpbm_show_social_share' ] ) && $wpbm_option[ 'wpbm_show_social_share' ] == '1' ) {
                    ?>
                    <div class="wpbm-inner-share">
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
        <?php
    } else if ( $wpbm_option[ 'wpbm_carousel_template' ] == 'template-4' ) {
        if ( isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] == 'image' ) {
            if ( has_post_thumbnail( $product_post_id ) ) {
                ?>
                <div class="wpbm-image">
                    <?php echo get_the_post_thumbnail( $product_post_id, $image );
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
            <div class="wpbm-title"> <a href="<?php the_permalink(); ?>">
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
        </div> <?php
    } else if ( $wpbm_option[ 'wpbm_carousel_template' ] == 'template-5' ) {

        if ( isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] == 'image' ) {
            if ( has_post_thumbnail( $product_post_id ) ) {
                ?>
                <div class="wpbm-image">
                    <?php echo get_the_post_thumbnail( $product_post_id, $image );
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
        <div class="wpbm-contain-all-wrap">
            <div class="wpbm-cat-container">
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
                <div class="wpbm-date-and-author">
                    <?php
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
                            _e( 'By: ', WPBM_TD );
                            the_author_posts_link();
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <div class="wpbm-content-car-wrap">
                <div class="wpbm-title">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?></a>
                </div>
                <?php include(WPBM_PATH . 'inc/frontend/content/details/content.php'); ?>
                <div class="wpbm-car-meta-wrap">
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
        <?php
    } else if ( $wpbm_option[ 'wpbm_carousel_template' ] == 'template-6' ) {
        ?>
        <div class = "wpbm-car-img-wrap">
            <?php
            if ( isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] == 'image' ) {
                if ( has_post_thumbnail( $product_post_id ) ) {
                    ?>
                    <div class="wpbm-image">
                        <?php echo get_the_post_thumbnail( $product_post_id, $image );
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
        </div>
        <div class="wpbm-content-car-wrap">
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
            ?>
            <div class="wpbm-title">
                <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?></a>
            </div>
            <?php include(WPBM_PATH . 'inc/frontend/content/details/content.php'); ?>
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
            <div class="wpbm-car-meta-wrap">

                <?php
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
                <?php
                /*
                 * Date
                 */

                if ( isset( $wpbm_option[ 'wpbm_show_date' ] ) && $wpbm_option[ 'wpbm_show_date' ] == '1' ) {
                    ?>
                    <div class="wpbm-date"><?php echo get_the_date( $date_format ); ?></div>
                <?php }
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
            ?>
        </div>
        <?php
    } else if ( $wpbm_option[ 'wpbm_carousel_template' ] == 'template-7' ) {
        if ( isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] == 'image' ) {
            if ( has_post_thumbnail( $product_post_id ) ) {
                ?>
                <div class="wpbm-image">
                    <?php echo get_the_post_thumbnail( $product_post_id, $image );
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
                        <?php the_title(); ?></a>
                </div>

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
        <?php
    } else if ( $wpbm_option[ 'wpbm_carousel_template' ] == 'template-8' ) {
        ?>
        <div class = "wpbm-car-img-wrap">
            <?php
            if ( isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] == 'image' ) {
                if ( has_post_thumbnail( $product_post_id ) ) {
                    ?>
                    <div class="wpbm-image">
                        <?php echo get_the_post_thumbnail( $product_post_id, $image );
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
                        <?php the_title(); ?></a>
                </div>
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
                            echo get_comments_number();
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
                                <a class="wpbm-mail" href="mailto:?subject=<?php echo the_title(); ?> &body=<?php echo the_title(); ?> <?php echo get_permalink( $product_post_id ); ?>" target="_blank" rel="nofollow">
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
    } else if ( $wpbm_option[ 'wpbm_carousel_template' ] == 'template-9' ) {

        if ( isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] == 'image' ) {
            if ( has_post_thumbnail( $product_post_id ) ) {
                ?>
                <div class="wpbm-image">
                    <?php echo get_the_post_thumbnail( $product_post_id, $image );
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
        <div class="wpbm-content-wrapper">
            <div class="wpbm-header-tag">
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
                if ( isset( $wpbm_option[ 'wpbm_show_social_share' ] ) && $wpbm_option[ 'wpbm_show_social_share' ] == '1' ) {
                    ?>
                    <div class="wpbm-share-wrap">
                        <?php if ( isset( $wpbm_option[ 'wpbm_show_facebook_share' ] ) && $wpbm_option[ 'wpbm_show_facebook_share' ] == '1' ) { ?>

                            <a href="https://www.facebook.com/sharer.php?u=<?php echo get_permalink( $product_post_id ); ?>" target="_blank" rel="nofollow">
                                <?php _e( 'Facebook', WPBM_TD ); ?>
                            </a>
                            <?php
                        }
                        if ( isset( $wpbm_option[ 'wpbm_show_twitter_share' ] ) && $wpbm_option[ 'wpbm_show_twitter_share' ] == '1' ) {
                            ?>
                            <a href="http://twitter.com/share?text=<?php echo the_title(); ?>&url=<?php echo get_permalink( $product_post_id ); ?>" target="_blank" rel="nofollow">
                                <?php _e( 'Twitter', WPBM_TD ); ?>
                            </a>
                            <?php
                        }
                        if ( isset( $wpbm_option[ 'wpbm_show_google_share' ] ) && $wpbm_option[ 'wpbm_show_google_share' ] == '1' ) {
                            ?>
                            <a href="https://plus.google.com/share?url=<?php echo get_permalink( $product_post_id ); ?>" target="_blank" rel="nofollow">
                                <?php _e( 'Google +', WPBM_TD ); ?>
                            </a>
                            <?php
                        }
                        if ( isset( $wpbm_option[ 'wpbm_show_linkedin_share' ] ) && $wpbm_option[ 'wpbm_show_linkedin_share' ] == '1' ) {
                            ?>
                            <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink( $product_post_id ); ?>" target="_blank" rel="nofollow">
                                <?php _e( 'Linkedin', WPBM_TD ); ?>
                            </a>
                            <?php
                        }
                        if ( isset( $wpbm_option[ 'wpbm_show_mail_share' ] ) && $wpbm_option[ 'wpbm_show_mail_share' ] == '1' ) {
                            ?>
                            <a href="mailto:?subject=<?php echo the_title(); ?> &body=<?php echo the_title(); ?> <?php echo get_permalink( $product_post_id ); ?>" target="_blank" rel="nofollow">
                                <?php _e( 'Email', WPBM_TD ); ?>
                            </a>
                            <?php
                        }
                        if ( isset( $wpbm_option[ 'wpbm_show_pinterest_share' ] ) && $wpbm_option[ 'wpbm_show_pinterest_share' ] == '1' ) {
                            ?>
                            <a href="http://pinterest.com/pin/create/button/?url=<?php echo get_permalink( $product_post_id ); ?>" target="_blank" rel="nofollow">
                                <?php _e( 'Pinterest', WPBM_TD ); ?>
                            </a>
                        <?php } ?>
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="wpbm-title">
                <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?></a>
            </div>
            <?php include(WPBM_PATH . 'inc/frontend/content/details/content.php'); ?>
            <div class="wpbm-meta-wrap">
                <?php
                /*
                 * Show Author
                 */
                if ( isset( $wpbm_option[ 'wpbm_show_author' ] ) && $wpbm_option[ 'wpbm_show_author' ] == '1' ) {
                    ?>
                    <div class="wpbm-author-name">
                        <?php
                        /* echo get_avatar( get_the_author_meta( 'ID' ), 32 ); */
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
        <?php
    } else if ( $wpbm_option[ 'wpbm_carousel_template' ] == 'template-10' ) {
        ?>
        <div class = "wpbm-car-img-wrap">
            <?php
            if ( isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] == 'image' ) {
                if ( has_post_thumbnail( $product_post_id ) ) {
                    ?>
                    <div class="wpbm-image">
                        <?php echo get_the_post_thumbnail( $product_post_id, $image );
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
            <div class="wpbm-contain-all-wrap">
                <div class="wpbm-meta-wrapper">
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
                </div>
                <div class="wpbm-title">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?></a>
                </div>
                <?php include(WPBM_PATH . 'inc/frontend/content/details/car-content.php'); ?>
                <div class="wpbm-author-comment-date">
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
                            <i class="fa fa-comment-o" aria-hidden="true"></i>
                            <?php
                            echo comments_number();
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
                            <?php echo get_the_date( $date_format ); ?></div>
                        <?php
                    }
                    ?>
                </div>
                <div class="wpbm-car-metadata-wrap">
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
                                $output .= '<a href="' . esc_url( get_tag_link( $tag -> term_id ) ) . '" alt="' . '#' . esc_attr( sprintf( __( 'View all posts in %s', WPBM_TD ), $category -> name ) ) . '">' . "#" . esc_html( $tag -> name ) . '</a>' . $separator;
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
        </div> <?php
    } else if ( $wpbm_option[ 'wpbm_carousel_template' ] == 'template-11' ) {
        ?>
        <div class="wpbm-car-img-wrap">
            <?php
            if ( isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] == 'image' ) {
                if ( has_post_thumbnail( $product_post_id ) ) {
                    ?>
                    <div class="wpbm-image">
                        <?php echo get_the_post_thumbnail( $product_post_id, $image );
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
            <div class="wpbm-bottom-wrap-contain">
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
                        <?php the_title(); ?></a>
                </div>
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
                <div class="wpbm-car-metadata-wrap wpbm-clearfix">
                    <?php
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
        <?php
    } else if ( $wpbm_option[ 'wpbm_carousel_template' ] == 'template-12' ) {
        ?>
        <div class="wpbm-img-container">
            <?php
            if ( isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] == 'image' ) {
                if ( has_post_thumbnail( $product_post_id ) ) {
                    ?>
                    <div class="wpbm-image">
                        <?php echo get_the_post_thumbnail( $product_post_id, $image );
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
        </div>
        <div class="wpbm-title">
            <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?></a>
        </div>
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
                    <i class="fa fa-comment-o" aria-hidden="true"></i>
                    <?php
                    echo get_comments_number();
                    ?>
                </div>
                <?php
            }
            ?>
        </div>

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
    } else if ( $wpbm_option[ 'wpbm_carousel_template' ] == 'template-13' ) {
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
        ?>
        <div class="wpbm-image-wrap">
            <?php
            /*
             * Date
             */

            if ( isset( $wpbm_option[ 'wpbm_show_date' ] ) && $wpbm_option[ 'wpbm_show_date' ] == '1' ) {
                ?>
                <div class="wpbm-date">
                    <div class="wpbm-date-day">
                        <?php echo get_the_date( 'd' ); ?>
                    </div>
                    <div class="wpbm-month-date">
                        <?php
                        echo get_the_date( 'M' );
                        echo get_the_date( ' Y' );
                        ?>
                    </div>
                </div>
                <?php
            }
            if ( isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] == 'image' ) {
                if ( has_post_thumbnail( $product_post_id ) ) {
                    ?>
                    <div class="wpbm-image">
                        <?php echo get_the_post_thumbnail( $product_post_id, $image );
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
            ?>
        </div>
        <div class="wpbm-inner-content">
            <div class="wpbm-inner-content-wrap">
                <?php
                /*
                 * Show Author
                 */
                if ( isset( $wpbm_option[ 'wpbm_show_author' ] ) && $wpbm_option[ 'wpbm_show_author' ] == '1' ) {
                    ?>
                    <div class="wpbm-author-name">
                        <?php
                        echo get_avatar( get_the_author_meta( 'ID' ), 30 );
                        the_author_posts_link();
                        ?>
                    </div>
                <?php }
                ?>
                <div class="wpbm-title">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?></a>
                </div>

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
            <div class="wpbm-meta-wrap wpbm-clearfix">
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
        </div> <?php
    } else if ( $wpbm_option[ 'wpbm_carousel_template' ] == 'template-14' ) {
        ?>
        <div class="wpbm-image-container">
            <?php
            if ( isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] == 'image' ) {
                if ( has_post_thumbnail( $product_post_id ) ) {
                    ?>
                    <div class="wpbm-image">
                        <?php echo get_the_post_thumbnail( $product_post_id, $image );
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
            if ( isset( $wpbm_option[ 'wpbm_show_social_share' ] ) && $wpbm_option[ 'wpbm_show_social_share' ] == '1' ) {
                ?>
                <div class="wpbm-share-wrap">
                    <i class="fa fa-share-alt" aria-hidden="true"></i>
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
                <?php
            }
            ?>
            <div class="wpbm-title">
                <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?></a>
            </div>
            <div class="wpbm-meta-wrap">
                <?php
                /*
                 * Show Author
                 */
                if ( isset( $wpbm_option[ 'wpbm_show_author' ] ) && $wpbm_option[ 'wpbm_show_author' ] == '1' ) {
                    ?>
                    <div class="wpbm-author-name">
                        <?php
                        _e( 'By: ', WPBM_TD );
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
                        <i class="fa fa-comment-o" aria-hidden="true"></i>
                        <?php
                        echo get_comments_number();
                        ?>
                    </div>
                    <?php
                }
                ?>
            </div>
            <?php include(WPBM_PATH . 'inc/frontend/content/details/content.php'); ?>
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
        <?php
    } else {
        ?>
        <div class="wpbm-inner-content">
            <div class="wpbm-title">
                <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?></a>
            </div>
            <div class="wpbm-another-wrap">
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

                if ( isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] == 'image' ) {
                    if ( has_post_thumbnail( $product_post_id ) ) {
                        ?>
                        <div class="wpbm-image">
                            <?php echo get_the_post_thumbnail( $product_post_id, $image );
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
                <div class="wpbm-meta-wrap">
                    <?php
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
                <div class="wpbm-lower-meta-wrap wpbm-clearfix">
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
                        <div class="wpbm-share-wrap">
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
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    <?php }
    ?>
</div>
