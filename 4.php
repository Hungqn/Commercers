<!DOCTYPE html>
<html>
<body>

<p id="timer"></p>

<script>
    setInterval(timer, 1000);

    function timer(){
        var date = new Date();
        document.getElementById("timer").innerHTML = date.getHours()+':'+date.getMinutes()+':'+date.getSeconds();
    }
</script>

</body>
</html> 