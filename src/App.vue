<template>
    <div id="app" class="container">
        <img src="./assets/logo.png">

        <AddData></AddData>

        <InterventionsList :msg="'Welcome to the DataTable'" :newintervention="newintervention"></InterventionsList>

    </div>
</template>

<script>
    import Table from './components/MyComponent/Table';
    import AddData from './components/MyComponent/AddData';

    export default {
        name: 'app',
        components: {
            InterventionsList:Table,
            AddData
        },

        data(){
            return {
                newintervention: ''
            }
        },

        methods: {
            bindEvents() {
                this.$on('create', (value) => {
                    this.newintervention = value
                })
            }
        },

        mounted() {
            this.bindEvents()
        }

    }
</script>

<style>
    #app {
        font-family: 'Avenir', Helvetica, Arial, sans-serif;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        text-align: center;
        color: #2c3e50;
        margin-top: 60px;
    }
</style>
