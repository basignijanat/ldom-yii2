<?php

namespace app\components;

use yii\helpers\Html;

	class ListFormHelper
	{
		public static function showUpdateList($itemsAll, $itemsSelected, $outputField, $uniqId, $settings = array(
			'addButtonName' => 'Add',
			'removeButtonName' => 'Remove',			
			'header-left' => 'All Items',
			'header-right' => 'Selected Items',
			)){
			$result = '';
			
			if (count($itemsAll) > 0){
				foreach ($itemsAll as $itemOne){
					if (in_array($itemOne, $itemsSelected)){
						unset($itemsAll[array_search($itemOne, $itemsAll)]);					
					}
				}
			}
			
			$result .= Html::beginTag('div', [
				'class' => 'form-group'
			]);
			$result .= 
				'<table>'.
					'<tr>'.
						'<td class="label-multiselect">'.							
							Html::label($settings['header-left']).
						'</td>'.
						'<td></td>'.
						'<td>'.							
							Html::label($settings['header-right']).
						'</td>'.
					'</tr>'.
					'<tr>'.
						'<td class="label-multiselect">';
			$result .= Html::dropDownList('', '', $itemsAll, [
				'multiple' => 'true', 
				'id' => 'all_items_'.$uniqId,
				'class' => 'form-control',
			]);
			$result .= '</td><td style="padding: 1px;"><div style="margin: 3px;">';
			$result .= Html::button($settings['addButtonName'], [
				'type' => 'button', 
				'class' => 'btn btn-multiselect', 
				'onclick' => "addToList('".$outputField."', '".$uniqId."')"
			]);
			$result .= '</div><div style="margin: 3px;">';
			$result .= Html::button($settings['removeButtonName'], [
				'type' => 'button', 
				'class' => 'btn btn-multiselect', 
				'onclick' => "removeFromList('".$outputField."', '".$uniqId."')"
			]);
			$result .= '</div></td><td style="padding: 5px;">';
			$result .= Html::dropDownList('', '', $itemsSelected, [
				'multiple' => 'true', 
				'id' => 'selected_items_'.$uniqId,
				'class' => 'form-control',
			]);
			$result .= '</td></tr></table>';
			$result .= Html::endTag('div');
			
			return $result;
		}
		
	}
?>