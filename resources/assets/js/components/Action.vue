<template>
    <div class="col-md-4 action">
        <div class="panel panel-default" @click="openModal">
            {{message}}
        </div>

        <div class="modal fade" :id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">

                        <span>
                            {{modal_message}}
                        </span>

                    </div>
                    <div class="modal-footer" align="center">
                        <button type="button" class="btn btn-primary" @click="process">Continue</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: {
            'message-data':{
                type:String,
                required: true
            },
            'pickup-data':{
                type: String,
                default: 'null'
            },
            'url-data': {
                type: String,
                default: 'null'
            },
            'user-inventory': {
                type: Array,
                required: true
            },
            'modal-id': {
                type: String,
                required: true
            },
            'modal-message': {
                type: String,
                required: true
            },
            'take-damage': {
                type: [Number, String],
                default: 'null'
            },
            'needed-item': {
                type: String,
                default: 'null'
            }
        },

        data(){
            return{
                message: this.messageData,
                pickup: this.pickupData,
                url: this.urlData,
                inventory: this.userInventory,
                modal: this.modalId,
                modal_message: this.modalMessage,
                damage: this.takeDamage,
                item_needed: this.neededItem,
                can_pickup: true,
                found_item: false,
                can_use: true,
                using_item: {}
            }
        },

        mounted(){
          this.checkInventory();
          this.checkItem();
        },

        methods: {
            openModal(){
                console.log('Opening Modal');
                $('#' + this.modal).modal('show');
            },
            checkInventory(){
                if(this.pickup !== 'null'){
                    this.inventory.filter(elem => {
                        if(elem.slug === this.pickup && (this.found_item || elem.single_use)){
                            this.can_pickup =  false;
                            this.modal_message = 'you found nothing.'
                        }
                    });
                }
            },

            checkItem(){
                if(this.item_needed !== 'null'){
                    this.can_use = false;
                    this.inventory.filter(elem => {
                        if(elem.slug === this.item_needed){
                            this.can_use =  true;
                            this.using_item = elem;
                        }
                    });
                    if(!this.can_use){
                        this.url = 'null';
                        this.modal_message = 'You need a' + this.item_needed
                    }
                }
            },

            process(){
                if(this.can_pickup && this.pickup !== 'null' && !this.found_item){
                    this.addItem(this.pickup);
                }
                if(this.can_use && this.item_needed !== 'null'){
                    this.useItem(this.using_item);
                }
                if(this.url !== 'null'){
                    this.changeUrl(this.url);
                }
                if(this.damage !== 'null'){
                    this.damaged(this.damage);
                }
                $('#' + this.modal).modal('hide');
            },

            addItem(slug){
                let data = {
                    slug: slug
                };
                this.found_item = true;
                window.axios.post('/api/pickup', data)
                    .then(response => {
                        console.log(response.data.inventory);
                        this.inventory = response.data.inventory;
                        window.events.$emit('update_inventory', response.data.inventory);
                        this.checkInventory();
                    })
                    .catch(response => {
                        console.error(response);
                    })
            },

            useItem(item){
              let data = {
                  pivot_id: item.pivot.id
              };
              window.axios.post('/api/use', data)
                  .then(response => {
                      this.inventory = response.data.inventory;
                      window.events.$emit('update_inventory', response.data.inventory);
                  })
                  .catch(response => {
                      console.error(response);
                  })
            },

            damaged(damage){
                let data = {
                    damage:damage
                };
                window.axios.post('/api/damage', data)
                    .then(response => {
                        window.events.$emit('update_health', response.data.health);
                        if(response.data.dead !== undefined){
                            this.changeUrl(response.data.dead)
                        }
                    })
            },

            changeUrl(url){
                window.location = url;
            }
        }
    }
</script>