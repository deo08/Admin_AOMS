@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'orders'
])

@section('content')
        {{-- add new employee modal start --}}
        <div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        data-bs-backdrop="static" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Orders</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" method="POST" id="add_employee_form" enctype="multipart/form-data">
                @csrf

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
                <h5 class="modal-title" id="exampleModalLabel">Edit Orders</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="#" method="POST" id="edit_employee_form" enctype="multipart/form-data">
                @csrf

                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" id="edit_employee_btn" class="btn btn-success">Update orders</button>
                </div>
            </form>
            </div>
        </div>
        </div>
        {{-- edit employee modal end --}}
<div class="content">

    <div class="bg-light">
            <div class="container">
                <div class="row my-5">
                    <div class="col-lg-12 ml-auto mr-auto">
                        <div class="card shadow">
                        <div class="card-header bg-success d-flex justify-content-between align-items-center">
                            <h3 class="text-light">Orders List</h3>
                            {{-- <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addEmployeeModal"><i
                                class="bi-plus-circle me-2"></i>Add New Orders</button> --}}
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

    {{-- <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
            demo.initChartsPages();
        });
    </script> --}}

    {{-- <script>
    $(function() {
        $('.toggle-class').bootstrapToggle({
        on: 'Active',
        off: 'Disable'
        });
    })
    </script> --}}


  <script>
    $(function() {

      // add new orders ajax request
      $("#add_employee_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#add_employee_btn").text('Adding...');
        $.ajax({
          url: '{{ route('orders-store') }}',
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
                'Orders Added Successfully!',
                'success'
              )
              fetchAllEmployees();
            }
            $("#add_employee_btn").text('Add Orders');
            $("#add_employee_form")[0].reset();
            $("#addEmployeeModal").modal('hide');

            setTimeout(function () {
                location.href = '{{route('orders-list')}}';
            }, 1000);

          }
        });
      });

      // edit orders ajax request
      $(document).on('click', '.editIcon', function(e) {
        e.preventDefault();
        let id = $(this).attr('id');
        $.ajax({
          url: '{{ route('orders-edit') }}',
          method: 'get',
          data: {
            id: id,
            _token: '{{ csrf_token() }}'
          },
          success: function(response) {
            $("#order_amount").val(response.order_amount);
            $("#payment_status").val(response.payment_status);
            $("#payment_method").val(response.payment_method);

            $("#avatar").html(
                `<img src="/storage/images/${response.image}" width="100" class="img-fluid img-thumbnail">`);

            $("#emp_id").val(response.id);
            $("#emp_avatar").val(response.image);
          }
        });
      });

      // update orders ajax request
      $("#edit_employee_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#edit_employee_btn").text('Updating...');
        $.ajax({
          url: '{{ route('orders-update') }}',
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
                'Orders Updated Successfully!',
                'success'
              )
              fetchAllEmployees();
            }
            $("#edit_employee_btn").text('Update Orders');
            $("#edit_employee_form")[0].reset();
            $("#editEmployeeModal").modal('hide');

            setTimeout(function () {
                location.href = '{{route('orders-list')}}';
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
              url: '{{ route('orders-delete') }}',
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

      // fetch all Category ajax request
      fetchAllEmployees();

      function fetchAllEmployees() {
        $.ajax({
          url: '{{ route('orders-fetchAll') }}',
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

