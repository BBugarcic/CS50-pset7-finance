<?php

    	// configuration
    	require("../includes/config.php");

	// selects data from list (shares)
	$rows = query("SELECT symbol, shares FROM portfolios WHERE id=?", $_SESSION["id"]);
	
	// declaring an array that will pass to template
	$positions = [];	
	
	// initialize associative array
	// combine elements from two arrays (rows and stock) into one (positions)	
	foreach ($rows as $row)
	{	
		// look up for names and pracies in list (users)
		// lookup function returns associative array with names, symbols and price
		$stock = lookup($row["symbol"]);
		
		if ($stock !== false)
		{
	
			$positions[] = [
				"name" => $stock["name"], 
				"price" => $stock["price"], 
				"total" => $stock["price"] * $row["shares"], 
				"shares" => $row["shares"], 
				"symbol" => $row["symbol"]
			];
		}
	}
	
	// get cash balance from list of users
	$balance = query("SELECT cash FROM users WHERE id=?", $_SESSION["id"]);

	if (empty($positions))
	{
		// render portfolio for user with no prior activities		
		render("noshares_portfolio.php", [ "title" => "Portfolio", "balance" => $balance[0]["cash"] ]);	
	}

	
	else    
	{
		// render portfolio for user who already was activ    		
		render("portfolio.php", [ "title" => "Portfolio", "positions" => $positions, "balance" => $balance[0]["cash"] ]);
    	}


?>	
