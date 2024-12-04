<?php include_once 'layouts/default.php' ?>
    <div class="container-sm p-5">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Update property</h3>
                    </div>
                    <div class="panel-body">
                        <form method="post" action="index.php?controller=product&action=save">
                            <input type="hidden" name="ProductId" value="<?= $id ?>">
                            
                            <div class="form-group">
                                <label for="Type" class="control-label my-2">Type</label>
                                <input required type="text" class="form-control"  name="ProductName"
                                    placeholder="productName..." value="<?= $product['productname'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="Type" class="control-label my-2">Type</label>
                                <input required type="text" class="form-control" name="Price"
                                    placeholder="Price..." value="<?= $product['price'] ?>">
                            </div>
                            <button type="submit" class="btn btn-info my-2">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>