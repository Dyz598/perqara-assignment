<?php

function getMedianValue($expendituresCountMap, $d)
{
    $isEven = 0 === $d % 2;
    $totalCount = 0;

    if ($isEven) {
        $divider1 = null;
        $divider2 = null;
    }

    foreach ($expendituresCountMap as $expenditure => $count) {
        if ($count > 0) {
            $totalCount += $count;

            if ($isEven) {
                $medianCount = $d/2;
                $count1 = $medianCount;
                $count2 = $medianCount + 1;

                if (null === $divider1 && $totalCount >= $count1) {
                    $divider1 = $expenditure;
                }

                if (null === $divider2 && $totalCount >= $count2) {
                    $divider2 = $expenditure;
                }

                if ($divider1 && $divider2) {
                    return ($divider1 + $divider2) / 2;
                }
            } else {
                $medianCount = ceil($d/2);

                if ($totalCount >= $medianCount) {
                    return $expenditure;
                }
            }
        }
    }

    throw new RuntimeException('Median not found.');
}

function activityNotifications($expenditure, $d) {
    $totalNotifications = 0;
    $expendituresCountMap = [];

    for ($i = 0; $i <= 200; $i++) {
        $expendituresCountMap[$i] = 0;
    }

    for($i = 0; $i < $d; $i++) {
        $expendituresCountMap[$expenditure[$i]] += 1;
    }

    for($i = $d; $i < count($expenditure); $i++) {
        $median = getMedianValue($expendituresCountMap, $d);

        if ($expenditure[$i] >= (2 * $median)) {
            $totalNotifications += 1;
        }

        $expendituresCountMap[$expenditure[$i - $d]] -= 1;
        $expendituresCountMap[$expenditure[$i]] += 1;
    }

    return $totalNotifications;
}

print_r(activityNotifications([2, 3, 4, 2, 3, 6, 8, 4, 5], 5));
print PHP_EOL;