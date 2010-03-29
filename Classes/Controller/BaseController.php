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
 * Controller for varius objects
 *
 * @version $Id$
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 */

class Tx_MaritReferences_Controller_BaseController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * @return void
	 */
	public function initializeAction() {
	}

	/**
	 * add css-files to header
	 *
	 * @array $files array with pathes to css-files, typically from typoscript
	 * @return void
	 *
	 */
	public function initCSS($files) {
		foreach($files as $cssFile) {
			$GLOBALS['TSFE']->additionalHeaderData['tx_maritreferences'] .= '<link rel="stylesheet" type="text/css" href="'.$cssFile.'" media="screen, projection" />'."\n";
		}
	}

	/**
	 * add js-files to header
	 *
	 * @array $files array with pathes to js-files, typically from typoscript
	 * @return void
	 *
	 */
	public function initJS($files) {
		foreach($files as $jsFile) {
			$GLOBALS['TSFE']->additionalHeaderData['tx_maritreferences'] .= '<script type="text/javascript" src="'.$jsFile.'"></script>'."\n";
		}
	}
}
?>
