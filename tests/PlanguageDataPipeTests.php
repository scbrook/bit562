<?php

require_once('simpletest/autorun.php');
require_once('../php/PlanguageDataPipe.php');

class PlanguageDataPipeTests extends UnitTestCase {

	function testForExistanceOfPlanguageDataPipe() {
		$this->assertTrue(file_exists('../php/PlanguageDataPipe.php'));
	}

	function testForClone() {
		$a = new PlanguageDataPipe();
		$b = new PlanguageDataPipe();

		$this->assertClone($a,$b);
	}
}
?>