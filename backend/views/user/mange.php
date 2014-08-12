<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\jui\AutoComplete;
use common\widgets\DateTimePicker;
$this->title = Yii::$app->params['webname']."-用户管理";
?>
<div class="row">
    <div class="col-xs-12">
        <!--更多操作-->
        <div class="table-responsive col-sm-12 row">
            <div class="widget-box collapsed" style="opacity: 1; z-index: 0;">
                <div class="widget-header widget-header-small header-color-red2">
                    <h5 class="col-sm-11" onclick="chevronck()">
                        <i class="icon-hand-right"></i>
                        用户列表
                    </h5>
                    <div class="widget-toolbar col-lg-1">
                        <span>更多操作</span>
                        <a href="#" id="slidechevron" data-action="collapse">
                            <i class="icon-chevron-down"></i>
                        </a>
                    </div>
                </div>
                <div class="widget-body"><div class="widget-body-inner" style="display: block;">
                        <div class="widget-main">
                            <div class="widget-main no-padding">
                                <a href="<?= \yii\helpers\Url::toRoute(['user/mange','act'=>'export','username'=>$search['username']]) ?>">
                                <button class="btn btn-success btn-app btn-xs">
                                    <i class="icon-share-alt smaller-80"></i>
                                    导出
                                </button>
                                </a>
                                <button type="button" class="btn btn-primary btn-app btn-xs" onclick="add()">
                                    <i class="icon-plus smaller-80"></i>
                                    添加
                                </button>
                            </div>
                        </div>
                    </div></div>
            </div>
        </div>
        <!--更多操作结束-->
        <div class="table-responsive col-sm-12 row">
            <form action="" method="get" class="form-inline" role="form">

                <label for="username">名称</label>
                <?= AutoComplete::widget([
                    'name' => 'username',
                    'id'=>'username',
                    'class'=>'input-sm',
                    'value'=>$search['username'],
                    'clientOptions' => [
                        'source' => $autolist,
                        'messages'=>[
                            'noResults'=>'',
                            'results'=>'function( amount ) {
                                    return amount + ( amount > 1 ? " results are" : " result is" ) +
                                    " available, use up and down arrow keys to navigate.";
                                }',
                        ],
                    ],
                ]); ?>
                <label for="startime">时间</label>
                <?= DateTimePicker::widget([
                    'id'=>'startime',
                    'name'=>'startime',
                    'value'=>$search['startime']
                ]) ?>
                <label for="ishot">热门</label>
                <select name="" id="" class="input-icon" style="margin-bottom: 10px;">
                    <option value="-1">未选择</option>
                    <option value="1">是</option>
                    <option value="0">否</option>
                </select>
                <button type="submit" class="btn btn-purple btn-sm btn-inverse">
                    搜索
                    <i class="icon-search icon-on-right bigger-110"></i>
                </button>
            </form>
        </div>
        <div class="table-responsive row">
            <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>用户名</th>
                        <th class="hidden-480">密码</th>
                        <th>角色</th>
                        <th>操作</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach($list as $v): ?>
                    <tr>
                        <td><?= $v['id'] ?></td>
                        <td><?= $v['username'] ?></td>
                        <td class="hidden-480"><?= $v['password'] ?></td>
                        <td><?= $v['role'] ?></td>
                        <td>
                            <div class="visible-md visible-lg hidden-sm hidden-xs btn-group">
                                <button class="btn btn-xs btn-success">
                                    <i class="icon-ok bigger-120"></i>
                                </button>

                                <button class="btn btn-xs btn-info">
                                    <i class="icon-edit bigger-120"></i>
                                </button>

                                <button class="btn btn-xs btn-danger" title="删除">
                                    <i class="icon-trash bigger-120"></i>
                                </button>

                                <button class="btn btn-xs btn-warning">
                                    <i class="icon-flag bigger-120"></i>
                                </button>
                            </div>

                            <div class="visible-xs visible-sm hidden-md hidden-lg">
                                <div class="inline position-relative">
                                    <button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown">
                                        <i class="icon-cog icon-only bigger-110"></i>
                                    </button>

                                    <ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
                                        <li>
                                            <a href="#" class="tooltip-info" data-rel="tooltip" title="View">
                                                <span class="blue">
                                                    <i class="icon-zoom-in bigger-120"></i>
                                                </span>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
                                                <span class="green">
                                                    <i class="icon-edit bigger-120"></i>
                                                </span>
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
                                                <span class="red">
                                                    <i class="icon-trash bigger-120"></i>
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td class="" colspan="5">
                            <?= LinkPager::widget([
                                'pagination'=>$pages,
                                'options'=>[
                                    'class'=>'pagination pull-right'
                                ],
                                'firstPageLabel'=>'首页',
                                'lastPageLabel'=>'尾页',
                                'nextPageLabel'=>'下页',
                                'prevPageLabel'=>'上页',
                                'registerLinkTags'=>true,
                                'hideOnSinglePage'=>false,
                            ]); ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div><!-- /.table-responsive -->
    </div><!-- /span -->
</div><!-- /row -->
<script src="/js/artDialog/artDialog.source.js?skin=default"></script>
<script src="/js/artDialog/plugins/iframeTools.js"></script>
<script>
    function chevronck()
    {
        var t = jQuery('#slidechevron');
        t.click();
    }
    function add()
    {
        art.dialog.open('/user/add',{title: '添加用户', width: 580, height: 330, lock: true});
    }
</script>

