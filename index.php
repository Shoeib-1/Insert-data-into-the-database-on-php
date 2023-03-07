<?php
require("date_connection.php");
require("image_include.php");
require("products.php");
?>


<?php

if (isset($_POST['name'])) {
    $name = $_POST['name'];
} else {
    $name = '';
}

if (isset($_POST['description'])) {
    $description = $_POST['description'];
} else {
    $description = '';
}

if (isset($_POST['price'])) {
    $price = $_POST['price'];
} else {
    $price = '';
}

if (isset($_POST['quantity'])) {
    $quantity = $_POST['quantity'];
} else {
    $quantity = '';
}

if (isset($_FILES['image']['name'])) {
    $image = $_FILES['image']['name'];
} else {
    $image = '';
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    
</head>

<body>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $errors = array();

        if (empty($_POST['name'])) {
            $errors['name'] = "<div class='error error1'>Please enter your name <span><i class='icon1 fa-sharp fa-solid fa-circle-xmark'></i></span></div>";
        } elseif (!empty($_POST['name']) && strlen($_POST['name']) < 5) {
            $errors['name'] = "<div class='error error1' error1>name should be more than 5 digits<span><i class='icon1 fa-sharp fa-solid fa-circle-xmark'></i></span></div>";
        }

        if (empty($_POST['quantity'])) {
            $errors['quantity'] = "<div class='error error2' >Please enter your quantity<span><i class='icon2 fa-sharp fa-solid fa-circle-xmark'></i></span></div>";
        } elseif (!empty($_POST['quantity']) && strlen($_POST['quantity']) > 5) {
            $errors['quantity'] = "<div class='error error2'>quantity should be more than 5 digits<span><i class='icon2 fa-sharp fa-solid fa-circle-xmark'></i></span></div>";
        }

        if (empty($_POST['description'])) {
            $errors['description'] = "<div class='error error3'>Please enter your description <span><i class='icon3 fa-sharp fa-solid fa-circle-xmark'></i></span></div>";
        }
        if (empty($_POST['price'])) {
            $errors['price'] = "<div class='error error4'>Please enter price<span><i class='icon4 fa-sharp fa-solid fa-circle-xmark'></i></span></div>";
        }


        if (empty($_FILES['image']['name'])) {
            $errors['image'] = "<div class='error error4'>Please enter image<span><i class='icon4 fa-sharp fa-solid fa-circle-xmark'></i></span></div>";
        }
    }

    ?>

    <form action="" method="post" enctype="multipart/form-data" autocomplete="on" accept-charset="UTF-8">
        <label for="name">Product Name:</label>
        <input type="text" id="name" name="name">
        <?php
        if (isset($errors['name'])) {
            echo $errors['name'];
        }
        ?>
        <label for="description">Description:</label>
        <textarea id="description" name="description"></textarea>
        <?php
        if (isset($errors['description'])) {
            echo $errors['description'];
        }
        ?>
        <label for="price">Price:</label>
        <input type="number" id="price" name="price" min="0" step="0.01">
        <?php
        if (isset($errors['price'])) {
            echo $errors['price'];
        }
        ?>
        <label for="quantity">Quantity:</label>
        <input type="number" id="quantity" name="quantity" min="1">
        <?php
        if (isset($errors['quantity'])) {
            echo $errors['quantity'];
        }
        ?>
        <label for="image">Image:</label>
        <input type="file" id="image" name="image" accept="image/*" multiple>
        <?php
        if (isset($errors['image']["name"])) {
            echo $errors['image'];
        }
        ?>
        <button type="submit">Submit</button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>