<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Dynamic Dependent Select Box</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div id="main">
		<div id="header">
			<h1>Dynamic Dependent Select Box in<br> PHP & jQuery Ajax</h1>
		</div>
		<div id="content">
			<form method="">
        <label>Country : </label>
        <select id="country">
        	<option value="">Select Country</option>
        </select>
				<br><br>
        <label>State : </label>
        <select id="state">
        	<option value=""></option>
        </select>
        <br><br>
        <label>City : </label>
        <select id="city">
        	<option value=""></option>
        </select>
      </form>
		</div>
	</div>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            function loadData(type,country_id){
               // var type= "";
                $.ajax({
                    url:"load-cont-state.php",
                    type:"POST",
                    data:{type:type,id:country_id},
                    success:function(data){
                        //alert(data);
                        if(type == "stateData"){
                            $("#state").html(data);
                        }else{
                            $("#country").append(data);
                        }
                    }
                });
            }
            loadData();
            $("#country").on("change",function(){
                var country = $("#country").val();
                //var state = $("#state").val();
                if(country != ""){
                    loadData("stateData", country);
                }else{
                    $("#state").html("");
                }    
            })
    
            $("#state").on("change",function(){
                var state = $("#state").val();
                alert(state);
                if(state != ""){
                     function loadData1(){
                     var type ="cityData"
                     var state = $("#state").val();
                     $.ajax({
                         url:"load-cont-state.php",
                         type:"POST",
                         data:{type:type,state_id:state},
                         success:function(data){
                             alert(data);
                             if(type == "cityData"){
                                 $("#city").html(data);
                             }else{
                                 $("#state").append(data);
                             }
                         }
                     });
                 }
                 loadData1();
                    alert(state);
                    loadData1("cityData", state);
                }else{
                    $("#city").html("");
                }    
            })
        });
        
    </script>
</body>
</html>