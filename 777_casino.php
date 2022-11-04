<?php
$display = [
    [' ', ' ', ' ', ' ', ' '],
    [' ', ' ', ' ', ' ', ' '],
    [' ', ' ', ' ', ' ', ' ']
];
//symbols for possible display
$symbols = ['7', '#', '$', '@', '?'];
/*echo "Symbol multipliers are as follows : 10X '7'\n7X '$'\n5X'@'";*/

function showDisplay(array $display): array
{
    echo "---------------------\n";
    echo "| {$display[0][0]} | {$display[0][1]} | {$display[0][2]} | {$display[0][3]} | {$display[0][4]} |\n";
    echo "----+---+---+---+---\n";
    echo "| {$display[1][0]} | {$display[1][1]} | {$display[1][2]} | {$display[1][3]} | {$display[1][4]} |\n";
    echo "----+---+---+---+---\n";
    echo "| {$display[2][0]} | {$display[2][1]} | {$display[2][2]} | {$display[2][3]} | {$display[2][4]} |\n";
    echo "---------------------\n\n\n";
    return $display;
}


$fullCombos = [
    //horizontal lines
    [[0, 0], [0, 1], [0, 2], [0, 3], [0, 4]],
    [[1, 0], [1, 1], [1, 2], [1, 3], [1, 4]],
    [[2, 0], [2, 1], [2, 2], [2, 3], [2, 4]],

    //  cross lines
    [[0, 0], [1, 1], [2, 2], [1, 3], [0, 4]],
    [[2, 0], [1, 1], [0, 2], [1, 3], [2, 4]],

];

$halfCombo = [
    //horizontal lines
    [[0, 0], [0, 1], [0, 2]],
    [[1, 0], [1, 1], [1, 2]],
    [[2, 0], [2, 1], [2, 2]],

    //  cross lines
    [[0, 0], [1, 1], [2, 2]],
    [[2, 0], [1, 1], [0, 2]]
];


//player info input - amount of cash
$playerAge = readline("Enter your age :");
if ($playerAge < 18) {
    echo "Grow up little kido, nothing to see here!!!";
    exit;
}

echo 'Welcome to the Ca$ino, prepare to double your $$$$$!' . PHP_EOL;
$balance = readline("Enter the amount of money to buy in ");
echo PHP_EOL;
/*if ($playerMoney < 1) {
   echo "Sorry, the amount of money is invalid! Please choose  larger amount! y_(^_^)_y";}*/


//ongoing game
while (true) {
    echo "You have made pretty penny, your balance is {$balance}!\n";
    $currentBid = readline("Select the amount of money you want to bet and press enter to spin: ");
    if ($balance < $currentBid || $currentBid ==='0') {
        echo "Invalid amount, or your balance is too low! \n";
        continue;
    }
    $balance-=$currentBid;
    for ($i = 0; $i <= sizeof($display) - 1; $i++) {
        for ($j = 0; $j <= sizeof($display[$i]) - 1; $j++) {
            $display[$i][$j] = $symbols[array_rand($symbols)];
        }
    }
    showDisplay($display);





    //calculating winning combos
    $multiplier = 0;


    //First most valuable symbol full line
    foreach ($fullCombos as $combination) {
        $totalCombo = 0;
        foreach ($combination as $position) {
            [$x, $y] = $position;
            if ($display[$x][$y] === $symbols[0])
                $totalCombo++;
        }
        if ($totalCombo === 5) {
            $multiplier += 50;
        }
    }


    //Second most valuable symbol full line
    foreach ($fullCombos as $combination) {
        $totalCombo = 0;
        foreach ($combination as $position) {
            [$x, $y] = $position;
            if ($display[$x][$y] === $symbols[1])
                $totalCombo++;
        }
        if ($totalCombo === 5) {
            $multiplier += 25;
        }
    }

    //third symbol full line
    foreach ($fullCombos as $combination) {
        $totalCombo = 0;
        foreach ($combination as $position) {
            [$x, $y] = $position;
            if ($display[$x][$y] === $symbols[2])
                $totalCombo++;
        }
        if ($totalCombo === 5) {
            $multiplier += 15;
            $totalCombo = 0;
        }
    }

    //4th symbol full line
    foreach ($fullCombos as $combination) {
        $totalCombo = 0;
        foreach ($combination as $position) {
            [$x, $y] = $position;
            if ($display[$x][$y] === $symbols[3])
                $totalCombo++;
        }
        if ($totalCombo === 5) {
            $multiplier += 10;
            $totalCombo = 0;
        }
    }

    //5th full line
    foreach ($fullCombos as $combination) {
        $totalCombo = 0;
        foreach ($combination as $position) {
            [$x, $y] = $position;
            if ($display[$x][$y] === $symbols[4])
                $totalCombo++;
        }
        if ($totalCombo === 5) {
            $multiplier += 5;
        }
    }
//Half combo 1st most valuable symbol
    foreach ($halfCombo as $combination) {
        $totalCombo = 0;
        foreach ($combination as $position) {
            [$x, $y] = $position;
            if ($display[$x][$y] === $symbols[0])
                $totalCombo++;
        }
        if ($totalCombo === 3) {
            $multiplier += 25;
        }
    }
    //half combo second most valuable
    foreach ($halfCombo as $combination) {
        $totalCombo = 0;
        foreach ($combination as $position) {
            [$x, $y] = $position;
            if ($display[$x][$y] === $symbols[1])
                $totalCombo++;
        }
        if ($totalCombo === 3) {
            $multiplier += 15;
        }
    }

    //half combo third most valuable
    foreach ($halfCombo as $combination) {
        $totalCombo = 0;
        foreach ($combination as $position) {
            [$x, $y] = $position;
            if ($display[$x][$y] === $symbols[2])
                $totalCombo++;
        }
        if ($totalCombo === 3) {
            $multiplier += 10;
        }
    }

    //half combo forth most valuable
    foreach ($halfCombo as $combination) {
        $totalCombo = 0;
        foreach ($combination as $position) {
            [$x, $y] = $position;
            if ($display[$x][$y] === $symbols[3])
                $totalCombo++;
        }
        if ($totalCombo === 3) {
            $multiplier += 5;
        }
    }

    //half combo fifth most valuable
    foreach ($halfCombo as $combination) {
        $totalCombo = 0;
        foreach ($combination as $position) {
            [$x, $y] = $position;
            if ($display[$x][$y] === $symbols[4])
                $totalCombo++;
        }
        if ($totalCombo === 3) {
            $multiplier += 2;
        }
    }
    echo "You have won : " . $currentBid * $multiplier . PHP_EOL;
    $balance += $currentBid * $multiplier;

    if ($balance===0) {
        echo "Insufficient funds on your balance! Select the option 1 or 2! \n (1) Deposit more \n (2) Quit!\n";
        $option = readline("");
        switch ($option){
            case "1": $balance = readline("Enter the amount of money you wish to deposit ");
            break;
            case "2": exit;
        }

    }
}




