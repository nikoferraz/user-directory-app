<?php
require "config/functions.php";
require "config/db_config.php";
if (isset($_POST['submit'])) {
    try  {
        $connection = new PDO($dsn, $username, $password, $options);
        $new_user = array(
            "email"     => $_POST['email'],
            "first_name" => $_POST['first_name'],
            "last_name"  => $_POST['last_name']
        );
        $sql = sprintf(
            "INSERT INTO %s (%s) values (%s)",
            "users",
            implode(", ", array_keys($new_user)),
            ":" . implode(", :", array_keys($new_user))
        );
        $sql_command = $connection->prepare($sql);
        $sql_command->execute($new_user);
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
?>
<?php 
require "templates/header.php";
if (isset($_POST['submit']) && $sql_command) : 
?>
<p><?php echo escape($_POST['first_name']); ?> was added to the database.</p>
<?php endif; ?>
    <h1>Add a user</h1>
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
<?php require "templates/footer.php"; ?>
