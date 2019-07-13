$(document).ready(function(){
    $('#user-image_file').change(function(){         
        $('#userpic-file-name').text($('#user-image_file').val().substring(12, $('#user-image_file').val().length)); 
    });
});