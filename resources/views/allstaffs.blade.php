@extends('layouts.app')
@section('content')
    <div class="container">
        <table class="table table-borderless">
            <thead>
              <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">NID</th>
                <th scope="col">Section</th>
              </tr>
            </thead>
            <tbody>

                @foreach ($staffs as $staff)
                <tr>
                    <td>{{ $staff->name }}</td>
                    <td>{{ $staff->email }}</td>
                    <td>{{ $staff->phone }}</td>
                    <td>{{ $staff->nid }}</td>
                    @if ($staff->section==-1)
                    <td><span class="badge badge-danger">N/A</span></td>
                    @else
                    <td>{{ $staff->section }}</td>
                    @endif

                    <td> <a href="{{ route('view.staff',$staff->id) }}" class="btn btn-primary">view</a> </td>
                  </tr>
                @endforeach
            </tbody>
          </table>
    </div>
@endsection