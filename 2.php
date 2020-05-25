<!DOCTYPE html>
<html>
<body>

<textarea id="textarea" maxlength="10" onkeyup="wordCount(this)"></textarea>
<p id="word-count"></p>
<script>
    function wordCount(element){
        var text = element.value;
        var wordCount = document.getElementById("word-count");
        wordCount.innerHTML = text.length;

        if(text.length >= 10) {
            alert('Maximum characters allow is 10');
        }
    }
</script>

</body>
</html> 