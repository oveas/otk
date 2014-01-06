<?php
/**
 * \file
 * This file defines the testset for hierarchical data
 * \author Oscar van Eijk, Oveas Functionality Provider
 * \copyright{2011} Oscar van Eijk, Oveas Functionality Provider
 * \license
 * This file is part of TTK.
 *
 * TTK is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * any later version.
 *
 * TTK is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with TTK. If not, see http://www.gnu.org/licenses/.
 */

/**
 * \ingroup TTK_TESTSETS
 * This class defines the testsets for the translation checks.
 * \brief Translation testset
 * \author Oscar van Eijk, Oveas Functionality Provider
 * \version Jun 7, 2011 -- O van Eijk -- initial version
 */
class TTKTranslations extends TestSet
{

	static public function getDescription ()
	{
		return 'Not really a testset, but a check to see if all registered message codes '
			. 'and labels are in the message- and label files.';
	}
}
