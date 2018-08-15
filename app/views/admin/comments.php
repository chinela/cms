<?php require_once APPROOT .'/views/inc/header.php'; ?>
<!-- // HEADER INCLUDE FILE -->
<?php require_once APPROOT .'/views/inc/top_nav.php'; ?>
<!-- // TOP NAVIGATION INCLUDE FILE -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a><i class="fa fa-angle-right"></i>Comments</li>
    </ol>
    <div class="agile-grids">	
                    <!-- tables -->
                    
        <div class="agile-tables">
            <div class="w3l-table-info">
				<form action="" method="post">
				<!-- <h2>Basic Implementation</h2> -->
				<div class="form-group">
					<div class="row">
						<div class="col-md-6">
							<select name="" id="" class="form-control mb-3">
								<option class="" value="Delete">Delete</option>
								<option class="" value="Draft">Approve</option>
								<option class="" value="Draft">Unapprove</option>
							</select>
						</div>
						<div class="col-md-3">
							<input type="submit" value="Apply" class="btn btn-info btn-block my-bg-primary">
						</div>
					</div>
				</div>
                	<table id="table">
						<thead>
							<tr>
								<th class="t-15"><input type="checkbox" name="" id="selectAllBoxes"></th>
								<th class="t-15">Id</th>
								<th class="t-15">User</th>
								<th class="t-15">Email</th>
								<th class="t-15">Comment</th>
								<th class="t-15">Status</th>
								<th class="t-15">Respone  </th>
								<th class="t-15">Date</th>
								<th class="t-15">Action</th>
								<th class="t-15">Delete</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="t-12"><input type="checkbox" name="" id=""></td>
								<td class="t-12">1</td>
								<td class="t-12">James</td>
								<td class="t-12">Coding@gmail.com</td>
								<td class="t-12">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum harum esse architecto asperiores aliquid in. Ex esse provident officiis hic adipisci, amet, animi pariatur, nisi quo distinctio libero a consequuntur.</td>
								<td class="t-12">Approved</td>
								<td class="t-12">Coding Session with Virtual Reality</td>
								<td class="t-12">2019-23-12</td>
								<td class="t-12"><a href="" class="t-12 action-btn btn btn-success my-bg-danger t-c">Unapprove</a></td>
								<td class="t-12"><a href="" class="t-12 action-btn btn btn-danger">Delete</a></td>
							</tr>
							<tr>
								<td class="t-12"><input type="checkbox" name="" id=""></td>
								<td class="t-12">1</td>
								<td class="t-12">James</td>
								<td class="t-12">Coding@gmail.com</td>
								<td class="t-12">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum harum esse architecto asperiores aliquid in. Ex esse provident officiis hic adipisci, amet, animi pariatur, nisi quo distinctio libero a consequuntur.</td>
								<td class="t-12">Approved</td>
								<td class="t-12">Coding Session with Virtual Reality</td>
								<td class="t-12">2019-23-12</td>
								<td class="t-12"><a href="" class="t-12 action-btn btn btn-success">Draft</a></td>
								<td class="t-12"><a href="" class="t-12 action-btn btn btn-danger">Delete</a></td>
							</tr>
							<tr>
								<td class="t-12"><input type="checkbox" name="" id=""></td>
								<td class="t-12">1</td>
								<td class="t-12">James</td>
								<td class="t-12">Coding@gmail.com</td>
								<td class="t-12">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum harum esse architecto asperiores aliquid in. Ex esse provident officiis hic adipisci, amet, animi pariatur, nisi quo distinctio libero a consequuntur.</td>
								<td class="t-12">Approved</td>
								<td class="t-12">Coding Session with Virtual Reality</td>
								<td class="t-12">2019-23-12</td>
								<td class="t-12"><a href="" class="t-12 action-btn btn btn-success">Draft</a></td>
								<td class="t-12"><a href="" class="t-12 action-btn btn btn-danger">Delete</a></td>
							</tr>
							<tr>
								<td class="t-12"><input type="checkbox" name="" id=""></td>
								<td class="t-12">1</td>
								<td class="t-12">James</td>
								<td class="t-12">Coding@gmail.com</td>
								<td class="t-12">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum harum esse architecto asperiores aliquid in. Ex esse provident officiis hic adipisci, amet, animi pariatur, nisi quo distinctio libero a consequuntur.</td>
								<td class="t-12">Approved</td>
								<td class="t-12">Coding Session with Virtual Reality</td>
								<td class="t-12">2019-23-12</td>
								<td class="t-12"><a href="" class="t-12 action-btn btn btn-success">Draft</a></td>
								<td class="t-12"><a href="" class="t-12 action-btn btn btn-danger">Delete</a></td>
							</tr>
						</tbody>
					</table>
				</form>
            </div>
		</div>
		
    </div>

<?php require_once APPROOT .'/views/inc/footer.php'; ?>