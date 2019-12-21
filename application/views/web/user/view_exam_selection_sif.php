<?php $this->load->view( 'web/header/view_header' ); ?>
<!-- Header Begins -->
<?php //$this->load->view( 'web/header/header_top' ); ?>
<!-- Page Main -->
<div role="main" class="main">
    <div class="page-default bg-grey team-single">
        <!-- Container -->
        <div class="container">
            <div class="row">
                <!-- Sidebar -->
                <?php //$this->load->view( 'web/elements/view_sidebar' ); ?>

                <!-- Page Content -->
                <div class="col-md-12">
                    <div class="widget profile-widget">
                        <?php echo $msg; ?>
                        <div class="row p-bot-20">
                            <!-- Column -->
                            <?= form_open( current_url(), 'class="edit-profile" method="get"' ); ?>
                            <div class="col-md-12  margin-top">
                                <h4 class="widget-title">Exam Search for SIF <span></span></h4>
                                <table class="table default table-bordered">
                                    <thead>
                                    <tr>
                                        <td width="20%">Institute <span class="jnn-important">*</span></td>
                                        <td width="20%">Course <span class="jnn-important">*</span></td>
                                        <td width="20%">Faculty <span class="jnn-important">*</span></td>
                                        <td width="20%">Subject <span class="jnn-important">*</span></td>
                                        <td width="20%">Candidate Type<span class="jnn-important">*</span></td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <?php
                                            $extra = array(
                                                'class'    => 'form-control',
                                                'required' => 'true',
                                                'onchange' => "AjaxChange(this, '" . site_url( 'AjaxController/get_course_by_inst' ) . "', '.course')"
                                            );
                                            ?>
                                            <?= form_dropdown( 'i', $institutes, $subject ? $subject->institute_id : NULL, $extra ); ?>
                                        </td>
                                        <td>
                                            <?php
                                            $extra = array(
                                                'class'    => 'form-control course',
                                                'required' => 'true',
                                                'onchange' => "AjaxChange(this, '" . site_url( 'AjaxController/get_faculty_by_course' ) . "', '.faculty')"
                                            );
                                            ?>
                                            <?= form_dropdown( 'c', $courses, $subject ? $subject->course_id : NULL, $extra ); ?>
                                        </td>
                                        <td>
                                            <?php
                                            $extra = array(
                                                'class'    => 'form-control faculty',
                                                'required' => 'true',
                                                'onchange' => "AjaxChange(this, '" . site_url( 'AjaxController/get_subject_by_faculty' ) . "', '.subject')"
                                            );
                                            ?>
                                            <?= form_dropdown( 'f', $faculties, $subject ? $subject->faculty_id : NULL, $extra ); ?>
                                        </td>
                                        <td>
                                            <?php
                                            $extra = array(
                                                'class'    => 'form-control subject',
                                                'required' => 'true'
                                            );
                                            ?>
                                            <?= form_dropdown( 's_sif', $subjects, $subject ? $subject->id : NULL, $extra ); ?>
                                        </td>
                                        <td>
                                            <select name="candidate" class="form-control" required>
                                                <option value="" selected disabled>Choose</option>
                                                <option value="1">Gov't</option>
                                                <option value="2">Private</option>
                                                <option value="3">BSMMU</option>
                                            </select>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div><!-- Column -->

                            <div class="col-md-4 pull-right">
                                <!-- Button -->
                                <button class="btn bg-green btn-lg btn-block" type="submit">
                                    Search
                                </button>
                            </div>
    
                            <?= form_close(); ?>
                        </div>
                        
                        <!--
                        <?php if (isset($_GET['i'])){echo "I = ".$_GET['i']."<br>";} ?>
                        <?php if (isset($_GET['c'])){echo "C = ".$_GET['c']."<br>";} ?>
                        <?php if (isset($_GET['f'])){echo "F = ".$_GET['f']."<br>";} ?>
                        <?php if (isset($_GET['s_sif'])){echo "S = ".$_GET['s_sif']."<br>";} ?>
                        <?php if (isset($_GET['candidate'])){echo "Candidate = ".$_GET['candidate']."<br>";} ?>
                        <?php if (isset($_GET['candidate'])) {echo "Exam Common Code = ".$_SESSION['exam_comm_code']."<br><br>";} ?>
                        -->
                        
                        <?php
                            $d_t = date("Y-m-d")." ".date("H:i:s");
                            
                            $id = $this->session->userdata( 'user' )->id;
                            $reg_no = $this->session->userdata( 'user' )->reg_no;
                            
                            $sql = "SELECT * FROM sif_userinfo WHERE doc_id = '$id' AND reg_no = '$reg_no' ";
                            $query = $this->db->query($sql);
                            if (empty($query->num_rows())) {
                                    $sql = "INSERT INTO sif_userinfo (doc_id, reg_no, institute_id, course_id, faculty_id, subject_id, status, candidate, d_t) 
                                            VALUES ('$id', '$reg_no', '$_GET[i]', '$_GET[c]', '$_GET[f]', '$_GET[s_sif]', '1', '$_GET[candidate]', '$d_t');";
                                    $query=$this->db->query($sql);    
                            }
                            
                        ?>
                        
                        
                        <?php
                            if (!empty($_GET['i'])){
                                $sql = "SELECT * FROM oe_exam WHERE is_sif = '1' AND institute_id = '$_GET[i]' AND course_id = '$_GET[c]' AND faculty_id = '$_GET[f]' AND subject_id = '$_GET[s_sif]' AND status = '1' ";
                                //$sql = "SELECT * FROM oe_exam WHERE is_sif = '1' AND institute_id = '$_GET[i]' AND course_id = '$_GET[c]' AND faculty_id = '$_GET[f]' AND exam_comm_code = '$_SESSION[exam_comm_code]' AND status = '1' ";
                                $query = $this->db->query($sql);
                                if ($query->num_rows() > 0) {
                                    foreach ($query->result() as $row) {
                                        $examid = $row->id;
                                        $sql2 = "SELECT * FROM oe_doc_exams WHERE status = '1' AND exam_id = '$examid' AND doc_id = '$id' GROUP BY exam_id ";
                                        $query2 = $this->db->query($sql2);
                                            if ($query2->num_rows() > 0) {
                                                foreach ($query2->result() as $row2) {
                                                    echo "<h5 style='padding:10px; background-color:#57c500; border:2px Orange solid;'> <b>&raquo; ".$row->exam_name."</b></h5>";
                                                    //echo $msg2 = "This exam is completed by you! ";
                                                }
                                            }
                                            else {
                                                echo "<a href='".site_url( "sif-exam/{$row->id}/{$_GET['candidate']}" )."'><h5 style='padding:10px; background-color:#57c500; border:2px Orange solid;'> <b>&raquo; ".$row->exam_name."</b></h5></a>";
                                            }
                                    }
                                }
                                else {
                                    echo "<font color='Red'>Exam NOT Found !<br>Please Search Again.</font>";
                                }
                               // if ($row2->id!=""){echo "This exam is completed by you! ";}
                            }
                            else {
                                echo "<font color='Red'>Please Search First</font>";
                            }
                        ?>

                        <br><br><br>

                        <!-- Packages --
                        <?php if ( $packages && $subject ): ?>
                            <div class="row">
                                <?= form_open( "user/$id/save-package", 'class="edit-profile "' ); ?>
                                <?= form_hidden( 'institute_id', $subject->institute_id ); ?>
                                <?= form_hidden( 'course_id', $subject->course_id ); ?>
                                <?= form_hidden( 'faculty_id', $subject->faculty_id ); ?>
                                <?= form_hidden( 'subject_id', $subject->id ); ?>
                                <div class="col-md-12">
                                    <h5 class="widget-title">Packages <span></span></h5>
                                    <div class="packages"></div>
                                    <table class="table default">
                                        <thead>
                                        <tr>
                                            <th width="5%" class="text-center">#</th>
                                            <th width="20%">Name</th>
                                            <th width="10%">Type</th>
                                            <th width="15%">Description</th>
                                            <th width="25%">Available</th>
                                            <th colspan="2" width="25%">Cost (TK & USD)</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        foreach ( $packages as $i => $package ) {
                                            ?>
                                            <tr>
                                                <td class="text-center">
                                                    <?= form_checkbox( "package[$i]", $package->id, FALSE, 'class="package-enable" id="package' . $i . '"' ); ?>
                                                </td>
                                                <td>
                                                    <?= form_label( $package->name, "package{$i}" ); ?>
                                                    <?php echo "<input name='p_type' type='hidden' value='{$package->id}'>"; ?>
                                                    
                                                </td>
                                                <td><?php echo get_name_by_auto_id( 'oe_package_type', $package->type ); ?></td>
                                                <td>
                                                    
                                                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal_<?= $i; ?>">
                                                        Show Description
                                                    </button>

                                                    
                                                    <div class="modal fade" id="myModal_<?= $i; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                    <h4 class="modal-title" id="myModalLabel"><?= $package->name; ?></h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <?php echo base64_decode( $package->desc, TRUE ); ?>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-sm bg-red" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    
                                                    
                                                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModalr_<?= $i; ?>">
                                                        Show Routine
                                                    </button>

                                                    
                                                    <div class="modal fade" id="myModalr_<?= $i; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                                    <h4 class="modal-title" id="myModalLabel"><?= $package->name; ?></h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <?php 
                                                                        if ($package->routine_url != "") {
                                                                            echo "<a href='{$package->routine_url}' target='_blank'>Click Here to View Routine</a>"; 
                                                                            //echo "<img src='{$package->routine_url}' width='800'>";
                                                                        } else {
                                                                            echo "There is no Routine! Please Contact with Admin.";
                                                                        }
                                                                    ?>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-sm bg-red" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>



                                                </td>
                                                <td class="text-center"><?php echo user_formated_date( $package->start_date ) . " - " . user_formated_date( $package->end_date ); ?></td>
                                                <td class="text-right">৳ <span class="package-bdt"><?php echo $package->amount_bdt; ?></span></td>
                                                <td class="text-right">$ <span class="package-usd"><?php echo $package->amount_usd; ?></span></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td colspan="5" class="text-right t-blue"><label for="package-coupon-code">Coupon</label></td>
                                            <td class="t-blue" colspan="2">
                                                <?= form_input( 'coupon_code', '', ['class' => 'form-control input-sm', 'id' => 'package-coupon-code', 'data-url' => site_url( 'get-coupon-discount' )] ); ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="5" class="text-right t-orange">Sub Total =</td>
                                            <td class="text-right package-total-bdt t-orange">৳ <span>0.00</span></td>
                                            <td class="text-right package-total-usd t-orange">$ <span>0.00</span></td>
                                        </tr>
                                        <tr>
                                            <td colspan="5" class="text-right t-orange">Discount =</td>
                                            <td class="text-right package-dis-bdt t-orange">৳ <span>0.00</span></td>
                                            <td class="text-right package-dis-usd t-orange">$ <span>0.00</span></td>
                                        </tr>
                                        <tr>
                                            <td colspan="5" class="text-right t-orange">Total Payable =</td>
                                            <td class="text-right package-cost-bdt t-orange">৳ <span>0.00</span></td>
                                            <td class="text-right package-cost-usd t-orange">$ <span>0.00</span></td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="col-md-4 pull-right">
                                    
                                    <button class="btn bg-green btn-block" type="submit" onclick="submit_form(this, event)">
                                        Purchase Package
                                    </button>
                                </div>
            
                                <?= form_close(); ?>
                            </div>
                        <?php endif; ?>
                        -->
                        


                        <!--
                        <?php if ( $exam_type ) : ?>
                            <div class="row">
                                <?= form_open( "user/$id/save-exam", 'class="edit-profile "' ); ?>
                                <?= form_hidden( 'institute_id', $subject->institute_id ); ?>
                                <?= form_hidden( 'course_id', $subject->course_id ); ?>
                                <?= form_hidden( 'faculty_id', $subject->faculty_id ); ?>
                                <?= form_hidden( 'subject_id', $subject->id ); ?>
                                <div class="col-md-12">
                                    <h4 class="widget-title"><?= $page_title; ?> <span></span></h4>
                                    <div class="jnn-exam"></div>
                                    <table class="table default">
                                        <thead>
                                        <tr>
                                            <th class="text-center" width="5%">#</th>
                                            <th width="20%">Exam Type</th>
                                            <th width="13%">Available Exams</th>
                                            <th colspan="2" class="text-center" width="25%">Cost / Exam (TK & USD)</th>
                                            <th width="12%">Get Exam</th>
                                            <th colspan="2" class="text-center" width="25%">Cost (TK & USD)</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ( $exam_type as $i => $item ) : ?>
                                            <tr>
                                                <td class="text-center">
                                                    <?= form_checkbox( "exam[$i][id]", $item->id, FALSE, 'class="exam-enable" id="exam' . $i . '"' ); ?>
                                                </td>
                                                <td><?= form_label( $item->type, "exam{$i}" ); ?></td>
                                                <td class="text-center"><?= $item->exam_count; ?></td>
                                                <td class="text-center bdt">৳ <span><?= $item->bdt; ?></span></td>
                                                <td class="text-center usd">$ <span><?= $item->usd; ?></span></td>
                                                <td class="text-center">
                                                    <?php
                                                    $extra = [
                                                        'class'    => 'form-control exam-select',
                                                        'onchange' => "CalculateExamCost(this)",
                                                        'disabled' => 'disabled'
                                                    ];
                                                    ?>
                                                    <?= form_dropdown( "exam[$i][count]", get_exam_count_dropdown( $item->available_exam_count ), NULL, $extra ); ?>
                                                </td>
                                                <td class="text-right rt-bdt">৳ <span>0.00</span></td>
                                                <td class="text-right rt-usd">$ <span>0.00</span></td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td colspan="5" class="text-right t-blue"><label for="coupon-code">Coupon</label></td>
                                            <td class="t-blue" colspan="3">
                                                <?= form_input( 'coupon_code', '', ['class' => 'form-control input-sm', 'id' => 'coupon-code', 'data-url' => site_url( 'get-coupon-discount' )] ); ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="5" class="text-right t-orange">Sub Total =</td>
                                            <td class="text-center total-exam t-orange">0</td>
                                            <td class="text-right total-bdt t-orange">৳ <span>0.00</span></td>
                                            <td class="text-right total-usd t-orange">$ <span>0.00</span></td>
                                        </tr>
                                        <tr>
                                            <td colspan="6" class="text-right t-orange">Discount =</td>
                                            <td class="text-right dis-bdt t-orange">৳ <span>0.00</span></td>
                                            <td class="text-right dis-usd t-orange">$ <span>0.00</span></td>
                                        </tr>
                                        <tr>
                                            <td colspan="6" class="text-right t-orange">Total Payable =</td>
                                            <td class="text-right cost-bdt t-orange">৳ <span>0.00</span></td>
                                            <td class="text-right cost-usd t-orange">$ <span>0.00</span></td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>

                                <div class="col-md-4 pull-right">
                                    
                                    <button class="btn bg-green btn-block" type="submit" onclick="submit_form(this, event)">
                                        Purchase Exam
                                    </button>
                                </div>
    
                                <?= form_close(); ?>
                            </div>
                        <?php endif; ?>
                        -->


                    </div>
                </div><!-- Column -->
            </div><!-- Row -->
        </div><!-- Container -->
    </div><!-- Page Default -->
</div><!-- Page Main -->

<!-- Footer -->
<?php $this->load->view( 'web/footer/footer' ); ?>
<!-- Footer -->
