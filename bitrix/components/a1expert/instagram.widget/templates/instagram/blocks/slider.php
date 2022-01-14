<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<?php if ($result['ITEMS']): ?>
<div class="instagram-feed-container">
    <div class="instagram-feed__flex">
        <?php if (!empty($result['TITLE'])): ?>
            <div class="instagram-feed-title"><?php echo $result['TITLE'] ?></div>
        <?php endif; ?>
        <div class="instagram-feed-all">
            <a href="https://www.instagram.com/<?php echo $result['USER']['username'] ?>" target="_blank">Все записи</a>
        </div>
    </div>
    <div class="instagram-feed-content color_schema_<?php echo $option['COLOR_SCHEMA'] ?>">
        <div class="instagram-feed-posts-container">
            <div class="instagram-feed-posts-slider instagram-feed-posts if-slider">
                <div class="instagram-feed-posts-slider-inner instagram-feed-posts-inner if-slider-inner">
                    <div class="instagram-feed-posts-view if-slider-slide lazy" id="instagram-feed-slider">
                        <?php if ($result['POST_TEMPLATE'] === 'classic'): ?>
                            <?php foreach ($result['ITEMS'] as $arItem): ?>
                                <?php $arItem['IMAGE'] = $arItem['thumbnail_url'] ?? $arItem['media_url']; ?>
                                <div class="instagram-feed-item instagram-feed-posts-item-image-landscape">
                                    <div class="instagram-feed-item-header">
                                        <div class="instagram-feed-item-user">
                                            <div class="instagram-feed-item-user-wrapper">
                                                <?php if (in_array('user', $result['ELEMENTS_DISPLAY'])): ?>
                                                    <div class="instagram-feed-item-user__name"><a
                                                                href="https://www.instagram.com/<?php echo $result['USER']['username'] ?>"
                                                                target="_blank"><?php echo $result['USER']['username'] ?></a>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if (in_array('date', $result['ELEMENTS_DISPLAY'])): ?>
                                                    <div class="instagram-feed-item-user__date"><?php echo A1expertFunctions::timeAgo($arItem['timestamp']) ?></div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <?php if (in_array('instagram_link', $result['ELEMENTS_DISPLAY'])): ?>
                                            <div class="instagram-feed-item-instagram-link">
                                                <a href="<?php echo $arItem['permalink'] ?>"
                                                   target="_blank">
                                                    <svg class="instagram-feed-item-instagram-icon" viewBox="0 0 24 24"
                                                         width="24" height="24">
                                                        <path d="M17.1,1H6.9C3.7,1,1,3.7,1,6.9v10.1C1,20.3,3.7,23,6.9,23h10.1c3.3,0,5.9-2.7,5.9-5.9V6.9C23,3.7,20.3,1,17.1,1z
            M21.5,17.1c0,2.4-2,4.4-4.4,4.4H6.9c-2.4,0-4.4-2-4.4-4.4V6.9c0-2.4,2-4.4,4.4-4.4h10.3c2.4,0,4.4,2,4.4,4.4V17.1z"></path>
                                                        <path d="M16.9,11.2c-0.2-1.1-0.6-2-1.4-2.8c-0.8-0.8-1.7-1.2-2.8-1.4c-0.5-0.1-1-0.1-1.4,0C10,7.3,8.9,8,8.1,9S7,11.4,7.2,12.7
            C7.4,14,8,15.1,9.1,15.9c0.9,0.6,1.9,1,2.9,1c0.2,0,0.5,0,0.7-0.1c1.3-0.2,2.5-0.9,3.2-1.9C16.8,13.8,17.1,12.5,16.9,11.2z
             M12.6,15.4c-0.9,0.1-1.8-0.1-2.6-0.6c-0.7-0.6-1.2-1.4-1.4-2.3c-0.1-0.9,0.1-1.8,0.6-2.6c0.6-0.7,1.4-1.2,2.3-1.4
            c0.2,0,0.3,0,0.5,0s0.3,0,0.5,0c1.5,0.2,2.7,1.4,2.9,2.9C15.8,13.3,14.5,15.1,12.6,15.4z"></path>
                                                        <path d="M18.4,5.6c-0.2-0.2-0.4-0.3-0.6-0.3s-0.5,0.1-0.6,0.3c-0.2,0.2-0.3,0.4-0.3,0.6s0.1,0.5,0.3,0.6c0.2,0.2,0.4,0.3,0.6,0.3
            s0.5-0.1,0.6-0.3c0.2-0.2,0.3-0.4,0.3-0.6C18.7,5.9,18.6,5.7,18.4,5.6z"></path>
                                                    </svg>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="instagram-feed-item-media">
                                        <a href="<?php echo $arItem['permalink'] ?>"
                                           target="_blank" class="<?php echo $result['ACTION_CLICK_IMG'] == 'none' ? 'disabled' : ''?>">
                                            <div class="instagram-feed-item-image-wrapper">
                                                <img class="instagram-feed-item-image"
                                                     data-lazy="<?php echo $arItem['IMAGE'] ?>" alt="...">
                                                <video class="instagram-feed-item-image" src="" muted=""
                                                       style="display: none;"></video>
                                                <?php if ($arItem['media_type'] == 'VIDEO'): ?>
                                                    <span class="instagram-feed-posts-item-image-icon-video instagram-feed-posts-item-image-icon active">
                                                            <svg viewBox="0 0 24 24">
                                                                <path d="M23.467,5.762c-0.118-0.045-0.232-0.068-0.342-0.068c-0.246,0-0.451,0.087-0.615,0.26l-3.76,3.217v5.766l3.76,3.578c0.164,0.173,0.369,0.26,0.615,0.26c0.109,0,0.223-0.023,0.342-0.068C23.822,18.552,24,18.284,24,17.901V6.57C24,6.186,23.822,5.917,23.467,5.762z"></path>
                                                                <path d="M16.33,4.412c-0.77-0.769-1.696-1.154-2.78-1.154H3.934c-1.084,0-2.01,0.385-2.78,1.154C0.385,5.182,0,6.108,0,7.192v9.616c0,1.084,0.385,2.01,1.154,2.78c0.77,0.77,1.696,1.154,2.78,1.154h9.616c1.084,0,2.01-0.385,2.78-1.154c0.77-0.77,1.154-1.696,1.154-2.78v-3.076v-3.478V7.192C17.484,6.108,17.099,5.182,16.33,4.412z M8.742,17.229c-2.888,0-5.229-2.341-5.229-5.229c0-2.888,2.341-5.229,5.229-5.229S13.971,9.112,13.971,12C13.971,14.888,11.63,17.229,8.742,17.229z"></path>
                                                                <circle cx="8.742" cy="12" r="3.5"></circle>
                                                            </svg>
                                                        </span>
                                                <?php elseif ($arItem['media_type'] == 'CAROUSEL_ALBUM'): ?>
                                                    <span class="instagram-feed-posts-item-image-icon-carousel instagram-feed-posts-item-image-icon active">
                                                            <svg viewBox="0 0 45.964 45.964">
                                                                <path d="M32.399,40.565H11.113v1.297c0,2.24,1.838,4.051,4.076,4.051h26.733c2.239,0,4.042-1.811,4.042-4.051V15.13c0-2.237-1.803-4.068-4.042-4.068h-1.415v21.395C40.507,36.904,36.845,40.566,32.399,40.565z"></path>
                                                                <path d="M0,4.102l0,28.355c0,2.241,1.814,4.067,4.051,4.067h28.365c2.237,0,4.066-1.826,4.066-4.067l0-28.356c0-2.238-1.828-4.051-4.066-4.051H4.051C1.814,0.05,0,1.862,0,4.102z"></path>
                                                            </svg>
                                                        </span>
                                                <?php endif; ?>
                                            </div>
                                        </a>
                                    </div>
                                    <?php if (!empty($arItem['caption']) && in_array('text', $result['ELEMENTS_DISPLAY'])): ?>
                                        <div class="instagram-feed-posts-item-content">
                                            <a href="<?php echo $arItem['permalink'] ?>"
                                               target="_blank">
                                                <div class="instagram-feed-posts-item-content-text">
                                                    <?php echo $arItem['caption'] ?>
                                                </div>
                                            </a>
                                            <div class="instagram-feed-posts-item-content-text instagram-feed-posts-item-text-clone">
                                                <?php echo $arItem['caption'] ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <div class="instagram-feed-posts-item-meta">
                                        <?php if (in_array('share', $result['ELEMENTS_DISPLAY'])): ?>
                                            <div class="instagram-feed-posts-item-share">
                                                <svg class="instagram-feed-posts-item-share-icon"
                                                     viewBox="0 0 24 24" width="24"
                                                     height="24">
                                                    <path d="M22.8,10.5l-9.8-7.9c-0.2-0.2-0.5-0.2-0.7-0.1c-0.2,0.1-0.4,0.4-0.4,0.6v3.7C6.5,7,4.5,8.9,2.6,12.4C1,15.4,1,18.9,1,21.3
        c0,0.2,0,0.4,0,0.5c0,0.3,0.2,0.6,0.5,0.7c0.1,0,0.1,0,0.2,0c0.2,0,0.5-0.1,0.6-0.3c3.7-6.5,5.5-6.8,9.5-6.8V19
        c0,0.3,0.2,0.5,0.4,0.6s0.5,0.1,0.7-0.1l9.8-8c0.2-0.1,0.2-0.3,0.2-0.5S22.9,10.7,22.8,10.5z M13.2,17.6v-2.9
        c0-0.2-0.1-0.4-0.2-0.5c-0.1-0.1-0.3-0.2-0.5-0.2c-2.7,0-3.8,0-5.9,0.9c-1.8,0.8-2.8,2.3-4.2,4.5c0.1-2,0.3-4.4,1.4-6.4
        c1.7-3.2,3.5-4.8,8.7-4.8c0.4,0,0.7-0.3,0.7-0.7V4.6l8.1,6.5L13.2,17.6z"></path>
                                                </svg>
                                                <span class="instagram-feed-posts-item-share-label">Поделиться</span>
                                                <div class="instagram-feed-popover instagram-feed-popover-left">
                                                    <div class="instagram-feed-popover-content">
                                                        <div class="instagram-feed-popover-content-inner">
                                                            <div class="instagram-feed-popover-content-item">
                                                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $arItem['permalink'] ?>" target="_blank"></a>
                                                                <div class="instagram-feed-popover-content-item-icon">
                                                                    <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAyMS4wLjIsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjxzdmcgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgeD0iMHB4IiB5PSIwcHgiDQoJIHZpZXdCb3g9IjAgMCAyNCAyNCIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgMjQgMjQ7IiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxnPg0KCTxwYXRoIHN0eWxlPSJmaWxsOiNGRkZGRkY7IiBkPSJNNS43LDEzVjguMWgzLjZWNi4yYzAtMy4zLDIuNS02LjIsNS41LTYuMmgzLjl2NC45aC0zLjljLTAuNCwwLTAuOSwwLjUtMC45LDEuM3YxLjloNC45VjEzaC00Ljl2MTENCgkJSDkuM1YxM0g1Ljd6Ii8+DQo8L2c+DQo8L3N2Zz4NCg==">
                                                                </div>
                                                                <div class="instagram-feed-popover-content-item-title">
                                                                    Поделиться на Facebook
                                                                </div>
                                                            </div>
                                                            <div class="instagram-feed-popover-content-item">
                                                                <a href="https://twitter.com/home?status=<?php echo $arItem['permalink'] ?>" target="_blank"></a>
                                                                <div class="instagram-feed-popover-content-item-icon">
                                                                    <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAyMS4wLjIsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjxzdmcgdmVyc2lvbj0iMS4xIiBpZD0iTGF5ZXJfMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgeD0iMHB4IiB5PSIwcHgiDQoJIHZpZXdCb3g9IjAgMCAyNCAyNCIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgMjQgMjQ7IiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxnPg0KCTxwYXRoIGlkPSJ0d2l0dGVyLTQtaWNvbl8xXyIgc3R5bGU9ImZpbGw6I0ZGRkZGRjsiIGQ9Ik0yMS41LDcuMWMwLjMsNi45LTQuOSwxNC42LTE0LDE0LjZjLTIuOCwwLTUuNC0wLjgtNy41LTIuMg0KCQljMi42LDAuMyw1LjItMC40LDcuMy0yYy0yLjIsMC00LTEuNS00LjYtMy40YzAuOCwwLjEsMS41LDAuMSwyLjItMC4xYy0yLjQtMC41LTQtMi42LTMuOS00LjljMC43LDAuNCwxLjQsMC42LDIuMiwwLjYNCgkJQzEsOC4yLDAuNCw1LjMsMS43LDMuMWMyLjQsMyw2LjEsNC45LDEwLjEsNS4xYy0wLjctMy4xLDEuNi02LDQuOC02YzEuNCwwLDIuNywwLjYsMy42LDEuNmMxLjEtMC4yLDIuMi0wLjYsMy4xLTEuMg0KCQljLTAuNCwxLjEtMS4xLDIuMS0yLjIsMi43YzEtMC4xLDEuOS0wLjQsMi44LTAuOEMyMy4zLDUuNSwyMi41LDYuNCwyMS41LDcuMXoiLz4NCjwvZz4NCjwvc3ZnPg0K">
                                                                </div>
                                                                <div class="instagram-feed-popover-content-item-title">
                                                                    Поделиться на Twitter
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php elseif ($result['POST_TEMPLATE'] === 'tile'): ?>
                            <?php foreach ($result['ITEMS'] as $arItem): ?>
                                <?php $arItem['IMAGE'] = $arItem['thumbnail_url'] ?? $arItem['media_url']; ?>
                                <div class="instagram-feed-posts-item-template-tile instagram-feed-posts-item-image-landscape instagram-feed-item">
                                    <a href="<?php echo $arItem['permalink'] ?>"
                                       target="_blank" class="instagram-feed-posts-item-link<?php echo $result['ACTION_CLICK_IMG'] == 'none' ? ' disabled' : ''?>"
                                       rel="noopener noreferrer nofollow">
                                        <div class="instagram-feed-posts-item-media">
                                            <div class="instagram-feed-posts-item-image-wrapper">
                                                <img class="instagram-feed-posts-item-image"
                                                     data-lazy="<?php echo $arItem['IMAGE'] ?>" alt="#">
                                                <video class="instagram-feed-item-image" src="" muted=""
                                                       style="display: none;"></video>
                                                <?php if ($arItem['media_type'] == 'VIDEO'): ?>
                                                    <span class="instagram-feed-posts-item-image-icon-video instagram-feed-posts-item-image-icon active">
                                                            <svg viewBox="0 0 24 24">
                                                                <path d="M23.467,5.762c-0.118-0.045-0.232-0.068-0.342-0.068c-0.246,0-0.451,0.087-0.615,0.26l-3.76,3.217v5.766l3.76,3.578c0.164,0.173,0.369,0.26,0.615,0.26c0.109,0,0.223-0.023,0.342-0.068C23.822,18.552,24,18.284,24,17.901V6.57C24,6.186,23.822,5.917,23.467,5.762z"></path>
                                                                <path d="M16.33,4.412c-0.77-0.769-1.696-1.154-2.78-1.154H3.934c-1.084,0-2.01,0.385-2.78,1.154C0.385,5.182,0,6.108,0,7.192v9.616c0,1.084,0.385,2.01,1.154,2.78c0.77,0.77,1.696,1.154,2.78,1.154h9.616c1.084,0,2.01-0.385,2.78-1.154c0.77-0.77,1.154-1.696,1.154-2.78v-3.076v-3.478V7.192C17.484,6.108,17.099,5.182,16.33,4.412z M8.742,17.229c-2.888,0-5.229-2.341-5.229-5.229c0-2.888,2.341-5.229,5.229-5.229S13.971,9.112,13.971,12C13.971,14.888,11.63,17.229,8.742,17.229z"></path>
                                                                <circle cx="8.742" cy="12" r="3.5"></circle>
                                                            </svg>
                                                        </span>
                                                <?php elseif ($arItem['media_type'] == 'CAROUSEL_ALBUM'): ?>
                                                    <span class="instagram-feed-posts-item-image-icon-carousel instagram-feed-posts-item-image-icon active">
                                                            <svg viewBox="0 0 45.964 45.964">
                                                                <path d="M32.399,40.565H11.113v1.297c0,2.24,1.838,4.051,4.076,4.051h26.733c2.239,0,4.042-1.811,4.042-4.051V15.13c0-2.237-1.803-4.068-4.042-4.068h-1.415v21.395C40.507,36.904,36.845,40.566,32.399,40.565z"></path>
                                                                <path d="M0,4.102l0,28.355c0,2.241,1.814,4.067,4.051,4.067h28.365c2.237,0,4.066-1.826,4.066-4.067l0-28.356c0-2.238-1.828-4.051-4.066-4.051H4.051C1.814,0.05,0,1.862,0,4.102z"></path>
                                                            </svg>
                                                        </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="instagram-feed-posts-item-overlay">
                                            <div class="instagram-feed-posts-item-content mCustomScrollbar">
                                                <?php if (in_array('date', $result['ELEMENTS_DISPLAY'])): ?>
                                                    <div class="instagram-feed-item-user__date"><?php echo A1expertFunctions::timeAgo($arItem['timestamp']) ?></div>
                                                <?php endif; ?>
                                                <?php if (!empty($arItem['caption']) && in_array('text', $result['ELEMENTS_DISPLAY'])): ?>
                                                    <div class="instagram-feed-posts-item-text"><?php echo $arItem['caption'] ?></div>
                                                    <div class="instagram-feed-posts-item-text instagram-feed-posts-item-text-clone"><?php echo $arItem['caption'] ?></div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
                <?php if ($option['SLIDER_ARROW'] == 'Y'): ?>
                    <div class="instagram-feed-posts-slider-prev instagram-feed-posts-slider-nav if-slider-arrow-prev if-slider-arrow">
                        <svg viewBox="4 0 8 16" width="12" height="16" class="instagram-feed-posts-slider-nav-icon">
                            <path d="M4.3,8.7l6,5.9c0.4,0.4,1.1,0.4,1.5,0c0.4-0.4,0.4-1.1,0-1.5L6.5,8l5.2-5.2c0.4-0.4,0.4-1.1,0-1.5
        c-0.4-0.4-1.1-0.4-1.5,0l-6,6C3.9,7.7,3.9,8.3,4.3,8.7z"></path>
                        </svg>
                    </div>
                    <div
                            class="instagram-feed-posts-slider-next instagram-feed-posts-slider-nav if-slider-arrow-prev if-slider-arrow">
                        <svg viewBox="4 0 8 16" width="12" height="16" class="instagram-feed-posts-slider-nav-icon">
                            <path d="M11.7,7.3l-6-5.9c-0.4-0.4-1.1-0.4-1.5,0c-0.4,0.4-0.4,1.1,0,1.5L9.5,8l-5.2,5.2
        c-0.4,0.4-0.4,1.1,0,1.5c0.4,0.4,1.1,0.4,1.5,0l6-6C12.1,8.3,12.1,7.7,11.7,7.3z"></path>
                        </svg>
                    </div>
                <?php endif; ?>
            </div>
            <?php if ($option['SLIDER_DOTS'] == 'Y'): ?>
                <div class="instagram-feed-dots"></div>
            <?php endif; ?>
        </div>
    </div>
    <?php endif; ?>
