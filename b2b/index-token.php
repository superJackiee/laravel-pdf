<?php



require_once("JWT/JWT.php");
$payload = [
    'iat' => time(),
    'iss' => 'app',
    'exp' => time()+5*60,
    'userId' => 1
];

print_r($payload);



echo $token = JWT::encode($payload, 'IMRAN123');
try {
    $jwt = JWT::decode($token, "IMRAN123", ['HS256']);
    print_r($jwt);
} catch (\Throwable $th) {
    print_r($th);
}

?>