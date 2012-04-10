<?php

class PlanguageDataPipe {

public function __constructor($object_ID, $commandName, $name, $description, $entryDate){
	$this->object_ID = $object_ID;
	$this->source =  $source;
	$this->destination = $destination;
	$this->name = $name;
	$this->description = $description;
	$this->entryDate = $entryDate;
}

public function getObject_ID{
	return $this->object_ID;
}

public function commandName{
	return $this->commandName;
}

public function getName
	return $this->name;
}

public function getDecription{
	return $this->description;
}

public function getEntryDate{
	return $this->entryDate;
}


?>