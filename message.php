<?php
    include 'includes/header.php'
?>



<main>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}
input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}
button[type=submit] {
  background-color: purple;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
button[type=submit]:hover {
  background-color: black;
}
.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}
</style>



<div class="container wrapper">
  <form action="includes/send.php" method="POST">
    <label class="label" for="name">Name</label>
    <input type="text" id="name" name="message-from" placeholder="Your name..">

    <label for="email-from">Your E-mail Address</label>
    <input type="text" id="email-from" name="message-from-email" placeholder="Your last name..">

    <label for="message-about">Subject</label>
    <input type="text" id="message-about" name="message-title" placeholder="Subject of message">

    <label for="message">Message</label>
    <textarea id="message" name="message-text" placeholder="Write something.." style="height:200px"></textarea>

    <button type="submit" name="submit">Send</button>
  </form>

  <?php
  $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

  if (strpos($fullUrl, "send=empty") == true) {
    echo "<br><P style=color:red>You did not fill every field</p>";
    exit();
  }
  elseif (strpos($fullUrl, "send=invalidemail") == true) {
    echo "<br><p style=color:red>You should use valid e-mail</p>";
    exit();
  }
  elseif (strpos($fullUrl, "send=error") == true) {
    echo "<br><P style=color:red>Something Went wrong</p>";
    exit();
  }
  elseif (strpos($fullUrl, "send=success") == true) {
    echo "<br><P style=color:green>Message have been sent !</p>";
    exit();
  }
  ?>

</div>



<?php
    include 'includes/footer.php'
?>