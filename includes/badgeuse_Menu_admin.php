<form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post">
<p>
		<label for="id">AGENT</label>
		<input type="string" name="id" />
	</p>
    <input type="hidden" name="action" value="badgeuse_form">
    <input type="submit" value="Badger" />
</form>