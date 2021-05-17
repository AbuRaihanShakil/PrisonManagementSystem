@extends('layouts.app')
@section('content')
    <div class="container">

        @if ($prisoner->release==0)
        <form method="POST" action="{{ route('visitor.store',$id) }}" enctype="multipart/form-data">
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
                <label for="relation" class="col-md-4 col-form-label text-md-right">{{ __('Relation') }}</label>

                <div class="col-md-6">
                    <input id="relation" type="text" class="form-control @error('relation') is-invalid @enderror" name="relation" value="{{ old('nid') }}" required autocomplete="nid">

                    @error('relation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                <div class="col-md-6">
                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('nid') }}" required autocomplete="nid">

                    @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>






            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4 mb-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('ADD Visitor') }}
                    </button>
                </div>
            </div>
        </form>
        @else
            
        @endif



        @if (count($visitors)>0)
<Table class="table">
    <thead>
        <th>Name</th>
        <th>NID</th>
        <th>Relation</th>
        <th>Phone</th>
        <th>Date</th>
    </thead>
    <tbody>
        @foreach ($visitors as $visitor   )
            <tr>
                <td>{{ $visitor->name }}</td>
                <td>{{ $visitor->nid }}</td>
                <td>{{ $visitor->relation }}</td>
                <td>{{ $visitor->phone }}</td>
                <td>{{ $visitor->updated_at }}</td>
            </tr>
        @endforeach
    </tbody>
</Table>
@else
    <h4> No Visitors</h4>
@endif
    </div>
@endsection