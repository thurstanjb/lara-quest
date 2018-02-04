<template>
    <div>
        <ul class="list-group" v-if="inventory.length">
            <li class="list-group-item" v-for="item in inventory" :key="item.id">{{item.name}}</li>
        </ul>
        <ul class="list-group" v-else>
            <li class="list-group-item">Your Inventory is empty</li>
        </ul>
    </div>
</template>

<script>
    export default {
        props: ['user-inventory'],

        data(){
            return{
                inventory: this.userInventory
            }
        }
    }
</script>