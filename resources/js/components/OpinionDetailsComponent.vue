<template>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Detalles de la opinión</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>

                <li class="list-group-item">
                    <p>Fecha de envío: {{ opinionCreatedAt }}</p>
                    <p>Dirección IP: {{ opinionIpAddress }}</p> 
                </li>
                <li class="list-group-item">
                    <p>Usuario: {{ userName }}</p>
                    <p>email: {{ userEmail }}</p>
                </li>
                <li class="list-group-item">
                    <p>Empresa: {{ companyName }}</p>
                    <p>Dirección: {{ companyAddress }}</p>
                </li>
    
        </div>
    </div>
    </div>

</template>

<script>
    export default {
        
        props: {
            opinionCreatedAt: { type: String },
            opinionIpAddress: { type: String },
            userName: { type: String },
            userEmail: { type: String },
            companyName: { type: String },
            companyAddress: { type: String },
        },
        data() {    
            return {
                company: [],
                user: [],
                loading: true
            }
        },
        mounted(){

        },
    }
</script>

<style scoped>

</style>