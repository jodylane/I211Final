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

        if (isset($_SESSION['movie_categories'])) {
            $categories = $_SESSION['movie_categories'];
        }

        $id = $movie->getId();
        $title = $movie->getTitle();
        $isbn = $movie->getIsbn();
        $author = $movie->getAuthor();
        $category = $movie->getCategory();
        $publish_date = new \DateTime($movie->getPublishDate());
        $publish_date = $publish_date->format('m-d-Y');
        $publisher = $movie->getPublisher();
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
                                    <input class="form-control" name="isbn" value="<?= $isbn ?>"/>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="author" value="<?= $author ?>"/>
                                </div>
                                <div class="radio-form-fix">
                                    <?php
                                    foreach ($categories as $m_category => $m_id) {
                                        $checked = ($category == $m_category ) ? "checked" : "";

                                        if (($m_id - 1) % 5 == 0) {
                                            echo "<div class='col-md-12'>";
                                        }

                                        echo "<label class='radio-inline'><input type='radio' name='category' value='$m_id' $checked> $m_category</label>";

                                        if (($m_id - 1) % 5 == 4 || ($m_id - 1) == count($categories) -1) {
                                            echo "</div>";
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="publish-date" value="<?= $publish_date ?>"/>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="publisher" value="<?= $publisher ?>"/>
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