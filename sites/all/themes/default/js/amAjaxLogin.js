function id_ajax(param, funct) {
  var arr = {
      type: 'POST',
      dataType: 'json',
      success: function(msg) {
          Response=msg;
          if (funct!=undefined) {
              funct(msg);
          }
      },
      error:function(msg){
          console.log('Error',msg.responseText);
      }
  };
  jQuery.extend(arr, param);
  arr['url'] = document.location.protocol+'//'+document.location.hostname+arr['url'];
  var Response=false;
  jQuery.ajax(arr);
  return Response;
}
function set_location() {
    var location = '?sort_by='+jQuery('#sort-select').val()+'&items_per_page='+jQuery('a.limit-select.is-active').data('limit');
    window.location.href = location;
}
function get_param(name) {
    return (location.search.split(name + '=')[1] || '').split('&')[0];
}
jQuery(window).ready(function() {
    if (jQuery(window).width() <= '996') { 
        jQuery('.header-phones').click(function() {
            jQuery('#top-phones').slideToggle();
        });
    }
});
var AmAjaxLogin = (function(){
    var win = window, page=0;
    var scroll_on_result=false;
    jQuery(win).ready(function() {
        jQuery('#edit-commerce-buy-one-click-email, #edit-customer-profile-billing-field-profile-phone-und-0-value').mask('+0(000) 000-00-00');
        jQuery('a.limit-'+jQuery('#edit-items-per-page').val()).addClass('is-active');
        jQuery('#sort-select option[value="'+jQuery('#edit-sort-by').val()+'&sort_order='+jQuery('#edit-sort-order').val()+'"]').prop('selected', true);
        jQuery('.side-subfilter__checkbox input[type=checkbox]').change(function(){
            parseFilter();
        });
        jQuery('#sort-select').change(function() {
            set_location();
        });
        jQuery('a.limit-select').click(function() {
            jQuery('a.limit-select').removeClass('is-active');
            jQuery(this).addClass('is-active');
            jQuery('#field-limit').val(jQuery(this).data('limit'));
            set_location();
        });
        AmAjaxLogin.filter.init();
    });

    function loadState(status){
        if(status == 'on'){
            jQuery('#ajax-loader').css('display','block');
        } else if(status == 'off') {
            jQuery('#ajax-loader').css('display','none');
        }
        
    }
    function parseFilter(){
        AmAjaxLogin.query(jQuery('form#search-filter'));
    }
    function setResult(data){
        // jQuery('#pager').remove();
        jQuery('#products-list').html(data);
        loadState('off');
        // jQuery('body,html').animate({scrollTop: jQuery('#middle').offset().top-50}, 800);
    }

    function setResultMore(data){
        jQuery('#search-filter .result-content').append(data);
        loadState('off');
    }

    return {
        openSubscribe: function(){
            jQuery('#subscribe-form').slideToggle();
            return false;
        },
        openSearch: function(){
            // jQuery('#top-search').slideToggle();
            return false;
        },
        addCart: function(){
            jQuery('form.commerce-add-to-cart').submit();
            return false;
        },
        openCart: function(){
            // jQuery('#basket').slideToggle();
            return false;
        },
        buyOneClick: function(){
            jQuery('.commerce-buy-one-click-button.form-submit').click();
            setTimeout(function() {
            	jQuery('form#commerce-buy-one-click-form input').attr('required', 'required');
            }, 2000);
            return false;
        },
        openInfoBlock: function(){
            jQuery('#information-block').slideToggle();
            setTimeout(function(){
                jQuery('#information-block .drops__cont.drops__cont--user').addClass('is-open');
            }, 100);
            return false;
        },
        deleteItemCart: function(id){
            jQuery('#product-'+id+' .delete-line-item').click();
            return false;
        },
        query: function(form){
            loadState('on');
            console.log(jQuery(form).serializeArray());
            // var form = jQuery('form#search-filter');
            console.log(jQuery(form).serializeArray());
            id_ajax({url: jQuery(form).attr('action'), data: jQuery(form).serializeArray(), dataType: 'html'}, setResult);
        },
        more: function(page){
            loadState('on');
            var form = jQuery('form#search-filter');
            jQuery(form).append('<input type="hidden" name="page" value="'+page+'"/>');
            jQuery('.item-list').remove();
            id_ajax({url: jQuery(form).attr('action'), data: jQuery(form).serializeArray(), dataType: 'html'}, setResultMore);
        },
        filter: {
            init: function(){
                this.clear();
            },
            clear: function(){
                jQuery('span#min-price-range').text(10);
                jQuery('span#max-price-range').text('-');
                jQuery('input#min-price-range').val(10);
                jQuery('input#max-price-range').val(99999);
                jQuery( "#price-slider").slider({
                    range: true,
                    values: [ 10, 99999 ],
                    min: 10,
                    max: 99999,
                    step: 100,
                    slide: function(event, ui) {
                        jQuery("span#min-price-range").text(ui.values[0]);
                        jQuery("span#max-price-range").text(ui.values[1]);
                        jQuery("input#min-price-range").val(ui.values[0]);
                        jQuery("input#max-price-range").val(ui.values[1]);
                    },
                    change: function(event, ui){
                        parseFilter();
                    }
                });
            },

            phrase_remove: function(){
                jQuery('.search-phrase').remove();
                parseFilter();
            },

            show_segment: function(container, i){
                var s = '';
                if(parseInt(i))
                    s = '-'+i;
                jQuery(container+' .filter-segment'+s).slideToggle(100);
            }

        }//filter
    }//return

})();