<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>About Us - Astronomy Co.</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body class="d-flex flex-column">
    <main class="flex-shrink-0">
        <!-- navigation-->
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

        <!-- header-->
        <header class="py-5">
            <div class="container px-5">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-xxl-6">
                        <div class="text-center my-5">
                            <h1 class="fw-bolder mb-3">Explore the Universe with Us</h1>
                            <p class="lead fw-normal text-muted mb-4">At Astronomy Co., we aim to bring the wonders of
                                space closer to you through innovation and dedication.</p>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- about section-->
        <section class="py-5 bg-light" id="about-section">
            <div class="container px-5 my-5">
                <div class="row gx-5 align-items-center">
                    <div class="col-lg-6"><img class="img-fluid rounded mb-5 mb-lg-0"
                            src="https://dummyimage.com/600x400/343a40/6c757d" alt="Astronomy Image" /></div>
                    <div class="col-lg-6">
                        <h2 class="fw-bolder">About Us</h2>

                        <!-- php to load about content from a text file -->
                        <?php
                        $aboutFile = 'about.txt';
                        if (file_exists($aboutFile)) {
                            $aboutContent = file_get_contents($aboutFile);
                            echo nl2br($aboutContent);
                        } else {
                            echo '<p>No content available. Please add some information.</p>';
                        }
                        ?>
                    </div>
                </div>

                <!-- admin editing form -->
                <?php
                session_start();
                if (isset($_SESSION['role']) && $_SESSION['role'] == 'Admin') {
                    // handle form submission to update the content
                    if (isset($_POST['submit'])) {
                        $updatedContent = $_POST['content'];
                        file_put_contents($aboutFile, $updatedContent); // update the text file
                        header('Location: about.php');
                        exit;
                    }
                    ?>
                    <div class="row mt-5">
                        <div class="col-lg-12">
                            <h3>Edit About Page</h3>
                            <form method="post">
                                <div class="form-group mb-3">
                                    <textarea name="content" class="form-control"
                                        rows="10"><?php echo htmlspecialchars($aboutContent); ?></textarea>
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
                            </form>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
        </section>
    </main>

    <!-- footer-->
    <footer class="bg-dark py-4 mt-auto">
        <div class="container px-5">
            <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                <div class="col-auto">
                    <div class="small m-0 text-white">Copyright &copy; Astronomy Co. 2024</div>
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