<template>
    <div class="container-fluid p-0">
        <!-- Navigation Bar -->
        <nav
            class="navbar navbar-expand-lg navbar-light"
            style="background-color: #343a40"
        >
            <div class="container">
                <a class="navbar-brand text-light" href="#">CyberSamurai</a>
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
                    <div class="d-flex">
                        <router-link
                            :to="{ name: 'categoryAdd' }"
                            class="btn btn-primary"
                            >Create Task</router-link
                        >
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content Section -->
        <div class="container my-4">
            <div class="card shadow-lg">
                <div
                    class="card-header text-white"
                    style="background-color: #007bff"
                >
                    <h4 class="mb-0">Todo List</h4>
                </div>
                <div class="card-body" style="background-color: #f8f9fa">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Task</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody v-if="categories.length > 0">
                                <tr
                                    v-for="(category, key) in categories"
                                    :key="key"
                                >
                                    <td>{{ category.id }}</td>
                                    <td>{{ category.title }}</td>
                                    <td>{{ category.description }}</td>
                                    <td>
                                        <span
                                            :class="{
                                                'badge bg-success':
                                                    category.status === 2,
                                                'badge bg-warning':
                                                    category.status === 1,
                                                'badge bg-secondary':
                                                    category.status === 0,
                                            }"
                                        >
                                            {{ statusText(category.status) }}
                                        </span>
                                    </td>
                                    <td>
                                        <router-link
                                            :to="{
                                                name: 'categoryEdit',
                                                params: { id: category.id },
                                            }"
                                            class="btn btn-sm btn-info me-2"
                                            >Edit</router-link
                                        >
                                        <button
                                            type="button"
                                            class="btn btn-sm btn-danger"
                                            @click="
                                                showDeleteModal(category.id)
                                            "
                                        >
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                            <tbody v-else>
                                <tr>
                                    <td colspan="5" class="text-center">
                                        No Tasks Found.
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Delete Confirmation Modal -->
        <div
            class="modal fade"
            id="deleteModal"
            tabindex="-1"
            aria-labelledby="deleteModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">
                            Delete Task
                        </h5>
                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="modal"
                            aria-label="Close"
                        ></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this task?
                    </div>
                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal"
                        >
                            Cancel
                        </button>
                        <button
                            type="button"
                            class="btn btn-danger"
                            @click="confirmDelete"
                        >
                            Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { Modal } from "bootstrap"; // Import the specific component (Modal)
import { useToast } from "vue-toastification"; // Import the toast function

export default {
    name: "categories",
    data() {
        return {
            categories: [],
            deleteCategoryId: null, // to store the category ID to be deleted
            toast: null, // Define toast as null initially
        };
    },
    mounted() {
        this.getCategories();
    },
    methods: {
        async getCategories() {
            await this.axios
                .get("/api/category")
                .then((response) => {
                    this.categories = response.data;
                })
                .catch((error) => {
                    console.log(error);
                    this.categories = [];
                });
        },
        showDeleteModal(id) {
            this.deleteCategoryId = id;
            const deleteModal = new Modal(
                document.getElementById("deleteModal")
            );
            deleteModal.show();
        },
        confirmDelete() {
            if (this.deleteCategoryId !== null) {
                this.axios
                    .delete(`/api/category/${this.deleteCategoryId}`)
                    .then((response) => {
                        this.toast.success("Task successfully deleted!"); // Show success toast
                        this.getCategories(); // Refresh the list
                        this.deleteCategoryId = null;
                    })
                    .catch((error) => {
                        this.toast.error("Error deleting task."); // Show error toast
                        console.log(error);
                    });

                const deleteModal = Modal.getInstance(
                    document.getElementById("deleteModal")
                );
                deleteModal.hide();
            }
        },
        statusText(status) {
            switch (status) {
                case 0:
                    return "Pending";
                case 1:
                    return "In Progress";
                case 2:
                    return "Completed";
                default:
                    return "Unknown";
            }
        },
    },
    created() {
        // Initialize toast when the component is created
        this.toast = useToast();
    },
};
</script>

<style scoped>
/* Add responsive styles for modal and other elements */
.container-fluid {
    min-height: 100vh;
    background-color: #f0f2f5;
}

.navbar {
    margin-bottom: 1.5rem;
}

.table-responsive {
    border-radius: 8px;
    overflow: hidden;
}

.table th,
.table td {
    vertical-align: middle;
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

.table-hover tbody tr:hover {
    background-color: #f1f1f1;
}
</style>
