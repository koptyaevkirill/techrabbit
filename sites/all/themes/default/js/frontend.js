/*jslint plusplus: true*/
/*jslint nomen: true*/
/*global $, jQuery, alert, google, console, outdatedBrowser, IScroll, FastClick, Swiper */
(function($) {

var debounce,
  frontSliders,
  frontBig,
  frontThumb,
  news,
  newscroll,
  reposition,
  bgHovers,
  extraTotal,
  loadScript,
  latitude,
  longitude,
  frontsec,
  featsec,
  seccount,
  priceSlide,
  fillcol,
  map,
  addMarker,
  mapZoom,
  shopGmap,
  longtext,
  lattext,
  shopINFO,
  shopMAP,
  scriptLoaded,
  prodBig,
  prodBigScroll,
  initializeMap,
  latlng,
  filterscroll,
  filters,
  totalScrolls = 0,
  currImg,
  go,
  btnTime,
  featbig,
  frontbig,
  scrolling = false,
  ProdLightScroll,
  bigcount,
  chatScroll,
  chatScroller,
  prodSliders,
  prodThumb,
  prodBig,
  subFilterScrolls,
  priceSliders,
  setSideHeight,
  unsetSideHeight,
  checkMob,
  isMob,
  winW,
  winH,
  setLayouts = debounce(function() {
    'use strict';
    checkMob();
    // do stuff
  }, 250);

$(window).resize(setLayouts);

function debounce(func, wait, immediate) {
  "use strict";
  var timeout;
  return function() {
    var context = this,
      args = arguments,
      later = function() {
        timeout = null;
        if (!immediate) {
          func.apply(context, args);
        }
      },
      callNow = immediate && !timeout;
    clearTimeout(timeout);
    timeout = setTimeout(later, wait);
    if (callNow) {
      func.apply(context, args);
    }
  };
}

$(document).ready(function() {
  'use strict';
  checkMob();
  FastClick.attach(document.body);
  outdatedBrowser({
    lowerThan: 'transform',
    languagePath: 'js/lang/lt.html'
  });
  if ($('.js-front-big-slider').length) {
    frontSliders();
  }
  if ($('.js-prod-galls').length) {
    prodSliders();
  }
  /*if ($('.js-shop-map').length) {
    loadScript();
  }*/
  //chatScroller();
  window.viewportUnitsBuggyfill.init();
  if ($('.js-side-subfilter-scroll').length) {
    subFilterScrolls();
  }
  if ($('.js-price-slider-obj').length) {
    priceSliders();
  }
});


$(window).resize(setLayouts);

function debounce(func, wait, immediate) {
  'use strict';
  var timeout;
  return function() {
    var context = this,
      args = arguments,
      later = function() {
        timeout = null;
        if (!immediate) {
          func.apply(context, args);
        }
      },
      callNow = immediate && !timeout;
    clearTimeout(timeout);
    timeout = setTimeout(later, wait);
    if (callNow) {
      func.apply(context, args);
    }
  };
}

// hover / click
$(document).on('mouseenter', '.js-act', function() {
  "use strict";
  $(this).addClass('is-hover');
});

$(document).on('mouseleave', '.js-act', function() {
  "use strict";
  $(this).removeClass('is-hover');
});

$(document).on('mousedown touchstart', '.js-act', function() {
  "use strict";
  $(this).addClass('is-click');
});

$(document).on('mouseup touchend', '.js-act', function() {
  "use strict";
  $(this).removeClass('is-click');
});

$(document).on('focusin', '.js-act', function() {
  "use strict";
  $(this).addClass('is-focus');
});

$(document).on('focusout', '.js-act', function() {
  "use strict";
  $(this).removeClass('is-focus');
});

$(document).on('click', '*', function(e) {
  "use strict";
  if (!$(e.target).closest('.js-drop-cont, .js-drop-trigg.is-active').length && $(e.target).not('.js-btn-check')) {
    $('.js-drop-cont').removeClass('is-open');
    $('.js-drop-trigg').removeClass('is-active');
  }
  if (!$(e.target).closest('.js-product-request').length && !$(e.target).hasClass('js-btn-request')) {
    $('.js-products-item').removeClass('has-request');
    $('.js-product-request').removeClass('is-active');
  }
  if (!$(e.target).closest('.js-moreinfo').length && !$(e.target).hasClass('js-btn-moreinfo')) {
    $('.js-products-item').removeClass('has-moreinfo');
    $('.js-moreinfo').removeClass('is-active');
  }

});


/*$(document).on('click', '.js-btn-check', function() {
  var width = $(this).outerWidth(),
    height = $(this).outerHeight(),
    float = $(this).css('float'),
    borderSize = $(this).css('border-width').replace('px', ''),
    borderCol = $(this).css('border-color'),
    r = (height - borderSize) / 2,
    x = height / 2,
    push = (width - height) / 2,
    dashArray = (r / x) * 3.14 * 100,
    dashStr = dashArray + '%',
    svgStr = '<svg class="c-btn-check__svg" width="' + height + '" height="' + height + '">\n<circle class="c-btn-check__circle" fill="none" stroke="' + borderCol + '" stroke-width="' + borderSize + '" cx="' + x + '" cy="' + x + '" r="' + r + '" stroke-dasharray="' + dashStr + '" stroke-dashoffset="0%"/>\n</svg>',
    svgObj = $.parseHTML(svgStr),
    thisBtn = $(this),
    circle,
    btnTime;
  if (thisBtn.parent().hasClass('js-btn-center') || (thisBtn.parent().hasClass('js-btn-mob-center') && isMob)) {
    push = 0;
  }
  if (!thisBtn.hasClass('is-loaded')) {
    thisBtn.empty();
    thisBtn.addClass('is-checked');
    btnTime = thisBtn.css('transition-duration').replace('s', '') * 1000;
    thisBtn.css({
      height: height
    });
    thisBtn.css({
      width: height,
      left: push
    });
    setTimeout(function() {
      thisBtn.append(svgObj);
      circle = thisBtn.find('circle');
      thisBtn.addClass('has-svg');
      circle.animate({
        'stroke-dashoffset': dashStr
      }, btnTime * 2);
      thisBtn.addClass('is-loaded');
    }, btnTime);
    setTimeout(function() {
      thisBtn.addClass('is-reloading');
      circle.animate({
        'stroke-dashoffset': '0%'
      }, btnTime);
    }, btnTime * 4);
  }
});*/

$(document).on('click', '.js-drop-trigg', function() {
  'use strict';
  var cont = $(this).data('drop-cont'),
    contObj = $('.js-drop-' + cont);
  $('.js-drop-cont').removeClass('is-open');
  if (cont !== typeof undefined) {
    if ($(this).hasClass('is-active')) {
      $(this).removeClass('is-active');
    } else {
      $(this).addClass('is-active');
      $(contObj).addClass('is-open');
    }
  }
});

$(document).on('click', '.js-reg-trigger', function() {
  'use strict';
  var tab = $(this).data('register'),
    tabObj = $('.js-register-' + tab);
  $('.js-reg-trigger').removeClass('is-active');
  $(this).addClass('is-active');
  $('.js-register-tab').removeClass('is-open');
  tabObj.addClass('is-open');
});

/*$(document).on('click', '.js-drop-register-submit', function() {
  'use strict';
  setTimeout(function() {
    $('.js-drop-register-triggers').removeClass('is-active');
    $('.js-register-tab').removeClass('is-open');
    $('.js-register-success').addClass('is-active');
  }, btnTime * 6);
});*/

$(document).on('click', '.js-drop-remind-submit', function() {
  'use strict';
  setTimeout(function() {
    $('.js-drop-remind-step').removeClass('is-active');
    $('.js-drop-remind-next').addClass('is-active');
  }, btnTime * 6);
});

$(document).on('click', '.js-newsline-close', function() {
  'use strict';
  $('.js-drop-newsline').removeClass('is-open');
});

$(document).on('click', '.js-btn-request', function() {
  'use strict';
  $(this).parent().addClass('has-request');
  $(this).parent().find('.js-product-request').addClass('is-active');
});

$(document).on('click', '.js-btn-moreinfo', function() {
  'use strict';
  if ($(this).attr('data-promo-confirm') == 1)
  {
    closeConfirm();
    $('.openingpromo-cont .js-btn-moreinfo').click();
    return false;
  } 

  $(this).parent().addClass('has-moreinfo');
  $(this).parent().find('.js-moreinfo').addClass('is-active');
  $('html, body').animate({
    scrollTop: jQuery(this).offset().top
  }, 500);
});

$(document).on('click', '.js-shop-trigg', function() {
  'use strict';
  if (!$(this).parent().hasClass('is-open')) {
    $('.js-shops').addClass('is-open');
    $('.js-shop').removeClass('is-open');
    $(this).parent().addClass('is-open');
  } else {
    $(this).parent().removeClass('is-open');
    $('.js-shops').removeClass('is-open');
  }
});

$(document).on('click', '.js-step-link', function(e) {
  'use strict';
  if (!$(this).closest('.js-step-item').hasClass('is-completed')) {
    e.preventDefault();
  }
});

$(document).on('click', '.js-delivery-trigg', function(e) {
  'use strict';
  var addrObj = $('.js-delivery-' + $(this).data('delivery'));
  $('.js-delivery-subform').removeClass('is-active');
  addrObj.addClass('is-active');
});

$(document).on('click', '.js-address-trigg', function(e) {
  'use strict';
  var expand = $(this).data('expand');
  $('.js-address-subform').removeClass('is-active');
  if (expand) {
    $('.js-address-subform').addClass('is-active');
  }
});

// $(document).on('click', '.js-cat-toggle', function() {
//   'use strict';
//   if ($(this).hasClass('is-active')) {
//     $(this).removeClass('is-active');
//     $(this).closest('.js-prodside-cat').removeClass('is-active');
//     $(this).closest('.js-prodside-cat').find('.js-cat-list').removeClass('is-open');
//   } else {
//     $(this).addClass('is-active');
//     $(this).closest('.js-prodside-cat').addClass('is-active');
//     $(this).closest('.js-prodside-cat').find('.js-cat-list').addClass('is-open');
//   }
// });

$(document).on('click', '.js-sidefilter-toggle', function() {
  'use strict';
  if ($(this).hasClass('is-active')) {
    $(this).removeClass('is-active');
    $(this).closest('.js-sidefilter').removeClass('is-active');
    $(this).closest('.js-sidefilter').find('.js-sidefilter-cont').removeClass('is-open');
  } else {
    $(this).addClass('is-active');
    $(this).closest('.js-sidefilter').addClass('is-active');
    $(this).closest('.js-sidefilter').find('.js-sidefilter-cont').addClass('is-open');
  }
});

$(document).on('click', '.js-color-select', function() {
  'use strict';
  if ($(this).hasClass('is-open')) {
    $(this).removeClass('is-open');
  } else {
    $(this).addClass('is-open');
  }
});

$(document).on('click', '.js-productlist-top-switch', function() {
  'use strict';
  var type = $(this).data('switch'),
    typeClass = 'is-' + type;
  $('.js-productlist-top-switch').removeClass('is-active');
  $(this).addClass('is-active');
  $('.js-products-items').removeClass(function(index, css) {
    return (css.match(/(^|\s)is-\S+/g) || []).join(' ');
  });
  $('.js-products-items').addClass(typeClass);
});

$(document).on('click', '.js-color-item', function() {
  'use strict';
  var colID = $(this).data('color-id'),
    colString = 'u-color-' + colID;
  $(this).closest('.js-color-select').addClass('is-picked');
  $(this).closest('.js-color-select').find('.js-color-arr').removeClass(function(index, css) {
    return (css.match(/(^|\s)u-color-\S+/g) || []).join(' ');
  });
  $(this).closest('.js-color-select').find('.js-color-arr').addClass(colString);
});

$(document).on('click', '.js-btn-buy', function() {
  'use strict';
  $(this).addClass('is-active');
});

$(document).on('click', '.js-prod-gall-big-slide', function() {
  'use strict';
  if (!$(this).closest('.js-prod-gall-box').hasClass('is-boxed') && !isMob) {
    $(this).closest('.js-prod-gall-box').addClass('is-boxed');
  }
});

$(document).on('click', '.js-prod-gall-box', function(e) {
  'use strict';
  if (!$(e.target).closest('.js-prod-gall-big-slider').length && $(this).closest('.js-prod-gall-box').hasClass('is-boxed')) {
    $(this).removeClass('is-boxed');
  }
});

$(document).on('click', '.js-prod-gall-big-close', function(e) {
  'use strict';
  $('.js-prod-gall-box').removeClass('is-boxed');
});

$(document).on('click', '.js-side-subfilter-toggle', function() {
  'use strict';
  var scroll,
    transition,
    delay;
  if ($(this).hasClass('is-active')) {
    $(this).removeClass('is-active');
    $(this).closest('.js-side-subfilter').removeClass('is-active');
    $(this).closest('.js-side-subfilter').find('.js-side-subfilter-cont').removeClass('is-open');
  } else {
    $(this).addClass('is-active');
    $(this).closest('.js-side-subfilter').addClass('is-active');
    $(this).closest('.js-side-subfilter').find('.js-side-subfilter-cont').addClass('is-open');
    if ($(this).closest('.js-side-subfilter').find('.js-side-subfilter-scroll').length) {
      scroll = $(this).closest('.js-side-subfilter').find('.js-side-subfilter-scroll').data('scroll'),
        transition = $(this).closest('.js-side-subfilter').find('.js-side-subfilter-scroll').css('transition-duration'),
        delay = (transition.replace('s', '') * 1000) + 1;
      setTimeout(function() {
        window[scroll].refresh();
      }, delay);
    }
  }
});

$(document).on('click', '.js-nav-trigger', function() {
  'use strict';
  $('.js-top-search').removeClass('is-open');
  $('.js-top-search-trigg').removeClass('is-active');
  if ($(this).hasClass('is-active')) {
    $(this).removeClass('is-active');
    $('.js-nav-menu').removeClass('is-open');
    $('.js-page').removeClass('has-overlay');
    $('.js-nav-menu').removeAttr('style');
  } else {
    setSideHeight($('.js-nav-menu'));
    $(this).addClass('is-active');
    $('.js-nav-menu').addClass('is-open');
    $('.js-page').addClass('has-overlay');
  }
  if (('.js-prodside.is-open').length) {
    $('.js-top-search-filter-trigger').removeClass('is-active');
    $('.js-prodside').removeClass('is-open');
  }
});



$(document).on('click', '.js-top-search-filter-trigger', function(e) {
  'use strict';
  $('.js-top-search-trigg').removeClass('is-active');
  if ($(this).hasClass('is-active')) {
    $(this).removeClass('is-active');
    $('.js-prodside').removeClass('is-open');
    $('.js-page').removeClass('has-overlay');
    $('.js-prodside').removeAttr('style');
  } else {
    setSideHeight($('.js-prodside'));
    $(this).addClass('is-active');
    $('.js-prodside').addClass('is-open');
    $('.js-page').addClass('has-overlay');
  }


  if (('.js-nav-menu.is-open').length) {
    $('.js-nav-trigger').removeClass('is-active');
    $('.js-nav-menu').removeClass('is-open');
  }
});

$(document).click(function(e) {
  if(!$(e.target).closest('#top-search').length) {
    if($('.js-page').hasClass('has-overlay')) {
      $('.top-search__filter-trigger').removeClass('is-active');
      $('.js-prodside').removeClass('is-open');
      $('.js-page').removeClass('has-overlay');
      $('.js-prodside').removeAttr('style');
    }
  }

});


$(document).on('click', '.js-search-trigg', function() {
  'use strict';
  if (!$('.js-top-search-filter-trigger').length) {
    if ($(this).hasClass('is-active')) {
      $(this).removeClass('is-active');
      $('.js-top-search').removeClass('is-open');
    } else {
      $(this).addClass('is-active');
      $('.js-top-search').addClass('is-open');
      setTimeout(function() {
        $('.js-top-search-input').focus();
      }, 200);
    }
    $('.js-nav-trigger').removeClass('is-active');
    $('.js-nav-menu').removeClass('is-open');
    $('.js-page').removeClass('has-overlay');
  }
  else {
    if ($(this).hasClass('is-active')) {
      $(this).removeClass('is-active');
      $('.js-top-search').removeClass('is-open');
    } else {
      $(this).addClass('is-active');
      $('.js-top-search').addClass('is-open');
      setTimeout(function() {
        $('.js-top-search-input').focus();
      }, 200);
    }
    $('.js-nav-trigger').removeClass('is-active');
    $('.js-nav-menu').removeClass('is-open');
    $('.js-page').removeClass('has-overlay');
  }
});

$(document).on('click', '.js-checkout-services-block-toggle', function() {
  'use strict';
  if ($(this).hasClass('is-active')) {
    $(this).removeClass('is-active');
    $(this).closest('.js-checkout-services-block').find('.js-checkout-services-block-items').removeClass('is-open');
  } else {
    $(this).addClass('is-active');
    $(this).closest('.js-checkout-services-block').find('.js-checkout-services-block-items').addClass('is-open');
  }
});

/*$(document).on('click', '.js-checkout-services-block-item', function() {
  'use strict';
  var selection = $(this).find('.js-checkout-services-block-item-selection').text(),
    price = $(this).find('.js-checkout-services-block-item-price').text(),
    quantity = Number($(this).closest('.js-checkout-services-group').find('.js-checkout-services-product-quantity').data('checkout-services-product-quantity')),
    val = 0,
    total = 0;
  $(this).closest('.js-checkout-services-block-items').find('.js-checkout-services-block-item').removeClass('is-active');
  $(this).addClass('is-active');
  $(this).closest('.js-checkout-services-block').find('.js-checkout-services-block-selection').text(selection);
  if (price.length) {
    $(this).closest('.js-checkout-services-block').find('.js-checkout-services-block-price').text(price+' â‚¬');
    val = price;
  } else {
    $(this).closest('.js-checkout-services-block').find('.js-checkout-services-block-price').text('');
    val = 0;
  }
  total = quantity * val;
  $(this).closest('.js-checkout-services-block').find('.js-checkout-services-block-total').text(total+' â‚¬');
  var total_price = 0;
    $('.service-calculate-price').each(function(index) {
        total_price += parseFloat($(this).text());
    });
    $('.order-total-price').text(total_price.toFixed(2)+' â‚¬');
});*/



//////////// Google Maps ///////

function loadScript() {
  "use strict";
  jQuery.getScript("http://google-maps-utility-library-v3.googlecode.com/svn/trunk/infobubble/src/infobubble.js", function(data, status, jqxhr) {
    var script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&callback=initializeMap';
    document.body.appendChild(script);
  });
}

function initializeMap() {
  "use strict";
  var i = 0,
    long,
    lat,
    mapObj;
  $.each($('.js-shop-map'), function() {
    long = $('.js-shop-map').eq(i).data('long');
    lat = $('.js-shop-map').eq(i).data('lat');
    latlng = new google.maps.LatLng(lat, long);
    var mapZoom = 16,
      myOptions = {
        zoom: mapZoom,
        minZoom: mapZoom - 3,
        maxZoom: mapZoom + 3,
        navigationControl: false,
        scaleControl: true,
        draggable: true,
        center: latlng,
        scrollwheel: false,
        streetViewControl: false,
        panControl: false,
        mapTypeControl: false,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        styles: [{
          "featureType": "landscape",
          "stylers": [{
            "saturation": -100
          }, {
            "lightness": 65
          }, {
            "visibility": "on"
          }]
        }, {
          "featureType": "poi",
          "stylers": [{
            "saturation": -100
          }, {
            "lightness": 51
          }, {
            "visibility": "simplified"
          }]
        }, {
          "featureType": "road.highway",
          "stylers": [{
            "saturation": -100
          }, {
            "visibility": "simplified"
          }]
        }, {
          "featureType": "road.arterial",
          "stylers": [{
            "saturation": -100
          }, {
            "lightness": 30
          }, {
            "visibility": "on"
          }]
        }, {
          "featureType": "road.local",
          "stylers": [{
            "saturation": -100
          }, {
            "lightness": 40
          }, {
            "visibility": "on"
          }]
        }, {
          "featureType": "transit",
          "stylers": [{
            "saturation": -100
          }, {
            "visibility": "simplified"
          }]
        }, {
          "featureType": "administrative.province",
          "stylers": [{
            "visibility": "off"
          }]
        }, {
          "featureType": "water",
          "elementType": "labels",
          "stylers": [{
            "visibility": "on"
          }, {
            "lightness": -25
          }, {
            "saturation": -100
          }]
        }, {
          "featureType": "water",
          "elementType": "geometry",
          "stylers": [{
            "hue": "#ffff00"
          }, {
            "lightness": -25
          }, {
            "saturation": -97
          }]
        }]

      },
      map = new google.maps.Map($('.js-shop-map')[i], myOptions),
      marker = new google.maps.Marker({
        position: latlng,
        map: map
      });
    i++;
  });
}

// $(document).on('click', '.product-subfilter-toggle', function() {
//   'use strict';
//   $(this).next('.checkboxes').find('.product-subfilter-cont').slideToggle(300).toggleClass('open');
//   $(this).find('.plus').toggleClass('collapsed');
//   setTimeout(function() {
//     var i = 1;
//     for (i = 1; i <= totalScrolls; i++) {
//       window['sc' + i].refresh();
//     }
//   }, 500);

// });

// $(document).on('click', '.product-filter-toggle', function() {
//   'use strict';
//   $(this).next('.product-filter-cont').slideToggle(300);
//   $(this).toggleClass('open');
//   $(this).find('.arrow').toggleClass('down');
// });


// $(document).on('click', '.product-tab', function() {
//   'use strict';
//   var tab = $(this).index();
//   $('.product-tab-content').removeClass('active');
//   $(this).parent().find('.product-tab-content').eq(tab).addClass('active');
// });

// $(document).on('click', '.color-toggle', function() {
//   'use strict';
//   $(this).parent().toggleClass('open');
//   $(this).find('.arrow').toggleClass('down');
// });

// $(document).on('click', '.color-cont li', function() {
//   'use strict';
//   var border = ($(this).css('border-color')),
//     background = ($(this).css('background-color'));
//   $(this).parents().eq(2).find('.sel-color').css({
//     'border-color': border,
//     'background-color': background
//   });
//   $(this).parents().eq(2).toggleClass('open');
// });

// $(document).on('click', '.prod-view-switch > div', function() {
//   'use strict';
//   var type = $(this).attr('id').replace('-switch', ''),
//     typeclass = '.' + type;
//   if (!$('.main').hasClass(type)) {
//     $('.prod-view-switch > div').removeClass('active');
//     $('.main').removeClass(type).attr('class', 'cont productlist ' + type);
//     $(this).addClass('active');
//   }
// });

// $(document).on('mouseenter keydown', '.prod-itm-basket-icon', function() {
//   "use strict";
//   fillcol = $(this).find('path').attr('fill');
//   $(this).find('path').attr('fill', '#88C1E0');
// });

// $(document).on('click', '.extra-gr-top', function() {
//   "use strict";
//   $(this).parent().toggleClass('open');
//   $(this).next().slideToggle(300);
// });

// $(document).on('click', '.extra-gr-list li', function() {
//   "use strict";
//   $(this).parent().find('li').removeClass('sel');
//   $(this).addClass('sel');
//   var prodcount = Number($(this).parents().eq(3).find('.extra-quantity span').text()),
//     extraname = $(this).html(),
//     extraprice = Number($(this).find('span').text()),
//     pricecont = $(this).parents().eq(2).find('.extra-gr-price'),
//     namecont = $(this).parents().eq(2).find('.extra-gr-title i'),
//     totalextra = prodcount * extraprice;
//   namecont.empty().append(extraname);
//   pricecont.empty().append(totalextra.toFixed(2));
// });

// $(document).on('click', '.product-avail', function() {
//   "use strict";
//   $(this).toggleClass('open');

// });

// $(document).on('click', '.delivery-cont li', function() {
//   "use strict";
//   $(this).parent().find('li').removeClass('sel');
//   $('.del-address-form').removeClass('active');
//   $(this).addClass('sel');
// });

// $(document).on('click', '.payselect', function() {
//   "use strict";
//   $('.payselect').removeClass('sel');
//   $(this).addClass('sel');
// });

// $(document).on('click', '.delivery-cont > ul > li', function() {
//   "use strict";
//   var id = '.' + $(this).attr('id');
//   $(this).parent().parent().find('div').removeClass('active');
//   $(id).addClass('active');
// });

// $(document).on('click', '.delivery-address-trigger', function() {
//   "use strict";
//   $(this).toggleClass('active');
//   $('.del-address-form').toggleClass('active');
// });

// $(document).on('click', '.scroll-top', function() {
//   "use strict";
//   var iscrollID = $(this).parent().attr('id').replace('scroll', '');
//   window['sc' + iscrollID].prev();
// });

// $(document).on('click', '.scroll-bot', function() {
//   "use strict";
//   var iscrollID = $(this).parent().attr('id').replace('scroll', '');
//   window['sc' + iscrollID].next();
// });

function frontSliders() {
  'use strict';
  frontBig = new Swiper('.js-front-big-slider', {
    wrapperClass: 'js-front-big-wrap',
    slideClass: 'js-front-big-slide',
    slideActiveClass: 'is-active',
    slideDuplicateClass: 'is-duplicate',
    slideNextClass: 'is-next',
    slidePrevClass: 'is-prev',
    bulletActiveClass: 'is-active',
    paginationHiddenClass: 'is-hidden',
    buttonDisabledClass: 'is-disabled',
    paginationCurrentClass: 'is-current',
    slideVisibleClass: 'is-visible',
    pagination: '.js-front-big-bullets',
    bulletClass: 'o-front-big__bullet',
    paginationClickable: true,
    loop: true,
    autoplay: 6000,
    speed: 300,
    spaceBetween: 0,
    slidesPerView: 1,
    observer: true,
    observeParents: true,
    autoplayDisableOnInteraction: false
  });
  frontThumb = new Swiper('.js-front-thumb-slider', {
    wrapperClass: 'js-front-thumb-wrap',
    slideClass: 'js-front-thumb-slide',
    slideActiveClass: 'is-active',
    slideDuplicateClass: 'is-duplicate',
    slideNextClass: 'is-next',
    slidePrevClass: 'is-prev',
    bulletActiveClass: 'is-active',
    paginationHiddenClass: 'is-hidden',
    buttonDisabledClass: 'is-disabled',
    paginationCurrentClass: 'is-current',
    slideVisibleClass: 'is-visible',
    spaceBetween: 4,
    paginationClickable: true,
    slidesPerView: 4,
    breakpoints: {
      320: {
        slidesPerView: 2
      },
      767: {
        slidesPerView: 2
      },
      1024: {
        slidesPerView: 3
      },
    },
    nextButton: '.js-front-thumb-next',
    prevButton: '.js-front-thumb-prev',
    loop: true,
    autoplay: 4000,
    speed: 300,
    observer: true,
    observeParents: true,
    autoplayDisableOnInteraction: false
  });
}

function prodSliders() {
  'use strict';
  var thisSlide;
  prodBig = new Swiper('.js-prod-gall-big-slider', {
    wrapperClass: 'js-prod-gall-big-wrap',
    slideClass: 'js-prod-gall-big-slide',
    slideActiveClass: 'is-active',
    slideDuplicateClass: 'is-duplicate',
    slideNextClass: 'is-next',
    slidePrevClass: 'is-prev',
    bulletActiveClass: 'is-active',
    paginationHiddenClass: 'is-hidden',
    buttonDisabledClass: 'is-disabled',
    paginationCurrentClass: 'is-current',
    slideVisibleClass: 'is-visible',
    pagination: '.js-prod-gall-big-bullets',
    bulletClass: 'o-prod-big__bullet',
    paginationClickable: true,
    observer: true,
    observeParents: true,
    keyboardControl: true,
    mousewheelControl: true,
    simulateTouch: false,
    // centeredSlides: true,
    loop: true,
    speed: 300,
    spaceBetween: 0,
    slidesPerView: 1,
    nextButton: '.js-prod-gall-big-next',
    prevButton: '.js-prod-gall-big-prev'
  });
  prodThumb = new Swiper('.js-prod-gall-thumb-slider', {
    wrapperClass: 'js-prod-gall-thumb-wrap',
    slideClass: 'js-prod-gall-thumb-slide',
    slideActiveClass: 'is-active',
    slideDuplicateClass: 'is-duplicate',
    slideNextClass: 'is-next',
    slidePrevClass: 'is-prev',
    bulletActiveClass: 'is-active',
    paginationHiddenClass: 'is-hidden',
    buttonDisabledClass: 'is-disabled',
    paginationCurrentClass: 'is-current',
    slideVisibleClass: 'is-visible',
    paginationClickable: true,
    slidesPerView: 4,
    spaceBetween: 4,
    loop: true,
    speed: 300
  });
  prodBig.on('SlideChangeEnd', function() {
    thisSlide = $('.js-prod-gall-big-slide.is-active').data('swiper-slide-index');
    $('.js-prod-gall-thumb-slide').removeClass('is-active');
    $('.js-prod-gall-thumb-slide[data-swiper-slide-index="' + thisSlide + '"]').addClass('is-active');
  });

  $(document).on('click', '.js-prod-gall-thumb-slide', function() {
    "use strict";
    $('.js-prod-gall-thumb-slide').removeClass('is-active');
    $(this).removeClass('is-active');
    thisSlide = $(this).data('swiper-slide-index');
    prodBig.slideTo(thisSlide + 1, 300);
  });
}


function priceSlide() {
  'use strict';
  var min = Number($('.price-min').text()),
    max = Number($('.price-max').text()),
    stepsize = (max - min) / 100;
  $(".price-slider").slider({
    range: true,
    values: [0, 100],
    slide: function(e, ui) {
      $('.price-min').text(ui.values[0] * stepsize + min);
      $('.price-max').text(ui.values[1] * stepsize + min);
    }
  });
}

function chatScroller() {
  'use strict';
  chatScroll = new IScroll('.js-chat-scroll', {
    bounceEasing: 'quadratic',
    snap: false,
    scrollX: false,
    scrollY: true,
    mouseWheel: true,
    disableMouse: true,
    scrollbars: false,
    interactiveScrollbars: false,
    momentum: true,
    probeType: 3,
    bounceTime: 100
  });
  chatScroll.scrollTo(0, chatScroll.maxScrollY, 0);
  $(document).on('click', '.js-chat-up', function() {
    chatScroll.scrollBy(0, 30, 100);
  });
  $(document).on('click', '.js-chat-down', function() {
    chatScroll.scrollBy(0, -30, 100);
  });

  $(document).on('click', '.js-chat-close', function() {
    $('.js-drop-chat').removeClass('is-open');
  });
}


function subFilterScrolls() {
  'use strict';
  var i = 0,
    scroll;
  $('.js-side-subfilter-scroll').each(function() {
    if (typeof window['sfs' + i] !== 'undefined' && window['sfs' + i] !== null) {
      window['sfs' + i].refresh();
    } else {
      $(this).attr('data-scroll', 'sfs' + i);
      window['sfs' + i] = new IScroll(this, {
        snap: true,
        scrollX: false,
        scrollY: true,
        disableMouse: false,
        mouseWheel: true,
        momentum: true,
        bounceTime: 100
      });
      i++;
    }
  });

  $(document).on('click', '.js-side-subfilter-up', function() {
    scroll = $(this).closest('.js-side-subfilter-scroll').data('scroll');
    window[scroll].prev();
  });

  $(document).on('click', '.js-side-subfilter-down', function() {
    scroll = $(this).closest('.js-side-subfilter-scroll').data('scroll');
    window[scroll].next();
  });
}

function priceSliders() {
  'use strict';
  var i = 0,
    priceSlider,
    priceSliderID,
    priceSliderName,
    priceMin,
    priceMax,
    priceStart,
    priceEnd,
    vals,
    start,
    end;
  $('.js-price-slider-obj').each(function() {
    priceSliderName = 'ps' + i;
    window[priceSliderName] = $('.js-price-slider-obj')[i];
    $(this).attr('data-price-slider', 'ps' + i);
    priceMin = $(this).data('price-min');
    priceMax = $(this).data('price-max');
    priceStart = $(this).data('price-start');
    priceEnd = $(this).data('price-end');
    noUiSlider.create(window[priceSliderName], {
      start: [priceStart, priceEnd],
      connect: true,
      range: {
        'min': priceMin,
        'max': priceMax
      }
    });
    i++;
  });

  window[priceSliderName].noUiSlider.on('update', function() {
    vals = window[priceSliderName].noUiSlider.get(),
      start = Math.round(vals[0]),
      end = Math.round(vals[1]);
    $(window[priceSliderName]).closest('.js-price-slider').find('.js-price-slider-from').text(start);
    $(window[priceSliderName]).closest('.js-price-slider').find('.js-price-slider-to').text(end);
  });
}

function setSideHeight(side) {
  "use strict";
  var pageH = $('.js-page').outerHeight(),
    sideObj = side,
    sideTop = side.offset().top;
  sideObj.height(pageH - sideTop);
}

function unsetSideHeight() {
  "use strict";
  var pageH = $('.js-page').outerHeight(),
    sideObj = side,
    sideTop = side.offset().top;
  sideObj.height(pageH - sideTop);
}


// MOBILE DETECT
function checkMob(maxW) {
  maxW = maxW || '768'; // default value is 768
  winW = $(window).outerWidth();
  winH = $(window).outerHeight();
  // isMob = (maxW >= winW && (typeof(window.ontouchstart) !== "undefined")); // true of false
  isMob = (maxW >= winW); // true of false
}

}(jQuery));