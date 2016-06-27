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
    $('.fileUpload input.upload').change(function() {
        var val = $(this).val();

        switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
            case 'gif': case 'jpg': case 'png': case 'jpeg':
                readURL(this);
                break;
            default:
                $(this).val('');
                // error message here
                alert("not an image");
                break;
        }
    });
    // Image Input File Preview
    readURL = function(input) {
        var el = $(input);
        if (el.parents('.fileUpload').hasClass('multiple') && input.files) {
            el.parents('.fileUpload').find('img').remove();
            $.each(input.files, function(index, val) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    el.parents('.fileUpload').append('<img src="'+e.target.result+'">');
                }
                reader.readAsDataURL(input.files[index]);
            });
        } else if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                el.parents('.fileUpload').find('img').attr('src', e.target.result);
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
            upload: {
                serverPath: '/admin/image/upload',
                fileFieldName: 'image',
                urlPropertyName: 'path'
            }
        }
    });

});
