<?
class UserType
{
    function BeforeRegister(&$arFields)
    {
        if ($arFields["UF_USER_TYPE"] == "BUYER") {
            $arFields["GROUP_ID"][] = 6;
        } elseif ($arFields["UF_USER_TYPE"] == "SELLER") {
            $arFields["GROUP_ID"][] = 7;
        }
    }
}
