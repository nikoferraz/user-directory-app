<?php require "../templates/header.php"; ?>   
<h1>Delete users</h1>
<form method="post">
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

<?php require "../templates/footer.php"; ?>