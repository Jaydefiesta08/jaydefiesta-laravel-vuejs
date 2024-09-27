<template>
    <div class="container-fluid p-0">
        <!-- Navigation Bar -->
        <nav
            class="navbar navbar-expand-lg navbar-light"
            style="background-color: #343a40"
        >
            <div class="container">
                <a class="navbar-brand text-light" href="#">NexusNinjas</a>
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

        <!-- Add Task Form Section -->
        <div class="container my-4">
            <div class="card shadow-lg">
                <div
                    class="card-header text-white"
                    style="background-color: #007bff"
                >
                    <h4 class="mb-0">Add Task</h4>
                </div>
                <div class="card-body" style="background-color: #f8f9fa">
                    <form @submit.prevent="create">
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

                            <!-- Submit Button -->
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">
                                    Save Task
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
import { useToast } from "vue-toastification";

export default {
    name: "add-category",
    data() {
        return {
            category: {
                title: "",
                description: "",
                status: 0, // Default status is Pending
            },
        };
    },
    setup() {
        const toast = useToast(); // Initialize the toast
        return { toast }; // Make it available for methods
    },
    methods: {
        async create() {
            try {
                const response = await this.axios.post(
                    "/api/category",
                    this.category
                );
                this.toast.success("Task Created Successfully!!"); // Trigger success toast
                this.$router.push({ name: "categoryList" });
            } catch (error) {
                this.toast.error("Failed to create task!"); // Trigger error toast
                console.error(error);
            }
        },
    },
};
</script>

<!-- Styles for better design -->
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
