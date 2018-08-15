<?php require_once APPROOT .'/views/inc/header.php'; ?>
<!-- // HEADER INCLUDE FILE -->
<?php require_once APPROOT .'/views/inc/top_nav.php'; ?>
<!-- // TOP NAVIGATION INCLUDE FILE -->

    <ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="index.html">Home</a><i class="fa fa-angle-right"></i>Users <i class="fa fa-angle-right"></i>Add</li>
	</ol>

    <?php echo checkAndFlash('user_added'); ?>
	
    <div class="agile-grids">	
                    <!-- tables -->
        <div class="agile-tables">
			<div class="row">
			<h2 class="ml-3"><a href="<?php echo URLROOT; ?>admin/users" class="btn btn-info my-bg-info">View all users</a></h2>
				<div class="col-md-9">
					<form action="<?php echo URLROOT; ?>admin/users/add" method="post" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="category">Name:</label>
									<input type="text" name="name" id="" class="form-control form-control-lg
                                    <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo Input::get('name'); ?>">
                                    <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="">Email:</label>
									<input type="text" name="email" id="" class="form-control form-control-lg
                                    <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo Input::get('email'); ?>">
                                    <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="">Password:</label>
									<input type="password" name="password" id="" class="form-control form-control-lg
                                    <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo Input::get('password'); ?>">
                                    <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="">Confirm password:</label>
									<input type="password" name="confirm" id="" class="form-control form-control-lg
                                    <?php echo (!empty($data['confirm_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo Input::get('confirm'); ?>">
                                    <span class="invalid-feedback"><?php echo $data['confirm_err']; ?></span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="">User role:</label>
									<select name="role" id="" class="form-control form-control-lg">
										<option value="administrator">Administrator</option>
										<option value="subscriber">Subscriber</option>
									</select>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
                                    <label for="">Upload picture:</label>
                                    <input type="file" name="image" id="" class="form-control form-control-lg">
                                    <span class="invalid-feedback"><?php echo $data['image_err']; ?></span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 mb-lg-0 mb-2">
								<input type="submit" value="Add user" class="btn btn-success py-2 btn-block action-btn btn-success my-bg-success">
							</div>
							<div class="col-md-6">
								<input type="reset" value="Clear" class="btn py-2 btn-success btn-block  action-btn btn-success my-bg-dark">
							</div>
						</div>
					</form>
				</div>
			</div>
        </div>
	</div>

<?php require_once APPROOT .'/views/inc/footer.php'; ?>

