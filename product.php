<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cat</title>
    <link rel="stylesheet" href="main.css" />
    <link rel="stylesheet" href="product.css" />
</head>

<body>
    <header>
        <section>
            <a href="./index.php">Home</a>
            <a href="./index.php#products">Shop</a>
            <a href="./index.php#offers">Offers</a>
            <a href="./contact.html">Contact</a>
            <a href="./about.html">About Us</a>
        </section>
        <a href="./cart.html"> <img src="./cart.jpg" alt="cart" /></a>
    </header>
    <div id="cnt-main">
        <section>
            <?php
            $product_dir = "./Pizza_Details/" . $_GET["type"] . "/" . $_GET["product"] . "/";
            $image = $product_dir . scandir($product_dir)[2] . "\"";
            $product_details = explode("\n", file_get_contents($product_dir . "t.txt"));

            echo "<img src=\"" . $image . " alt=\"" . $_GET["product"] . "\">";

            echo "<script>const product_det=[";
            foreach ($product_details as $line) {
                $line = trim($line);
                if ($line != "") echo "\"" . $line . "\",";
            }
            if ($_GET["type"] == "Pizza") {
                echo "];const pizza=true</script>";
            } else {
                echo "];const pizza=false</script>";
            }
            ?>
            <section id="details">
                <h1>Name</h1>
                <p>Description</p>
                <span id="price">Price</span>
                <section id="options">
                    <span onclick="selectSize(0)">Small</span>
                    <span onclick="selectSize(1)">Medium</span>
                    <span onclick="selectSize(2)">Large</span>
                </section>
                <section id="quantity">
                    <button onclick="quantity(0)">-</button>
                    <span>1</span>
                    <button onclick="quantity(1)">+</button>
                </section>
                <button onclick="addToCart()">Add to Cart</button>
            </section>
        </section>
    </div>
    <footer></footer>
    <script src="./product.js"></script>
</body>

</html>