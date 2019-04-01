<?php
require "../config.php";
if (isset($_POST['submit'])) {
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
}
?>
<?php 
require "../templates/header.php"; 
if (isset($_POST['submit'])) {
    if ($result && $sql_command->rowCount() > 0) { ?>
    <h1>User Directory</h1>
    <table>
        <thead>
        <tr>
            <th>ID </th>
            <th>First Name </th>
            <th>Last Name </th>
            <th>Email </th>
            <th>Date </th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($result as $row) : ?>
        <tr>
            <td><?php echo escape($row["id"]); ?></td>
            <td><?php echo escape($row["first_name"]); ?></td>
            <td><?php echo escape($row["last_name"]); ?></td>
            <td><?php echo escape($row["email"]); ?></td>
            <td><?php echo escape($row["created_at"]); ?> </td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?php } else { ?>
        <p>No results found.</p>
    <?php } 
} ?> 
<?php require "../templates/footer.php"; ?>