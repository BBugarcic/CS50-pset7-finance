<?php

	// configuration
    	require("../includes/config.php");
    
	// if user reached page via GET (as by clicking a link or via redirect)
    	if ($_SERVER["REQUEST_METHOD"] == "GET")
    	{
    		// get list of user's stocks
		$stocks = query("SELECT symbol FROM portfolios WHERE id=?", $_SESSION["id"]);
        	render("sell_form.php", [ "title" => "Sell", "stocks" => $stocks ] );
    	}
	
	else
	{
		// validate submission
        	if (empty($_POST["symbol"]))
        	{
            		apologize("You must provide a symbol from the list.");
        	}
		else
		{		
			// get the number of shares for sale
			$shares = query("SELECT shares FROM portfolios WHERE id=? AND symbol=?", $_SESSION["id"], $_POST["symbol"]);		

			// deleting sold stocks from portfolio
			$sold =	query("DELETE FROM portfolios WHERE id=? AND symbol=?", $_SESSION["id"], $_POST["symbol"]);
		
			// get the symbol, name and price of sold stocks 
			$cash = lookup($_POST["symbol"]);

			$profit = $shares[0]["shares"] * $cash["price"];

			// insert data into history
			$history = query("INSERT INTO history (id, transaction, time, symbol, shares, price, total, profit) 
			VALUES (?,'SELL', now(), ?, ?, ?, ?, ?)", $_SESSION["id"], $_POST["symbol"], $shares[0]["shares"], $cash["price"], $profit, $profit);

			// updating cash balance
			$current_balance = query("UPDATE users SET cash = cash + $profit
					WHERE id = ?", $_SESSION["id"]);
		
			// redirect to portfolio
			redirect("/");
		}
	}

?>
