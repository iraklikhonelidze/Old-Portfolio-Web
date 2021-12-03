<?php
include_once 'connection.php';

if (isset($_POST['submit'])) {

    $name = $_POST['message-from'];
    $email = $_POST['message-from-email'];
    $title = $_POST['message-title'];
    $content = $_POST['message-text'];

    if (empty($name) || empty($email) || empty($title) || empty($content)) {
        header("Location: ../message.php?send=empty");
    }else{
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            header("Location: ../message.php?send=invalidemail");
        }
        else{
            $sql = "INSERT INTO messages (m_name, m_email, m_title, m_content) VALUES ('$name','$email','$title','$content');";
            mysqli_query($conn, $sql);
            header("Location: ../message.php?send=success");
        }
    }
}
else{
    header("Location: ../message.php?send=error");
}

?>