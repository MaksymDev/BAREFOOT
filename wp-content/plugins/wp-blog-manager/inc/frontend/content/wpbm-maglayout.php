<?php
if ( isset( $wpbm_option[ 'wpbm_content_template' ] ) && $wpbm_option[ 'wpbm_content_template' ] == 'template-1' ) {
    if ( $wpbm_row == 1 ) {
        ?>
        <div class="wpbm-first-block-wrap <?php
        if ( (isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] === 'video') || (isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] === 'sound_cloud') || (isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] === 'slider') ) {
            echo 'wpbm-mag-upper-wrap';
        }
        ?>">
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
            </div>
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
        </div>
        <div class="wpbm-side-thumbnail-wrapper">
            <div class="wpbm-side-slider"  data-id="wpbm_side_<?php
            echo rand( 1111111, 9999999 );
            ?>" data-template="<?php echo esc_attr( $wpbm_option[ 'wpbm_content_template' ] ); ?>"
                 data-column = "<?php
                 if ( isset( $wpbm_option[ 'wpbm_mag_slide_column' ] ) ) {
                     echo esc_attr( $wpbm_option[ 'wpbm_mag_slide_column' ] );
                 }
                 ?>"
                 data-controls = "<?php
                 if ( isset( $wpbm_option[ 'wpbm_mag_nav_controls' ] ) ) {
                     echo esc_attr( $wpbm_option[ 'wpbm_mag_nav_controls' ] );
                 }
                 ?>"
                 data-auto = "<?php
                 if ( isset( $wpbm_option[ 'wpbm_mag_slide_auto' ] ) ) {
                     echo esc_attr( $wpbm_option[ 'wpbm_mag_slide_auto' ] );
                 }
                 ?>"
                 data-speed = "<?php
                 if ( isset( $wpbm_option[ 'wpbm_mag_slide_speed' ] ) ) {
                     echo esc_attr( $wpbm_option[ 'wpbm_mag_slide_speed' ] );
                 }
                 ?>">
                     <?php
                 } else {
                     ?>
                <div class="wpbm-side-content-block wpbm-clearfix">
                    <div class="wpbm-image-block">
                        <?php
                        include(WPBM_PATH . 'inc/frontend/content/wpbm-slide-media.php');
                        ?>
                    </div>
                    <div class="wpbm-thumbnail-content-block wpbm-clearfix">
                        <div class="wpbm-thumbnail-title">
                            <a href="<?php echo get_permalink( $product_post_id ); ?>"><?php echo the_title(); ?></a>
                        </div>
                        <div class="wpbm-date-n-name">

                            <?php
                            /*
                             * Date
                             */

                            if ( isset( $wpbm_option[ 'wpbm_show_date' ] ) && $wpbm_option[ 'wpbm_show_date' ] == '1' ) {
                                ?>
                                <div class="wpbm-thumbnail-date"><?php echo get_the_date( $date_format ); ?></div>
                                <?php
                            }
                            /*
                             * Show Author
                             */
                            if ( isset( $wpbm_option[ 'wpbm_show_author' ] ) && $wpbm_option[ 'wpbm_show_author' ] == '1' ) {
                                ?>
                                <div class="wpbm-thumbnail-author-name">
                                    <?php
                                    _e( 'by ', WPBM_TD );
                                    the_author_posts_link();
                                    ?>
                                </div>
                            <?php }
                            ?>
                        </div>
                    </div>
                </div>

                <?php
            }
            ++ $wpbm_row;
        } else if ( isset( $wpbm_option[ 'wpbm_content_template' ] ) && $wpbm_option[ 'wpbm_content_template' ] == 'template-2' ) {
            if ( $wpbm_row == 1 ) {
                ?>
                <div class="wpbm-first-block-wrap <?php
                if ( (isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] === 'video') || (isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] === 'sound_cloud') || (isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] === 'slider') ) {
                    echo 'wpbm-mag-upper-wrap';
                }
                ?>">
                    <div class = "wpbm-first-wrap">
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
                    <div class="wpbm-second-wrap">
                        <div class="wpbm-meta-wrap">
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
                             * Show Tag
                             */
                            if ( isset( $wpbm_option[ 'wpbm_show_tag' ] ) && $wpbm_option[ 'wpbm_show_tag' ] == '1' ) {
                                global $post;
                                $tags = get_the_tags();
                                $separator = ' ';
                                $output = '';
                                if ( ! empty( $tags ) ) {
                                    foreach ( $tags as $tag ) {
                                        $output .= '<a href="' . esc_url( get_tag_link( $tag -> term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', WPBM_TD ), $tag -> name ) ) . '">' . '#' . esc_html( $tag -> name ) . '</a>' . $separator;
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
                        <div class="wpbm-content-outer-wrap">
                            <div class="wpbm-title"><a href="<?php echo get_permalink( $product_post_id ); ?>"><?php echo the_title(); ?></a>
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
                                if ( isset( $wpbm_option[ 'wpbm_show_social_share' ] ) && $wpbm_option[ 'wpbm_show_social_share' ] == '1' ) {
                                    ?>
                                    <div class="wpbm-inner-share">
                                        <?php if ( isset( $wpbm_option[ 'wpbm_show_facebook_share' ] ) && $wpbm_option[ 'wpbm_show_facebook_share' ] == '1' ) { ?>

                                            <a class="wpbm-social-item-fb" href="https://www.facebook.com/sharer.php?u=<?php echo get_permalink( $product_post_id ); ?>" target="_blank" rel="nofollow">
                                                <i class="fa fa-facebook" aria-hidden="true"></i>
                                            </a>
                                            <?php
                                        }
                                        if ( isset( $wpbm_option[ 'wpbm_show_twitter_share' ] ) && $wpbm_option[ 'wpbm_show_twitter_share' ] == '1' ) {
                                            ?>
                                            <a  class="wpbm-social-item-tw" href="http://twitter.com/share?text=<?php echo the_title(); ?>&url=<?php echo get_permalink( $product_post_id ); ?>" target="_blank" rel="nofollow">
                                                <i class="fa fa-twitter" aria-hidden="true"></i>
                                            </a>
                                            <?php
                                        }
                                        if ( isset( $wpbm_option[ 'wpbm_show_google_share' ] ) && $wpbm_option[ 'wpbm_show_google_share' ] == '1' ) {
                                            ?>
                                            <a  class="wpbm-social-item-gp" href="https://plus.google.com/share?url=<?php echo get_permalink( $product_post_id ); ?>" target="_blank" rel="nofollow">
                                                <i class="fa fa-google-plus" aria-hidden="true"></i>
                                            </a>
                                            <?php
                                        }
                                        if ( isset( $wpbm_option[ 'wpbm_show_linkedin_share' ] ) && $wpbm_option[ 'wpbm_show_linkedin_share' ] == '1' ) {
                                            ?>
                                            <a  class="wpbm-social-item-ln" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink( $product_post_id ); ?>" target="_blank" rel="nofollow">
                                                <i class="fa fa-linkedin" aria-hidden="true"></i>
                                            </a>
                                            <?php
                                        }
                                        if ( isset( $wpbm_option[ 'wpbm_show_mail_share' ] ) && $wpbm_option[ 'wpbm_show_mail_share' ] == '1' ) {
                                            ?>
                                            <a  class="wpbm-social-item-msg" href="mailto:?subject=<?php echo the_title(); ?> &body=<?php echo the_title(); ?> <?php echo get_permalink( $product_post_id ); ?>" target="_blank" rel="nofollow">
                                                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                            </a>
                                            <?php
                                        }
                                        if ( isset( $wpbm_option[ 'wpbm_show_pinterest_share' ] ) && $wpbm_option[ 'wpbm_show_pinterest_share' ] == '1' ) {
                                            ?>
                                            <a  class="wpbm-social-item-pn" href="http://pinterest.com/pin/create/button/?url=<?php echo get_permalink( $product_post_id ); ?>" target="_blank" rel="nofollow">
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
                <div class="wpbm-side-thumbnail-wrapper">
                    <div class="wpbm-side-slider"  data-id="wpbm_side_<?php
                    echo rand( 1111111, 9999999 );
                    ?>" data-template="<?php echo esc_attr( $wpbm_option[ 'wpbm_content_template' ] ); ?>"
                         data-column = "<?php
                         if ( isset( $wpbm_option[ 'wpbm_mag_slide_column' ] ) ) {
                             echo esc_attr( $wpbm_option[ 'wpbm_mag_slide_column' ] );
                         }
                         ?>"
                         data-controls = "<?php
                         if ( isset( $wpbm_option[ 'wpbm_mag_nav_controls' ] ) ) {
                             echo esc_attr( $wpbm_option[ 'wpbm_mag_nav_controls' ] );
                         }
                         ?>"
                         data-auto = "<?php
                         if ( isset( $wpbm_option[ 'wpbm_mag_slide_auto' ] ) ) {
                             echo esc_attr( $wpbm_option[ 'wpbm_mag_slide_auto' ] );
                         }
                         ?>"
                         data-speed = "<?php
                         if ( isset( $wpbm_option[ 'wpbm_mag_slide_speed' ] ) ) {
                             echo esc_attr( $wpbm_option[ 'wpbm_mag_slide_speed' ] );
                         }
                         ?>">
                             <?php
                         } else {
                             ?>
                        <div class="wpbm-side-content-block wpbm-top-border wpbm-clearfix">
                            <div class="wpbm-image-block">
                                <?php
                                include(WPBM_PATH . 'inc/frontend/content/wpbm-slide-media.php');
                                ?>
                            </div>
                            <div class="wpbm-thumbnail-content-block">
                                <div class="wpbm-thumbnail-title">    <a href="<?php echo get_permalink( $product_post_id ); ?>"><?php echo the_title(); ?></a>
                                </div>

                                <?php
                                /*
                                 * Date
                                 */

                                if ( isset( $wpbm_option[ 'wpbm_show_date' ] ) && $wpbm_option[ 'wpbm_show_date' ] == '1' ) {
                                    ?>
                                    <div class="wpbm-thumbnail-date"
                                         <i class="fa fa-comment-o" aria-hidden="true"></i>
                                        <?php echo get_the_date( $date_format ); ?></div>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <?php
                    }
                    ++ $wpbm_row;
                } else if ( isset( $wpbm_option[ 'wpbm_content_template' ] ) && $wpbm_option[ 'wpbm_content_template' ] == 'template-3' ) {
                    if ( $wpbm_row == 1 ) {
                        ?>
                        <div class="wpbm-first-block-wrap <?php
                        if ( (isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] === 'video') || (isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] === 'sound_cloud') || (isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] === 'slider') ) {
                            echo 'wpbm-mag-upper-wrap';
                        }
                        ?>">
                                 <?php
                                 include(WPBM_PATH . 'inc/frontend/content/wpbm-media-type.php');
                                 ?>
                            <div class="wpbm-contain-wrap-all">
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
                                    <div class="wpbm-title"><a href="<?php echo get_permalink( $product_post_id ); ?>"><?php echo the_title(); ?></a>
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
                        <div class="wpbm-side-thumbnail-wrapper wpbm-clearfix">
                            <div class="wpbm-side-slider"  data-id="wpbm_side_<?php
                            echo rand( 1111111, 9999999 );
                            ?>" data-template="<?php echo esc_attr( $wpbm_option[ 'wpbm_content_template' ] ); ?>" data-column = "<?php
                                 if ( isset( $wpbm_option[ 'wpbm_mag_slide_column' ] ) ) {
                                     echo esc_attr( $wpbm_option[ 'wpbm_mag_slide_column' ] );
                                 }
                                 ?>"
                                 data-controls = "<?php
                                 if ( isset( $wpbm_option[ 'wpbm_mag_nav_controls' ] ) ) {
                                     echo esc_attr( $wpbm_option[ 'wpbm_mag_nav_controls' ] );
                                 }
                                 ?>"
                                 data-auto = "<?php
                                 if ( isset( $wpbm_option[ 'wpbm_mag_slide_auto' ] ) ) {
                                     echo esc_attr( $wpbm_option[ 'wpbm_mag_slide_auto' ] );
                                 }
                                 ?>"
                                 data-speed = "<?php
                                 if ( isset( $wpbm_option[ 'wpbm_mag_slide_speed' ] ) ) {
                                     echo esc_attr( $wpbm_option[ 'wpbm_mag_slide_speed' ] );
                                 }
                                 ?>">
                                     <?php
                                 } else {
                                     ?>
                                <div class="wpbm-side-content-block">
                                    <div class="wpbm-image-block">
                                        <?php
                                        include(WPBM_PATH . 'inc/frontend/content/wpbm-slide-media.php');
                                        ?>
                                    </div>
                                    <div class="wpbm-thumbnail-content-block">
                                        <?php
                                        /*
                                         * Show Category
                                         */
                                        if ( isset( $wpbm_option[ 'wpbm_show_category' ] ) && $wpbm_option[ 'wpbm_show_category' ] == '1' ) {
                                            ?>
                                            <div class="wpbm-thumbnail-category-wrap">
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
                                        <div class="wpbm-thumbnail-title">    <a href="<?php echo get_permalink( $product_post_id ); ?>"><?php echo the_title(); ?></a>
                                        </div>
                                        <?php if ( $display_content == '1' ) { ?>
                                            <div class="wpbm-thumbnail-content"><?php echo wp_trim_words( strip_tags( strip_shortcodes( get_the_content() ) ), 13, '...' ); ?></div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <?php
                            }
                            ++ $wpbm_row;
                        } else if ( isset( $wpbm_option[ 'wpbm_content_template' ] ) && $wpbm_option[ 'wpbm_content_template' ] == 'template-4' ) {
                            if ( $wpbm_row == 1 ) {
                                ?>
                                <div class="wpbm-first-block-wrap <?php
                                if ( (isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] === 'video') || (isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] === 'sound_cloud') || (isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] === 'slider') ) {
                                    echo 'wpbm-mag-upper-wrap';
                                }
                                ?>">
                                    <div class="wpbm-first-block-wrap-inner">
                                        <div class = "wpbm-top-header">
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
                                            <div class="wpbm-title">    <a href="<?php echo get_permalink( $product_post_id ); ?>"><?php echo the_title(); ?></a>
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
                                </div>
                                <div class="wpbm-side-thumbnail-wrapper">
                                    <div class="wpbm-side-slider"  data-id="wpbm_side_<?php
                                    echo rand( 1111111, 9999999 );
                                    ?>" data-template="<?php echo esc_attr( $wpbm_option[ 'wpbm_content_template' ] ); ?>" data-column = "<?php
                                         if ( isset( $wpbm_option[ 'wpbm_mag_slide_column' ] ) ) {
                                             echo esc_attr( $wpbm_option[ 'wpbm_mag_slide_column' ] );
                                         }
                                         ?>"
                                         data-controls = "<?php
                                         if ( isset( $wpbm_option[ 'wpbm_mag_nav_controls' ] ) ) {
                                             echo esc_attr( $wpbm_option[ 'wpbm_mag_nav_controls' ] );
                                         }
                                         ?>"
                                         data-auto = "<?php
                                         if ( isset( $wpbm_option[ 'wpbm_mag_slide_auto' ] ) ) {
                                             echo esc_attr( $wpbm_option[ 'wpbm_mag_slide_auto' ] );
                                         }
                                         ?>"
                                         data-speed = "<?php
                                         if ( isset( $wpbm_option[ 'wpbm_mag_slide_speed' ] ) ) {
                                             echo esc_attr( $wpbm_option[ 'wpbm_mag_slide_speed' ] );
                                         }
                                         ?>">
                                             <?php
                                         } else {
                                             ?>
                                        <div class="wpbm-side-content-block wpbm-clearfix">
                                            <div class="wpbm-image-block">
                                                <?php
                                                include(WPBM_PATH . 'inc/frontend/content/wpbm-slide-media.php');
                                                ?>
                                            </div>
                                            <div class="wpbm-thumbnail-content-block">

                                                <div class="wpbm-thumbnail-title"><?php echo the_title(); ?></div>
                                                <?php if ( $display_content == '1' ) { ?>
                                                    <div class="wpbm-thumbnail-content"><?php echo wp_trim_words( strip_tags( strip_shortcodes( get_the_content() ) ), 12, '...' ); ?></div>
                                                <?php } ?>
                                                <div class="wpbm-thumbnail-meta-wrap">
                                                    <?php
                                                    /*
                                                     * Date
                                                     */

                                                    if ( isset( $wpbm_option[ 'wpbm_show_date' ] ) && $wpbm_option[ 'wpbm_show_date' ] == '1' ) {
                                                        ?>
                                                        <div class="wpbm-thumbnail-date"><?php echo get_the_date( $date_format ); ?></div>
                                                        <?php
                                                    }
                                                    /*
                                                     * Show Author
                                                     */
                                                    if ( isset( $wpbm_option[ 'wpbm_show_author' ] ) && $wpbm_option[ 'wpbm_show_author' ] == '1' ) {
                                                        ?>
                                                        <div class="wpbm-thumbnail-author-name">
                                                            <?php
                                                            the_author_posts_link();
                                                            ?>
                                                        </div>
                                                    <?php }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ++ $wpbm_row;
                                } else if ( isset( $wpbm_option[ 'wpbm_content_template' ] ) && $wpbm_option[ 'wpbm_content_template' ] == 'template-5' ) {
                                    if ( $wpbm_row == 1 ) {
                                        ?>
                                        <div class="wpbm-first-block-wrap <?php
                                        if ( (isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] === 'video') || (isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] === 'sound_cloud') || (isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] === 'slider') ) {
                                            echo 'wpbm-masonry-upper-wrap';
                                        }
                                        ?>">
                                                 <?php
                                                 include(WPBM_PATH . 'inc/frontend/content/wpbm-media-type.php');
                                                 ?>
                                            <div class="wpbm-contain-wrap-all">
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
                                                    <div class="wpbm-title">    <a href="<?php echo get_permalink( $product_post_id ); ?>"><?php echo the_title(); ?></a>
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
                                        </div>
                                        <div class="wpbm-side-thumbnail-wrapper wpbm-clearfix">
                                            <?php
                                        } else {
                                            ?>
                                            <div class="wpbm-side-content-block">
                                                <div class="wpbm-side-content-block-inner wpbm-clearfix">
                                                    <div class="wpbm-image-block">
                                                        <?php
                                                        include(WPBM_PATH . 'inc/frontend/content/wpbm-slide-media.php');
                                                        ?>
                                                    </div>
                                                    <div class="wpbm-thumbnail-content-block">
                                                        <div class="wpbm-thumbnail-title">    <a href="<?php echo get_permalink( $product_post_id ); ?>"><?php echo the_title(); ?></a>
                                                        </div>
                                                        <?php if ( $display_content == '1' ) { ?>
                                                            <div class="wpbm-thumbnail-content"><?php echo wp_trim_words( strip_tags( strip_shortcodes( get_the_content() ) ), 15, '...' ); ?></div>
                                                        <?php } ?>
                                                        <div class="wpbm-thumbnail-meta-wrap">
                                                            <?php
                                                            /*
                                                             * Date
                                                             */

                                                            if ( isset( $wpbm_option[ 'wpbm_show_date' ] ) && $wpbm_option[ 'wpbm_show_date' ] == '1' ) {
                                                                ?>
                                                                <div class="wpbm-thumbnail-date">
                                                                    <i class="fa fa-calendar-o" aria-hidden="true"></i>
                                                                    <?php echo get_the_date( $date_format ); ?></div>
                                                                <?php
                                                            }
                                                            /*
                                                             * Display comment count
                                                             */
                                                            if ( isset( $wpbm_option[ 'wpbm_show_comment' ] ) && $wpbm_option[ 'wpbm_show_comment' ] == '1' ) {
                                                                ?>
                                                                <div class="wpbm-thumbnail-comment-wrap">
                                                                    <i class="fa fa-comment-o" aria-hidden="true"></i>
                                                                    <?php
                                                                    echo get_comments_number();
                                                                    ?>
                                                                </div>
                                                                <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        ++ $wpbm_row;
                                    } else if ( isset( $wpbm_option[ 'wpbm_content_template' ] ) && $wpbm_option[ 'wpbm_content_template' ] == 'template-6' ) {
                                        if ( $wpbm_row == 1 ) {
                                            ?>
                                            <div class="wpbm-first-block-wrap <?php
                                            if ( (isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] === 'video') || (isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] === 'sound_cloud') || (isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] === 'slider') ) {
                                                echo 'wpbm-mag-upper-wrap';
                                            }
                                            ?>">
                                                <div class="wpbm-first-block-wrap-inner">
                                                    <?php
                                                    include(WPBM_PATH . 'inc/frontend/content/wpbm-media-type.php');
                                                    ?>
                                                    <div class="wpbm-contain-wrap-all">
                                                        <div class="wpbm-contain-wrap-all-main">
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
                                                            <div class="wpbm-clearfix">
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
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="wpbm-side-thumbnail-wrapper">
                                                <div class="wpbm-side-slider"  data-id="wpbm_side_<?php
                                                echo rand( 1111111, 9999999 );
                                                ?>" data-template="<?php echo esc_attr( $wpbm_option[ 'wpbm_content_template' ] ); ?>" data-column = "<?php
                                                     if ( isset( $wpbm_option[ 'wpbm_mag_slide_column' ] ) ) {
                                                         echo esc_attr( $wpbm_option[ 'wpbm_mag_slide_column' ] );
                                                     }
                                                     ?>"
                                                     data-controls = "<?php
                                                     if ( isset( $wpbm_option[ 'wpbm_mag_nav_controls' ] ) ) {
                                                         echo esc_attr( $wpbm_option[ 'wpbm_mag_nav_controls' ] );
                                                     }
                                                     ?>"
                                                     data-auto = "<?php
                                                     if ( isset( $wpbm_option[ 'wpbm_mag_slide_auto' ] ) ) {
                                                         echo esc_attr( $wpbm_option[ 'wpbm_mag_slide_auto' ] );
                                                     }
                                                     ?>"
                                                     data-speed = "<?php
                                                     if ( isset( $wpbm_option[ 'wpbm_mag_slide_speed' ] ) ) {
                                                         echo esc_attr( $wpbm_option[ 'wpbm_mag_slide_speed' ] );
                                                     }
                                                     ?>">
                                                         <?php
                                                     } else {
                                                         ?>
                                                    <div class="wpbm-side-content-block wpbm-clearfix">
                                                        <div class="wpbm-image-block">
                                                            <?php
                                                            include(WPBM_PATH . 'inc/frontend/content/wpbm-slide-media.php');
                                                            ?>
                                                        </div>
                                                        <div class="wpbm-thumbnail-content-block">
                                                            <div class="wpbm-thumbnail-meta-wrap">
                                                                <?php
                                                                /*
                                                                 * Show Category
                                                                 */
                                                                if ( isset( $wpbm_option[ 'wpbm_show_category' ] ) && $wpbm_option[ 'wpbm_show_category' ] == '1' ) {
                                                                    ?>
                                                                    <div class="wpbm-thumbnail-category-wrap">
                                                                        <?php
                                                                        $categories = get_the_category();
                                                                        $separator = ' ';
                                                                        $output = '';
                                                                        if ( ! empty( $categories ) ) {
                                                                            foreach ( $categories as $category ) {
                                                                                $output .= '<a href="' . esc_url( get_category_link( $category -> term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', WPBM_TD ), $category -> name ) ) . '">' . esc_html( $category -> name ) . '</a>' . $separator;
                                                                            }
                                                                            ?>
                                                                            <div class="wpbm-thumbnail-category-list">
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
                                                                    <div class="wpbm-thumbnail-date">
                                                                        <?php echo get_the_date( $date_format ); ?></div>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </div>
                                                            <div class="wpbm-thumbnail-title">    <a href="<?php echo get_permalink( $product_post_id ); ?>"><?php echo the_title(); ?></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }

                                                ++ $wpbm_row;
                                            }
//template 7
                                            else if ( isset( $wpbm_option[ 'wpbm_content_template' ] ) && $wpbm_option[ 'wpbm_content_template' ] == 'template-7' ) {
                                                if ( $wpbm_row == 1 ) {
                                                    ?>

                                                    <div class="wpbm-first-block-wrap <?php
                                                    if ( (isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] === 'video') || (isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] === 'sound_cloud') || (isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] === 'slider') ) {
                                                        echo 'wpbm-mag-upper-wrap';
                                                    }
                                                    ?>">
                                                        <div class="wpbm-contain-wrap-all">
                                                            <div class="wpbm-contain-wrap-all-main">
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
                                                                                echo get_comments_number();
                                                                                ?>
                                                                            </div>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </div>

                                                                    <div class="wpbm-car-content"><?php
                                                                        if ( isset( $wpbm_option[ 'post_content' ] ) && $wpbm_option[ 'post_content' ] == 'full-text' ) {
                                                                            the_content();
                                                                        } else {
                                                                            echo substr( get_the_excerpt(), 0, $excerpt );
                                                                        }
                                                                        ?></div>
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

                                                        </div>
                                                    </div>
                                                </div>
                                                <?php if ( has_post_thumbnail( $product_post_id ) ) { ?>
                                                    <style>
                                                        .wpbm-content-template-7.wpbm-img-background {
                                                            background-image:url(<?php
                                                            echo get_the_post_thumbnail_url( $product_post_id, 'full' );
                                                            ?>);
                                                            background-size: cover;
                                                        }
                                                    </style>
                                                <?php } ?>
                                                <div class="wpbm-side-thumbnail-wrapper">
                                                    <div class="wpbm-side-slider"  data-id="wpbm_side_<?php
                                                    echo rand( 1111111, 9999999 );
                                                    ?>" data-template="<?php echo esc_attr( $wpbm_option[ 'wpbm_content_template' ] ); ?>" data-column = "<?php
                                                         if ( isset( $wpbm_option[ 'wpbm_mag_slide_column' ] ) ) {
                                                             echo esc_attr( $wpbm_option[ 'wpbm_mag_slide_column' ] );
                                                         }
                                                         ?>"
                                                         data-controls = "<?php
                                                         if ( isset( $wpbm_option[ 'wpbm_mag_nav_controls' ] ) ) {
                                                             echo esc_attr( $wpbm_option[ 'wpbm_mag_nav_controls' ] );
                                                         }
                                                         ?>"
                                                         data-auto = "<?php
                                                         if ( isset( $wpbm_option[ 'wpbm_mag_slide_auto' ] ) ) {
                                                             echo esc_attr( $wpbm_option[ 'wpbm_mag_slide_auto' ] );
                                                         }
                                                         ?>"
                                                         data-speed = "<?php
                                                         if ( isset( $wpbm_option[ 'wpbm_mag_slide_speed' ] ) ) {
                                                             echo esc_attr( $wpbm_option[ 'wpbm_mag_slide_speed' ] );
                                                         }
                                                         ?>">
                                                             <?php
                                                         } else {
                                                             ?>
                                                        <div class="wpbm-side-content-block wpbm-clearfix">
                                                            <div class="wpbm-thumbnail-meta-wrap">
                                                                <?php
                                                                /*
                                                                 * Date
                                                                 */

                                                                if ( isset( $wpbm_option[ 'wpbm_show_date' ] ) && $wpbm_option[ 'wpbm_show_date' ] == '1' ) {
                                                                    ?>
                                                                    <div class="wpbm-thumbnail-date">
                                                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                                                        <?php echo get_the_date( $date_format ); ?></div>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </div>
                                                            <div class="wpbm-thumbnail-title">    <a href="<?php echo get_permalink( $product_post_id ); ?>"><?php echo the_title(); ?></a>
                                                            </div>
                                                            <?php if ( $display_content == '1' ) { ?>
                                                                <div class="wpbm-thumbnail-content"><?php echo wp_trim_words( strip_tags( strip_shortcodes( get_the_content() ) ), 25, '...' ); ?></div>
                                                            <?php } ?>
                                                        </div>
                                                        <?php
                                                    }

                                                    ++ $wpbm_row;
                                                } else if ( isset( $wpbm_option[ 'wpbm_content_template' ] ) && $wpbm_option[ 'wpbm_content_template' ] == 'template-8' ) {
                                                    if ( $wpbm_row == 1 ) {
                                                        ?>
                                                        <div class="wpbm-first-block-wrap <?php
                                                        if ( (isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] === 'video') || (isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] === 'sound_cloud') || (isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] === 'slider') ) {
                                                            echo 'wpbm-mag-upper-wrap';
                                                        }
                                                        ?>">
                                                            <div class="wpbm-contain-wrap-all">
                                                                <div class="wpbm-upper-content wpbm-clearfix">
                                                                    <?php
                                                                    /*
                                                                     * Show Author
                                                                     */
                                                                    if ( isset( $wpbm_option[ 'wpbm_show_author' ] ) && $wpbm_option[ 'wpbm_show_author' ] == '1' ) {
                                                                        ?>
                                                                        <div class="wpbm-author-image">
                                                                            <?php
                                                                            echo get_avatar( get_the_author_meta( 'ID' ), 97 );
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
                                                            </div>
                                                        </div>
                                                        <div class="wpbm-side-thumbnail-wrapper">
                                                            <div class="wpbm-side-slider"  data-id="wpbm_side_<?php
                                                            echo rand( 1111111, 9999999 );
                                                            ?>" data-template="<?php echo esc_attr( $wpbm_option[ 'wpbm_content_template' ] ); ?>" data-column = "<?php
                                                                 if ( isset( $wpbm_option[ 'wpbm_mag_slide_column' ] ) ) {
                                                                     echo esc_attr( $wpbm_option[ 'wpbm_mag_slide_column' ] );
                                                                 }
                                                                 ?>"
                                                                 data-controls = "<?php
                                                                 if ( isset( $wpbm_option[ 'wpbm_mag_nav_controls' ] ) ) {
                                                                     echo esc_attr( $wpbm_option[ 'wpbm_mag_nav_controls' ] );
                                                                 }
                                                                 ?>"
                                                                 data-auto = "<?php
                                                                 if ( isset( $wpbm_option[ 'wpbm_mag_slide_auto' ] ) ) {
                                                                     echo esc_attr( $wpbm_option[ 'wpbm_mag_slide_auto' ] );
                                                                 }
                                                                 ?>"
                                                                 data-speed = "<?php
                                                                 if ( isset( $wpbm_option[ 'wpbm_mag_slide_speed' ] ) ) {
                                                                     echo esc_attr( $wpbm_option[ 'wpbm_mag_slide_speed' ] );
                                                                 }
                                                                 ?>">
                                                                     <?php
                                                                 } else {
                                                                     ?>
                                                                <div class="wpbm-side-content-block wpbm-clearfix">
                                                                    <div class="wpbm-image-block">
                                                                        <?php
                                                                        include(WPBM_PATH . 'inc/frontend/content/wpbm-slide-media.php');
                                                                        ?>
                                                                    </div>
                                                                    <div class="wpbm-thumbnail-content-block">

                                                                        <div class="wpbm-thumbnail-title"><?php echo the_title(); ?></div>
                                                                        <?php if ( $display_content == '1' ) { ?>
                                                                            <div class="wpbm-thumbnail-content"><?php echo wp_trim_words( strip_tags( strip_shortcodes( get_the_content() ) ), 10, '...' ); ?></div>
                                                                        <?php } ?>
                                                                        <div class="wpbm-thumbnail-meta-wrap">
                                                                            <?php
                                                                            /*
                                                                             * Date
                                                                             */

                                                                            if ( isset( $wpbm_option[ 'wpbm_show_date' ] ) && $wpbm_option[ 'wpbm_show_date' ] == '1' ) {
                                                                                ?>
                                                                                <div class="wpbm-thumbnail-date"><?php echo get_the_date( $date_format ); ?></div>
                                                                                <?php
                                                                            }
                                                                            /*
                                                                             * Show Author
                                                                             */
                                                                            if ( isset( $wpbm_option[ 'wpbm_show_author' ] ) && $wpbm_option[ 'wpbm_show_author' ] == '1' ) {
                                                                                ?>
                                                                                <div class="wpbm-thumbnail-author-name">
                                                                                    <?php
                                                                                    the_author_posts_link();
                                                                                    ?>
                                                                                </div>
                                                                            <?php }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                            }

                                                            ++ $wpbm_row;
                                                        } else if ( isset( $wpbm_option[ 'wpbm_content_template' ] ) && $wpbm_option[ 'wpbm_content_template' ] == 'template-9' ) {
                                                            if ( $wpbm_row == 1 ) {
                                                                ?>
                                                                <div class="wpbm-first-block-wrap <?php
                                                                if ( (isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] === 'video') || (isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] === 'sound_cloud') || (isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] === 'slider') ) {
                                                                    echo 'wpbm-mag-upper-wrap';
                                                                }
                                                                ?>">
                                                                    <div class="wpbm-contain-wrap-all">
                                                                        <div class="wpbm-contain-wrap-all-main">
                                                                            <div class="wpbm-clearfix">
                                                                                <div class="wpbm-image-container">
                                                                                    <?php
                                                                                    include(WPBM_PATH . 'inc/frontend/content/wpbm-media-type.php');
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
                                                                                            <div class="wpbm-content"><?php
                                                                                                if ( isset( $wpbm_option[ 'post_content' ] ) && $wpbm_option[ 'post_content' ] == 'full-text' ) {
                                                                                                    the_content();
                                                                                                } else {
                                                                                                    echo substr( get_the_excerpt(), 0, $excerpt );
                                                                                                }
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
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="wpbm-side-thumbnail-wrapper wpbm-clearfix">
                                                                    <?php
                                                                } else {
                                                                    ?>
                                                                    <div class="wpbm-side-content-block">
                                                                        <div class="wpbm-side-content-inner-block">
                                                                            <div class="wpbm-image-block">
                                                                                <?php
                                                                                include(WPBM_PATH . 'inc/frontend/content/wpbm-slide-media.php');
                                                                                ?>
                                                                            </div>
                                                                            <div class="wpbm-thumbnail-content-block">
                                                                                <div class="wpbm-thumbnail-meta-wrap">
                                                                                    <?php
                                                                                    /*
                                                                                     * Show Category
                                                                                     */
                                                                                    if ( isset( $wpbm_option[ 'wpbm_show_category' ] ) && $wpbm_option[ 'wpbm_show_category' ] == '1' ) {
                                                                                        ?>
                                                                                        <div class="wpbm-thumbnail-category-wrap">
                                                                                            <?php
                                                                                            $categories = get_the_category();
                                                                                            $separator = ' ';
                                                                                            $output = '';
                                                                                            if ( ! empty( $categories ) ) {
                                                                                                foreach ( $categories as $category ) {
                                                                                                    $output .= '<a href="' . esc_url( get_category_link( $category -> term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', WPBM_TD ), $category -> name ) ) . '">' . esc_html( $category -> name ) . '</a>' . $separator;
                                                                                                }
                                                                                                ?>
                                                                                                <div class="wpbm-thumbnail-category-list">
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
                                                                                        <div class="wpbm-thumbnail-date">
                                                                                            <?php echo get_the_date( $date_format ); ?></div>
                                                                                        <?php
                                                                                    }
                                                                                    ?>
                                                                                </div>
                                                                                <div class="wpbm-thumbnail-title">    <a href="<?php echo get_permalink( $product_post_id ); ?>"><?php echo the_title(); ?></a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <?php
                                                                }

                                                                ++ $wpbm_row;
                                                            } else {
                                                                if ( $wpbm_row == 1 ) {
                                                                    ?>
                                                                    <div class="wpbm-first-block-wrap <?php
                                                                    if ( (isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] === 'video') || (isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] === 'sound_cloud') || (isset( $wpbm_extra_option[ 'media_type' ] ) && $wpbm_extra_option[ 'media_type' ] === 'slider') ) {
                                                                        echo 'wpbm-mag-upper-wrap';
                                                                    }
                                                                    ?>">
                                                                        <div class="wpbm-contain-wrap-all">
                                                                            <div class="wpbm-contain-wrap-all-main">
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
                                                                                                        _e( 'By ', WPBM_TD );
                                                                                                        the_author_posts_link();
                                                                                                        ?>
                                                                                                    </div>
                                                                                                <?php }
                                                                                                ?>
                                                                                            </div>
                                                                                            <div class="wpbm-content"><?php
                                                                                                if ( isset( $wpbm_option[ 'post_content' ] ) && $wpbm_option[ 'post_content' ] == 'full-text' ) {
                                                                                                    the_content();
                                                                                                } else {
                                                                                                    echo substr( get_the_excerpt(), 0, $excerpt );
                                                                                                }
                                                                                                ?></div>
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
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="wpbm-side-thumbnail-wrapper">
                                                                        <div class="wpbm-side-slider"  data-id="wpbm_side_<?php
                                                                        echo rand( 1111111, 9999999 );
                                                                        ?>" data-template="<?php echo esc_attr( $wpbm_option[ 'wpbm_content_template' ] ); ?>" data-column = "<?php
                                                                             if ( isset( $wpbm_option[ 'wpbm_mag_slide_column' ] ) ) {
                                                                                 echo esc_attr( $wpbm_option[ 'wpbm_mag_slide_column' ] );
                                                                             }
                                                                             ?>"
                                                                             data-controls = "<?php
                                                                             if ( isset( $wpbm_option[ 'wpbm_mag_nav_controls' ] ) ) {
                                                                                 echo esc_attr( $wpbm_option[ 'wpbm_mag_nav_controls' ] );
                                                                             }
                                                                             ?>"
                                                                             data-auto = "<?php
                                                                             if ( isset( $wpbm_option[ 'wpbm_mag_slide_auto' ] ) ) {
                                                                                 echo esc_attr( $wpbm_option[ 'wpbm_mag_slide_auto' ] );
                                                                             }
                                                                             ?>"
                                                                             data-speed = "<?php
                                                                             if ( isset( $wpbm_option[ 'wpbm_mag_slide_speed' ] ) ) {
                                                                                 echo esc_attr( $wpbm_option[ 'wpbm_mag_slide_speed' ] );
                                                                             }
                                                                             ?>">
                                                                                 <?php
                                                                             } else {
                                                                                 ?>
                                                                            <div class="wpbm-side-content-block">
                                                                                <div class="wpbm-side-content-block-inner wpbm-clearfix">
                                                                                    <div class="wpbm-image-block">
                                                                                        <?php
                                                                                        include(WPBM_PATH . 'inc/frontend/content/wpbm-slide-media.php');
                                                                                        ?>
                                                                                    </div>
                                                                                    <div class="wpbm-thumbnail-content-block">
                                                                                        <div class="wpbm-thumbnail-title">    <a href="<?php echo get_permalink( $product_post_id ); ?>"><?php echo the_title(); ?></a>
                                                                                        </div>
                                                                                        <?php if ( $display_content == '1' ) { ?>
                                                                                            <div class="wpbm-thumbnail-content"><?php echo wp_trim_words( strip_tags( strip_shortcodes( get_the_content() ) ), 10, '...' ); ?></div>
                                                                                        <?php } ?>
                                                                                        <div class="wpbm-thumbnail-meta-wrap">
                                                                                            <?php
                                                                                            /*
                                                                                             * Date
                                                                                             */

                                                                                            if ( isset( $wpbm_option[ 'wpbm_show_date' ] ) && $wpbm_option[ 'wpbm_show_date' ] == '1' ) {
                                                                                                ?>
                                                                                                <div class="wpbm-thumbnail-date">
                                                                                                    <i class="fa fa-calendar-o" aria-hidden="true"></i>
                                                                                                    <?php echo get_the_date( $date_format ); ?></div>
                                                                                                <?php
                                                                                            }
                                                                                            /*
                                                                                             * Display comment count
                                                                                             */
                                                                                            if ( isset( $wpbm_option[ 'wpbm_show_comment' ] ) && $wpbm_option[ 'wpbm_show_comment' ] == '1' ) {
                                                                                                ?>
                                                                                                <div class="wpbm-thumbnail-comment-wrap">
                                                                                                    <i class="fa fa-comment-o" aria-hidden="true"></i>
                                                                                                    <?php
                                                                                                    echo get_comments_number();
                                                                                                    ?>
                                                                                                </div>
                                                                                                <?php
                                                                                            }
                                                                                            ?>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <?php
                                                                        }

                                                                        ++ $wpbm_row;
                                                                    }