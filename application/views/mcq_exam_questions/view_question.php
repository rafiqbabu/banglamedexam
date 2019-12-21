<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Questions</title>

    <style>
        body {
            width: 80%;
            margin: 0 auto;
        }

        @media print {
            body {
                width: 100%;
            }

            button {
                display: none;
            }
        }
    </style>
</head>
<body>

<?php if ( $questions ): ?>
    <button onclick="print()">Print</button>
    <table cellpadding="10" border="1" style="border-collapse: collapse; font-family: Kalpurush" width="100%">
        <tbody>
        <?php
        $no = 1;
        foreach ( $questions as $question ) : ?>
            <tr>
                <?php foreach ( $question as $ques ): ?>
                    <td width="50%" style="vertical-align: top;">
                        <p><strong><?= "$no. " . strip_tags( $ques->question_name ); ?></strong></p>
                        <?php foreach ( $ques->ans as $ans ):
                            if ( $ans['ans'] ) : ?>
                                <p><?= "{$ans['index_seqn']}) " . strip_tags( $ans['ans'] ); ?></p>
                            <?php
                            endif;
                        endforeach; ?>
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

</body>
</html>