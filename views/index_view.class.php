<?php

/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 4/10/2018
 * Time: 7:21 PM
 * Description: This file was created to
 */
class IndexView {
    public static function displayHeader ($title) {
        ?>
        <!DOCTYPE html>
        <html>
            <head>
                <title> <?php echo $title ?> </title>
                <meta http-equiv='Content-Type' content='text/html; charset=UTF-8'>
                <link type='text/css' rel='stylesheet' href='<?= BASE_URL ?>/www/css/styles.css' />
                <script>
                    var base_url = "<?= BASE_URL ?>";
                </script>
            </head>
            <body>
        <?php
    }

    public static function displayFooter () {
        ?>

            </body>
        </html>
        <?php
    }
}