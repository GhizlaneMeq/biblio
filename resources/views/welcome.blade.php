<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <meta name="description"
        content="Explore our vast collection of books and immerse yourself in a world of knowledge and imagination. Discover new stories and authors.">
    <title>Library </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        .navbar {
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand img {
            max-height: 40px;
        }


        .header18 {
            position: relative;
            color: #fff;
            text-align: center;
            padding: 100px 0;
            background: url('https://www.youtube.com/embed/vvKUuFk_uWI?autoplay=1&loop=1&playlist=vvKUuFk_uWI&t=20&mute=1&playsinline=1&controls=0&showinfo=0&autohide=1&allowfullscreen=true&mode=transparent') center/cover no-repeat;
        }

        .header18 h1 {
            font-size: 3rem;
        }


        .article15 {
            padding: 80px 0;
        }


        .features023 {
            background-color: #f8f9fa;
            padding: 80px 0;
        }

        .features023 .card-box {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .list05 {
            padding: 80px 0;
        }

        .list05 h3 {
            font-size: 2.5rem;
            margin-bottom: 50px;
        }

        .list05 .item-wrapper {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            padding: 20px;
        }


        .features035 {
            background-color: #007bff;
            color: #fff;
            padding: 80px 0;
        }

        .features035 .card-text {
            font-size: 1.5rem;
        }


        .form5 {
            padding: 80px 0;
        }

        .form5 input,
        .form5 textarea {
            margin-bottom: 20px;
        }

        .contacts01 {
            padding: 80px 0;
        }

        .contacts01 h3 {
            font-size: 2.5rem;
            margin-bottom: 50px;
        }
    </style>
</head>

<body>

    <section class="menu menu2 cid-u2Tp7mM94N" once="menu" id="menu-5-u2Tp7mM94N">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="https://mobiri.se">
                    <img src="assets/images/photo-1526285759904-71d1170ed2ac.jpeg" height="40" alt="Libra Logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Catalog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                    </ul>
                    <div class="navbar-nav ms-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="btn btn-outline-dark" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                        @else
                        <li class="nav-item">
                            <a href="borrowed-books">borrowed books</a>
                        </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->firstname . ' ' . Auth::user()->lastname }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </div>
                </div>
            </div>
        </nav>
    </section>

    <section class="header18">
        <div class="container-fluid">
            <div class="jumbotron text-center">
                <h1 class="display-4">Welcome to Our Library</h1>
                <p class="lead">Explore our vast collection of books and immerse yourself in a world of knowledge and
                    imagination. Discover new stories and authors.</p>
                <a class="btn btn-primary btn-lg" href="#features-1" role="button">Explore Books</a>
            </div>
        </div>
    </section>

    <div class="container mx-auto p-8">
        <h1 class="text-2xl font-semibold mb-4">Book Collection</h1>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">
            @foreach ($books as $book)
                <div class="col">
                    <div class="card h-100">
                        @if ($book->image)
                            <img src="{{-- {{ asset('storage/' . $book->image) }} --}}https://images.pexels.com/photos/46274/pexels-photo-46274.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Book Cover" class="card-img-top">
                        @else
                            <div class="bg-gray-300 h-40"></div>
                        @endif

                        <div class="card-body">
                            <h2 class="card-title">{{ $book->title }}</h2>
                            <p class="card-text text-muted">{{ $book->author }}</p>
                            <a href="{{ route('books.show', $book->id) }}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


    <section class="article15 cid-u2Tp7mNams mbr-fullscreen" id="about-me-15-u2Tp7mNams">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-subtitle mbr-fonts-style mt-0 mb-4 display-5">
                                <strong>Welcome to Our Library - Where Books Come to Life!</strong>
                            </h6>
                            <p class="card-text mbr-fonts-style display-7">
                                At our library, we believe in the power of books to inspire, educate, and entertain. Our
                                mission is to connect readers with their next great read and foster a love for
                                literature.
                            </p>
                            <p class="card-text mbr-fonts-style display-7">
                                With a diverse range of genres and authors, we aim to cater to every reader's unique
                                taste. Whether you're a bookworm, a casual reader, or a student, our library has
                                something special for you.
                            </p>
                            <p class="card-text mbr-fonts-style display-7">
                                Join us in celebrating the joy of reading and embark on a journey through the pages of
                                our carefully curated collection.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="features023 cid-u2Tp7mNlw1" id="metrics-1-u2Tp7mNlw1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 content-head">
                    <div class="card-deck mb-5">
                        <!-- Feature Card 1 -->
                        <div class="card">
                            <div class="card-body text-center">
                                <h4 class="card-title mbr-fonts-style display-5">
                                    <strong>1000+</strong>
                                </h4>
                                <p class="card-text mbr-fonts-style display-7">
                                    Books Available
                                </p>
                            </div>
                        </div>

                        <!-- Feature Card 2 -->
                        <div class="card">
                            <div class="card-body text-center">
                                <h4 class="card-title mbr-fonts-style display-5">
                                    <strong>99%</strong>
                                </h4>
                                <p class="card-text mbr-fonts-style display-7">
                                    User Satisfaction
                                </p>
                            </div>
                        </div>

                        <!-- Feature Card 3 -->
                        <div class="card">
                            <div class="card-body text-center">
                                <h4 class="card-title mbr-fonts-style display-5">
                                    <strong>24/7</strong>
                                </h4>
                                <p class="card-text mbr-fonts-style display-7">
                                    Access Anytime
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    
    <section class="list05 cid-u2Tp7mOOKf" id="faq-3-u2Tp7mOOKf">
        <div class="container">
            <div class="col-12 mb-5 content-head">
                <h3 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2">
                    <strong>FAQ</strong>
                </h3>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 col-lg-8">
                    <div id="accordion" class="accordion">
                        <!-- FAQ Item 1 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    How do I borrow a book?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show"
                                aria-labelledby="headingOne" data-bs-parent="#accordion">
                                <div class="accordion-body">
                                    Simply click on the book you want to borrow, and follow the prompts to complete the
                                    borrowing process. It's quick and easy!
                                </div>
                            </div>
                        </div>

                        <!-- FAQ Item 2 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Are there late fees for overdue books?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordion">
                                <div class="accordion-body">
                                    No, we believe in stress-free reading. There are no late fees, so you can enjoy your
                                    books without any worries.
                                </div>
                            </div>
                        </div>

                        <!-- FAQ Item 3 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false"
                                    aria-controls="collapseThree">
                                    Can I request a specific book to be added?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse"
                                aria-labelledby="headingThree" data-bs-parent="#accordion">
                                <div class="accordion-body">
                                    Absolutely! We welcome your suggestions and will do our best to add requested books
                                    to our collection.
                                </div>
                            </div>
                        </div>

                        <!-- FAQ Item 4 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour" aria-expanded="false"
                                    aria-controls="collapseFour">
                                    Is there a limit to the number of books I can borrow?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                data-bs-parent="#accordion">
                                <div class="accordion-body">
                                    As a member, you can borrow multiple books at a time, so you can indulge in as many
                                    stories as you like!
                                </div>
                            </div>
                        </div>

                        <!-- FAQ Item 5 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFive" aria-expanded="false"
                                    aria-controls="collapseFive">
                                    How can I cancel my membership?
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                                data-bs-parent="#accordion">
                                <div class="accordion-body">
                                    We'd hate to see you go, but if you need to cancel, simply contact our support team,
                                    and they'll assist you with the process.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="features035 cid-u2Tp7mTFFG" id="contact-us-4-u2Tp7mTFFG">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-9 active">
                    <div class="item-wrapper">
                        <div class="card-box">
                            <h4 class="card-text mbr-fonts-style display-7">
                                Unlock the World of Books with Libra - Join Now and Dive into a Literary Adventure!
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-3 active">
                    <div class="mbr-section-btn">
                        <a class="btn btn-primary display-7" href="#">
                            Join Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="form5 cid-u2Tp7mc32Z" id="contact-us-2-u2Tp7mc32Z">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 content-head">
                    <div class="mbr-section-head mb-5">
                        <h3 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2">
                            <strong>Get in Touch with Us</strong>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8 mx-auto mbr-form" data-form-type="formoid">
                    <form action="https://mobirise.eu/" method="POST" class="mbr-form form-with-styler"
                        data-form-title="Form Name">
                        <input type="hidden" name="email" data-form-email="true" value="">
                        <div class="row">
                            <div hidden="hidden" data-form-alert="" class="alert alert-success col-12">Thanks for
                                filling out the form!
                            </div>
                            <div hidden="hidden" data-form-alert-danger="" class="alert alert-danger col-12">
                                Oops...! some problem!
                            </div>
                        </div>
                        <div class="dragArea row">
                            <div class="col-md col-sm-12 form-group mb-3" data-for="name">
                                <input type="text" name="name" placeholder="Name" data-form-field="name"
                                    class="form-control" value="" id="name-form02-0">
                            </div>
                            <div class="col-md col-sm-12 form-group mb-3" data-for="email">
                                <input type="email" name="email" placeholder="Email" data-form-field="email"
                                    class="form-control" value="" id="email-form02-0">
                            </div>
                            <div class="col-12 form-group mb-3" data-for="textarea">
                                <textarea name="textarea" placeholder="Message" data-form-field="textarea" class="form-control"
                                    id="textarea-form02-0"></textarea>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 align-center mbr-section-btn"><button
                                    type="submit" class="btn btn-primary display-7">Send</button></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>



    <section class="contacts01 cid-u2Tp7md8do" id="footer1-6-u2Tp7md8do">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 content-head">
                    <div class="mbr-section-head mb-5">
                        <h3 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2">
                            <strong>Contact Us</strong>
                        </h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="item features-without-image col-12 col-md-6 active">
                    <div class="item-wrapper">
                        <div class="text-wrapper">
                            <h6 class="card-title mbr-fonts-style mb-3 display-5">
                                <strong>Phone</strong>
                            </h6>
                            <p class="mbr-text mbr-fonts-style display-7">
                                <a href="tel:+1 123-456-7890" class="text-black">+1 123-456-7890</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="item features-without-image col-12 col-md-6">
                    <div class="item-wrapper">
                        <div class="text-wrapper">
                            <h6 class="card-title mbr-fonts-style mb-3 display-5">
                                <strong>Email</strong>
                            </h6>
                            <p class="mbr-text mbr-fonts-style display-7">
                                <a href="mailto:info@libra.com" class="text-black">info@libra.com</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="item features-without-image col-12 col-md-6">
                    <div class="item-wrapper">
                        <div class="text-wrapper">
                            <h6 class="card-title mbr-fonts-style mb-3 display-5">
                                <strong>Address</strong>
                            </h6>
                            <p class="mbr-text mbr-fonts-style display-7">
                                Casablanca Morocco
                            </p>
                        </div>
                    </div>
                </div>
                <div class="item features-without-image col-12 col-md-6">
                    <div class="item-wrapper">
                        <div class="text-wrapper">
                            <h6 class="card-title mbr-fonts-style mb-3 display-5">
                                <strong>Working Hours</strong>
                            </h6>
                            <p class="mbr-text mbr-fonts-style display-7">
                                Mon - Fri: 9am - 6pm
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

</body>

</html>
