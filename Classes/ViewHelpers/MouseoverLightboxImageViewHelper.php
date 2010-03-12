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
 * View helper for showing a bigger lightboximage if the mouse is over an image.
 *
 * = Examples = (normal image-ViewHelper plus additional options)
 *
 * <code>
 * <helper:mouseoverLightboxImage src="{image.filePath}{image.fileName}" alt="{image.title} - {image.altText}" title="{image.title}" maxWidth="{settings.project.list.image.file.maxW}" lightboxMaxWidth="{settings.project.list.lightboxImage.file.maxW}" lightboxMaxHeight="{settings.project.list.lightboxImage.file.maxH}" id="projectImage_{image.fileHash}" class="lightboximage" />
 * </code>
 *
 * <output>
 * <img class="lightboximage" id="projectImage_b22b334524c34caa3d6d43e26ba6c4a7" title="xxx-website" alt="xxx-website - " src="typo3temp/pics/ca5d1c7a44.jpg" width="75" height="97" />
 * <img class="lightboximage_big" id="projectImage_b22b334524c34caa3d6d43e26ba6c4a7_big" title="xxx-website" alt="xxx-website - " src="typo3temp/pics/2ebd067058.jpg" width="310" height="400" />
 * </output>
 *
 * @version $Id$
 * @license http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public License, version 3 or later
 */
class Tx_MaritReferences_ViewHelpers_MouseoverLightboxImageViewHelper extends Tx_Fluid_ViewHelpers_ImageViewHelper {
	
	/**
	 * Initialize arguments.
	 *
	 * @return void
	 * @author Bastian Waidelich <bastian@typo3.org>
	 */
	/*public function initializeArguments() {
		parent::initializeArguments();
		$this->registerTagAttribute('onmouseover', 'string', 'Javascript', TRUE);
		$this->registerTagAttribute('onmouseout', 'string', 'Javascript', TRUE);
	}*/
	
	/**
	 * Render the img tag.
	 * @see http://typo3.org/documentation/document-library/references/doc_core_tsref/4.2.0/view/1/5/#id4164427
	 *
	 * @param string $src
	 * @param string $width width of the image. This can be a numeric value representing the fixed width of the image in pixels. But you can also perform simple calculations by adding "m" or "c" to the value. See imgResource.width for possible options.
	 * @param string $height height of the image. This can be a numeric value representing the fixed height of the image in pixels. But you can also perform simple calculations by adding "m" or "c" to the value. See imgResource.width for possible options.
	 * @param integer $minWidth minimum width of the image
	 * @param integer $minHeight minimum height of the image
	 * @param integer $maxWidth maximum width of the image
	 * @param integer $maxHeight maximum height of the image
	 * @param integer $lightboxMaxWidth maximum width of the lightbox image
	 * @param integer $lightboxMaxHeight maximum height of the lightbox image
	 *
	 * @return string rendered tag.
	 * @author Marco Huber <typo3-extension@marit.ag>
	 */
	public function render($src, $width = NULL, $height = NULL, $minWidth = NULL, $minHeight = NULL, $maxWidth = NULL, $maxHeight = NULL, $lightboxMaxWidth = NULL, $lightboxMaxHeight = NULL) {
		
		$smallImage = parent::render($src, $width, $height, $minWidth, $minHeight, $maxWidth, $maxHeight);
		
		$setup = array(
			'width' => $width,
			'height' => $height,
			'minW' => $minWidth,
			'minH' => $minHeight,
			'maxW' => $lightboxMaxWidth,
			'maxH' => $lightboxMaxHeight
		);
		$imageInfo = $this->contentObject->getImgResource($src, $setup);
		$GLOBALS['TSFE']->lastImageInfo = $imageInfo;
		if (!is_array($imageInfo)) {
			throw new Tx_Fluid_Core_ViewHelper_Exception('Could not get image resource for "' . htmlspecialchars($src) . '".' , 1253191060);
		}
		$imageInfo[3] = t3lib_div::png_to_gif_by_imagemagick($imageInfo[3]);
		$GLOBALS['TSFE']->imagesOnPage[] = $imageInfo[3];

		$imageSource = $GLOBALS['TSFE']->absRefPrefix . t3lib_div::rawUrlEncodeFP($imageInfo[3]);
		$this->tag->addAttribute('src', $imageSource);
		$this->tag->addAttribute('width', $imageInfo[0]);
		$this->tag->addAttribute('height', $imageInfo[1]);
		if ($this->arguments['title'] === '') {
			$this->tag->addAttribute('title', $this->arguments['alt']);
		}
		$this->tag->addAttribute('id', $this->arguments['id'] . '_big');
		$this->tag->addAttribute('class', $this->arguments['class'] . '_big');

		return $smallImage."\n".$this->tag->render();
	}
}


?>