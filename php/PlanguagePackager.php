<?php

require_once('Packager.php');

class PlanguagePackager {
	
	$extension = substr($codeFileName, strrpos($codeFileName, ".") + 1);
	 
   
    switch($extension)
    {
        case "requirement":
            $packager = new Packager(array("name", "requirement","stakeholder"));
            break;
        case "link":
            $packager = new Packager(array("href", "title"));
            break;
        case "trace":
            $packager = new Packager(array("reqirement", "location", "desciption"));
            break;
            
        default:
            $planguagepackager = new PlanguagePackager(array());
            break;
    }

    return $packager;  
}


?>