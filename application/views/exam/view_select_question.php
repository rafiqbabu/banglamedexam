<?php if ( $questions ) : ?>
    <?php foreach ( $questions as $id => $topic ) : ?>
        <tr>
            <td>
                <a href="<?= site_url("exam_question/topic_questions/$type/$id") ?>" target="_blank"><?= $topic['name']; ?> (<?= $topic['qty']; ?>)</a>
            </td>
            <td class="question-select">
                <?php $ct = $topic['chapter']."-".$topic['topic']; ?>
                <?= form_multiselect( "question[$type][$ct][]", $topic['questions'], NULL, ['class' => 'select2 form-control', 'onchange' => "selected_question_count(this, event)", 'data-max' => $topic['qty']] ); ?>
            </td>
        </tr>
    <?php endforeach; ?>
<?php else: ?>
    <tr>
        <td colspan="2">Please Select No of Questions First</td>
    </tr>
<?php endif; ?>

