<div style="margin-left: 30%;margin-right: 30%">
    <div id="header" style="text-align: center">
        <div style="font-size: 30px; font-weight: bold">Survey</div>
    </div>
    <?php $totalVote = $survey[0]['Question']['total_vote']; ?>
    <h3><?php echo $survey[0]['Question']['name'] ?> <span style="font-weight: bold;color: red">( <?php echo $totalVote ?> )</span></h3>
    <table>
        <?php
            $percent = 0;
            foreach ($survey[0]['Result'] as $answer) {
                $vote = $answer['total_vote'];
                if ($totalVote > 0)
                        $percent = round(($vote/$totalVote)*100);
        ?>
        <tr>
            <td style="width: 20%"><?php echo $answer['name'] ?></td>
            <td>
                <?php if ($percent > 0) { ?>
                <table style="width: <?php echo $percent ?>%">
                    <tr>
                        <td style="background-color: blue;"></td>
                    </tr>
                </table>
                <?php } ?>
            </td>
            <td style="width: 10%">
                <?php echo $percent ?>%
            </td>
        </tr>
        <?php } ?>
    </table>
    <button class="btn" onclick="location.href = '/'">
        Back
    </button>
</div>