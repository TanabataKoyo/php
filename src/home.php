<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">



<div class="wrapper">
    <nav class="navbar navbar-dark bg-dark sticky-top" style="width: 100%; top: 0px;">
        <span class="navbar-brand">Navbar</span>
        <input class="navbar-brand btn-primary btn-lg" type="button" onclick="location.href='home.php'" value="back">
    </nav>
    <div class="container" style="margin-top: 40vh;">
        <form class="form" method="POST" action="kusakabe.php">
            <button type="submit" class="btn btn-primary btn-lg btn-block">クサカベ</button>
        </form>
        <form class="form" method="POST" action="color-palette.php">
            <button type="submit" class="btn btn-success btn-lg btn-block">カラーパレット</button>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<style>
    body {
        font-family: "Open Sans", sans-serif;
        height: 100vh;
        background: url("https://i.imgur.com/HgflTDf.jpg") 50% fixed;
        background-size: cover;
    }
    .wrapper {
    display: flex;
    align-items: center;
    flex-direction: column;
    justify-content: center;
    width: 100%;
    max-height: 100%;
}
</style>