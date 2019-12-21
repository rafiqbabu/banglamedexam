<?php
$this->load->view( 'header/view_header' );
$current_date = date( 'Y-m-d' );
?>

<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-md-12">
                <?php
                if ( validation_errors() ) {
                    echo validation_errors( '<div class="alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>', '</div>' );
                }

                if ( $this->session->flashdata( 'flashOK' ) ) {
                    echo "<div class=\"alert alert-success fade in\"><button data-dismiss=\"alert\" class=\"close close-sm\" type=\"button\"><i class=\"fa fa-times\"></i></button>";
                    echo $this->session->flashdata( 'flashOK' );
                    echo "</div>";
                }
                if ( $this->session->flashdata( 'flashError' ) ) {
                    echo "<div class=\"alert alert-block alert-danger fade in\"><button data-dismiss=\"alert\" class=\"close close-sm\" type=\"button\"><i class=\"fa fa-times\"></i></button>";
                    echo $this->session->flashdata( 'flashError' );
                    echo "</div>";
                }
                ?>
                <form class="cmxform form-horizontal" enctype="multipart/form-data" id="commentForm" role="form" method="post"
                      action="<?php echo base_url() . 'exam_create/add_exam'; ?>">

                    <!--  <input type="hidden" name="update_id" value="<?php //echo isset($res->id) ? $res->id : '' ?>"> -->

                    <section class="panel panel-info">
                        <header class="panel-heading"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                            <h3 class="panel-title">Exam Basics
                                <span class="jnn-tools pull-right">
                                        <a class="fa fa-chevron-down" href="javascript:"></a>
                                    </span>
                            </h3>

                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <div class="form-group ">
                                    <label for="Name" class="control-label col-md-2">Exam Name <i class="fa fa-asterisk ipd-star"></i></label>
                                    <div class="col-md-4">
                                        <input class="form-control" id="exam_name" name="exam_name" type="text" required/>
                                    </div>

                                    <label for="Name" class="control-label col-md-2">Institute Name <i class="fa fa-asterisk ipd-star"></i></label>
                                    <div class="col-md-4">
                                        <?php
                                        $url = base_url( 'setting/ajax_get_course_by_institute' );
                                        $ddp = "class='form-control m-bot15' id='institute_id' required onchange=get_course_by_institue('$url')";
                                        echo form_dropdown( 'institute_id', $institute_list, set_value( 'institute_id', (isset( $res->institute_id )) ? $res->institute_id : '' ), $ddp );
                                        ?>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for="Status" class="control-label col-md-2">Course <i class="fa fa-asterisk ipd-star"></i></label>

                                    <div class="col-md-4">
                                        <?php
                                        $url = base_url( 'setting/ajax_get_faculty_by_course' );
                                        $ddp = "class='form-control m-bot15' id='course_id' required onchange=get_faculty_by_course('$url')";
                                        echo form_dropdown( 'course_id', $course_list, (isset( $res ) ? $res->course_id : ''), $ddp );
                                        ?>
                                    </div>

                                    <label for="Status" class="control-label col-md-2">Faculty <i class="fa fa-asterisk ipd-star"></i></label>
                                    <div class="col-md-4">
                                        <?php
                                        //$ddp = "class='form-control m-bot15' id='faculty_code' required";
                                        $url = base_url( 'setting/ajax_get_subjects_by_faculty' );
                                        $ddp = "class='form-control m-bot15' id='faculty_id' required onchange=get_subjects_by_faculty('$url')";
                                        echo form_dropdown( 'faculty_id', $faculty_list, (isset( $res->faculty_id ) ? $res->faculty_id : ''), $ddp );
                                        ?>
                                    </div>
                                </div>


                                <div class="form-group ">
                                    <label for="Status" class="control-label col-md-2">Subject <i class="fa fa-asterisk ipd-star"></i></label>
                                    <div class="col-md-4">
                                        <?php
                                        $ddp = "class='form-control m-bot15' id='subject_faculty_id' required";
                                        echo form_dropdown( 'subject_id', $sub_list, '', $ddp );
                                        ?>
                                    </div>
                                    <label for="Course" class="control-label col-md-2">Exam Type <i class="fa fa-asterisk ipd-star"></i></label>
                                    <div class="col-md-4">
                                        <?php
                                        $ddp = "class='form-control m-bot15' id='answer' required";
                                        echo form_dropdown( 'exam_id', $exam_category, '', $ddp );
                                        ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="Course" class="control-label col-md-2">Total MCQ Question</label>

                                    <div class="col-md-2">
                                        <input class="form-control number-only" id="question" name="mcq_total" type="text" value="0"/>
                                    </div>
	
									<label for="Name" class="control-label col-md-4 ">Mark (Per Question)</label>
                                    <div class="col-md-2">
                                        <input class="form-control number-only" id="question" name="mcq_value" type="text"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="Course" class="control-label col-md-2">Total SBA Question</label>

                                    <div class="col-md-2">
                                        <input class="form-control" id="question" name="sba_total" type="text" value="0"/>
                                    </div>
	
									<label for="Name" class="control-label col-md-4 ">Mark (Per Question)</label>
                                    <div class="col-md-2">
                                        <input class="form-control" id="question" name="sba_value" type="text"/>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for="negative_mark" class="control-label col-md-2">Negative Marking</label>
                                    <div class="col-md-2">
                                        <input class="form-control number-only" id="negative_mark" name="negative_mark" type="text"/>
                                    </div>

                                    <label class="control-label col-md-4">Total Mark
                                        <i class="fa fa-asterisk ipd-star"></i>
                                    </label>
                                    <div class="col-md-2">
                                        <input class="form-control number-only" type="text" name="total_mark" required/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-2">Time (Minutes) <i class="fa fa-asterisk ipd-star"></i></label>
                                    <div class="col-md-2">
                                        <input class="form-control number-only" type="text" name="time" required/>
                                    </div>
                                    <label for="ans_visible" class="control-label col-md-4">Answer Sheet Visible (Hours) <i class="fa fa-asterisk ipd-star"></i></label>
                                    <div class="col-md-2">
                                        <?php
                                        $ddp = "class='form-control m-bot15 number-only' id='ans_visible' required";
                                        echo form_input('ans_visible', '', $ddp);
                                        ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="Course" class="control-label col-md-2">Free Exam</label>
                                    <div class="col-md-2">
                                        <?php
                                        $ddp = "class='form-control m-bot15' id='answer'";
                                        echo form_dropdown( 'free_exam', $free_exam, '', $ddp );
                                        ?>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="Course" class="control-label col-md-2">For SIF ?</label>
                                    <div class="col-md-2">
                                        <input type="radio" name="is_sif" value="1"> Yes <input type="radio" name="is_sif" value="0" checked> No
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="Course" class="control-label col-md-2">SIF Exam Code</label>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="exam_comm_code">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="Course" class="control-label col-md-2">Package ID</label>
                                    <div class="col-md-2">
                                        <input class="form-control" type="text" name="package_id" >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="Name" class="control-label col-md-2">Exam Details </label>
                                    <div class="col-md-4">
                                        <textarea name="exam_detail" class="form-control" style="width:530px;height: 120px;"></textarea>
                                    </div>
                                </div>
	
	
								<div class="form-group">
									<label for="status" class="control-label col-md-2">Status</label>
									<div class="col-md-2">
										<?php
										$ddp = "class='form-control m-bot15' id='status'";
										echo form_dropdown( 'status', $status_list, '', $ddp );
										?>
									</div>
								</div>
                            </div>
                        </div>

                    </section>

                    <section class="panel panel-info">
                        <header class="panel-heading">
                            <h3 class="panel-title">No of Questions

                                <span class="jnn-tools pull-right">
                                        <a class="fa fa-chevron-down" href="javascript:"></a>
                                    </span>
                            </h3>
                        </header>
                        <div class="panel-body">
                            <table class="table table-bordered jnn-ques-count">
                                <tr>
                                    <th width="50%">MCQ</th>
                                    <th width="50%">SBA</th>
                                </tr>

                                <tr>
                                    <td>
                                        <div class="tree_mcq tree-view">
                                            <ul>
                                                <?php
                                                if ( !empty( $chapter_lists ) ) {
                                                    ?>
                                                    <?php
                                                    $i = 0;
                                                    foreach ( $chapter_lists as $key => $value ) {
                                                        ?>
                                                        <li><a href="javascript:void"><?php echo $value->chapter_name; ?></a>
                                                            <?php
                                                            $chapter_id = $value->id;
                                                            $arr_topics = get_topic_by_chapter( $chapter_id );
                                                            if ( !empty( $arr_topics ) ) {
                                                                ?>
                                                                <ul>
                                                                    <?php
                                                                    foreach ( $arr_topics as $key_topics => $value_topics ) {
                                                                        ?>
                                                                        <li>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <?php echo $value_topics->name; ?>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <?= form_input( "mcq_ques_count[{$value_topics->id}]", NULL, ['class' => 'form-control mcq_ques_count', 'placeholder' => 'Question Count', 'data-id' => $value_topics->id] ) ?>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <?php
                                                                    } ?>
                                                                </ul>
                                                                <?php
                                                            }
                                                            ?>
                                                        </li>
                                                        <?php
                                                    }
                                                } ?>

                                            </ul>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="tree_sba tree-view">
                                            <ul>
                                                <?php
                                                if ( !empty( $chapter_lists ) ) {
                                                    ?>
                                                    <?php
                                                    $i = 0;
                                                    foreach ( $chapter_lists as $key => $value ) {
                                                        ?>
                                                        <li><a href="javascript:void"><?php echo $value->chapter_name; ?></a>
                                                            <?php
                                                            $chapter_id = $value->id;
                                                            $arr_topics = get_topic_by_chapter( $chapter_id );
                                                            if ( !empty( $arr_topics ) ) {
                                                                ?>
                                                                <ul>
                                                                    <?php
                                                                    foreach ( $arr_topics as $key_topics => $value_topics ) {
                                                                        ?>
                                                                        <li>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <?php echo $value_topics->name; ?>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <?= form_input( "sba_ques_count[{$value_topics->id}]", NULL, ['class' => 'form-control sba_ques_count', 'placeholder' => 'Question Count', 'data-id' => $value_topics->id] ) ?>
                                                                                </div>
                                                                            </div>
                                                                        </li>
                                                                        <?php
                                                                    } ?>
                                                                </ul>
                                                                <?php
                                                            }
                                                            ?>
                                                        </li>
                                                        <?php
                                                    }
                                                } ?>

                                            </ul>
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <th>Total MCQ = <span class="total_mcq_count"></span></th>
                                    <th>Total SBA = <span class="total_sba_count"></span></th>
                                </tr>

                            </table>

                            <!-- Next Button -->
