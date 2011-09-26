<?php
/**
 * \file
 * This file defines the last testcase for the Hierarchical Dataset
 * \author Oscar van Eijk, Oveas Functionality Provider
 * \version $Id: case.last.php,v 1.4 2011-09-26 10:50:19 oscar Exp $
 */

/**
 * \ingroup OTK_TESTSETS
 * This testcase dropt a database table that was used in all HData tests
 * \brief HData Testcase
 * \author Oscar van Eijk, Oveas Functionality Provider
 * \version May 23, 2011 -- O van Eijk -- initial version
 */
class OTKHdata_Last implements TestCase
{
	// Name of the temporary database table that will be used in this testcase
	private $tablename;

	// Hold details of the testresults
	private $details;

	public function __construct()
	{
		$this->tablename = OTKHdata_tableName();
		$this->details = '';
	}

	public function prepareTest ()
	{
		return OTK_RESULT_NONE;
	}

	public function performTest ()
	{
		$returnCodes = array();

		// Step 1; remove the complete tree
		$hd = new HDataHandler();
		$hd->setTablename(OTKHdata_tableName());
		$hd->setLeft('lval');
		$hd->setRight('rval');
		if ($hd->removeTree('node', 'Musical instruments') === false) {
			$returnCodes[] = array(OTK_RESULT_FAIL, 'Removing the root node failed: ' . $hd->getLastWarning());
		} else {
			switch (OTKHdata_getData($data)) {
				case null:
					$returnCodes[] = array(OTK_RESULT_SUCCESS, 'Successfully removed the root node "Musical instruments"');
					break;
				case false:
					$returnCodes[] = array(OTK_RESULT_FAIL, 'Failure while retrieving the results: ' . $data);
					break;
				case true:
					$returnCodes[] = array(OTK_RESULT_FAIL, 'The root node and its tree were not removed.');
					$this->details .= '<p>The table should be emptiedm but still contains the following data:<br/><pre>'
							. print_r($data, 1) . '</pre></p>';
					break;
			}
		}
		return $returnCodes;
	}

	public function cleanupTest ()
	{
		// TODO Use SchemeHandler here (once ported to the DbDriver functionality)
		$db = DbHandler::getInstance();
		$db->setQuery ('DROP TABLE ' . $db->tablename($this->tablename));
		if ($db->write($dummy, __LINE__, __FILE__) <= OWL_SUCCESS) {
			return OTK_RESULT_SUCCESS;
		} else {
			$db->signal(OWL_WARNING, $msg);
			return $msg;
		}
	}

	public function getDetails ()
	{
		return $this->details;
	}

}