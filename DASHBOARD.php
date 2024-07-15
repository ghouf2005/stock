<?php require_once 'includes/HEADER.php'; ?>

<?php 
    // Assuming $connect is your database connection object

    // Count total products
    $sql = "SELECT * FROM products";
    $query = $connect->query($sql);
    $countProduct = $query->num_rows;

    // Count products with low stock
    $lowStockSql = "SELECT * FROM products WHERE Quantity <= MinStock";
    $lowStockQuery = $connect->query($lowStockSql);
    $countLowStock = $lowStockQuery->num_rows;

    $connect->close(); // Close the database connection
?>

<style type="text/css">
    .ui-datepicker-calendar {
        display: none;
    }
</style>

<!-- fullCalendar 2.2.5 CSS -->
<link rel="stylesheet" href="assests/plugins/fullcalendar/fullcalendar.min.css">
<link rel="stylesheet" href="assests/plugins/fullcalendar/fullcalendar.print.css" media="print">

<div class="row">
    <div class="col-md-6 col-sm-6">
        <div class="panel panel-success">
            <div class="panel-heading">
                <a href="products.php" style="text-decoration:none;color:black;">
                    Total Products
                    <span class="badge pull-right"><?php echo $countProduct; ?></span>
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-sm-6">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <a href="products.php" style="text-decoration:none;color:black;">
                    Low Stock
                    <span class="badge pull-right"><?php echo $countLowStock; ?></span>
                </a>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="glyphicon glyphicon-calendar"></i> Calendar
            </div>
            <div class="panel-body">
                <div id="calendar"></div>
            </div>
        </div>
    </div>
</div>

<!-- fullCalendar 2.2.5 JS -->
<script src="assests/plugins/moment/moment.min.js"></script>
<script src="assests/plugins/fullcalendar/fullcalendar.min.js"></script>

<script type="text/javascript">
    $(function () {
        // Activate top bar item
        $('#navDashboard').addClass('active');

        // Initialize fullCalendar
        $('#calendar').fullCalendar({
            header: {
                left: '',
                center: 'title'
            },
            buttonText: {
                today: 'today',
                month: 'month'
            }
        });
    });
</script>

<?php require_once 'includes/FOOTER.php'; ?>
