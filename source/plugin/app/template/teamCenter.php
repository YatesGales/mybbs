<!--{subtemplate _header}-->
<style>
.team_cover{
    width: 560px;
    position: absolute;
    right: 0;
    top: 0;
    height: 375px;
    background-size:cover
}
.disabled img{
	-webkit-filter: saturate(0);
	-o-filter: saturate(0);
	-moz-filter:saturate(0);
	-ms-filter:saturate(0);
}
</style>
<script>


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
	<div class="nh_top_z pr">
    	<div class="nh_top_z_left">
        	<div class="nh_top_z_left1"><div><font size="+2">
            {if $rank>99}99+{else}{rank}{/if}
            </font><br>排行榜</div></div>
            <div class="nh_top_z_left2">
            	<div class="nh_top_z_left2_1"><img src="/pic/{team.thumb}.avatar.jpg"></div>
                <div class="nh_top_z_left2_2">{team.name}</div>
                <div class="nh_top_z_left2_3">粉丝 {team.fans}<br></div>
               	<div class="nh_top_z_left2_6" style="padding-left: 45px;">
                    {if $me}<div class="nh_top_z_left2_6_1 cp"><img src="images/guanzhu_03.png"></div>{/if}
                    {if $me}
                    <div class="nh_top_z_left2_6_2 cp{if !$me['tid']} disabled{/if}"><img src="images/jiaru_1_03.png"></div>
                    {if !$me['tid']}
                    <script>
                        j('.nh_top_z_left2_6_2').click(function(){
                            j.post('/app/team/apply/{team.tid}',function(d){
                                if(d.code==200)show_alert(1,'申请成功~',function(){
                                    location.reload(true)
                                });else alert(d.desc)
                            },'json')
                        })
                    </script>
                    {/if}{/if}
                </div>
            </div>
            <div class="nh_top_z_left3"></div>
        </div>
        <div class="team_cover" style="background-image:url(/pic/{team.pic}.medium.jpg)"></div>
	</div>
</div>



<div class="e_jianjie">
	<div class="e_jianjie_z">
    	<div class="d_p_z_1">
        	<div class="d_p_z_1_left">简介</div>
            <div class="d_p_z_1_right"></div>
        </div>
        <div class="e_jianjie_z_1">
            {team.desc}
        </div>
        <div class="e_jianjie_z_2">
        {if $captain}
        	<div class="e_jianjie_dz">
            	<div class="e_jianjie_dz_1">队长</div>
                <a href="/app/usercenter/index/{captain.uid}"><div class="e_jianjie_dz_2"><img src="/pic/{captain.avatar}.avatar.jpg"></div></a>
                <div class="e_jianjie_dz_3">{captain.nickname}</div>
            </div>
            {/if}
            <!--{loop $member $m}-->
            <div class="e_jianjie_dy">
            	<div class="e_jianjie_dz_1"></div>
                <a href="/app/usercenter/index/{m.uid}"><div class="e_jianjie_dz_2"><img src="/pic/{m.avatar}.avatar.jpg"></div></a>
                <div class="e_jianjie_dz_3">{m.nickname}</div>
            </div>
           <!--{/loop}-->
        </div>
    </div>
</div>




<div class="nh_top3 db" id="nh_xiangce">
	<div class="nh_top1_z">
    	<div class="nh_top1_z_top">
        	<div class="nh_top1_z_top_1">
            	
            	<div class="nh_top1_z_top_1_1" onclick="nh_xiangce()">相册</div>
                <div class="nh_top1_z_top_1_2" onclick="nh_shipin()">视频</div>
                <div class="nh_top1_z_top_1_2" onclick="nh_blog()">BLOG</div>
            </div>
            <div class="nh_top1_z_top_2"><a href="/app/album/teamlists/{team.tid}"><div class="nh_more">MORE</div></a></div>
        </div>
        <div class="nh_top1_z_bot">
        <!--{loop $album $v}-->
            <div class="d_p_z_2_1">
            	<div class="d_p_z_2_1_top pr" style="background-repeat: no-repeat;background-image: url(/images/xq_48.png);">
                	<a href="/app/album/index/{v.aid}">
					<div class="pa" style="background-image:url(/pic/{$v.thumb}.medium.jpg);background-size:cover;width:167px;height:167px;top:16px;left:16px"></div>
                    <div class="d_p_z_2_top_num">{$v.count}</div>
                    </a>
                </div>
                <div class="d_p_z_2_1_bottom">{$v.title}</div>
            </div>
            <!--{/loop}-->
        </div>
    </div>
</div>

<div class="nh_top2 dn" id="nh_shipin">
	<div class="nh_top2_z">
    	<div class="nh_top1_z_top">
        	<div class="nh_top1_z_top_1">
            	
            	<div class="nh_top1_z_top_1_2" onclick="nh_xiangce()">相册</div>
                <div class="nh_top1_z_top_1_1" onclick="nh_shipin()">视频</div>
                <div class="nh_top1_z_top_1_2" onclick="nh_blog()">BLOG</div>
            </div>
            <div class="nh_top1_z_top_2"><a href="/app/video/teamlists/{team.tid}"><div class="nh_more">MORE</div></a></div>
        </div>
        <div class="nh_top2_z_bot">
        <!--{loop $video $v}-->
            <div class="d_shipin_1_1">
            	<a href="/app/video/index/{v.vid}">
            	<div class="t_z_2_2_1" style="background-image:url(/pic/{v.thumb}.medium.jpg);background-size:cover">
                	<div class="t_z_2_2_1_text">{v.title}</div>
                    <div class="t_z_2_2_1_tu1"><img src="images/xq_71.png"></div>
                </div></a>
            </div>
            <!--{/loop}-->
        </div>
        
    </div>
</div>


<div class="e_shetuan">
	<div class="e_shetuan_z">
    	<div class="d_p_z_1">
        	<div class="d_p_z_1_left">社团活动</div>
            <a href="masslist.html"><div class="d_p_z_1_right">MORE</div></a>
        </div>
        <!--{loop $activity $a}-->
    	<div class="e_st_z_1">
        	<a href="/app/activity/index/{a.aid}"><div class="e_st_z_1_1" style="background-image:url(/pic/{a.pic}.medium.jpg);background-size:cover"></div></a>
            <div class="e_st_z_1_2">{a.title}</div>
            <a href="/app/activity/index/{a.aid}"><div class="e_st_z_1_3">查看详情</div></a>
        </div>
        <!--{/loop}-->
    </div>
</div>

<!--{template _footer}-->