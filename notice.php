<?php include('db_connect.php');?>
<style>
#t2{
		position: relative;
		top: 10px;
	}

</style>


	<br>
	<div class="container-fluid">
	<div class="col-lg-12">
		<div class="row">


	<!-- Table Panel -->
	<div class="col-md-12" id="t2">
				<div class="card">
					<div class="card-body">
						<table class="table table-bordered table-hover">
							<thead>
								<tr>
									<th class="text-center">Sr</th>
									<th class="text-center">Notice</th>
                                    <th class="text-center">Event</th>
									<th class="text-center">Date</th>
									<th class="text-center">Start Time</th>
									<th class="text-center">End Time</th>
									<th class="text-center">Action</th>
								</tr>
							</thead>
							<tbody>
								<?php 
								$cats = $conn->query("SELECT * FROM notice order by id asc");
								while($row=$cats->fetch_assoc()):
								?>
								<tr>
									<td class="text-center"><?php echo $row['id'] ?></td>
									<td class="text-center"><?php echo $row['notice'] ?></td>
                                    <td class="text-center"><?php echo $row['event'] ?></td>
									<td class="text-center"><?php echo $row['date'] ?></td>
									<td class="text-center"><?php echo $row['start_time'] ?></td>
									<td class="text-center"><?php echo $row['end_time'] ?></td>
									<td class="text-center">
										<button class="btn btn-sm btn-success edit_cat" type="button" data-id="<?php echo $row['id'] ?>" 
										data-name="<?php echo $row['notice']  ?>" 
										data-date="<?php echo $row['date']  ?>" 
										data-start_time="<?php echo $row['start_time']  ?>" 
										data-end_time="<?php echo $row['end_time']  ?>" 
										>Edit</button> 
										
									</td>
								</tr>
								<?php endwhile; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			
			</div>
		<!-- Table Panel -->

			
			<!-- FORM Panel -->	<br>
			<div class="col-md-6">
			<form action="" id="manage-notice">
				<div class="card">
					<div class="card-header">
						    Notice Form
				  	</div>
					<div class="card-body">
							<input type="hidden" name="id">
							<div class="form-group">
								<label class="control-label" >Notice</label>
								<input type="text" class="form-control" name="notice"> 
							</div>

							<div class="form-group">
								<label class="control-label" >Date</label>
								<input type="text" class="form-control" name="date">
							</div>
							
							<div class="form-group">
								<label class="control-label" >Start Time</label>
								<input type="text" class="form-control" name="start_time">
							</div>

							<div class="form-group">
								<label class="control-label" >End Time</label>
								<input type="text" class="form-control" name="end_time">
							</div>
					</div>
					<div class="card-footer">
						<div class="row">
							<div class="col-md-12">
								<button class="btn btn-sm btn-primary col-sm-2"> Save</button>
								<button class="btn btn-sm btn-default col-sm-2" type="button" onclick="$('#manage-notice').get(0).reset()"> Cancel</button>
							</div>
						</div>
					</div>
				</div>
			</form>
			</div>
	
			<!-- FORM Panel -->
	
		
		
	</div>



    <script>
	$('#manage-notice').submit(function(e){
		e.preventDefault()
		start_load()
		$.ajax({
			url:'ajax.php?action=save_notice',
			method:'POST',
			data:$(this).serialize(),
			success:function(resp){
				if(resp==1){
					alert_toast("Data successfully added",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
				else if(resp==2){
					alert_toast("Data successfully updated",'success')
					setTimeout(function(){
						location.reload()
					},1500)

				}
			}
		})
	})
	$('.edit_cat').click(function(){
		start_load()
		var cat = $('#manage-notice')
		cat.get(0).reset()
		cat.find("[name='id']").val($(this).attr('data-id'))
		cat.find("[name='notice']").val($(this).attr('data-name'))
		cat.find("[name='date']").val($(this).attr('data-date'))
		cat.find("[name='start_time']").val($(this).attr('data-start_time'))
		cat.find("[name='end_time']").val($(this).attr('data-end_time'))
		end_load()
	})

</script>


