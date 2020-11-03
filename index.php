<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Мебельная компания");
?><?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "universal", array(
	"COMPONENT_TEMPLATE" => "universal",
		"PATH" => "",
		"SITE_ID" => "s1",
		"START_FROM" => "0"
	),
	false,
	array(
	"ACTIVE_COMPONENT" => "N"
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?><!---->