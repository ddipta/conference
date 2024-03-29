<?php
require_once "mail-sending-script.php";
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <title>Conference Biotechnology</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/main.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        function validate() {
            var valid = true;

            $(".info").html("");
            var userName = document.forms["mailForm"]["userName"].value;
            var userEmail = document.forms["mailForm"]["userEmail"].value;
            var subject = document.forms["mailForm"]["subject"].value;
            var userMessage = document.forms["mailForm"]["userMessage"].value;

            if (userName == "") {
                $("#userName-info").html("(required)");
                $("#userName").css('background-color', '#FFFFDF');
                valid = false;
            }
            if (userEmail == "") {
                $("#userEmail-info").html("(required)");
                $("#userEmail").css('background-color', '#FFFFDF');
                valid = false;
            }
            if (!userEmail.match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {
                $("#userEmail-info").html("(invalid)");
                $("#userEmail").css('background-color', '#FFFFDF');
                valid = false;
            }

            if (subject == "") {
                $("#subject-info").html("(required)");
                $("#subject").css('background-color', '#FFFFDF');
                valid = false;
            }
            if (userMessage == "") {
                $("#userMessage-info").html("(required)");
                $("#userMessage").css('background-color', '#FFFFDF');
                valid = false;
            }
            return valid;
        }

        function addMoreAttachment() {
            $(".attachment-row:last").clone().insertAfter(".attachment-row:last");
            $(".attachment-row:last").find("input").val("");
        }

    </script>


</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #e3f2fd;" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">Conference</a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav text-uppercase ml-auto">
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="program.html">Program</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="reg.php">Registration</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="contact.php">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <header class="reg-head">
        <div class="container">
            <div class="intro-text">
                <div class="intro-lead-in"></div>
                <div class="intro-heading text-uppercase">Submit Abstract</div>
            </div>
        </div>
    </header>

    <!-- Contact -->
    <section class="page-section" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading text-uppercase">Abstract Submission</h2>
                    <h3 class="section-subheading text-muted"></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form class="col-md-12" name="mailForm" id="mailForm" method="post" action="" enctype="multipart/form-data" onsubmit="return validate()">

                        <div class="input-row">
                            <label style="padding-top: 20px;">Name</label> <span id="userName-info" class="info"></span><br /> <input type="text" class="input-field" name="userName" id="userName" />
                        </div>
                        <div class="input-row">
                            <label>Email</label> <span id="userEmail-info" class="info"></span><br /> <input type="text" class="input-field" name="userEmail" id="userEmail" />
                        </div>
                        <div class="input-row">
                            <label>Subject</label> <span id="subject-info" class="info"></span><br /> <input type="text" class="input-field" name="subject" id="subject" />
                        </div>
                        <div class="input-row">
                            <label>Message</label> <span id="userMessage-info" class="info"></span><br />
                            <textarea name="userMessage" id="userMessage" class="input-field" id="userMessage" cols="60" rows="6"></textarea>
                        </div>
                        <div class="attachment-row">
                            <input type="file" class="input-field" name="attachment[]">

                        </div>

                        <div onClick="addMoreAttachment();" class="icon-add-more-attachemnt" title="Add More Attachments">
                            <img src="icon-add-more-attachment.png" alt="Add More Attachments">
                        </div>
                        <div>
                            <input type="submit" name="send" class="btn btn-primary btn-submit" value="Send" />

                            <div id="statusMessage">
                                <?php
                        if (! empty($message)) {
                            ?>
                                <p class='<?php echo $type; ?>Message'><?php echo $message; ?></p>
                                <?php
                        }
                        ?>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <span class="copyright">For more information Contact <br>number 1 <br> number 2</span>
                </div>
                <div class="col-md-6">
                    <span class="copyright">For more information Contact <br>email 1 <br> email 2</span>
                </div>
            </div>
        </div>
    </footer>


    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/agency.min.js"></script>

</body>

</html>
s
