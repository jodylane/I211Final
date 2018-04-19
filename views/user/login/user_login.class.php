<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UserLogin extends UserIndexView
{

    public function display($message = "")
    {
        parent::displayHeader("Login");
        ?>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading ">
                        <h3 class="panel-title">Log In</h3>
                    </div>
                    <div class="panel-body">
                        <form class="col-md-10 col-md-offset-1">
                            <div class="form-group">
                                <label for="inputEmail3" class="control-label">Email</label>
                                <input type="email" class="form-control" id="inputEmail3" placeholder="Email">

                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                                <input type="password" class="form-control" id="inputPassword3"
                                       placeholder="Password">
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> Remember me
                                    </label>
                                </div>
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