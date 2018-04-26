<?php

/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 4/5/2018
 * Time: 2:03 PM
 * Description: This file was created to display and list all movies.
 */
class MovieIndex extends MovieIndexView {
    public function display($movies, $confirm = "") {
        parent::displayHeader("List All Movies");
        //display a message in after delete action if present
        if ($confirm != "") {
            ?>
            <div class="row">
                <div class="alert alert-success col-md-3 col-md-offset-8 alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <?= $confirm ?></div>
            </div>
            <?php
        }
        ?>

        <div class='row'>
            <div class='col-md-10 col-md-offset-1'>
                <?php
                if ($movies === 0) {
                    echo "No movie was found.<br><br><br><br><br>";
                } else {
                    // loop through each movie and retrieve movie details and display them.
                    foreach ($movies as $i => $movie) {
                        $id = $movie->getId();
                        $title = $movie->getTitle();
                        $genre = $movie->getGenre();
                        $release_date = new DateTime($movie->getReleaseDate());
                        $release_date = $release_date->format('m-d-Y');
                        $image = $movie->getImage();
                        if (strpos($image, "http://") === false AND strpos($image, "https://") === false) {
                            $image = BASE_URL . "/" . MOVIE_IMG . $image;
                        }

                        if ($i % 5 == 0) {
                            echo "<div class='row'>";
                        }
                        ?>

                        <div class="col-md-custom">
                            <a href="<?= BASE_URL . "/movie/show/$id" ?>">
                                <div class="thumbnail">
                                    <img src="<?= $image ?>" alt="<?= $title ?>">

                                    <div class="caption">
                                        <h4><?= $title ?></h4>

                                        <p><?= $genre ?></p>

                                        <p><?= $release_date ?></p>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <?php
                        if ($i % 5 == 4 || $i == count($movies) - 1) {
                            echo "</div>";
                        }
                    }
                }
                ?>
            </div>
        </div>

        <?php
        parent::displayFooter();
    }
}
