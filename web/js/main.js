$(document).ready(function(){
    $('#user-image_file').change(function(){         
        $('#userpic-file-name').text($('#user-image_file').val().substring(12, $('#user-image_file').val().length)); 
    });

    $('.edit').on('click', function(){
        user_property = $(this).data('user_property');        
        $('#div-show-' + user_property).addClass('edit-user-property');        
        $('#btn-edit-' + user_property).addClass('edit-user-property');        
    });
});