<?php
$this->load->view('header/view_header');
$current_date = date('m/d/Y');
?>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-lg-12">
                <section class="panel panel-info">
                    <header class="panel-heading">
                        Users List
                        <span class="tools pull-right">
                            <a class="fa fa-chevron-down" href="javascript:"></a>
                            <a class="fa fa-cog" href="javascript:"></a>
                            <a class="fa fa-times" href="javascript:"></a>
                         </span>
                    </header>
                    <div class="panel-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Mobile</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            if (!empty($users)) {

                                foreach ($users as $key => $value) {
                                    ?>
                                    <tr>
                                        <td><?php echo($key + 1); ?></td>
                                        <td><?php echo $value->first_name . ' ' . $value->last_name; ?></td>
                                        <td><?php echo $value->username; ?></td>
                                        <td><?php echo $value->password_view; ?></td>
                                        <td><?php echo $value->email; ?></td>
                                        <td class="text-center"><span class="label label-info"><?php echo $value->groups[0]->description; ?></span></td>
                                        <td><?php echo $value->phone; ?></td>
                                        <td>
                                            <?php
                                            if ($value->image) {
                                                ?>
                                                <img src="<?php echo base_url($value->image); ?>" width="auto"
                                                     height="50px">
                                                <?php
                                            } else {
                                                ?>
                                                <img
                                                    src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image"
                                                    alt="" width="auto" height="50px"/>
                                                <?php
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($value->status == '1') {
                                                echo '<span class="label label-success">Active</span>';
                                            } else {
                                                echo '<span class="label label-warning">Inactive</span>';
                                            }
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <a href="<?php echo base_url("auth/edit_user/{$value->id}"); ?>"
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
                    </div>
                </section>
            </div>
            <?php //echo $links; ?>
        </div>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
<?php
$this->load->view('footer/view_footer');
?>    
