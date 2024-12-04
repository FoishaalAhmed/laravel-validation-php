<!DOCTYPE html>
<html lang="en">

<head>
    <title>Laravel Validation Package</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <?php
    session_start();

    $errors = $_SESSION['errors'] ?? [];
    $old = $_SESSION['old'] ?? [];

    unset($_SESSION['errors'], $_SESSION['old']);

    ?>

    <div class="container mt-3">
        <h2>Registration form</h2>
        <form action="action_page.php" method="post">
            <div class="mb-3 mt-3">
                <label for="name">Name:</label>
                <input type="name" class="form-control" id="name" placeholder="Enter name" name="name" value="<?php echo $old['name'] ?? '' ?> ">
                <span style="color:red;"><?php echo $errors['name'][0] ?? '' ?></span>
            </div>
            <div class="mb-3 mt-3">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php echo $old['email'] ?? '' ?> ">
                <span style="color:red;"><?php echo $errors['email'][0] ?? '' ?></span>
            </div>
            <div class="mb-3">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
                <span style="color:red;"><?php echo $errors['password'][0] ?? '' ?></span>
            </div>
            <div class="mb-3">
                <label for="confirm">Confirm Password:</label>
                <input type="password" class="form-control" id="confirm" placeholder="Retype your password" name="password_confirmation">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

</body>

</html>