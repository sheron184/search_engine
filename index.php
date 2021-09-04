

<!DOCTYPE html>
<html>
<head>
	<title>WEB SCRAPING</title>
	<script type="text/javascript" src="jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	<style type="text/css">
		.bz1lBb{
			display: none;
		}
		.cOl4Id{
			display: none;
		}
		.KP7LCb{
			display: none;
		}
		.ZINbbc {
		    background-color: #111 !important;
		    margin-bottom: 10px;
		    box-shadow: 0 1px 6px rgba(32, 33, 36, 0.28);
		    border-radius: 0px !important;
		    color: #fff !important;
		}
		.BNeawe{
			color: #fff !important;
		}
		.groove{
			font-weight: 800;
		}
	</style>
</head>
<body>
	<div class="container">
		 <div class="row">
		 	<div class="col-12">
		 		<div>
		 			<h4 align="center" class="display-3 groove"><span style="color:yellow;">G</span><span style="color:red;">r</span><span style="color:orange;">o</span><span style="color:cyan;">o</span><span style="color:green;">v</span><span style="color:purple;">e</span></h4>
		 		</div>
		 	</div>
		 	<div class="col-6 ml-auto mr-auto">
		 		<form id="form" action="search" method="post">
		 			<div class="form-group d-flex p-4">
		 				<input style="border-radius: 20px;" type="text" name="search_query" class="form-control">
		 				<input style="border-radius: 20px;
    background: linear-gradient(45deg, #dc3545, #ffc107);
    border: none;" type="submit" value="Search" class="btn btn-info ml-2">
		 			</div>
				</form>
		 	</div>
		 	<div class="col-12 ml-auto mr-auto">
		 		<div style="padding: 30px 10px 20px 200px;" class="w-50 ml-5 spinner_holder ml-auto mr-auto">
		 			
		 		</div>
		 	</div>
		 </div>
	</div>
<div id="demo"></div>
<p id="text"></p>
</body>
</html>
<script type="text/javascript">
	$("#form").submit(function(e){
		e.preventDefault();
		var node = "<div class='spinner-border ml-auto mr-auto text-primary'></div>";
		$(node).appendTo(".spinner_holder"); //adding the spinner
		search_query = $("input[name='search_query']").val();
		//send data to the search.php by ajax
		$.ajax({
			url:"http://localhost/search_engine/search.php",
			method:"post",
			data:{ search_query:search_query},
			success: function(response){ //if everything goes well data will get here
				$("#demo").empty();
				var links_divs = $(response).find(".kCrYT");
				var a_tags = $(links_divs).find("a");
				//console.log(links);
				var arr = [];
				$(a_tags).each(function(){
					var url = $(this).attr("href");
					arr.push(url.substr(7));
				});
				//console.log(arr);
				//$("#text").text(response);
				$(response).appendTo("#demo"); //append that data to the front
				$(".spinner-border").remove(); //remove spinner
			}
		});
	});
</script>
