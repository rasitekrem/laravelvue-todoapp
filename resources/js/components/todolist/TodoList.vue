<template>
  <div>
    <v-simple-table>
      <template v-slot:default v-if="tasks.length > 0">
        <tbody>
          <todo-item v-for="task in tasks" :key="task.id" :task="task"></todo-item>
        </tbody>
      </template>
      <template v-slot:default v-else>
        <v-alert
          dense
          type="info"
        >
          Kayıt bulunamadı
        </v-alert>
      </template>
    </v-simple-table>
    <change-button :title="title('active')" :color="'primary'" v-if="filter == 'all' || filter == 'active'" @trigger-event="checkAll"/>
    <change-button :title="title('completed')" :color="'error'" v-if="filter == 'all' || filter == 'completed'" @trigger-event="destroyCompleted"/>
  </div>
</template>

<script>
  import TodoItem from './TodoItem';
  import ChangeButton from './ChangeButton';
  import { mapGetters, mapActions } from 'vuex';
  export default {
    props: ['tasks'],
    components:{
      TodoItem,
      ChangeButton
    },
    computed: {
      ...mapGetters({
        filter: 'todoList/getFilter'
      })
    },
     methods: {
      ...mapActions({
        checkAll: 'todoList/checkAll',
        destroyCompleted: 'todoList/destroyCompleted'
      }),
      title(filter) {
        return filter == 'active' ? "Tümünü yapıldı olarak işaratle" : "Yapılmış olanlar sil"
      }
  },
  }
</script>