<html>
<head>
	<title>Search</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script type="text/javascript">
		$(function(){
		  $("#search").autocomplete({
		    source: "<?php echo site_url('inventory/get_names'); ?>" // path to the get_birds method
		  });
		});
	</script>
</head>
<body>
	<input type="text" class="form-control" name="add_transaction[supplierName]" id="search">
	<!-- <input type="text" id="search" /> -->
</body>
</html>