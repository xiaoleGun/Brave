</div>
<div class="p-5 text-center ">
	<h6>©<?php $this->options->title() ?></h6>
	<p class="h6"> Powered by <a href="https://github.com/xiaoleGun" target="_blank">Dark</a></p>
</div>
<script src="https://lf6-cdn-tos.bytecdntp.com/cdn/expire-1-M/jquery.pjax/2.0.1/jquery.pjax.min.js" type="application/javascript"></script>
<script src="https://lf26-cdn-tos.bytecdntp.com/cdn/expire-1-M/nprogress/0.2.0/nprogress.min.js" type="application/javascript"></script>
<script>
	window.showSiteRuntime = function() {
        var site_runtime = $("#site_runtime");
		if (!site_runtime) return;
		window.setTimeout("showSiteRuntime()", 1000);
		start = new Date("<?php $this->options->lovetime(); ?>");
		now = new Date();
		T = (now.getTime() - start.getTime());
		i = 24 * 60 * 60 * 1000;
		d = T / i;
		D = Math.floor(d);
		h = (d - D) * 24;
		H = Math.floor(h);
		m = (h - H) * 60;
		M = Math.floor(m);
		s = (m - M) * 60
		S = Math.floor(s);
		site_runtime.html("第 <span class=\"bigfontNum\">" + D + "</span> 天 <span class=\"bigfontNum\">" + H + "</span> 小时 <span class=\"bigfontNum\">" + M + "</span> 分钟 <span class=\"bigfontNum\">" + S + "</span> 秒");
	};
	showSiteRuntime();

	window.showEndRuntime = function() {
		var anniversary = $("#anniversary");
		if (!anniversary) return;
		window.setTimeout("showEndRuntime()", 1000);
		end = new Date("<?php $this->options->anniversarytime(); ?>");
		now = new Date();
		T = (end.getTime() - now.getTime());
		i = 24 * 60 * 60 * 1000;
		d = T / i;
		D = Math.floor(d);
		h = (d - D) * 24;
		H = Math.floor(h);
		m = (h - H) * 60;
		M = Math.floor(m);
		s = (m - M) * 60
		S = Math.floor(s);
		anniversary.html("<span class=\"bigfontNum\">" + D + "</span> 天 <span class=\"bigfontNum\">" + H + "</span> 小时 <span class=\"bigfontNum\">" + M + "</span> 分钟 <span class=\"bigfontNum\">" + S + "</span> 秒");
	};
	showEndRuntime();

    $(document).pjax('a', '#pjax-container', {
        fragment: '#pjax-container',
        timeout: 6000
    });
    $(document).on('pjax:send', function() {
        NProgress.start();
    });
    $(document).on('pjax:complete', function() {
        <?php $this->options->pjax回调(); ?>
        NProgress.done();
    });
</script>
<script src="<?php $this->options->themeUrl('/base/main.js'); ?>"></script>
<?php $this->footer(); ?>
<?php $this->options->底部自定义(); ?>
</body>

</html>