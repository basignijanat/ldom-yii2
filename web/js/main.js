$(document).ready(function(){
    $(".owl-carousel").owlCarousel();
    
    $('#user-image_file').change(function(){         
        $('#userpic-file-name').text($('#user-image_file').val().substring(12, $('#user-image_file').val().length)); 
    });

    $('.edit').on('click', function(){
        user_property = $(this).data('user_property');        
        $('#div-show-' + user_property).addClass('edit-user-property');        
        $('#btn-edit-' + user_property).addClass('edit-user-property');        
        $('#div-edit-' + user_property).removeClass('edit-user-property');        
        $('#cancel-edit-' + user_property).removeClass('edit-user-property');
    });

    $('.cancel').on('click', function(){
        user_property = $(this).data('user_property');        
        $('#div-show-' + user_property).removeClass('edit-user-property');        
        $('#btn-edit-' + user_property).removeClass('edit-user-property');        
        $('#div-edit-' + user_property).addClass('edit-user-property');        
        $('#cancel-edit-' + user_property).addClass('edit-user-property');        
    });
});