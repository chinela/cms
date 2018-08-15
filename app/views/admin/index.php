<?php require_once APPROOT .'/views/inc/header.php'; ?>
<!-- // HEADER INCLUDE FILE -->
<?php require_once APPROOT .'/views/inc/top_nav.php'; ?>
<!-- // TOP NAVIGATION INCLUDE FILE -->

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a> <i class="fa fa-angle-right"></i></li>
    </ol>


    <?php echo checkAndFlash('event_created'); ?>
    <?php echo checkAndFlash('event_deleted'); ?>

<!--four-grids here-->
	<div class="four-grids">
        <div class="col-md-3 four-grid">
            <div class="four-agileits">
                <div class="icon">
                    <i class="glyphicon glyphicon-user" aria-hidden="true"></i>
                </div>
                <div class="four-text">
                    <h3>User</h3>
                    <h4> 24,420  </h4>
                </div>
            </div>
        </div>
        <div class="col-md-3 four-grid">
            <div class="four-agileinfo">
                <div class="icon">
                    <i class="glyphicon glyphicon-list-alt" aria-hidden="true"></i>
                </div>
                <div class="four-text">
                    <h3>Posts</h3>
                    <h4>15,520</h4>
                </div>
            </div>
        </div>
        <div class="col-md-3 four-grid">
            <div class="four-w3ls">
                <div class="icon">
                    <i class="glyphicon glyphicon-comment" aria-hidden="true"></i>
                </div>
                <div class="four-text">
                    <h3>Comments</h3>
                    <h4>12,430</h4>
                </div>
            </div>
        </div>
        <div class="col-md-3 four-grid">
            <div class="four-wthree">
                <div class="icon">
                    <i class="glyphicon glyphicon-folder-open" aria-hidden="true"></i>
                </div>
                <div class="four-text">
                    <h3>Categories</h3>
                    <h4>14,430</h4>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>

    <div class="col-sm-6 ">
        <div class="card">
            <div class="card-body">
                <div class="widget widget-report-table">
                    <header class="widget-header m-b-15">
                    </header>
                    
                    <div class="row m-0 md-bg-grey-100 p-l-20 p-r-20">
                        <div class="col-md-6 col-sm-6 col-xs-6 w3layouts-aug">
                            <h3>Create Event</h3>
                            <!-- <p>REPORT</p> -->
                        </div>
                    </div>
                    
                    <div class="widget-body p-15">
                        <div class="px-4">
                            <form action="<?php echo URLROOT;?>admin/dashboard" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="text" name="name" id="" placeholder="Event title" class="form-control form-control-md p-15 
                                        <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo Input::get('name'); ?>">
                                        <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group  ">
                                        <input type="text" name="location" placeholder="Event location" class="form-control form-control-md p-15 
                                        <?php echo (!empty($data['location_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo Input::get('location'); ?>">
                                        <span class="invalid-feedback"><?php echo $data['location_err']; ?></span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input type="date" name="date" class="form-control form-control-md p-15
                                        <?php echo (!empty($data['date_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo Input::get('date'); ?>">
                                        <span class="invalid-feedback"><?php echo $data['date_err']; ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="file" name="image" id="" class="form-control form-control-md <?php echo (!empty($data['image_err'])) ? 'is-invalid' : ''; ?>">
                                        <span class="invalid-feedback"><?php echo $data['image_err']; ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <textarea name="content" cols="30" rows="4" placeholder="Event description" class="form-control form-contol-md
                                    <?php echo (!empty($data['content_err'])) ? 'is-invalid' : ''; ?>"><?php echo Input::get('content'); ?></textarea>
                                    <span class="invalid-feedback"><?php echo $data['content_err']; ?></span>
                                </div>
                            </div>
                            <div class="row pt-3">
                                <div class="col-12">
                                    <input type="submit" value="Create" class="btn btn-block btn-success form-contol-md form-control">
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-sm-6 ">
        <div class="card">
            <div class="card-body card-padding">
                <div class="widget">
                    <header class="widget-header">
                        <h4 class="widget-title">Activities</h4>
                    </header>
                    <hr class="widget-separator">
                    <div class="widget-body">
                        <div class="streamline">
                            <div class="sl-item sl-primary">
                                <div class="sl-content">
                                    <small class="text-muted">5 mins ago</small>
                                    <p>Williams has just joined Project X</p>
                                </div>
                            </div>
                            <div class="sl-item sl-danger">
                                <div class="sl-content">
                                    <small class="text-muted">25 mins ago</small>
                                    <p>Jane has sent a request for access</p>
                                </div>
                            </div>
                            <div class="sl-item sl-success">
                                <div class="sl-content">
                                    <small class="text-muted">40 mins ago</small>
                                    <p>Kate added you to her team</p>
                                </div>
                            </div>
                            <div class="sl-item">
                                <div class="sl-content">
                                    <small class="text-muted">45 minutes ago</small>
                                    <p>John has finished his task</p>
                                </div>
                            </div>
                            <div class="sl-item sl-warning">
                                <div class="sl-content">
                                    <small class="text-muted">55 mins ago</small>
                                    <p>Jim shared a folder with you</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
                   
    <div class="w3-agileits-pane pb-5">
        <div class="col-lg-12 ">
            <div class="stats-info stats-last widget-shadow">
                <table class="table stats-table table-stripped">
                    <thead>
                        <tr>
                            <th scope="row">S.NO</th>
                            <th>EVENT TITTLE</th>
                            <th>EVENT LOCATION</th>
                            <th>EVENT DATE</th>
                            <th>ATTENDEES</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php  $x = 1; foreach($data['events'] as $event):?>

                        <tr>
                            <th scope="row"><?php echo $x++; ?></th>
                            <td><?php echo $event->event_title; ?></td>
                            <td><?php echo $event->event_location; ?></td>
                            <td><?php echo $event->event_date; ?></td>
                            <td><a href="<?php echo URLROOT; ?>admin/events/show/<?php echo $event->event_id; ?>" class="btn btn-info">view</a></td>
                            <td><a href="<?php echo URLROOT; ?>admin/events/delete/<?php echo $event->event_id; ?>" class="btn btn-danger">delete</a></td>
                        </tr>

                        <?php endforeach; ?>

                    </tbody>
                </table> 
            </div>
        </div>
        <div class="clearfix"></div>
    </div>

<?php require_once APPROOT .'/views/inc/footer.php'; ?>