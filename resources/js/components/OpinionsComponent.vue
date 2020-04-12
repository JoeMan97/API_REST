<template>

    <div class="row" >
        <spinner v-show="loading"></spinner>
        <div v-for="opinion in opinions" v-bind:key="opinion.opinion_id" style="margin-bottom: 20px;">
            <div class="card">
                <h5 class="card-header">
                    {{ opinion.title }}
                </h5>
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted">Puntuación: {{ opinion.score }} / 5</h6>
                    <p class="card-text">{{ opinion.resume }}</p>
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModalCenter" 
                    >Detalles</button>
                </div>
            </div>
            <OpinionDetails 
                :opinion-created-at="opinion.created_at" 
                :opinion-ip-address="opinion.ip_address"
                :user-name="opinion.user_name"
                :user-email="opinion.email"
                :company-name="opinion.company_name"
                :company-address="opinion.address"
            />
        </div>
    </div>    
    
</template>

<script>
    import OpinionDetails from '../components/OpinionDetailsComponent.vue'
    import EventBus from '../event-bus';

    export default {
        data() {    
            return {
                opinions: [],
                loading: true
            }
        },
        created(){
            EventBus.$on('opinion-added', data => {
                this.opinions.push(data)
            });
        },
        mounted(){
            axios.get('http://127.0.0.1:8000/api/opinions').then(response => (
                this.opinions = response.data,
                this.loading = false
            ))
        },
        components: {
            OpinionDetails
        }
    }
</script>