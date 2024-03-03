@extends("layouts.app")
@section('content')

@php

$location = Location::get(auth()->user()->last_login_ip_address);
$last_login =Carbon\Carbon::parse(auth()->user()->last_login_at)->diffForHumans();
            // to use location you have to install this =>
            // composer require stevebauman/location
            //php artisan vendor:publish --provider="Stevebauman\Location\LocationServiceProvider"

@endphp

    <h1 class="h3 mb-3">Dashboard </h1>

    <div class="row">
        <div class="col-12">
            <div class="card">


                <div class="d-flex card-header justify-content-between">
                    <h5 class="card-title d-none d-lg-block">Welocme Dima your last login was : {{$last_login}} from {{$location->regionName}} / {{$location->countryName}}</h5>
                    <h5 class="card-title d-lg-none mb-0">last login was : {{$last_login}}</h5>
                    <x-dash-year-dropdown/>
                </div>
                <div class=" d-flex justify-content-between  flex-column flex-xl-row">



                <div class="">

                <div class=" card-body d-lg-none" style="width:400px; height:400px;">
                    <div id="main1" class="w-100 h-100"></div>

                </div>

                <div class="card-body d-none d-lg-block" style="width:800px; height:600px;">
                    <div id="main2" class="w-100 h-100" >

                            </div>
                        </div>




                    </div>

                    <div class="container">

                    <div class="row  ">


                        <div class="card text-bg-secondary m-3 col w-50" style="">
                            <div class="card-header">Appointments</div>
                            <div class="card-body">
                              <h5 class="card-title">Statistics :</h5>
                              <p class="card-text text-center"> total Appointments in </p>
                              <p class="card-text text-center">        {{$year}} <span class="">is </span></p>
                              <p class="card-text h3 text-end">  {{ isset($ayear[0]->count)? $ayear[0]->count:0}}</p>
                            </div>
                        </div>
                        <div class="card text-bg-secondary m-3 col w-50 " style="">
                            <div class="card-header">Patients</div>
                            <div class="card-body">
                              <h5 class="card-title">Statistics :</h5>
                              <p class="card-text text-center"> total patients in  </p>
                              <p class="card-text text-center">         {{$year}}       <span class="">   is  </span> </p>
                              <p class="card-text h3 text-end">  {{isset($pyear[0]->count)? $pyear[0]->count :0}}</p>

                            </div>
                        </div>

                    </div>
                    <div class="row ">
                        <div class="card text-bg-secondary m-3 col w-100" style="">
                            <div class="card-header">work hours</div>
                            <div class="card-body">
                              <h5 class="card-title">Statistics :</h5>
                              <p class="card-text text-center"> total work hours in </p>
                              <p class="card-text text-center">        {{$year}} <span class="">is </span></p>
                              <p class="card-text h3 text-center"> {{isset($h[0]->sum)? ceil($h[0]->sum/60 )  :0}}</p>
                            </div>
                    </div>
                </div>
                </div>


<button id="myBtn" class="btn btn-secondary" onclick="disable()"> sdasdasdasd </button>

    </div>


                        <!-- Prepare a DOM with a defined width and height for ECharts -->
                        <script type="text/javascript">



                            // Initialize the echarts instance based on the prepared dom
                            var myChart = echarts.init(document.getElementById('main1'));
                            var myChart2 = echarts.init(document.getElementById('main2'));

                            var appointments= [<?php echo json_encode($astats)?>];

                            var patients= [<?php echo json_encode($pstats)?>];



                            // Specify the configuration items and data for the chart
                            var option = {
                              title: {
                                text: <?php echo json_encode($year)?>
                              },
                              tooltip: {},
                              legend: {
                                data: ['patients' , "appointments"]
                              },
                              xAxis: {
                                data: ["1","2","3","4","5","6","7","8","9","10","11","12" ]
                              },
                              yAxis: {},
                              series: [
                                {
                                  name: 'patients',
                                  type: 'bar',
                                  data: patients[0]
                                },
                                {
                                  name: 'appointments',
                                  type: 'bar',
                                  data: appointments[0]
                                }
                              ]
                            };

                            // Display the chart using the configuration items and data just specified.
                            myChart.setOption(option);
                            myChart2.setOption(option);

                            </script>


@endsection
