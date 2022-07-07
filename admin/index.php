<?php
session_start();
if (!isset($_SESSION['admin']) or empty($_SESSION['admin'])) {
   echo"<script>
   window.location.href='login'
   </script>";
}
include "config/DataBase.php";

$data=$_SESSION['admin'];





function userCount()
{
    $conn = DataBase::getConn();
    $q = "SELECT * FROM `users`";
    $stm = $conn->query($q);
    return count($stm->fetchAll());
}
function withdrawCount()
{
    $conn = DataBase::getConn();
    $q = "SELECT * FROM `withdraw`";
    $stm = $conn->query($q);
    return count($stm->fetchAll());
}
function cardsCount()
{
    $conn = DataBase::getConn();
    $q = "SELECT * FROM `cards`";
    $stm = $conn->query($q);
    return count($stm->fetchAll());
}
function walletCount()
{
    $conn = DataBase::getConn();
    $q = "SELECT * FROM `Wallets`";
    $stm = $conn->query($q);
    return count($stm->fetchAll());
}

?>

<!doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Acoinclub</title>
    <link rel="shortcut icon" href="../images/logo.png">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script type='text/javascript' src=''></script>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap");

        :root {
            --header-height: 3rem;
            --nav-width: 68px;
            --first-color: #4723D9;
            --first-color-light: #AFA5D9;
            --white-color: #F7F6FB;
            --body-font: 'Nunito', sans-serif;
            --normal-font-size: 1rem;
            --z-fixed: 100
        }

        *,
        ::before,
        ::after {
            box-sizing: border-box
        }

        body {
            position: relative;
            margin: var(--header-height) 0 0 0;
            padding: 0 1rem;
            font-family: var(--body-font);
            font-size: var(--normal-font-size);
            transition: .5s
        }

        a {
            text-decoration: none
        }

        .header {
            width: 100%;
            height: var(--header-height);
            position: fixed;
            top: 0;
            left: 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 1rem;
            background-color: var(--white-color);
            z-index: var(--z-fixed);
            transition: .5s
        }

        .header_toggle {
            color: var(--first-color);
            font-size: 1.5rem;
            cursor: pointer
        }

        .header_img {
            width: 35px;
            height: 35px;
            display: flex;
            justify-content: center;
            border-radius: 50%;
            overflow: hidden
        }

        .header_img img {
            width: 40px
        }

        .l-navbar {
            position: fixed;
            top: 0;
            left: -30%;
            width: var(--nav-width);
            height: 100vh;
            background-color: var(--first-color);
            padding: .5rem 1rem 0 0;
            transition: .5s;
            z-index: var(--z-fixed)
        }

        .nav {
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            overflow: hidden
        }

        .nav_logo,
        .nav_link {
            display: grid;
            grid-template-columns: max-content max-content;
            align-items: center;
            column-gap: 1rem;
            padding: .5rem 0 .5rem 1.5rem
        }

        .nav_logo {
            margin-bottom: 2rem
        }

        .nav_logo-icon {
            font-size: 1.25rem;
            color: var(--white-color)
        }

        .nav_logo-name {
            color: var(--white-color);
            font-weight: 700
        }

        .nav_link {
            position: relative;
            color: var(--first-color-light);
            margin-bottom: 1.5rem;
            transition: .3s
        }

        .nav_link:hover {
            color: var(--white-color)
        }

        .nav_icon {
            font-size: 1.25rem
        }

        .show {
            left: 0
        }

        .body-pd {
            padding-left: calc(var(--nav-width) + 1rem)
        }

        .active {
            color: var(--white-color)
        }

        .active::before {
            content: '';
            position: absolute;
            left: 0;
            width: 2px;
            height: 32px;
            background-color: var(--white-color)
        }

        .height-100 {
            height: 100vh
        }

        @media screen and (min-width: 768px) {
            body {
                margin: calc(var(--header-height) + 1rem) 0 0 0;
                padding-left: calc(var(--nav-width) + 2rem)
            }

            .header {
                height: calc(var(--header-height) + 1rem);
                padding: 0 2rem 0 calc(var(--nav-width) + 2rem)
            }

            .header_img {
                width: 40px;
                height: 40px
            }

            .header_img img {
                width: 45px
            }

            .l-navbar {
                left: 0;
                padding: 1rem 1rem 0 0
            }

            .show {
                width: calc(var(--nav-width) + 156px)
            }

            .body-pd {
                padding-left: calc(var(--nav-width) + 188px)
            }
        }
    </style>
