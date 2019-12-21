<?php

    $this->load->view('header/view_student_header');

$current_date = date('Y-m-d');
?>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <?php //echo var_dump($record);?>
        <div class="row">
           
             <div class="col-md-12">
                <section class="panel panel-info">
                    <div class="panel-body profile-information">
                        <div class="col-md-2">
                            <div class="profile-pic text-center">
                                <?php if ($record->photo) : ?>
                                      <img src="<?php echo base_url() . $record->photo; ?>">
                                <?php else : ?>
                                    <img
                                        src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image"
                                        alt=""/>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="profile-desk">
                                <h1><?= "$record->doc_name"; ?></h1>
                                
                                <br>
                                <div class="row">
                                    <div class="col-md-8">
                                        <label for="Name" class="control-label col-md-5">Father Name</label>
                                        <div class="col-md-7">
                                            <?= $record->father_name; ?>
                                        </div>
                                        <div class="clearfix"></div>
                                        <label for="Name" class="control-label col-md-5">Mother Name</label>
                                        <div class="col-md-7">
                                            <?= $record->mother_name; ?>
                                        </div>
                                        <div class="clearfix"></div>
                                       
                                        <div class="clearfix"></div>
                                       
                                        <div class="clearfix"></div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="profile-statistics">
                                <h1>Registration NO: <?= $record->reg_no; ?></h1>
                                <p>Phone: <a href="tel:<?= $record->phone; ?>"><?php echo $record->phone; ?></a></p><br>
                                <p>Email: <a href="mailto:<?= $record->email; ?>"><?= $record->email; ?></a></p>

                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <div class="col-lg-12">
                <section class="panel panel-info">
                    <header class="panel-heading">
                        <i class="fa fa-user"></i> Doctor's Profile Details
                        <span class="tools pull-right">

                             </span>
                    </header>
                    <div class="form">
                        <form enctype="multipart/form-data" class="cmxform form-horizontal " id="commentForm"
                              role="form" method="post" action="<?php echo base_url() . 'admission/update'; ?>">

                          
                            <div class="panel-body">
                                <div class="tab-content">
                                    <div id="tab-1" class="tab-pane prf-box active">
                                        <div class="form-group">
                                            <label for="Name" class="control-label col-lg-2">Name</label>
                                            <div class="col-lg-2">
                                                <strong><?php echo $record->doc_name; ?></strong>
                                            </div>
                                            <label for="Name" class="control-label col-lg-2">Father Name</label>
                                            <div class="col-lg-2">
                                                <strong><?php echo $record->father_name; ?></strong>
                                            </div>
                                            <label for="Name" class="control-label col-lg-2">Mother Name</label>
                                            <div class="col-lg-2">
                                                <strong><?php echo $record->mother_name; ?></strong>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label for="Name" class="control-label col-lg-2">Institute</label>
                                            <div class="col-lg-2">
                                                <strong><?php echo $institute_list[$record->institute]; ?></strong>
                                            </div>
                                            <label for="Name" class="control-label col-lg-2">Year</label>
                                            <div class="col-lg-2">
                                                <strong><?php echo $record->year; ?></strong>
                                            </div>
                                            <label for="Name" class="control-label col-lg-2">Session</label>
                                            <div class="col-lg-2">
                                                <strong><?php echo $session_list[$record->session]; ?></strong>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label for="Name" class="control-label col-lg-2">Course</label>
                                            <div class="col-lg-2">
                                                <strong><?php echo get_name_by_id('sif_course',$record->course_code,'course_code','course_name');//echo $course_list[$record->course_code]; ?></strong>
                                            </div>
                                            <label for="Name" class="control-label col-lg-2">Faculty</label>
                                            <div class="col-lg-2">
                                                <strong><?php echo get_faculty_name_by_course_code_faculty_code('sif_faculty',$record->course_code,$record->faculty_code,'faculty_name');//echo $faculty_list[$record->faculty_code]; ?></strong>
                                            </div>
                                            <label for="Name" class="control-label col-lg-2">Batch/Subjec</label>
                                            <div class="col-lg-2">
                                                <strong><?php echo get_batch_name($record->course_code,$record->faculty_code,$record->batch_code);//echo $batch_list_for_profile[$record->batch_code]; ?></strong>
                                            </div>

                                        </div>
                                        <div class="form-group ">

                                            <label for="Name" class="control-label col-lg-2">Subject</label>
                                            <div class="col-lg-2">
                                                <strong><?php echo get_subject_name($record->course_code,$record->faculty_code,$record->subject);//echo $subject_list[$record->subject];?></strong>
                                            </div>
                                            <label for="Name" class="control-label col-lg-2">Service Package</label>
                                            <div class="col-lg-2">
                                                <strong><?php echo get_name_by_auto_id('sif_service_pack',$record->service_pack_id,'ser_pack');//echo $service_package[$record->service_pack_id];?></strong>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                             <label for="Name" class="control-label col-lg-2">Medical College Type</label>
                                            <div class="col-lg-2">
                                                <strong><?php echo $record->collage_type;?></strong>
                                            </div>
                                            <label for="Name" class="control-label col-lg-2">Medical College</label>
                                            <div class="col-lg-4">
                                                <strong><?php echo $collage_list[$record->medical_col]; ?></strong>
                                            </div>
                                           
                                        </div>
                                        <div class="form-group ">
                                            <label for="Name" class="control-label col-lg-2">Blood Group</label>
                                            <div class="col-lg-2">
                                                <strong><?php echo $blood_group[$record->blood_gro]; ?></strong>
                                            </div>
                                            <label for="Name" class="control-label col-lg-2">National ID</label>
                                            <div class="col-lg-2">
                                                <strong><?php echo $record->n_id; ?></strong>
                                            </div>
                                            <label for="Name" class="control-label col-lg-2">Passport no</label>
                                            <div class="col-lg-2">
                                                <strong><?php echo $record->passport; ?></strong>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                        
                                            <label for="Name" class="control-label col-lg-2">Job Description</label>
                                            <div class="col-lg-10">
                                                <strong><?php echo $record->job_des; ?></strong>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label for="Name" class="control-label col-lg-2">Contact</label>
                                            <div class="col-lg-2">
                                                <strong><?php echo $record->phone; ?></strong>
                                            </div>

                                            <label for="Name" class="control-label col-lg-2">Email</label>
                                            <div class="col-lg-2">
                                                <strong><?php echo $record->email; ?></strong>
                                            </div>
                                            <label for="Name" class="control-label col-lg-2">Facebook ID</label>
                                            <div class="col-lg-2">
                                                <strong><?php echo $record->f_id; ?></strong>
                                            </div>
                                        </div>
                                        <div class="form-group ">
                                            <label for="Name" class="control-label col-lg-2">BMDC NO</label>
                                            <div class="col-lg-2">
                                                <strong><?php echo $record->bmdc_no; ?></strong>
                                            </div>
                                            <?php
                                            if($record->rcp_reg_no){
                                            ?>
                                            <label for="Name" class="control-label col-lg-2">RCP Registration No </label>
                                            <div class="col-lg-2">
                                                <strong><?php echo $record->rcp_reg_no; ?></strong>
                                            </div>
                                            <?php
                                            }
                                            ?>
                                            <label for="Name" class="control-label col-lg-2">Institute Roll No(After getting)</label>
                                            <div class="col-lg-2">
                                                <strong><?php 
                                              
                                                    echo $record->ins_roll_no;
                                                    
                                                 ?></strong>
                                            </div>
                                            
                                        </div>
                                        <div class="form-group">
                                            <label for="Name" class="control-label col-lg-2">Contact person/spouse name</label>
                                            <div class="col-lg-2">
                                                <strong><?php echo $record->spouse_name; ?></strong>
                                            </div>

                                            <label for="Name" class="control-label col-lg-2">Contact person/spouse mobile no</label>
                                            <div class="col-lg-2">
                                                <strong><?php echo $record->pouse_mobile; ?></strong>
                                            </div>
                                            
                                        </div>

                                        <div class="form-group ">
                                            <label for="Name" class="control-label col-lg-2">Permanent Address</label>
                                            <div class="col-lg-2">
                                                <strong><?php echo $record->per_address; ?></strong>
                                            </div>
                                            <label for="Name" class="control-label col-lg-2">Division</label>
                                            <div class="col-lg-2">
                                                <strong><?php echo $division_list[$record->per_divi]; ?></strong>
                                            </div>
                                            <label for="Name" class="control-label col-lg-2">District</label>
                                            <div class="col-lg-2">
                                                <strong><?php echo $mai_district_list[$record->per_dist]; ?></strong>
                                            </div>
