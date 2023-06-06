<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ $resume->title }}</title>

  <!-- Favicons -->
  <link href="assets/img/favicon.ico" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <style>
        #hero {
            background: url("/assets/img/{{ $resume->background_img }}") top right no-repeat;
        }
    </style>

  <!-- Template Main CSS File -->
  <link href="/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: MyResume
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/free-html-bootstrap-template-my-resume/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Mobile nav toggle button ======= -->
  <i class="bi bi-list mobile-nav-toggle d-lg-none"></i>
  <!-- ======= Header ======= -->
  <header id="header" class="d-flex flex-column justify-content-center">

    <nav id="navbar" class="navbar nav-menu">
      <ul>
        <li><a href="#hero" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Home</span></a></li>
        <li><a href="#about" class="nav-link scrollto"><i class="bx bx-user"></i> <span>About</span></a></li>
{{--        <li><a href="#resume" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>Resume</span></a></li>--}}
        <li><a href="#portfolio" class="nav-link scrollto"><i class="bx bx-book-content"></i> <span>Sample Projects</span></a></li>
        <li><a href="#contact" class="nav-link scrollto"><i class="bx bx-envelope"></i> <span>Contact</span></a></li>
      </ul>
    </nav><!-- .nav-menu -->

  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center">
    <div class="container" data-aos="zoom-in" data-aos-delay="100">
      <h1>{{ $resume->name }}</h1>
      <p>I'm <span class="typed" data-typed-items="{{ $resume->iam }}"></span></p>
      <div class="social-links">
        <a href="https://github.com/Mehdi-Saadi" target="_blank" class="github"><i class="bx bxl-github"></i></a>
        <a href="https://www.linkedin.com/in/mehdi-saadi-926a57235/" target="_blank" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>About</h2>
          <p>{{ $resume->about_txt }}</p>
        </div>

        <div class="row">
          <div class="col-lg-4">
              <img src="/assets/img/{{ $resume->about_img }}" class="img-fluid" alt="Image not found" onerror="this.onerror=null;this.src='assets/img/profile.png';">
          </div>
          <div class="col-lg-8 pt-4 pt-lg-0 content mt-3">
            <h3>{{ $resume->about_title }}</h3>
            <div class="row mt-5">
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Birthday:</strong> <span>{{ $resume->birthday }}</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span>{{ $resume->phone }}</span></li>
                    <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong> <span>{{ $resume->email }}</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>City:</strong> <span>{{ $resume->location }}</span></li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Age:</strong> <span>{{ $resume->age }}</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Degree:</strong> <span>{{ $resume->degree }}</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Freelance:</strong> <span>@if($resume->available == 1) Available @else Not Available @endif</span></li>
                </ul>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Facts Section ======= -->
    <section id="facts" class="facts">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Facts</h2>
                <p>{{ $resume->facts_txt }}</p>
        </div>

        <div class="row">

            @if($resume->clients > 0)
                <div class="col-lg-4 col-md-4">
                    <div class="count-box">
                        <i class="bi bi-emoji-smile"></i>
                        <span data-purecounter-start="0" data-purecounter-end="{{ $resume->clients }}" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Happy Clients</p>
                    </div>
                </div>
            @endif

            @if($resume->projects_done > 0)
                <div class="d-flex justify-content-center">
                    <div class="col-lg-4 col-md-4 mt-5 mt-md-0">
                        <div class="count-box">
                            <i class="bi bi-journal-richtext"></i>
                            <span data-purecounter-start="0" data-purecounter-end="{{ $resume->projects_done }}" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Projects</p>
                        </div>
                    </div>
                </div>
            @endif

                @if($resume->awards > 0)
                    <div class="col-lg-4 col-md-4 mt-5 mt-md-0">
                        <div class="count-box">
                            <i class="bi bi-award"></i>
                            <span data-purecounter-start="0" data-purecounter-end="{{ $resume->awards }}" data-purecounter-duration="1" class="purecounter"></span>
                            <p>Awards</p>
                        </div>
                    </div>
                @endif

        </div>

      </div>
    </section><!-- End Facts Section -->

    <!-- ======= Skills Section ======= -->
    <section id="skills" class="skills section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Skills</h2>
          <p>{{ $resume->skills_txt }}</p>
        </div>

        <div class="row skills-content">

          <div class="col-lg-6">

              @foreach($skills as $skill)
                  @if($loop->odd)
                      <div class="progress">
                          <span class="skill">{{ $skill->skill_name }} <i class="val">{{ $skill->percent }}%</i></span>
                          <div class="progress-bar-wrap">
                              <div class="progress-bar" role="progressbar" aria-valuenow="{{ $skill->percent }}" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                      </div>
                  @endif
              @endforeach

          </div>

          <div class="col-lg-6">

              @foreach($skills as $skill)
                  @if($loop->even)
                      <div class="progress">
                          <span class="skill">{{ $skill->skill_name }} <i class="val">{{ $skill->percent }}%</i></span>
                          <div class="progress-bar-wrap">
                              <div class="progress-bar" role="progressbar" aria-valuenow="{{ $skill->percent }}" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                      </div>
                  @endif
              @endforeach

          </div>

        </div>

      </div>
    </section><!-- End Skills Section -->

    <!-- ======= Resume Section ======= -->
{{--    <section id="resume" class="resume">--}}
{{--      <div class="container" data-aos="fade-up">--}}

