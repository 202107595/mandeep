<?php
require_once "config.php";

$name = $description = $price = "";
$name_err = $description_err = $price_err = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_name = trim($_POST["name"]);
    if (empty($input_name)) {
        $name_err = "Please enter a name.";
    } else {
        $name = $input_name;
    }

    $input_description = trim($_POST["description"]);
    if (empty($input_description)) {
        $description_err = "Please enter a description.";
    } else {
        $description = $input_description;
    }

    $input_price = trim($_POST["price"]);
    if (empty($input_price)) {
        $price_err = "Please enter the price.";
    } else {
        $price = $input_price;
    }

    if (empty($name_err) && empty($description_err) && empty($price_err)) {
        $sql = "INSERT INTO products (name, description, price) VALUES (?, ?, ?)";

        if ($stmt = mysqli_prepare($link, $sql)) {
            mysqli_stmt_bind_param($stmt, "ssd", $param_name, $param_description, $param_price);

            $param_name = $name;
            $param_description = $description;
            $param_price = $price;

            if (mysqli_stmt_execute($stmt)) {
                header("location: ../index.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create New Product Record</title>
    <link rel="stylesheet" href="../styles/style.css">

</head>
<body>


    <section id="main">
        <div class="container">
            <h2>Create New Product Record</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                    <span class="invalid-feedback"><?php echo $name_err; ?></span>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" class="form-control <?php echo (!empty($description_err)) ? 'is-invalid' : ''; ?>"><?php echo $description; ?></textarea>
                    <span class="invalid-feedback"><?php echo $description_err; ?></span>
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input type="text" name="price" class="form-control <?php echo (!empty($price_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $price; ?>">
                    <span class="invalid-feedback"><?php echo $price_err; ?></span>
                </div>
                <input type="submit" class="btn btn-primary" value="Submit">
                <a href="../index.php" class="btn btn-secondary ml-2">Cancel</a>
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