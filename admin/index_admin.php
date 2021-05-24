<?php include_once "header_admin.php"; ?>

<div class="container">
    <h2 class="text-center">Welcome ADMIN</h2>
    <br>

    <h3 class="">Gestionnaire des Articles:</h3>
    <div class="row">

        <div class="col-md-4 col-xs-12">
            <a href="ajouter_admin.php">
                <div class="card mb-3 rounded shadow-sm sizeimg">
                    <h4 class="card-header text-center text-white bg-dark">ADDProduct</h4>
                    <img src="../img/addadmin3.jpg" alt="add_product" class="imgindex">
                </div>
            </a>
        </div>

        <div class="col-md-4 col-xs-12">
            <a href="modifier_admin.php">
                <div class="card mb-3 rounded shadow-sm sizeimg">
                    <h4 class="card-header text-center text-white bg-dark">UPDATE Products</h4>
                    <img src="../img/uptade2.jpg" alt="add_product" class="imgindex">
                </div>
            </a>
        </div>

        <div class="col-md-4 col-xs-12">
            <a href="delete_admin.php">
                <div class="card mb-3 rounded shadow-sm sizeimg">
                    <h4 class="card-header text-center text-white bg-dark">DELETE PRODUCT</h4>
                    <img src="../img/delete2.jpg" alt="add_product" class="imgindex">
                </div>
            </a>
        </div>
        <hr>
    </div>
    <br><br>

    <h3 class="">Gestionnaire de Message:</h3>
    <div class="col-md-4 col-xs-12">
        <a href="comment_admin.php">
            <div class="card mb-3 rounded shadow-sm sizeimg">
                <h4 class="card-header text-center text-white bg-dark">Gestion Messages</h4>
                <img src="../img/message2.jpg" alt="add_product" class="imgindex">
            </div>
        </a>
    </div>
</div>




<?php include_once "footer_admin.php"; ?>