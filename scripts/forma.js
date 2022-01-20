"use strict"

document.addEventListener('DomContentLoaded', function() {
    const from = document.getElementById('form');
    from.addEventListener('submit', formSend);

    async function formSend(e) {
        e.preventDefault();

        let error = formValidate(form);

        let formData = new FormData(form);
        //formData.append('image', fromImage.files[0]); 
        if (error === 0) {
            let response = await fetch('sendmail.php', {
                method: 'POST',
                body: formData
            });
            if (response.ok) {
                let result = await response.json();
                alert(result.message);
                fromPreview.innerHTML = '';
                form.reset();
                alert('Спасибо!'); // test
            } else {
                alert('Ошибка!');
            }
        } else {
            alert('Заполни обязательные поля!!!');
        }
    }

    function formValidate(form) {
        let error = 0;
        let formReq = document.querySelectorAll('._req');

        for (let index = 0; index < formReq.length; index++) {
            const input = formReq[index];
            formRemoveError(input);

            if (input.classList.contains('_email')) {
                // валидация
            }
        }

        function formAddError(input) {
            input.parentElement.classList.add('_error');
            input.classList.add('_error');
        }

        function formRemoveError(input) {
            input.parentElement.classList.remove('_error');
            input.classList.remove('_error');
        }

        return error;
    }
});