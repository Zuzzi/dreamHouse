<?php

// ATTENZIONE: self-documenting code!

class Zend_View_Helper_FormatText extends Zend_View_Helper_Abstract
{
	public function formatText($text)
	{
		$lastCharWasDot = false;
		$textFormatted = "";
		

        $strlen = strlen( $text );
        
        for( $i = 0; $i <= $strlen; $i++ ) {
            $char = substr( $text, $i, 1 );
                
            if ($lastCharWasDot) {

				$textFormatted .= "<br>";
				$lastCharWasDot = false;
				
			}
			
			if ($char == ".")
			    $lastCharWasDot = true;
			
			$textFormatted .= $char;
    
            }
		

		
		return $textFormatted;
	}
}
