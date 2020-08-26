<?php

require_once("connection.php");
session_start();

if (!isset($_SESSION["user_login"])) {
    header("Location: index.php");
}

$id = $_SESSION["user_login"];

try {
    $select_stmt = $db->prepare("SELECT * FROM tbl_user WHERE row_id = :uid");
    $select_stmt->execute(array(':uid' => $id));
    $row = $select_stmt->fetch(PDO::FETCH_ASSOC);
    $welcomeMsg = "Welcome, " . strtoupper($row["username"]);
} catch (PDOException $e) {
    $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Welcome Page</title>
</head>

<body>

    <div class="container text-center">
        <h1 class="mt-5"><?php echo $welcomeMsg; ?></h1>
        <hr>
        <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>