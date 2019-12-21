<?php if ( $exam ): ?>
    <table style="border-collapse: collapse;" width="100%">
        <tr>
            <td rowspan="2" width="80%">
                <strong><?= "$exam->type - $exam->exam_name"; ?></strong>
            </td>
            <td align="right">Total Mark: <?= $exam->total_mark; ?></td>
        </tr>
        <tr>
            <td align="right">Time: <?= $exam->time; ?> Min</td>
        </tr>
    </table>

    <?php if ( $questions ): ?>
        <table cellpadding="10" border="1" style="border-collapse: collapse; font-family: Kalpurush" width="100%">
            <tbody>
            <?php
            $no = 1;
            foreach ( $questions as $question ) : ?>
                <tr>
                    <?php foreach ( $question as $ques ): ?>
                        <td width="50%" style="vertical-align: top;">
                            <p><strong><?= "$no. " . strip_tags( $ques->question_name ); ?></strong></p>
                            <?php foreach ( $ques->ans as $ans ): ?>
                                <p><?= "{$ans['index_seqn']}) ".strip_tags($ans['ans']); ?></p>
                            <?php endforeach; ?>
                            <p><strong>Answer:</strong> <?= $ques->type == 1 ? $ques->correct_ans : implode( ', ', array_column( $ques->ans, 'correct_ans' ) ); ?></p>
                            <p><strong>Discussion:</strong> <?= strip_tags( $ques->discussion ); ?></p>
                            <p><strong>Reference:</strong> <?= strip_tags( $ques->reference ); ?></p>
                        </td>
                        <?php
                        $no++;
                    endforeach; ?>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>

<?php endif; ?>
