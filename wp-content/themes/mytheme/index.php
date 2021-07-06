<?php get_header(); ?>

    <?php if(have_posts()):?>
        <ul>
        <?php while(have_posts()): the_post(); ?>
            <div class="card">
                <div class="card-title">
                    <h2><?php the_title(); ?></h2>
                    <h5>par <?php the_author(); ?></h5>
                </div>
                <h5><?php the_category(); ?></h5>
                <p class="card-text">

                    <!-- affiche ce qui se trouve au dessus d'un bloc 'lire la suite' -->
                    <?php the_content('en voir plus') ?>

                    <!-- affiche l'extrait -->
                    <?php the_excerpt(); ?>
                </p>
                <!-- <a href="<?php the_permalink(); ?>">Voir plus</a> -->
            </div>
        <?php endwhile?>
        </ul>

    <?php else:?>
    <h1>Pas d'articles</h1>
    <?php endif;?>

    <?php get_footer(); ?>
