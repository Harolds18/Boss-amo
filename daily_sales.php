<?php
  $page_title = 'Daily Sales';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(3);
?>

<?php
 $year  = date('Y');
 $month = date('m');
 $sales = dailySales($year,$month);
?>
<?php include_once('layouts/header.php'); ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/r/dt/jq-2.1.4,jszip-2.5.0,pdfmake-0.1.18,dt-1.10.9,af-2.0.0,b-1.0.3,b-colvis-1.0.3,b-html5-1.0.3,b-print-1.0.3,se-1.0.1/datatables.min.css"/>

<div class="row">
  <div class="col-md-6">
    <?php echo display_msg($msg); ?>
  </div>
</div>
  <div class="row">
    <div class="col-md-12">
    <div class="card shadow mb-4">
                  <div class="card-header py-3">
                       <h6 class="m-0 font-weight-bold text-primary">Daily Sales</h6>
                  </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-stripped" id= "dataTable" width="100%" cellspacing="0">
                                    <thead class = "table-dark">
                                        <tr>
                                        <th class="text-center" style="width: 50px;">#</th>
                                        <th> Product name </th>
                                        <th class="text-center" style="width: 15%;"> Quantity sold</th>
                                        <th class="text-center" style="width: 15%;"> Total </th>
                                        <th class="text-center" style="width: 15%;"> Date </th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th class="text-center" style="width: 50px;">#</th>
                                        <th> Product name </th>
                                        <th class="text-center" style="width: 15%;"> Quantity sold</th>
                                        <th class="text-center" style="width: 15%;"> Total </th>
                                        <th class="text-center" style="width: 15%;"> Date </th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php foreach ($sales as $sale):?>
                                      <tr>
                                        <td class="text-center"><?php echo count_id();?></td>
                                        <td><?php echo remove_junk($sale['name']); ?></td>
                                        <td class="text-center"><?php echo (int)$sale['qty']; ?></td>
                                        <td class="text-center"><?php echo remove_junk($sale['total_saleing_price']); ?></td>
                                        <td class="text-center"><?php echo $sale['date']; ?></td>
                                      </tr>
                                      <?php endforeach;?>
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