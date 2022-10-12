<?php
require 'PeopleCollection.php';
require 'Logger.php';

$message = '';
$_POST['success'] = false;

if (!$_POST['name']) $message .= Message::NO_NAME . "<br>";

if (!$_POST['surname']) $message .= Message::NO_SURNAME . "<br>";

$check = strripos($_POST['email'], '@');
if ($check === false) $message .= Message::WRONG_EMAIL_ADDRESS . "<br>";

if (!$_POST['password']) $message .= Message::NO_PASSWORD . "<br>";

if ($_POST['password'] !== $_POST['repeat_password']) $message .= Message::PASSWORDS_DO_NOT_MATCH . "<br>";

if (PeopleCollection::checkEmail($_POST['email'])) $message .= Message::USER_ALREADY_EXISTS . "<br>";

if ($message !== '') { ?>
    <div class="alert alert-danger" role="alert">
        <?php echo "$message"; ?>
    </div>
<?php } else { ?>
    <script>
        $(document).ready(function () {
            $("#success").html("</br><div class='alert alert-primary' role='alert'><?php echo Message::SUCCESS; ?></div>");
        });
    </script>
<?php }
Logger::regLog();
?>

