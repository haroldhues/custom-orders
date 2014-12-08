<?php
	$page_title = "Orders";
	$page_subtitle = "List";
    include("templates/header.php");
    function echo_data($data, $item) {
        /*
        Echos existing data, makes sure that it exists
        */ 
        if(isset($data[$item]) && !empty($data[$item])) {
            echo $data[$item];
        }
    }
?>
<div class="col-lg-12">
<?php 
    $data = array(); //FIX ME
    //$data = selecttable('customer');
?>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Data</h3>
		</div>
        <div class="panel-body">
<?php
    if(count($data)):
?>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th></th>
                    <th>Date Ordered</th>
                    <th>Quoted Price</th>
                    <th>Actual Price</th>
                    <th>Balance Due</th>
                    <th>Completed</th>
                    <th>Picked Up</th>
                    <th>Customer Name</th>
                </tr>
            </thead>
            <tbody>
<?php 
        foreach($data as $row):
            $rowlink = "vieworder.php?OrderID=".$row['OrderID'];
?>
                <tr data-href="<?php echo $rowlink; ?>">
                    <td class="text-center"><a href="<?php echo $rowlink; ?>"><span class="glyphicon glyphicon-search"></span></a></td>
                    <td><?php echo_data($row, 'DateOrdered'); ?></td>
                    <td><?php echo_data($row, 'QuotedPrice'); ?></td>
                    <td><?php echo_data($row, 'ActualPrice'); ?></td>
                    <td><?php echo_data($row, 'BalanceDue'); ?></td>
                    <td><?php echo_data($row, 'Completed'); ?></td>
                    <td><?php echo_data($row, 'PickedUp'); ?></td>
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
<?php
    else:
?>
        <p>Sorry There is No Data Yet</p>
<?php
    endif;
?>
		</div>
	</div>
</div>
<?php 
	include("templates/footer.php");
?>
