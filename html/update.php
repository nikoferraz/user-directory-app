<?php require "../templates/header.php"; ?>     
<h1>Update users</h1>
<table>
    <thead>
        <tr>
            <th>ID </th>
            <th>Email </th>
            <th>First Name </th>
            <th>Last Name </th>
            <th>Date </th>
            <th>Password </th>
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
            <td><a href="update-single.php?id=<?php echo escape($row["id"]); ?>">Edit</a></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php require "../templates/footer.php"; ?>