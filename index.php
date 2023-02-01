<?php

require_once 'db.php';
$result=$db->query('SELECT *, round(price*1.21, 2) as price_vat FROM products ORDER BY price ASC');
$products=$result->fetchAll(PDO::FETCH_ASSOC);


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
                <div class="card-header">Prekiu sarasas</div>
                <div class="card-body">
                    <table class="table">

                    <thead>
                    <tr>
                        <th>Pavadinimas</th>
                        <th>Kaina</th>
                        <th>Kaia su PVM</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($products as $product){ ?>
                        <tr>

                            <td><?=$product['name']?></td>

                            <td><?=$product['price']?></td>
                            <td><?=$product['price_vat']?></td>
                            <td><a class="btn btn-success" href="more.php?id=<?=$product['id']?>">Plačiau</a> </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
