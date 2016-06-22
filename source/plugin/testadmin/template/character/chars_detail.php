<!--{subtemplate adminloader:_header}-->
<div class="panel panel-default">
    <div class="panel-body">
        <form id="form" class="form-horizontal" data-default="{g.plugin}/{g.control}/get_{g.method}/{id}">
            <div class="form-group">
                <label class="control-label col-sm-2">名字</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="name">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2">出处PID</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="pid">
                </div>
                <div class="col-sm-1">
                    <span class="pa cp" style="left:0;top:7px" data-toggle="tooltip" data-placement="bottom" title="查询出处的PID">?</span>
                    <script>j('[data-toggle="tooltip"]').tooltip()</script>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2">封面图</label>
                <div class="col-sm-4">
                    <input type="file" id="thumb" data-medium="1" data-box="character" />
                    <p class="help-block"></p>
                    <img id="pic_thumb" class='img-responsive' />
                    <input class="form-control" name="thumb" type="text" value="" disabled="disabled"/>
                    <input name="thumb" type="hidden" value=""/>
                </div>
                
            </div>
            <div class="form-group">
                <div class="col-sm-offset-1">
                    <button type="button" class="btn btn-success insave t" for="form" data-action="{g.plugin}/{g.control}/save_{g.method}/{id}">保存</button>
                </div>
            </div>
        </form>
        
    </div>
</div>


<!--{subtemplate adminloader:_footer}-->