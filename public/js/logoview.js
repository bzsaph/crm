
    function resizeAndPreviewImage(event) {
        const file = event.target.files[0];
        const preview = document.getElementById('logoPreview');
        const sizeDisplay = document.getElementById('sizeDisplay');

        if (file) {
            // Check file type
            const allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif', 'image/svg+xml'];
            if (!allowedTypes.includes(file.type)) {
                alert('Please upload a valid image file (jpeg, png, jpg, gif, svg).');
                event.target.value = ''; // Clear the input
                preview.src = '#'; // Clear the image preview
                preview.style.display = 'none'; // Hide the image preview
                sizeDisplay.textContent = ''; // Clear the size and dimensions display
                return;
            }

            // Check file size
            if (file.size > 2 * 1024 * 1024) { // 2MB
                alert('File size exceeds 2MB. Please select a smaller file.');
                event.target.value = ''; // Clear the input
                preview.src = '#'; // Clear the image preview
                preview.style.display = 'none'; // Hide the image preview
                sizeDisplay.textContent = ''; // Clear the size and dimensions display
                return;
            }

            const reader = new FileReader();
            reader.onload = function(e) {
                const img = new Image();
                img.src = e.target.result;
                img.onload = function() {
                    resizeImage(img);
                }
            }
            reader.readAsDataURL(file);
        } else {
            preview.src = '#'; // Clear the image if no file is selected
            preview.style.display = 'none'; // Hide the image preview
            sizeDisplay.textContent = ''; // Clear the size and dimensions display
        }
    }

    function resizeImage(img) {
        const canvas = document.createElement('canvas');
        const ctx = canvas.getContext('2d');
        const maxWidth = 1024; // Maximum width
        const maxHeight = 1024; // Maximum height
        let width = img.width;
        let height = img.height;

        if (width > maxWidth || height > maxHeight) {
            if (width > height) {
                height = Math.round((height * maxWidth) / width);
                width = maxWidth;
            } else {
                width = Math.round((width * maxHeight) / height);
                height = maxHeight;
            }
        }

        canvas.width = width;
        canvas.height = height;
        ctx.drawImage(img, 0, 0, width, height);

        canvas.toBlob(function(blob) {
            const newImg = new Image();
            newImg.src = URL.createObjectURL(blob);
            displayImage(newImg);
        }, 'image/jpeg', 0.7); // Compress the image to 70% quality
    }

    function displayImage(img) {
        const preview = document.getElementById('logoPreview');
        const sizeDisplay = document.getElementById('sizeDisplay');

        preview.src = img.src;
        preview.style.display = 'block'; // Show the image preview

        img.onload = function() {
            sizeDisplay.textContent = `Width: ${img.width}px, Height: ${img.height}px`;
        }
    }