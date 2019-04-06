<?php

namespace app\components;

	class ListFormHelper
	{
		public static function showDropDownMultiple($itemList, $selectId)
		{			
			echo '<select name= "asd" id="'.$selectId.'" multiple>';			
			if ($itemList)
			{
				foreach ($itemList as $key => $value)
				{					
					echo '<option value="'.$key.'">'.$value.'</option>';
				}
			}
			echo '</select>';			
		}

		public static function showUpdateList($itemsAll, $itemsSelected, $outputField, $addButtonName, $removeButtonName)
		{
			foreach ($itemsAll as $itemOne)
			{
				if (in_array($itemOne, $itemsSelected))
				{
					unset($itemsAll[array_search($itemOne, $itemsAll)]);					
				}
			}
			self::showDropDownMultiple($itemsAll, 'all_items');
			echo "<button type=button onclick=addToList('".$outputField."')>".$addButtonName.'</button>';
			echo "<button type=button onclick=removeFromList('".$outputField."')>".$removeButtonName.'</button>';
			self::showDropDownMultiple($itemsSelected, 'selected_items');
		}
		
	}
?>