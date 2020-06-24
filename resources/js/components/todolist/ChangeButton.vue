<template>
     <v-btn class="my-3" block rounded :color="color"  @click="$emit('trigger-event')">{{ title }}</v-btn>
</template>

<script>

export default {
    props: ["title","color"],
}
</script>