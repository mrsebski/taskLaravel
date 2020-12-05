<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-132227211-1"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-132227211-1');
        </script>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Title -->
        <title>BOX CHECKER</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <!-- Icon -->
        <!-- <link rel="icon" href="{{ asset('../images/favicon.png') }}" type="image/png" /> -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <!-- leaflet -->
        <link rel='stylesheet' href='https://unpkg.com/leaflet@1.2.0/dist/leaflet.css'>

        <link href="https://fonts.googleapis.com/css?family=Bungee&display=swap" rel="stylesheet">
        <script src="https://unpkg.com/vue"></script>

        <!-- Styes for Section -->
        <link rel="stylesheet" type="text/css" href="{{asset('section/style.css')}}">
    </head>
    <body>
        <div id="sebski">
            <header class="header_area">

                <div class="main_menu">
                    <nav class="navbar navbar-expand-lg w-100">
                        <div class="container">
                            <div class="logo">
                                <a class="navbar-brand" href="/">

                                    <div class="slash"> BHAM  </div>
                                    <div class="extension"> STORE </div>
                                </a>
                            </div>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            </button>
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                                <div class="row w-100">
                                    <div class="col-lg-12 pr-lg-0">
                                        <ul class="nav navbar-nav ml-auto justify-content-end">
                                            @foreach ($boxes as $box)
                                            <li class="nav-item submenu dropdown">
                                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                                                aria-expanded="false">{{ $box->size }}</a>
                                                <ul class="dropdown-menu">

                                                    <li class="nav-item">
                                                        <form method="post" action="{{ route('box.destroy', $box) }}">

                                                            {{ csrf_field() }}
                                                            {{ method_field('DELETE') }}

                                                            <input type="submit" class="nav-link" target="_blank" value="Delete" >
                                                        </form>


                                                    </li>
                                                </ul>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            </header>










            <section
                class="slider_section"
                style="background-color: gray">


                <div class="container">
                    <div class="row d-flex justify-content-center" style="padding: 10rem 1.5rem;
                        text-align: center;">
                        <!--Grid column-->
                        <div class="col-md-6" style="backdrop-filter: blur(26px); padding: 3rem">
                            <h1 class="col-12 text-center"
                            style="color: white; font-size: 3rem;"
                            v-text=" text_1"></h1>

                            <a ></a>
                            <form method="POST"  enctype="multipart/form-data"
                                action="{{ route('box.check') }}" >
                                @csrf



                                <div class="form-group">
                                    <input
                                    type="text"
                                    class="form-control @error('order') is-invalid @enderror"
                                    @keypress="isNumber($event)"
                                    name="order"

                                    placeholder="How many widgets?"
                                    required>
                                    @error('order')
                                    <p class="alerta lert-danger">something wrong heret</p>
                                    @enderror
                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif



                                </div>


                                <button type="submit"
                                class="main_btn_fb mt-md-0 mt-4"
                                @click="showForm = false"

                                target="_blank">
                                Check
                                </button>

                            </form>
                        </div>
                        <!--Grid column-->
                    </div>

                    <div class="row">












                    </div>
                </div>



            </section>






             <section
                class="slider_section"
                style="background-color: lightslategray">


                <div class="container">
                    <div class="row d-flex justify-content-center" style="padding: 10rem 1.5rem;
                        text-align: center;">
                        <!--Grid column-->
                        <div class="col-md-6" style="backdrop-filter: blur(26px); padding: 3rem">
                            <h1 class="col-12 text-center"
                            style="color: white; font-size: 3rem;"
                            v-text="text_2"></h1>

                            <a ></a>
                            <form method="POST"  enctype="multipart/form-data"
                                action="{{ route('box.store') }}" >
                                @csrf



                                <div class="form-group">

                                    <input
                                    type="text"
                                    class="form-control @error('size') is-invalid @enderror"
                                    @keypress="isNumber($event)"
                                    name="size"

                                    placeholder="Box size"
                                    required>
                                    @error('size')
                                    <p class="alerta lert-danger">something wrong heret</p>
                                    @enderror
                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif



                                </div>


                                <button type="submit"
                                class="main_btn_fb mt-md-0 mt-4"
                                @click="showForm = false"

                                target="_blank">
                                Add
                                </button>

                            </form>
                        </div>
                        <!--Grid column-->
                    </div>

                    <div class="row">












                    </div>
                </div>



            </section>




        </div>
        <!--================ End footer Area =================-->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src='https://unpkg.com/leaflet@1.2.0/dist/leaflet.js'></script>
        <!-- lightGallery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.12/js/lightgallery-all.js"></script>

        <script>
        $(document).ready(function(){
        $('#lightgallery').lightGallery();
        });
        </script>
        <script src="{{ asset('js/navbar_fixed.js') }}"></script>
        <script>
        // start add
        new Vue({
        el: "#sebski",
        data: {
        maxButton: 8,
        maxText: 100,
        maxLongText:500,
        showForm: true,
        text_1: 'CHECK HOW MANY BOXES YOU NEED',
        text_2: 'HERE YOU CAN ADD BOX',

        },
        methods: {
        parsedBody(e){
        return e.replace(/\n/g,"<br>")
        },
        onFileChange(e) {
        const file = e.target.files[0];
        this.img_1 = URL.createObjectURL(file);
        },
        isNumber: function(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if ((charCode > 31 && (charCode < 48 || charCode > 57)) && charCode !== 46) {
        evt.preventDefault();
        }else{
        return true;
        }
        },

        },
        });
        </script>
        <script type="text/javascript">

        $(".close").click(function(){
        $(".sebski").hide();
        });
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>
</body>
</html>
