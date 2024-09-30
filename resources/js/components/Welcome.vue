<template>
    <div>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand text-primary" href="#">todolist</a>

                <div class="collapse navbar-collapse">
                    <div class="navbar-nav">
                        <router-link
                            exact-active-class="active"
                            to="/"
                            class="nav-item nav-link text-light"
                            >Home</router-link
                        >
                        <router-link
                            exact-active-class="active"
                            to="/category"
                            class="nav-item nav-link text-light"
                            >Application</router-link
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
                <h1 class="text-primary">Welcome to todolist</h1>
                <p class="lead text-secondary">Write. Plan. Achieve.</p>
            </div>
        </section>

        <!-- Features Section -->
        <section class="container my-5">
            <div class="text-center mb-4">
                <h2 class="text-primary">What todolist Offers</h2>
                <p class="text-secondary">
                    Your ultimate platform for managing ideas, projects, and
                    content creation seamlessly.
                </p>
            </div>
            <div class="row text-center">
                <div class="col-md-4 mb-4">
                    <div class="card p-4 feature-card">
                        <i class="bi bi-card-checklist mb-2"></i>
                        <h3>Organize Your Tasks</h3>
                        <p>
                            Keep track of your to-dos, deadlines, and writing
                            tasks with ease. Stay on top of your work.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card p-4 feature-card">
                        <i class="bi bi-pencil-square mb-2"></i>
                        <h3>Write & Create</h3>
                        <p>
                            Whether you're drafting a novel or planning a blog
                            post, todolist helps you focus on what matters
                            most.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card p-4 feature-card">
                        <i class="bi bi-cloud-arrow-up mb-2"></i>
                        <h3>Cloud Sync & Backup</h3>
                        <p>
                            All your data is saved and backed up securely in the
                            cloud. Access your writing from anywhere, anytime.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- How It Works Section -->
        <section class="container my-5">
            <div class="text-center mb-4">
                <h2 class="text-primary">How todolist Works</h2>
                <p class="text-secondary">
                    Simplifying your workflow, one step at a time.
                </p>
            </div>
            <div class="row text-center">
                <div class="col-md-4 mb-4">
                    <div class="card p-4 feature-card">
                        <i class="bi bi-arrow-right-circle mb-2"></i>
                        <h3>Create a Project</h3>
                        <p>
                            Start by creating a project. Whether it’s a novel,
                            blog, or to-do list, we’ve got you covered.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card p-4 feature-card">
                        <i class="bi bi-pencil mb-2"></i>
                        <h3>Write & Plan</h3>
                        <p>
                            Break your work down into manageable tasks, set
                            deadlines, and stay focused on your writing goals.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card p-4 feature-card">
                        <i class="bi bi-check2-circle mb-2"></i>
                        <h3>Achieve Your Goals</h3>
                        <p>
                            Track your progress, mark tasks as complete, and
                            watch your projects come to life.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="text-center bg-dark text-white py-4">
            <div class="container">
                <p>
                    &copy; {{ new Date().getFullYear() }} todolist. All
                    rights reserved. Designed by todolist
                </p>
                <a href="#" class="text-light">Privacy Policy</a> |
                <a href="#" class="text-light">Terms of Service</a>
                <div class="mt-3">
                    <a href="#" class="text-light"
                        ><i class="bi bi-facebook"></i
                    ></a>
                    <a href="#" class="text-light"
                        ><i class="bi bi-twitter"></i
                    ></a>
                    <a href="#" class="text-light"
                        ><i class="bi bi-instagram"></i
                    ></a>
                </div>
            </div>
        </footer>
    </div>
</template>

<script>
export default {};
</script>

<style scoped>
/* General Layout and Color Scheme */
body {
    font-family: "Arial", sans-serif;
    background-color: #f8f9fa; /* 50%: Light background */
    color: #6c757d; /* 10%: Text and minor elements */
}

/* Hero Section */
.hero {
    height: 80vh;
    background-color: #f8f9fa;
    color: #343a40; /* 30%: Darker accent for main text */
}

.hero h1 {
    font-size: 3rem;
    font-weight: bold;
    color: #007bff; /* 10%: Primary accent color */
}

.hero p {
    font-size: 1.25rem;
    color: #6c757d;
}

/* Feature Cards */
.feature-card {
    background-color: #ffffff;
    color: #343a40; /* Text in cards */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    padding: 20px;
    text-align: center;
    height: 100%;
}

.feature-card h3 {
    color: #007bff; /* 10%: Primary accent */
}

.feature-card i {
    color: #ffd700; /* 10%: Highlight color */
    font-size: 2rem;
}

/* Footer */
footer {
    background-color: #343a40; /* 30%: Dark footer */
    color: #ffffff;
    padding: 20px 0;
}

footer a {
    color: #ffffff;
}

footer a:hover {
    color: #ffd700; /* 10%: Highlight on hover */
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
