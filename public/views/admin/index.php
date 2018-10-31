<?php include DIR_ROOT . '/views/layouts/header.php'; ?>
<div class="container">
	<div class="row">
		<h1 class="col-lg-12 text-center">
			Админка блога
		</h1>
		<table class="table">
			<tr>
				<th>№</th>
				<th>Название записи</th>
				<th>Дата изменения</th>
			</tr>
			<?php foreach ($posts as $key => $post):?>
				<tr>
					<td><?=$key+1?></td>
					<td><a href="<?="/admin/editPost/" . $post['id']; ?>"><?=$post['post_name'];?></a></td>
					<td><?=$post['post_change'];?></td>
					
				</tr>
			<?php endforeach;?>
		</table>
	</div>
</div>
<?php include DIR_ROOT . '/views/layouts/footer.php'; ?>
