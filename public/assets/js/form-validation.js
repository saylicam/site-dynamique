document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');

    if (!form) return;

    form.addEventListener('submit', function (e) {
        let isValid = true;

        const errorMessages = form.querySelectorAll('.error-message');
        errorMessages.forEach(el => el.remove());

        const inputs = form.querySelectorAll('input, textarea');
        inputs.forEach(input => {
            input.removeAttribute('aria-invalid');

            // Check required
            if (input.hasAttribute('required') && !input.value.trim()) {
                showError(input, "Ce champ est requis.");
                isValid = false;
                return;
            }

            // Check minlength
            if (input.hasAttribute('minlength') && input.value.trim().length < parseInt(input.getAttribute('minlength'))) {
                showError(input, `Minimum ${input.getAttribute('minlength')} caractères requis.`);
                isValid = false;
                return;
            }

            // Check maxlength
            if (input.hasAttribute('maxlength') && input.value.trim().length > parseInt(input.getAttribute('maxlength'))) {
                showError(input, `Maximum ${input.getAttribute('maxlength')} caractères autorisés.`);
                isValid = false;
                return;
            }

            // Check email format
            if (input.type === 'email' && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(input.value.trim())) {
                showError(input, "Adresse email invalide.");
                isValid = false;
                return;
            }

            // Check confirmation mot de passe
            if (input.name === 'inscription_motDePasse_confirmation') {
                const passwordInput = form.querySelector('[name="inscription_motDePasse"]');
                if (passwordInput && input.value !== passwordInput.value) {
                    showError(input, "Les mots de passe ne correspondent pas.");
                    isValid = false;
                }
            }
        });

        if (!isValid) {
            e.preventDefault();
        }
    });

    function showError(input, message) {
        input.setAttribute('aria-invalid', 'true');
        const error = document.createElement('div');
        error.className = 'error-message';
        error.textContent = message;
        input.insertAdjacentElement('afterend', error);
    }
});


