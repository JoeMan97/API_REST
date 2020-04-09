<template>

    <div class="row" >
        <div v-for="opinion in opinions" v-bind:key="opinion.opinion_id" style="margin-bottom: 20px;">
            <div class="card">
                <h5 class="card-header">
                    {{ opinion.opinion_id }}
                </h5>
                <div class="card-body">
                    <h5 class="card-title">{{ opinion.title }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ opinion.puntuation }} / 5</h6>
                    <p class="card-text">{{ opinion.resume }}</p>
                    <button type="button" class="btn btn-outline-primary">Detalles</button>
                </div>
            </div>
        </div>
    </div>    
    
</template>

<script>
    export default {
        data() {    
            return {
                opinions: [],
                loading: true
            }
        },
        mounted(){
            axios.get('http://127.0.0.1:8000/api/opinions').then(response => (this.opinions = response.data))
        }
    }
</script>