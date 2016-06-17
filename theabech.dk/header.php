<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php wp_title('|',1,'right'); ?> <?php bloginfo('name'); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="https://use.typekit.net/rpu4uuk.js"></script>
    <script>try{Typekit.load({ async: true });}catch(e){}</script>
    <?php wp_head(); ?>
  </head>
  <body>
  <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header page-scroll">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo site_url(); ?>"><?php bloginfo('name'); ?></a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav text-uppercase">

              <?php wp_list_pages(array('title_li' => '')); ?>

          </ul>
        </div><!--/.nav-collapse -->
      </div>
  </div>
  <div class="divider"></div>

  <div class="container">
    <div class="top-header">
      <h1><?php bloginfo('name'); ?></h1>
      <h4><?php bloginfo('description'); ?></h4>
    </div>
  </div>

  <div class="slider">
    <?php featured_slider(); ?>
  </div>
