<!DOCTYPE html>
<html lang="<?php echo get_html_lang(); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo img('favicon.ico'); ?>" type="image/x-icon"/>
    <?php if ( $description = option('description')): ?>
    <meta name="description" content="<?php echo $description; ?>" />
    <?php endif; ?>
    <?php
    if (isset($title)) {
        $titleParts[] = strip_formatting($title);
    }
    $titleParts[] = option('site_title');
    ?>
    <title><?php echo implode(' &middot; ', $titleParts); ?></title>

    <?php echo auto_discovery_link_tags(); ?>

    <!-- Plugin Stuff -->

    <?php fire_plugin_hook('public_head', array('view'=>$this)); ?>


    <!-- Stylesheets -->
    <?php
    queue_css_file(array('assets/css/main', 'assets/css/menu'));
    echo head_css();
    echo theme_header_background();
    ?>

    <!-- JavaScripts -->
    <?php
    queue_js_file(array('assets/js/util','assets/js/skel.min','assets/js/main','assets/js/jquery.min'));
    queue_js_file(array('menu-js/util','menu-js/skel.min','menu-js/main','menu-js/jquery.min'));
    echo head_js();
    ?>
</head>

<!-- Begin php header options -->
<?php echo body_tag(array('id' => @$bodyid, 'class' => @$bodyclass)); ?>
<!-- this is the neatline header -->
<?php if (is_current_url('/neatline/show/')): ?>

<!-- //// this is the index page header /// -->
<?php elseif (is_current_url('/')): ?>
    <!-- This is the menu, taken from HTML5Up's Phantom theme [https://html5up.net/phantom] -->
    <div id="head-wrapper">
    <!-- Header -->
        <header id="head-header">
            <div class="inner">
                <!-- Nav -->
                <nav>
                    <ul>
                        <li><a href="#menu">Menu</a></li>
                    </ul>
                </nav>
            </div><!-- end div inner -->
        </header>
    <!-- Menu -->
        <nav id="menu">
            <h2>Menu</h2>
            <?php
              # Nested menu items just show up between separators, and deeply
              # nested menu items aren't differentiated, something to look at later
              echo public_nav_main(array('role' => 'navigation'));
            ?>
        </nav>
    </div><!-- end head-wrapper -->
   <!-- end menu -->

    <!-- Directive Header -->
    <div id="header">
        <span class="logo icon fas <?php echo(get_theme_option('homepage_icon')); ?>"></span>
            <?php fire_plugin_hook('public_header', array('view'=>$this)); ?>
            <h1><?php echo link_to_home_page(theme_logo()); ?></h1>

            <?php if (get_theme_option('homepage_subheader')): ?>
              <p><?php echo(get_theme_option('homepage_subheader')); ?></p>
            <?php endif; ?>
    </div><!-- end div #header -->

    <!-- This starts the #main div necessary for index.php  -->
    <div id="main">
    <?php fire_plugin_hook('public_content_top', array('view'=>$this)); ?>

    <!-- this is the non index.php header so that Directive header does not appear on all pages -->
    <?php else: ?>
        <!-- Wrapper -->
        <div id="head-wrapper">
            <!-- Header -->
            <header id="head-header">
                <div class="inner">
                    <nav>
                        <ul>
                            <li><a href="#menu">Menu</a></li>
                        </ul>
                    </nav>
                </div><!-- end div .inner -->
            </header><!-- end head-wrapper -->

            <!-- Menu -->
            <nav id="menu">
                <h2>Menu</h2>
                <?php
                  # Nested menu items just show up between separators, and deeply
                  # nested menu items aren't differentiated, something to look at later
                  echo public_nav_main(array('role' => 'navigation'));
                ?>
            </nav>
        </div><!-- end head-wrapper -->

        <!-- Main -->
        <div id="main">

        <?php fire_plugin_hook('public_content_top', array('view'=>$this)); ?>

    <?php endif ?><!-- end php header options -->
