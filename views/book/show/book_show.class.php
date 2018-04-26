<?php

/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 4/5/2018
 * Time: 2:02 PM
 * Description: This file was created to show book details.
 */
class BookShow extends BookIndexView {
    public function display($book, $confirm = "") {
        parent::displayHeader("Page Title");

        // retrieve user and role session variables for this file.
        if (isset($_SESSION['user'])) {
            $user = $_SESSION['user'];
        }
        if(isset($_SESSION['admin'])) {
            $role = $_SESSION['admin'];
        }

        // retrieve book details
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

        // display local image if value is not a url.
        if (strpos($image, "http://") === false AND strpos($image, "https://") === false) {
            $image = BASE_URL . '/' . BOOK_IMG . $image;
        }

        // display update message if present
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
                        <h3 class="panel-title">Book Details</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="<?= $image ?>" alt="<?= $title ?>"/>
                            </div>
                            <div class="col-md-8">
                                <p><strong>Title: </strong><?= $title ?></p>

                                <p><strong>Author: </strong><?= $author ?></p>

                                <p><strong>Genre: </strong><?= $category ?></p>

                                <p><strong>ISBN: </strong><?= $isbn ?></p>

                                <p><strong>Publisher: </strong><?= $publisher ?></p>

                                <p><strong>Publish Date: </strong><?= $publish_date ?></p>

                                <a href="<?= BASE_URL ?>/book/">Back</a>
                                <?php
                                // if user is present and role is also admin display edit and destroy links
                                    if($user) {
                                        if($role) {
                                            ?>
                                            |
                                            <a href="<?= BASE_URL ?>/book/edit/<?= $id ?>">Edit</a> |
                                            <a href="<?= BASE_URL ?>/book/destroy/<?= $id ?>">Delete</a>
                                            <?php
                                        }
                                        ?>
                                        | <a href="<?= BASE_URL ?>/book/addToCart/<?= $id ?>">Add to cart</a>
                                        <?php
                                    }
                                ?>

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
