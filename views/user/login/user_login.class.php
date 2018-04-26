<?php

/* 
 * Created by PhpStorm.
 * User: Josh Lane
 * Date: 4/18/2018
 * Time: 5:50 PM
 * Description: This file was created to display a log in form for the user to log in to an existing account through the site.
 */

class UserLogin extends UserIndexView {
    public function display() {
        parent::displayHeader("Login");
        ?>

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading ">
                        <h3 class="panel-title">Log In</h3>
                    </div>
                    <div class="panel-body">
                        <form class="col-md-10 col-md-offset-1" action='<?= BASE_URL . "/user/signin" ?>' method="post" >

                            <div class="form-group">
                                <label for="inputEmail3" class="control-label">Email</label>
                                <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email">

                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                                <input type="password" name="password" class="form-control" id="inputPassword3"
                                       placeholder="Password">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-default">Sign in</button>
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
