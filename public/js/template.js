let validate = {
    event: function () {
        document.querySelectorAll('input, textarea').forEach(function (element) {
            element.addEventListener('keyup', function () {
                let parent = this.parentElement;
                parent.querySelectorAll('._form-error').forEach(function (message) {
                    message.remove();
                });
                this.classList.remove('_form-error');
            });
        });
    },
    adds: function (block_id, jsonObject) {
        Object.keys(jsonObject).forEach(function (key) {
            var block = document.querySelector(block_id);
            let value = jsonObject[key];
            let message = '';
            if (Array.isArray(value)) {
                value.forEach(function (element) {
                    message += '<div class="form__error">' + element + '</div>';
                });
            } else {
                message = '<div class="form__error">' + value + '</div>';
            }
            let index = validate.convert_name(key);

            let inputElement = block.querySelector('input[name="' + index + '"]');
            if (inputElement) {
                var previousElement = inputElement.parentNode;
                if (previousElement !== null) {
                    previousElement.classList.add('_form-error');
                    previousElement.insertAdjacentHTML('beforeend', message);
                } else {
                    inputElement.classList.add('_form-error');
                    inputElement.insertAdjacentHTML('beforeend', message);
                }
            }
        });
    },
    remove_old: function (block_id, jsonObject = {}) {
        Object.keys(jsonObject).forEach(function (key) {
            let index = validate.convert_name(key);

            // input
            let inputElements = document.querySelectorAll(block_id + ' *[name="' + index + '"]');
            inputElements.forEach(function (inputElement) {
                let errorElements = inputElement.parentElement.querySelectorAll('.form__error');
                if (errorElements) {
                    errorElements.forEach(function (errorElement) {
                        errorElement.remove();
                    });
                }
                inputElement.previousElementSibling.parentNode.classList.remove('_form-error');
            });

        });
    },
    removes: function (block_id) {
        let inputElements = document.querySelectorAll(block_id + ' input, ' + block_id + ' textarea, ' + block_id + ' select');
        inputElements.forEach(function (inputElement) {
            let parentElement = inputElement.parentElement;
            if (parentElement) {
                let errorElements = parentElement.querySelectorAll('.form__error');
                errorElements.forEach(function (errorElement) {
                    errorElement.remove();
                });
                let previousElementSibling = inputElement.previousElementSibling;
                if (previousElementSibling && previousElementSibling.parentNode) {
                    previousElementSibling.parentNode.classList.remove('_form-error');
                }
            }
        });
    },
    convert_name: function (string) {
        let array = string.split('.');

        array.forEach(function (currentValue, index) {
            if (index !== 0) {
                array[index] = '[' + currentValue + ']';
            }
        });

        return array.join('');
    }
};
function setMpc3Cookie() {
    var url = window.location.href;
    var urlParts = url.split("?");
    if (urlParts.length > 1) {
        var queryString = urlParts[1];
        var queryParams = queryString.split("&");
        for (var i = 0; i < queryParams.length; i++) {
            var keyValue = queryParams[i].split("=");
            if (keyValue[0] === "mpc3") {
                document.cookie = "mpc3=" + keyValue[1] + "; path=/";
            }
        }
    }
}
document.addEventListener("DOMContentLoaded", function() {

    // phone mask
    const phoneInputs = document.querySelectorAll(".phone-mask");
    phoneInputs.forEach(function(phoneInput) {
        var iti = window.intlTelInput(phoneInput, {
            autoPlaceholder: "aggressive",
            countrySearch: false,
            useFullscreenPopup: false,
            showSelectedDialCode: true,
            onlyCountries: intl_tel_input_mask,
            customPlaceholder: function(selectedCountryPlaceholder, selectedCountryData) {
                let mask = `${selectedCountryPlaceholder}`.replace(/[0-9]/g, '9');
                let maskPlaceholder = `${mask}`.replace(/9/g, " ");
                Inputmask({
                    "mask": ` ${mask}`,
                    placeholder: " ",
                    clearMaskOnLostFocus: false,
                    showMaskOnHover: false,
                }).mask(phoneInput);
                return ` ${maskPlaceholder}`;
            },
            utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@19.5.5/build/js/utils.js"
        });

        phoneInput.addEventListener("countrychange", function() {
            phoneInput.value = ""; // Очистка поля при изменении кода страны
        });
    });

    // form send
    $('form[id^="form_"]').on('submit', function (e) {
        e.preventDefault();

        var countryCode = $(this).find('.iti__country-list li[aria-selected="true"]').attr('data-dial-code');

        $(this).find('input[name="country_code"]').val(countryCode);

        let $data = $(this).serializeArray();
        let form_id = '#' + $(this).attr('id');
        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: $data,
            async: false,
            success: function (json) {
                validate.removes(form_id);
                if(json['errors']){
                    validate.adds(form_id, json['errors']);
                }
                if(json['redirect']){
                    location.href = json['redirect'];
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    });

    // Добавляем в формы поле so
    $('*[data-popup]').on('click', function (e) {
        var popup_id = $(this).data('popup');
        var data_so = 'Invest';

        if ($(this).data('so') !== undefined && $(this).data('so') !== null) {
            data_so = $(this).data('so');
        }

        var $input_so = $(popup_id).find('input[name="so"]');
        if ($input_so.length) {
            $input_so.val(data_so);
        }
    });

    // Вызываем функцию для установки куки mpc3
    setMpc3Cookie();
});


