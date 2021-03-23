<template>
        <v-dialog v-model="dialog">
        <v-card>
            <v-card-title>
                Nuevo producto
            </v-card-title>
            <v-card-text>
                <v-form>
                    <v-text-field v-model="item.name" label="Nombre del producto"></v-text-field>
                    <v-textarea v-model="item.description" label="Descripción del producto" rows="2"></v-textarea>
                    <v-text-field v-model="item.price" label="Precio del producto"></v-text-field>
                </v-form>
            </v-card-text>
            <v-card-actions>
                <v-btn class="success" @click="editar()">Agregar</v-btn>
                <v-btn class="error" @click="$emit('cerrar')" >Cerrar</v-btn>
                </v-card-actions>
            </v-card>
            <v-card class="error" v-model="error" v-if="error">
                <v-card-title>Errores!</v-card-title>
                <v-card-text>
                    <span v-if="nameRule">
                       {{nameRule}} <br>
                    </span>
                    <span v-if="descriptionRule">
                        {{descriptionRule}} <br>
                    </span>
                    <span v-if="priceRule">
                        {{priceRule}} <br>
                    </span>
                    <span v-if="idRule">
                        {{idRule}} <br>
                    </span>
                        
                </v-card-text>
            </v-card>
    </v-dialog>

</template>

<script>
export default {
    name: 'Edicion',
    props: {
        item: {}
    },

    data () {
        return {
            dialog: true,
            nameRule: '',
            descriptionRule: '',
            priceRule: '',
            idRule: '',
            errors: [],
            error: false

        }
    }, 

    methods: {

        async editar() {
           var _this = this
          _this.errors = []
           console.log(_this.item.name)
            try {
                await axios.post('edicion', {
                    id: _this.item.id,
                    name : _this.item.name,
                    description : _this.item.description,
                    price : _this.item.price
                });

                _this.$emit('listar');
                _this.dialog = false;
                _this.error = false;

            } catch(e) {
                console.log(e)
                _this.errors = e.response.data.data
                _this.setErrors();
            }

        },

        setErrors() {
            this.error = true;
            this.idRule = typeof this.errors == 'string' ? "id: " + this.errors : ""
            this.nameRule =  this.errors.name ?  "Nombre: " + this.errors.name.toString() :  "" 
            this.descriptionRule = this.errors.description ? "Descripción: " + this.errors.description.toString() : "" 
            this.priceRule = this.errors.price ? "Precio: " + this.errors.price.toString() :  "";
        }, 
        
    },

}
</script>
