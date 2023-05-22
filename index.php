// Name: Albani Boutje Johanes
// NIM: 211011060022
<?php

// Function that accepted by NFA
function nfa($word)
{
    // Definition and final state
    $transitions = [
        'q0' => ['a' => 'q1' ],
        'q1' => ['a' => 'q2','b' => 'q2'],
        'q2' => ['a' => 'q2']
    ];

    $currentState = 'q0';
    $finalState = 'q2';
    // Loop in every character
    for ($i = 0; $i < strlen($word); $i++) {
        $input = $word[$i];

        // Check Transitions in every character
        if (isset($transitions[$currentState][$input])) {
            // change to the next state
            $currentState = $transitions[$currentState][$input];
        } else {
            return false;
        }
    }
    // check if the current states is already on the final state
    if ($currentState === $finalState) {
        return true;
    } else {
        return false;
    }
}
// initialization variable done
$result = "";
// Check form is submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $word = $_POST["word"];
    // call function nfa to check
    if (nfa($word)) {
        $result = "<u><b>'$word'</b></u> accepted by NFA Machine.";
    } else {
        $result = "<u><b>'$word'</b></u> decline by NFA Machine.";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Automata NFA</title>
</head>

<body style="background:#00A86B;">
    <div style="text-align:center;  border: 3px solid #ccff33; padding: 2px; ">
        <h1>NFA Language Processing</h1>
    </div>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <div style="margin-top: 20px; text-align:center; padding: 2px; font-size: 20px">
            <label for="word">Enter word only a and b:</label>
            <input type="text" id="word" name="word">
            <input type="submit" value="Cek">
        </div>
    </form>

    <p style="font-family:sans-serif; margin-top: 20px; text-align:center; padding: 2px; "><?php echo $result; ?></p>
    <br>
    <br>
    <p style="font-family:sans-serif; margin-top: 20px; text-align:center; padding: 2px; ">
    Source code:<br>
    <br>
    Made by Albani Boutje Johanes with NIM 211011060022<br>
    <div style="text-align:center; padding: 1px; ">
        <form action="https://github.com/albanijohanes/ProjectAutomataNFA/blob/main/index.php" target="_blank">
            <button type="submit">This is my source code!</button>
        </form>
    </div>
  
    </p>
    
</body>

</html>
