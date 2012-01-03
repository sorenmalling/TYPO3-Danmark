<?php
/*                                                                        *
 * This script belongs to the TYPO3 package "Extension Builder".         *
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
 * View helper to compare to strings
 *
 * = Examples =
 * <k:compareStrings firstString="this" secondString="that" />
 * {k:compareStrings(firstString:'this', secondString:'that')}
 *
 * @package	 ExtensionBuilder
 * @author	 Andreas Lappe
 * @version $ID:$
 * @license http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public License, version 3 or later
 */
class Tx_ExtensionBuilder_ViewHelpers_CompareStringsViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {

	/**
	 * @param string $firstString
	 * @param string $secondString
	 *
	 * @return boolean
	 */
	public function render($firstString, $secondString) {
		return ($firstString === $secondString) ? TRUE : FALSE;
	}
}
