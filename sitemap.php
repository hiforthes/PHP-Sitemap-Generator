<?php header('Content-type: application/xml; charset="utf-8"',true);
include 'connect.php';
?>
<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php
$get = $db->prepare("SELECT * from posts");
$get->execute();
?>

<?php while($data = $get->fetch(PDO::FETCH_ASSOC)) { ?>
  <url>
    <loc>https://<?php echo $_SERVER['HTTP_HOST'] ?>/<?php echo $data['post_sef'] ?></loc>
    <lastmod><?php $published = date_create($data['post_time']);
    echo date_format($published, 'Y-d-m')
    ?></lastmod>
  </url>
  <?php } ?>

</urlset>