
<!DOCTYPE html>
<html>
<head>
	<title>XLSx</title>
</head>
<body>
<form action="#" method="POST" enctype="multipart/form-data">
	<input type="file" name="excel">
	<input type="submit" name="submit">
</form>
<?php
if(isset($_FILES['excel']['name'])){
	$flag=0;
	$con=mysqli_connect("localhost","root","root","Task2");
	include "xlsx.php";
	if($con){
		$excel=SimpleXLSX::parse($_FILES['excel']['tmp_name']);
		echo "<pre>";	
		// print_r($excel->rows(1));
		print_r($excel->dimension(2));
		print_r($excel->sheetNames());
		echo $excel->sheetName($sheet);

        for ($sheet=0; $sheet < sizeof($excel->sheetNames()) ; $sheet++) { 
        $rowcol=$excel->dimension($sheet);
        $i=0;
        if($rowcol[0]!=1 &&$rowcol[1]!=1){
		foreach ($excel->rows($sheet) as $key => $row) {
			$q="";	
			foreach ($row as $key => $cell) {
				//print_r($cell);echo "<br>";
				if($i==0){
					$q.=$cell. " varchar(50),";
				}else{
					$q.="'".$cell. "',";
				}
			}
			if($i==0){
				$query="CREATE table  ".$excel->sheetName($sheet)." (".rtrim($q,",").");";
				}else{
				$query="INSERT INTO ".$excel->sheetName($sheet)." values (".rtrim($q,",").");";
				
			}
			
			if(mysqli_query($con,$query))
			{
				$flag=1;
			
			}
			$i++;
		}
	}
		if($flag==1)
		{
			session_start();
			$table=$excel->sheetName($sheet);
			header('location:admingrid.php?table='.$table);
		}
	}
	}
}

?>
</body>
</html>


<?php

session_start();

$_SESSION["sheetname"] = $excel->sheetName($sheet);

echo $_SESSION["sheetname"]; 

?>