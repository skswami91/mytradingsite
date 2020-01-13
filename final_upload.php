<?php
   include('session.php');
 ?>
 <html">
   
   <head>
      <title>Upload your record </title>
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
if(isset($_POST['submit']) && !empty($_FILES['uploadfile1']['name']) && !empty($_FILES['uploadfile2']['name']) && strlen(trim($_POST['text11'])) && strlen(trim($_POST['text21'])) && strlen(trim($_POST['text22'])) && strlen(trim($_POST['text23'])) ){
	$date = date('Y-m-d-H-i-s');
	$filename1 = $_FILES["uploadfile1"]["tmp_name"];
	$filename2 = $_FILES["uploadfile2"]["tmp_name"];
	$question_before_trade1 = $_POST['text11'];
	$question_after_trade1 = $_POST['text21'];
	$question_after_trade2 = $_POST['text22'];
	$question_after_trade3 = $_POST['text23'];
	
	$selected_val = $_POST['selected_stock'];  // Storing Selected Value In Variable
	$selected_val_before_trading = $selected_val."/before_trading/".$date."/";
	$selected_val_after_trading = $selected_val."/after_trading/".$date."/";
	$selected_val_after_one_month_trading = $selected_val."/after_one_month_trading/";
	mkdir($selected_val, 0777, true);
	mkdir($selected_val_before_trading, 0777, true);
	mkdir($selected_val_after_trading, 0777, true);
	mkdir($selected_val_after_one_month_trading, 0777, true);
	
	move_uploaded_file($filename1, $selected_val_before_trading.$_FILES["uploadfile1"]["name"]);
	move_uploaded_file($filename2, $selected_val_after_trading.$_FILES["uploadfile2"]["name"]);
	echo "Upload successfull!!! <br/>";
	$before_trading_img_loc = $selected_val_before_trading.$_FILES["uploadfile1"]["name"];
	$after_trading_img_loc = $selected_val_after_trading.$_FILES["uploadfile2"]["name"];
	$mysql_query_for_img_loc = "INSERT INTO `trading_record`.`stock-image-location` (stock_name, Date_of_trade, before_trade_img_location, after_trade_img_location) VALUES ('$selected_val', '$date', '$before_trading_img_loc', '$after_trading_img_loc')";
	$mysql_query_for_questions = "INSERT INTO `trading_record`.`questions_with_answers` (stock_name, date_time, before_the_trade_question1, after_the_trade_question1, after_the_trade_question2, after_the_trade_question3) VALUES ('$selected_val', '$date', '$question_before_trade1', '$question_after_trade1', '$question_after_trade2', '$question_after_trade3' )";
	
	if(mysqli_query($db, $mysql_query_for_img_loc) && mysqli_query($db, $mysql_query_for_questions)){
    echo "Records added successfully. <br/>";
	} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
	}
	}
	else{
		echo "Not successfull!!!";
	}
	?>
	</div>
	
	</html>