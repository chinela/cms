<?php require_once APPROOT .'/views/inc/header.php'; ?>
<!-- // HEADER INCLUDE FILE -->
<?php require_once APPROOT .'/views/inc/top_nav.php'; ?>
<!-- // TOP NAVIGATION INCLUDE FILE -->
    <ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="index.html">Home</a><i class="fa fa-angle-right"></i>Posts <i class="fa fa-angle-right"></i>Add</li>
	</ol>
    
    <?php echo checkAndFlash('post_added'); ?>
	
    <div class="agile-grids">	

        <div class="agile-tables">
			<div class="row">
				<!-- <h2 class="text-primary ml-3">Add post</h2> -->
				<h2 class="ml-3"><a href="<?php echo URLROOT; ?>admin/posts" class="btn btn-info my-bg-info">View all posts</a></h2>
				<div class="col-md-9">
					<form action="<?php echo URLROOT; ?>admin/posts/add" method="post" enctype="multipart/form-data">
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
									<label for="">Post tags:</label>
									<input type="text" name="post_tags" id="" class="form-control form-control-lg
                                    <?php echo (!empty($data['post_tags_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo Input::get('post_tags'); ?>">
                                    <span class="invalid-feedback"><?php echo $data['post_tags_err']; ?></span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								<div class="form-group">
									<label for="">Post status:</label>
									<select name="post_status" id="" class="form-control form-control-lg">
										<option value="draft" selected>Draft</option>
										<option value="publish">Publish</option>
									</select>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="form-group">
									<label for="">Post category:</label>
									<select name="post_category" id="" class="form-control form-control-lg <?php echo (!empty($data['post_category_err'])) ? 'is-invalid' : ''; ?>" >
                                        <option value="select" selected>Select category</option>
										<?php foreach($data['categories'] as $categories): ?>

                                        <option value="<?php echo $categories->cat_unique; ?>"><?php echo $categories->cat_title; ?></option>

                                        <?php endforeach; ?>
									</select>
                                    <span class="invalid-feedback"><?php echo $data['post_category_err']; ?></span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="">Upload picture:</label>
									<input type="file" name="image" id="" class="form-control form-control-lg
                                    <?php echo (!empty($data['image_err'])) ? 'is-invalid' : ''; ?>">
                                    <span class="invalid-feedback"><?php echo $data['image_err']; ?></span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label for="">Content:</label>
									<textarea name="content" id="" cols="30" rows="10" class="form-control form-control-lg
                                    <?php echo (!empty($data['content_err'])) ? 'is-invalid' : ''; ?>"><?php echo Input::get('content'); ?></textarea>
                                    <span class="invalid-feedback"><?php echo $data['content_err']; ?></span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 mb-lg-0 mb-2">
								<input type="submit" value="Add post" class="btn btn-success py-2 btn-block action-btn btn-success my-bg-success">
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