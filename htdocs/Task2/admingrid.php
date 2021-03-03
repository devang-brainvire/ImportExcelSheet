<?php
  session_start();

?>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap.min.css">

  <link rel="stylesheet" type="text/css" href="style.css">
  
  <title>Show List</title>

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
</head>


<body>





<table class="table" id="dtBasicExample">
  

  <thead class="thead-dark">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">FirstName</th>
      <th scope="col">LastName</th>
      <th scope="col">Company</th>
      <th scope="col">Address</th>
      <th scope="col">City</th>
      <th scope="col">Country</th>
      <th scope="col">Postal</th>
      <th scope="col">Phone</th>
      <th scope="col">Email</th>
      <th scope="col">web</th>
     

    </tr>
  </thead>

  <?php

$conn =mysqli_connect("localhost", "root", "root","Task2");

       
     $table = $_GET["table"];
     echo $table;

     $sql="select * from ".$table;

      $res=mysqli_query($conn,$sql);

     while($row = mysqli_fetch_array($res)) {

     ?>
      <tbody>
        <tr>

          <td><?php echo $row['id'];?></td>
          <td><?php echo $row['first_name'];?></td>
          <td><?php echo $row['last_name'];?></td>
          <td><?php echo $row['company_name'];?></td>
          <td><?php echo $row['address'];?></td>
         <td><?php echo $row['city'];?></td>
         <td><?php echo $row['country'];?></td>
         <td><?php echo $row['postal'];?></td>
         <td><?php echo $row['phone'];?></td>
         <td><?php echo $row['email'];?></td>
         <td><?php echo $row['web'];?></td>
        
         </tr>
        
        <?php

      }       


    ?>





</body>



<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>