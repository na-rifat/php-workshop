<?php
$route = [
    'Rajshahi'   => [
        'Mymensing' => 120,
        'Dhaka'     => 250,
        'Barishal'  => 360,
    ],
    'Mymensing'  => [
        'Rajshahi' => 240,
        'Dhaka'    => 110,
        'Habiganj' => 310,
    ],
    'Chattagram' => [
        'Habiganj' => 290,
        'Barisal'  => 230,
    ],
    'Dhaka'      => [
        'Rajshahi'   => 250,
        'Mymensingh' => 110,
        'Habiganj'   => 170,
        'Barisal'    => 250,
    ],
    'Habiganj'   => [
        'Mymensing'  => 310,
        'Chattagram' => 290,
        'Dhaka'      => 170,
        'Barisal'    => 340,
    ],
    'Barisal'    => [
        'Rajshahi'   => 360,
        'Chattagram' => 230,
        'Dhaka'      => 250,
        'Habiganj'   => 340,
    ],
];

require_once 'inc/Dijkstra.php';

$itenary = new Dijkstra( $route );

$itenary->shortest_path( 'Dhaka', 'Mymensingh' );