<?php

use app\components\SystemMenu;
use kartik\switchinput\SwitchInput;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\access\models\SystemMenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'System Menus');
//$this->params['breadcrumbs'][] = $this->title;
?>
<!--<div class="container">-->
<?php $form = ActiveForm::begin();?>
<input type="hidden" name="r" value="access" />
<div class="alert alert-success alert-dismissable" style="display:none;">
    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    <h4><i class="icon fa fa-check"></i> <?php echo Yii::t('app', 'Access Rights has been saved.'); ?></h4>

</div>
<div class="row">
    <div class="col col-lg-2" data-key="none">
        <h1><?=Yii::t('app', 'Actions')?></h1>
        <?php
echo $form->field($model, 'flag1')->widget(SwitchInput::classname(), ['pluginEvents' => [
    //"init.bootstrapSwitch" => "function() { log('init'); }",
    "switchChange.bootstrapSwitch" => "function() {
                    $('this').bootstrapSwitch('state');
                    var node = $('#tree').fancytree('getActiveNode');
                    var str = node.title.split('');
                    str[4] = ($(this).bootstrapSwitch('state')) ? 1 : 0;
                    str = str.join('');
                    node.setTitle(str);
                }",
],
    'disabled' => true]);
?>
        <?php
echo $form->field($model, 'flag2')->widget(SwitchInput::classname(), ['pluginEvents' => [
    //"init.bootstrapSwitch" => "function() { log('init'); }",
    "switchChange.bootstrapSwitch" => "function() {
                    $('this').bootstrapSwitch('state');
                    var node = $('#tree').fancytree('getActiveNode');
                    var str = node.title.split('');
                    str[5] = ($(this).bootstrapSwitch('state')) ? 1 : 0;
                    str = str.join('');
                    node.setTitle(str);
                }",
],
    'disabled' => true]);
?>
        <?php
echo $form->field($model, 'flag3')->widget(SwitchInput::classname(), ['pluginEvents' => [
    //"init.bootstrapSwitch" => "function() { log('init'); }",
    "switchChange.bootstrapSwitch" => "function() {
                    $('this').bootstrapSwitch('state');
                    var node = $('#tree').fancytree('getActiveNode');
                    var str = node.title.split('');
                    str[6] = ($(this).bootstrapSwitch('state')) ? 1 : 0;
                    str = str.join('');
                    node.setTitle(str);
                }",
],
    'disabled' => true]);
?>
    </div>
    <div class="col col-lg-10">
        <?php // echo $this->render('_search', ['model' => $searchModel]);    ?>
        <h1><?=Yii::t('app', 'Modules')?></h1>
        <p>

            <?php
$menu = new SystemMenu();
$menu->user_id = Yii::$app->request->get('UserRights')['user_id'];
$model->user_id = Yii::$app->request->get('UserRights')['user_id'];
?>
            <?=
$form->field($model, 'user_id')->dropDownList(
    ArrayHelper::map(app\modules\profile\models\Profile::find()->all(), 'user_id', 'name'), ['prompt' => ' -- Select User --', 'onchange' => '$(".form-dirty").removeClass("form-dirty"); this.form.action = "' . Yii::$app->urlManager->createUrl('access') . '"; this.form.method = "get"; this.form.submit();',
    ])
?>

        </p>
        <!--</div>-->
        <?php
