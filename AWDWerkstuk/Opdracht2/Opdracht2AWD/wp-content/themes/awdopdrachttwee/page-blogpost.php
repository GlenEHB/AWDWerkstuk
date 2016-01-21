<?php 
/* 
Template Name: Blogpost View
Description: Blog view template
*/
?>

<!-- Header -->
<?php get_header(); ?>

<!-- Content -->
<div id="container">
    <div class="marginBlock"></div>
    <?php query_posts('post_type=post&post_status=publish&posts_per_page=10&paged='. get_query_var('paged')); ?>
    <?php if(have_posts()) : ?>
        <?php while(have_posts()) : the_post(); ?>
            <div class="post">
                <div class="entry">
                   <div class="row">
                       <div class="small-12 medium-12 large-12 columns blog-title">
                           <h1><b><?php the_title(); ?></b></h1>
                           <p>Posted: <?php the_date('j F, Y'); ?> om <?php the_time('g:i a'); ?></p>
                       </div>
                   </div>
                  <div class="row">
                       <div class="small-12 medium-12 large-12 columns blog-content">
                           <p><?php the_content(); ?></p>
                           
                           <!-- Blogposts auteur laten zien -->
                            <p><?php                        
                                $awd_posted = get_post_meta($post->ID,'_awd_posted',true);
                                //werkt alleen bij berichten dus niet weergeven op de andere pagina's
                                if(!empty($awd_posted)) {
                                    echo '<p>Gepost door: '.esc_html($awd_posted).'</p>'; ; 
                                }
                                ?></p>
                       </div>
                   </div>                    
                </div>
            </div>
        <?php endwhile; ?>
    <?php endif; wp_reset_query()?>
</div>

<!-- Footer -->
<?php get_footer(); ?>