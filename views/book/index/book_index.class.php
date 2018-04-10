<?php

/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 4/5/2018
 * Time: 2:03 PM
 * Description: This file was created to
 */
class BookIndex extends IndexView {
    public function display($books) {
        parent::displayHeader("List All Books");

        if ($books === 0) {
            echo "No book was found.<br><br><br><br><br>";
        } else {
            //display books in a grid; six books per row
            foreach ($books as $i => $book) {
                $id = $book->getId();
                $title = $book->getTitle();
                $author = $book->getAuthor();
                $category = $book->getCategory();
                $publish_date = new \DateTime($book->getPublish_date());
                $image = $book->getImage();
                if (strpos($image, "http://") === false AND strpos($image, "https://") === false) {
                    $image = BASE_URL . "/" . BOOK_IMG . $image;
                }
                if ($i % 6 == 0) {
                    echo "<div class='row'>";
                }

                echo "<div class='col'><p><a href='", BASE_URL, "/book/detail/$id'><img src='" . $image .
                    "'></a><span>$title<br>$category<br>" . $publish_date->format('m-d-Y') . "</span></p></div>";

                if ($i % 6 == 5 || $i == count($books) - 1) {
                    echo "</div>";
                }
            }
        }
        parent::displayFooter();
    }
}