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
 * This view helper implements a pagebrowser
 * 
 * inspired by Susanne Moog <typo3@susanne-moog.de>: viewhelper for "addresses" http://forge.typo3.org/projects/show/extension-addresses
 *
 * @package marit_references
 * @subpackage ViewHelpers
 * @version $Id: $
 * @license http://opensource.org/licenses/gpl-license.php GNU Public License, version 2
 * @scope prototype
 */
class Tx_MaritReferences_ViewHelpers_PageBrowserViewHelper extends Tx_Fluid_Core_ViewHelper_TagBasedViewHelper {
	
	/**
	 * @var string
	 */
	protected $tagName = 'a';

	/**
	 * Constructs this pagebrowser Helper
	 */
	public function __construct() {
	}

	/**
	 * renders a pagebrowser
	 *
	 * @param  int The total item count for calculating the page count
	 * @param  int The maximum amount of items to show per page
	 * @param  int The number of pages to show left an right frim the current page
	 * @param  string if $mode=='items' show the number of displayed items, else show the pages
	 * @param  string The label for the "previous" link, taken from locallang
	 * @param  string The label for the "next" link, taken from locallang
	 * @param  string a "template" filled with sprintf
	 * @param  string onclick
	 * @return string the rendered string
	 * @author Marco Huberg <marco.huber@marit.ag>
	 */
	public function render($totalCountOfItems=NULL, $maxItemsToDisplay=5, $range=2, $mode='pages', $previousLabel='previous', $nextLabel='next', $template='page %1$s out of %2$s<br />%3$s %4$s %5$s', $onclick='') {
		$pagesTotal = ceil($totalCountOfItems/$maxItemsToDisplay);
		if($this->controllerContext->getRequest()->hasArgument('currentPage')) {
			$currentPage = $this->controllerContext->getRequest()->getArgument('currentPage');
		} else {
			$currentPage = 0;
		}
		if(($currentPage+1) == $pagesTotal) {
			$next = '';
		} else {
			$next = $this->getLink(($currentPage+1), $nextLabel, $onclick, 'next');
		}
		if($currentPage == 0) {
			$previous = '';
		} else {
			$previous = $this->getLink(($currentPage-1), $previousLabel, $onclick, 'previous');
		}
		for($i=0; $i<$range; $i++){
			if(($currentPage-$i-1)>=0){
				if($mode == 'items'){
					$label = (($maxItemsToDisplay*($currentPage-$i-1))+1).'-'.($maxItemsToDisplay*($currentPage-$i));
				} else {
					$label = ($currentPage+1);
				}
				$leftPages[] = $this->getLink(($currentPage-$i-1), $label, $onclick);
			}
			if(($currentPage+$i+1)<$pagesTotal) {
				if($mode == 'items'){
					$label = (($maxItemsToDisplay*($currentPage+$i+1))+1).'-'.(($maxItemsToDisplay*($currentPage+$i+2))<$totalCountOfItems?($maxItemsToDisplay*($currentPage+$i+2)):$totalCountOfItems);
				} else {
					$label = ($currentPage+$i+2);
				}
				$rightPages[] = $this->getLink(($currentPage+$i+1), $label, $onclick);
			}
			if($i==($range-1)){
				if(($currentPage-$i-1)>=1) {
					if(($currentPage-$i-1)>=2){
						$leftPages[] = $this->getLink(0, 1, $onclick).'<span class="dots">...</span>';
					} else {
						$leftPages[] = $this->getLink(0, 1, $onclick);
					}
				}
				if(($currentPage+$i+1)<($pagesTotal-1)) {
					if(($currentPage+$i+1)<($pagesTotal-2)){
						$rightPages[] = '<span class="dots">...</span>'.$this->getLink(($pagesTotal-1), $pagesTotal, $onclick);
					} else {
						$rightPages[] = $this->getLink(($pagesTotal-1), $pagesTotal, $onclick);
					}
				}
			}
		}
		$leftPages = array_reverse($leftPages);
		if($mode == 'items'){
			$label = (($maxItemsToDisplay*$currentPage)+1).'-'.(($maxItemsToDisplay*($currentPage+1))<$totalCountOfItems?($maxItemsToDisplay*($currentPage+1)):$totalCountOfItems);
		} else {
			$label = ($currentPage+1);
		}
		$actPage = $this->getLink($currentPage, $label, $onclick, 'activePage');
		
		$content = sprintf($template, ($currentPage+1), $pagesTotal, $previous, implode($leftPages).$actPage.implode($rightPages), $next);
		return $content;
	}
	
	/**
	 * Uses the typolink function to return a link with the corresponding GET-parameter for page browsing
	 * 
	 * @param int $page = the page to be linked by the pagebrowser (f.e. the next or previous page)
	 * @param string the text of the link (<a>text</a>)
	 * @param string onclick
	 * @return string returns an a-tag with a link to the same page and an additional parameter for the pagebrowser
	 * @author Marco Huberg <marco.huber@marit.ag>
	 */
	private function getLink($page, $linktext='', $onclick='', $class='') {
		$uriBuilder = $this->controllerContext->getUriBuilder();
		$arguments = $this->controllerContext->getRequest()->getArguments();
		$arguments['currentPage'] = $page;
		$uri = $uriBuilder
			->reset()
			->uriFor('list', $arguments);		

		$this->tag->addAttribute('href', $uri);
		if($onclick!=''){
			$this->tag->addAttribute('onclick', $onclick);
		} else {
			$this->tag->removeAttribute('onclick');
		}
		if($class!=''){
			$this->tag->addAttribute('class', $class);
		} else {
			$this->tag->removeAttribute('class');
		}
		$this->tag->setContent($linktext);

		return $this->tag->render(); 
	}
	
}

?>