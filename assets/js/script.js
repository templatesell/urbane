(function ($) {
    "use strict";
    //Js code for search box

    $(".first_click").on("click", function () {
        $(".search-box-text").addClass("search_box");
        $(".search-wrapper").addClass("hide-show");
        $(".search-box-text").addClass("SlideUpIn");
        $(".search-box-text").removeClass("SlideDownOut");
    });
    $(".second_click").on("click", function () {
        $(".search-box-text").removeClass("search_box");
        $(".search-wrapper").removeClass("hide-show");
        $(".search-box-text").removeClass("SlideUpIn");
        $(".search-box-text").addClass("SlideDownOut");
    });



    $(window).on('scroll', function () {
        if ($(this).scrollTop > 100) {
            $('.main-navigation').addClass('affix');
        }
        else {
            $('.main-navigation').removeClass('affix');
        }
    });
    /* ========== Menu icon color ========== */
    $('.main-menu-icon').css('color', function () {
        var iconColorAttr = $(this).data('fa-color');
        return iconColorAttr;
    });
    /* ========== Horizontal navigation menu ========== */
    if ($('.main-header').length) {
        var mainHeader = $('.main-header'),
            mainHeaderHeight = mainHeader.height(),
            barMenu = mainHeader.find('.bar-menu'),
            mainMenuListWrapper = $('.main-menu > ul'),
            mainMenuListDropdown = $('.main-menu ul li:has(ul)');

        /* ========== Dropdown Menu Toggle ========== */
        barMenu.on("click", function () {
            $(this).toggleClass('menu-open');
            mainMenuListWrapper.slideToggle(300);
        });

        mainMenuListDropdown.each(function () {
            $(this).append('<span class="dropdown-plus"></span>');
            $(this).addClass('dropdown_menu');
        });

         $('.dropdown-plus').on("click", function () {
             $(this).prev('ul').slideToggle(300);
             $(this).toggleClass('dropdown-open');
         });

        $('.dropdown_menu a').append('<span></span>');
    }



    function LogoCenter(){
        var _header = $('.head_one');
        var _LogoItem = $(_header).find('.center-logo');
        _LogoItem.each(function(){
            $(this).removeClass('col-sm-4 col-sm-8 text-left text-right ');
            $(this).addClass('col-sm-12 text-center');
        });
    } 
    LogoCenter();

/*--------------------------------------------------------------
 Keyboard Navigation
----------------------------------------------------------------*/
  if ($(window).width() < 1024) {
    $("#primary-menu")
      .find("li")
      .last()
      .bind("keydown", function (e) {
        if (e.which === 9) {
          e.preventDefault();
          $("#site-navigation").find(".bar-menu").focus();
        }
      });

    $("#primary-menu > li:last-child button:not(.active)").bind("keydown", function (e) {
      if (e.which === 9) {
        e.preventDefault();
        $("#site-navigation").find(".bar-menu").focus();
      }
    });
  } else {
    $("#primary-menu").find("li").unbind("keydown");
  }

    
})(jQuery);