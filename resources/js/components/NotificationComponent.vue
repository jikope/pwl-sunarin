
<template>
<div class="container">
    <div class="mt-5 card shadow p-3">
    <h4 class="m-3">Notifikasi</h4>
    <ul style="list-style-type: none;">
        <li v-for="(message, index) in notification" :key="index" >
            <div  class="p-3 border card m-2 border-rounded">
            <p> <strong>{{message.title}}  </strong><small class="mr-5">{{getDateFormat(message.created_at)}}</small></p>
            
            <p>{{message.message}}</p>
            </div>
            
        </li>
    </ul>
    </div>
</div>
</template>

<script>
import moment from 'moment';

        export default {
      
        props: ['user'],
        data(){
            return{
                notification: []
        }
        },
        created(){
            this.fetchMessages();
            
            Echo.channel('notif'+this.user.id).listen('NotifSentEvent',(event)=>{
                this.notification.unshift({
                    title: event.message.title,
                    message: event.message.message,
                    created_at: event.message.created_at
                    })
            });
            
        },
        methods: {
            getDateFormat(date){
                return moment(String(date)).format('MM/DD/YYYY hh:mm')
            },
            fetchMessages(){
                axios.get('notification').then(response=>{
                    this.notification = response.data;
                })
            },
            
        },
    }

</script>
