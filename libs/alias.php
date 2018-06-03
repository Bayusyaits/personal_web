<?php

//aliases
function response_dyn_menu($data = [], $for = '', $object = ''){
	$content = [];
	if(isset($data) && !empty($data) && $for == '' && $object == 'get'){
		foreach ($data as $key => $value) {
			# code...
			$content[$key]['menu_id'] = $data[$key]['dm_id'];
			$content[$key]['menu_name'] = $data[$key]['dm_name'];
			$content[$key]['menu_url'] = $data[$key]['dm_url'];
			$content[$key]['menu_uri'] = $data[$key]['dm_uri'];
			$content[$key]['menu_initial'] = $data[$key]['dm_initial'];
			$content[$key]['menu_keyword'] = $data[$key]['dm_keyword'];
		}
	}else {
		$content['menu_id'] = '';
		$content['menu_name'] = '';
		$content['menu_url'] = '';
		$content['menu_uri'] = '';
		$content['menu_initial'] = '';
		$content['menu_keyword'] = '';
	}
	return $content;
}

//aliases
function response_mr_media($data = [], $for = '', $object = ''){
	$content = [];
	if(isset($data) && !empty($data) && $for == 'join|dyn_menu' && $object == 'get'){
		foreach ($data as $key => $value) {
			# code...
			//mr_media
			$content[$key]['media_id'] = $data[$key]['mm_id'];
			$content[$key]['media_alt'] = $data[$key]['mm_alt'];
			$content[$key]['media_initial'] = $data[$key]['mm_initial'];
			$content[$key]['media_name'] = $data[$key]['mm_name'];
			$content[$key]['media_parent_id'] = $data[$key]['mm_parent_id'];
			$content[$key]['media_src'] = $data[$key]['mm_src'];		
			$content[$key]['media_url'] = $data[$key]['mm_url'];
			$content[$key]['media_create_at'] = $data[$key]['mm_create_at'];
			$content[$key]['media_update_at'] = $data[$key]['mm_update_at'];	
			//dyn_menu
			$content[$key]['menu_id'] = $data[$key]['dm_id'];
			$content[$key]['menu_name'] = $data[$key]['dm_name'];
			$content[$key]['menu_url'] = $data[$key]['dm_url'];
			$content[$key]['menu_uri'] = $data[$key]['dm_uri'];
			$content[$key]['menu_initial'] = $data[$key]['dm_initial'];
			$content[$key]['menu_keyword'] = $data[$key]['dm_keyword'];
		}
	}if(isset($data) && !empty($data) && $for == 'join|dyn_menu' && $object == 'first'){
		foreach ($data as $key => $value) {
			# code...
			//mr_media
			$content['media_id'] = $data['mm_id'];
			$content['media_alt'] = $data['mm_alt'];
			$content['media_initial'] = $data['mm_initial'];
			$content['media_name'] = $data['mm_name'];
			$content['media_parent_id'] = $data['mm_parent_id'];
			$content['media_src'] = $data['mm_src'];
			$content['media_url'] = $data['mm_url'];
			$content['media_create_at'] = $data['mm_create_at'];
			$content['media_update_at'] = $data['mm_update_at'];
			//dyn_menu
			$content['menu_id'] = $data['dm_id'];
			$content['menu_name']	= $data['dm_name'];
			$content['menu_caption'] = $data['dm_initial'];
			$content['menu_keyword'] = $data['dm_keyword'];
			$content['menu_url'] = $data['dm_url'];
			$content['menu_uri'] = $data['dm_uri'];
		}
	}else if(isset($data) && !empty($data) && $object == 'get'){
		foreach ($data as $key => $value) {
			# code...
			//mr_media
			$content[$key]['media_id'] = $data[$key]['mm_id'];
			$content[$key]['media_alt'] = $data[$key]['mm_alt'];
			$content[$key]['media_initial'] = $data[$key]['mm_initial'];
			$content[$key]['media_name'] = $data[$key]['mm_name'];
			$content[$key]['media_parent_id'] = $data[$key]['mm_parent_id'];
			$content[$key]['media_src'] = $data[$key]['mm_src'];	
			$content[$key]['media_url'] = $data[$key]['mm_url'];	
			$content[$key]['media_create_at'] = $data[$key]['mm_create_at'];
			$content[$key]['media_update_at'] = $data[$key]['mm_update_at'];	
		}
	}else if(isset($data) && !empty($data) && $object == 'first'){
		foreach ($data as $key => $value) {
			# code...
			//mr_media
			$content['media_id'] = $data['mm_id'];
			$content['media_alt'] = $data['mm_alt'];
			$content['media_initial'] = $data['mm_initial'];
			$content['media_name'] = $data['mm_name'];
			$content['media_parent_id'] = $data['mm_parent_id'];
			$content['media_src'] = $data['mm_src'];
			$content['media_url'] = $data['mm_url'];
			$content['media_create_at'] = $data['mm_create_at'];
			$content['media_update_at'] = $data['mm_update_at'];	
		}
	}else {
		//mr_media
		$content['media_id'] = '';
		$content['media_alt'] = '';
		$content['media_initial'] = '';
		$content['media_name'] = '';
		$content['media_parent_id'] = '';
		$content['media_src'] = '';	
		$content['media_url'] = '';
		$content['media_create_at'] = '';
		$content['media_update_at'] = '';
		//dyn_menu
		$content['menu_id'] = '';
		$content['menu_name'] = '';
		$content['menu_url'] = '';
		$content['menu_uri'] = '';
		$content['menu_initial'] = '';
		$content['menu_keyword'] = '';

	}
	return $content;
}

