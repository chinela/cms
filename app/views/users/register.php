<?php require APPROOT . '/views/inc/public/header.php'; ?>

    <div class="col-md-6 mx-auto">
      <div class="card card-body bg-light mt-2">
        <h2>Create An Account</h2>
        <p>Please fill out this form to register with us</p>
        <form action="<?php echo URLROOT; ?>users/register" method="post">
          <div class="form-group">
            <label for="">Name: <sup class="text-danger">*</sup></label>
            <input type="text" name="name" class="form-control form-control-md <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo Input::get('name'); ?>">
            <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="">Email: <sup class="text-danger">*</sup></label>
            <input type="email" name="email" class="form-control form-control-md <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo Input::get('email'); ?>">
            <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="">Password: <sup class="text-danger">*</sup></label>
            <input type="password" name="password" class="form-control form-control-md <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo Input::get('password'); ?>">
            <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
          </div>
          <div class="form-group">
            <label for="">Confirm Password: <sup class="text-danger">*</sup></label>
            <input type="password" name="confirm" class="form-control form-control-md <?php echo (!empty($data['confirm_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo Input::get('name'); ?>">
            <span class="invalid-feedback"><?php echo $data['confirm_err']; ?></span>
          </div>

          <div class="row">
            <div class="col">
              <input type="submit" value="Register" class="btn btn-success btn-block">
            </div>
            <div class="col">
              <a href="<?php echo URLROOT; ?>users/login" class="btn btn-light btn-block t-c t-14">Have an account? Login</a>
            </div>
          </div>
          <?php //echo Input::get('token'); ?>
        </form>
      </div>
    </div>
  </div>
