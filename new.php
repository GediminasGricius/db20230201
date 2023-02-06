<?php

require_once 'db.php';


if (isset($_POST['add'])){
    $stm=$db->prepare("INSERT INTO products (name, price, description, category_id) VALUES (?,?,?, ?)");
    $stm->execute([$_POST['name'], $_POST['price'], $_POST['description'], $_POST['category_id']]);
    header("location: index.php");
    die();
}

$stm=$db->prepare("SELECT id,name FROM categories");
$stm->execute([]);
$categories=$stm->fetchAll(PDO::FETCH_ASSOC);

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
                <div class="card-header">Pridėti naują prekę</div>
                <div class="card-body">
                  <form method="post" action="new.php">
                      <div class="mb-3">
                          <label class="form-label">Pavadinimas:</label>
                          <input type="text" class="form-control" name="name">
                      </div>
                      <div class="mb-3">
                          <label class="form-label">Kaina:</label>
                          <input type="text" class="form-control" name="price">
                      </div>
                      <div class="mb-3">
                          <label class="form-label">Kategorija:</label>
                          <select class="form-control" name="category_id">
                              <?php foreach ($categories as $category){ ?>
                                  <option value="<?=$category['id']?>"><?=$category['name']?></option>
                              <?php } ?>

                          </select>
                      </div>
                      <div class="mb-3">
                          <label class="form-label">Aprašymas:</label>
                          <textarea class="form-control" name="description"></textarea>
                      </div>
                      <button class="btn btn-success" name="add" value="1">Pridėti naują prekę</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
