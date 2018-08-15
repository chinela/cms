<?php require_once APPROOT .'/views/inc/header.php'; ?>
<!-- // HEADER INCLUDE FILE -->
<?php require_once APPROOT .'/views/inc/top_nav.php'; ?>
<!-- // TOP NAVIGATION INCLUDE FILE -->

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a><i class="fa fa-angle-right"></i>Posts</li>
    </ol>
    <div class="agile-grids">	
                    <!-- tables -->
                    
        <div class="agile-tables">
            <div class="w3l-table-info">
				<form action="" method="post">
				<div class="form-group">
					<div class="row">
						<div class="col-md-6">
							<select name="action" id="" class="form-control mb-3">
								<option class="" value="delete">Delete</option>
								<option class="" value="draft">Draft</option>
								<option class="" value="publish">Publish</option>
								<option class="" value="clone">Clone</option>
							</select>
						</div>
						<div class="col-md-3">
							<input type="submit" value="Apply" class="btn btn-info btn-block my-bg-primary">
						</div>
						<div class="col-md-3">
							<a href="<?php echo URLROOT; ?>admin/posts/add" class="btn btn-info my-bg-danger"><i class="fa fa-pencil"></i> Add post</a>
						</div>
					</div>
				</div>
                <table id="table">
					<thead>
						<tr>
							<th class="t-15"><input type="checkbox" name="selectAll" id="selectAllBoxes"></th>
							<th class="t-15">Id</th>
							<th class="t-15">Author</th>
							<th class="t-15">Title</th>
							<th class="t-15">Status</th>
							<th class="t-15">Date</th>
							<th class="t-15">Views</th>
							<th class="t-15">Comments</th>
							<th class="t-15">Action</th>
							<th class="t-15">View</th>
							<th class="t-15">Edit</th>
							<th class="t-15">Delete</th>
						</tr>
					</thead>
					<tbody>

						<?php $x =1; foreach($data['posts'] as $posts): ?>
						<tr class="posts">
							<td class="t-12"><input type="checkbox" name="singleCheck[]" id="" value="<?php echo $posts->post_id; ?>"></td>
							<td class="t-12"><?php echo $x++; ?></td>
							<td class="t-12"><?php echo $posts->post_author; ?></td>
							<td class="t-12"><?php echo $posts->post_title; ?></td>
							<td class="t-12"><?php echo $posts->post_status; ?></td>
							<td class="t-12"><?php echo $posts->post_date; ?></td>
							<td class="t-12"><?php echo $posts->post_views_count; ?></td>
							<td class="t-12"><?php echo $posts->post_comments_count; ?></td>
							<?php if($posts->post_status == 'draft'): ?>
							<td class="t-12"><a href="<?php echo URLROOT; ?>admin/posts/publish/<?php echo $posts->post_id; ?>" class="t-12 t-c action-btn btn btn-success my-bg-success">Publish</a></td>
							<?php else: ?>
							<td class="t-12"><a href="<?php echo URLROOT; ?>admin/posts/draft/<?php echo $posts->post_id; ?>" class="t-12 t-c action-btn btn btn-success my-bg-primary">Draft</a></td>
							<?php endif;?>
							<td class="t-12"><a href="<?php echo URLROOT; ?>posts/show/<?php echo $posts->post_id; ?>" class="t-12 t-c action-btn btn btn-dark">View</a></td>
							<td class="t-12"><a href="<?php echo URLROOT; ?>admin/posts/edit/<?php echo $posts->post_id; ?>" class="t-12 t-c action-btn btn btn-info my-bg-primary">Edit</a></td>
							<td class="t-12"><a href="<?php echo URLROOT; ?>admin/posts/delete/<?php echo $posts->post_id; ?>" class="t-12 t-c action-btn btn btn-danger my-bg-danger">delete</a></td>
						</tr>
						<?php endforeach; ?>

					</tbody>
				</table>
				</form>
            </div>
        </div>
    </div>
	
<?php require_once APPROOT .'/views/inc/footer.php'; ?>