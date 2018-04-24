<?php

/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 4/5/2018
 * Time: 2:03 PM
 * Description: This file was created to
 */
class MovieAdd extends MovieIndexView {
    public function display(){
        parent::displayHeader('New Movie');
        if (isset($_SESSION['movie_categories'])) {
            $categories = $_SESSION['movie_categories'];
        }

        ?>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading ">
                        <h3 class="panel-title">Create Movie</h3>
                    </div>
                    <div class="panel-body">
                        <form action='<?= BASE_URL . "/movie/create" ?>' method="post">
                            <div class="col-md-10 col-md-offset-1">
                                <input type="hidden" name="id">
                                <div class="form-group">
                                    <input class="form-control" name="title" placeholder="Title"/>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="isbn" placeholder="ISBN"/>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="author" placeholder="Author"/>
                                </div>
                                <div class="radio-form-fix">
                                    <?php
                                    foreach ($categories as $m_category => $m_id) {
                                        $checked = "";

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
                                    <input class="form-control" name="publish-date" placeholder="Publish Date yyyy-mm-dd"/>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="publisher" placeholder="Publisher"/>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="image" placeholder="Image URL"/>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="description" placeholder="Description" rows="8"></textarea>
                                </div>
                                <div class="text-center form-group">
                                    <input class="btn btn-primary" type="submit" name="action" value="Create">
                                    <input class="btn btn-danger" type="button" value="Cancel" onclick='window.location.href = "<?= BASE_URL . "/movie/" ?>"'>
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