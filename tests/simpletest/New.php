<?php

require_once(dirname(__FILE__) . '/simpletest/autorun.php');
require_once('../php/Decider.php');
require_once('../classes/show_sourceLine.php');
require_once('../classes/comment.php');

class deciderTest extends UnitTestCase {
	
protected $commentString;
protected $source;

	function TestExistanceOfTheSourceLineObject() {
		$this->assertTrue(file_exists('../classes/SourceLiine.php'));

	}
}

?>