<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$ClientID = 'navigation_'.$arResult['NavNum'];

$this->setFrameMode(true);

if(!$arResult["NavShowAlways"])
{
	if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
		return;
}
?>

<div class="review-pagination-block">
	<div class="review-pagination-top">
		<a class="review-pagination-prew-page" href="#">Предыдущая</a><a class="review-pagination-next-page" href="#">Следующая</a>
	</div>
	<div class="review-pagination">
		<a class="review-pagination-link" href="#">1</a><a class="review-pagination-link" href="#">2</a><a class="review-pagination-link" href="#">3</a><a class="review-pagination-link" href="#">4</a><a class="review-pagination-link" href="#">5</a><a class="review-pagination-link" href="#">6</a><span class="review-pagination-link review-pagination-link-active" href="#">7</span><a class="review-pagination-link" href="#">8</a><a class="review-pagination-link" href="#">9</a><a class="review-pagination-link" href="#">10</a>
	</div>
</div>

<div class="review-pagination-block">
<?
$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");
if($arResult["bDescPageNumbering"] === true)
{
	// to show always first and last pages
	$arResult["nStartPage"] = $arResult["NavPageCount"];
	$arResult["nEndPage"] = 1;

	$sPrevHref = '';
	if ($arResult["NavPageNomer"] < $arResult["NavPageCount"])
	{
		$bPrevDisabled = false;
		if ($arResult["bSavePage"])
		{
			$sPrevHref = $arResult["sUrlPath"].'?'.$strNavQueryString.'PAGEN_'.$arResult["NavNum"].'='.($arResult["NavPageNomer"]+1);
		}
		else
		{
			if ($arResult["NavPageCount"] == ($arResult["NavPageNomer"]+1))
			{
				$sPrevHref = $arResult["sUrlPath"].$strNavQueryStringFull;
			}
			else
			{
				$sPrevHref = $arResult["sUrlPath"].'?'.$strNavQueryString.'PAGEN_'.$arResult["NavNum"].'='.($arResult["NavPageNomer"]+1);
			}
		}
	}
	else
	{
		$bPrevDisabled = true;
	}
	
	$sNextHref = '';
	if ($arResult["NavPageNomer"] > 1)
	{
		$bNextDisabled = false;
		$sNextHref = $arResult["sUrlPath"].'?'.$strNavQueryString.'PAGEN_'.$arResult["NavNum"].'='.($arResult["NavPageNomer"]-1);
	}
	else
	{
		$bNextDisabled = true;
	}
	?>
		<div class="review-pagination-top">
			<span class="arrow">&larr;</span><span class="ctrl"> ctrl</span>&nbsp;<?if ($bPrevDisabled):?><span class="review-pagination-prew-page"><?=GetMessage("nav_prev")?></span><?else:?><a href="<?=$sPrevHref;?>" id="<?=$ClientID?>_previous_page" class="review-pagination-prew-page"><?=GetMessage("nav_prev")?></a><?endif;?>&nbsp;<?if ($bNextDisabled):?><span class="review-pagination-next-page" ><?=GetMessage("nav_next")?></span><?else:?><a href="<?=$sNextHref;?>" id="<?=$ClientID?>_next_page" class="review-pagination-next-page"><?=GetMessage("nav_next")?></a><?endif;?>&nbsp;<span class="ctrl">ctrl </span><span class="arrow">&rarr;</span>
		</div>

		<!--<div class="navigation-pages">
			<span class="navigation-title"><?=GetMessage("pages")?></span>-->
	<?
	$bFirst = true;
	$bPoints = false;
	do
	{
		$NavRecordGroupPrint = $arResult["NavPageCount"] - $arResult["nStartPage"] + 1;
		if ($arResult["nStartPage"] <= 2 || $arResult["NavPageCount"]-$arResult["nStartPage"] <= 1 || abs($arResult['nStartPage']-$arResult["NavPageNomer"])<=2)
		{

			if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):
	?>
			<span class="nav-current-page"><?=$NavRecordGroupPrint?></span>
	<?
			elseif($arResult["nStartPage"] == $arResult["NavPageCount"] && $arResult["bSavePage"] == false):
	?>
			<a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><?=$NavRecordGroupPrint?></a>
	<?
			else:
	?>
			<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"><?=$NavRecordGroupPrint?></a>
	<?
			endif;
			$bFirst = false;
			$bPoints = true;
		}
		else
		{
			if ($bPoints)
			{
	?>...<?
				$bPoints = false;
			}
		}
		$arResult["nStartPage"]--;
	} while($arResult["nStartPage"] >= $arResult["nEndPage"]);
}
else
{
	// to show always first and last pages
	$arResult["nStartPage"] = 1;
	$arResult["nEndPage"] = $arResult["NavPageCount"];

	$sPrevHref = '';
	if ($arResult["NavPageNomer"] > 1)
	{
		$bPrevDisabled = false;
		
		if ($arResult["bSavePage"] || $arResult["NavPageNomer"] > 2)
		{
			$sPrevHref = $arResult["sUrlPath"].'?'.$strNavQueryString.'PAGEN_'.$arResult["NavNum"].'='.($arResult["NavPageNomer"]-1);
		}
		else
		{
			$sPrevHref = $arResult["sUrlPath"].$strNavQueryStringFull;
		}
	}
	else
	{
		$bPrevDisabled = true;
	}

	$sNextHref = '';
	if ($arResult["NavPageNomer"] < $arResult["NavPageCount"])
	{
		$bNextDisabled = false;
		$sNextHref = $arResult["sUrlPath"].'?'.$strNavQueryString.'PAGEN_'.$arResult["NavNum"].'='.($arResult["NavPageNomer"]+1);
	}
	else
	{
		$bNextDisabled = true;
	}
	?>
		<div class="review-pagination-top">
			<span class="arrow">&larr;</span><span class="ctrl"> ctrl</span>&nbsp;<?if ($bPrevDisabled):?><span class="review-pagination-prew-page"><?=GetMessage("nav_prev")?></span><?else:?><a href="<?=$sPrevHref;?>" id="<?=$ClientID?>_previous_page" class="review-pagination-prew-page"><?=GetMessage("nav_prev")?></a><?endif;?>&nbsp;<?if ($bNextDisabled):?><span class="review-pagination-next-page"><?=GetMessage("nav_next")?></span><?else:?><a href="<?=$sNextHref;?>" id="<?=$ClientID?>_next_page" class="review-pagination-next-page"><?=GetMessage("nav_next")?></a><?endif;?>&nbsp;<span class="ctrl">ctrl </span><span class="arrow">&rarr;</span>
		</div>

		<!-- <div class="navigation-pages">
			<span class="navigation-title"><?=GetMessage("pages")?></span>-->
	<?
	$bFirst = true;
	$bPoints = false;
	do
	{
		if ($arResult["nStartPage"] <= 2 || $arResult["nEndPage"]-$arResult["nStartPage"] <= 1 || abs($arResult['nStartPage']-$arResult["NavPageNomer"])<=2)
		{

			if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):
	?>
			<span class="nav-current-page"><?=$arResult["nStartPage"]?></span>
	<?
			elseif($arResult["nStartPage"] == 1 && $arResult["bSavePage"] == false):
	?>
			<a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><?=$arResult["nStartPage"]?></a>
	<?
			else:
	?>
			<a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"><?=$arResult["nStartPage"]?></a>
	<?
			endif;
			$bFirst = false;
			$bPoints = true;
		}
		else
		{
			if ($bPoints)
			{
	?>...<?
				$bPoints = false;
			}
		}
		$arResult["nStartPage"]++;
	} while($arResult["nStartPage"] <= $arResult["nEndPage"]);
}

if ($arResult["bShowAll"]):
	if ($arResult["NavShowAll"]):
?>
		<a class="nav-page-pagen" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>SHOWALL_<?=$arResult["NavNum"]?>=0"><?=GetMessage("nav_paged")?></a>
<?
	else:
?>
		<a class="nav-page-all" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>SHOWALL_<?=$arResult["NavNum"]?>=1"><?=GetMessage("nav_all")?></a>
<?
	endif;
endif;
?>
	
</div>
<?CJSCore::Init();?>
<script type="text/javascript">
	BX.bind(document, "keydown", function (event) {

		event = event || window.event;
		if (!event.ctrlKey)
			return;

		var target = event.target || event.srcElement;
		if (target && target.nodeName && (target.nodeName.toUpperCase() == "INPUT" || target.nodeName.toUpperCase() == "TEXTAREA"))
			return;

		var key = (event.keyCode ? event.keyCode : (event.which ? event.which : null));
		if (!key)
			return;

		var link = null;
		if (key == 39)
			link = BX('<?=$ClientID?>_next_page');
		else if (key == 37)
			link = BX('<?=$ClientID?>_previous_page');

		if (link && link.href)
			document.location = link.href;
	});
</script>