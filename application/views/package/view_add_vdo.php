<?php
$this->load->view( 'header/view_header' );
$current_date = date( 'Y-m-d' );
?>

<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->

        <div class="row">

            <div class="col-md-12">
                <section class="panel panel-info">
                    <header class="panel-heading"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                        <h3 class="panel-title">Add Video with this Exam
                            <span class="jnn-tools pull-right"><a class="fa fa-chevron-down" href="javascript:"></a></span>
                        </h3>
                    </header>
                    <div class="panel-body">
						<table class="table table-bordered table-striped va-top">
                            <tr>
                                <th width="150">Exam Name</th>
                                <td>
                                    <?php echo $en = $_GET['en']; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>URL Here</th>
                                <td>
                                    <form action="" method="POST">
                                        <input type="hidden" name="e_name" value="<?php echo $en; ?>">
                                        <input type="hidden" name="e_id" value="<?php echo $_GET['eid']; ?>">
                                        <input type="text" name="url" size="40">
                                        <input type="submit" name="sub_url" value="Submit">
                                    </form>
                                </td>
                            </tr>
                        </table>
                        
                        <?php
                            if(isset($_POST['sub_url']) && $_POST['url']!=""){
                                
                                $url = $_POST['url'];
                                $url = str_replace("'", "\'", $url);
                                $e_name = $_POST['e_name'];
                                $e_name = str_replace("'", "\'", $e_name);
                                
                                $sql = "INSERT INTO solve_vdo (url, sts, e_id, e_name) VALUES ('$url', '1', '$_POST[e_id]', '$e_name');";
                                $query=$this->db->query($sql);
                                if ($query){
                                    echo "<font color='green'>Uploaded Success!</font>";            
                                }
                                else {
                                    echo "<font color='red'>NOT Success!</font>" . mysqli_error();
                                }
                            }
                        ?>
                        <br><br>
                        <?php
                            //echo $name = $_GET['name'];
                            //echo $en;
                            $en = str_replace("'", "\'", $en);
                            $sql="SELECT * FROM solve_vdo WHERE e_name = '$en' AND sts = '1' ORDER BY id DESC LIMIT 1";
							$query = $this->db->query($sql);
							foreach ($query->result() as $rowv) {
								if ( $rowv->sts=1) {
                                    echo "<iframe width='560' height='315' src='{$rowv->url}' frameborder='0' allow='accelerometer; autoplay=yes; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>";
								}
							}
                        ?>
                        <br><br>
                    </div>
                </section>
            </div>

        </div>
    </section>
</section>
<!--main content end-->

<?php
$this->load->view( 'footer/view_footer' );
?>
<script src="<?php echo base_url( 'ckeditor/ckeditor.js' ); ?>"></script>
<script>
    CKEDITOR.replace('desc');
</script>
