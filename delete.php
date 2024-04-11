<?php
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    $sql = "DELETE FROM products WHERE id = ?";
    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        $param_id = $id;

        if (mysqli_stmt_execute($stmt)) {
            header("location: ../index.php");
            exit();
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($link);
} else {
    if (!isset($_GET["id"]) || empty(trim($_GET["id"]))) {
        header("location: error.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Product Record</title>
    <link rel="stylesheet" href="../styles/style.css">

</head>
<body>


    <section id="main">
        <div class="container">
            <h2>Delete Product Record</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="alert alert-danger">
                    <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>" />
                    <p>Are you sure you want to delete this product record?</p>
                    <p>
                        <input type="submit" value="Yes" class="btn btn-danger">
                        <a href="../index.php" class="btn btn-secondary">No</a>
                    </p>
                </div>
            </form>
        </div>
    </section>

    <footer>
        <div class="container">
        <p>&copy; 2024 Manisha Suman. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
