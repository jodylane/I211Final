<?php
/**
 * Created by PhpStorm.
 * User: Blake
 * Date: 4/5/2018
 * Time: 2:03 PM
 * Description: This file was created to
 */
    class MovieSearch extends MovieIndexView {

    public function display($terms, $movies) {
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
                if ($movies === 0) {
                    echo "No movies were found with under '$terms'.<br><br><br><br><br>";
                } else {
                    foreach ($movies as $i => $movie) {
                        $id = $movie->getId();
                        $title = $movie->getTitle();
                        $category = $movie->getCategory();
                        $publish_date = new DateTime($movie->getPublishDate());
                        $publish_date = $publish_date->format('m-d-Y');
                        $image = $movie->getImage();
                        if (strpos($image, "http://") === false AND strpos($image, "https://") === false) {
                            $image = BASE_URL . "/" . MOVIE_IMG . $image;
                        }

                        if ($i % 5 == 0) {
                            echo "<div class='row'>";
                        }
                        ?>

                        <div class="col-md-custom">
                            <a href="<?= BASE_URL ?>/movie/show/<?= $id ?>">
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
                        if ($i % 5 == 4 || $i == count($movies) - 1) {
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