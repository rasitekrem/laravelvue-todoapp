<template>
  <v-app id="inspire">
    <v-main>
      <v-container>
        <v-row align="start" justify="center">
          <v-col cols="12" sm="8" md="8">
            <v-text-field label="Yapılacak İş"></v-text-field>
          </v-col>
          <v-col cols="12" sm="8" md="8">
            <v-card class="elevation-12">
              <v-card-text>
                <todo-item :task="task" v-for="task in tasks" :key="task.id" />
              </v-card-text>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
    </v-main>
  </v-app>
</template>

<script>
import TodoItem from "./TodoItem";
import { mapGetters, mapActions } from 'vuex';
export default {
  components: {
    TodoItem
  },
  computed: {
      ...mapGetters({
        tasks: 'todoList/getTasks'
      })
  },
  methods: {
      ...mapActions({
        getTasks: 'todoList/getTasks'
      })
  },
  created() {
    this.getTasks();
  },
};
</script>