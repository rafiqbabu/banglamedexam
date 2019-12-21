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
                    <header class="panel-heading">
                        Advertisement List
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
                        <div class="text-right m-bot15">
                            <a href="<?= site_url( 'advertisement/create' ) ?>" class="btn btn-success">Create Advertisement</a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th width="20%">Advertisement Title</th>
                                <th>Link</th>
                                <th>SL</th>
                                <th width="20%">Description</th>
                                <th width="15%">Image</th>
                                <th>Created</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if ( $advertisements ) {
                                //$value_all = array();
                                foreach ( $advertisements as $key => $value ) {
                                    $key++;
                                    ?>
                                    <tr>
                                        <td><?= $key; ?></td>
                                        <td><?php echo $value->title; ?></td>
                                        <td><?php echo $value->link; ?></td>
                                        <td class="text-center"><?php echo $value->sl; ?></td>
                                        <td><?php echo $value->desc; ?></td>
                                        <td>
                                            <?php if ( $value->image && file_exists( $value->image ) ): ?>
                                                <a href="<?php echo base_url( $value->image ); ?>" target="_blank">
                                                    <img src="<?php echo base_url( $value->image ); ?>" alt="Advertisement Image" class="img-thumbnail" width="200">
                                                </a>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo user_formated_datetime( $value->created_at ); ?>
                                        </td>
                                        <td class="text-center">
                                            <?php if ( $value->status == 1 ) {
                                                echo "<label class='label label-success'>Active</label>";
                                            } else {
                                                echo "<label class='label label-warning'>Inactive</label>";
                                            } ?>
                                        </td>
                                        <td class="text-center">
                                            <a href="<?php echo site_url( "advertisement/edit/$value->id" ); ?>"
											   class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i> Edit
                                            </a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            } else {
                                echo '<tr><td colspan="9" align="center">No Data Available</td></tr>';
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
