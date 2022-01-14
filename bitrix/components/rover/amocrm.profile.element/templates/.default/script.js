// mapping select boxes
BX.ready(function ()
{
    initAddSelectBoxes();
    initRemoveSelectBoxes();

    /**
     *
     */
    function initAddSelectBoxes()
    {
        var addSelectboxes = document.getElementsByClassName('asire__add-selectbox');

        if (!addSelectboxes.length){
            return;
        }

        for (var i in addSelectboxes)
        {
            if (typeof addSelectboxes[i] != 'object'){
                continue;
            }
            initAddSelectBox(addSelectboxes[i]);
        }
    }

    /**
     *
     */
    function initRemoveSelectBoxes()
    {
        var removeSelectboxes = document.getElementsByClassName('asire__remove-selectbox');

        if (!removeSelectboxes.length){
            return;
        }

        for (var i in removeSelectboxes)
        {
            if (typeof removeSelectboxes[i] != 'object'){
                continue;
            }
            initRemoveSelectBox(removeSelectboxes[i]);
        }
    }

    function initRemoveSelectBox(removeSelectBox)
    {
        removeSelectBox.addEventListener('click', function (e)
        {
            removeSelectBox.parentNode.parentNode.removeChild(removeSelectBox.parentNode);
        });
    }

    /**
     *
     * @param addSelectBox
     */
    function initAddSelectBox(addSelectBox)
    {
        addSelectBox.addEventListener('click', function (e)
        {
            var selectBoxContainer = this.parentNode,
                newSelectBoxContainer = selectBoxContainer.cloneNode(true),
                newRemoveSelectBox = document.createElement('span');

            newRemoveSelectBox.title = BX.message('rover_acpe__field_remove_title');
            newRemoveSelectBox.classList.add('asire__remove-selectbox');
            newRemoveSelectBox.classList.add('asire__minus');
            newRemoveSelectBox.innerHTML = '+';

            selectBoxContainer.insertBefore(newRemoveSelectBox, addSelectBox);
            selectBoxContainer.removeChild(addSelectBox);

            newSelectBoxContainer.getElementsByTagName('select')[0].selectedIndex = 0;

            selectBoxContainer.parentElement.appendChild(newSelectBoxContainer);

            initAddSelectBox(newSelectBoxContainer.getElementsByClassName('asire__add-selectbox')[0]);
            initRemoveSelectBox(selectBoxContainer.getElementsByClassName('asire__remove-selectbox')[0]);
        });
    }
});

// export buttons
BX.ready(function ()
{
    var exportButtons = document.getElementsByClassName('rover-as__ajax-button');

    function enableButtons()
    {
        for (let i = 0; i < exportButtons.length; i++)
        {
            exportButtons[i].removeAttribute('disabled');
        }
    }

    for (let i = 0; i < exportButtons.length; i++)
    {
        BX.bind(exportButtons[i], 'click', function (e)
        {
            // disable buttons
            for (let j = 0; j < exportButtons.length; j++)
            {
                exportButtons[j].setAttribute('disabled', 'disabled');
            }

            runRoverAmoCrmEventHandler(
                this.dataset.type,
                this.dataset.entities,
                this.dataset.profile,
                'progress-bar-container',
                this.dataset.agents === 'Y',
                this.dataset.name,
                BX.message('rover_ac__event_init'),
                this.dataset.success
            );

            e.preventDefault();
            e.stopPropagation();

            BX.addCustomEvent('AmoCrmFinishAddEvents', function (data)
            {
                if (data.data.agents === 'Y')
                {
                    enableButtons();
                }
            });

            BX.addCustomEvent('AmoCrmFinishHandleEvents', function (data)
            {
                enableButtons();
            });
        });
    }
});

function RoverAmoCrmPlaceholder()
{
    var popups = {},
        self = this;

    this.insertText = function (elementId, text) {
        //ищем элемент по id
        let element = document.getElementById(elementId);
        if (element.type == 'number'){
            return;
        }

        let start = element.selectionStart,
            end = element.selectionEnd;

        if (element.focused === undefined) {
            element.focused = start || end;
        } else {
            element.focused = true;
        }

        if (!element.focused) {
            start += element.value.length;
            end += element.value.length;
        }

        // текст до + вставка + текст после (если этот код не работает, значит у вас несколько id)
        // подмена значения
        element.value = element.value.substring(0, start) + text + element.value.substring(end);
        // возвращаем фокус на элемент
        element.focus();
        // возвращаем курсор на место - учитываем выделили ли текст или просто курсор поставили
        element.selectionEnd = ( start == end )? (end + text.length) : end ;
    };

    this.openPopup = function (elementId) {

        var element = document.getElementById(elementId),
            content = document.getElementById(elementId + '_placeholders').innerHTML,
            key;

        if (false === (self.hashCode(content) in popups)) {
            popups[self.hashCode(content)] = self.create(element, content);
        }

        for (key in popups) {
            popups[key].close();
        }

        var Popup = popups[self.hashCode(content)];
        Popup.show();
        Popup.hideOverlay();
    };

    this.hashCode = function(string) {
        var hash = 0, i, chr;
        if (string.length === 0) return hash;
        for (i = 0; i < string.length; i++) {
            chr   = string.charCodeAt(i);
            hash  = ((hash << 5) - hash) + chr;
            hash |= 0; // Convert to 32bit integer
        }
        return hash;
    };

    this.create = function (element, content) {
        return new BX.PopupWindow(self.hashCode(content), element, {
            content: content,// '<div id="mainshadow"></div>'+'<h3>Товар успешно добавлен в корзину</h3>',
            closeIcon: {right: "20px", top: "10px"},
            titleBar: {content: BX.create("span", {html: BX.message("rover_apu__placeholder_popup_header"), 'props': {'className': 'access-title-bar placeholder-title-bar'}})},
            zIndex: 0,
            //offsetLeft: 0,
            //offsetTop: 0,
            closeByEsc: true,
            maxHeight: 400,
            //draggable: {restrict: false},
            draggable: false,
            overlay: {backgroundColor: 'transparent', opacity: '0' },  /* затемнение фона */
            buttons: [
                /*new BX.PopupWindowButton({
                    text: "Перейти в корзину",
                    className: "popup-window-button-accept",
                    events: {click: function(){
                            location.href="/personal/cart/";
                        }}
                }),*/
                new BX.PopupWindowButton({
                    text: BX.message("rover_apu__placeholder_popup_close"),
                    className: "webform-button-link-cancel",
                    events: {click: function(){
                            this.popupWindow.close(); // закрытие окна
                        }}
                })
            ]
        });
    };
}

var RoverAmoCrmPlaceholder = new RoverAmoCrmPlaceholder();