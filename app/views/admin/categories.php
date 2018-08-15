<?php require_once APPROOT .'/views/inc/header.php'; ?>
<!-- // HEADER INCLUDE FILE -->
<?php require_once APPROOT .'/views/inc/top_nav.php'; ?>
<!-- // TOP NAVIGATION INCLUDE FILE -->
<!--heder end here-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a><i class="fa fa-angle-right"></i>Categories</li>
	</ol>
	
    <?php echo checkAndFlash('cat_added'); ?>
    <?php echo checkAndFlash('cat_edit'); ?>
    <?php echo checkAndFlash('cat_del'); ?>
    <div class="agile-grids">	
                    <!-- tables -->
                    
        <div class="agile-tables">
			<div class="row">
				<h2 class="text-primary ml-3">Add category</h2>
				<div class="col-md-6">
					<form action="<?php echo URLROOT; ?>admin/categories" method="post">
						<div class="form-group">
							<label for="category">Name:</label>
							<input type="text" name="name" id="" class="form-control form-control-lg
                            <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo Input::get('name'); ?>">
                            <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
						</div>
						<div class="row">
							<div class="col-md-6 mb-lg-0 mb-2">
								<input type="submit" value="Add category" class="btn btn-success py-2 btn-block action-btn btn-success my-bg-success">
							</div>
							<div class="col-md-6">
									<input type="reset" value="Clear" class="btn py-2 btn-success btn-block  action-btn btn-success my-bg-dark">
							</div>
						</div>
					</form>
				</div>
				<div class="col-md-6">
					<div class="w3l-table-info">
							<table id="table">
							<thead>
								<tr>
									<th class="t-15">Id</th>
									<th class="t-15">Category</th>
									<th class="t-15">Edit</th>
									<th class="t-15">Delete</th>
								</tr>
							</thead>
							<tbody>

                                <?php $x = 1; foreach($data['categories'] as $categories): ?>
								<tr>
									<td class="t-12"><?php echo $x++; ?></td>
									<td class="t-14"><?php  echo $categories->cat_title; ?></td>
									<td class="t-12"><a href="<?php echo URLROOT; ?>admin/categories/edit/<?php echo $categories->cat_id; ?>" class="btn action-btn my-bg-primary btn-danger">Edit</a></td>
									<td class="t-12"><a href="<?php echo URLROOT; ?>admin/categories/delete/<?php echo $categories->cat_id; ?>" class="btn action-btn my-bg-danger btn-danger">Delete</a></td>
								</tr>
                                <?php endforeach; ?>

							</tbody>
						</table>
					</div>
				</div>
			</div>

			
        </div>
	</div>
	<?php if($data['edit'] !==''): ?>
	<div class="agile-grids">	
			
		<div class="agile-tables">
			<h2 class="text-primary">Edit category</h2>
			<div class="row">
				<div class="col-md-6">
					<form action="<?php echo URLROOT; ?>admin/categories/edit/<?php echo $data['edit']; ?>" method="post">
						<div class="form-group">
							<label for="category">Name:</label>
							<input type="text" name="edit_name" id="" class="form-control form-control-lg
                            <?php echo (!empty($data['edit_name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['cat_title']; ?>">
                            <span class="invalid-feedback"><?php echo $data['edit_name_err']; ?></span>
						</div>
						<div class="row">
							<div class="col-md-6 mb-lg-0 mb-2">
								<input type="submit" value="Save changes" class="btn btn-success py-2 btn-block action-btn btn-success my-bg-success">
							</div>
							<div class="col-md-6">
									<input type="reset" value="Clear" class="btn py-2 btn-success btn-block  action-btn btn-success my-bg-dark">
							</div>
						</div>
					</form>
				</div>
				<div class="col-md-6"></div>
			</div>
		</div>
	</div>
    <?php endif; ?>

<?php require_once APPROOT .'/views/inc/footer.php'; ?>