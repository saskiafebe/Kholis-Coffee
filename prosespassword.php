<?php
session_start();
include "connect.php";
$user_id = (isset($_POST['user_id'])) ? htmlentities($_POST['user_id']) : "";
$oldpassword = (isset($_POST['oldpassword'])) ? md5(htmlentities($_POST['oldpassword'])) : "";
$newpassword = (isset($_POST['newpassword'])) ? md5(htmlentities($_POST['newpassword'])) : "";
$renewpassword = (isset($_POST['renewpassword'])) ? md5(htmlentities($_POST['renewpassword'])) : "";

if (!empty($_POST['password_validate'])) {
    $query = mysqli_query($conn, "SELECT * FROM user WHERE username = '$_SESSION [username_kholiscoffee]' && password = '$oldpassword'");
    $hasil = mysqli_fetch_array($query);
    if ($hasil) {
        if ($newpassword == $renewpassword) {
            $query = mysqli_query($conn, "UPDATE user SET password = '$newpassword' WHERE username = '$_SESSION [username_kholiscoffee]'");
            if ($query) {
                $message = '<script>alert("Change password successful");
                            window.history.back()</script>';
                } else {
                    $message = '<script>alert("Change password failed, please check your password!");
                                window.history.back()</script>';
                }
                    } else {
                        $message = '<script>alert("Password not match");
                                    window.history.back()</script>';
                    }
                        } else {
                            $message = '<script>alert("Incorrect old password");
                                        window.history.back()</script>';
                        }
                            } else {
                                    header('location: aboutsus');
                                }
echo $message;
?>