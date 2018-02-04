<?php
   /*
   Plugin Name: MC Email Mock Up Container
   Plugin URI: http://markcormack.co.uk
   Description: a plugin that simply wraps enclosed content in an email mockup use shortcode [mc_emailMockUpContainer to="" subject=""][/mc_emailMockUpContainer]
   Version: 0.1
   Author: Mark Cormack
   Author URI: http://markcormack.co.uk
   License: GPL2
   */
   
   

   
   
/******************* SHORTCODE DISPLAY STUFF *********************/
function mc_add_emailContainer_add_my_css_and_my_js_files(){
        wp_enqueue_style( 'mc_emailMockUpContainer styles', plugins_url('/css/mc_emailMockUpContainer-style.css', __FILE__), false, '1.0.0', 'all');

    }
    //add_action('wp_enqueue_scripts', "mc_shoppableVideos_add_my_css_and_my_js_files");


add_shortcode( 'mc_emailMockUpContainer', 'mc_add_emailContainer_to_frontend_shortcode_func' );

function mc_add_emailContainer_to_frontend_shortcode_func($atts = [], $content = null){ 
	mc_add_emailContainer_add_my_css_and_my_js_files();
	$toField = $atts["to"];
	$subjectField = $atts["subject"];
	if (empty($toField)){
		$toField = "Somebody";
	}
	if (empty($subjectField)){
		$subjectField = "Quick question for you&hellip;";
	}
	
	ob_start();
	
	echo '<div id="mc_emailTemplateCnt" class="col-sm-10 col-sm-offset-1 col-lg-8 col-lg-offset-2">
			<div class="ControlBar">
				<div id="dots"></div>
				<div id="title">New Email</div>
				<div id="sendBtn">
					<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
			 viewBox="0 0 45 25" style="enable-background:new 0 0 45 25;" xml:space="preserve">
					<style type="text/css">
						.st0{fill:#fff;}
					</style>
					<g>
						<g>
							<path class="st0" d="M11.5,12.6c-0.8,0.4-0.8,1,0.1,1.3l2.4,1c0.8,0.3,2.1,0.1,2.8-0.4l10.6-8.3c0.7-0.5,0.8-0.5,0.2,0.2l-8.4,9
								c-0.6,0.6-0.4,1.4,0.4,1.8l0.3,0.1c0.8,0.3,2.2,0.9,3,1.2l2.7,1.1c0.8,0.3,1.5,0.6,1.5,0.6c0,0,0,0,0,0c0,0,0.2-0.7,0.4-1.6
								l4.1-15.1c0.2-0.9-0.2-1.2-1-0.8L11.5,12.6z"/>
						</g>
						<g>
							<path class="st0" d="M18.2,22.5c0,0.1,1.7-2.5,1.7-2.5c0.5-0.7,0.2-1.6-0.6-2l-1.9-0.8c-0.8-0.3-1.2,0.1-0.9,0.9
								C16.5,18.2,18.3,22.4,18.2,22.5z"/>
						</g>
					</g>
					</svg>
				</div>
			</div>
			<div class="fakeDetails">
				<div class="toField"><span class="eleTitle">To:</span><span class="recipients">'.$toField.'</span></div>
				<div class="subjectField"><span class="eleTitle">Subject:</span><span class="recipients">'.$subjectField.'</span></div>
			</div>
			<div class="content">
				'.$content.'
			
			</div>
		</div>
		
		
		';	
	return ob_get_clean();
 }
   
?>