<?php
require 'Message.php';

class Logger
{
    public string $message;

    public static function regLog()
    {
        $info = [];
        $info[] = date('Y-m-d H:i:s');
        $info[] = $_SERVER['HTTP_USER_AGENT'];

        if (!$_POST['name']) $info[] = Message::NO_NAME;

        if (!$_POST['surname']) $info[] = Message::NO_SURNAME;

        $check = strripos($_POST['email'], '@');

        if ($check === false) $info[] = Message::WRONG_EMAIL_ADDRESS;

        if (!$_POST['password']) $info[] = Message::NO_PASSWORD;

        if ($_POST['password'] !== $_POST['repeat_password']) $info[] = Message::PASSWORDS_DO_NOT_MATCH;

        if (PeopleCollection::checkEmail($_POST['email'])) $info[] = Message::USER_ALREADY_EXISTS;


        if (!in_array(Message::NO_NAME, $info)
            and !in_array(Message::NO_SURNAME, $info)
            and !in_array(Message::WRONG_EMAIL_ADDRESS, $info)
            and !in_array(Message::NO_PASSWORD, $info)
            and !in_array(Message::PASSWORDS_DO_NOT_MATCH, $info)
            and !in_array(Message::USER_ALREADY_EXISTS, $info)
        ) {
            $info[] = Message::SUCCESS;
        }

        $data = implode("|", $info);
        file_put_contents('logs.txt', $data . "\n", FILE_APPEND);
    }

}