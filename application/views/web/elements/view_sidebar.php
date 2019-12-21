<div class="col-md-3">
    <!-- aside -->
    <aside class="sidebar">

        <!-- Widget -->
        <div class="widget" style="text-align:center;">
            <div class="user-photo">
                <?php if ( $user->photo ) : ?>
                    <img src="<?= base_url( $user->photo ) ?>" alt="" class="img-responsive img-circle img-thumbnail">
                <?php elseif ( $user->gender == 'F' ): ?>
                    <img src="<?= base_url( 'images/doc-f.png' ) ?>" alt="" class="img-responsive img-circle img-thumbnail">
                <?php else: ?>
                    <img src="<?= base_url( 'images/doc-m.png' ) ?>" alt="" class="img-responsive img-circle img-thumbnail">
                <?php endif; ?>
            </div>
            <h5 class="widget-title text-center"><?= $user->name; ?><br>
                <small class="label label-success"><?= $user->bmdc_no; ?></small>
                <span></span></h5>

            <div class="accordion-widget">
                <div class="panel-group accordion" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="<?= ($this->uri->segment( '1' ) != 'user' ? 'collapsed' : NULL) ?>" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"
                                   aria-expanded="false" aria-controls="collapseTwo">Dashboard</a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse <?= ($this->uri->segment( '1' ) != 'user' ? 'collapse' : NULL) ?>" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                                <ul class="go-widget">
                                    
                                    
                                    <li>
                                        <a style="background-color:#1957fb; color:#FFFFFF; margin-bottom:1px;" href="<?= site_url( "user/{$user->id}/current-package" ); ?>"
                                           class="<?= ($this->uri->segment( 1 ) == 'user' && $this->uri->segment( 3 ) == 'current-package' ? 'active' : NULL) ?>">&nbsp;Current Packages</a>
                                    </li>
                                    
                                    
                                    
                                    
                                    
                                    <li>
                                        <a style="background-color:#006400; color:#FFFFFF; margin-bottom:1px;" href="<?= site_url( "user/{$user->id}/purchased-packages" ); ?>"
                                           class="<?= ($this->uri->segment( 1 ) == 'user' && $this->uri->segment( 3 ) == 'purchased-packages' ? 'active' : NULL) ?>">&nbsp;My Packages</a></li>
                                    <!--       
                                    <li>
                                        <a style="background-color:#FF0000; color:#FFFFFF; margin-bottom:1px;" href="<?= site_url( "user/{$user->id}/exam-selection" ); ?>"
										   class="<?= ( $this->uri->segment( 1 ) == 'user' && $this->uri->segment( 3 ) == 'exam-selection' ? 'active' : NULL ) ?>">&nbsp;Purchase Package Now</a></li>
									-->
									
									<li>
                                        <a style="background-color:#FF0000; color:#FFFFFF; margin-bottom:1px;" href="<?= site_url( "user/{$user->id}/exam-src-institute" ); ?>#i"
                                           class="<?= ( $this->uri->segment( 1 ) == 'user' && $this->uri->segment( 3 ) == 'exam-selection' ? 'active' : NULL ) ?>">&nbsp;Purchase Package Now</a>
                                    </li>
									
                                    <!--
                                    <li>
                                        <a href="<?= site_url( "user/{$user->id}/purchased-exam" ); ?>"
                                           class="<?= ($this->uri->segment( 1 ) == 'user' && $this->uri->segment( 3 ) == 'purchased-exam' ? 'active' : NULL) ?>">Purchased Exams</a></li>
                                    -->
                                    
                                    <!--
                                    <li>
                                        <a href="<?= site_url( "user/{$user->id}/exam-history" ); ?>"
                                           class="<?= ($this->uri->segment( 1 ) == 'user' && $this->uri->segment( 3 ) == 'exam-history' ? 'active' : NULL) ?>">Exam History</a>
                                    </li>
                                    -->
                                    <!--
                                    <li>
                                        <a href="http://banglamedexam.com/history.php?id=<?php echo $user->id; ?>" target="_blank"
                                           class="<?= ($this->uri->segment( 1 ) == 'user' && $this->uri->segment( 3 ) == 'exam-history' ? 'active' : NULL) ?>">Exam History</a>
                                    </li>
                                    -->
                                    <li>
                                        <a style="background-color:#21C700; color:#FFFFFF; margin-bottom:1px;" href="<?= site_url( "user/{$user->id}/exam-history-list" ); ?>"
                                           class="<?= ($this->uri->segment( 1 ) == 'user' && $this->uri->segment( 3 ) == 'exam-history' ? 'active' : NULL) ?>">&nbsp;Exam History/Results</a>
                                    </li>


                                    <li>
                                        <a style="background-color:#9400D3; color:#FFFFFF; margin-bottom:1px;" href="<?= site_url( "user/{$user->id}/notice" ); ?>"
                                           class="<?= ($this->uri->segment( 1 ) == 'user' && $this->uri->segment( 3 ) == 'notice' ? 'active' : NULL) ?>">&nbsp;Schedule/Notice <?= $unread_notice_count ? "<span class='badge bg-orange'>$unread_notice_count</span>" : NULL; ?></a>
                                    </li>
                                    
                                    <li>
                                        <a style="background-color:#6960EC; color:#FFFFFF; margin-bottom:1px;" href="<?= site_url( 'feedback-form' ); ?>"
                                           class="<?= ($this->uri->segment( 1 ) == 'user' && $this->uri->segment( 3 ) == 'notice' ? 'active' : NULL) ?>">&nbsp;Complain Box</a>
                                    </li>
                                    
                                    <li>
                                        <a style="background-color:#1957fb; color:#FFFFFF; margin-bottom:1px;" href="<?= site_url( "user/{$user->id}/my-inbox" ); ?>"
                                           class="<?= ($this->uri->segment( 1 ) == 'user' && $this->uri->segment( 3 ) == 'my-inbox' ? 'active' : NULL) ?>">&nbsp;My Inbox</a>
                                    </li>

                                    <li>
                                        <a style="background-color:#2F4F4F; color:#FFFFFF; margin-bottom:1px;" href="<?= site_url( "user/{$user->id}" ); ?>" class="<?= ($this->uri->segment( 1 ) == 'user' && $this->uri->segment( 3 ) == '' ? 'active' : NULL) ?>">&nbsp;My Profile</a></li>
                                    <li>
                                        <a style="background-color:#191970; color:#FFFFFF; margin-bottom:1px;" href="<?= site_url( "user/{$user->id}/edit" ); ?>"
                                           class="<?= ($this->uri->segment( 1 ) == 'user' && $this->uri->segment( 3 ) == 'edit' ? 'active' : NULL) ?>">&nbsp;Edit Profile</a></li>
                                    <li>
                                        <a style="background-color:#d35400; color:#FFFFFF; border-bottom: 10px #d35400 solid;" href="<?= site_url( "user/{$user->id}/change-password" ); ?>"
                                           class="<?= ($this->uri->segment( 1 ) == 'user' && $this->uri->segment( 3 ) == 'change-password' ? 'active' : NULL) ?>">&nbsp;Change Password</a>
                                    </li>
                                           
                                           
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div><!-- Widget -->

    </aside><!-- aside -->
</div><!-- Column -->
