jQuery(document).ready(function($) {

    var wpbmScreenWidth = $(window).width();
    $(window).resize(function() {
        wpbmScreenWidth = $(window).width();
    });

    if (wpbmScreenWidth <= 740) {
        for (i = 1; i <= 4; i++) {
            if ($('.wpbm-main-blog-wrapper').hasClass('wpbm-desktop-col-' + i + '')) {

                $('.wpbm-main-blog-wrapper').removeClass('wpbm-desktop-col-' + i + '');
            }
        }
        for (i = 1; i <= 3; i++) {
            if ($('.wpbm-main-blog-wrapper').hasClass('wpbm-tablet-col-' + i + '')) {

                $('.wpbm-main-blog-wrapper').removeClass('wpbm-tablet-col-' + i + '');
            }
        }

    }

    $('body').on('click', '.wpbm-share-outer-wrap', function() {
        $(this).closest('.wpbm-bottom-wrap').find('.wpbm-share-wrap').slideToggle("slow");

    });
    //for horizontal slide of logo
    var wpbm_carousel = {};
    $('.wpbm-car-outer-wrap').each(function() {
        var id = $(this).data('id');
        var column = $(this).data('column');
        var controls = $(this).data('controls');
        var auto = $(this).data('auto');
        var speed = $(this).data('speed');
        var pager = $(this).data('pager');
        var template = $(this).data('template');

        if (template === 'template-8') {
            var item_number = '2';
            var center_class = true;
            var margin = 15;

        } else if (template === 'template-10') {
            var item_number = '2';
            var center_class = true;
            var margin = 1;
        } else if (template === 'template-1' || template === 'template-4') {
            var item_number = column;
            var center_class = true;
            var margin = 15;
        } else {
            var item_number = column;
            var center_class = false;
            var margin = 15;
        }
        if (template === 'template-4') {
            var nav_type = [
                '<i class="fa fa-reply" aria-hidden="true"></i>',
                '<i class="fa fa-share" aria-hidden="true"></i>'
            ];
        } else {
            var nav_type = [
                '<i class="fa fa-angle-left" aria-hidden="true"></i>',
                '<i class="fa fa-angle-right" aria-hidden="true"></i>'
            ];
        }
        wpbm_carousel.id = $(this).owlCarousel({
            center: center_class,
            items: 1,
            loop: true,
            margin: margin,
            nav: controls,
            dots: pager,
            dotsEach: pager,
            navText: nav_type,
            autoplay: false,
            autoplayHoverPause: true,
            autoplayTimeout: speed,
            responsiveClass: true,
            rewindNav: false,
            itemClass: 'wpbm-owl-item',
            responsive: {
                1024: {
                    items: item_number
                },
                768: {
                    items: 2
                },
                0: {
                    items: 1,
                    center: false,
                    nav: false,
                    dots: false

                },
                480: {
                    items: 1,
                    center: false,
                    nav: false,
                    dots: false

                },

                740: {
                    items: 2,
                    center: false,
                    nav: false,
                    dots: false
                }
            }
        });
        if (template === 'template-2') {
            var i = 1;
            $('.wpbm-car-outer-wrap[data-id=' + id + '] .owl-dot').each(function() {
                $(this).text(i);
                i++;
            });
        }
    });
    //for slider of logo
    var wpbm_slider = {};
    $('.wpbm-slider-wrapper').each(function() {
        var id = $(this).data('id');
        var controls = $(this).data('controls');
        var auto = $(this).data('auto');
        var speed = $(this).data('speed');
        // var pause = $(this).data('pause');
        var pager = $(this).data('pager');
        var template = $(this).data('template');
        if (template === 'template-2') {
            var items = '1.3';
            var margin = 10;
            var center_class = 'true';
        } else {
            items = '1';
            var margin = 0;
            var center_class = 'false';
        }
        var nav_type = [
            '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            '<i class="fa fa-angle-right" aria-hidden="true"></i>'
        ];
        wpbm_slider.id = $(this).owlCarousel({
            center: center_class,
            items: 1,
            loop: true,
            nav: controls,
            margin: margin,
            dots: pager,
            dotsEach: pager,
            navText: nav_type,
            autoplay: false,
            autoplayHoverPause: true,
            autoplayTimeout: speed,
            responsiveClass: true,
            rewindNav: false,
            itemClass: 'wpbm-owl-item',
            responsive: {
                1024: {
                    items: items
                },
                768: {
                    items: items
                },
                0: {
                    items: 1,
                    center: false,
                    nav: false,
                    dots: false

                },
                480: {
                    items: 1,
                    center: false,
                    nav: false,
                    dots: false

                },
                481: {
                    items: 1,
                    center: false,
                    nav: false,
                    dots: false

                },
                740: {
                    items: items,
                    center: false,
                    nav: false,
                    dots: false
                }
            }
        });
    });
    //for slider of logo
    var wpbm_extra_slider = [];
    $(".wpbm-extra-slider-wrap").each(function() {
        var id = $(this).data('id');
        var next_text = '<i class="fa fa-angle-right" aria-hidden="true"></i>';
        var pre_text = '<i class="fa fa-angle-left" aria-hidden="true"></i>';
        wpbm_extra_slider[id] = $(this).bxSlider({
            auto: false,
            control: true,
            pager: true,
            infiniteLoop: true,
            nextText: next_text,
            prevText: pre_text

        });
    });


    /*
     *
     * @Horizontal timeline implementation
     */
    var wpbm_slider = [];
    var wpbm_timeline = [];
    $('.wpbm-timeline-post-wrapper').each(function() {
        var selector = $(this);
        var id = $(this).data('id');
        var next_text = '<i class="fa fa-arrow-right" aria-hidden="true"></i>';
        var pre_text = '<i class="fa fa-arrow-left" aria-hidden="true"></i>';
        wpbm_slider[id] = $(this).bxSlider({
            auto: false,
            pagerCustom: '#wpbm-timeline-' + id,
            useCSS: false,
            nextText: next_text,
            prevText: pre_text,
            pager: 'true',
            infiniteLoop: true,
            onSliderLoad: function(newIndex) {
                selector.closest('.wpbm-horizontal-timeline').find('.wpbm-active').removeClass("wpbm-active");
                selector.closest('.wpbm-horizontal-timeline').find('li a[data-slide-index="' + newIndex + '"]').addClass("wpbm-active");
            },
            onSlideBefore: function($slideElement, oldIndex, newIndex) {
                selector.closest('.wpbm-horizontal-timeline').find('.wpbm-active').removeClass("wpbm-active");
                selector.closest('.wpbm-horizontal-timeline').find('li a[data-slide-index="' + newIndex + '"]').addClass("wpbm-active");
                var slider = wpbm_timeline[id];
                if (slider.getSlideCount() - newIndex >= count)
                    slider.goToSlide(newIndex);
                else
                    slider.goToSlide(slider.getSlideCount() - count);
            }


        });
    });
    var count = 0;
    $(".wpbm-hor-timeline-date").each(function() {
        var id = $(this).data('id');

        wpbm_timeline[id] = $(this).bxSlider({
            minSlides: 1,
            maxSlides: 3,
            slideWidth: 350,
            moveSlides: 1,
            auto: false,
            pager: false,
            infiniteLoop: true,
            controls: false

        });
    });
    var wpbm_timeline_one = [];
    $(".wpbm-timeline-one").each(function() {
        var id = $(this).data('id');
        var next_text = '<i class="fa fa-angle-right" aria-hidden="true"></i>';
        var pre_text = '<i class="fa fa-angle-left" aria-hidden="true"></i>';
        wpbm_timeline_one[id] = $(this).bxSlider({
            minSlides: 1,
            maxSlides: 3,
            slideWidth: 360,
            moveSlides: 1,
            auto: false,
            pager: false,
            infiniteLoop: true,
            nextText: next_text,
            prevText: pre_text

        });
    });
    /*
     * Pagination
     */

    /*
     * Builds Pagination Links
     *
     * @param {int} current_page
     * @param {int} total_page
     * @param {int} gallery_id
     * @param {string} layout_type
     * @return {string}
     */
    function wpbm_build_pagination_html(current_page, total_page, post_id, layout_type, next_arrow, prev_arrow) {
        var pagination_html = '';
        if (current_page > 1) {
            pagination_html += '<li class="wpbm-previous-page-wrap"><a href="javascript:void(0);" class="wpbm-previous-page" data-total-page="' + total_page + '" data-layout-type="' + layout_type + '" data-post-id="' + post_id + '"  data-prev-arrow="' + prev_arrow + '" data-next-arrow="' + next_arrow + '">' + prev_arrow + '</a></li>';
        }
        var upper_limit = current_page + 2;
        var lower_limit = current_page - 2;
        if (upper_limit > total_page) {
            upper_limit = total_page;
        }

        if (lower_limit < 1) {
            lower_limit = 1;
        }
        if (upper_limit - lower_limit < 5 && upper_limit - 4 >= 1) {
            lower_limit = upper_limit - 4;
        }
        if (upper_limit < 5 && total_page >= 5) {
            upper_limit = 5;
        }

        for (var page_count = lower_limit; page_count <= upper_limit; page_count++) {
            var page_class = (current_page === page_count) ? 'wpbm-current-page wpbm-page-link' : 'wpbm-page-link';
            pagination_html += '<li><a href="javascript:void(0);" data-total-page="' + total_page + '" data-page-number="' + page_count + '" class="' + page_class + '" data-layout-type="' + layout_type + '" data-post-id="' + post_id + '" data-prev-arrow="' + prev_arrow + '" data-next-arrow="' + next_arrow + '">' + page_count + '</a></li>';
        }
        if (current_page < total_page) {
            pagination_html += '<li class="wpbm-next-page-wrap"><a href="javascript:void(0);" data-total-page="' + total_page + '" class="wpbm-next-page" data-layout-type="' + layout_type + '" data-post-id="' + post_id + '" data-prev-arrow="' + prev_arrow + '" data-next-arrow="' + next_arrow + '">' + next_arrow + '</a></li>';
        }
        return pagination_html;
    }

    $('body').on('click', '.wpbm-page-link', function() {
        var selector = $(this);
        selector.closest('.wpbm-pagination-block').find('.wpbm-page-link').removeClass('wpbm-current-page');
        $(this).addClass('wpbm-current-page');
        var layout_type = $(this).data('layout-type');
        var page_num = $(this).data('page-number');
        var post_id = $(this).data('post-id');
        var total_page = $(this).data('total-page');
        var next_arrow = $(this).data('next-arrow');
        var prev_arrow = $(this).data('prev-arrow');
        $.ajax({
            type: 'post',
            url: wpbm_frontend_js_params.ajax_url,
            data: {
                action: 'wpbm_pagination_action',
                _wpnonce: wpbm_frontend_js_params.ajax_nonce,
                layout_type: layout_type,
                page_num: page_num,
                total_page: total_page,
                post_id: post_id,
                next_arrow: next_arrow,
                prev_arrow: prev_arrow

            },
            beforeSend: function(xhr) {
                selector.closest('.wpbm-pagination-block').find('.wpbm-ajax-loader').show();
            },
            success: function(response) {
                if (selector.closest('.wpbm-main-blog-wrapper').find('.wpbm-filter-wrap').length > 0) {
                    selector.closest('.wpbm-main-blog-wrapper').find('.wpbm-filter-trigger[data-filter-key="wpbm-filter-all"]').click();
                }

                selector.closest('.wpbm-pagination-block').find('.wpbm-ajax-loader').hide();
                if (layout_type === 'masonry') {
                    var masonary_id = selector.closest('.wpbm-masonry-wrapper').find('.wpbm-masonry-item-wrap').data('masonary-id');
                    //wpbm_masonary_obj[masonary_id].isotope('destroy');
//                    selector.closest('.wpbm-main-blog-wrapper').find('.wpbm-layout-' + layout_type + '-section').html(response);
//                    selector.closest('.wpbm-main-blog-wrapper').find('.wpbm-layout-' + layout_type + '-section').imagesLoaded(function() {
//                        $('.wpbm-masonry-item-wrap').isotope({
//                            itemSelector: '.wpbm-masonry-item',
//                            percentPosition: true,
//                            masonry: {
//                                columnWidth: '.wpbm-masonry-sizer',
//                                horizontalOrder: true,
//                                gutter: 0
//
//                            }
//                        });
//                    });
                    var $items = $(response);
                    //alert($items);
                    wpbm_masonary_obj[masonary_id].html($items);
                    wpbm_masonary_obj[masonary_id].imagesLoaded(function() {
                    })
                            .done(function(instance) {
                                console.log('all images successfully loaded');
                                selector.closest('.ap_pagination').find('.ap_wait_loader').hide();
                                selector.show();
                                wpbm_masonary_obj[masonary_id].isotope('reloadItems').isotope();
                            })
                            .fail(function() {
                                console.log('all images loaded, at least one is broken');


                                wpbm_masonary_obj[masonary_id].isotope('reloadItems').isotope();
                            })
                            .progress(function(instance, image) {
                            });

                } else if (layout_type === 'timeline') {
                    selector.closest('.wpbm-main-blog-wrapper').find('.wpbm-layout-' + layout_type + '-section .wpbm-blog-cover').html(response);

                } else {
                    selector.closest('.wpbm-main-blog-wrapper').find('.wpbm-layout-' + layout_type + '-section').html(response);

                }
                $('html, body').animate({
                    scrollTop: selector.closest('.wpbm-main-blog-wrapper').find('.wpbm-layout-' + layout_type + '-section').offset().top - 200 //this will keep content positioned correctly, but you shouldn't need both a '+ 200' and '- 200' here. Adjust this value as needed.
                }, 900);

                var pagination_html = wpbm_build_pagination_html(page_num, total_page, post_id, layout_type, next_arrow, prev_arrow);
                selector.closest('.wpbm-main-blog-wrapper').find('.wpbm-pagination-block ul').html(pagination_html);

            }
        });
    });

    /**
     * Next Page Pagination
     *
     * @since 1.0.0
     */
    $('body').on('click', '.wpbm-next-page,.wpbm-previous-page', function() {
        var selector = $(this);
        var layout_type = $(this).data('layout-type');
        var post_id = $(this).data('post-id');
        var total_page = $(this).data('total-page');
        var current_page = $(this).closest('.wpbm-pagination-block').find('.wpbm-current-page').data('page-number');
        var next_page = parseInt(current_page) + 1;
        var previous_page = parseInt(current_page) - 1;
        var next_arrow = $(this).data('next-arrow');
        var prev_arrow = $(this).data('prev-arrow');
        if (selector.hasClass('wpbm-previous-page')) {
            current_page = previous_page;
        } else {
            current_page = next_page;
        }

        $.ajax({
            type: 'post',
            url: wpbm_frontend_js_params.ajax_url,
            data: {
                action: 'wpbm_pagination_action',
                _wpnonce: wpbm_frontend_js_params.ajax_nonce,
                layout_type: layout_type,
                page_num: current_page,
                post_id: post_id
            },
            beforeSend: function(xhr) {
                selector.closest('.wpbm-pagination-block').find('.wpbm-ajax-loader').show();
            },
            success: function(response) {
                if (selector.closest('.wpbm-main-blog-wrapper').find('.wpbm-filter-wrap').length > 0) {
                    selector.closest('.wpbm-main-blog-wrapper').find('.wpbm-filter-trigger[data-filter-key="wpbm-filter-all"]').click();
                }
                selector.closest('.wpbm-pagination-block').find('.wpbm-ajax-loader').hide();
                if (layout_type === 'masonry') {
                    var masonary_id = selector.closest('.wpbm-masonry-wrapper').find('.wpbm-masonry-item-wrap').data('masonary-id');
//                    // wpbm_masonary_obj[masonary_id].isotope('destroy');
//                    selector.closest('.wpbm-main-blog-wrapper').find('.wpbm-layout-' + layout_type + '-section').html(response);
//                    selector.closest('.wpbm-main-blog-wrapper').find('.wpbm-layout-' + layout_type + '-section').imagesLoaded(function() {
//                        $('.wpbm-masonry-item-wrap').isotope({
//                            itemSelector: '.wpbm-masonry-item',
//                            percentPosition: true,
//                            masonry: {
//                                columnWidth: '.wpbm-masonry-sizer',
//                                horizontalOrder: true,
//                                gutter: 0
//
//                            }
//                        });
//                    });
                    var $items = $(response);
                    //alert($items);
                    wpbm_masonary_obj[masonary_id].html($items);
                    wpbm_masonary_obj[masonary_id].imagesLoaded(function() {
                    })
                            .done(function(instance) {
                                console.log('all images successfully loaded');
                                selector.closest('.ap_pagination').find('.ap_wait_loader').hide();
                                selector.show();
                                wpbm_masonary_obj[masonary_id].isotope('reloadItems').isotope();
                            })
                            .fail(function() {
                                console.log('all images loaded, at least one is broken');


                                wpbm_masonary_obj[masonary_id].isotope('reloadItems').isotope();
                            })
                            .progress(function(instance, image) {
                            });
                } else if (layout_type === 'timeline') {
                    selector.closest('.wpbm-main-blog-wrapper').find('.wpbm-layout-' + layout_type + '-section .wpbm-blog-cover').html(response);
                } else {
                    selector.closest('.wpbm-main-blog-wrapper').find('.wpbm-layout-' + layout_type + '-section').html(response);

                }
                $('html, body').animate({
                    scrollTop: selector.closest('.wpbm-main-blog-wrapper').find('.wpbm-layout-' + layout_type + '-section').offset().top - 200 //this will keep content positioned correctly, but you shouldn't need both a '+ 200' and '- 200' here. Adjust this value as needed.
                }, 900);

                var pagination_html = wpbm_build_pagination_html(current_page, total_page, post_id, layout_type, next_arrow, prev_arrow);
                selector.closest('.wpbm-main-blog-wrapper').find('.wpbm-pagination-block ul').html(pagination_html);

            }
        });
    });

    /**
     * Load More Action
     *
     * @since 1.0.0
     */
    $('.wpbm-load-more-trigger').click(function() {
        var selector = $(this);
        var masonary_id = selector.closest('.wpbm-masonry-wrapper').find('.wpbm-masonry-item-wrap').data('masonary-id');
        var layout_type = $(this).data('layout-type');
        var page_num = $(this).data('page-number');
        var post_id = $(this).data('post-id');
        var total_page = $(this).data('total-page');
        var next_page = parseInt(page_num) + 1;
        if (next_page <= total_page) {
            $.ajax({
                type: 'post',
                url: wpbm_frontend_js_params.ajax_url,
                data: {
                    action: 'wpbm_pagination_action',
                    _wpnonce: wpbm_frontend_js_params.ajax_nonce,
                    layout_type: layout_type,
                    page_num: next_page,
                    post_id: post_id
                },
                beforeSend: function(xhr) {
                    selector.hide();
                    selector.closest('.wpbm-load-more-block').find('.wpbm-ajax-loader').show();
                },
                success: function(response) {

                    selector.data('page-number', next_page);
                    selector.closest('.wpbm-load-more-block').find('.wpbm-ajax-loader').hide();
                    if (selector.closest('.wpbm-main-blog-wrapper').find('.wpbm-filter-wrap').length > 0) {
                        selector.closest('.wpbm-main-blog-wrapper').find('.wpbm-filter-trigger[data-filter-key="wpbm-filter-all"]').click();
                    }

                    if (layout_type === 'masonry') {
                        var $items = $(response);
                        //alert($items);
                        wpbm_masonary_obj[masonary_id].append($items).isotope('appended', $items);
                        wpbm_masonary_obj[masonary_id].imagesLoaded(function() {
                        })
                                .done(function(instance) {
                                    console.log('all images successfully loaded');
                                    selector.closest('.ap_pagination').find('.ap_wait_loader').hide();
                                    selector.show();
                                    wpbm_masonary_obj[masonary_id].isotope('reloadItems').isotope();
                                })
                                .fail(function() {
                                    console.log('all images loaded, at least one is broken');


                                    wpbm_masonary_obj[masonary_id].isotope('reloadItems').isotope();
                                })
                                .progress(function(instance, image) {
                                });

                    } else if (layout_type === 'timeline') {
                        selector.closest('.wpbm-main-blog-wrapper').find('.wpbm-layout-' + layout_type + '-section .wpbm-blog-cover').append(response);

                    } else {
                        // selector.closest('.wpbm-main-blog-wrapper').find('.wpbm-layout-' + layout_type + '-section').html(response);
                        selector.closest('.wpbm-main-blog-wrapper').find('.wpbm-layout-' + layout_type + '-section').append(response);

                    }

                    if (next_page === total_page) {
                        selector.remove();
                    } else {

                        selector.show();
                    }
                }
            });
        } else {
            selector.remove();
        }
    });
    /**
     *Infinite Scroll Action
     *
     * @since 1.0.0
     */
    var infinte_load = 0;
    $('.wpbm-infinite-load-trigger').click(function() {
        var selector = $(this);
        var masonary_id = selector.closest('.wpbm-masonry-wrapper').find('.wpbm-masonry-item-wrap').data('masonary-id');
        var layout_type = $(this).data('layout-type');
        var page_num = $(this).data('page-number');
        var post_id = $(this).data('post-id');
        var total_page = $(this).data('total-page');
        var next_page = parseInt(page_num) + 1;
        if (next_page <= total_page) {
            $.ajax({
                type: 'post',
                url: wpbm_frontend_js_params.ajax_url,
                data: {
                    action: 'wpbm_pagination_action',
                    _wpnonce: wpbm_frontend_js_params.ajax_nonce,
                    layout_type: layout_type,
                    page_num: next_page,
                    post_id: post_id
                },
                beforeSend: function(xhr) {
                    infinte_load = 1;
                    selector.hide();
                    selector.closest('.wpbm-infinite-load').find('.wpbm-infinite-loader').show();
                },
                success: function(response) {
                    infinte_load = 0;
                    selector.data('page-number', next_page);
                    selector.closest('.wpbm-infinite-load').find('.wpbm-infinite-loader').hide();
                    if (selector.closest('.wpbm-main-blog-wrapper').find('.wpbm-filter-wrap').length > 0) {
                        selector.closest('.wpbm-main-blog-wrapper').find('.wpbm-filter-trigger[data-filter-key="wpbm-filter-all"]').click();
                    }

                    if (layout_type === 'masonry') {
                        var $items = $(response);
                        //alert($items);
                        wpbm_masonary_obj[masonary_id].append($items).isotope('appended', $items);
                        wpbm_masonary_obj[masonary_id].imagesLoaded(function() {
                        })
                                .done(function(instance) {
                                    console.log('all images successfully loaded');
                                    selector.closest('.ap_pagination').find('.ap_wait_loader').hide();
                                    selector.show();
                                    wpbm_masonary_obj[masonary_id].isotope('reloadItems').isotope();
                                })
                                .fail(function() {
                                    console.log('all images loaded, at least one is broken');


                                    wpbm_masonary_obj[masonary_id].isotope('reloadItems').isotope();
                                })
                                .progress(function(instance, image) {
                                });

                    } else if (layout_type === 'timeline') {
                        selector.closest('.wpbm-main-blog-wrapper').find('.wpbm-layout-' + layout_type + '-section .wpbm-blog-cover').append(response);

                    } else {
                        // selector.closest('.wpbm-main-blog-wrapper').find('.wpbm-layout-' + layout_type + '-section').html(response);
                        selector.closest('.wpbm-main-blog-wrapper').find('.wpbm-layout-' + layout_type + '-section').append(response);

                    }

                    if (next_page === total_page) {
                        selector.remove();
                    } else {

                        selector.show();
                    }
                }
            });
        } else {
            selector.remove();
        }
    });
    /**
     *  Infinte scroll Implementation
     * */

    $(window).scroll(function() {
        var top = ($('.wpbm-infinite-scroll-wrapper').offset() || {"top": NaN}).top;
        var nav = $('.wpbm-infinite-scroll-wrapper');
        if (!isNaN(top)) {
            if ($(window).scrollTop() >= nav.offset().top + nav.outerHeight() - window.innerHeight) {
                if (infinte_load === 0) {
                    $('.wpbm-infinite-load-trigger:first').trigger('click');
                }
            }
        }

    });


    /*
     *
     * @Masonary intialization
     */
    var wpbm_masonary_obj = [];
    $('.wpbm-masonry-item-wrap').each(function() {
        var $selector = $(this);
        var masonary_id = $(this).data('masonary-id');
        wpbm_masonary_obj[masonary_id] = $selector.imagesLoaded(function() {
            wpbm_masonary_obj[masonary_id].isotope({
                itemSelector: '.wpbm-masonry-item',
                percentPosition: true,
                masonry: {
                    columnWidth: '.wpbm-masonry-sizer',
                    horizontalOrder: true,
                    gutter: 0

                }
            });
        });
    });
    /*
     * Filter template implementation
     */
    $('.wpbm-filter-trigger').click(function() {
        var selector = $(this);
        var filter_key = selector.data('filter-key');
        var layout_type = selector.data('layout-type');
        selector.closest('.wpbm-filter-wrap').find('.wpbm-filter-trigger').removeClass('wpbm-active-filter');
        selector.addClass('wpbm-active-filter');
        if (layout_type == 'grid') {
            if (filter_key === 'wpbm-filter-all') {
                selector.closest('.wpbm-main-blog-wrapper').find('.wpbm-inner-wrap').removeClass('wpbm-hidden-grid').addClass('wpbm-visible-grid').show();
            } else {
                selector.closest('.wpbm-main-blog-wrapper').find('.wpbm-inner-wrap').addClass('wpbm-hidden-grid').removeClass('wpbm-visible-grid').hide();
                selector.closest('.wpbm-main-blog-wrapper').find('.' + filter_key).removeClass('wpbm-hidden-grid').addClass('wpbm-visible-grid').show();
            }
        } else if (layout_type === 'masonry') {
            filterValue = (filter_key == 'all') ? '*' : '.' + filter_key;
            var masonary_id = selector.closest('.wpbm-masonry-wrapper').find('.wpbm-masonry-item-wrap').data('masonary-id');
            // alert(wpbm_masonary_obj[masonary_id]);
            wpbm_masonary_obj[masonary_id].isotope({filter: filterValue});
        }
    });

    /*
     * Content block side slider action
     */

    //bxslider configuration options for vertical
    var side_carousel = {};
    $('.wpbm-side-slider').each(function() {
        var id = $(this).data('id');
        var controls = $(this).data('controls');
        var autoplay = $(this).data('auto');
        var slide_count = $(this).data('column');
        var speed = $(this).data('speed');
        var template = $(this).data('template');
        if (template === 'template-1') {
            var margin = 23;
            var mode = 'vertical';
            var width = 0;
        } else if (template === 'template-3' || template === 'template-9') {
            var mode = 'horizontal';
            var width = 374;
            var margin = 0;

        } else if (template === 'template-4') {
            var mode = 'vertical';
            var width = 0;
            var margin = 24;

        } else if (template === 'template-6' || template === 'template-8') {
            var mode = 'vertical';
            var width = 0;
            var margin = 10;
        } else {
            var mode = 'vertical';
            var width = 0;
            var margin = 0;
        }
        var next_text = '<i class="fa fa-angle-right" aria-hidden="true"></i>';
        var pre_text = '<i class="fa fa-angle-left" aria-hidden="true"></i>';

        side_carousel.id = $(this).bxSlider({
            mode: mode,
            useCSS: false,
            speed: speed,
            auto: false,
            controls: controls,
            nextText: next_text,
            prevText: pre_text,
            minSlides: slide_count,
            maxSlides: slide_count,
            moveSlides: 1,
            pager: false,
            slideWidth: width,
            slideMargin: margin

        });
    });
});