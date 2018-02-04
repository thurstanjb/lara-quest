<template>
    <div>
        <div class="progress">
            <div :class="status_class" role="progressbar" :aria-valuenow="health" aria-valuemin="0" aria-valuemax="100" :style="bar_width">
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['user-health'],

        computed:{
            status_class(){
                if(this.health < 10){
                    return 'progress-bar progress-bar-danger';
                }else if(this.health < 60){
                    return 'progress-bar progress-bar-warning';
                }else{
                    return 'progress-bar progress-bar-success';
                }
            },
            bar_width(){
                return 'width: ' + this.health + '%';
            }
        },
        data(){
            return{
                health: this.userHealth
            }
        }
    }
</script>