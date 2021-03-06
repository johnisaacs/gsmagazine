<?php get_header(); ?>
            
            <div id="main_container" class="container">
            	
                <div class="inner_content row">
            
                    <!--BEGIN .post-content-->
                    <div class="post-content cat-container single-column">
                            
                        
                        <div id="page-top">
                             <h2 id="page-title"><?php _e("Search Results for $s",'jd_framework'); ?></h2>	
                         </div> <!--#page_top-->
                            
                            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                <div class="item clearfix">

									<?php 
                                    	if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) : /* if post has post thumbnail */ 
                                        $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'small');
                                    ?>

                                    <div class="image alignleft">
                                          
                                        <a href="<?php the_permalink(); ?>"><img src="<?php echo $thumb[0]; ?>" alt="" height="<?php echo $thumb[2]; ?>" width="<?php echo $thumb[1]; ?>"/></a>
                                    
                                    </div> <!--.image-->

                                      <?php else: ?>
                                      
                                      <div class="image alignleft">
                              
                                          <a href="<?php the_permalink(); ?>"><img src="<?php echo get_template_directory_uri().'/images/default_image.png'; ?>" /></a>
                                      
                                      </div><!--slider_image-->
  
                                    <?php endif; ?>
                                    
                                    <div class="details">
                                              
                                      <div class="post-meta">
                                          <span class="date"><?php the_time( get_option('date_format') ); ?> </span>
                                                                              
                                      </div><!--cats-->
                                      
                                      <h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                      
                                      <div class="excerpt">
                                      
                                          <?php zd_excerpt('20'); ?>
                                      
                                      </div><!--excerpt-->
                                      
                                      <div class="more_link">
                                        <a href="<?php the_permalink(); ?>"><?php _e('Read More','jd_framework'); ?></a>
                                      </div>
                                  
                                    </div><!--details-->
                                    
                                 </div>	<!--.item-->    							     
                                 
                            <?php endwhile; else: ?>
                			
                            <div class="error_container">
                            
                                <div id="page-top">
									<h1><?php _e('Error 404 - Not Found', 'jd_framework') ?></h1>
                                    <div class="clear"></div>
                                </div>
                        
                                <div class="not-found">
                                    
                                    <p><?php _e("Sorry, but you are looking for something that isn't here.", "framework") ?></p>
                                    
                                    <div class="clear"></div>
                                
                                </div><!--.not-found-->
                                
                        	</div><!--.error_container-->
                            
                            <?php endif; ?>
                            
                            <?php wp_reset_query(); ?>
               
                            <div class="clear"></div>
                            
                            <div class="page_navi">
                            
                            	<div class="pagination">
                                	
                                    <?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } else { ?>
                                        <div class="nav-next"><?php next_posts_link(__('&larr; Older Entries', 'jd_framework')) ?></div>
                                        <div class="nav-prev"><?php previous_posts_link(__('Newer Entries &rarr;', 'jd_framework')) ?></div>
                                    <?php } ?>             
                                    
                                    <div class="clear"></div>
                                
                                </div>
                            
                            </div><!--page_navi-->
                    
                                    
                    </div><!--END .post-content-->

					<?php get_sidebar(); ?>
                    
                    <div class="clear"></div>
                
                </div> <!--.inner_content-->
            
            </div><!--END #main_container-->

<?php get_footer(); ?>