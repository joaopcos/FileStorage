$('#login').submit(function(e){
    e.preventDefault();

    var authUser = $('#user').val();
    var authPassword = $('#password').val();

    $('#loading-ajax').ajaxStart(function() {
        $(this).show();
    }).ajaxComplete(function() {
        $(this).hide();
    });

    console.log(authUser, authPassword);
    $.ajax({
        url: 'authentication.php?function=login',
        method: 'POST',
        data: {User: authUser, Password: authPassword},
        dataType: 'json',
        beforeSend: function() { $('#loading-ajax').show(); },
        complete: function() { $('#loading-ajax').hide(); },
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