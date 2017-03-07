jQuery(document).ready(function($) {
    "use strict";

    //Preloader

    $('body.preloader').jpreLoader({
        showSplash : false,
        loaderVPos : '50%',
    }).css('visibility','visible');

    //Scroll

    $(".scroll").click(function(e){
        e.preventDefault();
        var href = $(this).attr('href');
        var hash = href.split('#');
        var url_hash = '#' + hash[1];
        if ($(url_hash).length > 0) {
            var offset = ($(window).width()<968) ? 20 : 100;
            $('html, body').animate({
                scrollTop: $(url_hash).offset().top-offset
            }, 1000);
        }
        else{
            location.href = href;
        }
        if($(window).width()<968){
            var $menu_responsive = $('#ABdev_main_header nav');
            $menu_responsive.animate({width:'toggle'},350);
        }
    });

    //Back To Top

    $('#back_to_top').click(function(e) {
        e.preventDefault();
        $('html, body').animate({scrollTop: 0}, 900);
        return false;
    });

    //Woocommerce

    $("a.add_review_link").click(function(e){
        e.preventDefault();
        $("div.woocommerce-tabs>ul.tabs>li.reviews_tab>a").click();
        $('html, body').animate({scrollTop: $("div.woocommerce-tabs").offset().top-160}, 1000);
    });


    $('.products').find('.product').each(function(){
        var $product = $(this);

        if ($product.hasClass('grid_product')) {
	        if ($product.find('.button.compare').length) {
	            $product.find('.button.compare').detach().appendTo($product.find('.product_loop_hover_rating'));
	        }
        }

        if ($product.find('.yith-wcwl-wishlistexistsbrowse, .yith-wcwl-add-button, .yith-wcwl-wishlistaddedbrowse').length) {
            if ($product.find('.yith-wcwl-wishlistexistsbrowse').hasClass('show')) {
                $product.find('.yith-wcwl-wishlistexistsbrowse').css('display', 'inline-block');
            } else if($product.find('.yith-wcwl-wishlistexistsbrowse').hasClass('hide')) {
                $product.find('.yith-wcwl-wishlistexistsbrowse').css('display', 'none');
            }
            if ($product.find('.yith-wcwl-add-button').hasClass('show')) {
                $product.find('.yith-wcwl-add-button').css('display', 'inline-block');
            } else if($product.find('.yith-wcwl-add-button').hasClass('hide')) {
                $product.find('.yith-wcwl-add-button').css('display', 'none');
            }
            if ($product.find('.yith-wcwl-wishlistaddedbrowse').hasClass('show')) {
                $product.find('.yith-wcwl-wishlistaddedbrowse').css('display', 'inline-block');
            } else if($product.find('.yith-wcwl-wishlistaddedbrowse').hasClass('hide')) {
                $product.find('.yith-wcwl-wishlistaddedbrowse').css('display', 'none');
            }
        }

        $product.on('hover', function(){
           $product.find('.grid_product_additionals').slideToggle("slow") ;
        });
    });

    $(function(a){
        a(".woocommerce-ordering").on("change", "select.orderby", function(){
            a(this).closest("form").submit();
        }),
        a("div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)").addClass("buttons_added").append('<input type="button" value="+" class="plus" />').prepend('<input type="button" value="-" class="minus" />'), a("input.qty:not(.product-quantity input.qty)").each(function(){
            var b=parseFloat(a(this).attr("min"));b&&b>0&&parseFloat(a(this).val())<b&&a(this).val(b);
        }),
        a(document).on("click", ".plus, .minus", function(){
            var b=a(this).closest(".quantity").find(".qty"),
            c=parseFloat(b.val()),
            d=parseFloat(b.attr("max")),
            e=parseFloat(b.attr("min")),
            f=b.attr("step");c&&""!==c&&"NaN"!==c||(c=0),
            (""===d||"NaN"===d)&&(d=""),
            (""===e||"NaN"===e)&&(e=0),
            ("any"===f||""===f||void 0===f||"NaN"===parseFloat(f))&&(f=1),
            a(this).is(".plus")?b.val(d&&(d==c||c>d)?d:c+parseFloat(f)):e&&(e==c||e>c)?b.val(e):c>0&&b.val(c-parseFloat(f)),
            b.trigger("change");
        });
    });

	$(window).load(function() {

		var $product_image_carousel = $('.product_image_wrapper'),
			$thumbnails = $('.single_thumb_wrapper .thumbnails');

		$('.single_thumb_wrapper .thumbnails img').each(function(i) {
			$(this).addClass( 'itm'+i );
			$(this).click(function() {
				$('.product_image_wrapper').trigger( 'slideTo', [i, 0, true] );
				return false;
			});
		});

		$('.single_thumb_wrapper .thumbnails img.itm0').addClass( 'selected' );

		$product_image_carousel.carouFredSel({
			synchronise: ['.single_thumb_wrapper .thumbnails', false],
			responsive: true,
			auto: false,
			scroll: {
				fx: 'directscroll',
				onBefore: function() {
					var pos = $(this).triggerHandler( 'currentPosition' );
					$('.single_thumb_wrapper .thumbnails img').removeClass( 'selected' );
					$('.single_thumb_wrapper .thumbnails img.itm'+pos).addClass( 'selected' );
			}},
			width: "100%",
			height:"variable",
			items: {
				visible: 1,
				height:"variable",
			}

		});

		$thumbnails.carouFredSel({
			width: '100%',
			auto: false,
			height: "100%",
			items: {
				min:3,
			},
		});

		$('.product_image_wrapper').css('opacity','1');
		$('.single_thumb_wrapper').css('opacity','1');

		$(".next_thumb").click(function() {
			$(".single_thumb_wrapper .thumbnails, .product_image_wrapper").trigger( "next" );
		});

		$(".prev_thumb").click(function() {
			$(".single_thumb_wrapper .thumbnails, .product_image_wrapper").trigger( "prev" );
		});

	});

    var menu_cart = $('#shop_links'), subelement = menu_cart.find('.cart_dropdown_widget').css({display:'none', opacity: 0});

    menu_cart.hover(
        function(){
            subelement.css({display:'block'}).stop().animate({opacity:1});
        },
        function(){
            subelement.stop().animate({opacity:0}, function(){
                subelement.css({display:'none'});
            });
        }
    );

    $('.add_to_wishlist_on_grid').click(function(){
        var $shop_links = $('#shop_links');
        var $wishlist_no = $shop_links.find('.link_wishlist span');
        $wishlist_no.text(parseInt($wishlist_no.text())+1);
    });


    $('.add_to_cart_ajax').click(function(e){
        e.preventDefault();
        var $this = $(this);
        var product_id = $this.data('product_id');
        var added_title = $this.data('added_title');
        var $shop_links = $('#shop_links');
        var $cart_no = $shop_links.find('.link_cart span .items_count');
        var $cart_amount = $shop_links.find('.link_cart span .amount');
        var currentPrice = $this.parents('li.product').find('.price ins .amount , .price > .amount').text();
        var data = {
            action: 'ABdev_incomeup_add_to_cart_wishlist',
            product_id: product_id,
            add_to: 'cart'
        };
        $.post(ajaxurl, data, function(response) {
            $cart_no.text(parseInt($cart_no.text())+1);
            if(!$this.hasClass('in-cart')){
                $this.addClass('in-cart').tipsy("hide").attr("original-title",added_title).tipsy("show");
            }
        });
    });

    //Waypoints

    $('.home.page .dnd_section_dd, .home.page .tcvpb_section_tc').waypoint(function(direction) {
        var section_id = $(this).attr('id');
        if(section_id!==undefined){
            $('.current-menu-item, .current-menu-ancestor').removeClass('current-menu-item').removeClass('current-menu-ancestor');
            var $menu_item;
            if(direction==='down'){
                $menu_item = $('#main_menu a[href=#'+section_id+']').parent();
                if($menu_item.length>0){
                    $menu_item.addClass('current-menu-item');
                }
                else{
                    $('#main_menu .current_page_item').addClass('current-menu-item');
                }
            }
            else if(direction==='up'){
                var previous_section_id = $(this).prevAll('[id]:first').attr('id');
                $menu_item = $('#main_menu a[href=#'+previous_section_id+']').parent();
                if($menu_item.length>0){
                    $menu_item.addClass('current-menu-item');
                }
                else{
                    $('#main_menu .current_page_item').addClass('current-menu-item');
                }
            }
        }
    },{
      offset: 100
    });

    //Header animations

    var $main_slider = $('#ABdev_main_slider');
    $main_slider.height('auto');
    var $main_header = $('#ABdev_main_header');
    var $sticky_main_header = $('.sticky_main_header');
    var $switch_main_header = $('.switch_main_header');

    var $header_spacer = $('#ABdev_header_spacer');

    $('#ABdev_main_slider.ABdev_parallax_slider').height($(window).height());

    var header_height = $main_header.outerHeight();

    $header_spacer.height(header_height);
    // $header_spacer.height(header_height).hide();
    var admin_toolbar_height = parseInt($('html').css('marginTop'), 10);


    var $main_logo = $('#main_logo');
    var $inversed_logo = $('#inverted_logo');


    function header_switch(){
        if($(document).scrollTop() < $main_slider.height() && $(window).width()>979){
            if($(document).scrollTop() < $switch_main_header.height()){
                $switch_main_header.addClass('transparent').removeClass('default').fadeIn();
                $main_logo.hide();
                $inversed_logo.show();
            }
            else{
                $switch_main_header.fadeOut();
            }
        }
        else{
            $switch_main_header.removeClass('transparent').addClass('default').slideDown();
            $main_logo.show();
            $inversed_logo.hide();
        }
    }

    function sticky_header(){
        $(document).scroll(function(){
            header_switch();
            var scrollTop = parseInt($(document).scrollTop() ,10);
            if(scrollTop>19 && $(window).width()>979){
                $sticky_main_header.addClass('sticky_header_low');
                $('#top_bar').css('overflow', 'hidden');
            }
            else{
                $sticky_main_header.removeClass('sticky_header_low');
                $('#top_bar').css('overflow', 'visible');
            }
        });
    }

    sticky_header();
    header_switch();


    // Search toggle

    $('.search-icon').on('click', function(e) {
        e.preventDefault();
        var $that = $(this);
        var $wrapper = $('.search-box-wrapper');

        $that.toggleClass('active');
        $wrapper.slideToggle('300');

        if ($that.hasClass('active')) {
            $wrapper.find('input').focus();
        }
    } );

    //Megamenu tweak

    var search_container = $('.search-toggle').outerWidth(true);

    $('#ABdev_main_header.transparent').find('.sf-mega').css('margin-right', '-' + search_container + 'px');

    //Superfish

    var $sf = $('#main_menu');
    if ($(window).width()>1191) {
        var menu_height = $sf.outerHeight();
        $('.sf-mega').css('top', menu_height + 'px');
    }

    if($('#ABdev_menu_toggle').css('display') === 'none') {
        // enable superfish when the page first loads if we're on desktop
        $sf.superfish({
            delay:          300,
            animation:      {opacity:'show',height:'show'},
            animationOut:   {height:'hide'},
            speed:          'fast',
            speedOut:       'fast',
            cssArrows:      false,
            disableHI:      true /* load hoverIntent.js in header to use this option */,
            onBeforeShow:   function(){
                var ww = $(window).width();
                if(this.parent().offset() !== undefined){
                    var locUL = this.parent().offset().left + this.width();
                    var locsubUL = this.parent().offset().left + this.parent().width() + this.width();
                    var par = this.parent();
                    if(par.parent().is('#main_menu') && (locUL > ww)){
                        this.css('marginLeft', "-"+(locUL-ww+20)+"px");
                    }
                    else if (!par.parent().is('#main_menu') && (locsubUL > ww)){
                        this.css('left', "-"+(this.width())+"px");
                    }
                }
            }
        });
    }

    var $menu_responsive = $('#ABdev_main_header nav');
    $('#ABdev_menu_toggle').click(function(){
        $menu_responsive.animate({width:'toggle'},350);
    });

    //Timeline Tabs

    $('.dnd-tabs-timeline').each(function(){
        var $this = $(this);
        var $tabs = $this.find('.dnd-tabs-ul > li');
        var tabsCount = $tabs.length;
        $tabs.addClass('tab_par_'+tabsCount);
    });

    $(".submit").click(function () {
        $(this).closest("form").submit();
    });

    $('input, textarea').placeholder();

    //Timeline Posts

    var $content = $("#timeline_posts");
    var $loader = $("#timeline_loading");
    var itemSelector = ('.timeline_post');

    function timeline_classes(){
        $content.find(itemSelector).each(function(){
           var posLeft = $(this).css("left");
           if(posLeft == "0px"){
               $(this).removeClass('timeline_post_right').addClass('timeline_post_left');
           }
           else{
               $(this).removeClass('timeline_post_left').addClass('timeline_post_right');
           }
        });
    }

    $content.imagesLoaded( function() {
        $content.masonry({
          columnWidth: ".timeline_post_first",
          gutter: 100,
          itemSelector: itemSelector,
        });

        timeline_classes();

    });

    $(window).on('scroll', function () {
        if ($(window).scrollTop() + $(window).height()  >= $(document).height() - $('#ABdev_main_footer').height()) {
             if( $loader.length && (!( $loader.hasClass('timeline_loading_loader') || $loader.hasClass('timeline_no_more_posts'))) ){
                load_posts();
            }
        }
    });

    var page_number = 1;
    var cat = $loader.data('category');

    function load_posts(){
        if(!($loader.hasClass('timeline_loading_loader') || $loader.hasClass('timeline_no_more_posts'))){
            page_number++;
            var str = '&cat=' + cat + '&page_number=' + page_number + '&action=abdev_get_timeline_posts';
            $("#timeline_last_post_month").remove();
            var noPosts = $loader.data("noposts");
            $.ajax({
                type       : "POST",
                dataType   : "html",
                url: abdev_timeline_posts.ajaxurl,
                data: str,
                success : function(data){
                    var $data = $(data);
                    if($data.length){
                            var $newElements = $data.css({ opacity: 0 });
                            $content.append( $newElements );
                        $content.imagesLoaded(function(){
                            $loader.removeClass('timeline_loading_loader');
                            $content.masonry( 'appended', $newElements, false );
                            $newElements.animate({ opacity: 1 });
                            timeline_classes();
                        });
                    } else {
                        $loader.addClass('timeline_no_more_posts').html(abdev_timeline_posts.noposts);
                    }
                },
                beforeSend : function(){
                    $loader.addClass('timeline_loading_loader').html('');
                },
                error : function(jqXHR, textStatus, errorThrown) {
                    $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
                },
                complete : function(){
                    $loader.removeClass('timeline_loading_loader');
                    timeline_classes();
                }
            });
        }
        return false;
    }

    // Isotope Porfolio

    var sortBy = 'original-order';
    var columnWidth = '.portfolio_item';

    $('.ABdev_latest_portfolio').each(function(){
        var $current_portfolio = $(this);
        if( $current_portfolio.find('.portfolio_item').hasClass('portfolio_masonry_fullwidth')){
            sortBy = 'random';
            columnWidth = '.portfolio_item.small';
        }
        $current_portfolio.imagesLoaded( function() {
            $current_portfolio.isotope({
                layoutMode: 'masonry',
                masonry: {
                  columnWidth: columnWidth
                },
                itemSelector : '.portfolio_item',
                sortBy: sortBy
            });
        });
    });


    $('.portfolio_filter_button').click(function(){
        var $portfolio_filter_clicked_button = $(this);
        if ( $portfolio_filter_clicked_button.hasClass('selected') ) {
            return false;
        }
        var $portfolio_filter = $portfolio_filter_clicked_button.parents('.portfolio_filter');
        $portfolio_filter.find('.selected').removeClass('selected');
        $portfolio_filter_clicked_button.addClass('selected');
        var options = {},
            key = $portfolio_filter.attr('data-option-key'),
            value = $portfolio_filter_clicked_button.attr('data-option-value');
        value = value === 'false' ? false : value;
        options[ key ] = value;
        if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {
            changeLayoutMode( $portfolio_filter_clicked_button, options );
        } else {
            $portfolio_filter.next('.ABdev_latest_portfolio').isotope( options );
        }
        return false;
    });




    $(window).load(function() {

        // Nivo Slider in Portfolio

        $('#portfolio_gallery_slider').nivoSlider({
            effect:'fade', // Specify sets like: 'fold,fade,sliceDown'
            pauseTime:3000, // How long each slide will show
            directionNav:false, // Next & Prev navigation
            controlNavThumbs:true,
            controlNavThumbsFromRel:false,
            manualAdvance: false,
        });

        // CarouFredSel

        $('.ABp_latest_portfolio').each(function (){
            var $prev = $(this).find('.portfolio_prev');
            var $next = $(this).find('.portfolio_next');
            $(this).find('ul').carouFredSel({
                prev: $prev,
                next: $next,
                auto: false,
                width: '100%',
                scroll: 1,
            });

        });

        // Carousel element

        $('.dnd-carousel').each(function (){
            var $prev = $(this).find('.carousel_prev');
            var $next = $(this).find('.carousel_next');

            var $autoPlay = $(this).data("autoplay") == '0' ? false : true;
            var $items = $(this).data("items");
            var $effect = $(this).data("effect");
            var $easing = $(this).data("easing");
            var $duration = $(this).data("duration");

            $(this).find('ul').carouFredSel({
                prev: $prev,
                next: $next,
                width: '100%',
                play: true,
                auto: $autoPlay,
                scroll: {
                    items: $items,
                    fx: $effect,
                    easing: $easing,
                    duration: $duration,
                }
            });
        });


        fill_empty_space($('.section_to_strech'));

    });

    //Resize

    $(window).resize(function() {

        timeline_classes();

        $('.ABdev_latest_portfolio').each(function(){
            $(this).imagesLoaded( function() {
                $(this).isotope('layout');
            });
        });

        if($('#ABdev_menu_toggle').css('display') === 'none' && !$sf.hasClass('sf-js-enabled')) {
            // you only want SuperFish to be re-enabled once ($sf.hasClass)
            $menu_responsive.show();
            $sf.superfish({
                delay:          300,
                animation:      {opacity:'show',height:'show'},
                animationOut:   {height:'hide'},
                speed:          'fast',
                speedOut:       'fast',
                cssArrows:      false,
                disableHI:      true /* load hoverIntent.js in header to use this option */,
                onBeforeShow:   function(){
                    this.css('marginLeft', "0px");
                    var ww = $(window).width();
                    var locUL = this.parent().offset().left + this.width();
                    var locsubUL = this.parent().offset().left + this.parent().width() + this.width();
                    var par = this.parent();
                    if(par.parent().is('#main_menu') && (locUL > ww)){
                        this.css('marginLeft', "-"+(locUL-ww+20)+"px");
                    }
                    else if (!par.parent().is('#main_menu') && (locsubUL > ww)){
                        this.css('left', "-"+(this.width())+"px");
                    }
                }
            });
        } else if($('#ABdev_menu_toggle').css('display') != 'none' && $sf.hasClass('sf-js-enabled')) {
            // smaller screen, disable SuperFish
            $sf.superfish('destroy');
            $menu_responsive.hide();
            $menu_responsive.find('.sf-mega').css('marginLeft','0');
        }


        fill_empty_space($('.section_to_strech'));
            sticky_header();
            $('#ABdev_header_spacer').height($('#coming_soon_header').outerHeight());

        sticky_header();
        header_switch();

    });


    function fill_empty_space($section_to_strech){
        var initial_height = $section_to_strech.data('height');
        if(initial_height !== undefined){
            $section_to_strech.height(initial_height);
        }
        else{
            $section_to_strech.data('height', $section_to_strech.height());
        }
        var empty_space = $(window).height() - $('body').height();
        if(empty_space>0){
            $section_to_strech.height($section_to_strech.height()+empty_space);
        }
    }

});


