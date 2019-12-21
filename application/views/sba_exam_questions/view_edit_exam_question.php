<?php
$this->load->view( 'header/view_header' );
$current_date = date( 'Y-m-d' );
?>

<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
    
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
    
        if ( $form_action == "add" ) {
            $action_url = base_url() . 'exam_question/save_question';
            $btnval     = 'SAVE';
        } elseif ( $form_action == "edit" ) {
            $action_url = base_url() . 'exam_question/update_sba_question';
            $btnval     = 'UPDATE';
        }
        ?>
        <form class="cmxform form-horizontal" enctype="multipart/form-data" id="commentForm" role="form" method="post"
              action="<?= $action_url; ?>">

            <input type="hidden" name="update_id" value="<?= isset( $res->id ) ? $res->id : '' ?>">
            <input type="hidden" name="type" value="1">
            <section class="panel panel-info">
                <header class="panel-heading">
                    <?php
                    if ( $form_action == "add" ) {
                        echo 'Question Bank (Input) :: SBA ';
                    } elseif ( $form_action == "edit" ) {
                        echo 'Edit Online Question Form';
                    }
                    ?>
                    <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:"></a>
                            </span>
                </header>
                <div class="panel-body">
                    <div class="form">
                        <div class="form-group ">
                            <label for="question" class="control-label col-lg-2">Question <i class="fa fa-asterisk ipd-star"></i></label>
                            <div class="col-lg-10">
                                <div class="border-1">
                                    <textarea class="form-control" id="question" name="question_name" required><?= isset( $res->question_name ) ? $res->question_name : '' ?></textarea>
                                </div>
                            </div>

                        </div>
                        <div class="form-group ">
                            <label for="heading" class="control-label col-lg-2">Heading</label>
                            <div class="col-lg-10">
                                <div class="border-1">
                                    <textarea class="form-control" id="heading" name="heading"><?= isset( $res->heading ) ? $res->heading : '' ?></textarea>
                                </div>
                            </div>

                        </div>
    
                        <?php if ( $results ):
                            foreach ( $results as $result ) :?>
                                <div class="form-group ">
                                    <label for="ans_a" class="control-label col-lg-2"><?= isset( $result->index_seqn ) ? $result->index_seqn : '' ?> <i class="fa fa-asterisk ipd-star"></i></label>
                                    <div class="col-lg-10">
                                        <div class="border-1">
                                            <textarea class="form-control" name="ans_<?= strtolower( $result->index_seqn ) ?>" id="ans_<?= strtolower( $result->index_seqn ) ?>"
                                                      required><?= isset( $result->ans ) ? $result->ans : '' ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach;
                        endif; ?>
                        <div class="form-group">
                            <label for="Course" class="control-label col-lg-2">Select Answer <i class="fa fa-asterisk ipd-star"></i></label>
                            <div class="col-lg-2">
                                <?php
                                $ddp = "class='form-control m-bot15' id='answer' required";
                                echo form_dropdown( 'correct_ans', $answer_array, ( isset( $res->correct_ans ) ? $res->correct_ans : '' ), $ddp );
                                ?>
                            </div>
                            <label for="Course" class="control-label col-lg-2">Status <i class="fa fa-asterisk ipd-star"></i></label>
                            <div class="col-lg-2">
                                <?php
                                $ddp = "class='form-control m-bot15' id='answer' required";
                                echo form_dropdown( 'status', $status_array, ( isset( $res->status ) ? $res->status : '' ), $ddp );
                                ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="Faculty" class="control-label col-lg-2">Question in Years</label>
                            <div class="col-lg-10">
                                <input class="form-control" type="text" name="question_in_year" placeholder="Question in Years"
                                       value="<?= isset( $res->question_in_year ) ? $res->question_in_year : '' ?>"/>
                            </div>
                        </div>
                    </div>
            </section>

            <section class="panel panel-info">
                <div class="panel-heading" style="background:#D9EDF7;text-align:center;">
                    <h3 class="panel-title">Chapter and Topics</h3>
                </div>
                <div class="panel-body">
                    <header class="panel-heading tab-bg-dark-navy-blue ">
                        <?php
                        if ( !empty( $chapter_lists ) ) {
                            ?>
                            <ul class="nav nav-tabs">
                                <?php
                                $i = 0;
                                foreach ( $chapter_lists as $key => $value ) {
                                    $class = '';
//                                    if ($i == 0) $class = 'active';
                                    $checked = "";
                                    if ( isset( $chapters ) ) {
                                        foreach ( $chapters as $chapter ) {
                                            if ( $chapter->chapter_id == $value->id ) {
                                                $checked = "checked";
                                                $class   = 'active';
                                            }
                                        }
                                    }
    
                                    ?>
                                    <li class="<?= $class; ?>">
                                        <input type="checkbox" name="chapter[]" value="<?= $value->id; ?>" <?= $checked; ?>/>
                                        <a data-toggle="tab" href="#tab_chapter_<?= $value->id; ?>"><?= $value->chapter_name; ?></a>
                                    </li>
                                    <?php $i++;
                                } ?>
                            </ul>
                            <?php
                        } ?>
                    </header>
                    <div class="tab-content">
                        <?php
                        if ( !empty( $chapter_lists ) ) {
                            ?>
                            <?php
                            $i = 0;
                            foreach ( $chapter_lists as $key => $value ) {
                                $class = '';
//                                if ($i == 0) $class = 'active';
                                if ( isset( $chapters ) ) {
                                    foreach ( $chapters as $chapter ) {
                                        if ( $chapter->chapter_id == $value->id ) {
                                            $class = 'active';
                                        }
                                    }
                                }
                                ?>
                                <div id="tab_chapter_<?= $value->id; ?>" class="tab-pane <?= $class; ?>">
                                    <p>Select Topics For Chapter: <?= $value->chapter_name; ?></p>
                                    <?php
                                    $chapter_id = $value->id;
                                    $arr_topics = get_topic_by_chapter( $chapter_id );
                                    if ( !empty( $arr_topics ) ) {
                                        foreach ( $arr_topics as $key_topics => $value_topics ) {
                                            $checked = "";
                                            if ( $topics ) {
                                                foreach ( $topics as $topic ) {
                                                    if ( $topic->topic_id == $value_topics->id ) {
                                                        $checked = "checked";
                                                    }
                                                }
                                            }
        
                                            ?>
                                            <p>
                                                <label class="control-label">
                                                    <input type="checkbox" name="topics_<?= $value->id; ?>[]" value="<?= $value_topics->id; ?>" <?= $checked; ?>/> <?= $value_topics->name; ?>
                                                </label>
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
            </section>

            <section class="panel panel-info">
                <div class="panel-heading" style="background:#D9EDF7;text-align:center;">
                    <h3 class="panel-title">Discussion & Reference</h3>
                </div>
                <div class="panel-body">


                    <div class="col-md-12">
                        <div class="form-group">

                            <label for="Course" class="control-label col-md-2">Discussion</label>
                            <div class="col-md-10">
                                <div class="border-1">
                                    <textarea name="discussion" id="discussion" placeholder="Discussion" class="form-control"><?= ( isset( $res->discussion ) ? $res->discussion : '' ); ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="Name" class="control-label col-md-2">Reference</label>
                            <div class="col-md-10">
                                <div class="border-1">
                                    <textarea name="reference" id="reference" placeholder="Reference" class="form-control"><?= ( isset( $res->reference ) ? $res->reference : '' ); ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-2">
                            <button class="btn btn-primary" type="submit"><?= $btnval; ?></button>

                        </div>
                    </div>
                </div>
            </section>
            <!--start image section-->
        </form>
        <!-- page end-->
    </section>
</section>
<!--main content end-->

<?php
$this->load->view( 'footer/view_footer' );
?>
<script src="<?= base_url( 'ckeditor/ckeditor.js' ); ?>"></script>
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
