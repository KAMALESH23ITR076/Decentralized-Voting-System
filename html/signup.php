<?php
$success = 0; 
$user = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
    include '9.php';

    $id = $_POST['id'];
    $password = $_POST['password'];

    $stmt = $con->prepare("SELECT * FROM `signup` WHERE id = ?");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result) {
        $num = $result->num_rows;
        
        if ($num > 0) {
            $user = 1;
        } else {
            $stmt = $con->prepare("INSERT INTO `signup` (id, password) VALUES (?, ?)");
            $stmt->bind_param("ss", $id, $password);
            $result = $stmt->execute();
            
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
  <title>Sign Up</title>
  <link rel="stylesheet" type="text/css" href="../css/login.css">
</head>

<body>
<?php
if ($success) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Congrats</strong> You have successfully signed up.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}
?>
  <h1 align="center" style="color: azure;">Decentralized Voting Using Ethereum Blockchain</h1>
  <div class="container mt-5">
    <form method="POST" action="signup.php">
      <h1>Sign Up</h1>
      <div class="form-group">
        <label for="voter-id"><h3>Voter ID</h3></label>
        <input type="text" class="form-control" id="id" name="id" placeholder="Voter ID" required>
      </div>
      <div class="form-group">
        <label for="password"><h3>Password</h3></label>
        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
      </div>
      <button type="submit" class="btn btn-primary"><b>Sign Up</b></button>
    </form>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="../js/login.js" type="module"></script>
</body>

</html>
