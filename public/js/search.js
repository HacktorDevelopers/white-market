$('#search-bar').submit(function(e){
    e.preventDefault();
    

    // let by = $("#search_by").val();
    let key = $("#keyword").val();
    let url = $(this).attr('action');
    if(!key){
        $.notify("Please enter a keyword. example: Phone", 'warning')
    }else{
        $.notify('Searching...', 'info');
        window.location.assign(url+'/'+key);
    }

});

