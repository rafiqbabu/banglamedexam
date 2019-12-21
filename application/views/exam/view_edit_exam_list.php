<?php
$this->load->view('header/view_header');
$current_date = date('Y-m-d');
?>

<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->

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
                
                ?>
                 <form class="cmxform form-horizontal" enctype="multipart/form-data"  id="commentForm" role="form" method="post"
                      action="<?php echo base_url().'exam_create/update_exam_list'; ?>">

                  <input type="hidden" name="update_id" value="<?php echo isset($res->id)?$res->id:''?>">
                    
                    <section class="panel panel-info">
                        <header class="panel-heading">
                            Create Exam   
                        </header>
                        <div class="panel-body">
                            <div class="form">     
                                <div class="form-group ">
                                    <label for="Name" class="control-label col-lg-2">Exam Name <i class="fa fa-asterisk ipd-star"></i></label>
                                    <div class="col-lg-6">
                                        <input class="form-control" id="exam_name" name="exam_name"  type="text" value="<?php echo (isset($res->exam_name))?$res->exam_name : '';?>"  required/>
                                    </div>
                                </div>                                
                                
                                <div class="form-group ">
                                        <label for="Name" class="control-label col-lg-2">Institute Name  <i class="fa fa-asterisk ipd-star"></i></label>
                                        <div class="col-lg-6">
                                            <?php
                                        $url = base_url('setting/ajax_get_course_by_institute');
                                        $ddp = "class='form-control m-bot15' id='institute_id' required onchange=get_course_by_institue('$url')";
                                            echo form_dropdown('institute_id', $institute_list, set_value('institute_id', (isset($res->institute_id)) ? $res->institute_id : ''),$ddp);
                                            ?>
                                        </div>
                                </div>

                                <div class="form-group ">
                                    <label for="Status" class="control-label col-lg-2">Course
                                     <i class="fa fa-asterisk ipd-star"></i></label>
                                    
                                    <div class="col-lg-6 col-sm-9">                                          
                                        <?php
                                        $url = base_url('setting/ajax_get_faculty_by_course');
                                        $ddp = "class='form-control m-bot15' id='course_id' required onchange=get_faculty_by_course('$url')";                                      
                                        echo form_dropdown('course_id', $course_list, (isset($res) ? $res->course_id : ''), $ddp);
                                        ?>
                                    </div>
                                </div>

                                <div class="form-group ">
                                    <label for="Status" class="control-label col-lg-2">Faculty
                                     <i class="fa fa-asterisk ipd-star"></i></label>
                                    <div class="col-lg-6 col-sm-9">                                          
                                        <?php
                                        //$ddp = "class='form-control m-bot15' id='faculty_code' required";
                                        $url = base_url('setting/ajax_get_subjects_by_faculty');
                                        $ddp = "class='form-control m-bot15' id='faculty_id' required onchange=get_subjects_by_faculty('$url')"; 
                                        echo form_dropdown('faculty_id', $faculty_list,(isset($res->faculty_id) ? $res->faculty_id : ''), $ddp);
                                        ?>
                                    </div>
                                </div>


                                <div class="form-group ">
                                    <label for="Status" class="control-label col-lg-2">Subject
                                     <i class="fa fa-asterisk ipd-star"></i></label>
                                    <div class="col-lg-6 col-sm-9">                                          
                                        <?php
                                        $ddp = "class='form-control m-bot15' id='subject_faculty_id' required";
                                        echo form_dropdown('subject_id', $sub_list,(isset($res->subject_id) ? $res->subject_id : ''), $ddp);
                                        ?>
                                    </div>
                                </div>


                               <div class="form-group">
                                    <label for="Course" class="control-label col-lg-2">Exam Type <i class="fa fa-asterisk ipd-star"></i></label>
                                    <div class="col-lg-2">                                          
                                        <?php
                                        $ddp = "class='form-control m-bot15' id='answer' required";
                                        echo form_dropdown('exam_id', $exam_category,(isset($res->exam_id) ? $res->exam_id : ''), $ddp);
                                        ?>
                                    </div>
                                    <label for="Course" class="control-label col-lg-2">Free Exam</label>
                                    <div class="col-lg-2">                                          
                                        <?php
                                        $ddp = "class='form-control m-bot15' id='answer'";
                                        echo form_dropdown('free_exam', $free_exam,(isset($res->free_exam) ? $res->free_exam : ''), $ddp);
                                        ?>
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label for="Course" class="control-label col-lg-2">MCQ
                                    <i class="fa fa-asterisk ipd-star"></i>
                                    </label> 

                                    <div class="col-lg-2">
                                        <input class="form-control" id="question" name="mcq_total" value="<?php echo $res->mcq_total ? $res->mcq_total : ''?>"  type="text"  required/>
                                    </div>
                                    
                                    <label for="Name" class="control-label col-lg-2">Value</label>
                                    <div class="col-lg-2">
                                       <input class="form-control" id="question" name="mcq_value" value="<?php echo $res->mcq_value ? $res->mcq_value : ''?>"  type="text"  required/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="Course" class="control-label col-lg-2">SBA
                                    <i class="fa fa-asterisk ipd-star"></i>
                                    </label> 

                                    <div class="col-lg-2">
                                        <input class="form-control" id="question" name="sba_total" value="<?php echo $res->sba_total ? $res->sba_total : ''?>" type="text"  required/>
                                    </div>
                                    
                                    <label for="Name" class="control-label col-lg-2">Value</label>
                                    <div class="col-lg-2">
                                       <input class="form-control" id="question" name="sba_value" value="<?php echo $res->sba_value ? $res->sba_value : ''?>"   type="text"  required/>
                                    </div>
                                </div>

                                 <div class="form-group ">                                    
                                    <label for="Faculty" class="control-label col-lg-2">Negative Marking <i class="fa fa-asterisk ipd-star"></i></label>
                                    <div class="col-lg-6">
                                    <input class="form-control" id="question" name="negative_mark" value="<?php echo $res->negative_mark ? $res->negative_mark : ''?>" type="text"  required/>
                                    </div>
                                                                                                    
                                </div>

                                 <div class="form-group">
                                    <label for="Faculty" class="control-label col-lg-2">Total Mark
                                    <i class="fa fa-asterisk ipd-star"></i>
                                    </label>
                                    <div class="col-lg-6">
                                        <input class="form-control"  type="text" name="total_mark" value="<?php echo $res->total_mark ? $res->total_mark : ''?>" />
                                    </div> 
                                </div>

                               <div class="form-group">
                                    <label for="Name" class="control-label col-md-2">Time<i
                                            class="fa fa-asterisk ipd-star"></i></label>
                                    <div class="col-md-4">
                                        <input class="form-control" value="<?php echo $res->time ? $res->time : ''?>"  type="text" name="time" />
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="Name" class="control-label col-md-2">Exam Costs<i
                                            class="fa fa-asterisk ipd-star"></i></label>
                                    <div class="col-md-4">
                                        <input class="form-control" value="<?php echo $res->exam_cost? $res->exam_cost : ''?>"  type="text" name="exam_cost" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="Name" class="control-label col-md-2">Exam Details </label>
                                    <div class="col-md-4">
                                        <textarea name="exam_detail" class="form-control" style="width:530px;height: 120px;"><?php echo $res->exam_detail ? $res->exam_detail : '';?></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">

                                        <div class="col-lg-12">
                                            <div class="col-lg-12">
                                                <div class="panel-heading" style="background:#D9EDF7;text-align:center;">
                                                    <h3 class="panel-title">Select Questions</h3>
                                                </div>
                                                <header class="panel-heading tab-bg-dark-navy-blue ">
                                                    <ul class="nav nav-tabs">
                                                        <li class="active">
                                                            <a data-toggle="tab" href="#tab_mcq">MCQ</a>
                                                        </li>   
                                                        <li class="">
                                                            <a data-toggle="tab" href="#tab_sba">SBA</a>
                                                        </li>                             
                                                    </ul>                               
                                                </header>                                                                                                           
                                                <div class="panel-body" style="border:1px solid #D9EDF7;">
                                                    <div class="panel-body">
                                                        <div class="tab-content">

                                                            <div id="tab_mcq" class="tab-pane active">

                                                                <div class="col-lg-4"> 
                                                                <div class="tree_mcq">
                                                                <ul>
                                                                    <?php
                                                                        if(!empty($chapter_topic_id)){
                                                                    ?>
                                                                    <?php
                                                                        $i = 0;
                                                                        foreach ($chapter_topic_id as $key => $value) {
                                                                            ?>
                                                                                <li><a href="javascript:void">
                                                                                    <?php echo  get_name_by_auto_id('oe_chapter',$value->chapter_id,'chapter_name');?>
                                                                                        
                                                                                    </a>
                                                                                <?php
                                                                                //$chapter_id = $chapter_topic_id;
                                                                                //$arr_topics = get_topic_by_chapter($chapter_id);
                                                                                if(!empty($chapter_topic_id)){ 
                                                                                    ?>
                                                                                  <ul>
                                                                                <?php
                                                                                foreach ($chapter_topic_id as $key_topics => $value_topics) { 
                                                                                    ?>
                                                                                      <li>
                                                                                        <a href="javascript:void" onclick="return showExamQuestioList('<?php //echo $value_topics->id; ?>','<?php //echo $chapter_id; ?>')">
                                                                                        <?php //echo $value_topics->name; ?>
                                                                                        <?php 
                                                                                        echo get_edit_topics_value('oe_topics',$value_topics->topic_id,'name');
                                                                                        ?>  
                                                                                        </a>
                                                                                      </li>
                                                                                      <?php
                                                                                } ?>
                                                                                       </ul>
                                                                                      <?php
                                                                                }                                                                                     
                                                                                ?>
                                                                           </li>    
                                                                    <?php
                                                                        }      
                                                                        } ?>                                                                                                                                       
                                                                                                                                   
                                                                </ul>
                                                                </div>                                                                    
                                                                </div>
                                                                <div class="col-lg-8">
                                                                      MCQ   Question List
                                                                      <hr>
                                                                    <div id="mcq_qustion_selection">                                                                  
                                                                    </div>
                                                                </div>                                                                           
                                                            </div> 

                                                            <div id="tab_sba" class="tab-pane">
                                                                <div class="col-lg-4">   
                                                                <div class="tree_sba">
                                                                <ul>
                                                                    <?php
                                                                        if(!empty($chapter_lists)){
                                                                    ?>
                                                                    <?php
                                                                        $i = 0;
                                                                        foreach ($chapter_lists as $key => $value) {
                                                                            ?>
                                                                                <li><a href="javascript:void"><?php echo $value->chapter_name; ?></a>
                                                                                <?php
                                                                                $chapter_id = $value->id;
                                                                                $arr_topics = get_topic_by_chapter($chapter_id);
                                                                                if(!empty($arr_topics)){ 
                                                                                    ?>
                                                                                  <ul>
                                                                                <?php
                                                                                foreach ($arr_topics as $key_topics => $value_topics) { 
                                                                                    ?>
                                                                                      <li><a href="javascript:void" onclick="return showExamQuestioListSBA('<?php echo $value_topics->id; ?>','<?php echo $chapter_id; ?>')"><?php echo $value_topics->name; ?></a></li>
                                                                                      <?php
                                                                                } ?>
                                                                                       </ul>
                                                                                      <?php
                                                                                }                                                                                     
                                                                                ?>
                                                                           </li>    
                                                                    <?php
                                                                        }      
                                                                        } ?>                                                                                                                                       
                                                                                                                                   
                                                                </ul>
                                                                </div>                                                                    
                                                                </div>
                                                                <div class="col-lg-8">
                                                                    SBA   Question List
                                                                      <hr>
                                                                    <div id="sba_qustion_selection">                                                                  
                                                                    </div>                                                                    
                                                                </div>                                                                           
                                                            </div>                         
                                                        </div>                                                                                                                                                        
                                                    </div>
                                                </div>
                                            </div>                                                
                                        </div>
                                    </div>
                                </div> 
                                <div class="row">

                                    <div class="panel-body" style="border:1px solid #D9EDF7;">
                                        <header class="panel-heading wht-bg">
                                          <h4 class="gen-case">Preview MCQ Question List (<span id="mcq_total_question_added">0</span>)</h4> 
                                        </header>
                                    
                                            <div id="mcq_qustion_wishlist">
                                          
                                            </div>
                                                                                               
                                    </div>
                      
                                    
                                  
                                    <div class="panel-body" style="border:1px solid #D9EDF7;">
                                        <header class="panel-heading wht-bg">
                                            <h4 class="gen-case">Preview SBA Question List(<span id="sba_total_question_added">0</span>)</h4>
                                        </header>
                                            <div id="sba_qustion_wishlist">                                                                  
                                            </div>                                           
                                        </div>     
  
                                      </div>
                                    </div>                         
                                </div>

                            </div><!--dfadsfd-->

                            <div class="form-group">
                                <div class="col-lg-offset-2 col-lg-2">
                                    <button class="btn btn-primary" type="submit" value="Submit">Submit</button>
                                </div>
                            </div>
                        </div>

                    </section>
                </form>
            </div>    
        </div>
    </section>

</section>

<!--main content end-->



<?php
$this->load->view('footer/view_footer');
?>    