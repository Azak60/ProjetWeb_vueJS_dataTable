<template>
    <div>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        name: "HeaderTable",
        data() {
            return {
                data: []
            }
        },
        methods: {
            fetchData() {
                axios.get('https://raw.githubusercontent.com/mdubourg001/datatable_vuejs/master/src/assets/MOCK_DATA.json')
                .then( (response) => {
                    console.log(this);
                    console.log(response)
                })
                .catch(function (error) {
                    console.log(error)
                })
            }
        },
        mounted() {
            this.fetchData()
        }
    }
</script>

<style scoped>

</style>
