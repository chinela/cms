<?php require APPROOT . '/views/inc/public/header.php'; ?>

        <div class="col-md-8">
        <?php echo checkAndFlash('comment_alert'); ?>
        <?php echo checkAndFlash('like_alert'); ?>
            <div class="container"> 

            <?php foreach($data['post'] as $post): ?>
            
                <div class="card card-body mb-md-3 mb-1">
                    <h4 class="t-c"><?php echo $post->post_title; ?></h4>
                    <p style="color:orange" class="t-13"> by <span style="color:#777"><?php echo $post->post_author; ?>,</span>
                        <span style="color:orange"><?php echo $post->post_date; ?>, </span> <span style="color:#777"><?php echo $post->post_tags; ?></span>
                        <span class="float-right">
                            <span style="color:#777 !important" class="text-primary mr-3 t-14"><?php echo $post->post_comments_count; ?> <i class="fa fa-comments"></i></span>
                            <span style="color:#777 !important" class="text-primary mr-3 t-14"><?php echo $post->post_views_count; ?> <i class="fa fa-eye"></i></span>
                        </span>
                    </p>
                    <div class="row">
                        <div class="col-6 col-md-3 mx-auto mb-3 p-2">
                            <img src="../../uploads/g6.jpg; ?>" alt="" class="img-fluid">
                            <img src="<?php echo URLROOT; ?>uploads/<?php echo $post->post_image; ?>" alt="" class="img-fluid">
                        </div>
                    </div>
                    <p><?php echo $post->post_content; ?></p>
                    
                    <?php foreach($data['comments'] as $comments): ?>

                    <hr style="color: red; background: green; border: 1.5px solid orange">
                    <h4 class="mt-2 mb-3">Comments</h4>

                    <div class="row no-gutters bg-light p-2 mb-2 align-items-center">
                        
                        <div class="col-4 col-sm-3">
                        <?php if($comments->comment_image == ''): ?>
                            <img src="<?php echo URLROOT; ?>images/male_admin.png" class="img-fluid ml-auto" alt="" width="100" height="100">
                        <?php else: ?>
                            <img src="<?php echo URLROOT; ?>uploads/<?php echo $comments->comment_image; ?>" alt="">
                            <?php endif; ?>
                            <div><?php echo $comments->comment_user; ?></div>
                        </div>
                        <div class="col">
                            <p><?php echo $comments->comment_content; ?></p>
                            <div class="text-center">

                                <?php 
                                    $check = Comment::checkLikes($comments->comment_id, $data['user']);
                                    if($check){
                                ?>

                                <a href="<?php echo URLROOT; ?>comments/dislike/<?php echo $comments->comment_id; ?>"><i class="fa fa-thumbs-up text-info"></i></a>
                                <span><?php echo $comments->comment_likes; ?></span>

                                <?php } else {?>

                                <a href="<?php echo URLROOT; ?>comments/like/<?php echo $comments->comment_id; ?>"><i class="fa fa-thumbs-o-up"></i></a>
                                <span><?php echo $comments->comment_likes; ?></span>

                                <?php } ?>

                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>

                    <hr style="color: red; background: green; border: 1.5px solid orange">
                    <h4 class="mt-4 mb-3">Post your comment</h4>
                    
                    <form action="<?php echo URLROOT; ?>posts/comment/<?php echo $post->post_id; ?>" method="post">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <textarea name="content" id="" cols="20" rows="7" class="form-control" placeholder="Place your comment..."></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <input type="submit" value="Post" class="btn btn-dark btn-block">
                            </div>
                        </div>
                    </form>
                </div>
            <?php endforeach; ?>
            </div>
        </div>

<?php require APPROOT . '/views/inc/public/footer.php'; ?>