{{--        <div class="section-title">--}}
{{--          <h2>Resume</h2>--}}
{{--          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>--}}
{{--        </div>--}}

{{--        <div class="row">--}}
{{--          <div class="col-lg-6">--}}
{{--            <h3 class="resume-title">Sumary</h3>--}}
{{--            <div class="resume-item pb-0">--}}
{{--              <h4>Brandon Johnson</h4>--}}
{{--              <p><em>Innovative and deadline-driven Graphic Designer with 3+ years of experience designing and developing user-centered digital/print marketing material from initial concept to final, polished deliverable.</em></p>--}}
{{--              <ul>--}}
{{--                <li>Portland par 127,Orlando, FL</li>--}}
{{--                <li>(123) 456-7891</li>--}}
{{--                <li>alice.barkley@example.com</li>--}}
{{--              </ul>--}}
{{--            </div>--}}

{{--            <h3 class="resume-title">Education</h3>--}}
{{--            <div class="resume-item">--}}
{{--              <h4>Master of Fine Arts &amp; Graphic Design</h4>--}}
{{--              <h5>2015 - 2016</h5>--}}
{{--              <p><em>Rochester Institute of Technology, Rochester, NY</em></p>--}}
{{--              <p>Qui deserunt veniam. Et sed aliquam labore tempore sed quisquam iusto autem sit. Ea vero voluptatum qui ut dignissimos deleniti nerada porti sand markend</p>--}}
{{--            </div>--}}
{{--            <div class="resume-item">--}}
{{--              <h4>Bachelor of Fine Arts &amp; Graphic Design</h4>--}}
{{--              <h5>2010 - 2014</h5>--}}
{{--              <p><em>Rochester Institute of Technology, Rochester, NY</em></p>--}}
{{--              <p>Quia nobis sequi est occaecati aut. Repudiandae et iusto quae reiciendis et quis Eius vel ratione eius unde vitae rerum voluptates asperiores voluptatem Earum molestiae consequatur neque etlon sader mart dila</p>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--          <div class="col-lg-6">--}}
{{--            <h3 class="resume-title">Professional Experience</h3>--}}
{{--            <div class="resume-item">--}}
{{--              <h4>Senior graphic design specialist</h4>--}}
{{--              <h5>2019 - Present</h5>--}}
{{--              <p><em>Experion, New York, NY </em></p>--}}
{{--              <ul>--}}
{{--                <li>Lead in the design, development, and implementation of the graphic, layout, and production communication materials</li>--}}
{{--                <li>Delegate tasks to the 7 members of the design team and provide counsel on all aspects of the project. </li>--}}
{{--                <li>Supervise the assessment of all graphic materials in order to ensure quality and accuracy of the design</li>--}}
{{--                <li>Oversee the efficient use of production project budgets ranging from $2,000 - $25,000</li>--}}
{{--              </ul>--}}
{{--            </div>--}}
{{--            <div class="resume-item">--}}
{{--              <h4>Graphic design specialist</h4>--}}
{{--              <h5>2017 - 2018</h5>--}}
{{--              <p><em>Stepping Stone Advertising, New York, NY</em></p>--}}
{{--              <ul>--}}
{{--                <li>Developed numerous marketing programs (logos, brochures,infographics, presentations, and advertisements).</li>--}}
{{--                <li>Managed up to 5 projects or tasks at a given time while under pressure</li>--}}
{{--                <li>Recommended and consulted with clients on the most appropriate graphic design</li>--}}
{{--                <li>Created 4+ design presentations and proposals a month for clients and account managers</li>--}}
{{--              </ul>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--        </div>--}}

