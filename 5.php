<!DOCTYPE html>
<html>
<body>

<p id="count-down"></p>

<script>
    var from = new Date();
    var to = new();
    var time = date.getTime();
    var countDown = time + 10*24*60*60*1000;

    setInterval(countDown, 1000);

    function countDown(){
        var date = new Date();
        var time = date.getTime();
        var Cound
        document.getElementById("count-down").innerHTML = date.getHours()+':'+date.getMinutes()+':'+(date.getSeconds()-1000);
    }
</script>

</body>
</html> 