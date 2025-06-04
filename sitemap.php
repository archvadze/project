<?php require('admin/config.php');
 header('content-type: text/xml');
echo '<?xml version="1.0" encoding="UTF-8"?>';
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';
echo '<url>';
echo '<loc>http://proeqti.ge/</loc>';
echo '<changefreq>daily</changefreq>';
echo '<priority>1.00</priority>';
echo '</url>';
 
$langs = array('en','ru','ge');

foreach($algs as $lang){
//კატეგორიები
$x_cat = just_data('pages');
foreach($x_cat as $item){
echo '<url>'.'\n';
echo '<loc>http://proeqti.ge/index.php?view='.$item['url'].'&amp;type=pages&amp;id='.$item['id'].'&nbsp;lang='.$lang.' </loc>'.'\n';
echo '<changefreq>daily</changefreq>'.'\n';
echo '<priority>0.85</priority>'.'\n';
echo '</url>'.'\n';
}

//პროდუქტი
$p_cat = just_data('one');
foreach($p_cat as $item){
echo '<url>'.'\n';
echo '<loc>http://proeqti.ge/?view='.$item['url'].'&nbsp;type=one&nbsp;lang='.$lang.' </loc>'.'\n';
echo '<changefreq>daily</changefreq>'.'\n';
echo '<priority>0.85</priority>'.'\n';
echo '</url>'.'\n';
}
 
}
echo '<url>'.'\n';
echo '<loc>http://proeqti.ge/index.php</loc>'.'\n';
echo '<changefreq>daily</changefreq>'.'\n';
echo '<priority>0.85</priority>'.'\n';
echo '</url>'.'\n';

echo '<url>'.'\n';
echo '<loc>http://proeqti.ge/?view=contact&amp;type=contact</loc>'.'\n';
echo '<changefreq>daily</changefreq>'.'\n';
echo '<priority>0.85</priority>'.'\n';
echo '</url>'.'\n';

echo "</urlset>";
?>