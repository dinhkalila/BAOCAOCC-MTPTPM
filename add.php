<?php
include_once 'app/views/share/header.php';
?>

<?php

    if(isset($errors)){
        echo "<ul>";
        foreach($errors as $err){
            echo "<li class='text-danger'>$err</li>";
        }
        echo "</ul>";
    }

?>

<div class="card-body p-5">

        <form class="user" action="/chieu2/product/save" method="post" enctype="multipart/form-data">
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Product Name">
                </div>
                <div class="col-sm-6">
                    <input type="number" class="form-control form-control-user" id="price" name="price" placeholder="Product Price">
                </div>
            </div>
            <div class="form-group">
                <input type="text" class="form-control form-control-user" id="description" name="description" placeholder="Product Description">
            </div>
            <div class="form-group">
                <input type="file" class="form-control form-control-user" id="image" name="image">
            </div>
            <div class="form-group text-center">
                <button class="btn btn-primary btn-icon-split p-3">
                    Save product
                </button>
            </div>
        </form>
   
</div>
<?php
include_once 'app/views/share/footer.php';
?>