   <?php
		if (isset($_SESSION['user'])){
			$form = '
					<input style="float:right; margin:25px -350px 0 0; width:70px;" type="button" class="btn btn-warning" onClick="window.location.href=\'logout.php\'" value="Logout">
					';
			echo $form;
		}else{
			$form = "
					<button style='float:right; margin:25px -350px 0 0; width:70px;' type='button' class='btn btn-success' data-toggle='modal' data-target='#login_modal'>Login</button>
					<button style='float:right; margin:25px -270px 0 0; width:70px;' type='button' class='btn btn-warning' data-toggle='modal' data-target='#signin_modal'>Sign in</button>
					";
			echo $form;
		}
    ?>