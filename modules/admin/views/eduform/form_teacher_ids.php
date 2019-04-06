<?php

use app\components\ListFormHelper;

?>

<div>

	<?php ListFormHelper::showUpdateList($teachers, $selectedTeachers, 'eduform-teacher_ids', Yii::t('app\admin', 'Add'), Yii::t('app\admin', 'Remove')); ?>

</div>	
