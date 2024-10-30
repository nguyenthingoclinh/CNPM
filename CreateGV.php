<?php
    include 'data.php'
?>

<main id="main" class="main">
	<div class="pagetitle">
		<h2>Xác nhận thêm Giảng viên</h2>
	</div>
	<div class="container shadow p-5">
		<div class="row pb-2">
			<h2>Thêm mới Giảng viên</h2>
		</div>
		<form method="post">
			<div asp-validation-summary="All"></div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label asp-for="MenuName">MenuName</label>
					<input type="text" class="form-control mb-3" asp-for="MenuName" placeholder="Nhập tên menu" />
					<span asp-validation-for="MenuName" class="alert-danger"></span>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label asp-for="Levels">Levels</label>
					<select asp-for="Levels" class="form-select" id="Levels">
						<option value="1">1</option>
						<option value="2">2</option>
					</select>
				</div>
				<div class="form-group col-md-6">
					<div class="alert-danger" asp-validation-summary="ModelOnly"></div>
					<label asp-for="ParentID">ParentID</label>
					<select asp-for="ParentID"
	   class="form-control"
							asp-items="@(new SelectList(ViewBag.mnList,"Value","Text"))">
					</select>
				</div>
				<div class="form-group col-md-6">
					<label asp-for="Link">Link</label>
					<input type="text" class="form-control mb-3" asp-for="Link" placeholder="Enter Link" />
					<span asp-validation-for="Link" class="alert-danger"></span>
				</div>
				<div class="form-group col-md-6">
					<label asp-for="MenuOrder">MenuOrder</label>
					<input type="text" class="form-control mb-3" asp-for="MenuOrder" placeholder="Enter MenuOrder" />
					<span asp-validation-for="MenuOrder" class="alert-danger"></span>
				</div>
				<div class="form-group col-md-6">
					<label asp-for="Position">Position</label>
					<input type="text" class="form-control mb-3" asp-for="Position" placeholder="Enter Position" />
					<span asp-validation-for="Position" class="alert-danger"></span>
				</div>
				
			</div>
			<button type="submit" class="btn btn-lg btn-primary">
				<i class="bi bi-file-plus-fill"></i>Lưu
			</button>
			<a asp-controller="Menu" asp-action="Index" class="btn btn-lg btn-warning p-2">Quay lại</a>
		</form>
	</div>
</main>