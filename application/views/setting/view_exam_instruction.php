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
                        Exam Instruction
                        <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:"></a>
                                <a class="fa fa-cog" href="javascript:"></a>
                                <a class="fa fa-times" href="javascript:"></a>
                             </span>
                    </header>
                    <div class="panel-body">

                        <div class="m-bot15 text-right">
                            <a href="<?= site_url( "setting/exam_instruction_create" ) ?>" class="btn btn-info">Add Exam Instruction</a>
                        </div>

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
                                <th>Instruction</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if ( !empty( $record ) ) {

                                foreach ( $record as $key => $value ) {
                                    $key++;
                                    ?>
                                    <tr>
                                        <td><?= $key; ?></td>
                                        <td><?php echo base64_decode( $value->instruction, TRUE ); ?></td>
                                        <td class="text-center">
                                            <?php
                                            if ( $value->status == '1' ) {
                                                echo '<span class="label label-success">Active</span>';
                                            } else {
                                                echo '<span class="label label-warning">Inactive</span>';
                                            }
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <a href="<?php echo site_url( "setting/exam_instruction_edit/{$value->id}" ); ?>" class="btn btn-warning btn-xs" title="Edit" data-toggle="tooltip"
											   data-placement="top"><i class="glyphicon glyphicon-edit"></i> Edit</a>
                                            <!--                                                <a href="#"><i class="fa fa-times"></i></a>-->
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                echo '<tr><td colspan="7" align="center">No Data Available</td></tr>';
                            }
                            ?>
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

