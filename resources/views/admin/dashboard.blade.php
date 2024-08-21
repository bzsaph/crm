@extends('layouts.adminapp')
@if ($message = Session::get('message'))
<div class="alert alert-success">
    <ul>
        {{ $message }}
    </ul>
</div>
@endif
<div class="container-fluid">
    @section('content')
    @can('privillage-view')
    <section class="section-container">
        <!-- Page content-->
        <div class="content-wrapper">
            <div class="content-heading">
                <div>Dashboard
                    <small data-localize="dashboard.WELCOME"></small>
                </div>
                <!-- START Language list-->
                <div class="ml-auto">
                    <div class="btn-group">
                        <button class="btn btn-secondary dropdown-toggle dropdown-toggle-nocaret" type="button" data-toggle="dropdown">English</button>
                        <div class="dropdown-menu dropdown-menu-right-forced animated fadeInUpShort" role="menu">
                            <a class="dropdown-item" href="#" data-set-lang="en">English</a>

                        </div>
                    </div>
                </div>
                <!-- END Language list-->
            </div>
            <!-- START cards box-->
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <!-- START card-->
                    <div class="card flex-row align-items-center align-items-stretch border-0">
                        <div class="col-4 d-flex align-items-center bg-primary-dark justify-content-center rounded-left">
                            {{$countactive}}
                        </div>
                        <div class="col-8 py-3 bg-primary rounded-right">

                            <div class="h4 mt-0">
                                <small>Project that Was not closed</small>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <!-- START card-->
                    <div class="card flex-row align-items-center align-items-stretch border-0">
                        <div class="col-4 d-flex align-items-center bg-primary-dark justify-content-center rounded-left">
                            {{$countinactive}}
                        </div>
                        <div class="col-8 py-3 bg-primary rounded-right">

                            <div class="h4 mt-0">
                                <small>Projects that was not closed .</small>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <!-- START card-->
                    <div class="card flex-row align-items-center align-items-stretch border-0">
                        <div class="col-4 d-flex align-items-center bg-primary-dark justify-content-center rounded-left">
                            {{ $companys }}
                        </div>
                        <div class="col-8 py-3 bg-primary rounded-right">

                            <div class="h4 mt-0">
                                <small><a href="allcompany" class=" bg-primary ">Companys That offer internship </a></small>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-6 col-md-12">
                    <!-- START date widget-->
                    <div class="card flex-row align-items-center align-items-stretch border-0">
                        <div class="col-4 d-flex align-items-center bg-green justify-content-center rounded-left">
                            <div class="text-center">
                                <!-- See formats: https://docs.angularjs.org/api/ng/filter/date-->
                                <div class="text-sm" data-now="" data-format="MMMM"></div>
                                <br>
                                <div class="h2 mt-0" data-now="" data-format="D"></div>
                            </div>
                        </div>
                        <div class="col-8 py-3 rounded-right">
                            <div class="text-uppercase" data-now="" data-format="dddd"></div>
                            <br>
                            <div class="h2 mt-0" data-now="" data-format="h:mm"></div>
                            <div class="text-muted text-sm" data-now="" data-format="a"></div>
                        </div>
                    </div>
                    <!-- END date widget-->
                </div>


                <div class="card card-default col-md-12">
                    <div class="card-body">
                        {{-- <a class="text-muted float-right" href="#">
                            <em class="fa fa-arrow-right"></em>
                        </a> --}}
                        <div class="text-info">Active internship In this month</div>
                        <div class="text-center py-4">
                            <div class="easypie-chart easypie-chart-lg" data-easypiechart="" data-percent="70" data-animate="{&quot;duration&quot;: &quot;800&quot;, &quot;enabled&quot;: &quot;true&quot;}" data-bar-color="#23b7e5" data-track-color="rgba(200,200,200,0.4)" data-scale-color="false" data-line-width="10" data-line-cap="round" data-size="145">
                                <span>{{ $post }}</span>
                                <canvas height="100% !important" width="217" style="height: 145px; width: 145px;"></canvas></div>
                        </div>
                        <div class="text-center" data-sparkline="" data-bar-color="#23b7e5" data-height="30" data-bar-width="5" data-bar-spacing="2" data-values=""><canvas width="131" height="30" style="display: inline-block; width: 131px; height: 30px; vertical-align: top;"></canvas></div>
                    </div>
                    <div class="card-footer">
                        <p class="text-muted">
                            <em class="fa fa-upload fa-fw"></em>
                            <span>This Month</span>
                            <span class="text-dark">1000 Gb</span>
                        </p>
                    </div>
                </div>
            </div>
            <!-- END cards box-->

        </div>
    </section>
    @else
    <button type="button" class="btn btn-primary rounded mx-auto d-block">
        Wecome to the system dear <span class="badge badge-light" title="view-dashboard">{{ Auth::user()->name}}</span>


        <br><br>
        You don't have permission to view this Dashboard


    </button>
    <div>
        <div class="col-xl-12 col-lg-12 col-md-12">
            <!-- START date widget-->
            <div class="card flex-row align-items-center align-items-stretch border-0">
                <div class="col-4 d-flex align-items-center bg-green justify-content-center rounded-left">
                    <div class="text-center">
                        <!-- See formats: https://docs.angularjs.org/api/ng/filter/date-->
                        <div class="text-sm" data-now="" data-format="MMMM"></div>
                        <br>
                        <div class="h2 mt-0" data-now="" data-format="D"></div>
                    </div>
                </div>
                <div class="col-8 py-3 rounded-right">
                    <div class="text-uppercase" data-now="" data-format="dddd"></div>
                    <br>
                    <div class="h2 mt-0" data-now="" data-format="h:mm"></div>
                    <div class="text-muted text-sm" data-now="" data-format="a"></div>
                </div>
            </div>
            <!-- END date widget-->
        </div>
    </div>
    @endcan

    @endsection
