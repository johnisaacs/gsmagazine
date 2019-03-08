<?php global $data; ?>
<!DOCTYPE html>


<!-- BEGIN html -->
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<!-- BEGIN head -->
<head>

	<!-- Meta Tags -->
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<!-- Title -->
	<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?><?php echo ' | '; ?><?php bloginfo('description'); ?></title>

    <!--Favicon code-->
     <link rel="shortcut icon" href="http://cdn.georgiasouthern.edu/img/icons/favicon.ico" />	  

    <!-- 1140px Grid styles for IE -->
	<!--[if lte IE 9]><link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/ie.css" type="text/css" media="screen" /><![endif]-->

	<!--add css for different pages-->
	<?php include 'includes/additional-css.php'; // include the slider ?>

	<!--Color CSS-->
	<?php $primary_color = $data['primary_color'];?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/color.php?color=<?php echo substr($primary_color,1) ?>" type="text/css" media="screen" />

    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/style_load.php" type="text/css" media="screen" />
    
    <?php 
		$data['response'] = 0;
		if($data['response'] != '1'): 
	?>
    	<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/response.css" type="text/css" media="screen" />
    <?php else: ?>
    	<style type="text/css">
			.inner_wrap, .footer_inner {
			  width: 1034px !important;
			}
		</style>
    <?php endif; ?>  
	   
    <!-- Theme Hook -->
	<?php wp_head(); ?>
<?php include_once('../web_templates/globalanalytics.php'); ?>	

</head><!-- END head -->

<!-- BEGIN body -->
<body <?php body_class(); ?>>
	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P3L37W"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->
    
    <div class="wrap container">
    
    	<div class="inner_wrap row">
        
        <div id="header" class="clearfix">
                         	
                  <div class="header-top main clearfix">
                  	
                      <div id="header-nav">
                          <?php if ( has_nav_menu( 'header-top-menu' ) ) { /* if menu location 'primary-menu' exists then use custom menu */ ?>
                          <?php wp_nav_menu( array( 'menu_id'=>'top_main','theme_location' => 'header-top-menu','walker' => '') ); ?>
                          <?php } else { /* else use wp_list_categories */
                          ?>
                          <ul>
                              <?php wp_list_pages(array( 'title_li' => '')); ?>
                          </ul>
                          <?php } ?>
                              
                      </div>
                      
                      <!--BEGIN #searchform-->
                      <form method="get" class="searchform alignright" action="<?php echo home_url(); ?>/">
                          <input type="text" name="s" class="s" value="" placeholder="<?php _e('Search', 'jd_framework') ?>" />
                          <input type="submit" class="searchsubmit" value="<?php _e('go', 'jd_framework') ?>">
                      </form><!--END #searchform-->
                  
                  </div> <!--header-top-->


                  <div class="header-top mobile clearfix">
                  	
                      <div class="mobile_cont clearfix">
                      
                          <div id="header-nav-mobile">
                              <?php if ( has_nav_menu( 'header-top-menu' ) ) { /* if menu location 'primary-menu' exists then use custom menu */ ?>
                              <?php wp_nav_menu( array('menu_id'=>'top_mobile','theme_location' => 'header-top-menu','walker' => '') ); ?>
                              <?php } else { /* else use wp_list_categories */
                              ?>
                              <ul>
                                  <?php wp_list_pages(array( 'title_li' => '')); ?>
                              </ul>
                              <?php } ?>
                                  
                          </div>
                          
                          <!--BEGIN #searchform-->
                          <form method="get" class="searchform alignright" action="<?php echo home_url(); ?>/">
                              <input type="text" name="s" class="s" value="" placeholder="<?php _e('Type Keyword and hit enter', 'jd_framework') ?>" />
                              <input type="submit" class="searchsubmit" value="<?php _e('go', 'jd_framework') ?>">
                          </form><!--END #searchform-->
                      
                      </div>
                  
                  </div> <!--header-top-->


                  <div class="header-middle clearfix">
                  
                      <div id="logo">
                          <a href="<?php echo home_url()?>"><img src="<?php header_image(); ?>" class="" alt="<?php echo get_bloginfo('name')?>" /></a>
      
                      </div> <!--logo-->                     
                      
 						<div id="headerFeature">						      
						    <div id="featureQuote">
						    <h4 class="featCurrent">CURRENT ISSUE</h4>							
							<?php dynamic_sidebar( 'Featured Story in Header' ); ?>
							</div><!--/featureQuote-->
						</div><!--/headerFeature-->
						</div> <!--.header-middle-->
                  
                  <div class="header-bottom clearfix">
                  
                      <div id="primary-nav">
                          <?php if ( has_nav_menu( 'primary-menu' ) ) { /* if menu location 'primary-menu' exists then use custom menu */ ?>
                          <?php wp_nav_menu( array( 'menu_id'=>'primary_main','theme_location' => 'primary-menu','walker' => '')); ?>
                          <?php } else { /* else use wp_list_categories */
                          ?>
                          <ul>
                              <?php wp_list_pages(array( 'title_li' => '')); ?>
                          </ul>
                          <?php } ?>
                              
                      </div><!-- primary-nav-->
                      
                      <div id="mobile-nav">
                          <?php if ( has_nav_menu( 'primary-menu' ) ) { /* if menu location 'primary-menu' exists then use custom menu */ ?>
                          <?php wp_nav_menu( array( 'menu'=>'primary_mobile','theme_location' => 'primary-menu' ,'walker' => '')); ?>
                          <?php } else { /* else use wp_list_categories */
                           ?>
                          <ul>
                              <?php wp_list_pages(array( 'title_li' => '')); ?>
                          </ul>
                          <?php } ?>  
                      </div>
                                       
                  
                  </div> <!-- header-bottom -->
             
        
       </div> <!--#header-->