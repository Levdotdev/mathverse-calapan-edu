<?php foreach(html_escape($all) as $question):
    echo "Question: ".$question['question'] . "|Choice 1:".$question['choice1'] . "|Choice 2:".$question['choice2'] . "|Choice 3:".$question['choice3'] . "|Choice 4:".$question['choice4'];
endforeach; ?>