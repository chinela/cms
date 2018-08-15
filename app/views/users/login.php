<?php require APPROOT . '/views/inc/public/header.php'; ?>
        <div class="col-md-5 mx-auto">
            <div class="card card-body bg-light mt-2">
                <?php echo checkAndFlash('account_created'); ?>
                <?php echo checkAndFlash('login_err'); ?>
                <h2>Login here</h2>
                <p>Fill the form to login</p>
                <form action="<?php echo URLROOT; ?>users/login" method="post">
                    <div class="form-group">
                        <label for="email">Email:</label><sup class="text-danger">*</sup>
                        <input type="email" name="email" id="email" class="form-control form-control-lg
                        <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>"
                        value=" <?php if(Session::exists('reg_email')){
                            echo Session::flash('reg_email');
                         } else { 
                            echo Input::get('email');
                        } ?>
                        ">
                        <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label><sup class="text-danger">*</sup>
                        <input type="password" name="password" id="password" class="form-control form-control-lg
                        <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo Input::get('password'); ?>">
                        <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="submit" value="Login" class="btn btn-info btn-block">
                        </div>
                        <div class="col">
                            <a href="<?php echo URLROOT; ?>/users/register" class="btn btn-light btn-block t-c t-14">Not a member yet? Sign up</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

