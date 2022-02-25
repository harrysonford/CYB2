<?php

    $db_server = "localhost:3306";
    $db_user = "billing_admin";
    $db_pwd = "123456";
    $dbname = 'billing';
    $charset = 'utf8mb4';

    /* mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    try {
        $db = new mysqli($db_server, $db_user, $db_pwd, $dbname);
        $db->set_charset($charset);
        $db->options(MYSQLI_OPT_INT_AND_FLOAT_NATIVE, 1);
    } catch (\mysqli_sql_exception $e) {
         throw new \mysqli_sql_exception($e->getMessage(), $e->getCode());
    }
    unset($db_server, $dbname, $db_user, $db_pwd, $charset); */