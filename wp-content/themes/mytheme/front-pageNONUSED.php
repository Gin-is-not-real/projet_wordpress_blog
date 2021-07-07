<?php get_header(); ?>
ici front-page.php

<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
    <h1><?php the_title(); ?></h1>
    <?php the_content(); ?>

    <!-- <a href="<?php get_post_type_archive_link('post'); ?>">Voir les dernieres actus</a> -->
<?php endwhile;
endif; ?>
<?php get_footer(); ?>