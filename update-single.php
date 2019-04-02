<?php
require "../config.php";
if (isset($_POST['submit'])) {
    try {
        $connection = new PDO($dsn, $username, $password, $options);
        $user =[
            "email"     => $_POST['email'],
            "id"        => $_POST['id'],
            "first_name" => $_POST['first_name'],
            "last_name"  => $_POST['last_name'],
            "created_at"      => $_POST['date']
        ];
        $sql = "UPDATE users 
            SET id = :id, 
            email = :email, 
            first_name = :first_name, 
            last_name = :last_name, 
            date = :date 
            WHERE id = :id";

        $sql_command = $connection->prepare($sql);
        $sql_command->execute($user);
    } catch(PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
    }
}
if (isset($_GET['id'])) {
    try {
        $connection = new PDO($dsn, $username, $password, $options);
        $id = $_GET['id'];
        $sql = "SELECT * FROM users WHERE id = :id";
        $sql_command = $connection->prepare($sql);
        $sql_command->bindValue(':id', $id);
        $sql_command->execute();
        $user = $sql_command->fetch(PDO::FETCH_ASSOC);
    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
} else {
    echo "Something went wrong!";
    exit;
}
?>
<?php 
require "templates/header.php";
if (isset($_POST['submit']) && $sql_command) : 
?>
<p><?php echo escape($_POST['first_name']); ?> successfully updated.</p>
<?php endif; ?>
<h1>Edit a user</h1>
<form method="post">
    <?php foreach ($user as $key => $value) : ?>
        <label for="<?php echo $key; ?>"><?php echo ucfirst($key); ?></label>
	    <input type="text" name="<?php echo $key; ?>" id="<?php echo $key; ?>" value="<?php echo escape($value); ?>" <?php echo ($key === 'id' ? 'readonly' : null); ?>>
    <?php endforeach; ?> 
    <input type="submit" name="submit" value="Submit">
</form>
<?php require "templates/footer.php"; ?>
