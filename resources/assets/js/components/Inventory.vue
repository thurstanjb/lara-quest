<template>
    <div>
        <ul class="list-group" v-if="inventory.length">
            <li class="list-group-item" v-for="item in inventory" :key="item.id">
                {{item.name}} x{{item.count}}
                <span class="eat pull-right" v-if="item.type === 'food'" @click="eat(item)">eat</span>
            </li>
        </ul>
        <ul class="list-group" v-else>
            <li class="list-group-item">No Items</li>
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
        },

        mounted(){
            this.get_inventory();
        },

        created(){
            window.events.$on('update_inventory', inventory => {
                this.inventory = inventory;
            });
        },

        methods:{
            eat(item){
                let data = {
                    item_id:item.id,
                    pivot_id:item.pivot.id
                };
                window.axios.post('/api/eat', data)
                    .then(response => {
                        this.inventory = response.data.inventory;
                        window.events.$emit('update_health', response.data.health);
                    })
                    .catch(response => {
                        console.error(response);
                    })
            },
            get_inventory(){
                window.axios.get('/api/inventory')
                    .then(response => {
                        this.inventory = response.data.inventory
                    })
                    .catch(response => {
                        console.error(response);
                    })
            }
        }
    }
</script>