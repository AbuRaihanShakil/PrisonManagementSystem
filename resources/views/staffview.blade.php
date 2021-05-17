@extends('layouts.app')
@section('content')
    <div class="container">
        <form method="POST" action="{{ route('update.staff',$staff->id) }}">
            @csrf

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" disabled class="form-control @error('name') is-invalid @enderror" name="name" value="{{$staff->name }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                <div class="col-md-6">
                    <input id="email" disabled type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $staff->email }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                <div class="col-md-6">
                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" disabled value="{{ $staff->phone }}" required autocomplete="phone">

                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="nid" class="col-md-4 col-form-label text-md-right">{{ __('NID') }}</label>

                <div class="col-md-6">
                    <input id="nid" type="text" disabled class="form-control @error('nid') is-invalid @enderror" name="nid" value="{{ $staff->nid }}" required autocomplete="nid">

                    @error('nid')
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
                    @if ($staff->section==-1)
                    <option selected value="-1">N/A</option>
                    @else
                    <option value="-1">N/A</option>
                    @endif


                    @if ($staff->section==1)
                    <option selected value="1">Section 1</option>
                    @else
                    <option value="1">Section 1</option>
                    @endif



                    @if ($staff->section==2)
                    <option selected value="2">Section 2</option>
                    @else
                    <option value="2">Section 2</option>
                    @endif


                    @if ($staff->section==3)
                    <option selected value="3">Section 3</option>
                    @else
                    <option value="3">Section 3</option>
                    @endif


                    @if ($staff->section==4)
                    <option selected value="4">Section 4</option>
                    @else
                    <option value="4">Section 4</option>
                    @endif

                    
                    @if ($staff->section==5)
                    <option selected value="5">Section 5</option>
                    @else
                    <option value="5">Section 5</option>
                    @endif


                        
                    
                    </select>
                    @error('section')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Update') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection