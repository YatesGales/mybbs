<!--{template _header}-->
<style type="text/css">
.nh_top_z_right_tu1{width:558px;height:375px;}
.d_shipin_1_1_tu1{width:225px;height:140px; border-radius:5px;}
.disabled img{
	-webkit-filter: saturate(0);
	-o-filter: saturate(0);
	-moz-filter:saturate(0);
	-ms-filter:saturate(0);
}
</style>
{if $me['uid']==$coser['uid']}
<header nav="5"></header>
{else}
<header nav="2"></header>
{/if}
<script type="text/jscript">

function nh_shipin(){
	document.getElementById("nh_shipin").style.display="block";
	document.getElementById("nh_xiangce").style.display="none";	
}
function nh_xiangce(){
	document.getElementById("nh_shipin").style.display="none";
	document.getElementById("nh_xiangce").style.display="block";	
}

</script>
<div class="nh_top">
	<div class="nh_top_z">
    	<div class="nh_top_z_left">
        	<div class="nh_top_z_left1"><div><font size="+2">{if $rank < 100 }{rank}{else}99+{/if}</font><br />排行榜</span></div></div>
            
			{if $me['uid'] == $coser['uid']}
				<div class="nh_top_z_left2">
					<div class="nh_top_z_left2_1"><img src="/pic/{coser.avatar}.avatar.jpg" /></div>
					<div class="nh_top_z_left2_2">{coser.nickname} &nbsp;&nbsp;&nbsp;
						<a href="/app/usercenter/centerupdate"><img src="images/tc-46.png" class="n_tu1"/></a>
					</div>
					<div class="nh_top_z_left2_3">
					<a href="/app/usercenter/myfollow" style="color:#5cbac0">关注 {coser.follow}</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a style="color:#5cbac0" href="/app/usercenter/myfans">粉丝 {coser.fans}</a><br />
						<font color="#666">
							{if $coser['area']}{coser.area}/{/if}
							{if $coser['age']}{coser.age}岁/{/if}
							{if $coser['constel']}{coser.constel}{/if}
						</font>
					</div>
					<div class="nh_top_z_left2_4">
						{if $coser['interest']}爱好：{coser.interest}{/if}
					</div>
				</div>
			{else}
				<div class="nh_top_z_left2">
					<div class="nh_top_z_left2_1s" {if $coser['uid']!=$me['uid']}style="margin:auto"{/if}><img src="images/zb_03.png" /></div>
					<div class="nh_top_z_left2_2s">{coser.nickname}</div>
					<div class="nh_top_z_left2_3s">
						关注 {coser.follow}&nbsp;&nbsp;|&nbsp;&nbsp;粉丝 {coser.fans}<br />
						<font color="#666">
							{if $coser['area']}{coser.area}/{/if}
							{if $coser['age']}{coser.age}岁/{/if}
							{if $coser['constel']}{coser.constel}{/if}
						</font>
					</div>
					<div class="nh_top_z_left2_4s">
						{if $coser['interest']}爱好：{coser.interest}{/if}
					</div>
					<div class="nh_top_z_left2_5">
						<div class="nh_top_z_left2_5_1 cp{if $followed} disabled{/if}"><img src="images/guanzhu_03.png" /></div>
						<div class="nh_top_z_left2_5_2"  ><img src="images/siliao_05.png" data-toggle="tooltip" data-placement="bottom" title="尽请期待"/></div>
						<script>
						
							j('.nh_top_z_left2_5_1:not(.disabled)').click(function(){
								j.post('/app/usercenter/follow/'+'{coser.uid}',function(d){
									if(d.code==200)show_alert(1,'关注成功~',function(){
										location.reload(true)
									});else show_alert(3,d.desc)
								},'json')
							});
							j('.nh_top_z_left2_5_1.disabled').click(function(){
								j.post('/app/usercenter/unfollow/'+'{coser.uid}',function(d){
									if(d.code==200)show_alert(1,'已取消关注~',function(){
										location.reload(true)
									});else show_alert(3,d.desc)
								},'json')
							})
						
						</script>
					</div>
				</div>
            {/if}
        </div>
        <div class="nh_top_z_right" style="background-image:url(/pic/{coser.cover}.large.jpg);background-size:cover;background-position:center">
			{if $me['uid'] == $coser['uid']}
        	<div class="nh_top_z_right_fg cp" data-toggle="tooltip" data-placement="right" title="推荐 600x375"></div>
			<input type="file" style="display:none" name="cover" />
			<script>
			j('.nh_top_z_right_fg').click(function(){
				j('[name=cover]').click();
			});j('[name=cover]').change(function(){
				if(!j(this).val())return;
				var v = {large:1,medium:1,box:'user',auto:1},f = packFormData(j(this),v);
				j.ajax({
					data:f,contentType:false,processData:false,type:'post',url:'/app/picture/upload',
					success:function(d){
						if(d.code==200)j.post('/app/usercenter/change_cover',{cover:d.data.e},function(){
							show_alert(1,'更改成功',function(){
								j('.nh_top_z_right').css('background-image','url(/pic/'+d.data.e+'.large.jpg)');
							});
						},'json');else show_alert(3,d.desc)
						
							

						
					}
				})
			})
			</script>
			{/if}
        </div>
	</div>
