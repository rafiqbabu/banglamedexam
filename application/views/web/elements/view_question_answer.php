<?php echo form_hidden( 'id', $question->id ); ?>
<?php echo form_hidden( 'type', $question->type ); ?>
<?php if ( $this->session->ques_no == $this->session->ques_count ): ?>
	<div class="text-warning">Last Question</div>
<?php endif; ?>
<div class="row">
	<div class="col-md-12">
		<p><strong>Q: 
			<?php
			$total_ques = count( $this->session->ques_count );
			$current_ques = array_search( $question->id, $this->session->ques_count ) + 1;
			?>
			<span class="label label-info"><?= $current_ques . " of " . $total_ques; ?></span> 
			<?= strip_tags( get_name_by_auto_id( 'oe_qsn_bnk_master', $question->id, 'question_name' ) ) ?></strong></p>
	</div>
	
	<!--
	<div class="col-md-2">
		<?php
		$total_ques = count( $this->session->ques_count );
		$current_ques = array_search( $question->id, $this->session->ques_count ) + 1;
		?>
		<span class="label label-info"><?= $current_ques . " of " . $total_ques; ?></span>
	</div>
	-->
</div>

<!--strong>Answer:</strong-->
<?php if ( $question->type === '1' ) : ?>
	<!--<ul class="q-ans">-->
		<?php foreach ( $answers as $answer ) :
			if ( $answer->ans ):
		?>
				<!--<li>--><label><input type="radio" name="ans" value="<?= $answer->index_seqn; ?>"><?= strip_tags( $answer->ans ); ?></label><!--</li>-->
			<?php
			endif;
		endforeach; ?>
	<!--</ul>-->
<?php elseif ( $question->type === '2' ) : if ( count( $answers ) ) : ?>
	<!--<ul class="q-ans">-->
		<?php foreach ( $answers as $answer ) :
			if ( $answer ):
		?>
				<!--<li>-->
					<div class="col-md-8"><b><?= strip_tags( "<span>{$answer->index_seqn}.</span> <span> {$answer->ans}</span>" ) ?></b></div>
					<div class="col-md-4">
						<label><input type="radio" name="ans[<?= $answer->index_seqn; ?>]" value="T">T &nbsp;&nbsp;</label>
						<label><input type="radio" name="ans[<?= $answer->index_seqn; ?>]" value="F">F &nbsp;&nbsp;</label>
					</div>
				<!--</li>-->
			<?php endif;
		endforeach; ?>
	<!--</ul>-->
<?php endif; endif; ?>
