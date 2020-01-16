<?php

/**
 * Created by PhpStorm.
 * User: rezakhan
 * Date: 11/26/2019
 * Time: 11:29 PM
 */


if (!empty($_POST)) {
    include './ip/UserInfo.php';
    include './db/connection.php';
    include './Validate.php';

    $formData = array();
    $formData["amount"] = $amount = $_POST['amount'];
    $formData["buyer"] = $buyer = $_POST['buyer'];
    $formData["receipt_id"] = $receipt_id = $_POST['receipt_id'];
    $formData["items"] = $items = $_POST['items'];
    $formData["buyer_email"] = $buyer_email = $_POST['buyer_email'];
    $formData["note"] = $note = $_POST['note'];
    $formData["city"] = $city = $_POST['city'];
    $formData["phone"] = $phone = $_POST['phone'];
    $formData["entry_by"] = $entry_by = $_POST['entry_by'];

    $timezone_name = $_POST['timezone'];
    date_default_timezone_set($timezone_name);
    $formData["entry_date"] = date("Y-m-d");

    $c_info = new UserInfo();
    $formData["buyer_ip"] = $c_info->get_ip();

    $salt = random_bytes(5);
    $hash_key = $receipt_id . $salt;
    $formData["hash_key"] = hash('sha512', $hash_key);


    /**
     * validation starts here
     */
    $errorArray = array();

    $validate = new Validate();
    if (!$validate->isNumber($amount)) {
        array_push($errorArray, "Amount must be a number");
    }
    if (!$validate->isNumber($entry_by)) {
        array_push($errorArray, "Entry By must be a number");
    }
    if (!$validate->isNumber($phone) || !$validate->isPhone($phone)) {
        array_push($errorArray, "Invalid phone number.");
    }
    if (!$validate->isCity($city)) {
        array_push($errorArray, "Invalid city.");
    }
    if (strlen($note) > 30) {
        array_push($errorArray, "Note must be less than 30 characters.");
    }
    if (!$validate->isEmail($buyer_email)) {
        array_push($errorArray, "Invalid email.");
    }
    if (!$validate->isOnlyText($receipt_id)) {
        array_push($errorArray, "Invalid receipt.");
    }
    if (!$validate->isBuyer($buyer)) {
        array_push($errorArray, "Invalid buyer.");
    }
    if (!$validate->isItem($items)) {
        array_push($errorArray, "Invalid items.");
    }

    if (count($errorArray) > 0) {
        print_r($errorArray);
    } else if (isset($_COOKIE["report_site"])) {
        $cookie = stripslashes($_COOKIE["report_site"]);
        $cookie = json_decode($cookie);
        $cookie_identifier = $cookie->unique_identifier;
        $cookie_email = $cookie->email;
        $cookie_os = $cookie->os;
        $cookie_ip = $cookie->ip;
        if ((($cookie_identifier == md5($c_info->get_ip())) ||
            $cookie_email == $buyer_email ||
            $cookie_ip == $c_info->get_ip() ||
            $cookie_os == $c_info->get_os())
        ) {
            echo "Can not resubmit within 24 hours of previous submission.";
        } else {
            $dbConnection = new Connection();
            $insertAndGetId = $dbConnection->returnId()->insert("tbl_report", $formData);
            if ($insertAndGetId > 0) {
                $object = new StdClass();
                $object->unique_identifier = md5($c_info->get_ip());
                $object->email = $buyer_email;
                $object->os = $c_info->get_os();
                $object->ip = $c_info->get_ip();
                $cookieJson = json_encode($object);
                setcookie("report_site", $cookieJson, time() + 86400);
                echo "true";
            } else {
                echo "Error 404: Try again later!";
            }
        }
    } else {
        //insert in database
        $dbConnection = new Connection();
        $insertdata = $dbConnection->insert("tbl_report", $formData);
        if ($insertdata) {
            $object = new StdClass();
            $object->unique_identifier = md5($c_info->get_ip());
            $object->email = $buyer_email;
            $object->os = $c_info->get_os();
            $object->ip = $c_info->get_ip();
            $cookieJson = json_encode($object);
            setcookie("report_site", $cookieJson, time() + 86400);
            echo "true";
        } else {
            echo "Error 404: Try again later!";
        }
    }
}
?>