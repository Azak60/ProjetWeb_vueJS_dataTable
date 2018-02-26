<template>
    <tr>
        <!--// NE PAS FAIRE DE CHANGEMENT SUR L'ID-->

        <td>
           # {{intervention.id}}
        </td>

        <td >
            <input type="text" @keyup.enter='saveEdit()' v-if='editState' v-model='title'>
            <span v-else>{{title}}</span>
            <p @click="edit()">Edit</p>
        </td>

        <td >
            <input type="text" @keyup.enter='saveEdit()' v-if='editState' v-model='msgIntervention'>
            <span v-else>{{msgIntervention}}</span>
            <p @click="edit()">Edit</p>
        </td>


        <td v-if='editState'>{{intervention.title}}</td>
        <td v-else>{{intervention.title}}</td>

        <td v-if='editState'>{{intervention.msgIntervention}}</td>
        <td v-if='!editState'>{{intervention.msgIntervention}}</td>

        <td v-if='editState'>{{intervention.affectedTo}}</td>
        <td v-if='!editState'>{{intervention.affectedTo}}</td>

        <td v-if='editState'>{{intervention.client}}</td>
        <td v-if='!editState'>{{intervention.client}}</td>

        <td v-if='editState'>{{intervention.state}}</td>
        <td v-if='!editState'>{{intervention.state}}</td>
    </tr>
</template>

<script>


    export default {
        name: "line-of-table",

        props: {
            intervention: {
                id: Number,
                title: String,
                msgIntervention: String,
                affectedTo: String,
                client: String,
                state: Boolean,
                index: null
            }
        },
        data() {
            return {
                // Les données initiales
                id: "",
                title: this.intervention.title,
                msgIntervention: this.intervention.msgIntervention,
                affectedTo: this.intervention.affectedTo,
                client: this.intervention.client,
                state: this.intervention.state,

                // // Les inputs ont comme valeur par défaut les valeurs de l'intervention
                // idUpdated: this.intervention.id,
                // titleUpdated: this.intervention.title,
                // msgInterventionUpdated: this.intervention.msgIntervention,
                // affectedToUpdated: this.intervention.affectedTo,
                // clientUpdated: this.intervention.client,
                // stateUpdated: this.intervention.state,

                editState: false

            }
        },

        methods:{
            edit(){
                this.editState = !this.editState;
            },

            saveEdit(){

                const updatedIntervention = {
                    // id: this.intervention.idUpdated,
                    title: this.title,
                    msgIntervention: this.msgIntervention,
                    affectedTo: this.affectedTo,
                    client: this.client,
                    state: this.state
                };

                console.log(updatedIntervention);

                this.$parent.$emit('update', updatedIntervention, this.index);

                // Mettre à zéro nos variables pour la prochaine création d'intervention
                // this.idUpdated = '';
                // this.titleUpdated = '';
                // this.msgInterventionUpdated = '';
                // this.affectedToUpdated = '';
                // this.clientUpdated = '';
                // this.stateUpdated = '';


                // Remise à true de edit pour revenir à une valeur du tableau non modificable
                this.editState = !this.editState;
            }
        }
    }
</script>

<style scoped>

</style>