<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Bootbusiness | Short description about company">
    <meta name="author" content="Your name">
    <title>チュパカブラのカンヌ研究室</title>
    <meta name="og:site_name" content="MapsTD" />
    <meta name="og:url" content="http://cannes.tyupakabura.com/" />
    <meta name="og:image" content="http://cannes.tyupakabura.com/img/cannes-lions-logo.png"/>
    <meta name="og:type" content="website" />
    <meta name="og:title" content="チュカパブラのカンヌ研究室" />
    <meta name="og:description" content="Cyber部門、Film部門、Press部門を中心に研究していく予定。"/>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <!-- Bootstrap -->
    <?php use_stylesheet('bootstrap.min.css') ?>
    <!-- Bootstrap responsive -->
    <?php use_stylesheet('bootstrap-responsive.min.css') ?>
    <!-- Font awesome - iconic font with IE7 support -->
    <?php use_stylesheet('font-awesome.css') ?>
    <?php use_stylesheet('font-awesome-ie7.css') ?>
    <!-- Bootbusiness theme -->
    <?php use_stylesheet('boot-business.css') ?>
</head>
<body>

<!-- Start: HEADER -->
<header>
    <!-- Start: Navigation wrapper -->
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <?php echo link_to("チュパカブラのカンヌ研究室","@homepage",array("class"=> "brand brand-bootbus")); ?>
                <!-- Below button used for responsive navigation -->
                <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <!-- Start: Primary navigation -->
                <div class="nav-collapse collapse">
                    <ul class="nav pull-left">
                        <li>
                            <?php echo link_to("CYBER","@product_category_list?category=cyber"); ?>
                        </li>
                        <li>
                            <?php echo link_to("FILM","@product_category_list?category=film"); ?>
                        </li>
                        <li>
                            <?php echo link_to("PRESS","@product_category_list?category=press"); ?>
                        </li>

                    <!-- <li><a href="contact_us.html">Contact us</a></li> -->
                    <!-- <li><a href="signup.html">Sign up</a></li>
                    <li><a href="signin.html">Sign in</a></li> -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
<!-- End: Navigation wrapper -->
</header>
<!-- End: HEADER -->


