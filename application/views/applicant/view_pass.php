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
                            Update Applicant Password 
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                            </span>
                        </header>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <h4 class="widget-title">
                                    
                                    <?php
                                        if(isset($_POST['change_password']))
                                        {
                                            if (($_POST['pass1']==$_POST['pass2']) && ($_POST['pass1'] != ""))
                                            {
                                                $id = $_POST['applicant_id'];
                                                $pass = $_POST['pass1'];
                                                $password = password_hash( $pass, PASSWORD_BCRYPT );
                                                
                                                $sql = "update oe_doc_master SET password='$password', pass_view='$pass' where id='".$id."'";
                                                $query=$this->db->query($sql);

                                                if($query){
                                                    echo "<font color='green'>Success!</font>";
                                                }
                                                else {
                                                    echo "<font color='red'>NOT Success!, Try Again.</font>";
                                                }
                                            }
                                            else 
                                            {
                                                echo "<font color='red'>Password Not Matched! Try Again.</font>";
                                            }
                                        }
                                    ?>
                                    
                                <span></span></h4>
                                <h4 class="widget-title">Update Password of -<span></span></h4>
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td width="100"><strong>Name</strong></td>
                                            <td> <?= $user->name; ?></td>
                                            <td width="100"><strong>ID</strong></td>
                                            <td> <?= $user->id; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div><!-- Column -->


                            <form action="#" method="POST">
                                <div class="col-md-12">
                                    
                                    <table class="table default table-bordered">
                                        <tbody>
                                        
                                        <tr>
                                            <td width="200"><strong>New Password <span class="jnn-important">*</span></strong></td>
                                            <td>
                                                <input type="text" name="pass1" class="input-name form-control" placeholder="New Password" minlength="6" required="required" />
                                                <input type="hidden" name="applicant_id" value="<?= $user->id; ?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>Confirm Password <span class="jnn-important">*</span></strong></td>
                                            <td>
                                                <input type="text" name="pass2" class="input-name form-control" placeholder="Confirm Password"/>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div><!-- Column -->

                                <div class="col-md-2 pull-left">
                                    <button class="btn bg-green btn-lg btn-block" type="submit" name="change_password" onclick="submit_form(this, event)">
                                        Change Password
                                    </button>
                                </div>
                            </form>

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