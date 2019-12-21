<?php if ($msg = $this->session->flashdata('msg')) : $type = $this->session->flashdata('msg_type'); ?>
    <div class="alert alert-<?= $type; ?>">
        <button data-dismiss="alert" class="close close-sm" type="button"><i class="uni-close-window"></i></button>
        <?= $msg; ?>
    </div>
<?php endif; ?>