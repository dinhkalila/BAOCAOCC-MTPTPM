<?php
include_once 'app/views/share/header.php';
?>

<?php

if (isset($errors)) {
    echo "<ul>";
    foreach ($errors as $err) {
        echo "<li class='text-danger'>$err</li>";
    }
    echo "</ul>";
}

?>

<div class="card-body p-5 text-center">
    <form class="user" action="/chieu2/account/checklogin" method="post">
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="username">
            </div>
            <div class="col-sm-6">
                <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="password">
            </div>
        </div>
        
        <div class="form-group text-center">
            <button class="btn btn-primary btn-icon-split p-3">
                Login
            </button>
        </div>
    </form>

    <a class="btn btn-warning btn-icon-split p-3" href="/chieu2/account/register">Dang Ky</a>

</div>
<?php
include_once 'app/views/share/footer.php';
?>