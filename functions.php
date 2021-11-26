<?php
	add_action('wp_ajax_get_modal', 'get_modal');
	add_filter( 'gform_form_tag', 'form_tag');
	add_action('wp_enqueue_scripts', 'add_styles');

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