<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Development Area</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
   
</head>
<body>
	

	<div class="wrap-table">
        <a href="#" id="add_btn_student" class="btn btn-primary btn-sm">Add student</a>
        
		<div class="card shadow">
			<div class="card-body">
				<h2>All Data</h2>
				<table class="table table-striped">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Email</th>
							<th>Cell</th>
							<th>Uname</th>
							<th>Gender</th>
							<th>Edu</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody id="allUserTable">
					
						<p id="demo"></p>

					</tbody>
				</table>


                
                <div id="add_modal_student" class="modal fade">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4>Add new student</h4>
                            </div>
                            <div class="modal-body">
                                <form id="add_student_form" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input name="name" type="text" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input name="email" class="form-control" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Cell</label>
                                        <input name="cell" class="form-control" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Username</label>
                                        <input name="uname" class="form-control" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Gender</label>
                                        <input name="gender" class="" type="radio" id="Male" value="Male"> <label for="Male">Male</label>
                                        <input name="gender" class="" type="radio" id="Female" value="Female"> <label for="Female">Female</label>
                                    </div>

									<div class="form-group">
										<label for="">Education</label>
										<select name="edu" id="" class="form-control">
											<option value="">-select-</option>
											<option value="JSC">JSC</option>
											<option value="SSC">SSC</option>
										</select>
									</div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary btn-block" value="add">
                                    </div>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </div>


				<div id="edit_modal_student" class="modal fade">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4>Add new student</h4>
                            </div>
                            <div class="modal-body">
                                <form id="edit_student_form" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input name="name" type="text" class="form-control">
                                        <input name="update_id" type="hidden" value="">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input name="email" class="form-control" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Cell</label>
                                        <input name="cell" class="form-control" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Username</label>
                                        <input name="uname" class="form-control" type="text">
                                    </div>
                                    <div class="form-group stu_gender">
                                       
                                    </div>

									<div class="form-group">
										<label for="">Education</label>
										<select name="edu" id="stu_edu" class="form-control">
											
										</select>
									</div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-primary btn-block" value="add">
                                    </div>
                                </form>
                            </div>
                            
                        </div>
                    </div>
                </div>



			</div>
		</div>
	</div>
	







	<!-- JS FILES  -->
	<script src="{{asset('assets/js/jquery-3.4.1.min.js')}}"></script>
	<script src="{{asset('assets/js/popper.min.js')}}"></script>
	<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('assets/js/custom.js')}}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>