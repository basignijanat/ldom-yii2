$(document).ready(function(){        
    $(document).on('change', '#image-temp_image', function(){
        $('#image').submit();
    });

    $(document).on('pjax:success', function(){                
        if ($('.croppie-container').length == 0){
            $('#langImage').croppie({
                boundary: {
                    width: 360,
                    height: 480,
                },
                viewport: {
                    width: 180, 
                    height: 240, 
                    type: 'square'
                }
            });   
        }
        else{
            $('#langImage').croppie('bind', {
                url: $('#image-temp_image_url').val(),
                points: [90,120,270,360]
            });
        }
    });

    $('#crop_done').on('click', function(){
        $('#langImage').croppie('result', 'base64').then(function(base64) {
            $.post(window.location.href, {cropped_image: base64}, function(data) { 
                var data = JSON.parse(data);                
                $('#language-image').val(data['uploaded_file']);                
                $('#langImage').croppie('destroy');
                //$('#langImage').val(data['uploaded_file']);
            });
        });
 
        
    });
    /*$('#langImage').on('update.croppie', function(ev, cropData) {
        $('#language-image_file').attr('val', 100);
    });    */
});
