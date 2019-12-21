<?php
$this->load->view('header/view_header');
?>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">

        <!--Search-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel panel-info">
                    <header class="panel-heading">
                        Search Wizard
                        <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:"></a>
                                <a class="fa fa-cog" href="javascript:"></a>
                                <a class="fa fa-times" href="javascript:"></a>
                             </span>
                    </header>
                    <div class="panel-body">
                        <div class="form">
                            <form class="cmxform form-horizontal " id="commentForm" role="form" method="post"
                                  action="<?php echo current_url(); ?>">

                                <div class="form-group ">
                                    <label for="chapter" class="control-label col-md-2">Chapter</label>
                                    <div class="col-md-2">
                                        <?php
                                        $ddp = "class='form-control m-bot15' id='chapter'";
                                        echo form_dropdown('chapter', ['' => 'Choose'] + $chapter_list, '', $ddp);
                                        ?>
                                    </div>
                                    <label for="Name" class="control-label col-lg-2">Date Range</label>
                                    <div class="col-lg-4">
                                        <div class="input-group">
                                            <input type="text" class="form-control datepicker" name="from_date_time">
                                            <span class="input-group-addon">To</span>
                                            <input type="text" class="form-control datepicker" name="to_date_time">
                                        </div>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-2">
                                        <button class="btn btn-primary" type="submit">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!--End Search-->

        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel panel-info">
                    <header class="panel-heading">
                        Topic List <span class="badge"><?= $total_rows; ?></span>
                        <span class="tools pull-right">
                            <a class="fa fa-chevron-down" href="javascript:"></a>
                            <a class="fa fa-cog" href="javascript:"></a>
                            <a class="fa fa-times" href="javascript:"></a>
                        </span>
                    </header>
                    <div class="panel-body">
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
                        <div class="text-right m-bot15">
                            <a href="<?= site_url('setting/add_topics') ?>" class="btn btn-success">Add Topic</a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Chapter Name</th>
                                    <th>Topic Name</th>
                                    <th>Created By</th>
                                    <th>Creation Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($record)) {

                                    foreach ($record as $key => $value) {
                                        ?>
                                        <tr> 
                                            <td>
                                                <?php
                                                echo get_name_by_auto_id('oe_chapter',$value->chapter_ref_id,'chapter_name');
                                                ?>
                                            </td>                                      
                                            <td><?php echo $value->name; ?></td>
                                            <td><?php echo $value->created_by; ?></td>
                                            <td><?php echo $value->created_at; ?></td>
                                            <td>
                                                <?php
                                                        if ($value->status == '1') {
                                                            echo '<span class="label label-success">Active</span>';
                                                        } else {
                                                            echo '<span class="label label-warning">Inactive</span>';
                                                        }
                                                ?>
                                            </td>
                                            <td>
                                                <a href="<?php echo base_url() . 'setting/edit_topics/' . $value->id; ?>" class="btn btn-warning btn-xs" title="Edit" data-toggle="tooltip" data-placement="top"
												><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                                
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    echo'<tr><td colspan="7" align="center">No Data Available</td></tr>';
                                }
                                ?>
                            </tbody>

                        </table>

                        <?= $links; ?>
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
