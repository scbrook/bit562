<?php

require_once('simpletest/autorun.php');
require_once('../php/PlanguagePackager.php');

class PlanguagePackagerTests extends UnitTestCase {

	function testForExistanceOfPlanguagePackager(){
		$this->assertTrue(file_exists('../php/PlanguagePackager.php'));
	}
}
?>