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
	<?php
	if(isset($_POST['before_datetime']) && isset($_POST['after_datetime']) && isset($_POST['fetch_record'])) {
		$before_selected_date = $_POST['before_datetime'];
		$after_selected_date = $_POST['after_datetime'];
		$mysql_query_to_get_stocklist = mysqli_query($db,"SELECT stock_name,Date_of_trade FROM `trading_record`.`stock-image-location` WHERE Date_of_trade >= '$before_selected_date' AND Date_of_trade <= '$after_selected_date'");
		$row1 = mysqli_num_rows($mysql_query_to_get_stocklist);
	
	echo "<form action=\"display_stock_image.php\" method=\"post\" enctype=\"multipart/form-data\">";
	echo "<table><tr><th>Stocks</th><th>Date_of_trade</th></tr>";
	while($row1 = mysqli_fetch_array($mysql_query_to_get_stocklist)) {
	 echo "<tr><td><p>" .$row1['stock_name']."</p></td><td><input type=\"checkbox\" name=\"selected_stock\" value=\"".$row1['Date_of_trade']."\">".$row1['Date_of_trade']."</input></td></tr>";
	 	 
	 }
	echo "</table></br>";
	echo "<input type=\"submit\" name=\"submit1\" value=\"Get the record\"/>";
	echo "</form>";
		
//		$mysql_query_before_loc = "SELECT before_trade_img_location FROM `trading_record`.`stock-image-location` WHERE Date_of_trade >= '$before_selected_date' AND Date_of_trade <= '$after_selected_date'";
//		$mysql_query_after_loc = "SELECT after_trade_img_location FROM `trading_record`.`stock-image-location` WHERE Date_of_trade >= '$before_selected_date' AND Date_of_trade <= '$after_selected_date'";
//		
//		$mysql_query_before_answer = "SELECT before_the_trade_question1 FROM `trading_record`.`questions_with_answers` WHERE date_time >= '$before_selected_date' AND date_time <= '$after_selected_date'";
//		$mysql_query_after_answer1 = "SELECT after_the_trade_question1 FROM `trading_record`.`questions_with_answers` WHERE date_time >= '$before_selected_date' AND date_time <= '$after_selected_date'";
//		$mysql_query_after_answer2 = "SELECT after_the_trade_question2 FROM `trading_record`.`questions_with_answers` WHERE date_time >= '$before_selected_date' AND date_time <= '$after_selected_date'";
	}
	
	
	?>
	
	</div>
	
	</html>