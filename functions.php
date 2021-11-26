<?php
	add_action('wp_ajax_get_modal', 'get_modal');
	add_filter( 'gform_form_tag', 'form_tag');
	add_action('wp_enqueue_scripts', 'add_styles');

	function add_styles(){
		wp_enqueue_style( 'bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css');
		wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js');
		wp_enqueue_style( 'style-css', get_template_directory_uri() . '/style.css');

		wp_enqueue_script('main-js', get_template_directory_uri() . '/main.js', array('jquery', 'bootstrap-js'), false, true);
		wp_localize_script( 'main-js', 'ajax', array(
			'url' => admin_url( 'admin-ajax.php')
		) );
	}

	function get_modal(){
		$data = $_POST;

		if(isset($data) && !empty($data)){
			$response = array(
				'title' => 'Titel',
				'content' =>  gravity_form(1, false, false, false, null, true, 0, false),
				'btn_txt' => 'Uploaden',
			);

			echo json_encode($response);
			wp_die();
		}
		return false;
	}

	function form_tag( $form_tag, $form ) {
		if(array_key_exists('HTTP_REFERER', $_SERVER)){
			$referer = explode('/', $_SERVER['HTTP_REFERER']);
			array_pop($referer);
			$slug = end($referer);

			$form_tag = str_replace('wp-admin/admin-ajax.php', $slug . '/', $form_tag);
		}

		return $form_tag;
	}