<!-- PHP Code for E-mail Submission -->
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
        $result='<div class="center white-text green successMail">Thank You! I will be in touch soon.</div>';
    } else {
        $result='<div class="center white-text red errorMail">Sorry there was an error sending your message. Please try again later.</div>';
    }
}
    }
?>

<!-- BEGIN HTML -->
<!DOCTYPE html>
<html>
    <head>
        <title>Contact</title>
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    </head>
<body>

<!-- Navbar -->
    <nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">James Hornung</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="/index">Main</a></li>
        <li><a href="/about">About</a></li>
        <li><a href="/portfolio">Portfolio</a></li>
        <li><a href="contact.php">Connect</a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="/index">Main</a></li>
        <li><a href="/about">About</a></li>
        <li><a href="/portfolio">Portfolio</a></li>
        <li><a href="contact.php">Connect</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>

<!-- CONTACT FORM -->
    <div class="section no-pad-bot" id="index-banner">
        <div class="container">
            <div class="row">
                <form role="form" method="post" action="contact.php">
                    <h2 class="center">Contact Me</h2>
                    <div class="input-field col s6 offset-s3">
                        <input type="text" name="name" placeholder="Name" class="validate" value="<?php echo htmlspecialchars($_POST['name']); ?>">
                    <?php echo "<p class='red-text center'>$errName</p>";?>
                    </div>
                    <div class="input-field col s6 offset-s3">
                        <input type="email" name="email" placeholder="E-Mail" class="validate" value="<?php echo htmlspecialchars($_POST['email']); ?>">
                    <?php echo "<p class='red-text center'>$errEmail</p>";?>
                    </div>
                    <div class="input-field col s6 offset-s3">
                        <textarea class="materialize-textarea" placeholder="Message" name="message" value="<?php echo htmlspecialchars($_POST['message']); ?>"></textarea>
                    <?php echo "<p class='red-text center'>$errMessage</p>";?>
                    </div>
                    <div class="input-field col s6 offset-s3 buttonHolder" id="buttonHolder">
                        <input id="submit" name="submit" type="submit" value="Send" class="btn btn-primary">
                    </div>
                    <div class="input-field col s6 offset-s3">
                    <?php echo $result; ?>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
  <div class="section">
    <footer class="page-footer orange">
      <div class="container">
        <div class="row">
          <!-- Social Media Links -->
          <div class="col l6 s12">
            <p class="grey-text text-lighten-4">Connect With Me:</p>
            <div id="socialLinks">
              <a href="https://github.com/jameshornung" target="_blank"><img src="images/github.png" class="img-responsive socialLink" alt="Github Logo"></a>
              <a href="https://www.linkedin.com/in/james-hornung-84526311b" target="_blank"><img src="images/linkedin.png" class="img-responsive socialLink" alt="Linked In Logo"></a>
              <a href="http://stackoverflow.com/users/6367428/james-hornung?tab=profile" target="_blank"><img src="images/stackOverflow.png" class="img-responsive socialLink" alt="Stack Overflow Logo"></a>
            </div>
          </div>
          <!-- Empty Div -->
          <div class="col l3 s12">
          </div>
          <!-- Website Links -->
          <div class="col l3 s12">
            <ul>
              <li><a class="white-text" href="/index">Main</a></li>
              <li><a class="white-text" href="/about">About</a></li>
              <li><a class="white-text" href="/portfolio">Portfolio</a></li>
              <li><a class="white-text" href="contact.php">Connect</a></li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
  </div>

    <script src="https://code.jquery.com/jquery-3.1.0.min.js"   integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s="   crossorigin="anonymous"></script>
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
</body>

</html>