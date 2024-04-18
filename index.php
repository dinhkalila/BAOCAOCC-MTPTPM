<?php
include_once 'app/views/share/header.php';
?>

<div class="row">

    <a href="/chieu2/product/add" class="btn btn-primary btn-icon-split">
        <span class="icon text-white-50">
            <i class="fas fa-flag"></i>
        </span>
        <span class="text">Add Product</span>
    </a>

    <div class="col-sm-12">
        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Action </th>
                    <th>Shopping</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $products->fetch(PDO::FETCH_ASSOC)) : ?>
                    <tr>
                        <th>
                            <?= $row['id'] ?>
                            
                        </th>
                        <th><?= $row['name'] ?></th>
                        <th><?= $row['description'] ?></th>
                        <th>

                            <?php
                            if (empty($row['image']) || !file_exists($row['image'])) {
                                echo "No Image!";
                            } else {
                                echo "<img src='/chieu2/" . $row['image'] . "' alt='' />";
                            }
                            ?>

                        </th>
                        <th><?= $row['price'] ?></th>
                        <th>
    <a href="/chieu2/product/edit/<?=$row['id']?>">
        Edit
    </a>
    |
    <a href="/chieu2/product/delete/<?=$row['id']?>">
        Delete
    </a>
</th>

                        <th><a class="btn btn-danger" href="/chieu2/cart/add/<?= $row['id'] ?>">ADD TO CART</a></th>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>



<?php

include_once 'app/views/share/footer.php';

?>