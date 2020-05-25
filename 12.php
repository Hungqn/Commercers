<!DOCTYPE html>
<html>
<body>
<script
  src="https://code.jquery.com/jquery-1.12.4.min.js"
  integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
  crossorigin="anonymous"></script>

<form id="customer-register">
    Name: <input type="text" name="name" /><br /><br />
    Email: <input type="text" name="email" /><br /><br />
    Password: <input type="password" name="password" /><br /><br />
    <button id="create" type="submit">Create</button>
</form>
<p class="message"></p>
<script>
    var $j = jQuery.noConflict();
    $j('#customer-register').submit(function (e) {
        e.preventDefault();
        
        $j.ajax({
            type: 'POST',
            url: '12_ajax.php',
            data: $j(this).serialize(),
            dataType: 'json',
            success: function (response) {
                $j('.message').html('');
                if(!response.error) {
                    $j('.message').html(response.message);
                } else {
                    $j('.message').html(response.message);
                }

            }
        });
    });
</script>

</body>
</html> 