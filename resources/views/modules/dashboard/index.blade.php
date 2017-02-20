@extends('layouts.dashboard')

@section('content')
    <!-- Page -->
    <div id="app" class="page">
        <div class="page-content container-fluid">
            <div class="row" data-plugin="matchHeight" data-by-row="true">
                <div class="col-xl-3 col-md-6">
                    <!-- Widget Linearea One-->
                    <div class="card card-shadow" id="widgetLineareaOne">
                        <div class="card-block p-20 p-t-10">
                            <div class="clearfix">
                                <div class="grey-800 pull-xs-left p-y-10">
                                    <i class="icon md-account grey-600 font-size-24 vertical-align-bottom m-r-5"></i>
                                    User
                                </div>
                                <span class="pull-xs-right grey-700 font-size-30">1,253</span>
                            </div>
                            <div class="m-b-20 grey-500">
                                <i class="icon md-long-arrow-up green-500 font-size-16"></i> 15%
                                From this yesterday
                            </div>
                            <div class="ct-chart h-50"></div>
                        </div>
                    </div>
                    <!-- End Widget Linearea One -->
                </div>
                <div class="col-xl-3 col-md-6">
                    <!-- Widget Linearea Two -->
                    <div class="card card-shadow" id="widgetLineareaTwo">
                        <div class="card-block p-20 p-t-10">
                            <div class="clearfix">
                                <div class="grey-800 pull-xs-left p-y-10">
                                    <i class="icon md-flash grey-600 font-size-24 vertical-align-bottom m-r-5"></i>
                                    VISITS
                                </div>
                                <span class="pull-xs-right grey-700 font-size-30">2,425</span>
                            </div>
                            <div class="m-b-20 grey-500">
                                <i class="icon md-long-arrow-up green-500 font-size-16"></i> 34.2%
                                From this week
                            </div>
                            <div class="ct-chart h-50"></div>
                        </div>
                    </div>
                    <!-- End Widget Linearea Two -->
                </div>
                <div class="col-xl-3 col-md-6">
                    <!-- Widget Linearea Three -->
                    <div class="card card-shadow" id="widgetLineareaThree">
                        <div class="card-block p-20 p-t-10">
                            <div class="clearfix">
                                <div class="grey-800 pull-xs-left p-y-10">
                                    <i class="icon md-chart grey-600 font-size-24 vertical-align-bottom m-r-5"></i>
                                    Total Clicks
                                </div>
                                <span class="pull-xs-right grey-700 font-size-30">1,864</span>
                            </div>
                            <div class="m-b-20 grey-500">
                                <i class="icon md-long-arrow-down red-500 font-size-16"></i> 15%
                                From this yesterday
                            </div>
                            <div class="ct-chart h-50"></div>
                        </div>
                    </div>
                    <!-- End Widget Linearea Three -->
                </div>
                <div class="col-xl-3 col-md-6">
                    <!-- Widget Linearea Four -->
                    <div class="card card-shadow" id="widgetLineareaFour">
                        <div class="card-block p-20 p-t-10">
                            <div class="clearfix">
                                <div class="grey-800 pull-xs-left p-y-10">
                                    <i class="icon md-view-list grey-600 font-size-24 vertical-align-bottom m-r-5"></i>
                                    Items
                                </div>
                                <span class="pull-xs-right grey-700 font-size-30">845</span>
                            </div>
                            <div class="m-b-20 grey-500">
                                <i class="icon md-long-arrow-up green-500 font-size-16"></i> 18.4%
                                From this yesterday
                            </div>
                            <div class="ct-chart h-50"></div>
                        </div>
                    </div>
                    <!-- End Widget Linearea Four -->
                </div>
                <div class="clearfix"></div>
                <div class="col-xl-7 col-lg-7">
                    <!-- Widget Jvmap -->
                    <div class="card card-shadow">
                        <div class="card-block p-0">
                            <div id="widgetJvmap" class="h-450"></div>
                        </div>
                    </div>
                    <!-- End Widget Jvmap -->
                </div>
                <div class="col-xl-5 col-lg-5">
                    <!-- Widget Current Chart -->
                    <div class="card card-shadow" id="widgetCurrentChart">
                        <div class="p-30 white bg-green-500">
                            <div class="font-size-20 m-b-20">The current chart</div>
                            <div class="ct-chart h-200">
                            </div>
                        </div>
                        <div class="bg-white p-30 font-size-14">
                            <div class="counter counter-lg text-xs-left">
                                <div class="counter-label m-b-5">Approve rate are above average</div>
                                <div class="counter-number-group">
                                    <span class="counter-number">12,673</span>
                                    <span class="counter-number-related text-uppercase font-size-14">pcs</span>
                                </div>
                            </div>
                            <button type="button" class="btn-raised btn btn-info btn-floating">
                                <i class="icon md-plus" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                    <!-- End Widget Current Chart -->
                </div>
                <div class="col-xl-4 col-lg-6">
                    <!-- Widget User list -->
                    <div class="card" id="widgetUserList">
                        <div class="card-header cover overlay">
                            <img class="cover-image h-200" src="{{ asset('images/dashboard-header.jpg') }}"
                                 alt="..."/>
                            <div class="overlay-panel vertical-align overlay-background">
                                <div class="vertical-align-middle">
                                    <a class="avatar avatar-100 pull-xs-left m-r-20" href="javascript:void(0)">
                                        <img src="{{ asset('images/portraits/5.jpg') }}" alt="">
                                    </a>
                                    <div class="pull-xs-left">
                                        <div class="font-size-20">Robin Ahrens</div>
                                        <p class="m-b-20 text-nowrap">
                                            <span class="text-break">machidesign@gmail</span>
                                        </p>
                                        <div class="text-nowrap font-size-18">
                                            <a href="" class="white m-r-10">
                                                <i class="icon bd-twitter"></i>
                                            </a>
                                            <a href="" class="white m-r-10">
                                                <i class="icon bd-facebook"></i>
                                            </a>
                                            <a href="" class="white">
                                                <i class="icon bd-dribbble"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-block p-y-0">
                            <ul class="list-group list-group-full list-group-dividered m-b-0">
                                <li class="list-group-item">
                                    <div class="media">
                                        <div class="media-left">
                                            <a class="avatar avatar-lg" href="javascript:void(0)">
                                                <img class="img-responsive" src="{{ asset('images/portraits/1.jpg') }}"
                                                     alt="...">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading">Herman Beck</h4>
                                            <small>San Francisco</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="media">
                                        <div class="media-left">
                                            <a class="avatar avatar-lg" href="javascript:void(0)">
                                                <img class="img-responsive" src="{{ asset('images/portraits/2.jpg') }}"
                                                     alt="...">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading">Mary Adams</h4>
                                            <small>Salt Lake City, Utah</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="media">
                                        <div class="media-left">
                                            <a class="avatar avatar-lg" href="javascript:void(0)">
                                                <img class="img-responsive" src="{{ asset('images/portraits/3.jpg') }}"
                                                     alt="...">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="media-heading">Caleb Richards</h4>
                                            <small>Basking Ridge, NJ</small>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <button type="button" class="btn-raised btn btn-danger btn-floating">
                                <i class="icon md-plus" aria-hidden="true"></i>
                            </button>
                        </div>
                    </div>
                    <!-- End Widget User list -->
                </div>
                <div class="col-xl-4 col-lg-6">
                    <!-- Widget Chat -->
                    <div class="card card-shadow" id="chat">
                        <div class="card-header bg-white p-x-0">
                            <a class="pull-xs-left" href="javascript:void(0)">
                                <i class="icon md-chevron-left" aria-hidden="true"></i>
                            </a>
                            <div class="text-xs-right">
                                Conversation with
                                <span class="hidden-xs-dow">June Lane</span>
                                <a class="avatar m-l-10" data-toggle="tooltip" href="#" data-placement="right"
                                   title="June Lane">
                                    <img src="{{ asset('images/portraits/4.jpg') }}" alt="...">
                                </a>
                            </div>
                        </div>
                        <div class="card-block">
                            <div class="chats">
                                <div class="chat chat-left">
                                    <div class="chat-avatar">
                                        <a class="avatar" data-toggle="tooltip" href="#" data-placement="left" title="">
                                            <img src="{{ asset('images/portraits/5.jpg') }}" alt="Edward Fletcher">
                                        </a>
                                    </div>
                                    <div class="chat-body">
                                        <div class="chat-content" data-toggle="tooltip" title="11:37:08 am">
                                            <p>Good morning, sir.</p>
                                            <p>What can I do for you?</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="chat">
                                    <div class="chat-avatar">
                                        <a class="avatar" data-toggle="tooltip" href="#" data-placement="right" title="">
                                            <img src="{{ asset('images/portraits/4.jpg') }}" alt="June Lane">
                                        </a>
                                    </div>
                                    <div class="chat-body">
                                        <div class="chat-content" data-toggle="tooltip" title="11:39:57 am">
                                            <p>Well, I am just looking around.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="chat chat-left">
                                    <div class="chat-avatar">
                                        <a class="avatar" data-toggle="tooltip" href="#" data-placement="left" title="">
                                            <img src="{{ asset('images/portraits/5.jpg') }}" alt="Edward Fletcher">
                                        </a>
                                    </div>
                                    <div class="chat-body">
                                        <div class="chat-content" data-toggle="tooltip" title="11:40:10 am">
                                            <p>If necessary, please ask me.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-white">
                            <form>
                                <div class="input-group form-material">
										<span class="input-group-btn">
										  <a href="javascript: void(0)"
                                             class="btn btn-pure btn-default icon md-camera"></a>
										</span>
                                    <input class="form-control" type="text" placeholder="Type message here ...">
                                    <span class="input-group-btn">
										  <button type="button" class="btn btn-pure btn-default icon md-mail-send">
											</button>
										</span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- End Widget Chat -->
                </div>
                <div class="col-xl-4 col-lg-6">
                        <!-- Widget Info -->
                        <div class="card card-shadow">
                            <div class="card-header cover overlay">
                                <div class="cover-background h-200"
                                     style="background-image: url({{ asset('images/placeholder.png') }})">
                                </div>
                            </div>
                            <div class="card-block p-x-30 p-y-20 padding-vertical-20"
                                 style="height:calc(100% - 250px);">
                                <div class="m-b-10" style="margin-top: -70px;">
                                    <a class="avatar avatar-100 bg-white img-bordered" href="javascript:void(0)">
                                        <img src="{{ asset('images/portraits/2.jpg') }}" alt="">
                                    </a>
                                </div>
                                <div class="m-b-20">
                                    <div class="font-size-20">Caleb Richards</div>
                                    <div class="font-size-14 grey-500">
                                        <span>2 hours ago</span> |
                                        <span>Comments 20</span>
                                    </div>
                                </div>
                                <p>
                                    Lorem ipsum dolLorem ip sum dolor sit amet, consectetur adipiscing elit. Integer
                                    nec odio. Praesent libero.or sit amet, consectetur adipiscing elit.
                                    Integer nec odio. Praesent libero.
                                </p>
                            </div>
                        </div>
                <!-- End Widget Info -->
                </div>
            </div>
            <div class="col-xl-6 col-lg-6">
                <!-- Panel Projects -->
                <div class="panel" id="projects">
                    <div class="panel-heading">
                        <h3 class="panel-title">Projects</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <td>Projects</td>
                                <td>Completed</td>
                                <td>Date</td>
                                <td>Actions</td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>The sun climbing plan</td>
                                <td>
                                    <span data-plugin="peityPie" data-skin="red">7/10</span>
                                </td>
                                <td>Jan 1, 2015</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-icon btn-pure btn-default"
                                            data-toggle="tooltip"
                                            data-original-title="Edit">
                                        <i class="icon md-wrench" aria-hidden="true"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-icon btn-pure btn-default"
                                            data-toggle="tooltip"
                                            data-original-title="Delete">
                                        <i class="icon md-close" aria-hidden="true"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>Lunar probe project</td>
                                <td>
                                    <span data-plugin="peityPie" data-skin="blue">3/10</span>
                                </td>
                                <td>Feb 12, 2015</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-icon btn-pure btn-default"
                                            data-toggle="tooltip"
                                            data-original-title="Edit">
                                        <i class="icon md-wrench" aria-hidden="true"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-icon btn-pure btn-default"
                                            data-toggle="tooltip"
                                            data-original-title="Delete">
                                        <i class="icon md-close" aria-hidden="true"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>Dream successful plan</td>
                                <td>
                                    <span data-plugin="peityPie" data-skin="green">9/10</span>
                                </td>
                                <td>Apr 9, 2015</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-icon btn-pure btn-default"
                                            data-toggle="tooltip"
                                            data-original-title="Edit">
                                        <i class="icon md-wrench" aria-hidden="true"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-icon btn-pure btn-default"
                                            data-toggle="tooltip"
                                            data-original-title="Delete">
                                        <i class="icon md-close" aria-hidden="true"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>Office automatization</td>
                                <td>
                                    <span data-plugin="peityPie" data-skin="orange">5/10</span>
                                </td>
                                <td>May 15, 2015</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-icon btn-pure btn-default"
                                            data-toggle="tooltip"
                                            data-original-title="Edit">
                                        <i class="icon md-wrench" aria-hidden="true"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-icon btn-pure btn-default"
                                            data-toggle="tooltip"
                                            data-original-title="Delete">
                                        <i class="icon md-close" aria-hidden="true"></i>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>Open strategy</td>
                                <td>
                                    <span data-plugin="peityPie" data-skin="brown">2/10</span>
                                </td>
                                <td>Jun 2, 2015</td>
                                <td>
                                    <button type="button" class="btn btn-sm btn-icon btn-pure btn-default"
                                            data-toggle="tooltip"
                                            data-original-title="Edit">
                                        <i class="icon md-wrench" aria-hidden="true"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm btn-icon btn-pure btn-default"
                                            data-toggle="tooltip"
                                            data-original-title="Delete">
                                        <i class="icon md-close" aria-hidden="true"></i>
                                    </button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- End Panel Projects -->
            </div>
            <div class="col-xl-6 col-lg-6">
                <!-- Panel Projects Status -->
                <div class="panel" id="projects-status">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Projects Status
                            <span class="tag tag-pill tag-info">5</span>
                        </h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <td>ID</td>
                                <td>Project</td>
                                <td>Status</td>
                                <td class="text-left">Progress</td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>619</td>
                                <td>The sun climbing plan</td>
                                <td>
                                    <span class="tag tag-primary">Developing</span>
                                </td>
                                <td>
                                    <span data-plugin="peityLine">5,3,2,-1,-3,-2,2,3,5,2</span>
                                </td>
                            </tr>
                            <tr>
                                <td>620</td>
                                <td>Lunar probe project</td>
                                <td>
                                    <span class="tag tag-warning">Design</span>
                                </td>
                                <td>
                                    <span data-plugin="peityLine">1,-1,0,2,3,1,-1,1,4,2</span>
                                </td>
                            </tr>
                            <tr>
                                <td>621</td>
                                <td>Dream successful plan</td>
                                <td>
                                    <span class="tag tag-info">Testing</span>
                                </td>
                                <td>
                                    <span data-plugin="peityLine">2,3,-1,-3,-1,0,2,4,5,3</span>
                                </td>
                            </tr>
                            <tr>
                                <td>622</td>
                                <td>Office automatization</td>
                                <td>
                                    <span class="tag tag-danger">Canceled</span>
                                </td>
                                <td>
                                    <span data-plugin="peityLine">1,-2,0,2,4,5,3,2,4,2</span>
                                </td>
                            </tr>
                            <tr>
                                <td>623</td>
                                <td>Open strategy</td>
                                <td>
                                    <span class="tag tag-default">Reply waiting</span>
                                </td>
                                <td>
                                    <span data-plugin="peityLine">4,2,-1,-3,-2,1,3,5,2,4</span>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- End Panel Projects Stats -->
            </div>
        </div>
    </div>
    <!-- End Page -->
@endsection