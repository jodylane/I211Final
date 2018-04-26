<?php

/**
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 4/5/2018
 * Time: 2:03 PM
 * Description: This file was created to create a book.
 */
class BookAdd extends BookIndexView {
    public function display(){
        parent::displayHeader('New Book');

        // retrieve all book categories
        if (isset($_SESSION['book_categories'])) {
            $categories = $_SESSION['book_categories'];
        }
        ?>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading ">
                        <h3 class="panel-title">Create Book</h3>
                    </div>
                    <div class="panel-body">
                        <form action='<?= BASE_URL . "/book/create" ?>' method="post">
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
                                    // loop through all categories and display them as radio buttons
                                    foreach ($categories as $b_category => $b_id) {
                                        $checked = "";

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
                                    <input class="form-control" name="publish-date" placeholder="Publish Date mm/dd/yyyy"/>
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
                                    <input class="btn btn-danger" type="button" value="Cancel" onclick='window.location.href = "<?= BASE_URL . "/book/index" ?>"'>
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
