<?php include_once 'layouts/default.php' ?>
<section class="container-sm p-5">
    <div class="d-flex justify-content-between">
        <h1>Product List</h1>
        <span>
            <a href="index.php?controller=product&action=create" class="btn btn-primary">Add new Product</a>
        </span>
    </div>
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Function</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($productList as $product) {
            ?>
                <tr>
                    <th><?= $product['productid'] ?></th>
                    <th><?= $product['productname'] ?></th>
                    <th><?= $product['price'] ?></th>
                    <th class="">
                        <a class="btn btn-danger btn-sm text-white mr-2" href="index.php?controller=product&action=delete&id=<?= $product['productid'] ?>">DELETE</a>
                        <a class="btn btn-warning btn-sm" href="index.php?controller=product&action=update&id=<?= $product['productid'] ?>">UPDATE</a>
                    </th>
                </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
</section>
