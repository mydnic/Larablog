jQuery(document).ready(function($) {

    // Simple Confirmation Pop-up
    $(".confirm-delete").click(function(e){
        if(!confirm('Are you sure?')){
            e.preventDefault();
            return false;
        }
        return true;
    });

    // File Upload Previewer
    $(".fileUpload input.upload").change(function() {
        var val = $(this).val();

        switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
            case 'gif': case 'jpg': case 'png':
                var id = $(this).attr('id');
                readURL(this, id);
                break;
            default:
                $(this).val('');
                // error message here
                alert("not an image");
                break;
        }
    });
    // Image Input File Preview
    readURL = function(input, id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#' + id).next('img').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    // Init Wysiwyg
    $('textarea.wysiwyg').trumbowyg({
        autogrow: true,
        btnsDef: {
            // Customizables dropdowns
            image: {
                dropdown: ['insertImage', 'upload', 'base64', 'noEmbed'],
                ico: 'insertImage'
            }
        },
        btns: [
            ['viewHTML'],
            ['undo', 'redo'],
            ['formatting'],
            'btnGrp-design',
            ['link'],
            ['image'],
            'btnGrp-justify',
            'btnGrp-lists',
            ['foreColor', 'backColor'],
            ['preformatted'],
            ['horizontalRule'],
            ['fullscreen']
        ],
        plugins: {
            // Add imagur parameters to upload plugin
            upload: {
                serverPath: '/admin/image/upload',
                fileFieldName: 'image',
            }
        }
    });

});