function response_mr_categories($data = [], $for = '', $object = '') {
	$content = [];
	if(isset($data) && !empty($data) && $for == 'join|dm_menu' && $object == 'get'){
		foreach ($data as $key => $value) {
			# code...
			$content[$key]['category_id'] = $data[$key]['mc_id'];
			$content[$key]['category_menu_id'] = $data[$key]['mc_dm_id'];
			$content[$key]['category_type'] = $data[$key]['mc_type'];
			$content[$key]['category_name'] = $data[$key]['mc_name'];
			$content[$key]['category_initial'] = $data[$key]['mc_initial'];
			$content[$key]['category_parent'] = $data[$key]['mc_is_parent'];
			$content[$key]['category_parent_id']= $data[$key]['mc_parent_id'];
			$content[$key]['menu_id'] 			= $data[$key]['dm_id'];
			$content[$key]['menu_name'] 		= $data[$key]['dm_name'];
		}
	}if(isset($data) && !empty($data)){
		foreach ($data as $key => $value) {
			# code...
			$content[$key]['category_id'] = $data[$key]['mc_id'];
			$content[$key]['category_menu_id'] = $data[$key]['mc_dm_id'];
			$content[$key]['category_type'] = $data[$key]['mc_type'];
			$content[$key]['category_name'] = $data[$key]['mc_name'];
			$content[$key]['category_initial'] = $data[$key]['mc_initial'];
			$content[$key]['category_parent'] = $data[$key]['mc_is_parent'];
			$content[$key]['category_parent_id']= $data[$key]['mc_parent_id'];
		}
	}else {
		$content['category_id'] = '';
		$content['category_menu_id'] = '';
		$content['category_type'] = '';
		$content['category_name'] = '';
		$content['category_initial'] = '';
		$content['category_parent'] = '';
		$content['category_parent_id']= '';
		$content['menu_id'] 			= '';
		$content['menu_name'] 		= '';
	}
	return $content;
}
function response_mr_content_management($data = [], $for = '', $object = ''){
	$content = [];
	if(isset($data) && !empty($data) && $for == 'join|dm_menu|mr_text_posts|mr_media' && $object == 'first'){
			//mr_content_management
			$content['content_id'] = $data['mcm_id'];
			$content['content_menu_id'] = $data['mcm_dm_id'];
			$content['content_category_id'] = $data['mcm_mc_id'];
			$content['content_media_id'] = $data['mcm_mm_id'];
			$content['content_text_id'] = $data['mcm_mtp_id'];
			$content['content_create_at'] = $data['mcm_create_at'];
			$content['content_parent_id'] = $data['mcm_parent_id'];
			//dyn_menu
			$content['menu_id'] = $data['dm_id'];
			$content['menu_name']	= $data['dm_name'];
			$content['menu_caption'] = $data['dm_initial'];
			$content['menu_keyword'] = $data['dm_keyword'];
			$content['menu_url'] = $data['dm_url'];
			$content['menu_uri'] = $data['dm_uri'];
			//mr_text_post
			$content['text_id'] = $data['mtp_id'];
			$content['text_initial'] = $data['mtp_initial'];
			$content['text_keyword'] = $data['mtp_keyword'];
			$content['text_title_id'] = $data['mtp_title_id'];
			$content['text_title_en'] = $data['mtp_title_en'];
			$content['text_caption_en'] = nl2br(e($data['mtp_caption_en']));
			$content['text_caption_id'] = nl2br(e($data['mtp_caption_id']));
			$content['text_content_en'] = nl2br(e($data['mtp_content_en']));
			$content['text_content_id'] = nl2br(e($data['mtp_content_id']));
			$content['text_parent_id'] = $data['mtp_parent_id'];
			$content['text_media_id'] = $data['mtp_mm_id'];
			$content['text_url'] = $data['mtp_url'];
			//mr_media
			$content['media_id'] = $data['mm_id'];
			$content['media_alt'] = $data['mm_alt'];
			$content['media_initial'] = $data['mm_initial'];
			$content['media_name'] = $data['mm_name'];
			$content['media_parent_id'] = $data['mm_parent_id'];
			$content['media_src'] = $data['mm_src'];
			$content['media_url'] = $data['mm_url'];
			$content['media_create_at'] = $data['mm_create_at'];
			$content['media_update_at'] = $data['mm_update_at'];		
	}else if(isset($data) && !empty($data) && $for == 'join|dm_menu|mr_text_posts|mr_media|mr_categories' && $object == 'first'){
			//mr_content_management
			$content['content_id'] = $data['mcm_id'];
			$content['content_menu_id'] = $data['mcm_dm_id'];
			$content['content_category_id'] = $data['mcm_mc_id'];
			$content['content_media_id'] = $data['mcm_mm_id'];
			$content['content_text_id'] = $data['mcm_mtp_id'];
			$content['content_create_at'] = $data['mcm_create_at'];
			$content['content_parent_id'] = $data['mcm_parent_id'];
			//dyn_menu
			$content['menu_id'] = $data['dm_id'];
			$content['menu_name']	= $data['dm_name'];
			$content['menu_caption'] = $data['dm_initial'];
			$content['menu_keyword'] = $data['dm_keyword'];
			$content['menu_url'] = $data['dm_url'];
			$content['menu_uri'] = $data['dm_uri'];
			//mr_categories
			$content['category_id'] = $data['mc_id'];
			$content['category_menu_id'] = $data['mc_dm_id'];
			$content['category_type'] = $data['mc_type'];
			$content['category_name'] = $data['mc_name'];
			$content['category_initial'] = $data['mc_initial'];	
			//mr_text_post
			$content['text_id'] = $data['mtp_id'];
			$content['text_initial'] = $data['mtp_initial'];
			$content['text_keyword'] = $data['mtp_keyword'];
			$content['text_title_id'] = $data['mtp_title_id'];
			$content['text_title_en'] = $data['mtp_title_en'];
			$content['text_caption_en'] = nl2br(e($data['mtp_caption_en']));
			$content['text_caption_id'] = nl2br(e($data['mtp_caption_id']));
			$content['text_content_en'] = nl2br(e($data['mtp_content_en']));
			$content['text_content_id'] = nl2br(e($data['mtp_content_id']));
			$content['text_parent_id'] = $data['mtp_parent_id'];
			$content['text_media_id'] = $data['mtp_mm_id'];
			$content['text_url'] = $data['mtp_url'];
			//mr_media
			$content['media_id'] = $data['mm_id'];
			$content['media_alt'] = $data['mm_alt'];
			$content['media_initial'] = $data['mm_initial'];
			$content['media_name'] = $data['mm_name'];
			$content['media_parent_id'] = $data['mm_parent_id'];
			$content['media_src'] = $data['mm_src'];
			$content['media_url'] = $data['mm_url'];
			$content['media_create_at'] = $data['mm_create_at'];
			$content['media_update_at'] = $data['mm_update_at'];
				
	}else if(isset($data) && !empty($data) && $for == 'join|dm_menu|mr_text_posts|mr_media|mr_categories' && $object == 'get'){
		foreach ($data as $key => $value) {
			//mr_content_management
			$content[$key]['content_id'] = $data[$key]['mcm_id'];
			$content[$key]['content_menu_id'] = $data[$key]['mcm_dm_id'];
			$content[$key]['content_category_id'] = $data[$key]['mcm_mc_id'];
			$content[$key]['content_media_id'] = $data[$key]['mcm_mm_id'];
			$content[$key]['content_text_id'] = $data[$key]['mcm_mtp_id'];
			$content[$key]['content_create_at'] = $data[$key]['mcm_create_at'];
			$content[$key]['content_parent_id'] = $data[$key]['mcm_parent_id'];
			//dyn_menu
			$content[$key]['menu_id'] = $data[$key]['dm_id'];
			$content[$key]['menu_name'] = $data[$key]['dm_name'];
			$content[$key]['menu_url'] = $data[$key]['dm_url'];
			$content[$key]['menu_uri'] = $data[$key]['dm_uri'];
			$content[$key]['menu_initial'] = $data[$key]['dm_initial'];
			$content[$key]['menu_keyword'] = $data[$key]['dm_keyword'];
			//mr_categories
			$content[$key]['category_id'] = $data[$key]['mc_id'];
			$content[$key]['category_menu_id'] = $data[$key]['mc_dm_id'];
			$content[$key]['category_type'] = $data[$key]['mc_type'];
			$content[$key]['category_name'] = $data[$key]['mc_name'];
			$content[$key]['category_initial'] = $data[$key]['mc_initial'];
			//mr_text_post
			$content[$key]['text_id'] = $data[$key]['mtp_id'];
			$content[$key]['text_initial'] = $data[$key]['mtp_initial'];
			$content[$key]['text_keyword'] = $data[$key]['mtp_keyword'];
			$content[$key]['text_title_id'] = $data[$key]['mtp_title_id'];
			$content[$key]['text_title_en'] = $data[$key]['mtp_title_en'];
			$content[$key]['text_caption_en'] = nl2br(e($data[$key]['mtp_caption_en']));
			$content[$key]['text_caption_id'] = nl2br(e($data[$key]['mtp_caption_id']));
			$content[$key]['text_content_en'] = nl2br(e($data[$key]['mtp_content_en']));
			$content[$key]['text_content_id'] = nl2br(e($data[$key]['mtp_content_id']));
			$content[$key]['text_parent_id'] = $data[$key]['mtp_parent_id'];
			$content[$key]['text_media_id'] = $data[$key]['mtp_mm_id'];
			$content[$key]['text_url'] = $data[$key]['mtp_url'];
			//mr_media
			$content[$key]['media_id'] = $data[$key]['mm_id'];
			$content[$key]['media_alt'] = $data[$key]['mm_alt'];
			$content[$key]['media_initial'] = $data[$key]['mm_initial'];
			$content[$key]['media_name'] = $data[$key]['mm_name'];
			$content[$key]['media_parent_id'] = $data[$key]['mm_parent_id'];
			$content[$key]['media_src'] = $data[$key]['mm_src'];		
			$content[$key]['media_url'] = $data[$key]['mm_url'];
			$content[$key]['media_create_at'] = $data[$key]['mm_create_at'];
			$content[$key]['media_update_at'] = $data[$key]['mm_update_at'];	
		}
	}else if(isset($data) && !empty($data) && $for == 'join|dm_menu|mr_text_posts|mr_media' && $object == 'get'){
		foreach ($data as $key => $value) {
			//mr_content_management
			$content[$key]['content_id'] = $data[$key]['mcm_id'];
			$content[$key]['content_menu_id'] = $data[$key]['mcm_dm_id'];
			$content[$key]['content_category_id'] = $data[$key]['mcm_mc_id'];
			$content[$key]['content_media_id'] = $data[$key]['mcm_mm_id'];
			$content[$key]['content_text_id'] = $data[$key]['mcm_mtp_id'];
			$content[$key]['content_create_at'] = $data[$key]['mcm_create_at'];
			$content[$key]['content_parent_id'] = $data[$key]['mcm_parent_id'];
			//dyn_menu
			$content[$key]['menu_id'] = $data[$key]['dm_id'];
			$content[$key]['menu_name'] = $data[$key]['dm_name'];
			$content[$key]['menu_url'] = $data[$key]['dm_url'];
			$content[$key]['menu_uri'] = $data[$key]['dm_uri'];
			$content[$key]['menu_initial'] = $data[$key]['dm_initial'];
			$content[$key]['menu_keyword'] = $data[$key]['dm_keyword'];
			//mr_text_post
			$content[$key]['text_id'] = $data[$key]['mtp_id'];
			$content[$key]['text_initial'] = $data[$key]['mtp_initial'];
			$content[$key]['text_keyword'] = $data[$key]['mtp_keyword'];
			$content[$key]['text_title_id'] = $data[$key]['mtp_title_id'];
			$content[$key]['text_title_en'] = $data[$key]['mtp_title_en'];
			$content[$key]['text_caption_en'] = nl2br(e($data[$key]['mtp_caption_en']));
			$content[$key]['text_caption_id'] = nl2br(e($data[$key]['mtp_caption_id']));
			$content[$key]['text_content_en'] = nl2br(e($data[$key]['mtp_content_en']));
			$content[$key]['text_content_id'] = nl2br(e($data[$key]['mtp_content_id']));
			$content[$key]['text_parent_id'] = $data[$key]['mtp_parent_id'];
			$content[$key]['text_media_id'] = $data[$key]['mtp_mm_id'];
			$content[$key]['text_url'] = $data[$key]['mtp_url'];
			//mr_media
			$content[$key]['media_id'] = $data[$key]['mm_id'];
			$content[$key]['media_alt'] = $data[$key]['mm_alt'];
			$content[$key]['media_initial'] = $data[$key]['mm_initial'];
			$content[$key]['media_name'] = $data[$key]['mm_name'];
			$content[$key]['media_parent_id'] = $data[$key]['mm_parent_id'];
			$content[$key]['media_src'] = $data[$key]['mm_src'];	
			$content[$key]['media_url'] = $data[$key]['mm_url'];
			$content[$key]['media_create_at'] = $data[$key]['mm_create_at'];
			$content[$key]['media_update_at'] = $data[$key]['mm_update_at'];			
		}
	}else if(isset($data) && !empty($data) && $for == 'join|dm_menu' && $object == 'get'){
		foreach ($data as $key => $value) {
			//mr_content_management
			$content[$key]['content_id'] = $data[$key]['mcm_id'];
			$content[$key]['content_menu_id'] = $data[$key]['mcm_dm_id'];
			$content[$key]['content_category_id'] = $data[$key]['mcm_mc_id'];
			$content[$key]['content_media_id'] = $data[$key]['mcm_mm_id'];
			$content[$key]['content_text_id'] = $data[$key]['mcm_mtp_id'];
			$content[$key]['content_create_at'] = $data[$key]['mcm_create_at'];
			$content[$key]['content_parent_id'] = $data[$key]['mcm_parent_id'];
			//dyn_menu
			$content[$key]['menu_id'] = $data[$key]['dm_id'];
			$content[$key]['menu_name'] = $data[$key]['dm_name'];
			$content[$key]['menu_url'] = $data[$key]['dm_url'];
			$content[$key]['menu_uri'] = $data[$key]['dm_uri'];
			$content[$key]['menu_initial'] = $data[$key]['dm_initial'];
			$content[$key]['menu_keyword'] = $data[$key]['dm_keyword'];
		}
	}else if(isset($data) && !empty($data) && $object == 'get'){
		foreach ($data as $key => $value) {
			//mr_content_management
			$content[$key]['content_id'] = $data[$key]['mcm_id'];
			$content[$key]['content_menu_id'] = $data[$key]['mcm_dm_id'];
			$content[$key]['content_category_id'] = $data[$key]['mcm_mc_id'];
			$content[$key]['content_media_id'] = $data[$key]['mcm_mm_id'];
			$content[$key]['content_text_id'] = $data[$key]['mcm_mtp_id'];
			$content[$key]['content_create_at'] = $data[$key]['mcm_create_at'];
			$content[$key]['content_parent_id'] = $data[$key]['mcm_parent_id'];
		}
	}else if(isset($data) && !empty($data)){
		$content['content_id'] = $data['mcm_id'];
		$content['content_menu_id'] = $data['mcm_dm_id'];
		$content['content_category_id'] = $data['mcm_mc_id'];
		$content['content_media_id'] = $data['mcm_mm_id'];
		$content['content_text_id'] = $data['mcm_mtp_id'];
		$content['content_create_at'] = $data['mcm_create_at'];
		$content['content_parent_id'] = $data['mcm_parent_id'];
	}else {
		//mr_content_management
			$content['content_id'] = '';
			$content['content_menu_id'] = '';
			$content['content_category_id'] = '';
			$content['content_media_id'] = '';
			$content['content_text_id'] = '';
			$content['content_create_at'] = '';
			$content['content_parent_id'] = '';
			//dyn_menu
			$content['menu_id'] = '';
			$content['menu_name'] = '';
			$content['menu_url'] = '';
			$content['menu_uri'] = '';
			$content['menu_initial'] = '';
			$content['menu_keyword'] = '';
			//mr_categories
			$content['category_id'] = '';
			$content['category_menu_id'] = '';
			$content['category_type'] = '';
			$content['category_name'] = '';
			$content['category_initial'] = '';
			//mr_text_post
			$content['text_id'] = '';
			$content['text_initial'] = '';
			$content['text_keyword'] = '';
			$content['text_title_id'] = '';
			$content['text_title_en'] = '';
			$content['text_caption_en'] = '';
			$content['text_caption_id'] = '';
			$content['text_content_en'] = '';
			$content['text_content_id'] = '';
			$content['text_parent_id'] = '';
			$content['text_media_id'] = '';
			$content['text_url'] = '';
			//mr_media
			$content['media_id'] = '';
			$content['media_alt'] = '';
			$content['media_initial'] = '';
			$content['media_name'] = '';
			$content['media_parent_id'] = '';
			$content['media_src'] = '';	
			$content['media_url'] = '';
			$content['media_create_at'] = '';
			$content['media_update_at'] = '';
	}
	return $content;
}