<?php
/*                                                                        *
 * This script belongs to the FLOW3 package "Fluid".                      *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License as published by the *
 * Free Software Foundation, either version 3 of the License, or (at your *
 * option) any later version.                                             *
 *                                                                        *
 * This script is distributed in the hope that it will be useful, but     *
 * WITHOUT ANY WARRANTY; without even the implied warranty of MERCHAN-    *
 * TABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU Lesser       *
 * General Public License for more details.                               *
 *                                                                        *
 * You should have received a copy of the GNU Lesser General Public       *
 * License along with the script.                                         *
 * If not, see http://www.gnu.org/licenses/lgpl.html                      *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

/**
 * View helper which return input as it is
 *
 * = Examples =
 *
 * <f:null>{anyString}</f:null>
 *
 *
 * @package	 TYPO3
 * @subpackage  tx_blogexample
 * @author Steffen Kamper <info@sk-typo3.de>
 * @license	 http://www.gnu.org/copyleft/gpl.html
 * @version	 SVN: $Id:
 *
 */
class Tx_ExtensionBuilder_ViewHelpers_BeFuncViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {

	protected $objectAccessorPostProcessorEnabled = FALSE;

	/**
	 * Render without processing
	 *
	 *
	 * @return string
	 */
	public function render() {
		return $this->renderChildren();
	}
}

?>