<?php $this->load->view( 'header/email_header' ); ?>

<h4><?= $subject; ?></h4>
<p><?= html_entity_decode( base64_decode( $message, TRUE ) ); ?></p>

<?php $this->load->view( 'footer/email_footer' ); ?>
