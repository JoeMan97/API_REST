<template>

    <div class="row" >
        <spinner v-show="loading"></spinner>
        <div v-for="opinion in opinions" v-bind:key="opinion.opinion_id" style="margin-bottom: 20px;">
            <div class="card">
                <h5 class="card-header">{{ opinion.title }}</h5>
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-muted">Puntuación: {{ opinion.score }} / 5</h6>
                    <p class="card-text">{{ opinion.resume }}</p>

                    <a class="text-primary" data-toggle="collapse" :href="'#opinion-details-'+opinion.opinion_id" role="button" aria-expanded="false" aria-controls="collapseExample">Ver detalles...</a>

                    <div class="mt-3 collapse" v-bind:id="'opinion-details-'+opinion.opinion_id">
                        <p class="mb-1 card-text font-weight-bold text-secondary">Fecha de envío: <span class="font-weight-normal text-secondary">{{ opinion.created_at }}</span></p>
                        <p class="mb-3 card-text font-weight-bold text-secondary">Dirección IP: <span class="font-weight-normal text-secondary">{{ opinion.ip_address }}</span></p>
                        <p class="mb-1 card-text font-weight-bold text-secondary">Usuario: <span class="font-weight-normal text-secondary">{{ opinion.user_name }}</span></p>
                        <p class="mb-3 card-text font-weight-bold text-secondary">email: <span class="font-weight-normal text-secondary">{{ opinion.email }}</span></p>
                        <p class="mb-1 card-text font-weight-bold text-secondary">Empresa: <span class="font-weight-normal text-secondary">{{ opinion.company_name }}</span></p>
                        <p class="mb-0 card-text font-weight-bold text-secondary">Dirección: <span class="font-weight-normal text-secondary">{{ opinion.address }}</span></p>
                    </div>

                </div>
            </div>
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