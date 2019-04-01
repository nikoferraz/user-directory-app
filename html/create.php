<?php require "../templates/header.php"; ?>
  <h1>Add new user</h1>
  <form method="post">
    <label for="email">Email</label>
    <input type="text" name="email" id="email">
    <label for="first_name">First Name</label>
    <input type="text" name="first_name" id="first_name">
    <label for="last_name">Last Name</label>
    <input type="text" name="last_name" id="last_name">
    <label for="password">Password</label>
    <input type="password" name="password" id="password">
    <input type="submit" name="submit" value="Submit">
  </form>
  <a href="index.php">Home Page</a>
<?php require "../templates/footer.php"; ?>
