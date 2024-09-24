<template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="#" style="color: #800000"
                    >MindBlow</a
                >

                <div class="collapse navbar-collapse">
                    <div class="navbar-nav">
                        <router-link
                            exact-active-class="active"
                            to="/"
                            class="nav-item nav-link"
                            >Home</router-link
                        >
                        <router-link
                            exact-active-class="active"
                            to="/category"
                            class="nav-item nav-link"
                            >Category</router-link
                        >
                    </div>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <section
            class="hero d-flex align-items-center justify-content-center text-center"
        >
            <div class="container">
                <h1>Welcome to MindBlow</h1>
                <p class="lead">Creative Design and Efficient System.</p>
            </div>
        </section>

        <!-- Features Section -->
        <section class="container my-5">
            <div class="text-center mb-4">
                <h2 style="color: #800000">Why Choose Us?</h2>
                <p class="text-secondary">
                    Discover amazing features designed to help you succeed.
                </p>
            </div>
            <div class="row text-center">
                <div class="col-md-4 mb-4">
                    <div class="card p-4">
                        <i
                            class="bi bi-speedometer2 mb-2"
                            style="color: #ffd700; font-size: 2rem"
                        ></i>
                        <h3>Fast Performance</h3>
                        <p>
                            Experience the blazing speed of our platform to
                            boost your productivity.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card p-4">
                        <i
                            class="bi bi-shield-lock mb-2"
                            style="color: #ffd700; font-size: 2rem"
                        ></i>
                        <h3>Secure & Reliable</h3>
                        <p>
                            We ensure your data remains secure and protected
                            with cutting-edge security.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card p-4">
                        <i
                            class="bi bi-people mb-2"
                            style="color: #ffd700; font-size: 2rem"
                        ></i>
                        <h3>User-Friendly</h3>
                        <p>
                            Our intuitive design makes it easy to get things
                            done with minimal effort.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="text-center bg-dark text-white py-4">
            <div class="container">
                <p>
                    &copy; {{ new Date().getFullYear() }} MindBlow. All rights
                    reserved. Designed by Peter Gwapo
                </p>
                <a href="#" class="text-white">Privacy Policy</a> |
                <a href="#" class="text-white">Terms of Service</a>
                <div class="mt-3">
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-twitter"></i></a>
                    <a href="#"><i class="bi bi-instagram"></i></a>
                </div>
            </div>
        </footer>
    </div>
</template>

export default {};

<style scoped>
body {
    font-family: "Arial", sans-serif;
    background-color: #f0f4f8;
    color: #6c757d;
}

/* Hero Section */
.hero {
    height: 80vh;
    background-color: #f0f4f8;
    color: #6c757d;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
}

.hero h1 {
    font-size: 3rem;
    font-weight: bold;
    color: #800000;
}

.hero p {
    font-size: 1.25rem;
}

/* Buttons */
.btn-primary {
    background-color: #800000;
    border: none;
    color: #ffffff;
}

.btn-primary:hover {
    background-color: #660000;
}

/* Feature Cards */
.feature-card {
    background-color: #ffffff;
    color: #6c757d;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
    padding: 20px;
    text-align: center;
    height: 100%;
}

.feature-card h3 {
    color: #800000;
}

.feature-card i {
    color: #ffd700;
    font-size: 2rem;
}

/* Footer */
footer {
    background-color: #6c757d;
    color: #ffffff;
    padding: 20px 0;
}

footer a {
    color: #ffffff;
}

footer a:hover {
    color: #ffd700;
}

@media (max-width: 768px) {
    .hero h1 {
        font-size: 2.5rem;
    }

    .hero p {
        font-size: 1rem;
    }
}
</style>
