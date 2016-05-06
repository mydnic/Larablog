$(document).ready(function() {

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

});
