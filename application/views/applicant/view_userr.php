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
                            Update User 
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                            </span>
                        </header>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <h4 class="widget-title">
                                    <h4 class="widget-title">Update User <span></span></h4>
                                    <?php
                                        if(isset($_POST['update_user']))
                                        {
                                            if ( ($_POST['pass'] != "" ) && ( $_POST['email'] != "" ) && ( $_POST['user_id'] != "" ) )
                                            {
                                                $id     = $_POST['user_id'];
                                                $email  = $_POST['email'];
                                                $pass   = $_POST['pass'];
                                                $password = password_hash( $pass, PASSWORD_BCRYPT );
                                                $first_name   = $_POST['first_name'];
                                                $last_name   = $_POST['last_name'];
                                                $phone   = $_POST['phone'];
                                                $sql = "update sif_users SET username='$email', password='$password', password_view='$pass', email='$email', 
                                                                             first_name='$first_name', last_name='$last_name', phone='$phone' 
                                                                             where id='".$id."'";
                                                $query=$this->db->query($sql);
                                                if($query){
                                                    echo "<font color='green'>Success!</font> <a href='".base_url( 'applicant/user_list' )."'>Back Now</a><br><br>";
                                                    //redirect( base_url( 'applicant/user_list' ) );
                                                    //echo base_url( 'applicant/user_list' );
                                                }
                                                else{
                                                    echo "<font color='red'>NOT Success!, Try Again.</font>";
                                                }
                                            }
                                            else 
                                            {
                                                echo "<font color='red'>Please Fill The Form Correctly.</font>";
                                            }
                                        }
                                    ?>
                                    
                                <span></span></h4>
                                
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td width="200"><strong>Name</strong></td>
                                            <td width="300"> <?= $userr->first_name." ".$userr->last_name; ?></td>
                                            <td width="100"><strong>ID</strong></td>
                                            <td> <?= $userr->id; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div><!-- Column -->
                            
                            
                            <form action="#" method="POST">
                                <div class="col-md-12">
                                    
                                    <table class="table default table-bordered">
                                        <tbody>
                                        
                                        <tr>
                                            <td width="200"><strong>First Name <span class="jnn-important">*</span></strong></td>
                                            <td>
                                                <input type="text" name="first_name" class="input-name form-control" value="<?= $userr->first_name; ?>" required>
                                                <input type="hidden" name="user_id" value="<?= $userr->id; ?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="200"><strong>Last Name </strong></td>
                                            <td>
                                                <input type="text" name="last_name" class="input-name form-control" value="<?= $userr->last_name; ?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="200"><strong>Mobile </strong></td>
                                            <td>
                                                <input type="text" name="phone" class="input-name form-control" value="<?= $userr->phone; ?>">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="200"><strong>Email/Username<span class="jnn-important">*</span></strong></td>
                                            <td>
                                                <input type="email" name="email" class="input-name form-control" value="<?= $userr->email; ?>" required>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="200"><strong>New Password <span class="jnn-important">*</span></strong></td>
                                            <td>
                                                <input type="text" name="pass" class="input-name form-control" minlength="6" value="<?= $userr->password_view; ?>" required>
                                            </td>
                                        </tr>
                                        
                                        </tbody>
                                    </table>
                                </div><!-- Column -->

                                <div class="col-md-2 pull-left">
                                    <button class="btn bg-green btn-lg btn-block" type="submit" name="update_user" onclick="submit_form(this, event)">
                                        Update User
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