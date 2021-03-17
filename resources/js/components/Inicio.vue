

<template>
    <v-parallax src="https://cdn.vuetifyjs.com/images/parallax/material.jpg">
        <v-row>
            <v-col class="col col-12" id="title">
                <h1>Gestión de Productos</h1>
            </v-col> 
        </v-row>  
        <v-row>
            <v-col>
                <v-data-table
                    :headers="headers"
                    :items="productos"
                    class="elevation-1"
                    :search="search"
                    :custom-filter="getFilter">
                
                </v-data-table>
            </v-col>
        </v-row>
    </v-parallax>
</template>

<script>
export default {
    name: 'inicio', 

    data() {
        return {
            headers: [
                {text: 'Nombre', value:'name', sortable:true},
                {tex: 'Descripción', value: 'description', sortable:false},
                {text: 'Precio', value: 'price', sortable:true}
            ], 

            search: '', 
            productos: [],
        }
    },  

    created() {
        this.listar();
    },

    methods: {
        async listar() {
            const res = await axios.get('list');

            this.productos = res.data;
        },

        getFilter(value, search, item) {
            return value != null &&
                search != null &&
                typeof value === 'string' &&
                value.toString().toLocaleUpperCase().indexOf(search) !== -1
        }
    }
}
</script>


<style>
 #title {
     text-align: center;
     margin-top: 5%;
 }
</style>
