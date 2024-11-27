function handleFileInputChange(evt, maxSizeKB, imgElementId, imgfieldelement ='') {
    var input = evt.target;
    var file = input.files[0];
    
    if (file) {
        var fileSize = file.size;
        var maxSize = maxSizeKB * 1024; // Convert KB to bytes
        
        if (fileSize > maxSize) {
            alert('File size exceeds ' + maxSizeKB + 'KB. Please choose a smaller file.');
            input.value = ''; // Clear the file input to reset
        } else {
            const imageElement = document.getElementById(imgElementId);
            imageElement.src = URL.createObjectURL(file);
            
            var reader = new FileReader();
            
            reader.onload = function(e) {
                input.dataset.blob = e.target.result;
                if(imgfieldelement != ''){
                    imgfieldelement.value = e.target.result;
                }
            };
            
            reader.readAsDataURL(file);
        }
    }
}

const blogimg = document.getElementById('blogimg');
const categoryimg = document.getElementById('categoryimg');
const removeimg = document.getElementById('removeimg');
const fimg = document.getElementById('fimg')
const blogimgblob = document.getElementById('blogimgblob');
const categoryimgblob = document.getElementById('categoryimgblob');

if (blogimg) {
    blogimg.onchange = function(evt) {
        const [file] = blogimg.files
        if (file){
            handleFileInputChange(evt, 300, 'fimg', blogimgblob);
        }
    };
}
if (categoryimg) {
    categoryimg.onchange = function(evt) {
        const [file] = categoryimg.files
        if (file){
            handleFileInputChange(evt, 300, 'fimg', categoryimgblob);
        }
    };
}

if(removeimg){
    removeimg.addEventListener('click', (e) => {
        e.preventDefault();
        if(blogimg){
            blogimg.value = '';
            document.getElementById('fimg').setAttribute('src', 'http://matters.cloud392.com/wp-content/uploads/2024/06/camera-icon.png');
        }
        if(categoryimg){
            categoryimg.value = '';
            document.getElementById('fimg').setAttribute('src', 'http://matters.cloud392.com/wp-content/uploads/2024/06/camera-icon.png');
        }
    });
}