<!--                                            <label for="Name" class="control-label col-lg-2">Thana</label>
                                              
                                            <div class="col-lg-2">
                                               <strong><?php //echo $mai_upazilla_list[$record->per_thana]; ?></strong>
                                            </div>-->
                                        </div>
                                        <div class="form-group ">
                                            <label for="Name" class="control-label col-lg-2">Thana</label>
                                              
                                            <div class="col-lg-2">
                                               <strong><?php echo $mai_upazilla_list[$record->per_thana]; ?></strong>
                                            </div>
                                            
                                        </div>
                                        <div class="form-group ">
                                            <label for="Name" class="control-label col-lg-2">Mailing Address</label>
                                            <div class="col-lg-2">
                                                <strong><?php echo $record->mai_address; ?></strong>
                                            </div>
                                            <label for="Name" class="control-label col-lg-2">Division</label>
                                            <div class="col-lg-2">
                                                <strong><?php echo $division_list[$record->mai_divi]; ?></strong>
                                            </div>
                                            <label for="Name" class="control-label col-lg-2">District</label>
                                            <div class="col-lg-2">
                                                <strong><?php echo $mai_district_list[$record->mai_dist]; ?></strong>
                                            </div>

                                        </div>
                                        <div class="form-group ">
                                            <label for="Name" class="control-label col-lg-2">Thana</label>
                                              
                                            <div class="col-lg-2">
                                               <strong><?php echo $mai_upazilla_list[$record->mai_thana]; ?></strong>
                                            </div>
                                            
                                        </div>

                                    </div>
                                    <div id="tab-2" class="tab-pane prf-box">
                                        <h3 class="prf-border-head">MAILING ADDRESS</h3>
                                        <div class="form-group ">
                                            <label for="Name" class="control-label col-lg-2">Division</label>
                                            <div class="col-lg-10">
                                                <strong><?php echo $record->mai_divi; ?></strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                    
                </section>
                            
                <section class="panel panel-info">
                <header class="panel-heading">
                        <i class="fa fa-user"></i> Doctor's Education Profile
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
                  <section class="panel panel-info">
                <header class="panel-heading">
                        <i class="fa fa-user"></i> DISCOUNT
                        <span class="tools pull-right"> </span>    
                </header>
                <div class="row">
                        <div class="col-lg-12">
                            <section class="panel">
                                <div class="panel-body">
                                    <div class="form">
                                        
                                        <table class="table table-bordered">
                                            <tr>
                                                <td>Fee Amount</td>
                                                <td><?php echo $record->fee_amount;?></td>
                                                <td colspan="2"></td>
                                            </tr>
                                             <tr>
                                                <td>Discount Amount</td>
                                                <td><?php echo $record->discount_amont;?></td>
                                                <td>Authorized By</td>
                                                <td><?php echo $record->dis_auth_by;?></td>                                             
                                            </tr>
                                            <tr>
                                                <td>Final Amount</td>
                                                <td><?php echo $record->final_amount;?></td>
                                                <td colspan="2"></td>
                                                                                        
                                            </tr>
                                        </table>

                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                    </section>
                
                  <section class="panel panel-info">
                <header class="panel-heading">
                        <i class="fa fa-user"></i> INPORTANT REFERANCE
                        <span class="tools pull-right"> </span>    
                </header>
                <div class="row">
                        <div class="col-lg-12">
                            <section class="panel">
                                <div class="panel-body">
                                    <div class="form">
                                        
                                        <table class="table table-bordered">
                                            <tr>
                                                <td>Name</td>
                                                <td>Designation</td>
                                                <td>Mobile</td>
                                                <td>Relation</td>
                                            </tr>
                                            <?php 
                                            if(!empty($reference)){
                                            foreach($reference as $ref)
                                            {   
                                            ?>
                                            <tr>
                                                <td><?php echo $ref->name;?></td>
                                                <td><?php echo $ref->designation;?></td>
                                                <td><?php echo $ref->mobile;?></td>
                                                <td><?php echo $ref->relation;?></td>                                               
                                            </tr>
                                            <?php
                                            }
                                            }
                                            ?>
                                        </table>

                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                    </section>
                
            </div>
        </div>

        <!-- page end-->
    </section>
</section>
<!--main content end-->
<?php
$this->load->view('footer/view_footer');
?>    