<?php
	$page = isset($_GET['page']) ? $_GET['page'] : false;
	if(!$page){
		?>
		<html style="height:100%;">
		<head>
			<title>T2</title>
		</head>
		<body style="margin:0; padding:0; min-height:100%; display:block; background-image:url(/Content/img/frankSmall.jpg); background-size:contain; background-repeat:no-repeat; background-color:#fff; background-position:center center;">

			<div style="font-family:arial; padding:4% 4% 0; color:#000;">
				<h2>Last changed</h2>
				<?php
					$files = [];
					if ($handle = opendir('mockups/')) {
						while (false !== ($entry = readdir($handle))) {
							if ($entry != "." && $entry != ".." && $entry != ".DS_Store" && $entry != "Icon") {
								$files[filemtime('mockups/'.$entry)] = $entry;
								/*echo "<a style='color:#000; text-decoration:none; margin-bottom:10px; display:block;' href='index.php?page=$entry'>$entry</a>";*/
							}
						}
						closedir($handle);

						//sort
						ksort($files);

						// reverse order
						$filesRev = array_reverse($files);

						$i = 0;

						foreach($filesRev as $file) {
							if($i < 10) {
								echo "<a style='color:#000; text-decoration:none; margin-bottom:10px; display:block;' href='index.php?page=$file'>$file</a>";
								$i++;
							} else {
								break;
							}
						}
					}
				?>
			</div>

			<div style="font-family:arial; padding:4%; color:#000;">
				<h2>Mockups</h2>
				<?php
				if ($handle = opendir('mockups/')) {
					while (false !== ($entry = readdir($handle))) {
						if ($entry != "." && $entry != ".." && $entry != ".DS_Store" && $entry != "Icon") {
							echo "<a style='color:#000; text-decoration:none; margin-bottom:10px; display:block;' href='index.php?page=$entry'>$entry</a>";
						}
					}
					closedir($handle);
				}
				?>
			</div>
		</body>
		<?php
	}else{
		require_once('header.html');
		require_once('mockups/'.$page);
		require_once('footer.html');
	}
?>
