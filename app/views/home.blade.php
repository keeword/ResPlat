@extends('master')

@section('content')


    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row  border-bottom white-bg dashboard-header">
            <div class="col-sm-12">
                <blockquote class="text-warning" style="font-size:14px">您是否需要自己做一款后台、会员中心等等的，但是又缺乏html等前端知识…
                    <br>您是否一直在苦苦寻找一款适合自己的后台主题…
                    <br>您是否想做一款自己的web应用程序…
                    <br>…………
                    <h4 class="text-danger">那么，现在H+来了</h4>
                </blockquote>

                <hr>
            </div>
            <div class="col-sm-3">
                <h2>Hello,Guest</h2>
                <small>移动设备访问请扫描以下二维码：</small>
                <br>
                <br>
                <img src="img/qr_code.png" width="100%" style="max-width:264px;">
                <br>
            </div>
            <div class="col-sm-5">
                <h2>
                        H+ 后台主题UI框架
                    </h2>
                <p>H+是一个完全响应式，基于Bootstrop3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术，她提供了诸多的强大的可以重新组合的UI组件，并集成了最新的jQuery版本，当然，也集成了很多功能强大，用途广泛的国内外jQuery插件及其他组件，她可以用于所有的Web应用程序，如<b>网站管理后台</b>，<b>网站会员中心</b>，<b>CMS</b>，<b>CRM</b>，<b>OA</b>等等，当然，您也可以对她进行深度定制，以做出更强系统。</p>
                <p>
                    <b>当前版本：</b>v1.6
                </p>
                <p>
                    <b>定价：</b><span class="label label-warning">&yen;768（不开发票）</span>
                </p>
                <br>
                <p>
                    <a class="btn btn-success btn-outline" href="http://wpa.qq.com/msgrd?v=3&uin=516477188&site=qq&menu=yes" target="_blank">
                        <i class="fa fa-qq"> </i> 联系我
                    </a>
                    <a class="btn btn-white btn-bitbucket" href="http://www.zi-han.net" target="_blank">
                        <i class="fa fa-home"></i> 访问博客
                    </a>
                </p>
            </div>
            <div class="col-sm-4">
                <h4>H+具有以下特点：</h4>
                <ol>
                    <li>完全响应式布局（支持电脑、平板、手机等所有主流设备）</li>
                    <li>基于最新版本的Bootstrap 3.2.0</li>
                    <li>提供4套不同风格的皮肤</li>
                    <li>使用最流行的的扁平化设计</li>
                    <li>提供了诸多的UI组件</li>
                    <li>集成多款国内优秀插件，诚意奉献</li>
                    <li>提供盒型、全宽、响应式视图模式</li>
                    <li>采用HTML5 & CSS3</li>
                    <li>拥有良好的代码结构</li>
                    <li>更多……</li>
                </ol>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="wrapper wrapper-content">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h5>联系信息</h5>

                                </div>
                                <div class="ibox-content">
                                    <p><i class="fa fa-send-o"></i>  <a href="http://www.zi-han.net" target="_blank">http://www.zi-han.net</a>
                                    </p>
                                    <p><i class="fa fa-qq"></i>  <a href="http://wpa.qq.com/msgrd?v=3&uin=516477188&site=qq&menu=yes" target="_blank">516477188</a>
                                    </p>
                                    <p><i class="fa fa-credit-card"></i>  <a href="javascript:;" class="支付宝信息">zheng-zihan@qq.com / *子涵</a>
                                    </p>
                                </div>
                            </div>
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h5>二次开发</h5>
                                </div>
                                <div class="ibox-content">
                                    <p>我们提供基于H+的二次开发服务，具体费用请联系作者。</p>
                                    <p>同时，我们也提供以下服务：</p>
                                    <ol>
                                        <li>基于WordPress的网站建设和主题定制</li>
                                        <li>PSD转WordPress主题</li>
                                        <li>PSD转XHTML</li>
                                        <li>Html页面（CSS+XHTML+jQuery）制作</li>
                                    </ol>
                                </div>
                            </div>
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h5>se7en后台框架</h5>

                                </div>
                                <div class="ibox-content">
                                    <p>Se7en是一个基于基于Bootstrap3的，仿ios7风格的，完全响应式的后台框架，她内置了5套简单的皮肤模板，她还加入了近20个国外优秀的开源项目，并可简单组合与拆卸。</p>
                                    <a href="view-source:http://www.zi-han.net/theme/se7en/" class="btn btn-w-m btn-info">了解详细</a>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-4">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h5>购买说明</h5>
                                </div>
                                <div class="ibox-content">
                                    <p>如果需要购买H+主题，可直接付款到支付宝：<a href="javascript;">zheng-zihan@qq.com</a>，收款人：<a href="javascript;">*子涵</a>。或者使用手机支付宝直接扫码支付：</p>
                                    <div class="alert alert-warning">
                                        付款完成后请及时联系作者，或在付款备注中留下邮箱或QQ，方便作者及时联系您。
                                    </div>
                                    <p>
                                        <img src="img/alipay_qr_code.png" width="100%" style="max-width:369px">
                                    </p>

                                </div>
                            </div>

                        </div>
                        <div class="col-lg-4">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h5>更新日志</h5>
                                </div>
                                <div class="ibox-content no-padding">
                                    <div class="panel-body">
                                        <div class="panel-group" id="version">
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h5 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#version" href="#v16">v1.6</a><code class="pull-right">2014.11.23</code>
                                        </h5>
                                                </div>
                                                <div id="v16" class="panel-collapse collapse in">
                                                    <div class="panel-body">
                                                        <ol>
                                                            <li>优化资源文件路径，删除多余文件
                                                            </li>
                                                            <li>增加Markdown编辑器 <a href="form_markdown.html" title="去看看"><i class="fa fa-eye"></i></a>
                                                            </li>
                                                            <li>增加拾色器ColorPicker <a href="form_advanced.html" title="去看看"><i class="fa fa-eye"></i></a>
                                                            </li>
                                                            <li>优化部分页面代码
                                                            </li>
                                                        </ol>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#version" href="#v15">v1.5</a>
                                        </h4>
                                                </div>
                                                <div id="v15" class="panel-collapse collapse">
                                                    <div class="panel-body">
                                                        <ol>
                                                            <li>增加了Bootstrap3表单构建器，表单设计更轻松； <a href="form_builder.html" title="去看看"><i class="fa fa-eye"></i></a>
                                                            </li>
                                                            <li>修改了webim的高度；
                                                            </li>
                                                            <li>修复了因缺少jquery.min.map文件而导致页面加载进度条速度过慢的问题；
                                                            </li>
                                                        </ol>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title"><a data-toggle="collapse" data-parent="#version" href="#v14">v1.4</a>
                                        </h4>
                                                </div>
                                                <div id="v14" class="panel-collapse collapse">
                                                    <div class="panel-body">
                                                        <ol>
                                                            <li>修复了百度ECharts图表显示不正确的问题； <a href="graph_echarts.html" title="去看看"><i class="fa fa-eye"></i></a>
                                                            </li>
                                                            <li>新增表单验证示例，使用jQuery Validate插件实现； <a href="form_validate.html" title="去看看"><i class="fa fa-eye"></i></a>
                                                            </li>
                                                            <li>新增树形视图示例； <a href="tree_view.html" title="去看看"><i class="fa fa-eye"></i></a>
                                                            </li>
                                                            <li>修复弹框遮罩的Bug；
                                                            </li>
                                                        </ol>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#version" href="#v13">v1.3</a>
                                        </h4>
                                                </div>
                                                <div id="v13" class="panel-collapse collapse">
                                                    <div class="panel-body">
                                                        <ol>
                                                            <li>加入阿里巴巴团队的字体图标库，字体图标可以自定义啦； <a href="iconfont.html" title="去看看"><i class="fa fa-eye"></i></a>
                                                            </li>
                                                            <li>新增头像裁剪上传组件FullAvatareditor； <a href="form_avatar.html" title="去看看"><i class="fa fa-eye"></i></a>
                                                            </li>
                                                            <li>集成网页弹层插件layer； <a href="layer.html" title="去看看"><i class="fa fa-eye"></i></a>
                                                            </li>
                                                            <li>集成日期选择器layerDate； <a href="layerdate.html" title="去看看"><i class="fa fa-eye"></i></a>
                                                            </li>
                                                            <li class="text-danger"><b>增加web即时通讯功能，可以在系统内在线聊天了；</b>  <a href="webim.html" title="去看看"><i class="fa fa-eye"></i></a>
                                                            </li>
                                                            <li>增加主题预览功能，点击右上侧齿轮图标预览；</li>
                                                            <li>增加左侧边栏固定功能；</li>
                                                            <li>修复了多处问题。</li>
                                                        </ol>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#version" href="#v12">v1.2</a>
                                        </h4>
                                                </div>
                                                <div id="v12" class="panel-collapse collapse">
                                                    <div class="panel-body">
                                                        <ol>
                                                            <li>新增百度WebUploader拖动上传文件组件；<a href="form_webuploader.html" title="去看看"><i class="fa fa-eye"></i></a>
                                                            </li>
                                                            <li>新增国产优秀富文本编辑器插件Simditor；<a href="form_simditor.html" title="去看看"><i class="fa fa-eye"></i></a>
                                                            </li>
                                                            <li>新增百度ECharts统计图表插件；<a href="form_simditor.html" title="去看看"><i class="fa fa-eye"></i></a>
                                                            </li>
                                                            <li>修复了几处问题。</li>
                                                        </ol>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#version" href="#v11">v1.1</a>
                                        </h4>
                                                </div>
                                                <div id="v11" class="panel-collapse collapse">
                                                    <div class="panel-body">
                                                        <ol>
                                                            <li>修复了几处问题。</li>
                                                        </ol>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
            <div class="footer">
                <div class="pull-right">
                    By：<a href="http://www.zi-han.net" target="_blank">zihan's blog</a>
                </div>
                <div>
                    <strong>Copyright</strong> H+ &copy; 2014
                </div>
            </div>
        </div>

    </div>
</div>
@stop
