<?php
$this->load->view( 'header/view_header' );
?>
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <section class="panel panel-info">
                        <header class="panel-heading">
                            <?= $page_title; ?>
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                            </span>
                        </header>
                        <div class="panel-body">
                            <table class="table table-striped table-bordered">
                                <tbody>
                                <tr>
                                    <td><strong>Institute</strong></td>
                                    <td><?= get_name_by_auto_id( 'sif_institute', $exam->institute_id, 'institute_name' ); ?></td>
                                    <td><strong>Course</strong></td>
                                    <td><?= get_name_by_auto_id( 'sif_course', $exam->course_id, 'course_name' ); ?></td>
                                    <td><strong>Faculty</strong></td>
                                    <td><?= get_name_by_auto_id( 'sif_faculty', $exam->faculty_id, 'faculty_name' ); ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Subject</strong></td>
                                    <td colspan="2"><?= get_name_by_auto_id( 'sif_subject', $exam->subject_id, 'subject' ); ?></td>
                                    <td><strong>Exam Type</strong></td>
                                    <td colspan="2"><?= get_name_by_auto_id( 'sif_exam_category', $exam->exam_type_id, 'exam_category_name' ); ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Title</strong></td>
                                    <td colspan="3"><?= $exam->exam_data->exam_name; ?></td>
                                    <td><strong>Duration</strong></td>
                                    <td>
                                        <span class="label label-warning"><?= $exam->duration; ?> Min</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Mark</strong></td>
                                    <td><?= $exam->exam_data->total_mark; ?></td>
                                    <td><strong>MCQ Questions</strong></td>
                                    <td>
                                        <span class="label label-info"><?= $exam->exam_data->mcq_total; ?></span>
                                    </td>
                                    <td><strong>SBA Questions</strong></td>
                                    <td>
                                        <span class="label label-info"><?= $exam->exam_data->sba_total; ?></span>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <table class="table table-striped table-bordered">
                                <tbody>
                                <tr>
                                    <td><strong>Attend Date</strong></td>
                                    <td><?= user_formated_date( $exam->attend_date ); ?></td>
                                    <td><strong>Started</strong></td>
                                    <td><?= user_formated_time( $exam->start_time ); ?></td>
                                    <td><strong>Ended</strong></td>
                                    <td><?= user_formated_time( $exam->end_time ); ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><strong>Questions Answered</strong></td>
                                    <td><span class="badge"><?= count_answers( $exam->answers ); ?></span></td>
                                    <td colspan="2"><strong>Questions Not Answered</strong></td>
                                    <td><span class="badge"><?= count_answers( $exam->not_answered ); ?></span></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><strong>Correct Answered</strong></td>
                                    <td><span class="badge bg-green"><?= count_answers( $exam->correct ); ?></span></td>
                                    <td colspan="2"><strong>Wrong Answered</strong></td>
                                    <td><span class="badge bg-orange"><?= count_answers( $exam->wrong ); ?></span></td>
                                </tr>
                                <tr>
                                    <td><strong>Obtained Mark</strong></td>
                                    <td><?= $exam->final_mark; ?></td>
                                    <td><strong>Correct Mark</strong></td>
                                    <td><?= $exam->correct_mark; ?></td>
                                    <td><strong>Wrong Mark</strong></td>
                                    <td><?= $exam->wrong_mark; ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Subject Position</strong></td>
                                    <td><?= $exam->subject_pos; ?></td>
                                    <td><strong>Overall Position<!--Exam Type Position-->	</strong></td>
                                    <!--<td><?= $exam->exam_type_pos; ?></td>-->
									
									<td> <!--new-->
									    <?php 
                                            $sql="SELECT * FROM oe_doc_exams WHERE status = '1' AND subject_id = '$exam->subject_id' ORDER BY final_mark DESC";
                                            $query = $this->db->query($sql);
                                            if ($query->num_rows() > 0) {
                                                $sl=1;
                                                foreach ($query->result() as $row) {
                                                    if (($row->doc_id == $exam->doc_id) && ($row->exam_id == $exam->exam_id)) {
                                                        $sop = $sl;
                                                    }
                                                $sl=$sl+1;
                                                }
                                            }
                                            echo $sop;
                                        ?>
									</td>
									
									<td></td>
									<td></td>
                                </tr>
                                </tbody>
                            </table>
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
