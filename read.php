<?php
require "app/config.php";
require "app/functions.php";
try  {
    $connection = new PDO($dsn, $username, $password, $options);
    $sql = "SELECT * 
            FROM users";
    $sql_command = $connection->prepare($sql);
    $sql_command->execute();
    $result = $sql_command->fetchAll();
} catch(PDOException $error) {
    echo $sql . "<br>" . $error->getMessage();
}
?>
<?php require "templates/header.php"; ?>
<?php  
if ($result && $sql_command->rowCount() > 0) { ?>
    <h2>Users</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email Address</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
    <?php foreach ($result as $row) { ?>
        <tr>
            <td><?php echo escape($row["id"]); ?></td>
            <td><?php echo escape($row["first_name"]); ?></td>
            <td><?php echo escape($row["last_name"]); ?></td>
            <td><?php echo escape($row["email"]); ?></td>
            <td><?php echo escape($row["created_at"]); ?> </td>
        </tr>
    <?php } ?>
    </tbody>
</table>
<?php } else { ?>
    <p>No users in the database.</p>
<?php } 
?> 

<?php require "templates/footer.php"; ?>
        