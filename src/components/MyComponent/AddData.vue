<template>
    <div class="row">
        <form method="post" action="#" id="formAddData" @submit.prevent="addIntervention()">
            <!--<form method="post" action="#" id="formAddData" @submit.prevent="addIntervention()">-->

            <h2>Ajouter une intervention</h2>
            <input type="text" placeholder="Objet de l'intervention ..." name="txtTitleInput" id="titleInput" v-model="titleInput" />
            <input type="text" placeholder="Message de l'intervention ..." name="txtMsgInterventionInput" id="msgInterventionInput" v-model="msgInterventionInput" />
            <input type="text" placeholder="Affecté à ..." name="txtAffectedToInput" id="AffectedToInput" v-model="affectedToInput" />
            <input type="text" placeholder="Client" name="txtClientInput" id="clientInput" v-model="clientInput" />
            <input type="text" placeholder="Etat" name="txtStateInput" id="stateInput" v-model="stateInput" />

            <input type="submit" value="Ajouter une intervention" />
        </form>
    </div>


</template>

<script>
    // import LineOfTable from './LineOfTable'

    export default {

        name: "add-data",
        // components:{
        //     LineOfTable
        // },

        props: [
            'newid'
        ],

        data() {
            return {
                id: 0,
                titleInput: '',
                msgInterventionInput: '',
                affectedToInput: '',
                clientInput: '',
                stateInput: '',

                // Pour incrémenter l'id

                // newIntervention: {
                //     id: "",
                //     title: "",
                //     msgIntervention: "",
                //     affectedTo: "",
                //     client: "",
                //     state:""
                // }
            }
        },
        methods: {
            addIntervention() {
                // // J'incrémente count, donc l'id
                // this.count++;

                const newIntervention ={
                    id: this.newid,
                    title: this.titleInput,
                    msgIntervention: this.msgInterventionInput,
                    affectedTo: this.affectedToInput,
                    client: this.clientInput,
                    state: this.stateInput
                };



                this.$parent.$emit('create', newIntervention);

                // Mettre à zéro nos variables pour la prochaine création d'intervention
                this.titleInput = "";
                this.msgInterventionInput = "";
                this.affectedToInput = "";
                this.clientInput = "";
                this.stateInput = ""

            },
        }
    }
</script>

<style scoped>

</style>