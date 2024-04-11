<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Punjabi Suit Store</title>
    <link rel="stylesheet" href="styles/home.css">
</head>

<body>

    <header>
        <nav>
            <img src="m.jpg" alt="Punjabi Suit Store Logo">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.html">About</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h1>Punjabi Suit Store - Enhancing Your Ethnic Style</h1>
        <section>
            <h2>Welcome to Punjabi Suit Store</h2>
            <p>Welcome to the Punjabi Suit Store! We are dedicated to offering you the finest collection of Punjabi suits and accessories to enrich your ethnic wardrobe.</p>
        </section>
        <section>
            <h2>Explore Our Collection</h2>
            <p>Discover the charm of Punjabi fashion with our curated collection, featuring:</p>
            <ul>
                <li>Breathtaking Patiala suits</li>
                <li>Exquisite Phulkari dupattas</li>
                <li>Elegant Salwar Kameez sets</li>
                <li>Stylish Churidars</li>
                <li>And much more!</li>
            </ul>
        </section>
        <section id="products">
    <h2>Products</h2>
    <div class="container">
        <ul>
            <li><a href="back-end/create.php" class="add-new">Add New Product</a></li>
        </ul>
    </div>
    <?php
    $query = "SELECT * FROM products";
    require_once "back-end/config.php"; 
    $result = mysqli_query($link, $query);
    if (mysqli_num_rows($result) > 0) :
    ?>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['description']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td>
                            <a href="back-end/read.php?id=<?php echo $row['id']; ?>" class="view" title="View Product">View</a>
                            <a href="back-end/update.php?id=<?php echo $row['id']; ?>" class="update" title="Update Product">Update</a>
                            <a href="back-end/delete.php?id=<?php echo $row['id']; ?>" class="delete" title="Delete Product">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p>No products found.</p>
    <?php endif; ?>
</section>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Manisha Suman. All rights reserved.</p>
    </footer>
</body>

</html>
