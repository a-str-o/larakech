document.addEventListener('DOMContentLoaded', function () {
    const buttons = document.querySelectorAll('[data-modal-toggle]');

    buttons.forEach(button => {
        const modalId = button.getAttribute('data-modal-toggle');
        const modal = document.getElementById(modalId);

        button.addEventListener('click', () => {
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        });
    });

    const hideButtons = document.querySelectorAll('[data-modal-hide]');

    hideButtons.forEach(button => {
        const modalId = button.getAttribute('data-modal-hide');
        const modal = document.getElementById(modalId);

        button.addEventListener('click', () => {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        });
    });
    
    const successMessage = document.querySelector('.bg-green-100');
    if (successMessage) {
        setTimeout(() => {
            successMessage.remove();
        }, 5000);
    }

    const errorMessage = document.querySelector('.bg-red-100');
    if (errorMessage) {
        setTimeout(() => {
            errorMessage.remove();
        }, 5000);
    }
});

