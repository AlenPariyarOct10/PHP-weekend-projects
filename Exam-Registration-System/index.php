<?php
$url = $_SERVER['REQUEST_URI'];

if ($url == '/exam-registration-system' || $url == '/exam-registration-system/') {
    require "student-portal/home.php";
}else if($url == '/exam-registration-system/login')
{
    require  "student-portal/login.php";
}else if($url == '/exam-registration-system/register')
{
    require  "student-portal/register.php";
}else if($url == '/exam-registration-system/checklogin')
{
    require  "student-portal/login-handler.php";
}else if($url == '/exam-registration-system/dashboard')
{
    require  "student-portal/dashboard.php";
}else if($url == '/exam-registration-system/logout')
{
    require  "student-portal/logout.php";
}else if($url == '/exam-registration-system/handleregister')
{
    require  "student-portal/register-handler.php";
}else if($url == '/exam-registration-system/profile')
{
    require  "student-portal/personal-detail.php";
}else if($url == '/exam-registration-system/contact')
{
    require  "student-portal/contact-detail.php";
}else if($url == '/exam-registration-system/dashboard')
{
    require  "student-portal/dashboard.php";
}else if($url == '/exam-registration-system/college-detail')
{
    require  "student-portal/college-detail.php";
}else if($url == '/exam-registration-system/education')
{
    require  "student-portal/education.php";
}else if($url == '/exam-registration-system/preview')
{
    require  "student-portal/preview.php";
}else if($url == '/exam-registration-system/server')
{
    require "student-portal/server-request.php";
}else if($url == '/exam-registration-system/preview')
{
    require "student-portal/preview.php";
}else if($url=='/exam-registration-system/register-exam')
{
    require "student-portal/register-exam.php";
}else if($url=='/exam-registration-system/subject-select')
{
    require "student-portal/subject-select.php";
}else if($url=='/exam-registration-system/application')
{
    require "student-portal/application.php";
}else if($url=='/exam-registration-system/admitcard')
{
    require "student-portal/admitcard.php";
}
?>