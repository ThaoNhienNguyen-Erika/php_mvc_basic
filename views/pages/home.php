<table class="table">
	<h1>Danh sách thành viên</h1>
	<thead>
		<tr>
			<th>ID</th>
			<th>Tên</th>
			<th>Tuổi</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<?php foreach ($pages as $row): ?>
				<tr id="row_<?php echo $row->id; ?>">
					<td><?php echo $row->id; ?></td>
					<td><?php echo $row->hoten; ?></td>
					<td><?php echo $row->tuoi; ?></td>
					<td>
						<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal<?php echo $row->id; ?>" style="width: 90px; height: 30px ; font-size: 12px; float: center;">Xoá bảng</button>
					</td>
					<td>
						<a href="?controller=pages&action=update&id=<?php echo $row->id; ?>">Chỉnh sửa</a>
					</td>
					<div id="myModal<?php echo $row->id; ?>" class="modal fade" role="dialog">
						  <div class="modal-dialog">

						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal">&times;</button>
						        <h4 class="modal-title">Yêu cầu nho nhỏ :))</h4>
						      </div>
						      <div class="modal-body">
						        <div class="alert alert-warning" id="result-delete-<?php echo $row->id ?>">Bạn có muốn xoá database hay không?</div>
						      </div>
						      <div class="modal-footer">
						         <button id="btn-delete-<?php echo $row->id ?>" type="button" onclick="xoauser(<?php echo $row->id ?>);" class="btn btn-default" style="color: green">Có</button>
						        <button id="btn-cancel-<?php echo $row->id ?>" type="button" class="btn btn-default" data-dismiss="modal">Không</button>
						      </div>
						    </div>
						  </div>
						</div>
				</tr>
			<?php endforeach ?>
		</tr>
	</tbody>
	<tfoot>
		<form action="?controller=pages&action=them" method="POST">
			<tr>
				<td><input type="text" name="id" placeholder="Nhập id"></td>
				<td><input type="text" name="hoten" placeholder="Nhập tên"></td>
				<td><input type="text" name="tuoi" placeholder="Nhập tuổi"></td>
				<td><a href="?controller=pages&action=them"><input type="submit" name="add" value="Thêm"></a></td>
			</tr>
		</form>
	</tfoot>
</table>
<a onclick="datalist()">alo</a>
<script type="text/javascript" src="asset/js/dauphongdauphay.js"></script>