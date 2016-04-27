/**
 * Created by vinson on 27/04/16.
 */
(function($){
    $(function(){
        /**
         * Logout function
         */
        $('#log_out').on('click', function(){
            window.location.href = window.location.href.replace(/admin.*/g,'index.php');
            $.ajax({
                url: window.location.href.replace(/admin.*/g,'') + "dataHandler/controllers/logout.php",
                type: "POST",
                success: function(result){

                }
            });
        });

        /**
         * Add a normal user record part
         */
        $('#username').focus(function(){
            $('#username').val("");
        });

        $('#password').focus(function(){
            $('#password').val("");
        });

        $('#add_normal_btn').on('click', function(){
            var username = document.getElementById('username').value;
            var password = document.getElementById('password').value;
            if(!/[a-zA-z0-9]{5,10}/.test(username)) {
                alert("Username only accepts numbers and letters (5-10 characters)");
            }
            if(!/[a-zA-Z0-9]{5,}/.test(password)){
                alert("Password should at least 6-character long (letters and numbers only)!");
            }else{
                $.ajax({
                    url: window.location.href.replace(/admin.*/g,'') + "dataHandler/controllers/addNorUser.php",
                    type: "POST",
                    data: $('#add_form').serialize(),
                    success: function(result) {
                        console.log("Added Info => " + result);
                        if(result == 1){
                            $('#add_indicator').text("The record is added successfully.");
                            $('#add_indicator').delay(5000).fadeOut();
                            $('#username').val("");
                            $('#password').val("");
                        }else{
                            $('#add_indicator').text("Error occurs! Please check the console.");
                            $('#add_indicator').show().delay(5000).fadeOut();
                        }
                    }
                });
            }
        });

        /**
         * Update current user's password
         */
        $('#oldPass').focus(function(){
            $('#oldPass').val("");
        });
        $('#newPass').focus(function(){
            $('#newPass').val("");
        });
        $('#newPass2').focus(function(){
            $('#newPass2').val("");
        });

        $('#update_pass_btn').on('click', function(){
            var oldPass = document.getElementById('oldPass').value;
            var newPass = document.getElementById('newPass').value;
            var newPass2 = document.getElementById('newPass2').value;

            if(!/[a-zA-Z0-9]{5,}/.test(oldPass) || !/[a-zA-Z0-9]{5,}/.test(oldPass)){
                alert("Password should at least 6-character long (letters and numbers only)!");
            }else if(newPass.localeCompare(newPass2)){
                alert("New passwords are not the same. Please have a check.");
            }else{
                $.ajax({
                    url: window.location.href.replace(/admin.*/g,'') + "dataHandler/controllers/updatePassword.php",
                    type: "POST",
                    data: $('#reset_form').serialize(),
                    success: function(result) {
                        console.log("Update Info => " + result);
                        if(result == 0){
                            $('#reset_indicator').text("The old password you entered is invalid!");
                            $('#reset_indicator').delay(5000).fadeOut();
                        }else if(result == 1){
                            $('#reset_indicator').text("The password has been updated!");
                            $('#reset_indicator').delay(5000).fadeOut();
                            $('#oldPass').val("");
                            $('#newPass').val("");
                            $('#newPass2').val("");
                        }else{
                            $('#reset_indicator').text("Error occurs! Please check the console.");
                            $('#reset_indicator').show().delay(5000).fadeOut();
                        }
                    }
                });
            }
        });

        /**
         * Delete a user
         */
        $('#deleteUser').focus(function(){
            $('#deleteUser').val("");
        });


        $('#delete_btn').on('click', function(){
            var username = document.getElementById('deleteUser').value;

            if(!/[a-zA-z0-9]{5,10}/.test(username)) {
                alert("Username only accepts numbers and letters (5-10 characters)");
            }else{
                $.ajax({
                    url: window.location.href.replace(/admin.*/g,'') + "dataHandler/controllers/deleteUser.php",
                    type: "POST",
                    data: $('#delete_form').serialize(),
                    success: function(result) {
                        console.log("Delete Info => " + result);
                        if(result){
                            $('#delete_indicator').text("The user has been deleted!");
                            $('#delete_indicator').delay(5000).fadeOut();
                            $('#deleteUser').val("");
                        }else{
                            $('#delete_indicator').text("Error occurs! Please check the console.");
                            $('#delete_indicator').show().delay(5000).fadeOut();
                        }
                    }
                });
            }
        });

    });
})(jQuery);