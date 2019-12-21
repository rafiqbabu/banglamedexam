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
                            Set User Role 
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                            </span>
                        </header>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <h4 class="widget-title">
                                    <h4 class="widget-title">Set User Role<span></span></h4>
                                    <?php
                                        if(isset($_POST['set_role']))
                                        {
                                            if ( $_POST['user_id'] != "" )
                                            {
                                                $id  = $_POST['user_id'];
                                                $m1  = $_POST['m1']; $m2  = $_POST['m2']; $m3  = $_POST['m3']; $m4  = $_POST['m4']; $m5  = $_POST['m5'];
                                                $m6  = $_POST['m6']; $m7  = $_POST['m7']; $m8  = $_POST['m8']; $m9  = $_POST['m9']; $m10  = $_POST['m10'];
                                                $m11  = $_POST['m11']; $m12  = $_POST['m12']; $m13  = $_POST['m13']; $m14  = $_POST['m14'];

                                                $sql = "update user_role SET m1='$m1', m2='$m2', m3='$m3', m4='$m4', m5='$m5', m6='$m6', m7='$m7', m8='$m8',
                                                                             m9='$m9', m10='$m10', m11='$m11', m12='$m12', m13='$m13', m14='$m14' 
                                                                             where user_id='".$id."'";
                                                $query=$this->db->query($sql);
                                                if($query){
                                                    echo "<font color='green'>Success!</font> <a href='".base_url( 'applicant/user_list' )."'>Go Back Now</a><br><br>";
                                                    //redirect( base_url( 'applicant/user_list' ) );
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
                                            <td width="300"> 
                                                <?= get_name_by_auto_id( 'sif_users', $user_role->user_id, 'first_name' ) ?> 
                                                <?= get_name_by_auto_id( 'sif_users', $user_role->user_id, 'last_name' ) ?>
                                            </td>
                                            <td width="100"><strong>Email/Username</strong></td>
                                            <td><?= get_name_by_auto_id( 'sif_users', $user_role->user_id, 'username' ) ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div><!-- Column -->
                            
                            
                            <form action="#" method="POST">
                                <div class="col-md-12">
                                    
                                    <table class="table default table-bordered">
                                        <tbody>
                                        
                                        <tr>
                                            <td width="200">
                                                <strong>Set User Role <span class="jnn-important">*</span></strong>
                                                <input type="hidden" name="user_id" value="<?= $user_role->user_id; ?>">
                                            </td>
                                            <td>
                                                <?php 
                                                    if ($user_role->m1 == 1) {
                                                    echo "Exam Question || <input type='radio' name='m1' value='1' checked> Yes <input type='radio' name='m1' value='0'> No";
                                                    } else {
                                                    echo "Exam Question || <input type='radio' name='m1' value='1'> Yes <input type='radio' name='m1' value='0' checked> No";
                                                    }
                                                echo "<br><br>";
                                                    if ($user_role->m2 == 1) {
                                                    echo "Exam || <input type='radio' name='m2' value='1' checked> Yes <input type='radio' name='m2' value='0'> No";
                                                    } else {
                                                    echo "Exam || <input type='radio' name='m2' value='1'> Yes <input type='radio' name='m2' value='0' checked> No";
                                                    }
                                                echo "<br><br>";
                                                    if ($user_role->m3 == 1) {
                                                    echo "Package || <input type='radio' name='m3' value='1' checked> Yes <input type='radio' name='m3' value='0'> No";
                                                    } else {
                                                    echo "Package || <input type='radio' name='m3' value='1'> Yes <input type='radio' name='m3' value='0' checked> No";
                                                    }
                                                echo "<br><br>";
                                                    if ($user_role->m4 == 1) {
                                                    echo "Notice || <input type='radio' name='m4' value='1' checked> Yes <input type='radio' name='m4' value='0'> No";
                                                    } else {
                                                    echo "Notice || <input type='radio' name='m4' value='1'> Yes <input type='radio' name='m4' value='0' checked> No";
                                                    }
                                                echo "<br><br>";
                                                    if ($user_role->m5 == 1) {
                                                    echo "Applicant || <input type='radio' name='m5' value='1' checked> Yes <input type='radio' name='m5' value='0'> No";
                                                    } else {
                                                    echo "Applicant || <input type='radio' name='m5' value='1'> Yes <input type='radio' name='m5' value='0' checked> No";
                                                    }
                                                echo "<br><br>";
                                                    if ($user_role->m6 == 1) {
                                                    echo "Report || <input type='radio' name='m6' value='1' checked> Yes <input type='radio' name='m6' value='0'> No";
                                                    } else {
                                                    echo "Report || <input type='radio' name='m6' value='1'> Yes <input type='radio' name='m6' value='0' checked> No";
                                                    }
                                                echo "<br><br>";
                                                    if ($user_role->m7 == 1) {
                                                    echo "Page || <input type='radio' name='m7' value='1' checked> Yes <input type='radio' name='m7' value='0'> No";
                                                    } else {
                                                    echo "Page || <input type='radio' name='m7' value='1'> Yes <input type='radio' name='m7' value='0' checked> No";
                                                    }
                                                echo "<br><br>";
                                                    if ($user_role->m8 == 1) {
                                                    echo "Teacher || <input type='radio' name='m8' value='1' checked> Yes <input type='radio' name='m8' value='0'> No";
                                                    } else {
                                                    echo "Teacher || <input type='radio' name='m8' value='1'> Yes <input type='radio' name='m8' value='0' checked> No";
                                                    }
                                                echo "<br><br>";
                                                    if ($user_role->m9 == 1) {
                                                    echo "Executive & Support Staff || <input type='radio' name='m9' value='1' checked> Yes <input type='radio' name='m9' value='0'> No";
                                                    } else {
                                                    echo "Executive & Support Staff || <input type='radio' name='m9' value='1'> Yes <input type='radio' name='m9' value='0' checked> No";
                                                    }
                                                echo "<br><br>";
                                                    if ($user_role->m10 == 1) {
                                                    echo "Coupon || <input type='radio' name='m10' value='1' checked> Yes <input type='radio' name='m10' value='0'> No";
                                                    } else {
                                                    echo "Coupon || <input type='radio' name='m10' value='1'> Yes <input type='radio' name='m10' value='0' checked> No";
                                                    }
                                                echo "<br><br>";
                                                    if ($user_role->m11 == 1) {
                                                    echo "Slider || <input type='radio' name='m11' value='1' checked> Yes <input type='radio' name='m11' value='0'> No";
                                                    } else {
                                                    echo "Slider || <input type='radio' name='m11' value='1'> Yes <input type='radio' name='m11' value='0' checked> No";
                                                    }
                                                echo "<br><br>";
                                                    if ($user_role->m12 == 1) {
                                                    echo "Advertisement || <input type='radio' name='m12' value='1' checked> Yes <input type='radio' name='m12' value='0'> No";
                                                    } else {
                                                    echo "Advertisement || <input type='radio' name='m12' value='1'> Yes <input type='radio' name='m12' value='0' checked> No";
                                                    }
                                                echo "<br><br>";
                                                    if ($user_role->m13 == 1) {
                                                    echo "Offer Email || <input type='radio' name='m13' value='1' checked> Yes <input type='radio' name='m13' value='0'> No";
                                                    } else {
                                                    echo "Offer Email || <input type='radio' name='m13' value='1'> Yes <input type='radio' name='m13' value='0' checked> No";
                                                    }
                                                echo "<br><br>";
                                                    if ($user_role->m14 == 1) {
                                                    echo "Setting || <input type='radio' name='m14' value='1' checked> Yes <input type='radio' name='m14' value='0'> No";
                                                    } else {
                                                    echo "Setting || <input type='radio' name='m14' value='1'> Yes <input type='radio' name='m14' value='0' checked> No";
                                                    }
                                                ?>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div><!-- Column -->

                                <div class="col-md-2 pull-left">
                                    <button class="btn bg-green btn-lg btn-block" type="submit" name="set_role" onclick="submit_form(this, event)">
                                        Confirm Role
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