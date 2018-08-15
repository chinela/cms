        <div class="col-md-4">
            <div class="card card-body bg-light mb-md-3 mb-2">
                <h5>Search Blog</h5>
                <?php echo checkAndFlash('search_err'); ?>
                <form action="<?php echo URLROOT; ?>posts/search" method="post">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control form-control-md <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" 
                        value="<?php echo Input::get('name'); ?>" placeholder="Search posts">
                        <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
                    </div>  
                    <div class="row">
                        <div class="col mb-2">
                            <input type="submit" value="Search" class="btn btn-light my-bg-light btn-block action-btn">
                        </div>
                    </div> 
                </form>
            </div>

            <div class="card card-body bg-light mb-3">
                    <div class="row">
                        <div class="col">
                            <h5>Categories</h5>
                            <?php foreach($data['categories'] as $categories): ?>
                            <a href="<?php echo URLROOT; ?>categories/<?php echo $categories->cat_unique; ?>" class="t-14"><?php echo $categories->cat_title; ?></a> |
                            <?php endforeach; ?>                            
                        </div>
                    </div> 
                </form>
            </div>
            
        </div>
    </div>
</div>