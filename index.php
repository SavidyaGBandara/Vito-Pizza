<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cat</title>
    <link rel="stylesheet" href="main.css" />
</head>

<body>
    <header>
        <section>
            <a href="#">Home</a>
            <a href="#products">Shop</a>
            <a href="#offers">Offers</a>
            <a href="./contact.html">Contact</a>
            <a href="./about.html">About Us</a>
        </section>
        <a href="./cart.html"> <img src="./cart.jpg" alt="cart" /></a>
    </header>
    <div id="cnt-main">
        <div id="lnd">
            <section>
                <h1>Vito Pizza</h1>
                <h3>Your Pizza, Your way</h3>
                <section>
                    <a href="#products">Order</a>
                    <a href="#offers">Offers</a>
                </section>
            </section>
        </div>
        <div id="products">
            <?php
            function getProducts($pro_type)
            {
                $products = scandir("./Pizza_Details/" . $pro_type . "/");
                array_splice($products, 0, 2);
                echo ("<div data-x='0' data-len='" . count($products) . "'>");
                foreach ($products as $product) {
                    $product_files = scandir("./Pizza_Details/" . $pro_type . "/" . $product);
                    array_splice($product_files, 0, 2);
                    $product_link = "./product.php?type=" . $pro_type . "&product=" . rawurlencode($product);

                    echo "<div onclick=\"window.location.href='" . $product_link . "'\"><img src='./Pizza_Details/" . $pro_type . "/" . $product . "/" . $product_files[0] . "'><span>" . $product . "</span></div>";
                }
                echo ("</div>");
            }
            ?>
            <section>
                <hr />
                <h4>Pizza</h4>
                <?php getProducts("Pizza"); ?>
                <img src="./arrow.svg" onclick="slide('l', this)" alt=">" />
                <img src="./arrow.svg" onclick="slide('r', this)" alt="<" />
            </section>
            <section>
                <hr />
                <h4>Appetizers</h4>
                <?php getProducts("Appetizers"); ?>
                <img src="./arrow.svg" onclick="slide('l', this)" alt=">" />
                <img src="./arrow.svg" onclick="slide('r', this)" alt="<" />
            </section>
            <section>
                <hr />
                <h4>Desserts</h4>
                <?php getProducts("Desserts"); ?>
                <img src="./arrow.svg" onclick="slide('l', this)" alt=">" />
                <img src="./arrow.svg" onclick="slide('r', this)" alt="<" />
            </section>
        </div>
        <div id="offers">
            <div>
                <img src="./offer-20p.png" alt="20%">
                <h3><span>20% OFF</span>Buy a Tandoori Chicken Pizza + Vege Pizza and get a 20% Discount</h3>
            </div>
            <div>
                <img src="./offer-3000.png" alt="3000/=">
                <h3>Buy a Pepperoni Pizza for only<span>3000/=</span></h3>
            </div>
        </div>
    </div>
    <footer></footer>
    <script src="./main.js"></script>
</body>

</html>