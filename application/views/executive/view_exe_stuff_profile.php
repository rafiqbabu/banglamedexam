<?php
$this->load->view('header/view_header');
$current_date = date('Y-m-d');
?>

<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <?php
       // var_dump($res);
        ?>
        <div class="row">
            <div class="col-md-12">
                <section class="panel">
                    <div class="panel-body profile-information">
                        <div class="col-md-3">
                            <div class="profile-pic text-center">
                                 <?php if ($res->photo && file_exists($res->photo)) : ?>
                                      <img src="<?php echo base_url() . $res->photo; ?>">
                                <?php else : ?>
                                    <img
                                        src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image"
                                        alt=""/>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="profile-desk">
                                <h1><?= $res->name; ?></h1>
                              
                                <br>
                              

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="profile-statistics">
                                <h1>Mobile</h1>
                                <p><?= $res->mobile; ?></p>
                                <h1>Email</h1>
                                <p><?= $res->email; ?></p>
                            </div>
                             <div>
                                <a href="<?php echo site_url('executive/print_profile/'.$res->id)?>" class="btn btn-warning"><i class="fa fa-print"></i> Print</a>
                                
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-lg-12">
                <section class="panel panel-info">
                    <header class="panel-heading">
                        <i class="fa fa-user"></i> Details Information
                        <span class="tools pull-right"></span>
                    </header>
                    <div class="form">
                        <div class="panel-body">
                            <div class="tab-content">
                                <div id="tab-1" class="tab-pane active">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="prf-box">
                                                <div class="wk-progress pf-status">
                                                    <div class="col-md-2">Name</div>
                                                    <div class="col-md-2">
                                                        <strong><?php echo $res->name; ?></strong></div>
                                                    <div class="col-md-2">Designation</div>
                                                    <div class="col-md-2">
                                                        <strong>
                                                            <?php echo $emp_type[$res->emp_type]; ?>
                                                        </strong>
                                                    </div>
                                                    <div class="col-md-2">Date of Birth</div>
                                                    <div class="col-md-2"><strong><?php echo date('d M, Y', strtotime($res->dob)); ?></strong>
                                                    </div>
                                                </div>
                                                <div class="wk-progress pf-status">
                                                    <div class="col-md-2">Joining Date</div>
                                                    <div class="col-md-2"><strong><?php echo date('d-m-Y',  strtotime($res->joining_date)); ?></strong>
                                                    </div>
                                                    <div class="col-md-2">Father's Name</div>
                                                    <div class="col-md-2"><strong><?php echo $res->fath_name; ?></strong>
                                                    </div>
                                                    <div class="col-md-2">Mother's Name</div>
                                                    <div class="col-md-2">
                                                        <strong>
                                                            <?= $res->mother_name; ?>
                                                        </strong>
                                                    </div>
                                                    
                                                </div>
                                                <div class="wk-progress pf-status">
                                                    <div class="col-md-2">Nationality</div>
                                                    <div class="col-md-2">
                                                        <strong><?php echo $res->nationality; ?></strong></div>
                                                    <div class="col-md-2">Gender</div>
                                                    <div class="col-md-2">
                                                        <strong><?php echo get_gender_name($res->gender); ?></strong>
                                                    </div>
                                                    <div class="col-md-2">Religion</div>
                                                    <div class="col-md-2">
                                                        <strong>
                                                            <?= get_religion_name($res->religion); ?>
                                                        </strong>
                                                    </div>
                                                </div>
                                                <div class="wk-progress pf-status">
                                                    
                                                    <div class="col-md-2">National ID No.</div>
                                                    <div class="col-md-2"><strong><?php echo $res->na_id; ?></strong>
                                                    </div>
                                                    <div class="col-md-2">Passport no</div>
                                                    <div class="col-md-2">
                                                        <strong><?php echo $res->pass_no; ?></strong></div>
                                                </div>
                                                <div class="wk-progress pf-status">
                                                    <div class="col-md-2">Mobile</div>
                                                    <div class="col-md-2">
                                                        <strong><?php echo $res->mobile; ?></strong></div>
                                                    
                                                    <div class="col-md-2">Email</div>
                                                    <div class="col-md-2">
                                                        <strong><?php echo $res->email; ?></strong></div>
                                                </div>
                                                <div class="wk-progress pf-status">
                                                    <div class="col-md-2">Contact person/spouse name</div>
                                                    <div class="col-md-4">
                                                        <strong><?php echo $res->spouse_name; ?></strong></div>
                                                    <div class="col-md-2">Contact person/spouse mobile no</div>
                                                    <div class="col-md-4">
                                                        <strong><?php echo $res->pouse_mobile; ?></strong></div>
                                                </div>
                                                <div class="wk-progress pf-status">
                                                    <div class="col-md-2">Blood Group</div>
                                                    <div class="col-md-4">
                                                        <strong><?php echo $res->blood_gro; ?></strong></div>
                                                    
                                                </div>
                                                <?php
                                                if ($res->per_divi) {
                                                    ?>
                                                    <div class="wk-progress pf-status">
                                                        <div for="Name" class="col-lg-2">Permanent Address</div>
                                                        <div class="col-lg-2">
                                                            <strong><?php echo $res->per_address; ?></strong>
                                                        </div>
                                                        <div for="Name" class="col-lg-2">Division</div>
                                                        <div class="col-lg-2">
                                                            <strong><?php echo $division_list[$res->per_divi]; ?></strong>
                                                        </div>
                                                        <div for="Name" class="col-lg-2">District</div>
                                                        <div class="col-lg-2">
                                                            <strong><?php echo $mai_district_list[$res->per_dist]; ?></strong>
                                                        </div>

                                                    </div>
                                                    <div class="wk-progress pf-status">
                                                        <div for="Name" class="col-lg-2">Thana</div>

                                                        <div class="col-lg-2">
                                                            <strong><?php echo $mai_upazilla_list[$res->per_thana]; ?></strong>
                                                        </div>

                                                    </div>
                                                    <?php
                                                }
                                                ?>
                                                
                                                <?php
                                                if ($res->mai_divi) {
                                                    ?>
                                                    <div class="wk-progress pf-status">
                                                        <div for="Name" class="col-lg-2">Mailing Address</div>
                                                        <div class="col-lg-2">
                                                            <strong><?php echo $res->mai_address; ?></strong>
                                                        </div>
                                                        <div for="Name" class="col-lg-2">Division</div>
                                                        <div class="col-lg-2">
                                                            <strong><?php echo $division_list[$res->mai_divi]; ?></strong>
                                                        </div>
                                                        <div for="Name" class="col-lg-2">District</div>
                                                        <div class="col-lg-2">
                                                            <strong><?php echo $mai_district_list[$res->mai_dist]; ?></strong>
                                                        </div>

                                                    </div>
                                                    <div class="wk-progress pf-status">
                                                        <div for="Name" class="col-lg-2">Thana</div>

                                                        <div class="col-lg-2">
                                                            <strong><?php echo $mai_upazilla_list[$res->mai_thana]; ?></strong>
                                                        </div>

                                                    </div>
                                                    <?php
                                                }
                                                ?>   
                                                                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        </form>
                    </div>
                </section>
                
                <?php
                if($edu_record){
                ?>
                <section class="panel panel-info">
                <header class="panel-heading">
                        <i class="fa fa-user"></i> Executive/Staff Education Profile
                        <span class="tools pull-right"> </span>    
                </header>
                <div class="row">
                        <div class="col-lg-12">
                            <section class="panel">

                                <div class="panel-body">
                                    <div class="form">
                                       
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Name Of Examination</th>
                                                <th>Passing Year</th>
                                                <th>Group</th>
                                                <th>Board</th>

                                                <th>Institute Name </th>
                                                <th>Result(GPA/DIVISION)</th>
                                            </tr>
                                            <?php 
                                                foreach ($edu_record as $edu)
                                                {
                                                 
                                            ?>
                                            <tr>
                                                <td><?php echo $edu->exam_name;?></td>                                     
                                                                                                                                               
                                                <td><?php echo $year_array[$edu->pass_year];?> </td>                                                                                                   
                                                <td><?= isset($group[$edu->exam_group])? $group[$edu->exam_group] : '';?></td>                                                 
                                                <td><?= isset($edu_board[$edu->exam_board]) ? $edu_board[$edu->exam_board]: '';?></td>
                                                <td><?php echo $edu->exam_ins;?></td>                                                                                                 
                                                <td><?php echo $edu->exam_result;?></td>
                                                                                              
                                            </tr>
                                            <?php
                                                }
                                            ?>
                                        </table>

                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                    </section>
                <?php
                }
                ?>
            </div>
        </div>

        <!-- page end-->
    </section>
</section>
<!--main content end-->
<?php
$this->load->view('footer/view_footer');
?>    