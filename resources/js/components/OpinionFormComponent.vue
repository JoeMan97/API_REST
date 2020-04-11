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
                        <option selected>Elije la empresa...</option>
                        <option v-for="company in companies" v-bind:key="company.company_id" v-bind:value="company.company_id">{{ company.name }}</option>
                    </select>
                    </div>
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
                </div>
                <div class="form-group">
                    <label for="">Resumen</label>
                    <input type="text" class="form-control" v-model="resume">
                </div>
                
                <button type="submit" class="btn btn-primary">Enviar</button>
            </form>
        </div>
        </div>
    </div>
    </div>

</template>

<script>
    export default {
        data() {    
            return {
                loading: true,
                
                // arreglo para llenar el select con los nombres de las empresas
                companies: [],

                // variables para enviar los datos de la opinion
                company_id: null,
                score: null,
                title: null,
                resume: null,
                ip_address: '201.157.167.255',
                user_id: 10,
            }
        },
        mounted(){
            axios.get('http://127.0.0.1:8000/api/companies').then(response => (this.companies = response.data))
        },
        methods:{
            saveOpinion: function(){

                this.score=document.querySelector('input[name="score"]:checked').value;
                
                axios.post('http://127.0.0.1:8000/api/opinions',{
                    score: this.score,
                    title: this.title,
                    resume: this.resume,
                    ip_address: this.ip_address,
                    company_id: this.company_id,
                    user_id: this.user_id
                })
                .then(function(res){
                    console.log(res);
                    $('#newOpinion').modal('hide');
                })
                .catch(function(err){
                    console.log(err)
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