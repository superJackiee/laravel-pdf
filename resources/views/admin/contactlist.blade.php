@extends('layouts.master')
@section('title')
Banners
@endsection
@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" >
                    <strong class="card-title">Contact List</strong>
                  <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal" >Add Banners</button>
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
                <th>Eamil</th>
                <th>Phone</th>
                <th>Message</th>
                <th>Ceated Date</th>
                 <th ></th>
              </tr>
            </thead>
            <tbody>
            @foreach($contactlist as $data)
            <tr>
            <td>{{ $data->name}}</td>
            <td>{{ $data->email}}</td>
            <td>{{ $data->phone}}</td>
             <td>{{ $data->message}}</td>
              <td>{{ $data->created_date}}</td>
                <td>
              <form action="{{ url('delete-contact/'.$data->id)}}" method="post" style="float: left; margin: 0 0 0 10px;">
                {{ csrf_field()}}
                {{ method_field('delete')}}
              <input type="submit" name="submit" value="Delete" class="btn btn-danger">
</td>
     </form>

             </td>
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

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Banner</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form  action="save-banner" method="post" enctype="multipart/form-data">
          {{ csrf_field()}}
      <div class="modal-body">

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Title:</label>
            <input type="text"  name="title" class="form-control" id="title">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Description:</label>
            <textarea  name="description" class="form-control" id="description"></textarea>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Banner Image:</label>
            <input type="file" name="image">

          </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Submit">
      </div>
        </form>
    </div>
  </div>
</div>
@endsection
@section('script')
<script>
$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient)
})
</script>
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
