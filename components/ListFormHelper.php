<?php

namespace app\components;

use yii\helpers\Html;

	class ListFormHelper
	{
		public static function showUpdateList($itemsAll, $itemsSelected, $outputField, $uniqId, $settings = array(
			'addButtonName' => 'Add',
			'removeButtonName' => 'Remove',
			'header-level' => 2,
			'header-left' => 'All Items',
			'header-right' => 'Selected Items',)
		)
		{
			$result = '';
			
			if (count($itemsAll) > 0)
			{
				foreach ($itemsAll as $itemOne)
				{
					if (in_array($itemOne, $itemsSelected))
					{
						unset($itemsAll[array_search($itemOne, $itemsAll)]);					
					}
				}
			}
			
			$result .= '<table class="form-group"><tr><td style="padding: 5px;"><h'.$settings['header-level'].'>'.$settings['header-left'].'</h'.$settings['header-level'].'></td><td></td><td><h'.$settings['header-level'].'>'.$settings['header-right'].'</h'.$settings['header-level'].'></td></tr><tr><td style="padding: 5px;">';
			$result .= Html::dropDownList('', '', $itemsAll, ['multiple' => 'true', 'id' => 'all_items_'.$uniqId]);
			$result .= '</td><td style="padding: 1px;"><div style="margin: 3px;">';
			$result .= Html::button($settings['addButtonName'], ['type' => 'button', 'class' => 'btn', 'onclick' => "addToList('".$outputField."', '".$uniqId."')"]);
			$result .= '</div><div  style="margin: 3px;">';
			$result .= Html::button($settings['removeButtonName'], ['type' => 'button', 'class' => 'btn', 'onclick' => "removeFromList('".$outputField."', '".$uniqId."')"]);
			$result .= '</div></td><td style="padding: 5px;">';
			$result .= Html::dropDownList('', '', $itemsSelected, ['multiple' => 'true', 'id' => 'selected_items_'.$uniqId]);
			$result .= '</td></tr></table>';
			
			return $result;
		}
		
	}
?>