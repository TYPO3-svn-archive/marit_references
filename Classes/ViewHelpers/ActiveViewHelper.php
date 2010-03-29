<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2010 Marit AG <typo3-extension@marit.ag>
*  			Marco Huber <marco.huber@marit.ag>, Marit AG
*  			Markus Kleinhenz <markus.kleinhenz@marit.ag>, Marit AG
*  			Goran Stefanovic <goran.stefanovic@marit.ag>, Marit AG
*  			
*  			
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/

/**
 * View helper to compare a value with a GETvar
 *
 *
 * @version $Id$
 * @license http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public License, version 3 or later
 */
class Tx_MaritReferences_ViewHelpers_ActiveViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {
	
	/**
	 * Compare $compareWith with a GET-var and return $ifTrue or $else
	 *
	 * @param string $getVar
	 * @param string $compareWith
	 * @param string $ifTrue
	 * @param string $else
	 *
	 * @return string $ifTrue or $else.
	 * @author Marco Huber <typo3-extension@marit.ag>
	 */
	public function render($getVar, $compareWith, $ifTrue, $else='') {
		if($this->controllerContext->getRequest()->hasArgument($getVar)){
			$temp = $this->controllerContext->getRequest()->getArgument($getVar);
		} else {
			$temp = 'Project';
		}
		if($temp == $compareWith){
			return $ifTrue;
		} else {
			return $else;	
		}
	}
}


?>