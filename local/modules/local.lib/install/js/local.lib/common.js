(function() {

    window.devbx ||= {};
    window.devbx.api ||= {};

    let api = window.devbx.api;

    api.basketItems = [];
    api.basketProduct = {};
    api.updatePool = {};
    api.popup = [];
    api.basketTotalQnt = 0;
    api.basketPage = '/personal/cart/';
    api.orderPage = '/personal/order/make/';
    api.popupActiveClass = 'open';

    api.templates = {
        popup: '<div class="popup__bg" data-action="close-popup"></div><div class="popup__window" data-entity="popup-content"><div data-entity="popup-buttons"></div></div>',
        basketCounter: '{count}'
    };

    api.popupButton = function(params) {
        return BX.create('button', {
            attrs: {
                className: 'popup__btn'
            },
            text: params.text
        });
    };

    api.messages = {
        addedToCard: 'Товар добавлен в корзину'
    };

    api.sendRequest = function (data, callback, context) {
        data.sessid = BX.bitrix_sessid();

        let params = {
            url: BX.message('DEVBX_API_URL'),
            data: data,
            dataType: 'json',
            method: 'POST',
        };

        data.sessid = BX.bitrix_sessid();
        data.siteId = BX.message('SITE_ID');
        data.templateId = BX.message('DEVBX_PUBLIC_TEMPLATE_ID');

        if (typeof callback === 'function')
        {
            if (typeof context === 'undefined')
                context = window;

            params.success = BX.proxy(callback, context);
        }

        $.ajax(params);
    };

    let packageResult = function(result) {

        if (result.hasOwnProperty('error')) {

            if (!!this.params && typeof this.params.showError === 'function')
            {
                this.self.showError(result.error);
                return;
            }
        }

        result.forEach(item => {

            if (!item.hasOwnProperty('method'))
                return;

            if (typeof this.context[item.method + 'Result'] === 'function') {
                this.context[item.method + 'Result'](item);
            }
        });
    };

    api.sendPackageRequest = function (items, context, params) {

        if (typeof context === 'undefined')
            context = window;

        if (!Array.isArray(items) || !items.length)
        {
            console.trace('package items empty', items);
            return;
        }

        $.ajax({
            url: BX.message('DEVBX_API_URL'),
            data: {
                sessid: BX.bitrix_sessid(),
                siteId: BX.message('SITE_ID'),
                templateId: BX.message('DEVBX_PUBLIC_TEMPLATE_ID'),
                package_call: items,
            },
            method: 'POST',
            context: {
                self: this,
                params: params,
                context: context,
            },
            success: packageResult,
        });
    };

    /**********************************/

    api.updateBasketCounter = function () {
        api.sendRequest({
            method: 'getBasket',
        }, api.getBasketResult, api);
    };

    api.getBasketResult = function(result) {
        if (!result.success)
            return;

        api.basketItems = result.items;
        api.basketProduct = {};

        api.basketTotalQnt = 0;

        result.items.forEach(item => {
            if (!api.basketProduct[item.PRODUCT_ID]) {
                api.basketProduct[item.PRODUCT_ID] = [];
            }

            api.basketProduct[item.PRODUCT_ID].push(item);

            api.basketTotalQnt += item.QUANTITY;
        });

        api.updateVisualBasket();
    };

    api.updateVisualBasket = function() {
        document.querySelectorAll('[data-action="addBasket"]').forEach(item => {
            let id = parseInt(item.dataset.id);

            if (isNaN(id))
                return;

            if (api.basketProduct[id]) {
                if (item.dataset.titleInBasket) {
                    item.innerHTML = item.dataset.titleInBasket;
                }

                item.classList.add('in-basket');
            } else {

                if (item.dataset.titleAddBasket) {
                    item.innerHTML = item.dataset.titleAddBasket;
                }

                item.classList.remove('in-basket');
            }

        });

        document.querySelectorAll('[data-entity="product-quantity"]').forEach(item => {
            let id = parseInt(item.dataset.id);

            if (isNaN(id))
                return;

            if (api.basketProduct[id]) {
                if (item.tagName === 'INPUT')
                {
                    item.value = api.basketProduct[id][0].QUANTITY;
                } else {
                    item.innerHTML = api.basketProduct[id][0].QUANTITY;
                }
            }
        });

        document.querySelectorAll('[data-entity="basket-counter"]').forEach(item => {
            item.innerHTML = api.templates.basketCounter.replaceAll('{count}', api.basketTotalQnt);
        });
    };

    api.addBasket = function (id, quantity) {
        devbx.api.sendPackageRequest([
                {
                    method: 'addBasket',
                    id: id,
                    quantity: quantity
                },
                {
                    method: 'getBasket',
                }
            ],
            api);
    };

    api.addBasketResult = function (result) {
        if (result.error) {
            let msg = Array.isArray(result.error) ? result.error.join(',') : result.error;

            alert(msg);
        }

        if (result.success && api.messages.addedToCard)
        {
            api.showPopup(api.messages.addedToCard, {buttons:[{text: 'Ok', action: 'close-popup'}]});
        }
    };

    api.addBasketAction = function (e, target) {
        let id = parseInt(target.dataset.id);

        if (isNaN(id))
            return;

        if (api.basketProduct[id]) {
            window.location.href = api.basketPage;

            /*let data = [];

            api.basketProduct[id].forEach(item => {
                data.push({
                    method: 'deleteBasket',
                    id: item.ID
                });
            });

            data.push({
                method: 'getBasket'
            })

            devbx.api.sendPackageRequest(data, api);*/

        } else {
            let qntNode = document.querySelector('[data-entity="product-quantity"][data-id="' + id + '"]'),
                quantity = 1;

            if (qntNode) {
                if (qntNode.tagName === 'INPUT')
                {
                    quantity = parseInt(qntNode.value);
                } else {
                    quantity = parseInt(qntNode.innerText);
                }
            }

            if (isNaN(quantity) || quantity <= 0)
                quantity = 1;

            api.addBasket(id, quantity);
        }
    };

    api.productQuantityChange = function(e, target) {
        let id = parseInt(target.dataset.id),
            value = parseFloat(target.value);

        if (!api.basketProduct[id] || value<=0)
            return;

        let basketItem = api.basketProduct[id][0];

        basketItem.QUANTITY = value;

        if (api.updateTimer) {
            clearTimeout(api.updateTimer);
        }

        api.updatePool[basketItem.ID] = {
            method: 'changeBasketQuantity',
            id: basketItem.ID,
            quantity: basketItem.QUANTITY
        };

        api.updateTimer = setTimeout(api.sendUpdatePool, 300);
    };

    api.changeQuantityAction = function (e, target) {
        let id = parseInt(target.dataset.id),
            value = parseInt(target.dataset.value);

        if (isNaN(id) || isNaN(value))
            return;

        if (!api.basketProduct[id])
            return;

        let basketItem = api.basketProduct[id][0];

        basketItem.QUANTITY += value;
        if (basketItem.QUANTITY <= 0)
            basketItem.QUANTITY = 1;

        api.updatePool[basketItem.ID] = {
            method: 'changeBasketQuantity',
            id: basketItem.ID,
            quantity: basketItem.QUANTITY
        };

        api.updateTimer = setTimeout(BX.proxy(api.sendUpdatePool, api), 300);
    };

    api.sendUpdatePool = function() {
        api.updateTimer = false;

        let packets = Object.values(api.updatePool);

        if (!packets.length)
            return;

        packets.push({
            method: 'getBasket'
        });

        devbx.api.sendPackageRequest(packets, api);
    };

    api.navShowPageAction = function (e, target) {
        BX.PreventDefault(e);

        if (!target.href.length || target.href.indexOf('#') === 0)
            return;

        console.assert(target.dataset.target, 'data-target');
        if (!target.dataset.target)
            return;

        history.pushState({}, '', target.href);

        $.ajax({
            url: target.href,
            method: 'POST',
            data: {
                catalog_ajax: 'y',
            },
            context: {
                target: target.dataset.target
            },
            success: api.navShowPageResult,
        });
    };

    api.navShowPageResult = function (result) {
        let obHtml = BX.processHTML(result, false),
            tmp = document.createElement('div'),
            updateEntity = this.target.split(',');

        tmp.innerHTML = obHtml.HTML;

        updateEntity.forEach(entityName => {

            let newNode = tmp.querySelector('[data-entity="' + entityName + '"]');

            if (!newNode)
                return;

            let node = document.querySelector('[data-entity="' + entityName + '"]');

            if (node) {
                node.innerHTML = newNode.innerHTML;
            }

        });

        BX.ajax.processScripts(obHtml.SCRIPT, false);
    };

    api.navShowMoreAction = function (e, target) {
        BX.PreventDefault(e);

        history.pushState({}, false, target.dataset.href);

        $.ajax({
            url: target.dataset.href,
            method: 'POST',
            data: {
                catalog_ajax: 'y',
            },
            context: {
                content: target.dataset.content,
                nav: target.dataset.nav
            },
            success: api.navShowMoreResult,
        });
    };

    api.navShowMoreResult = function (result) {
        let obHtml = BX.processHTML(result, false),
            tmp = document.createElement('div'),
            node;

        tmp.innerHTML = obHtml.HTML;

        node = tmp.querySelector('[data-entity="'+this.content+'"]');

        if (node) {
            document.querySelector('[data-entity="'+this.content+'"]').insertAdjacentHTML('beforeend', node.innerHTML);
        }

        if (this.nav)
        {
            node = tmp.querySelector('[data-entity="'+this.nav+'"]');
            {
                document.querySelector('[data-entity="'+this.nav+'"]').innerHTML = node.innerHTML;
            }
        }
    };

    api.showPopup = function (content, params) {
        params = params || {};

        let node = BX.create('DIV', {
            attrs: {
                className: 'popup '+(params.popup_class || ''),
                'data-action': 'close-popup'
            }
        });

        node.innerHTML = api.templates.popup;

        node.querySelector('[data-entity="popup-content"]').insertAdjacentHTML('afterbegin', content);

        document.body.insertAdjacentElement('beforeend', node);

        if (Array.isArray(params.buttons))
        {
            params.buttons.forEach(button => {

                let btnNode = api.popupButton(button);

                if (!!button.action)
                    btnNode.dataset.action = button.action;

                node.querySelector('[data-entity="popup-buttons"]').appendChild(btnNode);

            });
        }

        api.popup.push(node);

        devbx.utils.bindObjEvents(node, api, 'popup');

        setTimeout(function() {
            node.classList.add(api.popupActiveClass);
        }, 100);

        return node;
    };

    api.popupClosePopupAction = function(e, target)
    {
        let node = target.closest('.popup'),
            idx = api.popup.indexOf(node);

        /*if (target.querySelector('[data-entity="popup-content"]').contains(e.target))
            return;*/

        if (target === node && e.target !== target)
            return;

        if (!node)
            return;

        if (idx>-1)
        {
            api.popup.splice(idx, 1);
        }

        node.classList.remove(api.popupActiveClass);

        setTimeout(function() {
            BX.cleanNode(node, true);
        }, 500);
    };

    api.closePopup = function(target)
    {
        let idx;

        if (target)
        {
            idx = api.popup.indexOf(target);
        } else {
            idx = api.popup.length-1;
        }

        if (idx>-1)
        {
            let node = api.popup[idx];
            api.popup.splice(idx, 1);

            node.classList.remove(api.popupActiveClass);

            setTimeout(function() {
                BX.cleanNode(node, true);
            }, 500);

        }
    };

    api.getPopup = function()
    {
        return api.popup.length ? api.popup[api.popup.length-1] : null;
    };

    api.logoutAction = function(e, target)
    {
        BX.PreventDefault();

        devbx.api.sendRequest({
            method: 'logout',
        }, api.logoutResult, api);

        return false;
    };

    api.logoutResult = function(response)
    {
        window.location.href = '/';
    };

    api.init = function()
    {
        api.updateBasketCounter();

        devbx.utils.bindObjEvents(document, api, '', ['click', 'change', 'input']);

        if (document.readyState !== 'complete')
        {
            window.addEventListener('load', function() {
                api.updateVisualBasket();
            });
        }
    };

})();