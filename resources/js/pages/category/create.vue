<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5>Create Category</h5>
                         <router-link :to="{name:'category-list'}" class="btn btn-primary">Categories List </router-link>
                   </div>
                    <div class="card-body">
                       <div class="row">
                            <div class="col-md-6 offset-3">
                                <form @submit.prevent="createCategory">
                                    <div class="form-group">
                                        <label>Category Name</label>
                                        <input type="text" v-model="categoryForm.name" class="form-control"  name= "name" placeholder="category name" :class="{ 'is-invalid': categoryForm.errors.has('name') }">
                                        
                                         <has-error :form="categoryForm" field="name"></has-error>
                                    </div>
                                    <div class="form-group">
                                        <label>Category valuesss</label>
                                        <input type="number" v-model="categoryForm.value" class="form-control"  name= "value" placeholder="category value" :class="{ 'is-invalid': categoryForm.errors.has('value') }">
                                        
                                         <has-error :form="categoryForm" field="value"></has-error>
                                    </div>

                                    <div class="form-group">
                                     <button type="submit" class="btn btn-success"> Create Category </button>
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
                value :'',
                }),
            }
        },
        methods:{
            createCategory(){
                
                this.categoryForm.post('/api/category').then(({data})=>{
                    this.categoryForm.name = '';
                    this.categoryForm.value = '';
                    this.$toast.success({
                        title:'success',
                        message:'category create successfuly'
                        
                    });
                    this.$router.replace({ name: 'category-list'})
                });
            },
            
        }
    }
</script>
