<?php
/**
 * Created by PhpStorm.
 * User: busin
 * Date: 4/18/2018
 * Time: 5:50 PM
 */

class SignUp extends IndexView {
    public function display()
    {
        parent::displayHeader("User Sign up")

        ?>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading ">
                        <h3 class="panel-title">Sign Up</h3>
                    </div>
                    <div class="panel-body">
                        <form action='<?= BASE_URL . "/user/create" ?>' method="post">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="firstName">First Name:</label>
                                        <input class="form-control" id="firstName" placeholder="ex. Blake" name="firstName">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="lastName">Last Name:</label>
                                        <input class="form-control" id="lastName" placeholder="ex. Robertson" name="lastName">
                                    </div>

                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <div class="radio">
                                            <label><input type="radio" name="role" value="user" checked>User</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="role" value="admin">Admin</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-row">

                                    <div class="form-group col-md-12">
                                        <label for="email">Email:</label>
                                        <input type="email" class="form-control" id="email" placeholder="ex. Blake@gmail.com" name="email" >
                                        <small id="emailHelp" class="form-text text-muted">Required</small>

                                    </div>

                                </div>

                                <div class="form-row">

                                    <div class="form-group col-md-12">
                                        <label for="pwd">Password:</label>
                                        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" >
                                        <small id="pwdHelp" class="form-text text-muted">Required</small>
                                    </div>
                                </div>


                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-default">Submit</button>
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