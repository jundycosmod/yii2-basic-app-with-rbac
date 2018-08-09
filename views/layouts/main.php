<?php

/**
 * @var string $content
 * @var \yii\web\View $this
 */
use yii\helpers\Html;
use app\components\Menu;

$bundle = yiister\gentelella\assets\Asset::register($this);
$this->registerJsFile('@web/js/ajax-modal-popup.js', ['depends' => 'yii\web\YiiAsset']) ;
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta charset="<?= Yii::$app->charset ?>" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="nav-md">
        <?php $this->beginBody(); ?>
        <div class="container body">

            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">

                        <div class="navbar nav_title" style="border: 0;">
                            <a href="/" class="site_title"><i class="fa fa-truck"></i> <span><?php echo Yii::$app->name; ?></span></a>
                        </div>
                        <div class="clearfix"></div>

                        <!-- menu prile quick info -->
                        <!--                            <div class="profile">
                                                        <div class="profile_pic">
                        <?php echo Html::img('@web/images/icon.jpg', ['class' => 'img-circle profile_img']); ?>
                                                            <img src="http://placehold.it/128x128" alt="..." class="img-circle profile_img">
                                                        </div>
                                                        <div class="profile_info">
                                                            <span>Welcome,</span>
                                                            <h2>John Doe</h2>
                                                        </div>
                                                    </div>-->
                        <!-- /menu prile quick info -->

                        <br />

                        <!-- sidebar menu -->
                        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

                            <div class="menu_section">
                                <?php
                                $menu = new Menu();
                                echo \yiister\gentelella\widgets\Menu::widget(
                                        $menu->getMenus()
                                )
                                ?>
                            </div>

                        </div>
                        <!-- /sidebar menu -->

                        <!-- /menu footer buttons -->
                        <div class="sidebar-footer hidden-small">
<!--                            <a data-toggle="tooltip" data-placement="top" title="Settings">
                                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                            </a>-->
                            <?=
                            Html::a('<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>', ['/settings'], [
                                'data' => [
                                    //'method' => 'post',
                                    //'confirm' => 'Are you sure?',
                                    'toggle' => 'tooltip',
                                    'placement' => 'top',
                                    'title' => Yii::t("app",'Settings')
                                    ,
                                ]
                            ])
                            ?>
                            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="Lock" >
                                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                            </a>
                            <?=
                            Html::a('<span class="glyphicon glyphicon-off" aria-hidden="true"></span>', ['/user/security/logout'], [
                                'data' => [
                                    'method' => 'post',
                                    'confirm' => 'Are you sure?',
                                    'toggle' => 'tooltip',
                                    'placement' => 'top',
                                    'title' => 'Logout'
                                ,
                                ]
                            ])
                            ?>
                        </div>
                        <!-- /menu footer buttons -->
                    </div>
                </div>

                <!-- top navigation -->
                <div class="top_nav">

                    <div class="nav_menu">
                        <nav class="" role="navigation">
                            <div class="nav toggle">
                                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                            </div>

                            <ul class="nav navbar-nav navbar-right">
                                <li class="">
                                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <?php echo Html::img('@web/images/icon.jpg'); ?><?= Yii::$app->user->identity->username; ?>
                                        <span class=" fa fa-angle-down"></span>
                                    </a>

                                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                                        <?php
