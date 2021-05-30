<!DOCTYPE html>

<html>
<title>www.HungerS7.com</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src='https://kit.fontawesome.com/a076d05399.js'></script>
<!--Get your own code at fontawesome.com-->
<script src="js.js"></script>
<body>
<div class="container-fluid">
    <form action="" method="POST">
        @csrf
        <div class="form-group">
            <label class="fname">Inter name offer </label>
            <br>
            <input type="text" class="form-control" name="nameOffer"  style="width: 50%"   required>
            <br>
        </div>
        <div class="form-group">
            <label class="fname">Inter description offer</label>
            <br>
            <textarea type="text" class="form-control" name="describeOffer"  style="width: 50%"   required></textarea>
            <br>
        </div>
        <div class="form-group">
            <label class="fname">Inter old price </label>
            <br>
            <input type="number" class="form-control" name="oldPrice"  style="width: 50%"   required>
            <br>
        </div>
        <div class="form-group">
            <label class="fname">Inter new price </label>
            <br>
            <input type="number" class="form-control" name="newPrice"  style="width: 50%"   required>
        </div>
        <button type="submit" class="btn btn-warning">Submit</button>
    </form>
</div>
</body>
</html>


