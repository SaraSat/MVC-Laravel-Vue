

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
                    :item-key="name"
                    :items-per-page="5"
                    class="elevation-1"
                    :search="search"
                    :custom-filter="getFilter">
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
                            <v-btn class="success" @click="dialog=true">Agregar</v-btn>
                         </v-card-title>
                     </v-card>
                </template>
                </v-data-table>
            </v-col>
        </v-row>
        <v-dialog v-model="dialog">
            <v-card>
                <v-card-title>
                    Nuevo producto
                </v-card-title>
                <v-card-text>
                    <v-form>
                        <v-text-field v-model="name" label="Nombre del producto"></v-text-field>
                        <v-text-field v-model="description" label="Descripción del producto"></v-text-field>
                        <v-text-field v-model="price" label="Precio del producto"></v-text-field>
                    </v-form>
                </v-card-text>
                <v-card-actions>
                    <v-btn class="success" @click="agregar()">Agregar</v-btn>
                    <v-btn class="error" @click="dialog=false">Cerrar</v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
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
            name:'',
            description: '',
            price:'',
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

        getFilter(value, search, item) {
            return value != null &&
                search != null &&
                value.toString().toLocaleUpperCase().indexOf(search) !== -1
        },
        
        async agregar() {
           var _this = this
            const res = await axios.post('registro', {
                name : _this.name,
                description : _this.description,
                price : _this. price
            });

            if(res.status == 200) {
                _this.dialog = false;
                _this.listar();
            } 
            console.log(res.status);
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
