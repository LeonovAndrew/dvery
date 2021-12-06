<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

global $APPLICATION;

if(empty($arResult))
	return "";

$strReturn = '';

$strReturn .= '<div class="page__breadcrumbs">';

$itemSize = count($arResult);
for($index = 0; $index < $itemSize; $index++)
{
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);

	if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1)
	{
		$strReturn .= '<a href="'.$arResult[$index]["LINK"].'" title="'.$title.'" class="breadcrumbs-item">'.$title.'</a>';
	}
	else
	{
		$strReturn .= '<span title="'.$title.'" class="breadcrumbs-item">'.$title.'</span>';
	}
}


$strReturn .= '</div>';
$strReturn .= '<script type="application/ld+json">
    {
     "@context": "https://schema.org",
     "@type": "BreadcrumbList",
     "itemListElement":[';
for($index = 0; $index < $itemSize; $index++)
{
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
	$strReturn .= '
	  {
       "@type": "ListItem",
       "position": '.($index+1).',
       "item":
       {
        "@id": "'.$arResult[$index]["LINK"].'",
        "name": "'.$title.'"
        }
      }';
	if($index+1 == count($arResult))
		$strReturn .='';
	else 
		$strReturn .=',';
}
      $strReturn .= '
     ]
    }
    </script>';
return $strReturn;