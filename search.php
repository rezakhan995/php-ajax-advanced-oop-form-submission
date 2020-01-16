<?php
/**
 * Created by PhpStorm.
 * User: rezak
 * Date: 11/27/2019
 * Time: 1:40 AM
 */
include './db/connection.php';

if (!empty($_POST)) {
    $buyer = $_POST["buyer"];
    $from = $_POST["from"];
    $to = $_POST["to"];

    $dbConnection = new Connection();

    if ($buyer != "" && $from != "" && $to != "") {
        $searchResult = $dbConnection->select("*")->from("tbl_report")->where("buyer", "=", $buyer)->and_where("entry_date", ">=", $from)->and_where("entry_date", "<=", $to)->get();
        echo json_encode($searchResult);
    } else if ($buyer == "" && $from == "" && $to == "") {
        $searchResult = $dbConnection->select("*")->from("tbl_report")->get();
        echo json_encode($searchResult);
    } else if ($buyer == "" && $from == "" && $to != "") {
        $searchResult = $dbConnection->select("*")->from("tbl_report")->where("entry_date", "<=", $to)->get();
        echo json_encode($searchResult);
    } else if ($buyer == "" && $from != "" && $to == "") {
        $searchResult = $dbConnection->select("*")->from("tbl_report")->where("entry_date", ">=", $from)->get();
        echo json_encode($searchResult);
    } else if ($buyer == "" && $from != "" && $to != "") {
        $searchResult = $dbConnection->select("*")->from("tbl_report")->where("entry_date", ">=", $from)->and_where("entry_date", "<=", $to)->get();
        echo json_encode($searchResult);
    } else if ($buyer != "" && $from == "" && $to == "") {
        $searchResult = $dbConnection->select("*")->from("tbl_report")->where("buyer", "=", $buyer)->get();
        echo json_encode($searchResult);
    } else if ($buyer != "" && $from == "" && $to != "") {
        $searchResult = $dbConnection->select("*")->from("tbl_report")->where("buyer", "=", $buyer)->and_where("entry_date", "<=", $to)->get();
        echo json_encode($searchResult);
    } else if ($buyer != "" && $from != "" && $to == "") {
        $searchResult = $dbConnection->select("*")->from("tbl_report")->where("buyer", "=", $buyer)->and_where("entry_date", ">=", $from)->get();
        echo json_encode($searchResult);
    }
}