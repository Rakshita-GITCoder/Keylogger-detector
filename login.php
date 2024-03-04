<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="login.css">
  <title>Login</title>
</head>

<body>
  <main>
    <section>
      <div class="form-box">
        <form action="login.php" method="post">
          <h2>Login</h2>
          <div class="inputbox">
            <ion-icon name="mail-outline"></ion-icon>
            <input type="email" name="username" id="email" required>
            <label for="email">Email</label>
          </div>
          <div class="inputbox">
            <ion-icon name="lock-closed-outline"></ion-icon>
            <input type="password" name="password" id="pass" required>
            <label for="pass">Password</label>
          </div>
          <div class="forget">
            <label for="rem">Remember Me &nbsp;</label>
            <input type="checkbox" name="Remember" id="rem" value="1">
          </div>
          <button type="reset">Clear All</button><br><br>
          <button type="submit" value="Login" name="Login_Btn">Log In</button>
          
          <div class="register">
            <p>Don't have a account <a href="register.html">Register</a></p>
          </div>
        </form>
      </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  </main>

</body>
</html>
<?php
$conn = mysqli_connect("localhost", "root","");
if(isset($_POST['Login_Btn'])){
  $username=$_POST['username'];
  $password=$_POST['password'];
  $sql="SELECT * FROM websitelogin.logindetails WHERE username = '$username' ";
  $result = mysqli_query($conn,$sql);
  while($row = mysqli_fetch_assoc($result)){
    $resultPassword = $row['password'];
    if($password == $resultPassword){
      header('Location:detector.html');
    }else{
        echo "<script>
         alert('Login unsuccessful');
      </script>";
    }
  }
}
?>  
