<?php

include_once 'inc/class.pagination.php';

$pagination = new pagination();
$pagination->ini();

$pagination->page;

$sql = "SELECT * FROM guestbook ORDER BY id DESC LIMIT $pagination->start, $pagination->records_per_page";
$query = $pagination->link->query($sql);

while ($r = $query->fetch(PDO::FETCH_ASSOC)):
?>

<div class='block'>
	<div>name : <?php echo $r['name']; ?></div>
	<div>email : <?php echo $r['email']; ?></div>
	<div>message : <?php echo $r['message']; ?></div>
	<div>posted : <?php echo $r['posted']; ?></div>
</div><br>

<?php endwhile;?>

<?php

$pagination->filename = 'post.php';
$pagination->createLinks();

?>
</div>

<script>
	$('a.paginationHref').on('click', function(){
		var self = $(this),
		url = self.attr('href');
		$('.section').load(url);

		return false;
	});
</script>