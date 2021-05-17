@extends('layouts.app')
@section('content')
    <div class="container">
        <form method="POST" action="{{ route('prisoner.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            

            <div class="form-group row">
                <label for="pic" class="col-md-4 col-form-label text-md-right">{{ __('Picture') }}</label>

                <div class="col-md-6">
                    <input id="pic" type="file" class="form-control @error('pic') is-invalid @enderror" name="pic" >

                    @error('pic')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>


            <div class="form-group row">
                <label for="nid" class="col-md-4 col-form-label text-md-right">{{ __('NID') }}</label>

                <div class="col-md-6">
                    <input id="nid" type="text" class="form-control @error('nid') is-invalid @enderror" name="nid" value="{{ old('nid') }}" required autocomplete="nid">

                    @error('nid')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>


            <div class="form-group row">
                <label for="caseid" class="col-md-4 col-form-label text-md-right">{{ __('Case ID') }}</label>

                <div class="col-md-6">
                    <input id="caseid" type="text" class="form-control @error('caseid') is-invalid @enderror" name="caseid" value="{{ old('caseid') }}" required autocomplete="caseid">

                    @error('caseid')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="section" class="col-md-4 col-form-label text-md-right">{{ __('Section') }}</label>
            <div class="col-md-6">
                <select name="section" id="section" class="form-control @error('section') is-invalid @enderror">
                <option value="1">Section 1</option>
                <option value="2">Section 2</option>
                <option value="3">Section 3</option>
                <option value="4">Section 4</option>
                <option value="5">Section 5</option>
                </select>
                @error('section')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>


        <div class="form-group row">
            <label for="cellno" class="col-md-4 col-form-label text-md-right">{{ __('Cell No.') }}</label>
        <div class="col-md-6">
            <select name="cellno" id="cellno" class="form-control @error('cellno') is-invalid @enderror">
            <option value="1">Cell No: 1</option>
            <option value="2">Cell No: 2</option>
            <option value="3">Cell No: 3</option>
            <option value="4">Cell No: 4</option>
            <option value="5">Cell No: 5</option>
            </select>
            @error('cellno')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>


            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('ADD Prisoner') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection