<?php

$projectTitle = '';
$projectTagline = '';
$headerBackground = '';
$aboutTagline = '';
$aboutContent = '';

if(!empty($settingInfo))
{
    
    foreach ($settingInfo as $si)
    {
        $projectTitle = $si->project_title;
        $projectTagline = $si->project_tagline;
        $headerBackground = $si->header_background;
        $aboutTagline = $si->about_tagline;
        $aboutContent = $si->about_content;
    }
}

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Site Management
        <small>Edit Site Setting</small>
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->                               
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Site Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="addBlog" action="<?php echo base_url() ?>editSetting" method="post" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="titleLabel">Project Title</label>
                                        <input type="text" class="form-control" id="titleLabel" placeholder="Title" name="title" maxlength="128" value="<?php echo $projectTitle; ?>">
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="taglineLabel">Project Tagline</label>
                                        <input type="text" class="form-control" id="taglineLabel" placeholder="Tagline" name="tagline" maxlength="128" value="<?php echo $projectTagline; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="headerBackgroundLabel">Header Background</label>
                                        <input type="text" class="form-control" id="headerBackgroundLabel" placeholder="Header Background" name="headerBackground" maxlength="128" value="<?php echo $headerBackground; ?>">
                                    </div>
                                </div>    
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="aboutTaglineLabel">About Tagline</label>
                                        <input type="text" class="form-control" id="aboutTaglineLabel" placeholder="About Tagline" name="aboutTagline" maxlength="128" value="<?php echo $aboutTagline; ?>">
                                    </div>
                                </div>    
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="aboutContentLabel">About Content</label>                         
                                        <textarea type="text" class="form-control" id="aboutContentLabel" placeholder="About Content" name="aboutContent"><?php echo $aboutContent; ?></textarea>
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
<script src="<?php echo base_url(); ?>assets/js/addUser.js" type="text/javascript"></script>