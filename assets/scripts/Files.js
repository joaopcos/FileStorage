function getFiles(){
    $.ajax({
        url: 'files.php?function=get-files',
        method: 'POST',
        dataType: 'json',
        beforeSend: function() { $('#loading-ajax').show(); },
        complete: function() { $('#loading-ajax').hide(); },
        success: function(result){
            for (var i = 0; i < result.length; i++) {
                $('#file-list').prepend('<tr><td>'+result[i].fileName+'</td><td><center>'+result[i].fileSize+' bytes</center></td><td><center><a class="download" href="files/'+result[i].fileName+'" download="'+result[i].fileName+'">download</a><a class="delete" data-fname="'+result[i].fileName+'">delete</a></center></td></tr>');
            }
        }
    });
}

getFiles();

$('#upload').submit(function(uploadFile){
    uploadFile.preventDefault();

    var File = $('#file').prop('files')[0];
    var formData = new FormData();
    formData.append('file', File);

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
            $('#response').hide();
            $('#progress').show();
        },
        complete: function(){
            $('#submit-file').show();
            $('#progress').hide();
        },
        success: function(response){
            if(response.status == 'error'){
                $('#response').show();
                $('#response').html(response.message);
            }else if(response.status == 'success'){
                $('#response').show();
                $('#response').html(response.message);
                $('#file-list').empty();
                getFiles();
            }
        }
    })
});

$("#file-list").on('click', '.delete', function(){
    var fileToRemove = $(this).data('fname');

    $.ajax({
        url: 'files.php?function=remove',
        method: 'POST',
        data: {fileToRemove},
        dataType: 'json',
        success: function(response){
            $('#file-list').empty();
            getFiles();
        }
    })
})


