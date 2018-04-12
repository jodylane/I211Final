<?php

/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 4/5/2018
 * Time: 2:03 PM
 * Description: This file was created to
 */
class BookIndex extends BookIndexView {
    public function display($books) {
        parent::displayHeader("List All Books");

        ?>
        <div class="allBooksWrapper">
        <?php
        if ($books === 0) {
            echo "No book was found.<br><br><br><br><br>";
        } else {
            //display books in a grid; six books per row
            echo "<div class='row'>";
            echo "<div class='col-md-10 col-md-offset-1'>";
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
                    <a href="<?= BASE_URL ?>/book/show/<?= $id ?>">
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
            echo "</div>";
            echo "</div>";
        }
        parent::displayFooter();

        ?>
        </div>
        <?php
    }
} //ends class