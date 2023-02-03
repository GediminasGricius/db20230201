<?php

require_once 'db.php';
$id= $_GET['id'];
$stm=$db->prepare("SELECT *, round(price*1.21, 2) as price_vat FROM products WHERE id=? ORDER BY price ASC");
$stm->execute([$id]);
$product=$stm->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['update'])){
    $stm=$db->prepare("UPDATE `products` SET name=?, price=?, description=? WHERE id=?");
    $stm->execute([$_POST['name'], $_POST['price'], $_POST['description'], $id]);
    header("location: index.php");
    die();
}


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
    <script src="https://cdn.tiny.cloud/1/7ydq5f2hxhvnszsxlq4pi0a0pszvxse0g002nyowt4u2k1n5/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5">
            <div class="card">
                <div class="card-header">Pridėti naują prekę</div>
                <div class="card-body">
                  <form method="post" action="update.php?id=<?=$product['id']?>">
                      <div class="mb-3">
                          <label class="form-label">Pavadinimas:</label>
                          <input type="text" class="form-control" name="name" value="<?=$product['name']?>">
                      </div>
                      <div class="mb-3">
                          <label class="form-label">Kaina:</label>
                          <input type="text" class="form-control" name="price" value="<?=$product['price']?>">
                      </div>
                      <div class="mb-3">
                          <label class="form-label">Aprašymas:</label>
                          <textarea class="form-control" name="description" style="height: 300px;"><?=$product['description']?></textarea>
                      </div>
                      <button class="btn btn-success" name="update" value="1">Atnaujinti  prekę</button>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    tinymce.init({
        selector: 'textarea',
        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        mergetags_list: [
            { value: 'First.Name', title: 'First Name' },
            { value: 'Email', title: 'Email' },
        ]
    });
</script>
</body>
</html>
