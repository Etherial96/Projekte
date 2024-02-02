<?php

// Ziel soll die vollständige URL inkl. letzten schrägstrich
	$ziel = $_SERVER['SCRIPT_URI'];
	$ziel = substr($ziel, 0, strripos($ziel,'/')+1);




?>