<!DOCTYPE html>
<html>
<body>

<form>
    Date: <input type="text" id="input-date" /><br /><br />
    Plus Date: <input type="text" id="plus-date" /> days - Result: <p id="plus-date-result"></p>
    Minus Date: <input type="text" id="minus-date" /> days - Result: <p id="minus-date-result"></p><br /><br />
</form>
<script>
    var plusDateEl = document.getElementById("plus-date");
    plusDateEl.addEventListener('keyup',plusDate);

    var minusDateEl = document.getElementById("minus-date");
    minusDateEl.addEventListener('keyup',minusDate);

    function getDateInMiliSeconds(){
        var date = document.getElementById("input-date").value;
        
        var currentDate = new Date(date);
        var currentSeconds = currentDate.getTime();

        return currentSeconds;
    }

    function plusDate(){
        var currentMiliSeconds = getDateInMiliSeconds();

        var plusDays = plusDateEl.value;
        var plusMiliSeconds = plusDays*24*3600*1000;

        var result = new Date(currentMiliSeconds+plusMiliSeconds);
        document.getElementById("plus-date-result").innerHTML = result;
    }

    function minusDate(){
        var currentMiliSeconds = getDateInMiliSeconds();

        var minuDays = minusDateEl.value;
        var minusMiliSeconds = minuDays*24*3600*1000;

        var result = new Date(currentMiliSeconds-minusMiliSeconds);
        document.getElementById("minus-date-result").innerHTML = result;
    }
</script>

</body>
</html> 