<?php
    $title = "Create Users";

    require_once('../model/productModel.php');
    $products = getproductByID(0);

    function getproductByID($id) {
        // your code to retrieve products by ID goes here
    }

?>

    <h1>Create user</h1>

    <nav>
        <a href="home.php">Back</a> |
    </nav>

    <br>

    <div>
        <form method="post" action="../mybackend.php">
            <?php for($i = 0; $i < count($products); $i++) { ?>
                <fieldset>
                    <table>
                        <tr>
                            <td>Name</td>
                            <td><input type="text" name="name"></td>
                        </tr>
                        <tr>
                            <td>Buying Price</td>
                            <td><input type="number" name="buying_price"></td>
                        </tr>
                        <tr>
                            <td>Selling Price</td>
                            <td><input type="number" name="selling_price"></td>
                        </tr>
                        
                        <tr>
                            <td></td>
                            <td><input type="submit" name="create" value="Create"></td>
                        </tr>
                    </table>
                </fieldset>
            <?php } ?>
        </form>
    </div>

    <br>
    <br>

<?php
    include 'footer.php';
?>
