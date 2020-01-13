<?php
   include('session.php');
 //  include('fetch_trading_record.php');
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
	if(isset($_POST['submit1']) && isset($_POST['selected_stock'])) {
	$selected_date_for_stock=$_POST['selected_stock'];
	$mysql_query_before_loc = "SELECT before_trade_img_location FROM `trading_record`.`stock-image-location` WHERE Date_of_trade = '$selected_date_for_stock'";
	$result_before=mysqli_query($db,$mysql_query_before_loc);
	$row2=mysqli_num_rows($result_before);
	
	
	$mysql_query_before_question = "SELECT before_the_trade_question1 FROM `trading_record`.`questions_with_answers` WHERE date_time = '$selected_date_for_stock'";
	$result_before_question=mysqli_query($db,$mysql_query_before_question);
	$row4=mysqli_num_rows($result_before_question);
	echo "<h3>Before the trading: </h3>";

    while($row2 = mysqli_fetch_array($result_before)) {
		echo "<img src=\"".$row2['before_trade_img_location']."\" alt=\"before\" width=\"938\" height=\"600\">";
	

    }
	while($row4 = mysqli_fetch_array($result_before_question)){
			echo "<p>Question: Reason for entering this trade?..... </p>";
			echo "<p>Answer:".$row4['before_the_trade_question1']." </p>";	
		
	}
	$mysql_query_after_loc = "SELECT after_trade_img_location FROM `trading_record`.`stock-image-location` WHERE Date_of_trade = '$selected_date_for_stock'";
	$result_after=mysqli_query($db,$mysql_query_after_loc);
	$row3=mysqli_num_rows($result_after);
	
	
	//after the trade question 1
	
	$mysql_query_after_question1 = "SELECT after_the_trade_question1 FROM `trading_record`.`questions_with_answers` WHERE date_time = '$selected_date_for_stock'";
	$result_after_question1=mysqli_query($db,$mysql_query_after_question1);
	$row5=mysqli_num_rows($result_after_question1);
	//after the trade question 2
	$mysql_query_after_question2 = "SELECT after_the_trade_question2 FROM `trading_record`.`questions_with_answers` WHERE date_time = '$selected_date_for_stock'";
	$result_after_question2=mysqli_query($db,$mysql_query_after_question2);
	$row6=mysqli_num_rows($result_after_question2);
	
	//after the trade question 3
	$mysql_query_after_question3 = "SELECT after_the_trade_question3 FROM `trading_record`.`questions_with_answers` WHERE date_time = '$selected_date_for_stock'";
	$result_after_question3=mysqli_query($db,$mysql_query_after_question3);
	$row7=mysqli_num_rows($result_after_question3);
	
	echo "<h3>After the trading: </h3>";
	while($row3 = mysqli_fetch_array($result_after)) {
		echo "<img src=\"".$row3['after_trade_img_location']."\" alt=\"before\" width=\"938\" height=\"600\">";
    }
	while($row5 = mysqli_fetch_array($result_after_question1)){
			echo "<p>Question: How was the trade managed?..... </p>";
			echo "<p>Answer:".$row5['after_the_trade_question1']." </p>";	
		
	}
	
	while($row6 = mysqli_fetch_array($result_after_question2)){
			echo "<p>Question: Was it successful. Why?..... </p>";
			echo "<p>Answer:".$row6['after_the_trade_question2']." </p>";	
		
	}
	while($row7 = mysqli_fetch_array($result_after_question3)){
			echo "<p>Question: Did you loose. Why?..... </p>";
			echo "<p>Answer:".$row7['after_the_trade_question3']." </p>";	
		
	}
	
	
	}

	
	
	?>
	
	</div>
	
	</html>