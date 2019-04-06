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
		
		public static function excludeDropDownById($source, $idList = array())
		{	
			$newList = array();
			if ($source && $idList)
			{
				foreach ($source as $key => $value)
				{
					if (in_array($key, $idList))
					{
						$newList[$key] = $source[$key];
					}
				}
				return $newList;
			}
			else
			{
				return false;
			}
		}
	}
?>