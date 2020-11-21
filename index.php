
<!DOCTYPE html>
<html>
<head>
	<title>
		CEDCAB
	</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="style.css?t=1" type="text/css" rel="stylesheet">
    <script>
        function myfun(){
            var cab=document.getElementById('cab-type').value;
            if(cab==='CedMicro'){
                let eleman = document.getElementById('luggage');
                eleman.setAttribute("disabled", true);
            }else{
                let ele = document.getElementById('luggage');
                ele.removeAttribute("disabled");
            }
        }

    </script>
     <script>
        $(document).ready(function() {
            $('#submit').click(function(ev) {
                var emp="--select--";
                var pick=document.getElementById('pickup').value;
                var drop=document.getElementById('drop').value;
                var luggage=document.getElementById('luggage').value;
                var cab=document.getElementById('cab-type').value;
                if(pick==emp){
                    alert("Please select Pickup point");
                    return;
                }
                if(drop==emp){
                    alert("Please select Drop point");
                    return;
                }
                if(cab==emp){
                    alert("Please select Cab type");
                    return;
                }
                if(pick==drop){
                    alert("choose different drop point");
                    return;
                }
                if (isNaN(luggage)) {
                text = "luggage Input not valid";
                alert(text);
                return;
                }
                ev.preventDefault();
                $.ajax({
                    url: "ajax.php",
                    type: "post",
                    data:{p:pick, d:drop, l:luggage, c:cab},
                    success: function(result) {
                        console.log(result);
                        $('#result').html(result);
                    }
                
                
                });
            });
        });
    </script>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-dark">
          <a id="logo" class="navbar-brand pl-4 pr-4 pt-1 pb-1" href="#"><span class="diff1">CED</span><span class="diff">CAB</span></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon bg-light"></span>
          </button>
  
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link text-light" href="#">Home <span class="sr-only">(current)</span></a>
              </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="#">About</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Login
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>

            </ul>
                <form class="form-inline my-2 my-lg-0">
                  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                  <button id="nav-btn" class="btn  my-2 my-sm-0" type="submit">Search</button>
                </form>
          </div>
      </nav>
    </header>
    <div id="wrapper" class="container-fluid pb-1">
        <div id="heading" class=" text-center">
            <h1 class="text-light display-4 pt-1">Book a City Taxi to your destination in town</h1>
            <h5 class="text-light display-6 text-center">Choose from a range of category and prices</h5>
        </div>
        <div id="form" class="bg-light col-md-3 col-sm-4 pb-3">
            <h5 class="display-5  text-center pb-3 border-bottom pt-3"><span class=" pl-4 pt-1 pb-1 pr-4 ">City Taxi</span>
            <h5 class="text-dark display-5 text-center">Your everyday travel partner<small class="text-muted">AC cabs for point to point travel</small></h5>

            <form class="form-group">
                <div>Pickup Point</div>
                <select class="form-control bg-muted" id="pickup">
                <option>--select--</option>
                <option>Charbagh</option>
                <option>Indra Nagar</option>
                <option>BBD</option>
                <option>Barabanki</option>
                <option>Basti</option>
                <option>Faizabad</option>
                <option>Gorakhpur</option>
                </select>
                <div>Drop Point</div>
                <select class="form-control " id="drop">
                <option>--select--</option>
                <option>Gorakhpur</option>
                <option>Indra Nagar</option>
                <option>BBD</option>
                <option>Barabanki</option>
                <option>Basti</option>
                <option>Faizabad</option>
                <option>Charbagh</option>
                </select>
                <div>Cab Type</div>
                <select class="form-control " onchange="myfun()" id="cab-type">
                <option>--select--</option>
                <option>CedMicro</option>
                <option>CedMini</option>
                <option>CedRoyal</option>
                <option>CedSUV</option>
                </select>
                <div>Luggage</div>
                <input type="text" class="form-control " placeholder="Enter weight in kg" id="luggage">
                <button class="form-control mt-2 text-dark " id="submit" >Calculate Fare</button>
            </form>
            <div id="result"></div>
        </div>
    </div>
        <section id="footer" class="row pt-2  bg-dark">
            <div id="social-media-icon" class="footer-content  col-sm-4 ml-5">
                <a href="#" class="fa fa-facebook rounded-circle bg-light text-dark p-2 ml-4"></a>
                <a href="#" class="fa fa-twitter rounded-circle bg-light text-dark p-2 ml-4"></a>
                <a href="#" class="fa fa-google rounded-circle bg-light text-dark p-2 ml-4"></a>
            </div>
            <div class="footer-content col-sm-3 ml-3">
                <div class="footer-logo ml-5">
                <a id="logo" class="navbar-brand pl-4 pr-4 pt-1 pb-1" href="#"><span class="diff1">CED</span><span class="diff">CAB</span></a>
                </div>
            </div>
            <div id="footer-navigation" class="footer-copyright col-sm-3 ml-5 ">
                <div class="footer-copyright text-center text-light py-1">© 2020 Copyright:
                    <a href="https://mdbootstrap.com/education/bootstrap/" class="text-light"> cedcab.com</a>
                </div>
            </div>

        </section>
</body>
</html>
