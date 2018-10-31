<?php include DIR_ROOT . '/views/layouts/header.php'; ?>
<div class="container">
	<div class="row">
		<h1 class="col-lg-12 text-center">
			Админка блога - редактирование записи
		</h1>
		<form class="col-lg-6 offset-lg-3 text-center form-edit">
			<input type="hidden" id="postId" value="<?=$post['id'];?>"/>
			<div class="form-group">
			  <label for="postName">Название записи</label>
			  <input type="text" class="form-control" id="postName" placeholder="Название записи" value="<?=$post['post_name'];?>">
			</div>
			<div class="form-group">
			  <label for="postText">Текст записи</label>
			  <textarea type="text" class="form-control" id="postText" rows="6" placeholder="Введите текст">
			  <?=$post['post_text'];?>
			  </textarea>
			</div>
			<p id="result"></p> 
			<p class="col-lg-6 offset-lg-3 text-center"><a href="javascript:void(0);" id="updatePost">Сохранить</a></p>
		</form>
	</div>
</div>
<?php include DIR_ROOT . '/views/layouts/footer.php'; ?>
