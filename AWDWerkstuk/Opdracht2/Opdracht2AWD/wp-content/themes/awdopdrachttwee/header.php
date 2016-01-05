<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php bloginfo("title"); ?></title>
    <!-- Laad alle stylesheets -->
    <?php wp_head(); ?>
</head>

<body>

    <!-- Hoofdnavigatie large -->

    <div class="full-width head-wrapper shadow sticky is-stuck">
        <div class="row head-container show-for-large">
            <div class="large-3 columns">
                <a href="index.php"><img src="<?php bloginfo('template_directory'); ?>/img/logo.png" alt="logo" id="desktop-logo"></a>
            </div>
            <div class="large-9 columns nav-container">
                <div class="menu-container">
                    <?php wp_nav_menu(); ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Hoofdnavigatie  medium/small + content -->

    <div class="off-canvas-wrapper">
        <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
            <div class="off-canvas position-left" id="offCanvasLeft" data-off-canvas data-position="left">
                <?php wp_nav_menu(); ?>
            </div>
            <div class="off-canvas-content" data-off-canvas-content>
                <div class="hide-for-large full-width sticky is-stuck">
                    <div class="title-bar">
                        <a href="index.php"><img src="<?php bloginfo('template_directory'); ?>/img/logo.png" alt="logo" id="mobile-logo"></a>
                        <div class="title-bar-left">
                            <button class="my-menu-icon" type="button" data-open="offCanvasLeft"></button>
                        </div>
                    </div>
                </div>