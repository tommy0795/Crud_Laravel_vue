<template>
    <div class="container-fluid">
        <div class="row col-6">
            <div class="col-md-8 mb-2">
                <div class="d-flex justify-content-center">
                    <input type="text" id="input.name" class="form-control" placeholder="Nom*"
                        v-model="pseudo" />
                </div>
            </div>
            <div class="d-flex justify-content-md-center col-6 col-md-4">
                <div class="d-flex justify-content-center">
                    <label class="form-check-label me-2 text-secondary" for="form6Example8">
                        <input class="form-check-input me-2" type="checkbox" value="" id="checkIsCustomer"
                            v-model="isCustomer" />Déjà client</label>
                </div>
            </div>


            <div class="col-6 mb-2">
                <input type="text text-secondary" id="input.phone" class="form-control" placeholder="téléphone*"
                    v-model="phone" />
            </div>

            <div class="col-6 text-secondary">
                <input type="text" id="input.message" class="form-control" placeholder="Email*"
                    v-model="email" />
            </div>
            <div class="col-12">
                <div class="d-flex justify-content-center">
                    <select class="form-select form-select-lg mb-3 text-secondary" v-model="subject">
                        <option value="1">Sujet*</option>
                        <option value="2">Demande de renseignement</option>
                        <option value="3">Besoin d'un devis</option>
                        <option value="4">Programmer ma visite d'entretien</option>
                        <option value="5">URGENCE dépannage</option>
                        <option value="6">autres...</option>
                    </select>
                </div>
            </div>
            <div class="d-flex justify-content-center text-secondary">
                <textarea class="form-control" id="form6Example7" rows="4" placeholder="Message*"
                    v-model="message"></textarea>
            </div>
            <div class="d-flex">
                <label class="text-secondary" id="obligatoryNote">*mentions obligatoires</label>
            </div>
            <div class="d-flex col-8">
                <button type="submit" class="btn btn-danger btn-block col-12" @click.prevent="createPost">ENVOI
                    MESSAGE</button>
            </div>
        </div>
    </div>
</template>
<script>

import axios from 'axios'

export default {
    data (){
        return {
                pseudo: '',
                isCustomer:'',
                phone: '',
                email: '',
                subject: '',
                message:''
            
        }
    },
    methods: {
        async createPost() {
            await axios.post('/api/formulaire', {
                pseudo: this.pseudo,
                isCustomer: this.isCustomer,
                phone: this.phone,
                email:this.email,
                subject: this.subject,
                message:this.message
            }).then((response) =>
            console.log(response))
        }
    }
}


</script>