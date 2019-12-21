<?php $this->load->view( 'header/email_header' ); ?>

<h4><?= $subject; ?></h4>

<?= $details; ?>

<?php $this->load->view( 'footer/email_footer' ); ?>
