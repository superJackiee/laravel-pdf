@extends('layouts.master')
@section('title')
Role Rigster
@endsection
@section('content')

<div class="breadcrumbs">
    <div class="col-sm-4">
        <div class="page-header float-left">
            <div class="page-title">
                <h1>Dashboard</h1>
            </div>
        </div>
    </div>
    <div class="col-sm-8">
        <div class="page-header float-right">
            <div class="page-title">
                <ol class="breadcrumb text-right">
                    <li><a href="{{ URL::to('/')}}/dashbord">Dashboard</a></li>

                    <li class="active">Role List</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Data Table</strong>
                </div>


                <div class="card-body">
                  @if (session('success'))
                      <div class="alert alert-success" role="alert">
                          {{ session('success') }}
                      </div>
                  @endif
          <table id="bootstrap-data-table" class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>User Type</th>
                 <th colspan="2" ></th>

              </tr>
            </thead>
            <tbody>

              @foreach($users as $row)
              <tr>
                <td>{{ $row->name}}</td>
                <td>{{ $row->phone}}</td>
                <td>{{ $row->email}}</td>
                <td>{{ $row->usertype}}</td>
                <td><a href="role-edit/{{ $row->id }}" >Edit </a></td>
                <td><a href="role-delete/{{ $row->id }}" >Delete</a></td>
              </tr>
             @endforeach


            </tbody>
          </table>
                </div>
            </div>
        </div>


        </div>
    </div><!-- .animated -->
</div><!-- .content -->


</div>
@endsection
@section('script')
<script src="public/assets/js/vendor/jquery-2.1.4.min.js"></script>
<script src="public/assets/js/popper.min.js"></script>
<script src="public/assets/js/plugins.js"></script>
<script src="public/assets/js/main.js"></script>


<script src="public/assets/js/lib/data-table/datatables.min.js"></script>
<script src="public/assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
<script src="public/assets/js/lib/data-table/dataTables.buttons.min.js"></script>
<script src="public/assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
<script src="public/assets/js/lib/data-table/jszip.min.js"></script>
<script src="public/assets/js/lib/data-table/pdfmake.min.js"></script>
<script src="public/assets/js/lib/data-table/vfs_fonts.js"></script>
<script src="public/assets/js/lib/data-table/buttons.html5.min.js"></script>
<script src="public/assets/js/lib/data-table/buttons.print.min.js"></script>
<script src="public/assets/js/lib/data-table/buttons.colVis.min.js"></script>
<script src="public/assets/js/lib/data-table/datatables-init.js"></script>


<script type="text/javascript">
    $(document).ready(function() {
      $('#bootstrap-data-table-export').DataTable();
    } );
</script>


@endsection
