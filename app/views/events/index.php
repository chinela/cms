<?php require APPROOT . '/views/inc/public/header.php'; ?>

        <div class="col-md-8">
            <div class="container"> 

                <?php foreach($data['events'] as $events): ?>
                <div class="card card-body mb-md-3 mb-1">
                    <h4 class="t-c"><?php echo $events->event_title; ?></h4>
                    <p class="t-13"><i class="fa fa-calendar-check-o text-warning" style="font-size: 16px"></i> Event date: <?php echo $events->event_date; ?></p>
                    <p class="t-13"><i class="fa fa-location-arrow text-warning" style="font-size: 16px"></i> Location: <?php echo $events->event_location; ?></p>
                    <p class="t-13"><i class="fa fa-automobile text-warning" style="font-size: 16px"></i><?php echo $events->event_attendees; ?> Going</p>
                    <div class="row">
                        <div class="col-6 col-md-3 mx-auto mb-3 p-2">
                            <img src="<?php echo URLROOT; ?>uploads/<?php echo $events->event_image; ?>" alt="" class="img-fluid">
                        </div>
                    </div>
                    <p class=""><?php echo $events->event_content; ?></p>

                    <?php if(Session::exists('loggedInUser')): ?>
                    <?php 
                        $check = Event::checkUserAttending($events->event_id, $data['attendees']);
                        if(!$check){
                    ?>
                    <div class="row">
                        <div class="col-md-3 col-6 mx-auto">
                            <a href="<?php echo URLROOT; ?>events/attending/<?php echo $events->event_id; ?>" class="btn btn-success action-btn t-13 t-c ">Attending</a>
                        </div>
                    </div>
                    <?php } else {?>
                    <div class="row">
                        <div class="col-md-3 col-6 mx-auto">
                            <a href="<?php echo URLROOT; ?>events/not_attending/<?php echo $events->event_id; ?>" class="btn btn-danger action-btn t-13 t-c ">Not attending</a>
                        </div>
                    </div>
                    <?php } ?>
                    <?php endif; ?>

                </div>
                <?php endforeach; ?>

            </div>
        </div>
<?php require APPROOT . '/views/inc/public/footer.php'; ?>