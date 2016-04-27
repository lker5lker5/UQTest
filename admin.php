<?php
/**
 * Created by IntelliJ IDEA.
 * User: vinson
 * Date: 27/04/16
 * Time: 3:26 PM
 */
    if(!isset($_COOKIE['islogin']) || !isset($_COOKIE['usertype']) || !$_COOKIE['islogin'] == 1 || !$_COOKIE['usertype'] == 1){
        exit("<div style='margin: 0 auto; text-align:center'>Not an admin or timed-out? Please <a href='index.php'>Login</a> again</div>!");
    }
?>

<!DOCTYPE html>
<html lang="en">
<?php
    require 'views/head.php';
?>
<body>
<!--Web navigation-->
<header id="web_header">
    <div class="fadeInLeft animated">
        <h1 id="adminInfo">Welcome, <?=$_COOKIE['user']?>!</h1>
    </div>
    <nav id="problem_list_header">
        <ul>
            <li>
                <a href="admin.php#addNew">Add User</a>
            </li>
            <li>
                <a href="admin#reset">Reset Password</a>
            </li>
            <li>
                <a href="admin#delete">Delete User</a>
            </li>
            <li>
                <div class="pulse animated">
                    <a id="log_out" href="javascript:;">Log out</a>
                </div
            </li>
        </ul>
    </nav>
</header>
<!--//Web navigation-->

<!--Main content-->
<section id="main_content" class="container">
    <div id="addNew" class="col-xs-12 col-md-4">
        <form id="add_form">
            <fieldset>
                <legend>Add Normal User</legend>
                <p id="add_indicator" style="color: darkred"></p>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="user" placeholder="Username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" class="form-control" id="password" name="pass" placeholder="Password">
                </div>
                <div class="form-group">
                    <input id="add_normal_btn" type="button" class="btn btn-primary" value="ADD" />
                </div>
            </fieldset>
        </form>
    </div>
    <div id="reset" class="col-xs-12 col-md-4">
        <form id="reset_form">
            <fieldset>
                <legend>Reset Your Password</legend>
                <p id="reset_indicator" style="color: darkred"></p>
                <div class="form-group">
                    <label for="oldPass">Old Password</label>
                    <input type="password" class="form-control" id="oldPass" name="oldPass" placeholder="Your Old Password">
                </div>
                <div class="form-group">
                    <label for="newPass">New Password</label>
                    <input type="password" class="form-control" id="newPass" name="newPass" placeholder="Your New Password">
                </div>
                <div class="form-group">
                    <label for="newPass2">Confirm</label>
                    <input type="password" class="form-control" id="newPass2" name="newPass2" placeholder="Confirm New Password">
                </div>
                <div class="form-group">
                    <input type="button" id="update_pass_btn" class="btn btn-success" value="Reset" />
                </div>
            </fieldset>
        </form>
    </div>
    <div id="delete" class="col-xs-12 col-md-4">
        <form id="delete_form">
            <fieldset>
                <legend>Delete Normal User</legend>
                <p id="delete_indicator" style="color: darkred"></p>
                <div class="form-group">
                    <label for="user">Username</label>
                    <input type="text" class="form-control" id="deleteUser" name="username" placeholder="The user you want to remove" />
                </div>
                <div class="form-group">
                    <input type="button" id="delete_btn" class="btn btn-danger" value="Delete" />
                </div>
            </fieldset>
        </form>
    </div>
</section>
<!--//main content-->

<!--Footer-->
<footer id="web_footer" style="position: fixed; bottom: 0; left: 0;">
    <nav id="problem_list_footer">
        <ul>
            <li><a href="admin.php#addNew">Add User</a></li>
            <li><a href="admin.php#reset">Reset Password</a></li>
            <li><a href="admin#delete">Delete User</a></li>
        </ul>
    </nav>
    <div class="copyright fadeInLeft animated" style="visibility: visible; -webkit-animation-delay: 0.4s;">
        <p>Copyright &copy; 2016. <a target="_blank" href="https://www.uq.edu.au">University of Queensland Reserved.</a></p>
    </div>
</footer>
<!--Footer-->
<script>
    $(document).ready(function() {
        $( window ).scroll(function() {
            var scroll = $(window).scrollTop();
            if(scroll > 20){
                $('#toTop').show();
                $('#toTop').click(function(e){
                    e.preventDefault();
                    $('html,body').stop(true, false).animate ({scrollTop:0}, 500);
                });
            }else{
                $('#toTop').hide();
            }
        });
    });
</script>
<script src="assets/js/admin.js"></script>
</body>
</html>
