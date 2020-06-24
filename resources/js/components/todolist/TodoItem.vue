<template>
    <tr>
        <td>    
        <v-checkbox v-if="!isEditable"
            v-model="task.completed"
            @change="updateTask(task)"
        ></v-checkbox>
        </td>
        <td>
            <span v-if="!isEditable">{{ task.title }}</span>
            <v-text-field regular v-model="task.title" v-else></v-text-field>
            
        </td>
        <td v-if="!isEditable" > 
            <div class="float-right">
                <v-btn icon color="blue lighten-2" @click="isEditable = !isEditable">
                    <v-icon>mdi-pencil-outline</v-icon>
                </v-btn>
                <v-btn icon color="red lighten-2" @click="deleteTask(task)">
                    <v-icon>mdi-minus</v-icon>
                </v-btn>
            </div>
        </td>
        <td v-else>
            <v-btn icon color="green lighten-2" class="float-right"  @click="updateTask(task); isEditable = !isEditable">
                <v-icon>mdi-check</v-icon>
            </v-btn>
        </td>
    </tr>
</template>

<script>
import { mapActions } from 'vuex';

export default {
    data: () => {
       return {
           isEditable: false
       }
    },
    props: {
        task: {
            type: Object,
            required: true
        }
    },
    methods: {
      ...mapActions({
        updateTask: 'todoList/updateTask',
        deleteTask: 'todoList/deleteTask'
      })
    },
}
</script>