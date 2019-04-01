<?php require "../templates/header.php"; ?>
    <h1>User List</h1>
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
<?php require "../templates/footer.php"; ?>