
document.addEventListener("DOMContentLoaded", function() {
    const images = document.querySelectorAll(".hover-seen");
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    images.forEach(function(image) {
        image.addEventListener("click", function() {
            const blogId = image.getAttribute("data-blog-id");

            fetch('/change-seen-value/' + blogId, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken,
                },
                body: JSON.stringify({ blogId: blogId }),
            })
            .then(function(response) {
                if (response.ok) {
                    image.style.display = 'none';
                }
            })
            .catch(function(error) {
                console.error('There was an error changing the value: ' + error);
            });
        });
    });
});