<form action="register.php" method="post">
    <fieldset>
        <div class="form-group">
            <input autofocus class="form-control" name="username" placeholder="Username" type="text"/>
        </div>
        <div class="form-group">
			<input autofocus class="form-control" name="email" placeholder="Email address" type="text"/>
            <input class="form-control" name="password" placeholder="Password" type="password"/>
	    	<input class="form-control" name="confirmation" placeholder="Conformation" type="password"/>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-default">Register</button>
        </div>
    </fieldset>
</form>
<div>
    or <a href="login.php">log in</a> for an account
</div>
