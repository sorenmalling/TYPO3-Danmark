<?php

/*                                                                        *
 * This script belongs to the TYPO3 package "Extension Builder".                  *
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
 * Makes a word in CamelCase or lower_underscore human readable
 *
 * = Examples =
 *
 * <code title="Example">
 * <k:inflect.humanize>foo_bar</k:inflect.humanize>
 * </code>
 *
 * Output:
 * Foo Bar
 *
 * @version $Id: $
 * @license http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public License, version 3 or later
 * @scope prototype
 */
class Tx_ExtensionBuilder_ViewHelpers_HumanizeViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {

	/**
	 * @var Tx_ExtensionBuilder_Utility_Inflector
	 */
	protected $inflector;

	public function __construct() {
		$this->inflector = t3lib_div::makeInstance('Tx_ExtensionBuilder_Utility_Inflector');
	}

	/**
	 * Make a word human readable
	 *
	 * @param string $string The string to make human readable
	 * @return string The human readable string
	 */
	public function render($string = NULL) {
		if ($string === NULL) {
			$string = $this->renderChildren();
		}
		return $this->inflector->humanize($string);
	}
}

?>