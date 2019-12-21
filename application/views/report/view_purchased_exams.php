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
                            Purchased Exam List
                            <span class="tools pull-right">
                            <a class="fa fa-chevron-down" href="javascript:;"></a>
                            <a class="fa fa-cog" href="javascript:;"></a>
                            <a class="fa fa-times" href="javascript:;"></a>
                        </span>
                        </header>
                        <div class="panel-body">
                            <form class="form-inline text-center" role="form" method="get" action="<?php echo current_url(); ?>">
                                <div class="form-group m-bot15">
                                    <div class="input-group">
                                        <input type="text" class="form-control datepicker" name="f" placeholder="yyyy-mm-dd" readonly>
                                        <span class="input-group-addon">To</span>
                                        <input type="text" class="form-control datepicker" name="t" placeholder="yyyy-mm-dd" readonly>
                                    </div>
                                    <?= form_dropdown('s', $pay_status, '', ['class' => 'form-control']); ?>
                                    <?= form_dropdown('ty', $ptype_list, '', ['class' => 'form-control']); ?>
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </form>
                            <?php
                                    $data = '';
                                    $data .= '<b>Searched Result</b><br><br>';
                                    $data .= "
                                        <table>
                                            <tr>
                                                <td width='50'><b>#</b></td>
                                                <td width='120'><b>Reg. No.</b></td>
                                                <td width='230'><b>Doctor Name</b></td>
                                                <td width='140'><b>Package Type</b></td>
                                                <td width='80'><b>Paid</b></td>
                                                <td width='170'><b>Date & Time</b></td>
                                            </tr>
                                        ";
                                    $tt=0;
                                    if (!empty($for_pdf)) {    
                                        foreach ( $for_pdf as $key => $value ) {
                                            $key++; 
                                            $reg_no = get_name_by_auto_id( 'oe_doc_master', $value->doc_id, 'reg_no' );
                                            $doc_name = get_name_by_auto_id( 'oe_doc_master', $value->doc_id, 'name' );
                                            $p_type = get_package_type($value->package_ids,'<br/>');
                                            $pa = $value->amount_paid;
                                            $pd = user_formated_datetime( $value->created_at );
                                            $data .= "
                                                <tr>
                                                    <td>{$key}</td>
                                                    <td>{$reg_no}</td>
                                                    <td>{$doc_name}</td>
                                                    <td>{$p_type}</td>
                                                    <td>{$pa}</td>
                                                    <td>{$pd}</td>
                                                </tr>
                                            ";
                                        $t=$pa;
                                        $tt=$tt+$t;
                                        }
                                    }
                                    $number = $tt;
                                    $taa = number_format($tt);
                                    include 'inword.php';

                                    $data .= "
                                        </table><hr>
                                        Total Paid Amount = {$taa}<br>
                                        In Word : {$p}

                                        "; // data load for show in PDF file
                            ?>
                            <hr>
                            <p>
                                Total Exams: <span class="badge bg-info"><?= $total_rows; ?></span>
                                <form action="<?php echo base_url('report/pdf_g'); ?>" method="POST" target="_blank">
                                    <input type="hidden" name="status" value="<?php echo $data; ?>">
                                    <input type="submit" value="Convert to PDF">
                                </form>
                            </p>
                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Reg No.</th>
                                    <th>Doctor Name</th>
                                    <th>Mobile</th>
                                    <th>Package Name</th>
                                    <th>Package Type</th>
                                    <th>Exam Count</th>
                                    <th>Cost BDT</th>
                                    <th>Cost USD</th>
                                    <th>Currency</th>
                                    <th>Amount Paid</th>
                                    <th>Trans ID</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if ( !empty( $records ) ) {

                                    foreach ( $records as $key => $value ) {
                                        $key++;
                                        ?>
                                        <tr>
                                            <td><?= $key; ?></td>
                                            <td><?php echo get_name_by_auto_id( 'oe_doc_master', $value->doc_id, 'reg_no' ); ?></td>
                                            <td><?php echo get_name_by_auto_id( 'oe_doc_master', $value->doc_id ); ?></td>
                                            <td><?php echo get_name_by_auto_id( 'oe_doc_master', $value->doc_id, 'phone' ); ?></td>
                                            <td><?php echo get_package_names($value->package_ids,'<br/>'); ?></td>
                                            <td><?php echo get_package_type($value->package_ids,'<br/>'); ?></td>
                                            
                                            <td class="text-center"><?php echo $value->exam_count; ?></td>
                                            <td class="text-center"><?php echo $value->cost_bdt; ?></td>
                                            <td class="text-center"><?php echo $value->cost_usd; ?></td>
                                            <td class="text-center"><?php echo $value->currency; ?></td>
                                            <td class="text-center"><?php echo $value->amount_paid; ?></td>
                                            <td class="text-center"><?php echo $value->trans_id; ?></td>
                                            <td class="text-center"><span class="badge"><?php echo user_formated_datetime( $value->created_at ); ?></span></td>
                                            <td class="text-center">
                                                <?php
                                                if ( $value->payment_status == '1' ) {
                                                    echo '<span class="label label-success">Paid</span>';
                                                } else {
                                                    echo '<span class="label label-warning">Unpaid</span>';
                                                }
                                                ?>
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