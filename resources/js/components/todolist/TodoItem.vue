<template>
    <v-list-item>
      <v-list-item-content>
        <v-list-item-title v-if="isEditable">{{ task.title }}</v-list-item-title>
        <v-text-field
          v-else
          v-model="task.title"
          required
        ></v-text-field>
      </v-list-item-content>
    </v-list-item>
</template>

<script>
  export default {
    props: ['task'],
    data () {
      return {
        isEditable: false
      }
    },
  }
</script>