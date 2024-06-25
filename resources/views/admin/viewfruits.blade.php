<!DOCTYPE html>
<html lang="en">
     

@include('partialsadmin.head')
<body class="">
	<!-- [ Pre-loader ] start -->
	<div class="loader-bg">
		<div class="loader-track">
			<div class="loader-fill"></div>
		</div>
	</div>
	<!-- [ Pre-loader ] End -->
	<!-- [ navigation menu ] start -->
     
    @include('partialsadmin.navbar')

     
	<!-- [ navigation menu ] end -->
	<!-- [ Header ] start -->
    @include('partialsadmin.header')
	<!-- [ Header ] end -->
	
	

<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Dashboard Analytics</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Dashboard Analytics</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-xl-12 col-md-12">
                <div class="card latest-update-card">
  
                    <div class="card-body">
                        <div class="latest-update-box">
                 <!-- [ Table Content ] start -->


   
      <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="bg-light p-2 m-2">
                
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <h4>Manage <b>Fruits</b></h4>
                        </div>
                        <div class="col-sm-6">
                            <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add Fruits </span></a>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>FruitName</th>
                            <th>stock</th>
                            <th>Image</th>
        
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="employee_data">  </tbody> 
                </table>
                <p class="loading">Loading Data</p>
            </div>
        </div>
    </div>
    <!-- Edit Modal HTML -->
    <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Employee</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body add_epmployee">
                <div class="modal-body edit_employee">
       

 
 
     <form data-action="{{ route('adminproducts.fruitsadd') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label>Fruit Name</label>
        <input type="text" id="fruit_name_input" class="form-control" required>
    </div>
    <div class="form-group">
        <label>stock</label>
        <input type="number" id="stock_input" class="form-control" required>
    </div>
    <div class="form-group">
        <label>Image</label>
        <input type="file" id="image_input" class="form-control" required>
    </div>
</form>

 


                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-success" value="Add" onclick="addEmployee()">
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Modal HTML -->
    <div id="editEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Employee</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body edit_employee">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" id="name_input" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" id="email_input" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" id="address_input" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" id="phone_input" class="form-control" required>
                        <input type="hidden" id="employee_id" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-info" onclick="editEmployee()" value="Save">
                </div>
            </div>
        </div>
    </div>

    <!-- View Modal HTML -->
    <div id="viewEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">View Employee</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body view_employee">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" id="name_input" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" id="email_input" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" id="address_input" readonly></textarea>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" id="phone_input" class="form-control" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Close">
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal HTML -->
    <div id="deleteEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Employee</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete these Records?</p>
                    <p class="text-warning"><small>This action cannot be undone.</small></p>
                </div>
                <input type="hidden" id="delete_id">
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-danger" onclick="deleteEmployee()" value="Delete">
                </div>
            </div>
        </div>
    </div> 

    </body>  

                 


                  
              


                         
                  <!-- [ Table Content ] end -->   
                        </div>
                        <div class="text-center">
                            <a href="#!" class="b-b-primary text-primary">View all Projects</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
  

</body>
@include('partialsadmin.footer')

</html>

<script>
        $(document).ready(function() {
            employeeList();

        });

        function employeeList() {
            $.ajax({
                type: 'get',
                url: "/api/fruite_list",
                success: function(response) {
                    console.log(response);
                    var tr = '';
                    for (var i = 0; i < response.length; i++) {
                        var id = response[i].id;
                        var fruit_name = response[i].fruit_name;
                        var stock = response[i].stock;
                        var image = response[i].image;
                        tr += '<tr>';
                        tr += '<td>' + id + '</td>';
                        tr += '<td>' + fruit_name + '</td>';
                        tr += '<td>' + stock + '</td>';
                        tr += '<td>' + '<img src="' + image + '" alt="Girl in a jacket" width="100" height="100">' + '</td>';

                        tr += '<td><div class="d-flex">';
    
                        tr +=
                            '<a href="#viewEmployeeModal" class="m-1 view" data-toggle="modal" onclick=viewEmployee("' +
                            id + '")><i class="fa" data-toggle="tooltip" title="view">&#xf06e;</i></a>';

                        tr +=
                            '<a href="#editEmployeeModal" class="m-1 edit" data-toggle="modal" onclick=viewEmployee("' +
                            id +
                            '")><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>';

                        tr +=
         '<a href="#deleteEmployeeModal" class="m-1 delete" data-toggle="modal" onclick=$("#delete_id").val("' + id +  '")><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>';


                        tr += '</div></td>'; 
                        
                        tr += '</tr>';
                    }
                    $('.loading').hide();
                    $('#employee_data').html(tr);
                }
            });
        }
     
        function addEmployee() {
    var fruit_name = $('#fruit_name_input').val();
    var stock = $('#stock_input').val();
    var image = $('#image_input')[0].files[0]; // Get the first file from the input

    var formData = new FormData();
    formData.append('fruit_name', fruit_name);
    formData.append('stock', stock);
    formData.append('image', image);
    formData.append('_token', "{{ csrf_token() }}");

    $.ajax({
        type: 'POST',
        processData: false,
        contentType: false,
        data: formData,
        url: "{{ route('adminproducts.fruitsadd') }}",
        success: function(response) {
            $('#addEmployeeModal').modal('hide');
            employeeList();
            alert(response.message);
        }
    });
}
 
        function editEmployee() {
            var name = $('.edit_employee #name_input').val();
            var email = $('.edit_employee #email_input').val();
            var phone = $('.edit_employee #phone_input').val();
            var address = $('.edit_employee #address_input').val();
            var employee_id = $('.edit_employee #employee_id').val();

            $.ajax({
                type: 'post',
                data: {
                    name: name,
                    email: email,
                    phone: phone,
                    address: address,
                    employee_id: employee_id,
                    _token: "{{ csrf_token() }}"
                },
                url: "/api/employee-edit",
                success: function(response) {
                    $('#editEmployeeModal').modal('hide');
                    employeeList();
                    alert(response.message);
                }

            })
        }

        function viewEmployee(id = 2) {
            $.ajax({
                type: 'get',
                data: {
                    id: id,
                },
                url: "/api/employee-view",
                success: function(response) {
                    console.log(response);
                    
                    $('.edit_employee #name_input').val(response.name);
                    $('.edit_employee #email_input').val(response.email);
                    $('.edit_employee #phone_input').val(response.phone);
                    $('.edit_employee #address_input').val(response.address);
                    $('.edit_employee #employee_id').val(response.id); 


                    $('.view_employee #name_input').val(response.name);
                    $('.view_employee #email_input').val(response.email);
                    $('.view_employee #phone_input').val(response.phone);
                    $('.view_employee #address_input').val(response.address);
                }
            })
        }

        function deleteEmployee() {
            var id = $('#delete_id').val();
            $('#deleteEmployeeModal').modal('hide');
            $.ajax({
                type: 'get',
                data: {
                    id: id,
                },
                url: "/api/employee-delete",
                success: function(response) {
                    employeeList();
                    alert(response.message);
                }
            })
        }
    </script> 
