<?php

/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 4/5/2018
 * Time: 2:02 PM
 * Description: This file was created to
 */
class MovieShow extends MovieIndexView
{

    public function display($movie, $confirm = "")
    {
        parent::displayHeader("Show Movie");

        if (isset($_SESSION['user'])) {
            $user = $_SESSION['user'];
        }
        if(isset($_SESSION['admin'])) {
            $role = $_SESSION['admin'];
        }

        $id = $movie->getId();
        $title = $movie->getTitle();
        $director = $movie->getDirector();
        $genre = $movie->getGenre();
        $release_date = new \DateTime($movie->getReleaseDate());
        $release_date = $release_date->format('m-d-Y');
        $writer = $movie->getWriter();
        $image = $movie->getImage();
        $description = $movie->getDescription();

        if (strpos($image, "http://") === false AND strpos($image, "https://") === false) {
            $image = BASE_URL . '/' . MOVIE_IMG . $image;
        }
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

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading ">
                        <h3 class="panel-title">movie Details</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="<?= $image ?>" alt="<?= $title ?>"/>
                            </div>
                            <div class="col-md-8">
                                <p><strong>Title: </strong><?= $title ?></p>

                                <p><strong>Director: </strong><?= $director ?></p>

                                <p><strong>Genre: </strong><?= $genre ?></p>


                                <p><strong>Writer: </strong><?= $writer ?></p>

                                <p><strong>Release Date: </strong><?= $release_date ?></p>
                                <a href="<?= BASE_URL ?>/movie/">Back</a>
                                <?php
                                    if($user) {
                                        if($role) {
                                            ?>
                                            |
                                            <a href="<?= BASE_URL ?>/movie/edit/<?= $id ?>">Edit</a> |
                                            <a href="<?= BASE_URL ?>/movie/destroy/<?= $id ?>">Delete</a>
                                            <?php
                                        }
                                    }
                                ?>

                            </div>
                        </div>
                        <div class="row movie-desc">
                            <div class="col-md-12">
                                <strong>Description: </strong><?= $description ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <?php

        parent::displayFooter();
    }
}