<?php get_header(); ?>
ici single-post.php

<div class="article-card">
    <header>
        <h3><?php the_title(); ?></h3>
        <h4>
            <?php the_author(); ?>
        </h4>
    </header>
    <p>
        <?php the_excerpt(); ?>
    </p>
</div>

<?php get_footer() ?>