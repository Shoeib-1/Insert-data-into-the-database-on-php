
<?php
if (isset($_POST['name'])) {
    include("date_connection.php");

    $select_product_exists = "SELECT * FROM product WHERE name='" . $_POST['name'] . "' ";
    $select_user_exists_result = mysqli_query($mysqli, $select_product_exists);
    if (mysqli_num_rows($select_user_exists_result) > 0) {
        echo '<div class="alert alert-danger alert-dismissible fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						من فضلك: هذاالمنتج من قبل !
				</div>';
        } else {
            // $user_profile = "default-user.png";
            if (!empty($_FILES['image']['name'])) {

                $file_path = "../uploads/" . $_FILES["image"]["name"];
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $file_path)) {
                    $user_profile = $_FILES["image"]["name"];
                }
            }
        $product_name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];

        $query = "INSERT INTO product (name,descrabtion	,price,quantity) 
		VALUES('" . $product_name . "','" . $description . "','" . $price . "','" . $quantity . "'
		 )";
        //  $query = "INSERT INTO `product`(`name`,`descrabtion`,`price`,`quantity`) VALUES ($product_name,$description,$price,$quantity)";
        $result = mysqli_query($mysqli, $query);
        if ($result == true) {
            echo '<div class="alert alert-success alert-dismissible fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						تم ادخال منتج  جديد بنجاح !
				</div>';

            header("Location: result_insert.php");
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						' . mysqli_error($mysqli) . '
				</div>';
        }
    }
}
