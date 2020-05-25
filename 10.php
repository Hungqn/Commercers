<!DOCTYPE html>
<html>
<body>
<style>
    .no-display {
        display: none;
    }
</style>
<script
  src="https://code.jquery.com/jquery-1.12.4.min.js"
  integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="
  crossorigin="anonymous"></script>
<ul id="menu">
	<li class="menu-item">Home</li>
	<li class="menu-item has-sub">
		<a href="#">About</a>
		<ul class="sub-menu no-display">
			<li class="menu-item">From 2010</li>
			<li class="menu-item">Vision</li>
		</ul>
	</li>
	<li class="menu-item has-sub">
		<a href="#">Product</a>
		<ul class="sub-menu no-display">
			<li class="menu-item">Clothes</li>
			<li class="menu-item">Shirts</li>
			<li class="menu-item">Phones</li>
		</ul>
	</li>
	<li class="menu-item has-sub">
		<a href="#">Blog</a>
		<ul class="sub-menu no-display">
			<li class="menu-item">New Arrival</li>
			<li class="menu-item">Look books</li>
		</ul>	
	</li>
	<li class="menu-item">FAQ</li>
	<li class="menu-item">Contact</li>
</ul>
<script>
    var $j = jQuery.noConflict();
    $j('.has-sub > a').click(function(){
        $j(this).parent().find('.sub-menu').toggleClass('no-display');
        $j(this).parent().siblings().find('.sub-menu').addClass('no-display');
    });
</script>

</body>
</html> 