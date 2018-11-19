/*
 * Impreza customizations
 * 
 * Here are provided differences from the framework JS
 */

/* Search */
(function($){
	"use strict";

	$.fn.wSearch = function(){
		return this.each(function(){
			var $this = $(this),
				$input = $this.find('input[name="s"]'),
				focusTimer = null;

			var show = function(){
				$this.addClass('active');
				focusTimer = setTimeout(function(){
					$input.focus();
				}, 300);
			};

			var hide = function(){
				clearTimeout(focusTimer);
				$this.removeClass('active');
				$input.blur();
			};

			$this.find('.w-search-open').click(show);
			$this.find('.w-search-close').click(hide);
			$input.keyup(function(e){
				if (e.keyCode == 27) hide();
			});

		});
	};

	$(function(){
		jQuery('.w-search').wSearch();
	});
})(jQuery);

/* Grid */
if (typeof $us.WGrid === "function") {
	jQuery(function($){
		$('.w-grid').wGrid();
	});
}

/* Tabs */
if (typeof $us.WTabs === "function") {
	jQuery('.w-tabs').wTabs();
}