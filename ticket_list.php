<?php include 'db_connect.php' ?>


<div class="col-lg-12">
    <div class="text-right">
        <?php if ($_SESSION['login_type'] == 1 || $_SESSION['login_type'] == 2): // Check if the user is a super admin (1) or admin (2) ?>
            <a href="ticket_export.php"><button class="btn btn-success" data-toggle="modal" data-target="#exampleModal">EXPORT CSV FILE</button></a>
            <a href="ticket_report.php"><button class="btn btn-danger mr-0" data-toggle="modal" data-target="#exampleModal">Download PDF</button></a>
        <?php endif; ?>

        <?php if ($_SESSION['login_type'] == 3): // Check if the user is a user (3) ?>
            <a href="index.php?page=new_ticket"><button class="btn btn-primary mr-2">New Ticket</button></a>
        <?php endif; ?>
        <a href="index.php?page=home"><button type="button" class="btn btn-secondary mr-4"><i class="bi bi-arrow-left-short"></i> Return</button></a>
    </div>
</div>
	<div class="card">
		<div class="card-body">
			<table class="table table-hover table-bordered" id="list">
				<colgroup>
					<col width="5%">
					<col width="15%">
					<col width="20%">
					<col width="15%">
					<col width="25%">
					<col width="10%">
					<col width="10%">
				</colgroup>
				<thead>
					<tr>
					<th style="background-color: #34418E;    color: white;">#</th>
					<th style="background-color: #34418E;    color: white;">Date Created</th>
					<th style="background-color: #34418E;    color: white;">Ticket</th>
					<th style="background-color: #34418E;    color: white;">Subject</th>
					<th style="background-color: #34418E;    color: white;">Description</th>
					<th style="background-color: #34418E;    color: white;">Status</th>
					<th style="background-color: #34418E;    color: white;">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$where = '';
					if($_SESSION['login_type'] == 2)
						$where .= " where t.department_id = {$_SESSION['login_department_id']} ";
					if($_SESSION['login_type'] == 3)
						$where .= " where t.customer_id = {$_SESSION['login_id']} ";
					$qry = $conn->query("SELECT t.*,concat(c.lastname,', ',c.firstname,' ',c.middlename) as cname FROM tickets t inner join customers c on c.id= t.customer_id $where order by unix_timestamp(t.date_created) desc");
					while($row= $qry->fetch_assoc()):
						$trans = get_html_translation_table(HTML_ENTITIES,ENT_QUOTES);
						unset($trans["\""], $trans["<"], $trans[">"], $trans["<h2"]);
						$desc = strtr(html_entity_decode($row['description']),$trans);
						$desc=str_replace(array("<li>","</li>"), array("",", "), $desc);
					?>
					<tr>
						<th class="text-center"><?php echo $i++ ?></th>
						<td><b><?php echo date("M d, Y",strtotime($row['date_created'])) ?></b></td>
						<td><b><?php echo ucwords($row['cname']) ?></b></td>
						<td><b><?php echo $row['subject'] ?></b></td>
						<td><b class="truncate"><?php echo strip_tags($desc) ?></b></td>
						<td>
							<?php if($row['status'] == 0): ?>
								<span class="badge badge-primary">Open</span>
							<?php elseif($row['status'] == 1): ?>
								<span class="badge badge-Info">Processing</span>
							<?php elseif($row['status'] == 2): ?>
								<span class="badge badge-success">Done</span>
							<?php else: ?>
								<span class="badge badge-secondary">Closed</span>
							<?php endif; ?>
						</td>
						<td class="text-center">
							<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Action</button>
		                    <div class="dropdown-menu" style="">
		                      <a class="dropdown-item view_ticket" href="./index.php?page=view_ticket&id=<?php echo $row['id'] ?>" data-id="<?php echo $row['id'] ?>">View</a>
		                      <div class="dropdown-divider"></div>
		                      <a class="dropdown-item" href="./index.php?page=edit_ticket&id=<?php echo $row['id'] ?>">Edit</a>
		                    </div>
						</td>
					</tr>	
				<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>


	<style>
        .card {	
            margin-top: 25px;
        }

        /* Responsive styles for iPhone X */
        @media only screen 
        and (min-device-width: 375px) 
        and (max-device-width: 812px)
        and (-webkit-device-pixel-ratio: 3) {
            .card {
                height: 150px; /* Adjusted height for iPhone X */
                margin-top: 10px; /* Adjusted top margin for iPhone X */
            }
        }
    </style>

</div>
<script>
	$(document).ready(function(){
		$('#list').dataTable()
	$('.delete_ticket').click(function(){
	_conf("Are you sure to delete this ticket?","delete_ticket",[$(this).attr('data-id')])
	})
	})
	function delete_ticket($id){
		start_load()
		$.ajax({
			url:'ajax.php?action=delete_ticket',
			method:'POST',
			data:{id:$id},
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully deleted",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	}
</script>
