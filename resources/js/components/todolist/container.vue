<template>
  <v-app id="inspire">
    <v-main>
      <v-container>
        <v-row align="center" justify="center">
          <v-col cols="12" sm="7" md="7">
            <v-text-field 
              v-model="title"
              @keyup.enter="setTask"
              label="Yapılacak İş"
            />
            
          </v-col>
          <v-col cols="12" sm="7" md="7">
            <v-card class="elevation-12">
              <v-card-text>
                <todo-list :tasks="tasks" />
              </v-card-text>
            </v-card>
          </v-col>
        </v-row>
      </v-container>
    </v-main>
  </v-app>
</template>

<script>
import TodoList from "./TodoList";
import { mapGetters, mapActions, mapMutations } from 'vuex';
export default {
  components: {
    TodoList
  },
  computed: {
      ...mapGetters({
        tasks: 'todoList/getTasks',
        getTitle: 'todoList/getTitle'
      }),
      title: {
        get () {
          return this.getTitle;
        },
        set (text) {
          this.setTitle(text);
        }
      }
  },
  methods: {
      ...mapActions({
        getTasks: 'todoList/getTasks',
        setTask: 'todoList/setTask'
      }),
      ...mapMutations({
        setTitle: 'todoList/setTitle'
      })
  },
  created() {
    this.getTasks();
  },
};
</script>