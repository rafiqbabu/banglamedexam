<?php
$this->load->view( 'header/view_header' );
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
                                    <label for="Name" class="control-label col-md-2">Institute Name</label>
                                    <div class="col-md-2">
                                        <?php
                                        $url = base_url('setting/ajax_get_course_by_institute');
                                        $ddp = "class='form-control m-bot15' id='institute_id' onchange=get_course_by_institue('$url')";
                                        echo form_dropdown('institute_id', $institute_list, set_value('institute_id', (isset($res->institute_id)) ? $res->institute_id : ''),$ddp);
                                        ?>
                                    </div>
                                    <label for="Status" class="control-label col-md-2">Course</label>

                                    <div class="col-md-2">
                                        <?php
                                        $url = base_url('setting/ajax_get_faculty_by_course');
                                        $ddp = "class='form-control m-bot15' id='course_id' onchange=get_faculty_by_course('$url')";
                                        echo form_dropdown('course_id', $course_list, (isset($res) ? $res->course_id : ''), $ddp);
                                        ?>
                                    </div>

                                    <label for="Status" class="control-label col-md-2">Faculty</label>
                                    <div class="col-md-2">
                                        <?php
                                        //echo $res->faculty_code;
                                        //$url = base_url('setting/ajax_get_course_by_faculty_id');
                                        //$ddp = "class='form-control m-bot15' id='faculty_code' onchange=get_faculty_id('$url')";
                                        $ddp = "class='form-control m-bot15' id='faculty_id'";
                                        echo form_dropdown('faculty_id', $faculty_list,(isset($res->faculty_id) ? $res->faculty_id : ''), $ddp);
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group ">

                                    <label for="Name" class="control-label col-lg-2">Date Range</label>
                                    <div class="col-lg-4">
                                        <div class="input-group">
                                            <input type="text" class="form-control datepicker" name="from_date_time">
                                            <span class="input-group-addon">To</span>
                                            <input type="text" class="form-control datepicker" name="to_date_time">
                                        </div>
                                    </div>

                                    <label class="control-label col-lg-2">Status</label>
                                    <div class="col-lg-2">
                                        <?= form_dropdown( 'status', ['' => 'Choose'] + $status_array, '', ['class' => 'form-control'] ) ?>
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
                        Subject List <span class="badge"><?= $total_rows; ?></span>
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
                            <a href="<?= site_url( "setting/add_subject" ) ?>" class="btn btn-success">Add Subject</a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Institute</th>
                                <th>Course Name</th>
                                <th>Faculty Name</th>
                                <th>Subject</th>
                                <!--                                     <th>Course Topic</th>-->
                                <th>Created By</th>

                                <th>Creation Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if ( !empty( $record ) ) {

                                foreach ( $record as $key => $value ) {
                                    ?>
                                    <tr>
                                        <td><?php echo get_name_by_auto_id( 'sif_institute', $value->institute_id, 'institute_name' ); ?></td>
                                        <td>
                                            <?php echo get_name_by_auto_id( 'sif_course', $value->course_id, 'course_name' ); ?></td>
                                        <td>
                                            <?php
                                            echo get_name_by_auto_id( 'sif_faculty', $value->faculty_id, 'faculty_name' ); ?>

                                        </td>
                                        <td><?php echo $value->subject; ?></td>

                                        <td><?php echo $value->created_by; ?></td>
                                        <td><?php echo $value->created_at; ?></td>
                                        <td class="text-center">
                                            <?php
                                            if ( $value->status == '1' ) {
                                                echo '<span class="label label-success">Active</span>';
                                            } else {
                                                echo '<span class="label label-warning">Inactive</span>';
                                            }
                                            ?>
                                        </td>
                                        <td class="text-center">
											<a href="<?php echo base_url() . 'setting/edit_subject/' . $value->id; ?>" class="btn btn-warning btn-xs" title="Edit" data-toggle="tooltip"
											   data-placement="top"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                echo '<tr><td colspan="7" align="center">No Data Available</td></tr>';
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
$this->load->view( 'footer/view_footer' );
?>    
