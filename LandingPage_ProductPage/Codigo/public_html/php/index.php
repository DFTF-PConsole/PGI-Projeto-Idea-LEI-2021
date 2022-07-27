<?php

if ($_POST['TYPE'] == "email") {
    type_email($_POST['EMAIL']);
} /* else {
    if ($_POST['TYPE'] == "analytics") {
        type_analytics($_POST['CLICK'], $_POST['TEMPO']);
    }
} */

function connect_db(){
    // Config
    $config = parse_ini_file(__DIR__ . "/../../config/db.ini");
    if(!$config){
        die("0" . "Erro ao abrir o ficheiro de configuração da base de dados");
    }

    // Create connection
    $con = mysqli_connect($config['hostname'],$config['username'],$config['password'],$config['db']);

    // Check connection
    if(!$con){
        die("0" . "Erro na ligação à base de dados: " . mysqli_connect_error());
    }
    return $con;
}

function type_email($email) {
    $con = connect_db();

    $query = sprintf("SELECT email FROM inscricao WHERE email='%s'",
        mysqli_real_escape_string($con, $email));
    $result = mysqli_query($con, $query);

    if (!$result) {
        die("0" . "Erro na base de dados: " . mysqli_error($con));
    } else {
        if ($result->num_rows > 0) {
            die("0" . "Email já inscrito");
        }
    }

    $query = sprintf("INSERT INTO inscricao (email) VALUES ('%s')",
        mysqli_real_escape_string($con, $email));
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "1" . "Sucesso";
    } else {
        die("0" . "Erro na base de dados: " . mysqli_error($con));
    }

    mysqli_close($con);
}

/*
function type_analytics($click, $tempo) {
    $con = connect_db();

    // fazer, suspendido
    $query = sprintf("INSERT INTO inscricao (email) VALUES ('%s')",
        mysqli_real_escape_string($con, $email));
    $result = mysqli_query($con, $query);

    if (!$result) {
        die("0" . "Erro na base de dados: " . mysqli_error($con));
    } else {
        if ($result->num_rows > 0) {
            die("0" . "Email já inscrito");
        }
    }

    $query = sprintf("INSERT INTO inscricao (email) VALUES ('%s')",
        mysqli_real_escape_string($con, $email));
    $result = mysqli_query($con, $query);

    if ($result) {
        echo "1" . "Sucesso";
    } else {
        die("0" . "Erro na base de dados: " . mysqli_error($con));
    }

    mysqli_close($con);
} */

