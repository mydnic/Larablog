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
    $(".fileUpload .upload").change(function() {
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
                serverPath: 'https://api.imgur.com/3/image',
                fileFieldName: 'image',
                headers: {'Authorization': 'Client-ID 9e57cb1c4791cea'},
                urlPropertyName: 'data.link'
            }
        }
    });

});
