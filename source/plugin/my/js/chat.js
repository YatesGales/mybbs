!(function(){
    var ws,folder = location.pathname.split('/'),
    mesCore = {
        message:function(v){
                if(!v.nickname || !v.md5 || !v.content)return;
                var w = '<div class="panel chat-body"><div class="panel-body"><div class="row"><div class="col-md-1"><div class="text-center"><img src="https://secure.gravatar.com/avatar/'
                        +v.md5+'?s=40" class="img-responsive center-block img-circle"></div><div class="text-center"><strong>'
                        +v.nickname+'</strong></div><div class="text-center "><small class="text-muted toStringTime">'
                        +''+'</small></div></div>'+
                        '<div class="col-md-8" style="padding-top:10px">'+v.content.replace(/\r/g,'<br>')+'</div>'
                        +'</div></div></div>';
                j('.chat-container').children().append(w);
                while(j('.chat-container').children().children().length>100)j('.chat-container').children().children().eq(0).remove();
                j('.chat-container').stop(1).animate({scrollTop:j('.chat-container').children().height()-400});
        },log:function(v){if(v.user)j('h4').html('total: '+v.user.length)}
    };
    
    j('a.picup').click(function(){j(this).parent().find('input').click()});
    j('input.picupi').change(function(){
        packFormData(this,0,function(form){
            j('input.picupi').val('');
            j.ajax({
				url:'my/ajax/uploadpic',
				data:form,contentType: false,processData: false,type:'post',dataType:'json',
				beforeSend:function(xhr){

                },success:function(d){
					if(d.code!=200){j('.modal-body p').html(d.desc);j('.modal').modal();return}
                    var s = j('form').serializeArray();
                    if(!j('[name=nickname]').val()){j('.modal-body p').html('昵称不能为空');j('.modal').modal();return}
                    if(!j('[name=email]').val()){j('.modal-body p').html('邮箱不能为空');j('.modal').modal();return}
                    for(var g in s)if(s[g].name=='content'){
                        s[g].name = 'type';s[g].value = 'pic';
                    }
                    s.push({name:'pic',value:d.desc});
                    ws.send(JSON.stringify(s));
				},error:function(){
                    j('.modal-body p').html('上传失败');j('.modal').modal();return
                }
			})
        });
    });
    (function(){
        var args = arguments;
        ws = new WebSocket('ws:b.yoooo.co:8080/'+(folder[3]=='room' && folder[4] ? 'room/'+folder[4]:''));
        ws.onopen = d=>{j('.chat-container').children().append('<div class="chat-body">link succeed</div>')};
        ws.onmessage = d=>{
            try{
                var v = eval('('+d.data+')');
                if(typeof v !=='object')return;
                if(v.type && typeof mesCore[v.type] ==='function')mesCore[v.type](v);
            }catch(e){
                console.log(e.message);
            }
        };
        ws.onerror = d=>{j('.modal-body p').html('发生错误');j('.modal').modal();return};
        ws.onclose = d=>{args.callee()};
    })();
    j('.post').click(e=>{
        if(!j('[name=nickname]').val()){j('.modal-body p').html('昵称不能为空');j('.modal').modal();return}
        if(!j('[name=email]').val()){j('.modal-body p').html('邮箱不能为空');j('.modal').modal();return}
        if(!j('[name=content]').val()){j('.modal-body p').html('内容不能为空');j('.modal').modal();return}
        var s = j('form').serializeArray();
        ws.send(JSON.stringify(s));
        j('textarea').val('');
    });
    j('textarea').keypress(e=>{if(e.which==10)j('.post').click()});
})()