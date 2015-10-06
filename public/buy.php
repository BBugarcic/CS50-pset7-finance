<?php

	// configuration
    	require("../includes/config.php");
    
	// if user reached page via GET (as by clicking a link or via redirect)
    	if ($_SERVER["REQUEST_METHOD"] == "GET")
	{
		// else render form
        	render("buy_form.php", ["title" => "Buy"]);
    	}
	
	// else if user reached page via POST (as by submitting a form via POST)
    	//if ($_SERVER["REQUEST_METHOD"] == "POST")
    	else
    	{
        
		// validate submission
	        if (empty($_POST["symbol"]))
        	{
	            apologize("You must provide a symbol.");
	        }

	        if (empty($_POST["shares"]))
	        {
		        apologize("You must provide exact numer of shares you want to buy.");
		}
		
		    	// searching for the symbol
		    	$stock = lookup($_POST["symbol"]);

		    	// validating the symbol
		    	if ($stock === false)
		    	{
				apologize("Symbol not found!");
		    	}
		
		    	if ($_POST["symbol"] !== strtoupper($_POST["symbol"]))
		    	{
				$_POST["symbol"] = strtoupper($_POST["symbol"]);
			}
			
			// accept only non-negative integer of shares
			if (ctype_digit($_POST["shares"]) === true)
		    	{
		    	
			// get current balance from list (users)
		    	$balance = query("SELECT cash FROM users WHERE id=?", $_SESSION["id"]);
		
		    	// check if user has enough money
		    	if ($balance[0]["cash"] >= $stock["price"] * $_POST["shares"])
		    	{
			
				// calculate a total price od bought sheres			
				$cost = $stock["price"] * $_POST["shares"]; 
			
				// insert new shares into table (portfolios)			
			        $result = query("INSERT INTO portfolios (id, symbol, shares) VALUES(?, ?, ?)
				    ON DUPLICATE KEY UPDATE shares = shares + VALUES(shares)", 
				    $_SESSION["id"], $_POST["symbol"], $_POST["shares"]);
				
				// insert data into history
				$history = query("INSERT INTO history (id, transaction, time, symbol, shares, price, total, profit) 
				VALUES (?, 'BUY', now(), ?, ?, ?, ?, 0)", $_SESSION["id"], $_POST["symbol"], $_POST["shares"], $stock["price"], $cost);
 
				// update user's current balance
			    	$current_balance = query("UPDATE users SET cash = cash - $cost
			    	WHERE id = ?", $_SESSION["id"]); 
			
			    	// redirect to portfolio
                		redirect("/");
		    	}
		    	else
		    	{
				apologize("Sorry! This transaction is not allowed!");
		    	}
	    	}
	    	
		// not accepting non-numeric (number of shares) or negative inputs	
	    	else
		{
			apologize("Sorry! You must provide a correct number of shares you want to buy!");
	    	}
	}
	
	

?>
