<?php

/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 4/5/2018
 * Time: 2:02 PM
 * Description: This file was created to
 */
class BookEdit extends BookIndexView {
    public function display($book) {
        parent::displayHeader("Edit Book Details");

        if (isset($_SESSION['book_categories'])) {
            $categories = $_SESSION['book_categories'];
        }

        $id = $book->getId();
        $title = $book->getTitle();
        $isbn = $book->getIsbn();
        $author = $book->getAuthor();
        $category = $book->getCategory();
        $publish_date = new \DateTime($book->getPublishDate());
        $publish_date = $publish_date->format('m-d-Y');
        $publisher = $book->getPublisher();
        $image = $book->getImage();
        $description = $book->getDescription();

        if (strpos($image, "http://") === false AND strpos($image, "https://") === false) {
            $image = BASE_URL . '/' . BOOK_IMG . $image;
        }
        ?>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading ">
                        <h3 class="panel-title">Edit Book Details</h3>
                    </div>
                    <div class="panel-body">
                        <form action='<?= BASE_URL . "/book/update/$id" ?>' method="post">
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
                                    foreach ($categories as $b_category => $b_id) {
                                        $checked = ($category == $b_category ) ? "checked" : "";

                                        if (($b_id - 1) % 5 == 0) {
                                            echo "<div class='col-md-12'>";
                                        }

                                        echo "<label class='radio-inline'><input type='radio' name='category' value='$b_id' $checked> $b_category</label>";

                                        if (($b_id - 1) % 5 == 4 || ($b_id - 1) == count($categories) -1) {
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
                                    <input class="btn btn-danger" type="button" value="Cancel" onclick='window.location.href = "<?= BASE_URL . "/movie/detail/$id" ?>"'>
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