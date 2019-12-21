<?php
$this->load->view('header/view_header');
$current_date = date('m/d/Y');
?>
<!--main content start-->
<section id="main-content">
    <section class="wrapper">
        <!-- page start-->
        <div class="row">
            <div class="col-md-8">
                <div class="event-calendar clearfix">
                    <div class="col-lg-7 calendar-block">
                        <div class="cal1 ">
                        </div>
                    </div>
                    <div class="col-lg-5 event-list-block">
                        <div class="cal-day">
<!--                            <span>Today</span>-->
                            Notice
                        </div>
                        <ul class="event-list">
                            <?php
                            if ($notices) {
                                foreach ($notices as $notice) {
                                    ?>
                                    <li class="clearfix">
                                        <a href="<?php echo site_url('notice/details/'.$notice->id); ?>" class="todo-title">
                                            <?php echo $notice->title; ?>
                                        </a>
                                    </li>
                                    <?php
                                }
                            }
                            ?>
                        </ul>
<!--                        <input type="text" class="form-control evnt-input" placeholder="NOTES">-->
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="profile-nav alt">
                    <section class="panel">
                        <div class="user-heading alt clock-row terques-bg">
                            <h1><?= date('F d'); ?></h1>
                            <p class="text-left"><?= date('Y, D'); ?></p>
                            <!--                            <p class="text-left">7:53 PM</p>-->
                        </div>
                        <ul id="clock">
                            <li id="sec"></li>
                            <li id="hour"></li>
                            <li id="min"></li>
                        </ul>

                        <ul class="clock-category">
                            <li>
                                <a href="#" class="active">
                                    <i class="ico-clock2"></i>
                                    <span>Clock</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="ico-alarm2 "></i>
                                    <span>Alarm</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="ico-stopwatch"></i>
                                    <span>Stop watch</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class=" ico-clock2 "></i>
                                    <span>Timer</span>
                                </a>
                            </li>
                        </ul>

                    </section>

                </div>

                <!--widget weather start-->
                <section class="weather-widget clearfix">
                    <div class="pull-left weather-icon">
                        <canvas id="icon1" width="60" height="60"></canvas>
                    </div>
                    <div>
                        <ul class="weather-info">
                            <li class="weather-city">Dhaka, Bangladesh <i class="ico-location"></i></li>
                            <li class="weather-cent"><span>28</span></li>
                            <li class="weather-status">Sunny Day</li>
                        </ul>
                    </div>
                </section>
                <!--widget weather end-->
            </div>
        </div>
        <!--mini statistics start-->
        <!--<div class="row">

            <div class="col-md-3">
                <section class="panel">
                    <div class="panel-body">
                        <div class="top-stats-panel">
                            <h4 class="widget-h">PSC Result</h4>
                            <div class="sm-pie one">
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <div class="col-md-3">
                <section class="panel">
                    <div class="panel-body">
                        <div class="top-stats-panel">
                            <h4 class="widget-h">JSC Result</h4>
                            <div class="sm-pie two">
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <div class="col-md-3">
                <section class="panel">
                    <div class="panel-body">
                        <div class="top-stats-panel">
                            <h4 class="widget-h">SSC Result</h4>
                            <div class="sm-pie three">
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <div class="col-md-3">
                <section class="panel">
                    <div class="panel-body">
                        <div class="top-stats-panel">
                            <h4 class="widget-h">HSC Result</h4>
                            <div class="sm-pie four">
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>-->
        <!--mini statistics end-->
        <!--<div class="row">
            <div class="col-md-12">
                <section class="panel">
                    <div class="panel-body">
                        <div class="top-stats-panel">
                            <div class="daily-visit">
                                <h4 class="widget-h">Present Today</h4>
                                <div id="daily-visit-chart" style="width:100%; height: 200px; display: block">

                                </div>
                                <ul class="chart-meta clearfix">
                                    <li class="pull-left visit-chart-value">Total Present: 3233</li>
                                    <li class="pull-right visit-chart-title"><i class="fa fa-arrow-up"></i> 15%</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="col-md-3">
                    <section class="panel">
                        <div class="panel-body">
                            <div class="top-stats-panel">
                                <h4 class="widget-h">Daily Report - Class 9</h4>
                                <div class="bar-stats">
                                    <ul class="progress-stat-bar clearfix">
                                        <li data-percent="50%"><span class="progress-stat-percent pink"></span></li>
                                        <li data-percent="90%"><span class="progress-stat-percent"></span></li>
                                        <li data-percent="70%"><span class="progress-stat-percent yellow-b"></span></li>
                                    </ul>
                                    <ul class="bar-legend">
                                        <li><span class="bar-legend-pointer pink"></span> Present</li>
                                        <li><span class="bar-legend-pointer green"></span> Total</li>
                                        <li><span class="bar-legend-pointer yellow-b"></span> Absent</li>
                                    </ul>
                                    
                                </div>
                            </div>
                        </div>
                    </section>
                    
                </div>
                <div class="col-md-3">
                    <section class="panel">
                        <div class="panel-body">
                            <div class="top-stats-panel">
                                <h4 class="widget-h">Daily Report - Class 9</h4>
                                <div class="bar-stats">
                                    <ul class="progress-stat-bar clearfix">
                                        <li data-percent="50%"><span class="progress-stat-percent pink"></span></li>
                                        <li data-percent="90%"><span class="progress-stat-percent"></span></li>
                                        <li data-percent="70%"><span class="progress-stat-percent yellow-b"></span></li>
                                    </ul>
                                    <ul class="bar-legend">
                                        <li><span class="bar-legend-pointer pink"></span> Present</li>
                                        <li><span class="bar-legend-pointer green"></span> Total</li>
                                        <li><span class="bar-legend-pointer yellow-b"></span> Absent</li>
                                    </ul>
                                    
                                </div>
                            </div>
                        </div>
                    </section>
                   
                </div>
                <div class="col-md-3">
                    <section class="panel">
                        <div class="panel-body">
                            <div class="top-stats-panel">
                                <h4 class="widget-h">Daily Report - Class 9</h4>
                                <div class="bar-stats">
                                    <ul class="progress-stat-bar clearfix">
                                        <li data-percent="50%"><span class="progress-stat-percent pink"></span></li>
                                        <li data-percent="90%"><span class="progress-stat-percent"></span></li>
                                        <li data-percent="70%"><span class="progress-stat-percent yellow-b"></span></li>
                                    </ul>
                                    <ul class="bar-legend">
                                        <li><span class="bar-legend-pointer pink"></span> Present</li>
                                        <li><span class="bar-legend-pointer green"></span> Total</li>
                                        <li><span class="bar-legend-pointer yellow-b"></span> Absent</li>
                                    </ul>
                                    
                                </div>
                            </div>
                        </div>
                    </section>
                   
                </div>
                <div class="col-md-3">
                    <section class="panel">
                        <div class="panel-body">
                            <div class="top-stats-panel">
                                <h4 class="widget-h">Daily Report - Class 9</h4>
                                <div class="bar-stats">
                                    <ul class="progress-stat-bar clearfix">
                                        <li data-percent="50%"><span class="progress-stat-percent pink"></span></li>
                                        <li data-percent="90%"><span class="progress-stat-percent"></span></li>
                                        <li data-percent="70%"><span class="progress-stat-percent yellow-b"></span></li>
                                    </ul>
                                    <ul class="bar-legend">
                                        <li><span class="bar-legend-pointer pink"></span> Present</li>
                                        <li><span class="bar-legend-pointer green"></span> Total</li>
                                        <li><span class="bar-legend-pointer yellow-b"></span> Absent</li>
                                    </ul>
                                    
                                </div>
                            </div>
                        </div>
                    </section>
                   
                </div>
            </div>

        </div>-->


        <!-- page end-->
    </section>
</section>
<!--main content end-->
<?php
$this->load->view('footer/view_footer');
?>
