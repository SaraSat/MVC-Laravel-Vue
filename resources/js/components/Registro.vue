<template>
    <v-dialog v-model="dialog">
        <v-card>
            <v-card-title>
                Nuevo producto
            </v-card-title>
            <v-card-text>
                <v-form>
                    <v-text-field v-model="name" label="Nombre del producto"></v-text-field>
                    <v-textarea v-model="description" label="Descripción del producto" rows="2"></v-textarea>
                    <v-text-field v-model="price" label="Precio del producto"></v-text-field>
                </v-form>
            </v-card-text>
            <v-card-actions>
                <v-btn class="success" @click="agregar()">Agregar</v-btn>
                <v-btn class="error" @click="$emit('cerrar')" >Cerrar</v-btn>
                </v-card-actions>
            </v-card>
            <v-card class="error" v-model="error" v-if="error">
                <v-card-title>Errores!</v-card-title>
                <v-card-text>
                    <span>
                       {{nameRule}} <br>
                    </span>
                    <span>
                        {{descriptionRule}} <br>
                    </span>
                    <span>
                        {{priceRule}} <br>
                    </span>
                        
                </v-card-text>
            </v-card>
    </v-dialog>
</template>

<script>
export default {
    name: 'Registro',
    data() {
        return {
            dialog: true,
            error: false,
            name:'',
            description: '',
            price: '',
            errors: [],
            nameRule: "",
            descriptionRule: "",
            priceRule: ""
        }
    }, 

    methods: {
        
        async agregar() {
           var _this = this
           _this.errors = []
            try {
                await axios.post('registro', {
                    name : _this.name,
                    description : _this.description,
                    price : _this. price
                });

                _this.$emit('listar');
                _this.$emit('cerrar');
                _this.dialog = false;
                _this.error = false;

            } catch(e) {
                _this.errors = e.response.data.data
                _this.setErrors();
            }

        },

        setErrors() {
            this.error = true;
            this.nameRule = this.errors.name ? "Nombre: " + this.errors.name.toString(): "" 
            this.descriptionRule = this.errors.description ? "Descripción: " + this.errors.description.toString() : "" 
            this.priceRule = this.errors.price ? "Precio: " + this.errors.price.toString() : "";
        }

    },
}
</script>

<style>
.v-dialog {
    width: 600px
}
.v-form {
    padding: 3%;
}
span{
    font-weight: 600;
}
    
</style>