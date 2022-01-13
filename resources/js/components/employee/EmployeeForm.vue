<template>
    <div class = "container" >
        <el-card class="box-card">
            <div slot="header" class="clearfix">
                <el-page-header @back="goBack" :content="`${scope} form`">
                </el-page-header>
            </div>
            <div>
                <el-form ref="employeeForm" :model="form">
                    <el-row :guuter="10">
                        <el-form-item
                           label="Name" required prop="name">
                           <el-input v-model="form.name" 
                           :readonly="readOnlyField"
                           aria-placeholder="Employee Name"></el-input>
                        </el-form-item>
                        <el-form-item
                           label="Department" required prop="department">
                           <el-input v-model="form.department" 
                           :readonly="readOnlyField"
                           aria-placeholder="Department Name"></el-input>
                        </el-form-item>
                        <el-form-item
                           label="Section" required prop="section">
                           <el-input v-model="form.section" 
                           :readonly="readOnlyField"
                           aria-placeholder="Section Name"></el-input>
                        </el-form-item>
                        <el-form-item
                           label="Email" required prop="email">
                           <el-input v-model="form.email" 
                           :readonly="readOnlyField"
                           aria-placeholder="Email Address"></el-input>
                        </el-form-item>
                    </el-row>
                    <el-row :guuter="10">
                        <el-form-item v-if="scope !='show'">
                            <el-button type="success" @click="saveForm('employeeForm')">
                                Save
                            </el-button>
                        </el-form-item>
                    </el-row>
                </el-form>
            </div>
        </el-card>
    </div>
</template>

<script >
    export default {
        name: 'employee-form',
        props:{
            scope:String,
            id:Number,
        },
        computed:{
            readOnlyField(){
                return this.scope == 'show' ? true : false;
            }
        },
        mounted(){
            if(this.scope == 'edit' || this.scope == 'show')
            {
                axios.get(`/fetch-employee-data/${this.id}`).then(res => {
                    this.$set(this, 'form', res.data.data);
                });
            }
        },
        data(){
            return {
                form:{
                    name:null,
                    department:null,
                    section:null,
                    email:null
                }
            }
        },
        methods:{
            goBack(){
                window.location.href = '/employees';
            },
            saveForm(formName){
                this.$refs[formName].validate((valid) => {
                    if (valid) {
                        if(this.scope == 'create')
                        {
                            this.$store.dispatch('saveEmployee', this.form);
                        }
                        else
                        {
                            this.$store.dispatch('updateEmployee', 
                            {
                                id: this.id,
                                form: this.form,
                            });
                        } 
                    } 
                })
            }
        }
    } 
</script>