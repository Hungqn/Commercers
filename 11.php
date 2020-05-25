<!DOCTYPE html>
<html>
<body>
<script
  src="https://code.jquery.com/jquery-1.12.4.min.js"
  integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
  crossorigin="anonymous"></script>
<h4>Country Search:</h4>
<input name="search" id="search" />
<h4>Result:</h4>
<div id="result"></div>
<script>
    var $j = jQuery.noConflict();
    $j('#search').keyup(function () {
        var query = $j(this).val();

        if(query.length > 2) {
            $j.ajax({
                type: 'POST',
                url: '11_ajax.php',
                data: { query: $j(this).val() },
                dataType: 'json',
                success: function (response) {
                    console.log(response);
                    $j('#result').html('');
                    if(!response.error) {
                        var data = response.html;
                        for (var key in data) {
                            $j('#result').append(data[key]+'<br>');
                        }
                    } else {
                        $j('#result').html('No result found');
                    }

                }
            });
        }
    });
</script>

</body>
</html> 