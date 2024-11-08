<?php
$success = 0; 
$user = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
    include '9.php';
    $name = $_POST['name'];
    $party = $_POST['party'];
    $sdate = $_POST['sdate'];
    $edate = $_POST['edate'];
    
    $sql = "SELECT * FROM `admin`  WHERE name = '$name'";        
    $result = mysqli_query($con, $sql);
    
    if ($result) {
        $num = mysqli_num_rows($result);
        
        if ($num > 0) {
            $user = 1;
        } else {
            $sql = "INSERT INTO `admin` (party, sdate, edate, name) VALUES ('$party', '$sdate', '$edate', '$name')";
            $result = mysqli_query($con, $sql);
            
            if ($result) {
                $success = 1;
            } else {
                die(mysqli_error($con));
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin portal</title>
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
</head>
<body background="green.jpg" style="background-repeat:no-repeat;background-size:cover";>
<?php
if($success){
echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>Congrats</strong> You are successfully Signed In.
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}
?>
    <div id="head" class="text-center">
      <h1 align="center" style="color: azure;">Decentralized Voting Using Ethereum Blockchain</h1>
      <br/> 
    </div>

    <div class="container">
    <form method="POST" action="admin.php">
     <legend>Add Candidate</legend>  
     <table  class="table text-center"> 
              <tr>
                <th>Name </th><td> <input id="name" type="text" name="name" placeholder ="Candidates name" autocomplete="off"></td>
                <th></th><td></td>
                <td>  </td>
                <th>Party</th><td><input id="party" type="text" name="party" placeholder ="Candidates party"></td> 
              </tr>
      </table> 
      <input id="addCandidate" type="submit" name="submit" value="Add Candidate">
      <p id="Aday"></p>
    </div><br><br>

    <div class="container">
     <legend>Define Voting Dates</legend>  
     <table  class="table text-center"> 
              <tr>
                <th>Start date</th><td><input id="startDate" type="date" name="sdate"></td>
                <th>End date</th><td>    <input id="endDate" type="date" name="edate" ></td>
              </tr>
      </table> 
      <input id="addDate" type="submit" name="submit" value="Define Dates">
      <p id="Aday"></p>
    </div>
  </body>
</html> 