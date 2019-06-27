<li class="">
    <a href="/" target="_blank"><i class="fa fa-home"></i><span>网站首页</span></a>
</li>

<li class="header">网站设置</li>
    <li class="{{ Request::is('zcjy/settings/setting*') || Request::is('zcjy') ? 'active' : '' }}">
      <a href="{!! route('settings.setting') !!}"><i class="fa fa-cog"></i><span>系统设置</span></a>
</li>
    
<li class="{{ Request::is('zcjy/linkLists*') ? 'active' : '' }}">
    <a href="{!! route('linkLists.index') !!}"><i class="fa fa-edit"></i><span>短链接列表</span></a>
</li>

<li class="">
    <a href="javascript:;" id="refresh"><i class="fa fa-refresh"></i><span>刷新缓存</span></a>
</li>