//                                    echo
//                                    \yiister\gentelella\widgets\Menu::widget(['items' => [Yii::$app->user->isGuest ?
//                                            ['label' => 'Sign in', 'url' => ['user/security/login']] :
//                                            ['label' => 'Sign out (' . Yii::$app->user->identity->username . ')',
//                                        'url' => ['user/security/logout'],
//                                        'linkOptions' => ['data-method' => 'post']],
//                                    ['label' => 'Register', 'url' => ['/user/registration/register'], 'visible' => Yii::$app->user->isGuest]]]);
                                        ?>
                                        <li>
                                            <?=
                                            Html::a('<i class="fa fa-user pull-right"></i> Profile', ['/user/settings/profile'])
                                            ?>
                                        </li>
                                        <li>
                                            <!--                                            <a href="javascript:;">
                                                                                            <span class="badge bg-red pull-right">50%</span>
                                                                                            <span>Settings</span>
                                                                                        </a>-->
                                            <?=
                                            Html::a('<i class="fa fa-gear pull-right"></i> Account Settings', ['/user/settings/account'])
                                            ?>
                                        </li>
                                        <li>
                                            <?=
                                            Html::a('<i class="fa fa-question pull-right"></i> Help', ['/help'])
                                            ?>
                                        </li>
                                        <li>
                                            <?=
                                            Html::a('<i class="fa fa-sign-out pull-right"></i> Log Out', ['/user/security/logout'], [
                                                'data' => [
                                                    'method' => 'post',
                                                    'confirm' => 'Are you sure?',
                                                //'params' => ['MyParam1' => '100', 'MyParam2' => true],
                                                ]
                                            ])
                                            ?>
                                        </li>
                                    </ul>
                                </li>

                                <!--                                <li role="presentation" class="dropdown">
                                                                    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                                                        <i class="fa fa-envelope-o"></i>
                                                                        <span class="badge bg-green">6</span>
                                                                    </a>
                                                                    <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                                                                        <li>
                                                                            <a>
                                                                                <span class="image">
                                                                                    <img src="http://placehold.it/128x128" alt="Profile Image" />
                                                                                </span>
                                                                                <span>
                                                                                    <span>John Smith</span>
                                                                                    <span class="time">3 mins ago</span>
                                                                                </span>
                                                                                <span class="message">
                                                                                    Film festivals used to be do-or-die moments for movie makers. They were where...
                                                                                </span>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a>
                                                                                <span class="image">
                                                                                    <img src="http://placehold.it/128x128" alt="Profile Image" />
                                                                                </span>
                                                                                <span>
                                                                                    <span>John Smith</span>
                                                                                    <span class="time">3 mins ago</span>
                                                                                </span>
                                                                                <span class="message">
                                                                                    Film festivals used to be do-or-die moments for movie makers. They were where...
                                                                                </span>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a>
                                                                                <span class="image">
                                                                                    <img src="http://placehold.it/128x128" alt="Profile Image" />
                                                                                </span>
                                                                                <span>
                                                                                    <span>John Smith</span>
                                                                                    <span class="time">3 mins ago</span>
                                                                                </span>
                                                                                <span class="message">
                                                                                    Film festivals used to be do-or-die moments for movie makers. They were where...
                                                                                </span>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <a>
                                                                                <span class="image">
                                                                                    <img src="http://placehold.it/128x128" alt="Profile Image" />
                                                                                </span>
                                                                                <span>
                                                                                    <span>John Smith</span>
                                                                                    <span class="time">3 mins ago</span>
                                                                                </span>
                                                                                <span class="message">
                                                                                    Film festivals used to be do-or-die moments for movie makers. They were where...
                                                                                </span>
                                                                            </a>
                                                                        </li>
                                                                        <li>
                                                                            <div class="text-center">
                                                                                <a href="/">
                                                                                    <strong>See All Alerts</strong>
                                                                                    <i class="fa fa-angle-right"></i>
                                                                                </a>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </li>-->

                            </ul>
                        </nav>
                    </div>

                </div>
                <!-- /top navigation -->

                <!-- page content -->
                <div class="right_col" role="main">
                    <?php if (isset($this->params['h1'])): ?>
                        <div class="page-title">
                            <div class="title_left">
                                <h1><?= $this->params['h1'] ?></h1>
                            </div>
                            <div class="title_right">
                                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search for...">
                                        <span class="input-group-btn">
                                            <button class="btn btn-default" type="button">Go!</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="clearfix"></div>

                    <?= $content ?>
                </div>
                <!-- /page content -->
                <!-- footer content -->
                <footer>
                    <!--            <div class="pull-right">
                                    Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com" rel="nofollow" target="_blank">Colorlib</a><br />
                                    Extension for Yii framework 2 by <a href="http://yiister.ru" rel="nofollow" target="_blank">Yiister</a>
                                </div>-->
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->
            </div>

        </div>

        <div id="custom_notifications" class="custom-notifications dsp_none">
            <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
            </ul>
            <div class="clearfix"></div>
            <div id="notif-group" class="tabbed_notifications"></div>
        </div>
        <!-- /footer content -->
        <?php $this->endBody(); ?>
    </body>
</html>
<?php $this->endPage(); ?>
<?php
yii\bootstrap\Modal::begin([
    'headerOptions' => ['id' => 'modalHeader'],
    'id' => 'modal',
    'size' => 'modal-lg',
    //keeps from closing modal with esc key or by clicking out of the modal.
    // user must click cancel or X to close
    'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE],
    'options' => ['style' => 'z-index: 9999;']
]);
echo "<div id='modalContent' style='background: white'><iframe id='frame' class='frame' src='' frameborder='0' style='height: 90%; width: 95%; position: absolute; background: white' height='80%' width='95%'></iframe></div>";
yii\bootstrap\Modal::end();
?>
<script>
    $(document).ready(function () {
        // check if the program is accessed via iframe
        var isInIframe = (window.location !== window.parent.location) ? true : false;
        console.log(isInIframe);
        if (isInIframe) {
            $(".nav_menu, footer").hide();
            $(".left_col").hide();
            $(".right_col").css({"margin-left": "0"});


        }

        $('form :input').change(function() {

            $(this).closest('form').addClass('form-dirty');
        });
        
        $('form :input').on("keyup", function() {
            $(this).closest('form').addClass('form-dirty');
        });

        $(window).bind('beforeunload', function() {
            alert($('form:not(.ignore-changes).form-dirty').length);
            if($('form:not(.ignore-changes).form-dirty').length > 0) {
                return false;
            }
        });

        $('form').bind('submit',function() {
            
            $('.form-dirty').removeClass('form-dirty');
            return true;
        });
        
        /**
         * Added this jQuery event to fix the issue #55 where navigation confirmation
         * still shows event when submitting the entry.
         */
        $('#submit').on('click',function() {
            $('.form-dirty').removeClass('form-dirty');
            return true;
        });
        
       
        
    });

    function requestFullScreen() {

        var el = document.body;

        // Supports most browsers and their versions.
        var requestMethod = el.requestFullScreen || el.webkitRequestFullScreen
                || el.mozRequestFullScreen || el.msRequestFullScreen;

        if (requestMethod) {

            // Native full screen.
            requestMethod.call(el);

        } else if (typeof window.ActiveXObject !== "undefined") {

            // Older IE.
            var wscript = new ActiveXObject("WScript.Shell");

            if (wscript !== null) {
                wscript.SendKeys("{F11}");
            }
        }
    }

</script>
<style>
    /**
    * This was added as work around on the existing issue when 
    * kartik gridview and menu widget are loaded
    */
    li:hover > .nav.child_menu {
    display: block;
}
</style>