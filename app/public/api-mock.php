<?php

header('Content-Type: application/json');
echo json_encode([
    'time' => time(),
    'number' => random_int(0, 100),
]);
exit;
