<?php
/* @var $this yii\web\View */

$this->title = 'XimplePOS';
?>

<div class="site-index">

    <!-- top tiles -->
    <div class="row tile_count">
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-shopping-cart"></i> Gross Sales</span>
            <div class="count">₱2,500.00</div>
            <span class="count_bottom"><i class="green">4% </i> From yesterday</span>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top red"><i class="fa fa-exchange"></i> Refund</span>
            <div class="count red">₱123.50</div>
            <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From yesterday</span>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top red"><i class="fa fa-percent"></i> Discounts</span>
            <div class="count red">₱500.00</div>
            <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From yesterday</span>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-shopping-cart"></i> Net Sales</span>
            <div class="count">₱1,876.50</div>
            <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From yesterday</span>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-barcode"></i> Total QTY Sold</span>
            <div class="count">335</div>
            <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From yesterday</span>
        </div>
        <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
            <span class="count_top"><i class="fa fa-users"></i> New Customers</span>
            <div class="count">23</div>
            <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From yesterday</span>
        </div>
    </div>
    <div class="col-sm-5">
            <?php
            use scotthuangzl\googlechart\GoogleChart;

            echo GoogleChart::widget(array('visualization' => 'PieChart',
                'data' => array(
                    array('Task', 'Hours per Day'),
                    array('Work', 11),
                    array('Eat', 2),
                    array('Commute', 2),
                    array('Watch TV', 2),
                    array('Sleep', 7)
                ),
                'options' => array('title' => 'My Daily Activity')));
            echo GoogleChart::widget(array('visualization' => 'LineChart',
                'data' => array(
                    array('Task', 'Hours per Day'),
                    array('Work', 11),
                    array('Eat', 2),
                    array('Commute', 2),
                    array('Watch TV', 2),
                    array('Sleep', 7)
                ),
                'options' => array('title' => 'My Daily Activity')));

            echo GoogleChart::widget(array('visualization' => 'LineChart',
                'data' => array(
                    array('Year', 'Sales', 'Expenses'),
                    array('2004', 1000, 400),
                    array('2005', 1170, 460),
                    array('2006', 660, 1120),
                    array('2007', 1030, 540),
                ),
                'options' => array(
                    'title' => 'My Company Performance2',
                    'titleTextStyle' => array('color' => '#FF0000'),
                    'vAxis' => array(
                        'title' => 'Scott vAxis',
                        'gridlines' => array(
                            'color' => 'transparent'  //set grid line transparent
                        )),
                    'hAxis' => array('title' => 'Scott hAixs'),
                    'curveType' => 'function', //smooth curve or not
                    'legend' => array('position' => 'bottom'),
                )));

            echo GoogleChart::widget(array('visualization' => 'ScatterChart',
                'data' => array(
                    array('Sales', 'Expenses', 'Quarter'),
                    array(1000, 400, '2015 Q1'),
                    array(1170, 460, '2015 Q2'),
                    array(660, 1120, '2015 Q3'),
                    array(1030, 540, '2015 Q4'),
                ),
                'scriptAfterArrayToDataTable' => "data.setColumnProperty(2, 'role', 'tooltip');",
                'options' => array(
                    'title' => 'Expenses vs Sales',
                )));

            echo GoogleChart::widget( array('visualization' => 'Gauge', 'packages' => 'gauge',
                'data' => array(
                    array('Label', 'Value'),
                    array('Memory', 80),
                    array('CPU', 55),
                    array('Network', 68),
                ),
                'options' => array(
                    'width' => 400,
                    'height' => 120,
                    'redFrom' => 90,
                    'redTo' => 100,
                    'yellowFrom' => 75,
                    'yellowTo' => 90,
                    'minorTicks' => 5
                )
            ));
            echo GoogleChart::widget( array('visualization' => 'Map',
                'packages'=>'map',//default is corechart
                'loadVersion'=>1,//default is 1.  As for Calendar, you need change to 1.1
                'data' => array(
                    ['Country', 'Population'],
                    ['China', 'China: 1,363,800,000'],
                    ['India', 'India: 1,242,620,000'],
                    ['US', 'US: 317,842,000'],
                    ['Indonesia', 'Indonesia: 247,424,598'],
                    ['Brazil', 'Brazil: 201,032,714'],
                    ['Pakistan', 'Pakistan: 186,134,000'],
                    ['Nigeria', 'Nigeria: 173,615,000'],
                    ['Bangladesh', 'Bangladesh: 152,518,015'],
                    ['Russia', 'Russia: 146,019,512'],
                    ['Japan', 'Japan: 127,120,000']
                ),
                'options' => array('title' => 'My Daily Activity',
                    'showTip'=>true,
                )));
            ?>
        </div>
    <!-- /top tiles -->

