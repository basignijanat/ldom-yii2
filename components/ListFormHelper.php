<?php

namespace app\components;

	class ListFormHelper
	{
		public static function showDropDownMultiple($itemList, $selectId)
		{			
			echo '<select id="'.$selectId.'" multiple>';			
			if ($itemList)
			{
				foreach ($itemList as $key => $value)
				{					
					echo '<option value="'.$key.'">'.$value.'</option>';
				}
			}
			echo '</select></form>';			
		}

		public static function showUpdateList($itemAll, $itemSelected)
		{
			//$selectedItems = explode(' ', $itemString);
			self::showDropDownMultiple($itemAll, '');
			self::showDropDownMultiple($itemSelected, '');
			/*if (strlen($submitName) > 0)
			{
				echo '<input type="submit" name="'.$formName.'">';
			}*/
		}
		
	}
?>