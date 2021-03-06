<?php

	// configuration
    	require("../includes/config.php");
    
	// user reached page via GET (as by clicking a link or via redirect)
	// select all from history table 				
	$history = query("SELECT * FROM history WHERE id=?", $_SESSION["id"]);
	
	// get cash balance from list of users
	$balance = query("SELECT cash FROM users WHERE id=?", $_SESSION["id"]);

	// display history
   	 render("showhistory.php", [ "title" => "History", "history" => $history, "balance" => $balance[0]["cash"] ] );


?>
