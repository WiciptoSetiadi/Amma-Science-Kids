document.querySelectorAll('[data-password-toggle]').forEach((button) => {
    button.addEventListener('click', () => {
        const input = document.getElementById(button.dataset.passwordToggle);

        if (! input) {
            return;
        }

        const isPassword = input.type === 'password';

        input.type = isPassword ? 'text' : 'password';
        button.setAttribute('aria-label', isPassword ? 'Sembunyikan kata sandi' : 'Tampilkan kata sandi');
    });
});

document.querySelectorAll('[data-auth-form]').forEach((form) => {
    const password = form.querySelector('#password');
    const confirmation = form.querySelector('#password_confirmation');

    if (password && confirmation) {
        const validateConfirmation = () => {
            confirmation.setCustomValidity(
                confirmation.value && confirmation.value !== password.value
                    ? 'Konfirmasi kata sandi harus sama dengan kata sandi.'
                    : '',
            );
        };

        password.addEventListener('input', validateConfirmation);
        confirmation.addEventListener('input', validateConfirmation);
    }

    form.addEventListener('submit', () => {
        if (! form.checkValidity()) {
            return;
        }

        const submitButton = form.querySelector('button[type="submit"]');
        const label = submitButton?.querySelector('[data-submit-label]');

        if (submitButton && label) {
            submitButton.disabled = true;
            label.textContent = 'Memproses...';
        }
    });
});
