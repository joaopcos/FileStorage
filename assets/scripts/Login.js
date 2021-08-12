$('#login').submit(function(e){
    e.preventDefault();

    var authUser = $('#user').val();
    var authPassword = $('#password').val();

    console.log(authUser, authPassword);
    $.ajax({
        url: 'authentication.php',
        method: 'POST',
        data: {User: authUser, Password: authPassword},
        dataType: 'json',
        success: function(data){
            switch (data.status){
                case 'empty_fields':
                    $('#alert-content').html('<p>You must fill all the fields!</p>');
                    break;
                case 'user_or_password_incorrect':
                    $('#alert-content').html('<p>User or password is incorrect!</p>');
                    break;
                case 'success':
                    window.location = "dashboard.php";
            }
        }
    })
});