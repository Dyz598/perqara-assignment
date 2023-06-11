<?php

function queensAttack($n, $r_q, $c_q, $obstacles) {
    $obstaclesMap = [];
    $count = 0;

    foreach ($obstacles as $item) {
        $obstaclesMap[$item[0]][$item[1]] = 1;
    }

    // up
    $y = $r_q;
    $x = $c_q;
    while ($y < $n) {
        $y += 1;

        if (isset($obstaclesMap[$y][$x])) {
            break;
        } else {
            $count += 1;
        }
    }

    // down
    $y = $r_q;
    $x = $c_q;
    while ($y > 1) {
        $y -= 1;

        if (isset($obstaclesMap[$y][$x])) {
            break;
        } else {
            $count += 1;
        }
    }

    // right
    $y = $r_q;
    $x = $c_q;
    while ($x < $n) {
        $x += 1;

        if (isset($obstaclesMap[$y][$x])) {
            break;
        } else {
            $count += 1;
        }
    }

    // left
    $y = $r_q;
    $x = $c_q;
    while ($x > 1) {
        $x -= 1;

        if (isset($obstaclesMap[$y][$x])) {
            break;
        } else {
            $count += 1;
        }
    }

    // top right
    $y = $r_q;
    $x = $c_q;
    while ($y < $n && $x < $n) {
        $y += 1;
        $x += 1;

        if (isset($obstaclesMap[$y][$x])) {
            break;
        } else {
            $count += 1;
        }
    }

    // top left
    $y = $r_q;
    $x = $c_q;
    while ($y < $n && $x > 1) {
        $y += 1;
        $x -= 1;

        if (isset($obstaclesMap[$y][$x])) {
            break;
        } else {
            $count += 1;
        }
    }

    // bottom right
    $y = $r_q;
    $x = $c_q;
    while ($y > 1 && $x < $n) {
        $y -= 1;
        $x += 1;

        if (isset($obstaclesMap[$y][$x])) {
            break;
        } else {
            $count += 1;
        }
    }

    // bottom left
    $y = $r_q;
    $x = $c_q;
    while ($y > 1 && $x > 1) {
        $y -= 1;
        $x -= 1;

        if (isset($obstaclesMap[$y][$x])) {
            break;
        } else {
            $count += 1;
        }
    }

    return $count;
}

print_r(queensAttack(
    5, 4, 3,
    [
        [5,5],
        [4,2],
        [2,3]
    ]
));
print PHP_EOL;