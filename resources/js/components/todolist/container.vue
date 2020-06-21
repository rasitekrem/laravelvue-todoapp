<template>
  <v-app id="inspire">
    <v-main>
      <v-container>
        <v-row align="start" justify="center">
          <v-col cols="12" sm="8" md="8">
            <v-text-field label="Yapılacak İş" v-model="test"></v-text-field>
          </v-col>
          <v-col cols="12" sm="8" md="8">
            <v-card class="elevation-12">
              <v-card-text>
                <todo-item />
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
export default {
  components: {
    TodoItem
  }
};
</script>