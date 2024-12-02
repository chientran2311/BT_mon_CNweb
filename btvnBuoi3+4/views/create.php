<?php  include_once 'layouts/default.php'; ?>
<div class="container-sm p-5">
        <div class="row">
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Add Products</h3>
                    </div>
                    <div class="panel-body">
                        <form method="post" action="index.php?controller=product&action=store">
                            
                            <div class="form-group">
                                <label for="Type" class="control-label my-2">Product Name:</label>
                                <input required type="text" class="form-control"  name="ProductName"
                                    placeholder="ProductName..">
                            </div>
                            <div class="form-group">
                                <label for="Type" class="control-label my-2">Price</label>
                                <input required type="text" class="form-control" name="Price"
                                    placeholder="Price vd: 500000Đ">
                            </div>
                            
                            <button type="submit" class="btn btn-info my-2 text-light">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>