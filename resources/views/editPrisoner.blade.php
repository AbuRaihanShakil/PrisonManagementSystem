@extends('layouts.app')
@section('content')
    <div class="container">
        <form method="POST" action="{{ route('prisoner.update',$prisoner->id) }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" disabled value="{{ $prisoner->name }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            
            <div class="form-group row">
                <label for="nid" class="col-md-4 col-form-label text-md-right">{{ __('NID') }}</label>

                <div class="col-md-6">
                    <input id="nid" type="text" disabled class="form-control @error('nid') is-invalid @enderror" name="nid" value="{{ $prisoner->nid }}" required autocomplete="nid">

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
                    <input id="caseid" disabled type="text" class="form-control @error('caseid') is-invalid @enderror" name="caseid" value="{{ $prisoner->caseid }}" required autocomplete="caseid">

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

                    @if ($prisoner->section == 1)
                    <option selected value="1">Section 1</option>
                    @else
                    <option  value="1">Section 1</option>
                    @endif
                    @if ($prisoner->section == 2)
                    <option selected value="2">Section 2</option>
                    @else
                    <option  value="2">Section 2</option>
                    @endif
                    @if ($prisoner->section == 3)
                    <option selected value="3">Section 3</option>
                    @else
                    <option  value="3">Section 3</option>
                    @endif
                    @if ($prisoner->section == 4)
                    <option selected value="4">Section 4</option>
                    @else
                    <option  value="4">Section 4</option>
                    @endif
            
                    @if ($prisoner->section == 5)
                    <option selected value="5">Section 5</option>
                    @else
                    <option  value="5">Section 5</option>
                    @endif
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
                @if ($prisoner->cellno == 1)
                <option selected value="1">Cell No: 1</option>
                @else
                <option  value="1">Cell No: 1</option>
                @endif
                @if ($prisoner->cellno == 2)
                <option selected value="2">Cell No: 2</option>
                @else
                <option  value="2">Cell No: 2</option>
                @endif
                @if ($prisoner->cellno == 3)
                <option selected value="3">Cell No: 3</option>
                @else
                <option  value="3">Cell No: 3</option>
                @endif
                @if ($prisoner->cellno == 4)
                <option selected value="4">Cell No: 4</option>
                @else
                <option  value="4">Cell No: 4</option>
                @endif
        
                @if ($prisoner->cellno == 5)
                <option selected value="5">Cell No: 5</option>
                @else
                <option  value="5">Cell No: 5</option>
                @endif
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
                        {{ __('Update Prisoner') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection