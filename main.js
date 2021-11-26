(function ($) {
    $('.btn_modal').click(function(e){
        e.preventDefault();
        
        $.ajax(
            {
                url : ajax.ajaxurl,
                type : 'post',
                data : {
                    action : 'get_modal',
                },
                beforeSend: function(){
                },
                success : function( response ) {
                    var data = JSON.parse(response);
                    $('.modal-title').text(data['title']);
                    $('.modal-body').html(data['content']);
                    $('.modal .btn-primary').text(data['btn_txt']);
                    $('.modal').modal('show');                
                }
            }
        );
    });
})( jQuery );