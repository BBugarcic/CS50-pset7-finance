<?php

    // configuration
    require("../includes/config.php");
	
    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
	{		
		// else render form
		if (empty($_GET["form"]))
		{
			render("settings_links.php", ["title" => "Password"]);
		}
		else 
		{
			render("pass_form.php", ["title" => "Password"]);
		}
	}

	// else if user reached page via POST (as by submitting a form via POST)
	else if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		// validate submission
		if (empty($_POST["old"]))
		{
		    apologize("Type your current password.");
		}
		else if (empty($_POST["oldconf"]))
		{
		    apologize("You must confirm old password.");
		}

		else if (empty($_POST["new"]))
		{
		    apologize("You must provide your new password.");
		}
		
		else if (empty($_POST["newconf"]))
		{
		    apologize("You must confirm new password.");
		}

		else if ($_POST["oldconf"] !== $_POST["old"])
		{
		    apologize("Old password and confirmation are not the same.");
		}

		else if ($_POST["newconf"] !== $_POST["new"])
		{
		    apologize("New password and confirmation are not the same.");
		}

		// query updating password
		$result = query("UPDATE users SET hash = ? WHERE id = ?", crypt($_POST["new"]), $_SESSION["id"]);

		// redirect to portfolio
		redirect("/");

		
	}
?>
