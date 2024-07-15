<?php require_once 'php_action/db_connect.php' ?>
<?php require_once 'includes/HEADER.php'; ?>

<div class="row">
    <div class="col-md-12">
        <ol class="breadcrumb">
            <li><a href="DASHBOARD.php">Home</a></li>          
            <li class="active">Product</li>
        </ol>

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="page-heading"> <i class="glyphicon glyphicon-edit"></i> Manage Product</div>
            </div> <!-- /panel-heading -->
            <div class="panel-body">
                <div class="remove-messages"></div>

                <div class="div-action pull pull-right" style="padding-bottom:20px;">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addProductModal">
                      Add Product
                    </button>
                </div> <!-- /div-action -->             
                
                <table class="table" id="manageProductTable">
                    <thead>
                        <tr>                            
                            <th>Product ID</th>
                            <th>Product Name</th>                            
                            <th>Quantity</th>
                            <th>Site</th>
                            <th>Status</th>
                            <th style="width:15%;">Options</th>
                        </tr>
                    </thead>
                </table>
                <!-- /table -->
            </div> <!-- /panel-body -->
        </div> <!-- /panel -->       
    </div> <!-- /col-md-12 -->
</div> <!-- /row -->

<!-- Add Product Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="submitProductForm" action="php_action/saveProduct.php" method="POST">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Add Product</h4>
        </div>
        <div class="modal-body">
          <div id="add-product-messages"></div>
          <div class="form-group">
            <label for="productID">Product ID:</label>
            <input type="text" class="form-control" id="productID" name="productID" required>
          </div>
          <div class="form-group">
            <label for="productName">Product Name:</label>
            <input type="text" class="form-control" id="productName" name="productName" required>
          </div>
          <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="number" class="form-control" id="quantity" name="quantity" required>
          </div>
          <div class="form-group">
            <label for="site">Site:</label>
            <select class="form-control" id="site" name="site" required>
              <option value="">~~SELECT~~</option>
              <option value="nadhour">Nadhour</option>
              <option value="fahs">Fahs</option>
            </select>
          </div>
          <div class="form-group">
            <label for="minStock">Min Stock:</label>
            <input type="number" class="form-control" id="minStock" name="minStock" required>
          </div>
          <div class="form-group">
            <label for="maxStock">Max Stock:</label>
            <input type="number" class="form-control" id="maxStock" name="maxStock" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Edit Product Modal -->
<!-- Edit Product Modal -->
<div class="modal fade" id="editProductModal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="editProductForm" action="php_action/editProduct.php" method="POST">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Edit Product</h4>
                </div>
                <div class="modal-body">
                    <div id="edit-product-messages"></div>
                    
                    <!-- Hidden input for productId -->
                    <input type="hidden" name="productId" id="editProductId" value="">
                    
                    <div class="form-group">
                        <label for="editQuantity">Quantity:</label>
                        <input type="number" class="form-control" id="editQuantity" name="editQuantity" required>
                    </div>
                    <div class="form-group">
                        <label for="editSite">Site:</label>
                        <select class="form-control" id="editSite" name="editSite" required>
                            <option value="">~~SELECT~~</option>
                            <option value="nadhour">Nadhour</option>
                            <option value="fahs">Fahs</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" id="editProductBtn">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>




<?php require_once 'includes/FOOTER.php'; ?>
