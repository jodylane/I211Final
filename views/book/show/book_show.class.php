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
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading ">
                        <h3 class="panel-title">Book Details</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="<?= $image ?>" alt="<?= $title ?>"/>
                            </div>
                            <div class="col-md-8">
                                <p><strong>Title: </strong><?= $title?></p>
                                <p><strong>Author: </strong><?= $author?></p>
                                <p><strong>Genre: </strong><?= $category?></p>
                                <p><strong>ISBN: </strong><?= $isbn?></p>
                                <p><strong>Publisher: </strong><?= $publisher?></p>
                                <p><strong>Publish Date: </strong><?= $publish_date?></p>
                                <a href="<?= BASE_URL ?>/book/index">Go to book list</a>
                            </div>
                        </div>
                        <div class="row book-desc">
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