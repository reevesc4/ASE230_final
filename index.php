<?php
session_start();
// Data for the index page
$page_title = "Astronomy Co. - Discover the Universe";
$company_name = "Astronomy Co.";
$header_title = "Explore the Universe with Astronomy Co.";
$header_description = "Join us as we delve into the mysteries of the cosmos. Astronomy Co. brings you closer to the stars with curated information and resources for stargazers, astronomers, and space enthusiasts alike.";
$header_image = "assets/astronomy-header.jpg"; // Replace with the correct path to the image
// Features section data
$features = [
    [
        'icon' => 'bi-stars',
        'title' => 'Astronomical Insights',
        'description' => 'Stay updated with the latest discoveries and insights in the field of astronomy.'
    ],
    [
        'icon' => 'bi-binoculars',
        'title' => 'Stargazing Guides',
        'description' => 'Explore detailed guides for stargazing, helping you navigate the night sky with ease.'
    ],
    [
        'icon' => 'bi-globe2',
        'title' => 'Planetary Knowledge',
        'description' => 'Learn more about the planets, stars, and other celestial objects in our solar system and beyond.'
    ],
    [
        'icon' => 'bi-stars',
        'title' => 'Space Exploration',
        'description' => 'Follow the latest news in space exploration and stay informed on new space missions.'
    ]
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title><?php echo $page_title ?? 'Astronomy Co.'; ?></title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-5">
                <a class="navbar-brand" href="index.php">Astronomy Co.</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="index.php">Index</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="faq.php">FAQ</a></li>
                        <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="admin.php">Admin</a></li>
                        <?php if (isset($_SESSION['username'])): ?>
                            <li class="nav-item"><a class="nav-link" href="#">Welcome,
                                    <?php echo htmlspecialchars($_SESSION['username']); ?></a></li>
                            <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                        <?php else: ?>
                            <li class="nav-item"><a class="nav-link" href="login.php">Login / Sign up</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-5">
                <div class="row gx-5 align-items-center justify-content-center">
                    <div class="col-lg-8 col-xl-7 col-xxl-6">
                        <div class="my-5 text-center text-xl-start">
                            <h1 class="display-5 fw-bolder text-white mb-2">
                                <?php echo $header_title ?? 'Astronomy Co.'; ?></h1>
                            <p class="lead fw-normal text-white-50 mb-4">
                                <?php echo $header_description ?? 'Welcome to Astronomy Co.! Explore our products, learn more about the universe, and join our community of space enthusiasts. Discover the beauty of the night sky with Astronomy Co., your trusted partner in stargazing.'; ?>
                            </p>
                            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                                <a class="btn btn-primary btn-lg px-4 me-sm-3" href="#features">Get Started</a>
                                <a class="btn btn-outline-light btn-lg px-4" href="#!">Learn More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center">
                        <img class="img-fluid rounded-3 my-5"
                            src="<?php echo $header_image ?? 'https://dummyimage.com/600x400/343a40/6c757d'; ?>"
                            alt="..." />
                    </div>
                </div>
            </div>
        </header>
        <!-- Features section-->
        <section class="py-5" id="features">
            <div class="container px-5 my-5">
                <div class="row gx-5">
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h2 class="fw-bolder mb-0">A better way to start building.</h2>
                    </div>
                    <div class="col-lg-8">
                        <div class="row gx-5 row-cols-1 row-cols-md-2">
                            <?php foreach ($features as $feature): ?>
                                <div class="col mb-5 h-100">
                                    <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3">
                                        <i class="bi <?php echo $feature['icon']; ?>"></i>
                                    </div>
                                    <h2 class="h5"><?php echo $feature['title']; ?></h2>
                                    <p class="mb-0"><?php echo $feature['description']; ?></p>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- Footer-->
    <footer class="bg-dark py-4 mt-auto">
        <div class="container px-5">
            <div class="row align-items-center justify-content-between">
                <div class="col-auto">
                    <div class="small m-0 text-white">&copy; <?php echo date('Y'); ?>
                        <?php echo $company_name ?? 'Astronomy Co.'; ?></div>
                </div>
                <div class="col-auto">
                    <a class="link-light small" href="#!">Privacy</a>
                    <span class="text-white mx-1">&middot;</span>
                    <a class="link-light small" href="#!">Terms</a>
                    <span class="text-white mx-1">&middot;</span>
                    <a class="link-light small" href="#!">Contact</a>
                </div>
            </div>
        </div>
    </footer>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>