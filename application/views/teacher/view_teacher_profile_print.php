<?php $this->load->view('header/view_header_print'); ?>
    <p><?php //echo $schedule_name; ?></p>
    <table cellpadding="3" border="1" style="border-collapse: collapse;">
<!--        <tr>
            <th width="12%">Date</th>
            <th width="10%">Day</th>
            <th width="20%">Time</th>
            <th width="35%">Topics</th>
            <th width="23%">Place</th>
        </tr>-->
        <tr>
            <td width="30%">Name</td>
            <td width="55%" colspan="2"><?php echo $record->tec_name;?></td>
            <td rowspan="3" ><img src="<?php echo base_url() . $record->photo; ?>" width="120px" height="110px"></td>
        </tr>
        <tr>
            <td>Father Name</td>
            <td colspan="4"><?php echo $record->fath_name;?></td>
            
        </tr>
        <tr>
            <td>Mothers Name</td>
            <td colspan="4"><?php echo $record->mother_name;?></td>
            
        </tr>
        <tr>
            <td>Subjects</td>
            <td colspan="4"><?php echo implode(', ', $record->subjects);?></td>
        </tr>
        <tr>
            <td>Topics</td>
            <td colspan="4"><?php echo implode(', ', $record->topics);?></td>
        </tr>
        <tr>
            <td>Courses</td>
            <td><?php echo implode(', ', $record->courses);?></td>
            <td>Type</td>
            <td><?php echo implode(', ', $record->types);?></td>    
        </tr>
        <tr>           
            <td>Date Of Birth</td>
            <td><?php echo date('d-m-Y',strtotime($record->dob));?></td>
            <td>Joining Date</td>
            <td><?php echo date('d-m-Y',strtotime($record->joining_date));?></td>
        </tr>
        <tr>
            <td>Gender</td>
            <td><?php echo get_gender_name($record->gender);?></td>
            <td>Religion</td>
            <td><?php echo get_religion_name($record->religion);?></td>
        </tr>
        <tr>
            <td>Phone No</td>
            <td colspan="4"><?php echo $record->mobile;?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td colspan="4"><?php echo $record->email; ?></td>
        </tr>
        <tr>
            <td>Nationality</td>
            <td><?php echo $record->nationality; ?></td>
            <td>National ID No</td>
            <td><?php echo $record->na_id; ?></td>
        </tr>
        <tr>
            <td>Passport no</td>
            <td><?php echo $record->pass_no ? $record->pass_no : '' ?></td>
            <td>Telephone</td>
            <td><?php echo $record->telephone ? $record->telephone : '' ?></td>
        </tr>
             
        <tr>
            <td>BMDC No</td>
            <td> <?php echo $record->bmdc_no ? $record->bmdc_no : ''; ?> </td> 
            <td>Blood Group</td>
            <td> <?php echo $record->blood_gro ? $record->blood_gro : ''; ?> </td> 
        </tr>
        <tr>
            <td>Contact person/spouse name</td>
            <td><?php echo $record->spouse_name; ?></td>
            <td>Contact person/spouse mobile no</td>
            <td><?php echo $record->pouse_mobile; ?></td>   
        </tr>
        
        <tr>
            <?php if($record->per_divi){?>
            <td>Permanent Address</td>
            <td><?php echo 'Village: '.$record->per_address.' Division: '.$division_list[$record->per_divi].' District :'.$mai_district_list[$record->per_dist].' Thana :'.$mai_upazilla_list[$record->per_thana]; ?></td>
            <?php }?>
            <?php if($record->mai_divi){?>
            <td>Mailing Address</td>
            <td><?php echo 'Village: '.$record->mai_address.' Division: '.$division_list[$record->mai_divi].' District :'.$mai_district_list[$record->mai_dist].' Thana :'.$mai_upazilla_list[$record->mai_thana]; ?></td>   
            <?php }?>
        </tr>
        
        <?php 
        if($edu_record){
        ?>
        <tr>
            <th colspan="4">Education Qualification</th>                      
        </tr>
        <?php
        foreach ($edu_record as $edu) {
            ?>
            <tr>
                <td><?php echo $edu->exam_name.' - '. $year_array[$edu->pass_year]; ?></td>                                     

<!--                <td><?php //echo $year_array[$edu->pass_year]; ?> </td>                                                                                                   -->
                <td><?= isset($group[$edu->exam_group]) ? $group[$edu->exam_group] : ''; ?></td>                                                 
<!--                <td><?php //echo isset($edu_board[$edu->exam_board]) ? $edu_board[$edu->exam_board] : ''; ?></td>-->
                <td><?php 
                        $ins = isset($edu_board[$edu->exam_board]) ? $edu_board[$edu->exam_board] : '';
                        echo get_name_by_auto_id('sif_medical_collage',$edu->exam_ins,'collage_name')?get_name_by_auto_id('sif_medical_collage',$edu->exam_ins,'collage_name'):$edu->exam_ins;
                    ?>
                </td>                                                                                                 
                <td><?php echo $edu->exam_result; ?></td>

            </tr>
            <?php
        }
        }
        ?>
        
         
            
    </table>
<?php
//var_dump($rec);
$this->load->view('footer/view_footer_print');
?>