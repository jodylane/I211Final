<?php
/**
 * User: Blake
*/
class BookSearch extends BookIndexView {

    public function display($terms, $books) {
        parent::displayHeader("Search Results");
        ?>

        <div class="row">
            <div class="col-md-10  col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Search Results for: '<?= $terms ?>'
                    </div>
                </div>
            </div>
        </div>

        <div class='row'>
            <div class='col-md-10 col-md-offset-1'>
                <?php
                if ($books === 0) {
                    echo "No books were found with under '$terms'.<br><br><br><br><br>";
                } else {
                    // loop through each book and retrieve book details and display them.
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
                }
                ?>
            </div>
        </div>

        <?php
        parent::displayFooter();
    }
}
