<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<?foreach($arResult["ITEMS"] as $arItem):?>
<div class="sb_action">
	<?if(is_array($arItem["PREVIEW_PICTURE"])):?>
	<a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt=""/></a>
	<?endif;?>
	<h4><?echo $arItem["PREVIEW_TEXT"]?></h4>
	<h5><a href=""><?echo $arItem["NAME"]?> всего за <?echo $arItem["PROPERTIES"]["PRICE"]["VALUE"]?>&nbsp;Р</a></h5>
	<a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="sb_action_more">Подробнее &rarr;</a>
</div>
<?endforeach;?>
