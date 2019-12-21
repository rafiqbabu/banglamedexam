<?php $this->load->view( 'web/header/view_header' ); ?>
<!-- Header Begins -->
<?php $this->load->view( 'web/header/header_top' ); ?>
<!-- Page Main -->
<div role="main" class="main">
    <div class="page-default bg-grey team-single">
        <!-- Container -->
        <div class="container">
            <!-- Page Content -->
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="widget printable">
                        <?php echo $msg; ?>

                        <h4 class="widget-title text-center"><?= $page_title; ?> <span></span></h4>
                        <table class="table default">
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
                        <table class="table default">
                            <tbody>
                            <tr>
                                <td><strong>Attend Date</strong></td>
                                <td><?= user_formated_date( $exam->attend_date ); ?></td>
                                <td><strong>Started</strong></td>
                                <td><?= user_formated_time($exam->start_time); ?></td>
                                <td><strong>Ended</strong></td>
                                <td><?= user_formated_time($exam->end_time); ?></td>
                            </tr>
                            <tr>
                                <td colspan="2"><strong>Questions Answered</strong></td>
                                <td><span class="label label-warning"><?= count_answers( $exam->answers ); ?></span></td>
                                <td colspan="2"><strong>Questions Not Answered</strong></td>
                                <td><span class="label label-warning"><?= count_answers( $exam->not_answered ); ?></span></td>
                            </tr>
                            <tr>
                                <td colspan="2"><strong>Correct Answered</strong></td>
                                <td><span class="label label-info"><?= count_answers( $exam->correct ); ?></span></td>
                                <td colspan="2"><strong>Wrong Answered</strong></td>
                                <td><span class="label label-info"><?= count_answers( $exam->wrong ); ?></span></td>
                            </tr>
                            <tr>
                                <td><strong>Obtained Mark</strong></td>
                                <td><?= $exam->final_mark; ?></td>
                                <td><strong>Correct Mark</strong></td>
                                <td><?= $exam->correct_mark; ?></td>
                                <td><strong>Wrong Mark</strong></td>
                                <td><?= $exam->wrong_mark; ?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div><!-- Container -->
    </div><!-- Page Default -->
</div><!-- Page Main -->

<!-- Footer -->
<?php $this->load->view( 'web/footer/footer' ); ?>
<!-- Footer -->
