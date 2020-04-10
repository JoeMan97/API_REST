<template>

    <div class="row" >
        <div v-for="opinion in opinions" v-bind:key="opinion.opinion_id" style="margin-bottom: 20px;">
            <div class="card">
                <h5 class="card-header">
                    {{ opinion.title }}
                </h5>
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted">Puntuación: {{ opinion.puntuation }} / 5</h6>
                    <p class="card-text">{{ opinion.resume }}</p>
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModalCenter" 
                    >Detalles</button>
                </div>
            </div>
            <OpinionDetails 
                :opinion-created-at="opinion.created_at" 
                :opinion-ip-address="opinion.ip_address"
                :opinion-user-id="opinion.user_id"
                :opinion-company-id="opinion.company_id"
            />
        </div>
    </div>    
    
</template>

<script>
    import OpinionDetails from '../components/OpinionDetailsComponent.vue'

    export default {
        data() {    
            return {
                opinions: [],
                loading: true
            }
        },
        mounted(){
            axios.get('http://127.0.0.1:8000/api/opinions').then(response => (this.opinions = response.data))
        },
        components: {
            OpinionDetails
        }
    }
</script>