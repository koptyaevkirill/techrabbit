<!DOCTYPE html>
<html lang="<?php print $language->language ?>">
<head>
	<?php print $head; ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<title><?php print $head_title; ?></title>
	<meta name="yandex-verification" content="384c1ec60bcecca1" />
	<meta name="google-site-verification" content="P9X1x2fzPZTVlbmA3IFfqn1qxre2i-vNraTB8D_4NF0" />
	<?php get_metatag_og_image(); ?>
	<link type="text/css" rel="stylesheet" href="/<?=$directory;?>/style.css" />
	<link type="text/css" rel="stylesheet" href="/<?=$directory;?>/css/stylesheet.css" />
	<?php print $scripts; ?>
	<script type="text/javascript" src="/<?=$directory;?>/js/jquery-1.10.2.min.js"></script>
</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?>>
	<?php print $page_top; ?>
	<?php print $page; ?>
	<?php print $page_bottom; ?>
	<?php print $styles; ?>
	<div class="overlay-loader"><div class="loader"></div>
	<script src="/<?=$directory;?>/js/jquery-ui.js"></script>
	<script type="text/javascript" src="/<?=$directory;?>/js/custom.js"></script>
	<script type="text/javascript" src="/misc/drupal.js"></script>
	<script type="text/javascript" src="/sites/all/modules/commerce_buy_one_click/commerce_buy_one_click.js"></script>
	<link rel="stylesheet" type="text/css" href="/<?=$directory;?>/css/jquery.fancybox-1.3.1.css">
	<script type="text/javascript" src="/<?=$directory;?>/js/plugins.js"></script>
	<script type="text/javascript" src="/<?=$directory;?>/js/frontend.js"></script>
	<script type="text/javascript" src="/<?=$directory;?>/js/amAjaxLogin.js"></script>
	<script type="text/javascript" src="/<?=$directory;?>/js/jquery.form.js"></script>
	<script type="text/javascript" src="/<?=$directory;?>/js/jquery.fancybox-1.3.1.js"></script>
	<script type="text/javascript" src="/<?=$directory;?>/js/jquery.mask.js"></script>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-WBWGK8C');</script>
    <!-- End Google Tag Manager -->
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WBWGK8C"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
	<!-- Yandex.Metrika counter -->
	<script type="text/javascript" >
	    (function (d, w, c) {
	        (w[c] = w[c] || []).push(function() {
	            try {
	                w.yaCounter50445472 = new Ya.Metrika2({
	                    id:50445472,
	                    clickmap:true,
	                    trackLinks:true,
	                    accurateTrackBounce:true,
	                    webvisor:true,
	                    ecommerce:"dataLayer"
	                });
	            } catch(e) { }
	        });

	        var n = d.getElementsByTagName("script")[0],
	            s = d.createElement("script"),
	            f = function () { n.parentNode.insertBefore(s, n); };
	        s.type = "text/javascript";
	        s.async = true;
	        s.src = "https://mc.yandex.ru/metrika/tag.js";

	        if (w.opera == "[object Opera]") {
	            d.addEventListener("DOMContentLoaded", f, false);
	        } else { f(); }
	    })(document, window, "yandex_metrika_callbacks2");
	</script>
	<noscript><div><img src="https://mc.yandex.ru/watch/50445472" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
	<!-- /Yandex.Metrika counter -->
	<script data-skip-moving="true">
	        (function(w,d,u){
	                var s=d.createElement('script');s.async=1;s.src=u+'?'+(Date.now()/60000|0);
	                var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
	        })(window,document,'https://cdn.bitrix24.ru/b8251447/crm/site_button/loader_1_d8b0h8.js');
	</script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-82471255-5"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-82471255-5');
	</script>
</body>
</html>
