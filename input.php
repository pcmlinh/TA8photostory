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
            <h1 class="text-center color">Add New Photo</h1>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="custom-form">

            <form action="addProfile.php" method="POST" id="add-product-form" enctype="multipart/form-data"> 
                   
                <div class="text-center bg-form">

                    

                    <div class="img-section">
                        <img src="http://image.lag.vn/upload/news/17/12/12/EMO1_GHKA.png?w=200" class="imgCircle" alt="Profile picture">
                        <span class="fake-icon-edit" id="PicUpload" style="color: #ffffff; display: inline;"><span class="glyphicon glyphicon-camera camera"></span></span>
                    <!-- <div class="col-lg-12">
                        <h4 class="text-right col-lg-12"><span class="glyphicon glyphicon-edit"></span> Edit Profile</h4>
                        <input type="checkbox" class="form-control" id="checker">
                    </div> -->
                    </div>

                    <input type="file" id="fileToUpload" onchange="readURL(this);" accept="image/*" class="form-control form-input Profile-input-file" name="fileToUpload">

                    

                </div>
            
                <div class="col-lg-12 col-md-12">
                    <input type="text" class="form-control form-input" value="" placeholder="Title" id="title" name="product_title">
                    <span class="glyphicon glyphicon-paperclip input-place"></span>
                </div>
                <div class="col-lg-12 col-md-12">
                    <!-- <input type="text" class="form-control form-input" value="" placeholder="Description" disabled id="name"> -->
                    <textarea rows="4" cols="50" class="form-control form-input" placeholder="Description" id="des" name="product_description"></textarea>
                    <span class="glyphicon glyphicon-pencil input-place"></span>
                </div>
                <!-- <div class="col-lg-12 col-md-12">
                    <input type="date" class="form-control form-input" value="" placeholder="Timeline" disabled id="tl" name="product_timeline">
                    <span class="glyphicon glyphicon-dashboard input-place"></span>
                </div> -->
                <div class="col-lg-12 col-md-12 text-center">
                    <button class="btn btn-info btn-lg custom-btn" id="submit" type="submit" name="submit"><span class="glyphicon glyphicon-cloud-upload"></span> Save</button>
                    <!-- <input class="btn btn-info btn-lg custom-btn" id="submit" type="submit" value="Upload Image" name="submit"><span class="glyphicon glyphicon-cloud-upload"></span> -->

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

    // $('input[id=base-input]').change(function() {
    //     $('#fake-input').val($(this).val().replace("C:\\fakepath\\", ""));
    // });

    // <!--==================Javascript code for custom input type file on button ================-->

    // $('input[id=main-input]').change(function() {
    //     console.log($(this).val());
    //     var mainValue = $(this).val();
    //     if(mainValue == ""){
    //         document.getElementById("fake-btn").innerHTML = "Choose File";
    //     }else{
    //         document.getElementById("fake-btn").innerHTML = mainValue.replace("C:\\fakepath\\", "");
    //     }
    // });

    // <!--=========================input type file change on button ends here====================-->

//    ===================== snippet for profile picture change ============================ //

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('.imgCircle')
                        .attr('src', e.target.result)
                        .width(200)
                        .height(200);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

//    =================================== ends here ============================================ //

    // var checkme = document.getElementById('checker');
    // var userImage = document.getElementById('fileToUpload');
    // // var userName = document.getElementById('title');
    // // var userDes = document.getElementById('des');
    // // var UserSend = document.getElementById('submit');
    // var editPic = document.getElementById('PicUpload');
    // checkme.onchange = function() {
    //     // UserSend.disabled = !this.checked;
    //     userImage.disabled = !this.checked;
    //     // userName.disabled = !this.checked;
    //     // userDes.disabled = !this.checked;
    //     editPic.style.display = this.checked ? 'block' : 'none';
    // };
    </script>
    <script src="script.js"></script>

</body>
</html>