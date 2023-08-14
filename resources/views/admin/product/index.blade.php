@extends('layouts.master')

@section('title', 'product dashboard')


@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">View Product</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"> View Product</li>
    </ol>
    <div class="row">
        <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">CODE</th>
                <th scope="col">NAME</th>
                <th scope="col">DESC</th>
                <th scope="col">CATEGORY</th>
                <th scope="col">ORDER NO</th>
                <th scope="col">PRICE</th>
                <th scope="col">ACTION</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>Otto</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>Otto</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>Otto</td>
              </tr>

            </tbody>
          </table>


        {{-- <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Project Name</th>
                    <th>Project Description</th>
                    <th>Assign User</th>
                    <th>Assign Client</th>
                    <th>Deadline</th>
                    <th>File</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>

                        <td> </td>

                        <td></td>
                        <td></td>

                        <td>
                            <div>
                                <a href="#" class="btn btn-primary"> Edit</a>
                                <a href="#" class="btn btn-danger"> Delete</a>
                            </div>

                        </td>

                    </tr>

            </tbody>
        </table> --}}
        {{-- {{ $projects->links('pagination::bootstrap-4') }} --}}
    </div>
</div>
@endsection
