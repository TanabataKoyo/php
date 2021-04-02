<link rel="stylesheet" href="css/styles.css">
<div class="wrapperCenter">
  <div class="container">
    <h1>Welcome</h1>
    
    <form class="form" method="POST" action="src/login.php">
      <button type="submit" id="login-button">Login</button>
    </form>
  </div>
  
  <ul class="bg-bubbles">
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
    <li></li>
  </ul>
</div>

<script>
    $("#login-button").click(function(event){
    event.preventDefault();
    $('form').fadeOut(500);
    $('.wrapper').addClass('form-success');
});
</script>