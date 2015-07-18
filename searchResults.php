<?php
require_once 'lib/template.php';
$Viewbag->title = "Search Results";
$Viewbag->q = $_GET["q"];
layout("_layout.phtml");
?>
<div id="results"><?php
require_once 'lib/classes/models/PorterStemmer.php';
require_once 'lib/classes/models/ReverseIndex.php';
$aResults = ReverseIndex::getDocuments($Viewbag->q);
foreach($aResults as $oModel){
	$Viewbag->model = $oModel;
	include "_article.php";
}
?></div>
<script src="js/hilitor.js"></script>
<script type="text/javascript">
	var QueryString = function() {
		// This function is anonymous, is executed immediately and
		// the return value is assigned to QueryString!
		var query_string = {};
		var query = window.location.search.substring(1);
		var vars = query.split("&");
		for ( var i = 0; i < vars.length; i++) {
			var pair = vars[i].split("=");
			// If first entry with this name
			if (typeof query_string[pair[0]] === "undefined") {
				query_string[pair[0]] = pair[1];
				// If second entry with this name
			} else if (typeof query_string[pair[0]] === "string") {
				var arr = [ query_string[pair[0]], pair[1] ];
				query_string[pair[0]] = arr;
				// If third or later entry with this name
			} else {
				query_string[pair[0]].push(pair[1]);
			}
		}
		return query_string;
	}();

	var myHilitor = new Hilitor("results");
	myHilitor.setMatchType("open");
	myHilitor.apply(QueryString.q.replace('+', ' '));


</script>
