<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Vuejs + Laravel | CRUD</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="https://www.w3schools.com/lib/w3.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC">
    <!-- Styles -->
    <style>
         html, body {
                background-color: #f1f1f;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }
            body {font-family: "Lato", sans-serif}
.mySlides {display: none}
            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                
                justify-content: center;
                margin-left: 20%;
                margin-right: 20%;
            }

            .position-ref {
                position: relative;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }
            .m-b-md {
                margin-bottom: 30px;
            }
    </style>
</head>

<body>

  
        


        <div class="w3-top">
  <div class="w3-bar w3-black w3-card">
    <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="#" class="w3-bar-item w3-button w3-padding-large">HOME</a>
    <a href="#band" class="w3-bar-item w3-button w3-padding-large w3-hide-small">CAR</a>
    <a href="#tour" class="w3-bar-item w3-button w3-padding-large w3-hide-small">TOUR</a>
    <a href="#contact" class="w3-bar-item w3-button w3-padding-large w3-hide-small">CONTACT</a>
    <div class="w3-dropdown-hover w3-hide-small">
      <button class="w3-padding-large w3-button" title="More">MORE <i class="fa fa-caret-down"></i></button>     
      <div class="w3-dropdown-content w3-bar-block w3-card-4">
        <a href="#" class="w3-bar-item w3-button">Merchandise</a>
        <a href="#" class="w3-bar-item w3-button">Extras</a>
        <a href="#" class="w3-bar-item w3-button">Media</a>
      </div>
    </div>
    <a href="javascript:void(0)" class="w3-padding-large w3-hover-red w3-hide-small w3-right"><i class="fa fa-search"></i></a>
  </div>
</div>
  <div id="app">
  <div class="w3-container w3-blue-grey w3-grayscale-min w3-xlarge w3-padding-top-32">
<h1 class="w3-center w3-jumbo">Car Crud <i class="fas fa-car"></i></h1>
</div>
            <div class="position-ref container-form"  style="background-color:Gray;">
    
                <div class="content">
                    <div class="title m-b-md">
                       
                    </div>
                    <div class="flex-center position-ref full-height">
                <div class="content">
                 <br>
                    <div class="container-inner-form">
                        <div class="alert alert-danger" role="alert" v-bind:class="{hidden: hasError}">
                            All fields are required!
                        </div>
                        <div class="form-group">
                            <label for="make">Make</label>
                            <input type="text" class="form-control" id="make" required placeholder="Make" name="make" v-model="newCar.make">
                        </div>

                        <div class="form-group">
                            <label for="model">Model</label>
                            <input type="text" class="form-control" id="model" required placeholder="Model" name="model" v-model="newCar.model">
                        </div>

                        <button class="btn btn-primary" @click.prevent="createCar()">
                        Add Car
                    </button>

                        <table class="table table-striped table-hover" id="table">
                            <caption>List of Cars</caption>
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Make</th>
                                    <th scope="col">Model</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="car in cars">
                                    <th scope="row">@{{car.id}}</th>
                                    <td>@{{car.make}}</td>
                                    <td>@{{car.model}}</td>

                                    <td @click="setVal(car.id, car.make, car.model)" class="btn btn-success mr-1" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"><i class="far fa-edit"></i>
                                    </td>
                                    <td @click.prevent="deleteCar(car)" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- Modal -->
                        <div id="myModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Edit car</h4>
                                    </div>
                                    <div class="modal-body">

                                        <input type="hidden" disabled class="form-control" id="e_id" name="id" required :value="this.e_id">
                                        Make: <input type="text" class="form-control" id="e_make" name="make" required :value="this.e_make">
                                        Model: <input type="text" class="form-control" id="e_model" name="model" required :value="this.e_model">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" @click="editCar()">Save changes</button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="w3-container w3-blue-grey w3-grayscale-min w3-xlarge w3-padding-top-32">
<h1 class="w3-center w3-jumbo"><i class="fas fa-car"></i></h1>
</div>
    <script type="text/javascript" src="/js/app.js"></script>
</body>

</html>