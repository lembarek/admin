(function(){
    $.subscribe('form.submitted', function(event, button){
        $(button.parentElement.parentElement).addClass('hide');
    })
})()
