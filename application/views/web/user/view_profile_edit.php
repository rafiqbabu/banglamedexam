<?php $this->load->view('web/header/view_header'); ?>
<!-- Header Begins -->
<?php $this->load->view('web/header/header_top'); ?>
<!-- Page Main -->
<div role="main" class="main">
    <div class="page-default bg-grey team-single">
        <!-- Container -->
        <div class="container">
            <div class="row">
                <!-- Sidebar -->
                <?php $this->load->view('web/elements/view_sidebar'); ?>

                <!-- Page Content -->
                <div class="col-md-9">
                    <div class="widget profile-widget">
                        <?php echo $msg; ?>
                        <?= form_open_multipart(site_url("user/{$id}/update"), 'class="edit-profile"'); ?>
                        <div class="row">
                            <!-- Column -->
                            <div class="col-md-12  margin-top">
                                <h4 class="widget-title">Edit Personal Information <span></span></h4>
                                <table class="table default table-bordered">
                                    <tbody>
                                    <tr>
                                        <td width="20%"><strong>Reg No.</strong></td>
                                        <td width="32%"> <?= $user->reg_no; ?></td>
                                        <td width="16%"><strong>Email</strong></td>
                                        <td width="32%"> <?= $user->email; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Name</strong></td>
                                        <td>
                                            <?= form_input('name', $user->name, 'class="form-control"'); ?>
                                        </td>
                                        <td><strong>BMDC No</strong></td>
                                        <td>
                                            <?= form_input('bmdc_no', $user->bmdc_no, 'class="form-control"'); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Phone</strong></td>
                                        <td>
                                            <input type="tel" name="phone" class="number-only form-control" value="<?= $user->phone; ?>" maxlength="11"/>
                                        </td>
                                        <td><strong>Date of Birth</strong> <span class="jnn-important">&ast;</span></td>
                                        <td>
                                            <input type="text" class="form-control datepicker" value="<?= user_formated_date($user->dob); ?>" name="dob" placeholder="dd M, yyyy">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Blood Group</strong> <span class="jnn-important">&ast;</span></td>
                                        <td>
                                            <?= form_dropdown('blood_group', $blood_groups, $user->blood_group, 'class="form-control"'); ?>
                                        </td>
                                        <td><strong>Gender</strong> <span class="jnn-important">&ast;</span></td>
                                        <td>
                                            <?= form_dropdown('gender', $gender, $user->gender, 'class="form-control"'); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Father Name</strong></td>
                                        <td>
                                            <?= form_input('father_name', $user->father_name, 'class="form-control"'); ?>
                                        </td>
                                        <td><strong>Mother Name</strong></td>
                                        <td>
                                            <?= form_input('mother_name', $user->mother_name, 'class="form-control"'); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>NID</strong> <span class="jnn-important">&ast;</span></td>
                                        <td>
                                            <?= form_input('nid', $user->nid, 'class="form-control"'); ?>
                                        </td>
                                        <td><strong>Passport No.</strong></td>
                                        <td>
                                            <?= form_input('passport_no', $user->passport_no, 'class="form-control"'); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Medical College</strong> <span class="jnn-important">&ast;</span></td>
                                        <td colspan="3">
                                            <?= form_dropdown('medical_college', $medical_colleges, $user->medical_college, 'class="form-control"'); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Job Description</strong></td>
                                        <td colspan="3">
                                            <?= form_input('job_desc', $user->job_desc, 'class="form-control"'); ?>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>

                                <!--Address-->
                                <h4 class="title-simple">Address</h4>
                                <table class="table default">
                                    <thead>
                                    <tr>
                                        <th width="15%"> Type</th>
                                        <th width="20%"> Division</th>
                                        <th width="20%"> District</th>
                                        <th width="20%"> Thana</th>
                                        <th width="25%"> Adress</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>Present</td>
                                        <td>
                                            <?php
                                            $extra = array(
                                                'class'    => 'form-control faculty',
                                                'onchange' => "AjaxChange(this, '" . site_url('AjaxController/get_district_by_division') . "', '.district')"
                                            );
                                            ?>
                                            <?= form_dropdown('present[division]', $divisions, $present_address ? $present_address->division : NULL, $extra); ?>
                                        </td>
                                        <td>
                                            <?php
                                            $extra = array(
                                                'class'    => 'form-control district',
                                                'onchange' => "AjaxChange(this, '" . site_url('AjaxController/get_thana_by_district') . "', '.thana')"
                                            );
                                            ?>
                                            <?= form_dropdown('present[district]', $districts, $present_address ? $present_address->district : NULL, $extra); ?>
                                        </td>
                                        <td>
                                            <?php
                                            $extra = array(
                                                'class' => 'form-control thana',
                                            );
                                            ?>
                                            <?= form_dropdown('present[thana]', $thanas, $present_address ? $present_address->thana : NULL, $extra); ?>
                                        </td>
                                        <td>
                                            <?= form_input('present[address]', $present_address ? $present_address->address : NULL, 'class="form-control"'); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Permanent</td>
                                        <td>
                                            <?php
                                            $extra = array(
                                                'class'    => 'form-control faculty',
                                                'onchange' => "AjaxChange(this, '" . site_url('AjaxController/get_district_by_division') . "', '.district')"
                                            );
                                            ?>
                                            <?= form_dropdown('permanent[division]', $divisions, $permanent_address ? $permanent_address->division : NULL, $extra); ?>
                                        </td>
                                        <td>
                                            <?php
                                            $extra = array(
                                                'class'    => 'form-control district',
                                                'onchange' => "AjaxChange(this, '" . site_url('AjaxController/get_thana_by_district') . "', '.thana')"
                                            );
                                            ?>
                                            <?= form_dropdown('permanent[district]', $districts, $permanent_address ? $permanent_address->district : NULL, $extra); ?>
                                        </td>
                                        <td>
                                            <?php
                                            $extra = array(
                                                'class' => 'form-control thana',
                                            );
                                            ?>
                                            <?= form_dropdown('permanent[thana]', $thanas, $permanent_address ? $permanent_address->thana : NULL, $extra); ?>
                                        </td>
                                        <td>
                                            <?= form_input('permanent[address]', $permanent_address ? $permanent_address->address : NULL, 'class="form-control"'); ?>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>

                                <!--Educational Qualifications-->
                                <h4 class="title-simple">Educational Qualifications</h4>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th width="15%"> Name Of Examination</th>
                                        <th width="15%"> Passing Year</th>
                                        <th width="15%"> Group/Batch/Session</th>
                                        <th width="15%"> Board</th>
                                        <th width="30%"> Institute Name</th>
                                        <th width="10%"> Result (GPA/DIVISION)</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <?= form_dropdown('exam[ssc][exam]', $ssc_list, isset($educations[0]) ? $educations[0]->exam : NULL, 'class="form-control"'); ?>
                                        </td>
                                        <td>
                                            <?= form_dropdown('exam[ssc][year]', $year_list, isset($educations[0]) ? $educations[0]->year : NULL, 'class="form-control"'); ?>
                                        </td>
                                        <td>
                                            <?= form_dropdown('exam[ssc][group]', $group_list, isset($educations[0]) ? $educations[0]->group : NULL, 'class="form-control"'); ?>
                                        </td>
                                        <td>
                                            <?= form_dropdown('exam[ssc][board]', $board_list, isset($educations[0]) ? $educations[0]->board : NULL, 'class="form-control"'); ?>
                                        </td>
                                        <td>
                                            <?= form_input('exam[ssc][institute]', isset($educations[0]) ? $educations[0]->institute : NULL, 'class="form-control"'); ?>
                                        </td>
                                        <td>
                                            <?= form_input('exam[ssc][result]', isset($educations[0]) ? $educations[0]->result : NULL, 'class="form-control"'); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?= form_dropdown('exam[hsc][exam]', $hsc_list, isset($educations[1]) ? $educations[1]->exam : NULL, 'class="form-control"'); ?>
                                        </td>
                                        <td>
                                            <?= form_dropdown('exam[hsc][year]', $year_list, isset($educations[1]) ? $educations[1]->year : NULL, 'class="form-control"'); ?>
                                        </td>
                                        <td>
                                            <?= form_dropdown('exam[hsc][group]', $group_list, isset($educations[1]) ? $educations[1]->group : NULL, 'class="form-control"'); ?>
                                        </td>
                                        <td>
                                            <?= form_dropdown('exam[hsc][board]', $board_list, isset($educations[1]) ? $educations[1]->board : NULL, 'class="form-control"'); ?>
                                        </td>
                                        <td>
                                            <?= form_input('exam[hsc][institute]', isset($educations[1]) ? $educations[1]->institute : NULL, 'class="form-control"'); ?>
                                        </td>
                                        <td>
                                            <?= form_input('exam[hsc][result]', isset($educations[1]) ? $educations[1]->result : NULL, 'class="form-control"'); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?= form_dropdown('exam[mbbs][exam]', $mbbs_list, isset($educations[2]) ? $educations[2]->exam : NULL, 'class="form-control"'); ?>
                                        </td>
                                        <td>
                                            <?= form_dropdown('exam[mbbs][year]', $year_list, isset($educations[2]) ? $educations[2]->year : NULL, 'class="form-control"'); ?>
                                        </td>
                                        <td>
                                            <? /*= form_dropdown('exam[mbbs][group]', $group_list, NULL, 'class="form-control"'); */ ?>
                                        </td>
                                        <td>
                                            <? /*= form_dropdown('exam[mbbs][board]', $board_list, NULL, 'class="form-control"'); */ ?>
                                        </td>
                                        <td>
                                            <?= form_dropdown('exam[mbbs][institute]', $medical_colleges, isset($educations[2]) ? $educations[2]->institute : NULL, 'class="form-control"'); ?>
                                            <? /*= form_input('exam[mbbs][institute]', NULL, 'class="form-control"'); */ ?>
                                        </td>
                                        <td>
                                            <?= form_input('exam[mbbs][result]', isset($educations[2]) ? $educations[2]->result : NULL, 'class="form-control"'); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <?= form_dropdown('exam[fcps][exam]', $fcps_list, isset($educations[3]) ? $educations[3]->exam : NULL, 'class="form-control"'); ?>
                                        </td>
                                        <td>
                                            <?= form_dropdown('exam[fcps][year]', $year_list, isset($educations[3]) ? $educations[3]->year : NULL, 'class="form-control"'); ?>
                                        </td>
                                        <td>
                                            <? /*= form_dropdown('exam[fcps][group]', $group_list, NULL, 'class="form-control"'); */ ?>
                                        </td>
                                        <td>
                                            <? /*= form_dropdown('exam[fcps][board]', $board_list, NULL, 'class="form-control"'); */ ?>
                                        </td>
                                        <td>
                                            <?= form_dropdown('exam[fcps][institute]', $medical_colleges, isset($educations[3]) ? $educations[3]->institute : NULL, 'class="form-control"'); ?>
                                            <? /*= form_input('exam[fcps][institute]', NULL, 'class="form-control"'); */ ?>
                                        </td>
                                        <td>
                                            <?= form_input('exam[fcps][result]', isset($educations[3]) ? $educations[3]->result : NULL, 'class="form-control"'); ?>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>

                                <!--Important Reference-->
                                <h4 class="title-simple">Important Reference</h4>
                                <table class="table default">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Designation</th>
                                        <th>Mobile</th>
                                        <th>Relation</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td><input name="ref[1][name]" value="<?= isset($references[0]) ? $references[0]->name : ''; ?>" class="form-control" type="text" placeholder="Name"></td>
                                        <td><input name="ref[1][designation]" value="<?= isset($references[0]) ? $references[0]->designation : ''; ?>" class="form-control" type="text"
                                                   placeholder="Designation">
                                        </td>
                                        <td><input name="ref[1][phone]" value="<?= isset($references[0]) ? $references[0]->phone : ''; ?>" class="form-control number-only" maxlength="11" minlength="11"
                                                   type="text" placeholder="Ex: 01700000000"></td>
                                        <td><input name="ref[1][relation]" value="<?= isset($references[0]) ? $references[0]->relation : ''; ?>" class="form-control" type="text" placeholder="Relation">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input name="ref[2][name]" value="<?= isset($references[1]) ? $references[1]->name : ''; ?>" class="form-control" type="text" placeholder="Name"></td>
                                        <td><input name="ref[2][designation]" value="<?= isset($references[1]) ? $references[1]->designation : ''; ?>" class="form-control" type="text"
                                                   placeholder="Designation"></td>
                                        <td><input name="ref[2][phone]" value="<?= isset($references[1]) ? $references[1]->phone : ''; ?>" class="form-control number-only" maxlength="11" minlength="11"
                                                   type="text" placeholder="Ex: 01700000000"></td>
                                        <td><input name="ref[2][relation]" value="<?= isset($references[1]) ? $references[1]->relation : ''; ?>" class="form-control" type="text" placeholder="Relation">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input name="ref[3][name]" value="<?= isset($references[2]) ? $references[2]->name : ''; ?>" class="form-control" type="text" placeholder="Name"></td>
                                        <td><input name="ref[3][designation]" value="<?= isset($references[2]) ? $references[2]->designation : ''; ?>" class="form-control" type="text"
                                                   placeholder="Designation"></td>
                                        <td><input name="ref[3][phone]" value="<?= isset($references[2]) ? $references[2]->phone : ''; ?>" class="form-control number-only" maxlength="11" minlength="11"
                                                   type="text" placeholder="Ex: 01700000000"></td>
                                        <td><input name="ref[3][relation]" value="<?= isset($references[2]) ? $references[2]->relation : ''; ?>" class="form-control" type="text" placeholder="Relation">
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>

                                <!--Photo-->
                                <h4 class="title-simple">Photo</h4>

                                <table class="table default">
                                    <tbody>
                                    <tr>
                                        <td width="40%">
                                            Profile Picture <br>
                                            <i class="text-warning">Recommended Image size: (300 x 300)px and must be less then 500kb</i>
                                        </td>
                                        <td>
                                            <input type="file" class="form-control" name="photo">
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div><!-- Column -->

                            <div class="col-md-4 pull-right">
                                <!-- Button -->
                                <button class="btn bg-green btn-lg btn-block" type="submit" onclick="submit_form(this, event)">
                                    Update Now
                                </button>
                            </div>
                        </div>
                        <?= form_close(); ?>
                    </div>
                </div><!-- Column -->
            </div><!-- Row -->
        </div><!-- Container -->
    </div><!-- Page Default -->
</div><!-- Page Main -->

<!-- Footer -->
<?php $this->load->view('web/footer/footer'); ?>
<!-- Footer -->
