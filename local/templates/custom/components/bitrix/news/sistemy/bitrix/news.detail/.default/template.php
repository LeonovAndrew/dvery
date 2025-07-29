<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="news-detail sistemy_detail">
    <div class="cont">
        <div class="news-detail__cont">
            <div class="news-detail__block">
               <div>
                        <?=$arResult['DETAIL_TEXT']?>
				</div>
            </div>
            <div class="news-detail__block">
                <div class="news-detail__title">

                </div>
                <div class="news-detail__side">
                    <a href="<?=$arResult['LIST_PAGE_URL']?>" class="news-detail__link">
                        <div class="news-detail__link-img">
                            
                            <svg width="18" height="10" viewBox="0 0 18 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.86719 4.9999L5.94155 0.925537M1.86719 4.9999L5.94155 9.07427M1.86719 4.9999H17.0005" stroke="white" stroke-width="1.3432"/>
                            </svg>

                        </div>
                        <div class="news-detail__link-text">
                            Вернуться к списку
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
