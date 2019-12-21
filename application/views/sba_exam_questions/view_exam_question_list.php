<?php
$this->load->view( 'header/view_header' );
$current_date = date( 'm/d/Y' );
?>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-lg-12">
                <section class="panel panel-info">
                    <header class="panel-heading"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
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
                                    <label class="control-label col-lg-2">Chapter</label>
                                    <div class="col-lg-2">
                                        <?= form_dropdown( 'chapter_id', $chapter_list, '', ['class' => 'form-control', 'onchange' => 'change_chapter_topics(this)'] ) ?>
                                    </div>

                                    <label class="control-label col-lg-2">Topic</label>
                                    <div class="col-lg-2">
                                        <?= form_dropdown( 'topic_id', ['' => 'Select Topic'], '', ['class' => 'form-control topic_id'] ) ?>
                                    </div>

                                </div>

                                <div class="form-group ">
                                    <label for="question" class="control-label col-lg-2">Question</label>
                                    <div class="col-lg-4">
                                        <input type="text" name="question" class="form-control" id="question">
                                    </div>
                                    <label for="Name" class="control-label col-lg-2">Date Range</label>
                                    <div class="col-lg-4">
                                        <div class="input-group input-large" data-date="<?php echo $current_date; ?>"
                                             data-date-format="mm/dd/yyyy">
                                            <input type="text" class="form-control datepicker" name="from_date_time" autocomplete="off">
                                            <span class="input-group-addon">To</span>
                                            <input type="text" class="form-control datepicker" name="to_date_time" autocomplete="off">
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
        <div class="row">
            <div class="col-lg-12">
                <section class="panel panel-info">
                    <header class="panel-heading">
                        SBA Question Bank List (<?= $total_rows; ?>)
                        <span class="tools pull-right">
                            <a class="fa fa-chevron-down" href="javascript:"></a>
                            <a class="fa fa-cog" href="javascript:"></a>
                            <a class="fa fa-times" href="javascript:"></a>
                         </span>
                        <a class="fa fa-print btn btn-sm pull-right btn-warning" href="<?= site_url( 'exam_question/print_questions/1' ); ?>" target="_blank"> Print</a>
                    </header>
                    <div class="panel-body">
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
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Question</th>
                                <th>Options</th>
                                <th>Answer</th>
                                <th>Chapter</th>
                                <th>Topics</th>
                                <th>Used</th>
                                <th>Creation Date</th>
                                <th>Status</th>
                                <th colspan="3">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if ( !empty( $rec ) ) {
                                //$value_all = array();
                                foreach ( $rec as $key => $value ) {
                                    $key++;
                                    ?>
                                    <tr>
                                        <td><?= $key; ?></td>
                                        <td><?php echo $value->id."<br>".strip_tags($value->question_name); ?></td>

                                        <td>
                                            <?php
                                            echo get_ans_options( $value->id );
                                            ?>
                                        </td>
                                        <td class="text-center"><?php echo $value->correct_ans; ?></td>
                                        <td><?php echo get_chapter_list( $value->id ); ?></td>
                                        <td><?php echo get_topics_list( $value->id ); ?></td>
                                        <td class="text-center"><?php echo get_question_use_count( $value->id ); ?></td>
                                        <!--<td><?php //echo $value->created_by; ?>
                                        </td>-->
                                        <td><?php echo date( 'd-m-Y', strtotime( $value->created_at ) ); ?></td>

                                        <td>
                                            <?php
                                            if ( $value->status == '1' ) {
                                                echo '<span class="label label-success">Active</span>';
                                            } else {
                                                echo '<span class="label label-warning">Inactive</span>';
                                            }

                                            if ( $value->discussion ) echo '<br><span class="label label-info">DESC</span>';

                                            if ( $value->reference ) echo '<br><span class="label label-warning">REF</span>';
                                            ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo base_url( "exam_question/show/$value->id" ); ?>"
											   class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-zoom-in"></i> Details</a>

                                            <a href="<?php echo base_url() . 'exam_question/edit/' . $value->id; ?>"
											   class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                echo '<tr><td colspan="11" align="center">No Data Available</td></tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                        <?php echo $links; ?>
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
