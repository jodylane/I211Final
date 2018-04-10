<?php

/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 4/5/2018
 * Time: 2:02 PM
 * Description: This file was created to
 */
class BookShow extends BookIndexView {

    public function display($book) {
        parent::displayHeader("Page Title");

        $title = $book->getTitle();
        $isbn = $book->getIsbn();
        $author = $book->getAuthor();
        $category = $book->getCategory();
        $publish_date = new \DateTime($book->getPublish_date());
        $publisher = $book->getPublisher();
        $image = $book->getImage();
        $description = $book->getDescription();

        if (strpos($image, "http://") === false AND strpos($image, "https://") === false) {
        $image = BASE_URL . '/' . BOOK_IMG . $image;
        }
        ?>

        <div id="main-header">Book Details</div>

        <a href="<?= BASE_URL ?>/book/index">Go to book list</a>
        <?php

        parent::displayFooter();
    }
}