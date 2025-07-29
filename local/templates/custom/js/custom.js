devbx.api.init();

devbx.api.templates.popup =
    '<div class="popup__cont"><div class="popup__close" data-action="close-popup"></div><div data-entity="popup-content"><div data-entity="popup-buttons"></div></div></div>';
devbx.api.templates.basketCounter =
    '<i class="sale-basket-small-tab-icon glyph-icon-cart"></i><span class="sale-basket-small-tab-counter intec-cl-background-dark favorite_cnt hide">{count}</span>';
devbx.api.popupActiveClass = "popup-active";

devbx.api.showFormAction = function (e, target) {
    BX.PreventDefault(e);

    let params = JSON.parse(target.dataset.params);

    params.method = "showForm";

    this.sendRequest(params, this.showFormResult, this);
};

devbx.api.showFormResult = function (response) {
    let obHtml = BX.processHTML(response.content + response.js, false),
        popup = this.showPopup(obHtml.HTML);

    BX.ajax.processScripts(obHtml.SCRIPT, false);
};


