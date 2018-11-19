<?php
$timeline_date = get_the_date( $date_format );
if ( isset( $wpbm_option[ 'timeline_vertical_template' ] ) && $wpbm_option[ 'timeline_vertical_template' ] == 'template-1' ) {

    if ( $timeline_date != $current_date ) {
        ?>
        <div class="wpbm-timeline-line"></div>
        <div class="wpbm-timeline-date wpbm-clearfix">
            <span>
                <?php echo get_the_date( $date_format ); ?>
            </span>
        </div>
        <?php
    }
    ?>
    <div class="wpbm-timeline-item">
        <div class="wpbm-timeline-circle"></div>
        <div class="wpbm-all-contain-here">
            <div class="wpbm-image-container">
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
            <div class="wpbm-inner-content">
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
                <div class="wpbm-content-outer-wrap wpbm-clearfix">
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
        </div>
    </div>
    <?php
} else if ( isset( $wpbm_option[ 'timeline_vertical_template' ] ) && $wpbm_option[ 'timeline_vertical_template' ] == 'template-2' ) {
    ?>
    <div class="wpbm-timeline-line"></div>
    <div class="wpbm-timeline-item">
        <?php
        if ( $timeline_date != $current_date ) {
            ?>
            <div class="wpbm-timeline-date">
                <?php echo get_the_date( $date_format ); ?>
            </div>
            <?php
        }
        ?>
        <div class="wpbm-all-contain-here">
            <div class="wpbm-title">
                <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?></a></div>
            <?php
            include(WPBM_PATH . 'inc/frontend/content/wpbm-media-type.php');
            ?>
            <div class="wpbm-inner-content">
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
                            <a href="<?php echo get_permalink( $product_post_id ); ?>"><?php echo esc_attr( $wpbm_option[ 'wpbm_post_link_text' ] ); ?><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                        </div>
                        <?php
                    } else {
                        ?>
                        <div class="wpbm-link-button">
                            <a href="<?php echo esc_url( $wpbm_option[ 'wpbm_custom_url' ] ); ?>"><?php echo esc_attr( $wpbm_option[ 'wpbm_post_link_text' ] ); ?> <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                        </div>
                        <?php
                    }
                }
                ?>
                <div class="wpbm-content-outer-wrap wpbm-meta-wrap">
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
                     * Show Tag
                     */
                    if ( isset( $wpbm_option[ 'wpbm_show_tag' ] ) && $wpbm_option[ 'wpbm_show_tag' ] == '1' ) {
                        global $post;
                        $tags = get_the_tags();
                        $separator = '  ';
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
        </div>
    </div>
    <?php
} else if ( isset( $wpbm_option[ 'timeline_vertical_template' ] ) && $wpbm_option[ 'timeline_vertical_template' ] == 'template-3' ) {
    ?>

    <?php
    if ( $timeline_date != $current_date ) {
        ?>
        <div class="wpbm-timeline-line"></div>
        <div class="wpbm-timeline-date">
            <span><?php echo get_the_date( 'F, Y' ); ?></span>
        </div>
        <?php
    }
    ?>
    <div class="wpbm-timeline-item">
        <div class="wpbm-timeline-circle"></div>
        <div class="wpbm-all-contain-here">
            <div class="wpbm-title">
                <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?></a></div>
            <div class="wpbm-contain-main">
                <?php
                include(WPBM_PATH . 'inc/frontend/content/wpbm-media-type.php');
                ?>
                <div class="wpbm-inner-content">
                    <div class="wpbm-meta-wrap">
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
                    <div class="wpbm-meta-wrap-1">
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
                         * Show Tag
                         */
                        if ( isset( $wpbm_option[ 'wpbm_show_tag' ] ) && $wpbm_option[ 'wpbm_show_tag' ] == '1' ) {
                            global $post;
                            $tags = get_the_tags();
                            $separator = '  ';
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
                                <div class="wpbm-share-wrap-contain">
        <?php if ( isset( $wpbm_option[ 'wpbm_show_facebook_share' ] ) && $wpbm_option[ 'wpbm_show_facebook_share' ] == '1' ) { ?>
                                        <span>
                                            <a href="https://www.facebook.com/sharer.php?u=<?php echo get_permalink( $product_post_id ); ?>" target="_blank" rel="nofollow">
                                                <i class="fa fa-facebook" aria-hidden="true"></i>
                                            </a>
                                            <div class="wpbm-social-tooltip">
            <?php _e( 'Facebook', WPBM_TD ); ?>
                                            </div>
                                        </span>
                                    <?php } ?>
        <?php if ( isset( $wpbm_option[ 'wpbm_show_twitter_share' ] ) && $wpbm_option[ 'wpbm_show_twitter_share' ] == '1' ) { ?>
                                        <span>
                                            <a href="http://twitter.com/share?text=<?php echo the_title(); ?>&url=<?php echo get_permalink( $product_post_id ); ?>" target="_blank" rel="nofollow">
                                                <i class="fa fa-twitter" aria-hidden="true"></i>
                                            </a>
                                            <div class="wpbm-social-tooltip">
            <?php _e( 'Twitter', WPBM_TD ); ?>
                                            </div>
                                        </span>
                                    <?php } ?>
        <?php if ( isset( $wpbm_option[ 'wpbm_show_google_share' ] ) && $wpbm_option[ 'wpbm_show_google_share' ] == '1' ) { ?>
                                        <span>
                                            <a href="https://plus.google.com/share?url=<?php echo get_permalink( $product_post_id ); ?>" target="_blank" rel="nofollow">
                                                <i class="fa fa-google-plus" aria-hidden="true"></i>
                                            </a>
                                            <div class="wpbm-social-tooltip">
            <?php _e( 'Google +', WPBM_TD ); ?>
                                            </div>
                                        </span>
                                    <?php } ?>
        <?php if ( isset( $wpbm_option[ 'wpbm_show_linkedin_share' ] ) && $wpbm_option[ 'wpbm_show_linkedin_share' ] == '1' ) { ?>
                                        <span>
                                            <a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink( $product_post_id ); ?>" target="_blank" rel="nofollow">
                                                <i class="fa fa-linkedin" aria-hidden="true"></i>
                                            </a>
                                            <div class="wpbm-social-tooltip">
            <?php _e( 'Linkedin', WPBM_TD ); ?>
                                            </div>
                                        </span>
                                    <?php } ?>
        <?php if ( isset( $wpbm_option[ 'wpbm_show_mail_share' ] ) && $wpbm_option[ 'wpbm_show_mail_share' ] == '1' ) { ?>
                                        <span>
                                            <a href="mailto:?subject=<?php echo the_title(); ?> &body=<?php echo the_title(); ?> <?php echo get_permalink( $product_post_id ); ?>" target="_blank" rel="nofollow">
                                                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                            </a>
                                            <div class="wpbm-social-tooltip">
            <?php _e( 'Email', WPBM_TD ); ?>
                                            </div>
                                        </span>
                                    <?php } ?>
        <?php if ( isset( $wpbm_option[ 'wpbm_show_pinterest_share' ] ) && $wpbm_option[ 'wpbm_show_pinterest_share' ] == '1' ) { ?>
                                        <span>
                                            <a href="http://pinterest.com/pin/create/button/?url=<?php echo get_permalink( $product_post_id ); ?>" target="_blank" rel="nofollow">
                                                <i class="fa fa-pinterest" aria-hidden="true"></i>
                                            </a>
                                            <div class="wpbm-social-tooltip">
            <?php _e( 'Pinterest', WPBM_TD ); ?>
                                            </div>
                                        </span>
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
    </div>
    <?php
} else if ( isset( $wpbm_option[ 'timeline_vertical_template' ] ) && $wpbm_option[ 'timeline_vertical_template' ] == 'template-4' ) {
    ?>
    <div class="wpbm-timeline-line"></div>
    <div class="wpbm-timeline-item">
        <?php
        if ( $timeline_date != $current_date ) {
            ?>

            <div class="wpbm-timeline-date">
                <div class="wpbm-timeline-date-inner">
                    <div class="wpbm-date-day">
        <?php echo get_the_date( 'd' ); ?>
                    </div>
                    <div class="wpbm-month">
        <?php echo get_the_date( 'M' ); ?>
                    </div>
                </div>
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
        }
        ?>
        <div class="wpbm-all-contain-here">
            <div class="wpbm-inner-content">
                <div class="wpbm-title">
                    <a href="<?php the_permalink(); ?>">
                <?php the_title(); ?></a></div>
                <?php
                /*
                 * Show Author
                 */
                if ( isset( $wpbm_option[ 'wpbm_show_author' ] ) && $wpbm_option[ 'wpbm_show_author' ] == '1' ) {
                    ?>
                    <div class="wpbm-author-name">

                        <?php
                        _e( 'Posted by', WPBM_TD );
                        the_author_posts_link();
                        ?>
                    </div>
                    <?php
                }
                include(WPBM_PATH . 'inc/frontend/content/wpbm-media-type.php');
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
                <div class="wpbm-meta-wrap">
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
                     * Show Tag
                     */
                    if ( isset( $wpbm_option[ 'wpbm_show_tag' ] ) && $wpbm_option[ 'wpbm_show_tag' ] == '1' ) {
                        global $post;
                        $tags = get_the_tags();
                        $separator = ' ';
                        $output = '';
                        if ( ! empty( $tags ) ) {
                            foreach ( $tags as $tag ) {
                                $output .= '<a href="' . esc_url( get_tag_link( $tag -> term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', WPBM_TD ), $tag -> name ) ) . '">' . " # " . esc_html( $tag -> name ) . '</a>' . $separator;
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
} else if ( isset( $wpbm_option[ 'timeline_vertical_template' ] ) && $wpbm_option[ 'timeline_vertical_template' ] == 'template-5' ) {
    if ( $timeline_date != $current_date ) {
        ?>
        <div class="wpbm-timeline-line"></div>
        <div class="wpbm-timeline-date wpbm-clearfix">
        <?php echo get_the_date( 'Y' ); ?>
        </div>
        <?php
    }
    ?>
    <div class="wpbm-timeline-item wpbm-clearfix">
        <div class="wpbm-author-block">
            <?php
            /*
             * Show Author
             */
            if ( isset( $wpbm_option[ 'wpbm_show_author' ] ) && $wpbm_option[ 'wpbm_show_author' ] == '1' ) {
                ?>
                <div class="wpbm-author-name">
                    <?php
                    echo get_avatar( get_the_author_meta( 'ID' ), 56 );
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
                            $output .= '<span><a href="' . esc_url( get_category_link( $category -> term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', WPBM_TD ), $category -> name ) ) . '">' . esc_html( $category -> name ) . '</a></span>' . $separator;
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
    <?php } ?>
        </div>
        <div class="wpbm-all-contain-here">
            <div class="wpbm-inner-content">
                <?php
                include(WPBM_PATH . 'inc/frontend/content/wpbm-media-type.php');
                ?>
                <div class="wpbm-contain-main-inner">
                    <div class="wpbm-title">
                        <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?></a></div>
                    <div class="wpbm-meta-wrap">
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
                            $separator = ' , ';
                            $output = '';
                            if ( ! empty( $tags ) ) {
                                foreach ( $tags as $tag ) {
                                    $output .= '<a  href="' . esc_url( get_tag_link( $tag -> term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', WPBM_TD ), $tag -> name ) ) . '">' . esc_html( $tag -> name ) . '</a>' . $separator;
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
                        <?php include(WPBM_PATH . 'inc/frontend/content/details/content.php'); ?>
                    <div class="wpbm-lower-meta wpbm-clearfix">
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
        <?php if ( isset( $wpbm_option[ 'wpbm_show_facebook_share' ] ) && $wpbm_option[ 'wpbm_show_facebook_share' ] == '1' ) { ?>
                                    <a class="wpbm-fb" href="https://www.facebook.com/sharer.php?u=<?php echo get_permalink( $product_post_id ); ?>" target="_blank" rel="nofollow">
                                        <i class="fa fa-facebook" aria-hidden="true"></i>
                                    </a>
                                <?php } ?>
        <?php if ( isset( $wpbm_option[ 'wpbm_show_twitter_share' ] ) && $wpbm_option[ 'wpbm_show_twitter_share' ] == '1' ) { ?>
                                    <a class="wpbm-tw" href="http://twitter.com/share?text=<?php echo the_title(); ?>&url=<?php echo get_permalink( $product_post_id ); ?>" target="_blank" rel="nofollow">
                                        <i class="fa fa-twitter" aria-hidden="true"></i>
                                    </a>
                                <?php } ?>
        <?php if ( isset( $wpbm_option[ 'wpbm_show_google_share' ] ) && $wpbm_option[ 'wpbm_show_google_share' ] == '1' ) { ?>

                                    <a class="wpbm-gp" href="https://plus.google.com/share?url=<?php echo get_permalink( $product_post_id ); ?>" target="_blank" rel="nofollow">
                                        <i class="fa fa-google-plus" aria-hidden="true"></i>
                                    </a>
                                <?php } ?>
        <?php if ( isset( $wpbm_option[ 'wpbm_show_linkedin_share' ] ) && $wpbm_option[ 'wpbm_show_linkedin_share' ] == '1' ) { ?>

                                    <a class="wpbm-ln" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo get_permalink( $product_post_id ); ?>" target="_blank" rel="nofollow">
                                        <i class="fa fa-linkedin" aria-hidden="true"></i>
                                    </a>
                                <?php } ?>
        <?php if ( isset( $wpbm_option[ 'wpbm_show_mail_share' ] ) && $wpbm_option[ 'wpbm_show_mail_share' ] == '1' ) { ?>

                                    <a class="wpbm-en" href="mailto:?subject=<?php echo the_title(); ?> &body=<?php echo the_title(); ?> <?php echo get_permalink( $product_post_id ); ?>" target="_blank" rel="nofollow">
                                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                    </a>
                                <?php } ?>
        <?php if ( isset( $wpbm_option[ 'wpbm_show_pinterest_share' ] ) && $wpbm_option[ 'wpbm_show_pinterest_share' ] == '1' ) { ?>

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
        </div>
    </div>
    <?php
} else if ( isset( $wpbm_option[ 'timeline_vertical_template' ] ) && $wpbm_option[ 'timeline_vertical_template' ] == 'template-6' ) {
    if ( $timeline_date != $current_date ) {
        ?>
        <div class="wpbm-timeline-line"></div>
        <div class="wpbm-timeline-date wpbm-clearfix">
            <div class="wpbm-timeline-date-inner-wrap">
                <div class="wpbm-date-day">
        <?php echo get_the_date( 'd' ); ?>
                </div>
                <div class="wpbm-month">
        <?php echo get_the_date( 'M' ); ?>
                </div>
            </div>
        </div>
    <?php } ?>
    <div class="wpbm-timeline-item">
        <div class="wpbm-timeline-circle"></div>
        <div class="wpbm-all-contain-here">
            <div class="wpbm-inner-content">
                <div class="wpbm-title">
                    <a href="<?php the_permalink(); ?>">
                    <?php the_title(); ?></a></div>
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
                    include(WPBM_PATH . 'inc/frontend/content/details/content.php');
                    /*
                     * Read More
                     */
                    if ( isset( $wpbm_option[ 'wpbm_show_read_more' ] ) && $wpbm_option[ 'wpbm_show_read_more' ] == '1' ) {
                        if ( isset( $wpbm_option[ 'post_url' ] ) && $wpbm_option[ 'post_url' ] == 'post_link' ) {
                            ?>
                            <div class="wpbm-link-button">
                                <a href="<?php echo get_permalink( $product_post_id ); ?>"><?php echo esc_attr( $wpbm_option[ 'wpbm_post_link_text' ] ) . '...'; ?></a>
                            </div>
                            <?php
                        } else {
                            ?>
                            <div class="wpbm-link-button">
                                <a href="<?php echo esc_url( $wpbm_option[ 'wpbm_custom_url' ] ); ?>"><?php echo esc_attr( $wpbm_option[ 'wpbm_post_link_text' ] ) . '...'; ?></a>
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
        </div>
    </div>
    <?php
} else if ( isset( $wpbm_option[ 'timeline_vertical_template' ] ) && $wpbm_option[ 'timeline_vertical_template' ] == 'template-7' ) {
    if ( $timeline_date != $current_date ) {
        ?>
        <div class="wpbm-timeline-line"></div>
        <div class="wpbm-timeline-date wpbm-clearfix">
            <span><?php echo get_the_date( 'F Y' ); ?></span>
        </div>
    <?php }
    ?>
    <div class="wpbm-timeline-item">
        <div class="wpbm-timeline-circle"></div>
        <div class="wpbm-all-contain-here">
            <div class="wpbm-inner-block">
                <?php
                include(WPBM_PATH . 'inc/frontend/content/wpbm-media-type.php');
                ?>
                <div class="wpbm-bottom-wrap-main-content">
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
                </div>
            </div>
        </div>
    </div>
    <?php
} else {
    if ( $timeline_date != $current_date ) {
        ?>
        <div class="wpbm-timeline-line"></div>
        <div class="wpbm-timeline-date">
            <span><?php echo get_the_date( 'Y' ); ?></span>
        </div>
    <?php }
    ?>
    <div class="wpbm-timeline-item">
        <div class="wpbm-timeline-circle-date">
    <?php echo get_the_date( $date_format ); ?>
        </div>
        <div class="wpbm-all-contain-here">
            <div class="wpbm-inner-block">
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
    </div>
    <?php
}
$current_date = $timeline_date;

