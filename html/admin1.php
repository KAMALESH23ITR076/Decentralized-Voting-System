<?php
$success = 0; 
$user = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
    include '9.php';
    $name = $_POST['name'];
    $party = $_POST['party'];

    
    $sql = "SELECT * FROM `admin`  WHERE name = '$name'";        
    $result = mysqli_query($con, $sql);
    
    if ($result) {
        $num = mysqli_num_rows($result);
        
        if ($num > 0) {
            $user = 1;
        } else {
            $sql = "INSERT INTO admin (party, name) VALUES ('$party','$name')";
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
<?php
$success = 0; 
$user = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
    include '9.php';
    $sdate = $_POST['sdate'];
    $edate = $_POST['edate'];
    
    $sql = "SELECT * FROM `admintime`  WHERE sdate = '$sdate'";        
    $result = mysqli_query($con, $sql);
    
    if ($result) {
        $num = mysqli_num_rows($result);
        
        if ($num > 0) {
            $user = 1;
        } else {
            $sql = "INSERT INTO `admintime` (sdate, edate) VALUES ('$sdate', '$edate',)";
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
    <title>Admin Portal</title>
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function validateForm() {
            let name = document.forms["form2"]["name"].value;
            if (name == "") {
                alert("Name must be filled out");
                return false;
            }
        }
        function newFunction() {
            document.getElementById("form2").reset();
        }
    </script>
</head>
<body background="green.jpg" style="background-repeat:no-repeat; background-size:cover;">
    
    <?php
    if ($user) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error:</strong> User already exists.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
    }
    if ($success) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success:</strong> Registered successfully.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
    }
    ?>

    <div id="head" class="text-center">
        <h1 style="color: azure;">Decentralized Voting Using Ethereum Blockchain</h1>
        <br/>
    </div>

    <div class="container">
        <form method="POST" action="admin1.php">
            <legend>Add Candidate</legend>  
            <table class="table text-center"> 
                <tr>
                    <th>Name</th>
                    <td><input id="name" type="text" name="name" placeholder="Candidate's name" autocomplete="off"></td>  
                    <th>Party</th>
                    <td><input id="party" type="text" name="party" placeholder="Candidate's party"></td> 
                </tr>
            </table> 
            <input id="addCandidate" type="submit" name="submit" value="Add Candidate">
            <p id="Aday"></p><br><br>
        </form>
            <legend>Define Voting Dates</legend>  
            <table class="table text-center"> 
            <form method="POST" action="admin1.php">
                <tr>              
                    <th>Start date</th>
                    <td><input id="startDate" type="date" name="sdate"></td>
                    <th>End date</th>
                    <td><input id="endDate" type="date" name="edate"></td>
                </tr>
            </table> 
            <input id="addDate" type="submit" name="submit" value="Define Dates">
            <p id="Aday"></p>
        </form>
    </div>
</body>
</html>