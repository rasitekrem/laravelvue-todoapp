<template>
  <v-app id="inspire">
    <v-bottom-navigation
      v-model="activeBtn"
      color="primary"
      horizontal
    >
      <v-btn to="/all" @click="updateFilter('all')"> 
        <span>Tümü</span>
        <v-icon>mdi-calendar-clock</v-icon>
      </v-btn>
      <v-btn to="/active" @click="updateFilter('active')"> 
        <span>Yapılacaklar</span>
        <v-icon>mdi-calendar-clock</v-icon>
      </v-btn>

      <v-btn to="/completed" @click="updateFilter('completed')">
        <span>Yapılanlar</span>
        <v-icon>mdi-calendar-multiple-check</v-icon>
      </v-btn>

      <v-btn @click="logout">
        <span>Çıkış</span>
        <v-icon>mdi-power</v-icon>
      </v-btn>
    </v-bottom-navigation>

    <v-main>
      <v-container
      >
      <router-view></router-view>
      </v-container>
    </v-main>
  </v-app>
</template>

<script>
  import { mapGetters, mapActions } from 'vuex';
  export default {
    props: {
      source: String,
    },
    data: () => ({
      activeBtn: 0,
    }),
    computed: {
      ...mapGetters({
        currentUser: 'currentUser/getUser'
      })
    },
    methods: {
      ...mapActions({
        logout: 'currentUser/logoutUser',
        updateFilter: 'todoList/updateFilter'
      })
    },
    created() {
        // axios ile atılacak işlemlerde default olarak tokenı ekliyoruz
        axios.defaults.headers.common["Authorization"] = "Bearer " + localStorage.getItem("todoapp_token");
        this.$store.dispatch('currentUser/getUser');
    },
  }
</script>