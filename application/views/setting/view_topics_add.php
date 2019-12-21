<?php
$this->load->view('header/view_header');
?>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-lg-9">
                <section class="panel panel-info">
                    <header class="panel-heading">
                        <?php
                            if($form_action == "add"){
                                echo 'Add Topic';
                            }elseif($form_action == "edit"){
                                echo 'Update Topic';
                            }
                        ?>
                        <span class="tools pull-right">
                            <a class="fa fa-chevron-down" href="javascript:;"></a>
                            <a class="fa fa-cog" href="javascript:;"></a>
                            <a class="fa fa-times" href="javascript:;"></a>
                        </span>
                    </header>
                    <div class="panel-body">
                        <div class="form">
                            <?php
                            if (validation_errors()) {
                                echo validation_errors('<div class="alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>', '</div>');
                            }

                            if ($this->session->flashdata('flashOK')) {
                                echo"<div class=\"alert alert-success fade in\"><button data-dismiss=\"alert\" class=\"close close-sm\" type=\"button\"><i class=\"fa fa-times\"></i></button>";
                                echo $this->session->flashdata('flashOK');
                                echo"</div>";
                            }
                            if ($this->session->flashdata('flashError')) {
                                echo"<div class=\"alert alert-block alert-danger fade in\"><button data-dismiss=\"alert\" class=\"close close-sm\" type=\"button\"><i class=\"fa fa-times\"></i></button>";
                                echo $this->session->flashdata('flashError');
                                echo"</div>";
                            }
                            ?>
                            <?php
                            if ($form_action == "add") {
                                $action_url = base_url() . 'setting/save_topics';
                                $btn_val = 'SAVE';
                            } elseif ($form_action == "edit") {
                                $action_url = base_url() . 'setting/update_topic';
                                $btn_val = 'UPDATE';
                            }
                            ?>
                            <form class="cmxform form-horizontal " id="commentForm" role="form" method="post" action="<?php echo $action_url; ?>">
                                <input type="hidden" name="auto_id" value="<?php echo isset($res->id)? $res->id : ''?>"> 

                                <div class="form-group ">
                                    <label for="Status" class="control-label col-lg-3 col-sm-3">Chapter</label>
                                    <div class="col-lg-6 col-sm-9">
                                        <?php
                                            //echo $res->status;
                                            $ddp = 'class="form-control m-bot15"';
                                            echo form_dropdown('chapter_ref_id', $chapter_list,set_value('chapter_ref_id', (isset($res->chapter_ref_id)) ? $res->chapter_ref_id : ''), $ddp);
                                        ?>
                                    </div>
                                </div>                                                             
                                <div class="form-group ">
                                    <label for="Name" class="control-label col-lg-3">Topic Name</label>
                                    <div class="col-lg-6">
                                        <input class=" form-control" id="name" name="name" type="text" value="<?php echo isset($res->name)? $res->name:''; ?>" required/>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for="Status" class="control-label col-lg-3 col-sm-3">Status</label>
                                    <div class="col-lg-6 col-sm-9">
                                        <?php
                                            //echo $res->status;
                                            $ddp = 'class="form-control m-bot15"';
                                            echo form_dropdown('status', $status_array,set_value('status', (isset($res->status)) ? $res->status : ''), $ddp);
                                        ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-offset-3 col-lg-6">
                                        <input type="hidden" name="hidden_auto_id" id="hidden_auto_id" value="<?php echo isset($res->id) ? $res->id : '';  ?>">
                                        <button class="btn btn-primary" type="submit"><?php echo $btn_val;?></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>

        <!-- page end-->
    </section>
</section>
<!--main content end-->
<?php
$this->load->view('footer/view_footer');
?>    