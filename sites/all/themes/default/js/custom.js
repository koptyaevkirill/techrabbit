jQuery.noConflict();

jQuery(document).ready(function($) {
    ProductColorList();
    //ProductColorSelect();
    
    $(this).scrollTop(0); //scroll to page top

    jQuery("#step-login").on( "click", function() {
        jQuery("#step-service").removeClass('is-active');
        jQuery("#step-billing").removeClass('is-active');
        jQuery("#step-shipping_method").removeClass('is-active');
        jQuery("#step-payment").removeClass('is-active');
        jQuery("#step-review").removeClass('is-active');
    });
    jQuery("#step-billing").on( "click", function() {
        jQuery("#step-service").removeClass('is-active');
        jQuery("#step-shipping_method").removeClass('is-active');
        jQuery("#step-payment").removeClass('is-active');
        jQuery("#step-review").removeClass('is-active');
    });
    jQuery("#step-service").on( "click", function() {
        jQuery("#step-shipping_method").removeClass('is-active');
        jQuery("#step-payment").removeClass('is-active');
        jQuery("#step-review").removeClass('is-active');
    });
    jQuery("#step-shipping_method").on( "click", function() {
        jQuery("#step-payment").removeClass('is-active');
        jQuery("#step-review").removeClass('is-active');
    });
    jQuery("#step-payment").on( "click", function() {
        jQuery("#step-review").removeClass('is-active');
    });

    // $('.js-page').on('click', function(e) {
    //     if($(this).hasClass('has-overlay') &&
    // });

    $wyswig_table = $('.content__post table, .content__products table');

      if(($wyswig_table.length >= 0 && $wyswig_table.length == 1)) {
        $wyswig_table.before("<div class='table-responsive'></div>");
        $(".table-responsive").append($wyswig_table);
      }
      else if ($wyswig_table.length > 1) {
        $wyswig_table.each(function(index, el) {
          var $div = "<div class='table-responsive index-"+index + "'></div>";
          $(this).before($div);
          $('.index-'+index).append($(this));
        });
      }
    /*$(document).on('click', '.cat-item', function() {
        console.log(1);
      if ($(this).hasClass('is-active')) {
        $(this).removeClass('is-active');
        $(this).next('.prodside__cat-list').removeClass('is-open');
      } else {
        $(this).addClass('is-active');
        $(this).next('.prodside__cat-list').addClass('is-open');
      }
    });*/

    $('.stores .in').on('click', function() {
        $('.stores-block').slideToggle('fast');
    });

    if ($( ".catalog-category-view").length) {
        $(window).on('resize', function(){
            var containerWidth = false;
            if ($( ".content__post" ).length) {
                containerWidth = $( ".content__post" ).width();
            }/* else if($( ".text_block" ).length){
                containerWidth = $( ".text_block" ).width();
            }*/
            if(containerWidth){
                $( ".catalog-category-view .content__post img" ).each( function( index, element ){
                	if($(this).children().length > 0){
                        if($(this).children().children().length > 0){
                                if($(this).children().children('img').length > 0){
                                        if(containerWidth <= $(this).children().children('img').width()){
                                        $(this).children().children('img').addClass('mobile');
                                    } else {
                                        $(this).children().children('img').removeClass('mobile');
                                    }
                                        }
                        } else {
                                if($(this).children('img').length > 0){
                                    if(containerWidth <= $(this).children('img').width()){
                                        $(this).children('img').addClass('mobile');
                                    } else {
                                        $(this).children('img').removeClass('mobile');
                                    }
                                }
                        }
                	} else {
                        if(containerWidth <= $(this).width()){
                            $(this).addClass('mobile');
                        } else {
                            $(this).removeClass('mobile');
                        }
                	}
                });
            }
        }).trigger("resize");
    }

});



function detectIE() {
    var ua = window.navigator.userAgent;

    var msie = ua.indexOf('MSIE ');
    if (msie > 0) {
        // IE 10 or older => return version number
        return parseInt(ua.substring(msie + 5, ua.indexOf('.', msie)), 10);
    }

    var trident = ua.indexOf('Trident/');
    if (trident > 0) {
        // IE 11 => return version number
        var rv = ua.indexOf('rv:');
        return parseInt(ua.substring(rv + 3, ua.indexOf('.', rv)), 10);
    }

    var edge = ua.indexOf('Edge/');
    if (edge > 0) {
       // Edge (IE 12+) => return version number
       return parseInt(ua.substring(edge + 5, ua.indexOf('.', edge)), 10);
    }

    // other browser
    return false;
}

function initialize(map, lat, lang) {
    var myLatlng = new google.maps.LatLng(lat,lang);
    var mapOptions = {
      zoom: 13,
      center: myLatlng,
      disableDefaultUI: true
    }
    var map = new google.maps.Map(document.getElementById(map), mapOptions);

    var marker = new google.maps.Marker({
        position: myLatlng,
        map: map,
        title: 'Hello World!'
    });
}

function ProductColorList(){
    jQuery(".product-color").click(function() {
        var color_id = jQuery(this).data('color');
        if(color_id){
            jQuery(this).parents('.products__item').find('.product-link').each(function (index, element) {
                element.href = element.href.split('?i=')[0]+'?i='+color_id;
            });
        }
    });
}
function ProductColorSelect(){
    if(jQuery(".product").length && jQuery(".product-options").length){
        var option_hash = window.location.hash.replace('#','');
        if(option_hash){
            if(jQuery("#attribute134").length){
                jQuery('#attribute134').val(option_hash);
            }
            if(jQuery("#attribute135").length){
                jQuery('#attribute135').val(option_hash);
            }
        }
    }
}

function showReplaceFilename(elem){
    if(elem.value != ''){
        jQuery('.replace-file-upload').hide();
        jQuery('.replace-file-change').show();
        jQuery('.replace-file-name').text(elem.files[0].name);
    }
}

function rebindTooltips(){
    jQuery('.in-stock, .out-of-stock').tooltip({tooltipClass: "stock-tooltip"});
}