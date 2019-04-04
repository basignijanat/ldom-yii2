<?php

namespace app\components;

	class ArrayForForm
	{
		public static function getDropDownArray($elements, $name)
		{			
			$selectElements = array();
			foreach ($elements as $element)
			{
				$selectElements[$element['id']] = $element[$name];
			}		
			return $selectElements;
		}		
		
	}
?>