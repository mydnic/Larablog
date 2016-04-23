$(document).ready(function() {

    $(".confirm-delete").click(function(e){
        if(!confirm('Are you sure?')){
            e.preventDefault();
            return false;
        }
        return true;
    });

});
