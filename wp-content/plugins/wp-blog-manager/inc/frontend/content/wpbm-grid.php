<div class="wpbm-inner-wrap<?php
if ( isset( $wpbm_option[ 'wpbm_display_filter' ] ) && $wpbm_option[ 'wpbm_display_filter' ] == '1' ) {
    $categories = get_the_terms( $product_post_id, $wpbm_option[ 'select_post_taxonomy' ] );
    $separator = ' ';
    $output = '';
    if ( ! empty( $categories ) ) {
        foreach ( $categories as $category ) {
            $output .= ' wpbm-filter-cat-' . esc_html( $category -> slug ) . $separator;
        }
        echo ' wpbm-filter-all ' . trim( $output, $separator );
    }
}
?> <?php
if ( (isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] === 'video') || (isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] === 'sound_cloud') || (isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] === 'slider') ) {
    echo 'wpbm-media-upper-wrap';
}
if ( (isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] === 'video') || (isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] === 'sound_cloud') ) {
    echo ' wpbm-extra-outer';
}
?>">
    <div class="wpbm-inner-wrap-contain <?php
    if ( isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] == 'slider' ) {
        echo 'wpbm-item-pager';
    }
    ?>">
             <?php
             if ( $wpbm_option[ 'wpbm_grid_template' ] == 'template-1' ) {
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
                        <div class="wpbm-date"><?php
                            if ( ! empty( $date_format ) ) {
                                echo get_the_date( $date_format );
                            }
                            ?></div>
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
            <?php
        } else if ( $wpbm_option[ 'wpbm_grid_template' ] == 'template-2' ) {
            include(WPBM_PATH . 'inc/frontend/content/wpbm-media-type.php');
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
            <?php
        } else if ( $wpbm_option[ 'wpbm_grid_template' ] == 'template-3' ) {
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
            <?php
        } else if ( $wpbm_option[ 'wpbm_grid_template' ] == 'template-4' ) {
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
            <?php
        } else if ( $wpbm_option[ 'wpbm_grid_template' ] == 'template-5' ) {
            include(WPBM_PATH . 'inc/frontend/content/wpbm-media-type.php');

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
                        <i class="fa fa-user" aria-hidden="true"></i>
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
                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                        <?php echo get_the_date( $date_format ); ?>
                    </div>
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
            <?php
        } else if ( $wpbm_option[ 'wpbm_grid_template' ] == 'template-6' ) {
            include(WPBM_PATH . 'inc/frontend/content/wpbm-media-type.php');
            ?>
            <div class="wpbm-inner-wrap-contain-main">
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
                <div class="wpbm-bottom-wrap">
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
                        <div class="wpbm-share-wrap">
                            <i class="fa fa-share-alt" aria-hidden="true"></i>
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
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <?php
        } else if ( $wpbm_option[ 'wpbm_grid_template' ] == 'template-7' ) {
            ?>
            <div class="wpbm-first-wrap">
                <?php
                include(WPBM_PATH . 'inc/frontend/content/wpbm-media-type.php');
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
            <div class="wpbm-second-wrap">
                <div class="wpbm-title">

                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?></a></div>
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
                <div class="wpbm-bottom-wrap  wpbm-clearfix">
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
        } else if ( $wpbm_option[ 'wpbm_grid_template' ] == 'template-8' ) {
            ?>
            <div class="wpbm-top-header">
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
            </div>
            <?php
            include(WPBM_PATH . 'inc/frontend/content/wpbm-media-type.php');
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
            <?php
        } else if ( $wpbm_option[ 'wpbm_grid_template' ] == 'template-9' ) {
            include(WPBM_PATH . 'inc/frontend/content/wpbm-media-type.php');
            ?>
            <div class="wpbm-meta-wrap wpbm-clearfix">
                <?php
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
                        echo get_comments_number();
                        ?>
                    </div>

                    <?php
                }
                ?>
            </div>
            <div class="wpbm-main-wrap">
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
                /*
                 * Date
                 */
                if ( isset( $wpbm_option[ 'wpbm_show_date' ] ) && $wpbm_option[ 'wpbm_show_date' ] == '1' ) {
                    ?>
                    <div class="wpbm-date"><?php
                        _e( 'POSTED: ', WPBM_TD );
                        echo get_the_date( $date_format );
                        ?></div>
                <?php }
                ?>
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
                        <?php _e( 'Share: ', WPBM_TD ); ?>
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
        } else if ( $wpbm_option[ 'wpbm_grid_template' ] == 'template-10' ) {
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
                        <?php the_title(); ?></a></div>
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
            </div>
            <?php
            include(WPBM_PATH . 'inc/frontend/content/wpbm-media-type.php');
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
            <?php
        } else if ( $wpbm_option[ 'wpbm_grid_template' ] == 'template-11' ) {

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
            <?php
            include(WPBM_PATH . 'inc/frontend/content/wpbm-media-type.php');
            include(WPBM_PATH . 'inc/frontend/content/details/content.php');
            ?>

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
                        <i class="fa fa-share-alt" aria-hidden="true"></i>
                        <?php _e( 'Share', WPBM_TD ); ?>
                        <div class="wpbm-share-inner-wrap">
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
            <?php
        } else if ( $wpbm_option[ 'wpbm_grid_template' ] == 'template-12' ) {
            ?>
            <div class="wpbm-inner-content">
                <div class="wpbm-image-category-wrap">
                    <?php
                    include(WPBM_PATH . 'inc/frontend/content/wpbm-media-type.php');

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
        } else if ( $wpbm_option[ 'wpbm_grid_template' ] == 'template-13' ) {
            ?>
            <div class="wpbm-upper-content wpbm-clearfix">
                <?php
                /*
                 * Show Author
                 */
                if ( isset( $wpbm_option[ 'wpbm_show_author' ] ) && $wpbm_option[ 'wpbm_show_author' ] == '1' ) {
                    ?>
                    <div class="wpbm-author-image">
                        <?php
                        echo get_avatar( get_the_author_meta( 'ID' ), 117 );
                        ?>
                    </div>
                    <?php
                }
                ?>
                <div class="wpbm-title-meta-wrap">
                    <div class="wpbm-title">

                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?></a></div>
                    <div class="wpbm-meta-wrap  wpbm-clearfix">
                        <?php
                        /*
                         * Show Author
                         */
                        if ( isset( $wpbm_option[ 'wpbm_show_author' ] ) && $wpbm_option[ 'wpbm_show_author' ] == '1' ) {
                            ?>
                            <div class="wpbm-author-name">
                                <?php the_author_posts_link(); ?>
                            </div>
                            <?php
                        }
                        ?>
                        <div class="wpbm-author-meta-wrap ">
                            <?php
                            /*
                             * Display comment count
                             */
                            if ( isset( $wpbm_option[ 'wpbm_show_comment' ] ) && $wpbm_option[ 'wpbm_show_comment' ] == '1' ) {
                                ?>
                                <div class="wpbm-comment-wrap">
                                    <?php
                                    echo get_comments_number();
                                    ?>
                                    <i class="fa fa-comment-o" aria-hidden="true"></i>
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
            </div>
            <?php
            include(WPBM_PATH . 'inc/frontend/content/wpbm-media-type.php');
            ?>
            <div class="wpbm-lower-wrap wpbm-clearfix">
                <div class="wpbm-first-wrap">
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
                        <div class="wpbm-date-main">
                            <div class="wpbm-date-day">
                                <?php echo get_the_date( 'd' ); ?>
                            </div>
                            <div class="wpbm-month">
                                <?php echo get_the_date( 'M' ); ?>
                            </div>
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
                            <div class="wpbm-tag-header">
                                <?php _e( 'Tags', WPBM_TD ); ?>
                            </div>
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
                <div class="wpbm-second-wrap">

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
            <?php
        } else if ( $wpbm_option[ 'wpbm_grid_template' ] == 'template-14' ) {
            ?>
            <div class="wpbm-image-content">
                <?php
                include(WPBM_PATH . 'inc/frontend/content/wpbm-media-type.php');
                /*
                 * Show Author
                 */
                if ( isset( $wpbm_option[ 'wpbm_show_author' ] ) && $wpbm_option[ 'wpbm_show_author' ] == '1' ) {
                    ?>
                    <div class="wpbm-author-name">
                        <?php
                        echo get_avatar( get_the_author_meta( 'ID' ), 70 );
                        the_author_posts_link();
                        ?>
                    </div>
                <?php }
                ?>
            </div>
            <div class="wpbm-content-wrap wpbm-clearfix">
                <div class="wpbm-social-wrap">
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
                <div class="wpbm-description-wrap">
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
                    <div class="wpbm-date-and-comment-wrap wpbm-clearfix">
                        <?php
                        /*
                         * Date
                         */

                        if ( isset( $wpbm_option[ 'wpbm_show_date' ] ) && $wpbm_option[ 'wpbm_show_date' ] == '1' ) {
                            ?>
                            <div class="wpbm-date">
                                <?php
                                _e( 'Posted on ', WPBM_TD );
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
                    ?>
                    <div class="wpbm-lower-wrap wpbm-clearfix">
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
            <?php
        } else if ( $wpbm_option[ 'wpbm_grid_template' ] == 'template-15' ) {
            ?>
            <div class="wpbm-img-left-wrap-main">
                <div class="wpbm-img-header">
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
                    ?>
                    <div class="wpbm-title">

                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?></a></div>
                </div>
            </div>
            <div class="wpdm-social-bottom-content">

                <?php if ( isset( $wpbm_option[ 'wpbm_show_social_share' ] ) && $wpbm_option[ 'wpbm_show_social_share' ] == '1' ) {
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
                <div class="wpbm-right-wrap-bottom">
                    <div class="wpbm-image-content">
                        <?php
                        include(WPBM_PATH . 'inc/frontend/content/wpbm-media-type.php');
                        /*
                         * Date
                         */

                        if ( isset( $wpbm_option[ 'wpbm_show_date' ] ) && $wpbm_option[ 'wpbm_show_date' ] == '1' ) {
                            ?>
                            <div class="wpbm-date-wrap">
                                <div class="wpbm-date-inner-wrap">
                                    <div class="wpbm-date-day">
                                        <?php echo get_the_date( 'd' ); ?>
                                    </div>
                                    <div class="wpbm-month-date">
                                        <?php
                                        echo get_the_date( 'F' );
                                        ?>
                                    </div>
                                    <div class="wpbm-year-date">
                                        <?php
                                        echo get_the_date( ' Y' );
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="wpbm-content-wrap">
                        <div class="wpbm-left-wrap">
                            <?php
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
                            <?php }
                            ?>
                        </div>
                        <?php
                        include(WPBM_PATH . 'inc/frontend/content/details/content.php');
                        ?>
                        <div class="wpbm-lower-wrap">
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
        } else if ( $wpbm_option[ 'wpbm_grid_template' ] == 'template-16' ) {
            ?>
            <div class="wpbm-header-wrap">
                <div class="wpbm-left-wrap">
                    <?php if ( isset( $wpbm_option[ 'wpbm_show_social_share' ] ) && $wpbm_option[ 'wpbm_show_social_share' ] == '1' ) {
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
                <div class="wpbm-right-wrap">
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
            </div>
            <div class = "wpbm-inner-content">
                <?php
                include(WPBM_PATH . 'inc/frontend/content/wpbm-media-type.php');
                ?>
                <div class="wpbm-content-meta-wrap-main">
                    <div class="wpbm-content-wrap-main">
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
                                $output = '';
                                if ( ! empty( $categories ) ) {
                                    foreach ( $categories as $category ) {
                                        $output .= '<a href="' . esc_url( get_category_link( $category -> term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', WPBM_TD ), $category -> name ) ) . '">' . esc_html( $category -> name ) . '</a>';
                                    }
                                    ?>
                                    <div class="wpbm-category-list">
                                        <?php
                                        echo $output;
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
                        ?>
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
                </div>
            </div> <?php
        } else if ( $wpbm_option[ 'wpbm_grid_template' ] == 'template-17' ) {
            ?>
            <div class="wpbm-first-wrap">
                <?php
                include(WPBM_PATH . 'inc/frontend/content/wpbm-media-type.php');

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
                <div class="wpbm-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
            </div>
            <div class="wpbm-second-wrap">
                <div class="wpbm-meta-wrap wpbm-clearfix">
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
                <div class="wpbm-bottom-wrap wpbm-clearfix">
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
            </div>
            <?php
        } else if ( $wpbm_option[ 'wpbm_grid_template' ] == 'template-18' ) {
            ?>
            <div class="wpbm-first-wrap">
                <?php
                include(WPBM_PATH . 'inc/frontend/content/wpbm-media-type.php');
                ?>
            </div>
            <div class="wpbm-content-social-wrap wpbm-clearfix">
                <div class="wpbm-content-wrap">
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
                    <div class="wpbm-content-main-wrap">
                        <div class="wpbm-meta-wrap">
                            <?php
                            /*
                             * Show Author
                             */
                            if ( isset( $wpbm_option[ 'wpbm_show_author' ] ) && $wpbm_option[ 'wpbm_show_author' ] == '1' ) {
                                ?>
                                <div class="wpbm-author-name">
                                    <i class="fa fa-user-o" aria-hidden="true"></i>
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
                <div class="wpbm-social-wrap">
                    <?php if ( isset( $wpbm_option[ 'wpbm_show_social_share' ] ) && $wpbm_option[ 'wpbm_show_social_share' ] == '1' ) {
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
            <?php
        } else if ( $wpbm_option[ 'wpbm_grid_template' ] == 'template-19' ) {
            include(WPBM_PATH . 'inc/frontend/content/wpbm-media-type.php');
            ?><div class="wpbm-content-wrap wpbm-clearfix">
                <div class="wpbm-left-wrap">
                    <?php
                    /*
                     * Show Author
                     */
                    if ( isset( $wpbm_option[ 'wpbm_show_author' ] ) && $wpbm_option[ 'wpbm_show_author' ] == '1' ) {
                        ?>
                        <div class="wpbm-author-name">
                            <?php
                            echo get_avatar( get_the_author_meta( 'ID' ), 66 );
                            the_author_posts_link();
                            ?>
                        </div>
                    <?php }
                    ?>
                </div>
                <div class="wpbm-content-container">
                    <div class="wpbm-content-container-wrap">
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
                        <div class="wpbm-all-content-main">
                            <div class="wpbm-title-wrap">
                                <?php
                                /*
                                 * Date
                                 */

                                if ( isset( $wpbm_option[ 'wpbm_show_date' ] ) && $wpbm_option[ 'wpbm_show_date' ] == '1' ) {
                                    ?>
                                    <div class="wpbm-date-wrap">
                                        <div class="wpbm-date-day">
                                            <?php echo get_the_date( 'd' ); ?>
                                        </div>
                                        <div class="wpbm-month-date">
                                            <?php
                                            echo get_the_date( 'M' );
                                            ?>
                                        </div>
                                    </div>
                                <?php }
                                ?>
                                <div class="wpbm-title">

                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?></a></div>
                            </div>
                            <div class="wpbm-meta-wrap wpbm-clearfix">
                                <?php
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
                            <?php include(WPBM_PATH . 'inc/frontend/content/details/content.php'); ?>
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
            </div> <?php
        } else if ( $wpbm_option[ 'wpbm_grid_template' ] == 'template-20' ) {
            ?>
            <div class="wpbm-inner-content">
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
                            echo get_avatar( get_the_author_meta( 'ID' ), 30 );
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
            </div>
            <div class="wpbm-second-content">
                <div class="wpbm-left-wrap">
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
                <div class="wpbm-right-content">
                    <div class="wpbm-right-main-content">
                        <div class="wpbm-title-content-wrap">
                            <div class="wpbm-title">

                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?></a></div>
                            <?php include(WPBM_PATH . 'inc/frontend/content/details/content.php'); ?>
                        </div>
                        <div class="wpbm-readmore-social-wrap wpbm-clearfix">
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

                            <?php }
                            ?>

                        </div>
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
            </div>
            <?php
        } else if ( $wpbm_option[ 'wpbm_grid_template' ] == 'template-21' ) {
            ?>
            <div class="wpbm-image-container">
                <?php
                include(WPBM_PATH . 'inc/frontend/content/wpbm-media-type.php');
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
        } else if ( $wpbm_option[ 'wpbm_grid_template' ] == 'template-22' ) {
            ?>
            <div class="wpbm-img-container">
                <?php
                include(WPBM_PATH . 'inc/frontend/content/wpbm-media-type.php');

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
        } else if ( $wpbm_option[ 'wpbm_grid_template' ] == 'template-23' ) {
            include(WPBM_PATH . 'inc/frontend/content/wpbm-media-type.php');
            ?>
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
                        <?php the_title(); ?></a></div>
                <div class="wpbm-meta-wrap">
                    <?php
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
                     * Date
                     */

                    if ( isset( $wpbm_option[ 'wpbm_show_date' ] ) && $wpbm_option[ 'wpbm_show_date' ] == '1' ) {
                        ?>
                        <div class="wpbm-date">
                            <i class="fa fa-calendar" aria-hidden="true"></i>
                            <?php echo get_the_date( $date_format ); ?>
                        </div>
                        <?php
                    }
                    /*
                     * Display comment count
                     */
                    if ( isset( $wpbm_option[ 'wpbm_show_comment' ] ) && $wpbm_option[ 'wpbm_show_comment' ] == '1' ) {
                        ?>
                        <div class="wpbm-comment-wrap">
                            <i class="fa fa-comment" aria-hidden="true"></i>
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
                                $output .= '<a href="' . esc_url( get_tag_link( $tag -> term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', WPBM_TD ), $tag -> name ) ) . '">' . '<span>' . esc_html( $tag -> name ) . '</span>' . '</a>' . $separator;
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
        } else if ( $wpbm_option[ 'wpbm_grid_template' ] == 'template-24' ) {
            ?>
            <div class="wpbm-img-container">
                <?php
                include(WPBM_PATH . 'inc/frontend/content/wpbm-media-type.php');
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
                            <a href="mailto:?subject=<?php echo the_title(); ?> &body=<?php echo the_title(); ?> <?php echo get_permalink( $product_post_id ); ?>" target="_blank" rel="nofollow">
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
                ?></div>
            <div class="wpbm-content-container wpbm-clearfix">
                <div class="wpbm-header-left-wrap">
                    <div class="wpbm-header-wrap">
                        <?php
                        /*
                         * Date
                         */

                        if ( isset( $wpbm_option[ 'wpbm_show_date' ] ) && $wpbm_option[ 'wpbm_show_date' ] == '1' ) {
                            ?>
                            <div class="wpbm-date"><span><?php echo get_the_date( $date_format ); ?></span></div>
                            <?php
                        }
                        ?>
                    </div>
                    <div class="wpbm-left-wrap">
                        <div class="wpbm-title">

                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?></a></div>
                        <div class="wpbm-meta-wrap wpbm-clearfix">
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
                            <?php }
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
                <div class="wpbm-content-outer-wrap">
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

            </div> <?php
        } else if ( $wpbm_option[ 'wpbm_grid_template' ] == 'template-25' ) {
            include(WPBM_PATH . 'inc/frontend/content/wpbm-media-type.php');
            ?>
            <div class="wpbm-content-wrap">
                <div class="wpbm-header-tag  wpbm-clearfix">
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
                        <?php the_title(); ?></a></div>
                <?php include(WPBM_PATH . 'inc/frontend/content/details/content.php'); ?>
                <div class="wpbm-meta-wrap">
                    <?php
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
                                $output .= '<a href="' . esc_url( get_tag_link( $tag -> term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', WPBM_TD ), $tag -> name ) ) . '">' . "#" . esc_html( $tag -> name ) . '</a>' . $separator;
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
        } else if ( $wpbm_option[ 'wpbm_grid_template' ] == 'template-26' ) {
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
                include(WPBM_PATH . 'inc/frontend/content/wpbm-media-type.php');
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
        } else if ( $wpbm_option[ 'wpbm_grid_template' ] == 'template-27' ) {
            ?>
            <div class="wpbm-img-container">
                <?php if ( isset( $wpbm_option[ 'wpbm_show_social_share' ] ) && $wpbm_option[ 'wpbm_show_social_share' ] == '1' ) {
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
                include(WPBM_PATH . 'inc/frontend/content/wpbm-media-type.php');
                ?>
            </div>
            <div class="wpbm-bottom-wrap-contain">
                <div class="wpbm-title">

                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?></a></div>
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
                ?>
                <div class="wpbm-date-content wpbm-clearfix">
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
                     * Show Category
                     */
                    if ( isset( $wpbm_option[ 'wpbm_show_category' ] ) && $wpbm_option[ 'wpbm_show_category' ] == '1' ) {
                        ?>
                        <div class="wpbm-category-wrap">
                            <?php
                            $categories = get_the_category();
                            $separator = ' - ';
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
                <div class="wpbm-meta-wrap">
                    <?php
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
        } else if ( $wpbm_option[ 'wpbm_grid_template' ] == 'template-28' ) {
            ?>
            <div class="wpbm-image-content">
                <?php
                include(WPBM_PATH . 'inc/frontend/content/wpbm-media-type.php');
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
            </div><?php
        } else if ( $wpbm_option[ 'wpbm_grid_template' ] == 'template-29' ) {
            ?>
            <div class="wpbm-inner-content">
                <div class="wpbm-image-category-wrap">
                    <div class="wpbm-image"><?php
                        if ( has_post_thumbnail( $product_post_id ) ) {
                            echo get_the_post_thumbnail( $product_post_id, 'full' );
                        } else {
                            ?>
                            <img src="<?php echo WPBM_IMG_DIR; ?>/no-image-available.png" alt="No image available">
                            <?php
                        }
                        ?></div>
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
                            <?php the_title(); ?></a></div>
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
            </div>
            <?php
        } else {
            ?>
            <div class="wpbm-image"><?php
                if ( has_post_thumbnail( $product_post_id ) ) {
                    echo get_the_post_thumbnail( $product_post_id, 'full' );
                } else {
                    ?>
                    <img src="<?php echo WPBM_IMG_DIR; ?>/no-image-available.png" alt="No image available">
                    <?php
                }
                ?></div>
            <div class="wpbm-meta-wrap wpbm-clearfix">
                <?php
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
                </div>
                <?php
            }
            ?>
            <div class="wpbm-main-wrap">
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
                /*
                 * Date
                 */
                if ( isset( $wpbm_option[ 'wpbm_show_date' ] ) && $wpbm_option[ 'wpbm_show_date' ] == '1' ) {
                    ?>
                    <div class="wpbm-date">
                        <?php
                        _e( 'Posted: ', WPBM_TD );
                        echo get_the_date( $date_format );
                        ?></div>
                <?php }
                ?>
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
                        <?php _e( 'Share: ', WPBM_TD ); ?>
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
        }
        ?>
    </div>
</div>
