<?php
namespace app\components;
	class NoEmptyDb
	{
		public static function firstEntry($model, $data = array())
		{
			if (!$model::find()->all())
			{
				foreach ($data as $key => $value)
				{
					$model[$key] = $value;
				}
				$model->save();
			}
		}
	}
?>