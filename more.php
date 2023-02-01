<?php

require_once 'db.php';
$id= $_GET['id'];
$stm=$db->prepare("SELECT *, round(price*1.21, 2) as price_vat FROM products WHERE id=? ORDER BY price ASC");
$stm->execute([$id]);
$product=$stm->fetch(PDO::FETCH_ASSOC);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-header">Prekė: <?=$product['name']?></div>
                <div class="card-body">
                   Prekės aprašymas: <?=$product['description']?><br>
                    Prekės kaina:   <?=$product['price']?><br>
                    Prekės kaina su PVM: <?=$product['price_vat']?><br>

                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
