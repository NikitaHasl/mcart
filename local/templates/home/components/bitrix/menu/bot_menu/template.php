<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<? if (!empty($arResult)) : ?>
	<div class="row mb-5">

		<div class="col-md-12">
			<h3 class="footer-heading mb-4">Меню</h3>
		</div>

		<?
		foreach ($arResult as $arItem) :
			if ($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
				continue;
		?>
			<? if ($arItem['ITEM_INDEX'] % 4 == 0) : ?>
				<div class="col-md-6 col-lg-6">
					<ul class="list-unstyled">
					<? endif; ?>

					<li><a href="<?= $arItem["LINK"] ?>"><?= $arItem["TEXT"] ?></a></li>

					<? if ($arItem['ITEM_INDEX'] % 4 == 3) : ?>
					</ul>
				</div>
			<? endif ?>
		<? endforeach ?>


	</div>
<? endif ?>