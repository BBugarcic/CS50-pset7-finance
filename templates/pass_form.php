<form action="settings.php" method="post">
    <fieldset>
        <div class="form-group">
            Type old password: <input autofocus class="form-control" name="old" placeholder="Old password" type="password"/>
        </div>
        <div class="form-group">
	    Confirm old password: <input class="form-control" name="oldconf" placeholder="Conformation" type="password"/>
        </div>
        <div class="form-group">
	    Type new password: <input class="form-control" name="new" placeholder="New password" type="password"/>
        </div>
        <div class="form-group">
	    Confirm new password: <input class="form-control" name="newconf" placeholder="Conformation" type="password"/>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-default">Change password</button>
        </div>
    </fieldset>
</form>
<div>
    go <a href="index.php">back</a> to portfolio
</div>
