import './bootstrap';

function previewImage(event) {
    const input = event.target;
    const preview = document.getElementById('imagePreview');
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.classList.remove('hidden');
        }
        reader.readAsDataURL(input.files[0]);
    } else {
        preview.src = '#';
        preview.classList.add('hidden');
    }
}

document.addEventListener('DOMContentLoaded', function () {
    const input = document.getElementById('image');
    if (input) {
        input.addEventListener('change', previewImage);
    }
});