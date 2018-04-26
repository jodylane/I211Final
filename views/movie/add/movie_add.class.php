<?php

/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 4/5/2018
 * Time: 2:03 PM
 * Description: This file was created to create new movies
 */
class MovieAdd extends MovieIndexView {
    public function display(){
        parent::displayHeader('New Movie');
        // retrieve all movie genres.
        if (isset($_SESSION['movie_genres'])) {
            $genres = $_SESSION['movie_genres'];
        }
        ?>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading ">
                        <h3 class="panel-title">Create Movie</h3>
                    </div>
                    <div class="panel-body">
                        <form action='<?= BASE_URL . "/movie/create" ?>' method="post">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="form-group">
                                    <input class="form-control" name="title" placeholder="Title"/>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="director" placeholder="Director"/>
                                </div>
                                <div class="radio-form-fix">
                                    <?php
                                    // loop through genres and display each one as a radio button
                                    foreach ($genres as $m_genre => $m_id) {
                                        $checked = "";

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
                                    <input class="form-control" name="release-date" placeholder="Release Date yyyy-mm-dd"/>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="writer" placeholder="Writer"/>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="image" placeholder="Image URL"/>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="description" placeholder="Description" rows="8"></textarea>
                                </div>
                                <div class="text-center form-group">
                                    <input class="btn btn-primary" type="submit" name="action" value="Create">
                                    <input class="btn btn-danger" type="button" value="Cancel" onclick='window.location.href = "<?= BASE_URL . "/movie/" ?>"'>
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
