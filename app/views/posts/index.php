<?php require APPROOT . '/views/inc/public/header.php'; ?>

        <div class="col-md-8">
            <div class="container"> 

            <?php foreach($data['posts'] as $post): ?>
                <div class="card card-body mb-md-3 mb-1">
                    <a href="<?php echo URLROOT; ?>posts/show/<?php echo $post->post_id; ?>" class="text-dark"><h4 class="t-c"><?php echo $post->post_title; ?></h4></a>
                    <p style="color:orange" class="t-13"> by <span style="color:#777"><?php echo $post->post_author; ?>,</span>
                        <span style="color:orange"><?php echo $post->post_date; ?>, </span> <span style="color:#777"><?php echo $post->post_tags; ?></span>
                        <span class="float-right">
                            <span style="color:#777 !important" class="text-primary mr-3 t-14"><?php echo $post->post_comments_count; ?> <i class="fa fa-comments"></i></span>
                            <span style="color:#777 !important" class="text-primary mr-3 t-14"><?php echo $post->post_views_count; ?> <i class="fa fa-eye"></i></span>
                        </span>
                    </p>
                    <p><?php echo substr($post->post_content, 0, 200); ?></p>
                    <div class="row">
                        <div class="col-md-3 col-6 ml-auto">
                            <a href="<?php echo URLROOT; ?>posts/show/<?php echo $post->post_id; ?>" class="btn btn-warning action-btn t-13 t-c ">Read more</a>
                        </div>
                    </div>
                    
                </div>
            <?php endforeach; ?>

            </div>
        </div>

<?php require APPROOT . '/views/inc/public/footer.php'; ?>