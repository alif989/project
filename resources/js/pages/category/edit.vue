<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5>Edit Category</h5>
                        <a href="#" class="btn btn-primary">Category List</a>
                   </div>
                    <div class="card-body">
                       <div class="row">
                            <div class="col-md-6 offset-3">
                                <form @submit.prevent="updateCategory">
                                    <div class="form-group">
                                        <label>Category Name</label>
                                        <input type="text" v-model="categoryForm.name" class="form-control"  name= "name" placeholder="category name" :class="{ 'is-invalid': categoryForm.errors.has('name') }">
                                        
                                         <has-error :form="categoryForm" field="name"></has-error>
                                    </div>
                                    <div class="form-group">
                                        <label>Category value</label>
                                        <input type="number" v-model="categoryForm.value" class="form-control"  name= "value" placeholder="category value" :class="{ 'is-invalid': categoryForm.errors.has('value') }">
                                        
                                         <has-error :form="categoryForm" field="value"></has-error>
                                    </div>
                                    <div class="form-group">
                                     <button type="submit" class="btn btn-success"> Update Category </button>
                                    </div>
                                </form>
                            </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { Form } from 'vform' 
    export default {
        data(){
            return{
                categoryForm: new Form({
                name :'',
                }),
            }
        },
        methods:{
            updateCategory(){
                let id = this.$route.params.id;
                this.categoryForm.put(`/api/category/${id}`).then(() => {
                    this.$toast.success({
                        title:'Success!',
                        message:'Category updated successfully.'
                    });
                });
                this.$router.replace({ name: 'category-list'});
            },
            loadCategory(){
                let id = this.$route.params.id;
                console.log(id);
                axios.get(`/api/category/${id}/edit`).then(response => {
                    this.categoryForm.name = response.data.name;
                    this.categoryForm.value = response.data.value;
                });
            }
        },
        mounted(){
        this.loadCategory();
    }
    }
</script>
