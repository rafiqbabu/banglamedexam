 <?php $this->load->view( 'web/header/view_header' ); ?>
<!-- Header Begins -->
<?php $this->load->view( 'web/header/header_top' ); ?>
<link href="https://fonts.googleapis.com/css?family=Atomic+Age" rel="stylesheet">
<!-- Page Main -->
<div role="main" class="main">
    <div class="page-default bg-grey team-single">
        <!-- Container -->
        <div class="container">
            <!-- Page Content -->
            <div class="row exam-page">
                <!-- 
                <div class="col-md-3">
                    <div class="widget">
                        <div class="row">
                            <div class="col-sm-12" style="height: 600px; overflow: auto; line-height: 150%; color:#000000; text-align: left;">
                                <h5 class="widget-title">All Questions<span></span></h5>
                                
                                <?php
                                    $sql="SELECT * FROM oe_exam_question WHERE exam_ref_id = '$exam->exam_id' ";
                                    $query = $this->db->query($sql);
                                    $sl=1;
                                    foreach ($query->result() as $row) {
                                        echo $sl.". <a href='#'>".strip_tags (get_name_by_auto_id( 'oe_qsn_bnk_master', $row->question_id, 'question_name' ))."</a><hr>";
                                        $sl=$sl+1;
                                    }
                                ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
                -->
                <div class="col-md-12">
                    <div class="widget">
                        <?= form_open( "exam-answer-save/{$exam->id}" ); ?>
                        <?php echo $msg; ?>
                        <div class="row">
                            <div class="col-sm-9">
                                <h5 class="widget-title"><?= $page_title; ?> <span></span></h5>
                            </div>

                            <div class="col-sm-3 pull-right">
                                 
                            </div>
                        </div>

                        <div class="question-answer">
                            <?= $question_answer; ?>
                        </div>
                        <div class="clearfix"></div>
                        <br>
                        
                         
                        <?= form_close(); ?>
                    </div>
                </div>

            </div>
        </div><!-- Container -->
    </div><!-- Page Default -->
</div><!-- Page Main -->
<!-- Footer -->
<?php $this->load->view( 'web/footer/footer' ); ?>
<!-- Footer -->
<script>


    var time = <?= ($this->session->userdata( 'timer')) ? round($this->session->userdata( 'timer'))-$min_passed: $exam->duration; ?>;
    $('.timer').jTimer({time: time});

    // $(document).ready(function () {
    //     $(this).on('keydown', function (e) {
    //         if ((e.which || e.keyCode) == 116 || (e.which || e.keyCode) == 82) {
    //             confirm('Are you sure? You\'ll lost access to this exam.');
    //             e.preventDefault();
    //         }
    //     });
    // });
</script>
