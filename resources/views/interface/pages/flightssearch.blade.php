@extends('interface.layout.layout')

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 mt-5">
                    <div class="card card">
                        <div class="card-header text-center">
                            <h3 class="card-title text-center" styles="">BiletBayisi Uçuşları Ara</h3>
                        </div>
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

                        <form action="{{route('flights')}}" method="get">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>
                                                <input type="radio" name="os" id="departure"> Tek Yön
                                            </label>
                                            <label>
                                                <input type="radio" name="os" id="return_d"> Gidiş - Dönüş
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Nereden</span>
                                                </div>
                                                <input type="text" class="form-control" name="origin"
                                                    placeholder="Bilet Bayisi">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Nereye</span>
                                                </div>
                                                <input type="text" class="form-control" name="destination"
                                                    placeholder="Bilet Bayisi">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Gidiş Tarihi</span>
                                                        </div>
                                                        <input type="text" name="departure_date" id="datepicker"
                                                            class="form-control float-right">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12" id="return_date" style="display:none;">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Dönüş Tarihi</span>
                                                        </div>
                                                        <input type="text" name="return_date" id="datepicker"
                                                            class="form-control float-right">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Yetişkin</span>
                                                        </div>
                                                        <select name="passengers[ADT]" class="form-control">
                                                            <option value="0">0</option>
                                                            <option selected value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Öğrenci</span>
                                                        </div>
                                                        <select name="passengers[STU]" class="form-control">
                                                            <option value="0">0</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Yaşlı</span>
                                                        </div>
                                                        <select name="passengers[YCD]" class="form-control">
                                                            <option value="0">0</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Çocuk</span>
                                                        </div>
                                                        <select name="passengers[CHD]" class="form-control">
                                                            <option value="0">0</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text">Bebek</span>
                                                        </div>
                                                        <select name="passengers[INF]" class="form-control">
                                                            <option value="0">0</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                        </select>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="form-group">
                                    <button type="submit"
                                        style="width: 100%; padding: 10px; font-size: 16px; color: white; border: none; border-radius: 5px; cursor: pointer; font-size: 19px;"
                                        class="btn btn-success"><i class="fa-solid fa-plane-up"></i> Uçuşları
                                        Ara</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>

@section('script')

<script>
    $(document).ready(function () {
        $('#return_d').on('change', function () {
            if (this.checked) {
                $('#return_date').show();
            }
        });

        $('#departure').on('change', function () {
            if (this.checked) {
                $('#return_date').hide();
            }
        });
    });

    $(function () {
        $("#datepicker").datepicker({
            dateFormat: "yy-mm-dd"
        });
    });
</script>

@endsection

@endsection