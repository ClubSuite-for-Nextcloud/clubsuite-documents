<template>
  <div>
    <h3>Vorlagen</h3>
    <div>
      <button @click="prev">Prev</button>
      <button @click="next">Next</button>
      <span>Showing {{ items.length }} of {{ total }}</span>
    </div>
    <ul>
      <li v-for="t in items" :key="t.id">{{ t.name }} — {{ t.description }}</li>
    </ul>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
const items = ref([])
const total = ref(0)
const limit = ref(20)
const offset = ref(0)
async function load(){
  const params = new URLSearchParams({ limit: String(limit.value), offset: String(offset.value) })
  const res = await fetch('/index.php/apps/clubsuite-documents/api/templates?' + params.toString())
  const data = await res.json()
  items.value = data.rows
  total.value = data.total
}
function next(){ if (offset.value + limit.value < total.value) { offset.value += limit.value; load(); } }
function prev(){ if (offset.value >= limit.value) { offset.value -= limit.value; load(); } }
onMounted(load)
</script>
