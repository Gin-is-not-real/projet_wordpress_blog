<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo wp_get_document_title(); ?></title>
    <?php wp_head(); ?>
</head>
<body>
    <header id="general-header">
        <?= wp_title(); ?>
        <!-- <h1><?php echo wp_get_document_title(); ?></h1> -->
    </header>

    <div class="container" id="main-container">

    <?php 
