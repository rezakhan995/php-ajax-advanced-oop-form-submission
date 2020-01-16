<?php

/**
 * Created by PhpStorm.
 * User: rezakhan
 * Date: 11/26/2019
 * Time: 11:59 PM
 */
class Validate
{
    /**
     * Validate constructor.
     */
    public function __construct()
    {
    }

    function isNumber($data)
    {
        return is_numeric($data);
    }

    function isPhone($phone)
    {
        return preg_match("/(^(880){1}(1|2){1}(\d){7,9})$/", $phone);
    }

    function isCity($city)
    {
        return preg_match("/^[a-zA-Z ]{2,20}$/", $city);
    }

    function isEmail($email)
    {
        return preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-_]+\.[a-zA-Z]{2,6}$/", $email);
    }

    function isOnlyText($data)
    {
        return preg_match("/^[a-zA-Z]{2,20}$/", $data);
    }

    function isBuyer($buyer)
    {
        return preg_match("/^[a-zA-Z 0-9]{2,20}$/", $buyer);
    }

    function isItem($item)
    {
        return preg_match("/^[a-zA-Z ,]{2,255}$/", $item);
    }
}