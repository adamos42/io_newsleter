<div class="subscribe">
	<h5><ion:lang key="subscribe" /></h5>
	<form method="POST" onsubmit="document.onSubscribe(this); return false;">
		<div class="success_message" style="display: none;">
			<h4><ion:lang key="subscribe_done" /></h4>
		</div>
		<div class="error_message" style="display: none;">
			<h6><ion:lang key="subscribe_failed" /></h6>
		</div>
		<div class="form">
			<input type="text" class="name" placeholder='<ion:lang key="subscribe_name_placeholder" />' required />
			<input type="email" class="email" placeholder='<ion:lang key="subscribe_email_placeholder" />' required />
			<button type="submit" class="tiny"><ion:lang key="subscribe_me" /></button>
		</div>
	</form>
</div>
<ion:partial view="subscribe_javascript" />
