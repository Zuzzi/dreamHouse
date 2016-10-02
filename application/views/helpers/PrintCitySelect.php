<?php

// ATTENZIONE: self-documenting code!

class Zend_View_Helper_PrintCitySelect extends Zend_View_Helper_Abstract
{
	public function printCitySelect($housesListForSelect)
	{
		$citySelect = " <select id = 'selectCity' name = 'city' size = '1'>
									  <option value = 'any' >Any city</option>";
		
		
		$housesCities = []; 
									  
									  
		foreach ($housesListForSelect as $house) {
										  
										    
	        if (!in_array ($house->location, $housesCities)) {
			    $housesCities[] = $house->location;
			}
										  
							  
		}
										  
										  
		foreach ($housesCities as $city) {
											  
		    $citySelect .=  "<option value = '".$city. "'>".$city."</option>";
											  
	    }
	    
	    
	    $citySelect .= "</select>";
										  
		

		
		return $citySelect;
	}
}
