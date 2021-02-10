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
                                    <th style="width:100px">Id</th>
                                    <th>Name_a</th>
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
                                      <router-link :to="{name:'edit-category',params: {id: category.id}}" class="btn btn-primary btn-sm"> Edit</router-link>
                                        <a @click.prevent="deleteCategory(category)" href="#" class="btn btn-danger btn-sm"> Delete</a>

                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3" style="text-align:right">total</td>
                                    <td>{{totalCurrent.toFixed(2)}}</td>
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
        computed: {
            totalCurrent () {
                 return this.categories.reduce((acc, cur) => acc + Number(cur.value), 0);
            },
        },
        methods:{
            loadCategories(){
                axios.get('/api/category').then(response =>{
                    this.categories = response.data;  
                });
                
            },
            deleteCategory(category){
             
                axios.delete(`/api/category/${category.id}`).then(() => {
                    this.$toast.success({
                        title:'Success!',
                        message:'Category deleted successfully.'
                    });
                });
                
            let index = this.categories.indexOf(category);
            this.categories.splice(index, 1); 
            }
        },
        mounted() {
            this.loadCategories();
        }
    }
</script>
