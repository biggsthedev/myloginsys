<!DOCTYPE html>
<html lang="en">
  <?php include "includes/head.php" ?>
  <body>

    <?php include "includes/nav.php" ?>
    
    <div class="container">
      <form id="form" class="form mr-5" action="login.php" method="POST">
        <h2>Login</h2>
        <?php 
    if(isset($_POST['login-btn'])){
     $username = mysqli_real_escape_string($db, $_POST['username']);
     $password = mysqli_real_escape_string($db, $_POST['password']);
     
     $hashed_password = md5($password);

     if(empty($username) || empty($password)){
      echo "Please enter your username and password";
     }else {
      $query= "SELECT * FROM users WHERE username = '$username' AND password='$hashed_password'";

      $query_run = mysqli_query($db, $query);
      if(mysqli_num_rows($query_run) == 1){
        while($row = mysqli_fetch_assoc($query_run)){
          $user_id = $row['user_id'];
          $_SESSION['user_id'] = $user_id;
        header("Location: projects.php");
        exit();
        }
      }else {
        echo "Wahala dey";
      }
    }
  }

    ?>
        <div class="form-control">
          <label for="username">Username</label>
          <input type="text" name="username" placeholder="Enter username" 
          value="<?php if(isset($username)){echo $username;} ?>" />
          <small>Error message</small>
        </div>
        <div class="form-control">
          <label for="password">Password</label>
          <input type="password" name="password" placeholder="Enter password" />
          <small>Error message</small>
        </div>
        <button type="submit" name="login-btn">Submit</button>
      </form>
    </div>

    <?php include "includes/footer.php" ?>
  </body>
</html>