</div>

<div class="nh_top1" id="nh_xiangce">
	<div class="nh_top1_z">
    	<div class="nh_top1_z_top">
        	<div class="nh_top1_z_top_1">
            	<div class="nh_top1_z_top_1_1" onclick="nh_xiangce()">相册</div>
            	<div class="nh_top1_z_top_1_2" onclick="nh_shipin()">视频</div>
                <div class="nh_top1_z_top_1_2" data-toggle="tooltip" data-placement="bottom" title="尽请期待">BLOG</div>
            </div>
			{if $me['uid'] == $coser['uid'] }
            <div class="nh_top1_z_top_2"><a href="/app/album/lists"><div class="n_p_z_1_right_gl">管理</div></a></div>
			{elseif $album}
			<div class="nh_top1_z_top_2"><a href="/app/album/lists/{coser.uid}"><div class="nh_more">MORE</div></a></div>
			{/if}
        </div>
        <div class="nh_top1_z_bot">
		{if !$album}
			<h1 class="text-center" style="padding-top:90px;color:#ccc">该用户很懒，没有上传任何东西~~</h1>
		{/if}
		<!--{loop $album $k=>$v}-->
			
			<div class="d_p_z_2_1">
            	<div class="d_p_z_2_1_top pr" style="background-repeat: no-repeat;background-image: url(/images/xq_48.png);">
                	<a href="/app/album/index/{v.aid}">
						{if $v['thumb']}
						<div class="pa" style="background-image:url(/pic/{$v.thumb}.medium.jpg);background-size:cover;width:167px;height:167px;top:16px;left:16px"></div>
						{/if}
					</a>
					<div class="d_p_z_2_top_num">{$v.count}</div>
					
                </div>
                <div class="d_p_z_2_1_bottom">{$v.title}</div>
            </div>
		<!--{/loop}-->  
        </div>
    </div>
</div>

<div class="nh_top2" id="nh_shipin">
	<div class="nh_top2_z">
    	<div class="nh_top1_z_top">
        	<div class="nh_top1_z_top_1">
            	<div class="nh_top1_z_top_1_2" onclick="nh_xiangce()">相册</div>
            	<div class="nh_top1_z_top_1_1" onclick="nh_shipin()">视频</div>
                <div class="nh_top1_z_top_1_2" data-toggle="tooltip" data-placement="bottom" title="尽请期待">BLOG</div>
            </div>
			{if $me['uid'] == $coser['uid'] }
            <div class="nh_top1_z_top_2"><a href="/app/video/lists"><div class="n_p_z_1_right_gl">管理</div></a></div>
			{elseif $video}
			<div class="nh_top1_z_top_2"><a href="/app/video/lists/{coser.uid}"><div class="nh_more">MORE</div></a></div>
			{/if}
        </div>
        <div class="nh_top2_z_bot">
		{if !$video}
			<h1 class="text-center" style="padding-top:50px;color:#ccc">该用户很懒，没有上传任何东西~~</h1>
		{/if}
			<!--{loop $video $k=>$v}-->
				<div class="d_shipin_1_1" style="margin-bottom:20px;text-shadow: 0 0 10px #000;">
					<a href="/app/video/index/{v.vid}"><img src="/pic/{$v.thumb}.medium.jpg"  class="d_shipin_1_1_tu1"/>
					<div class="t_z_2_2_1">
						<div class="t_z_2_2_1_text">{$v.title}</div>
						<div class="t_z_2_2_1_tu1"><img src="/images/xq_71.png" /></div>
					</div></a>
				</div>
			<!--{/loop}-->
            
        </div>
        
    </div>
