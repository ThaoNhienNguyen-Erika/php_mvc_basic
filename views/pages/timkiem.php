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
				<tr>
					<td><?php echo $row->id; ?></td>
					<td><?php echo $row->hoten; ?></td>
					<td><?php echo $row->tuoi; ?></td>
					<td>
						<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal<?php echo $row->id; ?>" style="width: 90px; height: 30px ; font-size: 12px; float: center;">Xoá bảng</button>
						<div id="myModal<?php echo $row->id; ?>" class="modal fade" role="dialog">
						  <div class="modal-dialog">

						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal">&times;</button>
						        <h4 class="modal-title">Yêu cầu nho nhỏ :))</h4>
						      </div>
						      <div class="modal-body">
						        <p>Bạn có muốn xoá database hay không?</p>
						      </div>
						      <div class="modal-footer">
						        <a href="?controller=pages&action=xoabang&id=<?php echo $row->id; ?>" class="btn btn-default" style="color: green">Có</a>
						        <button type="button" class="btn btn-default" data-dismiss="modal">Không</button>
						      </div>
						    </div>
						  </div>
						</div>
					</td>
				</tr>
			<?php endforeach ?>
		</tr>
	</tbody>
</table>