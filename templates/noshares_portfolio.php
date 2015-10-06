<div id="middle">
	<ul class="nav nav-pills">
		<li><a href="quote.php">Quote</a></li>
		<li><a href="buy.php">Buy</a></li>
		<li><a href="sell.php">Sell</a></li>
		<li><a href="history.php">History</a></li>
		<li><a href="settings.php">Settings</a></li>
		<li><a href="logout.php"><strong>Log Out</strong></a></li>
	</ul>
	

	<table class="table table-striped">
	
		<thead>

		    <tr>
		        <th>Symbol</th>
		        <th>Name</th>
		        <th>Shares</th>
		        <th>Price</th>
		        <th>TOTAL</th>
		    </tr>
		</thead>

		<tbody>
			
			<tr>
				<td colspan="5"style="text-align:center">In this moment you possess no shares.</td>
			</tr>
			
			<tr>
				<td>CURRENT BALANCE</td>
				
				<td colspan="4" style="text-align:right">$<?= number_format($balance, 2); ?></td>
				
			</tr>
	
		</tbody>
	</table>
