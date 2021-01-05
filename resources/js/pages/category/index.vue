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
                                    <th style="width:100px">ID</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>value</th>
                                    <th style="width:170px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(category,i) in categories" :key="category.id">
                                    <td style="width:100px">{{  ++i }}</td>
                                    <td>{{category.name}}</td>
                                    <td>{{category.slug}}</td>
                                    <td>{{category.value}}</td>
                                    <td style="width:170px">
                                        <router-link :to="{name:'edit-category'}" class="btn btn-primary btn-sm"> Edit</router-link>
                                        <a href="#" class="btn btn-danger btn-sm"> Delete</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3" style="text-align:right">total</td>
                                    <td>{{totalValue}}</td>
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
                totalValue : 100
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
