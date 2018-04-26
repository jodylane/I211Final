<?php

/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 4/10/2018
 * Time: 7:21 PM
 * Description: This file was created to
 */
class IndexView {
    public static function displayHeader($title) {
        if (isset($_SESSION['user'])) {
            $user = $_SESSION['user'];
        }
        if(isset($_SESSION['admin'])) {
            $role = $_SESSION['admin'];
        }
        ?>
        <!DOCTYPE html>
        <html>
            <head>
                <title> <?php echo $title ?> </title>
                <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
                <link type='text/css' rel='stylesheet' href='<?= BASE_URL ?>/www/css/styles.css' />
                <link type='text/css' rel='stylesheet' href='<?= BASE_URL ?>/node_modules/bootstrap/dist/css/bootstrap.min.css' />

                <script>
                    var base_url = "<?= BASE_URL ?>";
                </script>


            </head>
            <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a href="<?= BASE_URL ?>/welcome"><img class="logo" src='<?= BASE_URL ?>/www/img/logo.png'/></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="<?= BASE_URL . "/book/" ?>">Books<span class="sr-only">(current)</span></a></li>
                        <li><a href="<?= BASE_URL . "/movie/" ?>">Movies<span class="sr-only">(current)</span></a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?= BASE_URL . "/book/showCart" ?>"> Checkout <span class="badge"> # </span></a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Settings<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <?php
                                    if($user){
                                        if($role) {
                                            ?>
                                            <li><a href="<?= BASE_URL . "/book/add" ?>">Create Book</a></li>
                                            <li><a href="<?= BASE_URL . "/movie/add" ?>">Create Movie</a></li>
                                            <?php
                                        }
                                            ?>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="<?= BASE_URL ?>/user/logout">Logout</a></li>
                                    <?php
                                    } else {
                                        ?>
                                        <li><a href="<?= BASE_URL ?>/user/login">Login</a></li>
                                        <li><a href="<?= BASE_URL ?>/user/signup">Signup</a></li>
                                        <?php
                                    }
                                ?>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <?php
    }

    public static function displayFooter () {
        ?>
                <div class="row">
                    <div class="footer"><span>&copy; Indianapolis Library 2018</span></div>
                </div>
                <script src="<?= BASE_URL ?>/node_modules/jquery/dist/jquery.min.js"></script>
                <script src="<?= BASE_URL ?>/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
                <script src="<?= BASE_URL ?>/www/js/ajax_autosuggestion.js"></script>
            </body>
        </html>
        <?php
    }
}