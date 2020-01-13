<?php
   include('session.php');
 ?>
 <html">
   
   <head>
      <title>Display your record </title>
	  <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
<?php
	include('main.css');
?>
	</style>
	</head>
	<?php
	include('default-page-body.html');
	?>

	<div class="main-body">
	<form action="fetch_trading_record.php" method="post" enctype="multipart/form-data">
	<label> Select the two dates to fetch the trading record: Before</label>
	<input type="date" name="before_datetime">
	<label>: After</label>
	<input type="date" name="after_datetime">
	
	<input type="submit" name="fetch_record" value="Fetch the data"/>
	</form>
	
	</div>
	
	</html>