</div>
<style>
    <?php if ($option['COLOR_SCHEMA'] == 12): ?>
    #instagram-app-<?php echo $result['hash'] ?> .color_schema_12 .instagram-feed-item, #instagram-app-<?php echo $result['hash'] ?> .color_schema_12 .instagram-feed-posts-item-overlay {
        background: #<?php echo $option['COLOR_POST_BGC'] ?>!important;
    }

    #instagram-app-<?php echo $result['hash'] ?> .color_schema_12 .instagram-feed-dots li.slick-active button {
        background: #<?php echo $option['COLOR_POST_BGC'] ?> !important;
        color: #<?php echo $option['COLOR_POST_LINK'] ?>!important;
    }

    #instagram-app-<?php echo $result['hash'] ?> .color_schema_12 .instagram-feed-item-user__name a, #instagram-app-<?php echo $result['hash'] ?> .color_schema_12 .instagram-feed-item-user__date {
        color: #<?php echo $option['COLOR_POST_LINK'] ?>!important;
    }

    #instagram-app-<?php echo $result['hash'] ?> .color_schema_12 .instagram-feed-item-instagram-icon {
        fill: #<?php echo $option['COLOR_POST_TXT'] ?>!important;
    }

    #instagram-app-<?php echo $result['hash'] ?> .color_schema_12 .instagram-feed-item-instagram-link a, #instagram-app-<?php echo $result['hash'] ?> .color_schema_12 .instagram-feed-item-media a {
        color: #<?php echo $option['COLOR_POST_LINK'] ?>!important;
    }

    #instagram-app-<?php echo $result['hash'] ?> .color_schema_12 .instagram-feed-item-instagram-link svg {
        fill: #<?php echo $option['COLOR_POST_LINK'] ?>!important;
    }

    #instagram-app-<?php echo $result['hash'] ?> .color_schema_12 .instagram-feed-posts-item-content a, #instagram-app-<?php echo $result['hash'] ?> .color_schema_12 .instagram-feed-posts-item-content-text,
    #instagram-app-<?php echo $result['hash'] ?> .color_schema_12 .instagram-feed-posts-item-share, #instagram-app-<?php echo $result['hash'] ?> .color_schema_12 .instagram-feed-posts-item-share-label,
    #instagram-app-<?php echo $result['hash'] ?> .color_schema_12 .instagram-feed-posts-item-overlay .instagram-feed-posts-item-text {
        color: #<?php echo $option['COLOR_POST_TXT'] ?>!important;
    }

    #instagram-app-<?php echo $result['hash'] ?> .color_schema_12 .instagram-feed-posts-item-share-icon {
        fill: #<?php echo $option['COLOR_POST_LINK'] ?>!important;
    }

    #instagram-app-<?php echo $result['hash'] ?> .color_schema_12 .instagram-feed-posts-slider-nav {
        background: #<?php echo $option['COLOR_ARROW_BGC'] ?>!important;
    }

    <?php endif; ?>
    #instagram-app-<?php echo $result['hash'] ?> #instagram-feed-slider .slick-slide {
        margin: 0 <?php echo $result['MARGIN_POSTS'] ?>px;
    }

    #instagram-app-<?php echo $result['hash'] ?> #instagram-feed-slider .slick-list {
        margin: 0 -<?php echo $result['MARGIN_POSTS'] ?>px;
    }

    /* мобильная адаптация отступы слайдера #<?php echo $result['hash'] ?> */
    <?php foreach ($result['MOBILE'] as $styleMobile): ?>
        @media screen and (max-width: <?php echo $styleMobile['breakpoint'] ?>px) {
            #instagram-app-<?php echo $result['hash'] ?> #instagram-feed-slider .slick-slide {
                margin: 0 <?php echo $styleMobile['margin'] ?>px!important;
            }

            #instagram-app-<?php echo $result['hash'] ?> #instagram-feed-slider .slick-list {
                margin: 0 -<?php echo $styleMobile['margin'] ?>px!important;
            }
        }
    <?php endforeach; ?>
