<?php
    if (isset($_POST["submit"])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $from = 'Website Contact Form'; 
        $to = 'hornung.james@gmail.com'; 
        $subject = 'Message from Web Visitor ';
        
        $body ="From: $name\n E-Mail: $email\n Message:\n $message";

        // Check if name has been entered
        if (!$_POST['name']) {
            $errName = 'Please enter your name';
        }
        
        // Check if email has been entered and is valid
        if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errEmail = 'Please enter a valid email address';
        }
        
        //Check if message has been entered
        if (!$_POST['message']) {
            $errMessage = 'Please enter your message';
        }
        

// If there are no errors, send the email
if (!$errName && !$errEmail && !$errMessage) {
    if (mail ($to, $subject, $body, $from)) {
        $result='<div class="alert alert-success">Thank You! I will be in touch</div>';
    } else {
        $result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later.</div>';
    }
}
    }
?>



<!DOCTYPE html>
<html>
<head>
    <title>Contact</title>
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body class="grey darken-4">
<div class="container grey lighten-4">

    <!--NAVBAR -->
    <div class="row">
        <div class="col l5 hide-on-med-and-down mainPageHeaderDiv">
            <h4 class="mainPageHeading grey-text text-darken-3">The Woodhouse Group</h4>
        </div>
        <div class="col l7 s12">
            <ul class="right">
                <a class="btn waves-effect waves-light blue darken-3 navButton" href="index.html">Main</a>
                <a class="btn waves-effect waves-light blue darken-3 navButton" href="about.html">About</a>
                <a class="btn waves-effect waves-light blue darken-3 navButton" href="testimonials.html">Testimonials</a>
                <a class="btn waves-effect waves-light blue darken-3 navButton" href="clients.html">Clients</a>
                <a class="btn waves-effect waves-light blue darken-3 navButton" href="contact.php">Contact</a>
            </ul>
            <ul class="side-nav right" id="mobile-demo">
                <li><a href="index">Main</a></li>
                <li><a href="about">About</a></li>
                <li><a href="testimonials">Testimonials</a></li>
                <li><a href="clients">Clients</a></li>
                <li><a href="contact">Contact</a></li>
            </ul>
        </div>
    </div>


        <div class="row">
            <form role="form" method="post" action="contact.php">
                <h2>Contact Us</h2>
                <div class="input-field col s6 offset-s3">
                    <input type="text" name="name" placeholder="Name" class="validate" value="<?php echo htmlspecialchars($_POST['name']); ?>">
                    <?php echo "<p class='red-text center'>$errName</p>";?>
                </div>
                <div class="input-field col s6 offset-s3">
                    <input type="email" name="email" placeholder="e-mail" class="validate" value="<?php echo htmlspecialchars($_POST['email']); ?>">
                    <?php echo "<p class='red-text center'>$errEmail</p>";?>
                </div>
                <div class="input-field col s6 offset-s3">
                    <textarea class="materialize-textarea" placeholder="Message" name="message" value="<?php echo htmlspecialchars($_POST['message']); ?>"></textarea>
                    <?php echo "<p class='red-text center'>$errMessage</p>";?>
                </div>
                <div class="input-field col s6 offset-s3">
                    <input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
                </div>
                <div class="input-field col s6 offset-s3">
                    <?php echo $result; ?>
                </div>
            </form>
        </div>

 <!-- container end?  -->  
</div>

<!-- FOOTER -->
    <div class="footerDiv">
        <footer class="page-footer grey darken-4">
            <div class="container">
                <div class="row">
                    <div class="col s12">
                        <h5 class="grey-text text-lighten-3">The Woodhouse Group</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col s4">
                        <p class="grey-text text-lighten-3">Street Address<br>
                        Austin, TX 78741<br>
                        Phone: 999-999-9999</p>
                    </div>
                    <div class="col s4">
                    </div>
                    <div class="col s4">
                        <ul class="right">
                          <li><a class="footerLinks" href="index.html">- Main</a></li>
                          <li><a class="footerLinks" href="about.html">- About</a></li>
                          <li><a class="footerLinks" href="testimonials.html">- Testimonals</a></li>
                          <li><a class="footerLinks" href="clients.html">- Clients</a></li>
                          <li><a class="footerLinks" href="contact.php">- Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <p class="center copywrightText">© 2016 Steve Holzheauser. All rights reserved. |  Web Design: James Hornung</p>
                </div>
            </div>
        </footer>
    </div>



    <script   src="https://code.jquery.com/jquery-3.1.0.min.js"   integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s="   crossorigin="anonymous"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
</body>

</html>