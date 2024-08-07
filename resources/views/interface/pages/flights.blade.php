@extends('interface.layout.layout')


@section('content')
<h2 class="main-header text-center mt-3">BiletBayisi Uçuşlar</h2>
<section class="content main-header mt-5">
    <div class="container-fluid">
        @if ($errors)
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger">
                    {{$error}}
                </div>
            @endforeach
        @endif
        @if (session()->get('success'))
            <div class="alert alert-success">
                {{session()->get('success')}}
            </div>
        @endif

        @if (session()->get('error'))
            <div class="alert alert-danger">
                {{session()->get('error')}}
            </div>
        @endif

        <form action="{{route('flight.select')}}" method="get">

            <div class="row">
                @if(!empty($data['data']['flightList']['return']))
                    <div class="col-md-6">
                @else
                    <div class="col-md-12">
                @endif
                        @if(!empty($data['data']['flightList']['departure']))
                            <p><b>BiletBayisi : {{count($data["data"]['flightList']['departure'])}}</b> uçuştan <b>{{count($data['data']['flightList']['departure'])}}</b> tanesi gösteriliyor</p>
                            @foreach($data['data']['flightList']['departure'] as $flightInfo)
                                @php
                                    
                                    $segment = array_shift($flightInfo['segments']);
                                    $airlineFlight = $data['data']['airlineList'][$segment['airline']]['name'] ?? null;

                                    $airportDeparture = $data['data']['airportList'][$segment['departureAirport']] ?? null;
                                    $airportArrival = $data['data']['airportList'][$segment['arrivalAirport']] ?? null;

                                    $Departure_date = new DateTime($segment['departureDatetime']);   
                                    $Arrival_date = new DateTime($segment['arrivalDatetime']);

                                @endphp

                                <div class="card">
                                    <div class="card-body">
                                        <div class="tab-content">
                                            <div class="active tab-pane" id="activity">
                                                <div class="post">
                                                    <a><i class="fa-solid fa-plane-departure"></i><b
                                                            style="margin-left: 1.0%;">{{ $airlineFlight }}</b> </a><br>

                                                            <a><i class="fa-solid fa-suitcase-rolling"></i><b
                                                            style="margin-left: 1.7%;">{{ $flightInfo['viewBaggage']['quantity'].' '.$flightInfo['viewBaggage']['unit']}}</b></a>
                                                </div>
                                                <p class="text-center">{{$Departure_date->format('H:i')}} ---------- {{$segment['duration']['hours']}} saat {{$segment['duration']['minutes']}} dakika  ---------- {{$Arrival_date->format('H:i')}}</p>
                                                <p class="text-center">{{$airportDeparture['city_name']}} | {{$airportArrival['city_name']}}</p>
                                                <p class="text-center">{{$airportDeparture['name']}} | {{$airportArrival['name']}}</p>
                                                <p>
                                                    <a><i class="fa-solid fa-plane-departure"></i>
                                                        pegasus uçuşu : {{$segment['flightNumber']}}</a><br>
                                                    <a><i class="fa-solid fa-layer-group"></i>
                                                        Sınıfı : {{$segment['class']}}</a>
                                                    <span class="float-right">
                                                        <a>
                                                            <i class="fa-solid fa-hand-holding-dollar"></i> Fiyatı : {{$flightInfo['viewPrice']}} ₺
                                                        </a>
                                                    </span><br><br>
                                                    <span class="float-left">
                                                        <input type="radio" name="flights[0]" value="{{$flightInfo['id']}}"> Gidiş Uçuşu Seç
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                @if(!empty($data['data']['flightList']['return']))
                    <div class="col-md-6">
                        <p><b>BiletBayisi : {{count($data["data"]['flightList']['return'])}}</b> dönüş uçuştan <b>{{count($data['data']['flightList']['return'])}}</b> tanesi gösteriliyor</p>
                        @foreach($data['data']['flightList']['return'] as $flightInfo)
                            @php
                                
                                $segment = array_shift($flightInfo['segments']);
                                $airlineFlight = $data['data']['airlineList'][$segment['airline']]['name'] ?? null;

                                $airportDeparture = $data['data']['airportList'][$segment['departureAirport']] ?? null;
                                $airportArrival = $data['data']['airportList'][$segment['arrivalAirport']] ?? null;

                                $Departure_date = new DateTime($segment['departureDatetime']);   
                                $Arrival_date = new DateTime($segment['arrivalDatetime']);

                            @endphp

                            <div class="card">
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="active tab-pane" id="activity">
                                            <div class="post">
                                                <a><i class="fa-solid fa-plane-departure"></i><b
                                                        style="margin-left: 1.0%;">{{ $airlineFlight }}</b> </a><br>

                                                        <a><i class="fa-solid fa-suitcase-rolling"></i><b
                                                        style="margin-left: 1.7%;">{{ $flightInfo['viewBaggage']['quantity'].' '.$flightInfo['viewBaggage']['unit']}}</b></a>
                                            </div>
                                            <p class="text-center">{{$Departure_date->format('H:i')}} ---------- {{$segment['duration']['hours']}} saat {{$segment['duration']['minutes']}} dakika  ---------- {{$Arrival_date->format('H:i')}}</p>
                                            <p class="text-center">{{$airportDeparture['city_name']}} | {{$airportArrival['city_name']}}</p>
                                            <p class="text-center">{{$airportDeparture['name']}} | {{$airportArrival['name']}}</p>
                                            <p>
                                                <a><i class="fa-solid fa-plane-departure"></i>
                                                    pegasus uçuşu : {{$segment['flightNumber']}}</a><br>
                                                <a><i class="fa-solid fa-layer-group"></i>
                                                    Sınıfı : {{$segment['class']}}</a>
                                                <span class="float-right">
                                                    <a>
                                                        <i class="fa-solid fa-hand-holding-dollar"></i> Fiyatı : {{$flightInfo['viewPrice']}} ₺
                                                    </a>
                                                </span><br><br>
                                                <span class="float-left">
                                                    <input type="radio" name="flights[1]" value="{{$flightInfo['id']}}"> Dönüş Uçuşu Seç
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-md-12">
                    <input type="hidden" name="id" value="{{$data['data']['id']}}">
                    <button type="submit" class="btn btn-warning mb-5" style="background-color: #4CAF50; padding: 10px 522px; text-align: center;">Seçilen Uçuşları AL</button>
                </div><br><br>
            </div>
        </form>
    </div>

    </div>
</section>

@endsection