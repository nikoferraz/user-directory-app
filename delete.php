<?php
require "config/functions.php";
require "config/db_config.php";
$success = null;
if (isset($_POST["submit"])) {
    try {
        $connection = new PDO($dsn, $username, $password, $options);
        $id = $_POST["submit"];
        $sql = "DELETE FROM users WHERE id = :id";
        $sql_command = $connection->prepare($sql);
        $sql_command->bindValue(':id', $id);
        $sql_command->execute();
        $success = "User was successfully deleted.";
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
try {
    $connection = new PDO($dsn, $username, $password, $options);
    $sql = "SELECT * FROM users";
    $sql_command = $connection->prepare($sql);
    $sql_command->execute();
    $result = $sql_command->fetchAll();
} catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}
?>
<?php require "templates/header.php"; ?>
<h1>Delete users</h1>
<?php if ($success) echo $success; ?>
<form method="post">
  <input name="csrf" type="hidden" value="<?php echo escape($_SESSION['csrf']); ?>">
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Email </th>
        <th>First Name </th>
        <th>Last Name </th>
        <th>Date </th>
      </tr>
    </thead>
    <tbody>
    <?php foreach ($result as $row) : ?>
      <tr>
        <td><?php echo escape($row["id"]); ?></td>
        <td><?php echo escape($row["email"]); ?></td>
        <td><?php echo escape($row["first_name"]); ?></td>
        <td><?php echo escape($row["last_name"]); ?></td>
        <td><?php echo escape($row["password"]); ?></td>
        <td><?php echo escape($row["created_at"]); ?> </td>
        <td><button type="submit" name="submit" value="<?php echo escape($row["id"]); ?>">Delete</button></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</form>
<?php require "templates/footer.php"; ?>