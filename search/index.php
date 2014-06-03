<?php
require_once("../inc/config.php");

$search_term = "";
	
if (isset($_GET["s"])) {
	$search_term = trim($_GET["s"]);
	
	if ($search_term != "") {
		require_once(ROOT_PATH . "inc/products.php" );
		$products = get_products_search($search_term);
	}
}

$pageTitle = "Search";
$section = "search";
include(ROOT_PATH . "inc/header.php"); ?>

<div class="section shirts search page">
<div class="wrapper">

	<h1>Search</h1>
    
    <form method="get" action="./">
    	<input type="text" name="s" value="<?php echo htmlspecialchars($search_term); ?>">
    	<input type="submit" value="Go">
    </form>
	
	<?php
    if($search_term !="") :
	
		if (!empty($products)) : ?>
				<ul class="products">
				<?php foreach ($products as $product) {
					include(ROOT_PATH . "inc/partial-product-list-view.html.php"); }?>
				</ul>
				<?php else: ?>
			<p>No products were found matching that search term.</p>
		<?php endif; ?>
		
	<?php endif; ?>
            
</div></div>
<?php include(ROOT_PATH . "inc/footer.php"); ?>
