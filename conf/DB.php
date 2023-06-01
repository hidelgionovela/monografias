<?php


define('DATABASE', 'monografias');
define('HOST', 'localhost');
define('DBUSER', 'root');
define('DBPASS', '');

try {
    $db = new PDO('mysql:host=' . HOST . '; dbname=' . DATABASE, DBUSER, DBPASS);
} catch (Exception $e) {
    echo $e->getMessage();
}


function create($sql = "", $dados = []): int
{
    global $db;

    $stmt  = $db->prepare($sql);

    $stmt->execute($dados);

    return $stmt->rowCount();
}


function read($sql = '', $dados = []): array
{
    global $db;

    $stmt  = $db->prepare($sql);

    $stmt->execute($dados);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function readOne($sql = '', $dados = [])
{
    global $db;

    $stmt  = $db->prepare($sql);

    $stmt->execute($dados);

    return $stmt->fetch(PDO::FETCH_ASSOC);
}



function update($sql = '', $dados = []): int
{
    global $db;

    $stmt  = $db->prepare($sql);

    $stmt->execute($dados);

    return $stmt->rowCount();
}



function delete($sql = '', $dados = []): int
{
    global $db;

    $stmt  = $db->prepare($sql);

    $stmt->execute($dados);

    return $stmt->rowCount();
}



function buscarEstudanteId($nr)
{

    $res = array();
    global $db;
    $cmd = $db->prepare("SELECT id FROM estudante WHERE nome = :nr");
    $cmd->bindValue(":nr", $nr);
    $cmd->execute();
    $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
    for ($i = 0; $i < count($res); $i++) {
        foreach ($res[$i] as $k => $v) {
            $id = $v;
        }
    }

    return $id;
}




function buscaEstudante()
{

    $res = array();
    global $db;
    $cmd = $db->prepare("SELECT id,nome FROM estudante");
    $cmd->execute();
    $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
    return $res;
}
