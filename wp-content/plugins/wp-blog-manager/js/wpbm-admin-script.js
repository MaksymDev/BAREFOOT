(function($) {

    /**
     * Add blog functionality
     */
    $(function() {

        /*
         * Fetch list of taxonomy from post type
         */
        $('.wpbm-post-type').on('change', function() {
            var select_post = $(this).val();
            $.ajax({
                url: wpbm_backend_js_params.ajax_url,
                data: {
                    select_post: select_post,
                    _wpnonce: wpbm_backend_js_params.ajax_nonce,
                    action: 'wpbm_selected_post_taxonomy',
                    beforeSend: function() {
                        // $(".wpbm-loader-preview").show();
                    }
                },
                type: "POST",
                success: function(response) {
                    $(".wpbm-select-taxonomy").html(response);
                    $(".wpbm-filter-taxonomy").html(response);
//                    $(".wpbm-loader-preview").hide();
                }
            });
        });
        /*
         * Fetch list of terms from taxonomy
         */
        $('.wpbm-select-taxonomy').on('change', function() {
            var select_tax = $(this).val();
            var tax_type = $('.wpbm-taxonomy-queries-type').val();
            $.ajax({
                url: wpbm_backend_js_params.ajax_url,
                data: {
                    select_tax: select_tax,
                    tax_type: tax_type,
                    _wpnonce: wpbm_backend_js_params.ajax_nonce,
                    action: 'wpbm_selected_taxonomy_terms',
                    beforeSend: function() {
                        // $(".wpbm-loader-preview").show();
                    }
                },
                type: "POST",
                success: function(response) {
                    if (tax_type == 'multiple-taxonomy') {
                        $(".wpbm-multiple-taxonomy-term").html(response);
                    } else if (tax_type == 'simple-taxonomy') {
                        $(".wpbm-simple-taxonomy-term").html(response);
//                    $(".wpbm-loader-preview").hide();
                    }
                }
            });
        });
        /*
         * Fetch list of terms for multiple taxonomy condition
         */
        $('body').on('change', '.wpbm-multiple-taxonomy', function() {
            var select_tax = $(this).val();
            var nam = $(this);
            //alert(select_tax);
            $.ajax({
                url: wpbm_backend_js_params.ajax_url,
                data: {
                    select_tax: select_tax,
                    _wpnonce: wpbm_backend_js_params.ajax_nonce,
                    action: 'wpbm_hierarchy_terms',
                    beforeSend: function() {
                        // $(".wpbm-loader-preview").show();
                    }
                },
                type: "POST",
                success: function(response) {

                    $(nam).closest('.wpbm-each-taxonomy-wrap').find(".wpbm-hierarchy-taxonomy-term").html(response);
                }
            });
        });

        /*
         * Insert meta condition for
         *  multiple custom field query
         */
        $('.wpbm-add-meta-query').click(function() {
            $.ajax({
                url: wpbm_backend_js_params.ajax_url,
                data: {
                    _wpnonce: wpbm_backend_js_params.ajax_nonce,
                    action: 'wpbm_add_meta_condition',
                    beforeSend: function() {
                        // $(".wpbm-loader-preview").show();
                    }
                },
                type: "POST",
                success: function(response) {
                    // alert(response);
                    $(".wpbm-custom-field-inner-wrap").append(response);
//                    $(".wpbm-loader-preview").hide();
                }
            });
        });
        /*
         * Insert multiple taxonomy condition
         */
        $('.wpbm-add-tax-condition').click(function() {
            var post_type = $('.wpbm-post-type').val();
            $.ajax({
                url: wpbm_backend_js_params.ajax_url,
                data: {
                    _wpnonce: wpbm_backend_js_params.ajax_nonce,
                    action: 'wpbm_add_tax_condition',
                    post_type: post_type

                },
                type: "POST",
                success: function(response) {
                    $(".wpbm-tax-inner-wrap").append(response);
                }
            });
        });

//radio button show and hide for post type's post
        $('.wpbm-select-post-type').click(function() {
            var value = $(this).val();
            if (value == 'single_post_type') {
                $('.wpbm-single-post-type-wrap').show();
                $('.wpbm-multiple-post-type-wrap').hide();
            } else {
                $('.wpbm-single-post-type-wrap').hide();
                $('.wpbm-multiple-post-type-wrap').show();
            }
        });
        //radio button show and hide for button link
        $('body').on('click', '.wpbm-select-post-link', function() {
            var value = $(this).val();
            if (value === 'post_link')
            {
                $(this).closest('.wpbm-blog-wrap').find('.wpbm-custom-link').hide();
            } else
            {
                $(this).closest('.wpbm-blog-wrap').find('.wpbm-custom-link').show();
            }
        });
        //show and hide for video type
        $('body').on('change', '.wpbm-video-type', function() {
            var value = $(this).val();
            if (value === 'youtube' || value === 'vimeo')
            {
                $(this).closest('.wpbm-blog-wrap').find('.wpbm-video-url-wrap').show();
                $(this).closest('.wpbm-blog-wrap').find('.wpbm-upload-video-wrap').hide();
            } else
            {
                $(this).closest('.wpbm-blog-wrap').find('.wpbm-video-url-wrap').hide();
                $(this).closest('.wpbm-blog-wrap').find('.wpbm-upload-video-wrap').show();
            }
        });

        var selected_video = $(".wpbm-video-type option:selected").val();
        if (selected_video === "html_video")
        {
            $(this).closest('.wpbm-blog-wrap').find('.wpbm-video-url-wrap').hide();
            $(this).closest('.wpbm-blog-wrap').find('.wpbm-upload-video-wrap').show();

        } else {
            $(this).closest('.wpbm-blog-wrap').find('.wpbm-video-url-wrap').show();
            $(this).closest('.wpbm-blog-wrap').find('.wpbm-upload-video-wrap').hide();

        }

        //show and hide for media type
        $('.wpbm-media-type').change(function() {
            var value = $(this).val();
            if (value === 'image')
            {
                $('.wpbm-post-image-wrap').show();
                $('.wpbm-post-image-wrap').show();
                $('.wpbm-post-slider-wrap').hide();
                $('.wpbm-post-video-wrap').hide();
                $('.wpbm-sound-cloud-wrap').hide();
            } else if (value === 'slider') {
                $('.wpbm-post-slider-wrap').show();
                $('.wpbm-post-video-wrap').hide();
                $('.wpbm-sound-cloud-wrap').hide();
                $('.wpbm-post-image-wrap').hide();
                $('.wpbm-post-image-wrap').hide();
            } else if (value === 'video')
            {
                $('.wpbm-post-slider-wrap').hide();
                $('.wpbm-post-video-wrap').show();
                $('.wpbm-sound-cloud-wrap').hide();
                $('.wpbm-post-image-wrap').hide();
                $('.wpbm-post-image-wrap').hide();
            } else {
                $('.wpbm-post-slider-wrap').hide();
                $('.wpbm-post-video-wrap').hide();
                $('.wpbm-sound-cloud-wrap').show();
                $('.wpbm-post-image-wrap').hide();
                $('.wpbm-post-image-wrap').hide();
            }

        });
        var media_type = $(".wpbm-media-type option:selected").val();
        if (media_type === 'image')
        {
            $('.wpbm-post-slider-wrap').hide();
            $('.wpbm-post-video-wrap').hide();
            $('.wpbm-sound-cloud-wrap').hide();
            $('.wpbm-post-image-wrap').show();
        } else if (media_type === 'slider') {
            $('.wpbm-post-slider-wrap').show();
            $('.wpbm-post-video-wrap').hide();
            $('.wpbm-sound-cloud-wrap').hide();
            $('.wpbm-post-image-wrap').hide();
        } else if (media_type === 'video')
        {
            $('.wpbm-post-slider-wrap').hide();
            $('.wpbm-post-video-wrap').show();
            $('.wpbm-sound-cloud-wrap').hide();
            $('.wpbm-post-image-wrap').hide();
        } else {
            $('.wpbm-post-slider-wrap').hide();
            $('.wpbm-post-video-wrap').hide();
            $('.wpbm-sound-cloud-wrap').show();
            $('.wpbm-post-image-wrap').hide();
        }

        /*
         * Upload Video
         */
        $('body').on('click', '.wpbm-upload-video-button', function(e) {
            e.preventDefault();
            var btnClicked = $(this);
            var video = wp.media({
                title: 'Insert Video',
                button: {text: 'Insert Video'},
                library: {type: 'video'},
                multiple: false
            }).open()
                    .on('select', function(e) {
                        var uploaded_video = video.state().get('selection').first();
                        console.log(uploaded_video);
                        var video_url = uploaded_video.toJSON().url;
                        $(btnClicked).closest('.wpbm-post-video-wrap').find('.wpbm-upload-video-button').attr('src', video_url);
                        $(btnClicked).closest('.wpbm-post-video-wrap').find('.wpbm-upload-url').val(video_url);
                    });
        });
        /*
         * Uplaod slider image
         */
        $('body').on('click', '.wpbm-upload-slider-button', function(e) {
            e.preventDefault();
            var btnClicked = $(this);
            var image = wp.media({
                title: 'Insert Slider Images',
                button: {text: 'Insert Slider Images'},
                library: {type: 'image'},
                multiple: "toggle"
            }).open()
                    .on('select', function() {
                        var uploaded_image = image.state().get('selection');
                        uploaded_image.map(function(attachment) {
                            attachment = attachment.toJSON();
                            var image_url = attachment.url;
                            //var post_key = $(btnClicked).closest('.wpbm-each-post-wrap').data('post-key');
                            var data = {
                                'action': 'wpbm_slider_images',
                                '_wpnonce': wpbm_backend_js_params.ajax_nonce,
                                'image_url': image_url

                            };
                            $.ajax({
                                url: wpbm_backend_js_params.ajax_url,
                                data: data,
                                type: "POST",
                                success: function(response) {
                                    $('.wpbm-slider-image-collection').append(response);
                                    $('.wpbm-slider-image-collection').sortable({
                                        handle: ".wpbm-sort-slider-image",
                                        containment: "parent"
                                    });
                                }
                            });
                        });
                    });
        });
        $('.wpbm-slider-image-collection').sortable({
            handle: ".wpbm-sort-slider-image",
            containment: "parent"
        });

        /*
         * Show && hide custom field query
         */
        $('.wpbm-custom-field-type').change(function() {

            if ($(this).val() === "single_field") {
                $(".wpbm-single-custom-wrapper").show();
                $(".wpbm-multiple-custom-field-wrap").hide();
            } else {
                $(".wpbm-multiple-custom-field-wrap").show();
                $(".wpbm-single-custom-wrapper").hide();
            }
        }
        );
        var selected_field = $(".wpbm-custom-field-type option:selected").val();
        if (selected_field === "single_field") {
            $(".wpbm-multiple-custom-field-wrap").hide();
            $(".wpbm-single-custom-wrapper").show();
        } else {
            $(".wpbm-multiple-custom-field-wrap").show();
            $(".wpbm-single-custom-wrapper").hide();
        }

        /*
         * Show && hide meta value type
         */
        $('.wpbm-meta-value-type').change(function() {
            if ($(this).val() === "string")
            {
                $('.wpbm-meta-value-wrap').show();
                $(".wpbm-meta-number-wrap").hide();
            } else {
                $(".wpbm-meta-number-wrap").show();
                $('.wpbm-meta-value-wrap').hide();
            }
        }
        );
        var selected_meta = $(".wpbm-meta-value-type option:selected").val();
        if (selected_meta === "string")
        {
            $('.wpbm-meta-value-wrap').show();
            $(".wpbm-meta-number-wrap").hide();
        } else {
            $(".wpbm-meta-number-wrap").show();
            $('.wpbm-meta-value-wrap').hide();
        }
        /*
         * Menu Tab
         */
        $('.wpbm-tab-tigger').click(function() {
            $('.wpbm-tab-tigger').removeClass('wpbm-active');
            $(this).addClass('wpbm-active');
            var active_tab_key = $('.wpbm-tab-tigger.wpbm-active').data('menu');
            $('.wpbm-settings-wrap').removeClass('wpbm-active-container');
            $('.wpbm-settings-wrap[data-menu-ref="' + active_tab_key + '"]').addClass('wpbm-active-container');
        });
        /*
         * Post Menu Tab
         */
        $('.wpbm-query-tigger').click(function() {
            $('.wpbm-query-tigger').removeClass('wpbm-query-active');
            $(this).addClass('wpbm-query-active');
            var active_post_key = $('.wpbm-query-tigger.wpbm-query-active').data('menu');
            $('.wpbm-query-setting-wrap').removeClass('wpbm-active-field');
            $('.wpbm-query-setting-wrap[data-menu-ref="' + active_post_key + '"]').addClass('wpbm-active-field');
        });
        /*
         * Usage Tab
         */
        $('.wpbm-usage-trigger').click(function() {
            $('.wpbm-usage-trigger').removeClass('wpbm-usage-active');
            $(this).addClass('wpbm-usage-active');
            var active_tab_key = $('.wpbm-usage-trigger.wpbm-usage-active').data('usage');
            $('.wpbm-usage-post').hide();
            $('.wpbm-usage-post[data-usage-ref="' + active_tab_key + '"]').show();
        });
        /*
         * Checked button for metadata
         */

        $('.wpbm-show-category').click(function() {
            if ($(this).is(':checked'))
            {
                $(this).val('1');
            } else
            {
                $(this).val('0');
            }
        });
        $('.wpbm-show-tag').click(function() {
            if ($(this).is(':checked'))
            {
                $(this).val('1');
            } else
            {
                $(this).val('0');
            }
        });
        $('.wpbm-show-author').click(function() {
            if ($(this).is(':checked'))
            {
                $(this).val('1');
            } else
            {
                $(this).val('0');
            }
        });
        $('.wpbm-show-comment').click(function() {
            if ($(this).is(':checked'))
            {
                $(this).val('1');
            } else
            {
                $(this).val('0');
            }
        });
        $('.wpbm-show-date').click(function() {
            if ($(this).is(':checked'))
            {
                $(this).val('1');
                $('.wpbm-date-wrapper').show();
            } else
            {
                $(this).val('0');
                $('.wpbm-date-wrapper').hide();
            }
        });
        $('.wpbm-show-read-more').click(function() {
            if ($(this).is(':checked'))
            {
                $(this).val('1');
                $('.wpbm-read-more-wrap').show();
            } else
            {
                $(this).val('0');
                $('.wpbm-read-more-wrap').hide();
            }
        });

        $('.wpbm-show-custom-relation').click(function() {
            if ($(this).is(':checked'))
            {
                $(this).val('1');
                $('.wpbm-relation-main-wrap').show();
            } else
            {
                $(this).val('0');
                $('.wpbm-relation-main-wrap').hide();
            }
        });
        $('.wpbm-show-taxonomy-relation').click(function() {
            if ($(this).is(':checked'))
            {
                $(this).val('1');
                $('.wpbm-taxonomy-main-wrap').show();
            } else
            {
                $(this).val('0');
                $('.wpbm-taxonomy-main-wrap').hide();
            }
        });
        $('.wpbm-display-filter').click(function() {
            if ($(this).is(':checked'))
            {
                $(this).val('1');
                $('.wpbm-filter-enable-wrap').show();
            } else
            {
                $(this).val('0');
                $('.wpbm-filter-enable-wrap').hide();
            }
        });
        $('.wpbm-display-pagination').click(function() {
            if ($(this).is(':checked'))
            {
                $(this).val('1');
                $('.wpbm-pagination-wrapper').show();
            } else
            {
                $(this).val('0');
                $('.wpbm-pagination-wrapper').hide();
            }
        });
        $('.wpbm-fetch-custom-field-post').click(function() {
            if ($(this).is(':checked'))
            {
                $(this).val('1');
                $('.wpbm-custom-field-wrapper').show();
            } else
            {
                $(this).val('0');
                $('.wpbm-custom-field-wrapper').hide();
            }
        });
        $('.wpbm-show-popular-relation').click(function() {
            if ($(this).is(':checked'))
            {
                $(this).val('1');
                $('.wpbm-popular-inner-wrap').show();
            } else
            {
                $(this).val('0');
                $('.wpbm-popular-inner-wrap').hide();
            }
        });
        $('.wpbm-show-keyword-relation').click(function() {
            if ($(this).is(':checked'))
            {
                $(this).val('1');
                $('.wpbm-keyword-inner-wrap').show();
            } else
            {
                $(this).val('0');
                $('.wpbm-keyword-inner-wrap').hide();
            }
        });
        $('body').on('click', '.wpbm-show-type-filter', function() {
            if ($(this).is(':checked'))
            {
                $(this).closest('.wpbm-post-field-wrap').find('.wpbm-show-type-filter').val('1');
                $(this).closest('.wpbm-post-field-wrap').find('.wpbm-type-filter-wrap').show();
            } else

            {
                $(this).closest('.wpbm-post-field-wrap').find('.wpbm-show-type-filter').val('0');
                $(this).closest('.wpbm-post-field-wrap').find('.wpbm-type-filter-wrap').hide();
            }

        });
        $('body').on('click', '.wpbm-show-operator', function() {
            if ($(this).is(':checked'))
            {
                $(this).closest('.wpbm-post-field-wrap').find('.wpbm-show-operator').val('1');
                $(this).closest('.wpbm-post-field-wrap').find('.wpbm-operator-inner-wrap').show();
            } else

            {
                $(this).closest('.wpbm-post-field-wrap').find('.wpbm-show-operator').val('0');
                $(this).closest('.wpbm-post-field-wrap').find('.wpbm-operator-inner-wrap').hide();
            }

        });
        /*
         *  Social media share checked value
         */

        $('.wpbm-show-facebook-share').click(function() {
            if ($(this).is(':checked'))
            {
                $('.wpbm-show-facebook-value').val('1');
            } else
            {
                $('.wpbm-show-facebook-value').val('0');
            }
        });
        $('.wpbm-show-twitter-share').click(function() {
            if ($(this).is(':checked'))
            {
                $('.wpbm-show-twitter-value').val('1');
            } else
            {
                $('.wpbm-show-twitter-value').val('0');
            }
        });
        $('.wpbm-show-google-share').click(function() {
            if ($(this).is(':checked'))
            {
                $('.wpbm-show-google-value').val('1');
            } else
            {
                $('.wpbm-show-google-value').val('0');
            }
        });
        $('.wpbm-show-linkedin-share').click(function() {
            if ($(this).is(':checked'))
            {
                $('.wpbm-show-linkedin-value').val('1');
            } else
            {
                $('.wpbm-show-linkedin-value').val('0');
            }
        });
        $('.wpbm-show-mail-share').click(function() {
            if ($(this).is(':checked'))
            {
                $('.wpbm-show-mail-value').val('1');
            } else
            {
                $('.wpbm-show-mail-value').val('0');
            }
        });

        /*
         * Show && hide layout settings
         */
        $('.wpbm-select-layout').change(function() {
            if ($(this).val() === "grid")
            {
                $('.wpbm-grid-setting-wrap').show();
                $('.wpbm-timeline-setting-wrap').hide();
                $('.wpbm-list-setting-wrap').hide();
                $('.wpbm-masonry-setting-wrap').hide();
                $('.wpbm-slider-setting-wrap').hide();
                $('.wpbm-carousel-setting-wrap').hide();
                $('.wpbm-content-block-setting').hide();
                $('.wpbm-slider-option-block').hide();

            } else if ($(this).val() === "timeline") {
                $('.wpbm-grid-setting-wrap').hide();
                $('.wpbm-timeline-setting-wrap').show();
                $('.wpbm-list-setting-wrap').hide();
                $('.wpbm-masonry-setting-wrap').hide();
                $('.wpbm-slider-setting-wrap').hide();
                $('.wpbm-carousel-setting-wrap').hide();
                $('.wpbm-content-block-setting').hide();
                $('.wpbm-slider-option-block').hide();

            } else if ($(this).val() === "list") {
                $('.wpbm-timeline-setting-wrap').hide();
                $('.wpbm-list-setting-wrap').show();
                $('.wpbm-masonry-setting-wrap').hide();
                $('.wpbm-slider-setting-wrap').hide();
                $('.wpbm-grid-setting-wrap').hide();
                $('.wpbm-carousel-setting-wrap').hide();
                $('.wpbm-content-block-setting').hide();
                $('.wpbm-slider-option-block').hide();
            } else if ($(this).val() === "masonry") {
                $('.wpbm-timeline-setting-wrap').hide();
                $('.wpbm-list-setting-wrap').hide();
                $('.wpbm-masonry-setting-wrap').show();
                $('.wpbm-slider-setting-wrap').hide();
                $('.wpbm-carousel-setting-wrap').hide();
                $('.wpbm-grid-setting-wrap').hide();
                $('.wpbm-content-block-setting').hide();
                $('.wpbm-slider-option-block').hide();
            } else if ($(this).val() === "carousel") {
                $('.wpbm-timeline-setting-wrap').hide();
                $('.wpbm-list-setting-wrap').hide();
                $('.wpbm-masonry-setting-wrap').hide();
                $('.wpbm-slider-setting-wrap').hide();
                $('.wpbm-carousel-setting-wrap').show();
                $('.wpbm-grid-setting-wrap').hide();
                $('.wpbm-content-block-setting').hide();
                $('.wpbm-slider-option-block').show();
            } else if ($(this).val() === "content-block") {
                $('.wpbm-timeline-setting-wrap').hide();
                $('.wpbm-list-setting-wrap').hide();
                $('.wpbm-masonry-setting-wrap').hide();
                $('.wpbm-slider-setting-wrap').hide();
                $('.wpbm-carousel-setting-wrap').hide();
                $('.wpbm-grid-setting-wrap').hide();
                $('.wpbm-content-block-setting').show();
                $('.wpbm-slider-option-block').hide();

            } else
            {
                $('.wpbm-timeline-setting-wrap').hide();
                $('.wpbm-list-setting-wrap').hide();
                $('.wpbm-masonry-setting-wrap').hide();
                $('.wpbm-slider-setting-wrap').show();
                $('.wpbm-grid-setting-wrap').hide();
                $('.wpbm-carousel-setting-wrap').hide();
                $('.wpbm-content-block-setting').hide();
                $('.wpbm-slider-option-block').show();
            }
        });
        var layout_type = $(".wpbm-select-layout option:selected").val();
        if (layout_type === "grid")
        {
            $('.wpbm-grid-setting-wrap').show();
            $('.wpbm-timeline-setting-wrap').hide();
            $('.wpbm-list-setting-wrap').hide();
            $('.wpbm-masonry-setting-wrap').hide();
            $('.wpbm-slider-setting-wrap').hide();
            $('.wpbm-carousel-setting-wrap').hide();
            $('.wpbm-content-block-setting').hide();
            $('.wpbm-slider-option-block').hide();

        } else if (layout_type === "timeline") {
            $('.wpbm-grid-setting-wrap').hide();
            $('.wpbm-timeline-setting-wrap').show();
            $('.wpbm-list-setting-wrap').hide();
            $('.wpbm-masonry-setting-wrap').hide();
            $('.wpbm-slider-setting-wrap').hide();
            $('.wpbm-carousel-setting-wrap').hide();
            $('.wpbm-content-block-setting').hide();
            $('.wpbm-slider-option-block').hide();

        } else if (layout_type === "list") {
            $('.wpbm-timeline-setting-wrap').hide();
            $('.wpbm-list-setting-wrap').show();
            $('.wpbm-masonry-setting-wrap').hide();
            $('.wpbm-slider-setting-wrap').hide();
            $('.wpbm-grid-setting-wrap').hide();
            $('.wpbm-carousel-setting-wrap').hide();
            $('.wpbm-content-block-setting').hide();
            $('.wpbm-slider-option-block').hide();
        } else if (layout_type === "masonry") {
            $('.wpbm-timeline-setting-wrap').hide();
            $('.wpbm-list-setting-wrap').hide();
            $('.wpbm-masonry-setting-wrap').show();
            $('.wpbm-slider-setting-wrap').hide();
            $('.wpbm-carousel-setting-wrap').hide();
            $('.wpbm-grid-setting-wrap').hide();
            $('.wpbm-content-block-setting').hide();
            $('.wpbm-slider-option-block').hide();

        } else if (layout_type === "carousel") {
            $('.wpbm-timeline-setting-wrap').hide();
            $('.wpbm-list-setting-wrap').hide();
            $('.wpbm-masonry-setting-wrap').hide();
            $('.wpbm-slider-setting-wrap').hide();
            $('.wpbm-grid-setting-wrap').hide();
            $('.wpbm-carousel-setting-wrap').show();
            $('.wpbm-content-block-setting').hide();
            $('.wpbm-slider-option-block').show();
        } else if (layout_type === "content-block") {
            $('.wpbm-timeline-setting-wrap').hide();
            $('.wpbm-list-setting-wrap').hide();
            $('.wpbm-masonry-setting-wrap').hide();
            $('.wpbm-slider-setting-wrap').hide();
            $('.wpbm-grid-setting-wrap').hide();
            $('.wpbm-carousel-setting-wrap').hide();
            $('.wpbm-content-block-setting').show();
            $('.wpbm-slider-option-block').hide();
        } else
        {
            $('.wpbm-timeline-setting-wrap').hide();
            $('.wpbm-list-setting-wrap').hide();
            $('.wpbm-masonry-setting-wrap').hide();
            $('.wpbm-slider-setting-wrap').show();
            $('.wpbm-grid-setting-wrap').hide();
            $('.wpbm-carousel-setting-wrap').hide();
            $('.wpbm-content-block-setting').hide();
            $('.wpbm-slider-option-block').show();
        }
        /*
         * Show && hide orderby meta keys
         */
        $('.wpbm-select-orderby').change(function() {
            if ($(this).val() === "meta_value" || $(this).val() === "meta_value_num")
            {
                $('.wpbm-orderby-meta-warp').show();
            } else {
                $('.wpbm-orderby-meta-warp').hide();
            }
        });
        var orderby_type = $(".wpbm-select-orderby option:selected").val();
        if (orderby_type === "meta_value" || orderby_type === "meta_value_num") {
            $('.wpbm-orderby-meta-warp').show();
        } else {
            $('.wpbm-orderby-meta-warp').hide();
        }
        /*
         * Show && hide taxonomy query  value type
         */
        $('.wpbm-img-design').change(function() {
            if ($(this).val() === "normal") {
                $('.wpbm-normal-list-wrap').show();
                $('.wpbm-circular-wrap').hide();
            } else {
                $('.wpbm-normal-list-wrap').hide();
                $('.wpbm-circular-wrap').show();
            }

        });
        var design_type = $(".wpbm-img-design option:selected").val();
        if (design_type === "normal") {
            $('.wpbm-normal-list-wrap').show();
            $('.wpbm-circular-wrap').hide();
        } else {
            $('.wpbm-normal-list-wrap').hide();
            $('.wpbm-circular-wrap').show();
        }
        /*
         * Show && hide taxonomy query  value type
         */
        $('.wpbm-taxonomy-queries-type').change(function() {
            if ($(this).val() === "simple-taxonomy") {
                $('.wpbm-select-taxonomy').val('select');
                $('.wpbm-terms-wrap').show();
                $('.wpbm-multiple-terms-wrap').hide();
                $('.wpbm-simple-terms-wrap').show();
            } else {
                $('.wpbm-select-taxonomy').val('select');
                $('.wpbm-terms-wrap').show();
                $('.wpbm-multiple-terms-wrap').show();
                $('.wpbm-simple-terms-wrap').hide();
            }

        });
        var query_type = $(".wpbm-taxonomy-queries-type option:selected").val();
        if (query_type === "simple-taxonomy") {
            $('.wpbm-terms-wrap').show();
            $('.wpbm-multiple-terms-wrap').hide();
            $('.wpbm-simple-terms-wrap').show();
        } else {
            $('.wpbm-terms-wrap').show();
            $('.wpbm-multiple-terms-wrap').show();
            $('.wpbm-simple-terms-wrap').hide();
        }

        /**
         * blog query remove
         *
         */

        $('body').on('click', '.wpbm-delete-query', function() {
            var delete_term = confirm('Are you sure you want to delete this taxonomy condition?');
            if (delete_term) {
                $(this).closest('.wpbm-each-taxonomy-wrap').fadeOut(500, function() {
                    $(this).remove();
                });
            }
        });
        $('body').on('click', '.wpbm-delete-meta-query', function() {
            var delete_term = confirm('Are you sure you want to delete this meta condition?');
            if (delete_term) {
                $(this).closest('.wpbm-each-meta-container-wrap').fadeOut(500, function() {
                    $(this).remove();
                });
            }
        });

        $('body').on('click', '.wpbm-multiple-meta-keys', function() {
            var value = $(this).val();
            if (value === 'pre-available') {
                $(this).closest('.wpbm-post-field-wrap').find('.wpbm-pre-multiple-key-wrap').show();
                $(this).closest('.wpbm-post-field-wrap').find('.wpbm-multiple-other-key-wrap').hide();
            } else {
                $(this).closest('.wpbm-post-field-wrap').find('.wpbm-pre-multiple-key-wrap').hide();
                $(this).closest('.wpbm-post-field-wrap').find('.wpbm-multiple-other-key-wrap').show();
            }
        });

        //radio button show and hide for meta keys
        $('.wpbm-meta-key-type').click(function() {
            var value = $(this).val();
            if (value === 'pre-available') {
                $('.wpbm-pre-meta-key-wrap').show();
                $('.wpbm-other-meta-wrap').hide();
            } else {
                $('.wpbm-pre-meta-key-wrap').hide();
                $('.wpbm-other-meta-wrap').show();
            }
        });
        //radio button show and hide for meta keys
        $('.wpbm-post-content').click(function() {
            var value = $(this).val();
            if (value === 'full-text') {
                $('.wpbm-excerpt-wrap').hide();
            } else {
                $('.wpbm-excerpt-wrap').show();
            }
        });
        //radio button show and hide for filter terms
        $('.wpbm-filter-terms-type').click(function() {
            var value = $(this).val();
            if (value === 'all') {
                $('.wpbm-specific-wrap').hide();
            } else {
                $('.wpbm-specific-wrap').show();
            }
        });
        //ajax call in post type thickbox
        $('.wpbm-filter-taxonomy').on('change', function() {
            var select_type = $(this).val();
            var term_type = $('.wpbm-filter-terms-type:checked').val();
            $.ajax({
                url: wpbm_backend_js_params.ajax_url,
                data: {
                    select_type: select_type,
                    //  term_type: term_type,
                    _wpnonce: wpbm_backend_js_params.ajax_nonce,
                    action: 'wpbm_filter_tax_terms'
//                    beforeSend: function() {
//                        $(".wp1s-post-loader-preview").show();
//                    },
                },
                type: "POST",
                success: function(response) {
                    //alert(response);
                    if (term_type == 'specific') {
                        $(".wpbm-specific-wrap").html(response);
                    } else {

                    }

                }
            });
        });


        /**
         * Jquery UI Slider initialization
         *
         * @since 1.0.0
         */

        $('.wpbm-grid-column').each(function() {
            var $selector = $(this);
            var min = $(this).data('min');
            var max = $(this).data('max');
            var value = $(this).data('value');
            $(this).slider({
                range: 'min',
                min: min,
                max: max,
                value: value,
                slide: function(event, ui) {
                    $selector.parent().find('input[type="number"]').val(ui.value);
                    console.log(event);
                    console.log(ui);
                }
            });
        });

//radio button show and hide for post type's post
        $('.wpbm-post-link').click(function() {
            var value = $(this).val();
            if (value == 'post_link') {
                $('.wpbm-custom-link-wrap').hide();
            } else {
                $('.wpbm-custom-link-wrap').show();
            }
        });


        /*
         * Show and hide timeline template
         */
        $('.wpbm-timeline-layout').change(function() {
            if ($(this).val() === "vertical") {
                $('.wpbm-vertical-wrap').show();
                $('.wpbm-horizontal-wrap').hide();

            } else if ($(this).val() === "horizontal") {
                $('.wpbm-vertical-wrap').hide();
                $('.wpbm-horizontal-wrap').show();

            } else if ($(this).val() === "left") {
                $('.wpbm-vertical-wrap').hide();
                $('.wpbm-horizontal-wrap').hide();

            } else {
                $('.wpbm-vertical-wrap').hide();
                $('.wpbm-horizontal-wrap').hide();

            }
        });
        var timeline_type = $(".wpbm-timeline-layout option:selected").val();
        if (timeline_type === "vertical") {
            $('.wpbm-vertical-wrap').show();
            $('.wpbm-horizontal-wrap').hide();

        } else if (timeline_type === "horizontal") {
            $('.wpbm-vertical-wrap').hide();
            $('.wpbm-horizontal-wrap').show();

        } else if (timeline_type === "left") {
            $('.wpbm-vertical-wrap').hide();
            $('.wpbm-horizontal-wrap').hide();

        } else {
            $('.wpbm-vertical-wrap').hide();
            $('.wpbm-horizontal-wrap').hide();

        }

        $('.wpbm-show-social-share').click(function() {
            if ($(this).is(':checked'))
            {
                $(this).val('1');
                $('.wpbm-social-container').show();
            } else
            {
                $(this).val('0');
                $('.wpbm-social-container').hide();
            }
        });
        $('.wpbm-show-facebook-share').click(function() {
            if ($(this).is(':checked'))
            {
                $(this).val('1');
            } else
            {
                $(this).val('0');
            }
        });
        $('.wpbm-show-twitter-share').click(function() {
            if ($(this).is(':checked'))
            {
                $(this).val('1');
            } else
            {
                $(this).val('0');
            }
        });
        $('.wpbm-show-google-share').click(function() {
            if ($(this).is(':checked'))
            {
                $(this).val('1');
            } else
            {
                $(this).val('0');
            }
        });
        $('.wpbm-show-linkedin-share').click(function() {
            if ($(this).is(':checked'))
            {
                $(this).val('1');
            } else
            {
                $(this).val('0');
            }
        });
        $('.wpbm-show-mail-share').click(function() {
            if ($(this).is(':checked'))
            {
                $(this).val('1');
            } else
            {
                $(this).val('0');
            }
        });
        $('.wpbm-show-pinterest-share').click(function() {
            if ($(this).is(':checked'))
            {
                $(this).val('1');
            } else
            {
                $(this).val('0');
            }
        });
        $('.wpbm-select-pagination').change(function() {
            if ($(this).val() === "standard_pagination") {
                $('.wpbm-standard-page-block').show();
                $('.wpbm-load-setting-block').hide();
                $('.wpbm-loader-block').hide();

            } else if ($(this).val() === "load_more_button") {
                $('.wpbm-standard-page-block').hide();
                $('.wpbm-load-setting-block').show();
                $('.wpbm-loader-block').show();

            } else {
                $('.wpbm-standard-page-block').hide();
                $('.wpbm-load-setting-block').hide();
                $('.wpbm-loader-block').show();
            }
        });

        var pagination_type = $(".wpbm-select-pagination option:selected").val();
        if (pagination_type === "standard_pagination") {
            $('.wpbm-standard-page-block').show();
            $('.wpbm-load-setting-block').hide();
            $('.wpbm-loader-block').hide();
        } else if (pagination_type === "load_more_button") {
            $('.wpbm-standard-page-block').hide();
            $('.wpbm-load-setting-block').show();
            $('.wpbm-loader-block').show();
        } else {
            $('.wpbm-standard-page-block').hide();
            $('.wpbm-load-setting-block').hide();
            $('.wpbm-loader-block').show();
        }

        /**
         * logo Item Remove
         *
         */

        $('body').on('click', '.wpbm-delete-slider-image', function() {
            var delete_image = confirm('Are you sure you want to delete this image?');
            if (delete_image) {
                $(this).closest('.wpbm-slider-wrap').fadeOut(500, function() {
                    $(this).remove();
                });
            }
        });
        /*
         * Slide Content show & hide
         */
        $('.wpbm-content-template').change(function() {
            if ($(this).val() === "template-5" || $(this).val() === "template-9")
            {
                $('.wpbm-content-slides-container').hide();
            } else {
                $('.wpbm-content-slides-container').show();
            }
        });
        var template_type = $(".wpbm-content-template option:selected").val();
        if (template_type === "template-5" || template_type === "template-9") {
            $('.wpbm-content-slides-container').hide();
        } else {
            $('.wpbm-content-slides-container').show();
        }
        /*
         * Template preview
         */
        //grid template preview
        $(".wpbm-grid-common").first().addClass("grid-active");
        $('.wpbm-grid-template').on('change', function() {
            var template_value = $(this).val();
            var array_break = template_value.split('-');
            var current_id = array_break[1];
            $('.wpbm-grid-common').hide();
            $('#wpbm-grid-demo-' + current_id).show();
        });
        if ($(".wpbm-grid-template option:selected").length > 0) {
            var grid_view = $(".wpbm-grid-template option:selected").val();
            var array_break = grid_view.split('-');
            var current_id1 = array_break[1];
            $('.wpbm-grid-common').hide();
            $('#wpbm-grid-demo-' + current_id1).show();
        }

        //vertical timeline preview
        $(".wpbm-vertical-timeline-common").first().addClass("vertical-active");
        $('.wpbm-vertical-template').on('change', function() {
            var template_value = $(this).val();
            var array_break = template_value.split('-');
            var current_id = array_break[1];
            $('.wpbm-vertical-timeline-common').hide();
            $('#wpbm-vertical-timeline-demo-' + current_id).show();
        });
        if ($(".wpbm-vertical-template option:selected").length > 0) {
            var grid_view = $(".wpbm-vertical-template option:selected").val();
            var array_break = grid_view.split('-');
            var current_id1 = array_break[1];
            $('.wpbm-vertical-timeline-common').hide();
            $('#wpbm-vertical-timeline-demo-' + current_id1).show();
        }

        //horizontal timeline preview
        $(".wpbm-horizontal-timeline-common").first().addClass("horizontal-active");
        $('.wpbm-horizontal-template').on('change', function() {
            var template_value = $(this).val();
            var array_break = template_value.split('-');
            var current_id = array_break[1];
            $('.wpbm-horizontal-timeline-common').hide();
            $('#wpbm-horizontal-timeline-demo-' + current_id).show();
        });
        if ($(".wpbm-horizontal-template option:selected").length > 0) {
            var grid_view = $(".wpbm-horizontal-template option:selected").val();
            var array_break = grid_view.split('-');
            var current_id1 = array_break[1];
            $('.wpbm-horizontal-timeline-common').hide();
            $('#wpbm-horizontal-timeline-demo-' + current_id1).show();
        }

        //list preview
        $(".wpbm-list-common").first().addClass("list-active");
        $('.wpbm-list-template').on('change', function() {
            var template_value = $(this).val();
            var array_break = template_value.split('-');
            var current_id = array_break[1];
            $('.wpbm-list-common').hide();
            $('#wpbm-list-demo-' + current_id).show();
        });
        if ($(".wpbm-list-template option:selected").length > 0) {
            var grid_view = $(".wpbm-list-template option:selected").val();
            var array_break = grid_view.split('-');
            var current_id1 = array_break[1];
            $('.wpbm-list-common').hide();
            $('#wpbm-list-demo-' + current_id1).show();
        }

        //list circular preview
        $(".wpbm-list-circular-common").first().addClass("list-circular-active");
        $('.wpbm-list-circular-template').on('change', function() {
            var template_value = $(this).val();
            var array_break = template_value.split('-');
            var current_id = array_break[1];
            $('.wpbm-list-circular-common').hide();
            $('#wpbm-list-circular-demo-' + current_id).show();
        });
        if ($(".wpbm-list-circular-template option:selected").length > 0) {
            var list_view = $(".wpbm-list-circular-template option:selected").val();
            var array_break = list_view.split('-');
            var current_id1 = array_break[1];
            $('.wpbm-list-circular-common').hide();
            $('#wpbm-list-circular-demo-' + current_id1).show();
        }

        //Masonry preview
        $(".wpbm-masonry-common").first().addClass("masonry-active");
        $('.wpbm-masonry-template').on('change', function() {
            var template_value = $(this).val();
            var array_break = template_value.split('-');
            var current_id = array_break[1];
            $('.wpbm-masonry-common').hide();
            $('#wpbm-masonry-demo-' + current_id).show();
        });
        if ($(".wpbm-masonry-template option:selected").length > 0) {
            var list_view = $(".wpbm-masonry-template option:selected").val();
            var array_break = list_view.split('-');
            var current_id1 = array_break[1];
            $('.wpbm-masonry-common').hide();
            $('#wpbm-masonry-demo-' + current_id1).show();
        }

        //Slider preview
        $(".wpbm-slider-common").first().addClass("slider-active");
        $('.wpbm-slider-template').on('change', function() {
            var template_value = $(this).val();
            var array_break = template_value.split('-');
            var current_id = array_break[1];
            $('.wpbm-slider-common').hide();
            $('#wpbm-slider-demo-' + current_id).show();
        });
        if ($(".wpbm-slider-template option:selected").length > 0) {
            var list_view = $(".wpbm-slider-template option:selected").val();
            var array_break = list_view.split('-');
            var current_id1 = array_break[1];
            $('.wpbm-slider-common').hide();
            $('#wpbm-slider-demo-' + current_id1).show();
        }

        //Carousel preview
        $(".wpbm-carousel-common").first().addClass("carousel-active");
        $('.wpbm-carousel-template').on('change', function() {
            var template_value = $(this).val();
            var array_break = template_value.split('-');
            var current_id = array_break[1];
            $('.wpbm-carousel-common').hide();
            $('#wpbm-carousel-demo-' + current_id).show();
        });
        if ($(".wpbm-carousel-template option:selected").length > 0) {
            var carousel_view = $(".wpbm-carousel-template option:selected").val();
            var array_break = carousel_view.split('-');
            var current_id1 = array_break[1];
            $('.wpbm-carousel-common').hide();
            $('#wpbm-carousel-demo-' + current_id1).show();
        }

        //Content block preview
        $(".wpbm-content-block-common").first().addClass("content-block-active");
        $('.wpbm-content-template').on('change', function() {
            var template_value = $(this).val();
            var array_break = template_value.split('-');
            var current_id = array_break[1];
            $('.wpbm-content-block-common').hide();
            $('#wpbm-content-block-demo-' + current_id).show();
        });
        if ($(".wpbm-content-template option:selected").length > 0) {
            var carousel_view = $(".wpbm-content-template option:selected").val();
            var array_break = carousel_view.split('-');
            var current_id1 = array_break[1];
            $('.wpbm-content-block-common').hide();
            $('#wpbm-content-block-demo-' + current_id1).show();
        }

        //Standard pagination preview
        $(".wpbm-standard-pagination-common").first().addClass("standard-pagination-active");
        $('.wpbm-standard-template').on('change', function() {
            var template_value = $(this).val();
            var array_break = template_value.split('-');
            var current_id = array_break[1];
            $('.wpbm-standard-pagination-common').hide();
            $('#wpbm-standard-pagination-demo-' + current_id).show();
        });
        if ($(".wpbm-standard-template option:selected").length > 0) {
            var carousel_view = $(".wpbm-standard-template option:selected").val();
            var array_break = carousel_view.split('-');
            var current_id1 = array_break[1];
            $('.wpbm-standard-pagination-common').hide();
            $('#wpbm-standard-pagination-demo-' + current_id1).show();
        }

        //Load more pagination preview
        $(".wpbm-load-more-common").first().addClass("load-active");
        $('.wpbm-load-more-template').on('change', function() {
            var template_value = $(this).val();
            var array_break = template_value.split('-');
            var current_id = array_break[1];
            $('.wpbm-load-more-common').hide();
            $('#wpbm-load-more-demo-' + current_id).show();
        });
        if ($(".wpbm-load-more-template option:selected").length > 0) {
            var carousel_view = $(".wpbm-load-more-template option:selected").val();
            var array_break = carousel_view.split('-');
            var current_id1 = array_break[1];
            $('.wpbm-load-more-common').hide();
            $('#wpbm-load-more-demo-' + current_id1).show();
        }

        //Filter preview
        $(".wpbm-filter-common").first().addClass("filter-active");
        $('.wpbm-filter-template').on('change', function() {
            var template_value = $(this).val();
            var array_break = template_value.split('-');
            var current_id = array_break[1];
            $('.wpbm-filter-common').hide();
            $('#wpbm-filter-demo-' + current_id).show();
        });
        if ($(".wpbm-filter-template option:selected").length > 0) {
            var carousel_view = $(".wpbm-filter-template option:selected").val();
            var array_break = carousel_view.split('-');
            var current_id1 = array_break[1];
            $('.wpbm-filter-common').hide();
            $('#wpbm-filter-demo-' + current_id1).show();
        }

        //Show and Hide SoundCloud

        $('.wpbm-audio-type').change(function() {
            var value = $(this).val();
            if (value === 'client-id')
            {
                $('.wpbm-client-wrapper').show();
                $('.wpbm-track-wrapper').hide();

            } else {
                $('.wpbm-track-wrapper').show();
                $('.wpbm-client-wrapper').hide();

            }

        });
        var audio_type = $(".wpbm-audio-type option:selected").val();

        if (audio_type === 'client-id')
        {
            $('.wpbm-client-wrapper').show();
            $('.wpbm-track-wrapper').hide();

        } else {
            $('.wpbm-track-wrapper').show();
            $('.wpbm-client-wrapper').hide();

        }

        $('.wpbm-display-content').click(function() {
            if ($(this).is(':checked'))
            {
                $(this).val('1');
                $('.wpbm-content-container-wrap').show();
            } else
            {
                $(this).val('0');
                $('.wpbm-content-container-wrap').hide();
            }
        });
    });
}(jQuery));
