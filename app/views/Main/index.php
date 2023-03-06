<div class="container">

	<button class="btn" id="send">BuTTon</button>

		<a href="/main/test" style="padding: 10px; background-color: #0d6efd; border: 2px solid blueviolet;
		 color: white; text-decoration: none">Main/Test</a>
    <?php
    if (!empty($posts)): ?>
        <?php
        foreach ($posts as $post): ?>
					<div class="card">
						<div class="card-header"><?= $post['title'] ?></div>
						<div class="card-body">
							<div class="panel-body"><?= $post['text'] ?></div>
						</div>
					</div>
        <?php
        endforeach; ?>
    <?php
    endif; ?>
</div>
<script src="/js/test.js"></script>
<script>
		$(function () {
	    $('#send').click(function () {
	        $.ajax({
	            ulr: '/main/test.php',
	            type: 'GET',
	            data: {'id': 1},
	            success: function (res) {
	                console.log(res);
	            },
	            error: function () {
	                alert('Error!');
	            }
	        });
	    });
    });
</script>