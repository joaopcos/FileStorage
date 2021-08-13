$('#login').submit(function(submitFormData){
    submitFormData.preventDefault();

    var User = $('#user').val();
    var Password = $('#password').val();
    
    $.ajax({
        url: 'authentication.php?function=login',
        method: 'POST',
        data: {User, Password},
        dataType: 'json',
        beforeSend: function() { $('#loading-ajax').show(); },
        complete: function() { $('#loading-ajax').hide(); },
        success: function(response){
            if(response.status == 'error'){
                $('#alert-content').html('<p>' + response.message + '</p>');
            }else if(response.status == 'success'){
                window.location = "dashboard.php";
            }
        }
    })
});