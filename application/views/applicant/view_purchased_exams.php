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
                            Purchased Exams
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:"></a>
                                <a class="fa fa-cog" href="javascript:"></a>
                                <a class="fa fa-times" href="javascript:"></a>
                            </span>
                        </header>
                        <div class="panel-body">
                            <?php
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
                            <div class="panel-group accordion" id="exm-accrd" role="tablist" aria-multiselectable="true">
                                <?php if ( $purchases ) : ?>
                                    <?php foreach ( $purchases as $k => $purchase ) : ?>
                                        <div class="panel panel-success">
                                            <div class="panel-heading" role="tab" id="heading<?= $k; ?>">
                                                <a role="button" data-toggle="collapse" data-parent="#exm-accrd" href="#exam-pur-<?= $k; ?>" aria-expanded="<?= $k != 0 ? 'true' : 'false' ?>"
                                                   aria-controls="exam-pur-<?= $k; ?>" class="<?= $k != 0 ? 'collapsed' : '' ?>">
                                                    <h4 class="panel-title">
                                                        <?= "Date: " . user_formated_datetime( $purchase->created_at ); ?>
                                                        -
                                                        <?php if ( $purchase->payment_status == 1 ) {
                                                            echo '<label class="label label-success">Paid</label>';
                                                        } else {
                                                            echo '<label class="label label-warning">Unpaid</label>';
                                                        } ?>
                                                    </h4>
                                                </a>
                                            </div>
                                            <div id="exam-pur-<?= $k; ?>" class="panel-collapse collapse <?= $k == 0 ? 'in' : '' ?>" role="tabpanel" aria-labelledby="heading<?= $k; ?>">
                                                <div class="panel-body">
                                                    <table class="table table-bordered">
                                                        <tbody>
                                                        <tr>
                                                            <td>Date</td>
                                                            <td><?= user_formated_datetime( $purchase->created_at ); ?></td>
                                                            <td>Exams</td>
                                                            <td class="text-center">
                                                                <span class="label label-info"><?= $purchase->exam_count; ?></span>
                                                            </td>
                                                            <td>Cost</td>
                                                            <td><?= $purchase->amount_paid; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Trans ID</td>
                                                            <td><?= $purchase->trans_id; ?></td>
                                                            <td>Currency</td>
                                                            <td><?= $purchase->currency; ?></td>
                                                            <td>Status</td>
                                                            <td>
                                                                <?php if ( $purchase->payment_status == 1 ) {
                                                                    echo '<label class="label label-success">Paid</label>';
                                                                } else {
                                                                    echo '<label class="label label-warning">Unpaid</label>';
                                                                } ?>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
    
                                                    <?php if ( $purchase->exams ) : ?>
                                                        <table class="table table-bordered">
                                                            <thead>
                                                            <tr>
                                                                <th>Exam Type</th>
                                                                <th>Exam Name</th>
                                                                <th>Subject</th>
                                                                <th>Duration</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                            </thead>

                                                            <tbody>
                                                            <?php foreach ( $purchase->exams as $exam ) : ?>
                                                                <tr>
                                                                    <td><?= get_name_by_id( 'sif_exam_category', $exam->exam_type_id, 'id', 'exam_category_name' ) ?></td>
                                                                    <td><?= get_name_by_id( 'oe_exam', $exam->exam_id, 'id', 'exam_name' ) ?></td>
                                                                    <td><?= get_name_by_id( 'sif_subject', $exam->subject_id, 'id', 'subject' ) ?></td>
                                                                    <td class="text-center"><?= $exam->duration; ?> Min</td>
                                                                    <td class="text-center">
                                                                        <?php
                                                                        $class = 'default';
                                                                        if ( $exam->status == 1 ) {
                                                                            $class = "warning";
                                                                        } elseif ( $exam->status == 0 ) {
                                                                            $class = "danger";
                                                                        } elseif ( $exam->status == 8 ) {
                                                                            $class = "info";
                                                                        } elseif ( $exam->status == 9 ) {
                                                                            $class = "success";
                                                                        } ?>
                                                                        <label class="label label-<?= $class ?>"><?= exam_status( $exam->status ); ?></label>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <?php if ( in_array( $exam->status, [8, 0] ) ): ?>
                                                                            <a href="<?= site_url( "applicant/change-status/{$exam->id}/9" ) ?>" class="btn btn-xs btn-success m-bot5"
                                                                               onclick="return confirm('Are You SURE! You want to make this exam Open for the Applicant. Note: This Action cannot be reverted.')">
                                                                                Make Open
                                                                            </a>
                                                                        <?php endif; ?>
                                                                        <?php if ( $purchase->payment_status == 1 && $exam->status == 1 ): ?>
                                                                            <a href="<?= site_url( "applicant/exam-result/{$exam->id}" ) ?>" class="btn btn-xs btn-primary">View Result</a>
                                                                        <?php endif; ?>
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; ?>
                                                            </tbody>
                                                        </table>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
									<hr>
									<div class="text-center"><?= $links; ?></div>

                                <?php else: ?>
                                    <h3 class="text-warning">Haven't purchased any exam.</h3>
                                <?php endif; ?>
                            </div><!-- Tab -->
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
