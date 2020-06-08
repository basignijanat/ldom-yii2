<?php
/* @var $this yii\web\View */

use yii\widgets\Pjax;

?>
<? Pjax::begin() ?>
    <form id="raw_image_form" action="/admin/image/upload-raw" method="post" enctype="multipart/form-data">
        <input type="file" name="raw_image" id="raw_image_file">
        <input type="text" name="raw_text">
        <input type="submit">
    </form>

    <p id="ajax_result">Upload status:none</p>
<? Pjax::end() ?>
