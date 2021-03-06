<?php
if ( ! defined( 'ABSPATH' ) ) { exit; }
if(!class_exists('Ultimate_Font_Manager_Param')) {
	class Ultimate_Font_Manager_Param {
		function __construct() {	
			if(function_exists('vc_add_shortcode_param')) {
				vc_add_shortcode_param('ultimate_google_fonts', array($this, 'ultimate_google_fonts_settings'), get_template_directory_uri().'/inc/vc_custom/dfd_vc_addons/admin/vc_extend/js/vc-google-fonts-param.js');
				vc_add_shortcode_param('ultimate_google_fonts_style', array($this, 'ultimate_google_fonts_style_settings'));
			}
		}
	
		function ultimate_google_fonts_settings($settings, $value)
		{
			//$dependency = vc_generate_dependencies_attributes($settings);
			$fonts = get_option('ultimate_selected_google_fonts');
			$html = '<div class="ultimate_google_font_param_block">';
				$html .= '<input type="hidden" name="'.$settings['param_name'].'" class="wpb_vc_param_value vc-ultimate-google-font '.$settings['param_name'].' '.$settings['type'].'_field" value="'.$value.'" />';
				//$html .= '<form class="google-fonts-form">';
				$html .= '<select name="font_family" class="google-font-list">';
				$html .= '<option value="">'.__('Default','ultimate_vc').'</option>';
				if(!empty($fonts)) :
					foreach($fonts as $key => $font)
					{
						$selected = '';
						if($font['font_name'] == $value)
							$selected = 'selected';
						$html .= '<option value="'.$font['font_name'].'" '.$selected.'>'.__($font['font_name'],'ultimate_vc').'</option>';					
					}
				endif;
				$html .= '</select>';
				//$html .= '</form>';
			$html .= '</div>';
			return $html;
		}
		
		function ultimate_google_fonts_style_settings($settings, $value)
		{
			//$dependency = vc_generate_dependencies_attributes($settings);
			$html = '<input type="hidden" name="'.$settings['param_name'].'" class="wpb_vc_param_value ugfont-style-value '.$settings['param_name'].' '.$settings['type'].'_field" value="'.$value.'" />';
			$html .= '<div class="ultimate_fstyle"></div>';
			return $html;
		}
		
	}
}

if(class_exists('Ultimate_Font_Manager_Param')) {
	$Ultimate_Font_Manager_Param = new Ultimate_Font_Manager_Param();
}
