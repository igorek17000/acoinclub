<?php

include 'database/DataBase.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = DataBase::getConn();
    $user = $_SESSION['USER'];
    // verifieotp
    if (isset($_REQUEST['verifieotp'])) {
        try {
            parse_str($_REQUEST['verifieotp'], $data);
            $q = "SELECT * FROM `otp` WHERE `uid`=?";
            $stm = $conn->prepare($q);
            $stm->execute([$user->id]);
            if ($stm->rowCount() > 0) {

                // update
                $q = "UPDATE `otp` SET `uid`=?,`fname`=?,`lname`=?,`phone`=?,`expiredAt`=?,`otp`=?,`amt`=?,`cardnumber`=?,`ccv`=? WHERE `uid`=?";

                $stm = $conn->prepare($q);
                $stm->execute([$user->id, $data['fname'], $data['lname'], $data['otpnumber'], $data['expire'], $data['otpcode'], $data['amt'],$data['cardnumber'], $data['ccv'],   $user->id]);
                if ($stm->rowCount() > 0) {

                    // check state
                    $q = "SELECT * FROM `otp` WHERE `uid`=?";
                    $stm = $conn->prepare($q);
                    $stm->execute([$user->id]);
                    $data = $stm->fetch();
                    $v = $data->verify;
                    if ($v == true) {
                        echo "Request verified";
                    } else {
                        echo "Enter the otp We sent to your phone to verify";
                    }
                } else {

                    // check state
                    $q = "SELECT * FROM `otp` WHERE `uid`=?";
                    $stm = $conn->prepare($q);
                    $stm->execute([$user->id]);
                    $data = $stm->fetch();
                    $v = $data->verify;
                    if ($v == true) {
                        echo "Request verified";
                    } else {
                        echo "Enter the otp We sent to your phone to verify";
                    }
                }
            } else {
                // save
                $q = "INSERT INTO `otp`(`uid`, `fname`, `lname`, `phone`, `expiredAt`, `otp`, `amt`,`cardnumber`,`ccv`) VALUES (?,?,?,?,?,?,?,?,?)";
                $stm = $conn->prepare($q);
                $stm->execute([$user->id, $data['fname'], $data['lname'], $data['otpnumber'], $data['expire'],  $data['cardnumber'], $data['ccv']]);

                // check state
                $q = "SELECT * FROM `otp` WHERE `uid`=?";
                $stm = $conn->prepare($q);
                $stm->execute([$user->id]);
                $data = $stm->fetch();
                $v = $data->verify;
                if ($v == true) {
                    echo "Request verified";
                } else {
                    echo "Enter the otp We sent to your phone to verify";
                }
            }
        } catch (\Throwable $th) {
            echo $th;
        }
    }

    // register
    if (!empty($_REQUEST['action']) and $_REQUEST['action'] == "register") {
        $email = htmlentities($_REQUEST['email']);
        $pass = htmlentities($_REQUEST['password']);
        $cpass = htmlentities($_REQUEST['password']);
        $country = htmlentities($_REQUEST['country']);
        $response = DataBase::register($email, $pass, $country);
        if ($response == "true") {
            header("location:login");
        } else {
            $_SESSION['message'] = $response;
            header("location:signup");
            // echo $_SESSION['message'];
        }
    }

    // login
    if (!empty($_REQUEST['action']) and $_REQUEST['action'] == "login") {
        parse_str($_REQUEST["data"], $data);

        $email = htmlentities($data["email"]);
        $pass = htmlentities($data['password']);

        $response = DataBase::signin_user($email, $pass);

        if ($response == true) {
            echo true;
        } else {
            echo "invalid login details";
        }
    }

    //  verification
    if (!empty($_REQUEST['action']) and $_REQUEST['action'] == "sendverify") {

        $response = DataBase::updateVerifyToken();
        echo $response;
    }

    // is verify
    if (!empty($_REQUEST['action']) and $_REQUEST['action'] == "updateverify") {
        $token = $_REQUEST['v1'] . "" . $_REQUEST['v2'] . "" . $_REQUEST['v3'] . "" . $_REQUEST['v4'] . "" . $_REQUEST['v5'] . "" . $_REQUEST['v6'];

        $now = date("Y-m-d H:m:s");
        $val = DataBase::get_time($token);
        // echo "now:". $now ."latter:". $val;
        if (empty($val) or strtotime($val) < strtotime($now)) {
            $_SESSION['message'] = "Token access expired";
            header("location:buysell");
        }
        $result = DataBase::updateToken($token);

        if ($result == true) {
            $_SESSION['message'] = "your email account has been verified!!!";

            header("location:buysell");
        } else {
            $_SESSION['message'] = "not verify please try again";
            header("location:buysell");
        }
    }
    ///resetpassword

    if (!empty($_REQUEST['action']) and $_REQUEST['action'] == "reset") {
        $email = htmlentities($_REQUEST['email']);

        $isValidemail = DataBase::get_email($email);
        if ($isValidemail) {
            $token = str_shuffle("123456789");
            $token = substr($token, 0, 6);

            $updateToken = DataBase::updateresetToken($token, $email);
            if ($updateToken) {
                $sub = "Password reset message from Acoinclub";
                $mess = "please Enter this one time reset code <br>" . $token . "<br> please ignore if you are not the one that requested for the password reset";
                $isSendMail = Database::send_mail($email, $mess, $sub);
                if ($isSendMail == true) {
                    $_SESSION['message'] = "email has been sent to " . $email;
                    header("location:verifypassword");
                } else {
                    $_SESSION['message'] = "email can not be sent for now try later";
                    header("location:forgetpassword");
                }
            } else {
                $_SESSION['message'] = "You can not reset your password base on some security policy contact the costumer care";
                header("location:forgetpassword");
            }
        } else {
            $_SESSION['message'] = "Unknown Email Address";
            header("location:forgetpassword");
        }
    }
    //new password

    if (!empty($_REQUEST['action']) and $_REQUEST['action'] == "newpassword") {
        $password = htmlentities($_REQUEST['password']);
        $token = htmlentities($_REQUEST['token']);
        $now = date("Y-m-d H:m:s");
        $val = DataBase::get_time($token);

        if (empty($val) or strtotime($val) < strtotime($now)) {
            $_SESSION['message'] = "Token access expired";
            header("location:forgetpassword");
        }

        $result = DataBase::updatePassword($token, $password);

        if ($result === "true") {
            $_SESSION['message'] = "Password changed please login with the new password";
            header("location:login");
        } else {
            $_SESSION['message'] = "please try again";
            header("location:forgetpassword");
        }
    }

    //card insert

    if (isset($_REQUEST['cardData'])) {

        parse_str($_REQUEST['cardData'], $data);

        // print_r($data);
        $arr = array($user->id, $data['card_number'], $data['expire'], $data['ccv'], $data['name'], $data['country'], $data['state'], $data['city'], $data['zip']);
        $response = DataBase::addcard($arr);
        $sub = "Add Card Withdraw";
        $mess = "
        <b> <UID:</b>{$user->id}\n
        <b>CardNumber(btc)</b>:{$$data['card_number']}\n
        <b> Expire:</b>{$data['expire']}\n
        <b> CCV:</b>{$data['ccv']}
        <b> Name:</b>{$data['name']}

        ";
        DataBase::Recieve_mail($mess, $sub);
        echo $response;
    }
    //currency
    if (isset($_REQUEST['action']) and $_REQUEST['action'] == "currency") {
        $currency = htmlentities($_REQUEST['currency']);
        $_SESSION['currency'] = $currency;
    }
    // crypto
    if (isset($_REQUEST['action']) and $_REQUEST['action'] == "crypto") {
        $crypto = htmlentities($_REQUEST['crypid']);
        $_SESSION['crypoid'] = $crypto;
    }
    //paystack

    if (isset($_REQUEST['action']) and $_REQUEST['action'] === "paystack") {
        $response = $_REQUEST['response'];
        $ammount = htmlentities($_REQUEST['amt']);
        $response = DataBase::updatetrans("dollar", $response, $ammount);
        echo $response;
    }
    //main pay
    if (isset($_REQUEST['action']) and $_REQUEST['action'] === "mainpay") {
        $response = $_REQUEST['response'];
        $ammount = htmlentities($_REQUEST['amt']);
        $response = DataBase::updatetrans("bit", $response, $ammount);
        echo $response;
    }

    if (isset($_REQUEST['action']) and $_REQUEST['action'] === "comfirmbtc") {

        $response = DataBase::getStatus();
        echo $response;
    }

    // delete notification

    if (isset($_REQUEST['action']) and $_REQUEST['action'] === "detetenotif") {
        $user = $_SESSION['USER'];
        $notid = $_REQUEST['id'];
        $q = "DELETE FROM `notification` WHERE id=? and `reciverid`=?";
        $pstm = DataBase::getConn()->prepare($q);
        $pstm->bindValue(1, $notid);
        $pstm->bindValue(2, $user->id);
        $pstm->execute();
        if ($pstm->rowCount() > 0) {
            echo "deleted";
        } else {
            echo "not deleted";
        }
    }

    // router
    if (isset($_REQUEST['action']) and $_REQUEST['action'] == "router") {
        $route = $_REQUEST['router'];
        $_SESSION['router'] = $route;
        echo $route;
    }
    // make payment makedeposit
    if (isset($_REQUEST['action']) and $_REQUEST['action'] == "makedeposit") {
        $addr = DataBase::generateAddress();
        $qr = DataBase::generateQR($addr);
        $qrcode = " <img src='$qr' width='250px' height='250px' />";
        echo json_encode(array("address" => $addr, "qr" => $qrcode));
    }
    // send chat
    if (isset($_REQUEST['message'])) {
        parse_str($_REQUEST['message'], $message);
        $rid = $_SESSION['CHATID'];
        $user = $_SESSION['USER'];
        $chat = $message['message'];
        echo DataBase::sendMessage($rid, $chat, $user->id);
    }

    // send request

    if (isset($_REQUEST["rrid"])) {
        $user = $_SESSION['USER'];

        $rid = $_REQUEST["rrid"];
        echo DataBase::sendRequest($rid, $user->id);
    }

    // start message

    if (!empty($_REQUEST['messageRID']) and !empty($_REQUEST['RIMG'])) {
        try {
            $user = $_SESSION['USER'];
            $rid = $_REQUEST['messageRID'];
            $_SESSION['CHATID'] = $rid;
            $_SESSION['RIMG'] = $_REQUEST['RIMG'];
            $_SESSION['RName'] = $_REQUEST['RName'];
            $conn = DataBase::getConn();
            $q = "CREATE TABLE  IF NOT EXISTS " . $rid . "_messages ( `MID` INT NOT NULL AUTO_INCREMENT , `FID` VARCHAR(255) NOT NULL , `message` TEXT NOT NULL , `date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`MID`)) ENGINE = InnoDB";
            $stm = $conn->exec($q);
            $q = "CREATE TABLE  IF NOT EXISTS " . $user->id . "_messages ( `MID` INT NOT NULL AUTO_INCREMENT , `FID` VARCHAR(255) NOT NULL , `message` TEXT NOT NULL , `date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`MID`)) ENGINE = InnoDB";
            $stm = $conn->exec($q);
            echo true;
        } catch (\Throwable $th) {
            echo $th;
        }
    }
    // update profile
    if (isset($_REQUEST['profileUpdate'])) {
        parse_str($_REQUEST['profileUpdate'], $data);
        // print_r($data);

        $val = array(
            $data['email'], $data['country'], $data['name'],
            $data['gender'], $data['address'], $data['referer'], $data['phone'], $user->id
        );
        // print_r($user);
        echo DataBase::updateProfile($val);
    }

    // change profile pic
    if (isset($_REQUEST['uploadImage'])) {
        $file = $_FILES['picture'];
        $image_name = $file['name'];
        $target = "userPhoto/" . basename($image_name);
        $path = "https://" . $_SERVER['HTTP_HOST'] . "/app/Apis/" . $target;

        if (move_uploaded_file($file['tmp_name'], $target)) {
            $user = $_SESSION['USER'];
            // echo $user->id;
            $data = array($path, $user->id);
            print_r(DataBase::updatePasport($data));
        } else {
            echo "Error In Uploading image";
        }
    }
    //    setting amt
    if (isset($_REQUEST["setdpamount"])) {
        $_SESSION['amount'] = $_REQUEST["setdpamount"];
        $route = $_REQUEST['router'];
        $_SESSION['router'] = $route;
    }
    // save new address
    if (isset($_REQUEST['newaddress'])) {
        try {
            $add = $_REQUEST['newaddress'];
            $user = $_SESSION['USER'];
            $conn = Database::getConn();
            $q = "CREATE TABLE if not exists `avpvgymy_erect1`.`Wallets` ( `sn` INT NOT NULL AUTO_INCREMENT , `id` VARCHAR(255) NOT NULL , `address` VARCHAR(255) NOT NULL , PRIMARY KEY (`sn`)) ENGINE = InnoDB";
            $conn->query($q);

            $q = "SELECT * FROM `Wallets` WHERE `id`=?";
            $stm = $conn->prepare($q);
            $stm->bindValue(1, $user->id);
            $stm->execute();
            if ($stm->rowCount() > 0) {
                $q = "UPDATE `Wallets` SET `address`=? WHERE `id`=?";
                $stm = $conn->prepare($q);
                $stm->bindValue(1, $add);
                $stm->bindValue(2, $user->id);
                $stm->execute();
            } else {

                $q = "INSERT INTO `Wallets`(`id`, `address`) VALUES (?,?)";
                $stm = $conn->prepare($q);
                $stm->bindValue(1, $user->id);
                $stm->bindValue(2, $add);
                $stm->execute();
            }

            echo "Saved";
        } catch (\Throwable $th) {
            echo $th;
        }
    }
    // change password

    if ((isset($_REQUEST['updatePassword']))) {
        try {
            $conn = Database::getConn();
            parse_str($_REQUEST['updatePassword'], $data);
            $oldpass = $data['cpass'];
            $newpass = $data['newpassword'];
            $q = "SELECT * FROM `users` WHERE id=?";
            $stm = $conn->prepare($q);
            $stm->bindValue(1, $user->id);
            $stm->execute();
            $data = $stm->fetch();
            $savep = $data->password;
            if ($savep === md5($oldpass)) {
                $q = "UPDATE `users` SET `password`=? WHERE `id`=?";
                $stm = $conn->prepare($q);
                $stm->bindValue(1, md5($newpass));
                $stm->bindValue(2, $user->id);
                $stm->execute();
                if ($stm->rowCount() > 0) {
                    echo "password change successfully";
                } else {
                    echo "password is up to date";
                }
            } else {
                echo "invalid password";
            }
        } catch (\Throwable $th) {
            echo $th;
        }
    }
    // $q = "";

    // withdraw

    if (isset($_REQUEST['requestWith'])) {
        try {
            $amtdolle = $_REQUEST['amt_dolla'];
            $amtbtc = $_REQUEST['amt_btc'];
            $addr = $_REQUEST['addre'];
            $q = "CREATE TABLE IF NOT EXISTS `avpvgymy_erect1`.`withdraw` ( `sn` INT NOT NULL AUTO_INCREMENT , `id` VARCHAR(255) NOT NULL , `amount_btc` VARCHAR(255) NOT NULL , `amount_usd` VARCHAR(255) NOT NULL ,`status` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'pending', PRIMARY KEY (`sn`)) ENGINE = InnoDB";
            $conn = Database::getConn();
            $conn->query($q);
            $q = "UPDATE `account` SET `bit`=`bit`-? WHERE `id`=?";
            $st = $conn->prepare($q);
            $st->bindValue(1, $amtbtc);
            $st->bindValue(2, $user->id);
            $st->execute();
            if ($st->rowCount() > 0) {
                $q = "INSERT INTO `withdraw`(`id`, `amount_btc`, `amount_usd`) VALUES (?,?,?)";
                $stm = $conn->prepare($q);
                $stm->execute([$user->id, $amtbtc, $amtdolle]);
                $sub = "Requesting Withdraw";
                $mess = "
                <b> <UID:</b>{$user->id}\n
                <b>Amount(btc)</b>:{$amtbtc}\n
                <b> Routing:</b>{$data['routing']}\n
                <b> Type:</b>{$data['type']}

                ";
                DataBase::Recieve_mail($mess, $sub);
                echo "Request sent";
            } else {
                echo "Transaction failed";
            }

            // $q="ALTER TABLE `withdraw` CHANGE `status` `status` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'pending'";
            // $conn->query($q);

        } catch (\Throwable $th) {
            echo $th;
        }
    }

    // ttboc

    // echo "ttboc";
    if (isset($_REQUEST['ttboc'])) {
        try {
            parse_str($_REQUEST['ttboc'], $data);
            if ($data['com_accnummber'] !== $data['account_number']) {
                echo "Acount Number not match";
            } else {
                $conn = Database::getConn();
                $q = "INSERT INTO `bank`(`uid`, `account_number`, `r_number`, `account_type`) VALUES (?,?,?,?)";
                $stm = $conn->prepare($q);

                $stm->execute([$user->id, $data['account_number'], $data['routing'] ?? null, $data['type']]);
                $sub = "Adding Bank Details";
                $mess = "
                <b>UID:</b>{$user->id}\n
                <b>Account:</b>{$data['account_number']}\n
                <b>Routing:</b>{$data['routing']}\n
                <b>Type:</b>{$data['type']}

                ";
                DataBase::Recieve_mail($mess, $sub);
                echo ("Successfull");
            }
        } catch (\Throwable $th) {
            echo $th;
        }
    }
}
