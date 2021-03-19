

<template>
<v-content>
    <v-parallax src="https://cdn.vuetifyjs.com/images/parallax/material.jpg" height="100%">
        <v-row>
            <v-col class="col col-12" id="title">
                <h1>Gestión de Productos</h1>
            </v-col> 
        </v-row>  
        <v-row>
            <v-col class="col col-6" id="table-col">
                <v-data-table
                    :headers="headers"
                    :items="productos"
                    :items-per-page="5"
                    class="elevation-1"
                    :search="search"
                    dense
                    :footer-props="{
                        showFirstLastPage: true,
                        firstIcon: 'mdi-arrow-collapse-left',
                        lastIcon: 'mdi-arrow-collapse-right',
                        prevIcon: 'mdi-minus',
                        nextIcon: 'mdi-plus'
                    }">
                 <template v-slot:top>
                     <v-card>
                         <v-card-title>
                            Productos
                            <v-spacer></v-spacer>
                            <v-text-field
                                v-model="search"
                                append-icon="mdi-magnify"
                                single-line
                                label="Search"
                                class="mx-4"
                            ></v-text-field> 
                            <v-spacer></v-spacer>                             
                            <v-btn class="success" @click="dialog=true;">Agregar</v-btn>
                         </v-card-title>
                     </v-card>
                </template>
                </v-data-table>
            </v-col>
        </v-row>
        <Registro :dialog="dialog" v-if="dialog" @listar="listar()" @cerrar="cerrar()"></Registro>
    </v-parallax>
    <Footer></Footer>
 
</v-content>
    
</template>

<script>
import Registro from './Registro.vue';
import Footer from './Footer.vue';

export default {
    name: 'inicio', 
    components: {
        Registro,
        Footer
    },

    data() {
        return {
            headers: [
                {text: 'Nombre', value:'name', sortable:true, filterable: true},
                {tex: 'Descripción', value: 'description', sortable:false},
                {text: 'Precio', value: 'price', sortable:true}
            ], 

            search: '', 
            productos: [],
            dialog:false,
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

        cerrar() {
            this.dialog = false
        }

    }
}
</script>


<style>
 #title {
     text-align: center;
     margin-top: 5%;
 }

 .v-parallax {
     position: static !important
 }

 #table-col {
     margin-left: 25%;
     margin-bottom: 5%;

 }

</style>
