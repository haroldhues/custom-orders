<?php
	$page_title = "Orders";
	$page_subtitle = "Not Picked Up";
	$post = $_SERVER['REQUEST_METHOD'] == "POST"; //Bool
	include("inc/sql_queries.php");
    function echo_data($data, $item) {
        /*
        Echos existing data, makes sure that it exists
        */ 
        if(isset($data[$item])) {
            echo $data[$item];
        }
    }
	
    $data = select_all_orders_notpickedup();
	
	if($post) {
		foreach($data as $item) {
					if(in_array($item["OrderID"], $_REQUEST)) {
							set_pickedup($item["OrderID"]); //FIX ME
					}
			}
			header("Location: listorders_notpickedup.php");
			exit(0);
	}
    include("templates/header.php");
?>
<div class="col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Orders Not Picked Up</h3>
		</div>
        <div class="panel-body">
<?php
    if(count($data)):
?>
	<form method="post">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
					<th></th>
                    <th></th>
                    <th>Quoted Price</th>
					<th>Total Paid</th>
					<th>Customer Name</th>
                </tr>
            </thead>
            <tbody>
<?php 
        foreach($data as $row):
            $rowlink = "editorder.php?admin&OrderID=".$row['OrderID'];
?>
                <tr>
					<td class="text-center" style="width: 50px;"><?php //Checkbox ?>
					  	    <input name="<?php echo $row["OrderID"]; ?>" type="checkbox" value='<?php echo $row["OrderID"]; ?>'>
					</td>
                    <td class="text-center"><a href="<?php echo $rowlink; ?>"><span class="glyphicon glyphicon-pencil"></span></a></td>
                    <td><?php echo_data($row, 'QuotedPrice'); ?></td>
                    <td><?php echo_data($row, 'TotalPaid'); ?></td>
                    <td><?php echo_data($row, 'Name'); ?></td>
                </tr>
<?php 
        endforeach; 
?>
            <tbody>
            <!--
            <tfoot>
                <tr>
                    <th></th>
                </tr>
            </tfoot>
            -->
        </table>
		<div class="text-center">
			<button type="submit" class="btn btn-default">Mark Checked Orders as Picked Up</button>
		</div>
    </form>
<?php
    else:
?>
        <p>There are no baskets ready to be Picked Up</p>
<?php
    endif;
?>
		</div>
	</div>
</div>
<?php 
	include("templates/footer.php");
?>