<!--    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="dashboard_graph">

                <div class="row x_title">
                    <div class="col-md-6">
                        <h3>Hourly Sales <small>Graph title sub-title</small></h3>
                    </div>
                    <div class="col-md-6">
                        <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                            <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                            <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                        </div>
                    </div>
                </div>

                <div class="col-md-9 col-sm-9 col-xs-12">
                    <div id="placeholder33" style="height: 260px; display: none" class="demo-placeholder"></div>
                    <div style="width: 100%;">
                        <div id="canvas_dahs" class="demo-placeholder" style="width: 100%; height:270px;"></div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-12 bg-white">
                    <div class="x_title">
                        <h2>Top Selling Items (Amount)</h2>
                        <div class="clearfix"></div>
                    </div>

                    <div class="col-md-12 col-sm-12 col-xs-6">
                        <div>
                            <p>JIMAC Signature Chair</p>
                            <div class="">
                                <div class="progress progress_sm" style="width: 76%;">
                                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="80"></div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <p>Whiteboard</p>
                            <div class="">
                                <div class="progress progress_sm" style="width: 76%;">
                                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="60"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-6">
                        <div>
                            <p>Markers</p>
                            <div class="">
                                <div class="progress progress_sm" style="width: 76%;">
                                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="40"></div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <p>Sign Pen</p>
                            <div class="">
                                <div class="progress progress_sm" style="width: 76%;">
                                    <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="30"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="clearfix"></div>
            </div>
        </div>

    </div>
    <br />

    <div class="row">


        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                    <h2>Top Selling Items (QTY)</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Settings 1</a>
                                </li>
                                <li><a href="#">Settings 2</a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="widget_summary">
                        <div class="w_left w_25">
                            <span>Sign Pen</span>
                        </div>
                        <div class="w_center w_55">
                            <div class="progress">
                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 66%;">
                                    <span class="sr-only">60% Complete</span>
                                </div>
                            </div>
                        </div>
                        <div class="w_right w_20">
                            <span>123k</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="widget_summary">
                        <div class="w_left w_25">
                            <span>Markers</span>
                        </div>
                        <div class="w_center w_55">
                            <div class="progress">
                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 45%;">
                                    <span class="sr-only">60% Complete</span>
                                </div>
                            </div>
                        </div>
                        <div class="w_right w_20">
                            <span>53k</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="widget_summary">
                        <div class="w_left w_25">
                            <span>Whiteboard</span>
                        </div>
                        <div class="w_center w_55">
                            <div class="progress">
                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">
                                    <span class="sr-only">60% Complete</span>
                                </div>
                            </div>
                        </div>
                        <div class="w_right w_20">
                            <span>23k</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="widget_summary">
                        <div class="w_left w_25">
                            <span>Chair</span>
                        </div>
                        <div class="w_center w_55">
                            <div class="progress">
                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 5%;">
                                    <span class="sr-only">60% Complete</span>
                                </div>
                            </div>
                        </div>
                        <div class="w_right w_20">
                            <span>3k</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="widget_summary">
                        <div class="w_left w_25">
                            <span>Printer</span>
                        </div>
                        <div class="w_center w_55">
                            <div class="progress">
                                <div class="progress-bar bg-green" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 2%;">
                                    <span class="sr-only">60% Complete</span>
                                </div>
                            </div>
                        </div>
                        <div class="w_right w_20">
                            <span>1k</span>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="x_panel tile fixed_height_320 overflow_hidden">
                <div class="x_title">
                    <h2>Department Sales</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Settings 1</a>
                                </li>
                                <li><a href="#">Settings 2</a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table class="" style="width:100%">
                        <tr>
                            <th style="width:37%;">
                                <p>Top 5</p>
                            </th>
                            <th>
                                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                                    <p class="">Department</p>
                                </div>
                                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5">
                                    <p class="">Percentage</p>
                                </div>
                            </th>
                        </tr>
                        <tr>
                            <td>
                                <canvas id="canvas1" height="140" width="140" style="margin: 15px 10px 10px 0"></canvas>
                            </td>
                            <td>
                                <table class="tile_info">
                                    <tr>
                                        <td>
                                            <p><i class="fa fa-square blue"></i>Hardware </p>
                                        </td>
                                        <td>30%</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><i class="fa fa-square green"></i>Office Suppliers </p>
                                        </td>
                                        <td>10%</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><i class="fa fa-square purple"></i>Software </p>
                                        </td>
                                        <td>20%</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><i class="fa fa-square aero"></i>Customization </p>
                                        </td>
                                        <td>15%</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p><i class="fa fa-square red"></i>Others </p>
                                        </td>
                                        <td>30%</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>


        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="x_panel tile fixed_height_320">
                <div class="x_title">
                    <h2>Quick Settings</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Settings 1</a>
                                </li>
                                <li><a href="#">Settings 2</a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="dashboard-widget-content">
                        <ul class="quick-list">
                            <li><i class="fa fa-calendar-o"></i><a href="#">Settings</a>
                            </li>
                            <li><i class="fa fa-bars"></i><a href="#">Subscription</a>
                            </li>
                            <li><i class="fa fa-bar-chart"></i><a href="#">Auto Renewal</a> </li>
                            <li><i class="fa fa-line-chart"></i><a href="#">Achievements</a>
                            </li>
                            <li><i class="fa fa-bar-chart"></i><a href="#">Auto Renewal</a> </li>
                            <li><i class="fa fa-line-chart"></i><a href="#">Achievements</a>
                            </li>
                            <li><i class="fa fa-area-chart"></i><a href="#">Logout</a>
                            </li>
                        </ul>

                        <div class="sidebar-widget">
                            <h4>Profile Completion</h4>
                            <canvas width="150" height="80" id="foo" class="" style="width: 160px; height: 100px;"></canvas>
                            <div class="goal-wrapper">
                                <span class="gauge-value pull-left">$</span>
                                <span id="gauge-text" class="gauge-value pull-left">3,200</span>
                                <span id="goal-text" class="goal-value pull-right">$5,000</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Recent Activities <small>Sessions</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Settings 1</a>
                                </li>
                                <li><a href="#">Settings 2</a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="dashboard-widget-content">

                        <ul class="list-unstyled timeline widget">
                            <li>
                                <div class="block">
                                    <div class="block_content">
                                        <h2 class="title">
                                            <a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
                                        </h2>
                                        <div class="byline">
                                            <span>13 hours ago</span> by <a>Jane Smith</a>
                                        </div>
                                        <p class="excerpt">Film festivals used to be do-or-die moments for movie makers. They were where you met the producers that could fund your project, and if the buyers liked your flick, they’d pay to Fast-forward and… <a>Read&nbsp;More</a>
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="block">
                                    <div class="block_content">
                                        <h2 class="title">
                                            <a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
                                        </h2>
                                        <div class="byline">
                                            <span>13 hours ago</span> by <a>Jane Smith</a>
                                        </div>
                                        <p class="excerpt">Film festivals used to be do-or-die moments for movie makers. They were where you met the producers that could fund your project, and if the buyers liked your flick, they’d pay to Fast-forward and… <a>Read&nbsp;More</a>
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="block">
                                    <div class="block_content">
                                        <h2 class="title">
                                            <a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
                                        </h2>
                                        <div class="byline">
                                            <span>13 hours ago</span> by <a>Jane Smith</a>
                                        </div>
                                        <p class="excerpt">Film festivals used to be do-or-die moments for movie makers. They were where you met the producers that could fund your project, and if the buyers liked your flick, they’d pay to Fast-forward and… <a>Read&nbsp;More</a>
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="block">
                                    <div class="block_content">
                                        <h2 class="title">
                                            <a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
                                        </h2>
                                        <div class="byline">
                                            <span>13 hours ago</span> by <a>Jane Smith</a>
                                        </div>
                                        <p class="excerpt">Film festivals used to be do-or-die moments for movie makers. They were where you met the producers that could fund your project, and if the buyers liked your flick, they’d pay to Fast-forward and… <a>Read&nbsp;More</a>
                                        </p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-8 col-sm-8 col-xs-12">



            <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Customers location <small>geo-presentation</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Settings 1</a>
                                        </li>
                                        <li><a href="#">Settings 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="dashboard-widget-content">
                                <div class="col-md-4 hidden-small">
                                    <h2 class="line_30">125 Customers from 60 cities</h2>

                                    <table class="countries_list">
                                        <tbody>
                                            <tr>
                                                <td>Quezon City</td>
                                                <td class="fs15 fw700 text-right">33%</td>
                                            </tr>
                                            <tr>
                                                <td>Manila</td>
                                                <td class="fs15 fw700 text-right">27%</td>
                                            </tr>
                                            <tr>
                                                <td>Caloocan City</td>
                                                <td class="fs15 fw700 text-right">16%</td>
                                            </tr>
                                            <tr>
                                                <td>Makati City</td>
                                                <td class="fs15 fw700 text-right">11%</td>
                                            </tr>
                                            <tr>
                                                <td>Pasig City</td>
                                                <td class="fs15 fw700 text-right">10%</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div id="world-map-gdp" class="col-md-8 col-sm-12 col-xs-12" style="height:230px;"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">


                 Start to do list 
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>To Do List <small>Sample tasks</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Settings 1</a>
                                        </li>
                                        <li><a href="#">Settings 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <div class="">
                                <ul class="to_do">
                                    <li>
                                        <p>
                                            <input type="checkbox" class="flat"> Schedule meeting with new client </p>
                                    </li>
                                    <li>
                                        <p>
                                            <input type="checkbox" class="flat"> Create email address for new intern</p>
                                    </li>
                                    <li>
                                        <p>
                                            <input type="checkbox" class="flat"> Have IT fix the network printer</p>
                                    </li>
                                    <li>
                                        <p>
                                            <input type="checkbox" class="flat"> Copy backups to offsite location</p>
                                    </li>
                                    <li>
                                        <p>
                                            <input type="checkbox" class="flat"> Food truck fixie locavors mcsweeney</p>
                                    </li>
                                    <li>
                                        <p>
                                            <input type="checkbox" class="flat"> Food truck fixie locavors mcsweeney</p>
                                    </li>
                                    <li>
                                        <p>
                                            <input type="checkbox" class="flat"> Create email address for new intern</p>
                                    </li>
                                    <li>
                                        <p>
                                            <input type="checkbox" class="flat"> Have IT fix the network printer</p>
                                    </li>
                                    <li>
                                        <p>
                                            <input type="checkbox" class="flat"> Copy backups to offsite location</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                 End to do list 

                 start of weather widget 
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Daily active users <small>Sessions</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Settings 1</a>
                                        </li>
                                        <li><a href="#">Settings 2</a>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="temperature"><b>Monday</b>, 07:30 AM
                                        <span>F</span>
                                        <span><b>C</b></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="weather-icon">
                                        <canvas height="84" width="84" id="partly-cloudy-day"></canvas>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="weather-text">
                                        <h2>Texas <br><i>Partly Cloudy Day</i></h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="weather-text pull-right">
                                    <h3 class="degrees">23</h3>
                                </div>
                            </div>

                            <div class="clearfix"></div>

                            <div class="row weather-days">
                                <div class="col-sm-2">
                                    <div class="daily-weather">
                                        <h2 class="day">Mon</h2>
                                        <h3 class="degrees">25</h3>
                                        <canvas id="clear-day" width="32" height="32"></canvas>
                                        <h5>15 <i>km/h</i></h5>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="daily-weather">
                                        <h2 class="day">Tue</h2>
                                        <h3 class="degrees">25</h3>
                                        <canvas height="32" width="32" id="rain"></canvas>
                                        <h5>12 <i>km/h</i></h5>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="daily-weather">
                                        <h2 class="day">Wed</h2>
                                        <h3 class="degrees">27</h3>
                                        <canvas height="32" width="32" id="snow"></canvas>
                                        <h5>14 <i>km/h</i></h5>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="daily-weather">
                                        <h2 class="day">Thu</h2>
                                        <h3 class="degrees">28</h3>
                                        <canvas height="32" width="32" id="sleet"></canvas>
                                        <h5>15 <i>km/h</i></h5>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="daily-weather">
                                        <h2 class="day">Fri</h2>
                                        <h3 class="degrees">28</h3>
                                        <canvas height="32" width="32" id="wind"></canvas>
                                        <h5>11 <i>km/h</i></h5>
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="daily-weather">
                                        <h2 class="day">Sat</h2>
                                        <h3 class="degrees">26</h3>
                                        <canvas height="32" width="32" id="cloudy"></canvas>
                                        <h5>10 <i>km/h</i></h5>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

                </div>
                 end of weather widget 
            </div>
        </div>
    </div>-->
</div>
