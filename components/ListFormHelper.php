<?php

namespace app\components;

	class ListFormHelper
	{
		public static function showDropDownMultiple($itemList, $itemString, $selectName, $scriptOnselect = '', $formName = '', $submitName = '')
		{
			$selectedItems = explode(' ', $itemString);
			echo '<form name="'.$formName.'">';
			echo '<select name="'.$selectName.'" id="'.$selectName.'" multiple>';			
			$emptyList = false;
				if ($itemList)
				{
					foreach ($itemList as $key => $value)
					{
						if (in_array($key, $selectedItems))
						{
							$selected = ' selected ';
						}
						else
						{
							$selected = ' ';
						}
						echo '<option'.$selected.'value="'.$key.'" onclick="'.$scriptOnselect.'">'.$value.'</option>';
					}
				}
				else
				{
					$emptyList = true;
				}
			echo '</select>';
			if (strlen($submitName) > 0)
			{
				echo '<input type="submit" name="'.$formName.'">';
			}
			echo '</form>';
			if ($emptyList)
			{
				echo '<lable>No items in database</lable>';
			}
		}		
		
	}
?>