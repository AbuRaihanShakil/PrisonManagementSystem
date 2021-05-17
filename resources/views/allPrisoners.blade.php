@extends('layouts.app')
@section('content')
<div class="container">
  @if (Auth::user()->section==-1 && Auth::user()->role!=1)
    <h4>Ask Jailer To Assign You a Section!</h4>
  @else
  <div class="float-right d-flex mb-4">
    <form class="form-inline mr-5" method="GET" action="{{ route('search') }}">
      <input class="form-control mr-sm-2" type="search" placeholder="Search by name" aria-label="Search" name="search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>


    <form action="{{ route('filter.prisoner') }}" class="ml-4" method="POST">
     @csrf
      @if (Auth::id()==1)
      <select name="section" class="" id="section" >
      @else
      <select disabled name="section" class="" id="section" >
      @endif
        @if ($section == 0)
        <option selected value="0">All</option>
        @else
        <option  value="0">All</option>
        @endif

        @if ($section == 1)
        <option selected value="1">Section 1</option>
        @else
        <option  value="1">Section 1</option>
        @endif
        @if ($section == 2)
        <option selected value="2">Section 2</option>
        @else
        <option  value="2">Section 2</option>
        @endif
        @if ($section == 3)
        <option selected value="3">Section 3</option>
        @else
        <option  value="3">Section 3</option>
        @endif
        @if ($section == 4)
        <option selected value="4">Section 4</option>
        @else
        <option  value="4">Section 4</option>
        @endif

        @if ($section == 5)
        <option selected value="5">Section 5</option>
        @else
        <option  value="5">Section 5</option>
        @endif

        </select>

        <select name="cellno" id="cellno" >
          @if ($cellno == 0)
          <option selected value="0">All</option>
          @else
          <option  value="0">All</option>
          @endif
  
          @if ($cellno == 1)
          <option selected value="1">Cell No: 1</option>
          @else
          <option  value="1">Cell No: 1</option>
          @endif
          @if ($cellno == 2)
          <option selected value="2">Cell No: 2</option>
          @else
          <option  value="2">Cell No: 2</option>
          @endif
          @if ($cellno == 3)
          <option selected value="3">Cell No: 3</option>
          @else
          <option  value="3">Cell No: 3</option>
          @endif
          @if ($cellno == 4)
          <option selected value="4">Cell No: 4</option>
          @else
          <option  value="4">Cell No: 4</option>
          @endif
  
          @if ($cellno == 5)
          <option selected value="5">Cell No: 5</option>
          @else
          <option  value="5">Cell No: 5</option>
          @endif
          </select>

        <button>Filter</button>
  </form>

  </div>
    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Section</th>
            <th scope="col">Cell No</th>
            <th scope="col">Points</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>

            @foreach ($prisoners as $prisoner)
            <tr>
                <td>{{ $prisoner->name }}</td>
                <td>{{ $prisoner->section }}</td>
                <td>{{ $prisoner->cellno }}</td>
                <td>{{ $prisoner->points }}</td>
                <td><a href="{{ route('prisoner.info',$prisoner->id) }}" class="btn btn-primary">view</a>
                    <a href="{{ route('visitor.add',$prisoner->id) }}" class="btn btn-primary ml-2">Visitor</a>
                    @if (Auth::user()->role==1)
                      <a href="{{ route('edit.prisoner',$prisoner->id) }}" class="btn btn-primary ml-2">Edit</a>
                     @endif

                  </td>
              </tr>
            @endforeach
        </tbody>
      </table>
  @endif

</div>
@endsection