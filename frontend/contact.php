<?php
require('top.php');
require('config.php');
// $sql = "select * from contact";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <script src="javascript/index.js"></script>
    <link rel="stylesheet" href="css_folder_for_frent/categories.css?v=<?=$version?>">
</head>
<body>
<div class="main_products">
    <div class="inner1_product">
        <img src="image/contact.webp" alt="">
    </div>
  </div>
  <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d6771.288258595927!2d75.61391593068848!3d31.943417819124807!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391b992eba402989%3A0xecb3054c78e89b2a!2sSwami%20Premanand%20Mahavidyalaya!5e0!3m2!1sen!2sin!4v1707749352665!5m2!1sen!2sin" width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
  <div class="contact-container">
    <h3 class="h3cont"> Feedback :</h3>
    <form action="send.php" method="post">
        <input type="text" id="name" class="input" name="name" placeholder="Your Name" required>
        <input type="text" id="email" class="input-2" name="email" placeholder="Email" required>
        <input type="text" id="mobile" class="input-3" name="mobile" placeholder="Mobile"><br>
        <textarea name="comment" id="message" cols="30" rows="10" placeholder="Your Message" required></textarea><br>
        <button type="submit" class="btn2" value="send message">Send Message</button>
    </form>
  </div>
 
</body>

</html>
<?php
require('footer.php');
?>
