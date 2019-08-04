$(function(){
    $('.js-form').on('submit',function(e){
        e.preventDefault();
        const $this = $(this);
        const func = $this.find('button').val();
        const content_id = $this.find('#content_id').val();
        const count = Number($this.find('.js-count').text());
        
        $this.find('.js-count').text("更新中...");
        
        $.ajax({
            type:"post",
            url:"/board/good",
            datatype:"json",
            data : { 
                function: func,
                content_id : content_id,
                _token : $('input[name="_token"]').val()
                },
        }).done(function(){
            $this.find('button').toggleClass('btn-danger');
            $this.find('button').toggleClass('btn-primary');
            
            
            if(func==='insert'){
                $this.find('.js-count').text(1+count);
                $this.find('button').val('delete');
            }else{
                $this.find('.js-count').text((-1)+count);
                $this.find('button').val('insert');
            }
                        
        }).fail(function(){
            $this.find('.js-count').text(count);
           alert("処理に失敗しました"); 
        });
        
    });
    
})