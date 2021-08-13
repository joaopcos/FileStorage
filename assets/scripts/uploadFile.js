$('#upload').submit(function(uploadFile){
    uploadFile.preventDefault();

    var File = $('#file').prop('files')[0];
    var formData = new FormData();
    formData.append('file', File);

    console.log(File);

    $.ajax({
        xhr: function() {
            var xhr = new window.XMLHttpRequest();
            xhr.upload.addEventListener("progress", function(evt) {
                if (evt.lengthComputable) {
                    var uploadProgress = (evt.loaded / evt.total);
                    uploadProgress = parseInt(uploadProgress * 100) + "%";
                    $('#percentage').html(uploadProgress);
                }
            }, false);
            return xhr;
        },
        url: 'upload.php',
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        method: 'POST',
        data: formData,
        beforeSend: function(){
            $('#submit-file').hide();
            $('#progress').show();
        },
        complete: function(){
            $('#submit-file').show();
            $('#progress').hide();
        },
        success: function(response){
            if(response.status == 'error'){
                $('#response').html(response.message);
            }else if(response.status == 'success'){
                $('#response').html(response.message);
            }
        }
    })
});