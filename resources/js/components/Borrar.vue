<template>
    <v-dialog v-model="dialog">
        <v-card>
            <v-card-title>Eliminación de producto</v-card-title>
            <v-card-text>
                Está seguro que quiere eliminar este producto? 
                <v-divider></v-divider>
                <v-card>
                    <v-card-title>{{item.name}}</v-card-title>
                    <v-card-text>{{item.description}}<br> {{item.price}}€</v-card-text>
                </v-card>
            </v-card-text>
            <v-card-actions>
                <v-btn class="success" @click="borrar()">Borrar</v-btn>
                <v-btn class="error" @click="$emit('cerrar')" >Cerrar</v-btn>
            </v-card-actions>
        </v-card>
        <v-card class="error" v-model="error" v-if="error">
            <v-card-title>Errores!</v-card-title>
                <v-card-text>
                    <span v-if="idRule">
                        {{idRule}} <br>
                    </span>
                </v-card-text>
            </v-card>

    </v-dialog>
</template>
<script>
export default {
    name: 'Borrar', 
    props: {
        item:{}
    }, 

    data() {
        return {
            dialog: true,
            idRule: '',
            error: false,
            erros: []
        }
    },

    methods: {
        async borrar() {

           var _this = this
          _this.errors = []
            try {
                await axios.get('borrar/'+_this.item.id);

                _this.$emit('listar');
                _this.$emit('cerrar');
                _this.dialog = false;
                _this.error = false;

            } catch(e) {
                _this.errors = e.response.data
                _this.setErrors();
            }

        },

        setErrors() {
            this.error = true;
            this.idRule = this.errors ? "id: " + this.errors.message : ""
        }, 
    },
}
</script>

