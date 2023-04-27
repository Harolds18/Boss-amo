<?php
  $page_title = 'List of Product';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
  $products = join_product_table();
?>
<?php include_once('layouts/header.php'); ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.css"/>

  <div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
    <div class="col-md-12 ml-2 mr-2">
    <a href="add_product.php" class="btn btn-primary ml-2 mb-2">Add New</a>
    <div class="card shadow mb-4">
                  <div class="card-header py-3">
                       <h6 class="m-0 font-weight-bold text-primary">List of Products</h6>
                  </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-stripped" id= "dataTable" width="100%" cellspacing="0">
                                    <thead class = "table-dark">
                                        <tr>
                                        <th class="text-center" style="width: 50px;">#</th>
                                        <th> Photo</th>
                                        <th> Product Title </th>
                                        <th class="text-center" style="width: 10%;"> Categories </th>
                                        <th class="text-center" style="width: 10%;"> In-Stock </th>
                                        <th class="text-center" style="width: 10%;"> Buying Price </th>
                                        <th class="text-center" style="width: 10%;"> Selling Price </th>
                                        <th class="text-center" style="width: 10%;"> Product Added </th>
                                        <th class="text-center" style="width: 100px;"> Actions </th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th class="text-center" style="width: 50px;">#</th>
                                        <th> Photo</th>
                                        <th> Product Title </th>
                                        <th class="text-center" style="width: 10%;"> Categories </th>
                                        <th class="text-center" style="width: 10%;"> In-Stock </th>
                                        <th class="text-center" style="width: 10%;"> Buying Price </th>
                                        <th class="text-center" style="width: 10%;"> Selling Price </th>
                                        <th class="text-center" style="width: 10%;"> Product Added </th>
                                        <th class="text-center" style="width: 100px;"> Actions </th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php foreach ($products as $product):?>
                                      <tr>
                                        <td class="text-center"><?php echo count_id();?></td>
                                        <td>
                                          <?php if($product['media_id'] === '0'): ?>
                                            <img class="img-avatar img-circle" width = "100px" height="100px" src="uploads/products/no_image.png" alt="">
                                          <?php else: ?>
                                          <img class="img-avatar img-circle" width = "100px" height="100px" src="uploads/products/<?php echo $product['image']; ?>" alt="">
                                        <?php endif; ?>
                                        </td> 
                                        <td> <?php echo remove_junk($product['name']); ?></td>
                                        <td class="text-center"> <?php echo remove_junk($product['categorie']); ?></td>
                                        <td class="text-center"> <?php echo remove_junk($product['quantity']); ?></td>
                                        <td class="text-center"> <?php echo remove_junk($product['buy_price']); ?></td>
                                        <td class="text-center"> <?php echo remove_junk($product['sale_price']); ?></td>
                                        <td class="text-center"> <?php echo read_date($product['date']); ?></td>
                                        <td class="text-center">
                                          <div class="btn-group">
                                            <a href="edit_product.php?id=<?php echo (int)$product['id'];?>" class="btn btn-info btn-xs"  title="Edit" data-toggle="tooltip">
                                              <span class="">Edit</span>
                                            </a>
                                            <a href="delete_product.php?id=<?php echo (int)$product['id'];?>" class="btn btn-danger btn-xs"  title="Delete" data-toggle="tooltip">
                                              <span class="">Delete</span>
                                            </a>
                                          </div>
                                        </td>
                                      </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>



 
  </div>
  <?php include_once('layouts/footer.php'); ?>
  <script type="text/javascript" src="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.js"></script>

<script type="text/javascript" language="javascript" >
$(document).ready(function() {
    $('#dataTable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'excel','print'
        ]
    } );
} );
 
</script>