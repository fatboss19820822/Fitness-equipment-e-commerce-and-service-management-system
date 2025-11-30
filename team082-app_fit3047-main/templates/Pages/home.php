<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Grayscale - Start Bootstrap Theme</title>
    <link rel="icon" type="image/x-icon" href="webroot/img/favicon.ico"/>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"/>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <style>
        /* General body and background */
        body {

            font-family: 'Nunito', sans-serif;
            background: #121212; /* dark background */
            color: #f0f0f0;
            margin: 0;
            padding: 0;
        }


        /* Masthead */
        header.masthead {
            background-image: url('img/gym_background.png');

            height: 100vh;
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }


        /* Image in masthead */
        header.masthead img.img-fluid {
            max-width: 300px;
            border-radius: 15px;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.7);
        }

        /* Text in masthead */
        header.masthead h1.display-4 {
            font-weight: 900;
            letter-spacing: 0.1em;
            margin-bottom: 0.5rem;
            text-shadow: 1px 1px 6px rgba(0,0,0,0.7);
        }

        header.masthead h2 {
            font-weight: 300;
            max-width: 420px;
            text-shadow: 1px 1px 4px rgba(0,0,0,0.5);
        }

        header.masthead a.btn-primary {
            background-color: #40e0d0;
            border: none;
            padding: 12px 32px;
            font-weight: 700;
            font-size: 1.1rem;
            transition: background-color 0.3s ease;
        }

        header.masthead a.btn-primary:hover {
            background-color: white;
            color: black;
        }

        /* About Section */
        .about-section {
            padding: 4rem 2rem;
            background: #f9f9f9;

        }

        .about-section h2 {
            font-weight: 700;
            margin-bottom: 1.5rem;
        }

        .about-section p {
            font-size: 1.1rem;
            line-height: 1.6;
            max-width: 650px;
            margin: 0 auto;
            color: #ccc;
        }

        /* Section images */
        .about-section img.img-fluid {
            border-radius: 12px;}

        .about-section .bg-black {
            background-color: #222 !important;
            border-radius: 10px;
            padding: 2rem 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 0 15px rgba(0,0,0,0.3);
        }

        /* Projects Section */
        .projects-section {
            padding: 5rem 2rem;
            background: #f9f9f9;
        }

        .projects-section .text-black-50 {
            color: #555 !important;
        }

        .projects-section .bg-black {
            background-color: #222 !important;
            border-radius: 10px;
            padding: 2rem 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 0 15px rgba(0,0,0,0.3);
        }

        .projects-section .project-text p {
            color: #bbb;
        }

        /* Images in projects */
        .projects-section img.img-fluid {
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        /* Testimonials Section */
        .testimonials-section {
            padding: 4rem 2rem;
        }

        .testimonials-section h2 {
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .testimonials-section p {
            font-size: 1rem;
            color: #666;
        }

        .testimonial-item {
            background: #eee;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            color: #333;
        }

        .testimonial-text {
            font-style: italic;
            margin-bottom: 1rem;
        }

        .testimonial-author {
            font-weight: 700;
            text-align: right;
        }

        .testimonials-section .bg-black {
            background-color: #222 !important;
            border-radius: 10px;
            padding: 2rem 1.5rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 0 15px rgba(0,0,0,0.3);
        }

        /* Carousel controls */
        .carousel-control-prev-icon,
        .carousel-control-next-icon {
            filter: invert(1);
        }

        /* Responsive tweaks */
        @media (max-width: 768px) {
            header.masthead .container {
                flex-direction: column;
            }

            header.masthead img.img-fluid {
                max-width: 80%;
            }
        }
    </style>
</head>


<header class="masthead">
        <div class="d-flex justify-content-center">

            <div class="text-center">
                <h1 class="display-4 text-uppercase text-white"><?= $this->ContentBlock->text('website-title'); ?></h1>
                <h2 class="text-white-50 mx-auto mt-2 mb-5">
                    Your One-Stop Shop for Gym Equipment, Installation & Repairs
                </h2>

                <a class="btn btn-primary" href="#buy-equipment">VIEW PRODUCTS/SERVICES</a>

            </div>
        </div>
</header>

<section class="about-section text-center" id="about">
    <div class="container px-4 px-lg-5 bg-black">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-8" style="color: white">
                <h2 class="text-white mb-4">About</h2>
                <p style="white;"><?= $this->ContentBlock->html('about-content'); ?></p>
            </div>
        </div>
        <img class="img-fluid" src="webroot/img/ipad.png" alt="..."/>
    </div>
</section>


<section class="projects-section bg-light" id="projects">
    <div class="container px-4 px-lg-5">
        <!-- Featured Project Row-->
        <div class="row gx-0 mb-4 mb-lg-5 align-items-center">
            <div class="col-xl-8 col-lg-7"><img class="img-fluid mb-3 mb-lg-0" src="webroot/img/bg-masthead.jpg"
                                                alt="..."/></div>
            <div class="col-xl-4 col-lg-5">
                <div id="buy-equipment" class="featured-text text-center text-lg-left">
                    <h4><?= $this->Html->link('Buy Equipment', ['controller' => 'Products', 'action' => 'public_index']) ?></h4>
                    <p class="text-black-50 mb-0">Browse through our latest equipments</p>
                </div>
            </div>
        </div>
        <!-- Products One Row-->
        <div class="row gx-0 mb-5 mb-lg-0 justify-content-center">
            <div class="col-lg-6"><img class="img-fluid" src="webroot/img/demo-image-01.jpg" alt="..."/></div>
            <div class="col-lg-6">
                <div class="bg-black text-center h-100 project">
                    <div class="d-flex h-100">
                        <div class="project-text w-100 my-auto text-center text-lg-left">
                            <h4><?= $this->Html->link('Repair Equipment', ['controller' => 'RepairRequests', 'action' => 'add']) ?></h4>
                            <p class="mb-0 text-white-50">Need help fixings?</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Products Two Row-->
        <div class="row gx-0 justify-content-center">
            <div class="col-lg-6"><img class="img-fluid" src="webroot/img/demo-image-02.jpg" alt="..."/></div>
            <div class="col-lg-6 order-lg-first">
                <div class="bg-black text-center h-100 project">
                    <div class="d-flex h-100">
                        <div class="project-text w-100 my-auto text-center text-lg-right">
                            <h4><?= $this->Html->link('Install Equipment', ['controller' => 'InstallEquipmentRequests', 'action' => 'add']) ?></h4>
                            <p class="mb-0 text-white-50">Need help installing?</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="testimonials-section bg-light" id="testimonials">
    <div class="container px-4 px-lg-5 bg-black">
        <div class="row gx-0 mb-4 mb-lg-5 align-items-center">
            <div class="col-lg-12 text-center">
                <h2 class="text-white mb-4">Customer Testimonials</h2>
                <p class="text-grey-50 mb-4">Here's what some of our satisfied customers have to say:</p>
                <div class="carousel slide" id="testimonialCarousel" data-ride="carousel">
                    <div class="carousel-inner">
                        <!-- Testimonial 1 -->
                        <div class="carousel-item active">
                            <div class="testimonial-item">
                                <p class="testimonial-text"><?= $this->ContentBlock->html('testimonials-1'); ?></p>
                                <p class="testimonial-author">- Jessica, Gym Owner</p>
                            </div>
                        </div>
                        <!-- Testimonial 2 -->
                        <div class="carousel-item">
                            <div class="testimonial-item">
                                <p class="testimonial-text"><?= $this->ContentBlock->html('testimonials-2'); ?></p>
                                <p class="testimonial-author">- Michael, Fitness Trainer</p>
                            </div>
                        </div>
                        <!-- Testimonial 3 -->
                        <div class="carousel-item">
                            <div class="testimonial-item">
                                <p class="testimonial-text"><?= $this->ContentBlock->html('testimonials-3'); ?></p>
                                <p class="testimonial-author">- Sarah, Gym Member</p>
                            </div>
                        </div>
                    </div>
                    <!-- Carousel Controls -->
                    <a class="carousel-control-prev" href="#testimonialCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#testimonialCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>


<script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" crossorigin="anonymous"></script>
<footer style="background-color: #1c1c1c; color: #f0f0f0; text-align: center; padding: 1rem 0; font-size: 0.9rem;">
    &copy; <?= date('Y') ?> PowerProShop. All rights reserved.
</footer>
