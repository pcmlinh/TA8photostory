<!DOCTYPE html>
<html>
<head>
    <title></title>

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" type="text/css" href="input.css">


</head>
<body>


<div class="container">
    <div class="row">
        <div class="full-width bg-transparent">
    <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-xs-12">
        


        


        <div class="full-width">
            <h1 class="text-center color">Add New Album</h1>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="custom-form">

            <form action="addAlbum.php" method="POST" id="add-product-form2" enctype="multipart/form-data"> 
                   
                <div class="text-center bg-form">

                    

                    <div class="img-section">
                        <img src="http://image.lag.vn/upload/news/17/12/12/EMO1_GHKA.png?w=200" class="imgCircle" alt="Profile picture">
                        
                    </div>

                    
                    

                </div>
            
                <div class="col-lg-12 col-md-12">
                    <input type="text" class="form-control form-input" value="" placeholder="Name" id="name" name="product_name">
                    <span class="glyphicon glyphicon-paperclip input-place"></span>
                </div>
                <div class="col-lg-12 col-md-12">
                    
                    <textarea rows="4" cols="50" class="form-control form-input" placeholder="Description" id="des" name="product_description"></textarea>
                    <span class="glyphicon glyphicon-pencil input-place"></span>
                </div>
                
                <div class="col-lg-12 col-md-12 text-center">
                    <button class="btn btn-info btn-lg custom-btn" id="submit2" type="submit" name="submit2"><span class="glyphicon glyphicon-cloud-upload"></span> Save</button>
                    

                </div>
</form>

                </div>
            </div>
        </div>

    </div>
    </div>
        
    </div>
</div>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

<script>

    

    

//    =================================== ends here ============================================ //

    
    </script>
    <script src="script.js"></script>

</body>
</html>