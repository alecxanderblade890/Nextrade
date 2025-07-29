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

// Make modal functions globally available
window.openDeleteModal = function(deleteUrl) {
    const modal = document.getElementById('deleteModal');
    const form = document.getElementById('deleteForm');
    if (form && modal) {
        form.action = deleteUrl;
        modal.classList.remove('hidden');
        document.body.style.overflow = 'hidden';
    }
    return false; // Prevent default form submission
}

window.closeDeleteModal = function() {
    const modal = document.getElementById('deleteModal');
    if (modal) {
        modal.classList.add('hidden');
        document.body.style.overflow = 'auto';
    }
    return false; // Prevent default form submission
}

// Initialize event listeners when DOM is loaded
document.addEventListener('DOMContentLoaded', function () {
    // Image preview functionality
    const input = document.getElementById('image');
    
    // Close modal when clicking outside of it
    const modal = document.getElementById('deleteModal');
    if (modal) {
        modal.addEventListener('click', function(event) {
            if (event.target === modal) {
                window.closeDeleteModal();
            }
        });
    }
    
    // Close modal with Escape key
    document.addEventListener('keydown', function(event) {
        const modal = document.getElementById('deleteModal');
        if (event.key === 'Escape' && modal && !modal.classList.contains('hidden')) {
            window.closeDeleteModal();
        }
    });
    if (input) {
        input.addEventListener('change', previewImage);
    }
});