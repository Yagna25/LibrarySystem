<!DOCTYPE html>
<?php
$courses = ["Computer", "IT", "Civil", "Mechanic"];
$sections = ["1", "2", "3", "4", "5", "6"];
require_once 'valid.php';
?>	
<html lang="eng">
<head>
	<title>Library System</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css" />
</head>
<body style="background-color:#d3d3d3;">
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<img src="images/logo.png" width="160px" height="50px" />
				<h4 class="navbar-text navbar-right">Institute Of Technology</h4>
			</div>
		</div>
	</nav>
	<div class="container-fluid">
		<div class="col-lg-2 well" style="margin-top:60px;">
			<div class="container-fluid" style="word-wrap:break-word;">
				<img src="images/user.png" width="50px" height="50px"/>
				<br /><br />
				<label class="text-muted"><?php require'account.php'; echo $name;?></label>
			</div>
			<hr style="border:1px dotted #d3d3d3;"/>
			<ul id="menu" class="nav menu">
				<li><a style="font-size:18px; border-bottom:1px solid #d3d3d3;" href="home.php"><i class="glyphicon glyphicon-home"></i> Home</a></li>
				<li><a style="font-size:18px; border-bottom:1px solid #d3d3d3;" href=""><i class="glyphicon glyphicon-tasks"></i> Accounts</a>
					<ul style="list-style-type:none;">
						<li><a href="admin.php" style="font-size:15px;"><i class="glyphicon glyphicon-user"></i> Admin</a></li>
						<li><a href="student.php" style="font-size:15px;"><i class="glyphicon glyphicon-user"></i> Student</a></li>
					</ul>
				</li>
				<li><a style="font-size:18px; border-bottom:1px solid #d3d3d3;" href="book.php"><i class="glyphicon glyphicon-book"></i> Books</a></li>
				<li><a style="font-size:18px; border-bottom:1px solid #d3d3d3;" href=""><i class="glyphicon glyphicon-th"></i> Transaction</a>
					<ul style="list-style-type:none;">
						<li><a href="borrowing.php" style="font-size:15px;"><i class="glyphicon glyphicon-random"></i> Borrowing</a></li>
						<li><a href="returning.php" style="font-size:15px;"><i class="glyphicon glyphicon-random"></i> Returning</a></li>
					</ul>
				</li>
				<li><a style="font-size:18px; border-bottom:1px solid #d3d3d3;" href=""><i class="glyphicon glyphicon-cog"></i> Settings</a>
					<ul style="list-style-type:none;">
						<li><a style="font-size:15px;" href="logout.php"><i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
					</ul>
				</li>
			</ul>
		</div>
		<div class="col-lg-1"></div>
		<div class="col-lg-9 well" style="margin-top:60px;">
			<div class="alert alert-info">Accounts / Student</div>
			<button id="add_student" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add new</button>
			<button id="show_student" type="button" style="display:none;" class="btn btn-success"><span class="glyphicon glyphicon-circle-arrow-left"></span> Back</button>
			<br /><br />
			<div id="student_table">
				<table id="table" class="table table-bordered">
					<thead class="alert-success">
						<tr>
							<th>Student ID</th>
							<th>Firstname</th>
							<th>Middlename</th>
							<th>Lastname</th>
							<th>Course</th>
							<th>Yr & Section</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$qstudent = $conn->query("SELECT * FROM `student`") or die(mysqli_error());
							while($fstudent = $qstudent->fetch_array()){
						?>
						<tr>
							<td><?php echo $fstudent['student_no']?></td>
							<td><?php echo $fstudent['firstname']?></td>
							<td><?php echo $fstudent['middlename']?></td>
							<td><?php echo $fstudent['lastname']?></td>
							<td><?php echo $fstudent['course']?></td>
							<td><?php echo $fstudent['section']?></td>
							<td>
	<button class="btn btn-danger btn-delete" data-id="<?= $fstudent['student_no'] ?>" data-toggle="modal" data-target="#deleteModal">
		<span class="glyphicon glyphicon-remove"></span> Delete
	</button>
	<button class="btn btn-warning btn-edit" data-id="<?= $fstudent['student_no'] ?>" data-toggle="modal" data-target="#editModal">
		<span class="glyphicon glyphicon-edit"></span> Edit
	</button>
</td>
						</tr>
						<?php
							}
						?>
					</tbody>
				</table>
			</div>
			<div id="edit_form"></div>
			<div id="student_form" style="display:none;">
				<div class="col-lg-3"></div>
				<div class="col-lg-6">
					<form method="POST" action="save_student_query.php" enctype="multipart/form-data">	
						<div class="form-group">	
							<label>Student ID:</label>
							<input type="text" name="student_no" required class="form-control" />
						</div>	
						<div class="form-group">	
							<label>Firstname:</label>
							<input type="text" name="firstname" required class="form-control" />
						</div>
						<div class="form-group">	
							<label>Middlename:</label>
							<input type="text" name="middlename" placeholder="(Optional)" class="form-control" />
						</div>	
						<div class="form-group">	
							<label>Lastname:</label>
							<input type="text" name="lastname" required class="form-control" />
						</div>
						<div class="form-group">
							<label>Course:</label>
							<select name="course" class="form-control" required>
								<option value="" disabled selected>Select course</option>
								<?php foreach($courses as $course): ?>
									<option value="<?= $course ?>"><?= $course ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group">
							<label>Sem:</label>
							<select name="section" class="form-control" required>
								<option value="" disabled selected>Select Yr & Section</option>
								<?php foreach($sections as $section): ?>
									<option value="<?= $section ?>"><?= $section ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="form-group">	
							<button class="btn btn-primary" name="save_student"><span class="glyphicon glyphicon-save"></span> Submit</button>
						</div>
					</form>		
				</div>	
			</div>
		</div>
	</div>
	<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h4 class="modal-title">Confirm Delete</h4>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this student?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <a id="confirmDelete" class="btn btn-danger">Delete</a>
      </div>
    </div>
  </div>