<!-- Start: MAIN CONTENT -->
<div class="content">
    <!-- Start: slider -->
    <?php if($module_name == "top" && $action_name == "list"): ?>
        <div class="slider">
            <div class="container-fluid">
                <!-- <div id="heroSlider" class="carousel slide"> -->
                    <!-- <div class="carousel-inner"> -->

                        <div class="active item">
                            <div class="hero-unit">
                                <div class="row-fluid">
                                    <div class="span7 marketting-info">
                                        <h1>
                                            カンヌ研究ブログ
                                        </h1>
                                        <p>
                                            Cyber部門、Film部門、Press部門を中心に研究していく予定。<br>
                                            <!-- ヤングカンヌの日本代表に選ばれるのが目標。 -->
                                        </p>
                                    </div>
                                    <div class="span5">
                                        <!-- <img src="img/placeholder.jpg" class="thumbnail"> -->
                                        <?php echo image_tag("/img/cannes-lions-logo.png",array("class"=>"thumbnail")); ?>
                                    </div>
                                    <!-- <div class="span10 ">
                                        aaa


                                    </div> -->
                                </div>
                            </div>
                        </div>

                        <!-- <div class="item">
                            <div class="hero-unit">
                                <div class="row-fluid">
                                    <div class="span7 marketting-info">
                                        <h1>
                                            TELL ABOUT YOUR NATURE OF WORK
                                        </h1>
                                        <p>
                                            We are Bootbusiness and we design ultimate website applications.
                                            We are Bootbusiness and we design ultimate website applications.
                                        </p>
                                        <h3>
                                            <a href="service.html" class="btn">Learn more</a>
                                        </h3>
                                    </div>
                                    <div class="span5">
                                        <img src="img/placeholder.jpg" class="thumbnail">
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <!-- <div class="item">
                            <div class="hero-unit">
                                <div class="row-fluid">
                                    <div class="span7 marketting-info">
                                        <h1>
                                            TELL ABOUT YOUR PRODUCT
                                        </h1>
                                        <p>
                                            Get excited about our products.We build awesome products in mobile.
                                            We build awesome products in mobile.We build awesome products in mobile.
                                        </p>
                                        <h3>
                                            <a href="#" class="btn btn-primary">
                                                Buy now
                                            </a>
                                            <a href="product.html" class="btn">Learn more</a>
                                        </h3>
                                    </div>
                                    <div class="span5">
                                        <img src="img/placeholder.jpg" class="thumbnail">
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="item">
                            <div class="hero-unit">
                                <div class="row-fluid">
                                    <div class="span7 marketting-info">
                                        <h1>
                                            TELL ABOUT YOUR ANOTHER PRODUCT
                                        </h1>
                                        <p>
                                            Get excited about our products.We build awesome products in mobile.
                                            We build awesome products in mobile.We build awesome products in mobile.
                                        </p>
                                        <h3>
                                            <a href="#" class="btn btn-primary">Buy now</a>
                                            <a href="product.html" class="btn">Learn more</a>
                                        </h3>
                                    </div>
                                    <div class="span5">
                                        <img src="img/placeholder.jpg" class="thumbnail">
                                    </div>
                                </div>
                            </div>
                        </div> -->



                        <!-- </div>
                            <a class="left carousel-control" href="#heroSlider" data-slide="prev">‹</a>
                            <a class="right carousel-control" href="#heroSlider" data-slide="next">›</a>
                        </div> -->
                </div>
            </div>
        <?php endif; ?>
        <!-- End: slider -->


        <!-- Start: LIST -->
        <div class="container">

            <!-- <div class="page-header">
                <h2>Our products</h2>
            </div> -->
            <!-- First -->
            <!-- <div class="row-fluid">
                <ul class="thumbnails"> -->

                    <!-- <li class="span4">
                        <div class="thumbnail">
                            <img src="img/placeholder-360x200.jpg" alt="product name">
                            <div class="caption">
                                <h3>Product name</h3>
                                <p>
                                    Few attractive words about your product.Few attractive words about your product.
                                    Few attractive words about your product.Few attractive words about your product.
                                </p>
                            </div>
                            <div class="widget-footer">
                                <p>
                                    <a href="#" class="btn btn-primary">Buy now</a>&nbsp;
                                    <a href="product.html" class="btn">Read more</a>
                                </p>
                            </div>
                        </div>
                    </li> -->

                    <!-- <li class="span4">
                        <div class="thumbnail">
                            <img src="img/placeholder-360x200.jpg" alt="product name">
                            <div class="caption">
                                <h3>Product name</h3>
                                <p>
                                    Few attractive words about your product.Few attractive words about your product.
                                    Few attractive words about your product.Few attractive words about your product.
                                </p>
                            </div>
                            <div class="widget-footer">
                                <p>
                                    <a href="#" class="btn btn-primary">Buy now</a>&nbsp;
                                    <a href="product.html" class="btn">Read more</a>
                                </p>
                            </div>
                        </div>
                    </li> -->

                    <!-- <li class="span4">
                        <div class="thumbnail">
                            <img src="img/placeholder-360x200.jpg" alt="product name">
                            <div class="caption">
                                <h3>Product name</h3>
                                <p>
                                    Few attractive words about your product.Few attractive words about your product.
                                    Few attractive words about your product.Few attractive words about your product.
                                </p>
                            </div>
                            <div class="widget-footer">
                                <p>
                                    <a href="#" class="btn btn-primary">Buy now</a>&nbsp;
                                    <a href="product.html" class="btn">Read more</a>
                                </p>
                            </div>
                        </div>
                    </li> -->

                <!-- Second -->
                <!-- <div class="row-fluid">
                    <li class="span4">
                        <div class="thumbnail">
                            <img src="img/placeholder-360x200.jpg" alt="product name">
                            <div class="caption">
                                <h3>Product name</h3>
                                <p>
                                    Few attractive words about your product.Few attractive words about your product.
                                    Few attractive words about your product.Few attractive words about your product.
                                </p>
                            </div>
                            <div class="widget-footer">
                                <p>
                                    <a href="#" class="btn btn-primary">Buy now</a>&nbsp;
                                    <a href="product.html" class="btn">Read more</a>
                                </p>
                            </div>
                        </div>
                    </li>
                </div> -->
            <!-- End: LIST -->
            <?php echo $sf_data->getRaw('sf_content') ?>
        </div>
    <!-- End: MAIN CONTENT -->

    <br>
    <!-- Start: FOOTER -->
    <?php include_partial('global/footer'); ?>

    <!-- End: FOOTER -->
    <?php use_javascript('bootstrap.min.js') ?>
    <?php use_javascript('boot-business.js') ?>







</body>
</html>

