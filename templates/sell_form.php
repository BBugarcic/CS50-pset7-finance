<form action="sell.php" method="post">
	<fieldset>
		<div class="form-group">
			<select class="form-control" name="symbol">
				<option value=""> </option>	
					<?php foreach ($stocks as $stock): ?>
						<option value = "<?= $stock['symbol'] ?>" > <?= $stock['symbol'] ?> </option>;
					<?php endforeach ?>	          
			</select>
		</div>
		<div class="form-group">
		    <button type="submit" class="btn btn-default">Sell</button>
		</div>
	</fieldset>
</form>
		<div>
			go <a href="index.php">back</a> to portfolio
		</div>


<!-- 
	print("<option value=\"{$s}\">{$s}</option>");	
	<option value = "<?php echo $stock['symbol']; ?>" > <?php echo $stock['symbol']; ?> </option>;

-->

