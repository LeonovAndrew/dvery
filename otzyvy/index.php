<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Отзывы. Фабрика дверей Provance предлагает широкий выбор межкомнатных дверей и перегородок. Собственное производство. Гарантия качества. Более 50 салонов по всей России.");
$APPLICATION->SetPageProperty("title", "Отзывы | Фабрика дверей Provance");
$APPLICATION->SetTitle("Отзывы");
?>

<style>
	.rev .elem{ display:inline-block; width:45%; margin:20px;}
	.rev .elem iframe{ width:100%; }

@media (max-width:600px){ .rev .elem{width:100%;} }
</style>

<div class="rev" itemscope itemtype="https://schema.org/VideoObject"> 
	<div class="elem"><iframe width="560" height="315" src="https://www.youtube.com/embed/v2vJteG4qNo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen itemprop="video"></iframe></div>
	<div class="elem"><iframe width="560" height="315" src="https://www.youtube.com/embed/kbtcSEYc-nA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen itemprop="video"></iframe></div>
	<div class="elem"><iframe width="560" height="315" src="https://www.youtube.com/embed/op8SZQGtSDs" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen itemprop="video"></iframe></div>
	<div class="elem"><iframe width="560" height="315" src="https://www.youtube.com/embed/kUU5VFRk44M" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen itemprop="video"></iframe></div>
	<span style="display: none;" itemprop="description">Отзывы</span>
	<span style="display: none;" itemprop="name">Фабрика Дверей Прованс</span>
	<span style="display: none;" itemprop="uploadDate">2023-10-17</span>
	<span style="display: none;" itemprop="duration">5min 54sec</span>
	<span style="display: none;" itemprop="isFamilyFriendly">true</span>
	<span style="display: none;" itemprop="thumbnail">video</span>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>