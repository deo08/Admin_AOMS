@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'list'
])

@section('content')
    <div class="content">
        {{-- add new employee modal start --}}
        <div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" method="POST" id="add_employee_form" enctype="multipart/form-data">
                @csrf
                <div class="modal-body p-4 bg-light">
                <div class="my-2">
                    <label for="name">Category Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Category Name" required>
                </div>
                <div class="my-2">
                    <label for="avatar">Image</label>
                    <input type="file" name="avatar" class="form-control" required>
                </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" id="add_employee_btn" class="btn btn-primary">Add Category</button>
                </div>
            </form>
            </div>
        </div>
        </div>
        {{-- add new employee modal end --}}

        {{-- edit employee modal start --}}
        <div class="modal fade" id="editEmployeeModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" method="POST" id="edit_employee_form" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="emp_id" id="emp_id">
                <input type="hidden" name="emp_avatar" id="emp_avatar">
                <div class="modal-body p-4 bg-light">
                <div class="my-2">
                    <label for="name">Category Name</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Category Name" required>
                </div>
                <div class="my-2">
                    <label for="avatar">Image</label>
                    <input type="file" name="avatar" class="form-control">
                </div>
                <div class="mt-2" id="avatar">

                </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" id="edit_employee_btn" class="btn btn-success">Update Category</button>
                </div>
            </form>
            </div>
        </div>
        </div>
        {{-- edit employee modal end --}}

<div class="bg-light">

        <div class="container">
            <div class="row my-5">
            <div class="col-lg-12">
                <div class="card shadow">
                <div class="card-header bg-danger d-flex justify-content-between align-items-center">
                    <h3 class="text-light">Manage Category</h3>
                    <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addEmployeeModal"><i
                        class="bi-plus-circle me-2"></i>Add New Category</button>
                </div>
                <div class="card-body" id="show_all_employees">
                    <h1 class="text-center text-secondary my-5">Loading...</h1>
                </div>
                </div>
            </div>
            </div>
        </div>
</div>
</div>

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
            demo.initChartsPages();
        });
    </script>

  <script>
    $(function() {

      // add new Category ajax request
      $("#add_employee_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#add_employee_btn").text('Adding...');
        $.ajax({
          url: '{{ route('store') }}',
          method: 'post',
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(response) {
            if (response.status == 200) {
              Swal.fire(
                'Added!',
                'Category Added Successfully!',
                'success'
              )
              fetchAllEmployees();
            }
            $("#add_employee_btn").text('Add Category');
            $("#add_employee_form")[0].reset();
            $("#addEmployeeModal").modal('hide');

            setTimeout(function () {
                location.href = '{{route('list')}}';
            }, 1000);

          }
        });
      });

      // edit Category ajax request
      $(document).on('click', '.editIcon', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
        $.ajax({
          url: '{{ route('edit') }}',
          method: 'get',
          data: {
            id: id,
            _token: '{{ csrf_token() }}'
          },
          success: function(response) {
            $("#name").val(response.name);

            $("#avatar").html(
                `<img src="/storage/images/${response.avatar}" width="100" class="img-fluid img-thumbnail">`);



            $("#emp_id").val(response.id);
            $("#emp_avatar").val(response.avatar);
          }
        });
      });

      // update Category ajax request
      $("#edit_employee_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#edit_employee_btn").text('Updating...');
        $.ajax({
          url: '{{ route('update') }}',
          method: 'post',
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(response) {
            if (response.status == 200) {
              Swal.fire(
                'Updated!',
                'Category Updated Successfully!',
                'success'
              )
              fetchAllEmployees();
            }
            $("#edit_employee_btn").text('Update Category');
            $("#edit_employee_form")[0].reset();
            $("#editEmployeeModal").modal('hide');

            setTimeout(function () {
                location.href = '{{route('list')}}';
            }, 1000);

          }
        });
      });

      // delete Category ajax request
      $(document).on('click', '.deleteIcon', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
        let csrf = '{{ csrf_token() }}';
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: '{{ route('delete') }}',
              method: 'delete',
              data: {
                id: id,
                _token: csrf
              },
              success: function(response) {
                console.log(response);
                Swal.fire(
                  'Deleted!',
                  'Your file has been deleted.',
                  'success'
                )
                fetchAllEmployees();
              }
            });
          }
        })
      });


    // Update Status ajax request
    $(document).on('click', '.toggle-class', function(e) {
        e.preventDefault();
        var status =  $(this).prop('checked') ? 1 : 0;
        var id = $(this).data('id');
        Swal.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Yes, Changed it!'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: '{{ route('status') }}',
              data: {
                status: status,
                id: id
              },
              success: function(response) {
                console.log(response);
                Swal.fire(
                  'Success!',
                  'Status Changed Successfully!',
                  'Success'
                )
                fetchAllEmployees();
              }
            });
          }
        })
    });

      // fetch all Category ajax request
      fetchAllEmployees();

      function fetchAllEmployees() {
        $.ajax({
          url: '{{ route('fetchAll') }}',
          method: 'get',
          success: function(response) {
            $("#show_all_employees").html(response);
            $("#Mytable").DataTable({
              order: [0, 'desc']
            });
          }
        });
      }
    });
  </script>

@endpush

