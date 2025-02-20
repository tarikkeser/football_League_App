let selectedImageId = null; 

// load all images
async function loadImages() {
    try {
        const response = await fetch('/api/gallery');
        const images = await response.json();
        
        const galleryList = document.getElementById('galleryList');
        galleryList.innerHTML = '';

       

        if (Array.isArray(images) && images.length > 0) {
            images.forEach(image => {
                const col = document.createElement('div');
                col.className = 'col-md-4 mb-4';
                col.innerHTML = `
                    <div class="card gallery-card" data-image-id="${image.id}">
                        <img src="${image.image_url}" 
                             class="card-img-top selectable-image" 
                             alt="Gallery Image"
                             style="height: 200px; object-fit: cover; cursor: pointer;">
                    </div>
                `;
                galleryList.appendChild(col);
            });

            // Resim seçme olaylarını ekle
            document.querySelectorAll('.gallery-card').forEach(card => {
                card.addEventListener('click', function() {
                    const imageId = this.dataset.imageId;
                    
                    // Önceden seçili olan kartın seçimini kaldır
                    const previousSelected = document.querySelector('.card.selected');
                    if (previousSelected) {
                        previousSelected.classList.remove('selected');
                    }

                    // Eğer aynı karta tıklanmadıysa yeni seçim yap
                    if (selectedImageId !== imageId) {
                        this.classList.add('selected');
                        selectedImageId = imageId;
                    } else {
                        selectedImageId = null;
                    }
                });
            });
        } else {
            galleryList.innerHTML = '<div class="col-12 text-center"><p>No images available.</p></div>';
        }
    } catch (error) {
        console.error('Error loading images:', error);
        const galleryList = document.getElementById('galleryList');
        galleryList.innerHTML = '<div class="col-12 text-center"><p>Error loading images.</p></div>';
    }
}

// Delete seçili resmi
async function deleteSelectedImage() {
    if (!selectedImageId) {
        alert('Please select an image to delete');
        return;
    }

    if (confirm('Are you sure you want to delete this image?')) {
        try {
            const response = await fetch(`/api/gallery/${selectedImageId}`, {
                method: 'DELETE'
            });
            
            if (response.ok) {
                const card = document.querySelector(`.gallery-card[data-image-id="${selectedImageId}"]`);
                card.closest('.col-md-4').remove();
                selectedImageId = null;
                alert('Image deleted successfully!');
            } else {
                const error = await response.json();
                alert(error.message || 'Failed to delete image');
            }
        } catch (error) {
            console.error('Error deleting image:', error);
            alert('Error deleting image');
        }
    }
}

// Event listeners
document.addEventListener('DOMContentLoaded', () => {
    loadImages();
    
    const deleteBtn = document.getElementById('deleteImageBtn');
    if (deleteBtn) {
        deleteBtn.addEventListener('click', deleteSelectedImage);
    }
});

// Resim ekleme fonksiyonu
const addImageForm = document.getElementById('addImageForm');
if (addImageForm) {
    addImageForm.addEventListener('submit', async (e) => {
        e.preventDefault();

        const formData = new FormData();
        const imageInput = document.getElementById('image');
        formData.append('image', imageInput.files[0]);

        try {
            const response = await fetch('/api/gallery', {
                method: 'POST',
                body: formData
            });
            const result = await response.json();
            
            if (result.success) {
                alert('Image added successfully!');
                loadImages();
                $('#addImageModal').modal('hide');
                addImageForm.reset();
            } else {
                alert('Failed to add image.');
            }
        } catch (error) {
            console.error('Error adding image:', error);
            alert('Error adding image');
        }
    });
}
