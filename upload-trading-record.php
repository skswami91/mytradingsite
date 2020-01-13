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
	<form action="final_upload.php" method="post" enctype="multipart/form-data">
	  <h4>Select stock name </h4>
	  <?php
	  $name_sql = mysqli_query($db,"select Name from `trading_record`.`company_name`");
	  $row = mysqli_num_rows($name_sql);
	  echo "<select name=\"selected_stock\">";
	  
	  while($row = mysqli_fetch_array($name_sql)) {
	  echo "<option value='". $row['Name'] ."'>" .$row['Name'] ."</option>" ;;
	  }
	  echo "</select>"; 
		
	  ?>
	  <h4>Or add a new stock </h4>
	  
	   
	  <input type="text" name="stock_name" value=""/>
	  <input type="submit" name="add_new_stock" value="Add stock"/>
	  <?php
	 	 if(isset($_POST['add_new_stock'])) {
		  $stockname=$_POST['stock_name'];
		 if($stockname == $row['Name']) {
			echo "<h4> stock name already exists!!! </h4>";		
		} else {
		mysqli_query($db,"insert into `trading_record`.`company_name` (Name) values('$stockname')");
		header('location: upload-trading-record.php');
	    exit();
		}
	  }
	  
	  ?>
	 
	  <h4>Upload Before trading File1 </h4>
	  <input type="file" name="uploadfile1" value=""/><br/>
	  <textarea name=text11 cols=80 rows=4 placeholder="Reason for entering this trade?...."></textarea>
	  <br/><br/>
	  
	  <h4>Upload After trading File2 </h4>
	  <input type="file" name="uploadfile2" value=""/><br/>
	  <textarea name=text21 cols=80 rows=4 placeholder="How was the trade managed?...."></textarea><br/>
	  <textarea name=text22 cols=80 rows=4 placeholder="Was it successful. Why?...."></textarea><br/>
	  <textarea name=text23 cols=80 rows=4 placeholder="Did you loose. Why?...."></textarea>
	  <br/><br/>
	  
	  
	  
	  <?php 
	//if (isset(submit)) {
	//$filename1 = $_FILES["uploadfile1"]["name"];	
	//$tempname1 = $_FILES["uploadfile1"]["tmp_name"];	
		
	//}
	

	echo "<br/>";
	?>
	<input type="submit" name="submit" value="Upload the whole data"/>
	</form>
	</div>
	
	</html>
	