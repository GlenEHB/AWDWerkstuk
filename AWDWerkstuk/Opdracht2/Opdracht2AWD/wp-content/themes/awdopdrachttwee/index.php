<!-- Header -->
<?php get_header(); ?>

<!-- Content -->
<div id="container">
    <?php if(have_posts()) : ?>
        <?php while(have_posts()) : the_post(); ?>
            <div class="post">
                <div class="entry">
                    <?php the_content(); ?>
                    
                    <!-- Blogposts auteur laten zien -->
                    <?php                        
                        $awd_posted = get_post_meta($post->ID,'_awd_posted',true);
                        //werkt alleen bij berichten dus niet weergeven op de andere pagina's
                        if(!empty($awd_posted)) {
                            echo '<p>Gepost door: '.esc_html($awd_posted).'</p>'; ; 
                        }
                    ?>
                    
                </div>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
</div>

<!-- Footer -->
<?php get_footer(); ?>