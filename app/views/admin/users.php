<?php require_once APPROOT .'/views/inc/header.php'; ?>
<!-- // HEADER INCLUDE FILE -->
<?php require_once APPROOT .'/views/inc/top_nav.php'; ?>
<!-- // TOP NAVIGATION INCLUDE FILE -->

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a><i class="fa fa-angle-right"></i>Users</li>
    </ol>
    <div class="agile-grids">	
                    <!-- tables -->
                    
        <div class="agile-tables">
            <div class="w3l-table-info">
				<form action="" method="post">	
					<div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<select name="" id="" class="form-control mb-3">
									<option class="" value="Delete">Delete</option>
									<option class="" value="ban">Ban</option>
									<option class="" value="activate">Activate</option>
								</select>
							</div>
							<div class="col-md-3">
								<input type="submit" value="Apply" class="btn btn-info btn-block my-bg-primary">
							</div>
                            <div class="col-md-3">
							<a href="<?php echo URLROOT; ?>admin/users/add" class="btn btn-info my-bg-danger"><i class="fa fa-user"></i> Add user</a>
						</div>
						</div>
					</div>
					<table id="table">
						<thead>
							<tr>
								<th class="t-15"><input type="checkbox" name="" id="selectAllBoxes"></th>
								<th class="t-15">Id</th>
								<th class="t-15">Username</th>
								<th class="t-15"> Email</th>
								<th class="t-15">Role</th>
								<th class="t-15">Permission</th>
								<th class="t-15">Edit</th>
								<th class="t-15">Delete</th>
								<th class="t-15" colspan="2">Activate or Deactivate</th>
							</tr>
						</thead>
						<tbody>

							<?php $x = 1; foreach($data['users'] as $users): ?>
							<tr class="t-c">
								<td class="t-12"><input type="checkbox" name="" id=""></td>
								<td class="t-12"><?php echo $x++; ?></td>
								<td class="t-12"><?php echo $users->user_name; ?></td>
								<td class="t-12 t-lc"><?php echo $users->user_email; ?></td>
								<td class="t-14">
									<?php if($users->user_role === 'administrator'): ?>
									<i class="fa fa-lock t-1" style="color:red"></i> <?php echo $users->user_role; ?>
									<?php else: ?>
										<?php echo $users->user_role; ?>
									<?php endif; ?>
								</td>
								<td class="t-12">
									<a href="<?php echo URLROOT; ?>admin/users/subscribe/<?php echo $users->user_id; ?>" class="t-12 action-btn btn btn-info my-bg-primary t-c">Subscriber</a>
								</td>
								<td class="t-12">
									<a href="<?php echo URLROOT; ?>admin/users/edit/<?php echo $users->user_id; ?>" class="t-12 action-btn btn btn-info my-bg-info t-c">Edit</a>
								</td>
								<td class="t-12">
									<a href="<?php echo URLROOT; ?>admin/users/delete/<?php echo $users->user_id; ?>" class="t-12 action-btn btn btn-danger t-c">delete</a>
								</td>
								<?php if($users->user_active == 'Active'): ?>
								<td class="t-12 my-text-success"><?php echo $users->user_active; ?> <i class="fa fa-check my-text-success"></i></td>
								<?php else: ?>
								<td class="t-12 text-danger"><?php echo $users->user_active; ?> <i class="fa fa-times text-danger"></i></td>
								<?php endif; ?>
								<td class="t-12">
									<?php if($users->user_role !== 'administrator'): ?>
									<?php if($users->user_active == 'Active'): ?>
										<a href="<?php echo URLROOT; ?>admin/users/ban/<?php echo $users->user_id; ?>" class="t-12 btn-block btn btn-info action-btn my-bg-danger t-c">ban</a>
									<?php else: ?>
									<a href="<?php echo URLROOT; ?>admin/users/activate/<?php echo $users->user_id; ?>" class="t-12 btn-block btn btn-info action-btn my-bg-success t-c">Activate</a>
									<?php endif; ?>
									<?php endif; ?>
								</td>
							</tr>
							<?php endforeach; ?>

						</tbody>
					</table>
				</form>
            </div>
        </div>
    </div>
	
<?php require_once APPROOT .'/views/inc/footer.php'; ?>