//echo "<pre>";
//print_r($menu->getMenus()); die();
echo yii2mod\tree\Tree::widget([
    'items' => $menu->getMenus(),
    'clientOptions' => [
        'activeVisible' => true, // Make sure, active nodes are visible (expanded)
        'autoActivate' => true, // Automatically activate a node when it is focused using keyboard
        'autoCollapse' => false, // Automatically collapse all siblings, when a node is expanded
        'autoScroll' => true, // Automatically scroll nodes into visible area
        'clickFolderMode' => 3, // 1:activate, 2:expand, 3:activate and expand, 4:activate (dblclick expands)
        'checkbox' => true, // Show checkboxes
        'debugLevel' => 0, // 0:quiet, 1:normal, 2:debug
        'disabled' => false, // Disable control
        'focusOnSelect' => false, // Set focus when node is checked by a mouse click
        'escapeTitles' => false, // Escape `node.title` content for display
        'generateIds' => true, // Generate id attributes like <span id='fancytree-id-KEY'>
        'idPrefix' => "", // Used to generate node id´s like <span id='fancytree-id-<key>'>
        'icon' => true, // Display node icons
        'keyboard' => true, // Support keyboard navigation
        'keyPathSeparator' => "/", // Used by node.getKeyPath() and tree.loadKeyPath()
        'minExpandLevel' => 1, // 1: root node is not collapsible
        'quicksearch' => true, // Navigate to next node by typing the first letters
        'rtl' => false, // Enable RTL (right-to-left) mode
        'selectMode' => 3, // 1:single, 2:multi, 3:multi-hier
        //'tabindex' => "0", // Whole tree behaves as one single control
        'titlesTabbable' => true, // Node titles can receive keyboard focus
        //'tooltip' => true, // Use title as tooltip (also a callback could be specified)
        'activate' => new \yii\web\JsExpression('
                        function(node, data) {
                              node  = data.node;
                              var chars = node.title.split("");
                              $("#userrights-flag1").attr("value", 0);
                              $("#userrights-flag2").attr("value", 0);
                              $("#userrights-flag3").attr("value", 0);

                              $("#userrights-flag1").attr("data-key", node.key);
                              $("#userrights-flag2").attr("data-key", node.key);
                              $("#userrights-flag3").attr("data-key", node.key);

                              $("#userrights-flag1").bootstrapSwitch("state", false, true);
                              $("#userrights-flag2").bootstrapSwitch("state", false, true);
                              $("#userrights-flag3").bootstrapSwitch("state", false, true);

                              $("#userrights-flag1").bootstrapSwitch("disabled", false);
                              $("#userrights-flag2").bootstrapSwitch("disabled", false);
                              $("#userrights-flag3").bootstrapSwitch("disabled", false);

                              if(chars[4] == 1){

                                $("#userrights-flag1").attr("value", 1);
                                $("#userrights-flag1").bootstrapSwitch("state", true, true);

                              }

                              if (chars[5] == 1){

                                $("#userrights-flag2").attr("value", 1);
                                $("#userrights-flag2").bootstrapSwitch("state", true, true);

                              }

                              if (chars[6] == 1){

                                $("#userrights-flag3").attr("value", 1);
                                $("#userrights-flag3").bootstrapSwitch("state", true, true);

                              }
                        }
                '),
    ],
]);
?>
        <?php ActiveForm::end();?>
    </div>
</div>

<?php

if (in_array("create", Yii::$app->session['rights'])) {
    echo Html::button(Yii::t('app', 'Save'), ['class' => 'btn btn-success', 'style' => 'width: 105px', 'onclick' => 'treeToDict()']);

}
?>
<script>
    function onAccessLoad() {
        jQuery(".fancytree-container").addClass("fancytree-connectors");
        $("#tree").fancytree("getRootNode").visit(function (node) {
            node.setExpanded(true);
        });
        $('#userrights-user_id').change(function() {

            $(this).closest('form').removeClass('form-dirty');
        });
    }
    window.onload = onAccessLoad;

    function treeToDict() {
//        var tree = $("#tree").fancytree("getTree");
//        var d = tree.toDict(true);
        var rawRights = [];
        $("[role*='treeitem']").each(function (i, obj) {

            if($(this).attr("aria-selected") === "true"){
                rawRights[i] = $(this).find('.fancytree-title').html();
            }

        });

        $.ajax({
            method: "POST",
            url: "<?php echo Yii::$app->urlManager->createUrl('access/default/create') ?>",
            data: {user_id: $('#userrights-user_id option:selected').val(), rights: rawRights}
        })
                .done(function (msg) {
                    if (msg == 1) {
                        $(".alert").show();
                        window.setTimeout(function () {
                            $(".alert").fadeOut();
                        }, 4000);
                    }
                });
    }


</script>