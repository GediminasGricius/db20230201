<?php
    $stm=$db->prepare("SELECT id,name FROM categories");
    $stm->execute([]);
    $categories=$stm->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="col-md-12 mt-5">
    <div class="card">
        <div class="card-header">Prekės pagal kategorijas</div>
        <div class="card-body">
            <?php foreach ($categories as $category){ ?>
                <a href="category.php?id=<?=$category['id']?>" class="btn btn-info "><?=$category['name']?></a>
            <?php } ?>

            <a href="index.php" class="btn btn-info float-end ">Visos prekės</a>
        </div>
    </div>
</div>