<!--                            <div class="col-md-12">-->
<!--                                <div class="form-group text-center">-->
<!--                                    <button type="button" class="btn btn-success" onclick="open_next_panel(this, event)">Next <i class="fa fa-long-arrow-right"></i></button>-->
<!--                                </div>-->
<!--                            </div>-->
                        </div>
                    </section>

                    <section class="panel panel-info">
                        <header class="panel-heading">
                            <h3 class="panel-title">Select MCQ Questions

                                <span class="jnn-tools pull-right">
                                        <a class="fa fa-chevron-down" href="javascript:"></a>
                                    </span>
                            </h3>
                        </header>
                        <div class="panel-body">

                            <table class="table table-bordered mcq-ques-show">
                                <thead>

                                <tr>
                                    <th width="20%">Chapter - Topic</th>
                                    <th width="80%">Questions</th>
                                </tr>
                                </thead>

                                <tbody>
                                <tr>
                                    <td colspan="2">Please Select No of Questions First</td>
                                </tr>
                                </tbody>

                            </table>


<!--                            <div class="col-md-12">-->
<!--                                <div class="form-group text-center">-->
<!--                                    <button type="button" class="btn btn-success" onclick="open_next_panel(this, event)">Next <i class="fa fa-long-arrow-right"></i></button>-->
<!--                                </div>-->
<!--                            </div>-->
                        </div>
                    </section>

                    <section class="panel panel-info">
                        <header class="panel-heading">
                            <h3 class="panel-title">Select SBA Questions

                                <span class="jnn-tools pull-right">
                                        <a class="fa fa-chevron-down" href="javascript:"></a>
                                    </span>
                            </h3>
                        </header>
                        <div class="panel-body">

                            <table class="table table-bordered sba-ques-show">
                                <thead>

                                <tr>
                                    <th width="20%">Chapter - Topic</th>
                                    <th width="80%">Questions</th>
                                </tr>
                                </thead>

                                <tbody>
                                <tr>
                                    <td colspan="2">Please Select No of Questions First</td>
                                </tr>
                                </tbody>

                            </table>

                            <div class="form-group text-center">
                                <button class="btn btn-success" type="submit" value="Submit">Submit</button>
                            </div>

                        </div>
                    </section>
                </form>
            </div>
        </div>
    </section>
</section>
<!--main content end-->

<?php
$this->load->view( 'footer/view_footer' );
?>
