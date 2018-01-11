<?php

$id = '';
$title = '';
$content = '';
$tags = '';
$start = '';
$end = '';

if(!empty($workInfo))
{
    foreach ($workInfo as $work)
    {
        $id = $work->id;
        $title = $work->title;
        $content = $work->work_content;
        $tags = $work->tags;
        $start = $work->start_work;
        $end = $work->end_work;        
    }
}


?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Work Management
        <small>Add / Edit Blog</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                
                
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Work Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form role="form" action="<?php echo base_url() ?>editWork" method="post" id="editWork" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="titleLabel">Title</label>
                                        <input type="text" class="form-control" id="titleLabel" placeholder="Title" name="title" value="<?php echo $title; ?>" maxlength="128">
                                        <input type="hidden" value="<?php echo $id; ?>" name="id" id="id" />    
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tagsLabel">Tags</label>
                                        <input type="text" class="form-control" id="tagsLabel" placeholder="Tags" name="tags" value="<?php echo $tags; ?>">
                                    </div>
                                </div>    
                            </div>                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="startLabel">Start Work</label>
                                        <input type="date" class="form-control" id="startLabel" placeholder="Start Work" name="start" value="<?php echo $start; ?>">
                                    </div>
                                </div>    
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="endLabel">End Work</label>
                                        <input type="date" class="form-control" id="endLabel" placeholder="End Work" name="end" value="<?php echo $end; ?>">
                                    </div>
                                </div>    
                            </div>                               
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="contentLabel">Content</label>
                                        <textarea type="text" class="form-control" id="contentLabel" placeholder="Content" name="content"><?php echo $content; ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.box-body -->
    
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" />
                            <input type="reset" class="btn btn-default" value="Reset" />
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <?php
                    $this->load->helper('form');
                    $error = $this->session->flashdata('error');
                    if($error)
                    {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('error'); ?>                    
                </div>
                <?php } ?>
                <?php  
                    $success = $this->session->flashdata('success');
                    if($success)
                    {
                ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php } ?>
                
                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                    </div>
                </div>
            </div>
        </div>    
    </section>
</div>

<script src="<?php echo base_url(); ?>assets/js/editUser.js" type="text/javascript"></script>