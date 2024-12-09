<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Frequently Asked Questions - Astronomy Co." />
    <meta name="author" content="Astronomy Co." />
    <title>FAQ - Astronomy Co.</title>
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
        <!-- Page Content-->
        <section class="py-5">
            <div class="container px-5 my-5">
                <div class="text-center mb-5">
                    <h1 class="fw-bolder">Frequently Asked Questions</h1>
                    <p class="lead fw-normal text-muted mb-0">How can we assist you?</p>
                </div>
                <div class="row gx-5">
                    <div class="col-xl-8">

                        <?php
                        // Load FAQ data from a JSON file
                        $faqFile = 'faq.json';
                        $faqs = json_decode(file_get_contents($faqFile), true);

                        // Render the FAQ sections
                        if ($faqs) {
                            $faqCounter = 0;
                            foreach ($faqs as $section => $questions) {
                                echo "<h2 class='fw-bolder mb-3'>{$section}</h2>";
                                echo "<div class='accordion mb-5' id='accordion-{$section}'>";

                                foreach ($questions as $index => $faq) {
                                    $question = $faq['question'];
                                    $answer = $faq['answer'];
                                    $showClass = $index === 0 ? 'show' : '';
                                    $collapsedClass = $index === 0 ? '' : 'collapsed';

                                    $uniqueId = "faq-{$faqCounter}";

                                    echo "
                                        <div class='accordion-item'>
                                            <h3 class='accordion-header' id='heading-{$uniqueId}'>
                                                <button class='accordion-button {$collapsedClass}' type='button' data-bs-toggle='collapse' data-bs-target='#collapse-{$uniqueId}' aria-expanded='true' aria-controls='collapse-{$uniqueId}'>
                                                    {$question}
                                                </button>
                                            </h3>
                                            <div id='collapse-{$uniqueId}' class='accordion-collapse collapse {$showClass}' aria-labelledby='heading-{$uniqueId}'>
                                                <div class='accordion-body'>
                                                    {$answer}
                                                </div>
                                            </div>
                                        </div>
                                    ";

                                    $faqCounter++;
                                }
                                echo "</div>";
                            }
                        } else {
                            echo "<p>No FAQs available at the moment.</p>";
                        }
                        ?>
                    </div>
                </div>
            </div>

            <!-- Contact Us Sidebar-->
            <div class="col-xl-4">
                <div class="card border-0 bg-light mt-xl-5">
                    <div class="card-body p-4 py-lg-5">
                        <div class="d-flex align-items-center justify-content-center">
                            <div class="text-center">
                                <div class="h6 fw-bolder">Have more questions?</div>
                                <p class="text-muted mb-4">
                                    Contact us at <br />
                                    <a href="mailto:support@astronomyco.com">support@astronomyco.com</a>
                                </p>
                                <div class="h6 fw-bolder">Follow us</div>
                                <a class="fs-5 px-2 link-dark" href="#!"><i class="bi-twitter"></i></a>
                                <a class="fs-5 px-2 link-dark" href="#!"><i class="bi-facebook"></i></a>
                                <a class="fs-5 px-2 link-dark" href="#!"><i class="bi-linkedin"></i></a>
                                <a class="fs-5 px-2 link-dark" href="#!"><i class="bi-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            </div>
        </section>
    </main>

    <!-- Footer-->
    <footer class="bg-dark py-4 mt-auto">
        <div class="container px-5">
            <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                <div class="col-auto">
                    <div class="small m-0 text-white">&copy; Astronomy Co. 2024</div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>