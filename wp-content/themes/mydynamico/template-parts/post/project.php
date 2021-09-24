<?php

?>
<!-- *template-parts\post\project.php* -->

<?php

    echo '<article class="project-container">';
        echo '<header><h3>' . $_POST['project_title'] . '</h3></header>';

        echo '<div class="container-flex-row">';
            $img_src = '../../img/icon-photo.gif';
            echo '<figure><img src="' . $img_src .'" alt="url: ' . $_POST['project_image'] . '" width="60px" height="auto"></figure>';

            echo '<div>' . $_POST['project_describe'] . '</div>';
        echo '</div>';

        $links  = '<span class="posted-on"><a href="' . $_POST['project_github'] . '">github</a></span>';
        $links .= '<span class="posted-on"><a href="' .$_POST['project_link'] . '">Voir le projet</a></span>';
        echo '<div class="entry-meta">' . $links . '</div>';

    echo '</article>';


    // echo '<div><a href="' . $_POST['project_github'] . '">Github</a></div>';
    // echo '<div><a href="' . $_POST['project_link'] . '">Voir le projet</a></div>';
?>