</div>

{if $me['uid'] == $coser['uid']}
<div class="n_tuandui">
	<div class="n_tuandui_z">
    	<div class="d_p_z_1">
        	<div class="d_p_z_1_left">团队</div>
            <div class="n_p_z_1_right"></div>
        </div>
		{if !$team}
			<h1 class="text-center" style="padding-top:50px;color:#ccc">没有加入任何团队~~</h1>
		{/if}
    	<div class="n_tuandui_z_1">
		{if $team}
        	<div class="n_tuandui_z_1_text1">我加入的团队</div>
            <div class="n_tuandui_z_1_tu1"><a href="/app/teamcenter/index/{team.tid}"><img src="/pic/{team.thumb}.avatar.jpg" class="n_tuandui_tu1"/></a></div>
            <div class="n_tuandui_z_1_text2">{team.name}</div>
			{/if}
        </div>
		{if $captainTeam}
        <div class="n_tuandui_z_2">
		
        	<div class="n_tuandui_z_2_text1">我管理的团队</div>
            <div class="n_tuandui_z_2_tu1"><a href="/app/teamcenter/index/{captainTeam.tid}"><img src="/pic/{captainTeam.thumb}.avatar.jpg" class="n_tuandui_tu2"/></a></div>
            <div class="n_tuandui_z_2_text2">{captainTeam.name}</div>
		
        </div>
        <div class="n_tuandui_z_3"><a href="/app/team/mybasis"><div class="n_p_z_1_right_gl">管理</div></a></div>
		{/if}
    </div>
</div>

{/if}
<div class="d_zhibo">
	<div class="d_zhibo_z">
    	<div class="d_p_z_1">
        	<div class="d_p_z_1_left">直播</div>
            {if $me['uid'] == $coser['uid']}
			<div class="n_p_z_1_right"><a href="/app/usercenter/zhibo"><div class="n_p_z_1_right_gl">管理</div></a></div>
			{/if}
        </div>
		
    	<div class="d_zhibo_1">
		{if !$live['yy'] && !$live['bilibili'] && !$live['yahu']}
		<div>
			<h1 class="text-center" style="padding-top:50px;color:#ccc">没有任何直播~~</h1>
			</div>
		{/if}
			{if $live['yy']}
			<a href="{live.yy}">
				<div class="d_zhibo_1_1">
					<div class="d_zhibo_1_top"><img src="images/zb_11.png" /></div>
					<div class="d_zhibo_1_bottom">yy语音</div>
				</div>
			</a>
			{/if}
			{if $live['bilibili']}
			<a href="{live.bilibili}">
				<div class="d_zhibo_1_1">
					<div class="d_zhibo_1_top"><img src="images/zb_13.png" /></div>
					<div class="d_zhibo_1_bottom">B站直播间</div>
				</div>
			</a>
			{/if}
			{if $live['yahu']}
			<a href="{live.yahu}">
				<div class="d_zhibo_1_1">
					<div class="d_zhibo_1_top"><img src="images/zb_15.png" /></div>
					<div class="d_zhibo_1_bottom">雅虎直播</div>
				</div>
			</a>
			{/if}
        </div>
		
    </div>
</div>


<!--{template _footer}-->