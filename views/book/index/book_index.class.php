<?php

/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 4/5/2018
 * Time: 2:03 PM
 * Description: This file was created to
 */
class BookIndex extends BookIndexView
{
    public function display($books, $confirm = "")
    {
        parent::displayHeader("List All Books");

        if (isset($_SESSION['user'])) {
            $d = $_SESSION['user'];
        } else {
            echo "helo";
        }
        echo $d->fullName();

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
                if ($books === 0) {
                    echo "No book was found.<br><br><br><br><br>";
                } else {
                    foreach ($books as $i => $book) {
                        $id = $book->getId();
                        $title = $book->getTitle();
                        $category = $book->getCategory();
                        $publish_date = new DateTime($book->getPublishDate());
                        $publish_date = $publish_date->format('m-d-Y');
                        $image = $book->getImage();
                        if (strpos($image, "http://") === false AND strpos($image, "https://") === false) {
                            $image = BASE_URL . "/" . BOOK_IMG . $image;
                        }

                        if ($i % 5 == 0) {
                            echo "<div class='row'>";
                        }
                        ?>

                        <div class="col-md-custom">
                            <a href="<?= BASE_URL . "/book/show/$id" ?>">
                                <div class="thumbnail">
                                    <img src="<?= $image ?>" alt="<?= $title ?>">

                                    <div class="caption">
                                        <h4><?= $title ?></h4>

                                        <p><?= $category ?></p>

                                        <p><?= $publish_date ?></p>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <?php
                        if ($i % 5 == 4 || $i == count($books) - 1) {
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
} //ends class