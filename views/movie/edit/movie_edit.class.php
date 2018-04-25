<?php

/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 4/5/2018
 * Time: 2:02 PM
 * Description: This file was created to
 */
class MovieEdit extends MovieIndexView {
    public function display($movie) {
        parent::displayHeader("Edit Movie Details");
        if (isset($_SESSION['movie_genres'])) {
            $genres = $_SESSION['movie_genres'];
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
            $image = BASE_URL . '/' . MOVIE_IMG. $image;
        }
        ?>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading ">
                        <h3 class="panel-title">Edit Movie Details</h3>
                    </div>
                    <div class="panel-body">
                        <form action='<?= BASE_URL . "/movie/update/$id" ?>' method="post">
                            <div class="col-md-10 col-md-offset-1">
                                <input type="hidden" name="id" value="<?= $id ?>">
                                <div class="form-group">
                                    <input class="form-control" name="title" value="<?= $title ?>"/>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="director" value="<?= $director ?>"/>
                                </div>
                                <div class="radio-form-fix">
                                    <?php
                                    foreach ($genres as $m_genre => $m_id) {
                                        $checked = ($genre == $m_genre ) ? "checked" : "";

                                        if (($m_id - 1) % 5 == 0) {
                                            echo "<div class='col-md-12'>";
                                        }

                                        echo "<label class='radio-inline'><input type='radio' name='genre' value='$m_id' $checked> $m_genre</label>";

                                        if (($m_id - 1) % 5 == 4 || ($m_id - 1) == count($genres) -1) {
                                            echo "</div>";
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="release-date" value="<?= $release_date ?>"/>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="writer" value="<?= $writer ?>"/>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="image" value="<?= $image ?>"/>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="description" rows="8"><?= $description ?></textarea>
                                </div>
                                <div class="text-center form-group">
                                    <input class="btn btn-primary" type="submit" name="action" value="Update">
                                    <input class="btn btn-danger" type="button" value="Cancel" onclick='window.location.href = "<?= BASE_URL . "/movie/show/$id" ?>"'>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php
        parent::displayFooter();
    }
}