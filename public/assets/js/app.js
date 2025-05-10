class JokeFetcher {
    constructor(btnId, outputId) {
        this.button = document.getElementById(btnId);
        this.output = document.getElementById(outputId);
        this.apiURL = 'https://www.blagues-api.fr/api/random';
        this.token = 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyX2lkIjoiMzUxMzE2MzI2MDc5NTI4OTYxIiwibGltaXQiOjEwMCwia2V5IjoidkZTN0p2MHA0M0xjc0NLemd0S3VZdlp6REIxVjMySmF2dTY4VHRwZURrUU9RYUFxb00iLCJjcmVhdGVkX2F0IjoiMjAyNS0wNS0xMFQyMzowMTowMCswMDowMCIsImlhdCI6MTc0NjkxODA2MH0.gkSa80o0mXkLehA41YXrKR1on0fxM8wBCC1H3ZXUbWI';
        this.init();
    }

    init() {
        if (this.button) {
            this.button.addEventListener('click', () => this.fetchJoke());
        }
    }

    async fetchJoke() {
        try {
            // Masque temporairement la sortie
            this.output.style.opacity = 0;

            const response = await fetch(this.apiURL, {
                headers: {
                    'Authorization': `Bearer ${this.token}`
                }
            });

            const data = await response.json();

            setTimeout(() => {
                if (data.joke && data.answer) {
                    this.output.innerHTML = `
                        <strong>${data.joke}</strong><br>
                        <em>${data.answer}</em>
                    `;
                } else {
                    this.output.textContent = "Aucune blague reçue.";
                }

                // Affiche avec fondu
                this.output.style.opacity = 1;
            }, 200);

        } catch (error) {
            this.output.textContent = "Erreur lors du chargement de la blague.";
            this.output.style.opacity = 1;
        }
    }
}

document.addEventListener('DOMContentLoaded', () => {
    new JokeFetcher('jokeBtn', 'jokeText');
});
