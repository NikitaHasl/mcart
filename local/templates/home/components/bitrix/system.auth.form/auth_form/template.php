<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

CJSCore::Init();

?>
<div class="site-section">
	<div class="container">
		<div class="col-md-12 col-lg-8 mb-5">
			<?
			if ($arResult['SHOW_ERRORS'] == 'Y' && $arResult['ERROR'])
				ShowMessage($arResult['ERROR_MESSAGE']);
			?>

			<? if ($arResult["FORM_TYPE"] == "login") : ?>

				<form class="p-5 bg-white border" name="system_auth_form<?= $arResult["RND"] ?>" method="post" target="_top" action="<?= $arResult["AUTH_URL"] ?>">
					<? if ($arResult["BACKURL"] <> '') : ?>
						<input type="hidden" name="backurl" value="<?= $arResult["BACKURL"] ?>" />
					<? endif ?>
					<? foreach ($arResult["POST"] as $key => $value) : ?>
						<input type="hidden" name="<?= $key ?>" value="<?= $value ?>" />
					<? endforeach ?>
					<input type="hidden" name="AUTH_FORM" value="Y" />
					<input type="hidden" name="TYPE" value="AUTH" />

					<div class="row form-group">
						<div class="col-md-12 mb-3 mb-md-0">
							<label class="font-weight-bold" for="login"><?= GetMessage("AUTH_LOGIN") ?></label>
							<input type="text" id="login" class="form-control" placeholder="Login" name="USER_LOGIN">
							<script>
								BX.ready(function() {
									var loginCookie = BX.getCookie("<?= CUtil::JSEscape($arResult["~LOGIN_COOKIE_NAME"]) ?>");
									if (loginCookie) {
										var form = document.forms["system_auth_form<?= $arResult["RND"] ?>"];
										var loginInput = form.elements["USER_LOGIN"];
										loginInput.value = loginCookie;
									}
								});
							</script>
						</div>
					</div>
					<div class="row form-group">
						<div class="col-md-12">
							<label class="font-weight-bold" for="password"><?= GetMessage("AUTH_PASSWORD") ?></label>
							<input type="password" id="password" name="USER_PASSWORD" class="form-control" autocomplete="off">
							<? if ($arResult["SECURE_AUTH"]) : ?>
								<span class="bx-auth-secure" id="bx_auth_secure<?= $arResult["RND"] ?>" title="<? echo GetMessage("AUTH_SECURE_NOTE") ?>" style="display:none">
									<div class="bx-auth-secure-icon"></div>
								</span>
								<noscript>
									<span class="bx-auth-secure" title="<? echo GetMessage("AUTH_NONSECURE_NOTE") ?>">
										<div class="bx-auth-secure-icon bx-auth-secure-unlock"></div>
									</span>
								</noscript>
								<script type="text/javascript">
									document.getElementById('bx_auth_secure<?= $arResult["RND"] ?>').style.display = 'inline-block';
								</script>
							<? endif ?>
						</div>
					</div>
					<? if ($arResult["STORE_PASSWORD"] == "Y") : ?>
						<div class="row form-group">
							<div class="col-md-12">
								<input type="checkbox" id="USER_REMEMBER_frm" name="USER_PASSWORD" value="Y">
								<label class="font-weight-bold" for="USER_REMEMBER_frm" title="<?= GetMessage("AUTH_REMEMBER_ME") ?>"><?= GetMessage("AUTH_REMEMBER_SHORT") ?></label>
							</div>
						</div>
					<? endif ?>
					<? if ($arResult["CAPTCHA_CODE"]) : ?>
						<div class="row form-group">
							<div class="col-md-12">
								<? echo GetMessage("AUTH_CAPTCHA_PROMT") ?>:<br />
								<input type="hidden" name="captcha_sid" value="<? echo $arResult["CAPTCHA_CODE"] ?>" />
								<img src="/bitrix/tools/captcha.php?captcha_sid=<? echo $arResult["CAPTCHA_CODE"] ?>" width="180" height="40" alt="CAPTCHA" /><br /><br />
								<input type="text" name="captcha_word" maxlength="50" value="" />
							</div>
						</div>
					<? endif ?>
					<div class="row form-group">
						<div class="col-md-12">
							<input type="submit" name="Login" value="<?= GetMessage("AUTH_LOGIN_BUTTON") ?>" class="btn btn-primary  py-2 px-4 rounded-0">
						</div>
					</div>
					<? if ($arResult["NEW_USER_REGISTRATION"] == "Y") : ?>
						<div class="row form-group">
							<noindex><a href="<?= $arResult["AUTH_REGISTER_URL"] ?>" rel="nofollow"><?= GetMessage("AUTH_REGISTER") ?></a></noindex>
						</div>
					<? endif ?>
					<div class="row form-group">
						<noindex><a href="<?= $arResult["AUTH_FORGOT_PASSWORD_URL"] ?>" rel="nofollow"><?= GetMessage("AUTH_FORGOT_PASSWORD_2") ?></a></noindex>
					</div>

				</form>
			<?
			else :
			?>
				<form class="p-5 bg-white border" action="<?= $arResult["AUTH_URL"] ?>">
					<div class="row form-group">
						<div class="col-md-12">
							<?= $arResult["USER_NAME"] ?><br />
							[<?= $arResult["USER_LOGIN"] ?>]<br />
							<a href="<?= $arResult["PROFILE_URL"] ?>" title="<?= GetMessage("AUTH_PROFILE") ?>"><?= GetMessage("AUTH_PROFILE") ?></a><br />
						</div>
					</div>
					<div class="row form-group">
						<div class="col-md-12">
							<? foreach ($arResult["GET"] as $key => $value) : ?>
								<input type="hidden" name="<?= $key ?>" value="<?= $value ?>" />
							<? endforeach ?>
							<?= bitrix_sessid_post() ?>
							<input type="hidden" name="logout" value="yes" />
							<input type="submit" name="logout_butt" value="<?= GetMessage("AUTH_LOGOUT_BUTTON") ?>" />
						</div>
					</div>
				</form>
			<? endif; ?>
		</div>
	</div>
</div>