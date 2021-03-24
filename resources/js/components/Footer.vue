<template>
    <v-footer  padless sticky>
      <v-card flat tile class="red lighten-1 text-center" width="100%">
        <v-card-text> 
          <v-btn icon href="https://www.facebook.com/La-Luna-1575189982738297"><v-icon color="blue" >mdi-facebook</v-icon></v-btn>
          <v-btn icon href="https://www.instagram.com/lalunaalcobendas" ><v-icon color="pink">mdi-instagram</v-icon></v-btn>
        </v-card-text>
        <v-card-text class="white--text pt-0">
          <a rel="license" href="http://creativecommons.org/licenses/by-nc/4.0/">
          <img alt="Licencia de Creative Commons" style="border-width:0" src="https://i.creativecommons.org/l/by-nc/4.0/88x31.png" />
          </a><br />Este obra está bajo una <a rel="license" href="http://creativecommons.org/licenses/by-nc/4.0/" id="cclicence">
          licencia de Creative Commons Reconocimiento-NoComercial 4.0 Internacional</a>.        
        </v-card-text>
        <v-divider></v-divider>

        <v-card-text class="white--text">
          {{ new Date().getFullYear() }} — <strong>Sara Álvarez Turrión</strong><br>
          <span id="cita"> background image : <a href="https://venngage.com/blog/simple-backgrounds/">https://venngage.com/blog/simple-backgrounds/</a></span>
        </v-card-text>
      </v-card>
    </v-footer>
</template>

<script>
export default {
    name: 'Footer'
}
</script>
<style>
#cclicence{
  color: white;
}
#cita {
  font-size: 12px;
}
#cita a {
  color: white;
}
</style>
