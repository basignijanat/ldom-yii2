$(document).ready(function(){
    $('.reset').on('click', function(){
        setting_id = $(this).data('setting_id');
        $('#setting-value-' + setting_id).val(
            $('#setting-value-raw-' + setting_id).val()
        );
    });
});