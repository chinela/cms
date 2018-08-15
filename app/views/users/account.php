<?php require APPROOT . '/views/inc/public/header.php'; ?>

        <div class="col-md-8">
            <div class="container"> 
                <div class="card card-body mb-md-3 mb-1">
                    <div class="row">
                        <div class="col-lg-3  text-center bg-grey ">

                            <?php if($data['user']->user_image == ''): ?>
                                <a href="<?php echo URLROOT; ?>users/account"><img src="<?php echo URLROOT; ?>images/male_admin.png" class="img-fluid p-2 my-2" alt="profile pic"></a>
                            <?php else: ?>
                                <img src="<?php echo URLROOT; ?>uploads/<?php echo $data['user']->user_image; ?>" class="img-thumbnail p-2 my-2" alt="profile pic" height="200" width="100">
                            <?php endif; ?>
                            
                            <p class="t-c"><?php echo $data['user']->user_name; ?></p>
                            <a href="<?php echo URLROOT; ?>users/logout" class="">Logout</a> <br>
                            <a href="<?php echo URLROOT; ?>users/edit_profile/<?php echo $data['user']->user_key; ?>" class="">Edit profile</a>
                            <div class="mt-4">
                                <?php if($data['user']->user_active == 'active'): ?>
                                    <span class=' text-white bg-success p-1 my-bg-success'><?php echo $data['user']->user_active; ?></span> 
                                <?php else: ?>
                                    <span class=' text-white bg-success p-1 my-bg-danger t-c'><?php echo $data['user']->user_active; ?></span> 
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col mr-1 ml-1">

                        <?php if($data['edit'] == ''): ?>

                            <h5 class="bg-white text-center">Your recent activities</h5>
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque?</td>
                                    </tr>
                                    <tr>
                                        <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque?</td>
                                    </tr>
                                    <tr>
                                        <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque?</td>
                                    </tr>
                                    <tr>
                                        <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque?</td>
                                    </tr>
                                    <tr>
                                        <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque?</td>
                                    </tr>
                                    <tr>
                                        <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque?</td>
                                    </tr>
                                </tbody>
                            </table>

                        <?php else: ?>

                            <?php echo checkAndFlash('upload_alert'); ?>
                            <h5 class="bg-white text-center">Edit your profile</h5>
                            <form action="<?php echo URLROOT; ?>users/edit_profile/<?php echo $data['user']->user_key ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control form-control-sm <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" id="" placeholder="Enter new password"
                                    value="<?php echo Input::get('password'); ?>">
                                    <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                                </div>
                                <div class="form-group">
                                    <input type="file" name="image" class="form-control form-control-sm <?php echo (!empty($data['image_err'])) ? 'is-invalid' : ''; ?>" id="" placeholder="Enter new password">
                                    <span class="invalid-feedback"><?php echo $data['image_err']; ?></span>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Change profile" class="btn btn-dark my-bg-dark action-btn t-15">
                                </div>
                            </form>
                        <?php endif; ?>

                        </div> 
                    </div>
                </div>
            </div>
        </div>
<?php require APPROOT . '/views/inc/public/footer.php'; ?>