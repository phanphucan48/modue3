<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
       $(document).ready(function (){

           $("#hide").click(function (){
               $(".span").hide();
           });
           $("#show").click(function (){
               $(".span").show();
           })

       });


    </script>
</head>
<body>
<p class="span">If you click on the "Hide" button, I will disappear.</p>
<button id="hide">Hide</button>
<button id="show">Show</button>
</body>
</html>
