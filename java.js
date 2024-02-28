document.addEventListener('DOMContentLoaded', function () {
    const scrollButtons = document.querySelectorAll('.scroll-button');

    scrollButtons.forEach(button => {
        button.addEventListener('click', () => {
            const targetId = button.getAttribute('data-target');
            const targetSection = document.getElementById(targetId);

            if (targetSection) {
                targetSection.scrollIntoView({ behavior: 'smooth' });
            }
        });
    });
});

let currentImageIndex = 0;
const images = ["image1.jpg", "image2.jpg", "image3.jpg", "image4.jpg", "image5.jpg", "image6.jpg"];

function changeImage(delta) {
    currentImageIndex += delta;
    if (currentImageIndex < 0) {
        currentImageIndex = images.length - 1;
    } else if (currentImageIndex >= images.length) {
        currentImageIndex = 0;
    }

    const galleryImage = document.querySelector('.gallery-image img');
    galleryImage.src = images[currentImageIndex];
}