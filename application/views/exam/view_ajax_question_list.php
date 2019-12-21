                    <div class="panel-body"  style="height:500px; overflow: auto;">
                        <table class="table table-bordered table-striped">   
                            <?php
                            if(!empty($quetion_list)){
                            foreach ($quetion_list as $key => $value) {                                
                                ?>
                            <tr id="<?php echo $quetion_list_type; ?>_question_list_id_<?php echo $value['id']; ?>">
                                <td><?php echo $value['question_name'] ?></td>
                                <?php
                                if($quetion_list_type == "mcq"){
                                ?>
                                <td><a class="btn btn-link" href="javascript:void" onclick="return addExamQuestioWishList('<?php echo addslashes($value['question_name']) ?>','<?php echo $value['id']; ?>','<?php echo $chapters_id; ?>','<?php echo $topics_id; ?>')">Add</a></td>
                                <?php }else{ ?>
                                    <td><a class="btn btn-link" href="javascript:void" onclick="return addExamQuestioWishListSBA('<?php echo addslashes($value['question_name']) ?>','<?php echo $value['id'];?>','<?php echo $chapters_id; ?>','<?php echo $topics_id; ?>')">Add</a></td>
                                <?php } ?>
                                </tr>                            
                            <?php
                            } }
                            ?>                                                       
                        </table>
                    </div> 
                            
                                