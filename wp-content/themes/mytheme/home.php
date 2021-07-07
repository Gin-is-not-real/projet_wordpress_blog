<?php get_header(); ?>

<div class="page-container" id="home-main">
    <header>
        
        <div>here's home.php</div>
        <div>ici une banniere</div>
        
    </header>

    <div class="content" id="home-content">
        <div id="articles-container">
            
            <?php if(have_posts()) : while(have_posts()) : the_post(); ?>

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
                    <a href="<?php the_permalink(); ?>">Voir plus</a>

                        <!-- <a href="<?php get_post_type_archive_link('post'); ?>">Voir les dernieres actus</a> -->
                </div>
                    <?php endwhile;
                    endif; ?>

        </div>

    </div>

</div>


<?php get_footer(); ?>