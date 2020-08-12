<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="crud.css">
</head>
<body>

<h1>Enter the details</h1>
<div class="divForm">
    <form onsubmit="return validateForm()" method="post" action="postSave.php">
        <div class=grid-container>
            <label class="grid-item" for="name">Name:</label>
            <input class="grid-item" type="text" id="name" name="name" required value="">
            <label class=grid-item for="email">Email Id:</label>
            <input class=grid-item type="email" id="email" name="email" value="" required>
            <label class=grid-item for="phone">Phone Number:</label>
            <input class=grid-item type="text" id="phone" name="phone" maxlength="10" value="" required>
            <label class=grid-item for="birthday">Date Of Birth:</label>
            <input class=grid-item type="date" id="date" name="date" value="" required>
            <label class=grid-item for="pin">Pin Number:</label>
            <input class=grid-item type="text" id="pin" name="pin" maxlength="6" value="" minlength="3" required>
            <input class="grid-item button submit" type="submit" id="submit">
        </div>
    </form>
</div>
<div class="divTable">
    <table>
        <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Date of birth</th>
            <th>Pin code</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <?php
        require_once 'dbConfig.php';
        $result = $db->query("SELECT * FROM customer ORDER BY id DESC");
        $count = 1;
        ?>
        <tbody>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $count++; ?></td>
                <td><input class="input1" type="text" name="name" id="name<?php echo $row['id'] ?>"
                           value="<?php echo $row['name']; ?>" disabled></td>
                <td><input class="input1" type="email" name="email" id="email<?php echo $row['id'] ?>"
                           value="<?php echo $row['email']; ?>" disabled></td>
                <td><input class="input1" type="text" name="phone" id="phone<?php echo $row['id'] ?>"
                           value="<?php echo $row['phone']; ?>" disabled maxlength="10"></td>
                <td><input class="input1" type="date" name="date" id="date<?php echo $row['id'] ?>"
                           value="<?php echo $row['date']; ?>" disabled></td>
                <td><input class="input1" type="text" name="pin" id="pin<?php echo $row['id'] ?>"
                           value="<?php echo $row['pin']; ?>" disabled maxlength="6"></td>
                <td data-id="<?php echo $row['id'] ?>">
                    <button class="edit">Edit</button>
                </td>
                <td data-id="<?php echo $row['id'] ?>">
                    <button class="delete">Delete</button>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
</div>

</body>
<script type="text/javascript" src="crud.js">
</script>
</html>
