<template>

    <div class="modal fade" id="newOpinion" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Escribe tu opinión</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form @submit.prevent="saveOpinion">
                <div class="form-group">
                    <label for="">Empresa</label>
                    <div class="input-group mb-3">
                        <select class="custom-select" id="inputGroupSelect02" v-model="company_id">
                            <option v-for="company in companies" v-bind:key="company.company_id" v-bind:value="company.company_id">{{ company.name }}</option>
                        </select>
                    </div>
                    <p v-if="errors.company_id" class="mt-n2 text-danger">{{ errors.company_id[0] }}</p>
                </div>
                <div class="form-group">
                    <label for="">Puntuación</label>
                    <div class="div-in-block">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-light active">
                                    <input type="radio" name="score" id="option1" value="1"> 1
                                </label>
                                <label class="btn btn-light">
                                    <input type="radio" name="score" id="option2" value="2"> 2
                                </label>
                                <label class="btn btn-light">
                                    <input type="radio" name="score" id="option3" value="3" checked> 3
                                </label>
                                <label class="btn btn-light">
                                    <input type="radio" name="score" id="option4" value="4"> 4
                                </label>
                                <label class="btn btn-light">
                                    <input type="radio" name="score" id="option5" value="5"> 5
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Título</label>
                    <input type="text" class="form-control" v-model="title">
                    <p v-if="errors.title" class="mt-1 text-danger">{{ errors.title[0] }}</p>
                </div>
                <div class="form-group">
                    <label for="">Resumen</label>
                    <input type="text" class="form-control" v-model="resume">
                    <p v-if="errors.resume" class="mt-1 text-danger">{{ errors.resume[0] }}</p>
                </div>
                
                <button type="submit" class="mt-1 btn btn-primary">Enviar</button>
            </form>
        </div>
        </div>
    </div>
    </div>

</template>

<script>
    import EventBus from '../event-bus';
    
    export default {
        data() {    
            return {
                // arreglo para llenar el select con los nombres de las empresas
                companies: [],

                // variables para enviar los datos de la opinion
                company_id: null,
                score: null,
                title: null,
                resume: null,
                ip_address: null,
                user_id: 10,

                // arreglo para obtener posibles errores al enviar el formulario
                errors: []
            }
        },
        mounted(){
            axios.get('http://127.0.0.1:8000/api/companies').then(response => (this.companies = response.data))
        },
        methods:{
            saveOpinion: async function() {
                this.errors = [];

                this.score=document.querySelector('input[name="score"]:checked').value;          

                await $.getJSON("https://api.ipify.org?format=json").then(response => (this.ip_address = response.ip));

                axios.post('http://127.0.0.1:8000/api/opinions',{
                    score: this.score,
                    title: this.title,
                    resume: this.resume,
                    ip_address: this.ip_address,
                    company_id: this.company_id,
                    user_id: this.user_id
                })
                .then(function(res){
                    $('#newOpinion').modal('hide');
                    EventBus.$emit('opinion-added', res.data.opinion);
                })
                .catch(err => {
                    if(err.response.status == 422){
                        this.errors = err.response.data;
                    }
                });
            },
        }        
    }
</script>

<style scoped>
    .div-in-block{
        display: block;
    }
</style>