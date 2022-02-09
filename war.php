$pehota = [
    'health' => 100,
    'armour' => 10,
    'damage' => 10,
];

$luchniki = [
    'health' => 100,
    'armour' => 5,
    'damage' => 20,
];

$konnica = [
    'health' => 300,
    'armour' => 30,
    'damage' => 30,
];

$army1 = [
    'name' => 'Александр Ярославич',
    'units' => [
        'pehota' => 200,
        'luchniki' => 30,
        'konnica' => 15,
    ]
];
$army2 = [
    'name' => 'Ульф Фасе',
    'units' => [
        'pehota' => 90,
        'luchniki' => 65,
        'konnica' => 25,
    ]
];

$damage1 = 0;
$health1 = 0;
foreach ($army1['units'] as $unit => $count) {
    $damage1 += ${$unit}['damage'] * $count;
    $health1 += ${$unit}['health'] * $count + ${$unit}['armour'] * $count;
}

$damage2 = 0;
$health2 = 0;
foreach ($army2['units'] as $unit => $count) {
    $damage2 += ${$unit}['damage'] * $count;
    $health2 += ${$unit}['health'] * $count + ${$unit}['armour'] * $count;
}

//function calc_army_damage_health ($army) use ($pehota, $luchniki, $konnica)
//{
//    $damage = 0;
//    $health = 0;
//
//    foreach ($army['units'] as $unit => $count) {
//        $damage += ${$unit}['damage'] * $count;
//        $health += ${$unit}['health'] * $count + ${$unit}['armour'] * $count;
//    }
//
//    return ['damage' => $damage, 'health' => $health];
//};

?>

<table border="1">
    <tr>
        <th></th>
        <th><?=$army1['name']?></th>
        <th><?=$army2['name']?></th>
    </tr>
    <tr>
        <th>Army units:</th>
        <td>unit1 (count), unit2(count), ...</td>
        <td>unit1 (count), unit2(count), ...</td>
    </tr>
<?php
$duration = 0;
while ($health1 >= 0 && $health2 >= 0) {
    $health1 -= $damage2;
    $health2 -= $damage1;
    $duration++;
}
?>
    <tr>
        <th>Health after <?=$duration?> hits:</th>
        <td><?=$health1?></td>
        <td><?=$health2?></td>
    </tr>
    <tr>
        <th>Result</th>
        <td><?=$health1 > $health2 ? 'WINNER' : 'LOOSER'?></td>
        <td><?=$health2 > $health1 ? 'WINNER' : 'LOOSER'?></td>
    </tr>
</table>
<?php