<?php

// Ziel soll die vollst�ndige URL inkl. letzten schr�gstrich
	$ziel = $_SERVER['SCRIPT_URI'];
	$ziel = substr($ziel, 0, strripos($ziel,'/')+1);




?>