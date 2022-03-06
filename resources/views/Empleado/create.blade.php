@extends('layouts.layout')
@section('content')

<!-- array monedas monedas -->
<?php
$listaMonedas = array("ADF","ADP","AED","AFA","AFN","ALL","AMD","ANG","AOA","AOC","AOE","AOK","AOM","AON","AOR","ARA","ARP","ARS","ATS","AUD","AWG","AZM","AZN","BAD","BAM","BBD","BDT","BEF","BGL","BGN","BHD","BIF","BMD","BND","BOB","BOV","BRE","BRL","BRR","BSD","BTN","BWP","BYB","BYN","BYR","BZD","CAD","CDF","CHE","CHF","CHW","CLF","CLP","CNY","COP","COU","CRC","CSD","CSK","CUC","CUP","CVE","CYP","CZK","DEM","DJF","DKK","DOP","DZD","ECS","ECV","EEK","EGP","ERN","ESP","ETB","EUR","FIM","FJD","FKP","FRF","GBP","GEL","GHC","GHP","GHS","GIP","GMD","GNF","GNS","GQE","GRD","GTQ","GWP","GYD","HKD","HNL","HRK","HTG","HUF","IDR","IEP","ILS","INR","IQD","IRR","ISK","ITL","JMD","JOD","JPY","KES","KGS","KHR","KMF","KPW","KRW","KWD","KYD","KZT","LAK","LBP","LKR","LRD","LSL","LTL","LUF","LVL","LYD","MAD","MCF","MDL","MGA","MGF","MKD","MLF","MMK","MNT","MOP","MRO","MRU","MTL","MUR","MVR","MWK","MXN","MXP","MXV","MYR","MZM","MZN","NAD","NGN","NIO","NLG","NOK","NPR","NZD","OMR","PAB","PEI","PEN","PGK","PHP","PKR","PLN","PLZ","PTE","PYG","QAR","ROL","RON","RSD","RUB","RUR","RWF","SAR","SBD","SCR","SDD","SDG","SDP","SEK","SGD","SHP","SIT","SKK","SLL","SML","SOS","SRD","SRG","SSP","STD","STN","SVC","SYP","SZL","THB","TJR","TJS","TMM","TMT","TND","TOP","TPE","TRL","TRY","TTD","TWD","TZS","UAH","UGS","UGX","USD","USN","USS","UYI","UYN","UYP","UYU","UZS","VAL","VEB","VEF","VES","VND","VUV","WST","XAF","XAG","XAU","XBA","XBB","XBC","XBD","XBT","XCD","XDR","XEU","XFO","XFU","XOF","XPD","XPF","XPT","XSU","XTS","XUA","XXX","YER","YUD","YUM","YUN","ZAR","ZMK","ZMW","ZRN","ZWD","ZWL","ZWN","ZWR");
?>
    <div class="row">
        <section class="content">
            <div class="col-md-8 col-md-offset-2">
                @if(count($errors) >0)
                    <div class="alert alert-warning">
                        {!! trans('validation.mesg_error_validate') !!}

                        <ul>
                            @foreach($errors->all() as $error)
                                <li> {{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"> Agregar Empleado</h3>
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="{{route('empleado.store')}}">
                            {{csrf_field()}}

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="nombre" id="nombre" class="form-control input-sm" placeholder="Nombre del empleado" value="{{ old('nombre') }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="puesto" id="puesto" class="form-control input-sm" placeholder="Puesto del empleado" value="{{ old('puesto') }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="number" name="edad" id="edad" class="form-control input-sm" placeholder="Edad del empleado" value="{{ old('edad') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select class="form-control" id="moneda" name="moneda">
                                            <option value="0">Selecciona una moneda</option>
                                            <?php $i =1; foreach ($listaMonedas as $monedas){ ?>
                                                <option value="<?php echo $monedas ?>"> <?php echo $monedas; ?> </option>
                                                <?php
                                                    $i= $i+1;
                                                } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="number" name="salario" id="salario" class="form-control input-sm" placeholder="Salario del empleado" value="{{ old('salario') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <select class="form-control" id="estado" name="estado">
                                            <option value="0">Estado de procedencía</option>
                                            @foreach($lstEstados as $estado)
                                                <option value="{{$estado->nombre}}"> {{$estado->nombre}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-control">Activo</label>
                                        <input type="checkbox" name="activo" id="activo" class="form-control input-sm">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-success" >Guardar</button>
                                    <a href="{{ route('empleado.index')  }}" class="btn btn-default"> Atras</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection