function JCDevBxPopupForm(params) {
    this.params = params;
    BX.ready(BX.proxy(this.init, this));
}

JCDevBxPopupForm.prototype.init = function () {
    this.modalFormId = this.params.uniqueId + '_form';

    BX.bind(BX(this.params.uniqueId), 'click', BX.proxy(this.openModal, this));
};

JCDevBxPopupForm.prototype.openModal = function (e) {
    e.preventDefault();

    var data = {};

    for (var i = 0; i < this.params.hiddenFields.length; i++) {
        data[this.params.hiddenFields[i].NAME] = this.params.hiddenFields[i].VALUE;
    }

    data[this.params.actionVariable] = 'SHOW_POPUP';
    data['template'] = this.params.signedTemplate;
    data['parameters'] = this.params.signedParamsString;
    data['SITE_ID'] = this.params.siteId;

    BX.ajax({
        url: this.params.ajaxUrl,
        method: 'POST',
        data: data,
        dataType: 'html',
        processData: false,
        onsuccess: BX.proxy(this.ajaxResult, this)
    });
};

JCDevBxPopupForm.prototype.ajaxResult = function (result) {
    var ob = BX.processHTML(result, false);
    result = ob.HTML;
    scripts = ob.SCRIPT;
    styles = ob.STYLE;

    if (styles.length > 0)
        BX.loadCSS(styles);

    $.fancybox(result);

    BX.ajax.processScripts(scripts, true);
    BX.ajax.processScripts(scripts, false);

    this.bindFormEvents();
};

JCDevBxPopupForm.prototype.bindFormEvents = function () {
    BX.bindDelegate(document.querySelector('.fancybox-inner'), 'submit', {}, BX.proxy(this.submitModalForm, this));
};

JCDevBxPopupForm.prototype.submitModalForm = function (e) {
    BX.PreventDefault(e);

    var form = e.target;

    var formData = new FormData;

    var items = form.querySelectorAll('input[type=text], input[type=hidden]'),
        i, j, subItems;

    for (i = 0; i < items.length; i++) {
        formData.append(items[i].name, items[i].value);
    }

    items = form.querySelectorAll('select');
    for (i = 0; i < items.length; i++) {
        subItems = items[i].querySelectorAll('option');
        for (j = 0; j < subItems.length; j++) {
            if (subItems[j].selected) {
                formData.append(items[i].name, subItems[j].value);
            }
        }
    }

    items = form.querySelectorAll('input[type=radio], input[type=checkbox]');
    for (i = 0; i < items.length; i++) {
        if (items[i].checked) {
            formData.append(items[i].name, items[i].value);
        }
    }

    items = form.querySelectorAll('input[type=file]');
    for (i = 0; i < items.length; i++) {
        for (j = 0; j < items[i].files.length; j++) {
            formData.append(items[i].name, items[i].files[j]);
        }
    }

    BX.ajax({
        url: this.params.ajaxUrl,
        method: 'POST',
        data: formData,
        dataType: 'html',
        processData: false,
        preparePost: false,
        onsuccess: BX.proxy(this.ajaxSubmitResult, this)
    });
};

JCDevBxPopupForm.prototype.ajaxSubmitResult = function (result) {
    var ob = BX.processHTML(result, false);
    result = ob.HTML;
    scripts = ob.SCRIPT;
    styles = ob.STYLE;

    document.querySelector('.fancybox-inner').innerHTML = result;

    BX.ajax.processScripts(scripts, true);
    BX.ajax.processScripts(scripts, false);

    this.bindFormEvents();
};