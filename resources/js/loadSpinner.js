const form = document.getElementById('myForm');
    const button = document.getElementById('submitButton');

    if (form && button) {
        form.addEventListener('submit', function(event) {
            event.preventDefault();


            const buttonText = button.querySelector('.button-text');
            const spinner = button.querySelector('svg');


            if (buttonText && spinner) {
                buttonText.classList.add('hidden');
                spinner.classList.remove('hidden');
            }


            button.disabled = true;


            form.submit();
        });
    }