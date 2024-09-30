<template>
    <div class="container-fluid p-0">
        <!-- Navigation Bar -->
        <nav
            class="navbar navbar-expand-lg navbar-light"
            style="background-color: #343a40"
        >
            <div class="container">
                <a class="navbar-brand text-light" href="#">Virtual Vanguard</a>
                <button
                    class="navbar-toggler"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarNav"
                    aria-controls="navbarNav"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <router-link to="/" class="nav-link text-light"
                                >Home</router-link
                            >
                        </li>
                        <li class="nav-item">
                            <router-link
                                to="/category"
                                class="nav-link text-light"
                                >Application</router-link
                            >
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Update Task Form Section -->
        <div class="container my-4">
            <div class="card shadow-lg">
                <div
                    class="card-header text-white"
                    style="background-color: #007bff"
                >
                    <h4 class="mb-0">Update Task</h4>
                </div>
                <div class="card-body" style="background-color: #f8f9fa">
                    <form @submit.prevent="update">
                        <div class="row">
                            <!-- Task Input Field -->
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="title">Task</label>
                                    <input
                                        type="text"
                                        id="title"
                                        class="form-control"
                                        v-model="category.title"
                                        placeholder="Enter task title"
                                        required
                                    />
                                </div>
                            </div>

                            <!-- Description Input Field -->
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input
                                        type="text"
                                        id="description"
                                        class="form-control"
                                        v-model="category.description"
                                        placeholder="Enter task description"
                                        required
                                    />
                                </div>
                            </div>

                            <!-- Status Selection Field -->
                            <div class="col-md-6 mb-3">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select
                                        id="status"
                                        class="form-control"
                                        v-model="category.status"
                                    >
                                        <option value="0">Pending</option>
                                        <option value="1">In Progress</option>
                                        <option value="2">Completed</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Submit and Cancel Buttons -->
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">
                                    Update Task
                                </button>
                                <router-link
                                    to="/category"
                                    class="btn btn-secondary ms-2"
                                >
                                    Cancel
                                </router-link>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { useToast } from "vue-toastification"; // Import toast function

export default {
    data() {
        return {
            category: {
                title: "",
                description: "",
                status: 0,
            },
            error: null,
            loading: true,
            toast: null, // Initialize toast
        };
    },
    created() {
        const id = this.$route.params.id; // Get the ID from the route
        this.getCategory(id);
    },
    methods: {
        // Fetch category details based on the ID
        async getCategory(id) {
            try {
                const response = await this.axios.get(`/api/category/${id}`);
                this.category = response.data; // Load category data into form
            } catch (error) {
                console.error("Error fetching category", error);
                this.error = "Error loading category data";
                this.toast.error("Error loading category data"); // Show error toast
            } finally {
                this.loading = false;
            }
        },
        // Update category details
        async update() {
            try {
                const response = await this.axios.put(
                    `/api/category/${this.$route.params.id}`,
                    this.category
                );
                this.toast.success("Task updated successfully!"); // Show success toast
                this.$router.push("/category"); // Redirect after successful update
            } catch (error) {
                console.error("Error updating category", error);
                this.error = "Error updating category";
                this.toast.error("Error updating category!"); // Show error toast
            }
        },
    },
    mounted() {
        this.toast = useToast(); // Initialize toast when component is mounted
    },
};
</script>

<!-- Scoped Styles -->
<style scoped>
.container-fluid {
    min-height: 100vh;
    background-color: #f0f2f5;
}

.navbar {
    margin-bottom: 1.5rem;
}

.card {
    border-radius: 8px;
}

.card-header {
    background-color: #343a40;
    color: white;
}

.card-body {
    background-color: #f8f9fa;
}

.form-control {
    border-radius: 4px;
}

.btn-primary {
    background-color: #007bff;
    border-color: #007bff;
    transition: background-color 0.3s ease;
}

.btn-primary:hover {
    background-color: #0056b3;
    border-color: #0056b3;
}

.btn-secondary {
    background-color: #6c757d;
    border-color: #6c757d;
}

.btn-secondary:hover {
    background-color: #5a6268;
    border-color: #545b62;
}

@media (max-width: 768px) {
    .container {
        padding: 0 1rem;
    }
}
</style>
