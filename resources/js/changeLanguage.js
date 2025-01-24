document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('#IT').forEach((element) => {
        // change the language to italian
        element.addEventListener('click', async function () {
            const csrfToken = document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute('content');

            await fetch('/translations', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                },
                body: JSON.stringify({
                    locale: 'it',
                }),
            }).then(() => {
                document.location.reload();
            });
        });
    });

    document.querySelectorAll('#EN').forEach((element) => {
        // change the language to english
        element
            .addEventListener('click', async function () {
                console.log('EN');
                const csrfToken = document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute('content');

                await fetch('/translations', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                    },
                    body: JSON.stringify({
                        locale: 'en',
                    }),
                }).then((response) => {
                    document.location.reload();
                });
            });
    });
});
