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
		
		public static function excludeDropDownById($source, $idList)
		{
			if (isset($source))
			{
				foreach ($source as $key => $value)
				{
					if (!in_array($key, idList))
					{
						unset($source[$key]);
					}
				}
				return $source;
			}
			else
			{
				return false;
			}
		}
	}
?>