{{--      </div>--}}
{{--    </section><!-- End Resume Section -->--}}

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Sample Projects</h2>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

          @foreach($sample_projects as $number => $sample_project)
                <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                    <div class="portfolio-wrap">
                        <img src="/assets/img/portfolio/{{ $sample_project->main_img }}" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>{{ $sample_project->title }}</h4>
                            <div class="portfolio-links">
                                <a href="/assets/img/portfolio/{{ $sample_project->main_img }}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="App 1"><i class="bx bx-plus"></i></a>
                                <a href="{{ route('project_details', $sample_project->id) }}" class="portfolio-details-lightbox" data-glightbox="type: external" title="Portfolio Details"><i class="bx bx-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
          @endforeach

        </div>

      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Testimonials Section ======= -->
{{--    <section id="testimonials" class="testimonials section-bg">--}}
{{--      <div class="container" data-aos="fade-up">--}}

{{--        <div class="section-title">--}}
{{--          <h2>Testimonials</h2>--}}
{{--        </div>--}}

{{--        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">--}}
{{--          <div class="swiper-wrapper">--}}

{{--            <div class="swiper-slide">--}}
{{--              <div class="testimonial-item">--}}
{{--                <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">--}}
{{--                <h3>Saul Goodman</h3>--}}
{{--                <h4>Ceo &amp; Founder</h4>--}}
{{--                <p>--}}
{{--                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>--}}
{{--                  Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.--}}
{{--                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>--}}
{{--                </p>--}}
{{--              </div>--}}
{{--            </div><!-- End testimonial item -->--}}

{{--            <div class="swiper-slide">--}}
{{--              <div class="testimonial-item">--}}
{{--                <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">--}}
{{--                <h3>Sara Wilsson</h3>--}}
{{--                <h4>Designer</h4>--}}
{{--                <p>--}}
{{--                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>--}}
{{--                  Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.--}}
{{--                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>--}}
{{--                </p>--}}
{{--              </div>--}}
{{--            </div><!-- End testimonial item -->--}}

{{--            <div class="swiper-slide">--}}
{{--              <div class="testimonial-item">--}}
{{--                <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">--}}
{{--                <h3>Jena Karlis</h3>--}}
{{--                <h4>Store Owner</h4>--}}
{{--                <p>--}}
{{--                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>--}}
{{--                  Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.--}}
{{--                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>--}}
{{--                </p>--}}
{{--              </div>--}}
{{--            </div><!-- End testimonial item -->--}}

{{--            <div class="swiper-slide">--}}
{{--              <div class="testimonial-item">--}}
{{--                <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">--}}
{{--                <h3>Matt Brandon</h3>--}}
{{--                <h4>Freelancer</h4>--}}
{{--                <p>--}}
{{--                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>--}}
{{--                  Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.--}}
{{--                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>--}}
{{--                </p>--}}
{{--              </div>--}}
{{--            </div><!-- End testimonial item -->--}}

{{--            <div class="swiper-slide">--}}
{{--              <div class="testimonial-item">--}}
{{--                <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">--}}
{{--                <h3>John Larson</h3>--}}
{{--                <h4>Entrepreneur</h4>--}}
{{--                <p>--}}
{{--                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>--}}
{{--                  Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.--}}
{{--                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>--}}
{{--                </p>--}}
{{--              </div>--}}
{{--            </div><!-- End testimonial item -->--}}

{{--          </div>--}}
{{--          <div class="swiper-pagination"></div>--}}
{{--        </div>--}}

{{--      </div>--}}
{{--    </section><!-- End Testimonials Section -->--}}

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
        </div>

        <div class="row mt-1">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>{{ $resume->location }}</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>{{ $resume->email }}</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>{{ $resume->phone }}</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="/forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" autocomplete="off" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" autocomplete="off" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <p class="p-2">{{ $resume->last_words }}</p>
      <div class="social-links">
        <a href="https://github.com/Mehdi-Saadi" target="_blank" class="github"><i class="bx bxl-github"></i></a>
        <a href="https://www.linkedin.com/in/mehdi-saadi-926a57235/" target="_blank" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="/assets/vendor/aos/aos.js"></script>
  <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="/assets/vendor/typed.js/typed.umd.js"></script>
  <script src="/assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="/assets/js/main.js"></script>

</body>

</html>
