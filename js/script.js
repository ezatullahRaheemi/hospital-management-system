$(document).ready(function(){
    $("a.delete").click(function() {
        var sure = window.confirm("Are you sure delete this!");
        if(!sure)
        {
            event.preventDefault();
        }
    });
    window.setTimeout(function(){
        $(".alert").slideUp(1000);
    }, 5000);
});