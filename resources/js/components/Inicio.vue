

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
                <template v-slot:item.actions="{ item }">
                    <v-icon
                        small
                        class="mr-2"
                        @click="editItem(item)"
                        
                    >
                        mdi-pencil
                    </v-icon>
                    <v-icon
                        small
                        @click="deleteItem(item)"
                    >
                        mdi-delete
                    </v-icon>
                </template>
                </v-data-table>
            </v-col>
        </v-row>
        <Registro :dialog="dialog" v-if="dialog" @listar="listar()" @cerrar="cerrar()"></Registro>
        <Edicion :dialog="dialog2" :item="product" v-if="dialog2" @listar="listar()" @cerrar="cerrar()"></Edicion>
        <Borrar :dialog="dialog3" :item="product" v-if="dialog3" @listar="listar()" @cerrar="cerrar()"></Borrar>
    </v-parallax>
    <Footer></Footer>
 
</v-content>
    
</template>

<script>
import Registro from './Registro.vue';
import Edicion from './Edicion.vue';
import Footer from './Footer.vue';
import Borrar from './Borrar.vue';

export default {
    name: 'inicio', 
    components: {
        Registro,
        Footer,
        Edicion,
        Borrar
    },

    data() {
        return {
            headers: [
                {text: 'Nombre', value:'name', sortable:true, filterable: true},
                {tex: 'Descripción', value: 'description', sortable:false},
                {text: 'Precio', value: 'price', sortable:true},
                {text: 'acciones', value: 'actions', sortable: false}
            ], 

            product:{},
            search: '', 
            productos: [],
            dialog:false,
            dialog2: false,
            dialog3: false,
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
            this.dialog2 = false
            this.dialog3 = false
        }, 

        editItem(item) {
            this.product = item
            this.dialog2 = true

        },
        deleteItem(item) {
            this.product = item
            this.dialog3 = true

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
