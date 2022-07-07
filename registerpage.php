<?php
// require("reghead.php");
require 'app/Apis/database/DataBase.php';
// if (DataBase::is_login()) {

//     header('location:client');
// }


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        window.mmDataLayer = window.mmDataLayer || [];

        function mmData(o) {
            mmDataLayer.push(o);
        }
    </script>
    <title>Acoinclub</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni" crossorigin="anonymous">

    <!-- ---- style and font Links ---- -->
    <link rel="stylesheet" href="css/regpagestyle.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="jquery-3.5.1.min.js"></script>
    <script src="https://www.w3schools.com/lib/w3.js"></script>
    <script src="https://kit.fontawesome.com/e20b2f8784.js" crossorigin="anonymous"></script>
    <!-- <title>Homepage</title> -->

    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Autoplay CSS Slideshow Demo</title> -->
    <!-- <meta name="description" content="Lets have a look demo of autoplay slideshow which build with purely CSS. There is no javasript require to handle its sliding functions." /> -->
    <!-- <meta name="author" content="Codeconvey" /> -->
    <!--Only for demo purpose - no need to add.-->
    <link rel="stylesheet" type="text/css" href="css/slidedemo.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/slidememe.css" />
    <script src="js/jq.js"></script>
    <!--dont toch-->
    <script src="https://www.momentcrm.com/embed"></script>
    <script>
        MomentCRM('init', {
            'teamVanityId': 'alocryptotrade',
            'doChat': true,
            'doTracking': true,
        });
    </script>
    </script>
    <script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <!--dont toch-->
</head>

<body>
    <?php
    // require "navbar.php";

    ?>
    <br>


    <div class="wrapper">

        <div class="maincontainer">
            <div class="slidecontainer" style="padding-left:40px;">
                <?php
                require "regsliders.php";
                ?>
            </div>

            <div class="formcontainer">
                <br />
                <div class="formbody">
                    <!-- ---- form container ----  -->
                    <div class="form-main-wrapper">

                        <!-- ----- the mini display head ----  -->
                        <div class="min-display w3-container">
                            <label class="w3-left">
                                <img src="images/logo.png" alt="logo" width="auto" height="80px">
                            </label>
                            <label class="w3-right">
                                <a class="back" href="home">
                                    <h3 class="back"><i class="fa fa-angle-double-left back1"></i>&nbsp; Back to main
                                    </h3>
                                </a>
                            </label>
                        </div>

                        <!-- ----- the max display head ----  -->
                        <div class="max-display">
                            <a class="back" href="home">
                                <h3 class="back" id="bac"><i class="fa fa-angle-double-left back1"></i>&nbsp; Back to main</h3>
                            </a>
                        </div>
                        <!-- --- the Topic -- -- -->
                        <h1 class="topic"> Create your account </h1>
                        <!-- ---- sub topic ---  -->
                        <p>
                            Securely buy crypto and start trading on a trusted exchange
                        </p>

                        <br /> <br />
                        <!-- --- Form container -- ---  -->
                        <div class="formwrapper">
                            <form id="regform" action="auth1" method="post">
                                <!-- ----- ----- Email Address --- ----  -->
                                <input type="hidden" name="action" value="register">
                                <input type="hidden" name="message" id="message" value="
                                <?php

                                if (isset($_SESSION['message']) and !empty($_SESSION['message'])) {
                                    echo $_SESSION['message'];
                                    $_SESSION['message'] = "";
                                }

                                ?>
                                ">
                                <div class="group">
                                    <input class="input" required type="text" name="email" id="email">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label class="w3-padding-large label">Email Address</label>
                                </div>
                                <!--- --- Password selection ----- ------  -->
                                <div class="group">
                                    <input class="input" type="password" required name="password" id="password">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label class="w3-padding-large label">Password</label>
                                </div>

                                <!--- --- Comfirm Password selection ----- ------  -->
                                <div class="group">
                                    <input class="input" type="password" required name="cpassword" id="cpassword">
                                    <span class="highlight"></span>
                                    <span class="bar"></span>
                                    <label class="w3-padding-large label">Comfirm password</label>
                                </div>


                                <!-- ----- -- Agreements --- -------  -->
                                <div class="checkboxes-wrapper">
                                    <!--- --- 1 ---  -->
                                    <div class="checkboxes">
                                        <label class="agreebox container">
                                            <input class="checkbox1"  type="checkbox" name="oksionemail" id="oksionemail">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="agreetxt">
                                            I agree to receive occasional emails and newsletters from Acoinclub.IO
                                        </label>
                                    </div>
                                    <!-- -- -- 2 -- --  -->
                                    <div class="checkboxes">
                                        <label class="agreebox container">
                                            <input class="checkbox1"  type="checkbox" name="okterms" id="okterms">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="agreetxt"> I accept Acoinclub's Terms of Use and Privacy Policy
                                        </label>
                                    </div>
                                </div>
                                <p class="btncon"><button type="submit" id="regbtn" class="w3-button w3-teal w3-round-large w3-hover-light-blue submitbtn">
                                        <label id="current"  class="  ">
                                            Create
                                            account
                                        </label>


                                    </button>

                                </p>
                                <p class="txt"> Already have an account? <b><a href="login">Sign in</a></b></p>
                            </form>
                        </div>
                    </div>
                    <?php

                    ?>
                </div>
            </div>
        </div>

    </div>
    <br />
    <?php

    ?>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
    <!--<script src="myjavacode.js"></script>-->
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->


    <!--<script src="js/reuseable.js"></script>-->
    <script>
        $(document).ready(function() {
            let mess = $("#message").val().trim();
            if (mess != "") {
                swal({
                    title: "Message",
                    text: mess,
                    icon: "info",
                });
            }
            $("#regform").submit(function(e) {
                let cpass = $("#cpassword").val().trim();
                let pass = $("#password").val().trim();
                let contry = $("#country").val().trim();
                let oksionemail = $('#oksionemail')[0].checked
                let okterms = $('#okterms')[0].checked
                if (cpass === pass) {
                    if (contry == "select") {
                        alert("Please choice your country");
                        e.preventDefault();
                    } else {
                        if (okterms == true) {
                            if (oksionemail == true) {

                            } else {
                                swal({
                                title: "Login Error",
                                text: "You need to subscribe",
                                icon: "error",
                            });;
                                e.preventDefault();
                            }
                        } else {
                            swal({
                                title: "Login Error",
                                text: "Accept our licence",
                                icon: "error",
                            });

                            e.preventDefault();
                        }
                    }
                } else {
                    swal({
                        title: "Login Error",
                        text: "Password not match",
                        icon: "error",
                    });
                    e.preventDefault();
                }

                // e.preventDefault();

            });
        });
    </script>

</body>

</html>