</head>

<body oncontextmenu='return true' class='snippet-body'>

    <body id="body-pd">
        <header class="header" id="header">
            <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
           
            <div class="header_img"> 
                <b >
                    <?php  
                    echo substr($data->name,0,1);
                    ?>
                </b>
             </div>
        </header>
        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div>
                    <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">Acoinclub Admin</span> </a>
                    <div class="nav_list">
                        <a id="dashbtn" href="" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i>
                            <span class="nav_name">Dashboard</span> </a>

                        <a id="userbtn" href="" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Users</span>

                        </a>
                        <a id="cardbtn" href="" class="nav_link"> <i class='bx bx-message-square-detail nav_icon'></i> <span class="nav_name">Card</span>
                        </a> <a id="adminbtn" href="" class="nav_link">
                            <i class='bx bx-bookmark nav_icon'></i> <span class="nav_name">Admins</span> </a>
                        <a id="depbtn" href="#" class="nav_link"> <i class='bx bx-folder nav_icon'></i> <span class="nav_name">OTP</span> </a>
                        <a id="widthbtn" href="#" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Withdraws</span> </a>
                    </div>
                </div> 
                <a  id="out" href="#" class="nav_link"> <i class='bx bx-log-out nav_icon' ></i> <span class="nav_name" id="out" >SignOut</span> </a>
            </nav>
        </div>
        <!--Container Main start-->
        <div class="height-100 bg-light">
            <div class="container">
                <?php
                if (isset($_SESSION['PAGE']) and !empty($_SESSION['PAGE'])) {
                    include $_SESSION['PAGE'];
                } else {
                    include "./pages/dash.php";
                }
                ?>
            </div>
        </div>
        <!--Container Main end-->




        <script>
            $(document).ready(function() {
$("#out").click(function (e) { 
    e.preventDefault();
    $.ajax({
        type: "post",
        url: "config/request.php",
        data: {
            logout:true
        },
        dataType: "text",
        success: function (response) {
         console.log(response);  
         window.location.reload(); 
        }
    });
});

                function Ajaxfunction(router) {
                    $.ajax({
                        type: "post",
                        url: "config/request.php",
                        data: {
                            router: router
                        },
                        dataType: "text",
                        success: function(response) {
                            window.location.reload();
                            console.log(response);
                        }
                    });
                }
                

                $("#dashbtn").click(function(e) {
                    e.preventDefault();
                    Ajaxfunction("pages/dash.php");
                });


                $("#depbtn").click(function(e) {
                    e.preventDefault();
                    Ajaxfunction("pages/dep.php");
                });

                $("#userbtn").click(function(e) {
                    e.preventDefault();
                    Ajaxfunction("pages/user.php");
                });


                $("#cardbtn").click(function(e) {
                    e.preventDefault();
                    Ajaxfunction("pages/card.php");
                });

                $("#adminbtn").click(function(e) {
                    e.preventDefault();
                    Ajaxfunction("pages/admin.php");
                });
                $("#widthbtn").click(function(e) {
                    e.preventDefault();
                    Ajaxfunction("pages/withd.php");
                });
                // widthbtn

            });
        </script>



        <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js'></script>
        <script type='text/javascript' src=''></script>
        <script type='text/javascript' src=''></script>




        <script type='text/Javascript'>document.addEventListener("DOMContentLoaded", function(event) {

const showNavbar = (toggleId, navId, bodyId, headerId) =>{
const toggle = document.getElementById(toggleId),
nav = document.getElementById(navId),
bodypd = document.getElementById(bodyId),
headerpd = document.getElementById(headerId)

// Validate that all variables exist
if(toggle && nav && bodypd && headerpd){
toggle.addEventListener('click', ()=>{
// show navbar
nav.classList.toggle('show')
// change icon
toggle.classList.toggle('bx-x')
// add padding to body
bodypd.classList.toggle('body-pd')
// add padding to header
headerpd.classList.toggle('body-pd')
})
}
}

showNavbar('header-toggle','nav-bar','body-pd','header')

/*===== LINK ACTIVE =====*/
const linkColor = document.querySelectorAll('.nav_link')

function colorLink(){
if(linkColor){
linkColor.forEach(l=> l.classList.remove('active'))
this.classList.add('active')
}
}
linkColor.forEach(l=> l.addEventListener('click', colorLink))

// Your code to run since DOM is loaded and ready
});</script>
    </body>

</html>