<?
include('include/UserType.php');
AddEventHandler("main", "OnBeforeUserRegister", array("UserType", "BeforeRegister"));
