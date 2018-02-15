<?php
/*
Plugin Name: Creative links for WPBakery Page Builder
Plugin URI: https://www.xyz.com
Description: A plugin to create atractive and effevtive links.
Author: Uttam
Author URI: https://www.xyz.com
Version: 1.0.0
Text Domain: creative-link
*/
if(!class_exists('VC_Creative_link'))
{
	class VC_Creative_link
	{
		function __construct()
		{
			// Enqueue admin style
			add_action('admin_enqueue_scripts', array( $this, 'vc_creative_link_admin_styles' ) );
			// Initialize the icon box component for Visual Composer
			add_action('vc_before_init', array( $this, 'VC_creative_link' ) );
			add_shortcode('creativelink',array( $this, 'VC_creative_link_shortcode'));
		}

		// Enqueue admin styles
		function vc_creative_link_admin_styles()
		{
			wp_enqueue_style('vc-creative-link-admin', plugins_url( '/css/admin.css' , __FILE__ ));
		}

		// Shortcode handler function for stats Icon
		function VC_creative_link_shortcode($atts)
		{
			wp_enqueue_style('vc-creative-link-css', plugins_url( '/css/component.css' , __FILE__ ));
			wp_enqueue_script('vc-creative-link-js', plugins_url( '/js/component.js' , __FILE__ ),false, array( 'jquery' ));
			extract(shortcode_atts( array(

				'btn_link'			 => '',
				'text_color'		 => '#333333',
				'text_hovercolor' 	 => '#555555',
				'background_color'   => '#ffffff',
				'background_hover_color'  => '#fefefe',
				'font_family' 		 => '',
				'heading_style' 	 => '',
				'title_font_size'    => '',
				'title_line_ht'		 => '',
				'link_hover_style'	 =>'',
				'border_style' 		 => 'solid',
				'border_color' 		 => '#333333',
				'border_hovercolor'  => '#333333',
				'border_size' 		 => '1',
				'el_class'  		 => '',
				'dot_color' 		 =>'#333333',
				'css'		         =>'',
				'title'				 =>'',
				'tag_line'			 =>'',
				'text_style'		 =>'center',
				'box_shadow_type'	 =>'inset',
				'shadow_color'		 =>'#587285',
				'shadow_size'		 =>'1',
				'line_border_size'	 =>'2',
				'line_border_color'	 =>'#cccccc',	
			),$atts));

			$href=$target=$text=$url= $alt_text= $rel = "";
			if($btn_link !== ''){
				$href = vc_build_link($btn_link);

				$url 			= ( isset( $href['url'] ) && $href['url'] !== '' ) ? $href['url']  : '';
				$target 		= ( isset( $href['target'] ) && $href['target'] !== '' ) ? esc_attr( trim( $href['target'] ) ) : '';
				$alt_text 		= ( isset( $href['title'] ) && $href['title'] !== '' ) ? esc_attr($href['title']) : '';
				$rel 			= ( isset( $href['rel'] ) && $href['rel'] !== '' ) ? esc_attr($href['rel']) : '';
				
				if($url==''){
					$url="javascript:void(0);";
				}
			}
			else{
				$url="javascript:void(0);";
			}

			// Text alignment
			$text_alignment = "";
			$text_alignment  .= ($text_style !== '') ? ' float:'.$text_style.';' : '';

			$style  = ($text_color !== '') ? ' color:'.$text_color.';' : ' ';
			
			$back_style  = ($background_color !== '') ? ' background-color:'.$background_color.';' : ' ';

			$data_link = '';
			$data_link .= 'data-textcolor='.esc_attr($text_color);
			$data_link .= ' data-texthover='.esc_attr($text_hovercolor);
			$data_link .= ' data-back-color='.esc_attr($background_color).'';
			$data_link .= ' data-back-hover='.esc_attr($background_hover_color).'';

			if('cl-effect-5' == $link_hover_style || 'cl-effect-9' == $link_hover_style || 'cl-effect-11' == $link_hover_style || 'cl-effect-14' == $link_hover_style || 'cl-effect-15' == $link_hover_style || 'cl-effect-16' == $link_hover_style || 'cl-effect-17' == $link_hover_style || 'cl-effect-21' == $link_hover_style){
				$data_link_5 = '';
				$data_link_5 .= 'data-textcolor='.esc_attr($text_color);
				$data_link_5 .= ' data-texthover='.esc_attr($text_hovercolor);
			}

			if( 'cl-effect-19' == $link_hover_style ) {
				$data_link_19 = '';
				$data_link_19 .= 'background:'.esc_attr($background_hover_color);
			}

			switch ( $link_hover_style ) {
				case 'cl-effect-1':
					$output = '<div class="creative_link" style="'.esc_attr( $text_alignment ).'"><div class="'.esc_attr( $link_hover_style ).'"><a style="'.esc_attr($style).'" '.$this->vc_creative_link_checker($url, $target, $alt_text, $rel ).' '.esc_attr( $data_link ).'>'.esc_attr( $title ).'</a></div></div>';
					return $output;
				break;
				case 'cl-effect-2':
					// $output ='<style>
					// .csstransforms3d .cl-effect-2 a:hover span::before, 
					// .csstransforms3d .cl-effect-2 a:focus span::before,
					// .csstransforms3d .cl-effect-2 a span::before {
					// 	background: '.esc_attr( $background_hover_color ).';
					// }
					// </style>';
					$output = '<div class="creative_link csstransforms3d" style="'.esc_attr( $text_alignment ).'"><div class="'.esc_attr( $link_hover_style ).' style="'.esc_attr( $style ).'"><a style="'.esc_attr( $style ).'" '.$this->vc_creative_link_checker($url, $target, $alt_text, $rel ).' '.esc_attr( $data_link ).'><span class="style-2-back" data-hover="'.esc_attr( $title ).'" style="'.esc_attr( $back_style ).'">'.esc_attr( $title ).'</span></a></div></div>';
					return $output;
				break;
				case 'cl-effect-3':
					$data_border = $borderstyle = $after ='';
					$data_border .='border-color:'.$border_color.';';
					$data_border .='border-bottom-width:'.$border_size.'px;';
					$data_border .='border-style:'.$border_style.';';
					$borderstyle .=$data_border; //text color for btm border
					$after .='<span class="creative-link-btm3" style="'.esc_attr($borderstyle).'"></span>';
					$output = '<div class="creative_link" style="'.esc_attr( $text_alignment ).'"><div class="'.esc_attr( $link_hover_style ).'"><a style="'.esc_attr($style).'" '.$this->vc_creative_link_checker($url, $target, $alt_text, $rel ).' '.esc_attr( $data_link ).'>'.esc_attr( $title ).''.$after.'</a></div></div>';
					return $output;
				break;
				case 'cl-effect-4':
					$data_border = $borderstyle = $after ='';
					$data_border .='border-color:'.$border_color.';';
					$data_border .='border-bottom-width:'.$border_size.'px;';
					$data_border .='border-style:'.$border_style.';';
					$borderstyle .=$data_border; //text color for btm border
					$after .='<span class="creative-link-btm4" style="'.esc_attr($borderstyle).'"></span>';
					$output = '<div class="creative_link" style="'.esc_attr( $text_alignment ).'"><div class="'.esc_attr( $link_hover_style ).'"><a style="'.esc_attr($style).'" '.$this->vc_creative_link_checker($url, $target, $alt_text, $rel ).' '.esc_attr( $data_link ).'>'.esc_attr( $title ).''.$after.'</a></div></div>';
					return $output;
				break;
				case 'cl-effect-5':
					$output = '<div class="creative_link" style="'.esc_attr( $text_alignment ).'"><div class="'.esc_attr( $link_hover_style ).'">
					<a '.$this->vc_creative_link_checker($url, $target, $alt_text, $rel ).' style="'.esc_attr( $style ).'" '.esc_attr( $data_link ).'><span data-hover="'.esc_attr( $title ).'">'.esc_attr( $title ).'</span></a>
				</div></div>';
					return $output;
				break;
				case 'cl-effect-6':
					$output = '';
					$rand = rand();
					if('2' !== $line_border_size || '#cccccc' != $line_border_color){
						$output = '<style>
							.creative_link_'.$rand.' .cl-effect-6 a::before {
								width: 100%;
								height: '.esc_attr( $line_border_size ).'px ;
								background: '.esc_attr( $line_border_color ).' ;
							}

							.creative_link_'.$rand.' .cl-effect-6 a::after {
								width: '.esc_attr( $line_border_size ).'px ;
								height: '.esc_attr( $line_border_size ).'px ;
								background: '.esc_attr( $line_border_color ).' ;
							}
						</style>
						';
					}
					$output .= '<div class="creative_link creative_link_'.$rand.'" style="'.esc_attr( $text_alignment ).'"><div class="'.esc_attr( $link_hover_style ).'">
					<a '.$this->vc_creative_link_checker($url, $target, $alt_text, $rel ).' style="'.esc_attr( $style ).'" '.esc_attr( $data_link ).'>'.esc_attr( $title ).'</a>
				</div></div>';
					return $output;
				break;
				case 'cl-effect-7':
					$data_border = $borderstyle = $before = $after ='';
					$data_border .='border-color:'.$border_color.';';
					$data_border .='border-bottom-width:'.$border_size.'px;';
					$data_border .='border-style:'.$border_style.';';
					$borderstyle .=$data_border; //text color for btm border
					$before ='<span class="creative-link-7-top" style="'.esc_attr($borderstyle).'"></span>';
					$after .='<span class="creative-link-7-bottom" style="'.esc_attr($borderstyle).'"></span>';
					$output = '<div class="creative_link" style="'.esc_attr( $text_alignment ).'"><div class="'.esc_attr( $link_hover_style ).'"><a style="'.esc_attr($style).'" '.$this->vc_creative_link_checker($url, $target, $alt_text, $rel ).' '.esc_attr( $data_link ).'>'.$before.''.esc_attr( $title ).''.$after.'</a></div></div>';
					return $output;
				break;
				case 'cl-effect-8':
					$borderhover = $borderstyle = $before = $after ='';
					$borderstyle .='outline-color:'.$border_color.';';
					$borderstyle .='outline-width:'.$border_size.'px;';
					$borderstyle .='outline-style:'.$border_style.';'; //text color for btm border

					$borderhover .='outline-color:'.$border_hovercolor.';';
					$borderhover .='outline-width:'.$border_size.'px;';
					$borderhover .='outline-style:'.$border_style.';'; //text color for btm border
					$before ='<span class="creative-link-8-top" style="'.esc_attr($borderstyle).'"></span>';
					$after .='<span class="creative-link-8-bottom" style="'.esc_attr($borderhover).'"></span>';
					$output = '<div class="creative_link" style="'.esc_attr( $text_alignment ).'"><div class="'.esc_attr( $link_hover_style ).'"><a style="'.esc_attr($style).'" '.$this->vc_creative_link_checker($url, $target, $alt_text, $rel ).' '.esc_attr( $data_link ).'>'.$before.''.esc_attr( $title ).''.$after.'</a></div></div>';
					return $output;
				break;
				case 'cl-effect-9':
					$output = '<div class="creative_link" style="'.esc_attr( $text_alignment ).'"><div class="'.esc_attr( $link_hover_style ).'">
					<a '.$this->vc_creative_link_checker($url, $target, $alt_text, $rel ).' style="'.esc_attr( $style ).'" '.esc_attr( $data_link_5 ).'><span>'.esc_attr( $title ).'</span><span>'.esc_attr( $tag_line ).'</span></a>
				</div></div>';
					return $output;
				break;
				case 'cl-effect-10':

					$rand = rand();
					$output = '<style>
					.creative_link_'.$rand.' .cl-effect-10 a::before {
						background: '.esc_attr( $background_hover_color ).';
					}
					.creative_link_'.$rand.' .cl-effect-10 a span {
						'.esc_attr( $back_style ).';
					}
					</style>';

					$output .= '<div class="creative_link creative_link_'.$rand.' " style="'.esc_attr( $text_alignment ).'"><div class="'.esc_attr( $link_hover_style ).' style="'.esc_attr( $style ).'"><a style="'.esc_attr( $style ).'" '.$this->vc_creative_link_checker($url, $target, $alt_text, $rel ).' '.esc_attr( $data_link ).' data-hover="'.esc_attr( $title ).'"><span class="style-2-back" >'.esc_attr( $title ).'</span></a></div></div>';
					return $output;
				break;
				case 'cl-effect-11':
					$output = '<div class="creative_link" style="'.esc_attr( $text_alignment ).'"><div class="'.esc_attr( $link_hover_style ).'">
					<a '.$this->vc_creative_link_checker($url, $target, $alt_text, $rel ).' style="'.esc_attr( $style ).'" '.esc_attr( $data_link_5 ).' data-hover="'.esc_attr( $title ).'">'.esc_attr( $title ).'</a>
				</div></div>';
					return $output;
				break;
				case 'cl-effect-13':
					$after ='';
					$after .='<span class="creative-link-13-link-bottom" data-color="'.esc_attr($dot_color).'">•</span>';
					$output = '<div class="creative_link" style="'.esc_attr( $text_alignment ).'"><div class="'.esc_attr( $link_hover_style ).'"><a style="'.esc_attr($style).'" '.$this->vc_creative_link_checker($url, $target, $alt_text, $rel ).' '.esc_attr( $data_link ).'>'.esc_attr( $title ).''.$after.'</a></div></div>';
					return $output;
				break;
				case 'cl-effect-14':
					$output = '<div class="creative_link" style="'.esc_attr( $text_alignment ).'"><div class="'.esc_attr( $link_hover_style ).'">
					<a '.$this->vc_creative_link_checker($url, $target, $alt_text, $rel ).' style="'.esc_attr( $style ).'" '.esc_attr( $data_link_5 ).'>'.esc_attr( $title ).'</a>
				</div></div>';
					return $output;
				break;
				case 'cl-effect-15':
					$output = '<div class="creative_link" style="'.esc_attr( $text_alignment ).'"><div class="'.esc_attr( $link_hover_style ).'">
					<a '.$this->vc_creative_link_checker($url, $target, $alt_text, $rel ).' style="'.esc_attr( $style ).'" '.esc_attr( $data_link_5 ).' data-hover="'.esc_attr( $title ).'">'.esc_attr( $title ).'</a>
				</div></div>';
					return $output;
				break;
				case 'cl-effect-16':
					$output = '<div class="creative_link" style="'.esc_attr( $text_alignment ).'"><div class="'.esc_attr( $link_hover_style ).'">
					<a '.$this->vc_creative_link_checker($url, $target, $alt_text, $rel ).' style="'.esc_attr( $style ).'" '.esc_attr( $data_link_5 ).' data-hover="'.esc_attr( $title ).'">'.esc_attr( $title ).'</a>
				</div></div>';
					return $output;
				break;
				case 'cl-effect-17':
					$output = '<div class="creative_link" style="'.esc_attr( $text_alignment ).'"><div class="'.esc_attr( $link_hover_style ).'">
					<a '.$this->vc_creative_link_checker($url, $target, $alt_text, $rel ).' style="'.esc_attr( $style ).'" '.esc_attr( $data_link_5 ).' data-hover="'.esc_attr( $title ).'">'.esc_attr( $title ).'</a>
				</div></div>';
					return $output;
				break;
				case 'cl-effect-18':
					$borderstyle = $before = $after ='';
					$borderstyle .= 'border-top-width:'.$border_size.'px;';
					$borderstyle .= 'border-top-style:'.$border_style.';';
					$borderstyle .= 'border-top-color:'.$border_color.';';
					$before ='<span class="creative-link-18-top" style="'.esc_attr($borderstyle).'"></span>';
					$after .='<span class="creative-link-18-bottom" style="'.esc_attr($borderstyle).'"></span>';
					$output = '<div class="creative_link" style="'.esc_attr( $text_alignment ).'"><div class="'.esc_attr( $link_hover_style ).'"><a style="'.esc_attr($style).'" '.$this->vc_creative_link_checker($url, $target, $alt_text, $rel ).' '.esc_attr( $data_link ).'>'.$before.''.esc_attr( $title ).''.$after.'</a></div></div>';
					return $output;
				break;
				case 'cl-effect-19':
					$output = '<div class="creative_link csstransforms3d" style="'.esc_attr( $text_alignment ).'"><div class="'.esc_attr( $link_hover_style ).'">
					<a '.$this->vc_creative_link_checker($url, $target, $alt_text, $rel ).' style="'.esc_attr( $style ).'" '.esc_attr( $data_link ).'><span data-hover="'.esc_attr( $title ).'" style="'.esc_attr( $data_link_19 ).'" >'.esc_attr( $title ).'</span></a>
				</div></div>';
					return $output;
				break;
				case 'cl-effect-20':
					$output = '<div class="creative_link" style="'.esc_attr( $text_alignment ).'"><div class="'.esc_attr( $link_hover_style ).'">
					<a '.$this->vc_creative_link_checker($url, $target, $alt_text, $rel ).' style="'.esc_attr( $style ).'" '.esc_attr( $data_link ).'><span data-hover="'.esc_attr( $title ).'">'.esc_attr( $title ).'</span></a>
				</div></div>';
					return $output;
				break;
				case 'cl-effect-21':
					$output = '<div class="creative_link" style="'.esc_attr( $text_alignment ).'"><div class="'.esc_attr( $link_hover_style ).'">
					<a '.$this->vc_creative_link_checker($url, $target, $alt_text, $rel ).' style="'.esc_attr( $style ).'" '.esc_attr( $data_link_5 ).'>'.esc_attr( $title ).'</a>
				</div></div>';
					return $output;
				break;
			}
	 	 	
		}
		// Link validation.
		public function vc_creative_link_checker( $url, $target, $link_title, $rel ) {
			$uavc_link_attr = '';
			if($url !== '')
				$uavc_link_attr = 'href="'.$url.'"';
			if($link_title !== '')
				$uavc_link_attr .= 'title="'.$link_title.'"';
			if($target !== '')
				$uavc_link_attr .= 'target="'.$target.'"';
			if($rel !== ''){
				if($target !== '' && $target === '_blank'){
					$uavc_link_attr .= 'rel="'.$rel.' noopener"';
				}
				else {
					$uavc_link_attr .= 'rel="'.$rel.'"';
				}
			}
			else {
				if($target !== '' && $target === '_blank'){
					$uavc_link_attr .= 'rel="noopener"';
				}
			}

			return $uavc_link_attr;
		}
		/* Add icon box Component*/
		function VC_creative_link()
		{
			if ( function_exists('vc_map'))
			{
				vc_map(
					array(
						"name"		=> __("Creative Link", "creative-link"),
						"base"		=> "creativelink",
						// "custom_markup" => "creative-link",
						"icon"		=> "vc_creative_link",
						"class"	   => "creative_link",
						"category"  => __('Creative links', "creative-link"),
						"description" => "Adds attractive Link",
						"controls" => "full",
						"show_settings_on_create" => true,
						"params" => array(
							array(
								"type" => "textfield",
								"class" => "",
								"admin_label" => true,
								"heading" => __("Title", "creative-link"),
								"param_name" => "title",
								"value" => "",
								//"description" => __("Ran out of options? Need more styles? Write your own CSS and mention the class name here.", "creative-link"),
							),
							array(
								"type" => "textfield",
								"class" => "",
								"admin_label" => true,
								"heading" => __("Tag Line", "creative-link"),
								"param_name" => "tag_line",
								"value" => "",
								//"description" => __("Ran out of options? Need more styles? Write your own CSS and mention the class name here.", "creative-link"),
								"dependency" => Array("element" => "link_hover_style","value" => array("cl-effect-9")),
							),
					   		array(
								"type" => "vc_link",
								"class" => "",
								"heading" => __("Link ","creative-link"),
								"param_name" => "btn_link",
								"value" => "",
								"description" => __("Add a custom link or select existing page. You can remove existing link as well.","creative-link"),
								//"group" => "Title Setting",

							),

							
							/*-----------general------------*/
							array(
								"type" => "dropdown",
								"class" => "",
								"admin_label" => true,
								"heading" => __("Link Style", "creative-link"),
								"param_name" => "link_hover_style",
								"value" => array(
									"None"=> "",
									"Style 1"=> "cl-effect-1",
									"Style 2" => "cl-effect-2",
									"Style 3" => "cl-effect-3",
									"Style 4"=> "cl-effect-4",
									"Style 5" => "cl-effect-5",
									"Style 6" => "cl-effect-6",
									"Style 7" => "cl-effect-7",
									"Style 8" => "cl-effect-8",
									"Style 9" => "cl-effect-9",
									"Style 10" => "cl-effect-10",
									"Style 11"=> "cl-effect-11",
									"Style 12" => "cl-effect-12",
									"Style 13" => "cl-effect-13",
									"Style 14"=> "cl-effect-14",
									"Style 15" => "cl-effect-15",
									"Style 16" => "cl-effect-16",
									"Style 17" => "cl-effect-17",
									"Style 18" => "cl-effect-18",
									"Style 19" => "cl-effect-19",
									"Style 20" => "cl-effect-20",
									"Style 21" => "cl-effect-21",
								),
								"description" => __("Select the Hover style for Link.","creative-link"),

							),
							array(
								"type" => "ult_param_heading",
								"param_name" => "button1bg_settng",
								"text" => __("Color Settings", "creative-link"),
								"value" => "",
								"class" => "",
								'edit_field_class' => 'ult-param-heading-wrapper vc_column vc_col-sm-12',
							),
							array(
								"type" => "colorpicker",
								"class" => "",
								"heading" => __("Link Color", "creative-link"),
								"param_name" => "text_color",
								"value" => "#333333",
								"description" => __("Select text color for Link.", "creative-link"),
							),
							array(
								"type" => "colorpicker",
								"class" => "",
								"heading" => __("Link Hover Color", "creative-link"),
								"param_name" => "text_hovercolor",
								"value" => "#333333",
								"description" => __("Select text hover color for Link.", "creative-link"),
								//"dependency" => Array("element" => "link_hover_style","not_empty" => true),

							),
							array(
								"type" => "colorpicker",
								"class" => "",
								"heading" => __("Link Background Color", "creative-link"),
								"param_name" => "background_color",
								"value" => "#ffffff",
								"description" => __("Select Background Color for link.", "creative-link"),
								//"group" => "Title Setting",
								"dependency" => Array("element" => "link_hover_style","value" => array("cl-effect-2","cl-effect-10","cl-effect-19","cl-effect-20","Style_11")),
							),
							array(
								"type" => "colorpicker",
								"class" => "",
								"heading" => __("Link Background Hover Color", "creative-link"),
								"param_name" => "background_hover_color",
								"value" => "",
								"description" => __("Select background hover color for link.", "creative-link"),
								"dependency" => Array("element" => "link_hover_style","value" => array("cl-effect-2","cl-effect-10","cl-effect-19","cl-effect-20","Style_11")),

							),
							array(
								"type" => "dropdown",
								"class" => "",
								"heading" => __("Border Style", "creative-link"),
								"param_name" => "border_style",
								"value" => array(
									/*"None"=> " ",*/
									"Solid"=> "solid",
									"Dashed" => "dashed",
									"Dotted" => "dotted",
									"Double" => "double",
									"Inset" => "inset",
									"Outset" => "outset",

								),
								"description" => __("Select the border style for link.","creative-link"),
								"dependency" => Array("element" => "link_hover_style","value" => array("cl-effect-3","cl-effect-4","cl-effect-7","cl-effect-8","cl-effect-9","cl-effect-11","cl-effect-14","cl-effect-17","cl-effect-18","cl-effect-21")),

							),
							array(
								"type" => "dropdown",
								"class" => "",
								"heading" => __("Box Shadow", "creative-link"),
								"param_name" => "box_shadow_type",
								"value" => array(
									/*"None"=> " ",*/
									"Inset" => "inset",
									"Outset" => "outset",

								),
								"description" => __("Select the box shadow type for link.","creative-link"),
								"dependency" => Array("element" => "link_hover_style","value" => array("cl-effect-20")),

							),
							array(
								"type" => "colorpicker",
								"class" => "",
								"heading" => __("Shadow Color", "creative-link"),
								"param_name" => "shadow_color",
								"value" => "#587285",
								"description" => __("Select box shadow color for link.", "creative-link"),
								//"dependency" => Array("element" => "border_style", "not_empty" => true),
								"dependency" => Array("element" => "box_shadow_type", "value" => array("inset","outset")),
							),
							array(
								"type" => "number",
								"class" => "",
								"heading" => __("Shadow Width", "creative-link"),
								"param_name" => "shadow_size",
								"value" => 1,
								"min" => 1,
								"max" => 10,
								"suffix" => "px",
								"description" => __("Thickness of the Shadow.", "creative-link"),
								//"dependency" => Array("element" => "border_style", "not_empty" => true),
								"dependency" => Array("element" => "box_shadow_type", "value" => array("inset","outset")),

							),
							array(
								"type" => "colorpicker",
								"class" => "",
								"heading" => __("Link Border Color", "creative-link"),
								"param_name" => "border_color",
								"value" => "#333333",
								"description" => __("Select border color for link.", "creative-link"),
								//"dependency" => Array("element" => "border_style", "not_empty" => true),
								"dependency" => Array("element" => "border_style", "value" => array("solid","dashed","dotted","double","inset","outset")),

							),
							array(
								"type" => "colorpicker",
								"class" => "",
								"heading" => __("Link Border HoverColor", "creative-link"),
								"param_name" => "border_hovercolor",
								"value" => "#333333",
								"description" => __("Select border hover color for link.", "creative-link"),
								"dependency" => Array(
									"element"=>"link_hover_style","value" => array("cl-effect-8","cl-effect-11"),
									/*"element" => "border_style",  "not_empty" => true*/ ),

							),
							array(
								"type" => "number",
								"class" => "",
								"heading" => __("Link Border Width", "creative-link"),
								"param_name" => "border_size",
								"value" => 1,
								"min" => 1,
								"max" => 10,
								"suffix" => "px",
								"description" => __("Thickness of the border.", "creative-link"),
								//"dependency" => Array("element" => "border_style", "not_empty" => true),
								"dependency" => Array("element" => "border_style", "value" => array("solid","dashed","dotted","double","inset","outset")),

							),
							array(
								"type" => "colorpicker",
								"class" => "",
								"heading" => __("Link Dot Color", "creative-link"),
								"param_name" => "dot_color",
								"value" => "#333333",
								"description" => __("Select color for dots.", "creative-link"),
								"dependency" => Array("element"=>"link_hover_style","value" => array("cl-effect-13")),
							),
							array(
								"type" => "number",
								"class" => "",
								"heading" => __("Border Line Width", "creative-link"),
								"param_name" => "line_border_size",
								"value" => 2,
								"min" => 1,
								"max" => 10,
								"suffix" => "px",
								"description" => __("Thickness of the border line.", "creative-link"),
								//"dependency" => Array("element" => "border_style", "not_empty" => true),
								"dependency" => Array(
									"element"=>"link_hover_style","value" => array("cl-effect-6"),
												)
							),
							array(
							"type" => "colorpicker",
							"class" => "",
							"heading" => __("Border Line Color", "creative-link"),
							"param_name" => "line_border_color",
							"value" => "#cccccc",
							"description" => __("Select border line color for link.", "creative-link"),
							//"dependency" => Array("element" => "border_style", "not_empty" => true),
							"dependency" => Array(
								"element"=>"link_hover_style","value" => array("cl-effect-6"),
											)
							),
							array(
								"type" => "dropdown",
								"class" => "",
								"heading" => __("Link Alignment", "creative-link"),
								"param_name" => "text_style",
								"value" => array(
									"Center"=> " ",
									"Left"=> "left",
									"Right" => "right",

								),
								"description" => __("Select the text align for link.","creative-link"),
								//"group" => "Typography ",
							),
						) // end params array
					) // end vc_map array
				); // end vc_map
			} // end function check 'vc_map'
		}// end function icon_box_init
	}//Class end
}
if(class_exists('VC_Creative_link'))
{
	$VC_Creative_link = new VC_Creative_link;
}



