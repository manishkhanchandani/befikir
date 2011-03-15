<form id="formTest" name="formTest" method="post" action="">
<?php if (!empty($error)) { ?><div class="error"><?php echo $error; ?></div><?php } ?>
	<p>
		<input type="checkbox" name="agree" id="agree" value="1" />
		<label for="agree"></label> 
		I agree with terms and conditions.
		<label for="textfield"></label>
	</p>
	<p>
		<input type="submit" name="submit" id="submit" value="Please create a new test">
		<input name="MM_Insert" type="hidden" id="MM_Insert" value="formTest" />
	</p>
</form>