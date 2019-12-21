<?php $this->load->view('web/header/view_header'); ?>
<!-- Header Begins -->
<?php $this->load->view('web/header/header_top'); ?>

<?php 
    //variabls form controller/user.php -- user_login_sif() 
    $sql = "SELECT * FROM oe_doc_master WHERE username = '$email'";
    $query = $this->db->query($sql);
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $password = $row->pass_view;
        }
    }
    else {
        $sql = "INSERT INTO oe_doc_master (username, password, pass_view, name, email, phone, bmdc_no, status, reg_no) 
        VALUES ('$email', '$pass', '$password', '$name', '$email', '$phone', '$bmdc', '1', '$reg_no')";
        $query=$this->db->query($sql);
    }
    $_SESSION['exam_comm_code'] = $exam_comm_code;
    $_SESSION['topic_code'] = $topic_code;
?>


<!-- Page Main -->
<div role="main" class="main">
    <div class="page-default bg-grey typo-dark pad-bottom-50">
        <!-- Container -->
        <div class="container">
            <div class="col-md-6 col-md-offset-3">
                <div class="title-wrap text-center">
                    <h3 class="title"> Login as <b><?php echo $name; ?></b></h3>
                </div>
                <hr>
                <?php echo $msg; ?>
                <!-- Form Begins -->
                <?= form_open(current_url()); ?>
                <!--<form method="post" action="--><?//= current_url(); ?><!--">-->

                    <div class="input-email form-group">
                        <input type="hidden" name="username" class="input-email form-control" placeholder="Username" value="<?php echo $email; ?>">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="password" class="input-name form-control" value="<?php echo $password; ?>">
                    </div>

                    <div class="form-group">
                        <div class="row">
                            
                            <div class="col-md-12 text-right">
                                <!-- Button -->
                                <button class="btn bg-green btn-lg" type="submit" onclick="submit_form(this, event)">
                                    Click Here for Exam
                                </button>
                            </div>
                        </div>
                    </div>
<!--                </form>-->
                <?= form_close(); ?>
            </div><!-- Column -->

        </div><!-- Container -->
    </div><!-- Page Default -->
</div><!-- Page Main -->

<!-- Footer -->
<?php $this->load->view('web/footer/footer'); ?>
<!-- Footer -->
