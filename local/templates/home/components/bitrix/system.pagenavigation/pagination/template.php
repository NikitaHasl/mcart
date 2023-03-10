<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/** @var array $arParams */
/** @var array $arResult */
/** @var CBitrixComponentTemplate $this */

$this->setFrameMode(true);

if (!$arResult["NavShowAlways"]) {
	if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
		return;
}

$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"] . "&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?" . $arResult["NavQueryString"] : "");

$colorSchemes = array(
	"green" => "bx-green",
	"yellow" => "bx-yellow",
	"red" => "bx-red",
	"blue" => "bx-blue",
);
if (isset($colorSchemes[$arParams["TEMPLATE_THEME"]])) {
	$colorScheme = $colorSchemes[$arParams["TEMPLATE_THEME"]];
} else {
	$colorScheme = "";
}
?>
<div class="row">
	<div class="col-md-12 text-center">
		<div class="site-pagination">
			<? if ($arResult["bDescPageNumbering"] === true) : ?>
				<? if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]) : ?>
					<? if ($arResult["bSavePage"]) : ?>
						<a href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= ($arResult["NavPageNomer"] + 1) ?>">1</a>
					<? else : ?>
						<a href="<?= $arResult["sUrlPath"] ?><?= $strNavQueryStringFull ?>">1</a>
					<? endif ?>
				<? else : ?>
					<a href="##" class="active">1</a>
				<? endif ?>
				<? if ($arResult["nStartPage"] < $arResult['NavPageCount']) : ?>
					<span>...</span>
				<? endif; ?>
				<?
				$arResult["nStartPage"]--;
				?>

				<?
				while ($arResult["nStartPage"] >= $arResult["nEndPage"] + 1) :
				?>

					<? $NavRecordGroupPrint = $arResult["NavPageCount"] - $arResult["nStartPage"] + 1; ?>

					<? if ($arResult["nStartPage"] == $arResult["NavPageNomer"]) : ?>
						<a href="##" class="active"><?= $NavRecordGroupPrint ?></a>
					<? else : ?>
						<a href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= $arResult["nStartPage"] ?>"><?= $NavRecordGroupPrint ?></a>
					<? endif ?>

					<? $arResult["nStartPage"]-- ?>
				<? endwhile ?>
				<? if ($arResult["nEndPage"] > 1) : ?>
					<span>...</span>
				<? endif; ?>
				<? if ($arResult["NavPageNomer"] > 1) : ?>
					<? if ($arResult["NavPageCount"] > 1) : ?>
						<a href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=1"><?= $arResult["NavPageCount"] ?></a>
					<? endif ?>
				<? else : ?>
					<? if ($arResult["NavPageCount"] > 1) : ?>
						<a href="##" class="active"><?= $arResult["NavPageCount"] ?></a>
					<? endif ?>
				<? endif ?>
			<? else : ?>
				<? if ($arResult["NavPageNomer"] > 1) : ?>
					<? if ($arResult["bSavePage"]) : ?>
						<a href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=1">1</a>
					<? else : ?>
						<a href="<?= $arResult["sUrlPath"] ?><?= $strNavQueryStringFull ?>">1</a>
					<? endif ?>
				<? else : ?>
					<a href="##" class="active">1</a>
				<? endif ?>

				<? if ($arResult["nStartPage"] > 1) : ?>
					<span>...</span>
				<? endif; ?>
				<?
				$arResult["nStartPage"]++;
				while ($arResult["nStartPage"] <= $arResult["nEndPage"] - 1) :
				?>
					<? if ($arResult["nStartPage"] == $arResult["NavPageNomer"]) : ?>
						<a href="##" class="active"><?= $arResult["nStartPage"] ?></a>
					<? else : ?>
						<a href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= $arResult["nStartPage"] ?>"><?= $arResult["nStartPage"] ?></a>
					<? endif ?>
					<? $arResult["nStartPage"]++ ?>
				<? endwhile ?>
				<? if ($arResult["nEndPage"] < $arResult['NavPageCount']) : ?>
					<span>...</span>
				<? endif; ?>
				<? if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]) : ?>
					<? if ($arResult["NavPageCount"] > 1) : ?>
						<a href="<?= $arResult["sUrlPath"] ?>?<?= $strNavQueryString ?>PAGEN_<?= $arResult["NavNum"] ?>=<?= $arResult["NavPageCount"] ?>"><?= $arResult["NavPageCount"] ?></a>
					<? endif ?>
				<? else : ?>
					<? if ($arResult["NavPageCount"] > 1) : ?>
						<a href="##" class="active"><?= $arResult["NavPageCount"] ?></a>
					<? endif ?>
				<? endif ?>
			<? endif ?>

		</div>
	</div>
</div>