<?php
$this->load->view( 'header/view_header' );
$current_date = date( 'Y-m-d' );
?>

<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->

        <div class="row">
            <div class="col-lg-12">
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
                      action="<?php echo base_url() . 'exam_question/save_mcq_examquestion'; ?>">

                    <input type="hidden" name="update_id" value="<?php echo isset( $res->id ) ? $res->id : '' ?>">
                    <input type="hidden" name="type" value="2">
                    <section class="panel panel-info">
                        <header class="panel-heading">
                            Add MCQ Exam Question
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:"></a>
                                <a class="fa fa-cog" href="javascript:"></a>
                                <a class="fa fa-times" href="javascript:"></a>
                            </span>
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <div class="form-group ">
                                    <label for="Faculty" class="control-label col-lg-2">Question <i class="fa fa-asterisk ipd-star"></i></label>
                                    <div class="col-lg-10">
                                        <div class="border-1">
                                            <textarea class="form-control" id="question" name="question_name" required></textarea>
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group ">
                                    <label for="heading" class="control-label col-lg-2">Heading</label>
                                    <div class="col-lg-8">
                                        <div class="border-1">
                                            <textarea class="form-control" name="heading" id="heading" required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="ans_a" class="control-label col-lg-2">A(T/F)<i class="fa fa-asterisk ipd-star"></i></label>
                                    <div class="col-lg-8">
                                        <div class="border-1">
                                            <textarea class="form-control" name="ans_a" id="ans_a" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <?php
                                        $ddp = "class='form-control m-bot15' id='answer' required";
                                        echo form_dropdown( 'correct_ans[]', $mcq_answer_array, (isset( $res->correct_ans ) ? $res->correct_ans : ''), $ddp );
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ans_b" class="control-label col-lg-2">B(T/F)<i class="fa fa-asterisk ipd-star"></i></label>
                                    <div class="col-lg-8">
                                        <div class="border-1">
                                            <textarea class="form-control" name="ans_b" id="ans_b" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <?php
                                        $ddp = "class='form-control m-bot15' id='answer' required";
                                        echo form_dropdown( 'correct_ans[]', $mcq_answer_array, (isset( $res->correct_ans ) ? $res->correct_ans : ''), $ddp );
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ans_c" class="control-label col-lg-2">C(T/F)<i class="fa fa-asterisk ipd-star"></i></label>
                                    <div class="col-lg-8">
                                        <div class="border-1">
                                            <textarea class="form-control" name="ans_c" id="ans_c" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <?php
                                        $ddp = "class='form-control m-bot15' id='answer' required";
                                        echo form_dropdown( 'correct_ans[]', $mcq_answer_array, (isset( $res->correct_ans ) ? $res->correct_ans : ''), $ddp );
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ans_d" class="control-label col-lg-2">D(T/F)<i class="fa fa-asterisk ipd-star"></i></label>
                                    <div class="col-lg-8">
                                        <div class="border-1">
                                            <textarea class="form-control" name="ans_d" id="ans_d" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <?php
                                        $ddp = "class='form-control m-bot15' id='answer' required";
                                        echo form_dropdown( 'correct_ans[]', $mcq_answer_array, (isset( $res->correct_ans ) ? $res->correct_ans : ''), $ddp );
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="ans_e" class="control-label col-lg-2">E(T/F)<i class="fa fa-asterisk ipd-star"></i></label>
                                    <div class="col-lg-8">
                                        <div class="border-1">
                                            <textarea class="form-control" name="ans_e" id="ans_e" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <?php
                                        $ddp = "class='form-control m-bot15' id='answer' required";
                                        echo form_dropdown( 'correct_ans[]', $mcq_answer_array, (isset( $res->correct_ans ) ? $res->correct_ans : ''), $ddp );
                                        ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="Faculty" class="control-label col-lg-2">Question in Years</label>
                                    <div class="col-lg-8">
                                        <input class="form-control" type="text" name="question_in_year" placeholder="Question in Years"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <!-- <label for="Course" class="control-label col-lg-2">Select Answer <i class="fa fa-asterisk ipd-star"></i></label>
                                    <div class="col-lg-2">                                          
                                        <?php
                                    $ddp = "class='form-control m-bot15' id='answer' required";
                                    echo form_dropdown( 'correct_ans', $answer_array, (isset( $res->correct_ans ) ? $res->correct_ans : ''), $ddp );
                                    ?>
                                    </div> -->
                                    <label for="Course" class="control-label col-lg-2">Status <i class="fa fa-asterisk ipd-star"></i></label>
                                    <div class="col-lg-2">
                                        <?php
                                        $ddp = "class='form-control m-bot15' id='answer' required";
                                        echo form_dropdown( 'status', $status_array, (isset( $res->status ) ? $res->status : ''), $ddp );
                                        ?>
                                    </div>

                                </div>
                            </div>
                    </section>
                    <!--Permanant address section-->

                    <div class="panel panel-info">
                        <div class="panel-heading" style="background:#D9EDF7;text-align:center;">
                            <h3 class="panel-title">Chapter and Topics</h3>
                        </div>
                        <div class="panel-body" style="border:1px solid #D9EDF7;">

                            <?php
                            if ( !empty( $chapter_lists ) ) {
                                ?>
                                <ul class="nav nav-tabs">
                                    <?php
                                    $i = 0;
                                    foreach ( $chapter_lists as $key => $value ) {
                                        $class = '';
                                        if ( $i == 0 ) $class = 'active'
                                        ?>
                                        <li class="<?php echo $class; ?>">
                                            <input type="checkbox" name="chapter[]" value="<?php echo $value->id; ?>"/>
                                            <a data-toggle="tab" href="#tab_chapter_<?php echo $value->id; ?>"><?php echo $value->chapter_name; ?></a>
                                        </li>
                                        <?php $i++;
                                    } ?>
                                </ul>
                                <?php
                            } ?>
                            <div class="tab-content">
                                <?php
                                if ( !empty( $chapter_lists ) ) {
                                    ?>
                                    <?php
                                    $i = 0;
                                    foreach ( $chapter_lists as $key => $value ) {
                                        $class = '';
                                        if ( $i == 0 ) $class = 'active'
                                        ?>
                                        <div id="tab_chapter_<?php echo $value->id; ?>" class="tab-pane <?php echo $class; ?>">
                                            <p>Select Topics For Chapter: <?php echo $value->chapter_name; ?></p>
                                            <?php
                                            $chapter_id = $value->id;
                                            $arr_topics = get_topic_by_chapter( $chapter_id );
                                            if ( !empty( $arr_topics ) ) {
                                                foreach ( $arr_topics as $key_topics => $value_topics ) {
                                                    ?>
                                                    <p><input type="checkbox" name="topics_<?php echo $value->id; ?>[]"
                                                              value="<?php echo $value_topics->id; ?>"/> <?php echo $value_topics->name; ?>
                                                    </p>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </div>
                                        <?php
                                        $i++;
                                    }
                                    ?>

                                    <?php
                                }
                                ?>

                            </div>
                        </div>
                    </div>

                    <div class="panel panel-info">
                        <div class="panel-heading" style="background:#D9EDF7;text-align:center;">
                            <h3 class="panel-title">Discussion & Reference</h3>
                        </div>
                        <div class="panel-body">

                            <div class="form-group">
                                <label for="Course" class="control-label col-lg-2">Discussion</label>

                                <div class="col-lg-10">
                                    <div class="border-1">
                                        <textarea name="discussion" placeholder="Discussion" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Name" class="control-label col-lg-2">Reference</label>
                                <div class="col-lg-10">
                                    <div class="border-1">
                                        <textarea name="reference" placeholder="Reference" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-2">
                                    <input type="submit" class="btn btn-primary" value="Submit">

                                </div>
                            </div>
                        </div>
                    </div>


                    <!--start image section-->


                </form>
            </div>
        </div>
        <!-- page end-->


    </section>
</section>
<!--main content end-->


<?php
$this->load->view( 'footer/view_footer' );
?>

<script src="<?php echo base_url( 'ckeditor/ckeditor.js' ); ?>"></script>
<script>
    CKEDITOR.replace('discussion');
    CKEDITOR.replace('reference');

	CKEDITOR.replace('question');
	CKEDITOR.replace('heading');
	CKEDITOR.replace('ans_a');
	CKEDITOR.replace('ans_b');
	CKEDITOR.replace('ans_c');
	CKEDITOR.replace('ans_d');
	CKEDITOR.replace('ans_e');
</script>
