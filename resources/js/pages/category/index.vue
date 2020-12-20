<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-center">
                        <h5 class="mb-0">Product Category</h5>
                        <router-link :to="{name:'create-category'}" class="btn btn-primary">Create Category </router-link>
                    </div>
                    
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="category in categories" :key="category.id">
                                    <td>{{category.id}}</td>
                                    <td>{{category.name}}</td>
                                    <td>{{category.slug}}</td>
                                    <td>
                                        <a href="#" class="btn btn-primary btn-sm"> edit</a>
                                        <a href="#" class="btn btn-danger btn-sm"> delete</a>
                                    </td>
                                </tr>
                            </tbody>
                            
                        </table>   
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
         data(){
            return{
                categories: [],
            }
        },
        methods:{
            loadCategories(){
                axios.get('/api/category').then(response =>{
                    this.categories = response.data;
                });
            }
        },
        mounted() {
            this.loadCategories();
        }
    }
</script>
