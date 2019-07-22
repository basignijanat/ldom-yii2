<?php

namespace app\components;

	class ArrayForForm
	{
		public static function getDropDownArray($elements, $names = ['name'], $defaultNul = null)
		{			
			$selectElements = [];
			
			if ($defaultNul){
				$selectElements[0] = $defaultNul;
			}			

			foreach ($elements as $element){
				if (is_array($names)){
					foreach ($names as $name){
						$selectElements[$element['id']] .= $element[$name].' ';
					}
				}
				else{
					$selectElements[$element['id']] = $element[$names];
				}				
			}	

			return $selectElements;
		}

		public static function getDropDownArrayCompound($modelId, $modelName, $modelNameId, $names = ['name'], $defaultNul = null)
		{			
			$selectElements = [];
			
			if ($defaultNul){
				$selectElements[0] = $defaultNul;
			}			

			foreach ($modelId::find()->all() as $element){
				$elementName = $modelName::find()->where(['id' => $element[$modelNameId]])->one();

				if ($elementName){
					foreach ($names as $name){
						$selectElements[$element['id']] .= $elementName[$name].' ';
					}
				}
				else{
					$selectElements[$element['id']] = '';
				}
			}	

			return $selectElements;
		}
		
		public static function excludeDropDownById($source, $idList = array())
		{	
			$newList = array();
			if ($source && $idList){
				foreach ($source as $key => $value){
					if (in_array($key, $idList)){
						$newList[$key] = $source[$key];
					}
				}

				return $newList;
			}
			else{
				
				return false;
			}
		}
	}
?>