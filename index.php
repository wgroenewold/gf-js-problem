<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" lang="nl" prefix="og: http://ogp.me/ns#">
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" lang="nl" prefix="og: http://ogp.me/ns#">
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html lang="nl" prefix="og: http://ogp.me/ns#">
<!--<![endif]-->
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">

	<title>
		<?php echo get_the_title() . " - "  . get_bloginfo('name'); ?>
	</title>

	<link rel="icon shortcut" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" type="image/x-icon" />
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>

	<noscript>
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/no-js.css">
	</noscript>
</head>

<body <?php body_class(get_post()->post_name); ?>>



<a href="#" class="btn_modal">CLICK</a>

<?php wp_footer(); ?>

</body>
</html>