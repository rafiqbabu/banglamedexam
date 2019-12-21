<?php
$this->load->view('header/view_header');
$current_date = date('Y-m-d');
?>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <?php //echo print_r($res);exit;?>
        <div class="row">
            <div class="col-lg-12">
                <?php
                if (validation_errors()) {
                    echo validation_errors('<div class="alert alert-block alert-danger fade in"><button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button>', '</div>');
                }

                if ($this->session->flashdata('flashOK')) {
                    echo "<div class=\"alert alert-success fade in\"><button data-dismiss=\"alert\" class=\"close close-sm\" type=\"button\"><i class=\"fa fa-times\"></i></button>";
                    echo $this->session->flashdata('flashOK');
                    echo "</div>";
                }
                if ($this->session->flashdata('flashError')) {
                    echo "<div class=\"alert alert-block alert-danger fade in\"><button data-dismiss=\"alert\" class=\"close close-sm\" type=\"button\"><i class=\"fa fa-times\"></i></button>";
                    echo $this->session->flashdata('flashError');
                    echo "</div>";
                }

                if ($form_action == "add") {
                        $action_url = base_url() . 'teacher/save';
                        $btnval = 'SAVE';
                    } elseif ($form_action == "edit") {
                        $action_url = base_url() . 'teacher/update_teacher_info';
                        $btnval = 'UPDATE';
                    }
                ?>
                
                <form class="cmxform form-horizontal " id="commentForm" role="form" method="post"
                      action="<?php echo $action_url; ?>" enctype="multipart/form-data">
                    <input type="hidden" name="auto_id" value="<?php echo isset($res->id)?$res->id:'';?>">
                    <section class="panel panel-info">
                        <header class="panel-heading">
                            Add Teacher Form
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:"></a>
                                <a class="fa fa-cog" href="javascript:"></a>
                                <a class="fa fa-times" href="javascript:"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <div class="form-group ">
                                    <label for="Name" class="control-label col-lg-2">Teacher Name <i
                                            class="fa fa-asterisk ipd-star"></i></label>
                                    <div class="col-lg-2">
                                        <input class=" form-control" id="teacher_name" name="tec_name" type="text" value="<?php echo isset($res)?$res->tec_name:''?>" required/>
                                    </div>

                                    <label for="Name" class="control-label col-lg-2">Father's Name <i
                                            class="fa fa-asterisk ipd-star"></i></label>
                                    <div class="col-lg-2">
                                        <input class=" form-control" id="f_name" name="fath_name" type="text" value="<?php echo isset($res)?$res->fath_name:'';?>" required/>
                                    </div>
                                    <label for="Name" class="control-label col-lg-2">Mother's Name <i
                                            class="fa fa-asterisk ipd-star"></i></label>
                                    <div class="col-lg-2">
                                        <input class=" form-control" id="m_name" name="mother_name" type="text" value="<?php echo isset($res)?$res->mother_name:'';?>"
                                               required/>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for="Name" class="control-label col-lg-2">Date of Birth <i
                                            class="fa fa-asterisk ipd-star"></i></label>
                                    <div class="col-lg-2">
                                        <div data-date-viewmode="years" data-date-format="yyyy--mm--dd"
                                             data-date="2015-03-07" class="input-append date dpYears">
                                            <input type="text" name="dob" readonly=""
                                                   value="<?php echo isset($res)?$res->dob:$current_date; ?>" size="16" class="form-control">
                                            <span class="input-group-btn add-on">
                                                    <button class="btn btn-primary" type="button"><i
                                                            class="fa fa-calendar"></i></button>
                                                </span>
                                        </div>
                                    </div>
                                    <label for="Name" class="control-label col-lg-2">Joining Date <i
                                            class="fa fa-asterisk ipd-star"></i></label>
                                    <div class="col-lg-2">
                                        <div data-date-viewmode="years" data-date-format="yyyy--mm--dd"
                                             data-date="2015-03-07" class="input-append date dpYears">
                                            <input type="text" name="joining_date" readonly=""
                                                   value="<?php echo isset($res)?$res->joining_date:$current_date; ?>" size="16" class="form-control" required>
                                            <span class="input-group-btn add-on">
                                                    <button class="btn btn-primary" type="button"><i
                                                            class="fa fa-calendar"></i></button>
                                                </span>
                                        </div>
                                    </div>
                                </div>    
                                    <div class="form-group">   
                                    <label for="Name" class="control-label col-lg-2">Gender</label>
                                    <div class="col-lg-2">
                                        <?php
                                        $ddp = 'class="form-control m-bot15"';
                                        echo form_dropdown('gender', $sex_array,isset($res)?$res->gender:'', $ddp);
                                        ?>
                                    </div>
                                    <label for="Name" class="control-label col-lg-2">Religion</label>
                                    <div class="col-lg-2">
                                        <?php
                                        $ddp = 'class="form-control m-bot15"';
                                        echo form_dropdown('religion', $religion_array,isset($res)?$res->religion:'', $ddp);
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="Name" class="control-label col-lg-2">Nationality</label>
                                    <div class="col-lg-2">
                                        <input class=" form-control" id="nationality" name="nationality" type="text" value="<?php echo isset($res)?$res->nationality : ''?>"/>
                                    </div>
                                    <label for="Name" class="control-label col-lg-2">National ID</label>
                                    <div class="col-lg-2">
                                        <input class=" form-control"  name="na_id" type="number" value="<?php echo isset($res)?$res->na_id : ''?>" />
                                    </div>
                                    <label for="Name" class="control-label col-lg-2">Passport No</label>
                                    <div class="col-lg-2">
                                        <input class=" form-control" id="passport_no" name="pass_no" type="text" value="<?php echo isset($res)?$res->pass_no : ''?>"/>
                                    </div>
                                </div>
                                                               
                                <div class="form-group ">
                                    <label for="cell_no" class="control-label col-lg-2">Mobile No <i
                                            class="fa fa-asterisk ipd-star"></i></label>
                                    <div class="col-lg-4">
                                        <div class="input-group">
                                            <span class="input-group-addon">+88</span>
                                            <input type="number" class="form-control" id="cell_no" name="mobile"
                                                   type="text" value="<?php echo isset($res)?$res->mobile : ''?>" required minlength="11" maxlength="11" pattern="\d{11}">
                                        </div>
                                        <i class="text-info">EX: 01700000000</i>
                                    </div>
                                    <label for="Name" class="control-label col-lg-2">Telephone No </label>
                                    <div class="col-lg-4">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                            <input class=" form-control" id="tele_no" name="telephone" type="text" value="<?php echo isset($res)?$res->telephone:''?>"
                                                   />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="Name" class="control-label col-lg-2">Email Address <i
                                            class="fa fa-asterisk ipd-star"></i></label>
                                    <div class="col-lg-4">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-envelope-o"></i></span>

                                            <input class=" form-control" id="email" name="email" type="text" value="<?php echo isset($res)?$res->email:''?>"/>
                                        </div>
                                    </div>
                                    <label for="Name" class="control-label col-lg-2">BMDC Number <i
                                            class="fa fa-asterisk ipd-star"></i></label>
                                <div class="col-lg-4">
                                    <input class=" form-control" id="bmdc_no" name="bmdc_no" type="text" value="<?php echo isset($res)?$res->bmdc_no:'';?>"
                                               required/>
                                </div>
                                </div>
                                <div class="form-group">
                                <label for="Name" class="control-label col-lg-2">Contact person/spouse name </label>
                                <div class="col-lg-4">
                                    <input class=" form-control" id="spouse_name" name="spouse_name" type="text" value="<?php echo isset($res)?$res->spouse_name:''?>"/>
                                </div>
                                <label for="Name" class="control-label col-lg-2">Contact person/spouse mobile no </label>
                                <div class="col-lg-4">
                                    <input class=" form-control" id="pouse_mobile" name="pouse_mobile" type="text" value="<?php echo isset($res)?$res->pouse_mobile:''?>"/>

                                </div> 
                                </div>
                                <div class="form-group">
                                    <label for="Name" class="control-label col-lg-2">Blood Group </label>
                                    <div class="col-lg-4">
                                        <?php
                                        $ddp = 'class="form-control m-bot15" id="blood_gro"';
                                        echo form_dropdown('blood_gro', $blood_group, (isset($res) ? $res->blood_gro : ''), $ddp);
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    
                        <!--permanent address-->
                        <div class="row">
                        <div class="col-lg-12">
                            <section class="panel panel-info">
                                <header class="panel-heading">
                                    Permanent Address
                                    <span class="tools pull-right">
                                        <a class="fa fa-chevron-down" href="javascript:"></a>
                                        <a class="fa fa-cog" href="javascript:"></a>
                                        <a class="fa fa-times" href="javascript:"></a>
                                    </span>
                                </header>
                                <div class="panel-body">
                                    <div class="form">
                                        <!--                                        <header class="panel-heading">
                                                                                   
                                                                                </header>-->
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Division </th>
                                                <th>District </th>
                                                <th> Thana</th>
                                                 <th>Address</th>
                                            </tr>
                                            <tr>
                                                <td>
                                                   <?php
                                                    $url = base_url('admission/get_district_by_division');
                                                    $dropdown_js ="class='form-control m-bot15' id='division_id' onchange=getDistricttByAjax('$url')";
                                                    echo form_dropdown('per_divi', $division_list,isset($res->per_divi)? $res->per_divi : '', $dropdown_js);
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                        $url = base_url('admission/get_thana_by_district');
                                                        $dropdown_js = "class='form-control m-bot15' id='district_id' onchange=getThanaByAjax('$url')";//onchange="getDistricttByAjax();"
                                                        echo form_dropdown('per_dist', $mai_district_list,isset($res->per_dist)? $res->per_dist : '', $dropdown_js);
                                                    ?> 
                                                </td>
                                                <td>
                                                   <?php
                                                    $url = base_url() . 'admission/';
                                                    $dropdown_js = 'class="form-control m-bot15" id="thana_id"';
                                                    echo form_dropdown('per_thana', $mai_upazilla_list,isset($res->per_thana)? $res->per_thana : '', $dropdown_js);
                                                    ?> 
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="per_address" value="<?php echo isset($res->per_address) ? $res->per_address :''?>">
                                                </td>
                                            </tr>
                                                                                                                                   
                                        </table>

                                    </div>
                                </div>
                            </section>
                        </div>
                    </div> 
                    <!--permanent address-->                                        
                    
                    <!--Mailing address-->
                     <div class="row">
                        <div class="col-lg-12">
                            <section class="panel panel-info">
                                <header class="panel-heading">
                                    Mailing Address
                                    <span class="tools pull-right">
                                        <a class="fa fa-chevron-down" href="javascript:"></a>
                                        <a class="fa fa-cog" href="javascript:"></a>
                                        <a class="fa fa-times" href="javascript:"></a>
                                    </span>
                                </header>
                                <div class="panel-body">
                                    <div class="form">
                                        <!--                                        <header class="panel-heading">
                                                                                   
                                                                                </header>-->
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Division </th>
                                                <th>District </th>
                                                <th>Thana</th>
                                                <th>Address</th>
                                                
                                            </tr>
                                            <tr>
                                                <td>
                                                   <?php
                                                    $url = base_url('admission/get_district_by_division2');
                                                    $dropdown_js ="class='form-control m-bot15' id='division_id2' onchange=getDistricttByAjax2('$url')";
                                                    echo form_dropdown('mai_divi', $division_list,isset($res->mai_divi)? $res->mai_divi : '', $dropdown_js);
                                                    ?>
                                                </td>
                                                <td>
                                                   <?php
                                                        $url = base_url('admission/get_thana_by_district2');
                                                        $dropdown_js = "class='form-control m-bot15' id='district_id2' onchange=getThanaByAjax2('$url')";//onchange=getDistricttByAjax()
                                                        echo form_dropdown('mai_dist', $mai_district_list,isset($res->mai_dist) ? $res->mai_dist :'', $dropdown_js);
                                                    ?>
                                                </td>
                                                <td>
                                                   <?php
                                                    $url = base_url() . 'admission/';
                                                    $dropdown_js = 'class="form-control m-bot15" id="thana_id2"';
                                                    echo form_dropdown('mai_thana', $mai_upazilla_list,isset($res->mai_thana)? $res->mai_thana : '', $dropdown_js);
                                                    ?> 
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="mai_address" value="<?php echo isset($res->mai_address) ? $res->mai_address : ''?>">
                                                </td>
                                          
                                            </tr>
                                                                                                                                   
                                        </table>

                                    </div>
                                </div>
                            </section>
                        </div>
                    </div> 
                    <!--Mailing address-->
                    <section class="panel panel-info">
                        <header class="panel-heading">
                            EDUCATIONAL QUALIFICATION
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:"></a>
                                <a class="fa fa-cog" href="javascript:"></a>
                                <a class="fa fa-times" href="javascript:"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <div class="each-row">
                               
                               <table class="table table-bordered">
                                            <tr>
                                                <th>Name Of Examination</th>
                                                <th>Passing Year</th>
                                                <th>Group/Batch/Session</th>
                                                <th>Board</th>

                                                <th>Institute Name </th>
                                                <th>Result(GPA/DIVISION)</th>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <?php
                                                        $ddp = 'class="form-control"';
                                                        echo form_dropdown('exam_name[]', $ssc_exam_array,  isset($edu_record[0]->exam_name)?$edu_record[0]->exam_name:'', $ddp);
                                                    ?>
                                                </td>
                                                <td>
                                                <?php
                                                $ddp = 'class="form-control"';
                                                echo form_dropdown('pass_year[]', $year_array, isset($edu_record[0]->pass_year)?$edu_record[0]->pass_year:'', $ddp);
                                                ?>
                                                </td>
                                                <td>
                                                   <?php
                                                $ddp = 'class="form-control"';
                                                echo form_dropdown('exam_group[]', $group,  isset($edu_record[0]->exam_group)?$edu_record[0]->exam_group:'', $ddp);
                                                ?>
                                                </td>
                                                <td>
                                                    <?php
                                                $ddp = 'class="form-control"';
                                                echo form_dropdown('exam_board[]', $edu_board,isset($edu_record[0]->exam_board)?$edu_record[0]->exam_board:'', $ddp);
                                                ?> 
                                                </td>
                                                <td> <input class=" form-control" id="" name="exam_ins[]" type="text" value="<?php echo isset($edu_record[0]->exam_ins)?$edu_record[0]->exam_ins:''?>"
                                                       /></td>
                                                <td>
                                                  
                                                    <input type="text" name="exam_result[]" value="<?php echo isset($edu_record[0]->exam_result)?$edu_record[0]->exam_result:''?>" class="form-control">
                                                </td>                                               
                                            </tr>
                                            <tr>
                                                <td>
                                                  <?php
                                                $ddp = 'class="form-control"';
                                                echo form_dropdown('exam_name[]', $hsc_exam_array,isset($edu_record[1]->exam_name)?$edu_record[1]->exam_name:'', $ddp);
                                                ?>  
                                                </td>
                                                <td>
                                                    <?php
                                                $ddp = 'class="form-control"';
                                                echo form_dropdown('pass_year[]', $year_array,isset($edu_record[1]->pass_year)?$edu_record[1]->pass_year:'', $ddp);
                                                ?>
                                                </td>
                                                <td>
                                                     <?php
                                                $ddp = 'class="form-control" ';
                                                echo form_dropdown('exam_group[]', $group, isset($edu_record[1]->exam_group)?$edu_record[1]->exam_group:'', $ddp);
                                                ?>
                                                </td>
                                                <td>
                                                     <?php
                                                $ddp = 'class="form-control"';
                                                echo form_dropdown('exam_board[]', $edu_board, isset($edu_record[1]->exam_board)?$edu_record[1]->exam_board:'', $ddp);
                                                ?>
                                                </td>
                                                <td>
                                                    <input class=" form-control" id="hsc_ins" name="exam_ins[]" type="text" value="<?php echo isset($edu_record[1]->exam_ins)?$edu_record[1]->exam_ins:''?>"
                                                       />
                                                </td>
                                                <td>
                                                     <?php
                                                //$ddp = 'class="form-control" required';
                                                //echo form_dropdown('hsc_result_type', $hsc_result_array, '', $ddp);
                                                ?>
                                                    <input type="text" name="exam_result[]" value="<?php echo isset($edu_record[1]->exam_result)?$edu_record[1]->exam_result:''?>" class="form-control">
                                                </td>
                                                
                                            </tr>
                                            <tr>
                                                <td>
                                                  <?php
                                                $ddp = 'class="form-control"';
                                                echo form_dropdown('exam_name[]', $mbbs_exam_array,isset($edu_record[2]->exam_name)?$edu_record[2]->exam_name:'', $ddp);
                                                ?>  
                                                </td>
                                                <td>
                                                     <?php
                                                $ddp = 'class="form-control"';
                                                echo form_dropdown('pass_year[]', $year_array,isset($edu_record[2]->pass_year)?$edu_record[2]->pass_year:'', $ddp);
                                                ?>
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <?php
                                                    $ddp = 'class="form-control m-bot15" id="medical_col"';
                                                    echo form_dropdown('exam_ins[]', $collage_list,(isset($edu_record[2]->exam_ins) ? $edu_record[2]->exam_ins : ''), $ddp);
                                                    ?>
                                                </td>
                                                <td>                                               
                                                    <input type="text" name="exam_result[]" value="<?php echo isset($edu_record[2]->exam_result)?$edu_record[2]->exam_result:''?>" class="form-control">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <?php
                                                        $ddp = 'class="form-control"';
                                                        echo form_dropdown('exam_name[]', $fc_exam_array,isset($edu_record[3]->exam_name)?$edu_record[3]->exam_name:'', $ddp);
                                                        ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    $ddp = 'class="form-control"';
                                                    echo form_dropdown('pass_year[]', $year_array,isset($edu_record[3]->pass_year)?$edu_record[3]->pass_year:'', $ddp);
                                                    ?>
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td>

                                                    <?php
                                                    $ddp = 'class="form-control m-bot15" id="medical_col"';
                                                    echo form_dropdown('exam_ins[]', $collage_list,(isset($edu_record[3]->exam_ins) ? $edu_record[3]->exam_ins : ''), $ddp);
                                                    ?>
                                                </td>
                                                <td>                                                   
                                                    <input type="text" name="exam_result[]" value="<?php echo isset($edu_record[3]->exam_result)?$edu_record[3]->exam_result:''?>" class="form-control">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <?php
                                                        $ddp = 'class="form-control"';
                                                        echo form_dropdown('exam_name[]', $md_exam_array, isset($edu_record[4]->exam_name)?$edu_record[4]->exam_name:'', $ddp);
                                                        ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    $ddp = 'class="form-control"';
                                                    echo form_dropdown('pass_year[]', $year_array,isset($edu_record[4]->pass_year)?$edu_record[4]->pass_year:'', $ddp);
                                                    ?>
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td>
<!--                                                    <input class=" form-control" id="last_name" name="exam_ins[]" type="text" value="<?php echo isset($edu_record[4]->exam_ins)?$edu_record[4]->exam_ins:''?>"
                                                               />-->
                                                    <?php
                                                    $ddp = 'class="form-control m-bot15" id="medical_col"';
                                                    echo form_dropdown('exam_ins[]', $collage_list,(isset($edu_record[4]->exam_ins) ? $edu_record[4]->exam_ins : ''), $ddp);
                                                    ?>
                                                </td>
                                                <td>                                                   
                                                    <input type="text" name="exam_result[]" value="<?php echo isset($edu_record[4]->exam_result)?$edu_record[4]->exam_result:''?>" class="form-control"/>
                                                </td>
                                            </tr>
                                        </table>                                  
                                </div>
                            </div>
                        </div>    
                    </section>

                    <?php
                    if($form_action == "edit"){

                        ?>
                    <section class="panel panel-info">
                        <header class="panel-heading">
                            Teacher Course Plan
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:"></a>
                                <a class="fa fa-cog" href="javascript:"></a>
                                <a class="fa fa-times" href="javascript:"></a>
                             </span>
                        </header>
                        <div class="panel-body">

                            <div class="form">
                            <?php

                                foreach ($res->course_plan as $i => $code){
                                    //print_r($code);
                            ?>
                                <div class="each-row">
                                    <div class="form-group ">
                                        <label for="Name" class="control-label col-lg-2">Course</label>
                                        <div class="col-lg-3">
                                            <?php

                                            $ddp = "class='form-control m-bot15 course_code' required onchange=find_subject_topic(this) data-cf='setting/ajax_get_course_by_faculty_id_suject_topic'";
                                            echo form_dropdown('course_code[]', $course_list, (isset($code) ? $code['course'] : ''), $ddp);
                                            ?>
                                        </div>


                                        <!--<label for="Name" class="control-label col-lg-2">Faculty</label>
                                        <div class="col-lg-3">
                                            <?php
/*                                            $ddp = "class='form-control m-bot15 faculty_code' onchange=find_subject_topic(this) data-cf='setting/ajax_get_course_by_faculty_id_suject_topic'";
                                            echo form_dropdown('faculty_code[]', $faculty_list, (isset($code) ? $code['faculty'] : ''), $ddp);
                                            */?>
                                        </div>-->
                                        <label for="Name" class="control-label col-lg-2">Type</label>
                                        <div class="col-lg-3">
                                            <?php
                                            $ddp = "class='form-control m-bot15 type'";
                                            echo form_dropdown('type[]', $type_list, (isset($code) ? $code['type'] : ''), $ddp);
                                            ?>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="Name" class="control-label col-lg-2">Subject</label>
                                        <div class="col-lg-3">
                                            <?php

                                            $ddp = 'class="form-control package_des_list subject_code" multiple=""';
                                            echo form_multiselect('subject_id[][]', $subject_list, isset($code) ? $code['subjects'] : '', $ddp);
                                            ?>
                                        </div>
                                        <label for="Name" class="control-label col-lg-2">Topic</label>
                                        <div class="col-lg-3">
                                            <?php
                                            $ddp = 'class="form-control package_des_list topic_code" multiple=""';
                                            echo form_multiselect('topic_id[][]', $topic_list, isset($code) ? $code['topics'] : '', $ddp);
                                            ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-4">
                                            <a href="#" class="btn btn-warning" onclick="add_more(this, event)">Add
                                                More</a>
                                            <a href="#" class="btn btn-danger remove"
                                               onclick="remove_item(this, event)">Remove</a>
                                        </div>
                                    </div>
                                    <hr>
                                </div>

                                <?php
                                    }
                                //}
                                ?>
                            </div>
                        </div>
                    </section>
                    <?php
                    }
                    ?>

                     <?php
                    if($form_action == "add"){

                        ?>
                    <section class="panel panel-info">
                        <header class="panel-heading">
                            Teacher Course Plan
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:"></a>
                                <a class="fa fa-cog" href="javascript:"></a>
                                <a class="fa fa-times" href="javascript:"></a>
                             </span>
                        </header>
                        <div class="panel-body">

                            <div class="form">
                                <div class="each-row">
                                    <div class="form-group ">
                                        <label for="Name" class="control-label col-lg-2">Course</label>
                                        <div class="col-lg-3">
                                            <?php

                                            $ddp = "class='form-control m-bot15 course_code' required onchange=find_subject_topic(this) data-cf='setting/ajax_get_course_by_faculty_id_suject_topic'";
                                            echo form_dropdown('course_code[]', $course_list,'', $ddp);
                                            ?>
                                        </div>


                                        <!--<label for="Name" class="control-label col-lg-2">Faculty</label>
                                        <div class="col-lg-3">
                                            <?php
/*                                            $ddp = "class='form-control m-bot15 faculty_code' onchange=find_subject_topic(this) data-cf='setting/ajax_get_course_by_faculty_id_suject_topic'";
                                            echo form_dropdown('faculty_code[]', $faculty_list,'', $ddp);
                                            */?>
                                        </div>-->
                                        <label for="Name" class="control-label col-lg-2">Type</label>
                                        <div class="col-lg-3">
                                            <?php
                                            $ddp = "class='form-control m-bot15 type'";
                                            echo form_dropdown('type[]', $type_list,'', $ddp);
                                            ?>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="Name" class="control-label col-lg-2">Subject</label>
                                        <div class="col-lg-3">
                                            <?php
                                            $ddp = 'class="form-control package_des_list subject_code" multiple=""';
                                            echo form_dropdown('subject_id[][]', $subject_list,'', $ddp);
                                            ?>
                                        </div>
                                        <label for="Name" class="control-label col-lg-2">Topic</label>
                                        <div class="col-lg-3">
                                            <?php
                                            $ddp = 'class="form-control package_des_list topic_code" multiple=""';
                                            echo form_dropdown('topic_id[][]', $topic_list,'', $ddp);
                                            ?>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-4">
                                            <a href="#" class="btn btn-warning" onclick="add_more(this, event)">Add
                                                More</a>
                                            <a href="#" class="btn btn-danger remove"
                                               onclick="remove_item(this, event)">Remove</a>
                                        </div>
                                    </div>
                                    <hr>
                                </div>

                            </div>
                        </div>
                    </section>
                    <?php
                    }
                    ?>
                    
                    <section class="panel panel-info">
                        <header class="panel-heading">
                            Teacher Image
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:"></a>
                                <a class="fa fa-cog" href="javascript:"></a>
                                <a class="fa fa-times" href="javascript:"></a>
                             </span>
                        </header>
                        <div class="panel-body">
                            <div class="form">
                                <div class="form-group ">
                                    <label for="Name" class="control-label col-lg-2">Teacher Image</label>
                                    <div class="col-lg-10">
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                <?php if (!empty($res->photo)) echo "<img src='" . base_url($res->photo) . "'"; ?>
                                                <img
                                                    src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image"
                                                    alt=""/>
                                            </div>
                                            <div class="fileupload-preview fileupload-exists thumbnail"
                                                 style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                            <div>
                                            <span class="btn btn-white btn-file">
                                                <span class="fileupload-new"><i
                                                        class="fa fa-paper-clip"></i> Select image</span>
                                                <span class="fileupload-exists"><i
                                                        class="fa fa-undo"></i> Change</span>
                                                <input type="file" name="photo_image"
                                                       class="default" required/>
                                            </span>
                                                <a href="#" class="btn btn-danger fileupload-exists"
                                                   data-dismiss="fileupload"><i class="fa fa-trash"></i> Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-2">
                                        <button class="btn btn-primary" type="submit"><?php echo $btnval;?></button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                </form>
            </div>
        </div>
        <!-- page end-->
    </section>
</section>
<!--main content end-->
<?php
$this->load->view('footer/view_footer');
?>