</div>

<!-- Edit Confirmation Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header bg-warning text-white">
        <h4 class="modal-title">Confirm Edit</h4>
      </div>
      <div class="modal-body">
        Do you want to edit this student's details?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        <a id="confirmEdit" class="btn btn-warning">Edit</a>
      </div>
    </div>
  </div>
</div>

	<nav class="navbar navbar-default navbar-fixed-bottom">
		<div class="container-fluid">
		<label class = "navbar-text pull-right">YGANA PATEL :- 22171341149 </label>
		</div>
	</nav>
</body>

<!-- SCRIPTS -->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/login.js"></script>
<script src="js/sidebar.js"></script>
<script src="js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function () {
        $('#table').DataTable();

        $('#add_student').click(function () {
            $(this).hide();
            $('#show_student').show();
            $('#student_table').slideUp();
            $('#student_form').slideDown();
        });

        $('#show_student').click(function () {
            $(this).hide();
            $('#add_student').show();
            $('#student_table').slideDown();
            $('#student_form').slideUp();
            $('#edit_form').empty();
        });

        let studentIdToDelete = '';
        let studentIdToEdit = '';

        $('.btn-delete').click(function () {
            studentIdToDelete = $(this).data('id');
        });

        $('.btn-edit').click(function () {
            studentIdToEdit = $(this).data('id');
        });

        $('#confirmDelete').click(function () {
            window.location.href = 'delete_student.php?student_id=' + studentIdToDelete;
        });

        $('#confirmEdit').click(function () {
            $('#editModal').modal('hide');
            $('#show_student').show();
            $('#add_student').hide();
            $('#student_table').hide();
            $('#edit_form').load('load_student.php?student_id=' + studentIdToEdit);
        });
    });
</script>
</html>
