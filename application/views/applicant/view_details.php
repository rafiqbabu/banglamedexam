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
                            Applicant Details
                            <span class="tools pull-right">
                                <a class="fa fa-chevron-down" href="javascript:;"></a>
                                <a class="fa fa-cog" href="javascript:;"></a>
                                <a class="fa fa-times" href="javascript:;"></a>
                            </span>
                        </header>
                        <div class="panel-body">
                            <div class="col-md-12">
                                <h4 class="widget-title">Personal Information <span></span></h4>
                                <table class="table table-bordered">
                                    <tbody>
                                    <tr>
                                        <td><strong>Name</strong></td>
                                        <td> <?= $user->name; ?></td>
                                        <td><strong>Photo</strong></td>
                                        <td><img src="<?= base_url($user->photo); ?>" alt="<?= $user->name; ?>" class="img-thumbnail" width="100"></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Reg No.</strong></td>
                                        <td> <?= $user->reg_no; ?></td>
                                        <td><strong>Email</strong></td>
                                        <td> <?= $user->email; ?></td>
                                    </tr>

                                    <tr>
                                        <td><strong>Name</strong></td>
                                        <td>
                                            <?= $user->name; ?>
                                        </td>
                                        <td><strong>BMDC No</strong></td>
                                        <td>
                                            <?= $user->bmdc_no; ?>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><strong>Phone</strong></td>
                                        <td> <?= $user->phone; ?></td>
                                        <td><strong>Date of Birth</strong></td>
                                        <td> <?= user_formated_date($user->dob); ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Blood Group</strong></td>
                                        <td> <?= $user->blood_group; ?></td>
                                        <td><strong>Gender</strong></td>
                                        <td> <?= $user->gender ? $gender[$user->gender] : ''; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Father Name</strong></td>
                                        <td> <?= $user->father_name; ?></td>
                                        <td><strong>Mother Name</strong></td>
                                        <td> <?= $user->mother_name; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>NID</strong></td>
                                        <td> <?= $user->nid; ?></td>
                                        <td><strong>Passport No.</strong></td>
                                        <td> <?= $user->passport_no; ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Medical College</strong></td>
                                        <td colspan="3"><?= get_name_by_id('oe_medical_college', $user->medical_college); ?></td>
                                    </tr>
                                    <tr>
                                        <td><strong>Job Description</strong></td>
                                        <td colspan="3"><?= $user->job_desc; ?></td>
                                    </tr>
                                    </tbody>
                                </table>

                                <!--Address-->
                                <h4 class="title-simple">Address</h4>
                                <table class="table table-bordered">
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
                                            <?= $present_address ? $divisions[$present_address->division] : NULL; ?>
                                        </td>
                                        <td>
                                            <?= $present_address ? $districts[$present_address->district] : NULL; ?>
                                        </td>
                                        <td>
                                            <?= $present_address ? $thanas[$present_address->thana] : NULL; ?>
                                        </td>
                                        <td>
                                            <?= $present_address ? $present_address->address : NULL; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Permanent</td>
                                        <td>
                                            <?= $permanent_address ? $divisions[$permanent_address->division] : NULL; ?>
                                        </td>
                                        <td>
                                            <?= $permanent_address ? $districts[$permanent_address->district] : NULL; ?>
                                        </td>
                                        <td>
                                            <?= $permanent_address ? $thanas[$permanent_address->thana] : NULL; ?>
                                        </td>
                                        <td>
                                            <?= $permanent_address ? $permanent_address->address : NULL; ?>
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
                                    <?php if ($educations) : ?>
                                        <tr>
                                            <td>
                                                <?= isset($educations[0]) ? $educations[0]->exam : NULL; ?>
                                            </td>
                                            <td class="text-center">
                                                <?= isset($educations[0]) ? $educations[0]->year : NULL; ?>
                                            </td>
                                            <td class="text-center">
                                                <?= isset($educations[0]) && $educations[0]->group ? $group_list[$educations[0]->group] : NULL; ?>
                                            </td>
                                            <td class="text-center">
                                                <?= isset($educations[0]) && $educations[0]->board ? $board_list[$educations[0]->board] : NULL; ?>
                                            </td>
                                            <td>
                                                <?= isset($educations[0]) ? $educations[0]->institute : NULL; ?>
                                            </td>
                                            <td class="text-center">
                                                <?= isset($educations[0]) ? $educations[0]->result : NULL; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <?= isset($educations[1]) ? $educations[1]->exam : NULL; ?>
                                            </td>
                                            <td class="text-center">
                                                <?= isset($educations[1]) ? $educations[1]->year : NULL; ?>
                                            </td>
                                            <td class="text-center">
                                                <?= isset($educations[1]) && $educations[1]->group ? $group_list[$educations[1]->group] : NULL; ?>
                                            </td>
                                            <td class="text-center">
                                                <?= isset($educations[1]) && $educations[1]->board ? $board_list[$educations[1]->board] : NULL; ?>
                                            </td>
                                            <td>
                                                <?= isset($educations[1]) ? $educations[1]->institute : NULL; ?>
                                            </td>
                                            <td class="text-center">
                                                <?= isset($educations[1]) ? $educations[1]->result : NULL; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <?= isset($educations[2]) ? $educations[2]->exam : NULL; ?>
                                            </td>
                                            <td class="text-center">
                                                <?= isset($educations[2]) ? $educations[2]->year : NULL; ?>
                                            </td>
                                            <td class="text-center">
                                            </td>
                                            <td class="text-center">
                                            </td>
                                            <td>
                                                <?= isset($educations[2]) && $educations[2]->institute ? $medical_colleges[$educations[2]->institute] : NULL; ?>
                                            </td>
                                            <td class="text-center">
                                                <?= isset($educations[2]) ? $educations[2]->result : NULL; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <?= isset($educations[3]) ? $educations[3]->exam : NULL; ?>
                                            </td>
                                            <td class="text-center">
                                                <?= isset($educations[3]) ? $educations[3]->year : NULL; ?>
                                            </td>
                                            <td class="text-center">
                                            </td>
                                            <td class="text-center">
                                            </td>
                                            <td>
                                                <?= isset($educations[3]) && $educations[3]->institute ? $medical_colleges[$educations[3]->institute] : NULL; ?>
                                            </td>
                                            <td class="text-center">
                                                <?= isset($educations[3]) ? $educations[3]->result : NULL; ?>
                                            </td>
                                        </tr>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="6">Educational Qualification is not added.</td>
                                        </tr>
                                    <?php endif; ?>
                                    </tbody>
                                </table>

                                <!--Important Reference-->
                                <h4 class="title-simple">Important Reference</h4>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Designation</th>
                                        <th>Mobile</th>
                                        <th>Relation</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if ($references) : ?>
                                        <tr>
                                            <td><?= isset($references[0]) ? $references[0]->name : ''; ?></td>
                                            <td><?= isset($references[0]) ? $references[0]->designation : ''; ?></td>
                                            <td><?= isset($references[0]) ? $references[0]->phone : ''; ?></td>
                                            <td><?= isset($references[0]) ? $references[0]->relation : ''; ?></td>
                                        </tr>
                                        <tr>
                                            <td><?= isset($references[1]) ? $references[1]->name : ''; ?></td>
                                            <td><?= isset($references[1]) ? $references[1]->designation : ''; ?></td>
                                            <td><?= isset($references[1]) ? $references[1]->phone : ''; ?></td>
                                            <td><?= isset($references[1]) ? $references[1]->relation : ''; ?></td>
                                        </tr>
                                        <tr>
                                            <td><?= isset($references[2]) ? $references[2]->name : ''; ?></td>
                                            <td><?= isset($references[2]) ? $references[2]->designation : ''; ?></td>
                                            <td><?= isset($references[2]) ? $references[2]->phone : ''; ?></td>
                                            <td><?= isset($references[2]) ? $references[2]->relation : ''; ?></td>
                                        </tr>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="4">There are no references.</td>
                                        </tr>
                                    <?php endif; ?>
                                    </tbody>
                                </table>

                            </div><!-- Column -->
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