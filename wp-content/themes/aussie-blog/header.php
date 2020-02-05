<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <title><?php bloginfo('name') . ' | ' . wp_title(); ?></title>

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon"/>
    <link rel="icon" href="/favicon.ico" type="image/x-icon"/>

    <?php if (is_front_page()) : ?>
        <link rel="alternate" hreflang="x-default" href="//yuriylutsenko.info"/>
    <?php endif; ?>

    <?php wp_head(); ?>
</head>

<?php
$url = explode('?', $_SERVER['REQUEST_URI']);
$url_rm_slash = substr($url[0], strripos($url[0], '/') + 1);
$current_page = $url_rm_slash ? $url_rm_slash : 'home';
$additional_body_class = 'page-' . $current_page;
?>

<body <?php body_class($additional_body_class); ?>>

<!--MAIN-->
<div id="main" class="main">
