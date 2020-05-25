<!DOCTYPE html>
<html>
<body>

<div id="slide">
    <img id="img1" title="img1" src="image1.jpg" />
    <img id="img2" title="img2" src="image2.jpg" style="display:none"/>
    <img id="img3" title="img3" src="image3.jpg" style="display:none"/>
    <img id="img4" title="img4" src="image4.jpg" style="display:none"/>
</div>
<button id="previous">Previous</button>
<button id="next">Next</button>

<script>
    var nextButton = document.getElementById("next");
    nextButton.addEventListener('click', nextImage);

    var prevButton = document.getElementById("previous");
    prevButton.addEventListener('click', prevImage);

    var i = 1;
    function nextImage(){
        document.getElementById("img"+i).style.display = 'none';
        if(i == 4) {
            i = 0;
        }
        document.getElementById("img"+(i+1)).style.display = 'block';
        i++;
    }

    function prevImage(){
        document.getElementById("img"+i).style.display = 'none';
        if(i == 1) {
            i = 5;
        }
        document.getElementById("img"+(i-1)).style.display = 'block';
        i--;
    }
</script>

</body>
</html> 