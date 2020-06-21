<template>
  <v-app id="inspire">
    <v-navigation-drawer
      v-model="drawer"
      app
    >
      <v-list dense>
        <v-list-item link to="/todolist">
          <v-list-item-action>
            <v-icon>mdi-calendar-clock</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>Yapılacaklar Listesi</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
        <v-list-item link to="/madelist">
          <v-list-item-action>
            <v-icon>mdi-calendar-multiple-check</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title >Yapılmış Olanlar</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
        <v-list-item link @click="logout">
          <v-list-item-action>
            <v-icon>mdi-power</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title>Çıkış</v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>

    <v-app-bar
      app
      color="indigo"
      dark
    >
      <v-app-bar-nav-icon @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
      <v-toolbar-title>Application {{ loggedIn }}</v-toolbar-title>
    </v-app-bar>

    <v-main>
      <v-container
        class="fill-height"
        fluid
      >
      <router-view></router-view>
      </v-container>
    </v-main>
    <v-footer
      color="indigo"
      app
    >
      <span class="white--text">&copy; 2019</span>
    </v-footer>
  </v-app>
</template>

<script>
  export default {
    props: {
      source: String,
    },
    data: () => ({
      drawer: null,
    }),
    computed: {
      loggedIn: {
        get() {
          return this.$store.state.currentUser.loggedIn;
        }
      },
      currentUser: {
        get() {
          return this.$store.state.currentUser.user;
        }
      }
    },
    methods: {
        logout() {
            this.$store.dispatch('currentUser/logoutUser');
        }
    },
    created() {
        axios.defaults.headers.common["Authorization"] = "Bearer " + localStorage.getItem("todoapp_token");
        this.$store.dispatch('currentUser/getUser');
    },
  }
</script>