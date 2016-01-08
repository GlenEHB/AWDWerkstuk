<!-- Header -->
<?php get_header(); ?>


<!-- Content -->
<div id="container">
    <?php if(have_posts()) : ?>
        <?php while(have_posts()) : the_post(); ?>
            <div class="post">
                <div class="entry">
                    <?php the_content(); ?>
                </div>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
</div>

<!-- Footer -->
<?php get_footer(); ?>