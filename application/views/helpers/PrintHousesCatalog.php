<?php

// ATTENZIONE: self-documenting code!

class Zend_View_Helper_PrintHousesCatalog extends Zend_View_Helper_Abstract
{
	public function printHousesCatalog($view)
	{
		$housesCatalog = '';
		
		$rowOpened = false;
	    $itemsInRow = 0;
			  
		foreach ($view->housesList as $house) {
				  
			if ($itemsInRow == 0) {
					 
				$housesCatalog .= '<tr>';
			}
				 
			else if ($itemsInRow >= 4)  {
					 
				$housesCatalog .= '</tr>';
				$housesCatalog .= '<tr>';
				$itemsInRow = 0;
					 	 
			}
				  
				  
			$housesCatalog .= '<td><a href = '. $view->url(array('controller' => 'index',
		                                                     'action' => 'infohouse', 
									                         'houseId' => $house->id), 'default', true) . '> <div class="span3 medium">
                <div class="pricing-table-header-medium" id = "'.$house->id. '">
                    <center><h2>'.$house->location.'</h2></center>
                    <center><h3>'.number_format($house->price).' £</h3></center>
                    <center><h3>'.number_format($house->sq_ft).' ft²</h3></center>
                </div><div class="pricing-table-features">
                   <img src = "'. $view->baseUrl('img/'.$house->picture1).'" width = "230px" height = "300px" >
                </div>
                
            </div></a></td>';
            
            $itemsInRow++;
            
		  
		}
		
		


		
		return $housesCatalog;
	}
}
