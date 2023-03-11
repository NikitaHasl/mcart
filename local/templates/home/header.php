<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?
IncludeTemplateLangFile(__FILE__);
?>
<?

use Bitrix\Main\Page\Asset;
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title><? $APPLICATION->ShowTitle() ?></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<? $APPLICATION->ShowHead(); ?>

	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500">
	<?
	Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/fonts/icomoon/style.css");
	Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/bootstrap.min.css");
	Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/magnific-popup.css");
	Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/jquery-ui.css");
	Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/owl.carousel.min.css");
	Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/owl.theme.default.min.css");
	Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/bootstrap-datepicker.css");
	Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/mediaelementplayer.css");
	Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/animate.css");
	Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/fonts/flaticon/font/flaticon.css");
	Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/fl-bigmug-line.css");
	Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/aos.css");
	Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/style.css");
	?>

</head>

<body>
	<div id="panel">
		<? $APPLICATION->ShowPanel(); ?>
	</div>

	<div class="site-loader"></div>

	<div class="site-wrap">

		<div class="site-mobile-menu">
			<div class="site-mobile-menu-header">
				<div class="site-mobile-menu-close mt-3">
					<span class="icon-close2 js-menu-toggle"></span>
				</div>
			</div>
			<div class="site-mobile-menu-body"></div>
		</div> <!-- .site-mobile-menu -->

		<div class="border-bottom bg-white top-bar">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-6 col-md-6">
						<p class="mb-0">
							<a href="#" class="mr-3">
								<? $APPLICATION->IncludeComponent(
									"bitrix:main.include",
									"",
									array(
										"AREA_FILE_SHOW" => "file",
										"AREA_FILE_SUFFIX" => "inc",
										"EDIT_TEMPLATE" => "",
										"PATH" => "/include/home/phone.php"
									)
								); ?>
							</a>
							<a href="#">
								<? $APPLICATION->IncludeComponent(
									"bitrix:main.include",
									"",
									array(
										"AREA_FILE_SHOW" => "file",
										"AREA_FILE_SUFFIX" => "inc",
										"EDIT_TEMPLATE" => "",
										"PATH" => "/include/home/mail.php"
									)
								); ?>
							</a>
						</p>
					</div>
					<div class="col-6 col-md-6 text-right">
						<? $APPLICATION->IncludeComponent(
							"bitrix:main.include",
							"",
							array(
								"AREA_FILE_SHOW" => "file",
								"AREA_FILE_SUFFIX" => "inc",
								"EDIT_TEMPLATE" => "",
								"PATH" => "/include/home/icons.php"
							)
						); ?>
					</div>
				</div>
			</div>

		</div>
		<div class="site-navbar">
			<div class="container py-1">
				<div class="row align-items-center">
					<div class="col-8 col-md-8 col-lg-4">
						<h1 class="">
							<a href="<?= SITE_DIR ?>" class="h5 text-uppercase text-black">
								<? $APPLICATION->IncludeComponent(
									"bitrix:main.include",
									"",
									array(
										"AREA_FILE_SHOW" => "file",
										"AREA_FILE_SUFFIX" => "inc",
										"EDIT_TEMPLATE" => "",
										"PATH" => "/include/home/logo.php"
									)
								); ?>
							</a>
						</h1>
					</div>
					<div class="col-4 col-md-4 col-lg-8">
						<? $APPLICATION->IncludeComponent(
							"bitrix:menu",
							"multilevel_menu",
							array(
								"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
								"CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
								"DELAY" => "N",	// Откладывать выполнение шаблона меню
								"MAX_LEVEL" => "3",	// Уровень вложенности меню
								"MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
								"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
								"MENU_CACHE_TYPE" => "N",	// Тип кеширования
								"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
								"ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
								"USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
								"COMPONENT_TEMPLATE" => "horizontal_multilevel",
								"MENU_THEME" => "site"
							),
							false
						); ?>
					</div>

					<div class="col-4 col-md-4 col-lg-8">
					</div>
				</div>
			</div>
		</div>
	</div>
	<? $APPLICATION->IncludeComponent(
		"bitrix:breadcrumb",
		"breadcrumbs",
		array(
			"PATH" => "",
			"SITE_ID" => "s1",
			"START_FROM" => "0",
			"COMPONENT_TEMPLATE" => "breadcrumbs"
		),
		false
	); ?>