</style>
<script>
    $(document).ready(function () {
        if (arA1expertOptions<?php echo $result['CONTAINER'] ?>['CONFIG']['USE_ACTIVE'] === 'Y') {
            setTimeout(() => {
                $('#' + arA1expertOptions<?php echo $result['CONTAINER'] ?>['CONFIG']['CONTAINER'] + ' .instagram_ajax').addClass('loaded');
                $('#' + arA1expertOptions<?php echo $result['CONTAINER'] ?>['CONFIG']['CONTAINER'] + ' .instagram-feed-container').addClass('loaded');

                $('#instagram-app-<?php echo $result['hash'] ?> #instagram-feed-slider').slick({
                    lazyLoad: 'ondemand',
                    cssEase: 'linear',
                    draggable: <?php echo $option['SLIDER_ARROW'] !== 'Y' ? 'true' : 'false' ?>,
                    infinite: false,
                    adaptiveHeight: true,
                    dots: <?php echo $option['SLIDER_DOTS'] === 'Y' ? 'true' : 'false' ?>,
                    appendDots: $('#instagram-app-<?php echo $result['hash'] ?> .instagram-feed-dots'),
                    rows: <?php echo $result['ROWS'] ?>,
                    slidesToShow: <?php echo $result['COLUMNS'] ?>,
                    slidesToScroll: <?php echo $result['COLUMNS'] ?>,
                    arrows: <?php echo $option['SLIDER_ARROW'] === 'Y' ? 'true' : 'false' ?>,
                    prevArrow: $('#instagram-app-<?php echo $result['hash'] ?> .instagram-feed-posts-slider-prev'),
                    nextArrow: $('#instagram-app-<?php echo $result['hash'] ?> .instagram-feed-posts-slider-next'),
                    speed: <?php echo $option['SLIDER_SPEED'] ?>,
                    autoplay: <?php echo $option['SLIDER_AUTOPLAY'] === 'Y' ? 'true' : 'false' ?>,
                    autoplaySpeed: Number(<?php echo $option['SLIDER_SPEED_AUTO'] ?>),
                    responsive: [
                        <?php foreach ($result['MOBILE'] as $mobile): ?>
                        {
                            breakpoint: <?php echo $mobile['breakpoint'] ?>,
                            settings: {
                                slidesToShow: <?php echo $mobile['slidesToShow'] ?>,
                                slidesToScroll: <?php echo $mobile['slidesToShow'] ?>,
                                slidesPerRow: <?php echo $mobile['slidesToShow'] ?>,
                                rows: 1
                            }
                        },
                        <?php endforeach; ?>
                    ]
                })
            }, 3000);
        }
    })
</script>