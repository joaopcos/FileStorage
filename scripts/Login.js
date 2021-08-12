$('#login').submit(function(e){
    e.preventDefault();

    var authUser = $('#user').val();
    var authPassword = $('#password').val();

    console.log(authUser, authPassword);
    $.ajax({
        url: 'authentication.php',
        method: 'POST',
        data: {User: authUser, Password: authPassword},
        dataType: 'json'
    }).done(function(result){
        console.log(result);

        $('#alert-content').html(result);
    });
})