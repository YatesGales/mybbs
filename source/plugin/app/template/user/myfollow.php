<!--{template _header}-->
<header nav="4"></header>
<div class="gz_body">
	<div class="gz_body_z">
    	<div class="gz_body_top">关注</div>
        
        <div class="gz_body_bot">
			<!--{loop $list $k=>$v}-->
				<div class="gz_body_bot_1">
					<div class="gz_body_bot_1_left">
						<a href="/app/usercenter/index/{$v.following}"><div class="gz_body_bot_1_left_top"><img src="/pic/{$v.avatar}.avatar.jpg" class="img-circle" /></div></a>
						<div class="gz_body_bot_1_left_bottom">{$v.nickname}</div>
					</div>
					<div class="gz_body_bot_1_right">
						<div class="gz_body_bot_1_right_top">{$v.interest}</div>
						<div class="gz_body_bot_1_right_bottom">
							<div class="gz_body_bot_1_right_bottom_1">
								{if $v['doub'] == 0}<img src="images/yiguanzhu.png" />{else}<img src="images/xiangmu.png" />{/if}
							</div>
							<div class="gz_body_bot_1_right_bottom_2"><img src="images/siliao_05.png" data-toggle="tooltip" data-placement="bottom" title="尽请期待"/></div>
						</div>
					</div>
				</div>
			<!--{/loop}-->
        	
        </div>
        
    </div>
    
</div>



<!--{template _footer}-->