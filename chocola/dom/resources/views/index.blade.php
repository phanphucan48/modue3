<!doctype html>
<html lang="en">
<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>

    <style>
        .them{
            cursor: pointer;
        }



    </style>

</head>
<body>
<div id="myDIV" class="header">
    <h2 style="margin:5px">Cua hang banh socola</h2>
    <h5 style="margin:5px">Cac loai banh socola</h5>

</div>

<div class="input-group">
  <div class="container">
      <input type="text" id="name" name="name" placeholder="them loai banh...">
      <input type="text" id="price" name="price" placeholder="gia...">
      <div class="input-group-prepend">
          <span class="input-group-text them" onclick="newElement()">them</span>
      </div>

      <ul id="myUL">
{{--          <li>ssdads </li>--}}

      </ul>

  </div>

</div>






<script>

    var myNoteList = document.getElementsByClassName("LI");
    var i;
    for(i=0;i<myNoteList.length;i++){
          var span = document.createElement("SPAN");
        var txt = document.createTextNode("\u00D7");
        span.className = "close";
        span.appendChild(txt);
        myNoteList[i].appendChild(span);
    }


    function newElement(){
        var li = document.createElement("li");
        var objName = document.getElementById("name").value;
        var objPrice = document.getElementById("price").value;
        var objNameHtml = document.createTextNode(objName);
        var objPriceHtml = document.createTextNode(objPrice);

        li.appendChild(objNameHtml);
        li.appendChild(objPriceHtml);
        if (objName === '') {
            alert("You must write something!");
        } else {
            document.getElementById("myUL").appendChild(li);
        }
        document.getElementById("name").value = "";
        document.getElementById("price").value = "";
        var span = document.createElement("SPAN");
        var txt = document.createTextNode("\u00D7");
        span.className = "close";
        span.appendChild(txt);
        li.appendChild(span);
        closeElement();
    }

    var close = document.getElementsByClassName("close");
    closeElement();
    function closeElement(){
        var i;
        for (i = 0; i < close.length; i++) {
            close[i].onclick = function() {
                var div = this.parentElement;
                div.style.display = "none";
            }
        }
    }

</script>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>
