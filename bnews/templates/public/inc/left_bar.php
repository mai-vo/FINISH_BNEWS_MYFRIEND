
<h2>Danh mục tin</h2>
<ul>
	<?php
		$query="SELECT * FROM category";
		$result=$mysqli->query($query);
		while($arDMT=mysqli_fetch_assoc($result)){
			$id_cat=$arDMT['id_cat'];
			$name=$arDMT['name'];
			$new_name=convertUtf8ToLatin($name);
			$url='/'.$new_name.'-'.$id_cat;

	?>
	<li><a href="<?php echo $url; ?>"><?php echo $name ?></a></li>
	<?php } ?>
</ul>
