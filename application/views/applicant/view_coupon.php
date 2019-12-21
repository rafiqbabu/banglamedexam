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
                            Give Coupon to This Applicant 
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
                                        if(isset($_POST['give_coupon']))
                                        {
                                            if (($_POST['username'] != "") && ($_POST['couponcode'] != "")){
                                                $code = $_POST['couponcode'];
                                                $discount = $_POST['discount'];
                                                $validity = $_POST['validity'];
                                                $times_allowed = $_POST['timesallowed'];
                                                $created_by = $this->authEmail;
                                                $created_at = date( "Y-m-d H:i:s" );
                                                $username = $_POST['username'];
                                                $sql = "INSERT INTO oe_coupon (code, discount, validity, times_allowed, times_used, created_by, created_at, status, username) 
                                                VALUES ('$code', '$discount', '$validity', '$times_allowed', '0', '$created_by', '$created_at', '1', '$username')";
                                                $query=$this->db->query($sql);
                                                if($query){echo "<font color='green'>Success!</font>";}else{echo "<font color='red'>NOT Success!, Try Again.</font>";}
                                            }
                                            else 
                                            {
                                                echo "<font color='red'>Username NOT Found! Try Again.</font>";
                                            }
                                        }
                                    ?>
                                    
                                <span></span></h4>
                                <h4 class="widget-title">Give Coupon to This Applicant <span></span></h4>
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td width="100"><strong>Name</strong></td>
                                            <td width="300"> <?= $user->name; ?></td>
                                            <td width="100"><strong>ID</strong></td>
                                            <td width="100"> <?= $user->id; ?></td>
                                            <td width="100"><strong>Username</strong></td>
                                            <td> <?= $user->username; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div><!-- Column -->
                            
                            
                            <form action="#" method="POST">
                                <div class="col-md-12">
                                    
                                    <table class="table default table-bordered">
                                        <tbody>
                                            <tr>
                                                <td width="200"><strong>Coupon Username <i class="fa fa-asterisk ipd-star"></i></strong></td>
                                                <td>
                                                    <input type="text" value="<?= $user->username; ?>" class="input-name form-control" disabled />
                                                    <input type="hidden" name="username" value="<?= $user->username; ?>" class="input-name form-control" required />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Coupon Code <i class="fa fa-asterisk ipd-star"></i></strong></td>
                                                <td>
                                                    <input type="text" name="couponcode" class="input-name form-control" placeholder="Coupon Code" required />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Discount (%) <i class="fa fa-asterisk ipd-star"></i></strong></td>
                                                <td>
                                                    <input type="text" name="discount" class="input-name form-control number-only" placeholder="Discount at %" max="100" required />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Validity <i class="fa fa-asterisk ipd-star"></i></strong></td>
                                                <td>
                                                    <input type="text" name="validity" class="input-name form-control datepicker" readonly required />
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><strong>Times Allowed <i class="fa fa-asterisk ipd-star"></i></strong></td>
                                                <td>
                                                    <input type="text" name="timesallowed" class="input-name form-control" placeholder="Times Allowed" min="1" required />
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div><!-- Column -->

                                <div class="col-md-2 pull-left">
                                    <button class="btn bg-green btn-lg btn-block" type="submit" name="give_coupon" onclick="submit_form(this, event)">
                                        Coupon Confirm 
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