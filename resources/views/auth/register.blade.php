@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="unit" class="col-md-4 col-form-label text-md-right">Select unit</label>
                            <div class="col-md-6">
                                <select name="unit" placeholder="please select " class="form-control" value="">
                                    @foreach($units as $unit)
                                    <option value="{{$unit->id}}">{{$unit->unit}}</option>
                                    @endforeach
                                </select><br>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="designation"
                                class="col-md-4 col-form-label text-md-right">{{__('Select Designation')}}</label>
                            <div class="col-md-6">
                                <select name="designation" placeholder="please select " class="form-control" value="">
                                    @foreach ($reporting_designation as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select><br>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="reporting_line"
                                class="col-md-4 col-form-label text-md-right">{{ __('Select Designation Type') }}</label>
                            <div class="col-md-6">
                                <select name="designation_type" class="form-control" id="input">
                                    <option value=""> </option>
                                    <option> </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="reportingdesignation"
                                class="col-md-4 col-form-label text-md-right">{{ __('Select Reporting Designation') }}</label>
                            <div class="col-md-6">
                                <select name="reporting_designation" class="form-control" id="input">
                                    <option value=""> </option>
                                    @foreach ($reporting_designation as $key => $value)
                                    <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="reporting_line"
                                class="col-md-4 col-form-label text-md-right">{{ __('Select Reporting Designation type') }}</label>
                            <div class="col-md-6">
                                <select name="reporting_line" class="form-control" id="input">
                                    <option> </option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm"
                                class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery('select[name="reporting_designation"]').on('change', function () {
            var reportingDesignationID = jQuery(this).val();
            if (reportingDesignationID) {
                jQuery.ajax({
                    url: 'create_user/getreportinglines/' + reportingDesignationID,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        console.log(data);
                        jQuery('select[name="reporting_line"]').empty();
                        jQuery.each(data, function (key, value) {
                            $('select[name="reporting_line"]').append(
                                '<option value="' + key + '">' + value +
                                '</option>');
                        });
                    }
                });
            } else {
                $('select[name="reporting_line"]').empty();
            }
        });
    });

</script>
<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery('select[name="designation"]').on('change', function () {
            var DesignationID = jQuery(this).val();
            if (DesignationID) {
                jQuery.ajax({
                    url: 'create_user/getreportinglines/' + DesignationID,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        console.log(data);
                        jQuery('select[name="designation_type"]').empty();
                        jQuery.each(data, function (key, value) {
                            $('select[name="designation_type"]').append(
                                '<option value="' + key + '">' + value +
                                '</option>');
                        });
                    }
                });
            } else {
                $('select[name="designation_type"]').empty();
            }
        });
    });

</script>

@endsection
