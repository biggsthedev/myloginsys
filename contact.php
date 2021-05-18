<!DOCTYPE html>
<html lang="en">
<?php include "includes/head.php" ?>
  <body>

    <?php include "includes/nav.php" ?>

    <div class="container">
      <form id="form" class="form">
        <h2>Contact us</h2>
        <div class="form-control">
          <label for="username">Username</label>
          <input type="text" id="username" placeholder="Enter username" />
        </div>
        <div class="form-control">
          <label for="email">Email</label>
          <input type="text" id="email" placeholder="Enter email" />
        </div>

        <div class="form-control">
            <label>Message</label>
            <textarea name="" id="" cols="30" rows="10"></textarea>
        </div>


        <button type="submit">Submit</button>
      </form>
    </div>

     <?php include "includes/footer.php" ?>
  </body>
</html>
