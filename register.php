<!DOCTYPE html>
<html lang="en">
      <!-- the head -->
<?php include "includes/head.php"?>
  <body>
      <!-- the nav -->
    <?php include "includes/nav.php"; ?>

    <!-- The form -->
    <div class="container">
      <form id="form" class="form" action="register.php" method="POST">
        <h2>Register</h2>
        <?php 
    // the logic  
    if(isset($_POST["register_btn"])){
      $username = mysqli_real_escape_string($db, $_POST['username']);
      $email = mysqli_real_escape_string($db, $_POST['email']);
      $password = mysqli_real_escape_string($db, $_POST['password']);
      $password2 = mysqli_real_escape_string($db, $_POST['password2']);
      $pwdHashed = md5($password);
      
      if(empty($username) || empty($email) || empty($password) || empty($password2)){
        echo "All fields is required";
      }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        echo "A valid email is required";
      }elseif(strlen($password) < 6){
        echo "Passsword must be at least six characters";
      }elseif($password != $password2){
        echo "Your passwords don't match";
      }else{
        // the db query
        $query = "INSERT INTO users(username, email, password) VALUES('$username', '$email', '$pwdHashed')";

        $query_run = mysqli_query($db, $query);


        if($query_run){
          echo "user created";
        }else{
          echo "wahala dey o";
        }
      }
    }
    ?>
        <div class="form-control">
          <label for="username">Username</label>
          <input type="text" name="username" placeholder="Enter username" 
          value="<?php if(isset($username)){echo $username;}?>"
          />
          <small>Error message</small>
        </div>
        <div class="form-control">
          <label for="email">Email</label>
          <input type="text" name="email" placeholder="Enter email" 
          value="<?php if(isset($email)){echo $email;} ?>"/>
          <small>Error message</small>
        </div>
        <div class="form-control">
          <label for="password">Password</label>
          <input type="password" name="password" placeholder="Enter password" />
          <small>Error message</small>
        </div>
        <div class="form-control">
          <label for="password2">Confirm Password</label>
          <input
            type="password"
            name="password2"
            placeholder="Enter password again"
          />
          <small>Error message</small>
        </div>
        <button type="submit" name="register_btn">Submit</button>
      </form>
    </div>
    
    <!-- the footer --> 
    <?php include "includes/footer.php" ?>
  </body>
</html>
