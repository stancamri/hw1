document.addEventListener('DOMContentLoaded', () => {
    const form = document.querySelector('form');
    const usernameInput = document.getElementById('username');
    const passwordInput = document.getElementById('password');

    if (form) {
    form.addEventListener('submit', async (event) => {
        event.preventDefault();

        // Controllo validità password
        const password = passwordInput.value;
        const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

        if (!passwordRegex.test(password)) {
            alert('La password deve contenere almeno 8 caratteri, una lettera maiuscola, un numero e un simbolo speciale.');
            return;
        }

        // Verifica se l'username è già in uso
        const response = await fetch(`check_username.php?username=${usernameInput.value}`);
        const data = await response.json();

        if (data.exists) {
            alert('Username già in uso');
            return;
        }

        // Se tutto è valido, invia il modulo
        form.submit();
    });
};
});
